<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.messages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create-message');

        return view('dashboard.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validationInput = $request;
        $validationInput['body'] = str_replace('&nbsp;', '', strip_tags($request->body));
        $this->validate($validationInput, [
            'subject' => ['required', 'string', 'max:55'],
            'body' => ['required', 'string', 'min:5'],
            'to' => ['required', 'array', 'exists:users,id'],
            'attachment' => ['file', 'max:32000'],
        ]);

        $message = new Message();
        $message->forceFill([
            'subject' => $request->subject,
            'body' => $request->body,
        ])->save();

        $message->users()->attach(auth()->id(), ['action' => 'send']);
        foreach ($request->input('to') as $user_id) {
            $message->users()->attach($user_id, ['action' => 'receive']);
        }

        if ($request->attachment != null) {
            $uploadedFile = $request->file('attachment');
            $folder = time() . (explode('.', $uploadedFile->getClientOriginalName())[0]);
            $filename = time() . $uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs('files/' . $folder, $uploadedFile, $filename);
            $attachment = new Attachment();
            $attachment->filename = $filename;
            $attachment->message()->associate($message)->save();
        }

        return redirect()->route('message.index')->with('message', 'ابلاغیه مورد نظر شما ارسال شد.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Message $message): View
    {

        $this->authorize('related', $message);

        if ($message->status == 1) {
            $message->status = 0;
            $message->save();
        }
        return view('dashboard.messages.show', compact('message'));
    }

    public function download(Attachment $file)
    {
        return Storage::download("files/" . (explode('.', $file->filename))[0] . '/' . $file->filename);
    }


    public function workflow(Message $message)
    {
        $replies = $message->replies;
        return view('dashboard.messages.workflow', compact('message', 'replies'));
    }

    public function reply(Request $request, Message $message)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'type' => 'required|min:3',
            'body' => 'required|min:3'
        ]);

        $reply = new Reply();
        $reply->body = $request->input('body');
        $reply->type = $request->input('type');
        $reply->name = $request->input('name');
        $reply->user_id = auth()->id();
        $reply->message_id = $message->id;
        $reply->save();


        return redirect()->route('message.index')->with('message', 'ارجاغ مورد نظر شما ثبت شد.');
    }
}

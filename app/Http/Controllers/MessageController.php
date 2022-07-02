<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Message;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isInstanceOf;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        $messages =auth()->user()->messages('to')->latest()->paginate(10);
        return view('dashboard.messages.inbox',compact('messages'));
    }

    public function sent()
    {
        $messages = auth()->user()->messages('user_id')->latest()->paginate(10);
        return view('dashboard.messages.inbox',compact('messages'));
    }

    public function read(Message $message)
    {

        if ($message->status == 1) {
            $message->status = 0 ;
            $message->save();
        }
        return view('dashboard.messages.read',compact('message'));
    }

    public function check(Reply $reply)
    {
        $message = $reply;
        return view('dashboard.messages.read',compact('message'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function write()
    {
        return view('dashboard.messages.write');
    }

    public function create(Request $input)
    {

        Validator::make($input->all(), [
            'subject' => ['required', 'string', 'max:55'],
            'body' => [
                'required',
                'string',
            ],
            'to'=>['required','string'],
            'your_file_input' => ['file','size:32000'],
        ])->validateWithBag('createNewMessage');

        $message = new Message();
        $message->forceFill([
            'user_id'=>auth()->user()->id,
            'subject'=>$input->subject,
            'body'=>$input->body,
            'to'=>User::where('name',$input->to)->first()->id
        ])->save();

        if ($input->attachment != null){
            $uploadedFile = $input->file('attachment');
            $folder = time().(explode('.',$uploadedFile->getClientOriginalName())[0]);
            $filename = time().$uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs('files/'.$folder,$uploadedFile,$filename);
            $attachment = new Attachment();
            $attachment->filename =$filename;
            $attachment->message()->associate($message)->save();

        }
        return redirect()->route('inbox');
    }

    public function download(Attachment $file)
    {
        return Storage::download("files/".(explode('.',$file->filename))[0].'/' . $file->filename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function workflow(Message $message)
    {
        $replies = $message->replies;
        return view('dashboard.messages.workflow',compact('message','replies'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        $messages =auth()->user()->messages('to')->get();
        $unread = $this->unread($messages);
        return view('dashboard.messages.inbox',compact('messages','unread'));
    }

    public function sent()
    {
        $messages = auth()->user()->messages('user_id')->get();
        $unread = $this->unread(auth()->user()->messages('to')->get());
        return view('dashboard.messages.inbox',compact('messages','unread'));
    }

    public function unread($messages)
    {
        $unread = 0;
        foreach ($messages as $message){$message->status ==1? $unread++: $unread;}
        return $unread;
    }

    public function read(Message $message)
    {
        if ($message->status == 1) {
            $message->status = 0 ;
            $message->save();
        }
        $unread = $this->unread(auth()->user()->messages('user_id')->get());
        return view('dashboard.messages.read',compact('message','unread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function write()
    {

        $unread = $this->unread(auth()->user()->messages('user_id')->get());
        return view('dashboard.messages.write',compact('unread'));
    }

    public function create(Request $input)
    {
        Validator::make($input->all(), [
            'subject' => ['required', 'string', 'max:55'],
            'body' => [
                'required',
                'string',
            ],
            'to'=>['required','integer']
        ])->validateWithBag('createNewMessage');

        $message = new Message();
        $message->forceFill([
            'user_id'=>auth()->user()->id,
            'subject'=>$input->subject,
            'body'=>$input->body,
            'to'=>$input->to
        ])->save();
        return $message;
//        $message = new Message();
//
//        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

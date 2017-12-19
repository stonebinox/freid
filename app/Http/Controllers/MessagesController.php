<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\NewMessageEmail;

class MessagesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function view($id)
    {
        $conversation = Conversation::find($id);
        $messages = Message::where('conversation_id', $id)->get();
        if ($messages->last()->user_id != Auth::user()->id) {
            foreach($messages as $m) {
                $m->read = 1;
                $m->save();
            }
        }
        return view('messages.view', compact('messages', 'conversation'));
    }

    public function respond($id, Request $request)
    {
        Message::create([
            'conversation_id'   => $id,
            'user_id'           => Auth::user()->id,
            'message'           => $request->message,
            'read'              => 0,
        ]);
        
        $conversation = Conversation::find($id);
        if ($conversation->user1_id == Auth::user()->id) {
            $receiver = $conversation->user2_id;
        } else {
            $receiver = $conversation->user1_id;
        }

        $notification = Notification::create([
            'sender_id'         => Auth::user()->id,
            'receiver_id'       => $receiver,
            'conversation_id'   => $id,
            'read'              => 0,
        ]);

        $data = ['notification' => $notification];
        \Mail::to($notification->receiver->email)->send(new NewMessageEmail($data));

        return redirect()->back();
    }
}

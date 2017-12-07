<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

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

        return redirect()->back();
    }
}

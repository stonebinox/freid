<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function getConversation($id)
    {
        $conversation = Conversation::where('closed', 0)
                                    ->where('user1_id', Auth::user()->id)
                                    ->where('user2_id', $id)
                                    ->first();
        
        if ($conversation == NULL) {
            return redirect()->route('create_conversation');
        }
        return redirect()->route('view_conversation', ['id' => $conversation->id]);
    }

    public function create($id, Request $request)
    {
        $method = $request->isMethod('post');
        switch($method){
            case true:
                $conversation = Conversation::create([
                    'user1_id'      => Auth::user()->id,
                    'user2_id'      => $id,
                    'subject'       => $request->subject,
                ]);

                $message = Message::create([
                    'conversation_id'   => $conversation->id,
                    'user_id'           => Auth::user()->id,
                    'message'           => $request->message,
                ]);

                return redirect()->route('view_conversation', ['id' => $conversation->id]);
            default:
                $user = User::find($id);
                return view('messages.new', compact('user'));
        }
    }

    public function close($id)
    {
        $conversation = Conversation::find($id);
        if (Auth::user()->id != $conversation->user1_id || Auth::user()->id != $conversation->user2_id)
        {
            return redirect()->route('welcome');
        }
        
        $conversation->closed = 1;
        $conversation->save();

        return redirect()->back();
    }

    public function view()
    {
        $open = Conversation::where('closed', 0)->paginate(10);
        $closed = Conversation::where('closed', 1)->paginate(10);
        return view('conversations.view', compact('open', 'closed'));
    }

}

<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function to_conversation($id, $n_id)
    {
        $notification = Notification::find($n_id);

        $notification->read = 1;
        $notification->save();

        return redirect()->route('view_conversation', ['id' => $id]);
    }
}

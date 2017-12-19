<?php

function get_user_notification()
{
   return \App\Models\Notification::where('receiver_id', \Auth::user()->id)
                                   ->where('read', 0)
                                   ->limit(5)
                                   ->get();
}
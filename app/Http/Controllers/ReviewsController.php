<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create_review($id, Request $request)
    {
        $method = $request->isMethod('post');
        $user = User::find($id);

        switch($method)
        {
            case true:
                $request->validate([
                    'review'    => 'required'
                ]);
                Review::create([
                    'user_id'   => Auth::user()->id,
                    'expert_id' => $user->id,
                    'review'    => $request->review,
                ]);

                return redirect()->route('view_profile', ['id' => $user->id]);
            default:
                return view('reviews.create', compact('user'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome', 'search');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $notifications = get_user_notification();
        // dd($notifications);

        $experts = User::where('profile_type', 1)
                        ->where('active', 1)
                        ->where('headline', '!=', null)
                        ->where('skills', '!=', null)
                        ->paginate(6);
        return view('welcome', compact('experts', 'notifications'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $experts = User::whereRaw("find_in_set('$request->s',skills) > 0")
                        ->where('headline', '!=', null)
                        ->where('profile_type', 1)
                        ->where('active', 1)
                        ->paginate(6);
        $search = $request->s;
        return view('search', compact('experts', 'search'));
    }
}

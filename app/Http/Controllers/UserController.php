<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function profileType(Request $request)
    {
        $method = $request->isMethod('post');

        switch($method){
            case true:
                if ($request->profile_type == '1'){
                    $user = User::find(Auth::user()->id);
                    
                    $user->profile_type = 1;
                    $user->save();
                    
                    return redirect()->route('expert_info');
                } else {
                    return redirect()->route('welcome');
                }
            default:
                return view('users.profile_type');
        }
    }

    public function expertInfo(Request $request)
    {
        $method = $request->isMethod('post');

        switch($method){
            case true:
                $request->validate([
                    'skills'        => 'required',
                    'headline'      => 'required',
                    'description'   => 'required',
                ]);


                $user = User::find(Auth::user()->id);

                $user->skills       = $request->skills;
                $user->headline     = $request->headline;
                $user->description  = $request->description;
                $user->save();

                return redirect()->route('welcome');
            default:
                return view('users.expert_info');
        }
    }

    public function editProfile(Request $request)
    {
        $method = $request->isMethod('post');
        $user = User::find(Auth::user()->id);

        switch($method){
            case true:
                $user->name             = $request->name;
                $user->headline         = $request->headline;
                $user->description      = $request->description;
                $user->skills           = $request->skills;
                $user->save();

                return redirect()->back();
            default:
                return view('users.edit_profile', compact('user'));
        }
    }

    public function becomeExpert()
    {
        $user = User::find(Auth::user()->id);
        
        $user->profile_type = 1;
        $user->save();

        return redirect()->route('expert_info');
    }

    public function viewProfile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

}

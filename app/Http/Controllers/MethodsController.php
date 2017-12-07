<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function paypal(Request $request)
    {
        $method = $request->isMethod('post');
        $user = User::find(Auth::user()->id);
        $paypal = Method::where('user_id', Auth::user()->id)->first();
        switch($method) {
            case true:
                $request->validate([
                    'paypal'    => 'required',
                ]);
                Method::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['email' => $request->paypal]
                );
                return redirect()->back();
            default:
                return view('methods.paypal', compact('user', 'paypal'));
        }
    }
}

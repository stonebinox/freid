<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findUser($user);
        if ($authUser != NULL) {
            Auth::login($authUser, true);
            return redirect()->route('welcome');
        } else {
            $newUser = $this->createUser($user);
            Auth::login($newUser, true);
            return redirect()->route('profile_type');
        }        
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findUser($user)
    {
        return User::where('provider_id', $user->id)->first();      
    }

    public function createUser($user)
    {
        return User::create([
            'name'          => $user->name,
            'email'         => $user->email,
            'image'         => $user->avatar,
            'provider'      => 'facebook',
            'provider_id'   => $user->id
        ]);
    }
}

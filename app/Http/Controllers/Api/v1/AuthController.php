<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Models\User;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::drive('google')->user();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::drive('facebook')->user();

        $this->registerOrLoginUser($user);

        return 'success';
    }

    protected function registerOrLoginUser($data)
    {
        $user = User::where('email',$data->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

//        Auth::login($user);
        return $user;
    }
}

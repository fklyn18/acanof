<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Descripción: Iniciar sesion con facebook
     *      - Una vez seleccionen el boton login con facebook
     * @return mixed
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
//        $user = Socialite::driver('facebook')->fields([
//            'first_name', 'last_name', 'email', 'gender'
//        ])->user();
        // stroing data to our use table and logging them in
//        $data = [
//            'name' => $user->getName(),
//            'first_name' => $user->getName(),
//            'email' => $user->getEmail()
//        ];

        //after login redirecting to home page
        dd($user);
        echo '<figure><img src="'.($user->getAvatar()).'"></figure>';
//        return ($user->getAvatar());
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        dd($user);
//        return Socialite::driver('google')->redirect();
    }
}

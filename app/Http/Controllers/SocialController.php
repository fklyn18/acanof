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
    public function fredirect()
    {
        return Socialite::driver('facebook')->redirect();
//        return Socialite::driver('facebook')->fields([
//            'first_name', 'last_name', 'email', 'gender'
//        ])->scopes([
//            'email'
//        ])->redirect();
    }

    public function fcallback()
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
}

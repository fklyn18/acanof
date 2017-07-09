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
        dd($user);
//        return ($user->getAvatar());
    }
    /**
     * Descripción: Iniciar sesion con google
     *      - Una vez seleccionen el boton login con google
     * @return mixed
     */
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

    /**
     * Descripción: Iniciar sesion con google
     *      - Una vez seleccionen el boton login con google
     * @return mixed
     */
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function linkedinCallback()
    {
        $user = Socialite::driver('linkedin')->user();
        dd($user);
//        return Socialite::driver('google')->redirect();
    }
}

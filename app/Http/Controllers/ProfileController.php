<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Model\Profiles;

class ProfileController extends Controller
{
    /**
     * @description return a view intial
     * @return mixed
     */
    public function index()
    {
        $action = '';
        // Validate if a stored user profile exists to edit but store new
        if (count(Profiles::getProfile(Auth::user()->id)->get()) > 0){
            $action = 'edit-profile';
        }else{
            $action = 'store-profile';
        }
        return View::make('manage.data', ['action'=>$action])->withTitle('Profiles.');
    }


    public function profiles(){
        dd(Profiles::getAllProfiles()->get());
    }

    public function store(Request $request)
    {
//        dd($request->all());
        return $this->validate($request, [
            'title' => 'required|max:5',
            'bio' => 'required|max:5'
        ]);

        // The blog post is valid, store in database...
    }
}

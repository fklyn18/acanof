<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        dd($request->all()['title']);
        // validate fields
        $this->rulesOfValidation($request);
        // create a object to store in DB
        $profile = new Profiles();
        $profile->iduser = Auth::user()->id;
        $profile->title = $request->all()['title'];
        $profile->bio = $request->all()['bio'];
    }

    /**
     * @description rules to validate fields
     * @param $request
     */
    private function rulesOfValidation($request){
        $rules = [
            'title' => 'required|max:50|min:3',
            'bio' => 'required|max:300|min:3',
        ];
        // validate if idioma is english
        if (session('locale') == 'en'){
            $this->validate($request, $rules);
        }elseif(session('locale') == 'es'){
            $messages = [
                'title.required' => 'El título no puede ser mayor de 5 caracteres.',
                'title.min' => 'El título debe tener al menos 3 caracteres.',
                'title.max' => 'El título no puede ser mayor de 50 caracteres.',
                'bio.required' => 'El campo de la biología es obligatorio.',
                'bio.min' => 'La bio debe tener al menos 3 caracteres.',
                'bio.max' => 'La bio debe tener menos 300 caracteres.',
            ];
            $this->validate($request, $rules, $messages);
        }
    }
}

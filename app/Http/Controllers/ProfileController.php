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
        $button = '';
        $title = '';
        $bio = '';
        // consult user profile
        $profile = Profiles::getProfile(Auth::user()->id)->get();
//        $profile = Profiles::find(Auth::user()->id);
//        dd($profile[0]->title);
//        dd($profile[0]->bio);
        // Validate if a stored user profile exists to edit but store new
        if (count($profile) > 0){
            $action = 'edit-profile';
            $button = __('Edit');
            $title = $profile[0]->title;
            $bio = $profile[0]->bio;
        }else{
            $action = 'store-profile';
            $button = __('Save');
        }
        return View::make('public.profile.list', [
            'action'=>$action,
            'button'=>$button,
            'titlevalue'=>$title,
            'biovalue'=>$bio,
        ])->withTitle('Profiles.');
    }

    public function profiles(){
        dd(count(Profiles::getProfile(Auth::user()->id)->get()));
        dd(Profiles::getAllProfiles()->get());
    }

    /**
     * @description store a profile
     * @param Request $request
     */
    public function store(Request $request)
    {
        // declaration form variables
        $type = 'msj_success';
        $message = null;
        // validate fields
        $this->rulesOfValidation($request);
        // create a object to store in DB
        $profile = new Profiles();
        $profile->iduser = Auth::user()->id;
        $profile->title = $request->all()['title'];
        $profile->bio = $request->all()['bio'];
        $profile->save();

        // validate if return a identifier from profile to prepare message
        if (!empty($profile->id)){
            $message = __('validation.messages.saved', ['name'=>'profile']);
        }else{
            $type = 'msj_danger';
            $message = __('validation.messages.failed_save', ['name'=>'profile']);
        }
        return redirect(route('profile'))->with($type, $message);
    }

    public function update(Request $request){
        // validate fields
        $this->rulesOfValidation($request);
        // update register
        $profile = Profiles::find($request->all()['idreg']);
        $profile->name = $request->all()['name'];
        $profile->bio = $request->all()['bio'];
        $profile->save();
        return redirect('profile');
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
        $this->validate($request, $rules);
    }
}

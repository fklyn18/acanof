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
        // Validate if a stored user profile exists to edit but store new
        if (count(Profiles::getProfile(Auth::user()->id)->get()) > 0){
            $action = 'edit-profile';
            $button = __('Edit');
        }else{
            $action = 'store-profile';
            $button = __('Save');
        }
        return View::make('public.profile.list', ['action'=>$action, 'button'=>$button])->withTitle('Profiles.');
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
        $class = 'success';
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
            $class = 'danger';
            $message = __('validation.messages.failed_save', ['name'=>'profile']);
        }
        return redirect(route('profile'))->with($class, $message);
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

<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use App\User;
use App\UserImage;
use App\UserProfile;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RegisterController extends Controller
{
    public function register_view(){
        return view('influencer.register');
    }
    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'check' => 'accepted'
        ]);

        $inf = new User();
        $inf->username = $request->username;
        $inf->email = $request->email;
        $inf->password = bcrypt($request->password);
        $inf->save();

        return view('influencer.profile',compact('inf'));
    }
    public function profile(Request $request){

        $request->validate([
           'first_name' => 'required',
           'last_name' => 'required',
           'gender' => 'required',
           'profile_image' => 'required',
            'cnic_front' => 'required',
            'cnic_back' => 'required',
            'uid' => 'required'
        ]);

        $user_profile = new UserProfile();
        $user_profile->first_name = $request->first_nmae;
        $user_profile->laset_name = $request->last_nmae;
        $user_profile->gender= $request->gender;
        $user_profile->type = Config::get('constants.CONSTANTS.INFLUENCER');


        $images = array();
        $images['profile_image'] = $request->profile_image;
        $images['cnic_front'] = $request->cnic_front;
        $images['cnic_back'] = $request->cnic_back;


        foreach ($images as $key => $value){
            $user_profile =  new UserImage();

        }
        die();
    }

    public function images(){

    }
}

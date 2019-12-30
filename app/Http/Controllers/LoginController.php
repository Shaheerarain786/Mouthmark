<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use mysql_xdevapi\Session;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->with('roles')->first();
        if (isset($user) || !empty($user)) {
            if (Hash::check($request->password, $user->password)) {
                $user->remember_token = Str::uuid();
                $user->save();
                Auth::login($user);

                return redirect('/')->with("success", Config::get("constants.MESSAGES.LOGIN_SUCCESS"));
            } else {
                return back()->with("error", Config::get('constants.MESSAGES.PASSWORD_NOT_FOUND'));
            }
        } else {
            return back()->with("error", Config::get("constants.MESSAGES.INVALID_EMAIL"));
        }
    }

    public function logout()
    {
        if (Auth::check() == true) {
            Auth::logout();
            return redirect('login');
        }
    }
}

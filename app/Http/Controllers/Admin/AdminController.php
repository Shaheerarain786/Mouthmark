<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\RolePersmission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1){
            $admins = User::where('role_id',"!=",null)->with("roles")->get();
        }
        else{
            $admins = User::where('role_id', "!=", "1")->where('role_id', '!=', null)->with("roles")->get();
        }
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if (User::where('email', $request->email)->exists()) {
            return back()->with("error", Config::get('constants.MESSAGES.EMAIL_EXIST'));
        } else {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->save();

            return redirect('admins')->with("success", $request->username . " " . Config::get('constants.MESSAGES.CREATED_SUCCESSFULLY'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $edit_user = User::find($id);
        return view('admin.admins.edit', compact('edit_user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('admins')->with("success", Config::get('constants.MESSAGES.SUCCESS_UPDATED'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return back('admins')->with("success", Config::get('constants.MESSAGES.DELETED_SUCCESSFULLY'));
    }
}

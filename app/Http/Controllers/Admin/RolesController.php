<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Persmission;
use App\Role;
use App\RolePersmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        $permissions = Persmission::all();
        return view('admin.roles.create',compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'required'
        ]);

        $role = new Role();
        $role->role = $request->role;
        $role->save();

        foreach ($request->permissions as $key => $value){
            $permissions = new RolePersmission();
            $permissions->role_id = $role->id;
            $permissions->persmission_id = $value;
            $permissions->save();
        }

        return redirect('roles')->with("success",Config::get('constants.MESSAGES.CREATED_SUCCESSFULLY'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = RolePersmission::where('role_id',$id)->get();
        foreach ($permissions as $per){
            $per->permission_name = Persmission::find($per->persmission_id)->name;
        }
        return view('admin.roles.edit',compact('role','permissions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required'
        ]);

        $role = Role::find($id);
        $role->role = $request->role;
        $role->save();

        return redirect('roles')->with("success",Config::get('constants.MESSAGES.UPDATED_SUCCESSFULLY'));
    }


    public function destroy($id)
    {
        if(isset($id)) {
            Role::find($id)->delete();
            return back()->with("success",Config::get('constants.MESSAGES.DELETED_SUCCESSFULLY'));
        }
    }

    public function permissions($id){
        $permissions = Persmission::all();
        $role_id = $id;
        return view('admin.permissions.index',compact('role_id','permissions'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks_count = array();
        $influencer_count = array();
        $advertiser_count = array();

        $tasks_count['total'] = Task::all()->count();
        $tasks_count['tasks_pending'] = Task::where('status','pending')->count();
        $tasks_count['task_completed'] = Task::where('status','completed')->count();
        $tasks_count['task_approved'] = Task::where('status','approved')->count();
        $tasks_count['task_discard'] = Task::where('status','discard')->count();
        $tasks_count['today'] = Task::where('created_at',Carbon::today())->count();

        $users = User::all()->count();
        $admins = User::where('role_id','2')->count();
        $super_admins = User::where('role_id','1')->count();

        $influencer_count['total'] = User::where('type','influencer')->count();
        $influencer_count['inf_pending'] = User::where('type','influencer')->where('account_status','pending')->count();
        $influencer_count['inf_approved'] = User::where('type','influencer')->where('account_status','approved')->count();

        $advertiser_count['total'] = User::where('type','advertiser')->count();
        $advertiser_count['adv_pending'] = User::where('type','advertiser')->where('account_status','pending')->count();
        $advertiser_count['adv_approved'] = User::where('type','advertiser')->where('account_status','approved')->count();

        return view('admin.dashboard.index',compact('tasks_count','influencer_count','advertiser_count','users','admins','super_admins'));
    }


    public function create()
    {
        return view('admin.dashboard.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $dup_email = $this->email_exist($request->email);
        if ($dup_email == true) {
            return back()->with("error","Email Already Exists");
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = "user";
            $user->reference_token = Str::uuid();
            $user->email_verified_at = Str::uuid();
            $user->is_email_verified = 1;
            $user->save();

            return redirect('')->with("success","user created successfully");
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $edit_users = User::find($id);
        return view('admin.dashboard.edit',compact('edit_users'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('')->with("success","updated successfully");
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with("sucess","deleted successfully");
    }
    public function email_exist($email)
    {
        if (User::where('email', $email)->exists()) {
            return true;
        } else {
            return false;
        }
    }
}

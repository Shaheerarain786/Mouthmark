<?php

namespace App\Http\Controllers\Admin\Trash;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    public function index(){
        $inf = User::where('type','influencer')->where('is_deleted',true)->get();

        return view('admin.trash.users.influencer.index',compact('inf'));
    }

    public function recycle_inf($id){
        $user = User::find($id);
        $user->is_deleted = false;
        $user->save();

        return back()->with("success","Restore Successfully");
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with("success", "deleted successfully");
    }
}

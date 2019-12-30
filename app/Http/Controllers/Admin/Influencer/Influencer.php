<?php

namespace App\Http\Controllers\Admin\Influencer;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Influencer extends Controller
{

    public function index()
    {
        $inf = User::where('type', 'influencer')->where('is_deleted',false)->get();
        return view('admin.influencer.index', compact('inf'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $inf = User::where('id', $id)->with(['user_images'])->first();
        return view('admin.influencer.detail', compact('inf'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $user = User::find($id);
        $user->account_status = $request->status;
        $user->save();

        return redirect('users/influencer')->with("success", "Status changes successfully");
    }


    public function destroy($id)
    {
        //
    }

    public function discard($id)
    {
        $user = User::find($id);
        $user->is_deleted = true;
        $user->save();

        return back()->with("success","Deleted Successfully");
    }

    public function payment_detail_view($id){

        return view('admin.influencer.payment');

    }
}

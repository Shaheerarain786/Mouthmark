<?php

namespace App\Http\Controllers\Admin\Advertiser;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class Advertiser extends Controller
{

    public function index()
    {
        $inf = User::where('type','advertiser')->where('is_deleted',false)->get();
        return view('admin.advertiser.index',compact('inf'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::where('id',$id)->where('type','advertiser')->with(['advertiser_profile','advertiser_company_detail'])->first();
//        dd($user);
        return view('admin.advertiser.detail',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(),[
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        }
        else{
            $user = User::find($id);
            $user->account_status =  $request->status;
            $user->save();

            return redirect('users/advertiser/')->with("success","updated successfully");
        }
    }


    public function destroy($id)
    {
        //
    }

    public function status($id){

        $user = User::find($id);
        $user->account_status = "approved";
        $user->save();

        return back()->with("success",Config::get("constants.MESSAGES.SUCCESS_UPDATED"));
    }
    public function status_chnage($id){

        $user = User::find($id);
        $user->account_status = "pending";
        $user->save();

        return back()->with("success",Config::get("constants.MESSAGES.SUCCESS_UPDATED"));
    }

    public function discard($id)
    {
        $user = User::find($id);
        $user->is_deleted = true;
        $user->save();

        return back()->with("success","Deleted successfully");
    }
    public function payment_detail_view($id){
        return view('admin.advertiser.payment');
    }
}

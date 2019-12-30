<?php

namespace App\Http\Controllers\Admin\Trash;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $inf = User::where('type', 'advertiser')->where('is_deleted', true)->get();

        return view('admin.trash.users.advertiser.index', compact('inf'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->where('type', 'advertiser')->with(['advertiser_profile', 'advertiser_company_detail'])->first();

        return view('admin.trash.users.advertiser.detail', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        } else {
            $user = User::find($id);
            $user->account_status = $request->status;
            $user->save();

            return redirect('users/advertiser/')->with("success", "updated successfully");
        }
    }


    public function destroy($id)
    {
        //
    }

    public function status($id)
    {

        $user = User::find($id);
        $user->account_status = "approved";
        $user->save();

        return back()->with("success", Config::get("constants.MESSAGES.SUCCESS_UPDATED"));
    }

    public function status_chnage($id)
    {

        $user = User::find($id);
        $user->account_status = "pending";
        $user->save();

        return back()->with("success", Config::get("constants.MESSAGES.SUCCESS_UPDATED"));
    }

    public function recycle($id)
    {
        $user = User::find($id);
//        $user->account_status = "pending";
        $user->is_deleted = false;
        $user->save();

        return back()->with("success", "updated successfully");
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with("success", "deleted successfully");
    }
}

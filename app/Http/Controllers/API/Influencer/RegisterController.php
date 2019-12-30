<?php

namespace App\Http\Controllers\API\Influencer;

use App\Country;
use App\Http\Controllers\Controller;
use App\InfluencerPaymentDetail;
use App\User;
use App\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'access_token' => 'required',
            'type' => 'required',
            'full_name' => 'required',
            'profile_picture' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        }

        $user = new User();
        $user->username = $request->username;
        $user->type = $request->type;
        $user->access_token = $request->access_token;
        $user->account_status = Config::get('constants.CONSTANTS.PENDING');
        $user->remember_token = Str::uuid();
        $user->full_name = $request->full_name;
        $user->profile_picture = $request->profile_picture;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => Config::get('constants.MESSAGES.USER_SUCCESS'),
            'data' => $user
        ]);
    }

    public function verification(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'front_image' => 'required',
            'back_image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages()
            ]);
        } else {
            if ($request->hasFile('front_image')) {
                $file = $request->file('front_image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $picture = date('His') . $filename;
                $destinationPath = public_path() . '/images/uploads';
                $file->move($destinationPath, $picture);
                $cnic_front = url('/images/uploads') . '/' . $picture;
            }
            if ($request->hasFile('back_image')) {
                $file = $request->file('back_image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $picture = date('His') . $filename;
                $destinationPath = public_path() . '/images/uploads';
                $file->move($destinationPath, $picture);
                $cnic_back = url('/images/uploads') . '/' . $picture;
            }

            $user_images = new UserImage();
            $user_images->user_id = $request->uid;
            $user_images->cnic_front = $cnic_front;
            $user_images->cnic_back = $cnic_back;
            $user_images->save();

            return response()->json([
                'status' => true,
                'message' => Config::get('constants.MESSAGES.SAVED_SUCCESS'),
                'data' => $user_images
            ]);
        }
    }

    public function check_login_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'remember_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages()
            ]);
        } else {
            if ($request->remember_token != "null") {
                $if_exists = User::where('remember_token', $request->remember_token)->exists();
                if ($if_exists) {
                    $user = User::where('remember_token', $request->remember_token)->first();

                    if ($user->status == Config::get('constants.CONSTANTS.PENDING')) {
                        return response()->json([
                            'status' => true,
                            'message' => Config::get('constants.CONSTANTS.PENDING'),
                            'data' => null
                        ]);
                    } else if ($user->status == Config::get('constants.CONSTANTS.APPROVED')) {
                        return response()->json([
                            'status' => true,
                            'message' => Config::get('constants.CONSTANTS.APPROVED'),
                            'data' => $user
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => Config::get('constants.MESSAGES.USER_NOT_EXISTS'),
                    'data' => null
                ]);
            }
        }
    }

    public function uploads(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(' ', '', $filename);
            $picture = date('His') . $filename;
            $destinationPath = public_path() . '/images/uploads';
            $file->move($destinationPath, $picture);
            $filePath = url('/images/uploads') . '/' . $picture;
            return response()->json(["url" => $filePath]);
        } else {
            abort(400, "File not found");
        }
    }

    public function countries()
    {
        $countries = Country::all();
        return response()->json([
            'status' => true,
            'message' => Config::get('constants.MESSAGES.SUCCESS'),
            'data' => $countries
        ]);
    }

    public function payment_detail(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'card_type' => 'required',
                'card_holders_name' => 'required',
                'card_billing_address' => 'required',
                'card_billing_zip_code' => 'required',
                'card_no' => 'required',
                'card_expiry' => 'required',
                'ccv' => 'required'
            ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        } else {
            $payment = new InfluencerPaymentDetail();
            $payment->user_id = $request->user_id;
            $payment->card_type = $request->card_type;
            $payment->card_holders_name = $request->card_holders_name;
            $payment->card_billing_address = $request->card_billing_address;
            $payment->card_billing_zip_code = $request->card_billing_zip_code;
            $payment->card_no = $request->card_no;
            $payment->card_expiry = $request->card_expiry;
            $payment->ccv = $request->ccv;
            $payment->save();

            return response()->json([
                'status' => true,
                'message' => "Account Status Pending",
                'data' => $payment
            ]);
        }
    }

}

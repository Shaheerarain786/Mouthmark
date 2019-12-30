<?php

namespace App\Http\Controllers\API\Advertiser;

use App\AdvertiserCompanyDetail;
use App\AdvertiserPaymentDetail;
use App\AdvertiserProfile;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password_confirmation' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->getmessages(),
                'data' => null
            ]);
        }

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Email already exists',
                'data' => null
            ]);
        } else {
            $user = new User();
            $user->full_name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::uuid();
            $user->account_status = Config::get('constants.CONSTANTS.PENDING');
            $user->type = Config::get('constants.CONSTANTS.ADVERTISER');
            $user->username = $this->generate_username($request->name);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => Config::get('constants.MESSAGES.USER_SUCCESS'),
                'data' => User::find($user->id)
            ]);
        }
    }

    public function verfication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'remember_token' => 'required',
            'front_image' => 'required',
            'back_image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->getmessages()
            ]);
        } else {
            return $request->all();
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
                'message' => $validator->getmessages()
            ]);
        } else {
            if ($request->remember_token != "null") {
                $if_exists = User::where('remember_token', $request->remember_token)->exists();
                if ($if_exists) {
                    $user = User::where('remember_token', $request->remember_token)->first();

                    if ($user->account_status == Config::get('constants.CONSTANTS.PENDING')) {
                        return response()->json([
                            'status' => true,
                            'message' => Config::get('constants.CONSTANTS.PENDING'),
                            'data' => null
                        ]);
                    } else if ($user->account_status == Config::get('constants.CONSTANTS.APPROVED')) {
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

    public function company_detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'company_email' => 'required',
            'company_location' => 'required',
            'company_phone_number' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages()
            ]);
        } else {
            $adv_comp_detail = new AdvertiserCompanyDetail();
            $adv_comp_detail->user_id = $request->user_id;
            $adv_comp_detail->company_name = $request->company_name;
            $adv_comp_detail->designation = $request->designation;
            $adv_comp_detail->company_email = $request->company_email;
            $adv_comp_detail->company_location = $request->company_location;
            $adv_comp_detail->company_phone_number = $request->company_phone_number;
            $adv_comp_detail->save();

            return response()->json([
                'status' => true,
                'message' => Config::get('constants.MESSAGES.SAVED_SUCCESS'),
                'data' => $adv_comp_detail
            ]);
        }
    }

    public function logout(Request $request)
    {
        if ($request->uid || $request->remember_token) {
            User::where('id', $request->uid)->orWhere('remember_token', $request->remember_token)->update(
                [
                    'remember_token' => null
                ]
            );
            return response()->json([
                'status' => true,
                'message' => Config::get('constants.MESSAGES.LOGED_OUT'),
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => Config::get('constants.MESSAGES.USER_NOT_EXISTS'),
                'data' => null
            ]);
        }
    }

    public function profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'stauts' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        } else {
            $adv_profile = new AdvertiserProfile();
            $adv_profile->user_id = $request->user_id;
            $adv_profile->first_name = $request->first_name;
            $adv_profile->last_name = $request->last_name;
            $adv_profile->gender = $request->gender;
            $adv_profile->age = $request->age;
            $adv_profile->country = $request->country;
            $adv_profile->save();

            return response()->json([
                'stauts' => true,
                'message' => 'Saved Successfully',
                'data' => $adv_profile
            ]);
        }
    }

    public function profile_image_uploads(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'profile_image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        } else {
            $user = User::find($request->id);
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $picture = date('His') . $filename;
                $destinationPath = public_path() . '/images/uploads';
                $file->move($destinationPath, $picture);
                $filePath = url('/images/uploads') . '/' . $picture;
                $user->profile_picture = $filePath;
                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => 'profile image updated successfully',
                    'data' => $filePath
                ]);
            } else {
                abort(400, "File not found");
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required'
            ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
                'data' => null
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {

            if (empty($user->remember_token)) {

                if (Hash::check($request->password, $user->password)) {
                    User::where('email', $request->email)->update([
                        'remember_token' => Str::uuid()
                    ]);

                    return response()->json([
                        'status' => true,
                        'message' => 'Login Successfully',
                        'data' => User::find($user->id)
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid Password',
                        'data' => null
                    ]);
                }

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Already Login',
                    'data' => null
                ]);
            }

        } else {
            return response()->json([
                'status' => false,
                'message' => "Invalid E-mail",
                'data' => null
            ]);
        }
    }
    public function generate_username($full_name){

        $string = str_replace(' ', '', $full_name);
        $rand = Str::random(3);
        $rand2 = rand(1,5);

        return $string . $rand . $rand2;
    }

    public function payment_detail(Request $request){
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
        }
        else{
            $payment = new AdvertiserPaymentDetail();
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

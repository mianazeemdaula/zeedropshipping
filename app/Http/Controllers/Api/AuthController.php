<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            // 'firebase_uid' => 'required',
        ]);
        $mobile = $request->mobile;
        if(substr($mobile, 0, 2) == '03'){
            $mobile = substr($mobile, 1);
            $mobile = '92'.$mobile;
        }
        $mobile = str_replace('+', '', $mobile);
        $user = User::where('mobile', $mobile)->first();
        if (! $user) {
            return response()->json(['email' => 'The provided credentials are incorrect.'], 204); 
        }
        if($request->has('fcm_token')){
            $user->fcm_token = $request->fcm_token;
            $user->save();
        }
        $token = $user->createToken('login')->plainTextToken;
        $data['token'] = $token;
        $data['user'] = $user;
        return response()->json($data, 200);
    }

    public function isMobileRegister(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
        ]);
        $mobile = $request->mobile;
        if(substr($mobile, 0, 2) == '03'){
            $mobile = substr($mobile, 1);
            $mobile = '92'.$mobile;
        }
        $mobile = str_replace('+', '', $mobile);
        $user = User::where('mobile', $mobile)->first();
        if (! $user) {
            return response()->json(['message' => 'User not found'], 204); 
        }
        return response()->json(['message' => 'User found'], 200);
    }
}

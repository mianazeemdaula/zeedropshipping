<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = auth()->user()->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
        ]);
    }

    public function dashboard(Request $request){
        $user = request()->user();
        return response()->json([
            'orders' => $user->orders()->count(),
            'delivered' => $user->orders()->where('status', 'delivered')->count(),
            'pending' => $user->orders()->where('status', 'open')->count(),
            'user' => request()->user()->name,
        ]);
    }
}

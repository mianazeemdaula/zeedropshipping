<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Product;


class AuthController extends Controller
{
    public function signup()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.signup');
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withErrors(['password' => 'Invalid Credentials']);
    }

    public function postSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->country_id = 1;
        $user->save();
        // logint to the system after signup
        Auth::login($user);
        $user->assignRole('vendor');
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function dashboard()  {
        $user = Auth::user();
        if($user->hasRole('admin')){
            $stats = [
                'total_users' => User::count(),
                'total_team' => User::role('dispatcher')->count(),
                'total_vendors' => User::role('vendor')->count(),
                'total_orders' => Order::count(),
                'total_products' => Product::count(),
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','canceled'])->count(),
                'canceled_orders' => Order::where('status', 'canceled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
            ];
            return view('admin.dashboard', compact('stats'));
        }else if($user->hasRole('vendor')){
            $stats = [
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','canceled'])->count(),
                'canceled_orders' => Order::where('status', 'canceled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
                'total_orders' => Order::where('user_id', auth()->id())->count(),
                'total_sales' => Order::where('user_id', auth()->id())->sum('total'),
            ];
            return view('vendor.dashboard', compact('stats'));
        }
        return view('vendor.dashboard');
    }
}

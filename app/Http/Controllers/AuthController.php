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
            'accept_terms' => 'required|in:on'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->country_id = 1;
        $user->save();
        // logint to the system after signup
        Auth::login($user);
        $user->assignRole('dropshipper');
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
                'total_vendors' => User::role('dropshipper')->count(),
                'inreview_dropshippers' => User::role('dropshipper')->whereStatus('under-review')->count(),
                'total_active_dropshippers' => User::role('dropshipper')->where('status', 'active')->count(),
                'total_orders' => Order::count(),
                'total_products' => Product::count(),
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','canceled'])->count(),
                'canceled_orders' => Order::where('status', 'canceled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
            ];
            return view('admin.dashboard', compact('stats'));
        }else if($user->hasRole('dropshipper')){
            $stats = [
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','canceled'])->count(),
                'canceled_orders' => Order::where('status', 'canceled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
                'total_orders' => Order::where('user_id', auth()->id())->count(),
                'total_sales' => Order::where('user_id', auth()->id())->sum('total'),
            ];
            return view('vendor.dashboard', compact('stats'));
        }else if($user->hasRole('dispatcher') || $user->hasRole('shipper')){
            $stats = [
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','canceled'])->count(),
                'canceled_orders' => Order::where('status', 'canceled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
                'total_orders' => Order::count(),
            ];
            return view('dispatcher.dashboard', compact('stats'));
        }
        return view('vendor.dashboard');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = Auth::user();
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Password changed successfully');
        }
        return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect']);
    }
}

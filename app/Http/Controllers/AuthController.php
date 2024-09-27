<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

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
        // $user->status = 'under-review';
        $user->save();
        // logint to the system after signup
        Auth::login($user);
        $user->assignRole('dropshipper');
        event(new Registered($user));
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
                'inactive_dropshippers' => User::role('dropshipper')->whereHas('orders',function($q){
                    // less then 15 days old
                    $q->where('created_at', '>=', now()->subDays(15));
                })->count(),
                'total_orders' => Order::count(),
                'total_products' => Product::count(),
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','cancelled'])->count(),
                'canceled_orders' => Order::where('status', 'cancelled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
            ];
            return view('admin.dashboard', compact('stats'));
        }else if($user->hasRole('dropshipper')){
            $stats = [
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','cancelled'])->count(),
                'canceled_orders' => Order::where('status', 'cancelled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
                'total_orders' => Order::where('user_id', auth()->id())->count(),
                'total_sales' => Order::where('user_id', auth()->id())->sum('total'),
                'total_revenue' => \App\Models\VendorRevenue::where('user_id', auth()->id())->sum('amount'),
                'total_payments' => \App\Models\VendorRevenue::where('user_id', auth()->id())->where('status', 'paid')->sum('amount'),
            ];
            return view('vendor.dashboard', compact('stats'));
        }else if($user->hasRole('dispatcher') || $user->hasRole('shipper')){
            $stats = [
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','cancelled'])->count(),
                'canceled_orders' => Order::where('status', 'cancelled')->count(),
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

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', 'Email send for reset password')
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function postResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}

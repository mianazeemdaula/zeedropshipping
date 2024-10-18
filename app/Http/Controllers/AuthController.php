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
use Carbon\Carbon;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\UserKycDoc;
use Illuminate\Support\Facades\File;
use App\Models\Vendor;

class AuthController extends Controller
{
    public function signup()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $banks = \App\Models\Bank::orderBy('name')->get();
        return view('auth.signup',compact('banks'));
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
            'accept_terms' => 'required|in:on',

            'city_name' => 'required',
            'phone' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'store_url' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'store_logo' => 'nullable|image',
            'avatar' => 'nullable|image',
            'account_name' => 'required',
            'iban' => 'required',
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
        
        if($request->hasFile('avatar')) {
            $avatarName = time() . '_'.$user->id .".". $request->file('avatar')->getClientOriginalExtension();
            $user->avatar = $request->file('avatar')->storeAs('users', $avatarName);
            $user->save();
        }
        $vendorCount = Vendor::count() + 1;
        $dsNumber = $vendorCount > 1000 ? $vendorCount : 1000 + $vendorCount;
        $vendor = $user->vendor()->create([
            'phone' => $request->phone,
            'city_id' => 1,
            'business_name' => $request->business_name,
            'store_url' => $request->store_url,
            'address' => $request->address,
            'ds_number' => 'DS-'.$dsNumber,
            'city_name' => $request->city_name,
            'sale_level' => $request->sale_level,
            'last_sales' => $request->last_sales,
        ]);
        if($request->hasFile('store_logo')) {
            $logoName = time() . '_'.$vendor->id .".". $request->file('store_logo')->getClientOriginalExtension();
            $vendor->store_logo = $request->file('store_logo')->storeAs('vendors', $logoName);
            $vendor->save();
        }
        if($request->hasFile('cnic')) {
            $logoName = time() . '_'.$vendor->id .".". $request->file('cnic')->getClientOriginalExtension();
            $fileName = $request->file('cnic')->storeAs('vendors', $logoName);
            $kyc = UserKycDoc::where('user_id', $user->id)->where('kyc_doc_id',1)->first();
            if(!$kyc){
                $kyc = new UserKycDoc;
                $kyc->user_id = $user->id;
                $kyc->kyc_doc_id = 1;
                $kyc->file = $fileName;
                $kyc->save();
            }else{
                $kyc->file = $fileName;
                $kyc->status = 'pending';
                $kyc->save();
            }
        }
        $account = new BankAccount();
        $account->bank_id = $request->bank_id;
        $account->user_id = $user->id;
        $account->account_name = $request->account_name;
        $account->iban = $request->iban;
        $account->save();
        $user->status = 'under-review';
        $user->save();
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
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = Carbon::now()->subDays($i)->format('Y-m-d');
        }
        $dates = array_reverse($dates);
        if($user->hasRole('admin')){
            $chartOrders = [];
            $chartSales = [];
            $chartUsers = [];
            foreach($dates as $date){
                $key = Carbon::parse($date)->format('d');
                $chartOrders[$key] = Order::whereDate('created_at', $date)->count();
                $chartSales[$key] = Order::whereIn('status',['delivered'])->whereDate('created_at', $date)->sum('total');
                $chartUsers[$key] = User::whereDate('created_at', $date)->count();
            }
            $stats = [
                'chartOrders' => $chartOrders,
                'chartSales' => $chartSales,
                'chartUsers' => $chartUsers,
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
            $chartOrders = [];
            $chartSales = [];
            $chartPayments = [];
            foreach($dates as $date){
                $key = Carbon::parse($date)->format('d');
                $chartOrders[$key] = Order::where('user_id',auth()->id())->whereDate('created_at', $date)->count();
                $chartSales[$key] = Order::where('user_id',auth()->id())->whereIn('status',['delivered'])->whereDate('created_at', $date)->sum('total');
                $chartPayments[$key] = \App\Models\VendorRevenue::whereStatus('paid')->whereDate('created_at', $date)->count();
            }
            $stats = [
                'chartOrders' => $chartOrders,
                'chartSales' => $chartSales,
                'chartPayments' => $chartPayments,
                'open_orders' => Order::where('status', 'open')->count(),
                'intransit_orders' => Order::whereNotIn('status', ['open','cancelled'])->count(),
                'canceled_orders' => Order::where('status', 'cancelled')->count(),
                'dispatched_orders' => Order::where('status', 'dispatched')->count(),
                'total_orders' => Order::where('user_id', auth()->id())->count(),
                'total_sales' => Order::whereNotIn('status',['cancelled','open','packed','booked'])->where('user_id', auth()->id())->sum('total'),
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

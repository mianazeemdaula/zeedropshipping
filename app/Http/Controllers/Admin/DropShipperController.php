<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Helper\Helper;
class DropShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('dropshipper');
        if(request()->has('sort')){
            $param = Helper::sortParam(request()->sort);
            $users = $users->orderBy($param[0], $param[1]);
        }
        $users = $users->paginate();
        return view('admin.dropshippers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.dropshippers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.dropshippers.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string|in:active,inactive,under-review,blocked,unverified',
            'role' => 'required|string|exists:roles,name',
            'city_name' => 'required|string|max:255',
            'store_url' => 'nullable|string|max:255',
        ]);
        
        $user = User::find($id);
        $sendEmail = false;
        if($request->status != $user->status){
            $sendEmail = true;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->comment = $request->comment;
        $user->syncRoles([$request->role]);
        $user->save();
        if($user->vendor){
            $user->vendor->phone = $request->phone;
            $user->vendor->business_name = $request->business_name;
            $user->vendor->store_url = $request->store_url;
            $user->vendor->city_name = $request->city_name;
            $user->vendor->save();
        }
        if($sendEmail){
            Mail::to($user->email)->send(new \App\Mail\AccountStatus($user));
        }
        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }
        if($request->hasFile('avatar')){
            if(File::exists($user->avatar)){
                File::delete($user->avatar);
            }
            $logoName = time() . '_'.$user->id .".". $request->file('avatar')->getClientOriginalExtension();
            $user->avatar = $request->file('avatar')->storeAs('users', $logoName);
            $user->save();
        }
        return redirect()->route('admin.dropshippers.index')->with('success', 'Dropshipper updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showStatusUser(string $status)
    {
        if($status == 'all'){
            $users = User::where('id', '!=', auth()->id())->paginate();
        }else if($status == 'inreview'){
            $users = User::role('dropshipper')->where('status', 'under-review')->paginate();
        }else if($status == 'inactive'){
            $users = User::role('dropshipper')->where('status', 'inactive')->paginate();
        }else if($status == 'no-orders-inactive'){
            $users = User::role('dropshipper')->whereHas('orders', function($q){
                $q->where('created_at', '>=', now()->subDays(15));
            })->paginate();
        }else{
            $users = User::where('id', '!=', auth()->id())->paginate();
        }
        return view('admin.dropshippers.index', compact('users'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255'
        ]);
        $users = User::role('dropshipper')->where('name', 'like', '%'.$request->search.'%')
            ->orWhere('email', 'like', '%'.$request->search.'%')
            ->orWhere('mobile', 'like', '%'.$request->search.'%')
            ->orWhereHas('vendor', function($q) use($request){
                $q->where('business_name', 'like', '%'.$request->search.'%');
                $q->orWhere('address', 'like', '%'.$request->search.'%');
                $q->orWhere('ds_number', 'like', '%'.$request->search.'%');
                $q->orWhere('phone', 'like', '%'.$request->search.'%');
            })->paginate();
        return view('admin.dropshippers.index', compact('users'));
    } 

    public function export()
    {
        return (new \App\Exports\DropshipperExport)->download('dropshippers.xlsx');
    }
}

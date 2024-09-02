<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class DropShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('dropshipper')->paginate();
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
            'mobile' => 'nullable|string|max:20',
            'status' => 'required|string|in:active,inactive,under-review,blocked,unverified',
            'role' => 'required|string|exists:roles,name'
        ]);

        
        $user = User::find($id);
        $sendEmail = false;
        if($request->status != $user->status){
            $sendEmail = true;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->status = $request->status;
        $user->comment = $request->comment;
        $user->syncRoles([$request->role]);
        $user->save();
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
            $logoName = time() . '_'.$vendor->id .".". $request->file('avatar')->getClientOriginalExtension();
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
        }else if($status == 'dispatcher' || $status == 'dropshipper'){
            $users = User::role($status)->paginate();
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
        return view('admin.users.index', compact('users'));
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $vendor = $user->vendor;
        if($vendor == null) {
            return redirect()->route('vendor.profile.create',compact('user'));
        }
        return view('vendor.profile.index', compact('vendor', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $vendor = $user->vendor;
        if($vendor) {
            return redirect()->route('vendor.profile.index');
        }
        $cities = City::all();
        return view('vendor.profile.create', compact('user', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'business_name' => 'required|string|max:255',
            'store_url' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'store_logo' => 'required|image',
            'avatar' => 'required|image',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();
        if($request->hasFile('avatar')) {
            $avatarName = time() . '_'.$user->id .".". $request->file('avatar')->getClientOriginalExtension();
            $user->avatar = $request->file('avatar')->storeAs('users', $avatarName);
            $user->save();
        }
        $vendor = $user->vendor()->create([
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'business_name' => $request->business_name,
            'store_url' => $request->store_url,
            'address' => $request->address,
            'city_id' => $request->city_id,
        ]);
        if($request->hasFile('store_logo')) {
            $logoName = time() . '_'.$vendor->id .".". $request->file('store_logo')->getClientOriginalExtension();
            $vendor->store_logo = $request->file('store_logo')->storeAs('vendors', $logoName);
            $vendor->save();
        }
        return redirect()->route('vendor.profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->id == $id) {
            $user = auth()->user();
            $cities = City::all();
            return view('vendor.profile.edit', compact('user', 'cities'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'business_name' => 'required|string|max:255',
            'store_url' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'store_logo' => 'nullable|image',
            'avatar' => 'nullable|image',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();
        $vendor = $user->vendor;
        $vendor->phone = $request->phone;
        $vendor->city_id = $request->city_id;
        $vendor->business_name = $request->business_name;
        $vendor->store_url = $request->store_url;
        $vendor->address = $request->address;
        $vendor->city_id = $request->city_id;
        $vendor->save();
        if($request->hasFile('store_logo')) {
            File::delete($vendor->store_logo);
            $logoName = time() . '_'.$vendor->id .".". $request->file('store_logo')->getClientOriginalExtension();
            $vendor->store_logo = $request->file('store_logo')->storeAs('vendors', $logoName);
            $vendor->save();
        }
        if($request->hasFile('avatar')) {
            File::delete($user->avatar);
            $avatarName = time() . '_'.$user->id .".". $request->file('avatar')->getClientOriginalExtension();
            $user->avatar = $request->file('avatar')->storeAs('users', $avatarName);
            $user->save();
        }
        return redirect()->route('vendor.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

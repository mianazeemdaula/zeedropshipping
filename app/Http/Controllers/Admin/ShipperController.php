<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipper;
class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shipper::paginate();
        return view('admin.shippers.index', compact('shippers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shippers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'slug' => 'required',
            'tracking_url' => 'required',
            'icon' => 'required',
        ]);
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
        $shipper = Shipper::find($id);
        return view('admin.shippers.edit', compact('shipper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'tracking_url' => 'required',
            'config.*' => 'required|string',
        ]);
        $shipper = Shipper::find($id);
        $shipper->name = $request->name;
        $shipper->phone = $request->phone;
        $shipper->email = $request->email;
        $shipper->active = $request->active == 'on' ? true : false;
        $shipper->tracking_url = $request->tracking_url;
        $config = [];
        foreach ($request->config as $key => $value) {
            $config[$key] = $value;
        }
        $shipper->config = json_encode($config);
        $shipper->save();
        return redirect()->route('admin.shippers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

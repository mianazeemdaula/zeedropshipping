<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VendorRevenue;
use App\Models\User;
use App\Models\BankTransaction;
use App\Models\Vendor;  
use App\Models\BankAccount;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // distinct vendors 
        $revenueUserIds = VendorRevenue::distinct()->pluck('user_id');
        $vendors = User::whereIn('id', $revenueUserIds)->withSum('vendorRevenue', 'amount')
        ->whereHas('vendorRevenue',function($q){
            $q->where('status', 'earned');
        })
        ->with('activeBankAccount.lastBankTransaction')->paginate();
        return view('admin.payments.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $revenueUserIds = VendorRevenue::distinct()->pluck('user_id');
        // $vendors = User::whereIn('id', $revenueUserIds)->withSum('vendorRevenue', 'amount')
        // ->whereHas('vendorRevenue',function($q){
        //     $q->where('status', 'pending');
        // })->get();
        // $vendors = User::role('dropshipper')->get();
        $user = Vendor::where('ds_number',request()->ds)->first()->user;
        $amount = VendorRevenue::where('user_id', $user->id)->where('status', 'earned')->sum('amount');
        $bank = $user->activeBankAccount;
        $ordersIds = VendorRevenue::where('user_id', $user->id)->where('status', 'earned')->pluck('order_id');
        return view('admin.payments.create', compact('user', 'amount','bank','ordersIds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'payment_date' => 'required|date',
            'reference' => 'required',
            'deduction' => 'required|numeric',
            'orderids' => 'required|array',
        ]);
        $d = Vendor::where('ds_number',$request->dropshipper)->first();
        $dropshipper = User::find($d->id);
        return $dropshipper;
        // create payment
        $bankTrans = BankTransaction::create([
            'bank_account_id' => $dropshipper->activeBankAccount->id,
            'enter_by' => auth()->id(),
            'amount' => $request->amount,
            'type' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'reference' => $request->reference,
            'bank_iban' => $request->bank_iban,
            'deduction' => $request->deduction,
            'status' => 'completed',
            'note' => $request->note,
            'order_ids' => $request->orderids,
        ]);

        // orders revenue status update
        \App\Models\VendorRevenue::whereIn('order_id', $request->orderids)->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);

        if($request->hasFile('attachment')){
            $invoiceName = time() . '_'.$bankTrans->id .".". $request->file('attachment')->getClientOriginalExtension();
            $bankTrans->invoice = $request->file('attachment')->storeAs('payments', $invoiceName);
            $bankTrans->save();
        }
        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

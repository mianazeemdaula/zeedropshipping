<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use App\Models\User;
use App\Models\Bank;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = auth()->user()->bankAccounts()->paginate(10);
        return view('vendor.bank.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = Bank::all();
        return view('vendor.bank.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|integer|exists:banks,id',
            'account_name' => 'required|string',
            'iban' => 'required|string',
            'is_default' => 'required|in:on,null',
        ]);

        $account = new BankAccount();
        $account->bank_id = $request->bank_id;
        $account->user_id = auth()->id();
        $account->account_name = $request->account_name;
        $account->iban = $request->iban;
        $account->is_default = $request->is_default == 'on' ? 1 : 0;
        $account->save();
        if($account->is_default){
            BankAccount::where('user_id', auth()->id())->where('id', '!=', $account->id)->update(['is_default' => 0]);
        }
        return redirect()->route('vendor.bank-account.index');
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
        $banks = Bank::all();
        $account = BankAccount::findOrFail($id);
        return view('vendor.bank.edit', compact('banks', 'account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bank_id' => 'required|integer|exists:banks,id',
            'account_name' => 'required|string',
            'iban' => 'required|string',
            'is_default' => 'in:on,null',
        ]);

        $account = BankAccount::findOrFail($id);
        $account->bank_id = $request->bank_id;
        $account->account_name = $request->account_name;
        $account->iban = $request->iban;
        $account->is_default = $request->is_default == 'on' ? 1 : 0;
        $account->save();
        if($account->is_default){
            BankAccount::where('user_id', auth()->id())->where('id', '!=', $account->id)->update(['is_default' => 0]);
        }
        return redirect()->route('vendor.bank-account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankTransaction;

class BankTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountIds = auth()->user()->bankAccounts->pluck('id');
        $transactions = BankTransaction::whereIn('bank_account_id', $accountIds)->latest()->paginate();
        $totalPayments = BankTransaction::whereIn('bank_account_id', $accountIds)->where('status', 'completed')->sum('amount');
        return view('vendor.bank-transactions.index', compact('transactions','totalPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $accountIds = auth()->user()->bankAccounts->pluck('id');
        $transactions = BankTransaction::whereIn('bank_account_id', $accountIds)
            ->where('reference', 'like', '%'.$request->search.'%')
            ->orWhere('note', 'like', '%'.$request->search.'%')
            ->orWhere('amount', 'like', '%'.$request->search.'%')
            ->orWhere('status', 'like', '%'.$request->search.'%')
            ->latest()->paginate();
        $totalPayments = BankTransaction::whereIn('bank_account_id', $accountIds)
            ->where('status', 'completed')
            ->sum('amount');
        $search = $request->search;
        return view('vendor.bank-transactions.index', compact('transactions','totalPayments','search'));
    }
}

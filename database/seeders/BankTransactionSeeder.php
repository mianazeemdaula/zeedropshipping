<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'bank_account_id' => 1,
                'type' => 'credit',
                'reference' => 'TRX-001',
                'amount' => 1000,
                'description' => 'Initial deposit'
            ],
            [
                'bank_account_id' => 1,
                'type' => 'debit',
                'reference' => 'TRX-002',
                'amount' => 500,
                'description' => 'Withdrawal'
            ],
            [
                'bank_account_id' => 1,
                'type' => 'credit',
                'reference' => 'TRX-003',
                'amount' => 2000,
                'description' => 'Deposit'
            ],
            [
                'bank_account_id' => 1,
                'type' => 'credit',
                'reference' => 'TRX-004',
                'amount' => 5000,
                'description' => 'Deposit'
            ],
            [
                'bank_account_id' => 1,
                'type' => 'debit',
                'reference' => 'TRX-005',
                'amount' => 2000,
                'description' => 'Withdrawal'
            ],
            [
                'bank_account_id' => 1,
                'type' => 'credit',
                'reference' => 'TRX-006',
                'amount' => 10000,
                'description' => 'Deposit'
            ],
        ];

        foreach ($transactions as $transaction) {
            \App\Models\BankTransaction::create($transaction);
        }
    }
}

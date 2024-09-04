<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_id',
        'enter_by',
        'payment_date',
        'type',
        'reference',
        'amount',
        'deduction',
        'description',
        'order_ids',
        'invoice',
        'note',
        'status',
    ];

    // cast attributes
    protected $casts = [
        'order_ids' => 'array',
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'user_id',
        'account_name',
        'iban',
        'is_default',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    
    public function bankTransactions()
    {
        return $this->hasMany(BankTransaction::class);
    }

    public function lastBankTransaction()
    {
        return $this->hasOne(BankTransaction::class)->latest();
    }
}

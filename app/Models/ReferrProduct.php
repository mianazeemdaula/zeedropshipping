<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferrProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'referr_id',
        'discount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function referr()
    {
        return $this->belongsTo(User::class);
    }

    public function getDiscountAttribute($value)
    {
        return number_format($value, 2);
    }
}

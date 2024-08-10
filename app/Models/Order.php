<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'payment_method_id',
        'status',
        'customer_name',
        'customer_phone',
        'customer_email',
        'extra_note',
        'order_date',
        'payment_date',
        'payment_status',
        'shipping_address',
        'billing_address',
        'zip',
        'city',
        'total',
        'shipping_cost',
        'discount',
        'tax',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

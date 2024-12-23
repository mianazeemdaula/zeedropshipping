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
        'shipper_id',
        'shipped_date',
        'packed_date',
        'provider',
        'profit',
        'track_data',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'payment_date' => 'datetime',
        'shipped_date' => 'datetime',
        'packed_date' => 'datetime',
        'delivered_date' => 'datetime',
        'track_data' => 'array',
    ];

    public static $statuses = [
        'all',
        'open',
        'packed',
        'shipped',
        'picked-up',
        'in-transit',
        'delivered',
        'cancelled',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }
}

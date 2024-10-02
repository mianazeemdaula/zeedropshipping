<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'city_id',
        'business_name',
        'store_url',
        'store_logo',
        'ds_number',
        'city_name',
        'sale_level',
        'last_sales',
    ];

    // get store logo
    public function getStoreLogoAttribute($value)
    {
        return $value ? asset($value) : asset('images/default-store-logo.jpg');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function city()
    // {
    //     return $this->belongsTo(City::class);
    // }
}

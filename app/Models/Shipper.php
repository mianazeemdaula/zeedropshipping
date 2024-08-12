<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'icon',
        'active',
        'config',
        'slug',
        'tracking_url',
    ];

    protected $casts = [
        'active' => 'boolean',
        'config' => 'array',
    ];

}

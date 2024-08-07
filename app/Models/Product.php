<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'weight',
        'price',
        'discount',
        'vat',
        'stock',
        'featured',
        'description',
        'extra_info',
        'referr_discount',
        'referal_discount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function referrProducts()
    {
        return $this->hasMany(ReferrProduct::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}

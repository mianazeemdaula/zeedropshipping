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
        'sku',
        'featured',
        'description',
        'extra_info',
        'referr_discount',
        'referal_discount',
        'user_id',
        'status',
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
        return $this->morphMany(Media::class, 'mediable')->orderBy('sort');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // count products sales in order details

    public function getActiveSalesAttribute()
    {
        return $this->orders()->whereNotIn('status',['canceled','returned'])->sum('qty');
    }

    public function getReturnSalesAttribute()
    {
        return $this->orders()->where('status','returned')->sum('qty');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'parent_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImageAttribute($value)
    {
        return $value ? asset($value) : 'https://via.placeholder.com/150';
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}

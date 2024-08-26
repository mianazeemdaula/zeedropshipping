<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

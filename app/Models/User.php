<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail , CanResetPassword
{
    use HasFactory, Notifiable;
    use HasRoles, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'avatar',
        'status',
        'country_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // attributes
    public function getAvatarAttribute($value)
    {
        return $value ? asset($value) : asset('users/default.png');
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function referrProducts()
    {
        return $this->hasMany(ReferrProduct::class);
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function activeBankAccount(){
        return $this->hasOne(BankAccount::class)->where('status','approved');
    }

    public function vendorRevenue()
    {
        return $this->hasMany(VendorRevenue::class);
    }

    public function kycDocs(){
        return $this->hasMany(UserKycDoc::class);
    }

    public function dropShipperNicKyc(){
        return $this->hasOne(UserKycDoc::class)->where('kyc_doc_id',1);
    }

    public function getOrderRatioAttribute()
    {
        $totalOrders = $this->orders()->count();
        $totalCancelled = $this->orders()->where('status','cancelled')->count();
        if($totalOrders == 0){
            return 0;
        }
        return ($totalCancelled / $totalOrders) * 100;
    }
    
}

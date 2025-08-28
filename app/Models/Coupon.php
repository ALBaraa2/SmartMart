<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'usage_count',
        'usage_per_user',
        'start_at',
        'expires_at'
    ];

    public function couponUses() {
        return $this->hasMany(CouponUse::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }
}

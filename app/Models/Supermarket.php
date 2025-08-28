<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Supermarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'logo',
        'phone',
        'email',
        'opening_hours',
        'status'
    ];


    public function products() {
        return $this->belongsToMany(Product::class, 'product_supermarket')
                    ->withPivot('price', 'stock', 'status');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'supermarket_user');
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function deliveryZones() {
        return $this->hasMany(DeliveryZone::class);
    }

    public function deliverySlots() {
        return $this->hasMany(DeliverySlot::class);
    }

    public function drivers() {
        return $this->hasMany(Driver::class);
    }

    public function settings() {
        return $this->hasMany(SupermarketSetting::class);
    }

    public function coupons() {
        return $this->hasMany(Coupon::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'supermarket_id',
        'total_price',
        'status',
        'payment_method',
        'payment_status',
        'delivery_type',
        'delivery_fee'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function delivery() {
        return $this->hasOne(Delivery::class);
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }
}

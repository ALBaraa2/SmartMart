<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}

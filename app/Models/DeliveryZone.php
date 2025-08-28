<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryZone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'supermarket_id',
        'polygon_coordinates',
        'postal_codes',
        'min_order_amount',
        'delivery_fee'
    ];

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }
}

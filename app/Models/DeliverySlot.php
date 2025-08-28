<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliverySlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'supermarket_id',
        'day',
        'slot_start',
        'slot_end'
    ];

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }

    public function deliveries() {
        return $this->hasMany(Delivery::class);
    }
}

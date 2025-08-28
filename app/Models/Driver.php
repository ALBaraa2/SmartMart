<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_type',
        'vehicle_number',
        'status',
        'supermarket_id'
    ];

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }

    public function deliveries() {
        return $this->hasMany(Delivery::class);
    }
}

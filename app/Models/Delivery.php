<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'driver_id',
        'delivery_slot_id',
        'status',
        'assigned_at',
        'accepted_at',
        'picked_up_at',
        'in_transit_at',
        'arrived_at',
        'delivered_at',
        'canceled_at',
        'delivery_notes',
        'failure_reason',
        'recipient_name',
        'recipient_phone'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function deliverySlot() {
        return $this->belongsTo(DeliverySlot::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'supermarket_id',
        'action',
        'model_type',
        'old_values',
        'new_values',
        'description',
        'ip_address',
        'user_agent',
        'url',
        'method',
        'properties',
        'batch_uuid'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }

    public function subject() {
        return $this->morphTo('model');
    }
}

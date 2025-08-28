<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupermarketSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'supermarket_id',
        'key',
        'value'
    ];

    public function supermarket() {
        return $this->belongsTo(Supermarket::class);
    }
}

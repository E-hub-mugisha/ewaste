<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'device_name', 'brand', 'type', 'condition',
        'quantity', 'photo', 'pickup_address', 'tracking_code', 'status', 'pricing_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pickups()
    {
        return $this->hasMany(DevicePickup::class, 'device_id');
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}

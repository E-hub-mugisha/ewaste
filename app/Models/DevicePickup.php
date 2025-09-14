<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevicePickup extends Model
{
    protected $fillable = ['device_id', 'collector_id', 'pickup_date', 'status'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collector_id');
    }
}

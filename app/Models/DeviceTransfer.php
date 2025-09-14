<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTransfer extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'collector_id', 'partner_id', 'status', 'transferred_at'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collector_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    public function transfers()
    {
        return $this->hasMany(DeviceTransfer::class);
    }

    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }
}

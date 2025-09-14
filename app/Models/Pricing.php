<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    //
    protected $fillable = [
        'partner_id',
        'device_type',
        'price',
        'currency',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}

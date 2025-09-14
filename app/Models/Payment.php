<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id', 'partner_id', 'device_id', 'pricing_id',
        'amount', 'currency', 'payment_method', 'transaction_id', 'status', 'tx_ref'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}

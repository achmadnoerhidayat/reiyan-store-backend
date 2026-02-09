<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['produk_id', 'code', 'type', 'value', 'quota', 'used', 'min_order', 'start_at', 'end_at'];

    protected $hidden = ['produk_id'];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];
}

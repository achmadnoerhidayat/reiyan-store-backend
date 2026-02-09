<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'service_id', 'payment_id', 'voucher_id', 'price', 'profit', 'total', 'discount_amount', 'va_number', 'qr_code', 'reference', 'status'];

    protected $hidden = ['user_id', 'service_id', 'payment_id', 'voucher_id'];
}

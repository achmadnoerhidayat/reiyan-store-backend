<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Transaction extends Model
{
    use LogsActivity;
    protected $fillable = ['user_id', 'service_id', 'produk_id', 'payment_id', 'voucher_id', 'order_id', 'price', 'profit', 'total', 'discount_amount', 'va_number', 'qr_code', 'reference', 'status', 'date_exp', 'target_details', 'response_provider'];

    protected $hidden = ['user_id', 'service_id', 'produk_id', 'payment_id', 'voucher_id'];

    protected $casts = [
        'target_details' => 'array',
        'response_provider' => 'array',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['price', 'profit', 'total', 'discount_amount', 'va_number', 'qr_code', 'reference', 'status', 'target_details', 'response_provider'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }
}

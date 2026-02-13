<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Deposit extends Model
{
    use LogsActivity;

    protected $fillable = ['user_id', 'payment_id', 'order_id', 'amount', 'va_number', 'qr_code', 'reference', 'status', 'date_exp'];

    protected $hidden = ['user_id', 'payment_id'];

    protected $casts = [
        'date_exp' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['amount', 'va_number', 'qr_code', 'reference', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('deposit');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PaymentMethod extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'category', 'code', 'gateway', 'image_url', 'fee', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['code', 'fee', 'name'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('payment_method');
    }
}

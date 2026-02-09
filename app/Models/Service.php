<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Service extends Model
{
    use LogsActivity;

    protected $fillable = ['produk_id', 'code', 'nominal', 'deskripsi', 'status', 'price_provider', 'member_price'];

    protected $hidden = ['produk_id'];

    protected $casts = [
        'member_price' => 'array',
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['code', 'nominal', 'price_provider', 'member_price'])
            ->logOnlyDirty()
            ->useLogName('product_manager');
    }
}

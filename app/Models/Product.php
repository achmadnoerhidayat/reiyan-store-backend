<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use LogsActivity;

    protected $fillable = ['categori_id', 'provider_id', 'name', 'slug', 'brand', 'sale', 'code', 'logo', 'banner', 'is_check_id', 'is_check_server', 'is_check_name'];

    protected $hidden = ['categori_id', 'provider_id'];

    protected $appends = ['average_rating'];

    protected function casts(): array
    {
        return [
            'is_check_id' => 'boolean',
            'is_check_server' => 'boolean',
            'is_check_name' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'sale', 'logo', 'banner'])
            ->logOnlyDirty()
            ->useLogName('product_manager');
    }

    public function kategori()
    {
        return $this->belongsTo(category::class, 'categori_id');
    }

    public function layanan()
    {
        return $this->hasMany(Service::class, 'produk_id');
    }

    public function faq()
    {
        return $this->hasMany(Faq::class, 'produk_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'produk_id');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->rating()->avg('rating'), 1);
    }
}

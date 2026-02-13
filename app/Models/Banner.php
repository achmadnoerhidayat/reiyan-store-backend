<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'image_url', 'link_url', 'is_active', 'starts_at', 'end_at'];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'end_at' => 'datetime'
    ];
}

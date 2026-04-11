<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = ['type', 'title', 'content', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}

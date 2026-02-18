<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'position'];

    public function produk()
    {
        return $this->hasMany(Product::class, 'categori_id');
    }
}

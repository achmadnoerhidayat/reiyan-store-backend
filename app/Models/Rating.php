<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'transaksi_id', 'produk_id', 'rating', 'comment'];

    protected $hidden = ['user_id', 'transaksi_id', 'produk_id'];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }
}

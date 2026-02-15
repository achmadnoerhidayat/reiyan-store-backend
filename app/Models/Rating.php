<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'replied_by', 'transaksi_id', 'produk_id', 'rating', 'comment', 'is_publish', 'reply_message', 'replied_at', 'edit_count'];

    protected $hidden = ['user_id', 'replied_by', 'transaksi_id', 'produk_id'];

    protected function casts()
    {
        return [
            'is_publish' => 'boolean'
        ];
    }

    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'transaksi_id', 'type', 'title', 'message', 'is_read'];

    protected $hidden = ['user_id', 'transaksi_id'];

    protected $casts = [
        'is_read' => 'boolean'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

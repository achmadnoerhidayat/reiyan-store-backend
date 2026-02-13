<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{
    protected $fillable = ['wallet_id', 'amount', 'type', 'description', 'balance_before', 'balance_after'];

    protected $hidden = ['wallet_id'];
}

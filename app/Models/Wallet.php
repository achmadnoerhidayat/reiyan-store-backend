<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Wallet extends Model
{
    use LogsActivity;
    protected $fillable = ['user_id', 'balance', 'hold_balance', 'pin', 'pin_attempts', 'is_frozen'];

    protected $hidden = ['user_id', 'pin'];

    protected function casts(): array
    {
        return [
            'pin' => 'hashed',
            'is_frozen' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['balance', 'hold_balance'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('wallet');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function history()
    {
        return $this->hasMany(BalanceHistory::class, 'wallet_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MemberLevel extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'markup_type', 'markup_value', 'min_threshold'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'markup_type', 'markup_value', 'min_threshold'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('member_level');
    }
}

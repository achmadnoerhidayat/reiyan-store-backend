<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberLevel extends Model
{
    protected $fillable = ['name', 'markup_type', 'markup_value', 'min_threshold'];
}

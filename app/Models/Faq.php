<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['produk_id', 'question', 'answer'];

    protected $hidden = ['produk_id'];
}

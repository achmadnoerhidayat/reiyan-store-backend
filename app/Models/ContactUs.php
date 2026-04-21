<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['order_id', 'kategori', 'name', 'phone', 'deskripsi', 'status'];
}

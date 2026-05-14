<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['medicine_name', 'generic_name', 'category', 'quantity', 'expiration_date', 'price', 'status'];
}

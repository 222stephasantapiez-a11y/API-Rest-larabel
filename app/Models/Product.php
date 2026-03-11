<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class Product extends Model
{
       protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];
}

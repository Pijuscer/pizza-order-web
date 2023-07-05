<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $fillable = [
        'pizza_name',
        'pizza_ingredients',
        'pizza_foto'
    ];
}

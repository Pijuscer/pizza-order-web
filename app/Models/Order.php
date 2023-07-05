<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pizza_id',
        'pizza_size_price_id',
        'pizza_attachments_id',
        'price'
    ];
}

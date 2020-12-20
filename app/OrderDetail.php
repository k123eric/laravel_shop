<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'price',
        'buy_amount',
        'image_url',
    ];
}

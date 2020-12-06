<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'id',
        'name',
        'price',
        'buy_amount',
    ];
}

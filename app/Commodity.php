<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'name',
        'category',
        'amount',
        'price',
    ];
}

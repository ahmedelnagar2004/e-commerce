<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address',
        'items', 'total_amount'
    ];

    protected $casts = [
        'items' => 'array',
    ];
}

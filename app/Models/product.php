<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image-1',
        'image-2',
        'image-3',
        'image-4',
        'image-5',
    ];

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
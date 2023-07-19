<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'synopsis',
        'category',
        'published_at',
        'quantity_in_stock'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
     protected $fillable = [
        'title',
        'subtitle',
        'price',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
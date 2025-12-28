<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'features',
        'short_description',
        'description',
    ];
    protected $casts = [
        'features' => 'array',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'user_id',
        'title',
        'duration',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

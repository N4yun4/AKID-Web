<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'source',
        'image_url',
        'date_published',
        'slug',
        'views',
    ];

    // Cast date_published sebagai datetime
    protected $casts = [
        'date_published' => 'datetime',
    ];
}
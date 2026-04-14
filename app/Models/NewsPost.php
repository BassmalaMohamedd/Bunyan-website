<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'image', 'published_at'];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
            'published_at' => 'datetime',
        ];
    }
}

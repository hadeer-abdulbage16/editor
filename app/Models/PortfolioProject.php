<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'title', 'category', 'description', 'video_url', 'thumbnail_url',
        'duration', 'tone', 'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}

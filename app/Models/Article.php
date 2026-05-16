<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'content_image',
        'published_at',
        'user_id'
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    function user() {
        return $this->belongsTo(User::class);
    }
}

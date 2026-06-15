<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'genre_id',
        'title',
        'artist',
        'album',
        'audio_file',
        'cover_image',
        'views'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
} 
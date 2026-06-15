<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    // Mengizinkan field ini diisi bebas
    protected $fillable = [
        'user_id', 
        'song_id',
        'song_title', 
        'artist', 
        'reason'];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}

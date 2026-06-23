<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
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

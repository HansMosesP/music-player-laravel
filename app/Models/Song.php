<?php
// {{-- Andreas  --}}
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'genre_id',
        'title',
        'artist',
        'album',
        'views',
        'lyrics',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}

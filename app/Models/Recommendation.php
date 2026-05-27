<?php
// Calvin
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    // Mengizinkan field ini diisi massal
    protected $fillable = ['user_id', 'song_title', 'artist', 'reason'];
}
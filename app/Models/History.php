app/Models/History.php
 
<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class History extends Model
{
    protected $fillable = [
        'user_id',
        'song_id',
    ];
 
    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
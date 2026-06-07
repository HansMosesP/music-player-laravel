<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $table = 'premiums';

    // Mendaftarkan kolom supaya aman disaat nanti diinput lewat form 
    protected $fillable = [
        'user_id',
        'package_name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
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

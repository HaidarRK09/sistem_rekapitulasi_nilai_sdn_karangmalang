<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'nuptk',
        'place_of_birth',
        'date_of_birth',
        'education',
        'position',
        'rank',
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

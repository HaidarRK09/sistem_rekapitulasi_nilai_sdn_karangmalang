<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'nisn',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'address',
        'phone',
        'user_id',
        // 'walikelas_id'
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function walikelas()
    // {
    //     return $this->belongsTo(User::class, 'walikelas_id');
    // }
    
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

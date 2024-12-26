<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'name',
        'class',
        'nisn',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'address',
        'phone'
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function walikelas()
    {
        return $this->belongsTo(User::class, 'walikelas_id');
    }
    
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

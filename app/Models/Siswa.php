<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['name', 'class', 'walikelas_id'];

    public function walikelas()
    {
        return $this->belongsTo(User::class, 'walikelas_id');
    }
    
    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}

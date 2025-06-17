<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapels'; // ini wajib, karena bukan bentuk default (tanpa 's')
    protected $fillable = ['kode_mapel', 'nama_mapel', 'deskripsi'];
}

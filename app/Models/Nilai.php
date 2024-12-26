<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tugas1',
        'tugas2',
        'tugas3',
        'tugas4',
        'tugas5',
        'uts',
        'uas',
    ];
}

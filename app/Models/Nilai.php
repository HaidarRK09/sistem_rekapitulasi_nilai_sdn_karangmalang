<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'tugas1',
        'tugas2',
        'tugas3',
        'tugas4',
        'tugas5',
        'uts',
        'uas',
    ];

    protected $casts = [
        'tugas1' => 'decimal:2',
        'tugas2' => 'decimal:2',
        'tugas3' => 'decimal:2',
        'tugas4' => 'decimal:2',
        'tugas5' => 'decimal:2',
        'uts'     => 'decimal:2',
        'uas'     => 'decimal:2',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}

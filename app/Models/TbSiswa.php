<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbSiswa extends Model
{
    use HasFactory;

    // Pastikan tabel sesuai dengan migration
    protected $table = 'tb_siswas';

    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'id_sekolah',
        'id_kelas',
        'id_th_ajar',
        'id_mesjid',
        'id_card',
    ];

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'id_kelas');
    }
}

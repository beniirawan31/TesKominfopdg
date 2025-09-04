<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalikelasModel extends Model
{
    use HasFactory;
    protected $table = 'walikelas';

    protected $fillable = [
        'nama',       // nama wali kelas
        'kelas_id',   // relasi ke kelas
    ];

    // Relasi ke model kelas
    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'kelas_id');
    }
}

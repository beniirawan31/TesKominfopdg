<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = 'kelas_models';

    protected $fillable = [
        'nama',
    ];

    public function walikelas()
    {
        return $this->hasMany(WalikelasModel::class, 'kelas_id');
    }
}

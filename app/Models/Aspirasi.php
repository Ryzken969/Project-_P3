<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $primaryKey = 'id_aspirasi';

    protected $fillable = [
        'judul',
        'isi_aspirasi',
        'status',
        'id_siswa',
        'id_kategori'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'id_aspirasi', 'id_aspirasi');
    }
}

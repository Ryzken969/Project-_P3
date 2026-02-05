<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';
    
    public function aspirasi()
{
    return $this->hasMany(Aspirasi::class, 'id_siswa');
}

}

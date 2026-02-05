<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    protected $fillable = [
        'isi_umpan_balik',
        'id_aspirasi',
        'id_admin'
    ];
    public function aspirasi()
{
    return $this->belongsTo(Aspirasi::class, 'id_aspirasi');
}

public function admin()
{
    return $this->belongsTo(Admin::class, 'id_admin');
}

}

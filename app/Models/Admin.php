<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function umpanBalik()
{
    return $this->hasMany(UmpanBalik::class, 'id_admin');
}

}

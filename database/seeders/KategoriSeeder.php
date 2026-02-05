<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::insert([
            ['nama_kategori' => 'Sarana Prasarana'],
            ['nama_kategori' => 'Kegiatan Sekolah'],
            ['nama_kategori' => 'Pelayanan Sekolah'],
            ['nama_kategori' => 'Keamanan'],
            ['nama_kategori' => 'Kebersihan'],
            ['nama_kategori' => 'Lainnya']
        ]);
    }
}

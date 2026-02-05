<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Dummy siswa
        Siswa::create([
            'nis' => '12345',
            'nama' => 'Siswa Demo',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'RPL',
            'password' => '12345'
        ]);

        // Dummy admin
        Admin::create([
            'nama_admin' => 'Admin Demo',
            'username' => 'admin',
            'password' => 'admin123'
        ]);
    }
}

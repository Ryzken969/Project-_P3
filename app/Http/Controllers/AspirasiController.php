<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Kategori;


class AspirasiController extends Controller
{
public function dashboard()
{
    if (!session()->has('siswa')) {
        return redirect('/login-siswa');
    }

    $data = Aspirasi::where('id_siswa', session('siswa')->id_siswa)
        ->with('kategori','umpanBalik')
        ->get();

    return view('siswa.dashboard', compact('data'));
}


public function create()
{
$kategori = Kategori::all();
return view('siswa.form_aspirasi',compact('kategori'));
}


public function store(Request $request)
{
    if (!session()->has('siswa')) {
        return redirect('/login-siswa');
    }

    Aspirasi::create([
        'judul' => $request->judul,
        'isi_aspirasi' => $request->isi,
        'status' => 'menunggu',
        'id_siswa' => session('siswa')->id_siswa,
        'id_kategori' => $request->kategori
    ]);

    return redirect('/dashboard-siswa');
}


}
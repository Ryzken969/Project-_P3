<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\UmpanBalik;

class AdminController extends Controller
{
    // Dashboard admin
    public function dashboard()
    {
        if (!session()->has('admin')) {
            return redirect('/login-admin');
        }

        $data = Aspirasi::with('siswa','kategori','umpanBalik')->get();

        return view('admin.dashboard', compact('data'));
    }

    // Kirim feedback admin
    public function feedback(Request $request)
    {
        if (!session()->has('admin')) {
            return redirect('/login-admin');
        }

        $request->validate([
            'isi_feedback' => 'required',
            'id_aspirasi' => 'required'
        ]);

        UmpanBalik::create([
            'isi_umpan_balik' => $request->isi_feedback,
            'id_aspirasi' => $request->id_aspirasi,
            'id_admin' => session('admin')->id_admin
        ]);

        Aspirasi::where('id_aspirasi', $request->id_aspirasi)
            ->update(['status'=>'diproses']);

        return back()->with('success','Feedback berhasil dikirim');
    }

    // Tandai selesai
    public function selesai($id)
    {
        if (!session()->has('admin')) {
            return redirect('/login-admin');
        }

        Aspirasi::where('id_aspirasi', $id)
            ->update(['status'=>'selesai']);

        return back()->with('success','Aspirasi selesai');
    }
}

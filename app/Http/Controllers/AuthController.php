<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Admin;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN
    |--------------------------------------------------------------------------
    */

    public function loginSiswaForm()
    {
        return view('auth.login_siswa');
    }

    public function loginAdminForm()
    {
        return view('auth.login_admin');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            session(['siswa' => $siswa]);
            return redirect('/dashboard-siswa');
        }

        return back()->with('error', 'NIS atau Password salah');
    }

public function loginAdmin(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $admin = Admin::where('username', $request->username)->first();

    if (!$admin) {
        return back()->with('error', 'Username atau Password salah');
    }

    // Cek apakah password sudah bcrypt
    if (password_get_info($admin->password)['algo'] !== 0) {
        // Password bcrypt
        if (Hash::check($request->password, $admin->password)) {
            session(['admin' => $admin]);
            return redirect('/dashboard-admin');
        }
    } else {
        // Password lama (plaintext)
        if ($request->password == $admin->password) {
            session(['admin' => $admin]);
            return redirect('/dashboard-admin');
        }
    }

    return back()->with('error', 'Username atau Password salah');
}


    /*
    |--------------------------------------------------------------------------
    | FORM REGISTER SISWA SAJA
    |--------------------------------------------------------------------------
    */

    public function registerSiswaForm()
    {
        return view('auth.register_siswa');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES REGISTER SISWA
    |--------------------------------------------------------------------------
    */

    public function registerSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'password' => 'required|min:4'
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login-siswa')
            ->with('success', 'Register berhasil');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}

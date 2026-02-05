<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Admin;


class AuthController extends Controller
{
public function loginSiswaForm()
{
return view('auth.login_siswa');
}


public function loginAdminForm()
{
return view('auth.login_admin');
}


public function loginSiswa(Request $request)
{
$siswa = Siswa::where('nis',$request->nis)->first();


if($siswa && $request->password == $siswa->password){
session(['siswa'=>$siswa]);
return redirect('/dashboard-siswa');
}


return back()->with('error','Login gagal');
}


public function loginAdmin(Request $request)
{
$admin = Admin::where('username',$request->username)->first();


if($admin && $request->password == $admin->password){
session(['admin'=>$admin]);
return redirect('/dashboard-admin');
}


return back()->with('error','Login gagal');
}


public function logout()
{
session()->flush();
return redirect('/');
}
}
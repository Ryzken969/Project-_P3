<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\UmpanBalik;


class AdminController extends Controller
{
public function dashboard()
{
$data = Aspirasi::with('siswa','kategori','umpanBalik')->get();
return view('admin.dashboard',compact('data'));
}


public function feedback(Request $request)
{
UmpanBalik::create([
'isi_umpan_balik'=>$request->isi,
'id_aspirasi'=>$request->aspirasi,
'id_admin'=>session('admin')->id_admin
]);


Aspirasi::where('id_aspirasi',$request->aspirasi)
->update(['status'=>'diproses']);


return back();
}


public function selesai($id)
{
Aspirasi::where('id_aspirasi',$id)
->update(['status'=>'selesai']);


return back();
}
}
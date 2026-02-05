<!DOCTYPE html>
<html>
<head>
<title>Dashboard Siswa</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h2 class="text-2xl font-bold mb-4">Dashboard Siswa</h2>

<div class="mb-6">
<a href="/form-aspirasi"
class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
Kirim Aspirasi
</a>

<a href="/logout"
class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">
Logout
</a>
</div>

<table class="w-full border border-gray-300 rounded-lg overflow-hidden">
<tr class="bg-gray-200 text-left">
<th class="p-3">Judul</th>
<th class="p-3">Kategori</th>
<th class="p-3">Status</th>
<th class="p-3">Feedback</th>
</tr>

@foreach($data as $d)
<tr class="border-t hover:bg-gray-50">
<td class="p-3">{{ $d->judul }}</td>
<td class="p-3">{{ $d->kategori->nama_kategori }}</td>

<td class="p-3">
@if($d->status=='menunggu')
<span class="bg-red-100 text-red-700 px-2 py-1 rounded">Menunggu</span>
@elseif($d->status=='diproses')
<span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Diproses</span>
@else
<span class="bg-green-100 text-green-700 px-2 py-1 rounded">Selesai</span>
@endif
</td>

<td class="p-3 text-sm">
@forelse($d->umpanBalik as $u)
{{ $u->isi_umpan_balik }} <br>
@empty
<span class="text-gray-400">Belum ada feedback</span>
@endforelse
</td>
</tr>
@endforeach

</table>

</div>

</body>
</html>

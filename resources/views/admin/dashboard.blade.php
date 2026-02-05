<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h2 class="text-2xl font-bold mb-4">Dashboard Admin</h2>

<a href="/logout"
class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
Logout
</a>

<br><br>

<table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
<tr class="bg-gray-200 text-left">
<th class="p-3">Siswa</th>
<th class="p-3">Judul</th>
<th class="p-3">Kategori</th>
<th class="p-3">Status</th>
<th class="p-3">Feedback</th>
<th class="p-3">Aksi</th>
</tr>

@foreach($data as $d)
<tr class="border-t hover:bg-gray-50">
<td class="p-3">{{ $d->siswa->nama ?? '-' }}</td>
<td class="p-3">{{ $d->judul }}</td>
<td class="p-3">{{ $d->kategori->nama_kategori ?? '-' }}</td>

<td class="p-3">
@if($d->status=='menunggu')
<span class="bg-red-100 text-red-700 px-2 py-1 rounded">Menunggu</span>
@elseif($d->status=='diproses')
<span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Diproses</span>
@else
<span class="bg-green-100 text-green-700 px-2 py-1 rounded">Selesai</span>
@endif
</td>

<td class="p-3">

{{-- Feedback lama --}}
<div class="mb-2">
@forelse($d->umpanBalik as $u)
<div class="bg-gray-100 p-2 rounded mb-1">
{{ $u->isi_umpan_balik }}
</div>
@empty
<span class="text-gray-400">Belum ada feedback</span>
@endforelse
</div>

<form method="POST" action="/feedback-admin">
@csrf
<input type="hidden" name="id_aspirasi" value="{{ $d->id_aspirasi }}">

<textarea name="isi_feedback"
class="w-full border rounded p-2 mb-2"
placeholder="Tulis feedback"></textarea>

<button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
Kirim
</button>
</form>

</td>

<td class="p-3">
<a href="/aspirasi-selesai/{{ $d->id_aspirasi }}"
class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
Selesai
</a>
</td>

</tr>
@endforeach

</table>

</div>

</body>
</html>

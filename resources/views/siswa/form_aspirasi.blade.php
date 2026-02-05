<!DOCTYPE html>
<html>
<head>
<title>Kirim Aspirasi</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-lg">

<h2 class="text-2xl font-bold mb-6 text-center">
Kirim Aspirasi
</h2>

<form method="POST" action="/aspirasi">
@csrf

<!-- Judul -->
<label class="block mb-1 font-semibold">Judul Aspirasi</label>
<input name="judul"
placeholder="Masukkan judul"
class="w-full border p-2 rounded mb-4 focus:ring focus:ring-blue-200">

<!-- Isi -->
<label class="block mb-1 font-semibold">Isi Aspirasi</label>
<textarea name="isi"
rows="4"
placeholder="Tulis aspirasi kamu..."
class="w-full border p-2 rounded mb-4 focus:ring focus:ring-blue-200"></textarea>

<!-- Kategori -->
<label class="block mb-1 font-semibold">Kategori</label>
<select name="kategori"
class="w-full border p-2 rounded mb-6 focus:ring focus:ring-blue-200">
@foreach($kategori as $k)
<option value="{{ $k->id_kategori }}">
{{ $k->nama_kategori }}
</option>
@endforeach
</select>

<!-- Tombol -->
<div class="flex justify-between">
<a href="/dashboard-siswa"
class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
Kembali
</a>

<button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
Kirim
</button>
</div>

</form>

</div>

</body>
</html>

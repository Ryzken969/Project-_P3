<!DOCTYPE html>
<html>
<head>
<title>Register Siswa</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow w-96">

<h2 class="text-xl font-bold mb-6 text-center">
Register Siswa
</h2>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-3 rounded text-sm">
{{ session('success') }}
</div>
@endif

<form method="POST" action="/register-siswa">
@csrf

<input name="nis" placeholder="NIS"
class="w-full border p-2 mb-3 rounded">

<input name="nama" placeholder="Nama Lengkap"
class="w-full border p-2 mb-3 rounded">

<!-- KELAS -->
<input name="kelas" placeholder="Kelas (Contoh: XII RPL 1)"
class="w-full border p-2 mb-3 rounded">

<!-- JURUSAN -->
<select name="jurusan"
class="w-full border p-2 mb-3 rounded">
<option value="">Pilih Jurusan</option>
<option>RPL</option>
<option>TKJ</option>
<option>AKL</option>
<option>BDP</option>
<option>OTKP</option>
</select>

<input type="password" name="password"
placeholder="Password"
class="w-full border p-2 mb-4 rounded">

<button class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
Register
</button>

</form>

<p class="text-center mt-3 text-sm">
Sudah punya akun?
<a href="/login-siswa" class="text-blue-500">Login</a>
</p>

</div>

</body>
</html>

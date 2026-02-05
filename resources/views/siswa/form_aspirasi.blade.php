<h2>Kirim Aspirasi</h2>
<form method="POST" action="/aspirasi">
@csrf
<input name="judul" placeholder="Judul"><br>
<textarea name="isi"></textarea><br>


<select name="kategori">
@foreach($kategori as $k)
<option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
@endforeach
</select>


<button>Kirim</button>
</form
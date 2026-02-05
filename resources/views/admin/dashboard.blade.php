<h2>Dashboard Admin</h2>
<a href="/logout">Logout</a>


<table border="1">
<tr>
<th>Siswa</th>
<th>Judul</th>
<th>Status</th>
<th>Feedback</th>
<th>Aksi</th>
</tr>


@foreach($data as $d)
<tr>
<td>{{ $d->siswa->nama }}</td>
<td>{{ $d->judul }}</td>
<td>{{ $d->status }}</td>
<td>
<form method="POST" action="/feedback">
@csrf
<input type="hidden" name="aspirasi" value="{{ $d->id_aspirasi }}">
<textarea name="isi"></textarea>
<button>Kirim</button>
</form>
</td>
<td>
<a href="/selesai/{{ $d->id_aspirasi }}">Selesai</a>
</td>
</tr>
@endforeach


</table>
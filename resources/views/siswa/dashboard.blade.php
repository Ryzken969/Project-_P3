<h2>Dashboard Siswa</h2>
<a href="/form-aspirasi">Kirim Aspirasi</a>
<a href="/logout">Logout</a>


<table border="1">
<tr>
<th>Judul</th>
<th>Kategori</th>
<th>Status</th>
<th>Feedback</th>
</tr>


@foreach($data as $d)
<tr>
<td>{{ $d->judul }}</td>
<td>{{ $d->kategori->nama_kategori }}</td>
<td>{{ $d->status }}</td>
<td>
@foreach($d->umpanBalik as $u)
{{ $u->isi_umpan_balik }}<br>
@endforeach
</td>
</tr>
@endforeach


</table>

<h2>Login Siswa</h2>
<form method="POST" action="/login-siswa">
@csrf
<input name="nis" placeholder="NIS">
<input type="password" name="password" placeholder="Password">
<button>Login</button>
</form>
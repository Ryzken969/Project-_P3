<h2>Login Admin</h2>
<form method="POST" action="/login-admin">
@csrf
<input name="username" placeholder="Username">
<input type="password" name="password">
<button>Login</button>
</form>
<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow w-80">

<h2 class="text-xl font-bold mb-6 text-center">Login Admin</h2>

<form method="POST" action="/login-admin">
@csrf

<input name="username"
placeholder="Username"
class="w-full border p-2 mb-3 rounded focus:ring focus:ring-green-200">

<input type="password"
name="password"
placeholder="Password"
class="w-full border p-2 mb-4 rounded focus:ring focus:ring-green-200">

<button class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
Login
</button>

</form>

</div>

</body>
</html>

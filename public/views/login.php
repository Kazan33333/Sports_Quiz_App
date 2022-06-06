<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <title>Login</title>
</head>
<body>
<div class="logo">
    <h1>
        <img src="/public/img/Logo.png" />
    </h1>
</div>
<div class="login-form">
    <form class="login" action="login" method="POST">
        <input name="email" type="text" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <button class="button_1" type="submit">Log in</button>
        <a href="/register">Register</a>
    </form>
</div>
</body>
</html>

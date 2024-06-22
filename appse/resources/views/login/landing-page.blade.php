<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
</head>
<body>
    <div class="content">
        <div class="text">
            <h1>Let's get started</h1>
            <p>Login to enjoy the features we've provided, and stay healthy!</p>
        </div>
        <div class="buttons">
            <button class="login" onclick="window.location.href='{{ route('login-verify') }}'">Login</button>
            <button class="sign-up" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
        </div>
    </div>
</body>
</html>
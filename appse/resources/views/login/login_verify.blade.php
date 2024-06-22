<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>    
    <link rel="stylesheet" href="{{ asset('css/login_verify.css') }}">
</head>
<body>
    <button class='logo' onclick="window.location.href='{{ route('landing-page') }}'">
        <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
    </button>
    <div class="content">
        <div class="text">
            <h1>Login</h1>
        </div>
        <div class="input-field">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Login</button>
                @if(session('error'))
                    <div class="error">{{ session('error') }}</div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <button class='logo' onclick="window.location.href='{{ route('landing-page') }}'">
        <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
    </button>
    <div class="content">
        <div class="text">
            <h1>Sign Up</h1>
        </div>
        <div class="input-field">
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <input type="text" name="user_name" placeholder="Username" value="{{ old('user_name') }}" required>
                @error('user_name')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>

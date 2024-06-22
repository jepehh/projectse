<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splashscreen</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="background">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function redirectToLoginPage() {
                window.location.href = '{{ route('landing-page') }}';
            }

            // Redirect after 3 seconds
            setTimeout(redirectToLoginPage, 3000);

            // Redirect on any click
            document.addEventListener('click', function() {
                redirectToLoginPage();
            });
        });
    </script>
</body>
</html>
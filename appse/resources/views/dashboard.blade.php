<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <h1>Good day, <br><span>{{ $user_name }}</span></h1>
    <p>What will you do today?</p>
    <div class="search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" placeholder='Search food, articles...'>
    </div>
    <div class="icons">
        <a href=""><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-bell-o" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
    </div>
    <div class="content-cat">
        <div class="icons-cat" data-url="{{ route('article') }}">
            <div class="box">
                <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            <p>Article</p>
        </div>
        <div class="icons-cat" data-url="{{ route('community') }}">
            <div class="box">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <p>Community</p>
        </div>
        <div class="icons-cat" data-url="{{ route('training') }}">
            <div class="box">
                <i class="fa fa-futbol-o" aria-hidden="true"></i>
            </div>
            <p>Training</p>
        </div>
        <div class="icons-cat" data-url="{{ route('diet-plan') }}">
            <div class="box">
                <i class="fa fa-cutlery" aria-hidden="true"></i>
            </div>
            <p>Diet Plan</p>
        </div>
        <div class="icons-cat" data-url="{{ route('shop') }}">
            <div class="box">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            </div>
            <p>Shop</p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.icons-cat').forEach(function (element) {
            element.addEventListener('click', function () {
                var url = element.getAttribute('data-url');
                window.location.href = url;
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Eat Program</title>
    <link rel="stylesheet" href="{{ asset('css/dasheatprog.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('diet-plan') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>Eat Program</h1>
    </div>
    <div class="calender">
        <div class="date-day">
            <div class="date">
                <h1>SAT</h1>
                <p>27 MAY</p>
            </div>
            <div class="date">
                <h1>SUN</h1>
                <p>28 MAY</p>
            </div>
            <div class="date">
                <h1>TODAY</h1>
                <p>29 MAY</p>
            </div>
            <div class="date">
                <h1>MON</h1>
                <p>30 MAY</p>
            </div>
            <div class="date">
                <h1>WED</h1>
                <p>31 MAY</p>
            </div>
        </div>
        <i class="fa fa-calendar" aria-hidden="true"></i>
    </div>
    <div class="cals">
        <div class="box-1">
            <h1>0</h1>
            <p>EATEN</p>
        </div>
        <div class="box-0">
            <h1>1.471</h1>
            <p>KCAL LEFT</p>
        </div>
        <div class="box-1">
            <h1>0</h1>
            <p>BURNED</p>
        </div>
    </div>
    <div class="protein">
        <div class="pro">
            <h1>Carb</h1>
            <p>0 / 95,3 g</p>
        </div>
        <div class="pro">
            <h1>Protein</h1>
            <p>0 / 38,1 g</p>
        </div>
        <div class="pro">
            <h1>Carb</h1>
            <p>0 / 57,2 g</p>
        </div>
    </div>
    <div class="food">
        <h1 class="title">FOOD</h1>
        <div class="total-intake">
            <h1>Total</h1>
            <div class="intake">
                <p>Carbs</p>
                <p>0g</p>
            </div>
            <div class="intake">
                <p>Protein</p>
                <p>0g</p>
            </div>
            <div class="intake">
                <p>Fat</p>
                <p>0g</p>
            </div>
        </div>
        <div class="spacing"></div>
        <div class="box-2">
            <img src="" alt="">
            <div class="content">
                <h1>Breakfast</h1>
                <p>Recommended: 300-500 kcal</p>
            </div>
            <div class="plus">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>
        <div class="box-2">
            <img src="" alt="">
            <div class="content">
                <h1>Lunch</h1>
                <p>Recommended: 300-500 kcal</p>
            </div>
            <div class="plus">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>
        <div class="box-2">
            <img src="" alt="">
            <div class="content">
                <h1>Dinner</h1>
                <p>Recommended: 300-500 kcal</p>
            </div>
            <div class="plus">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</body>
</html>
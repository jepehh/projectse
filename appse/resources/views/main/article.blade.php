<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('dashboard') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>Article</h1>
    </div>

    <div class="search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" id="search-input" placeholder='Search article...'>
    </div>

    <div class="topics">
        <h1>Topics</h1>
        <div class="box">
            <div class="topicbox">
                <p>Nutrition</p>
            </div>
            <div class="topicbox">
                <p>Diet</p>
            </div>
            <div class="topicbox">
                <p>Fitness</p>
            </div>
        </div>
    </div>

    <div class="trending">
        <div class="text">
            <h1>Trending Article</h1>
            <p>See all</p>
        </div>
        <div class="tbox">
            <div class="trendingbox">
                <div class="img">
                    <img src="{{ asset('images/fitnesstracker.jpeg') }}" alt="Logo">
                </div>
                <div class="tag">
                    <h1>Nutrition</h1>
                </div>
                <h1>5 Advantages of Fitness Trackers when Exercising</h1>
                <h2>Jun 30, 2021 | <span>3 min read</span></h2>
            </div>
            <div class="trendingbox">
                <div class="img">
                    <img src="{{ asset('images/avocado.jpeg') }}" alt="Logo">
                </div>
                <div class="tag">
                    <h1>Nutrition</h1>
                </div>
                <h1>Know the Calorie Count of Avocados, a suitable fruit to accompany your diet
                </h1>
                <h2>Dec 21, 2022 | <span>5 min read</span></h2>
            </div>
            <div class="trendingbox">
                <div class="img">
                    <img src="{{ asset('images/calory.jpg') }}" alt="Logo">
                </div>
                <div class="tag">
                    <h1>Nutrition</h1>
                </div>
                <h1>How Many Calories Does the Body Need? Fact Check!</h1>
                <h2>May 26, 2023 | <span>4 min read</span></h2>
            </div>
        </div>
    </div>
    <div class="recent">
        <h1>Recently Posted Articles</h1>
        <div class="rbox">
            <div class="img">
                <img src="{{ asset('images/elderlyworkout.jpeg') }}" alt="Logo">
            </div>
            <div class="text">
                <h1>4 Sports Suitable for the Elderly, Celebrate National Elderly Day</h1>
                <p>May 28, 2023 | <span>5 min read</span></p>
            </div>
        </div>
        <div class="rbox">
            <div class="img">
                <img src="{{ asset('images/dehydration.jpg') }}" alt="Logo">
            </div>
            <div class="text">
                <h1>Hot Weather, Here Are 6 Ways to Prevent Dehydration in the Body</h1>
                <p>May 28, 2023  | <span>5 min read</span></p>
            </div>
        </div>
        <div class="rbox">
            <div class="img">
                <img src="{{ asset('images/jerawat.jpg') }}" alt="Logo">
            </div>
            <div class="text">
                <h1>Tips for exercising without fear of spotty!</h1>
                <p>May 28, 2023 | <span>5 min read</span></p>
            </div>
        </div>
    </div>
</body>
</html>
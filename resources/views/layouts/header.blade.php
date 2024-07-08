
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="shortcut icon" href="{{asset('images/logo.svg')}}" type="image/x-icon">
    <!--Main Css File-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/weather.css')}}">
    <link rel="stylesheet" href="{{asset('css/loginstyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/signupstyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/volunteering.css')}}">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- js file  -->
    <script src="{{asset('js/script.js')}}" defer></script>
    <script src="{{asset('js/weather api.js')}}" defer></script>
    <script src="{{asset('js/login.js')}}" defer></script>
    <script src="{{asset('js/signup.js')}}" defer></script>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav">
        <div class="main-nav">
            <i class="fa-solid fa-bars navOpenBtn"></i>
            <a href="#" class="logo">                    
                <img  src="{{asset('images/main-logo.svg')}}" alt="#">
            </a>
            <ul class="nav-links">
                <i class="fa-solid fa-xmark navCloseBtn"></i>
                <li><a href="{{url('/home')}}" class="active">Home</a></li>
                <li><a id="w-link" href="#weathe">Weather</a></li>
                <li><a href="volunteering.html">Volunteering</a></li>
                <li><a href="instruction.html" >Instructions</a></li>
                <!-- <li><a href="adminUser.html" >Admin</a></li>
                <li><a href="adminPro.html" >Admin Pro</a></li>
                <li><a href="profile.html">Profile</a></li> -->
            </ul>
        </div>
        <div class="icons">
        <i class="fa-solid fa-magnifying-glass search-icon" id="searchIcon"></i>
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" placeholder="Search here..." />
        </div>
        <div class="user-box">
            <i class="fa-solid fa-user user-icon" id="open-icon" ></i>
            <ul class="user-links1">
                @if (Auth::check())
                    <li><a href="/profile">Edit Profile</a></li>
                    <li><a href="/logout">Logout</a></li>

                @else
                    <li><a href="/register">Sign up</a></li>
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>
        </div>         
        @if ( (Auth::check()) && ($predict_flood >= 50.0 || $predict_windstorm > 50.0))
        <div class="anchor">  
            <form action="{{ route('update-user-state') }}" method="POST">
                @csrf <!-- CSRF token -->
                <input type="hidden" name="state" value="safe"> <!-- للزر SAFE -->
                <button type="submit" class="green-btn">SAFE</button>
            </form>

            <form action="{{ route('update-user-state') }}" method="POST">
                @csrf <!-- CSRF token -->
                <input type="hidden" name="state" value="emergency"> <!-- للزر EMERGENCY -->
                <button type="submit" class="red-btn">EMERGENCY</button>
            </form>

        </div>
         @endif  
         
    </nav> 
@yield('content')


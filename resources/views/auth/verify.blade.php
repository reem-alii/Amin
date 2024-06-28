
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin-Verify Email</title>
    <link rel="shortcut icon" href="{{ asset('images/logo1.jpg')}}" type="image/x-icon">
    <!--Main Css File-->
    <link rel="stylesheet" href="{{asset ('css/signupstyle.css')}}">
    <!--header Css File-->
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="{{asset ('css/normalize.css')}}">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="{{asset ('css/all.min.css')}}">
    <!-- js file  -->
    <script src="{{asset ('js/login.js')}}" defer></script>
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
                <img  src="{{ asset('images/main-logo.svg')}}" alt="#">
            </a>
            <ul class="nav-links">
                <i class="fa-solid fa-xmark navCloseBtn"></i>
                <li><a href="/index" class="active">Home</a></li>
                <li><a href="/index.#weather">Weather</a></li>
                <li><a href="/volunteering">Volunteering</a></li>
                <li><a href="/instruction">Instructions</a></li>
            </ul>
        </div>
        <div class="icons">
        <i class="fa-solid fa-magnifying-glass search-icon" id="searchIcon"></i>
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" placeholder="Search here..." />
        </div>
        <div class="user-box">
            <i class="fa-solid fa-user user-icon" id="open-icon"></i>
            <ul class="user-links1">
                <li><a href="/register">Sign up</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
            <ul class="user-links2">
            <li><a href="/profile">Edit Profile</a></li>
            <li><a href="/logout" id="signout">Sign Out</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <section class="signup-container ver-container">
        <div class="form-box ver-box">
            <!-- Verify Email From -->
            <div class="signup-form">
                <div class="ver-icons">
                        <i class="fa-solid fa-circle dot1"></i>
                        <i class="fa-solid fa-circle-dot dot2"></i>
                        <i class="fa-solid fa-circle dot3"></i>
                </div>
                <div class="form">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <h2>Please Verify Your Email</h2>
                    <p>We just sent an confirmation email to your email. <br> Check your email and click on the confirmation link to verify your account.</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn">
                            <!-- {{ __('Resend Email') }} -->
                            Resend Email
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>










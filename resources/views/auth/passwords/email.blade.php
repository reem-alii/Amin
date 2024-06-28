@extends('layouts.project')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin-Forgot Password</title>
    <link rel="shortcut icon" href="{{ asset('images/logo1.jpg')}}" type="image/x-icon">
    <!--Main Css File-->
    <link rel="stylesheet" href="{{asset ('css/loginstyle.css')}}">
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
    <section class="login-container reset-container">
        <div class="form-box">
            <a href="/login"><i class="fa-solid fa-arrow-left back-arrow"></i></a>
            <i class="fa-solid fa-xmark form-close login-close"></i>
            <!-- Reset Password From -->
            <div class="login-form">
                <div class="header">
                <h2>Reset Password</h2>
                <p>Enter your email to change your password</p>
                </div> 
                <div class="form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="post" >
                    @csrf
                    <div class="input-box">
                        <label for="email">Enter Your Email</label>
                        <input type="email" name="email" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <a>
                        <button type="submit"  class="button">
                            Send Link
                        </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

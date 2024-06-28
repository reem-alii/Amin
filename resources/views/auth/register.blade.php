@extends('layouts.project')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin-Sign Up</title>
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
    <script src="{{asset ('js/signup.js')}}" defer></script>
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
                <li><a href="/home"class="active">Home</a></li>
                <li><a href="/home#weather">Weather</a></li>
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
            <li><a href="" id="signout">Sign Out</a></li>
            </ul>
        </div>        </div>
    </nav>
    <section class="signup-container">
        <div class="form-box">
            <i class="fa-solid fa-xmark form-close signup-close"></i>
            <!-- Signup From -->
            
            <div class="signup-form">
                <div class="header">
                        <h2>Sign Up</h2>
                        <p>to be Āmin</p>    
                </div>
                <div class="progress-bar">
                    <div class="step">
                        <div class="bullet">
                        <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <div class="bullet">
                        <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <div class="bullet">
                        <span>3</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    </div>
                <div class="form form-outer" id="Signup-form">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="page slide-page">
                        <div class="input-box field half">
                            <div class="half-box">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name" >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="half-box">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name" >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-box field">
                            <label for="age">Age</label>
                            <input id="age" type="number" name="age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus placeholder="Age"   />
                            @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-box field">
                            <label for="id_number">ID Number</label>
                            <input type="number" name="id_number" placeholder="Id Number" id="id_number" required />
                        </div>
                        <div class="field">
                            <button  class="firstNext next button ">Next</button>
                        </div>
                        <div class="login-signup">Or Login with <a href="/login" id="login">Email</a></div>
                    </div>

                    <div class="page">
                    <div class="input-box field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-box field">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-box field">
                            <label for="confirm_password">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                        <div class="field btns">
                            <button class="prev-1 prev button">Previous</button>
                            <button class="next-1 next button">Next</button>
                        </div>
                        <div class="login-signup">Or Login with <a href="/login" id="login">Email</a></div>
                    </div>

                    <div class="page">
                        <div class="input-box field half">
                            <div class="half-box">
                                <label for="blood_type">Blood Type</label>
                                <input id="blood_type" type="text" name="blood_type"class="form-control @error('blood_type') is-invalid @enderror" name="blood_type" value="{{ old('blood_type') }}" required autocomplete="blood_type" autofocus   placeholder="Blood Type" >
                                @error('blood_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="half-box">
                                <label for="country">Country</label>
                                <input id="country" type="text" name="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus   placeholder="Country" >
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="field input-box">
                            <label for="address">Detailed address</label>
                            <input id="address" type="text" name="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus   placeholder="Detailed address" >
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="field input-box">
                            <label for="number">Phone number</label>
                            <input id="number" type="Number"  name="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus   placeholder="+00 000 000 000" >
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <label class="last-chek field">
                            <input type="checkbox" name="last-chek" id="last-chek">
                            <span class="radio-check"></span>
                            If you sure about registering, complete it.
                        </label>
                        <div class="field btns">
                            <button class="prev-2 prev button">Previous</button>
                            <button type="submit" class="Sign-Up button" id = 'Sign_Up_btn' >Sign Up</button>
                        </div>
                    </div>
                
                </form>
            </div>
            </div>
        </div>
    </section>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin-Edit Profile</title>
    <link rel="shortcut icon" href="{{asset('images/logo.svg')}}" type="image/x-icon">
    <!-- Bootstrap Utilities CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Main Css File-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- js file  -->
    <script src="{{asset('js/script.js')}}" defer></script>
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
                <li><a href="{{route('volunteering.create')}}" class="active">Volunteering</a></li>
                <li><a href="{{route('instructions.index')}}" class="active">Instructions</a></li>
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
    </nav>


    @if ( (Auth::check()) && ($predict_flood >= 50.0 || $predict_windstorm > 50.0))
    <div class="Pmain-buttons">  
        <form action="{{ route('update-user-state') }}" method="POST" class="safe-form">
            @csrf 
            <input type="hidden" name="state" value="safe"> 
            <button type="submit" class="safe-btn">SAFE</button>
        </form>
        <form action="{{ route('update-user-state') }}" method="POST" class="emergency-form">
            @csrf 
            <input type="hidden" name="state" value="emergency"> 
            <button type="submit" class="emergency-btn">Emergency</button>
        </form>
    </div>
    @endif 
    
    <section class="account-details">
        <h1>Account Details</h1>

        <div class="form" id="Profile-form">
            <form action="{{ route('updateProfile', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="image-div">

                    <img src="{{ $user->image_path ? asset($user->image_path) : asset('./images/user.png') }}">

                    <label for="file-path">
                        <i class="fa-solid fa-camera"></i>
                    </label>
                    <input type="file" name="image" id="file-path" accept="image/jpg,image/png,image/jpeg"
                        class="userfile">
                </div>
                <div class="input-box field half">
                    <div class="half-box">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first_name" id="first-name" value="{{ $user->first_name }}"
                            placeholder="Mohamed" required>
                    </div>
                    <div class="half-box">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last_name" id="last-name" value="{{ $user->last_name }}"
                            placeholder="Sherif" required>
                    </div>
                </div>
                <div class="input-box field">
                    <label for="age">Age</label>
                    <input type="number" name="age" value="{{ $user->age }}" placeholder="25" id="age" />
                </div>
                <div class="input-box field">
                    <label for="id-num">ID Number</label>
                    <input type="number" name="id-num" value="{{ $user->id_number }}"placeholder="27348290081" id="id-num" />
                </div>
                <div class="input-box field">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="Mohamed23@gmail.com"
                        id="email" required />
                </div>
                <div class="input-box field half">
                    <div class="half-box">
                        <label for="blood-type">Blood Type</label>
                        <input type="text" name="blood_type" value="{{ $user->blood_type }}" id="blood-type"
                            placeholder="A+">
                    </div>
                    <div class="half-box">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" value="{{ $user->country }}"
                            placeholder="San Francisco , CA" required>
                    </div>
                </div>
                <div class="field input-box">
                    <label for="address">Detailed address</label>
                    <input type="text" name="address" id="address" value="{{ $user->address }}"
                        placeholder="City,Street" required>
                </div>
                <div class="field input-box">
                    <label for="phone_number">Phone number</label>
                    <input type="Number" id="phone_number" name="phone_number" value="{{ $user->number }}"
                        placeholder="+1 617 132 853">
                </div>
                <div class="field input-box">
                    <button type="submit" class="edit button">Save changes</button>
                </div>
            </form>
            <footer>
                <div> 
                        <p>Emergency number</p> 
                        <span>19999</span>
                </div>
                    <p> All rights reserved.</p> 
            </footer>
        </div>
    </section>
    </body>

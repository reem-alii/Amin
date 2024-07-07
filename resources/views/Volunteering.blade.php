<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin</title>
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <!-- Bootstrap Utilities CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Main Css File-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/volunteering.css">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="css/normalize.css">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- js file  -->
    <script src="js/script.js" defer></script>
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
                <img  src="images/main-logo.svg" alt="#">
            </a>
            <ul class="nav-links">
                <i class="fa-solid fa-xmark navCloseBtn"></i>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="index.html#weather">Weather</a></li>
                <li><a href="{{route('volunteering.create')}}" class="active">Volunteering</a></li>
                <li><a href="{{route('instructions.index')}}" >Instructions</a></li>
                <li><a href="{{route('adminUser.index')}}" >Admin</a></li>
                <li><a href="adminPro.html" >Admin Pro</a></li>
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
              <li><a href="/profile">Profile</a></li>
              <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            log out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>


            @else
                <li><a href="/register">Sign up</a></li>
                <li><a href="/login">Login</a></li>
            @endif

               <!-- <li><a href="/register">Sign up</a></li>
                <li><a href="/login">Login</a></li>-->
            </ul>
            <ul class="user-links2">
            <li><a href="profile.html">Edit Profile</a></li>
            <li><a href="" id="signout">Sign Out</a></li>
            </ul>
        </div>
        </div>  
    </nav>
    <div class="Pmain-buttons">
        <button type="button" class="safe-btn">SAFE</button>
        <button type="button" class="emergency-btn">Emergency</button>
    </div>
    <main class="volunteering">
        <section class="main-volunteering">
            <div class="container">
                <!-- main content -->
                <div class="main-content">
                    <div class="head text-center">
                        <h1 class="mb-1  main-title">Volunteering</h1>
                        <p class="fs-3">to provide relief to <span class="fw-bold">those affected</span></p>
                    </div>

                    <div class="form-container  mx-auto pt-5">
                        <div class="form-head mb-4">
                            <h2 class=" main-title">Join Us</h2>
                            <p class="fs-4">Volunteer today, so that you can find <br>
                            someone to help you tomorrow</p>
                        </div>
                        <!-- error handling -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST"  action="{{route('volunteering.store')}}" class="position-relative">
                            @csrf
                                <div class="position-relative z-2">
                                    <div class="row full-name mb-4">
                                        <div class="col-md-5 first">
                                            <div class="form-group">
                                                <label class="mb-2 fw-bolder" for="">First Name</label>
                                                <input type="text" placeholder="First Name" class="form-control" name="firstName" value="{{old('firstName')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <div class="form-group">
                                                <label class="mb-2 fw-bolder" for="">Last Name</label>
                                                <input type="text" placeholder="Last Name" class="form-control" name="lastName" value="{{old('lastName')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder" for="">Email</label>
                                        <input type="email" class="form-control " placeholder="Email" name="volunteerEmail" value="{{old('volunteerEmail')}}">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder" for="">Number available to contact</label>
                                        <input type="number" class="form-control" placeholder="Number available to contact" name="phoneNumber" value="{{old('phoneNumber')}}">
                                    </div>

                                    <!-- Add -->

                                    <div class="form-group mb-4">
                                        <label class="fw-bolder" for="type-vol">Type of volunteering</label>
                                        <select id="type-vol" name="volunteeringType" class="form-select form-select-lg mb-3" aria-label="Large select example" aria-placeholder="vol">
                                            <option selected disabled>Select Volunteering Type</option>
                                            <option value="Personal">Personal Volunteering</option>
                                            <option value="Financial">Financial Volunteering</option> 
                                            <option value="Medical">Volunteering in hospitals</option>  <!-- home based care, clinical related services,blood donation -->
                                            <option value="Services">Disaster Services</option> <!-- Provide food, shelter, comfort and care for families --> 
                                        </select>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder" for="">Skills</label>
                                        <input type="text" name="skills" value="{{old('skills')}}" class="form-control" placeholder="Your Skills might include first aid, search and rescue, logistics management, crisis counseling, etc">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder" for="">Availability</label>
                                        <input type="text"  name="availability" value="{{old('availability')}}" class="form-control" placeholder="Availability time (full time , evenings , weekends ... etc)">
                                    </div>
                                    
                                    <!-- ..  -->

                                    <div class="form-group mb-4 d-flex align-items-baseline">
                                    <input type="radio" class="me-3" id="radio-input" name="verifyingCheck" value="1">
                                    <label for="radio-input">
                                        You must be registered on the site, if you are registered, you
                                        agree by submitting your form to have your data taken
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-safe  w-100">Join Us</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>Emergency number   |   19999</p> 
        <p>All rights reserved.</p> 
    </footer>
</body>
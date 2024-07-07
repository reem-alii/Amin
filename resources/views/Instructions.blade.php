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
                <li><a href="{{route('volunteering.create')}}">Volunteering</a></li>
                <li><a href="{{route('instructions.index')}}" class="active">Instructions</a></li>
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
    <main class="instruction">
        <section class="main-instruction">
            <div class="container-fluid">
                <div class="instructions-container position-relative py-4">
                    <div class="position-relative z-2">
                        <div class="head mb-5 text-center">
                            <h1 class="fs-1  mb-1 main-title"><span class="fw-bolder">Instructions</span> to be <span
                                    class="fw-bolder">Āmin</span></h1>
                        </div>
                        <div class="content-instruction p-5  mb-4">
                            <div class="head mb-4">
                                <h2>
                                    Essential steps to take when you recieve a windstorm disaster warning :
                                </h2>
                            </div>
                            <div class="instructions-list px-4">
                                <h3>
                                    Before windstorm disaster :
                                </h3>
                                <ol type="1">
                                    <li class=" mb-2">
                                        Continue listening to the weather bulletin, the instructions issued
                                        by the competent authorities, and the warnings issued about the
                                        possible occurrence of the insects that accompany hurricanes.
                                        These insects are considered among the worst causes of death.
                                    </li>
                                    <li class=" mb-2">
                                        Prepare enough equipment before the storm arrives to avoid the
                                        lack of time that hinders survival from such an incident.
                                    </li>
                                    <li class=" mb-2">
                                        Close the windows well or lock them with a special tape,
                                        Practice going to a designated safe shelter for high winds.
                                    </li>
                                    <li class=" mb-2">
                                        Keep things secured outside the home that may be blown by the wind, such as: 
                                    garden equipment and tools, children’s toys, pets, and any other things.
                                    </li>
                                    <li class=" mb-2">
                                        Work to store drinking water in clean containers
                                        and Be ready to live without power, gas, phone, and internet for a long time.
                                    </li>
                                    <li class=" mb-2">
                                        Keep a radio and spare batteries for it, because the radio will be the only means of communication.
                                    </li>
                                </ol>
                                <h3>
                                    During windstorm disaster :
                                </h3>
                                <ol type="1">
                                    <li class=" mb-2">
                                        Practice going to a designated safe shelter for high winds
                                    </li>
                                    <li class=" mb-2">
                                        Stay away from glass windows and doors.
                                    </li>
                                </ol>
                                <h3>
                                    After windstorm disaster :
                                </h3>
                                <ol type="1">
                                    <li class=" mb-2">
                                        Wear appropriate protective equipment including gloves, goggles and boots.                                    </li>
                                    <li class=" mb-2">
                                        Clean and disinfect everything that got wet.
                                    </li>
                                    <li class=" mb-2">
                                        When cleaning heavy debris, work with a partner, Make sure that you have proper training before using equipment.                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="content-instruction p-5 ">
                            <div class="head mb-4">
                                <h2>
                                    Essential steps to take when you recieve a flood disaster warning :
                                </h2>
                            </div>
                            <div class="instructions-list px-4">
                                <h3>
                                    Before flood disaster :
                                </h3>
                                <ol type="1">
                                    <li class=" mb-3">
                                        Prepare an Emergency Kit: Include essentials like water, food, flashlight, batteries, first aid, medications, important documents, cash, and blankets.
                                    </li>
                                    <li class=" mb-3">
                                        Make a Family Emergency Plan: Establish meeting points, communication strategies, and response plans
                                    </li>
                                    <li class=" mb-3">
                                        Protect Your Property: Elevate appliances, waterproof basements, and install sump pumps
                                    </li>
                                    <li class=" mb-3">
                                        Stay Informed: Monitor weather forecasts and sign up for this website to reciece warnings.
                                    </li>
                                </ol>
                                <h3>
                                    During flood disaster :
                                </h3>
                                <ol type="1">

                                    <li class=" mb-3">
                                        Stay Informed and Follow Instructions: Use a weather radio and follow evacuation orders.
                                    </li>
                                    <li class=" mb-3">
                                        Move to Higher Ground: Avoid flood-prone areas and move to higher levels.
                                    </li>
                                    <li class=" mb-3">
                                        Do Not Drive Through Floodwaters: Avoid driving or walking through floodwaters.
                                    </li>
                                    <li class=" mb-3">
                                        Avoid Contact with Floodwater: It may be contaminated.
                                    </li>
                                    <li class=" mb-3">
                                        Turn Off Utilities: Shut off gas, electricity, and water if instructed.
                                    </li>
                                </ol>
                                <h3>
                                    After flood disaster :
                                </h3>
                                        <ol type="1">
                                            <li class=" mb-3">
                                                Return Home Safely: Only return when authorities say it's safe and avoid flooded areas.                                            
                                            </li>
                                            <li class=" mb-3">
                                                Inspect Your Home: Check for structural damage and hazards.
                                            </li>
                                            <li class=" mb-3">
                                                Document Damage: Take photos and videos for insurance claims.                                            
                                            </li>
                                            <li class=" mb-3">
                                                Clean Safely: Wear protective clothing, disinfect, and remove wet items                                            
                                            </li>
                                            <li class=" mb-3">
                                                Prevent Mold Growth: Use fans, dehumidifiers, and clean all surfaces.
                                            </li>
                                            <li class=" mb-3">
                                                Seek Assistance: Contact disaster relief services and apply for aid.                                         
                                            </li>
                                            <li class="mb-3">
                                                Take Care of Your Health: Seek medical and mental health support as needed.
                                            </li>
                                        </ol>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="inst-footer">
        <p>Emergency number   |   19999</p> 
        <p>All rights reserved.</p> 
    </footer>
</body>
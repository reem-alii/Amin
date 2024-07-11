
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin-Home</title>
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




    <!-- Notification -->
        <div id="notification-container-c" class="hidden-c">
            <div id="notification-c" class="notification-c">
            <span id="notification-message-c"></span>
            <i id="close-notification-c" class="fa-solid fa-xmark"></i>
            </div>
        </div>
    <!-- Home -->
        <section class="home">
            <div>
                <img src="{{asset('images/logo5.svg')}}" alt="amin-logo">
            </div>
            <div>
                <p>For Forecasting and Civil Defense</p>
            </div>
            @unless (Auth::check())
                <div>
                    <a href="/register"><button class="green-btn">Sign Up</button> </a>
                </div> 
            @endunless 
        </section>
        <!-- Weather-->
        <section class="weather" id="weather">
            <div class="primary-paragraph">
                <p><strong>Āmin is the first platform</strong> for predicting natural disasters and organizing civil defense missions.</p>
            </div> 
            <div class="weather-content" id="main-weather">
                <!-- Left Weather Data-->
                <div class="start">
                    <p><span id="date">Date</span></p>
                    <p><span id="location">City</span></p>
                    <img src="" alt="icon" id="weather-icon">
                    <p><span id="description">Default</span></p>
                    <p><span id="avg-temp">Temp</span><span>&#176;</span></p>
                </div>
                <!-------------END-------------->
                <!-- Middle Weather Data-->
                <div class="middle">
                    <div class="top-forecast">
                        <div class="element-div">
                            <img src="" id = "25" alt="icon">
                            <p><span id="1"></span></p>
                            <p><span id="13"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "26" alt="icon">
                            <p><span id="2"></span></p>
                            <p><span id="14"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "27" alt="icon">
                            <p><span id="3"></span></p>
                            <p><span id="15"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "28" alt="icon">
                            <p><span id="4"></span></p>
                            <p><span id="16"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "29" alt="icon">
                            <p><span id="5"></span></p>
                            <p><span id="17"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "30" alt="icon">
                            <p><span id="6"></span></p>
                            <p><span id="18"></span>&#176;</p>
                        </div>
                    </div>
                    <div class="bottom-forecast">
                        <div class="element-div">
                            <img src="" id = "31" alt="icon">
                            <p><span id="7"></span></p>
                            <p><span id="19"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "32" alt="icon">
                            <p><span id="8"></span></p>
                            <p><span id="20"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "33" alt="icon">
                            <p><span id="9"></span></p>
                            <p><span id="21"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "34" alt="icon">
                            <p><span id="10"></span></p>
                            <p><span id="22"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "35" alt="icon">
                            <p><span id="11"></span></p>
                            <p><span id="23"></span>&#176;</p>
                        </div>
                        <div class="element-div">
                            <img src="" id = "36" alt="icon">
                            <p><span id="12"></span></p>
                            <p><span id="24"></span>&#176;</p>
                        </div>
                    </div>
                </div>
                <!-- ------END----------->
                <!-- Right Weather Data-->
                <div class="end">
                    <div class="end-div-element">
                        <h1>We wish you safety</h1>
                    </div>
                    <div class="end-div-element">
                        <div><p>Wind</p></div>
                        <p> <span id="wind"></span> m/s</p>
                    </div>
                    <div class="end-div-element">
                        <div><p>Humidity</p></div>
                        <p><span id="humidity"></span>%</p>
                    </div>
                    <div class="end-div-element">
                        <div><p>Atm Pressure</p></div>
                        <p><span id="pressure"></span> hPa</p>
                    </div>
                    <div class="end-div-element">
                        <div><p>Cloudiness</p></div>
                        <p><span id="clouds"></span>%</p>
                    </div>
                    <div class="end-div-element">
                        <div><p>Sunrise</p></div>
                        <p><span id="rise"></span></p>
                    </div>
                    <div class="end-div-element">
                        <div><p>Sunset</p></div>
                        <p><span id="set"></span></p>
                    </div>
                </div>
            </div> 
        </section>
        <!-- Statistics -->
        <section class="stats">
            <div class="primary-paragraph">
                <p>We care that you are <strong>Āmin</strong></p>
            </div>
            <div class="stat-content">
                <div class="stat-contain">
                    <div class="h3"><h3>Possibility of a windstorm:</h3></div>
                    <div class="chance"><div class="back"><div class="pie animate" id="pieChart1" data-percentage="{{ $predict_windstorm }}"> {{ $predict_windstorm }}%</div></div></div>
                </div>
                <div class="stat-contain">
                    <div class="h3"><h3>Possibility of flooding:</h3></div>
                    <div class="chance"><div class="back"><div class="pie animate" id="pieChart2" data-percentage="{{ $predict_flood }}"> {{ $predict_flood }}%</div></div></div>
                </div>
            </div>
        </section>
        <!-- Instructions -->
        <section class="instructions">
            <div class="primary-paragraph"><p><strong>Instructions</strong> to be <strong>Āmin</strong></p></div>
            <div class="instruct-content">
                <h1>Essential Steps to Take During a Windstorm Disaster:</h1>
                <ol>
                    <li>Continue listening to the weather bulletin, the instructions issued
                        by the competent authorities, and the warnings issued about the
                        possible occurrence of the insects that accompany hurricanes. These insects are considered among the worst causes of death.</li>
                    <li>Prepare enough equipment before the storm arrives to avoid the
                        lack of time that hinders survival from such an incident.</li>
                    <li>Leave flat areas that are vulnerable to hurricane waves.</li>
                </ol>
                <div><a href="/instructions"><button class="green-btn"> For More</button></a></div>
            </div>
        </section>
        <footer class="footer">
            <div class="primary-paragraph">
                <p>Emergency number |  19999</p>
                <p>All rights reserved.</p>
            </div>
        </footer>
       
</body>



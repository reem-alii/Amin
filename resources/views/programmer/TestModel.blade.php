<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin</title>
    <link rel="shortcut icon" href="{{asset('images/logo1.jpg')}}" type="image/x-icon">
    <!-- Bootstrap Utilities CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!--Main Css File-->
    <link rel="stylesheet" href="{{asset('css/admin_pro.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- js file  -->
    <script src="{{asset('js/script.js')}}" defer></script>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&display=swap"
        rel="stylesheet">
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
                <li><a href="/programmer/home">Home</a></li>
                <li><a href="/programmer/testmodel" class="active">Test Model</a></li>
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
                <li><a href="{{ route('programmer.logout') }}">Logout</a></li>
            </ul>
        </div>
        </div>        
    </nav>
    <main class="model-testing">
        <div style="padding-bottom: 2.5rem !important;" class="container py-4">
            <div style="padding-top: 20px; " class="head">
                <h1 class="text-white-bone text-big fw-bold text-center">Model Testing</h1>
            </div>
            <div class="forms row justify-content-between">
                <div class="windstorm  col-md-5 ">
                    <h2 class="text-white-bone text-meduim fw-semi text-center p-3 mb-3">Windstorm</h2>
                    <div class="inner bg-white-bone custom-p-3 rounded-4 mb-3">
                        <div class="text-center fw-bold mb-3"></div>
                        <form action="{{route('programmer.getWindstormPrediction')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group mb-3 d-flex justify-content-between ">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Temperature" name="temperature" id="temperature">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Relative Humidity" name="relativeHumidity"
                                    id="relativeHumidity">
                            </div>
                            <div class="form-group mb-3 d-flex justify-content-between ">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Pressure" name="pressure" id="pressure">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Wind Direction" name="windDirection"
                                    id="windDirection">
                            </div>
                            <div class="form-group mb-3 d-flex justify-content-between ">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Precipitattion" name="precipitattion" id="precipitattion">
                                <input class="form-control text-custom-color w-45" type="number" placeholder="Windgustspeed" name="windgustspeed"
                                    id="windgustspeed">
                            </div>
                        </form>
                    </div>
                    <div class="py-4 text-center">
                        <a href="/programmer/getWindstormPrediction">
                            <button type="submit" id="btn-windstorm" class="px-4 py-2 fs-4 border-0 rounded-1">Test</button>
                        </a>
                    </div>
                </div>
                <div class="flood col-md-5  ">
                    <h2 class="text-white-bone text-meduim fw-semi p-3 mb-3 text-center custom">Flood</h2>
                    <div class="inner bg-white-bone custom-p-3 rounded-4 mb-3">
                        <div class="text-center fw-bold mb-3">
                        </div>
                        <form action="{{route('programmer.getPrediction')}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="form-group mb-3 d-flex  justify-content-between ">
                                <input class="form-control text-custom-color w-24" type="number" name="JAN" id="JAN" placeholder="JAN">
                                <input class="form-control text-custom-color w-24" type="number" name="APR" id="APR" placeholder="APR">
                                <input class="form-control text-custom-color w-24" type="number" name="JUL" id="JUL" placeholder="JUL">
                                <input class="form-control text-custom-color w-24" type="number" name="OCT" id="OCT" placeholder="OCT">
                            </div>
                            <div class="form-group mb-3 d-flex  justify-content-between ">
                                <input class="form-control text-custom-color w-24" type="number" name="FEB" id="FEB" placeholder="FEB">
                                <input class="form-control text-custom-color w-24" type="number" name="MAY" id="MAY" placeholder="MAY">
                                <input class="form-control text-custom-color w-24" type="number" name="AUG" id="AUG" placeholder="AUG">
                                <input class="form-control text-custom-color w-24" type="number" name="NOV" id="NOV" placeholder="NOV">
                            </div>
                            <div class="form-group mb-3 d-flex  justify-content-between ">
                                <input class="form-control text-custom-color w-24" type="number" name="MAR" id="MAR" placeholder="MAR">
                                <input class="form-control text-custom-color w-24" type="number" name="JUN" id="JUN" placeholder="JUN">
                                <input class="form-control text-custom-color w-24" type="number" name="SEP" id="SEP" placeholder="SEP">
                                <input class="form-control text-custom-color w-24" type="number" name="DEC" id="DEC" placeholder="DEC">
                            </div>
                        </form>
                    </div>
                    <div class="py-4 text-center">
                        <a href="/programmer/getPrediction" method="post">
                            <button type="submit" id="btn-flood" class="px-4 py-2 fs-4  border-0 rounded-1">Test</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer id="modelFooter" class="py-2">
        <div class="container">
            <div class="number-container d-flex p-3">
                <div class="text px-3 ">
                    <p class="m-0 fw-medium">Emergency number</p>
                </div>
                <div class="number px-2">
                    <p class="m-0 fw-medium">19999</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
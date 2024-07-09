@extends('layouts/header')
@section("title") Āmin-Home @stop
@section ('content')

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
@endsection


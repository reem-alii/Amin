@extends("layouts/header")
@section('title', 'Home')
@section ('content')
<div class="anchor">
            <button class="green-btn">SAFE</button>
            <button class="red-btn">EMERGENCY</button>
        </div>            

    <!-- Home -->
    <section class="home">
        <div>
            <img src="{{asset('images/logo5.svg')}}" alt="amin-logo">
        </div>
        <div>
            <p>Forecasting and Civil Defense</p>
        </div>
        <div>
            <a href="signup.html"><button type="button" class="green-btn">Sign Up</button> </a>
        </div>  
    </section>
    <!-- Weather-->
    <section class="weather" id="weather">
        <div class="primary-paragraph">
            <p><strong>Āmin is the first platform</strong> for predicting natural disasters and organizing civil defense missions.</p>
            <div class="weather-content"></div>
        </div> 
    </section>
    <!-- Statistics -->
    <section class="stats">
        <div class="primary-paragraph">
            <p>We care that you are <strong>Āmin</strong></p>
        </div>
        <div class="stat-content"></div>
    </section>
    <!-- Instructions -->
    <section class="instructions">
        <div class="primary-paragraph"><p><strong>Instructions</strong> to be <strong>Āmin</strong></p></div>
        <div class="instruct-content">
            <h1>When your area meets a tornado warning you must do the following:</h1>
            <ol>
                <li>Continue listening to the weather bulletin, the instructions issued
                    by the competent authorities, and the warnings issued about the
                    possible occurrence of the insects that accompany hurricanes. These insects are considered among the worst causes of death.</li>
                <li>Prepare enough equipment before the storm arrives to avoid the
                    lack of time that hinders survival from such an incident.</li>
                <li>Leave flat areas that are vulnerable to hurricane waves.</li>
            </ol>
            <div><a href="instruction.html"><button class="green-btn"> For More</button></a></div>
        </div>
    </section>
    <footer class="footer">
        <div class="primary-paragraph"><p>EMERGENCY NUMBER   |   1999</p></div>
    </footer>



@endsection
<?php
// header("Refresh: 5;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin</title>
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <!--Main Css File-->
    <link rel="stylesheet" href="css/adminUser.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="css/normalize.css">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- js file  -->
    <script src="js/adminUser.js" defer></script>
    <script src="js/script.js" defer></script>


        

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="adminUser">
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
                <li><a href="{{route('instructions.index')}}" >Instructions</a></li>
                <li><a href="{{route('adminUser.index')}}" class="active">Admin</a></li>
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
    <h1 class="header">Admin Dashboard</h1>
    <div class="adminInfo">
            <h2>Data information</h2>
        <div class="head-container">
            <p>Windstorm and Flood</p>
            <div class="details">
                <p class="wind">Windstorm</p>
                <p class="flood">Flood</p>
            </div>
        </div>
        <div class="wind-container">
            <table class="wind-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Temp.</th>
                        <th>Pressure</th>
                        <th>Precip- itattion</th>
                        <th>Relative Humidity</th>
                        <th>Wind Direction</th>
                        <th>Wind gust speed</th>
                        <th>Prediction</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($windstorms as $windstorm)
                    <tr>
                        <td>{{$windstorm -> date}}</td>
                        <td>{{$windstorm -> temperature}}</td>
                        <td>{{$windstorm -> pressure}}</td>
                        <td>{{$windstorm -> precipitation}}</td>
                        <td>{{$windstorm -> relative_humidity}}</td>
                        <td>{{$windstorm -> wind_direction}}</td>
                        <td>{{$windstorm -> windgustspeed}}</td>
                        <td>{{$windstorm -> windstorm_pred}}%</td>
                    </tr>
                @endforeach   
                </tbody>
            </table>
        </div>
        <div class="flood-container">
            <table class="flood-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>M1</th>
                        <th>M2</th>
                        <th>M3</th>
                        <th>M4</th>
                        <th>M5</th>
                        <th>M6</th>
                        <th>M7</th>
                        <th>M8</th>
                        <th>M9</th>
                        <th>M10</th>
                        <th>M11</th>
                        <th>M12</th>
                        <th>Prediction</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($floods as $flood)
                    <tr>
                        <td>{{$flood -> date }}</td>
                        <td>{{$flood -> JAN}}</td>
                        <td>{{$flood -> FEB}}</td>
                        <td>{{$flood -> MAR}}</td>
                        <td>{{$flood -> APR}}</td>
                        <td>{{$flood -> MAY}}</td>
                        <td>{{$flood -> JUN}}</td>
                        <td>{{$flood -> JUL}}</td>
                        <td>{{$flood -> AUG}}</td>
                        <td>{{$flood -> SEP}}</td>
                        <td>{{$flood -> JAN}}</td>
                        <td>{{$flood -> NOV}}</td>
                        <td>{{$flood -> DECMB}}</td>
                        <td>{{$flood -> flood_Pred}}%</td>
                    </tr>
                @endforeach  
                </tbody>
            </table>
        </div>
    </div>
    <div class="boxs-container">
        <div class="box">
            <h3>{{$usersCount}}</h3>
            <p>Registrations</p>
            <div id="buton1" class="more-info" onclick="showPanel(0)">
                <p>More Info</p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </div>
        </div>
        <div class="box">
            <h3>{{$saveCount}}</h3>
            <p>Safe</p>
            <div id="buton2" class="more-info" onclick="showPanel(1)">
                <p>More Info</p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </div>
        </div>
        <div class="box">
            <h3>{{$emergencyCount}}</h3>
            <p>Emergency</p>
            <div id="buton3" class="more-info" onclick="showPanel(2)">
                <p>More Info</p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </div>
        </div>
        <div class="box">
            <h3>{{$volunteersCount}}</h3>
            <p>Volunteer</p>
            <div id="buton4" class="more-info" onclick="showPanel(3)">
                <p>More Info</p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="tablesContainer">
        <div class="container2">
        <div class="buttons">
            <div class="buttonContainer">
                <button onclick="showPanel(0)">All Users</button>
                <button onclick="showPanel(1)">Safe</button>
                <button onclick="showPanel(2)">Emergency</button>
                <button onclick="showPanel(3)">Volunteer</button>
            </div>
 
            <form method="GET" action="{{route('adminUser.update')}}">
            @csrf
            
            <button class="reset-btn" type="submit" >Reset Data</button>
            </form>

        </div>
        <div class="tabPanel">
                <div class="table-container AllUser-table">
                <table>
                    <thead class="table-header">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>ID N.</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>B.T.</th>
                            <th>State</th>
                            <th>Phone N.</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>
                                    <div class="tb-img">
                                    <img src="/images/user.png" alt="">
                                    </div>
                                </td><!--image-->
                                <td>{{$user -> national_id}}</td><!--id number-->
                                <td >{{$user -> first_name}}  {{$user -> last_name}}</td><!--name-->
                                <td>{{$user -> age}}</td><!--age-->
                                <td>{{$user -> blood_type}}</td><!--blood type-->
                                <td>
                                @if($user-> state== "safe") Safe
                                @elseif($user-> state== "emergency" )  Not Safe  
                                @elseif($user-> state==NULL) None @endif
                                </td><!--state -->
                                <td>{{$user -> phone_number}}</td><!--phone-->
                                <td>{{$user -> email}}</td><!--email-->
                                <td>{{$user -> country}}</td><!--country-->
                                <td>{{$user -> address}}</td><!--address-->
                                    <form  method="POST" action="{{route('user.destroy',$user['id'])}}" style="display:inline">
                                    @csrf
                                    @method("delete")
                                <td><button class="delete-btn">Delete</button></td>
                                    </form>
                            </tr>
                    @endforeach         
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tabPanel">
            <div class="table-container safe-table">
                <table>
                    <thead class="table-header">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>ID N.</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>B.T.</th>
                            <th>State</th>
                            <th>Phone N.</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    @if($user -> state == "safe")
                        <tr>
                            <td></td>
                            <td>
                                <div class="tb-img">
                                <img src="/images/user.png" alt="">
                                </div>
                            </td><!--image-->
                            <td>{{$user -> national_id}}</td><!--id number-->
                            <td>{{$user -> first_name}}  {{$user -> last_name}}</td><!--name-->
                            <td>{{$user -> age}}</td><!--age-->
                            <td>{{$user -> blood_type}}</td><!--blood type-->
                            <td>
                                @if($user-> state== "safe") Safe
                                @elseif($user-> state== "emergency" )  Not Safe  
                                @elseif($user-> state==NULL) None @endif
                            </td><!--state -->
                            <td>{{$user -> phone_number}}</td><!--phone-->
                            <td>{{$user -> email}}</td><!--email-->
                            <td>{{$user -> country}}</td><!--country-->
                            <td>{{$user -> address}}</td><!--address-->
                                    <form  method="POST" action="{{route('user.destroy',$user['id'])}}" style="display:inline">
                                    @csrf
                                    @method("delete")
                                <td><button class="delete-btn">Delete</button></td>
                                    </form>
                        </tr>
                    @endif
                    @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tabPanel">
            <div class="table-container emergency-table">
                <table>
                    <thead class="table-header">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>ID N.</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>State</th>
                            <th>Phone N.</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    @if($user -> state == "emergency" )
                        <tr>
                            <td></td>
                            <td>
                                <div class="tb-img">
                                <img src="/images/user.png" alt="">
                                </div>
                            </td><!--image-->
                            <td>{{$user -> national_id}}</td><!--id number-->
                            <td>{{$user -> first_name}}  {{$user -> last_name}}</td><!--name-->
                            <td>{{$user -> age}}</td><!--age-->
                            <td>{{$user -> blood_type}}</td><!--blood type-->
                            <td>
                                @if($user-> state== "safe") Safe
                                @elseif($user-> state== "emergency" )  Not Safe  
                                @elseif($user-> state==NULL) None @endif
                            </td><!--state -->
                            <td>{{$user -> phone_number}}</td><!--phone-->
                            <td>{{$user -> email}}</td><!--email-->
                            <td>{{$user -> country}}</td><!--country-->
                            <td>{{$user -> address}}</td><!--address-->
                                     <form  method="POST" action="{{route('user.destroy',$user['id'])}}" style="display:inline">
                                    @csrf
                                    @method("delete")
                                <td><button class="delete-btn">Delete</button></td>
                                    </form>
                        </tr>
                        @endif
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tabPanel">
            <div class="table-container volunteer-table">
                <table>
                    <thead class="table-header">
                        <tr>
                            <th></th>
                            <th>ID N.</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>B.T.</th>
                            <th>V.T.</th>
                            <th>Skills</th>
                            <th>Availability</th>
                            <th>Phone N.</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($volunteers as $volunteer)
                    

                        <tr>
                            <td></td>
                            <td>@foreach($users as $user) @if($volunteer->user_email ==$user->email) {{$user -> national_id}} @endif @endforeach</td><!--id number-->
                            <td>{{$volunteer -> first_name}}  {{$volunteer -> last_name}}</td><!--name-->
                            <td>@foreach($users as $user) @if($volunteer->user_email ==$user->email) {{$user -> age}} @endif @endforeach</td><!--age-->
                            <td>@foreach($users as $user) @if($volunteer->user_email ==$user->email) {{$user -> blood_type}} @endif @endforeach</td><!--blood type-->
                            <td>{{$volunteer -> volunteering_type}}</td><!--Volunteer Type-->
                            <td>{{$volunteer -> skills}}</td><!--Skills-->
                            <td>{{$volunteer -> availability}}</td><!--Availability-->
                            <td> {{$volunteer -> phone_number}}</td><!--phone-->
                            <td>{{$volunteer -> user_email}}</td><!--email-->
                            <td>@foreach($users as $user) @if($volunteer->user_email ==$user->email) {{$user -> country}} @endif @endforeach</td><!--country-->
                            <td>@foreach($users as $user) @if($volunteer->user_email ==$user->email) {{$user -> address}} @endif @endforeach</td><!--address-->
                                <form  method="POST" action="{{route('volunteer.destroy',$volunteer['id'])}}" style="display:inline">
                                @csrf
                                @method("delete")
                            <td><button class="delete-btn">Delete</button></td>
                                 </form>
                        </tr>
                             
                    @endforeach         
                    </tbody>
                </table>
            </div>
        </div>
        <div class="send-alarm-div">

        <form method="Post" action="{{route('send.alarms')}}">
            @csrf
            <button class="send-alarm">Send Alarm</button>
        </form>

        </div>
       
        </div>
        <footer>
            <div>
            <p>Emergency number</p> 
            <span>19999</span>
            </div>
            <p>All rights reserved.</p>
        </footer>
    </div>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin</title>
    <link rel="shortcut icon" href="images/logo1.jpg" type="image/x-icon">
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
                <li><a href="{{url('/home')}}">Home</a></li>
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
    <div class="tablesContainer">
        <div class="buttons">
            <div class="buttonContainer">
                <button  onclick="showPanel(0)">All Users</button>
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
                                @if($user-> state== "1") Save
                                @elseif($user-> state== "0" )  Not Save  
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
                    @if($user -> state == "1")
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
                                @if($user-> state== "1") Save
                                @elseif($user-> state== "0" )  Not Save  
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
                    @if($user -> state == "0" )
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
                                @if($user-> state== "1") Save
                                @elseif($user-> state== "0" )  Not Save  
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
        <div style="padding-bottom: 85px;"></div>
        <footer>
            <div>
            <p>Emergency number</p> 
            <span>19999</span>
            </div>
        </footer>
    </div>
</body>

@extends('layouts/header')
@section('title', 'Home')
@section('content')

    <div class="Pmain-buttons">
        <button type="button" class="safe-btn">SAFE</button>
        <button type="button" class="emergency-btn">Emergency</button>
    </div>
    <nav class="nav">
        <div class="main-nav">
            <i class="fa-solid fa-bars navOpenBtn"></i>
            <a href="#" class="logo">                    
                <img  src="{{asset('images/main-logo.svg')}}" alt="#">
            </a>
            <ul class="nav-links">
                <i class="fa-solid fa-xmark navCloseBtn"></i>
                <li><a href="{{url('/home')}}">Home</a></li>
                //<li><a href="index.html#weather">Weather</a></li>
                //<li><a href="volunteering.html">Volunteering</a></li>
                //<li><a href="instruction.html" >Instructions</a></li>
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
            <ul class="user-links2">
            <li><a href="{{url('/home')}}">Edit Profile</a></li>
            <li><a href="{{url('/logout')}}" id="signout">Sign Out</a></li>
            </ul>
        </div>
    </div>        
    </nav>
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
                    <input type="number" name="id-num" placeholder="27348290081" id="id-num" />
                </div>
                <div class="input-box field">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"placeholder="Mohamed23@gmail.com"
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
                    <input type="Number" id="phone_number" name="phone_number" value="{{ $user->phone_number }}"
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
@endsection

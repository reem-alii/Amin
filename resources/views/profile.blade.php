@extends("layouts/header")
@section('title', 'Home')
@section ('content')
<div class="Pmain-buttons">
        <button type="button" class="safe-btn">SAFE</button>
        <button type="button" class="emergency-btn">Emergency</button>
    </div>
    <section class="account-details">
        <h1>Account Details</h1>
        <div class="form" id="Profile-form">
            <form action="{{route('updateProfile',$user->id)}}" method="post">
                @csrf 
                <div class="image-div">
                    <img src="./images/user.png" alt="">
                    <label for="file-path">
                        <i class="fa-solid fa-camera"></i>
                    </label>
                    <input type="file" name="UserImage" id="file-path" accept="image/jpg,image/png,image/jpeg" class="userfile">
                </div>
                <div class="input-box field half">
                    <div class="half-box">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first_name" id="first-name"  value="{{$user->first_name}}" placeholder="Mohamed" required>
                    </div>
                    <div class="half-box">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last_name" id="last-name" value="{{$user->last_name}}" placeholder="Sherif" required >
                    </div>
                </div>
                <div class="input-box field">
                    <label for="age">Age</label>
                    <input type="number" name="age" value="{{$user->age}}" placeholder="25" id="age" />
                </div>
                <div class="input-box field">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$user->email}}"placeholder="Mohamed23@gmail.com" id="email" required/>
                </div>
                <div class="input-box field">
                    <label for="password">Current Password</label>
                    <input type="password" name="password" placeholder="Current Password" id="password">
                </div>
                <div class="input-box field">
                    <label for="npassword">New Password</label>
                    <input type="password" name="NewPassword" placeholder="New Password" id="password2" required>
                </div>
                <div class="input-box field">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" id="confirm_password" >
                </div>
                <div class="input-box field half">
                    <div class="half-box">
                        <label for="blood-type">Blood Type</label>
                        <input type="text" name="blood_type" value="{{$user->blood_type}}" id="blood-type" placeholder="A+" >
                    </div>
                    <div class="half-box">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" value="{{$user->country}}" placeholder="San Francisco , CA" required>
                    </div>
                </div>
                <div class="field input-box">
                    <label for="address">Detailed address</label>
                    <input type="text" name="address" id="address" value="{{$user->address}}" placeholder="City,Street" required>
                </div>
                <div class="field input-box">
                    <label for="phone_number">Phone number</label>
                    <input type="Number" id="phone_number" name="phone_number" value="{{$user->phone_number}}" placeholder="+1 617 132 853">
                </div>
                <div class="field input-box">
                    <button type="submit" class="edit button">Save changes</button>
                </div>
                </form>
                <footer>
                    <p>Emergency number</p> 
                    <span>19999</span>
                </footer>
                </div>
    </section>
</body>
@endsection

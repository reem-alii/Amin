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
            <form action="#" method="post">
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
                        <input type="text" name="FirstName" id="first-name" placeholder="Mohamed" required>
                    </div>
                    <div class="half-box">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="LastName" id="last-name" placeholder="Sherif" required >
                    </div>
                </div>
                <div class="input-box field">
                    <label for="age">Age</label>
                    <input type="number" name="Age" placeholder="25" id="age" />
                </div>
                <div class="input-box field">
                    <label for="email">Email</label>
                    <input type="email" name="Email" placeholder="Mohamed23@gmail.com" id="email" required/>
                </div>
                <div class="input-box field">
                    <label for="password">Current Password</label>
                    <input type="password" name="Password" placeholder="Current Password" id="password">
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
                        <input type="text" name="BloodType" id="blood-type" placeholder="A+" >
                    </div>
                    <div class="half-box">
                        <label for="country">Country</label>
                        <input type="text" name="Country" id="country" placeholder="San Francisco , CA" required>
                    </div>
                </div>
                <div class="field input-box">
                    <label for="address">Detailed address</label>
                    <input type="text" name="address" id="address" placeholder="City,Street" required>
                </div>
                <div class="field input-box">
                    <label for="number">Phone number</label>
                    <input type="Number" id="number" name="number" placeholder="+1 617 132 853">
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

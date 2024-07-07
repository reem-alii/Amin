<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Āmin</title>
    <link rel="shortcut icon" href="images/logo1.jpg" type="image/x-icon">
    <!--Main Css File-->
    <!-- <link rel="stylesheet" href="css/adminUser.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <!--Normalize ALL Elements-->
    <link rel="stylesheet" href="css/normalize.css">
    <!--Font Awesome Library-->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- js file  -->
    <script src="{{asset('js/adminUse.js')}}" defer></script>
    <script src="{{asset('js/script.js')}}" defer></script>
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
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#weather">Weather</a></li>
                <li><a href="volunteering.html">Volunteering</a></li>
                <li><a href="instruction.html" >Instructions</a></li>
                <li><a href="adminUser.html" class="active">Admin</a></li>
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
                <li><a href="signup.html">Sign up</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
            <ul class="user-links2">
            <li><a href="profile.html">Edit Profile</a></li>
            <li><a href="" id="signout">Sign Out</a></li>
            </ul>
        </div>
        </div>        
    </nav>
    <div class="tablesContainer" style="margin-top: 150px;">
        <div class="buttonContainer">
            <button  onclick="showPanel(0)">All Users</button>
            <button onclick="showPanel(1)">Safe</button>
            <button onclick="showPanel(2)">Emergency</button>
            <button onclick="showPanel(3)">Volunteer</button>
        </div>
        <div class="tabPanel">
            <div class="table-container">
            <table id="allUsers-header">
                <thead class="table-header">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Phone N.</th>
                        <th>ID N.</th>
                        <th>B.T.</th>
                        <th>State</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>kgjksj</td>
                        <td>fdsjllkj</td>
                        <td>9217417983</td>
                        <td>21313244</td>
                        <td>A</td>
                        <td>null</td>
                        <td>24</td>
                        <td>rewfgaaww</td>
                        <td>rewfgaawgwrew</td>
                    </tr> -->
                </tbody>
            </table>
            </div>
        </div>
        <div class="tabPanel">
            Content2
        </div>
        <div class="tabPanel">
            Content3
        </div>
        <div class="tabPanel">
            Content4
        </div>
    </div>
</body>

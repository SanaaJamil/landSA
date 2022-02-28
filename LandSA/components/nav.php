<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
<?php
    include "connection.php";
    session_start();?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <style>
.header {
    background-color: #ffffff;
    justify-content: flex-start; /*push every thing to the right*/
    align-items: center;
    padding: 20px 10% 20px 7%; /*20px from top and bottom, 10 from the sides*/
    margin-bottom: 10px;
    box-shadow: 0px 9px 6px 0px #00000070;
    display: flex;
    flex-flow: row wrap;
    width: 100%;
}
.logo_Phone{
    display: none;
}
.logo_Disk{
    margin-left: auto;
    height:100px ;
}
.logo {
    cursor: pointer; /*the mouse will become finger when hovering*/
    margin-left: auto; /*push the logo to the left away from navagation*/
}

.navlinks {
    list-style: none;
}

/*each indivital link*/
.nav_links Li {
    display: inline-block; /*view side by side*/
}

.nav_links li a {
    transition: all 0.3s ease 0s;
    font-size: 20px;
    text-align: right;
}

.nav_links li a:hover {
    color: #0088a9
}

#logout{
    background-color: #67b293;
    border-radius: 100px;
    cursor: pointer;
    margin-right: 30px;
}
/* Dropdown list style */


.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  /* padding: 14px 16px; */
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn ,.nav_links Li:hover {
  background-color: #d3ecdb;
  border-radius: 50px;
}

.topnav {
  overflow: hidden;
}
.topnav li {
    float: right;
  display: block;
  text-align: center;
}
.topnav a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
    background-color: #abd3b8;
    border-radius: 50px;
}

.topnav .icon {
  display: none;
}
.icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {  
  border: none;
  outline: none;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #dbdadaad;
  min-width: 300px;

  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-bottom: 1px;
  border-radius: 10px;
}

.dropdown-content li {
  float: none;
  text-decoration: none;
  display: block;
  text-align: right;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #d3ecdb;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .logo_Disk{
      display: none;
  }
  .logo_Phone{
      display: block;
  }
  img.logo_Phone {
  align-self: center;
  }
  .topnav a, .topnav input[type=text] {
  float: none;
  display: block;
  text-align: left;
  width: 100%;
  margin: 0;
  padding: 10px; 
  }
  .topnav li:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
  a.icon {
    float: right;
    display: block;
    padding: 0px 10px;
  }
  nav {
    display: flex;
    width: 100%;
    flex-direction: column;
  }
  ul.nav_links {
    width: 98%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  .header {
    display: flex;
    flex-flow: row wrap;
    width: 100%;
    flex-wrap: nowrap;
    align-items: flex-start;
    padding: 20px 0% 20px 0%;
}
    .dropdown-content {
    border-radius: 0px 0px 50px 50px;
    }
}

@media screen and (max-width: 600px) {
    .topnav.responsive {
    float: right;
    display: flex;
    text-align: right;
    width: 100%;
    }
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .icon {
    float: right;
    display: block;
  }
  .topnav.responsive li {
    float: right;
    display: flex;
    text-align: right;
    width: 100%;
  }
  .topnav.responsive .dropdown {
    float: none;
    width: 100%;
    display: flex;
    flex-direction: column;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: right;
  }

}
    </style>
</head>
<body>


    <!-- <input type='checkbox' id='check'>
        <label for='check' class='checkbtn'>
            <i class='fas fa-bars'></i>
        </label> -->
    <!-- <img class="logo" src="../LandSA/images/logo.gif " alt="logo" height="100px"> -->
    <?php
    // Display the full navigation bar if the user is registered
    if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
        echo"<nav>
        <img class='logo_Phone' src='../LandSA/images/logo.gif ' alt='logo' height='100px'>
            <div class='header'>
                <img class='logo_Disk' src='../LandSA/images/logo.gif ' alt='logo' height='100px'>
                <a href='javascript:void(0);' style='font-size:30px;' class='icon' onclick='myFunction()'>&#9776;</a>
                <div class='topnav' id='myTopnav'>
                    <ul class='nav_links'>
                        <li class='active'><a   href='../LandSA/homePage.php'>الرئيسة</a></li>
                        <li><a href='../LandSA/landBrowsePage.php'>تصفح الاراضي</a></li>
                        <li>
                        <div class='dropdown'>
                                <a >خدماتي <img src='../LandSA/images/down.png' alt='logOut' height='12px'> </a>
                            <div class='dropdown-content'>
                            <!--&emsp; add four spaces  -->
                                <a href='../LandSA/registerLand.php'>&emsp;&emsp; تسجيل أرض</a>
                                <a href='../LandSA/controlLandspage.php'>&emsp;&emsp;ادارة الأراضي</a>
                                <a href='../LandSA/landInheritanceForm.php'>&emsp;&emsp;طلب وراثة</a>
                            </div>
                        </div> 
                        </li>
                        <li><a href='../LandSA/profilePage.php'>الملف الشخصي</a></li>
                        <li id='logout' style='background-color: rgba(0,0,0,0)'><a href='../log/logout.php'><img class='logo' src='../LandSA/images/off.png' alt='logOut' height='20px'></a></li>
                    </ul>
                </div>
            </div>
    </nav>";
	}
    else{
        echo"<nav>
                <img class='logo_Phone' src='../LandSA/images/logo.gif ' alt='logo' height='100px'>
                <div class='header'>
                    <img class='logo_Disk' src='../LandSA/images/logo.gif ' alt='logo' height='100px'>
                    <a href='javascript:void(0);' style='font-size:30px;' class='icon' onclick='myFunction()'>&#9776;</a>
                    <div class='topnav' id='myTopnav'>
                        <ul class='nav_links'>
                            <li class='active'><a   href='../LandSA/homePage.php'>الرئيسة</a></li>
                            <li><a href='../LandSA/landBrowsePage.php'>تصفح الاراضي</a></li>
                            
                            <li id='logout'><a href='../log/login.php'>تسجيل الدخول</a></li>
                        </ul>
                    </div>
                    </div>
            </nav>";

    }
    ?>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>

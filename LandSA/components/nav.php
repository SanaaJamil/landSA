<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
#logout{
    background-color: #67b293;
    border-radius: 50px;
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
  background-color: #c6e7d1;
  border-radius: 50px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #dbdadae6;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 5px;
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
  background-color: #dae7f3b3;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
</head>
<div class="header">
    <img class="logo" src="../LandSA/images/logo.gif " alt="logo" height="100px">
    <?php
    include "connection.php";
    session_start();
    // Display the full navigation bar if the user is registered
    if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
        echo"<nav>
        <ul class='nav_links'>
            <li><a href='../LandSA/homePage.php'>الرئيسة</a></li>
            <li><a href='../LandSA/landBrowsePage.php'>تصفح الاراضي</a></li>
            <li>
            <div class='dropdown'>
                <!-- <div class='drop'> -->
                    <a>خدماتي</a> <i class='fa fa-caret-down'></i>
                <!-- </div> -->
                <div class='dropdown-content'>
                    <a href='../LandSA/registerLand.php'>تسجيل أرض</a>
                    <a href='../LandSA/controlLandspage.php'>ادارة الأراضي</a>
                    <a href='../LandSA/landInheritanceForm.php'>طلب وراثة</a>
                </div>
            </div> 
            </li>
            <li><a href='../LandSA/profilePage.php'>الملف الشخصي</a></li>
            <li id='logout'><a href='../log/logout.php'>تسجيل الخروج</a></li>
        </ul>
    </nav>";
	}
    else{
        echo "<nav>
            <ul class='nav_links'>
                <li><a href='../LandSA/homePage.php'>الرئيسة</a></li>
                <li><a href='../LandSA/landBrowsePage.php'>تصفح الاراضي</a></li>
                

                <li id='logout'><a href='../log/login.php'>تسجيل الدخول</a></li>
            </ul>
        </nav>";

    }
    ?>
</div>
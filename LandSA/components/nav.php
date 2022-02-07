<head>
    <style>

    </style>
</head>
<div class="header">
    <img class="logo" src="images/Picture1.gif" alt="logo" height="100px">
    <?php
    include "../connection.php";
    session_start();
    if(isset($_SESSION['loggedUser'])&&$_SESSION['loggedUser']==true){
        echo"<nav>
        <ul class='nav_links'>
            <li><a href='#'>الرئيسة</a></li>
            <li><a href='#'>تصفح الاراضي</a></li>
            <li><a href='#'>خدماتي</a></li>
            <li><a href='#'>الملف الشخصي</a></li>
            <li><a href='../sign_log/logout.php'>تسجيل الخروج</a></li>
        </ul>
    </nav>";
	}
    else{

    }
    ?>
    <!-- Navagation bar start-->
    <nav>
        <ul class='nav_links'>
            <li><a href='#'>الرئيسة</a></li>
            <li><a href='#'>تصفح الاراضي</a></li>
            <li><a href='#'>خدماتي</a></li>
            <li><a href='#'>الملف الشخصي</a></li>
            <li><a href='../sign_log/logout.php'>تسجيل الخروج</a></li>
        </ul>
    </nav>


    <!-- end--> 
</div>
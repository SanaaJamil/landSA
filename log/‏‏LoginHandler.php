<?php
$ID = $_POST["ID"];
$Password = $_POST["Password"];

include "../LandSA/components/connection.php";

$login= "SELECT ID,Password FROM users WHERE ID= '$ID' and Password='$Password'";

$result = mysqli_query($con,$login); 

$count = mysqli_num_rows($result);
    //echo "<h2>cc</h2>";

if($count == 1){
	session_start();
	$_SESSION['loggedUser'] = $ID;
    header('Location: ../LandSA/homePage.php');

}
else{
    echo "<script>alert('رقم الهوية أو كلمة المرورو غير صحيحة')</script>";
    echo "<script>setTimeout(\"location.href = 'Login.php';\",0);</script>";
}

?>
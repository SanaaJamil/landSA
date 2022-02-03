<?php
$ID = $_POST["ID"];
$Password = $_POST["Password"];

include "../connection.php";

$login= "SELECT ID,Password FROM users WHERE ID= '$ID' and Password='$Password'";

$result = mysqli_query($con,$login); 

$count = mysqli_num_rows($result);
    //echo "<h2>cc</h2>";

if($count == 1){
	session_start();
	$_SESSION['loggedin'] = $ID;
    header('Location: ../homePage.php');

}
else{
echo "<script>alert('رقم الهوية أو كلمة المرورو غير صحيحة')</script>";
    header('Location: login.php');

}

?>
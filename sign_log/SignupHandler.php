<?php

include "../connection.php";
if (isset($_POST['Submit']))
$ID = $_POST["ID"];
$IDType = $_POST["IDType"];
$fristName = $_POST["fristName"];
$middleName = $_POST["middleName"];
$lastName = $_POST["lastName"];
$BirthDate = $_POST["BirthDate"];
$IBAN = $_POST["IBAN"];
$phoneNum = $_POST["phoneNum"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$UserType = 0;
$password_confirm = $_POST['password_confirm'];

$select = mysqli_query($con, "SELECT * FROM users WHERE ID = '".$_POST['ID']."'");
if(mysqli_num_rows($select)) {
	echo "<script>alert('لديك حساب مسبقا,قم بتسجيل الدخول')</script>";
    echo "<script>setTimeout(\"location.href = 'Login.php';\",0);</script>";

}
else{
          $insertUser = "INSERT INTO users(ID,IDType,fristName,middleName,lastName,Password,phoneNum,Email,IBAN,BirthDate,UserType) 
          value('$ID','$IDType','$fristName','$middleName','$lastName','$Password','$phoneNum','$Email','$IBAN','$BirthDate','$UserType')";
           $result = mysqli_query($con,$insertUser); #send query to the databaes to use insert method

          if($result){
     header('Location: login.php');
	}
     else {
	die("Error: ".mysqli_errno($con)); }
  	}


?>

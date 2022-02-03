<?php
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

include "../connection.php";

$insertUser = "INSERT INTO users(ID,IDType,fristName,middleName,lastName,Password,phoneNum,Email,IBAN,BirthDate,UserType) 
value('$ID','$IDType','$fristName','$middleName','$lastName','$Password','$phoneNum','$Email','$IBAN','$BirthDate','$UserType')";
$result = mysqli_query($con,$insertUser); #send query to the databaes to use insert method

echo "ass ";
if($result){

	 echo "<h1>User created Successfully</h1>";
     header('Location: login.php');
}
else {
	die("Error: ".mysqli_errno($con));
}

?>
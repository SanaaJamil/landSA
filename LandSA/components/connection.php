<?php
//to display errors
//  error_reporting(E_ALL);
//  ini_set('display_errors', 1);
//get the values 
//$Base = $_POST["base"];
//$Shoulder = $_POST["shoulder"];

//connect and check connection
$con = mysqli_connect("localhost","root","") or die("Error: Can't Connect to Server");
$db = mysqli_select_db($con,"landsa") or die("Error: Can't Connect to DB");

?>
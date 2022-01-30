//browseLands

<?php
//to show errors
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
//make connection and print error msgs
$con = mysqli_connect("localhost","root","landsa") or die("Error Can't Connect to Server");
$db = mysqli_select_db($con,"landsa") or die("Error Can't Connect to DB");
  //receive information from db by using queries 
$sql= mysqli_query($con, "SELECT * FROM inheritancerecord ORDER BY innerID DESC LIMIT 1");
 //for printing  
while ($row = mysqli_fetch_assoc($sql)) { 
     echo (' ownerID  ');
    echo $row['ownerID '];
  

}
//end &close 
mysqli_close($con);
?>
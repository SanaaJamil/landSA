<?php
// ---------------Browse lands ------------
//to show errors
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 //make connection and print error msgs
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landsa";
//make connection and print error msgs
$con = mysqli_connect("localhost","root","","landsa") or die("Error Can't Connect to Server");
$db = mysqli_select_db($con,"landsa") or die("Error Can't Connect to DB");
//select coloumns to be printed on land browse page according to land state
$sql = "SELECT neighborhoodName, address, city FROM landrecord WHERE landState='yes'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "city: " . $row["city"]. " - neighborhoodName: " . $row["neighborhoodName"]. " " . $row["address"]. "<br>";
  }
} else {//if no results 
  echo "0 results";
}
$con->close();
?>

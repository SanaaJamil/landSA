
<?php
//to display errors
 error_reporting(E_ALL);
 ini_set('display_errors', 1);


// -- بنية الجدول `inheritancerecord`


//CREATE TABLE `inheritancerecord` (
//  `ownerID` varchar(11) NOT NULL,
//  `courtOrder` longblob NOT NULL,
//  `REUN` varchar(64) NOT NULL,
//  `requestID` varchar(11) NOT NULL,
//  `UserID` varchar(64) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


//get the values 
$courtOrder = $_POST["courtOrder"];
$OwnerID = $_POST["OwnerID"];
$REUN = $_POST["REUN"];


//connect and check connection
$con = mysqli_connect("localhost","root","","landsa") or die("Error: Can't Connect to Server");
$db = mysqli_select_db($con,"landsa") or die("Error: Can't Connect to DB");

if(isset($_POST["submit"])){
        $stmt=$con->prepare("INSERT INTO inheritancerecord (courtOrder,OwnerID,REUN) VALUES (?,?,?)");
        $stmt -> bind_param("iii",$courtOrder,$OwnerID,$REUN);
        $stmt->execute();
        echo "Saved successfully";
        echo "<br/>";
        }

?>     
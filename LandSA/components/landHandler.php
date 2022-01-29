<?php
if(isset($_POST['submit'])){

    $con = mysqli_connect("localhost", "root", "") or die("Error: can't connect to servier!!!");
    $db = mysqli_select_db($con, "landsa") or die("Error: can't connect to database :(");

    //user info
    $name = $_POST["name"];
    $nationality = $_POST["nationality"];
    $share = $_POST["share"];
    $address = $_POST["address"];
    $IDType = $_POST["IDType"];
    //$IDNumber  = $_POST["IDNumber"];
    //land info
    $pieceNumber = $_POST["pieceNumber"];
    $blockNumber = $_POST["blockNumber"];
    $planNumber = $_POST["planNumber"];
    $neighborhoodName = $_POST["neighborhoodName"];
    $city = $_POST["city"];
    $REUN = $_POST["REUN"];
    $unitType = $_POST["unitType"];
    $deedNumber = $_POST["deedNumber"];
    $deedDate = $_POST["deedDate"];
    $courtIssued = $_POST["courtIssued"];
    $spaceInNumbersLength = $_POST["spaceInNumbersLength"];
    $spaceInNumbersWidth = $_POST["spaceInNumbersWidth"];
    $spaceInWritingLength = $_POST["spaceInWritingLength"];
    $spaceInWritingWidth = $_POST["spaceInWritingWidth"];
    $bordersNorth = $_POST["bordersNorth"];
    $bordersSouth = $_POST["bordersSouth"];
    $bordersEast = $_POST["bordersEast"];
    $bordersWest = $_POST["bordersWest"];
    $lengthNorth = $_POST["lengthNorth"];
    $lengthSouth = $_POST["lengthSouth"];
    $lengthEast = $_POST["lengthEast"];
    $lengthWest = $_POST["lengthWest"];
    //location info
    $LongitudeA = $_POST["LongitudeA"];
    $LongitudeB = $_POST["LongitudeB"];
    $LongitudeC = $_POST["LongitudeC"];
    $LongitudeD = $_POST["LongitudeD"];
    $LatitudeA = $_POST["LatitudeA"];
    $LatitudeB = $_POST["LatitudeB"];
    $LatitudeC = $_POST["LatitudeC"];
    $LatitudeD = $_POST["LatitudeD"];
    $locationMap = $_POST["locationMap"];
    $ElectronicTitleDeed = $_POST["ElectronicTitleDeed"];
    

    $insertLand = "INSERT INTO landrecord(name, nationality, share, address, IDType, pieceNumber, blockNumber, planNumber, neighborhoodName, city, REUN, unitType, deedNumber, deedDate, courtIssued) 
    value('$name', '$nationality', '$share', '$address', '$IDType', '$pieceNumber', '$blockNumber', '$planNumber', '$neighborhoodName', '$city', '$REUN', '$unitType', '$deedNumber', '$deedDate', '$courtIssued')";
    $query = mysqli_query($con, $insertLand);

    if($query){
        $insertLandInfo = "INSERT INTO landinfo(spaceInNumbersLength, spaceInNumbersWidth, spaceInWritingLength, spaceInWritingWidth, bordersNorth, bordersSouth, bordersEast, bordersWest, lengthNorth, lengthSouth, lengthEast, lengthWest, LongitudeA, LongitudeB, LongitudeC, LongitudeD, LatitudeA, LatitudeB, LatitudeC, LatitudeD, locationMap, ElectronicTitleDeed) 
        VALUE('$spaceInNumbersLength', '$spaceInNumbersWidth', '$spaceInWritingLength', '$spaceInWritingWidth', '$bordersNorth', '$bordersSouth', '$bordersEast', '$bordersWest', '$lengthNorth', '$lengthSouth', '$lengthEast', '$lengthWest', '$LongitudeA', '$LongitudeB', '$LongitudeC', '$LongitudeD', '$LatitudeA', '$LatitudeB', '$LatitudeC', '$LatitudeD', '$locationMap', '$ElectronicTitleDeed')";
        echo "تم ارسال الطلب بنجاح";
        echo "<a href='../homePage.php'>view home</a>";
    }else{
        die("Error: ".mysqli_erron($con));
        echo "there was an error submiting the form";
    }
}

?>

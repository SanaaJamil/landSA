<?php
    #Check the connections with the server and DB
	include "connection.php";
	
	#Check if the user is still logedin
	session_start();
	if(isset($_SESSION['loggedUser'] )&& $_SESSION['loggedUser']==true){

        //user info
        $name = $_POST["name"];
        $nationality = $_POST["nationality"];
        $share = $_POST["share"];
        $address = $_POST["address"];
        $IDType = $_POST["IDType"];
        $IDdate = $_POST["IDdate"];
        $IDNumber= $_SESSION['loggedUser'];
        // $IDNumber  = $_POST["IDNumber"];

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

        $image =$ElectronicTitleDeed= $_FILES['ElectronicTitleDeed']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 

        $Check="SELECT * FROM landrecord WHERE REUN = '$REUN'";
        $Check = mysqli_query($con,$Check);
        $count = mysqli_num_rows($Check);

        if($count == 0){
            $insertLand = "INSERT INTO landrecord(name, nationality, share, address, IDType, IDdate, IDNumber, pieceNumber, blockNumber, planNumber, neighborhoodName, city, REUN, unitType, deedNumber, deedDate, courtIssued) 
            value('$name', '$nationality', '$share', '$address', '$IDType', '$IDdate', '$IDNumber', '$pieceNumber', '$blockNumber', '$planNumber', '$neighborhoodName', '$city', '$REUN', '$unitType', '$deedNumber', '$deedDate', '$courtIssued')";
            $query = mysqli_query($con, $insertLand);

            if($query){
                $insertLandInfo = "INSERT INTO landinfo(spaceInNumbersLength, spaceInNumbersWidth, spaceInWritingLength, spaceInWritingWidth, bordersNorth, bordersSouth, bordersEast, bordersWest, lengthNorth, lengthSouth, lengthEast, lengthWest, LongitudeA, LongitudeB, LongitudeC, LongitudeD, LatitudeA, LatitudeB, LatitudeC, LatitudeD, locationMap, ElectronicTitleDeed, REUN) 
                VALUE('$spaceInNumbersLength', '$spaceInNumbersWidth', '$spaceInWritingLength', '$spaceInWritingWidth', '$bordersNorth', '$bordersSouth', '$bordersEast', '$bordersWest', '$lengthNorth', '$lengthSouth', '$lengthEast', '$lengthWest', '$LongitudeA', '$LongitudeB', '$LongitudeC', '$LongitudeD', '$LatitudeA', '$LatitudeB', '$LatitudeC', '$LatitudeD', '$locationMap', '$ElectronicTitleDeed', '$REUN')";
                $query = mysqli_query($con, $insertLandInfo);
                // insert the title image to images Table

                $insert = $con->query("INSERT into images (image, created, REUN) VALUES ('$imgContent', NOW(),$REUN)"); 

                echo "<script>alert('تم إرسال الطلب بنجاح')</script>";
				echo "<script>setTimeout(\"location.href = '../homePage.php';\",1500);</script>";
            }else{
                echo "there was an error submiting the form";
                // die("Error: ".mysqli_erron($con));
            }
        }else{
            echo "<script>alert('توجد ارض مسجلة مسبقًا برقم الوحدة العقارية المدخل')</script>";
            echo "<script>setTimeout(\"location.href = '../registerLand.php';\",1500);</script>";
        }
    }else{
        echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
        echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
    }
?>

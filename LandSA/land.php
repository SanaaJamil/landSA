<?php
    #Check the connections with the server and DB
    session_start();
	if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
		include "./components/connection.php";
		if ($_SERVER["REQUEST_METHOD"]=="GET"){
			$REUN = $_GET['REUN'];
		}

		$viewLand = "SELECT * FROM landrecord NATURAL JOIN landinfo WHERE REUN = $REUN AND landrecord.REUN=landinfo.REUN;";
		$result = mysqli_query($con,$viewLand);

		if(!$result){
			die("Error: ".mysqli_erron($con));
		}

		$row = mysqli_fetch_array($result);
	
		$IDNumber = $row["IDNumber"];
		$name = $row["name"]; 

		//user info
        $nationality = $row["nationality"];
        $share = $row["share"];
        $address = $row["address"];
        $IDType = $row["IDType"];
        $IDdate = $row["IDdate"];
        // $IDNumber  = $row["IDNumber"];

        //land info
        $pieceNumber = $row["pieceNumber"];
        $blockNumber = $row["blockNumber"];
        $planNumber = $row["planNumber"];
        $neighborhoodName = $row["neighborhoodName"];
        $city = $row["city"];
		
        // $REUN = $row["REUN"];
        $unitType = $row["unitType"];
        $deedNumber = $row["deedNumber"];
        $deedDate = $row["deedDate"];
        $courtIssued = $row["courtIssued"];
        $spaceInNumbersLength = $row["spaceInNumbersLength"];
        $spaceInNumbersWidth = $row["spaceInNumbersWidth"];
        $spaceInWritingLength = $row["spaceInWritingLength"];
        $spaceInWritingWidth = $row["spaceInWritingWidth"];
        $bordersNorth = $row["bordersNorth"];
        $bordersSouth = $row["bordersSouth"];
        $bordersEast = $row["bordersEast"];
        $bordersWest = $row["bordersWest"];
        $lengthNorth = $row["lengthNorth"];
        $lengthSouth = $row["lengthSouth"];
        $lengthEast = $row["lengthEast"];
        $lengthWest = $row["lengthWest"];
        //location info

        $LongitudeA = $row["LongitudeA"];
        $LongitudeB = $row["LongitudeB"];
        $LongitudeC = $row["LongitudeC"];
        $LongitudeD = $row["LongitudeD"];
        $LatitudeA = $row["LatitudeA"];
        $LatitudeB = $row["LatitudeB"];
        $LatitudeC = $row["LatitudeC"];
        $LatitudeD = $row["LatitudeD"];
		$angleA = $row["angleA"];
        $angleB = $row["angleB"];
        $angleC = $row["angleC"];
        $angleD = $row["angleD"];


	}else{
		echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
		echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
	}
?>

<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
	<html lang="ar" style='direction: rtl'>
		<head>
			<title>Home Page</title>
			<link rel="stylesheet" href="style.css">
			<script src="components/ComponentHandler.js" ></script>
		</head>
		<style>
			table, th, td{
				border: 1.5px solid rgb(73, 73, 73);
			}
			table {
				width: 100%;
				height: 100%;
				border-collapse: collapse;
			}
			table.fixed{
				table-layout:fixed;
			}
			table.fixed td { overflow: hidden; }
			table .title{
				font-weight: bold;
			}
			p,h2,h3{
				margin-bottom: 20px; 
			}
			.location{
				width: 100%;
    			height: auto;
			}
			.col{
				float: left;
				padding: 10px;
				height: 300px;
			}
			.left{
				width: 40%;
			}
			.right{
				width: 60%;
			}
			.row{
				display: flex;
				flex-direction: column;
				margin: 20px 0;
			}
			.row:after{
				content: "";
				display: table;
				clear: both;
			}
		</style>

		<script>      // Initialize and add the map
            function initMap() {
                // The location of Uluru
                const uluru = { lat: 24.7136, lng: 46.6753 };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: uluru,
                });
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                position: uluru,
                    map: map,
                });
            }
        </script>

		<body>
		<!--header call-->
		<div id="Head" w3-include-html="components/nav.php"></div>
        

		<!-- Page content -->
		<main>
			<aside></aside><!--just to make it look better with flex display-->

            <div class="container">
				<div class="row">
					<h2>رقم الوحدة العقارية: </h3><p><?php print($REUN);?></p>
					<h3>معلومات المالك</h3>
					<table class="fixed">
						<tbody>
							<col width="10px" />
							<col width="100px" />
							<col width="40px" />
							<col width="40px" />
							<col width="40px" />
							<col width="40px" />
							<col width="40px" />
							<col width="40px" />
							<tr class='title'>
								<td>م</td>
								<td>اسم المالك</td>
								<td>الجنسية</td>
								<td>الحصة/النسبة</td>
								<td>العنوان</td>
								<td>نوع الهوية</td>
								<td>رقم الهوية</td>
								<td>تاريخ الهوية</td>
							</tr>
							<tr>
								<td></td>
								<td> <?php print($name);?> </td>
								<td> <?php print($nationality);?> </td>
								<td> <?php print($share);?> </td>
								<td> <?php print($address);?> </td>
								<td> <?php print($IDType);?> </td>
								<td> <?php print($IDNumber);?> </td>
								<td> <?php print($IDdate);?> </td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row">
					<h3>معلومات الوحدة العقارية</h3>
					<table>
						<tbody>
							<col width="30px" />
							<col width="80px" />
							<col width="40px" />
							<col width="100px" />
							<col width="100px" />
							<col width="30px" />
							<tr>
								<td class="title">رقم القطعة</td>
								<td><?php print($pieceNumber);?></td>
								<td class="title">الاتجاهات</td>
								<td colspan="2" class="title">الحدود</td>
								<td class="title">الاطوال</td>
							</tr>
							<tr>
								<td class="title">رقم البلك</td>
								<td><?php print($blockNumber);?></td>
								<td rowspan="2" class="title">شمالا</td>
								<td rowspan="2"><?php print($bordersNorth);?></td>
								<td rowspan="2"><?php print($bordersNorth);?></td>
								<td rowspan="2"><?php print($lengthNorth);?></td>
							</tr>
							<tr>
								<td class="title">رقم المخطط</td>
								<td><?php print($planNumber);?></td>
							</tr>
							<tr>
								<td class="title">اسم الحي</td>
								<td><?php print($neighborhoodName);?></td>
								<td rowspan="2" class="title">جنوبا</td>
								<td rowspan="2"><?php print($bordersSouth);?></td>
								<td rowspan="2"><?php print($bordersSouth);?></td>
								<td rowspan="2"><?php print($lengthSouth);?></td>
							</tr>
							<tr>
								<td class="title">المدينة</td>
								<td><?php print($city);?></td>
							</tr>
							<tr>
								<td class="title">نوع الوحدة</td>
								<td><?php print($unitType);?></td>
								<td rowspan="2" class="title">شرقا</td>
								<td rowspan="2"><?php print($bordersEast);?></td>
								<td rowspan="2"><?php print($bordersEast);?></td>
								<td rowspan="2"><?php print($lengthEast);?></td>
							</tr>
							<tr>
								<td class="title">رقم الصك</td>
								<td><?php print($deedNumber);?></td>

							</tr>
							<tr>
								<td class="title">تاريخ الصك</td>
								<td><?php print($deedDate);?></td>
								<td rowspan="2" class="title">غربا</td>
								<td rowspan="2"><?php print($bordersWest);?></td>
								<td rowspan="2"><?php print($bordersWest);?></td>
								<td rowspan="2"><?php print($lengthWest);?></td>
							</tr>
							<tr>
								<td class="title">مصدر الصك</td>
								<td><?php print($courtIssued);?></td>

							</tr>
							<tr>
								<td class="title">المساحة</td>
								<td><?php print($spaceInNumbersLength);?></td>
								<td class="title">كتابة</td>
								<td colspan="3"><?php print($spaceInWritingLength);?></td>
								
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row" style="flex-direction: row;">
					<div class="col left">
						<h3>خريطة الموقع</h3>
						<?php include "mapView.php"; ?>
					</div>
					<div class="col right">
						<h3>احداثيات واركان الوحدة العقارية</h3>
						<table>
							<tbody>
								<tr class="title">
									<td>النقطة</td>
									<td>خط الطول</td>
									<td>خط العرض</td>
									<td>زوايا الانكسار</td>
								</tr>
								<tr>
									<td class="title">أ</td>
									<td><?php print($LatitudeA);?></td>
									<td><?php print($LongitudeA);?></td>
									<td><?php print($angleA);?></td>
								</tr>
								<tr>
									<td class="title">ب</td>
									<td><?php print($LatitudeB);?></td>
									<td><?php print($LongitudeB);?></td>
									<td><?php print($angleB);?></td>
								</tr>
								<tr>
									<td class="title">ج</td>
									<td><?php print($LatitudeC);?></td>
									<td><?php print($LongitudeC);?></td>
									<td><?php print($angleC);?></td>
								</tr>
								<tr>
									<td class="title">د</td>
									<td><?php print($LatitudeD);?></td>
									<td><?php print($LongitudeD);?></td>
									<td><?php print($angleD);?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<br><br><br>
				<div class="row" style="flex-direction: row;">
					<?php
					// 33المشكلة العبيطة
					$viewLand = "SELECT * FROM landrecord NATURAL JOIN landinfo WHERE REUN = $REUN AND landrecord.REUN=landinfo.REUN;";
					$result = mysqli_query($con,$viewLand);
					$row = mysqli_fetch_array($result);
					$REUN = $row["REUN"]; 

					echo" 
					<form method='GET' action='Offers.php'>
						<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
						<button class='sellB' type='submit' name='sell' >تقديم عرض</button>
					</form>";
					
					echo"
						<form method='GET' action='contactOwner.php'>
						<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
						<button class='giftB' type='submit' >التفاوض مع المالك</button>
						</form>";

					?>
				</div>
				

			</div>

			<aside></aside><!--just to make it look better with flex display-->
		</main>
		

		<!--footer call-->
		<div w3-include-html="components/footer.php"></div>

		<script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl39nJCT9GvsrbmIlEexdz9LPr7v_9s3E&callback=initMap">
        </script>
		<script>
		includeHTML();
		</script>
	</body>
</html>

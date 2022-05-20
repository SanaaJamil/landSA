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
		
		$userInfo = "SELECT * FROM users WHERE users.ID = $IDNumber";
		$userRes = mysqli_query($con,$userInfo);
		$userRow = mysqli_fetch_array($userRes);

		//user info
		$firstName = $userRow["firstName"];
		$middleName = $userRow["middleName"];
		$lastName = $userRow["lastName"];
		$nationality = $userRow["nationality"];
		$address = $userRow["address"];
		$IDType = $userRow["IDType"];
		$IDdate = $userRow["IDdate"];
		
		$share = $row["share"];

		//land info
		$pieceNumber = $row["pieceNumber"];
		$blockNumber = $row["blockNumber"];
		$planNumber = $row["planNumber"];
		$neighborhoodName = $row["neighborhoodName"];
		$city = $row["city"];
		
		$unitType = $row["unitType"];
		$deedNumber = $row["deedNumber"];
		$deedDate = $row["deedDate"];
		$courtIssued = $row["courtIssued"];
		$spaceInNumbers = $row["spaceInNumbers"];
		$spaceInWriting = $row["spaceInWriting"];
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

		//map info
		$viewMap = "SELECT * FROM map WHERE REUN = $REUN";
		$mapRes = mysqli_query($con,$viewMap);

		$mapRow = mysqli_fetch_array($mapRes);

		$REUN = $mapRow["REUN"];
		$lat = $mapRow["latitude"];
		$long = $mapRow["longitude"];
	

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
			/* Set the size of the div element that contains the map */
			#map {
				height: 300px;
				/* The height is 400 pixels */
				width: 100%;
				/* The width is the width of the web page */
				background-color: rgba(103,178,147, 0.8);
			}
			.container{
				width: 1000px;
				display: block;
				padding: 50px;
				margin: 20px;
				background: #ffffff;
				border-radius: 6px;
			}

			h1{
				color: black;
				text-align: center;
			}

			td{
				text-align: center; 
				padding :8px; 
			} 
			
			th { 
				text-align: center; 
				padding :8px; 
				background-color: #3781a1;
				color: white;
			}

			table{
				line-height:40px;  
				border-collapse: collapse;
				background-color: #ffff;
				box-shadow: 1px 1px 8px 0 grey;
				height: auto;
				margin-bottom: 20px;
				padding: 20px 0 20px 50px;
				width: 100%; 
			}
			tr:nth-child(odd) {
				background-color: #b3d3e2;
			}
			tr {border-bottom: 1px solid #dddddd;}

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
			#id01{display: none;}

			/* The Close Button (x) */
			.close {
				right: 50px;
				top: 75px;
				font-size: 40px;
				font-weight: bold;
				color: #d1d1d1;
			}

			.close:hover, .close:focus {
				color: #f44336;
				cursor: pointer;
			}

			.overlay-style {
				position: fixed;
				display: none;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				overflow: auto;
				padding-top: 50px;
				background-color: rgba(0, 0, 0, 0.5);
			}

			.block {
				padding: 16px;
				width: 700px;
				margin: auto;
				background-color: #fff;
			}

			.Namefeild{
				text-align: center;
				width: 80%;
				margin:0 auto;
				border: 1.5px rgba(0, 0, 0, 0.5);
			}
			table.Namefeild{
			border-collapse: collapse;
			width: 80%;
			}
			.Namefeild input[type=text] {
				width: 98.5%;
			}
			.card {
				background-color: #fff;
				border-radius: 18px;
				box-shadow: 1px 1px 8px 0 grey;
				height: auto;
				margin-bottom: 20px;
				padding: 20px 0 20px 0px;
				width: 100%;
			}
		</style>

		<script>      // Initialize and add the map
			// In the following example, markers appear when the user clicks on the map.
			var marker;
			var longitude;
			var latitude;
			var map;

			function initMap() {
				<?php
					echo "var lats ='$lat';";
					echo "var longs ='$long';";
				?>

				var uluru = { lat: <?php echo($lat)?>, lng: <?php echo($long)?> };

				map = new google.maps.Map(document.getElementById("map"), {
				zoom: 17,
				center: uluru,
				});

				new google.maps.Marker({
				position: uluru,
				map
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
					<h1>رقم الوحدة العقارية: <?php echo "<h1>$REUN</h1>";?></h1>
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
								<th>م</th>
								<th>اسم المالك</th>
								<th>الجنسية</th>
								<th>الحصة/النسبة</th>
								<th>العنوان</th>
								<th>نوع الهوية</th>
								<th>رقم الهوية</th>
								<th>تاريخ الهوية</th>
							</tr>
							<tr>
								<td></td>
								<td> <?php echo $firstName . ' ' . $middleName . ' ' . $lastName; ?> </td>
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
							<tr>
								<th>رقم القطعة</th>
								<td><?php print($pieceNumber);?></td>
								<th>الاتجاهات</th>
								<th>الحدود</th>
								<th>الاطوال</th>
							</tr>
							<tr>
								<th>رقم البلك</th>
								<td><?php print($blockNumber);?></td>
								<th rowspan="2">شمالا</th>
								<td rowspan="2"><?php print($bordersNorth);?></td>
								<td rowspan="2"><?php print($lengthNorth);?></td>
							</tr>
							<tr>
								<th>رقم المخطط</th>
								<td><?php print($planNumber);?></td>
							</tr>
							<tr>
								<th>اسم الحي</th>
								<td><?php print($neighborhoodName);?></td>
								<th rowspan="2">جنوبا</th>
								<td rowspan="2"><?php print($bordersSouth);?></td>
								<td rowspan="2"><?php print($lengthSouth);?></td>
							</tr>
							<tr>
								<th>المدينة</th>
								<td><?php print($city);?></td>
							</tr>
							<tr>
								<th>نوع الوحدة</th>
								<td><?php print($unitType);?></td>
								<th rowspan="2">شرقا</th>
								<td rowspan="2"><?php print($bordersEast);?></td>
								<td rowspan="2"><?php print($lengthEast);?></td>
							</tr>
							<tr>
								<th>رقم الصك</th>
								<td><?php print($deedNumber);?></td>

							</tr>
							<tr>
								<th>تاريخ الصك</th>
								<td><?php print($deedDate);?></td>
								<th rowspan="2">غربا</th>
								<td rowspan="2"><?php print($bordersWest);?></td>
								<td rowspan="2"><?php print($lengthWest);?></td>
							</tr>
							<tr>
								<th>مصدر الصك</th>
								<td><?php print($courtIssued);?></td>

							</tr>
							<tr>
								<th>المساحة</th>
								<td><?php print($spaceInNumbers);?></td>
								<th>كتابة</th>
								<td colspan="2"><?php print($spaceInWriting);?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row" style="flex-direction: row;">
					<div class="col left">
						<h3>خريطة الموقع</h3>
						<!--The div element for the map -->
    					<div id="map"></div>
					</div>
					<div class="col right">
						<h3>احداثيات واركان الوحدة العقارية</h3>
						<table>
							<tbody>
								<tr>
									<th>النقطة</th>
									<th>خط الطول</th>
									<th>خط العرض</th>
									<th>زوايا الانكسار</th>
								</tr>
								<tr>
									<th>أ</th>
									<td><?php print($LatitudeA);?></td>
									<td><?php print($LongitudeA);?></td>
									<td><?php print($angleA);?></td>
								</tr>
								<tr>
									<th>ب</th>
									<td><?php print($LatitudeB);?></td>
									<td><?php print($LongitudeB);?></td>
									<td><?php print($angleB);?></td>
								</tr>
								<tr>
									<th>ج</th>
									<td><?php print($LatitudeC);?></td>
									<td><?php print($LongitudeC);?></td>
									<td><?php print($angleC);?></td>
								</tr>
								<tr>
									<th>د</th>
									<td><?php print($LatitudeD);?></td>
									<td><?php print($LongitudeD);?></td>
									<td><?php print($angleD);?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<br><br><br>

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

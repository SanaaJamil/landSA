<?php
	// --------------- Browse lands PHP ------------
	//to show errors
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//make connection 
	include "components/connection.php";

	//select coloumns to be printed on land browse page according to land state

	if(!empty($_GET['city']) && empty($_GET['price'])){
		//if the the user search for city
		$city = $_GET['city'];
		$sql_lands = "SELECT * FROM searchEngine WHERE  city = '$city'";
		$result = $con->query($sql_lands);

	}elseif(empty($_GET['city']) && !empty($_GET['price'])){
		//if the the user search for price
		$price = $_GET['price'];
		$sql_lands = "SELECT * FROM searchEngine WHERE price = '$price'";
		$result = $con->query($sql_lands);

	}elseif(!empty($_GET['city']) && !empty($_GET['price'])){
		//if the the user search for city and price
		$city = $_GET['city'];
		$price = $_GET['price'];
		$sql_lands = "SELECT * FROM searchEngine WHERE price = '$price' AND city='$city'";
		$result = $con->query($sql_lands);

	}elseif(empty($_GET['city']) && empty($_GET['price'])){
		//show all alnds on sale for user
		$sql_lands = "SELECT landsonsale.REUN,deedDate,unitType,city,neighborhoodName,landState, price FROM landrecord,landsonsale WHERE landrecord.REUN=landsonsale.REUN";
		$result = $con->query($sql_lands);
	}else{
		//show all alnds on sale for user
		$sql_lands = "SELECT landsonsale.REUN,deedDate,unitType,city,neighborhoodName,landState, price FROM landrecord,landsonsale WHERE landrecord.REUN=landsonsale.REUN";
		$result = $con->query($sql_lands);
	}

	if(isset($_GET['reset'])){
		header("Location: landBrowsePage.php"); 
		exit();
	}

	if(isset($_GET["area"])){
		$area = $_GET["area"];

		if($area == "center"){
			$sql_lands = "SELECT * FROM searchEngine WHERE city = 'الرياض'";
			$result = $con->query($sql_lands);
		}elseif($area == "north"){
			$sql_lands = "SELECT * FROM searchEngine WHERE city = 'تبوك'";
			$result = $con->query($sql_lands);
		}elseif($area == "south"){
			$sql_lands = "SELECT * FROM searchEngine WHERE city = 'الباحة'";
			$result = $con->query($sql_lands);
		}elseif($area == "east"){
			$sql_lands = "SELECT * FROM searchEngine WHERE city = 'الباحة'";
			$result = $con->query($sql_lands);
		}elseif($area == "west"){
			$sql_lands = "SELECT * FROM searchEngine WHERE city = 'مكة المكرمة' OR city = 'المدينة المنورة' OR city = 'جدة'";
			$result = $con->query($sql_lands);
		}else{
			exit();
		}
	}
	
?>

<!-- -----------Brows lands page HTML ----------------- -->

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>Land Browse Page </title>
	<link rel="stylesheet" href="style.css">
	<script src="components/ComponentHandler.js" ></script>

	<style>
		input[type="radio"] { /* change "blue" browser chrome to yellow */
		filter: invert(60%) hue-rotate(150deg) brightness(1.7);
		}
		
		/* Style of each land */
		.land_container {
			padding: 0 6px;
			float: right;
			width: 33.3333%;
		}
		.land {
			background-color: #203864; /* Green background */
			/* color: white; White text */
			padding: 10px 24px; /* Some padding */
			cursor: pointer; /* Pointer/hand icon */
			margin: 8px 4px;
			display: flex;
			justify-content: space-between;
			background-color: #fff;
			border-radius: 18px;
			box-shadow: 1px 1px 8px 0 grey;
			height: auto;
			width: 100%;
			flex-wrap: wrap;
		}
		.land p{
			display: flex;
			text-align: right;
			flex-wrap: wrap;
			
		}
		.land button{
			display: inline-flex;
			flex: left;
			text-align: left;
			margin-top: 10px;
		}
		.block{
			display: flex;
			flex-direction: column;
    		align-items: stretch;
		}
		/* style of buttons */
		.moreB{
			background-color: rgba(63, 112, 108, 1);
		}
		/* Style of switch button */

		@media only screen and (max-width: 700px) {
			.land_container {
			width: 49.99999%;
			margin: 6px 0;
			height: 17%;
		}
		
		}
		.land {
			padding: 10px 5px;
		}
		.land img {
			width: 99%;
			margin-top: 4%;
		}

		@media only screen and (max-width: 500px) {
		.land_container {
			width: 100%;
			height: auto;
		}}
		/* /////mine////// */
		.slidecontainer {
		width: 100%; /* outside container width */
			margin-bottom: 20px; 
			margin-top: 20px;
		}

		/* The slider */
		.slider {
		-webkit-appearance: none;  /* Override default CSS styles */
		appearance: none;
		width: 100%; /* Full-width */
		height: 25px; /* Specified height */
		background: #d3d3d3; /* Grey background */
		outline: none; /* Remove outline */
		opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
		-webkit-transition: .2s; /* 0.2 seconds transition on hover */
		transition: opacity .2s;
		border: 50px;
		}

		/* Mouse-over effects */
		.slider:hover {
		opacity: 1; /* Fully shown on mouse-over */
		}

		/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
		.slider::-webkit-slider-thumb {
		-webkit-appearance: none; /* Override default look */
		appearance: none;
		width: 25px; /* Set a specific slider handle width */
		height: 25px; /* Slider handle height */
		background: #04AA6D; /* Green background */
		cursor: pointer; /* Cursor on hover */
		}

		.slider::-moz-range-thumb {
		width: 25px; /* Set a specific slider handle width */
		height: 25px; /* Slider handle height */
		background: #04AA6D; /* Green background */
		cursor: pointer; /* Cursor on hover */
		}


		#site-footer { /* to add some style in footer and header*/
			margin-top: 150px;
		width:	100%;
		height: 5%;
		background: #04AA6D;

		}
		#site-header{ /* to add some style in footer and header*/
		margin-top: 10px;
		margin-bottom: 10px;
		width:  100%;
		height: 5%;
		background: #04AA6D;
		}

		/* radio button style for the search */
		input.radio{
			color: black;
			width: 30px;
			height: 15px;
			left: -8px;
			margin: 7px;
			position: relative;
			display: inline-block;
			visibility: visible;
		}
		h3{
			margin:10px;
			color: black;
		}
	</style>
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.php"></div>
	
	<main>
		<aside></aside>
		<div class="content">
			<div class="topnav">
				<div class="slidecontainer">
					<!-- SEARCH BY CITIY NAME -->
					<form name="form1" method="get">
						<h3> <strong>اختر إسم المدينة:  </strong></h3>
						<input type="radio" class="radio" name="city" value="مكة المكرمة" >مكة المكرمة	
						<input type="radio" class="radio" name="city" value="المدينة المنورة" > المدينة المنورة
						<input type="radio" class="radio" name="city" value="الرياض" >الرياض
						<input type="radio" class="radio" name="city" value="الدمام" >الدمام
						<input type="radio" class="radio" name="city" value="تبوك" >تبوك
						<input type="radio" class="radio" name="city" value="جدة" >جدة
						<input type="radio" class="radio" name="city" value="الباحة" >الباحة
						
						<h3> <strong>أدخل السعر:  </strong></h3>
						<div class="form"><input class="form" type="text"  placeholder="السعر" name="price"></input></div>
						<br>

						<button type="submit" name="submit">بحث</button>
						<button type="submit" name="reset">ازالة</button>
					</form>   
				</div>
				<br>

				<div class="content" >
					<h1>قائمة الاراضي</h1><br>
					<div class="landList" >
						<?php
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									
									//info we need to show from database
									$REUN = $row["REUN"];
									$neighborhoodName = $row["neighborhoodName"];
									$city = $row["city"];
									$price = $row["price"];


									echo "<div class='land_container'>";
									echo "<div class='land'>";
									// Informations block

									echo"<div class='block'>";
										echo "<table id='UserData'>";
											echo "<tr>
												<th>رقم الوحدة العقارية: </th>
												<th>$row[REUN]</th>
												</tr>";
											echo "<tr>
												<td>&emsp;</td>
												<td>&emsp;</td>
												</tr>";
											echo "<tr>
												<td>المدينة: </td>
												<td> $row[city]</td>
												</tr>";
											echo "<tr>
												<td>اسم الحي:</td>
												<td> $row[neighborhoodName]</td>
												</tr>";
											echo "<tr>
												<td>نوع الوحدة:</td>
												<td> $row[unitType]</td>
												</tr>";
											echo "<tr>
												<td>تاريخ الصك:</td>
												<td> $row[deedDate]</td>
												</tr>";
											echo "<tr>
												<td><b>السعر :</b></td>
												<td><b>$row[price]</b></td>
												</tr>";
											echo"</table>";
										echo"</div>";
			
										// only regesterd can view  details, if user is not regesterd, transfer him to login page

										echo"<div>";
											echo"
											<form method='GET' action='landView.php'>
												<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
												<button class='giftB' type='submit' >تفاصيل</button>
											</form>";
										echo"</div>";
											
										echo"</div>";
									echo"</div>";
								}
							} else {
								echo "0 results";
							}					
						?>
					</div>
				</div>
			</div>
		</div>
        <aside></aside>
	</main>

	<!-- footer -->
	<div w3-include-html="components/footer.php"></div>

	<script>
	includeHTML();
	</script>
</body>
</html>

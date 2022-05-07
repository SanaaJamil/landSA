<?php
// --------------- Browse lands PHP ------------
//to show errors
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
//make connection and print error msgs
include "components/connection.php";

	//select coloumns to be printed on land browse page according to land state
	$sql_lands = "SELECT landsonsale.REUN,deedDate, address,unitType,city,neighborhoodName,landState, price FROM landrecord,landsonsale WHERE landrecord.REUN=landsonsale.REUN";
	$result = $con->query($sql_lands); 
	$num_rows = mysqli_num_rows($result); //number of rows
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	//variables and their values
		$neighborhoodName = $row["neighborhoodName"];
		$address = $row["address"];
		$city = $row["city"];
		$price = $row["price"];
	//search Engine 

?>
<!-- -----------Brows lands page HTML ----------------- -->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>Land Browse Page </title>
	<link rel="stylesheet" href="style.css">
	<script src="components/ComponentHandler.js" ></script>

	<style>

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
		/////mine
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
		#map {
        height: 300px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
        background-color: rgba(103,178,147, 0.8);
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
			<form >
			<!--	<input type="text" placeholder="	إبحث">

				// send the search attribute 
				<button ><input type="submit" value="إبحث" ></button>  
			-->

				<div class="slidecontainer">
				<!-- create a filter for price by slider -->
				<div class="slidecontainer"> 
				<text> <strong>السعر:  </strong></text>
				<input type="range" min="10000" max="10000000" value="10000" class="slider" name="price"> <label>العدد المدخل:  <span class="limit"></span></label> 
				</div>
				<br/><br/>
				<!-- create a filter for space by slider -->
				<div class="slidecontainer"> 
				<text><strong> المساحة بالمتر المربع: </strong></text>
				<input type="range" min="100" max="5000" value="100" class="slider" name="space"> <label>العدد المدخل: <span class="limit"></span></label>
				</div>
				<br/><br/>
				<!-- create filter -->
				<div>
				<text><strong> الواجهة: </strong></text>
				<button ><input type="submit" name="north" value="شمال" ></button>
				<button ><input type="submit" name="west" value="غرب" ></button>
				<button ><input type="submit" name="south" value="جنوب" ></button>
				<button ><input type="submit" name="east" value="شرق" ></button>
				</div><br/><br/>
				<!-- create city filter -->
				<div>
				<text><strong> المدينة: </strong></text>
				<button ><input type="submit" name="Makkah" value="مكة المكرمة" ></button>
				<button ><input type="submit" name="Jeddah" value="جدة" ></button>
				<button ><input type="submit" name="Riyadh" value="الرياض" ></button>
				<button ><input type="submit" name="Madinah" value="المدينة المنورة" ></button>
				<button ><input type="submit" name="Dammam" value=" الدمام" ></button>
				<button ><input type="submit" name="Abha" value=" ابها" ></button>
				<button ><input type="submit" name="Tabok" value=" تبوك" ></button>

				</div><br/><br/>


				<button ><input type="submit" value="إبحث" ></button>

				
			</form>
		</div>
		<br>
	
			<div class="content" >
				<h1>قائمة الاراضي</h1><br>
				<div class="landList" >
					<?php
					$sql_lands = "SELECT landsonsale.REUN,deedDate, address,unitType,city,neighborhoodName,landState, price FROM landrecord,landsonsale WHERE landrecord.REUN=landsonsale.REUN";
					$result = $con->query($sql_lands);

					$viewMap = "SELECT * FROM map";
					$result2 = mysqli_query($con,$viewMap);
					$json=json_encode( $result2 );
					echo "
						<scrpit> var json={$json}; </scrpit>
					";
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							$REUN = $row["REUN"];
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
										<td>الموقع:  </td>
										<td>$row[address]</td>
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
	
								// echo "<img src='images/Riyadh.jpg' alt='موقع الأرض' width='25%'> ";
								

								$row2 = mysqli_fetch_array($result2);

								$lat = $row2["latitude"];
								$long = $row2["longitude"];

								print($lat);
								print($long);

								foreach( $result2 as $index => $result2 ){
									echo "<div class='my_map' data-id='{$index}'></div>";
								}
								
								

								echo "<input id='latitude'></input>";
								echo "<input id='longitude'></input>";

								// only regesterd can view  details, if user is not regesterd, transfer him to login page

								echo"<div>";
									echo"
									<form method='GET' action='land.php'>
										<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
										<button class='giftB' type='submit' >تفاصيل</button>
									</form>";
									echo" 
									<form method='GET' action='Offers.php'>
										<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
										<button class='sellB' type='submit' name='sell' >تقديم عرض</button>
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


		<script type= text/javascript>
			includeHTML();
			function display_data($data) {
				$output = '<table>';
				foreach($data as $key => $var) {
				$output .= '<tr>';
				foreach($var as $k => $v) {
					if ($key === 0) {
						$output .= '<td><strong>' . $k . '</strong></td>';
					} else {
						$output .= '<td>' . $v . '</td>';
					}
					}
					$output .= '</tr>';
					}
				$output .= '</table>';
				echo $output;
				}
		
		
		
		</script>
		<script>//to change the value acconrding to the slider
		function updateLabel() { 
		var limit = this.parentElement.getElementsByClassName("limit")[0];
		limit.innerHTML = this.value;
		}
		var slideContainers = document.getElementsByClassName("slidecontainer");
		for (var i = 0; i < slideContainers.length; i++) {
		var slider = slideContainers[i].getElementsByClassName("slider")[0];
		updateLabel.call(slider);
		slider.oninput = updateLabel;
		}
	</script>

        <aside></aside>
	</main>

	<!-- footer -->
	<div w3-include-html="components/footer.php"></div>

	<script>
	includeHTML();
	</script>
	<script>      // Initialize and add the map
      // In the following example, markers appear when the user clicks on the map.
      var marker;
      var obj,map;


      function initMap() {
         /* iterate through json data */
		 for( var n in json ){
            obj=json[n];
            map=new google.maps.Map( document.querySelector('div[ data-id="'+n+'" ]'),{
                center:{ lat:parseFloat( obj.latitude ), lng:parseFloat( obj.longitude ) },
                zoom:16
            });
        }
        
      } 
    </script>
	<script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl39nJCT9GvsrbmIlEexdz9LPr7v_9s3E&callback=initMap">
    </script>
</body>
</html>

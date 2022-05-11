<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
<title>Land Browse Page </title>
	<link rel="stylesheet" href="style.css">
	<script src="components/ComponentHandler.js" ></script>

	<style>

		input[type="checkbox"] { /* change "blue" browser chrome to yellow */
		filter: invert(60%) hue-rotate(18deg) brightness(1.7);
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

</style>
</head>
<body>
<h1>قائمة الاراضي</h1><br>
			<div class="landList" >

<?php

    //invoke city 
  $phpVariable = $_POST['phpVariable'];

    //set variables 
    $price = $_POST['price'];
    $button = $_POST['submit'];
    //to show errors
	 error_reporting(E_ALL);
	 ini_set('display_errors', 1);
  //make connection and print error msgs
	include "connection.php"; 
  $query = "SELECT * FROM searchEngine WHERE price = '$price' AND city='$phpVariable'";
  $result = mysqli_query($con, $query);
    $invoke = $con->query($query);

  $run=mysqli_num_rows($result);

  if ($invoke->num_rows>0){

      while($row = $result->fetch_assoc()) {
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
      echo "لا توجد نتائج مطابقة لبحثك ";
      }


  ?>
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
	<div w3-include-html="footer.php"></div>

	<script>
	includeHTML();
	</script>
</body>
</html>
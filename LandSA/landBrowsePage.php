<?php
// --------------- Browse lands PHP ------------
//to show errors
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
//make connection and print error msgs
$con = mysqli_connect("localhost","root","","landsa") or die("Error Can't Connect to Server");
$db = mysqli_select_db($con,"landsa") or die("Error Can't Connect to DB");

//select coloumns to be printed on land browse page according to land state
$sql = "SELECT neighborhoodName, address, city FROM landrecord WHERE landState='0'";
$result = $con->query($sql); 
$num_rows = mysqli_num_rows($result); //number of rows
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//variables and their values
 	$neighborhoodName=$row["neighborhoodName"];
    $address=$row["address"];
    $city=$row["city"];
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
</style>
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.html"></div>


	<div class="content">
		<div class="topnav">
		<form >
			<input type="text" placeholder="	إبحث">

			<!-- send the search attribute -->
			<button ><input type="submit" value="إبحث" ></button>
		</form>
	</div>
	<br>
	
		<div class="content" >
		<h1>قائمة الاراضي</h1><br>
		<div class="landList" ></div>
			<?php
				$sql_lands = "SELECT `landrecord`.neighborhoodName, address, city FROM `landrecord` WHERE landState='0'";
				$result = $con->query($sql_lands);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<div class='land'>";
						// Informations block

						echo"<div class='block'>";
						echo "<table id='UserData'>";
						echo "<tr>
							 <th>الموقع:  </th>
							 <th> $row[address]</th>
							</tr>";
							echo "<tr>
							<td>&emsp;</td>
							<td>&emsp;</td>
						   </tr>";	
						echo "<tr>
							 <td>المدينة:</td>
							 <td> $row[city]</td>
							</tr>";
						 echo "<tr>
							 <td>اسم الحي:</td>
							 <td> $row[neighborhoodName]</td>
							</tr>";
						echo"</table>";
						echo"</div>";

						
						echo "<img src='images/Riyadh.jpg' alt='صورة الأرض' width='25%'> ";
						// only regesterd can view  details, if user is not regesterd, transfer him to login page
						echo "<button class='moreB'>عرض التفاصيل></button>";
						
						echo"</div>";
						echo "</div>";
					}
				} else {
					echo "0 results";
				}
			?>

		</div>
	</div>
		<!-- footer -->

	</div>
		<div w3-include-html="components/footer.html"></div>

	<script>
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
</body>
</html>

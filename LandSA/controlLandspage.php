<!-- Control Lands page-->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>Control Lands page </title>
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
		.sellB {
			background-color: rgba(255, 80, 60, 0.568);
		}
		.giftB{
			background-color: #149d3bbb;
		}
		.moreB{
			background-color:#35c8afce;;
		}
		/* Style of switch button */


	</style>
	<?php
	include "connection.php";
	session_start();
	$ID = '0000';
	$Password = '0000';
	$sql = "SELECT * FROM users WHERE ID = '$ID' AND Password = '$Password'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($count == 1){
	$user_id = $row['ID'];    }

	// if(!isset($_SESSION["loggedUser"])){
	//     header('Location: ../login.php');
	// }
	if(!isset($_SESSION['loggedUser'])){
		$_SESSION['loggedUser'] = $user_id;
	}


	?>
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.html"></div>

	<div class="content">
		<h1>قائمة الاراضي</h1><br>
		<div class="landList"></div>
			<?php
				// $sql_lands = "SELECT deedDate, deedNumber,unitType,REUN,city,neighborhoodName,landState  FROM `landrecord` WHERE IDNumber ='$ID'";
				$sql_lands = "SELECT `landrecord`.REUN,deedDate, deedNumber,unitType,city,neighborhoodName,spaceInNumbersWidth,spaceInNumbersLength,locationMap,landState FROM `landrecord`,`landinfo` WHERE IDNumber ='$ID' AND `landrecord`.REUN=`landinfo`.REUN";
				$result = $con->query($sql_lands);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<div class='land'>";
						// Informations block

						echo"<div class='block'>";
						echo "<table id='UserData'>";
						echo "<tr>
							 <th><h2>رقم الوحدة العقارية: </h2></th>
							 <th> <h2>$row[REUN]</h2></th>
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

						echo "<tr>
						 <td>نوع الوحدة:</td>
						 <td> $row[unitType]</td>
					  		</tr>";

						echo "<tr>
							<td>رقم الصك:</td>
							<td> $row[deedNumber]</td>
							</tr>";

						echo "<tr>
							<td>تاريخ الصك:</td>
							<td> $row[deedDate]</td>
							</tr>";
						
						echo "<tr>
							<td>المساحة بالارقام:</td>
							<td> $row[spaceInNumbersLength] X $row[spaceInNumbersWidth]</td>
						</tr>";
						echo"</table>";
						echo"</div>";

						
						echo "<img src='images/Riyadh.jpg' alt='صورة الأرض' width='25%'> ";
						
						// Buttons block
						echo"<div class='block'>";
						if($row["landState"]==0){
							
							echo "<button class='sellB'>بيع</button>";
							echo "<button class='giftB'>اهداء</button>";
						}
						
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
		<div w3-include-html="components/footer.html"></div>
	<script>
		includeHTML();
	</script>
</body>
</html>
<?php
$REUN = null;
	include "components/connection.php";
	session_start();
	if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
		$ID = $_SESSION['loggedUser'];
		
		  
		// receive all the informations from the interface form specifically "setPrice.php"
		if (!empty($_POST['setPrice'])){
			$REUN = $_POST["REUN"];
			$price = $_POST["price"];
	  
			//Check that their are no repeted requests
			$query2="SELECT * FROM landsonsale WHERE REUN='$REUN'";
			$result2 = mysqli_query($con, $query2);
			$count2 = mysqli_num_rows($result2);
	  
			if($count2 == 0){
				$insertUser = "INSERT INTO landsonsale(REUN, price) value($REUN, $price)";
				$result = mysqli_query($con,$insertUser); #send query to the databaes to use insert method
	  
				if($result){  
				  echo "<script>alert('تم إرسال الطلب بنجاح')</script>";
				  echo "<script>setTimeout(\"location.href = 'controlLandsPage.php';\",1500);</script>";
				}else {
				  die("Error: ".mysqli_errno($con));
				}
	  
			}else{
				echo "<script>alert('تم عرض الأرض للبيع مسبقًا')</script>";
				echo "<script>setTimeout(\"location.href = 'controlLandsPage.php';\",1500);</script>";
			}
		}

		// receive all the informations from the interface form specifically "changePrice.php"
		if (!empty($_POST['updatePrice'])){
			$REUN = $_POST["REUN"];
			$price = $_POST["price"];
	    
			$query = "UPDATE landsonsale set price= '$price' where REUN='$REUN'";        
			$res2 = mysqli_query($con,$query);
			if ($con->query($query)==TRUE) {
				echo "<script>alert('تم تغيير السعر بنجاح')</script>";
				echo "<script>setTimeout(\"location.href = 'controlLandspage.php';\",1500);</script>";
			} else {
				echo "Eroo". $query. "<br>" . $con->error;
			}
			
		  }
		  #else if the user is NOT logedin
	}else{
		echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
		echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
	}

?>

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
		.land button {
			display: inline-flex;
			flex: left;
			text-align: left;
			margin-top: 10px;
			width: 100px;
		}
		.content form {
			background-color: #fff0;
			border-radius: 18px;
			padding: 0px;
		}
		#price{
			display: flex;
    		justify-content: space-between;
			align-items: baseline
		}
		.ch{
			background-color: #bb5a58;
			border: none;
			padding: 3px 5px;
			border-radius: 0%;
			color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			cursor: pointer;
    	}
		.ch:hover{
			background-color: #b70b09;
			transition: all 1s eas;
    	}
		b{padding-left: 20px;}
		.section{
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
		.MiniBlock {
			display: flex;
			justify-content: space-evenly;
		}
		.land img{
				width: 40%;
				border-radius: 5%;
			}

		@media only screen and (max-width: 800px ) {
			.land {
				flex-direction: column;
				align-items: center;
			}
			.section {
				display: flex;
				width: 100%;
				flex-direction: row;
				justify-content: space-between;
			}
			.MiniBlock{
				display: flex;
				flex-direction: row;
				align-items: center;
				justify-content: space-around;
			}
			.MiniBlock img{
				width: 50%;
				width:25%; 
				height:25%;
				 border-radius: 2%;
			}

		}

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
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.php"></div>
	<main>
	<aside></aside>

	<div class="content">
		<h1>قائمة الاراضي</h1><br>
		<div class="landList"></div>
			<?php
				$sql_lands = "SELECT `landrecord`.REUN,deedDate, deedNumber,unitType,city,neighborhoodName,spaceInNumbersWidth,spaceInNumbersLength,landState FROM `landrecord`,`landinfo` WHERE IDNumber ='$ID' AND `landrecord`.REUN=`landinfo`.REUN";
				
				$result = $con->query($sql_lands);

				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$REUN = $row['REUN'];
						$x = $REUN;
						$sql_price = "SELECT `landrecord`.REUN , price FROM `landrecord`,`landsonsale` WHERE `landsonsale`.REUN = '$REUN'";
						$result2 = $con->query($sql_price);
						$row2 = mysqli_fetch_array($result2);
						echo "<div class='land'>";

						// Informations section
						echo"<div class='section'>";
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
							<td> $row[spaceInNumbersLength]x$row[spaceInNumbersWidth] متر</td>
						</tr>";

						// try to add the price if the land got for sale
						if(!empty($row2['price'])){
							echo "<tr>
								<td><b>السعر:</b></td>
								<td id=price><b>$row2[price]</b>
									<button class='ch' name='price' onclick='document.getElementById(`id02`).style.display=`block`'>تعديل</button>
								</td>
							</tr>";
							
						}		

						echo"</table>";
						echo"</div> <br>";
							
							// Buttons section
							echo"<div class='section'>";

							if($row["landState"]==0){
								echo"<button onclick='document.getElementById(`id01`).style.display=`block`'>بيع</button>";

								echo"
								<form method='GET' action='giftLandForm.php'>
									<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
									<button class='giftB' type='submit' >اهداء</button>
								</form>";	
							}
							echo"
								<form method='GET' action='land.php'>
									<input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
									<button class='giftB' type='submit' >تفاصيل</button>
								</form>";							
							echo"</div>";

					echo "</div>";
					echo "
					<div id='id01' class='overlay-style'>
						<div class='block'>
							<span onclick='document.getElementById(`id01`).style.display=`none`' class='close' title='Close Modal'>&times;</span>
							<div style='text-align:center;margin: 5%;'>
							<h1 style='padding-left:1%;' > أدخل سعر لبيع الارض رقم : $REUN  </h1>
							<form method='POST'>
								<input type='hidden' id='REUN' name='REUN' value='$REUN' />
								<table class='Namefeild'>
									<tr>
									<td><label for='price'>السعر:</label></td>
									</tr>
									<tr>
									<td><input type='text' id='price' name='price' required></td>
									</tr>
								</table><br><br>
							<button><input type='submit' name='setPrice' value='ارسل' ></button>
							</form>
							<br>
							</div>
						</div>
					</div>
					";
					echo "
					<div id='id02' class='overlay-style'>
						<div class='block'>
							<span onclick='document.getElementById(`id02`).style.display=`none`' class='close' title='Close Modal'>&times;</span>
							<div style='text-align:center;margin: 5%;'>
							<h1 style='padding-left:1%;' >أدخل السعر  الجديد  </h1>
							<!-- Gift Land Form -->
							<form method='POST'>
							<input type='hidden' id='REUN' name='REUN' value='$REUN' />
							<table class='Namefeild'>
								<tr>
								<td><label for='price'>السعر:</label></td>
								</tr>
								<tr>
								<td><input type='text' id='price' name='price' required></td>
								</tr>
							</table><br><br>
							<button><input type='submit' name='updatePrice' value='ارسل' ></button>
							</form>
							</div>
						</div>
					</div>
					";

					}
				} else {
					echo "0 results";
				}
			?>
			
		</div>
	</div>
	<aside></aside>
</main>

        <!-- footer -->
		<div w3-include-html="components/footer.php"></div>
		<script>
			// Get the modal
			var modal1 = document.getElementById('id01');
			var modal2 = document.getElementById('id02');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal1) {
					modal1.style.display = "none";
				}
			}
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal2) {
					modal2.style.display = "none";
				}
			}
		</script>
	<script>
		includeHTML();
	</script>
</body>
</html>

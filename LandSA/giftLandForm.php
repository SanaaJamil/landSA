<!-- Gift Land form -->
<?php
$REUN=null;
	#Check the connections with the server and DB
	include "components/connection.php";
	
	#Check if the user is still logedin
	session_start();
	if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
		// To get the REUN from 'Control Lands page'
		if ($_SERVER["REQUEST_METHOD"]=="GET"){
			$REUN = $_GET['REUN'];
		}
		

		// receive all the informations from the interface form specifically "giftLandForm.php"
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$REUN = $_POST["REUN"];
			$requestID=rand (1000, 9999);
			$NOwnerID = $_POST["NOwnerID"];
			$NOwnerFirstName = $_POST["NOwnerFirstName"];
			$NOwnerMiddleName = $_POST["NOwnerMiddleName"];
			$NOwnerLastName = $_POST["NOwnerLastName"];
			$NOwnerPhone = $_POST["NOwnerPhone"];
			

			//Check that the new owner is a user in the website
			$query1="SELECT ID FROM users WHERE ID='$NOwnerID' AND phoneNum='$NOwnerPhone'"; // AND $NOwnerName=`Name` AND $NOwnerPhone=`phoneNum`;
			$result = mysqli_query($con, $query1);
			$count = mysqli_num_rows($result);
			if ($count == 1){

				//Check that their are no repeted requests
				$query2="SELECT * FROM giftrecord WHERE REUN='$REUN'";
				$result2 = mysqli_query($con, $query2);
				$count2 = mysqli_num_rows($result2);

				if($count2 == 0){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$insertGift = "INSERT INTO giftrecord (requestID,NOwnerID,NOwnerFirstName,NOwnerMiddleName,NOwnerLastName,NOwnerPhone,REUN,UserID) 
					value(?,?,?,?,?,?,?,?)";
			
					$stmt = mysqli_prepare($con,$insertGift);
					mysqli_stmt_bind_param($stmt,"ssssssss",$requestID,$NOwnerID,$NOwnerFirstName,$NOwnerMiddleName,$NOwnerLastName,$NOwnerPhone,$REUN,$_SESSION['loggedUser']);
					$result=mysqli_stmt_execute($stmt);		
			
					if($result){	
						echo "<script>alert('تم إرسال الطلب بنجاح')</script>";
						echo "<script>setTimeout(\"location.href = 'controlLandsPage.php';\",1500);</script>";
					}else {
						die("Error: ".mysqli_stmt_error($stmt));
					}

				}else{echo "<script>alert('تم استقبال طلب اهداء على هذه الأرض مسبقًا')</script>";}
				
			}else{ 	echo "<script>alert('المسخدم غير مسجل بالموقع او المعلومات غير صحيحه')</script>";
					echo "<script>setTimeout(\"location.href = 'controlLandsPage.php';\",1500);</script>";}

		}
		#else if the user is NOT logedin
	}else{
		echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
		echo "<script>setTimeout(\"location.href = '../log/login.php.php';\",1500);</script>";
	}
?>


<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
	<head>
		<title> Gift land form</title>
		<link rel="stylesheet" href="style.css">
		<script src="components/ComponentHandler.js" ></script>
		
		<style>
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
				
				<div style="text-align:center;margin: 5%;">
				<h1 style="padding-left:1%;" >استبيان اهداء ارض</h1>
				<h2><?PHP echo $REUN; ?></h2>

					<!-- Gift Land Form -->
					<form method="POST" action="giftLandForm.php">
					<?php echo"<input type='hidden' id='REUN' name='REUN' value='$REUN' />";?>

					<label for="NOwnerID">ادخل رقم الهوية الوطنيه للشخص المهدى إليه (يجب ان يكون مسجلاً في الموقع):*</label><br>
					<input type="text" id="NOwnerID" name="NOwnerID" required><br><br>
					
					<h3 for="NOwnerName">الاسم الثلاثي للشخص المهدى إليه:</h3><br>
					<table class="Namefeild">
						<tr>
							<td><label for="NOwnerFirstName">الاسم الأول*:</label></td>
							<td><label for="NOwnerMiddleName">اسم الأب*:</label></td>
							<td><label for="NOwnerLastName">اسم العائلة*:</label></td>
						</tr>
						<tr>
							<td><input type="text" id="NOwnerFirstName" name="NOwnerFirstName" required></td>
							<td><input type="text" id="NOwnerMiddleName" name="NOwnerMiddleName" required></td>
							<td><input type="text" id="NOwnerLastName" name="NOwnerLastName" required></td>
						</tr>
					</table><br><br>

					<label for="NOwnerPhone">رقم هاتف الشخص المهدى إليه*:</label><br>
					<input type="text" minlength="10" maxlength="10" id="NOwnerPhone" name="NOwnerPhone" placeholder="مثال: 0555555555" required><br><br>

					<button><input type="submit" value="ارسل" ></button>

					</form>
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
<?php


//connect and check connection
include "components/connection.php";
#Check if the user is still logedin
session_start();
if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
                //to display errors
				error_reporting(E_ALL);
                ini_set('display_errors', 1);

                //get the values 
                $courtOrder = $_POST["courtOrder"];
                $OwnerID = $_POST["OwnerID"];
                $REUN = $_POST["REUN"];
                $requestID = rand (1000, 9999);

                //connect and check connection
                include "components/connection.php";

                // if(($_POST["submit"])){
                        $stmt=$con->prepare("INSERT INTO inheritancerecord (courtOrder,OwnerID,REUN,requestID,UserID) VALUES (?,?,?,?,?)");
                        $stmt -> bind_param("sssss",$courtOrder,$OwnerID,$REUN,$requestID,$_SESSION['loggedUser']);
                        $stmt->execute();
                        echo "<script>alert('تم إرسال الطلب بنجاح')</script>";
                // }

        }
}else{
	echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
	echo "<script>setTimeout(\"location.href = '../log/login.php.php';\",1500);</script>";
}
        
?>

<!-- land Inheritance form HTML -->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
	<head>
		<title> land Inheritance form</title>
		<link rel="stylesheet" href="style.css">
		<script src="components/ComponentHandler.js" ></script>
	</head>
	<body>
		<!--Page header-->
		<div id="Head" w3-include-html="components/nav.php"></div>

		<main>
			<aside></aside>
			<div style="text-align:center;" class="content">
				<h1 style="padding-left:1%;margin: 5%;">استبيان وراثة ارض</h1>
				<form action="landinheritanceForm.php" method="post" >
			

				<label for="courtOrder">ادخل صورة من أمر المحكمة (امر انتقال الملكية)*:</label><br><br>
				<button><input type="file" id="courtOrder" name="courtOrder" src="img_submit.gif" alt="Submit" width="48" height="48" laceholder="Photo" required="" capture></button><br><br>

				<label for="OwnerID">ادخل رقم هوية صاحب الأرض (الشخص المتوفي)*:</label><br>
				<input type="text" id="OwnerID" minlength="10" maxlength="10" name="OwnerID" required=""><br><br>
				
				<label for="REUN">أدخل رقم الوحدة العقارية (REUN) *:</label><br>
				<input type="text" id="REUN" name="REUN" required=""><br><br>

				<button><input name="submit" type="submit" value="Submit" ></button>

				</form>
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

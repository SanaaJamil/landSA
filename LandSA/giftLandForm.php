<!-- land Inheritance form -->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
	<head>
		<title> Gift land form</title>
		<link rel="stylesheet" href="style.css">
		<script src="components/ComponentHandler.js" ></script>
	</head>
	<body>
		<!--Page header-->
		<div id="Head" w3-include-html="components/nav.html"></div>
	<div class="content">
		<div style="text-align:center;margin: 5%;">
			<h1 style="padding-left:1%;margin: 5%;">استبيان اهداء ارض</h1>
			<form action="" >
  			
			<label for="NewOwnerID">ادخل رقم الهوية الوطنيه للشخص المهدى إليه (يجب ان يكون مسجلاً في الموقع):*</label><br>
  			<input type="text" id="NewOwnerID" name="NewOwnerID" required><br><br>
  			
  			<label for="NewOwnerName">الاسم الثلاثي للشخص المهدى إليه*:</label><br>
  			<input type="text" id="NewOwnerName" name="NewOwnerName" required><br><br>

			<label for="NewOwnerName">رقم هاتف الشخص المهدى إليه*:</label><br>
  			<input type="tel" minlength="10" maxlength="10" id="NewOwnerPhone" name="NewOwnerPhone" name="PhoneNumber" placeholder="مثال: 0555555555" required><br><br>

  			<button><input type="submit" value="ارسل" ></button>

			</form>
		</div>
	</div>	
		<!-- footer -->
		<div w3-include-html="components/footer.html"></div>

		<script>
		includeHTML();
		</script>
	</body>
</html>
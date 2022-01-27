<!-- land Inheritance form -->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
	<head>
		<title> land Inheritance form</title>
		<link rel="stylesheet" href="style.css">
		<script src="components/ComponentHandler.js" ></script>
	</head>
	<body>
		<!--Page header-->
		<div id="Head" w3-include-html="components/nav.html"></div>

		<div style="text-align:center;" class="content">
			<h1 style="padding-left:1%;margin: 5%;">استبيان وراثة ارض</h1>
			<form action="" >
		

			<label for="courtOrder">ادخل صورة من أمر المحكمة (امر انتقال الملكية)*:</label><br><br>
			<button><input type="file" id="courtOrder" name="courtOrder" src="img_submit.gif" alt="Submit" width="48" height="48" laceholder="Photo" required="" capture></button><br><br>

  			<label for="OwnerID">ادخل رقم هوية صاحب الأرض (الشخص المتوفي)*:</label><br>
  			<input type="text" id="OwnerID" name="OwnerID" required=""><br><br>
  			
  			<label for="REUN">أدخل رقم الوحدة العقارية (REUN) *:</label><br>
  			<input type="text" id="REUN" name="REUN" required=""><br><br>

  			<button><input type="submit" value="Submit" ></button>

			</form>
		</div>
		
		<!-- footer -->
		<div w3-include-html="components/footer.html"></div>

		<script>
		includeHTML();
		</script>
	</body>
</html>

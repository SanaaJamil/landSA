<!-- Brows lands page-->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>Land Browse Page </title>
	<link rel="stylesheet" href="style.css">
	<script src="components/ComponentHandler.js" ></script>
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.html"></div>


	<h1></h1>
	<div class="content">
		<div class="topnav">
		<form>
			<input type="text" placeholder="	إبحث">

			<!-- send the search attribute -->
			<button><input type="submit" value="إبحث" ></button>
		</form>
	</div>

	<br>
<form method="post" name="booking" action="retrieve/browseLands.php">
		<br>
	<div class="topnav"> <!-- land A browse !-->
		<img src="images/Riyadh.jpg" alt="صورة الموقع العقاري "style="float:left; width: 200px; height: 121px;">
		<h4> 
			<div style="float:right; display: inline;"> الموقع: <br>
			المساحه:  <br>
		رقم التواصل: <br>
		تفاصيل اضافيه <br>

	</div>
			<div style="clear: right;"/>
		</h4>
		<br> <!-- only regesterd can view  details -->
		<button style="float:right;"><input type="submit" value="عرض التفاصيل " ></button>


	</div>	<br>
</form>
		
		<!-- footer -->
	</div>
		<div w3-include-html="components/footer.html"></div>

	<script>
		includeHTML();
	</script>
</body>
</html>

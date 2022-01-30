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
	<div class="topnav"> <!-- land A browse
	<div id="nationality" w3-include-html="components/nationality.html"> </div> !-->
		<p style="position: relative;left:-30px;display: inline; ">
			<img src="images/Riyadh.jpg">
		</p>
		<h4> 
			<div style="float:left; display: inline;">Left Text</div>
			<div style="clear: left;"/>
		</h4>
		<br> <!-- only regesterd cans viwe the details -->
		<button style="position: relative;right: 500px;"><input type="submit" value="عرض التفاصيل " ></button>


	</div>

	<br>
	<div class="topnav">
		<button style="position: relative;right: 1000px;"><input type="submit" value="عرض التفاصيل " ></button>


	</div>
		
		<!-- footer -->
	</div>
		<div w3-include-html="components/footer.html"></div>

	<script>
		includeHTML();
	</script>
</body>
</html>

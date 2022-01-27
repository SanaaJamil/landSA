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
		<form>
			<div id="nationality" w3-include-html="components/nationality.html"></div>
			<button><input type="submit" value="submit" ></button>
		</form>
		
		<!-- footer -->
	</div>
		<div w3-include-html="components/footer.html"></div>

	<script>
		includeHTML();
	</script>
</body>
</html>

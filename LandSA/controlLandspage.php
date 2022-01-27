<!-- Control Lands page-->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>Control Lands page </title>
	<link rel="stylesheet" href="style.css">
	<script src="components/ComponentHandler.js" ></script>
	
	<style>

		
		.land {
			background-color: #203864; /* Green background */
			border: 1px solid green; /* Green border */
			color: white; /* White text */
			padding: 10px 24px; /* Some padding */
			cursor: pointer; /* Pointer/hand icon */
			margin: 8px 4px;
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
		.sellB {
			background-color: rgba(255, 80, 60, 0.568);
		}
		.giftB{
			background-color: rgba(255, 244, 88, 0.699);
		}
		.moreB{
			background-color: #fff;
		}

	</style>
</head>
<body>
	<!--Page header-->
	<div id="Head" w3-include-html="components/nav.html"></div>

	<div class="content">
		<h1>قائمة الاراضي</h1><br>
		<div class="landList"></div>
			<div class="land">
				<p>ارض 1 </p>
				<p>الموقع... المساحه...</p>
				<button class="sellB">بيع</button>
				<button class="giftB">اهداء</button>
				<button class="moreB">عرض التفاصيل></button>
			</div>
			<div class="land">
				<p>ارض 2 </p>
				<p>الموقع... المساحه...</p>
				<button class="sellB">بيع</button>
				<button class="giftB">اهداء</button>
				<button class="moreB">عرض التفاصيل></button>
			</div>
			<div class="land">
				<p>ارض 3 </p>
				<p>الموقع... المساحه...</p>
				<button class="sellB">بيع</button>
				<button class="giftB">اهداء</button>
				<button class="moreB">عرض التفاصيل></button>
			</div>
		</div>
	</div>

        <!-- footer -->
		<div w3-include-html="components/footer.html"></div>
	<script>
		includeHTML();
	</script>
</body>
</html>
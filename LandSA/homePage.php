<?php
session_start();
if (isset($_SESSION['loggedin'] != true)) {
   echo "Please log in first to see this page.";
        header('Location: login.php');
?>
<!DOCTYPE html>
	<html lang="ar" style='direction: rtl'>
		<head>
			<title>Home Page</title>
			<link rel="stylesheet" href="style.css">
			<script src="components/ComponentHandler.js" ></script>
		</head>
		<body>
			<!--Page header-->
			<div id="Head" w3-include-html="components/nav.html"></div>

			<!-- Page content -->
			<div class="content">
				<!-- image Slider start-->
				<div class="slider-dispay">
					<div class="slider">
						<div class="slides">
							<!--radio button start-->
							<input type="radio" name="radio-btn" id="radiol">
							<input type="radio" name="radio-btn" id="radio2">
							<input type="radio" name="radio-btn" id="radio3">
							<input type="radio" name="radio-btn" id="radio4">
							<!--radio button end-->
							<!--slide image start-->
							<div class="slide first">
								<img src="./images/1.jpg" alt="image Slider">
							</div>
							<div class="slide">
								<img src="./images/2.jpg" alt="image Slider">
							</div>
							<div class="slide">
								<img src="./images/3.jpg" alt="image Slider">
							</div>
							<div class="slide">
								<img src="./images/4.jpg" alt="image Slider">
							</div>
							<!--slide image end-->
							<!--auto navigation start-->
							<div class="navigation-auto">
								<div class="auto-btn1"></div>
								<div class="auto-btn2"></div>
								<div class="auto-btn3"></div>
								<div class="auto-btn4"></div>
							</div>
							<!--auto navigation end-->
						</div>
						<!--manual navigation start-->
						<div class="navigation-manual">
							<label for="radiol" class="manual-btn"></label>
							<label for="radio2" class="manual-btn"></label>
							<label for="radio3" class="manual-btn"></label>
							<label for="radio4" class="manual-btn"></label>
						</div>
						<!--manual navigation end-->
					</div>
				</div>
				<!-- image Slider end-->

				<!--Card group start-->
				<h1>آخر الأخبار</h1>
				<div class="card-group">
					<div class="card">
							<h4>Title</h4>
							<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
							<a href="">Read more</a>
					</div>
					<div class="card">
							<h4>Title</h4>
							<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
							<a href="">Read more</a>
					</div>
					<div class="card">
							<h4>Title</h4>
							<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
							<a href="">Read more</a>
					</div>
					<div class="card">
							<h4>Title</h4>
							<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
							<a href="">Read more</a>
					</div>
				</div>
				<!--Card group end-->

				<!--areas view start-->
				<h1>مناطق الاراضي</h1>
				<div class="galley">
					<div class="area">
						<div class="area-image area-1"><h4>الشماليه</h4></div>
					</div>
					<div class="area">
						<div class="area-image area-1"><h4>الجنوبيه</h4></div>
					</div>
					<div class="area">
						<div class="area-image area-1"><h4>الشرقيه</h4></div>
					</div>
					<div class="area">
						<div class="area-image area-1"><h4>الغربيه</h4></div>
					</div>
				</div>
				<!--areas view end-->
			</div>

			<!-- footer -->
			<div w3-include-html="components/footer.html"></div>


			<script>
				includeHTML();
			</script>

			<script type="text/javascript">
				//image slider code for auto slide
				var counter = 1;
				setInterval(function(){
				 document.getElementById ('radio' + counter).checked = true;
				  counter++;
				  if(counter > 4){
					counter = 1;
				  }
				}, 5000);
			</script>
		</body>
	</html>

<!DOCTYPE html>
	<html lang="ar" style='direction: rtl'>
		<head>
			<title>Home Page</title>
			<link rel="stylesheet" href="style.css">
			<script src="components/ComponentHandler.js" ></script>
			<style>
				aside{
					flex: 0 0 150px;
				}
			</style>
		</head>
		<body>
		<!--header call-->
		<div id="Head" w3-include-html="components/nav.php"></div>

		<!-- Page content -->
		<main>
			<aside></aside><!--just to make it look better with flex display-->
			<div class="content">
				<!--image slider strat-->
				<div class="slider-display">
					<div class="img-slider">
						<div class="slide active">
							<img src="images/p1.png">
							<div class="info">
							<h2>تسجيل الدخول</h2>
								<p>
									قم بتسجيل الدخول واستمتع معنا بالخدمات المتوفرة لدينا. 
								</p>
							</div>
						</div>
						<div class="slide">
						<img src="images/p2.jpg">
							<div class="info">
								<h2>تسجيل أرض جديدة</h2>
								<p>
								يمكنك تسجيل أرضك بسهولة كل ما عليك فعله ملء نموذج تسجيل أرض وإرساله، وتستطيع تسجيل أكثر من ارض.							</div>
						</div>
						<div class="slide">
						<img src="images/p3.jpg">
							<div class="info">
								<h2>عرض الأراضي</h2>
								<p>
									يمكنك تصفح الأراضي الموجودة والحصول على المعلومات الخاصة بها وحتى شراءها.
								</p>							
							</div>
						</div>
						<div class="slide-nav">
							<div class="btn active"></div>
							<div class="btn"></div>
							<div class="btn"></div>
						</div>
					</div>
				</div>
				<!--image slider end-->

				<!--Card group start-->
				<h1 >آخر الأخبار</h1>
				<div class="card-group">
					<div class="card">
							<h4>تعرف على متوسط أسعار الأراضي السكنية في عدد من أحياء المدن السعودية الكبرى خلال الربع الثالث 2021</h4>
							<a href="https://www.argaam.com/ar/article/articledetail/id/1521447">اقرأ المزيد</a>
					</div>
					<div class="card">
							<h4>تراجع جماعي لأسعار أراضي 5 مدن سعودية كبرى</h4>
							<a href="https://www.alwatan.com.sa/article/1086625">اقرأ المزيد</a>
					</div>
					<div class="card">
							<h4>كيف تغيرت أسعار الأراضي حاليا عما كانت عليه قبل 10 سنوات؟</h4>
							<a href="https://www.okaz.com.sa/economy/saudi/2070791">اقرأ المزيد</a>
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
			<aside></aside><!--just to make it look better with flex display-->
		</main>
		

		<!--footer call-->
		<div w3-include-html="components/footer.php"></div>

		<script type="text/javascript">
			var slides = document.querySelectorAll('.slide');
			var btns = document.querySelectorAll('.btn');
			let currentSlide = 1;

			// Javascript for image slider manual navigation
			var manualNav = function(manual){
				slides.forEach((slide) => {
					slide.classList.remove('active');

					btns.forEach((btn) => {
						btn.classList.remove('active')
					});
				});

				slides[manual].classList.add('active');
				btns[manual].classList.add('active');
			}

			btns.forEach((btn, i) => {
				btn.addEventListener ("click", () => {
					manualNav (i);
					currentSlide = i;
				});
			});

			// Javascript for image slider autoplay navigation
			var repeat = function(activeClass){
				let active = document.getElementsByClassName('active');
				let i = 1;

				var repeater = () => {
					setTimeout(function(){
						[...active].forEach((activeSlide) => {
							activeSlide.classList.remove('active')
						});

						slides[i].classList.add('active');
						btns[i].classList.add('active');
						i++;

						if(slides.length == i){
							i = 0;
						}
						if(i >= slides.length){
							return;
						}
						repeater();
					}, 10000)
				}
				repeater();
			}
			repeat();
		</script>
		<script>
		includeHTML();
		</script>
	</body>
</html>

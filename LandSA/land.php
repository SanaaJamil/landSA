<!DOCTYPE html>
	<html lang="ar" style='direction: rtl'>
		<head>
			<title>Home Page</title>
			<link rel="stylesheet" href="style.css">
			<script src="components/ComponentHandler.js" ></script>
		</head>
		<style>
			table, th, td{
				border: 1.5px solid rgb(73, 73, 73);
			}
			table {
				width: 100%;
				height: 100%;
				border-collapse: collapse;
			}
			table .title{
				font-weight: bold;
			}
			p,h2,h3{
				margin-bottom: 20px; 
			}
			.location{
				width: 100%;
    			height: auto;
			}
			.col{
				float: left;
				padding: 10px;
				height: 300px;
			}
			.left{
				width: 25%;
			}
			.right{
				width: 75%;
			}
			.row{
				display: flex;
				flex-direction: column;
				margin: 20px 0;
			}
			.row:after{
				content: "";
				display: table;
				clear: both;
			}
		</style>

		<body>
		<!--header call-->
		<div id="Head" w3-include-html="components/nav.php"></div>
        

		<!-- Page content -->
		<main>
			<aside></aside><!--just to make it look better with flex display-->

            <div class="container">
				<div class="row">
					<h2>رقم الوحدة العقارية: </h3><p>000000000000</p>
					<h3>معلومات المالك</h3>
					<table>
						<tbody>
							<tr class="title">
								<td>م</td>
								<td>اسم المالك</td>
								<td>الجنسية</td>
								<td>الحصة/النسبة</td>
								<td>العنوان</td>
								<td>نوع الهوية</td>
								<td>رقم الهوية</td>
								<td>تاريخ الهوية</td>
							</tr>
							<tr>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row">
					<h3>معلومات الوحدة العقارية</h3>
					<table>
						<tbody>
							<tr>
								<td class="title">رقم القطعة</td>
								<td>a</td>
								<td class="title">الاتجاهات</td>
								<td colspan="2" class="title">الحدود</td>
								<td class="title">الاطوال</td>
							</tr>
							<tr>
								<td class="title">رقم البلك</td>
								<td>a</td>
								<td rowspan="2" class="title">شمالا</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">رقم المخطط</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">اسم الحي</td>
								<td>a</td>
								<td rowspan="2" class="title">جنوبا</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">المدينة</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">نوع الوحدة</td>
								<td>a</td>
								<td rowspan="2" class="title">شرقا</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">رقم الصك</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">تاريخ الصك</td>
								<td>a</td>
								<td rowspan="2" class="title">غربا</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">مصدر الصك</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
								<td>a</td>
							</tr>
							<tr>
								<td class="title">المساحة</td>
								<td>a</td>
								<td class="title">كتابة</td>
								<td colspan="3">a</td>
								
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row" style="flex-direction: row;">
					<div class="col left">
						<h3>خريطة الموقع</h3>
						<img class="location" src="./images/Riyadh.jpg" height="40%">
					</div>
					<div class="col right">
						<h3>احداثيات واركان الوحدة العقارية</h3>
						<table>
							<tbody>
								<tr class="title">
									<td rowspan="2">النقطة</td>
									<td colspan="3">خط الطول</td>
									<td colspan="3">خط العرض</td>
									<td td rowspan="2">زوايا الانكسار</td>
								</tr>
								<tr class="title">
									<td>الثانية</td>
									<td>الدقيقة</td>
									<td>الدرجة</td>
									<td>الثانية</td>
									<td>الدقيقة</td>
									<td>الدرجة</td>
								</tr>
								<tr>
									<td class="title">أ</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
								<tr>
									<td class="title">ب</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
								<tr>
									<td class="title">ج</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
								<tr>
									<td class="title">د</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>

			<aside></aside><!--just to make it look better with flex display-->
		</main>
		

		<!--footer call-->
		<div w3-include-html="components/footer.php"></div>

		<script>
		includeHTML();
		</script>
	</body>
</html>

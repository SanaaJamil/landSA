<?php
include "components/connection.php";
	
#Check if the user is still logedin
session_start();

if(!(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true)){
    echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
     echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
}

$ID = $_SESSION['loggedUser'];
$UserInfo = "SELECT * FROM users WHERE ID = '$ID'";
$result = mysqli_query($con,$UserInfo);
$row = mysqli_fetch_array($result);

$IDNumber = $row["ID"];
$firstName = $row["firstName"];
$middleName = $row["middleName"];
$lastName = $row["lastName"];

?>
<!DOCTYPE html>
    <html lang="ar" style='direction: rtl'>
        <head>
            <title>Lands Registration</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <script src="components/ComponentHandler.js" ></script>
        </head>
        <body>
            <!--header call-->
            <div id="Head" w3-include-html="components/nav.php"></div>

            <!--land regiestration form start-->
            <main>
                <aside></aside><!--just to make it look better with flex display-->
                <div class="container">
                    <h1 class="title">تسجيل الارض</h1>
                    <div class="indicator">
                        <span class="line"><span></span></span>
                        <p class="active">1</p>
                        <p>2</p>
                        <p>3</p>
                    </div>
                    <form method="POST" action="components/landHandler.php" enctype="multipart/form-data">
                        <div class="tab show">
                            <h2>معلومات المالك:</h2>
                            <p>اسم المالك</p>
                            <div class="form" style="display:flex;">
                                <?php 
                                echo "<input type='text' name='firstName' value='$firstName' readonly>";
                                echo "<input type='text' name='middleName' value='$middleName' readonly>";
                                echo "<input type='text' name='lastName' value='$lastName' readonly>";
                                ?>
                            </div>
                            <p>الحصة / النسبة</p>
                            <div class="form">
                                <input type="number" name="share" required>
                            </div>
                            <p>رقم الهوية</p>
                            <div class="form">
                                <?php
                                echo "<input type='text' name='IDNumber' value='$IDNumber' readonly>";
                                ?>
                            </div>
                        </div>

                        <div class="tab">
                            <h2>معلومات العقار:</h2>
                            <p>رقم القطعة</p>
                            <div class="form">
                                <input type="number" name="pieceNumber" required>
                            </div>  
                            <p>رقم البلوك</p>
                            <div class="form">
                                <input type="number" name="blockNumber" required>
                            </div>  
                            <p>رقم المخطط</p>
                            <div class="form">
                                <input type="number" name="planNumber" required>
                            </div>
                            <p>اسم الحي</p>  
                            <div class="form">
                                <input type="text" name="neighborhoodName" required>
                            </div>
                            <p>المدينة</p>
                            <div class="form">
                                <input type="text" name="city" required>
                            </div>
                            <p>رقم الوحدة</p>
                            <div class="form">
                                <input type="text" name="REUN" required>
                            </div>
                            <p>نوع الوحدة</p>
                            <div class="form">
                                <div class="custom_select">
                                    <select name="unitType">
                                        <option value="">اختار</option>
                                        <option value="سكني">سكني</option>
                                        <option value="تجاري">تجاري</option>
                                    </select>
                                </div>
                            </div> 
                            <p>رقم الصك</p>
                            <div class="form">
                                <input type="text" minlength="12" maxlength="12" name="deedNumber" required>
                            </div>  
                            <p>تاريخ الصك</p>
                            <div class="form">
                                <input type="date" name="deedDate" required>
                            </div>  
                            <p>مصدر الصك</p>
                            <div class="form">
                                <input type="text" name="courtIssued" required>
                            </div>
                            <p>المساحة بالأرقام</p>
                            <div class="form multiple">
                                <input type="number" name="spaceInNumbers" required>
                            </div>  
                            <p>المساحة كتابتًا</p>
                            <div class="form multiple">
                                <input type="text" name="spaceInWriting" required>
                            </div>  
                            <p>الحدود: شمالا، جنوبا، شرقا، غربا</p>
                            <div class="form multiple">
                                <input type="text" name="bordersNorth" required> <input type="text" name="bordersSouth" required> <input type="text" name="bordersEast" required> <input type="text" name="bordersWest" required>
                            </div> 
                            <p>الأطوال: شمالا، جنوبا، شرقا، غربا</p>
                            <div class="form multiple">
                                <input type="number" name="lengthNorth" required> <input type="number" name="lengthSouth" required> <input type="number" name="lengthEast" required> <input type="number" name="lengthWest" required>
                            </div>  
                            
                        </div>

                        <div class="tab">
                            <h2>معلومات الموقع:</h2>
                            <p>إحداثيات وأركان الوحدة العقارية</p>
                            <table class="form">
                                <tr>
                                    <th>النقطة</th>
                                    <th><p>خطوط الطول</p></th>
                                    <th><p>خطوط العرض</p></th>
                                    <th style="width: 15%;"><p>زاوية الانكسار</p></th>
                                </tr>
                                <tr>
                                    <th>أ</th>
                                    <th><input type="text" name="LatitudeA" required></th>
                                    <th><input type="text" name="LongitudeA" required></th>
                                    <th><input type="number" name="angleA" required></th>
                                </tr>
                                <tr>
                                    <th>ب</th>
                                    <th><input type="text" name="LatitudeB" required></th>
                                    <th><input type="text" name="LongitudeB" required></th>
                                    <th><input type="number" name="angleB" required></th>
                                </tr>
                                <tr>
                                    <th>ج</th>
                                    <th><input type="text" name="LatitudeC" required></th>
                                    <th><input type="text" name="LongitudeC" required></th>
                                    <th><input type="number" name="angleC" required></th>
                                </tr>
                                <tr>
                                    <th>د</th>
                                    <th><input type="text" name="LatitudeD" required></th>
                                    <th><input type="text" name="LongitudeD" required></th>
                                    <th><input type="number" name="angleD" required></th>
                                </tr>
                            </table> <br>
                            <p>خريطة الموقع / كروكي</p>
                            <?php include "map.php"; ?>
                            <br>
                            <p>الرجاء ارفاق صورة من الصك</p>
                            <input type="file" accept="image/*" name="ElectronicTitleDeed" required>
                            <img id="output"/>
                        </div>

                        <div class="btn">
                            <button type="button" class="prev">السابق</button>
                            <button type="submit" class="next">التالي</button>
                        </div>
                    </form>
                </div>
                <aside></aside><!--just to make it look better with flex display-->
            </main>
            <!--land regiestration form end-->

            <!--footer call-->
            <div w3-include-html="components/footer.php"></div>

            <!--form script strat-->
            <script>
                const btnNext = document.querySelector('form .btn .next');
                const btnPrev = document.querySelector('form .btn .prev');
                const indicator = document.querySelector('.indicator .line span');
                const indicatorItems = document.querySelectorAll('.indicator p');
                const form = document.querySelector('form');
                const allTab = document.querySelectorAll('form .tab');
                let i = 0;
                
                allTab[i].classList.add('show');
                indicator.style.width = i;
                indicatorItems[i].classList.add('active');

                if(i === 0) {
                    btnPrev.style.display = 'none';
                } else {
                    btnPrev.style.display = 'block';
                }
                
                btnNext.addEventListener('click', function() {
                    const allInputPerTab = allTab[i].querySelectorAll('input');
                    for (let j = 0; j < allInputPerTab.length; j++) {
                        allInputPerTab[j].addEventListener('input', function () {
                            allInputPerTab[j].style.borderColor = '#ddd';
                        });
                        if (allInputPerTab[j].value === '' || !allInputPerTab[j].checkValidity()) {
                            allInputPerTab[j].style.borderColor = 'red';
                            return false;
                        } else{
                            allInputPerTab[j].style.borderColor = '#ddd';
                        }
                    }

                    i += 1;

                    if(i >= allTab.length){
                        form.submit();
                        return false;
                    }else{
                        for (let j = 0; j<allTab.length; j++) {
                            allTab[j].classList.remove('show');
                            indicatorItems[j].classList.remove('active');
                        }

                        for(let j = 0; j < i; j++) {
                            indicatorItems[j].classList.add('active');
                        }

                        allTab[i].classList.add('show');
                        indicator.style.width = `${i * 50}%`;
                        indicatorItems[i].classList.add('active');
                    }
                    
                    if(i === 0) {
                        btnPrev.style.display = 'none';
                    } else {
                        btnPrev.style.display = 'block';
                    }
                                
                    if(i === allTab.length - 1) {
                        btnNext.innerHTML = 'ارسال';
                    } else {
                        btnNext.innerHTML = 'التالي'; 
                    }
                });

                btnPrev.addEventListener('click', function () {
                    i -= 1;
                    for(let j = 0; j < allTab.length; j++) {
                        allTab[j].classList.remove('show');
                        indicatorItems[j].classList.remove('active');
                    }
                    for(let j = 0; j < i; j++) {
                        indicatorItems[j].classList.add('active');
                    }
                    allTab[i].classList.add('show');
                    indicator.style.width = `${i * 50}%`;
                    indicatorItems[i].classList.add('active');
                    if(i === 0) {
                        btnPrev.style.display = 'none';
                    } else {
                        btnPrev.style.display = 'block';
                    }
                    if(i === allTab.length - 1) {
                        btnNext.innerHTML = 'ارسال';
                    } else {
                        btnNext.innerHTML = 'التالي'; 
                    }
                });
            </script>
            <!--form script end-->
            <script>includeHTML();</script>
        </body>
    </html>

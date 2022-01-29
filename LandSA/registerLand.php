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
            <div id="Head" w3-include-html="components/nav.html"></div>

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
                    <form method="post" action="components/landHandler.php">
                        <div class="tab show">
                            <h2>معلومات المالك:</h2>
                            <p>اسم المالك</p>
                            <div class="form">
                                <input type="text" name="name">
                            </div>
                            <p>الجنسية</p>
                            <div class="form">
                                <div w3-include-html="nationality.html"></div>
                            </div>
                            <p>الحصة / النسبة</p>
                            <div class="form">
                                <input type="number" name="share">
                            </div>
                            <p>العنوان</p>
                            <div class="form">
                                <input type="text" name="address">
                            </div> 
                            <p>نوع الهوية</p>
                            <div class="form">
                                <div class="custom_select">
                                    <select name="IDType">
                                        <option value="">اختار</option>
                                        <option value="card">هوية وطنية</option>
                                        <option value="passport">هوية مقيم</option>
                                    </select>
                                </div>
                            </div>
                            <p>رقم الهوية</p>
                            <div class="form">
                                <input type="number" minlength="10" maxlength="10" name="IDNumber">
                            </div>
                        </div>

                        <div class="tab">
                            <h2>معلومات العقار:</h2>
                            <p>رقم القطعة</p>
                            <div class="form">
                                <input type="number" name="pieceNumber">
                            </div>  
                            <p>رقم البلوك</p>
                            <div class="form">
                                <input type="number" name="blockNumber">
                            </div>  
                            <p>رقم المخطط</p>
                            <div class="form">
                                <input type="number" name="planNumber">
                            </div>
                            <p>اسم الحي</p>  
                            <div class="form">
                                <input type="text" name="neighborhoodName">
                            </div>
                            <p>المدينة</p>
                            <div class="form">
                                <input type="text" name="city">
                            </div>
                            <p>رقم الوحدة</p>
                            <div class="form">
                                <input type="text" name="REUN">
                            </div>
                            <p>نوع الوحدة</p>
                            <div class="form">
                                <div class="custom_select">
                                    <select name="unitType">
                                        <option value="">اختار</option>
                                        <option value="card">سكني</option>
                                        <option value="passport">تجاري</option>
                                    </select>
                                </div>
                            </div> 
                            <p>رقم الصك</p>
                            <div class="form" name="deedNumber">
                                <input type="text" minlength="12" maxlength="12">
                            </div>  
                            <p>تاريخ الصك</p>
                            <div class="form">
                                <input type="date" class="input" name="deedDate">
                            </div>  
                            <p>مصدر الصك</p>
                            <div class="form">
                                <input type="text" name="courtIssued">
                            </div>
                            <p>المساحة بالأرقام</p>
                            <div class="form multiple">
                                <input type="number" name="spaceInNumbersLength"> <input type="number" name="spaceInNumbersWidth">
                            </div>  
                            <p>المساحة كتابتًا</p>
                            <div class="form multiple">
                                <input type="text" name="spaceInWritingLength"> <input type="text" name="spaceInWritingWidth">
                            </div>  
                            <p>الحدود: شمالا، جنوبا، شرقا، غربا</p>
                            <div class="form multiple">
                                <input type="number" name="bordersNorth"> <input type="number" name="bordersSouth"> <input type="number" name="bordersEast"> <input type="number" name="bordersWest">
                            </div> 
                            <p>الأطوال: شمالا، جنوبا، شرقا، غربا</p>
                            <div class="form multiple">
                                <input type="number" name="lengthNorth"> <input type="number" name="lengthSouth"> <input type="number" name="lengthEast"> <input type="number" name="lengthWest">
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
                                </tr>
                                <tr>
                                    <th>أ</th>
                                    <th><input type="text" name="LongitudeA"></th>
                                    <th><input type="text" name="LatitudeA"></th>
                                </tr>
                                <tr>
                                    <th>ب</th>
                                    <th><input type="text" name="LongitudeB"></th>
                                    <th><input type="text" name="LatitudeB"></th>
                                </tr>
                                <tr>
                                    <th>ج</th>
                                    <th><input type="text" name="LongitudeC"></th>
                                    <th><input type="text" name="LatitudeC"></th>
                                </tr>
                                <tr>
                                    <th>د</th>
                                    <th><input type="text" name="LongitudeD"></th>
                                    <th><input type="text" name="LatitudeD"></th>
                                </tr>
                            </table>  
                            <p>خريطة الموقع / كروكي</p>
                            <div class="form">
                                <input type="text" name="locationMap" placeholder="google map api need subsecribtion so this field is just a placeholder">
                            </div>
                            <p>الرجاء ارفاق صورة من الصك</p>
                            <input type="file" accept="image/*" onchange="loadFile(event)" name="ElectronicTitleDeed">
                            <img id="output"/>
                        </div>

                        <div class="btn">
                            <button type="button" class="prev">السابق</button>
                            <button type="button" class="next">التالي</button>
                        </div>
                    </form>
                </div>
                <aside></aside><!--just to make it look better with flex display-->
            </main>
            <!--land regiestration form end-->

            <!--footer call-->
            <div id="footer"></div>

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
                    /*const allInputPerTab = allTab[i].querySelectorAll('input');
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
                    }*/

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
                })

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

            <script>
                //preview photo code
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>
            <script>includeHTML();</script>
        </body>
    </html>
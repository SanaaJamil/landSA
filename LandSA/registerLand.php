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
                            <p>الجنسية</p>
                            <div class="form">
                                <div class="custom_select">
                                    <select name="nationality">
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia" selected>Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <p>الحصة / النسبة</p>
                            <div class="form">
                                <input type="number" name="share" required>
                            </div>
                            <p>نوع الهوية</p>
                            <div class="form">
                                <div class="custom_select">
                                    <select name="IDType">
                                        <option value="">اختار</option>
                                        <option value="مواطن">هوية مواطن</option>
                                        <option value="مقيم">هوية مقيم</option>
                                    </select>
                                </div>
                            </div>
                            <p>رقم الهوية</p>
                            <div class="form">
                                <?php
                                echo "<input type='text' name='IDNumber' value='$IDNumber' readonly>";
                                ?>
                            </div>
                            <p>تاريخ الهوية</p>
                            <div class="form">
                            <input type="date" name="IDdate" required>
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
                                <input type="number" name="spaceInNumbersLength" required> <input type="number" name="spaceInNumbersWidth" required>
                            </div>  
                            <p>المساحة كتابتًا</p>
                            <div class="form multiple">
                                <input type="text" name="spaceInWritingLength" required> <input type="text" name="spaceInWritingWidth" required>
                            </div>  
                            <p>الحدود: شمالا، جنوبا، شرقا، غربا</p>
                            <div class="form multiple">
                                <input type="number" name="bordersNorth" required> <input type="number" name="bordersSouth" required> <input type="number" name="bordersEast" required> <input type="number" name="bordersWest" required>
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
                                    <th><input type="text" name="angleA" required></th>
                                </tr>
                                <tr>
                                    <th>ب</th>
                                    <th><input type="text" name="LatitudeB" required></th>
                                    <th><input type="text" name="LongitudeB" required></th>
                                    <th><input type="text" name="angleB" required></th>
                                </tr>
                                <tr>
                                    <th>ج</th>
                                    <th><input type="text" name="LatitudeC" required></th>
                                    <th><input type="text" name="LongitudeC" required></th>
                                    <th><input type="text" name="angleC" required></th>
                                </tr>
                                <tr>
                                    <th>د</th>
                                    <th><input type="text" name="LatitudeD" required></th>
                                    <th><input type="text" name="LongitudeD" required></th>
                                    <th><input type="text" name="angleD" required></th>
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

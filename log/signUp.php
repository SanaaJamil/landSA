<!DOCTYPE html>

<html lang="ar" style='direction: rtl'>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sing Up</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
*
{font-family: "Montserrat", sans-serif;} 
    
#message {
  display:none;
  background: #fff;
  color: #000;
  position: relative;
  padding: 0px 25px 10px ;
  margin-top: 0px;
}

#message p {
  padding: 0px 35px;
  font-size: 18px;
}

.A{
  padding: 0px;
  margin: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  right: -25px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  right: -25px;
  content: "✖";
}
</style>
<!-- CSS&JS of header and footer -->
<script src="../landSA/components/ComponentHandler.js" ></script>
<!-- Header CSS -->
<style>
        /*header css*/
        li, a, button {
            font-weight: 500; /*from the link on top of the bage*/
            font-size: 16px;
            color: #000000;
            text-decoration: none;
        }

        .header {
            background-color: #ffffff;
            display: flex;
            justify-content: flex-start; /*push every thing to the right*/
            align-items: center;
            padding: 30px 10%; /*30 from top and bottom, 10 from the sides*/
        }
        .header {
            display: flex;
            flex-flow: row wrap;
            width: 100%;
            /* justify-content: flex-end;
            align-items: center;
            padding: 30px 10%; 30 from top and bottom, 10 from the sides */
        }
        /*each indivital link*/
        .nav_links Li {
            display: inline-block; /*view side by side*/
            padding: 0px 20px;
        }

        .nav_links li a {
            transition: all 0.3s ease 0s;
        }

        .nav_links li a:hover {
            color: #0088a9
        }

    </style>
</head>

<body>
  <!--Page header-->
	<div id="Head" w3-include-html="../landSA/components/nav.php"></div>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <img class="logo " src="../LandSA/images/logo.gif" alt="logo" width="300px" style="margin-right: 125px">
                    <h4 class="title">إنشاء حساب</h4>
                    <form  onSubmit="return validate();" method="POST" action="SignupHandler.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div <?php if (isset($id_error)): ?> class="input-group" <?php endif ?>>
                                    <label class="label">رقم الهوية </label>
                                    <input class="input--style-4" type="text" name="ID" maxlength="10" pattern="[0-9]{10}" required>
                                    <?php if (isset($id_error)): ?>
	  	                              <span><?php echo $id_error; ?></span>
	                                  <?php endif ?>
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group">
                            <label class="label">نوع الهوية</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="IDType">
                                    <option disabled="disabled" selected="selected">اختر نوع الهوية</option>
                                    <option>مواطن</option>
                                    <option>مقيم</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">الاسم الأول</label>
                                    <input class="input--style-4" type="text" name="fristName"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                     <label class="label">اسم الأب</label>
                                    <input class="input--style-4"  type="text" name="middleName"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">اسم العائلة</label>
                                    <input class="input--style-4" type="text" name="lastName"required>
                                </div>
                            </div>
                            

                            </div>
                            
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">البريد الإلكتروني</label>
                                    <input class="input--style-4" type="email" name="Email" placeholder="example@xxxxx.com" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">تاريخ الميلاد</label>
                                        <input class="input--style-4" type="date" name="BirthDate" required>
                                         </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">IBAN ايبان</label>
                                    <input class="input--style-4" type="text" name="IBAN" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"> رقم الجوال</label>
                                    <input class="input--style-4" type="text" name="phoneNum" placeholder="05XXXXXXXX" maxlength="10" pattern="+966[0-9]{10}" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="psw">كلمة المرور</label>
                                    <input class="input--style-4" type="Password" id="psw" name="Password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                     title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>                                 
                                </div>
                                <div id="message">
                                    <h5>يجب أن تحتوي كلمة المرور على ما يلي:</h5>
                                    <p id="letter" class="invalid A" > حروف صغيرة</p>
                                    <p id="capital" class="invalid A">حروف كبيرة</p>
                                    <p id="number" class="invalid A">أرقام</p>
                                    <p id="length" class="invalid A">على الأقل 8 رموز</p>
                                </div>
                              </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">إعادة كلمة المرور</label>
                                    <input class="input--style-4" type="Password" id ="password_confirm" name="password_confirm" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="Submit">ارسال</button>
                            <button class="btn btn--radius-2 btn--blue" type="reset">إلغاء</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<script>
        function validate(){

            var a = document.getElementById("psw").value;
            var b = document.getElementById("password_confirm").value;
            if (a!=b) {
               alert("يجب أن تتطابق كلمة المرور وإعادة كلمة المرور!");
               return false;
            }
        }
     </script>

      <!-- footer -->
		<div w3-include-html="../landSA/components/footer.php"></div>

    <script>
    includeHTML();
    </script>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

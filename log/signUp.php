<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Sing Up</title>


    <!--CSS-->
    <link href="../LandSA/style.css" rel="stylesheet" media="all">
    <style>
        button[type=reset] {
            margin-left: 10px;
            padding: 9px 25px;
            background-color: rgba(225, 225, 225, 1); /*used rgb to control the opacity*/
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }
        button:hover[type=reset]{
            background-color: rgba(200, 225, 225, 1);
        }

        table p{

        }

        /*the error message*/
        #message {
          display:none;
          background: #fff;
          color: #000;
          position: relative;
          padding: 0px 25px 10px ;
          margin-right: 30px;
          text-align: right;
        }

        #message p {
          padding: 0px 35px;
          font-size: 10px;
          margin: 1px;
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
</head>

<body>
    <!--Page header-->
    <div id="Head" w3-include-html="../landSA/components/nav.php"></div>

    <main>
        <asdie></asdie>
        <div class="container" style="width: 650px;">
            <img class="logo " src="../LandSA/images/logo.gif" alt="logo" width="300px" style="margin-right: 25%;">
            <h1 class="title">إنشاء حساب</h1>

            <form  onSubmit="return validate();" method="POST" action="SignupHandler.php">
                <p>رقم الهوية</p>
                <div class="form">
                    <div <?php if (isset($id_error)): ?> class="input-group" <?php endif ?>>
                        <input type="text" name="ID" maxlength="10" pattern="[0-9]{10}" required>
                        <?php if (isset($id_error)): ?>
                        <span><?php echo $id_error; ?></span>
                    <?php endif ?>
                    </div>
                </div>
                
                <p>نوع الهوية</p>
                <div class="form">
                    <div class="custom_select">
                        <select name="IDType">
                            <option disabled="disabled" selected="selected">اختر نوع الهوية</option>
                            <option value="مواطن">هوية مواطن</option>
                            <option value="مقيم">هوية مقيم</option>
                        </select>
                    </div>
                </div>

                <p>الاسم الأول</p>
                <div class="form">
                    <input type="text" name="fristName"required>
                </div>

                <p>اسم الأب</p>
                <div class="form">
                    <input  type="text" name="middleName"required>
                </div>

                <p>اسم العائلة</p>
                <div class="form">
                    <input type="text" name="lastName"required>
                </div>

                <p>البريد الإلكتروني</p>
                <div class="form">
                    <input type="email" name="Email" placeholder="example@xxxxx.com" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" required>
                </div>

                <p>تاريخ الميلاد</p>
                <div class="form">
                    <input type="date" name="BirthDate" required>
                </div>

                <p>IBAN ايبان</p>
                <div class="form">
                    <input type="text" name="IBAN" required>
                </div>

                <p>رقم الجوال</p>
                <div class="form">
                    <input type="text" name="phoneNum" placeholder="05XXXXXXXX" maxlength="10" pattern="+966[0-9]{10}" required>
                </div>

                <table class="form">
                    <tr>
                      <th><p>كلمة المرور</p></th>
                      <th><p>إعادة كلمة المرور</p></th>
                    </tr>
                    <tr>
                      <th>
                          <div class="form">
                          <input type="Password" id="psw" name="Password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>                                 
                          </div>
                      </th>
                      <th>
                        <div class="form">
                            <input type="Password" id ="password_confirm" name="password_confirm" required>
                        </div>
                      </th>
                    </tr>
                    <tr>
                        <th>
                            <div id="message">
                                <p>يجب أن تحتوي كلمة المرور على ما يلي:</p>
                                <p id="letter" class="invalid A" > حروف صغيرة</p>
                                <p id="capital" class="invalid A">حروف كبيرة</p>
                                <p id="number" class="invalid A">أرقام</p>
                                <p id="length" class="invalid A">على الأقل 8 رموز</p>
                            </div>
                        </th>
                        <th></th>
                    </tr>
                </table>
                
                <div class="btn">
                    <button type="reset">إلغاء</button>
                    <button type="submit" name="Submit">ارسال</button>
                </div>
          </form>
        </div>
        <asdie></asdie>
    </main>
      

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
</body>
</html>
<!-- end document-->

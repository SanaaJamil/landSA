<!DOCTYPE html>
<html lang="ar" style='direction: rtl;'>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Log in</title>

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
        form .btn{
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-left: -16px;
        }

    </style>

    <!-- CSS&JS of header and footer -->
    <script src="../landSA/components/ComponentHandler.js" ></script>
</head>

<body>
    <!--Page header-->
	<div id="Head" w3-include-html="../landSA/components/nav.php"></div>


    <main>
        <aside></aside>
        <div class="container" style="width: 650px;">
            <img class="logo " src="../LandSA/images/logo.png" alt="logo" width="300px" style="margin-right: 25%;">
            <h1 class="title">تسجيل الدخول</h1>

            <form method="POST" action="‏‏LoginHandler.php">
                <p>رقم الهوية</p>
                <div class="form">
                    <input type="text" name="ID" maxlength="10" pattern="[0-9]{10}" required>
                </div>

                <p>كلمة المرور</p>
                <div class="form">
                    <input type="Password" name="Password" required>
                </div>
                
                
                <div class="btn">
                    <button type="reset">إلغاء</button>
                    <button type="submit">إرسال</button>
                </div>
                <div><br>
                    <p style="text-align: left;">ليس لديك حساب؟ <a style="color: dodgerblue;"href="signUp.php">إنشاء حساب</a></p>
                </div>
            </form>
        </div>
        <aside></aside>
    </main>

    <!-- footer -->
		<div w3-include-html="../landSA/components/footer.php"></div>

    <script>
    includeHTML();
    </script>

</body>

</html>
<!-- end document-->

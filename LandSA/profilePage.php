<?php
    #Check the connections with the server and DB
    include "components/connection.php";
    session_start();
    if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
        $ID = $_SESSION['loggedUser'];

        if(isset($_POST["save"])){
            $firstName = $_POST["firstName"];
            $middleName = $_POST["middleName"];
            $lastName = $_POST["lastName"];
            $IBAN = $_POST["IBAN"];
            $phoneNum = $_POST["phoneNum"];
            $Email = $_POST["Email"];
            
            $sql = "UPDATE users SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', phoneNum = '$phoneNum', Email = '$Email', IBAN = '$IBAN' WHERE users.ID = '$ID'";
            $query = mysqli_query($con, $sql);

            if ($con->query($sql) === TRUE) {
                echo "<script>alert('تم تعديل المعلومات بنجاح')</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        
        $ViewUser = "SELECT * FROM users WHERE ID = '$ID'";
        $result = mysqli_query($con,$ViewUser);
        if(!$result){
            echo "Error:".mysqli_error($con);
        }

        $row = mysqli_fetch_array($result);
        
        $ID=$row["ID"];
        $IDType=$row["IDType"];
        $firstName=$row["firstName"];
        $middleName=$row["middleName"];
        $lastName=$row["lastName"];
        $phoneNum=$row["phoneNum"];
        $Email=$row["Email"];
        $IBAN=$row["IBAN"];
        $BirthDate=$row["BirthDate"];
    }else{
		echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
		echo "<script>setTimeout(\"location.href = '../log/login.php.php';\",1500);</script>";
	}

?>

<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>

    <head>
		<title> Profile Page</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="components/ComponentHandler.js" ></script>
	<style>
    .card {
    background-color: #ffffffc7;
    border-radius: 18px;
    box-shadow: 1px 1px 8px 0 grey;
    height: auto;
    margin-bottom: 20px;
    padding: 20px 0 20px 50px;
    width: 100%;
    }
    .card-body{
        margin-right: 30px; 
    }
    .card-body button{
        margin-right: 8%;
        text-align: right;
    }
    form .form {
    width: 100%;
    margin: 2px;
    display: flex;
    align-items: center;
    }
    #UserData tr:nth-child(even){background-color: #f2f2f2;}
    #UserData{
        border-collapse: collapse;
        width: 100%;
        /* margin-right: 20px; */
    }
    #UserData td{
        padding: 10px 0px;
        padding-right: 20px;
    }


    </style>
    </head>
    <body>
		<!--Page header-->
		<div id="Head" w3-include-html="components/nav.php"></div>

        <main>
            <aside></aside>
            <div class="content">
                <h1>المعلومات الشخصيه</h1><br><br>
                
                <div class="card" id="save" style="display:none;">
                <div class="card-body">
                    <form method="POST">
                        <table id='UserData'>
                            <tr>
                                <th>الاسم الثلاثي: &emsp;</th>
                                <td>
                                    <div class="form">
                                        <?php echo "<input type='text' name='firstName' placeholder='$row[firstName]' required>" ?>
                                        <?php echo "<input type='text' name='middleName' placeholder='$row[middleName]' required>" ?>
                                        <?php echo "<input type='text' name='lastName' placeholder='$row[lastName]' required>" ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>رقم الهوية الوطنية: </th>
                                <td><?php print($ID);?></td>
                            </tr>
                            <tr>
                                <th>نوع الهوية:</th>
                                <td><?php print($IDType);?></td>
                            </tr>
                            <tr>
                                <th>رقم الجوال:</th>
                                <td>
                                    <div class="form">
                                        <?php echo "<input type='text' minlength='10' maxlength='10' name='phoneNum' placeholder='$row[phoneNum]' required>" ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>البريد الإلكتروني:</th>
                                <td>
                                    <div class="form">
                                        <?php echo "<input type='text' name='Email' placeholder='$row[Email]' required>" ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>رقم الحساب البنكي (IBAN):</th>
                                <td>
                                    <div class="form">
                                        <?php echo "<input type='text' name='IBAN' placeholder='$row[IBAN]' required>" ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>تاريخ الميلاد:  </th>
                                <td><?php print($BirthDate);?></td>
                            </tr>
                        </table><br>
                        <button type="submit" name="save">حفظ</button>
                        <button type="reset">إلغاء</button>
                    </form>
                </div>
                </div>
                <div class="card" id="edit">
                    <div class="card-body">
                        <table id='UserData'>
                        <tr>
                            <th>الاسم الثلاثي: &emsp;</th>
                            <td><?php print($firstName .' ' .$middleName .' ' .$lastName);?></td>
                        </tr>
                        <tr>
                            <th>رقم الهوية الوطنية: </th>
                            <td><?php print($ID);?></td>
                        </tr>
                        <tr>
                            <th>نوع الهوية:</th>
                            <td><?php print($IDType);?></td>
                        </tr>
                        <tr>
                            <th>رقم الجوال:</th>
                            <td><?php print($phoneNum);?></td>
                        </tr>
                        <tr>
                            <th>البريد الإلكتروني:</th>
                            <td><?php print($Email);?></td>
                        </tr>
                        <tr>
                            <th>رقم الحساب البنكي (IBAN):</th>
                            <td><?php print($IBAN);?></td>
                        </tr>
                        <tr>
                            <th>تاريخ الميلاد:  </th>
                            <td><?php print($BirthDate);?></td>
                        </tr>
                        </table>
                        <br>

                        <button name="edit" onclick="myFunction()">تعديل المعلومات</button>
                    </div>
                </div>
            </div>
            <aside></aside>
        </main>
		<!-- footer -->
		<div w3-include-html="components/footer.php"></div>

        <script>
        includeHTML();
        </script>
        <script>
            function myFunction() {
                var x = document.getElementById("save");
                var y = document.getElementById("edit");
                if (x.style.display === "none" && y.style.display === "block") {
                    x.style.display = "block";
                    y.style.display = "none";
                } else {
                    x.style.display = "none";
                    y.style.display = "block";
                }
            }
        </script>
    </body>
</html>

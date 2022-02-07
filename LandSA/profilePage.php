<?php
    #Check the connections with the server and DB
	include "connection.php";
    session_start();
    $ID = '2222';
    $Password = '2222';
    $sql = "SELECT * FROM users WHERE ID = '$ID' AND Password = '$Password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($count == 1){
    $user_id = $row['ID'];    }

    // if(!isset($_SESSION["loggedUser"])){
    //     header('Location: ../login.php');
    // }
    if(!isset($_SESSION['loggedUser'])){
        $_SESSION['loggedUser'] = $user_id;
    }


    
    $user_id=$_SESSION["loggedUser"];
    $ViewUser = "SELECT * FROM users WHERE ID = '$ID'";
    $result = mysqli_query($con,$ViewUser);
    if(!$result){
        echo "Error:".mysqli_error($con);
    }

    $row = mysqli_fetch_array($result);
    
    $user_id=$row["ID"];
    $IDType=$row["IDType"];
    $Name=$row["Name"];
    $phoneNum=$row["phoneNum"];
    $Email=$row["Email"];
    $IBAN=$row["IBAN"];
    $BirthDate=$row["BirthDate"];

?>

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>

    <head>
		<title> Profile Page</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="components/ComponentHandler.js" ></script>
	<style>
    .card {
    background-color: #fff;
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
    #UserData tr:nth-child(even){background-color: #f2f2f2;}
    #UserData{
        border-collapse: collapse;
        width: 100%;
        /* margin-right: 20px; */
    }
    #UserData td{
        padding: 20px 0px;
        padding-right: 20px;
    }


    </style>
    </head>
    <body>
		<!--Page header-->
		<div id="Head" w3-include-html="components/nav.php"></div>
        <div class="content">
            <h1>المعلومات الشخصيه</h1><br><br>
            
            <div class="card">
                <div class="card-body">
                    <table id='UserData'>
                    <tr>
                        <td>رقم الهوية الوطنية: &emsp;</td>
                        <td><?php print($user_id);?></td>
                    </tr>
                    <tr>
                        <td>نوع الهوية:</td>
                        <td><?php print($IDType);?></td>
                    </tr>
                    <tr>
                        <td>رقم الجوال:</td>
                        <td><?php print($phoneNum);?></td>
                    </tr>
                    <tr>
                        <td>البريد الإلكتروني:</td>
                        <td><?php print($Email);?></td>
                    </tr>
                    <tr>
                        <td>رقم الحساب البنكي (IBAN):</td>
                        <td><?php print($IBAN);?></td>
                    </tr>
                    <tr>
                        <td>تاريخ الميلاد:  </td>
                        <td><?php print($BirthDate);?></td>
                    </tr>
                    </table>
                    <br>

                    <form method="POST" action="">
                    <button><input type="submit" value="تعديل المعلومات" ><i class="material-icons" style="font-size:16px">mode_edit</i></button>
                    </form>

                    <br>
                </div>
            </div>

        </div>
        
		<!-- footer -->
		<div w3-include-html="components/footer.html"></div>

        <script>
        includeHTML();
        </script>
    </body>
</html>
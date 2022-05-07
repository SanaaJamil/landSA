<!-- change price form -->
<?php
$REUN=null;
#Check the connections with the server and DB
include "components/connection.php";
  
#Check if the user is still logedin
session_start();
if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
    // To get the REUN from 'Control Lands page'
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
      $REUN = $_GET['REUN'];
    }
}
    
?>
 
<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
  <head>
    <title> change price form</title>
    <link rel="stylesheet" href="style.css">
    <script src="components/ComponentHandler.js" ></script>
    
    <style>
      .Namefeild{
        text-align: center;
        width: 80%;
        margin:0 auto;
      }
      table.Namefeild{
      border-collapse: collapse;
      width: 80%;
      }
      .Namefeild input[type=text] {
        width: 98.5%;
      }
      .card {
        background-color: #fff;
        border-radius: 18px;
        box-shadow: 1px 1px 8px 0 grey;
        height: auto;
        margin-bottom: 20px;
        padding: 20px 0 20px 0px;
        width: 100%;
      }

    </style>
  </head>
  <body>
    <!--Page header-->
    <div id="Head" w3-include-html="components/nav.php"></div>
    <main>
        <aside></aside>

        
        <div class="content">
            <div style="text-align:center;">
                <h1 style="padding-left:1%;" >   رقم المالك  </h1>
                <h2><?PHP echo $REUN; ?></h2>
                <div class="container">
                    <?php echo"<input type='hidden' id='REUN' name='REUN' value='$REUN' />";
                        $query="SELECT phoneNum FROM users,landrecord WHERE landrecord.REUN='$REUN'"; 
                        $result = $con->query($query);
                        $row = mysqli_fetch_array($result);
                        echo $row['phoneNum'];
                    ?>
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
  </body>
</html>
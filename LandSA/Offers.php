<!-- Offers form -->
<?php
$REUN=null;
$ID=null;
  #Check the connections with the server and DB
  include "components/connection.php";
  
  #Check if the user is still logedin
  session_start();
  if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
    $ID = $_SESSION['loggedUser'];
    // To get the REUN from 'land on sale page'
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
      $REUN = $_GET['REUN'];
      print($REUN);
    }
    
    

    // receive all the informations from the interface form specifically "Offers.php"
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
      $REUN = $_POST["REUN"];
      $landPrice = $_POST['landPrice'];
      $OfferID = rand (1000, 9999);
      $requestID = rand (1000, 9999);
      
      //Check that the  owner can not giva an offer for his land 
      $query1="SELECT ID FROM users WHERE ID IN (SELECT IDNumber from landrecord WHERE REUN= $REUN)"; 
      $result = mysqli_query($con, $query1);
      $row = mysqli_fetch_array($result);
      $ID = $row["ID"];
      if ($ID == $_SESSION['loggedUser']){
        echo "<script>alert(' لايمكنك تقديم عرض شراء للارض التي تملكها')</script>";
      }else{ 
        $OwnerInfo = "SELECT IDNumber FROM landrecord WHERE REUN = $REUN";
        $OwnerRes = mysqli_query($con, $OwnerInfo);
        $OwnerRow = mysqli_fetch_array($OwnerRes);
        $OwnerID = $OwnerRow["IDNumber"];

        $stmt=$con->prepare("INSERT INTO offers (OfferID,landPrice,OwnerID, BuyerID,REUN,requestID) VALUES (?,?,?,?,?,?)");
        $stmt -> bind_param("ssssss",$OfferID,$landPrice,$OwnerID,$_SESSION['loggedUser'],$REUN,$requestID);
        $stmt->execute();
        echo "<script>alert('تم إرسال الطلب بنجاح')</script>";
        echo "<script>setTimeout(\"location.href = 'landBrowsePage.php';\",1500);</script>";
      }
    }
        #else if the user is NOT logedin
      }else{
        echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
        echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
      }
    
      ?>




<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
  <head>
    <title> offers form</title>
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
        
        <div style="text-align:center;margin: 5%;">
        <h1 style="padding-left:1%;" >تقديم عرض شراء للمالك </h1>
        <h2><?PHP echo $REUN; ?></h2>

          <!--  Offers Form -->
          <form method="POST" action="Offers.php">
          <?php echo"<input type='hidden' id='REUN' name='REUN' value='$REUN' />";?>

          
          <table class="Namefeild">
            <tr>
              <td><label for="landPrice"> السعر:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="landPrice" name="landPrice" required></td>
            </tr>
          </table><br><br>

          <button><input type="submit" value="ارسل" ></button>

          </form>
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
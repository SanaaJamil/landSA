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
    

    // receive all the informations from the interface form specifically "changePrice.php"
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
      $REUN = $_POST["REUN"];
        $price = $_POST["price"];

            if(isset($_POST["price"])){  
                $query = "UPDATE landsonsale set price= '$price' where REUN='$REUN'";        
                $res2 = mysqli_query($con,$query);
                if ($con->query($query)==TRUE) {
                    echo "<script>alert('تم تغيير السعر بنجاح')</script>";
                    echo "<script>setTimeout(\"location.href = 'controlLandspage.php';\",1500);</script>";
                } else {
                    echo "Eroo". $query. "<br>" . $con->error;
                }
            }


    }
    #else if the user is NOT logedin
  }else{
    echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
    echo "<script>setTimeout(\"location.href = '../log/login.php.php';\",1500);</script>";
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
        
        <div style="text-align:center;margin: 5%;">
        <h1 style="padding-left:1%;" >أدخل السعر  الجديد  </h1>
        <h2><?PHP echo $REUN; ?></h2>

          <!-- Gift Land Form -->
          <form method="POST" action="changePrice.php">
          <?php echo"<input type='hidden' id='REUN' name='REUN' value='$REUN' />";?>

          
          <table class="Namefeild">
            <tr>
              <td><label for="price">السعر:</label></td>
            </tr>
            <tr>
              <td><input type="text" id="price" name="price"   required></td>
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
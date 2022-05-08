<?php
  include "components/connection.php";
    session_start();
  if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
    $ID = $_SESSION['loggedUser'];
  }else{
    echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
    echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";
  }

  if(isset($_POST["accept"])){
    $REUN=$_POST['REUN'];
    $OfferID = $_POST['OfferID'];
    $query = "UPDATE offers set offerStatus= '1' where OfferID ='$OfferID'";    
    $query2 = "UPDATE offers set offerStatus= '2' WHERE REUN = '$REUN' AND OfferID != '$OfferID';";
    // Except SELECT * FROM offers where REUN ='$REUN'";    
       $res2 = mysqli_query($con,$query);
       $res = mysqli_query($con,$query2);
       if ($con->query($query)==TRUE) {
       } else {
         echo "Eroo". $query. "<br>" . $con->error;
       }        
    } 
    if(isset($_POST["reject"])){
      // $REUN=$_POST['REUN'];
      $OfferID = $_POST['OfferID'];
      $query = "UPDATE offers set offerStatus= '2' where OfferID ='$OfferID'";        
      $res2 = mysqli_query($con,$query);
      if ($con->query($query)==TRUE) {
      } else {
        echo "Eroo". $query. "<br>" . $con->error;
      }
    }
  ?>

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
  <title>view offers page </title>
  <link rel="stylesheet" href="style.css">
  <script src="components/ComponentHandler.js" ></script>
  
  <style>
  
    .block{
      display: flex;
      flex-direction: column;
        align-items: stretch;
    }
    .MiniBlock {
      display: flex;
      justify-content: space-evenly;
    }
    

    @media only screen and (max-width: 800px ) {
      .land {
        flex-direction: column;
        align-items: center;
      }
      .block {
        display: flex;
           width: 100%;
          flex-direction: row;
           justify-content: space-between;
      }
      .MiniBlock{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
      }
      .MiniBlock img{
        width: 50%;
        width:25%; 
        height:25%;
        border-radius: 2%;
      }

    }

    td, th { 
      text-align: center; 
      padding :8px; 
    }
    th{background-color: #EEEBDD;}

    td:nth-child(1) { background-color: #EEEBDD; }

    tr{ border-bottom: 1px solid #092D33;}

    table{
      align:center;
      line-height:40px;  
      border-collapse: collapse;
      background-color: #ffff;
         border-radius: 10px;
        box-shadow: 1px 1px 8px 0 grey;
        height: auto;
      margin-bottom: 20px;
      padding: 20px 0 20px 50px;
      width: 100%;
    }
    .heed {background-color:#26763A;
               color: #ffffff;}

      tr:nth-child(even) {background-color: #f2f2f2;}

      tr {border-bottom: 1px solid #dddddd;}

     tr:nth-of-type(even) {background-color: #f3f3f3;}

    tr:last-of-type {border-bottom: 2px solid #009879;}

    .bt {
      background-color:#BD2504;
       color: #ffffff;
    }
    .bt:hover{background-color:#D3705B}

    input{
      padding: 9px 25px;
    }

    button{
      padding: 0px;

    }


  </style>

</head>
<body>
    <!--Page header-->
    <div id="Head" w3-include-html="components/nav.php"></div>
    <main>
        <aside></aside>
        <div class="content">
            <div class="landList">
                <table> 
                    <tr> <th colspan="6" class= "heed"><h2> قائمة العروض</h2></th> </tr>
                            
                    <th> رقم الطلب </th> 
                    <th> رقم هوية المشتري </th> 
                    <th> رقم الوحدة العقارية </th> 
                    <th>  السعر </th> 
                    <th> </th>
                        
                        
                    <?php 
                        $query="SELECT * from offers WHERE offerStatus = 0 AND OwnerID = $ID"; 
                        $result = $con->query($query); 
                            while($rows = $result->fetch_assoc()) 
                        {   
                    ?> 
                    <tr> 
                        <td><?php echo $rows['OfferID']; ?></td> 
                        <td><?php echo $rows['BuyerID']; ?></td> 
                        <td><?php echo $rows['REUN']; ?></td>         
                        <td><?php echo $rows['landPrice']; ?></td> 
                        <form method= "post" action="viewOffers.php">
                            <?php echo" <input type='hidden' id='OfferID' name='OfferID' value='$rows[OfferID]';/> " ;?>
                            <?php echo" <input type='hidden' id='REUN' name='REUN' value='$rows[REUN]';/> " ;?>
                            <td>
                                <button><input name="accept" type="submit" value="قبول" ></button>
                                <button class="bt"><input style="color: #ffffff;" name="reject" type="submit" value="رفض" ></button>
                            </td>
                        </form> 
                    </tr> 
                    <?php 
                        } 
                    ?> 
                </table><br><br> 
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
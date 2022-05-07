<!-- Control Lands page-->
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
  <title>Lands on sale page </title>
  <link rel="stylesheet" href="style.css">
  <script src="components/ComponentHandler.js" ></script>
  
  <style>

    /* Style of each land */
    .land {
      background-color: #203864; /* Green background */
      /* color: white; White text */
      padding: 10px 24px; /* Some padding */
      cursor: pointer; /* Pointer/hand icon */
      margin: 8px 4px;
      display: flex;
      justify-content: space-between;

      background-color: #fff;
      border-radius: 18px;
      box-shadow: 1px 1px 8px 0 grey;
      height: auto;
      width: 100%;
      
    }
    .land p{
      display: flex;
      text-align: right;
      flex-wrap: wrap;
      
    }
    .land button {
      display: inline-flex;
      flex: left;
      text-align: left;
      margin-top: 10px;
    }
    .block{
      display: flex;
      flex-direction: column;
        align-items: stretch;
    }
    /* style of buttons */
    .sellB {
      background-color: rgba(255, 80, 60, 0.568);
    }
    .giftB{
      background-color: #149d3bbb;
    }
    .moreB{
      background-color:#35c8afce;;
    }
    .MiniBlock {
      display: flex;
      justify-content: space-evenly;
    }
    .land img{
        width: 40%;
        border-radius: 5%;
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

  </style>
  <?php
  include "components/connection.php";
  session_start();
  if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){
    $ID = $_SESSION['loggedUser'];
  }else{
    echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";
    echo "<script>setTimeout(\"location.href = '../log/login.php.php';\",1500);</script>";
  }
  // if(isset($_POST["sell"])){
  //   $REUN=$_POST['REUN'];
  //   $insertsell = "INSERT INTO landsonsale(REUN) 
    //       value('$REUN')";
    //        $result = mysqli_query($con,$insertsell);        
  //   }

  ?>
</head>
<body>
  <!--Page header-->
  <div id="Head" w3-include-html="components/nav.php"></div>
  <main>
  <aside></aside>

  <div class="content">
    <h1>  الأراضي المعروضة للبيع</h1><br>
    <div class="landList"></div>
      <?php
        // $sql_lands = "SELECT deedDate, deedNumber,unitType,REUN,city,neighborhoodName,landState  FROM landrecord WHERE IDNumber ='$ID'";
        $sql_lands = "SELECT landsonsale.REUN,deedDate, address,unitType,city,neighborhoodName,landState, price FROM landrecord,landsonsale WHERE landrecord.REUN=landsonsale.REUN";
        $result = $con->query($sql_lands);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<div class='land'>";
            // Informations block

            echo"<div class='block'>";
            echo "<table id='UserData'>";
            echo "<tr>
               <th><h2>رقم الوحدة العقارية: </h2></th>
               <th> <h2>$row[REUN]</h2></th>
              </tr>";
              echo "<tr>
              <td>&emsp;</td>
              <td>&emsp;</td>
               </tr>";  
            echo "<tr>
               <td>المدينة:</td>
               <td> $row[city]</td>
              </tr>";
             echo "<tr>
               <td>اسم الحي:</td>
               <td> $row[neighborhoodName]</td>
              </tr>";

            echo "<tr>
             <td>نوع الوحدة:</td>
             <td> $row[unitType]</td>
                </tr>";

            echo "<tr>
              <td> العنوان:</td>
              <td> $row[address]</td>
              </tr>";
            echo "<tr>
              <td>تاريخ الصك:</td>
              <td> $row[deedDate]</td>
              </tr>";
            echo "<tr>
              <td>السعر :</td>
              <td> $row[price]</td>
              </tr>";
            
          
            echo"</table>";
            echo"</div> <br>";

            // echo"<div class='MiniBlock'>";

              echo "<img src='images/Riyadh.jpg' alt='صورة الأرض' ><br> ";
              
              // Buttons block
              echo"<div class='block'>";
              if($row["landState"]==0){
                echo" 
                <form method='GET' action='Offers.php'>
                <input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
                <button class='sellB' type='submit' name='sell' >تقديم عرض</button>

                </form>";

                echo"
                <form method='GET' action='giftLandForm.php'>
                <input type='hidden' id='REUN' name='REUN' value='$row[REUN]' />
                <button class='giftB' type='submit' >التفاوض مع المالك</button>
                </form>";
                // <a ID='send_REUN'>$row[REUN]</a>
                  // <input type='text' name='$row[REUN]' />
                  // $_SESSION[REUN]=$row[REUN];

                // session_start();
                // // session_register('REUN');
                // $_SESSION['REUN']=$row['REUN'];
                // echo "<button class='giftB' onclick='window.location.href=\"giftLandForm.php\"'>اهداء</button>";

                
                
              }
              
              echo "<button class='moreB'>عرض التفاصيل></button>";
              
              echo"</div>";

            // echo"</div>";
          echo "</div>";
          }
        } else {
          echo "0 results";
        }
      ?>

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
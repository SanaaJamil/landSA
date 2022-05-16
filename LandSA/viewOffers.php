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

       $res2 = mysqli_query($con,$query);
       $res = mysqli_query($con,$query2);
       if ($con->query($query)==TRUE) {
       } else {
         echo "Eroo". $query. "<br>" . $con->error;
       }        
    } 
    if(isset($_POST["reject"])){
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

	table{
		line-height:40px;  
		border-collapse: collapse;
		background-color: #ffff;
		box-shadow: 1px 1px 8px 0 grey;
		height: auto;
		margin-bottom: 20px;
		padding: 20px 0 20px 50px;
		width: 100%; 
	}
	tr:nth-child(even) {
		background-color: #b3d3e2;
	}
	tr {border-bottom: 1px solid #dddddd;}

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


    #id01{
      display: none;
      
    }
    /* The Close Button (x) */
.close {
  right: 50px;
  top: 75px;
  font-size: 40px;
  font-weight: bold;
  color: #d1d1d1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

    .overlay-style {
				position: fixed;
				display: none;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				overflow: auto;
				padding-top: 50px;
				background-color: rgba(0, 0, 0, 0.5);
		}

    .block {
      padding: 16px;
      width: 700px;
      margin: auto;
    }
  </style>

</head>
<body>
    <!--Page header-->
    <div id="Head" w3-include-html="components/nav.php"></div>
    <main>
        <aside></aside>
        <div class="content">
          <h1> قائمة العروض</h1><br>
            <div class="landList">
                <table> 
                    <tr colspan="6" class= "heed"> </tr>
                            
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
            <h1> سجل معاملات البيع </h1><br>
            <div class="landList">
                <table> 
                    <tr colspan="6" class= "heed"> </tr>
                            
                    <th> رقم الطلب </th> 
                    <th> رقم هوية المشتري </th> 
                    <th> رقم الوحدة العقارية </th> 
                    <th>  السعر </th> 
                    <th> </th>
                        
                        
                    <?php 
                        $query="SELECT * from offers WHERE offerStatus = 1 AND OwnerID = $ID"; 
                        $result = $con->query($query); 
                            while($rows = $result->fetch_assoc()) 
                        {   
                    ?> 
                    <tr> 
                        <td><?php echo $rows['OfferID']; ?></td> 
                        <td><?php echo $rows['BuyerID']; ?></td> 
                        <td><?php echo $rows['REUN']; ?></td>         
                        <td><?php echo $rows['landPrice']; ?></td> 
                        <?php echo" <input type='hidden' id='OfferID' name='OfferID' value='$rows[OfferID]';/> " ;?>
                        <?php echo" <input type='hidden' id='REUN' name='REUN' value='$rows[REUN]';/> " ;?>
                        <td>
                          <button><input type="submit" value="فاتورة"  onclick="document.getElementById('id01').style.display='block'"></button>
                        </td>
                    </tr> 
                    <?php 
                        }
                    ?> 
                </table><br><br> 
                
                <div id="id01" class="overlay-style">
                  <div class="block">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <h3 style="text-align: center; margin-bottom: 20px;">فاتورة البيع</h3>
                    <table>
                      <tr>
                        <th>رقم الفاتورة:  </th>
                        <td><?php 
                        $billInfo = "SELECT * FROM `bill` WHERE 1";
                        $billRes = mysqli_query($con, $billInfo);
                        $billRow = mysqli_fetch_array($billRes);
                        echo $billRow['offerID'];
                        $REUN = $billRow['REUN'];

                        $spaceInfo = "SELECT spaceInNumbersLength, spaceInNumbersWidth FROM landInfo WHERE REUN = $REUN";
                        $spaceRes = mysqli_query($con, $spaceInfo);
                        $spaceRow = mysqli_fetch_array($spaceRes);
                        $space = $spaceRow['spaceInNumbersLength'] * $spaceRow['spaceInNumbersWidth'];
                        
                        ?></td>
                        <th>تاريخ الفاتورة:  </th>
                        <td><?php  ?></td>
                      </tr>
                      <tr>
                        <th>اسم البائع</th>
                        <td><?php echo $billRow['SellerFName'], ' ', $billRow['SellerMName'], ' ', $billRow['SellerLName'];  ?></td>
                        <th>اسم المشتري</th>
                        <td><?php echo $billRow['BuyerFName'], ' ', $billRow['BuyerMName'], ' ', $billRow['BuyerLName']; ?></td>
                      </tr>
                      <tr>
                        <th>رقم هوية البائع: </th>
                        <td><?php echo $billRow['OwnerID']; ?></td>
                        <th>رقم هوية المشتري: </th>
                        <td><?php echo $billRow['BuyerID']; ?></td>
                      </tr>
                      <tr>
                        <th>رقم ايبان البائع: </th>
                        <td><?php echo $billRow['BuyerID']; ?></td>
                        <th>رقم ايبان المشتري: </th>
                        <td><?php echo $billRow['BuyerID']; ?></td>
                      </tr>
                      <tr>
                        <th colspan="2">الوصف</th>
                        <td colspan="2">
                          <?php echo 'رقم الوحده: ' . $billRow['REUN'] . ' العنوان: ' . $billRow['address'] . ' المدينة: ' . $billRow['city'] . ' رقم الصك: ' . $billRow['deedNumber'] . ' تاريخ الصك: ' . $billRow['deedDate'] . ' المساحة: ' .  $space; ?>
                          <?php?>
                        </td>
                      </tr>
                      <tr>
                        <th colspan="2">الاجمالي بدون الضرية:</th>
                        <td colspan="2"><?php  ?></td>
                      </tr>
                      <tr>
                        <th colspan="2">ضريبة القيمة المضافة:</th>
                        <td colspan="2"><?php?></td>
                      </tr>
                      <tr>
                        <th colspan="2">المجموع:</th>
                        <td colspan="2"><?php?></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                </div>
            </div>
        </div>
        <aside></aside>
    </main>

    <!-- footer -->
    <div w3-include-html="components/footer.php"></div>
    <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
    <script>
      includeHTML();
    </script>
    
</body>
</html>

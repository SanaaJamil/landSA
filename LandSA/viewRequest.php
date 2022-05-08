<?php
	include "components/connection.php";
	session_start();

    if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']==true){

        $ID = $_SESSION['loggedUser'];

    }else{

        echo "<script>alert('الرجاء تسجيل الدخول اولاً')</script>";

        echo "<script>setTimeout(\"location.href = '../log/login.php';\",1500);</script>";

    }


	
	?>

<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>
<head>
	<title>view request page </title>
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
			/* align:center; */
			line-height:40px;  
			border-collapse: collapse;
			background-color: #ffff;
   			border-radius: 5px;
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
				<tr> <th colspan="6" class= "heed"><h2>   حاله الطلبات  </h2></th> </tr>

					<th> رقم الطلب </th> 	  
					<th> اسم المالك </th> 
					<th> رقم الوحدة العقارية  </th> 
					<th>السعر</th> 
					<th> حالة الطلب   </th>
						<th> </th> 
				<?php  
					$quer="SELECT * FROM offers WHERE BuyerID = $ID"; 
					$results = $con->query($quer); 

					while($row = $results->fetch_assoc())
				{ 
				?> 
				<tr> 
					<td><?php echo $row['requestID']; ?></td> 
					<td><?php 
					$REUN = $row['REUN'];
					$OwnerID = $row['OwnerID'];
					$quer2="SELECT name FROM landrecord WHERE IDNumber ='$OwnerID' AND REUN = '$REUN'"; 
					$results2 = $con->query($quer2); 
					$row2 = mysqli_fetch_array($results2);
					echo $row2['name']; 
					?>
					</td> 
					<td><?php echo $row['REUN']; ?></td> 
					<td><?php echo $row['landPrice']; ?></td> 
					<td><?php 
						if ($row['offerStatus']==0){echo "الطلب قيد التنفيذ";
						}elseif($row['offerStatus']==1){echo "الطلب مقبول";
						}elseif($row['offerStatus']==2){echo "الطلب مرفوض";} 
					?></td>
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
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

	td{
		text-align: center; 
		padding :8px; 
	} 
	
	th { 
		text-align: center; 
		padding :8px; 
		background-color: #3781a1;
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
	<h1> طلباتي </h1><br>
		<div class="landList">
		<table> 
				<tr colspan="5" class= "heed">  </tr>

				<th> رقم الطلب </th> 	  
					<th> اسم المالك </th> 
 			  		<th>  رقم الوحدة العقارية </th> 
			 	    <th> السعر  </th> 
			 		<th> حالة الطلب   </th>
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
					$quer2="SELECT firstName,middleName,lastName FROM landrecord WHERE IDNumber ='$OwnerID' AND REUN = '$REUN'"; 
					$results2 = $con->query($quer2); 
					$row2 = mysqli_fetch_array($results2);
					
					$firstName = $row2['firstName'];
					$middleName = $row2['middleName']; 
					$lastName = $row2['lastName']; 

					print($firstName .' ' .$middleName .' ' .$lastName);
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

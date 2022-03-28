<?php
include "components/upload.php";
?>
<!DOCTYPE html>
<html lang="ar" style='direction: rtl'>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet"
		type="text/css"
		href="style.css" />
        <style>
            img{
                width: 300px;
            }
        </style>
</head>

<body>
	<div id="content">

       <!-- retrive images from DB -->
        <?php 
        $sql_lands = "SELECT * FROM `landrecord`,`landinfo` WHERE `landrecord`.REUN=`landinfo`.REUN";
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
                        <th>الموقع:  </th>
                        <th> $row[address]</th>
                        </tr>";
                        echo "<tr>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                    </tr>";	
                    echo "<tr>
                        <td>المدينة: </td>
                        <td> $row[city]</td>
                        </tr>";
                    echo "<tr>
                        <td>اسم الحي:</td>
                        <td> $row[neighborhoodName]</td>
                        </tr>";
                    echo"</table>";
                    echo"</div>";
                    $REUN=$row['REUN'];

                    // Get image data from database 
                    $result_I = $con->query("SELECT image FROM images WHERE REUN=$REUN"); 
                    if($result_I->num_rows > 0){           
                        while($row = $result_I->fetch_assoc()){
                                echo "<img src='data:image/jpg;charset=utf8;base64,";
                                echo base64_encode($row['image']);
                                echo "' />";
                        }
                    }else{
                        echo "<p class='status error'>Image(s) not found...</p>";
                    }
                    
                    echo"</div>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
        // ------------------------------------------------
            // $result_II = $con->query("SELECT image,id FROM images ORDER BY id DESC"); 
            // if($result_II->num_rows > 0){
            //     while($row = $result_II->fetch_assoc()){
            //         echo "<img src='data:image/jpg;charset=utf8;base64,";
            //         echo base64_encode($row['image']);
            //         echo "' />";
            //     }
            // }else{
            //     echo "<p class='status error'>Image(s) not found...</p>";
            // }
        // ------------------------------------------------
    
        
        ?>

	</div>

    

</body>

</html>
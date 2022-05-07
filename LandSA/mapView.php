<?php
  include "connection.php";
  
  $viewMap = "SELECT * FROM map WHERE REUN = $REUN AND REUN IN (SELECT REUN FROM landsonsale)";
  $result = mysqli_query($con,$viewMap);

  $row = mysqli_fetch_array($result);

  $REUN = $row["REUN"];
  $lat = $row["latitude"];
  $long = $row["longitude"];


?>

<!-- -------------------------------------------------#HTML Code#-------------------------------------------------- -->

<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 300px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
        background-color: rgba(103,178,147, 0.8);
      }
    </style>
    <script>      // Initialize and add the map
      // In the following example, markers appear when the user clicks on the map.
      var marker;
      var longitude;
      var latitude;
      var map;


      function initMap() {
        <?php
            echo "var lats ='$lat';";
            echo "var longs ='$long';";
        ?>
        console.log(lats);
        console.log(longs);

        x = <?php echo($lat)?>;
        y = <?php echo($long)?>;

        var uluru = { lat: <?php echo($lat)?>, lng: <?php echo($long)?> };

        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 20,
          center: uluru,
        });

        new google.maps.Marker({
          position: uluru,
          map
        });
        
      }
      
    </script>
    
  </head>
  
  <body>
    <!--The div element for the map -->
    <div id="map"></div>

    <p id="latitude"></p>
    <p id="longitude"></p>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl39nJCT9GvsrbmIlEexdz9LPr7v_9s3E&callback=initMap">
    </script>
  </body>
</html>
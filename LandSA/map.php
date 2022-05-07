<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
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
        var uluru = { lat: 24.7136, lng: 46.6753 };
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: uluru,
        });

        function placeMarker(location) {
          if ( marker ) {
            marker.setPosition(location);
          } else {
            marker = new google.maps.Marker({
              position: location,
              map: map
            });
          }
        }

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);

          //convert "event.latLng" into string
          var location = JSON.stringify(event.latLng);
          //remove unwanted parts of the string to be left with the latitude and longitude
          newStr = location.replace("{\"lat\":", "");
          newStr = newStr.replace("\"lng\":", "");
          newStr = newStr.replace("}", "");
          //split the string to get an array of the latitude and longitude
          const myArray = newStr.split(",");

          //save the latitude and longitude in a variable to send to the database
          latitude = myArray[0];
          longitude = myArray[1];
          
          document.getElementById('latitude').value = latitude;
          document.getElementById('longitude').value = longitude;

        });
      }
      
    </script>
    
  </head>
  
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    
    <input type="hidden" name="lats" id="latitude" />
    <input type="hidden" name="longs" id="longitude" />

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl39nJCT9GvsrbmIlEexdz9LPr7v_9s3E&callback=initMap">
    </script>
  </body>
</html>
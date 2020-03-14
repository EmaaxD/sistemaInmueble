<?php 

$mapa = htmlentities($_GET['mapa']);

$address = urlencode($mapa);

$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;

$respose = file_get_contents($url);

$json = json_decode($respose,true);

$lat = $json['results'][0]['geometry']['location']['lat'];

$lng = $json['results'][0]['geometry']['location']['lng'];

// echo $lat;
// echo "<br>";
// echo $lng;

?>
<!DOCTYPE html>
<html>
 <head>

   <style>
   	
   	html,body {

   		height: 100%;
   		margin: 0;
   		padding: 0;

   	}

   	#map {

   		height: 100%;
   	}
   </style>

</head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var myLatLng = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 18
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt6ck6HW1Xw4NN34A4HZooy3h5TCgNMdo&callback=initMap" async defer></script>
  </body>
</html>
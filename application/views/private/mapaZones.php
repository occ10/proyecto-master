<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mapa Universidad</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        html, body, #map { margin: 0; padding: 0; height: 100%; }
    </style>

</head>
<body>


<div id="map"></div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG9NywQiRlbr3FJUhYBFCSFXZI79IF-tE&callback=initMap">
</script >
<script>

    var  aux = <?php  echo  json_encode($Resultado)?>;
    var jsn = JSON.parse(aux);
    function initMap() {

        var posArray = [];

        for(var i=0; i<jsn.length; i++){
            posArray[i] = {lat: parseFloat(jsn[i].lat), lng: parseFloat(jsn[i].lon), id: jsn[0].id}

        }

        var center = {lat: 38.385189, lng: -0.514053};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: center,
            mapTypeId: 'satellite'
        });

        var markerLabel = 'Z ';
        for (i = 0; i < posArray.length; i++) {
            console.log(posArray[i]);
            var marker = new google.maps.Marker({
                position: posArray[i],
                map: map,
                title: ""+i,
                label: {
                    text: markerLabel+(posArray[i].id),
                    color: "#FFFFFF",
                    fontSize: "10px",
                    fontWeight: "bold",
                    borderColor: "#000000",
                }
            });
        }


    }
</script>
</body>
</html>

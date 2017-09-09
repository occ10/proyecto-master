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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG9NywQiRlbr3FJUhYBFCSFXZI79IF-tE&callback=initMap">
    </script >
    <script>

        function initMap() {


            var url= "http://localhost/proyecto-master/public/mapaCordenadasUniversidad";
            var posArray = [];
            $.ajax(
                {

                    type:"GET",
                    url: url,
                    global: false,
                    async:false,
                    contentType: "application/json",
                    dataType: 'json',
                    success:function(response)
                    {
                        var obj = JSON.stringify(response);
                        var jsn = JSON.parse(obj);

                        for(var i=0; i<jsn.length; i++){
                            posArray[i] = {lat: parseFloat(jsn[i].lat), lng: parseFloat(jsn[i].lon)}

                        }
                    },
                    error: function(error)
                    {
                        alert(error);
                    }
                }
            );

            var center = {lat: 38.385189, lng: -0.514053};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: center,
                mapTypeId: 'satellite'
            });

            var markerIcon = {
                url: 'http://image.flaticon.com/icons/svg/252/252025.svg',
                scaledSize: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(32,65),
                labelOrigin: new google.maps.Point(40,33)
            };
            var markerLabel = 'Parking ';
            for (i = 0; i < posArray.length; i++) {
                //console.log(posArray[i]);
                var marker = new google.maps.Marker({
                    position: posArray[i],
                    map: map,
                    title: "Parking "+(i+1),
                    icon: markerIcon,
                    label: {
                        text: markerLabel+(i+1),
                        color: "#FFFFFF",
                        fontSize: "16px",
                        fontWeight: "bold",
                       borderColor: "#000000",
                    }
                });
            }


        }
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>

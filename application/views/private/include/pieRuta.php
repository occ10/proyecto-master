</div>
<div class="footer">
    <p>Posted by: Hege Refsnes</p>
    <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
</div>
</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG9NywQiRlbr3FJUhYBFCSFXZI79IF-tE&callback=initMap">
</script >
<script>
    function initMap() {
var origen = <?php echo "\"" . $detalleUsuario->origen .  "\""?>;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( { "address": origen}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK && results.length > 0) {
                var location = results[0].geometry.location,
                    lat      = location.lat(),
                    lng      = location.lng();
                //alert("Latitude: " + lat);
                //alert("Longitude: " + lng);
            //}
       // });
        var pointA = new google.maps.LatLng(38.385168, -0.514045),
            pointB = new google.maps.LatLng(lat, lng),
            myOptions = {
                zoom: 7,
                center: pointA,
               // mapTypeId: 'satellite'
            },
            map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
            // Instantiate a directions service.
            directionsService = new google.maps.DirectionsService,
            directionsDisplay = new google.maps.DirectionsRenderer({
                map: map
            }),
            markerA = new google.maps.Marker({
                position: pointA,
                title: "point A",
                label: "A",
                map: map
            }),
            markerB = new google.maps.Marker({
                position: pointB,
                title: "point B",
                label: "B",
                map: map
            });

        // get route from A to B
        calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
    }
    });
    }



    function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
        directionsService.route({
            origin: pointA,
            destination: pointB,
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    //initMap();

</script>
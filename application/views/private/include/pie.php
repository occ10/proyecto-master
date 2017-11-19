
</div>
<div class="footer">

    <p> <?php echo date("Y-m-d h:i:sa") ?></p>
    <p>Contact information: occ10@alu.es</p>
</div>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG9NywQiRlbr3FJUhYBFCSFXZI79IF-tE&callback=initMap">
</script >
<script>
    //var jsn = [];

    var  jsn = <?php  if (isset ($Resultado)){
        echo  json_encode($Resultado);?>

        //jsn =  JSON.parse(jsn);

    <?php }else{ echo json_encode($corrdenates);}
     ?>

    function initMap() {

        var posArray = [];
        var count = 0;
        for(var i=0; i<jsn.length; i++) {
            //if (jsn[i].ocupada == '1') {
            <?php  if (isset ($Resultado)){  ?>
                posArray[count] = {aparcamiento: jsn[i].aparcamiento   , lat: parseFloat(jsn[i].lat), lng: parseFloat(jsn[i].lon), id: jsn[i].id}
                count++;
            <?php }else{?>
                posArray[i] = {codigo: jsn[i].codigo , superficie: jsn[i].superficie , plazas : jsn[i].plazas , lat: parseFloat(jsn[i].lat), lng: parseFloat(jsn[i].lon), id: jsn[i].id}

            <?php  } ?>


        //}

        }

        var center = {lat: 38.385189, lng: -0.514053};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: center,
            mapTypeId: 'satellite'
        });

        var markerLabel = 'Z ';
        for (i = 0; i < posArray.length; i++) {
            console.log(posArray[i]);

            var cad = "";

            if(posArray[i].superficie)
                cad = 'aparcamiento: ' + posArray[i].codigo +  '\nsuperficie: ' + posArray[i].superficie + '\nplazas:' + posArray[i].plazas + '\nlatitud: ' +posArray[i].lat+ '\nlongitud: ' + posArray[i].lng;
            else
                cad = 'aparcamiento: ' + posArray[i].aparcamiento  + '\nlatitud: ' +posArray[i].lat+ '\nlongitud: ' + posArray[i].lng;
            var marker = new google.maps.Marker({
                position: posArray[i],
                map: map,
                title: cad,
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

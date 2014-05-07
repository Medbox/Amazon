
function initialize() {
    var initialLocation;
    var browserSupportFlag =  new Boolean();
    //var latitud = new google.maps.LatLng(-39.296667, -72.235556);
    var myOptions = {
        zoom: 15,
        //center: latitud,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    /*var gsat = new OpenLayers.Layer.Google(
        "Google Satellite",
        {type: google.maps.MapTypeId.SATELLITE, numZoomLevels: 22}
        // used to be {type: G_SATELLITE_MAP, numZoomLevels: 22}
    );*/
    
    var map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    
    browserSupportFlag = true;
    //navigator.geolocation;
    navigator.geolocation.getCurrentPosition(function(position) {
        initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        map.setCenter(initialLocation);
        //map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
    }, function() {
        handleNoGeolocation(browserSupportFlag);
    });
    $.ajax({
        type: "POST",
        url: "./ajax/ajax_latitud.php",	
        cache	:	false,
        success:	function(datos){
            var totales = datos.split("&");
            $.each(totales, function(index, value) { 
                var totales_dat = value.split("|");
                var texto = new google.maps.LatLng(totales_dat[0],totales_dat[1]);
                var marker = new google.maps.Marker({
                    position: texto, 
                    map: map, 
                    title: totales_dat[2]
                });
                google.maps.event.addListener(marker, 'click', function(){
                    $.facebox(function() {
                        $.get('vistas/popup/cajones_apiario.php?id='+totales_dat[3], function(html) {
                            $.facebox(html);
                        });
                    });
                })
            });        
        }
    });	
}

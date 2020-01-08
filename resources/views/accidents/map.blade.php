<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RCSM v1.0.0</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dist/img/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/img/favicon.png')}}">
    <!-- Fonts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->

</head>
<body >
<div class="flex-center position-ref full-height">

    <div id="map" style="height: 500px;width: 100%;margin: 0 auto"></div>

</div>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTPdk_OYvinStVEVcWPFtkVevH2UDOYBo&libraries=places"
        async defer></script>
<script>
    $(function () {

        var map;
        geoLocationInit();

        function geoLocationInit() {

            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(success,fail);
            }
            else{
                alert("Browser not supported !")
            }
        }

        function success(position) {
            var latVal = position.coords.latitude;
            var lanVal = position.coords.longitude;

            var myLatLang = new google.maps.LatLng(latVal,lanVal);

            createMap(myLatLang);

            nearbysearch(myLatLang,"school");
        }

        function fail() {

            alert("it fails");
        }



        function createMap(myLatLang){
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLang,
                zoom: 12
            });

            var marker = new google.maps.Marker({
                position: myLatLang,
                map: map,
                title: 'Your Location !'
            });
        }

        function createMarker(latlang,icn,name) {
            var marker = new google.maps.Marker({
                position: latlang,
                map: map,
                icon: icn,
                title: name
            });
        }

        function nearbysearch(myLatLang,type) {

            var request = {
                location: myLatLang,
                radius: '2500',
                type: [type]
            };

            service = new google.maps.places.PlacesService(map);

            service.nearbySearch(request, callback);

            function callback(results, status) {

                var latlng;
                var icn;
                var name;

                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {

                        var place = results[i];

                        latlng = place.geometry.location;
                        icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                        name = place.name;

                        createMarker(latlng, icn,name);
                    }
                }
            }

        }


    })
</script>
</body>
</html>

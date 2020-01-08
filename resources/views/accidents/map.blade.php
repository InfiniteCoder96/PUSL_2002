<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PUSL 2002</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dist/img/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/img/favicon.png')}}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


    <link rel="stylesheet" href="{{asset('plugins/pace/pace.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body >

<div class="content">
    <div id="map" style="height: 500px;width: 100%;margin: 0 auto"></div>
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>50</h3>

                    <p>Critical Accidents</p>

                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>

        </div>

        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>57</h3>

                    <p>Medium Accidents</p>

                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>

        </div>

        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>175</h3>

                    <p>Minor Accidents</p>

                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>

        </div>
    </div>

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

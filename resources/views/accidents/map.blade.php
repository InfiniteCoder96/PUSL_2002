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

    <style>
        html, body {
            background-image: url('https://i.pinimg.com/originals/41/aa/09/41aa09f7665923b7baa82997cdb49d67.gif');
            background-size: cover;
            color: whitesmoke;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100%;
            margin: 0;
        }

        .top-right {
            position: absolute;
            right: 10px;
        }

        .content {

            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: whitesmoke;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .card { background-color: rgba(245, 245, 245, 0.4); }
        .card-header, .card-footer { opacity: 1;color: whitesmoke}

    </style>
</head>
<body >
<nav class="navbar navbar-light navbar-expand-lg bg-dark" style="padding: 10px">
    @if (Route::has('login'))
        <div class="top-right links">
            @if(Auth::check())
                <a href="{{ url('/dashboard') }}" class="btn btn-social-icon btn-info"><i class="fa fa-home"></i></a>
                <div class="pull-right">
                    <a class="btn btn-warning" href="{{ route('logout') }}" style="margin-left: 5px"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        SIGN OUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            @else
                <a href="{{ url('/login-me') }}">LOGIN</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</nav>
<div class="content">
    <div id="map" style="height: 500px;width: 100%;margin: 0 auto"></div>
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$critical_accidents}}</h3>

                            <p>Crtical Accidents</p>

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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{$normal_accidents}}</h3>

                            <p>Normal Accidents</p>

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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$minor_accidents}}</h3>

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
            <!-- small box -->

        </div>
        <div class="col-lg-8 col-md-8 col-xs-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Monthly Report</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div>
                                <div id="cc"></div>
                                <!-- Chart Canvas -->
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->

                <!-- /.box-footer -->
            </div>

        </div>



    </div>

</div>

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTPdk_OYvinStVEVcWPFtkVevH2UDOYBo&libraries=places"
        async defer></script>
<script>
    $(function () {

        var map;
        var marker;
        var latVal;
        var lanVal;

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
            latVal = position.coords.latitude;
            lanVal = position.coords.longitude;

            var myLatLang = new google.maps.LatLng(latVal,lanVal);

            createMap(myLatLang);

            searchAccidents(latVal,lanVal);

            google.maps.event.addListener(marker, 'dragend', function(marker) {

                var latLng = marker.latLng;

                latVal = latLng.lat();
                lanVal = latLng.lng();

                searchAccidents(latVal,lanVal);

            });


        }

        function fail() {
            alert("it fails");
        }



        function createMap(myLatLang){
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLang,
                zoom: 8
            });

            marker = new google.maps.Marker({
                position: myLatLang,
                map: map,
                title: 'Your Location !'
            });
        }

        var infowindow = new google.maps.InfoWindow({});

        function createMarker(latlang,icn,name,val) {
            const amarker = new google.maps.Marker({
                position: latlang,
                map: map,
                icon: icn,
                title: name
            });


            var contentString = document.createElement('div');
            var h4 = document.createElement('h4');
            h4.textContent = name;
            h4.style.color = 'black';

            var para = document.createElement('p');
            para.textContent = val.description;
            para.style.color = 'black';

            var condition = document.createElement('p');

            if(val.condition === 'critical'){
                condition.textContent = val.condition + " accident";
                condition.style.color = 'white';
                condition.style.backgroundColor = 'red';
            }
            if(val.condition === 'normal'){
                condition.textContent = val.condition + " accident";
                condition.style.color = 'white';
                condition.style.backgroundColor = 'blue';
            }
            if(val.condition === 'minor'){
                condition.textContent = val.condition + " accident";
                condition.style.color = 'white';
                condition.style.backgroundColor = 'green';
            }



            contentString.appendChild(h4);
            contentString.appendChild(para);
            contentString.appendChild(condition);
            contentString.appendChild(document.createElement('br'));

            var img_01 = document.createElement('img');
            img_01.src = 'images/' + val.image_01 ;
            img_01.style.width = '40%';
            img_01.style.height = '150px';
            img_01.style.margin = '10px';
            contentString.appendChild(img_01);

            var img_02 = document.createElement('img');
            img_02.src = 'images/' + val.image_02 ;
            img_02.style.width = '40%';
            img_01.style.height = '150px';
            contentString.appendChild(img_02);

            google.maps.event.addListener(amarker, 'click', function() {
                infowindow.close(); // Close previously opened infowindow
                infowindow.setContent(contentString);
                infowindow.open(map, amarker);
            });


        }


        function searchAccidents(latVal,lanVal) {

            $.ajax({
                url: '{{route('accidents.searchAccidents')}}',
                method:'POST',
                data: {
                    lat: latVal,
                    lang: lanVal,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (accidents) {

                    $.each(accidents, function (i, val) {

                        var alatval = val.lat;
                        var alangval = val.lang;
                        var sname = val.name;

                        var aLatLng = new google.maps.LatLng(alatval, alangval);

                        if(val.condition === 'critical'){
                            var aicon = 'http://maps.google.com/mapfiles/kml/paddle/red-stars.png';
                            createMarker(aLatLng,aicon,sname,val);
                        }
                        else if(val.condition === 'normal'){
                            var aicon = 'http://maps.google.com/mapfiles/kml/paddle/blu-blank.png';
                            createMarker(aLatLng,aicon,sname,val);
                        }
                        else if(val.condition === 'minor'){
                            var aicon = 'http://maps.google.com/mapfiles/kml/paddle/grn-blank.png';
                            createMarker(aLatLng,aicon,sname,val);
                        }
                    })
                }
            })


        }


        var accidents =  <?php echo json_encode($accidents) ?>;
        var accidents_approved = <?php echo json_encode($accidents_approved) ?>;
        var accidents_rejected = <?php echo json_encode($accidents_rejected) ?>;

        Highcharts.chart('cc', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Accidents Reported, ' + (new Date).getFullYear()
            },
            subtitle: {
                text: 'Source: TAT Data'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Sales'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Accidents Reported',
                data: accidents
            },{
                name: 'Accidents Approved',
                data: accidents_approved
            },{
                name:'Accidents Rejected',
                data: accidents_rejected
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

    });
</script>
</body>
</html>

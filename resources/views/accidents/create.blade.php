@extends('layouts.user.app')


@section('page-header')
    <section class="content-header">
        <h1>
            Accidents
            <small>new accident</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Accident</li>
            <li class="active">Report New Accident</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="alert alert-success alert-dismissible hide" id="success-alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <p id="success-msg"></p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Report New Accident</h3>
                    <div class="pull-right">
                        <a class="btn btn-flat btn-danger disabled" >Accident ID: {{$id}}</a>
                    </div>
                </div>
                <form role="form" action="{{ route('accidents.store') }}" method="POST" enctype="multipart/form-data" id="accident_create_form">
                    @csrf
                    <div class="box-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group">
                                        <label>Accident Name</label>
                                        <input type="text" name="accident_name" id="accident_name" class="form-control" placeholder="Accident name">
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <div class="form-group">
                                        <label>Accident Description</label>


                                            <textarea name="accident_desc" class="form-control" ></textarea>

                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <div class="form-group">
                                        <label>Accident Location</label>
                                        <div class="form-group">
                                            <button
                                                    type="button"
                                                    class="btn btn-sm btn-success"
                                                    data-toggle="modal"
                                                    data-target="#accidentLocator"
                                            >Locate on map</button>
                                            <span class="help-block hide">Help block with error</span>
                                        </div>


                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <div class="form-group">
                                        <label>Accident Location Coordinates</label>
                                        <div class="input-group" style="width: 100%">
                                            <span class="input-group-addon">Latitude</span>
                                            <input type="text" class="form-control" id="lat-span" name="lat" readonly>
                                        </div>
                                        <br>
                                        <div class="input-group" style="width: 100%">
                                            <span class="input-group-addon">Longitude</span>
                                            <input type="text" class="form-control" id="lon-span" name="long" readonly>
                                        </div>

                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" onclick="reset()" class="btn btn-default">Reset</button>
                        <button type="button" class="btn btn-info" id="accident_create_form_submit">Submit</button>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    @include('accidents.includes.accidentLocator')

@endsection

@section('scripts')


    <script>
        Dropzone.options.myAwesomeDropzone = {
            url:action="{{ route('accidents.store') }}",
            autoProcessQueue: false,
            previewsContainer: ".dropzone-previews",
            uploadMultiple: true,
            maxFiles: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            init: function () {

                var myDropzone = this;

                // Update selector to match your button
                $("#accident_create_form_submit").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('sending', function(file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $('#accident_create_form').serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            },
            success: function(file, response)
            {

                var myDropzone = this;

                $('#accident_create_form').trigger("reset");
                myDropzone.removeFile(file);
                
                $('#success-alert').removeClass('hide');
                $('#success-msg').html('Accident reported successfully');
            },
            error: function(file, response)
            {
                return false;
            }
        };

        $(function () {

            var map;
            var marker;

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

                marker = new google.maps.Marker({
                    position: myLatLang,
                    map: map,
                    title: 'Your Location !',
                    draggable: true
                });
            }

            function createMarker(latlang,icn,name) {
               new google.maps.Marker({
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

                google.maps.event.addListener(marker, 'dragend', function(marker) {
                    var latLng = marker.latLng;
                    $('#lat-span').val(latLng.lat());
                    $('#lon-span').val(latLng.lng());
                });

            }


        })
    </script>
@endsection

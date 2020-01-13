@extends('layouts.thirdparty.police_rda.app')


@section('page-header')
    <section class="content-header">
        <h1>
            Accidents
            <small>accidents datatable</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Accidents</li>
            <li class="active">Accidents List</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    {{ $message }}
                </div>

            @endif
            @if ($message = Session::get('unsuccess'))
                <div class="alert alert-danger alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    {{ $message }}
                </div>

            @endif
            <div class="box">
                <div class="box-header">

                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn  btn-success"><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Export as</button>
                            <button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a id="pdf" href="{{url('export-products-pdf')}}" >PDF</a></li>
                                <li class="divider"></li>
                                <li><a id="excel" href="{{url('export-products-excel')}}" >XLSX</a></li>
                                <li class="divider"></li>
                                <li><a id="excel" href="{{url('export-products-csv')}}" >CSV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Acc. Name</th>
                            <th>Acc. Description</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Photos</th>
                            <th>Condition</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($accidents as $accident)
                            <tr>

                                <td>{{$accident->id}}</td>
                                <td>{{$accident->name}}</td>
                                <td>{{$accident->description}}</td>
                                <td>{{$accident->lang}}</td>
                                <td>{{$accident->lat}}</td>
                                <td>
                                    <a href="{{asset('images/' . $accident->image_01)}}"><img src="{{asset('images/' . $accident->image_01)}}" style="width: 150px;height: 100px"/></a>
                                    <a href="{{asset('images/' . $accident->image_02)}}"><img src="{{asset('images/' . $accident->image_02)}}" style="width: 150px;height: 100px"/></a>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="col-md-4">
                                        <button
                                                type="button"
                                                class="btn btn-xs btn-primary"
                                                data-toggle="modal"
                                                data-target="#accidentLocator"
                                                data-lat="{{$accident['lat']}}"
                                                data-lang="{{$accident['lang']}}"
                                                data-name="{{$accident['name']}}"
                                                data-img_1="{{$accident['image_01']}}"
                                                data-img_2="{{$accident['image_02']}}"
                                                data-acc="{{$accident}}"
                                        >Locate</button>

                                    </div>
                                    <div class="col-md-4">
                                            <button
                                                    type="button"
                                                    class="btn btn-xs btn-success"
                                                    data-toggle="modal"
                                                    data-target="#accidentApproveConfirmationModal"
                                                    data-id="{{$accident['id']}}"
                                            >Approve</button>

                                    </div>
                                    <div class="col-md-4">

                                            <button
                                                    type="button"
                                                    class="btn btn-xs btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#accidentRejectConfirmationModal"
                                                    data-id="{{$accident['id']}}"
                                            >Reject</button>

                                    </div>



                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Acc. Name</th>
                            <th>Acc. Description</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Photos</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    @include('accidents.includes.accidentApproveConfirmationModal')
    @include('accidents.includes.accidentRejectConfirmationModal')
    @include('thirdparty.police_rda.includes.modals.accidentLocator')


@endsection
@section('scripts')
    <script>

        var condition;

        $(function () {

            $('.select2').select2();

            $('#example1').DataTable({
                "order": [[ 0, "desc" ]]
            });

        })

        $('#condition').change(function () {

            condition = $(this).val();
        });

        $('#accidentApproveConfirmationModal').on('show.bs.modal', function(event){

            var button = $(event.relatedTarget);

            var id = button.data('id');
            var con = condition;

            var modal = $(this);

            modal.find('.modal-footer #acc_id').val(id);
            modal.find('.modal-footer #acc_condition').val(con);

        });

        $('#accidentRejectConfirmationModal').on('show.bs.modal', function(event){

            var button = $(event.relatedTarget);

            var id = button.data('id');

            var modal = $(this);

            modal.find('.modal-footer #acc_id').val(id);

        });

        $('#accidentLocator').on('show.bs.modal', function(event){

            var map;

            var button = $(event.relatedTarget);

            var alatval = button.data('lat');
            var alangval = button.data('lang');
            var sname = button.data('name');
            var val = button.data('acc');
            var img_1 = button.data('img_1');
            var img_2 = button.data('img_2');

            var aLatLng = new google.maps.LatLng(alatval, alangval);
            var aicon = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

            function createMap(myLatLang){
                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLang,
                    zoom: 12
                });
            }

            var infowindow = new google.maps.InfoWindow({});

            function createMarker(latlang,icn,name,val,img_1,img_2) {

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

                contentString.appendChild(h4);
                contentString.appendChild(para);
                contentString.appendChild(document.createElement('br'));

                var img_01 = document.createElement('img');
                img_01.src = '/PUSL/public/images/' + img_1 ;
                img_01.style.width = '40%';
                img_01.style.height = '150px';
                img_01.style.margin = '10px';
                contentString.appendChild(img_01);

                var img_02 = document.createElement('img');
                img_02.src = '/PUSL//public/images/' + img_2 ;
                img_02.style.width = '40%';
                img_01.style.height = '150px';
                contentString.appendChild(img_02);

                google.maps.event.addListener(amarker, 'click', function() {
                    infowindow.close(); // Close previously opened infowindow
                    infowindow.setContent(contentString);
                    infowindow.open(map, amarker);
                });


            }

            createMap(aLatLng);
            createMarker(aLatLng,aicon,sname,val,img_1,img_2);

        });
    </script>

@endsection

@extends('layouts.thirdparty.insurance.app')


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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Acc. Name</th>
                            <th>Acc. Description</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Photos</th>
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
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    @include('accidents.includes.accidentDeleteConfirmationModal')


@endsection
@section('scripts')
    <script>

        $(function () {



            $('.select2').select2()
            $('#example1').DataTable({
                "order": [[ 0, "desc" ]]
            });
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })

        $('#productDeleteConfirmationModal').on('show.bs.modal', function(event){

            var button = $(event.relatedTarget);

            var id = button.data('id');

            var modal = $(this);

            modal.find('.modal-footer #prod_id').val(id);

        });
    </script>

@endsection

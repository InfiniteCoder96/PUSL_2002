@extends('layouts.admin.app')


@section('page-header')
    <section class="content-header">
        <h1>
            Products
            <small>new product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
            <li class="active">Add New Product</li>
        </ol>
    </section>
@endsection

@section('content')
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
                <form role="form" action="{{ route('accidents.store') }}" method="POST" id="accident_create_form">
                    @csrf
                    <div class="box-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Product Id</label>
                                        <input type="text" name="prod_id" id="prod_id" class="form-control" placeholder="Product Id">
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>


                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="Product name">
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Product Selling Price</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rs.</span>
                                            <input type="text" name="prod_buy_price" id="prod_buy_price" class="form-control" placeholder="Selling Price">
                                        </div>
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Product Face Value</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rs.</span>
                                            <input type="text" name="prod_sell_price" id="prod_sell_price" class="form-control" placeholder="Face Value">
                                        </div>
                                        <span class="help-block hide">Help block with error</span>
                                    </div>

                                </div>

                                <div class="col-xs-3" style="display: none">
                                    <div class="form-group">
                                        <label>Product Sales Margin</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rs.</span>
                                            <input type="text" name="prod_profit" id="prod_profit" class="form-control" placeholder="Sales Margin" readonly>
                                        </div>
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>

                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Product Margin percentage</label>
                                        <div class="input-group">

                                            <input type="text" name="prod_profit_percentage" id="prod_profit_percentage" class="form-control" placeholder="Margin percentage">
                                            <span class="input-group-addon">%</span>

                                        </div>
                                        <span class="help-block hide">Help block with error</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" onclick="reset()" class="btn btn-default">Reset</button>
                        <button type="button" class="btn btn-info" id="product_create_form_submit">Submit</button>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

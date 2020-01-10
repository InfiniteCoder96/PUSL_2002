<?php use Carbon\Carbon; ?>
@extends('layouts.thirdparty.insurance.app')


@section('page-header')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>5</h3>

                    <p>Accidents Reported</p>

                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>

            </div>

        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-maroon-gradient">
                <div class="inner">
                    <h3>3</h3>

                    <p>Rejected</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-warning"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-olive-active">
                <div class="inner">
                    <h3>1</h3>

                    <p>Approved</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-arrow-up"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-md-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-purple-gradient">
                <div class="inner">
                    <h3>1</h3>

                    <p>Pending</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-bulb"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.col -->
    </div>

<!-- /.row -->

@endsection

@section('scripts')





@endsection

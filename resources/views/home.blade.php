@extends('layouts.app')

@section('content')
    <div id="map">
        
    </div>
@endsection

@section('scripts')

    <script>
        
        $(function () {

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        })
    </script>


@endsection



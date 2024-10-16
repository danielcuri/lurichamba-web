@extends('layouts.panel')


@section('header')
   
@endsection

@section('content')
    <div class="row">


    </div>
@endsection

@section('scripts')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection

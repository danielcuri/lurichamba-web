{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}


@extends('portal.panel')


@section('content')

<br>
<section class="section-box mt-3" style="background: rgb(248, 241, 241)">
    <div class="container pt-50">
        <div class="w-50 w-md-100 mx-auto text-center">
            <img src="/403error.png" alt="" style="width: 250px">
            <h1 class="section-title-large mb-30 wow animate__ animate__fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Error 403</h1>
            {{-- <p class="mb-30 text-muted wow animate__ animate__fadeInUp font-md animated" style="visibility: visible; animation-name: fadeInUp;">This is part of our help center where frequently asked questions are collected. Do a search here before sending a message or contacting us, here are the most common problems you will encounter when using our system.</p> --}}
        
            <p class="lead">Acceso Prohibido</p>
            <p class="mb-4">Lo siento, no tienes permisos para acceder a esta página.</p> <br>
            <a class="btn btn-primary mb-5" href="{{ url('/') }}">Ir a la página de inicio</a>
        </div>
    </div>
</section>
<br>
@endsection
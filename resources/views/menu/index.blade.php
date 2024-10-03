@extends('layouts.panel')


@section('header')
    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Menu Principal</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('menu-principal.index') }}">Menu Principal</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <!-- Greetings Card starts -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-congratulations">
                        <div class="card-body text-center">
                            <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left"
                                alt="card-img-left" />
                            <img src="../../../app-assets/images/elements/decore-right.png"
                                class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow">
                                <div class="avatar-content">
                                    <i data-feather="award" class="font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-1 text-white">Bienvenido {{ auth()->user()->name }}</h1>
                                {{-- <p class="card-text m-auto w-75">
                                        You have done <strong>57.6%</strong> more sales today. Check your new badge in your
                                        profile.
                                    </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Greetings Card ends -->
            </div>

            



            <!--/ List DataTable -->
        </section>

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

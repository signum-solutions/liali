@extends('layouts.default')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Dashboard</h5>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#!">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <!-- [ page content ] start -->
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card">
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-selected="false">Sales</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-selected="false">Inventory</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-selected="false">Purchase</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-selected="false">Finance</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-selected="false">CRM</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!-- product profit start -->
                        </div>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-red">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Finance</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">$1,783</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <span class="label label-danger m-r-10">+11%</span>From Previous Month
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Sales</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">15,830</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-database text-c-blue f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <span class="label label-primary m-r-10">+12%</span>From Previous Month
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-green">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">ABC</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign text-c-green f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <span class="label label-success m-r-10">+52%</span>From Previous Month
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">XYZ</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">6,784</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-c-yellow f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <span class="label label-warning m-r-10">+52%</span>From Previous Month
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- product profit end -->

                            <!-- latest update, new client start -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card latest-update-card">
                                    <div class="card-header">
                                        <h5>Promotion</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="latest-update-box">
                                            <div class="row p-b-30 p-t-20">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-briefcase bg-c-red update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img src="{{ asset('assets/images/slider/slider5.jpg') }}" class="img-responsive" width="100%" />
                                                        <div class="centered">
                                                            Positive Thinking
                                                        </div> </a>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img src="{{ asset('assets/images/slider/slider6.jpg') }}" class="img-responsive" width="100%" />
                                                        <div class="centered">
                                                            Thinking Positive
                                                        </div> </a>
                                                </div>
                                            </div>
                                            <div class="row p-b-30 p-t-20">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-briefcase bg-c-red update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img src="{{ asset('assets/images/slider/slider5.jpg') }}" class="img-responsive" width="100%" />
                                                        <div class="centered">
                                                            Positive Thinking
                                                        </div> </a>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img src="{{ asset('assets/images/slider/slider6.jpg') }}" class="img-responsive" width="100%" />
                                                        <div class="centered">
                                                            Thinking Positive
                                                        </div> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                        <div class="card comp-card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="m-b-25">Impressions</h6>
                                                        <h3 class="f-w-700 text-c-blue">1,563</h3>
                                                        <p class="m-b-0">
                                                            May 23 - June 01 (2017)
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-eye bg-c-blue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card comp-card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="m-b-25">Goal</h6>
                                                        <h3 class="f-w-700 text-c-green">30,564</h3>
                                                        <p class="m-b-0">
                                                            May 23 - June 01 (2017)
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-bullseye bg-c-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card comp-card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="m-b-25">Goal</h6>
                                                        <h3 class="f-w-700 text-c-green">30,564</h3>
                                                        <p class="m-b-0">
                                                            May 23 - June 01 (2017)
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-bullseye bg-c-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card comp-card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="m-b-25">Impact</h6>
                                                        <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                                        <p class="m-b-0">
                                                            May 23 - June 01 (2017)
                                                        </p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-md-12">
                                        <div class="card new-cust-card">
                                            <div class="card-header">
                                                <h5>Recent Conversation</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li class="first-opt">
                                                            <i class="feather icon-chevron-left open-card-option"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-maximize full-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-minus minimize-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-refresh-cw reload-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-trash close-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-chevron-left open-card-option"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="align-middle m-b-25">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-b-25">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-3.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-3.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            stay hungry stay foolish!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-b-25">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-3.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-3.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status deactive text-mute"><i class="far fa-clock m-r-10"></i>30 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-b-25">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-4.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-4.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status deactive text-mute"><i class="far fa-clock m-r-10"></i>10 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-b-25">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            stay hungry stay foolish!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-b-0">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15" style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ style Customizer ] start -->
        <div id="styleSelector"></div>
        <!-- [ style Customizer ] end -->
    </div>

@stop
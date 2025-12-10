@extends('layouts.app')

@section('title', 'Dashboard Home')

@section('content')

    <!-- [ breadcrumb ] end -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!--[ daily sales section ] start-->

                <div class="col-md-6 col-xl-6">
                    <div class="card rejected-requests">
                        <div class="card-block">
                            <h6 class="mb-4">New Request</h6>
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                        <i class="feather icon-inbox text-c-blue f-30 m-r-10"></i>

                                    </h3>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-b-0">5%</p>
                                </div>
                            </div>
                            <div class="progress m-t-30" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 12%;" aria-valuenow="5"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Requests -->
                <div class="col-md-6 col-xl-6">
                    <div class="card total-requests">
                        <div class="card-block">
                            <h6 class="mb-4">Total Requests</h6>
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                        <i class="feather icon-layers text-c-blue f-30 m-r-10"></i>
                                 
                                    </h3>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-b-0">100%</p>
                                </div>
                            </div>
                            <div class="progress m-t-30" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approved -->
                <div class="col-md-6 col-xl-6">
                    <div class="card approved-requests">
                        <div class="card-block">
                            <h6 class="mb-4">Approved</h6>
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                        <i class="feather icon-check text-c-green f-30 m-r-10"></i>
                  
                                    </h3>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-b-0">68%</p>
                                </div>
                            </div>
                            <div class="progress m-t-30" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 68%;"
                                    aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- On Hold -->
                <div class="col-md-6 col-xl-6">
                    <div class="card onhold-requests">
                        <div class="card-block">
                            <h6 class="mb-4">On Hold</h6>
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                        <i class="feather icon-pause text-c-orange f-30 m-r-10"></i>
                            
                                    </h3>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-b-0">20%</p>
                                </div>
                            </div>
                            <div class="progress m-t-30" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rejected -->
                <div class="col-md-6 col-xl-6">
                    <div class="card rejected-requests">
                        <div class="card-block">
                            <h6 class="mb-4">Rejected</h6>
                            <div class="row d-flex align-items-center">
                                <div class="col-7">
                                    <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                        <i class="feather icon-x text-c-red f-30 m-r-10"></i>
                        
                                    </h3>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-b-0">12%</p>
                                </div>
                            </div>
                            <div class="progress m-t-30" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%;"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

@endsection
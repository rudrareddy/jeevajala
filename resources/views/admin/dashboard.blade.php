@extends('layouts.admin_layout')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">

            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate">Total Pending Requests</span>
                                    <h4 class="mb-3">
                                        {{$stats['pending_requests']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>

            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate"> Pending Amount</span>
                                    <h4 class="mb-3">
                                        {{$stats['pending_amount']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate"> Approved Today </span>
                                    <h4 class="mb-3">
                                        {{$stats['approved_today']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate"> Approved Amount Today </span>
                                    <h4 class="mb-3">
                                        {{$stats['approved_amount_today']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate">Total  Approved</span>
                                    <h4 class="mb-3">
                                        {{$stats['total_approved']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate">Total  Rejected</span>
                                    <h4 class="mb-3">
                                        {{$stats['total_rejected']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
              <div class="col-xl-3 col-md-6">
                
                <div class="card card-h-100">
                    
                    <a href="#">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1  text-truncate">Total  Credited Amount</span>
                                    <h4 class="mb-3">
                                        {{$stats['total_credited_amount']}}
                                    </h4>
                                </div>

                                
                            </div>
                            
                        </div>
                    </a>
                </div>
                
            </div><!-- end col -->
        </div><!-- end row-->
    </div> <!-- container-fluid -->
@endsection


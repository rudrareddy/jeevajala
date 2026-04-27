@extends('layouts.admin_layout')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                   <li class="breadcrumb-item active">Customer Detail of {{ucfirst($user->name)}}</li>

                </ol>

                

            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Customer Information</h4>
                                        
                                    </div><!-- end card header -->
                                    
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Profile</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#documents" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Documents</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#account" role="tab">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Bank Account</span>   
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#wallet" role="tab">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block">Wallet</span>    
                                                </a>
                                            </li>
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="profile" role="tabpanel">
                                                <p><b>Customer Name:</b>  {{$user->name}}</p>
                                                <p><b>Customer UserId:</b>  {{$user->username}}</p>
                                                <p><b>Customer Email:</b>  {{$user->email}}</p>
                                                <p><b>Customer Phone:</b>  {{$user->phone}}</p>

                                                <p><b>Customer Address:</b>  {{$user->address ? $user->address->address_line :'-'}}</p>
                                            </div>
                                            <div class="tab-pane" id="documents" role="tabpanel"> 
                                               @php $doc = $user->getDocumentByType('aadhaar_front'); 
                                               $doc_back = $user->getDocumentByType('aadhaar_back');
                                               $pan_card = $user->getDocumentByType('pan_card');
                                               @endphp
                                                   <h2>Adhaar Front</h2>
                                                    @if($doc)

                                                        <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$doc->file_path) }}" width="150px" height="100px;">
                                                    @endif
                                                    <h2>Adhaar Back</h2>
                                                    @if($doc)

                                                        <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$doc_back->file_path) }}" width="150px" height="100px;">
                                                    @endif
                                                    <h2>Pan Card </h2>
                                                    @if($doc)

                                                        <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$pan_card->file_path) }}" width="150px" height="100px;">
                                                    @endif
                                            </div>
                                            <div class="tab-pane" id="account" role="tabpanel">
                                                <p><b>Account Holder Name:</b>  {{$user->bankAccounts ? $user->bankAccounts->account_holder_name :''}}</p>
                                                <p><b>Account Number:</b>  {{$user->bankAccounts ? $user->bankAccounts->account_number :''}}</p>
                                                <p><b>Ban Name:</b>  {{$user->bankAccounts ? $user->bankAccounts->bank_name :''}}</p>
                                               <p><b>IFSC Code:</b>  {{$user->bankAccounts ? $user->bankAccounts->ifsc_code :''}}</p>

                                                <p><b>Account Type:</b>  {{$user->bankAccounts ? ucfirst($user->bankAccounts->account_type) :''}}</p>
                                                <p><b>Branch Name:</b>  {{$user->bankAccounts ? $user->bankAccounts->branch_name :''}}</p>
                                            </div>
                                            <div class="tab-pane" id="wallet" role="tabpanel">
                                                <p><b>Total Credit Amoount:</b>  {{$user->wallet ? $user->wallet->total_credited : 0}}</p>
                                                
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
    </div>
 
</div> <!-- container-fluid -->

@endsection

@extends('layouts.admin_layout')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                    <li class="breadcrumb-item active">Edit Role for {{$role->display_name}}</li>
                </ol>

                <!--<div class="page-title-right">
                    <a class="btn btn-danger waves-effect waves-light" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                </div>-->

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('admin/roles/'.$role->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Name</label>
                                    <input type="text" class="form-control" required name="name" id="formrow-password-input"  value="{{$role->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Display Name</label>
                                    <input type="text" class="form-control" required name="display_name" id="formrow-password-input"  value="{{$role->display_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{url('admin/roles')}}" type="reset" class="btn btn-outline-danger w-md">Cancel</a>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection

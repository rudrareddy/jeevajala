@extends('layouts.admin_layout')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Credit Requests</a></li>
                    <li class="breadcrumb-item ">Approved Requests</li>

                </ol>

                

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <form method="GET" class="d-flex gap-2">
                            <div class="search-box">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="form-control"
                                    placeholder="Search by username, reqId..."
                                >
                                
                            </div>

                            <button class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </form>                     
                        @if(request('search'))
                        <button class="btn btn-danger"><a href="{{ url('admin/approved-credit-requests') }}" class="text-sm text-gray-500">Clear</a></button>
                        @endif
                    </div>
                <div class="card-body">
                    <table id="" class="table dt-responsive nowrap w-100 single-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Req ID</th>
                                <th>UserId</th>
                                <th>Req Type</th>
                                <th>Amount</th>
                                <th>Reason</th>     
                                <th>Created At</th>
                                <!--<th data-priority="1" class="no-sort"></th>-->
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($creditRequests as $request)
                            <tr class="default @if($loop->index % 2 ===0)even @else odd @endif">
                                <td>{{ $creditRequests->firstItem() + $loop->index }}</td>
                                <td>{{$request->request_id}}</td>
                                <td>{{$request->user->username}}({{$request->user->name}})</td>
                                <td>{{$request->request_type}}</td>
                                <td>{{$request->amount}}</td>
                                <td>{{$request->reason}}</td>
                                <td>{{date('Y-m-d h:i:a',strtotime($request->created_at))}}</td>
                                <!--<td>
                                    <div class="actionParent">
                                        
                                        <a class="tableAction btn-rounded btn-md btn btn-outline-primary waves-effect waves-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <li><a class="dropdown-item" href="{{url('admin/credit-requests/'.$request->request_id.'/approve')}}">Approve</a></li>
                                            <li><a class="dropdown-item" href="{{url('admin/credit-requests/'.$request->request_id.'/reject')}}">Reject</a></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>-->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
            {{ $creditRequests->links() }}
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection

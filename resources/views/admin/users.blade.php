@extends('layouts.admin_layout')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                   

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
                                    placeholder="Search by username,"
                                >
                                
                            </div>

                            <button class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </form>                     
                        @if(request('search'))
                        <button class="btn btn-danger"><a href="{{ url('admin/customers') }}" class="text-sm text-gray-500">Clear</a></button>
                        @endif
                    </div>
                <div class="card-body">
                    <table id="" class="table dt-responsive nowrap w-100 single-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>Parent</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>      
                                <th>Reg At</th>
                                <th data-priority="1" class="no-sort"></th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($users as $user)
                            <tr class="default @if($loop->index % 2 ===0)even @else odd @endif">
                                <td>{{ $users->firstItem() + $loop->index }}</td>
                                <td>{{$user->username}}</td>
                                <td>{{ $user->parent ? $user->parent->name :'-'}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                
                                <td>{{date('Y-m-d h:i:a',strtotime($user->created_at))}}</td>
                                <td>
                                    <div class="actionParent">
                                        
                                        <a class="tableAction btn-rounded btn-md btn btn-outline-primary waves-effect waves-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <li><a class="dropdown-item" href="{{url('admin/customer/'.$user->id)}}"><i class="fa fa-eye"></i> </a></li>
                                            <li><a class="dropdown-item" href="{{url('admin/refferals/'.$user->id)}}"><i class="fa fa-users"></i> </a></li>
                                           
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
            {{ $users->links() }}
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection

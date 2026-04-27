@extends('layouts.site_layout')

@section('content')
<!-- My Teams Section -->
    <section class="profile-section">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title">
                            <i class="fas fa-users me-3"></i>My Teams
                        </h1>
                        <p class="text-muted">Manage and track your team members</p>
                    </div>
                    <a href="{{url('profile')}}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Profile
                    </a>
                </div>
            </div>

            <!-- Team Statistics -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>{{Auth::user()->children->count()}}</h3>
                        <p>Total Members</p>
                    </div>
                </div>
                @if(Auth::user()->parent)
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(40, 167, 69, 0.1); color: #28a745;">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h6> Referred By</h6>
                        <p><b>UserId: </b>{{Auth::user()->parent->username}}, <b>Name: </b>{{Auth::user()->parent->name}}</p>
                    </div>
                </div>
                @endif
               <!-- <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h3>2</h3>
                        <p>Pending</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: rgba(255, 184, 0, 0.1); color: #FFB800;">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>5</h3>
                        <p>Top Performers</p>
                    </div>
                </div>-->
            </div>

            <!-- Team Members Table -->
            <div class="content-card">
                <div class="card-header-custom">
                    <h3><i class="fas fa-list me-2"></i>Team Members</h3>
                    <div class="d-flex gap-2">
					    <form method="GET" class="d-flex gap-2">
					        <div class="search-box">
					            <input
					                type="text"
					                name="search"
					                value="{{ request('search') }}"
					                class="form-control"
					                placeholder="Search members..."
					            >
					            <i class="fas fa-search"></i>
					        </div>

					        <button class="btn btn-primary">
					            <i class="fas fa-search me-2"></i>Search
					        </button>
					    </form>					    
				        @if(request('search'))
				        <button class="btn btn-danger"><a href="{{ url('my-teams') }}" class="text-sm text-gray-500">Clear</a></button>
				        @endif
					</div>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table team-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member Name</th>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joined Date</th>
                                    
                                    <th>Status</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($users as $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $loop->index }}</td>
                                    <td>
                                        <div class="member-info">
                                            <img src="https://ui-avatars.com/api/?name={{$user->name}}&size=40&background=0077BE&color=fff" alt="Member" class="member-avatar">
                                            <span>{{ucfirst($user->name)}}</span>
                                        </div>
                                    </td>
                                    <td><span class="user-id">{{$user->username}}</span></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{date('d M,Y',strtotime($user->created_at))}}</td>
                                    
                                    <td><span class="badge bg-success">Active</span></td>
                                    <!--<td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewMember('STM25608844')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editMember('STM25608844')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Team members pagination" class="mt-4">
					    <div class="d-flex justify-content-center">
					        {{ $users->links() }}
					    </div>
					</nav>
                </div>
            </div>
        </div>
    </section>

@endsection
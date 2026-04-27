@extends('layouts.site_layout')

@section('content')
  <!-- Credit Requests Section -->
    <section class="profile-section">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h1 class="page-title">
                            <i class="fas fa-hand-holding-usd me-3"></i>Credit Requests
                        </h1>
                        <p class="text-muted">Request and manage your bonus credits</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="profile.html" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Profile
                        </a>
                        <!--<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newRequestModal">
                            <i class="fas fa-plus me-2"></i>New Request
                        </button>-->
                    </div>
                </div>
            </div>

            <!-- Available Bonuses Section -->
            <!--<div class="content-card mb-4">
                <div class="card-header-custom">
                    <h3><i class="fas fa-gift me-2"></i>Available Bonuses</h3>
                </div>
                <div class="card-body-custom">
                    <div class="row g-4">
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="bonus-card">
                                <div class="bonus-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <h4>Registration Bonus</h4>
                                <div class="bonus-amount">₹500.00</div>
                                <p class="text-muted mb-3">Welcome bonus for new registration</p>
                                <div class="bonus-status claimed">
                                    <i class="fas fa-check-circle me-1"></i>Requested
                                </div>
                                <small class="text-muted">Requested on: Feb 20, 2026</small>
                            </div>
                        </div>

                       
                        <div class="col-md-6 col-lg-4">
                            <div class="bonus-card">
                                <div class="bonus-icon" style="background: rgba(40, 167, 69, 0.1); color: #28a745;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h4>Referral Bonus</h4>
                                <div class="bonus-amount">₹200.00</div>
                                <p class="text-muted mb-3">Bonus for referring Priya Sharma</p>
                                <div class="bonus-status available">
                                    <i class="fas fa-circle me-1"></i>Available
                                </div>
                                <button class="btn btn-success btn-sm mt-2 w-100" onclick="requestReferralBonus('REF001')">
                                    <i class="fas fa-hand-holding-usd me-1"></i>Request Credit
                                </button>
                            </div>
                        </div>

                                                <div class="col-md-6 col-lg-4">
                            <div class="bonus-card">
                                <div class="bonus-icon" style="background: rgba(255, 152, 0, 0.1); color: #ff9800;">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h4>Commission Earned</h4>
                                <div class="bonus-amount">₹1,200.00</div>
                                <p class="text-muted mb-3">Team sales commission for Feb 2026</p>
                                <div class="bonus-status available">
                                    <i class="fas fa-circle me-1"></i>Available
                                </div>
                                <button class="btn btn-warning btn-sm mt-2 w-100" onclick="requestCommission('COMM001')">
                                    <i class="fas fa-hand-holding-usd me-1"></i>Request Credit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <!-- Credit Requests History -->
            <div class="content-card">
                <div class="card-header-custom">
                    <h3><i class="fas fa-list me-2"></i>Request History</h3>
                    <div class="filter-buttons">
                        <button class="btn btn-sm btn-outline-primary active" onclick="filterRequests('all')">All</button>
                        <button class="btn btn-sm btn-outline-warning" onclick="filterRequests('pending')">Pending</button>
                        <button class="btn btn-sm btn-outline-success" onclick="filterRequests('approved')">Approved</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="filterRequests('rejected')">Rejected</button>
                    </div>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table credit-request-table">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Request Type</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th>Admin Notes</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($creditRequests as $request)
                                <tr data-status="pending">
                                    <td><span class="request-id">{{$request->request_id}}</span></td>
                                    <td><span class="badge bg-success">{{$request->request_type}}</span></td>
                                    <td class="amount-cell">₹{{$request->amount}}</td>
                                    <td>{{$request->reason}}</td>
                                    <td>{{date('M d,Y',strtotime($request->created_at))}}<br><small class="text-muted">{{date('h:i A',strtotime($request->created_at))}}</small></td>
                                    <td><span class="badge @if($request->status == 'approved') bg-success
                                        @elseif($request->status == 'rejected') bg-danger
                                        @else bg-warning
                                        @endif">{{ucfirst($request->status)}}</span>
                                    </td>
                                    <td><span class="text-muted">{{$request->admin_notes}}</span></td>
                                    <!--<td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewRequest('CR20260226001')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="cancelRequest('CR20260226001')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>-->
                                </tr>
                                @endforeach

                                <!--<tr data-status="approved">
                                    <td><span class="request-id">CR20260224002</span></td>
                                    <td><span class="badge bg-success">Referral Bonus</span></td>
                                    <td class="amount-cell">₹200.00</td>
                                    <td>Bonus for referring Rahul Kumar</td>
                                    <td>Feb 24, 2026<br><small class="text-muted">03:15 PM</small></td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>Approved and credited</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewRequest('CR20260224002')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-status="pending">
                                    <td><span class="request-id">CR20260223003</span></td>
                                    <td><span class="badge bg-warning">Commission Claim</span></td>
                                    <td class="amount-cell">₹1,200.00</td>
                                    <td>Team sales commission for Feb 2026</td>
                                    <td>Feb 23, 2026<br><small class="text-muted">11:20 AM</small></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewRequest('CR20260223003')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="cancelRequest('CR20260223003')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-status="rejected">
                                    <td><span class="request-id">CR20260220004</span></td>
                                    <td><span class="badge bg-secondary">Manual Request</span></td>
                                    <td class="amount-cell">₹1,000.00</td>
                                    <td>Additional credit request</td>
                                    <td>Feb 20, 2026<br><small class="text-muted">09:45 AM</small></td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                    <td>Insufficient documentation</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewRequest('CR20260220004')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr data-status="approved">
                                    <td><span class="request-id">CR20260218005</span></td>
                                    <td><span class="badge bg-success">Referral Bonus</span></td>
                                    <td class="amount-cell">₹200.00</td>
                                    <td>Bonus for referring Anita Desai</td>
                                    <td>Feb 18, 2026<br><small class="text-muted">02:30 PM</small></td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>Approved and credited</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewRequest('CR20260218005')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary Stats -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h5>Pending</h5>
                                    <h3>{{ $pending->total_count ?? 0 }}</h3>
                                    <p class="text-muted mb-0">
                                        ₹{{ $pending->total_amount ?? 0 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-icon" style="background: rgba(40, 167, 69, 0.1); color: #28a745;">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <h5>Approved</h5>
                                    <h3>{{$approved->total_count ?? 0}}</h3>
                                    <p class="text-muted mb-0">₹{{ number_format($approved->total_amount ?? 0, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-icon" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div>
                                    <h5>Rejected</h5>
                                    <h3>{{$rejected->total_count ?? 0}}</h3>
                                    <p class="text-muted mb-0">₹{{ number_format($rejected->total_amount ?? 0, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-box">
                                <div class="stat-icon" style="background: rgba(0, 119, 190, 0.1); color: #0077BE;">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div>
                                    <h5>Total Requests</h5>
                                    <h3>{{$totalRequests}}</h3>
                                    <p class="text-muted mb-0">All time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Request Modal -->
    <div class="modal fade" id="newRequestModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>New Credit Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="creditRequestForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Request Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="requestType" required>
                                    <option value="">Select type</option>
                                    <option value="registration_bonus">Registration Bonus</option>
                                    <option value="referral_bonus">Referral Bonus</option>
                                    <option value="commission_claim">Commission Claim</option>
                                    <option value="manual_request">Manual Request</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount (₹) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="requestAmount" placeholder="Enter amount" step="0.01" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Reason <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="requestReason" rows="3" placeholder="Explain why you're requesting this credit..." required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Supporting Documents (Optional)</label>
                                <input type="file" class="form-control" id="supportingDocs" multiple accept="image/*,application/pdf">
                                <small class="text-muted">Upload relevant documents (Screenshots, invoices, etc.)</small>
                            </div>
                        </div>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> All credit requests are subject to admin approval. Please provide accurate information and supporting documents if applicable.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitCreditRequest()">
                        <i class="fas fa-paper-plane me-2"></i>Submit Request
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
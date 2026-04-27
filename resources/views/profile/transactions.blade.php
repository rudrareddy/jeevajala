@extends('layouts.site_layout')

@section('content')
<!-- Transactions Section -->
    <section class="profile-section">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title">
                            <i class="fas fa-receipt me-3"></i>Transactions
                        </h1>
                        <p class="text-muted">View and manage your transaction history</p>
                    </div>
                    <a href="{{url('profile')}}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Profile
                    </a>
                </div>
            </div>

            <!-- Transaction Summary Cards -->
            <div class="transaction-summary mb-4">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="summary-card credit-card">
                            <i class="fas fa-arrow-down"></i>
                            <div>
                                <h5>Total Credits</h5>
                                <h3>₹{{$wallet->balance}}</h3>
                                
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-6">
                        <div class="summary-card debit-card">
                            <i class="fas fa-arrow-up"></i>
                            <div>
                                <h5>Total Debits</h5>
                                <h3>₹14,000.00</h3>
                                <p class="text-muted mb-0">Last 30 days</p>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-lg-3 col-md-6">
                        <div class="summary-card balance-card">
                            <i class="fas fa-wallet"></i>
                            <div>
                                <h5>Current Balance</h5>
                                <h3>₹{{$wallet->total_credited}}</h3>
                                <p class="text-muted mb-0">Available</p>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-6">
                        <div class="summary-card" style="background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);">
                            <i class="fas fa-chart-line" style="background: rgba(255, 152, 0, 0.1); color: #ff9800;"></i>
                            <div>
                                <h5>This Month</h5>
                                <h3>45</h3>
                                <p class="text-muted mb-0">Transactions</p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>

            <!-- Filters and Search -->
            <!--<div class="content-card mb-4">
                <div class="card-body-custom">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Date Range</label>
                            <select class="form-control">
                                <option>Last 7 Days</option>
                                <option selected>Last 30 Days</option>
                                <option>Last 3 Months</option>
                                <option>Last 6 Months</option>
                                <option>Last Year</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Transaction Type</label>
                            <select class="form-control" id="typeFilter">
                                <option value="all">All Transactions</option>
                                <option value="credit">Credit Only</option>
                                <option value="debit">Debit Only</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-control">
                                <option>All Status</option>
                                <option>Completed</option>
                                <option>Pending</option>
                                <option>Failed</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Search</label>
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Search transactions...">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="btn btn-outline-secondary me-2">
                            <i class="fas fa-redo me-2"></i>Reset Filters
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-download me-2"></i>Download Statement
                        </button>
                    </div>
                </div>
            </div>-->

            <!-- Transactions Table -->
            <div class="content-card">
                <div class="card-header-custom">
                    <h3><i class="fas fa-list me-2"></i>Transaction History</h3>
                    
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table transaction-table">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Date & Time</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Balance After</th>
                                    <th>Status</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($transactions as $transaction)
                                <tr>
                                    <td><span class="trans-id">{{$transaction->transaction_id}}</span></td>
                                    <td>{{date('M d,Y',strtotime($transaction->created_at))}}<br><small class="text-muted"></small>{{date('h:ia',strtotime($transaction->created_at))}}</td>
                                    <td>{{$transaction->description}}</td>
                                    <td><span class="badge bg-success">{{$transaction->type}}</span></td>
                                   <td class="amount credit">+ ₹{{$transaction->amount}}</td>
                                    <td>₹{{$transaction->balance_after}}</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <!--<td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260222001')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260222001')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>-->
                                </tr>
                                @endforeach
                               <!-- <tr>
                                    <td><span class="trans-id">TXN20260221002</span></td>
                                    <td>Feb 21, 2026<br><small class="text-muted">03:15 PM</small></td>
                                    <td>Referral Bonus - Priya Sharma</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹500.00</td>
                                    <td>₹20,500.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260221002')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260221002')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260220003</span></td>
                                    <td>Feb 20, 2026<br><small class="text-muted">11:45 AM</small></td>
                                    <td>Wallet Recharge via UPI</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹5,000.00</td>
                                    <td>₹20,000.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260220003')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260220003')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260219004</span></td>
                                    <td>Feb 19, 2026<br><small class="text-muted">09:20 AM</small></td>
                                    <td>Order Payment - Standard Package</td>
                                    <td><span class="badge bg-danger">Debit</span></td>
                                    <td class="amount debit">- ₹2,000.00</td>
                                    <td>₹15,000.00</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260219004')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260218005</span></td>
                                    <td>Feb 18, 2026<br><small class="text-muted">02:30 PM</small></td>
                                    <td>Commission Earned - Team Sales</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹1,200.00</td>
                                    <td>₹17,000.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260218005')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260218005')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260217006</span></td>
                                    <td>Feb 17, 2026<br><small class="text-muted">04:45 PM</small></td>
                                    <td>Subscription Renewal - Monthly</td>
                                    <td><span class="badge bg-danger">Debit</span></td>
                                    <td class="amount debit">- ₹1,200.00</td>
                                    <td>₹15,800.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260217006')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260217006')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260216007</span></td>
                                    <td>Feb 16, 2026<br><small class="text-muted">10:15 AM</small></td>
                                    <td>Referral Bonus - Rahul Kumar</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹500.00</td>
                                    <td>₹17,000.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260216007')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260216007')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260215008</span></td>
                                    <td>Feb 15, 2026<br><small class="text-muted">01:20 PM</small></td>
                                    <td>Order Payment - Basic Package</td>
                                    <td><span class="badge bg-danger">Debit</span></td>
                                    <td class="amount debit">- ₹2,000.00</td>
                                    <td>₹16,500.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260215008')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260215008')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260214009</span></td>
                                    <td>Feb 14, 2026<br><small class="text-muted">05:30 PM</small></td>
                                    <td>Cashback - Valentine Special</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹300.00</td>
                                    <td>₹18,500.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260214009')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260214009')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="trans-id">TXN20260213010</span></td>
                                    <td>Feb 13, 2026<br><small class="text-muted">11:00 AM</small></td>
                                    <td>Wallet Recharge via Card</td>
                                    <td><span class="badge bg-success">Credit</span></td>
                                    <td class="amount credit">+ ₹3,000.00</td>
                                    <td>₹18,200.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="viewTransaction('TXN20260213010')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReceipt('TXN20260213010')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Team members pagination" class="mt-4">
					    <div class="d-flex justify-content-center">
					        {{ $transactions->links() }}
					    </div>
					</nav>
                </div>
            </div>
        </div>
    </section>
@endsection
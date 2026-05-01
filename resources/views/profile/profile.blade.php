@extends('layouts.site_layout')

@section('content')
 <!-- Profile Section -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="profile-sidebar">
                        <!-- User Info Card -->
                        <div class="user-info-card">
                            <div class="profile-avatar-wrapper">
                                <img src="https://ui-avatars.com/api/?name={{$user->name}}&size=120&background=0077BE&color=fff" alt="Profile" class="profile-avatar" id="profileAvatar">
                                <div class="avatar-upload-btn">
                                    <!--<input type="file" id="avatarUpload" accept="image/*" hidden>
                                    <label for="avatarUpload" class="upload-icon">
                                        <i class="fas fa-camera"></i>
                                    </label>-->
                                </div>
                            </div>
                            <h4 class="user-name mt-3">{{ucfirst($user->name)}}</h4>
                            <span class="user-email"><b>UserId:</b> {{$user->username}}</span>
                            <p class="user-email"><b>Phone:</b> {{$user->phone}}</p>
                            <span class="user-badge">Premium Member</span>
                        </div>

                        <!-- Navigation Menu -->
                        <div class="sidebar-menu">
                            <div class="menu-section">
                                <h6 class="menu-title">Account</h6>
                                <a href="#profile-info" class="menu-item active">
                                    <i class="fas fa-user"></i>
                                    <span>Personal Info</span>
                                </a>
                                <a href="#bank-details" class="menu-item">
                                    <i class="fas fa-university"></i>
                                    <span>Bank Details</span>
                                </a>
                                <a href="#documents" class="menu-item">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Documents</span>
                                </a>
                                <a href="#security" class="menu-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Referral Linke</span>
                                </a>
                            </div>

                            <!--<div class="menu-section">
                                <h6 class="menu-title">Orders & Subscriptions</h6>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-box"></i>
                                    <span>My Orders</span>
                                    <span class="badge-count">3</span>
                                </a>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-sync"></i>
                                    <span>Subscriptions</span>
                                </a>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-history"></i>
                                    <span>Order History</span>
                                </a>
                            </div>

                            <div class="menu-section">
                                <h6 class="menu-title">Preferences</h6>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Addresses</span>
                                </a>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-credit-card"></i>
                                    <span>Payment Methods</span>
                                </a>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-bell"></i>
                                    <span>Notifications</span>
                                </a>
                            </div>-->

                            <!--<div class="menu-section">
                                <h6 class="menu-title">Support</h6>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-headset"></i>
                                    <span>Help Center</span>
                                </a>
                                <a href="#" class="menu-item">
                                    <i class="fas fa-comments"></i>
                                    <span>Contact Support</span>
                                </a>
                            </div>-->
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 col-md-8">

                    <!-- Personal Information Section -->
                    <div class="content-card" id="profile-info">
                        <div class="card-header-custom">
                            <h3><i class="fas fa-user me-2"></i>Personal Information</h3>
                            <button class="btn btn-outline-primary btn-sm" id="editProfileBtn">
                                <i class="fas fa-edit me-1"></i>Edit
                            </button>
                        </div>
                        @if(session('profile-status'))
                        	<div class="document-status mt-4">
                                            <span class="badge bg-success">
											    <i class="fas fa-check me-1"></i>{{session('profile-status')}}
											</span>
                                        </div>
                                        @endif
                        <div class="card-body-custom">
                            <form id="profileForm" action="{{ url('profile') }}" method="POST">
                            	@csrf
                            	@method('patch')
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="form-control" value="{{$user->name}}" name="name" disabled>
                                            @error('name')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-envelope"></i>
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                                            @error('email')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-phone"></i>
                                            <input type="tel" class="form-control" value="{{$user->phone}}" disabled name="phone">
                                            @error('phone')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <label class="form-label">Date of Birth</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-calendar"></i>
                                            <input type="date" class="form-control" value="1990-01-15" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-venus-mars"></i>
                                            <select class="form-control" disabled>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>-->
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <textarea class="form-control" rows="3" name="address_line" disabled>@if($user->address) {{$user->address->address_line}}@endif</textarea>
                                            @error('address_line')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-4" style="display: none;">
                                    <button type="button" class="btn btn-secondary" id="cancelProfileBtn">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Bank Details Section -->
                    <div class="content-card mt-4" id="bank-details">
                        <div class="card-header-custom">
                            <h3><i class="fas fa-university me-2"></i>Bank Account Details</h3>
                            <button class="btn btn-outline-primary btn-sm" id="editBankBtn">
                                <i class="fas fa-edit me-1"></i>Edit
                            </button>
                        </div>
                        @if(session('bank-status'))
                        	<div class="document-status mt-4">
                                            <span class="badge bg-success">
											    <i class="fas fa-check me-1"></i>{{session('bank-status')}}
											</span>
                                        </div>
                                        @endif
                        <div class="card-body-custom">
                        	
                            <form id="bankForm" method="POST" action="{{url('profile-account')}}">
                            	@csrf
                            	@method('patch')
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Account Holder Name</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="form-control" placeholder="Enter account holder name" name="account_holder_name" value="{{$user->bankAccounts ? $user->bankAccounts->account_holder_name : ''}}" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Bank Name</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-university"></i>
                                            <input type="text" class="form-control" placeholder="Enter bank name" name="bank_name" value="{{$user->bankAccounts ? $user->bankAccounts->bank_name : ''}}" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Account Number</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-hashtag"></i>
                                            <input type="text" class="form-control" placeholder="Enter account number" name="account_number" value="{{$user->bankAccounts ? $user->bankAccounts->account_number : ''}}" required disabled>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <label class="form-label">Confirm Account Number</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-hashtag"></i>
                                            <input type="text" class="form-control" placeholder="Re-enter account number" disabled>
                                        </div>
                                    </div>-->
                                    <div class="col-md-6">
                                        <label class="form-label">IFSC Code</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-code"></i>
                                            <input type="text" class="form-control" placeholder="Enter IFSC code" name="ifsc_code" required value="{{$user->bankAccounts ? $user->bankAccounts->ifsc_code : ''}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Account Type</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-wallet"></i>
                                            <select class="form-control" name="account_type" disabled required>
                                               
                                                 
                                                @if($user->bankAccounts)
											        <option value="savings"
											            {{ $user->bankAccounts->account_type == 'savings' ? 'selected' : '' }}>
											            Savings Account
											        </option>

											        <option value="current"
											            {{ $user->bankAccounts->account_type == 'current' ? 'selected' : '' }}>
											            Current Account
											        </option>
											        @else
											        <option value="savings">Savings Account</option>
											        <option value="cuurent">Current Account</option>
											    @endif
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Branch Name</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-building"></i>
                                            <input type="text" class="form-control" name="branch_name" placeholder="Enter branch name" disabled value="{{$user->bankAccounts ? $user->bankAccounts->branch_name :''}}" required>
                                        </div>
                                    </div>
                                   <!-- <div class="col-md-6">
                                        <label class="form-label">Branch Code</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-barcode"></i>
                                            <input type="text" class="form-control" placeholder="Enter branch code" disabled>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="alert alert-info mt-4">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Note:</strong> Bank details are used for refunds and payment processing. Ensure all information is accurate.
                                </div>
                                <div class="form-actions mt-4" style="display: none;">
                                    <button type="button" class="btn btn-secondary" id="cancelBankBtn">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Save Bank Details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Documents Section -->
                    <div class="content-card mt-4" id="documents">
                        <div class="card-header-custom">
                            <h3><i class="fas fa-file-alt me-2"></i>Identity Documents</h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="row g-4">
                                <!-- Aadhar Card Upload -->
                                <div class="col-md-6">
                                    <div class="document-upload-card">
                                        <div class="document-icon">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <h5>Aadhar Card</h5>
                                        <p class="text-muted mb-3">Upload front and back images of your Aadhar card</p>
                                        <form method="POST" action="{{url('documents-upload')}}" enctype="multipart/form-data">
                                        	@csrf
                                        	@method('patch')
                                        <div class="upload-section mb-3">
                                            <label class="upload-label">Front Side</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="aadharFront" name="aadhaar_front" accept="image/*" class="form-control" required>
                                                @error('aadhaar_front')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                               <!-- <label for="aadharFront" class="file-upload-btn">
                                                    <i class="fas fa-cloud-upload-alt me-2"></i>
                                                    <span>Choose File</span>
                                                </label>-->
                                                   <br/>
                                                	@php $doc = $user->getDocumentByType('aadhaar_front'); @endphp

													@if($doc)
													    <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$doc->file_path) }}">
													@endif
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="upload-section">
                                            <label class="upload-label">Back Side</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="aadharBack" accept="image/*" s name="aadhaar_back" class="form-control" required>
                                                @error('aadhaar_back')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
												<br/>
												@php $doc = $user->getDocumentByType('aadhaar_back'); @endphp

													@if($doc)
													    <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$doc->file_path) }}">
													@endif
                                                <!--<label for="aadharBack" class="file-upload-btn">
                                                    <i class="fas fa-cloud-upload-alt me-2"></i>
                                                    <span>Choose File</span>
                                                </label>-->
                                                <div class="file-preview" id="aadharBackPreview"></div>
                                            </div>
                                        </div>
                                        <br/>
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Upload Documents
                                    </button>
                                    </div>
                                </form>
                                </div>

                                <!-- PAN Card Upload -->
                                <div class="col-md-6">
                                    <div class="document-upload-card">
                                        <div class="document-icon">
                                            <i class="fas fa-address-card"></i>
                                        </div>
                                        <h5>PAN Card</h5>
                                        <p class="text-muted mb-3">Upload a clear image of your PAN card</p>
                                        <form method="POST" action="{{url('documents-upload')}}" enctype="multipart/form-data">
                                        	@csrf
                                        	@method('patch')
                                        <div class="upload-section">
                                            <label class="upload-label">PAN Card Image</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="panCard" accept="image/*" name="pan_card">
                                                @error('pan_card')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
												<br/>
												@php $doc = $user->getDocumentByType('pan_card'); @endphp

													@if($doc)
													    <img src="{{ asset('storage/user_documents/'.$user->id.'/'.$doc->file_path) }}">
													@endif
                                            </div>
                                        </div>
                                        <br/>
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Upload Documents
                                    </button>
                                    </div>
                                </form>
                                </div>

                                <!-- Driving License Upload -->
                                <!--<div class="col-md-6">
                                    <div class="document-upload-card">
                                        <div class="document-icon">
                                            <i class="fas fa-id-badge"></i>
                                        </div>
                                        <h5>Driving License</h5>
                                        <p class="text-muted mb-3">Upload front and back images (Optional)</p>
                                        
                                        <div class="upload-section mb-3">
                                            <label class="upload-label">Front Side</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="dlFront" accept="image/*" hidden>
                                                <label for="dlFront" class="file-upload-btn">
                                                    <i class="fas fa-cloud-upload-alt me-2"></i>
                                                    <span>Choose File</span>
                                                </label>
                                                <div class="file-preview" id="dlFrontPreview"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="upload-section">
                                            <label class="upload-label">Back Side</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="dlBack" accept="image/*" hidden>
                                                <label for="dlBack" class="file-upload-btn">
                                                    <i class="fas fa-cloud-upload-alt me-2"></i>
                                                    <span>Choose File</span>
                                                </label>
                                                <div class="file-preview" id="dlBackPreview"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="document-status mt-3">
                                            <span class="status-badge status-verified">
                                                <i class="fas fa-check me-1"></i>Verified
                                            </span>
                                        </div>
                                    </div>
                                </div>-->

                                <!-- Address Proof Upload -->
                                <!--<div class="col-md-6">
                                    <div class="document-upload-card">
                                        <div class="document-icon">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <h5>Address Proof</h5>
                                        <p class="text-muted mb-3">Upload utility bill or rental agreement</p>
                                        
                                        <div class="upload-section">
                                            <label class="upload-label">Document</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" id="addressProof" accept="image/*,application/pdf" hidden>
                                                <label for="addressProof" class="file-upload-btn">
                                                    <i class="fas fa-cloud-upload-alt me-2"></i>
                                                    <span>Choose File</span>
                                                </label>
                                                <div class="file-preview" id="addressProofPreview"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="document-status mt-3">
                                            <span class="status-badge status-not-uploaded">
                                                <i class="fas fa-times me-1"></i>Not Uploaded
                                            </span>
                                        </div>
                                    </div>
                                </div>-->
                            </div>

                            <div class="alert alert-warning mt-4">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Important:</strong> Please ensure all documents are clear and legible. Supported formats: JPG, PNG, PDF. Maximum file size: 2MB.
                            </div>
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div class="content-card mt-4" id="security">
                        <div class="card-header-custom">
                            <h3><i class="fas fa-shield-alt me-2"></i>Referral Link</h3>
                        </div>
                        <div class="card-body-custom">
                            <div class="security-item">
							    <div class="security-info">
							        <i class="fas fa-copy"></i>
							        @php
							            // Ensure you have a username column in your users table
							            $referralLink = route('register', ['ref' => auth()->user()->username]);
							        @endphp
							        <div>
							            <h5 id="refLink">{{ $referralLink }}</h5>
							            <p class="text-muted">Your unique referral link</p>
							        </div>
							    </div>
							    <button id="copyBtn" onclick="copyToClipboard()" class="btn btn-outline-primary btn-md">Copy</button>
							</div>

                            <!--<div class="security-item">
                                <div class="security-info">
                                    <i class="fas fa-mobile-alt"></i>
                                    <div>
                                        <h5>Two-Factor Authentication</h5>
                                        <p class="text-muted">Add an extra layer of security</p>
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                                </div>
                            </div>

                            <div class="security-item">
                                <div class="security-info">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <h5>Email Notifications</h5>
                                        <p class="text-muted">Receive security alerts via email</p>
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifSwitch" checked>
                                </div>
                            </div>

                            <div class="security-item">
                                <div class="security-info">
                                    <i class="fas fa-bell"></i>
                                    <div>
                                        <h5>SMS Alerts</h5>
                                        <p class="text-muted">Get transaction alerts on your phone</p>
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="smsAlertSwitch" checked>
                                </div>
                            </div>

                            <div class="recent-activity mt-4">
                                <h5 class="mb-3">Recent Login Activity</h5>
                                <div class="activity-list">
                                    <div class="activity-item">
                                        <div class="activity-icon">
                                            <i class="fas fa-desktop"></i>
                                        </div>
                                        <div class="activity-details">
                                            <strong>Windows Desktop</strong>
                                            <p class="text-muted mb-0">Bangalore, India • 2 hours ago</p>
                                        </div>
                                        <span class="badge bg-success">Current</span>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="activity-details">
                                            <strong>iPhone 13</strong>
                                            <p class="text-muted mb-0">Mumbai, India • Yesterday</p>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon">
                                            <i class="fas fa-tablet-alt"></i>
                                        </div>
                                        <div class="activity-details">
                                            <strong>iPad Pro</strong>
                                            <p class="text-muted mb-0">Delhi, India • 3 days ago</p>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Statistics -->
                    <!--<div class="row g-4 mt-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <h3>24</h3>
                                <p>Total Orders</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h3>12</h3>
                                <p>Wishlist Items</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3>850</h3>
                                <p>Reward Points</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <h3>Gold</h3>
                                <p>Membership Tier</p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <script>
function copyToClipboard() {
    const linkText = document.getElementById('refLink').innerText;
    const btn = document.getElementById('copyBtn');

    function showFeedback() {
        const originalText = btn.innerText;
        btn.innerText = 'Copied!';
        btn.classList.replace('btn-outline-primary', 'btn-success');
        setTimeout(() => {
            btn.innerText = originalText;
            btn.classList.replace('btn-success', 'btn-outline-primary');
        }, 2000);
    }

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(linkText).then(showFeedback).catch(err => {
            console.error('Failed to copy: ', err);
        });
    } else {
        // Fallback for non-secure contexts (HTTP)
        const textarea = document.createElement('textarea');
        textarea.value = linkText;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.focus();
        textarea.select();
        try {
            document.execCommand('copy');
            showFeedback();
        } catch (err) {
            console.error('Fallback copy failed: ', err);
        }
        document.body.removeChild(textarea);
    }
}
</script>
@endsection
@extends('layouts.site_layout')

@section('content')
   <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-6 col-md-8">
                    <div class="welcome-card">
                        <h1 class="welcome-title">WELCOME KIT</h1>
                        @if(session('new_user'))
                        <div class="user-name-section">
                            <span class="name-label">NAME:</span> 
                            <span class="name-value">{{ session('new_user')->name }}</span>
                        </div>

                        <div class="welcome-message">
                            Dear, Warmest welcome to Smart Stitch School Uniforms and thank you for becoming a part of our customer community. We are happy to help with your school uniform needs.
                        </div>

                        <div class="user-details">
                            <div class="detail-item">
                                <span class="detail-label">UserID:</span> 
                                <span class="detail-value">{{ session('new_user')->username }}</span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">MOBILE:</span> 
                                <span class="detail-value">{{ session('new_user')->phone }}</span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Email:</span> 
                                <span class="detail-value">{{ session('new_user')->email }}</span>
                            </div>
                        </div>

                        <div class="gratitude-message">
                            We sincerely thank you for choosing us for quality school uniforms and clothing essentials.
                        </div>

                        <div class="divider-line"></div>

                        <div class="action-button">
                            <a href="{{url('/')}}" class="btn btn-back-home">Back to Home</a>
                        </div>
                        @else
					        <script>window.location = "{{ route('register') }}";</script>
					    @endif
                        <div class="divider-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

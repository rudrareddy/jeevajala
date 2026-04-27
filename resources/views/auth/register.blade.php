@extends('layouts.site_layout')

@section('content')
   <!-- Register Section -->
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row g-0">
                            <!-- Left Side - Form -->
                            <div class="col-lg-6">
                                <div class="auth-form-side">
                                    <div class="text-center mb-4">
                                        <div class="auth-icon mb-3">
                                            <i class="fas fa-tint"></i>
                                        </div>
                                        <h3 class="mb-2">Create Account</h3>
                                        <p class="text-muted">Join us for a healthier lifestyle</p>
                                    </div>

                                    <form class="auth-form" method="POST" action="{{route('register')}}">
                                    	@csrf
                                        <input type="hidden" name="username" value="{{request()->query('ref')}}">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="Name" class="form-label"> Name</label>
                                                <div class="input-group">
                                                    <span class="input-icon">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="name" placeholder="John" name="name"  value="{{old('name')}}">
                                                    @error('name')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                                </div>
                                            </div>
                                            <!--<div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <div class="input-group">
                                                    <span class="input-icon">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
                                                </div>
                                            </div>-->
                                        </div>

                                        <div class="mb-3">
                                            <label for="regEmail" class="form-label">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" id="regEmail" placeholder="your@email.com" name="email" value="{{old('email')}}" >
                                                @error('email')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                                <input type="tel" class="form-control" id="phone" placeholder="+91 12345 67890"  name="phone" value="{{old('phone')}}">
                                                @error('phone')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="regPassword" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" id="regPassword" placeholder="Create a strong password" name="password">
                                                @error('password')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                            <div class="password-strength mt-2">
                                                <div class="strength-bar"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" id="confirmPassword" placeholder="Re-enter your password" name="password_confirmation">
                                                @error('password_confirmation')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                        </div>

                                       <!-- <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    I agree to the <a href="#" class="text-primary">Terms & Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                                </label>
                                            </div>
                                        </div>-->

                                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                            <i class="fas fa-user-plus me-2"></i>Create Account
                                        </button>

                                        <div class="divider">
                                            <span>or sign up with</span>
                                        </div>

                                        <!--<div class="social-login">
                                            <button type="button" class="btn btn-social">
                                                <i class="fab fa-google"></i>
                                            </button>
                                            <button type="button" class="btn btn-social">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
                                            <button type="button" class="btn btn-social">
                                                <i class="fab fa-apple"></i>
                                            </button>
                                        </div>-->

                                        <p class="text-center mt-4 mb-0">
                                            Already have an account? <a href="{{route('login')}}" class="text-primary fw-semibold">Sign In</a>
                                        </p>
                                    </form>
                                </div>
                            </div>

                            <!-- Right Side - Image -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="auth-image-side register-side">
                                    <div class="auth-overlay"></div>
                                    <div class="auth-content">
                                        <h2 class="mb-4">Start Your Wellness Journey</h2>
                                        <p class="mb-4">Create your account today and discover the transformative power of premium alkaline water.</p>
                                        <div class="auth-features">
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Free delivery on first order</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Access to exclusive deals</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Personalized health tips</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>24/7 customer support</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>
    </section>
@endsection
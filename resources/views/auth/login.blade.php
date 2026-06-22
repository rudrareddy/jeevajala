@extends('layouts.site_layout')

@section('content')
  <!-- Login Section -->
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row g-0">
                            <!-- Left Side - Image -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="auth-image-side">
                                    <div class="auth-overlay"></div>
                                    <div class="auth-content">
                                        <h2 class="mb-4">Welcome Back!</h2>
                                        <p class="mb-4">Sign in to manage your school uniform enquiries, orders, and account details.</p>
                                        <div class="auth-features">
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Track your orders</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Manage uniform enquiries</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Exclusive member benefits</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Side - Form -->
                            <div class="col-lg-6">
                                <div class="auth-form-side">
                                    <div class="text-center mb-4">
                                        <div class="auth-icon mb-3">
                                            <i class="fas fa-shirt"></i>
                                        </div>
                                        <h3 class="mb-2">Sign In</h3>
                                        <p class="text-muted">Enter your credentials to access your account</p>
                                    </div>

                                   <form method="POST" class="auth-form" action="{{ route('login') }}">
                                       @csrf

                                        <div class="mb-4">
                                            <label for="email" class="form-label">Username</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                                <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="" value="{{old('username')}}">

                                                 @error('username')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-icon">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password" required>
                                                 @error('password')
												    <div class="invalid-feedback d-block">
												        {{ $message }}
												    </div>
												@enderror
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember" >
                                                <label class="form-check-label" for="remember">
                                                    Remember me
                                                </label>
                                            </div>
                                            <a href="#" class="text-primary">Forgot Password?</a>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                        </button>

                                        <div class="divider">
                                            <span>or continue with</span>
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
                                            Don't have an account? <a href="register.html" class="text-primary fw-semibold">Sign Up</a>
                                        </p>
                                    </form>
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

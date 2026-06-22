@extends('layouts.site_layout')

@section('content')
    <style>
        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1F4E5F 0%, #2F7D57 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem;
        }

        .error-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
            opacity: 0.3;
        }

        .error-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 600px;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        .error-icon {
            font-size: 5rem;
            color: var(--white);
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: pulse 2s ease-in-out infinite;
        }

        .error-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
        }

        .error-message {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-error {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: var(--transition);
            border: none;
        }

        .btn-home {
            background: var(--white);
            color: var(--primary-color);
        }

        .btn-home:hover {
            background: var(--accent-color);
            color: var(--text-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
            color: var(--white);
            transform: translateY(-3px);
        }

        .floating-drops {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .drop {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: floatDrop 10s ease-in-out infinite;
        }

        .drop:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .drop:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
        }

        .drop:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 40%;
            left: 70%;
            animation-delay: 4s;
        }

        .drop:nth-child(4) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 6s;
        }

        .drop:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 10%;
            left: 85%;
            animation-delay: 8s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.9;
            }
            50% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        @keyframes floatDrop {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }

        @media (max-width: 767px) {
            .error-code {
                font-size: 6rem;
            }

            .error-icon {
                font-size: 3rem;
            }

            .error-title {
                font-size: 1.75rem;
            }

            .error-message {
                font-size: 1rem;
            }

            .error-actions {
                flex-direction: column;
            }

            .btn-error {
                width: 100%;
            }
        }
    </style>

    <div class="error-page">
        <div class="error-overlay"></div>
        
        <!-- Floating shapes -->
        <div class="floating-drops">
            <div class="drop"></div>
            <div class="drop"></div>
            <div class="drop"></div>
            <div class="drop"></div>
            <div class="drop"></div>
        </div>

        <!-- Error Content -->
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-shirt"></i>
            </div>
            
            <div class="error-code">404</div>
            
            <h1 class="error-title">Page Not Found</h1>
            
            <p class="error-message">
                Oops! The page you're looking for is not available. We'll help you get back to our school uniform collections.
            </p>

            <div class="error-actions">
                <a href="{{url('/')}}" class="btn btn-error btn-home">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
                <!--<button onclick="history.back()" class="btn btn-error btn-back">
                    <i class="fas fa-arrow-left me-2"></i>Go Back
                </button>-->
            </div>

            <div class="mt-4">
                <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">
                    Need help? <a href="index.html#contact" style="color: var(--white); text-decoration: underline;">Contact Support</a>
                </p>
            </div>
        </div>
    </div>

    @endsection

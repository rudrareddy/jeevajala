@extends('layouts.site_layout')

@section('content')
    <style>
        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%);
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
            animation: rotate 4s ease-in-out infinite;
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

        .error-info-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .error-info-box h5 {
            color: var(--white);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .error-info-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .error-info-box li {
            color: rgba(255, 255, 255, 0.9);
            padding: 0.5rem 0;
            display: flex;
            align-items: start;
            gap: 0.75rem;
        }

        .error-info-box li i {
            color: var(--white);
            margin-top: 0.25rem;
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

        .btn-refresh {
            background: var(--white);
            color: #FF6B6B;
        }

        .btn-refresh:hover {
            background: #FFE66D;
            color: var(--text-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.3);
            color: var(--white);
            transform: translateY(-3px);
        }

        .floating-clocks {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .clock {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 3rem;
            animation: floatClock 8s ease-in-out infinite;
        }

        .clock:nth-child(1) {
            top: 15%;
            left: 15%;
            animation-delay: 0s;
        }

        .clock:nth-child(2) {
            top: 70%;
            left: 75%;
            animation-delay: 2s;
        }

        .clock:nth-child(3) {
            top: 50%;
            left: 85%;
            animation-delay: 4s;
        }

        .clock:nth-child(4) {
            top: 25%;
            left: 80%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes rotate {
            0%, 100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(15deg);
            }
        }

        @keyframes floatClock {
            0%, 100% {
                transform: translateY(0) scale(1);
                opacity: 0.1;
            }
            50% {
                transform: translateY(-40px) scale(1.2);
                opacity: 0.2;
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

            .error-info-box {
                padding: 1rem;
            }
        }
    </style>
    <div class="error-page">
        <div class="error-overlay"></div>
        
        <!-- Floating Clocks -->
        <div class="floating-clocks">
            <i class="fas fa-clock clock"></i>
            <i class="fas fa-clock clock"></i>
            <i class="fas fa-clock clock"></i>
            <i class="fas fa-clock clock"></i>
        </div>

        <!-- Error Content -->
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-hourglass-end"></i>
            </div>
            
            <div class="error-code">419</div>
            
            <h1 class="error-title">Session Expired</h1>
            
            <p class="error-message">
                Your session has timed out for security reasons. Please refresh the page or log in again to continue.
            </p>

            <div class="error-info-box">
                <h5><i class="fas fa-info-circle me-2"></i>Why did this happen?</h5>
                <ul>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>You've been inactive for too long</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>Your security token has expired</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>This helps protect your account</span>
                    </li>
                </ul>
            </div>

            <div class="error-actions">
                <button onclick="location.reload()" class="btn btn-error btn-refresh">
                    <i class="fas fa-redo me-2"></i>Refresh Page
                </button>
                <a href="{{route('login')}}" class="btn btn-error btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Login Again
                </a>
            </div>

            <div class="mt-4">
                <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">
                    Still having issues? <a href="index.html#contact" style="color: var(--white); text-decoration: underline;">Contact Support</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-refresh countdown (optional)
        let countdown = 30;
        const refreshBtn = document.querySelector('.btn-refresh');
        const originalText = refreshBtn.innerHTML;
        
        const countdownInterval = setInterval(() => {
            countdown--;
            if (countdown > 0) {
                refreshBtn.innerHTML = `<i class="fas fa-redo me-2"></i>Refresh Page (${countdown}s)`;
            } else {
                refreshBtn.innerHTML = originalText;
                clearInterval(countdownInterval);
                // Auto refresh after 30 seconds
                // location.reload();
            }
        }, 1000);

        // Stop countdown if user clicks refresh
        refreshBtn.addEventListener('click', () => {
            clearInterval(countdownInterval);
        });
    </script>
@endsection
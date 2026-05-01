  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="fas fa-tint"></i> Jeevajala
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/#about') ? 'active' : '' }}" href="{{'/#about'}}">About</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/#packages') ? 'active' : '' }}" href="{{url('/#packages')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> My Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{url('profile')}}"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="{{url('my-teams')}}"><i class="fas fa-users me-2"></i>My Teams</a></li>
                            <li><a class="dropdown-item" href="{{url('transactions')}}"><i class="fas fa-receipt me-2"></i>Transactions</a></li>
                            <li><a class="dropdown-item" href="{{url('credit-requests')}}"><i class="fas fa-hand-holding-usd me-2"></i>Credit Requests</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </form>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary nav-btn" href="{{route('register')}}">Get Started</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
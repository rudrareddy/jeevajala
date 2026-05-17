@extends('layouts.site_layout')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">Premium Alkaline Water</div>
                    <h1 class="hero-title">Pure Hydration<br><span class="gradient-text">For A Healthier You</span></h1>
                    <p class="hero-subtitle">Experience the difference of mineral-rich alkaline water that balances your body, boosts energy, and promotes overall well-being.</p>
                    <div class="hero-buttons">
                        <a href="#packages" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-shopping-cart me-2"></i>Shop Now
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#youtubeModal">
                            <i class="fas fa-play-circle me-2"></i>Learn More
                        </a>
                    </div>
                    <div class="hero-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>99.9%</h3>
                                    <p>Pure</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>pH 9+</h3>
                                    <p>Alkaline</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>100%</h3>
                                    <p>Natural</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <div class="floating-element element-1"></div>
                        <div class="floating-element element-2"></div>
                        <div class="floating-element element-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-5" id="about">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper">
                        <div class="about-image-bg"></div>
                        <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=600&h=800&fit=crop" alt="Water Drop" class="img-fluid rounded-4 about-main-image">
                        <div class="about-badge">
                            <i class="fas fa-award"></i>
                            <span>Premium Quality</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header mb-4">
                        <span class="section-label">Our Story</span>
                        <h2 class="section-title">About Us</h2>
                    </div>
                    <h3 class="mb-4 about-main-heading">Jeva Jala Alkaline Water Solutions</h3>
                    <p class="lead mb-4 about-lead-text">At Jeva Jala Alkaline Water, we believe that water is more than just hydration—it's the foundation of a healthier, more vibrant life.</p>
                    <p class="mb-4">Our mission is to provide pure, mineral-rich alkaline water that helps balance the body, boost energy, and promote overall well-being. With advanced purification technology and a deep commitment to quality, we ensure every drop you drink supports a healthier tomorrow.</p>
                    
                    <div class="vision-mission mt-5">
                        <div class="vm-item mb-4">
                            <div class="vm-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="vm-content">
                                <h4>Our Vision</h4>
                                <p>To be a trusted leader in premium alkaline hydration, inspiring healthier lifestyles and empowering communities through the purest form of water.</p>
                            </div>
                        </div>
                        <div class="vm-item">
                            <div class="vm-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="vm-content">
                                <h4>Our Mission</h4>
                                <ul class="mission-list">
                                    <li>Deliver safe, refreshing, and naturally alkaline water that enhances health and vitality.</li>
                                    <li>Raise awareness about the benefits of alkaline hydration.</li>
                                    <li>Operate sustainably, reducing environmental impact and supporting community well-being.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-label">What Drives Us</span>
                <h2 class="section-title">Our Values</h2>
            </div>
            
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h3 class="mb-4">We Build Solutions</h3>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Purity</h4>
                        <p>We never compromise on the quality and integrity of our water.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Health First</h4>
                        <p>Every decision we make centers around improving people's well-being.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Sustainability</h4>
                        <p>We are committed to eco-friendly practices and reducing plastic waste.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>Innovation</h4>
                        <p>We embrace modern technology to deliver superior hydration.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="feature-box">
                        <div class="feature-image">
                            <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800&h=600&fit=crop" alt="Water Quality" class="img-fluid rounded-4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="what-we-do">
                        <h3 class="mb-4">What We Do</h3>
                        <p class="what-we-do-lead mb-4">At Jeva Jala, we specialize in producing and delivering high-quality alkaline water enriched with essential minerals.</p>
                        <p class="mb-4">Our advanced purification process ensures water that is clean, safe, and naturally balanced with a higher pH level. Whether for home, office, or on-the-go hydration, we provide convenient solutions that keep you refreshed and revitalized.</p>
                        <p class="mb-0">We don't just sell water—we promote a lifestyle of health, balance, and sustainability.</p>
                        
                        <div class="trust-badges mt-4">
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Transparency & Honesty</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Customer Satisfaction</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-label">Why Choose Us</span>
                <h2 class="section-title">Alkaline Water Benefits</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">01</div>
                        <i class="fas fa-bolt benefit-icon"></i>
                        <h4>Boosts Energy</h4>
                        <p>Enhanced hydration at cellular level increases natural energy and vitality throughout the day.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">02</div>
                        <i class="fas fa-balance-scale benefit-icon"></i>
                        <h4>Balances pH</h4>
                        <p>Helps neutralize acidity in the body, promoting optimal pH balance for better health.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">03</div>
                        <i class="fas fa-dumbbell benefit-icon"></i>
                        <h4>Supports Fitness</h4>
                        <p>Improved hydration and mineral content aids muscle recovery and athletic performance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">04</div>
                        <i class="fas fa-spa benefit-icon"></i>
                        <h4>Detoxifies Body</h4>
                        <p>Helps flush toxins and supports natural detoxification processes for cleaner health.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">05</div>
                        <i class="fas fa-brain benefit-icon"></i>
                        <h4>Mental Clarity</h4>
                        <p>Better hydration supports cognitive function, focus, and mental performance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">06</div>
                        <i class="fas fa-smile benefit-icon"></i>
                        <h4>Skin Health</h4>
                        <p>Antioxidant properties and deep hydration promote healthier, more radiant skin.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="packages-section py-5" id="packages">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-label">Pricing Plans</span>
                <h2 class="section-title">Our Packages</h2>
                <p class="text-muted mt-3">Choose the perfect plan for your hydration needs</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="package-card">
                        <div class="package-header">
                            <h3>Basic</h3>
                            <p class="package-subtitle">Starter features for small businesses</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">2000</span>
                            <span class="period">/month</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> 20 Liters per week</li>
                            <li><i class="fas fa-check"></i> Free delivery</li>
                            <li><i class="fas fa-check"></i> Basic support</li>
                            <li><i class="fas fa-check"></i> pH 8.5-9.0</li>
                            <li class="disabled"><i class="fas fa-times"></i> Premium packaging</li>
                            <li class="disabled"><i class="fas fa-times"></i> Priority support</li>
                        </ul>
                        <a href="register.html" class="btn btn-outline-primary w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="package-card featured">
                        <div class="package-badge">Most Popular</div>
                        <div class="package-header">
                            <h3>Standard</h3>
                            <p class="package-subtitle">Balanced features for growing companies</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">12,000</span>
                            <span class="period">/month</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> 40 Liters per week</li>
                            <li><i class="fas fa-check"></i> Free delivery</li>
                            <li><i class="fas fa-check"></i> Priority support</li>
                            <li><i class="fas fa-check"></i> pH 9.0-9.5</li>
                            <li><i class="fas fa-check"></i> Premium packaging</li>
                            <li><i class="fas fa-check"></i> Monthly health tips</li>
                        </ul>
                        <a href="register.html" class="btn btn-primary w-100">Get Started</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="package-card">
                        <div class="package-header">
                            <h3>Premium</h3>
                            <p class="package-subtitle">Advanced solutions for enterprises</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">1,20,000</span>
                            <span class="period">/month</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Unlimited supply</li>
                            <li><i class="fas fa-check"></i> Free delivery</li>
                            <li><i class="fas fa-check"></i> 24/7 premium support</li>
                            <li><i class="fas fa-check"></i> pH 9.5+</li>
                            <li><i class="fas fa-check"></i> Luxury packaging</li>
                            <li><i class="fas fa-check"></i> Dedicated account manager</li>
                        </ul>
                        <a href="register.html" class="btn btn-outline-primary w-100">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <!--<section class="testimonials-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-label">Happy Customers</span>
                <h2 class="section-title">What People Say</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"I've noticed a significant improvement in my energy levels since switching to Swamalunga. The taste is incredibly pure and refreshing!"</p>
                        <div class="testimonial-author">
                            <h5>Priya Sharma</h5>
                            <span>Fitness Enthusiast</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Best alkaline water I've tried. The delivery service is prompt and the quality is consistently excellent. Highly recommend!"</p>
                        <div class="testimonial-author">
                            <h5>Rahul Verma</h5>
                            <span>Business Owner</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <div class="stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Our entire office has switched to Swamalunga. Everyone loves the taste and we've all noticed better hydration throughout the day."</p>
                        <div class="testimonial-author">
                            <h5>Anita Desai</h5>
                            <span>Corporate Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!-- CTA Section -->
  <!--  <section class="cta-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                    <h2 class="mb-3">Ready to Transform Your Hydration?</h2>
                    <p class="lead mb-0">Join thousands of satisfied customers experiencing the Swamalunga difference.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="register.html" class="btn btn-light btn-lg px-5">Start Today</a>
                </div>
            </div>
        </div>
    </section>-->
@endsection
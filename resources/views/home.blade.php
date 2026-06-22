@extends('layouts.site_layout')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">School Uniform Specialists</div>
                    <h1 class="hero-title">Smart Uniforms<br><span class="gradient-text">For Every School Day</span></h1>
                    <p class="hero-subtitle">Comfortable, durable, and neatly finished uniforms made for students, schools, and institutions that care about quality.</p>
                    <div class="hero-buttons">
                        <a href="#packages" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-shirt me-2"></i>View Collections
                        </a>
                        <a href="#about" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-circle-info me-2"></i>Learn More
                        </a>
                    </div>
                    <div class="hero-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>100%</h3>
                                    <p>Quality Checked</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>All</h3>
                                    <p>School Sizes</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h3>Bulk</h3>
                                    <p>Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image school-hero-image">
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
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=800&fit=crop" alt="Students wearing school uniforms" class="img-fluid rounded-4 about-main-image">
                        <div class="about-badge">
                            <i class="fas fa-award"></i>
                            <span>Trusted Stitching</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header mb-4">
                        <span class="section-label">Our Story</span>
                        <h2 class="section-title">About Us</h2>
                    </div>
                    <h3 class="mb-4 about-main-heading">Smart Stitch School Uniform Solutions</h3>
                    <p class="lead mb-4 about-lead-text">We specialize in school uniforms, institutional clothing, and daily-wear student essentials designed for comfort, neatness, and long life.</p>
                    <p class="mb-4">From shirts, trousers, skirts, pinafores, ties, belts, socks, sportswear, sweaters, and blazers to complete school-wise uniform sets, we help parents and schools get dependable clothing with consistent colors, accurate sizing, and careful finishing.</p>

                    <div class="vision-mission mt-5">
                        <div class="vm-item mb-4">
                            <div class="vm-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="vm-content">
                                <h4>Our Vision</h4>
                                <p>To become a trusted school uniform partner known for reliable fabric, clean stitching, timely delivery, and student-friendly comfort.</p>
                            </div>
                        </div>
                        <div class="vm-item">
                            <div class="vm-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="vm-content">
                                <h4>Our Mission</h4>
                                <ul class="mission-list">
                                    <li>Provide durable uniforms that stay comfortable through busy school days.</li>
                                    <li>Support schools with consistent colors, patterns, logos, and bulk order planning.</li>
                                    <li>Make uniform shopping easier for parents with clear size options and complete sets.</li>
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
                    <h3 class="mb-4">Uniforms Made With Care</h3>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <h4>Right Fit</h4>
                        <p>We focus on practical sizing so students can move, sit, play, and learn comfortably.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shirt"></i>
                        </div>
                        <h4>Quality Fabric</h4>
                        <p>Our fabric choices are selected for daily use, easy care, and long-lasting appearance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <h4>School Standards</h4>
                        <p>We match required colors, patterns, trims, and logo placement for each institution.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <h4>Timely Supply</h4>
                        <p>We plan production and delivery to support admissions, reopening, and annual demand.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="feature-box">
                        <div class="feature-image">
                            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800&h=600&fit=crop" alt="School uniform collection" class="img-fluid rounded-4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="what-we-do">
                        <h3 class="mb-4">What We Do</h3>
                        <p class="what-we-do-lead mb-4">We make and supply complete school uniform sets for boys, girls, sports teams, and school staff.</p>
                        <p class="mb-4">Our services include fabric selection, size planning, logo embroidery, house uniforms, sportswear, winter wear, and bulk uniform supply for schools and retailers.</p>
                        <p class="mb-0">We do not just sell clothing. We help schools maintain a polished, consistent identity across every classroom and event.</p>

                        <div class="trust-badges mt-4">
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Custom school logo embroidery</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Retail and bulk order support</span>
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
                <h2 class="section-title">Uniform Benefits</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">01</div>
                        <i class="fas fa-hand-sparkles benefit-icon"></i>
                        <h4>Easy Maintenance</h4>
                        <p>Wash-friendly fabrics help uniforms stay neat with regular school-day use.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">02</div>
                        <i class="fas fa-child-reaching benefit-icon"></i>
                        <h4>Comfortable Movement</h4>
                        <p>Student-focused cuts support classroom sitting, playground activity, and daily travel.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">03</div>
                        <i class="fas fa-medal benefit-icon"></i>
                        <h4>Polished Look</h4>
                        <p>Consistent colors and clean finishing give students a smart, confident appearance.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">04</div>
                        <i class="fas fa-tags benefit-icon"></i>
                        <h4>Complete Sets</h4>
                        <p>Parents can choose ready uniform sets with shirts, bottoms, ties, belts, and accessories.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">05</div>
                        <i class="fas fa-people-carry-box benefit-icon"></i>
                        <h4>Bulk Supply</h4>
                        <p>Schools can plan grade-wise and house-wise orders with organized delivery support.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="benefit-card">
                        <div class="benefit-number">06</div>
                        <i class="fas fa-pen-nib benefit-icon"></i>
                        <h4>Custom Branding</h4>
                        <p>Embroidery, patches, badges, and color trims can be aligned to school guidelines.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="packages-section py-5" id="packages">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-label">Collections</span>
                <h2 class="section-title">Our Uniform Packages</h2>
                <p class="text-muted mt-3">Choose complete sets for students, sports, and school bulk orders</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="package-card">
                        <div class="package-header">
                            <h3>Daily Set</h3>
                            <p class="package-subtitle">Everyday essentials for students</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">999</span>
                            <span class="period">/set</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Shirt or blouse</li>
                            <li><i class="fas fa-check"></i> Trouser, skirt, or pinafore</li>
                            <li><i class="fas fa-check"></i> Standard school colors</li>
                            <li><i class="fas fa-check"></i> Size guidance</li>
                            <li class="disabled"><i class="fas fa-times"></i> Logo embroidery</li>
                            <li class="disabled"><i class="fas fa-times"></i> Winter wear</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">Enquire Now</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="package-card featured">
                        <div class="package-badge">Most Popular</div>
                        <div class="package-header">
                            <h3>Complete Kit</h3>
                            <p class="package-subtitle">Full student uniform package</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">2,499</span>
                            <span class="period">/kit</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Daily uniform set</li>
                            <li><i class="fas fa-check"></i> Sports uniform</li>
                            <li><i class="fas fa-check"></i> Tie, belt, and socks</li>
                            <li><i class="fas fa-check"></i> Logo embroidery</li>
                            <li><i class="fas fa-check"></i> Premium stitching</li>
                            <li><i class="fas fa-check"></i> Parent support</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-primary w-100">Enquire Now</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="package-card">
                        <div class="package-header">
                            <h3>School Bulk</h3>
                            <p class="package-subtitle">Custom supply for institutions</p>
                        </div>
                        <div class="package-price">
                            <span class="currency">₹</span>
                            <span class="amount">Custom</span>
                            <span class="period">/order</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Grade-wise size planning</li>
                            <li><i class="fas fa-check"></i> Custom logo and badges</li>
                            <li><i class="fas fa-check"></i> House uniforms and sportswear</li>
                            <li><i class="fas fa-check"></i> Staff uniforms</li>
                            <li><i class="fas fa-check"></i> Scheduled delivery</li>
                            <li><i class="fas fa-check"></i> Dedicated order support</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">Enquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

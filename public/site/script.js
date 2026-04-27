// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNav');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const offset = 80;
            const targetPosition = target.offsetTop - offset;
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Intersection Observer for fade-in animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.value-card, .benefit-card, .package-card, .testimonial-card');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Password strength indicator
const passwordInput = document.getElementById('regPassword');
if (passwordInput) {
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.querySelector('.strength-bar');
        
        if (!strengthBar) return;
        
        let strength = 0;
        
        if (password.length >= 8) strength += 25;
        if (password.match(/[a-z]/)) strength += 25;
        if (password.match(/[A-Z]/)) strength += 25;
        if (password.match(/[0-9]/)) strength += 25;
        
        strengthBar.style.width = strength + '%';
        
        if (strength <= 25) {
            strengthBar.style.background = '#dc3545';
        } else if (strength <= 50) {
            strengthBar.style.background = '#ffc107';
        } else if (strength <= 75) {
            strengthBar.style.background = '#17a2b8';
        } else {
            strengthBar.style.background = '#28a745';
        }
    });
}

// Form validation for login
/*const loginForm = document.querySelector('.auth-form');
if (loginForm && window.location.pathname.includes('login')) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        // Basic validation
        if (!email || !password) {
            alert('Please fill in all fields');
            return;
        }
        
        if (!isValidEmail(email)) {
            alert('Please enter a valid email address');
            return;
        }
        
        // Simulate login (in real app, this would connect to backend)
        console.log('Login attempt:', { email, password });
        alert('Login functionality will be implemented with backend integration');
    });
}*/

// Form validation for registration
if (loginForm && window.location.pathname.includes('register')) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('regEmail').value;
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('regPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const terms = document.getElementById('terms').checked;
        
        // Validation
        if (!firstName || !lastName || !email || !phone || !password || !confirmPassword) {
            alert('Please fill in all fields');
            return;
        }
        
        if (!isValidEmail(email)) {
            alert('Please enter a valid email address');
            return;
        }
        
        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }
        
        if (password.length < 8) {
            alert('Password must be at least 8 characters long');
            return;
        }
        
        if (!terms) {
            alert('Please accept the terms and conditions');
            return;
        }
        
        // Simulate registration (in real app, this would connect to backend)
        console.log('Registration attempt:', { firstName, lastName, email, phone });
        alert('Registration functionality will be implemented with backend integration');
    });
}

// Email validation helper
function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Prevent form submission on social login buttons
document.querySelectorAll('.btn-social').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Social login clicked');
        alert('Social login will be implemented with backend integration');
    });
});

// Add active state to current page in navigation
document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage || (currentPage === '' && href === 'index.html')) {
            link.classList.add('active');
        }
    });
});

// Mobile menu close on link click
const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
const navbarToggler = document.querySelector('.navbar-toggler');
const navbarCollapse = document.querySelector('.navbar-collapse');

navLinks.forEach(link => {
    link.addEventListener('click', function() {
        if (window.innerWidth < 992) {
            navbarCollapse.classList.remove('show');
        }
    });
});

// Counter animation for stats
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start);
        }
    }, 16);
}

// Trigger counter animation when stats section is visible
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statItems = document.querySelectorAll('.stat-item h3');
            statItems.forEach(item => {
                const text = item.textContent;
                const number = parseInt(text.replace(/\D/g, ''));
                if (number && !item.classList.contains('animated')) {
                    item.classList.add('animated');
                    item.textContent = '0';
                    setTimeout(() => {
                        animateCounter(item, number);
                    }, 300);
                }
            });
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

const heroStats = document.querySelector('.hero-stats');
if (heroStats) {
    statsObserver.observe(heroStats);
}

// Add parallax effect to hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero-section');
    
    if (hero) {
        const heroContent = document.querySelector('.hero-content');
        const floatingElements = document.querySelectorAll('.floating-element');
        
        if (heroContent) {
            heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
        
        floatingElements.forEach((element, index) => {
            element.style.transform = `translateY(${scrolled * (0.3 + index * 0.1)}px)`;
        });
    }
});

// Add hover effect to package cards
document.querySelectorAll('.package-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        if (this.classList.contains('featured')) {
            this.style.transform = 'scale(1.05)';
        } else {
            this.style.transform = 'translateY(0) scale(1)';
        }
    });
});

// Testimonial card interactions
document.querySelectorAll('.testimonial-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        const stars = this.querySelector('.stars');
        if (stars) {
            stars.style.transform = 'scale(1.1)';
        }
    });
    
    card.addEventListener('mouseleave', function() {
        const stars = this.querySelector('.stars');
        if (stars) {
            stars.style.transform = 'scale(1)';
        }
    });
});

// Page load animation
window.addEventListener('load', function() {
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});

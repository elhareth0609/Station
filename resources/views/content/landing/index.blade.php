@extends('layouts.app')
 
@php
    $isNavbar = false;
    $isSidebar = false;
    $isFooter = false;
    $isContainer = false;
@endphp

@section('title', __('App Landing Page'))

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Navigation */
    nav {
        background: rgba(255, 255, 255, 0.95);
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        backdrop-filter: blur(10px);
        transition: background-color 0.3s;
    }

    nav:hover {
        background: rgba(255, 255, 255, 1);
    }


    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        gap: 30px;
    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #007bff;
    }

            /* Hamburger Menu Button */
            .menu-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        z-index: 1001;
    }

    .menu-btn span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #333;
        margin: 5px 0;
        transition: all 0.3s;
    }

    /* Hero Section */
    .hero {
        padding: 120px 20px 60px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        text-align: center;
    }

    .hero h1 {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .app-store-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    .app-store-buttons img {
        height: 50px;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .app-store-buttons img:hover {
        transform: scale(1.05);
    }

    /* Projects Section */
    .projects {
        padding: 80px 20px;
        background: #f8f9fa;
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        margin-bottom: 40px;
        color: #333;
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .project-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .project-card:nth-child(1) { animation-delay: 0.2s; }
    .project-card:nth-child(2) { animation-delay: 0.4s; }
    .project-card:nth-child(3) { animation-delay: 0.6s; }


    /* Sponsors Section */
    .sponsors {
        padding: 80px 20px;
        background: white;
        overflow: hidden;
    }

    .sponsors-grid {
        display: flex;
        animation: scrollSponsors 20s linear infinite;
        width: max-content;
    }

    .sponsor-logo {
        margin: 0 40px;
        flex-shrink: 0;
    }

    @keyframes scrollSponsors {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }


    /* Contact Section */
    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .map-container {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }


    .contact {
        padding: 80px 20px;
        background: #f8f9fa;
    }

    .contact-form {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .submit-btn {
        background: #007bff;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .submit-btn:hover {
        background: #0056b3;
    }

    /* Footer */
    /* footer {
        background: #333;
        color: white;
        padding: 60px 20px 20px;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 40px;
        margin-bottom: 40px;
    }

    .footer-section h3 {
        margin-bottom: 20px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover {
        color: #007bff;
    } */

    .copyright {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #555;
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        /* .nav-links {
            display: none;
        } */

        .hero h1 {
            font-size: 36px;
        }

        .app-store-buttons {
            flex-direction: column;
            align-items: center;
        }

        .contact-container {
            grid-template-columns: 1fr;
        }

        .sponsors-grid {
            animation: scrollSponsors 15s linear infinite;
        }

        .menu-btn {
            display: block;
        }

        .nav-links {
            position: fixed;
            top: 0;
            right: -100%;
            width: 70%;
            height: 100vh;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: right 0.3s ease;
            gap: 40px;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
        }

        .nav-links.active {
            right: 0;
        }

        /* Hamburger Animation */
        .menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-btn.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

    }
</style>

<!-- Navigation -->
<nav>
    <div class="nav-container">
        <a href="#" class="logo">AppName</a>
        <button class="menu-btn" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#projects">Projects</a>
            <a href="#sponsors">Sponsors</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero" id="home">
    <h1>Welcome to AppName</h1>
    <p>Your ultimate solution for everything you need</p>
    <div class="app-store-buttons">
        <a href="#" target="_blank"><img src="{{ asset('assets/img/my/defaults/app.png') }}" alt="Download on App Store"></a>
        <a href="#" target="_blank"><img src="{{ asset('assets/img/my/defaults/google.png') }}" alt="Get it on Google Play"></a>
    </div>
</section>

<!-- Projects Section -->
<section class="projects" id="projects">
    <h2 class="section-title">Our Projects</h2>
    <div class="projects-grid">
        <div class="project-card">
            <img src="/api/placeholder/280/160" alt="Project 1">
            <h3>Project 1</h3>
            <p>Description of project 1 goes here.</p>
        </div>
        <div class="project-card">
            <img src="/api/placeholder/280/160" alt="Project 2">
            <h3>Project 2</h3>
            <p>Description of project 2 goes here.</p>
        </div>
        <div class="project-card">
            <img src="/api/placeholder/280/160" alt="Project 3">
            <h3>Project 3</h3>
            <p>Description of project 3 goes here.</p>
        </div>
    </div>
</section>

<!-- Sponsors Section -->
<section class="sponsors" id="sponsors">
    <h2 class="section-title">Our Sponsors</h2>
    <div class="sponsors-grid">
        <!-- Double the sponsors for smooth infinite scroll -->
        <img src="/api/placeholder/150/80" alt="Sponsor 1" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 2" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 3" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 4" class="sponsor-logo">
        <!-- Duplicate sponsors for continuous scroll -->
        <img src="/api/placeholder/150/80" alt="Sponsor 1" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 2" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 3" class="sponsor-logo">
        <img src="/api/placeholder/150/80" alt="Sponsor 4" class="sponsor-logo">
    </div>
</section>


<style>
    .app-showcase {
        background: #f8f9fa;
        overflow: hidden;
        padding: 60px 0;
    }

    .app-screens-container {
        position: relative;
        height: 600px;
    }

    .app-screens {
        position: relative;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 1000px;
    }

    /* .screen {
        position: absolute;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    } */

    .screen {
        position: absolute;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer; /* Add cursor pointer to indicate clickable */
    }

    .screen img {
        height: 500px;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .screen-prev {
        transform: translateX(-50%) scale(0.8) rotateY(10deg);
        opacity: 0.6;
        filter: blur(1px);
    }

    .screen-main {
        transform: translateX(0) scale(1) rotateY(0);
        opacity: 1;
        filter: blur(0);
        z-index: 1;
    }

    .screen-next {
        transform: translateX(50%) scale(0.8) rotateY(-10deg);
        opacity: 0.6;
        filter: blur(1px);
    }

    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.5);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        z-index: 2;
        transition: all 0.3s ease;
    }

    .nav-btn:hover {
        background: rgba(0,0,0,0.7);
        transform: translateY(-50%) scale(1.1);
    }

    .prev-btn { left: 20px; }
    .next-btn { right: 20px; }
</style>


<section class="app-showcase py-5" id="features">
    <h2 class="section-title text-center mb-5">App Features</h2>
    <div class="container">
        <div id="appScreensSlider" class="app-screens-container">
            <div class="app-screens">
                <div class="screen screen-prev" onclick="goToSlide(0)">
                    <img src="{{ asset('assets/my/landing/1.jpg') }}" alt="App Screen 1">
                </div>
                <div class="screen screen-main" onclick="goToSlide(1)">
                    <img src="{{ asset('assets/my/landing/2.jpg') }}" alt="App Screen 2">
                </div>
                <div class="screen screen-next" onclick="goToSlide(2)">
                    <img src="{{ asset('assets/my/landing/3.jpg') }}" alt="App Screen 3">
                </div>
            </div>
            <button class="nav-btn prev-btn" onclick="moveSlider('prev')">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="nav-btn next-btn" onclick="moveSlider('next')">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>


<script>
    const appScreensSlider = document.getElementById('appScreensSlider');
    const images = [...appScreensSlider.querySelectorAll('.screen img')].map(img => img.src);

let currentIndex = 1;
let isAnimating = false;

function goToSlide(index) {
    if (isAnimating || index === currentIndex) return;

    isAnimating = true;

    const diff = index - currentIndex;
    const direction = diff > 0 ? 'next' : 'prev';
    const steps = Math.abs(diff);

    function animate(remaining) {
        if (remaining === 0) {
            isAnimating = false;
            return;
        }

        moveSlider(direction);
        setTimeout(() => animate(remaining - 1), 800);
    }

    animate(steps);
}

function moveSlider(direction) {
    console.log(isAnimating,direction);

    if (isAnimating && direction !== 'forced') return;
    isAnimating = true;

    const screens = appScreensSlider.querySelectorAll('.screen');
    
    if (direction === 'next') {
        currentIndex = (currentIndex + 1) % images.length;
    } else if (direction === 'prev') {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
    }
    
    screens.forEach((screen, index) => {
        const img = screen.querySelector('img');
        const imgIndex = (currentIndex + index - 1 + images.length) % images.length;
        img.style.opacity = '0';
        setTimeout(() => {
            img.src = images[imgIndex];
            img.style.opacity = '1';
        }, 400);
    });

    setTimeout(() => {
        isAnimating = false;
    }, 800);
}

// Add click event listeners to screens
const screens = appScreensSlider.querySelectorAll('.screen');
screens.forEach((screen, index) => {
    screen.addEventListener('click', () => {
        goToSlide(index);
    });
});

// Touch support remains the same
let startX = 0;
const slider = document.getElementById('appScreensSlider');

slider.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
});

slider.addEventListener('touchend', (e) => {
    const endX = e.changedTouches[0].clientX;
    const diff = startX - endX;
    
    if (Math.abs(diff) > 50) {
        moveSlider(diff > 0 ? 'next' : 'prev');
    }
});
</script>


<!-- Contact Section -->
<section class="contact" id="contact">
    <h2 class="section-title">Contact Us</h2>
    <div class="contact-container">
        <div class="form-container">
            <form class="contact-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30591910525!2d-74.25986432970231!3d40.69714941680757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1672809207556!5m2!1sen!2s"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>About Us</h3>
            <ul class="footer-links">
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Resources</h3>
            <ul class="footer-links">
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Legal</h3>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Cookie Policy</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Connect</h3>
            <ul class="footer-links">
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Facebook</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2025 AppName. All rights reserved.</p>
    </div>
</footer>


<script>
    // Mobile Menu Toggle
    function toggleMenu() {
        const menuBtn = document.querySelector('.menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        menuBtn.classList.toggle('active');
        navLinks.classList.toggle('active');
    }

    // Close menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            const menuBtn = document.querySelector('.menu-btn');
            const navLinks = document.querySelector('.nav-links');
            
            menuBtn.classList.remove('active');
            navLinks.classList.remove('active');
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        const navLinks = document.querySelector('.nav-links');
        const menuBtn = document.querySelector('.menu-btn');
        
        if (!navLinks.contains(e.target) && !menuBtn.contains(e.target) && navLinks.classList.contains('active')) {
            menuBtn.classList.remove('active');
            navLinks.classList.remove('active');
        }
    });
</script>
@endsection
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
    footer {
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
    }

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
        <img src="/api/placeholder/200/60" alt="Download on App Store">
        <img src="/api/placeholder/200/60" alt="Get it on Google Play">
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
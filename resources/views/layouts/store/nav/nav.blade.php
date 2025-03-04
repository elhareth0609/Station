<style>
    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        background: white;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 1000;
        display: none;
    }

    .nav-item-mobile {
        text-align: center;
        color: #666;
        text-decoration: none;
    }

    .nav-item-mobile.active {
        color: #007bff;
    }

    .nav-item-mobile i {
        font-size: 24px;
    }

    .product-carousel .carousel-item {
        height: 400px;
        background-size: cover;
        background-position: center;
    }

    .product-info {
        background: rgba(255,255,255,0.9);
        padding: 20px;
        border-radius: 10px;
    }

    .color-option {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: inline-block;
        margin: 0 5px;
        cursor: pointer;
        border: 2px solid white;
        box-shadow: 0 0 0 1px #ddd;
    }

    .color-option.active {
        box-shadow: 0 0 0 2px #007bff;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
    }

    /* Custom Styles */
    .top-nav {
        padding: 15px 0 5px 0;
        border-bottom: 1px solid #eee;
    }

    .promo-badge {
        background: #ff4444;
        color: white;
        font-size: 0.8em;
        padding: 2px 6px;
        border-radius: 3px;
        margin-left: 5px;
    }

    .search-bar {
        width: 360px;
    }

    @media (max-width: 768px) {
        .search-bar {
            margin: 10px 0;
            max-width: 100%;
        }
        .mobile-bottom-nav {
            display: flex;
        }
        .desktop-nav {
            display: none;
        }
        .category-list {
            display: none;
        }
        .top-nav .container .row {
            display: flex;
            justify-content: space-between;
        }
        .top-nav .container .row .col-md-3 {
            width: fit-content;
        }
        body {
            padding-bottom: 60px;
        }
    }
</style>

{{--
<!-- Top Navigation -->
<nav class="top-nav">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a class="d-flex align-items-center text-black" href="http://dashboard.test">
                    <div class="sidebar-brand-icon" style="font-size: 2rem;">
                        <i class="mdi mdi-home-outline"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3" style="font-size: 1rem;font-weight: 800;text-transform: uppercase;letter-spacing: 0.05rem;">Dashboard</div>
                </a>
            </div>
            <div class="col-md-6 category-list">
                <ul class="nav">
                    <!-- Electronics Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Electronics
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Smartphones</a></li>
                            <li><a class="dropdown-item" href="#">Laptops</a></li>
                            <li><a class="dropdown-item" href="#">Gaming Laptops <span class="badge bg-danger">Sale</span></a></li>
                            <li><a class="dropdown-item" href="#">Business Laptops</a></li>
                        </ul>
                    </li>
                    <!-- Fashion Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Fashion
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Men's Wear</a></li>
                            <li><a class="dropdown-item" href="#">Women's Wear <span class="badge bg-success">New</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-end">
                <img src="{{ Auth::user()->photo_url }}" alt="Avatar" class="avatar avatar-md border-secondary">
            </div>
        </div>
    </div>
</nav>
 --}}

 <!-- Navigation -->
<nav class="nav-store">
    <div class="nav-container container-fluid">
        {{-- <a href="#" class="logo">AppName</a> --}}
        <a class="d-flex align-items-center text-black" href="{{ route('home') }}">
            <div class="sidebar-brand-icon fs-6">
                <i class="mdi mdi-cart-outline mdi-24px"></i>
            </div>
            <div class="sidebar-brand-text mx-3" style="font-size: 1rem;font-weight: 800;text-transform: uppercase;letter-spacing: 0.05rem;">My Store</div>
        </a>

        <button class="btn btn-icon btn-white d-md-none d-sm-flex">
            <span class="mdi mdi-magnify fs-2"></span>
        </button>
        <div class="nav-links align-items-center">
            <a href="#home">Home</a>
            <a href="#projects">Projects</a>
            <a href="#sponsors">Sponsors</a>
            <a href="#contact">Contact</a>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->photo_url }}" alt="Avatar" class="avatar avatar-md border-secondary">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div id="page-top" style="margin-top: 85px;"></div>
<!-- desktop Bottom Navigation -->
<nav class="navbar navbar-expand-lg shadow-none desktop-nav">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="search-bar">
                <div class="input-group">
                    <span class="input-group-text border-end-0 bg-white">
                        <i class="mdi mdi-magnify"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Search...">
                </div>
            </div>
            <button class="btn" id="cartButton" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
                <i class="mdi mdi-cart-outline mdi-24px"></i>
                <span class="badge bg-danger">3</span>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Bottom Navigation -->
<div class="mobile-bottom-nav">
    <a href="#" class="nav-item-mobile flex-fill" type="button" data-bs-toggle="offcanvas" data-bs-target="#categoriesOffcanvas">
        <i class="mdi mdi-menu"></i>
        <div class="small">Categories</div>
    </a>
    <a href="{{ route('home') }}" class="nav-item-mobile flex-fill active">
        <i class="mdi mdi-home"></i>
        <div class="small">Home</div>
    </a>
    <a href="#" class="nav-item-mobile flex-fill" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
        <i class="mdi mdi-cart-outline">
            <span class="badge bg-danger position-absolute" style="font-size: 8px;">3</span>
        </i>
        <div class="small">Cart</div>
    </a>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header p-3 border-bottom">
        <h5 class="offcanvas-title" id="cartOffcanvasLabel">Shopping Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <!-- Offcanvas Body (Cart Items) -->
    <div class="offcanvas-body p-3">
        <!-- Sample Cart Item -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="me-3" style="width: 80px;" alt="Product">
                    <div>
                        <h6 class="mb-1">Product Name</h6>
                        <p class="mb-1">$99.99</p>
                        <div class="d-flex">
                            <div class="my-w-fit-content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Minus Button -->
                                    <button class="btn btn-icon btn-warning me-1 minus-btn">
                                        <i class="mdi mdi-minus"></i>
                                    </button>
                                    <!-- Input Quantity -->
                                    <input type="number" class="form-control text-center quantity-input" value="1" min="1" max="10" style="width: 90px;">
                                    <!-- Plus Button -->
                                    <button class="btn btn-icon btn-warning ms-1 plus-btn">
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Button -->
                            <button class="btn btn-outline-danger d-flex mx-1 cart-btn">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat for more items -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="me-3" style="width: 80px;" alt="Product">
                    <div>
                        <h6 class="mb-1">Another Product</h6>
                        <p class="mb-1">$49.99</p>
                        <div class="d-flex">
                            <div class="my-w-fit-content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Minus Button -->
                                    <button class="btn btn-icon btn-warning me-1 minus-btn">
                                        <i class="mdi mdi-minus"></i>
                                    </button>
                                    <!-- Input Quantity -->
                                    <input type="number" class="form-control text-center quantity-input" value="1" min="1" max="10" style="width: 90px;">
                                    <!-- Plus Button -->
                                    <button class="btn btn-icon btn-warning ms-1 plus-btn">
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Button -->
                            <button class="btn btn-outline-danger d-flex mx-1 cart-btn">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas Footer (Total and Checkout Button) -->
    <div class="p-3 border-top mt-auto">
        <div class="d-flex justify-content-between mb-2">
            <strong>Total:</strong>
            <strong>$149.98</strong>
        </div>
        <a href="{{ route('cart') }}" class="btn btn-warning w-100">
            <i class="mdi mdi-cart-check"></i> Go to Cart
        </a>
    </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="categoriesOffcanvas" aria-labelledby="categoriesOffcanvasLabel">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="categoriesOffcanvasLabel">Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <!-- Offcanvas Body (Dropdowns) -->
    <div class="offcanvas-body">
        <!-- Electronics Dropdown -->
        <div class="dropdown mb-3">
            <a class="btn btn-secondary dropdown-toggle w-100 text-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Electronics
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Smartphones</a></li>
                <li><a class="dropdown-item" href="#">Laptops</a></li>
                <li><a class="dropdown-item" href="#">Gaming Laptops <span class="badge bg-danger">Sale</span></a></li>
                <li><a class="dropdown-item" href="#">Business Laptops</a></li>
            </ul>
        </div>

        <!-- Fashion Dropdown -->
        <div class="dropdown mb-3">
            <a class="btn btn-secondary dropdown-toggle w-100 text-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Fashion
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="#">Men's Wear</a></li>
                <li><a class="dropdown-item" href="#">Women's Wear <span class="badge bg-success">New</span></a></li>
            </ul>
        </div>
    </div>
</div>






<style>
    /* Navigation */
    nav.nav-store {
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

    nav.nav-store:hover {
        background: rgba(255, 255, 255, 1);
    }


    .nav-container {
        /* max-width: 1200px; */
        /* margin: 0 auto; */
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
        color: #ffc107;
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


    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Footer */
    footer a:hover {
        color: #007bff;
        transform: translateX(5px);
    }
    footer a {
        display: flex;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    /* Responsive Design */
    @media (max-width: 768px) {

        .hero h1 {
            font-size: 36px;
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

    }
</style>



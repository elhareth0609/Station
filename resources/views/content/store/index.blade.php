@extends('layouts.app')

@php
    $isNavbar = false;
    $isSidebar = false;
    $isFooter = false;
    $isContainer = false;
@endphp

@section('title', __('Store'))

@section('content')

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
            max-width: 400px;
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

    <!-- Mobile Bottom Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light desktop-nav">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="search-bar">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search products...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="mdi mdi-magnify"></i>
                        </button>
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
        <a href="#" class="nav-item-mobile flex-fill active">
            <i class="mdi mdi-home"></i>
            <div class="small">Home</div>
        </a>
        <a href="#" class="nav-item-mobile flex-fill" type="button" data-bs-toggle="offcanvas" data-bs-target="#categoriesOffcanvas">
            <i class="mdi mdi-menu"></i>
            <div class="small">Categories</div>
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
                            <div class="input-group input-group-sm" style="width: 100px;">
                                <button class="btn btn-outline-secondary">-</button>
                                <input type="text" class="form-control text-center" value="1">
                                <button class="btn btn-outline-secondary">+</button>
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
                            <div class="input-group input-group-sm" style="width: 100px;">
                                <button class="btn btn-outline-secondary">-</button>
                                <input type="text" class="form-control text-center" value="2">
                                <button class="btn btn-outline-secondary">+</button>
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
            <a href="/cart" class="btn btn-primary w-100">
                Go to Cart <i class="mdi mdi-cart"></i>
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



    
    
    {{-- <!-- Category Sidebar -->
    <div class="sidebar-overlay"></div>
    <div class="category-sidebar">
        <div class="p-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Categories</h5>
                <button class="btn btn-link" id="closeSidebar">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
        </div>
        <div class="list-group list-group-flush">
            <div class="list-group-item">
                <div class="d-flex justify-content-between" data-bs-toggle="collapse" href="#electronicsSubmenu">
                    Electronics
                    <i class="mdi mdi-chevron-down"></i>
                </div>
                <div class="collapse" id="electronicsSubmenu">
                    <div class="list-group list-group-flush mt-2">
                        <a href="#" class="list-group-item list-group-item-action">Smartphones</a>
                        <a href="#" class="list-group-item list-group-item-action">Laptops</a>
                        <a href="#" class="list-group-item list-group-item-action">
                            Gaming Laptops
                            <span class="badge bg-danger">Sale</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- More categories -->
        </div>
    </div>
 --}}



    <!-- Main Product Carousel -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item product-carousel active">
                <div style="background-image: url('https://via.placeholder.com/800x400')" class="w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-6">
                                <div class="product-info">
                                    <h2>New iPhone 15 Pro</h2>
                                    <p class="mb-2">Revolutionary camera system with 48MP main camera</p>
                                    <div class="mb-3">
                                        <span class="color-option active" style="background-color: #777;"></span>
                                        <span class="color-option" style="background-color: #fff;"></span>
                                        <span class="color-option" style="background-color: #000;"></span>
                                    </div>
                                    <div>
                                        <span class="h4">$999</span>
                                        <span class="old-price ms-2">$1099</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item product-carousel">
                <div style="background-image: url('https://via.placeholder.com/800x400')" class="w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-6">
                                <div class="product-info">
                                    <h2>New iPhone 15 Pro</h2>
                                    <p class="mb-2">Revolutionary camera system with 48MP main camera</p>
                                    <div class="mb-3">
                                        <span class="color-option active" style="background-color: #777;"></span>
                                        <span class="color-option" style="background-color: #fff;"></span>
                                        <span class="color-option" style="background-color: #000;"></span>
                                    </div>
                                    <div>
                                        <span class="h4">$999</span>
                                        <span class="old-price ms-2">$1099</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item product-carousel">
                <div style="background-image: url('https://via.placeholder.com/800x400')" class="w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-6">
                                <div class="product-info">
                                    <h2>New iPhone 15 Pro</h2>
                                    <p class="mb-2">Revolutionary camera system with 48MP main camera</p>
                                    <div class="mb-3">
                                        <span class="color-option active" style="background-color: #777;"></span>
                                        <span class="color-option" style="background-color: #fff;"></span>
                                        <span class="color-option" style="background-color: #000;"></span>
                                    </div>
                                    <div>
                                        <span class="h4">$999</span>
                                        <span class="old-price ms-2">$1099</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item product-carousel">
                <div style="background-image: url('https://via.placeholder.com/800x400')" class="w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-6">
                                <div class="product-info">
                                    <h2>New iPhone 15 Pro</h2>
                                    <p class="mb-2">Revolutionary camera system with 48MP main camera</p>
                                    <div class="mb-3">
                                        <span class="color-option active" style="background-color: #777;"></span>
                                        <span class="color-option" style="background-color: #fff;"></span>
                                        <span class="color-option" style="background-color: #000;"></span>
                                    </div>
                                    <div>
                                        <span class="h4">$999</span>
                                        <span class="old-price ms-2">$1099</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item product-carousel">
                <div style="background-image: url('https://via.placeholder.com/800x400')" class="w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-6">
                                <div class="product-info">
                                    <h2>New iPhone 15 Pro</h2>
                                    <p class="mb-2">Revolutionary camera system with 48MP main camera</p>
                                    <div class="mb-3">
                                        <span class="color-option active" style="background-color: #777;"></span>
                                        <span class="color-option" style="background-color: #fff;"></span>
                                        <span class="color-option" style="background-color: #000;"></span>
                                    </div>
                                    <div>
                                        <span class="h4">$999</span>
                                        <span class="old-price ms-2">$1099</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More carousel items -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>




    <div id="adssCarousel" class="carousel slide adss-carousel" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#adssCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#adssCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#adssCarousel" data-bs-slide-to="2"></button>
        </div>
    
        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <!-- Carousel Items -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-4">
                        <div class="adss-card">
                            <img src="http://localhost/img/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png" class="w-100">
                            <div class="p-2">
                                <h6 class="mb-1">Special Offer</h6>
                                <small class="text-muted">Up to 50% off</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="adss-card">
                            <img src="http://localhost/img/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png" class="w-100">
                            <div class="p-2">
                                <h6 class="mb-1">New Arrival</h6>
                                <small class="text-muted">Check it out</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="adss-card">
                            <img src="http://localhost/img/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png" class="w-100">
                            <div class="p-2">
                                <h6 class="mb-1">Flash Sale</h6>
                                <small class="text-muted">24h only</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat for more carousel items -->
        </div>
    
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#adssCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#adssCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <script>
        $(document).ready(function() {
            // Quantity Controls
            $('.input-group .btn').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var value = parseInt(input.val());
                
                if($(this).text() === '+') {
                    input.val(value + 1);
                } else if(value > 1) {
                    input.val(value - 1);
                }
            });
            // Mobile Navigation
            $('.nav-item-mobile').click(function(e) {
                $('.nav-item-mobile').removeClass('active');
                $(this).addClass('active');
            });

            // Color Options
            $('.color-option').click(function() {
                $('.color-option').removeClass('active');
                $(this).addClass('active');
            });

        });
    </script>





<div class="product-shower card p-2 my-4 my-w-fit-content">
    <div id="carouselExampleIndicators" class="carousel slide" style="width: 400px; height: 400px;">
        <!-- Carousel Inner -->
        <div class="carousel-inner h-100">
            <div class="carousel-item active" style="height: inherit;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100 zoomable" alt="Slide 1" style="height: inherit;">
            </div>
            <div class="carousel-item" style="height: inherit;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100 zoomable" alt="Slide 2" style="height: inherit;">
            </div>
            <div class="carousel-item" style="height: inherit;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100 zoomable" alt="Slide 3" style="height: inherit;">
            </div>
            <div class="carousel-item" style="height: inherit;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100 zoomable" alt="Slide 4" style="height: inherit;">
            </div>
            <div class="carousel-item" style="height: inherit;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100 zoomable" alt="Slide 5" style="height: inherit;">
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev top-50 my-h-fit-content" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next top-50 my-h-fit-content" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="custom-indicators-container p-2">
        <div class="carousel-indicators custom-indicators m-0" style="position: relative;">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1" style="height: auto; width: 80px;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100" alt="Slide 1">
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" style="height: auto; width: 80px;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100" alt="Slide 2">
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" style="height: auto; width: 80px;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100" alt="Slide 3">
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4" style="height: auto; width: 80px;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100" alt="Slide 4">
            </button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5" style="height: auto; width: 80px;">
                <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="d-block w-100" alt="Slide 5">
            </button>
        </div>
    </div>
</div>
<style>

    /* Custom Indicators Container */
    .product-shower .custom-indicators-container {
        width: 400px; /* Match the width of the carousel */
        margin-top: 10px; /* Space between carousel and indicators */
    }

    /* Custom Indicators */
    .product-shower .custom-indicators {
        display: flex;
        justify-content: center;
        gap: 10px; /* Space between indicator images */
        padding: 0;
        margin: 0;
    }

    /* Indicator Buttons */
    .product-shower .custom-indicators button {
        padding: 0;
        border: none;
        background: none;
        width: 80px; /* Adjust width as needed */
        height: 50px; /* Adjust height as needed */
        overflow: hidden;
        position: relative;
        display: none; /* Hide all indicators by default */
    }

    /* Indicator Images */
    .product-shower .custom-indicators button img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }

    /* Dark Transparent Overlay for Inactive Images */
    .product-shower .custom-indicators button:not(.active) img {
        opacity: 0.5; /* Darken inactive images */
        filter: brightness(0.5); /* Add dark overlay */
    }

    /* Active Image (No Overlay) */
    .product-shower .custom-indicators button.active img {
        opacity: 1;
        filter: brightness(1); /* No overlay for active image */
    }
    /* Base styles for zoomable images */
    .product-shower .carousel-item img.zoomable {
        transition: transform 0.3s ease-in-out, transform-origin 0.1s ease-in-out; /* Smooth zoom and origin adjustment */
        transform-origin: center center; /* Default origin */
    }

    .product-shower .carousel-item.active img.zoomable:hover {
        transform: scale(2); /* Zoom level */
        cursor: crosshair; /* Visual cue for zooming */
    }

</style>

<script>
    const productShower = document.querySelector('.product-shower');

    if (productShower) {
        // Select elements inside the parent
        const carousel = productShower.querySelector('#carouselExampleIndicators');
        const customIndicators = productShower.querySelectorAll('.custom-indicators button');
        const carouselItems = productShower.querySelectorAll('.carousel-item');

        // Function to update visible indicators
        const updateIndicators = (activeIndex) => {
            // Hide all indicators
            customIndicators.forEach((indicator) => {
                indicator.style.display = 'none';
            });

            // Show the active indicator and its neighbors
            if (activeIndex > 0) {
                customIndicators[activeIndex - 1].style.display = 'block'; // Left neighbor
            }
            customIndicators[activeIndex].style.display = 'block'; // Active indicator
            if (activeIndex < customIndicators.length - 1) {
                customIndicators[activeIndex + 1].style.display = 'block'; // Right neighbor
            }

            // Remove the 'active' class from all indicators
            customIndicators.forEach((indicator) => {
                indicator.classList.remove('active');
            });

            // Add the 'active' class to the current indicator
            customIndicators[activeIndex].classList.add('active');
        };

        // Initialize indicators based on the current active slide
        const initActiveIndicator = () => {
            const activeItemIndex = [...carouselItems].findIndex((item) =>
                item.classList.contains('active')
            );
            if (activeItemIndex !== -1) {
                updateIndicators(activeItemIndex);
            }
        };

        // Initialize the active indicator on page load
        initActiveIndicator();

        // Update indicators on carousel slide
        carousel.addEventListener('slide.bs.carousel', (event) => {
            const activeIndex = event.to; // Get the index of the new active slide
            updateIndicators(activeIndex);
        });


        const carouselInner = carousel.querySelector('.carousel-inner');

        // Function to initialize zoom and move functionality
        function initializeZoom(image) {
            if (!image) return;

            image.addEventListener('mousemove', (e) => {
                const { offsetX, offsetY, target } = e;
                const { offsetWidth, offsetHeight } = target;

                // Calculate the position of the mouse relative to the image
                const xPercent = (offsetX / offsetWidth) * 100;
                const yPercent = (offsetY / offsetHeight) * 100;

                // Set transform-origin based on mouse position
                image.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            });

            image.addEventListener('mouseenter', () => {
                image.style.transform = 'scale(2)'; // Zoom in
                image.style.transition = 'transform 0.3s ease'; // Smooth zoom transition
            });

            image.addEventListener('mouseleave', () => {
                image.style.transform = 'scale(1)'; // Reset zoom
            });
        }

        // Apply zoom functionality to the active image
        function applyZoomToActiveImage() {
            // Find the currently active carousel item
            const activeItem = carouselInner.querySelector('.carousel-item.active');
            const activeImage = activeItem ? activeItem.querySelector('img') : null;

            // Remove previous event listeners and reinitialize zoom
            carouselInner.querySelectorAll('img').forEach((img) => {
                img.style.transform = 'scale(1)'; // Reset zoom
                img.onmousemove = null;
                img.onmouseenter = null;
                img.onmouseleave = null;
            });

            // Initialize zoom for the new active image
            initializeZoom(activeImage);
        }

        // Event listener for when the carousel finishes sliding
        carousel.addEventListener('slid.bs.carousel', applyZoomToActiveImage);

        // Initialize zoom for the first active image
        applyZoomToActiveImage();
    }


</script>






{{-- <div class="sponsors-bar-container my-5">
    <div class="sponsors-bar">
        <!-- Sponsor Icons -->
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 1">
        </div>
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 2">
        </div>
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 3">
        </div>
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 4">
        </div>
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 5">
        </div>
        <div class="sponsor-icon">
            <img src="http://localhost/img/icons/blogger-svgrepo-com.svg" alt="Sponsor 6">
        </div>
    </div>
</div>

<style>
    /* Sponsors Bar Container */
.sponsors-bar-container {
    overflow: hidden; /* Hide overflow to create seamless scrolling */
    white-space: nowrap; /* Prevent wrapping of icons */
    width: 100%;
    background-color: #f8f9fa; /* Light background for the bar */
    padding: 20px 0;
}

/* Sponsors Bar */
.sponsors-bar {
    display: inline-block;
    animation: scroll 20s linear infinite; /* Animation for scrolling */
}

/* Sponsor Icons */
.sponsor-icon {
    display: inline-block;
    margin: 0 20px; /* Space between icons */
    transition: transform 0.3s ease, filter 0.3s ease; /* Smooth hover effects */
}

.sponsor-icon img {
    width: 40px; /* Adjust size as needed */
    height: auto;
    filter: grayscale(100%); /* Make icons grayscale by default */
    transition: filter 0.3s ease; /* Smooth transition for hover effect */
}

/* Hover Effect */
.sponsor-icon:hover img {
    filter: grayscale(0%); /* Show full color on hover */
    transform: scale(1.1); /* Slightly enlarge the icon */
}

/* Animation Keyframes */
@keyframes scroll {
    0% {
        transform: translateX(0); /* Start from the right */
    }
    100% {
        transform: translateX(-50%); /* Move to the left */
    }
}
.sponsors-bar-container:hover .sponsors-bar {
    animation-play-state: paused;
}
</style> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all product cards
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach((card) => {
            const rating = card.querySelector('.rating');
            const titlePrice1 = card.querySelector('.title-price-1');
            const titlePrice2 = card.querySelector('.title-price-2');
            const quantityControls = card.querySelector('.quantity-controls');
            const cartActions = card.querySelector('.cart-actions');
            const plusBtn = card.querySelector('.plus-btn');
            const minusBtn = card.querySelector('.minus-btn');
            const quantityInput = card.querySelector('.quantity-input');
            const cartBtn = card.querySelector('.cart-btn');
            const goToCartBtn = card.querySelector('.go-to-cart-btn');
            const deleteBtn = card.querySelector('.delete-btn');

            if (!(rating || titlePrice1 || titlePrice2 || quantityControls || cartActions || cartActions || plusBtn || minusBtn 
                || cartBtn || goToCartBtn || deleteBtn
            )) {
                return false;
            }

            titlePrice2.style.setProperty('display', 'none', 'important');

            // Plus Button Click
            plusBtn.addEventListener('click', () => {
                // Hide rating and first title-price
                rating.style.display = 'none';
                // titlePrice1.style.display = 'none';
                titlePrice1.style.setProperty('display', 'none', 'important');

                // Show second title-price and quantity controls
                // titlePrice2.style.display = 'flex';
                titlePrice2.style.removeProperty('display');

                quantityControls.style.display = 'flex';
            });

            // Minus Button Click
            minusBtn.addEventListener('click', () => {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    // Show plus button if value is less than max
                    if (currentValue - 1 < 10) {
                        quantityControls.querySelector('.plus-btn').style.display = 'block';
                    }
                } else {
                    // Reset to initial state if quantity is 0
                    quantityControls.style.display = 'none';
                    cartActions.style.display = 'none';
                    rating.style.display = 'block';
                    // titlePrice1.style.display = 'flex';
                    titlePrice1.style.removeProperty('display');
                    // titlePrice2.style.display = 'none';
                    titlePrice2.style.setProperty('display', 'none', 'important');

                }
            });

            // Plus Button in Quantity Controls
            quantityControls.querySelector('.plus-btn').addEventListener('click', () => {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue < 10) {
                    quantityInput.value = currentValue + 1;
                    // Hide plus button if value reaches max
                    if (currentValue + 1 === 10) {
                        quantityControls.querySelector('.plus-btn').style.display = 'none';
                    }
                }
            });

            // Cart Button Click
            cartBtn.addEventListener('click', () => {
                // Hide quantity controls and second title-price
                quantityControls.style.display = 'none';
                // titlePrice2.style.display = 'none';
                titlePrice1.style.setProperty('display', 'none', 'important');
                titlePrice2.style.removeProperty('display');

                // Show Go To Cart and Delete buttons
                cartActions.style.display = 'flex';
            });

            // Delete Button Click
            deleteBtn.addEventListener('click', () => {
                // Reset to initial state
                cartActions.style.display = 'none';
                quantityControls.style.display = 'none';
                rating.style.display = 'block';
                // titlePrice1.style.display = 'flex';
                titlePrice1.style.removeProperty('display');
                titlePrice2.style.setProperty('display', 'none', 'important');
                quantityInput.value = 1;
                // Ensure plus button is visible
                quantityControls.querySelector('.plus-btn').style.display = 'block';
            });
        });
    });
</script>



<div class="categories-container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ __('Popular Categories') }}</h2>
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                <li class="page-item mx-1">
                    <a class="page-link btn btn-icon text-warning border-warning" href="#categoriesCarousel" role="button" data-bs-slide="prev">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item mx-1">
                    <a class="page-link btn btn-icon text-warning border-warning" href="#categoriesCarousel" role="button" data-bs-slide="next">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="categoriesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Carousel Item 1 -->
            <div class="carousel-item active" data-bs-interval="5000">
                <div class="row">
                    <!-- Category 1 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Fashion</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 2 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Beauty</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 3 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Book</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 4 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Furniture</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 5 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Toys</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 6 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Sports</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 7 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Home & Kitchen</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 8 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Electronics</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Item 2 -->
            <div class="carousel-item" data-bs-interval="5000">
                <div class="row">
                    <!-- Category 9 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Toys</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 10 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Sports</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 11 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Home & Kitchen</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 12 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Electronics</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 13 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Toys</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 14 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Sports</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 15 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Home & Kitchen</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                    <!-- Category 16 -->
                    <div class="category-card col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                        <div class="card p-2 position-relative d-flex flex-row align-items-center">
                            <img src="http://localhost/img/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="category-image rounded me-3" alt="Category 2" style="width: 90px;">
                            <div class="card-body px-1 pb-0 text-start">
                                <h5 class="card-title mb-0">Electronics</h5>
                                <p class="text-muted mb-0">200+ Products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more carousel items as needed -->
        </div>
    </div>
</div>

<div class="products-container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ __('Popular Products') }}</h2>
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                <li class="page-item mx-1">
                    <a class="page-link btn btn-icon text-warning border-warning" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item mx-1">
                    <a class="page-link btn btn-icon text-warning border-warning" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Carousel Item 1 -->
            <div class="carousel-item active" data-bs-interval="5000">
                <div class="row">
                    <!-- Card 1 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png'
                    ]" />
                    <!-- Card 2 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Watch%20Series%203%20Nike.png'
                    ]" /> 
                    <!-- Card 3 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png'
                    ]" /> 
                    <!-- Card 4 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => asset('assets/img/photos/foods/tasty-burger-with-bacon-2021-08-27-18-32-01-utc 1.png') 
                    ]" /> 
                </div>
            </div>
            <!-- Carousel Item 2 -->
            <div class="carousel-item" data-bs-interval="5000">
                <div class="row">
                    <!-- Card 1 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png'
                    ]" />
                    <!-- Card 2 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Watch%20Series%203%20Nike.png'
                    ]" /> 
                    <!-- Card 3 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png'
                    ]" /> 
                    <!-- Card 4 -->
                    <x-product-card :product="[
                        'name' => 'Beef Burger',
                        'price' => '5.59',
                        'image' => asset('assets/img/photos/foods/tasty-burger-with-bacon-2021-08-27-18-32-01-utc 1.png') 
                    ]" /> 
                </div>
            </div>
            <!-- Add more carousel items as needed -->
        </div>
    </div>
</div>


<div class="products-container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ __('All Products') }}</h2>
    </div>
    <div class="row">
        <!-- Card 1 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png'
        ]" /> 
        <!-- Card 2 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/Watch%20Series%203%20Nike.png'
        ]" /> 
        <!-- Card 3 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png'
        ]" /> 
        <!-- Card 4 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/pc/%D8%B4%D8%A7%D8%AD%D9%86%20%D8%A8%D8%B7%D8%A7%D8%B1%D9%8A%D8%A9%20%D9%85%D9%83%D8%A8%D8%B1%20%D8%B5%D9%88%D8%AA%20%D9%84%D8%A7%D8%B3%D9%84%D9%83%D9%8A%20%D9%85%D9%83%D8%A8%D8%B1%20%D8%B5%D9%88%D8%AA.png'
        ]" /> 
        <!-- Card 5 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/clothes/%D8%B3%D8%AA%D8%B1%D8%A9%20%D8%A7%D9%84%D8%B1%D9%85%D8%B2%20%D8%A7%D9%84%D8%A8%D8%B1%D9%8A%D8%AF%D9%8A%20%D8%A7%D9%84%D8%A3%D8%B3%D9%88%D8%AF%20%D9%88%D8%A7%D9%84%D8%A3%D8%AD%D9%85%D8%B1.png'
        ]" /> 
        <!-- Card 6 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/clothes/%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%85%D8%B9%D8%B7%D9%81%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%88%D8%A7%D9%82%D9%8A%D8%A9%20%D9%85%D9%84%D8%A7%D8%A8%D8%B3%20%D8%A7%D9%84%D8%A3%D8%B7%D9%81%D8%A7%D9%84.png'
        ]" /> 
        
        <!-- Card 7 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/clothes/%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D9%85%D9%84%D8%A7%D8%A8%D8%B3%20%D8%A7%D9%84%D8%B7%D9%81%D9%84%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%85%D8%B9%D8%B7%D9%81%20%D9%88%D8%A7%D9%82%20%D9%85%D9%86%20%D8%A7%D9%84%D9%85%D8%B7%D8%B1.png'
        ]" /> 
        <!-- Card 8 -->
        <x-product-card :product="[
            'name' => 'Beef Burger',
            'price' => '5.59',
            'image' => (url('/') == 'http://dashboard.test' ? 'http://localhost/img' : 'https://img.sadeem-labs.com') . '/clothes/%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D9%87%D9%8A%D9%84%D9%8A%20%D9%87%D8%A7%D9%86%D8%B3%D9%86.png'
        ]" /> 
    </div>
    <div class="row d-flex justify-content-center">
        <button class="btn btn-warning text-white my-w-fit-content">
            <i class="mdi mdi-cart-outline me-2 text-white"></i>
            {{ __('View All') }}
        </button>
    </div>
</div>


<style>
    .products-container .product-card .product-image {
        object-fit: contain;
        height: 202px;           
        width: 100%;           
    }
</style>



<script>
document.getElementById('plus').addEventListener('click', function() {
    var count = document.getElementById('count');
    count.value = parseInt(count.value) + 1;
    if (count.value > 1) {
        document.getElementById('minus').firstChild.classList.remove('d-none');
    }
});

document.getElementById('minus').addEventListener('click', function() {
    var count = document.getElementById('count');
    count.value = parseInt(count.value) - 1;
    if (count.value <= 1) {
        document.getElementById('minus').firstChild.classList.add('d-none');
    }
});

</script>
@endsection


@extends('layouts.store')

@php
    // $isNavbar = false;
    // $isSidebar = false;
    // $isFooter = false;
    // $isContainer = false;
@endphp

@section('title', __('Store'))

@section('content')

    {{-- <style>
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
    </style> --}}








    <!-- Main Product Carousel -->
    {{-- <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
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
    </div> --}}




    {{-- <div id="adssCarousel" class="carousel slide adss-carousel" data-bs-ride="carousel">
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
    </div> --}}


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


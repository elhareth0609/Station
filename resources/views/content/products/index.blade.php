@extends('layouts.store')

@php
    // $isNavbar = false;
    // $isSidebar = false;
    // $isFooter = false;
    // $isContainer = false;
@endphp

@section('title', __('Product View'))

@section('content')
<style>
    /* Product details styles */
    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        margin-right: 10px;
        border: 2px solid #ddd;
    }
    
    .color-option.active {
        border-color: #000;
    }

        /* Custom Indicators Container */
    .product-shower .custom-indicators-container {
        /* width: 400px; //Match the width of the carousel */
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
        object-fit: contain;
    }

    .product-shower .carousel-item.active img.zoomable:hover {
        transform: scale(2); /* Zoom level */
        cursor: crosshair; /* Visual cue for zooming */
    }

    .nav-pills .nav-link {
        color: #6c757d;
        background-color: #f8f9fa;
        margin-right: 10px;
        border-radius: 20px;
    }

    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }

    .comment {
        border-left: 3px solid #0d6efd;
        margin-bottom: 20px;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #6c757d;
    }

    .comment-form {
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    .products-container .product-card .product-image {
        object-fit: contain;
        height: 202px;           
        width: 100%;           
    }
    .breadcrumb-item + .breadcrumb-item::before {
      font-family: "Material Design Icons";
      content: "\F0142";
      color: #6c757d;
    }

</style>


<!-- Breadcrumbs -->
<nav class="container mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item fw-bold">
        <i class="mdi mdi-home text-warning"></i>
        <a href="{{ route('home') }}">Home</a>
      </li>
      <li class="breadcrumb-item fw-bold">
        <i class="mdi mdi-folder text-warning"></i>
        <a href="{{ route('category.view', ['id' => 1]) }}">Category</a>
      </li>
      <li class="breadcrumb-item fw-bold active">
        <i class="mdi mdi-package text-warning"></i>
        Product Name
      </li>
    </ol>
  </nav>


<!-- Main Product Section -->
<div class="container">
    <div class="row">
        <!-- Product Details (Left Side) -->
        <div class="col-lg-6">
            <h1 class="h2 mb-4">Product Name</h1>
            
            <!-- Rating -->
            <div class="mb-3 d-flex">
                <div class="text-warning my-w-fit-content">
                    <small class="mdi mdi-star"></small>
                    <small class="mdi mdi-star"></small>
                    <small class="mdi mdi-star"></small>
                    <small class="mdi mdi-star"></small>
                    <small class="mdi mdi-star-outline"></small>
                </div>
                <span class="ms-2">(4.0/5) - 123 Reviews</span>
            </div>

            <!-- Price -->
            <div class="mb-4 d-flex align-items-baseline">
                <h2 class="h4 mb-0">$299.99</h2>
                <del class="ms-1">$299.99</del>
            </div>

            <!-- Color Options -->
            <div class="mb-4">
                <h3 class="h6 mb-3">Available Colors :</h3>
                <div class="d-flex">
                    <div class="color-option active" style="background-color: #000000;"></div>
                    <div class="color-option" style="background-color: #FFFFFF;"></div>
                    <div class="color-option" style="background-color: #C0C0C0;"></div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <h3 class="h6 mb-3">Product Description :</h3>
                <p class="text-muted">
                    This is a detailed description of the product. It highlights the key features, benefits, and specifications. 
                    For example, this product is made with high-quality materials, offers excellent durability, and comes with a 
                    one-year warranty. It is perfect for everyday use and designed to meet your needs.
                </p>
            </div>

            <!-- Quantity Controls and Buttons -->
            <div class="d-flex justify-content-between mb-2 quantity-controls">
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
                    <button class="btn btn-outline-warning d-flex mx-1 cart-btn">
                        <i class="mdi mdi-cart-plus"></i>
                        <label class="ms-1 d-none d-lg-flex d-md-flex">Add to Cart</label>
                    </button>
                </div>
                <div class="my-w-fit-content">
                    <button class="btn btn-icon btn-outline-warning">
                        <i class="mdi mdi-heart-outline"></i>
                    </button>
                    <button class="btn btn-icon btn-outline-warning">
                        <i class="mdi mdi-share-outline"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- Product Shower (Right Side) -->
        <div class="col-lg-6">
            <!-- Your existing product-shower code goes here -->
            <div class="product-shower card p-2">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" style="height: 400px;">
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
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="mt-5">
        <ul class="nav nav-pills mb-4" id="productTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="information-tab" data-bs-toggle="tab" href="#information" role="tab">Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="seller-tab" data-bs-toggle="tab" href="#seller" role="tab">Seller</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="comments-tab" data-bs-toggle="tab" href="#comments" role="tab">Comments</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabsContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel">
                <p>Detailed product description goes here...</p>
            </div>
            <div class="tab-pane fade" id="information" role="tabpanel">
                <p>Product information and specifications...</p>
            </div>
            <div class="tab-pane fade" id="seller" role="tabpanel">
                <p>Seller information and details...</p>
            </div>
            <div class="tab-pane fade" id="comments" role="tabpanel">
                <!-- Comments Section -->
                <div class="comments-section">
                    <!-- New Comment Form -->
                    <div class="comment-form p-4 mb-4">
                        <h4 class="mb-3">Leave a Comment</h4>
                        <form>
                            <div class="mb-3">
                                <label for="commentName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="commentName" required>
                            </div>
                            <div class="mb-3">
                                <label for="commentEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="commentEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="commentRating" class="form-label">Rating</label>
                                <select class="form-select" id="commentRating" required>
                                    <option value="">Select rating</option>
                                    <option value="5">5 stars</option>
                                    <option value="4">4 stars</option>
                                    <option value="3">3 stars</option>
                                    <option value="2">2 stars</option>
                                    <option value="1">1 star</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="commentText" class="form-label">Your Comment</label>
                                <textarea class="form-control" id="commentText" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>

                    <!-- Example Comments -->
                    <div class="comment p-3 bg-light">
                        <div class="d-flex">
                            <div class="user-avatar me-3">JD</div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-1">John Doe</h5>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div class="mb-2">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <p>Great product! The quality exceeded my expectations. I especially love the design and how comfortable it is to use. Would definitely recommend to others.</p>
                            </div>
                        </div>
                    </div>

                    <div class="comment p-3 bg-light mt-3">
                        <div class="d-flex">
                            <div class="user-avatar me-3">MS</div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-1">Maria Smith</h5>
                                    <small class="text-muted">1 week ago</small>
                                </div>
                                <div class="mb-2">
                                    <span class="stars">★★★★☆</span>
                                </div>
                                <p>Very satisfied with my purchase. The only minor issue was the delivery time, but the product itself is fantastic. The battery life is impressive, and the features are exactly as described.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<script>
    // Quantity buttons functionality

    // Color selection functionality
    document.querySelectorAll('.color-option').forEach(color => {
        color.addEventListener('click', () => {
            document.querySelectorAll('.color-option').forEach(c => c.classList.remove('active'));
            color.classList.add('active');
        });
    });

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
@endsection
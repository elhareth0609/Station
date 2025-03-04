
@extends('layouts.app')

@section('title', __('Cards'))

@section('content')

    <div class="card-container mt-4">
        <div class="row g-3">
            <!-- Total Users Card -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-anime="fade-up" data-anime-delay="100">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total User</p>
                                    <h3 class="mb-2" counter-number="40689">0</h3>
                                </div>
                                <div class="card-icon bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-account text-primary fs-4"></i>
                                </div>
                            </div>
                            <div class="stat-change text-success my-fs-7">
                                <i class="mdi mdi-trending-up fs-6"></i>
                                8.5% Up from yesterday
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-anime="fade-up" data-anime-delay="200">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Order</p>
                                    <h3 class="mb-2" counter-number="10293">0</h3>
                                </div>
                                <div class="card-icon bg-warning bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-package text-warning fs-4"></i>
                                </div>
                            </div>
                            <div class="stat-change text-success my-fs-7">
                                <i class="mdi mdi-trending-up fs-6"></i>
                                1.3% Up from past week
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Sales Card -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-anime="fade-up" data-anime-delay="300">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Sales</p>
                                    <h3 class="mb-2" counter-number="89000" counter-prefix="$">$0</h3>
                                </div>
                                <div class="card-icon bg-success bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-chart-line text-success fs-4"></i>
                                </div>
                            </div>
                            <div class="stat-change text-danger my-fs-7">
                                <i class="mdi mdi-trending-down fs-6"></i>
                                4.3% Down from yesterday
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Pending Card -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-anime="fade-up" data-anime-delay="400">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Pending</p>
                                    <h3 class="mb-2" counter-number="2040">0</h3>
                                </div>
                                <div class="card-icon bg-danger bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-clock-outline text-danger fs-4"></i>
                                </div>
                            </div>
                            <div class="stat-change text-success my-fs-7">
                                <i class="mdi mdi-trending-up fs-6"></i>
                                1.8% Up from yesterday
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>{{ __('Hi') }}, {{ Auth::user()->full_name }}!</h1>
                <p class="text-secondary">{{ __("You've some tasks to do today!") }}</p>
            </div>
            <button class="btn border" style="color: #1B1B1B;">
                <i class="mdi mdi-filter"></i> Filter
            </button>
        </div>

        <div class="row">
            <!-- Task Card -->
            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                <div class="card card rounded-4 p-3 border">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center btn-icon rounded-pill bg-primary bg-opacity-10">
                            <i class="mdi mdi-checkbox-marked-circle text-primary"></i>
                        </div>
                        <h5 class="ms-3 mb-0">{{ __('Task to complete') }}</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-0">15<span class="fs-4 text-secondary">/20</span></h1>
                        <a href="#" class="text-secondary">See all</a>
                    </div>
                </div>
            </div>

            <!-- Completion Rate Card -->
            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                <div class="card card rounded-4 p-3 border">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center btn-icon rounded-pill bg-success bg-opacity-10">
                            <i class="mdi mdi-chart-line text-success"></i>
                        </div>
                        <h5 class="ms-3 mb-0">{{ __('Completion rate') }}</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-0">95</h1><span class="fs-4 text-secondary">%</span>
                        <a href="#" class="text-secondary">See all</a>
                    </div>
                </div>
            </div>

            <!-- Projects Card -->
            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                <div class="card card rounded-4 p-3 border">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center btn-icon rounded-pill bg-warning bg-opacity-10" style="background: #DEE3FF;">
                            <i class="mdi mdi-folder-outline text-warning"></i>
                        </div>
                        <h5 class="ms-3 mb-0">{{ __('Projects') }}</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-0">5<span class="fs-4 text-secondary"> projects</span></h1>
                        <a href="#" class="text-secondary">See all</a>
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
                        <a class="page-link btn btn-icon text-warning border-warning" href="#">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item mx-1">
                        <a class="page-link btn btn-icon text-warning border-warning" href="#">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="product-card col-lg-3 col-md-6 mb-4">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-cart-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="product-card col-lg-3 col-md-6 mb-4">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/Watch%20Series%203%20Nike.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="product-card col-lg-3 col-md-6 mb-4">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="product-card col-lg-3 col-md-6 mb-4">
                <div class="card h-100 p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <i class="mdi mdi-heart position-absolute fs-5 text-warning" style="right: 10px;"></i>
                    <img src="{{ asset('assets/img/photos/foods/tasty-burger-with-bacon-2021-08-27-18-32-01-utc 1.png') }}" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        {{-- <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div> --}}
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-icon btn-warning text-white w-20" id="minus">
                                <i class="mdi mdi-minus"></i>
                            </div>
                            <input type="number" class="form-control text-center mx-2 w-75" value="1" min="1" max="10" id="count">
                            <div class="btn btn-icon btn-warning text-white w-20" id="plus">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <div class="products-container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" data-anime="fade-down">{{ __('All Products') }}</h2>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="100">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/Apple%20Watch%20Series%202%20Apple%20Watch%20Series%203%20Nike.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-cart-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="200">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/Watch%20Series%203%20Nike.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="300">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/%D9%88%D8%AD%D8%AF%D8%A9%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9%20-%20%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA%20%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1%20&%20%D8%A7%D9%84%D8%B9%D9%84%D8%A8%2080%20Plus%20ATX%20%D9%85%D8%AD%D9%88%D9%84%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B7%D8%A7%D9%82%D8%A9.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="400">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/pc/%D8%B4%D8%A7%D8%AD%D9%86%20%D8%A8%D8%B7%D8%A7%D8%B1%D9%8A%D8%A9%20%D9%85%D9%83%D8%A8%D8%B1%20%D8%B5%D9%88%D8%AA%20%D9%84%D8%A7%D8%B3%D9%84%D9%83%D9%8A%20%D9%85%D9%83%D8%A8%D8%B1%20%D8%B5%D9%88%D8%AA.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="500">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/clothes/%D8%B3%D8%AA%D8%B1%D8%A9%20%D8%A7%D9%84%D8%B1%D9%85%D8%B2%20%D8%A7%D9%84%D8%A8%D8%B1%D9%8A%D8%AF%D9%8A%20%D8%A7%D9%84%D8%A3%D8%B3%D9%88%D8%AF%20%D9%88%D8%A7%D9%84%D8%A3%D8%AD%D9%85%D8%B1.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="600">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/clothes/%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%85%D8%B9%D8%B7%D9%81%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%88%D8%A7%D9%82%D9%8A%D8%A9%20%D9%85%D9%84%D8%A7%D8%A8%D8%B3%20%D8%A7%D9%84%D8%A3%D8%B7%D9%81%D8%A7%D9%84.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 7 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="700">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/clothes/%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D9%85%D9%84%D8%A7%D8%A8%D8%B3%20%D8%A7%D9%84%D8%B7%D9%81%D9%84%20%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%85%D8%B9%D8%B7%D9%81%20%D9%88%D8%A7%D9%82%20%D9%85%D9%86%20%D8%A7%D9%84%D9%85%D8%B7%D8%B1.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 8 -->
            <div class="product-card col-lg-3 col-md-6 mb-4" data-anime="fade-up" data-anime-delay="800">
                <div class="card p-2 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <button class="btn btn-white position-absolute my-w-fit-content border-0" style="right: 10px;position: absolute!important;"><i class="mdi mdi-heart-outline fs-5 text-secondary"></i></button>
                    <img src="https://img.sadeem-labs.com/clothes/%D8%B3%D8%AA%D8%B1%D8%A9%20%D9%87%D9%88%D8%AF%D9%8A%D9%8A%20%D9%87%D9%8A%D9%84%D9%8A%20%D9%87%D8%A7%D9%86%D8%B3%D9%86.png" class="product-image card-img-top rounded" alt="Beef Burger">

                    <div class="card-body px-1 pb-0 text-start">
                        <div class="text-warning">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-outline"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Beef Burger</h5>
                                <p class="fw-bold text-warning mb-0 fs-4">$5.59</p>
                            </div>
                            <div class="btn btn-icon btn-warning text-white">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <button class="btn btn-warning text-white my-w-fit-content">
                <i class="mdi mdi-cart-outline me-2 text-white"></i>
                {{ __('View All') }}
            </button>
        </div>
    </div>



    
    <div class="contacts-container mt-5">
        <div class="d-flex mb-4">
            <h2 class="fw-bold">{{ __('Contacts') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card text-center p-3">
                    <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Angela Moss" class="avatar mx-auto rounded-4">
                    <h5 class="mt-3">Angela Moss</h5>
                    <p class="text-muted">Marketing Manager at <a href="#" class="text-primary">Highspeed Studios</a></p>
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-phone fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">+12 345 6789 0</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="mdi mdi-email fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">angelamoss@mail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card text-center p-3">
                    <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Angela Moss" class="avatar mx-auto rounded-4">
                    <h5 class="mt-3">Angela Moss</h5>
                    <p class="text-muted">Marketing Manager at <a href="#" class="text-primary">Highspeed Studios</a></p>
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-phone fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">+12 345 6789 0</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="mdi mdi-email fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">angelamoss@mail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card text-center p-3">
                    <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Angela Moss" class="avatar mx-auto rounded-4">
                    <h5 class="mt-3">Angela Moss</h5>
                    <p class="text-muted">Marketing Manager at <a href="#" class="text-primary">Highspeed Studios</a></p>
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-phone fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">+12 345 6789 0</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="mdi mdi-email fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">angelamoss@mail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="card text-center p-3">
                    <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Angela Moss" class="avatar mx-auto rounded-4">
                    <h5 class="mt-3">Angela Moss</h5>
                    <p class="text-muted">Marketing Manager at <a href="#" class="text-primary">Highspeed Studios</a></p>
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-phone fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">+12 345 6789 0</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="mdi mdi-email fs-5 px-1 text-primary bg-primary-subtle rounded-3"></i>
                        <span class="ms-2 fw-medium overflow-auto">angelamoss@mail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        .crypto-card {
            background: white;
            border: none;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .crypto-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .crypto-icon {
            width: 40px;
            height: 40px;
            background: #ecefff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .eth-icon {
            color: #627EEA;
        }
        
        .crypto-name {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.2rem;
        }
        
        .crypto-amount {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .crypto-price {
            font-weight: 600;
            color: #212529;
        }
        
        .price-change {
            color: #28a745;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>



        <div class="row my-3">
            <div class="col-md-6 col-lg-4">
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Ethereum</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Ethereum</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Avax</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Matic</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Ethereum</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Avax</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Avax</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Matic</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Ethereum</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Ethereum</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Avax</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
                <div class="crypto-card d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="crypto-icon">
                            <i class="eth-icon mdi mdi-ethereum"></i>
                        </div>
                        <div>
                            <div class="crypto-name">Matic</div>
                            <div class="crypto-amount">1.02 ETH</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="crypto-price">$404.18</div>
                        <div class="price-change">+$24.50</div>
                    </div>
                </div>
            </div>
        </div>

    <style>
        .products-container .product-card .product-image {
            object-fit: contain;
            height: 202px;           
            width: 100%;           
        }
        .contacts-container .avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .card-container .card-icon {
            width: 48px;
            height: 48px;
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


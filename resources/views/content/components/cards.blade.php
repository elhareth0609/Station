
@extends('layout.app')

@section('title', __('Cards'))

@section('content')

    <div class="card-container mt-4">
        <div class="row g-3">
            <!-- Total Users Card -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total User</p>
                                    <h3 class="mb-2">40,689</h3>
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
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Order</p>
                                    <h3 class="mb-2">10293</h3>
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
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Sales</p>
                                    <h3 class="mb-2">$89,000</h3>
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
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1">Total Pending</p>
                                    <h3 class="mb-2">2040</h3>
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
                <h1>{{ __('Hi') }}, Admin!</h1>
                <p class="text-secondary">{{ __("You've some tasks to do today!") }}</p>
            </div>
            <button class="btn border" style="color: #1B1B1B;">
                <i class="mdi mdi-filter"></i> Filter
            </button>
        </div>

        <div class="row">
            <!-- Task Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card rounded-4 p-3 m-2 border">
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
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card rounded-4 p-3 m-2 border">
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center btn-icon rounded-pill bg-success bg-opacity-10">
                            <i class="mdi mdi-chart-line text-success"></i>
                        </div>
                        <h5 class="ms-3 mb-0">{{ __('Completion rate') }}</h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-0">95<span class="fs-4 text-secondary">%</span></h1>
                        <a href="#" class="text-secondary">See all</a>
                    </div>
                </div>
            </div>

            <!-- Projects Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card rounded-4 p-3 m-2 border">
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
            <h2 class="fw-bold">{{ __('Popular Dishes') }}</h2>
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
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card p-3 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <i class="mdi mdi-heart-outline position-absolute fs-5 text-secondary" style="right: 10px;"></i>
                    <img src="{{ asset('assets/img/photos/foods/burger-2021-08-26-18-18-28-utc 1.png') }}" class="card-img-top rounded" alt="Beef Burger">

                    <div class="card-body pb-0 text-start">
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
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card p-3 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <i class="mdi mdi-heart-outline position-absolute fs-5 text-secondary" style="right: 10px;"></i>
                    <img src="{{ asset('assets/img/photos/foods/fresh-tasty-burger-2021-08-29-04-51-34-utc 1.png') }}" class="card-img-top rounded" alt="Beef Burger">

                    <div class="card-body pb-0 text-start">
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
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 p-3 position-relative">
                    <div class="position-absolute fs-6 bg-danger text-white rounded" style="padding: 2px 8px;">15% Off</div>
                    <i class="mdi mdi-heart position-absolute fs-5 text-warning" style="right: 10px;"></i>
                    <img src="{{ asset('assets/img/photos/foods/tasty-burger-with-bacon-2021-08-27-18-32-01-utc 1.png') }}" class="card-img-top rounded" alt="Beef Burger">

                    <div class="card-body pb-0 text-start">
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


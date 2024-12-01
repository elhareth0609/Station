@extends('layout.app')

@section('title', __('Pricing'))

@section('content')

    <h1 class="h3 mb-4 text-gray-800">{{ __('Pricing') }}</h1>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card pricing-card h-100 border rounded-3">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Basic</h5>
                    <p class="card-text mb-4">Monthly Charge</p>
                    <p class="price fs-1 fw-bold text-primary mb-4">$14.99</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">Free Setup</li>
                        <li class="mb-2">Bandwidth Limit 10 GB</li>
                        <li class="mb-2">20 User Connection</li>
                        <li class="mb-2 text-gray-400">Analytics Report</li>
                        <li class="mb-2 text-gray-400">Public API Access</li>
                        <li class="mb-2 text-gray-400">Plugins Integration</li>
                        <li class="mb-2 text-gray-400">Custom Content Management</li>
                    </ul>
                    <div class="mt-auto">
                        <button class="btn btn-outline-primary rounded-5 w-100 py-2">Get Started</button>
                        <a class="my-3 text-black d-flex justify-content-center" href="#">Start Your 30 Day Free Trial</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card pricing-card h-100 border rounded-3">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Standard</h5>
                    <p class="card-text mb-4">Monthly Charge</p>
                    <p class="price fs-1 fw-bold text-primary mb-4">$49.99</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">Free Setup</li>
                        <li class="mb-2">Bandwidth Limit 10 GB</li>
                        <li class="mb-2">20 User Connection</li>
                        <li class="mb-2">Analytics Report</li>
                        <li class="mb-2">Public API Access</li>
                        <li class="mb-2">Plugins Integration</li>
                        <li class="mb-2 text-gray-400">Custom Content Management</li>
                    </ul>
                    <div class="mt-auto">
                        <button class="btn btn-outline-primary rounded-5 w-100 py-2">Get Started</button>
                        <a class="my-3 text-black d-flex justify-content-center" href="#">Start Your 30 Day Free Trial</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card pricing-card h-100 border rounded-3">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Premium</h5>
                    <p class="card-text mb-4">Monthly Charge</p>
                    <p class="price fs-1 fw-bold text-primary mb-4">$89.99</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">Free Setup</li>
                        <li class="mb-2">Bandwidth Limit 10 GB</li>
                        <li class="mb-2">20 User Connection</li>
                        <li class="mb-2">Analytics Report</li>
                        <li class="mb-2">Public API Access</li>
                        <li class="mb-2">Plugins Integration</li>
                        <li class="mb-2">Custom Content Management</li>
                    </ul>
                    <div class="mt-auto">
                        <button class="btn btn-primary rounded-5 w-100 py-2">Get Started</button>
                        <a class="my-3 text-black d-flex justify-content-center" href="#">Start Your 30 Day Free Trial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
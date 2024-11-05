@extends('layout.app')

@section('title', __('Email'))

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar-email">
            <button class="btn btn-primary compose-btn"><i class="mdi mdi-plus me-2"></i>Compose</button>
            <h6 class="mb-3">My Email</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link active"><i class="mdi mdi-inbox me-2"></i>Inbox <span class="float-end">1,253</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-star me-2"></i>Starred <span class="float-end">245</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-send me-2"></i>Sent <span class="float-end">24,532</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-file me-2"></i>Draft <span class="float-end">09</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-alert-circle me-2"></i>Spam <span class="float-end">14</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-exclamation me-2"></i>Important <span class="float-end">10</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-trash-can me-2"></i>Bin <span class="float-end">9</span></a></li>
            </ul>
            <h6 class="mt-4 mb-3">Label</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-circle text-primary me-2"></i>Primary</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-circle text-success me-2"></i>Social</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-circle text-warning me-2"></i>Work</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-circle text-danger me-2"></i>Friends</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="mdi mdi-plus me-2"></i>Create New Label</a></li>
            </ul>
        </div>
        <div class="col-md-9 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <input type="text" class="form-control search-bar" placeholder="Search mail">
                <div>
                    <i class="mdi mdi-view-module me-3"></i>
                    <i class="mdi mdi-cog-outline me-3"></i>
                    <i class="mdi mdi-bell"></i>
                </div>
            </div>
            <div class="email-list">
                <div class="email-item d-flex align-items-center">
                    <input type="checkbox" class="me-3">
                    <i class="mdi mdi-star me-3"></i>
                    <div class="flex-grow-1">
                        <strong>Julia Jalal</strong>
                        <span class="label bg-info text-white ms-2">Primary</span>
                        <span class="ms-3">Our Bachelor of Commerce program is ACBSP-accredited</span>
                    </div>
                    <span class="text-muted">8:38 AM</span>
                </div>
                <!-- Add more email items here, following the same structure -->
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <span>Showing 1-12 of 1,253</span>
                <div>
                    <i class="mdi mdi-chevron-left me-3"></i>
                    <i class="mdi mdi-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>








<style>
    body {
        background-color: #f8f9fa;
    }
    .sidebar-email {
        background-color: white;
        height: 100vh;
        padding: 20px;
    }
    .main-content {
        background-color: white;
        height: 100vh;
        padding: 20px;
    }
    .compose-btn {
        width: 100%;
        margin-bottom: 20px;
    }
    .nav-link {
        color: #495057;
    }
    .nav-link.active {
        background-color: #e9ecef;
    }
    .email-list {
        border: 1px solid #dee2e6;
    }
    .email-item {
        border-bottom: 1px solid #dee2e6;
        padding: 10px;
    }
    .email-item:last-child {
        border-bottom: none;
    }
    .label {
        font-size: 0.8rem;
        padding: 2px 8px;
        border-radius: 10px;
    }
    .search-bar {
        background-color: #f1f3f4;
        border: none;
        border-radius: 20px;
    }
</style>

@endsection

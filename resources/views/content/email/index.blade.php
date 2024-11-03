@extends('layout.app')

@section('title', __('Email'))

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar-email">
            <button class="btn btn-primary compose-btn"><i class="fas fa-plus me-2"></i>Compose</button>
            <h6 class="mb-3">My Email</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-inbox me-2"></i>Inbox <span class="float-end">1,253</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-star me-2"></i>Starred <span class="float-end">245</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-paper-plane me-2"></i>Sent <span class="float-end">24,532</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-file me-2"></i>Draft <span class="float-end">09</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-exclamation-circle me-2"></i>Spam <span class="float-end">14</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-exclamation me-2"></i>Important <span class="float-end">10</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-trash me-2"></i>Bin <span class="float-end">9</span></a></li>
            </ul>
            <h6 class="mt-4 mb-3">Label</h6>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-circle text-primary me-2"></i>Primary</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-circle text-success me-2"></i>Social</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-circle text-warning me-2"></i>Work</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-circle text-danger me-2"></i>Friends</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-plus me-2"></i>Create New Label</a></li>
            </ul>
        </div>
        <div class="col-md-9 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <input type="text" class="form-control search-bar" placeholder="Search mail">
                <div>
                    <i class="fas fa-th me-3"></i>
                    <i class="fas fa-cog me-3"></i>
                    <i class="fas fa-bell"></i>
                </div>
            </div>
            <div class="email-list">
                <div class="email-item d-flex align-items-center">
                    <input type="checkbox" class="me-3">
                    <i class="far fa-star me-3"></i>
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
                    <i class="fas fa-chevron-left me-3"></i>
                    <i class="fas fa-chevron-right"></i>
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
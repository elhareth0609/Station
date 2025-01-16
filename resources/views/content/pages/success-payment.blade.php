@extends('layouts.app')
@php
    $isNavbar = false;
    $isSidebar = false;
    $isFooter = false;
    $isContainer = false;
@endphp

@section('title', __('Payment Successful!'))

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: #f0f2f5;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
    }

    .card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .success-icon {
        width: 70px;
        height: 70px;
        background: #4BB543;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .checkmark {
        color: white;
        font-size: 40px;
        line-height: 70px;
    }

    h1 {
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .success-text {
        color: #4BB543;
    }

    p {
        color: #666;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .order-id {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        margin: 20px 0;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .btn:hover {
        background: #2980b9;
    }

    .home-btn {
        margin-top: 20px;
        background: #95a5a6;
    }

    .home-btn:hover {
        background: #7f8c8d;
    }
</style>


<!-- Success Page -->
<div class="container">
    <div class="card">
        <div class="success-icon">
            <span class="checkmark">✓</span>
        </div>
        <h1 class="success-text">Payment Successful!</h1>
        <p>Your payment has been processed successfully. We have sent a confirmation email with the details.</p>
        <div class="order-id">
            Order ID: #123456789
        </div>
        <div>
            <a href="#" class="btn">View Order Details</a>
        </div>
        <div>
            <a href="/" class="btn home-btn">Return to Home</a>
        </div>
    </div>
</div>

@endsection
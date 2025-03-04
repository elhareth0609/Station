@extends('layouts.app')

@section('title', __('Form Basic Inputs'))

@section('content')

    <div class="row">
        <div class="col-lg-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{ __('Form Basic Inputs') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{ __('Email address') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="user@mail.com" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="#########" required>
                    </div>

                    <label for="floating-label" class="form-label">{{ __('Floating labels') }}</label>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <label for="floating-label" class="form-label">{{ __('Floating labels') }}</label>
                    <div class="form-group form-group-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Form Basic Inputs
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Form Basic Inputs
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="expired_date" class="form-label">Expired At</label>
                        <input type="datetime-local" class="form-control" name="expired_date" data-v="required" required="" aria-invalid="false">
                    </div>
                    <div class="form-group mb-3">
                        <label for="expired_date" class="form-label">Expired At</label>
                        <input type="datetime-local" class="form-control" name="expired_date" data-v="required" required="" aria-invalid="false">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Form Basic Inputs
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

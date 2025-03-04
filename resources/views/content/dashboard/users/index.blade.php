@extends('layouts.app')

@section('title', __('User Profile'))

@section('content')


<style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .nav-tabs {
            border-bottom: none;
        }
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
        }
        .form-control {
            border-radius: 8px;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: #0d6efd;
            color: white;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }
    </style>

    <div class="container-fluid mt-5">
        <div class="card p-4">
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Preferences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Security</a>
                </li>
            </ul>
            
            <form>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="position-relative d-inline-block">
                            <img src="/api/placeholder/100/100" alt="Profile Picture" class="profile-pic" />
                            <span class="edit-icon">✏️</span>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="yourName" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="yourName" value="Charlene Reed">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="userName" value="Charlene Reed">
                            </div>


 
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="charlenereed@gmail.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="********">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" id="dob" value="25 January 1990">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="presentAddress" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="presentAddress" value="San Jose, California, USA">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="permanentAddress" class="form-label">Permanent Address</label>
                        <input type="text" class="form-control" id="permanentAddress" value="San Jose, California, USA">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="San Jose">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="postalCode" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" value="45962">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" value="USA">
                    </div>
                </div>
                                </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">Save</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
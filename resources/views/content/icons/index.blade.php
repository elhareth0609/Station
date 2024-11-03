@extends('layout.app')

@section('title', __('Icons'))

@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Icons') }}</h1>

<div class="card py-3">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <span class="m-1 d-flex justify-content-center w-100 border rounded fs-1 mdi mdi-home-outline"></span>
            </div>
            <div class="col-2">
                <span class="m-1 d-flex justify-content-center w-100 border rounded fs-1 mdi mdi-home-outline"></span>
            </div>
        </div>
    </div>
</div>


@endsection

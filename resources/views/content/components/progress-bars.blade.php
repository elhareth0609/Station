@extends('layouts.app')

@section('title', __('Progress Bars'))

@section('content')

    <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar w-0"></div>
    </div>
    <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar w-25"></div>
    </div>
    <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar w-50"></div>
    </div>
    <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar w-75"></div>
    </div>
    <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar w-100"></div>
    </div>

@endsection

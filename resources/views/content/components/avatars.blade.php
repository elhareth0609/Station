@extends('layout.app')

@section('title', __('Avatars'))

@section('content')

<div class="mb-3">
    <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-sm">
    <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
    <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-lg">
</div>


<div class="avatar-group mb-3">
    <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-sm">
    <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-sm">
    <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-sm">
    <div class="avatar avatar-sm avatar-count">+5</div>
</div>

<div class="avatar-group mb-3">
    <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
    <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
    <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
    <div class="avatar avatar-md avatar-count">+3</div>
</div>

<div class="avatar-group">
    <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-lg">
    <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-lg">
    <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-lg">
    <div class="avatar avatar-lg avatar-count">+2</div>
</div>





@endsection

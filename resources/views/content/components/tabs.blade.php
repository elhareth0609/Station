@extends('layouts.app')

@section('title', __('Tabs'))

@section('content')

<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
    </li>
</ul>



<ul class="nav nav-pills nav-pills-1 mb-3">
    <li class="nav-item">
        <a class="nav-link text-secondary rounded-0" href="#">Past</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary rounded-0" href="#">Archived</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary rounded-0 active" href="#">Current<span class="badge text-white bg-primary rounded-pill ms-1">12</span></a>
    </li>
</ul>

<style>

    /* Navigation Pills */

.nav-pills-1 .nav-link.active {
    background: transparent;
    color: #6366F1 !important;
    border-bottom: 2px solid #6366F1;
}

</style>
@endsection

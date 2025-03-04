@extends('layouts.app')

@section('title', __('Paginations'))

@section('content')

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#">&laquo;</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#">1</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#">2</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon" href="#">&raquo;</a></li>
    </ul>
</nav>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#">&laquo;</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#">1</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#">2</a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
        <li class="page-item mx-1"><a class="page-link btn btn-icon rounded-pill" href="#">&raquo;</a></li>
    </ul>
</nav>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#">&laquo;</a></li>
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#">1</a></li>
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#">2</a></li>
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
        <li class="page-item mx-1"><a class="btn btn-icon btn-outline-primary rounded-pill" href="#">&raquo;</a></li>
    </ul>
</nav>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item me-1"><a class="page-link btn btn-icon" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
        <div class="border d-flex rounded bg-white">
            <li class="page-item active"><a class="page-link btn btn-icon border-0" href="#">1</a></li>
            <li class="page-item"><a class="page-link btn btn-icon border-0" href="#">2</a></li>
        </div>
        <li class="page-item ms-1"><a class="page-link btn btn-icon" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
    </ul>
</nav>
@endsection

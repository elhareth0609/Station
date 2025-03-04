@extends('layouts.app')

@section('title', __('Breadcrumbs'))

@section('content')

<div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav>
  </div>

  <div class="b-example-divider"></div>

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
          <a class="link-body-emphasis" href="#">
            <span class="mdi mdi-home"></span>
            <span class="visually-hidden">Home</span>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Data
        </li>
      </ol>
    </nav>
  </div>

  <div class="b-example-divider"></div>

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
          <a class="link-body-emphasis" href="#">
            <span class="mdi mdi-home"></span>
            <span class="visually-hidden">Home</span>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Data
        </li>
      </ol>
    </nav>
  </div>

  <div class="b-example-divider"></div>

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center bg-body-tertiary border rounded-3">
        <li class="breadcrumb-item">
          <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
            <span class="mdi mdi-home"></span>
            Home
          </a>
        </li>
        <li class="breadcrumb-item">
          <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Data
        </li>
      </ol>
    </nav>
  </div>


  <style>
    .breadcrumb-chevron {
  --bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
  gap: .5rem;
}
.breadcrumb-chevron .breadcrumb-item {
  display: flex;
  gap: inherit;
  align-items: center;
  padding-left: 0;
  line-height: 1;
}
.breadcrumb-chevron .breadcrumb-item::before {
  gap: inherit;
  float: none;
  width: 1rem;
  height: 1rem;
}

.breadcrumb-custom .breadcrumb-item {
  position: relative;
  flex-grow: 1;
  padding: .75rem 3rem;
}
.breadcrumb-custom .breadcrumb-item::before {
  display: none;
}
.breadcrumb-custom .breadcrumb-item::after {
  position: absolute;
  top: 50%;
  right: -25px;
  z-index: 1;
  display: inline-block;
  width: 50px;
  height: 50px;
  margin-top: -25px;
  content: "";
  background-color: var(--bs-tertiary-bg);
  border-top-right-radius: .5rem;
  box-shadow: 1px -1px var(--bs-border-color);
  transform: scale(.707) rotate(45deg);
}
.breadcrumb-custom .breadcrumb-item:first-child {
  padding-left: 1.5rem;
}
.breadcrumb-custom .breadcrumb-item:last-child {
  padding-right: 1.5rem;
}
.breadcrumb-custom .breadcrumb-item:last-child::after {
  display: none;
}

  </style>
@endsection


@extends('layouts.app')

@section('title', __('Buttons'))

@section('content')

{{-- Buttons --}}
<div class="d-block mb-3">
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-light">Light</button>
    <button type="button" class="btn btn-dark">Dark</button>
</div>

{{-- Rouneded Buttons --}}
<div class="d-block mb-3">
    <button type="button" class="btn btn-primary rounded-pill">Primary</button>
    <button type="button" class="btn btn-secondary rounded-pill">Secondary</button>
    <button type="button" class="btn btn-success rounded-pill">Success</button>
    <button type="button" class="btn btn-danger rounded-pill">Danger</button>
    <button type="button" class="btn btn-warning rounded-pill">Warning</button>
    <button type="button" class="btn btn-info rounded-pill">Info</button>
    <button type="button" class="btn btn-light rounded-pill">Light</button>
    <button type="button" class="btn btn-dark rounded-pill">Dark</button>
</div>

{{-- Outline Buttons --}}
<div class="d-block mb-3">
    <button type="button" class="btn btn-outline-primary">Primary</button>
    <button type="button" class="btn btn-outline-secondary">Secondary</button>
    <button type="button" class="btn btn-outline-success">Success</button>
    <button type="button" class="btn btn-outline-danger">Danger</button>
    <button type="button" class="btn btn-outline-warning">Warning</button>
    <button type="button" class="btn btn-outline-info">Info</button>
    <button type="button" class="btn btn-outline-light">Light</button>
    <button type="button" class="btn btn-outline-dark">Dark</button>
</div>


{{-- Button Sizes: --}}
<div class="d-block mb-3">
    <button class="btn btn-primary btn-lg">Large button</button>
    <button class="btn btn-primary btn-sm">Small button</button>
</div>

<div class="d-block mb-3">
{{-- Button Group: --}}

    <div class="btn-group">
        <button type="button" class="btn btn-primary">Left</button>
        <button type="button" class="btn btn-primary">Middle</button>
        <button type="button" class="btn btn-primary">Right</button>
    </div>

    {{-- Outline Button Group: --}}

    <div class="btn-group">
        <button type="button" class="btn btn-outline-primary">Left</button>
        <button type="button" class="btn btn-outline-primary">Middle</button>
        <button type="button" class="btn btn-outline-primary">Right</button>
    </div>
</div>

<div class="d-flex gap-2 mb-3">
    <button class="btn btn-primary d-inline-flex align-items-center" type="button">
        Primary icon
        <span class="mdi mdi-check ms-2"></span>
    </button>
    <button class="btn btn-outline-secondary d-inline-flex align-items-center" type="button">
        Secondary icon
        <span class="mdi mdi-check ms-2"></span>
    </button>
</div>

<div class="d-flex gap-2 mb-3">
    <button class="btn btn-primary d-inline-flex align-items-center" type="button">
        <span class="mdi mdi-check me-2"></span>
        Primary icon
    </button>
    <button class="btn btn-outline-secondary d-inline-flex align-items-center" type="button">
        <span class="mdi mdi-check me-2"></span>
        Secondary icon
    </button>
</div>

<div class="d-flex gap-2 mb-3">
    <button class="btn btn-primary" type="button" disabled>
      <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
      <span class="visually-hidden" role="status">Loading...</span>
    </button>
    <button class="btn btn-primary" type="button" disabled>
      <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
      <span role="status">Loading...</span>
    </button>
  </div>

    <div class="d-flex gap-2 mb-3">
        <button class="btn btn-primary rounded-circle p-2 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
        <button class="btn btn-outline-primary rounded-circle p-2 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
    </div>


    <div class="d-flex gap-2 mb-3">
        <button class="btn btn-primary rounded p-2 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
        <button class="btn btn-outline-primary rounded p-2 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
    </div>

    <div class="d-flex gap-2 mb-3">
        <button class="btn btn-primary rounded-circle p-3 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
        <button class="btn btn-outline-primary rounded-circle p-3 lh-1" type="button">
            <span class="mdi mdi-close"></span>
            <span class="visually-hidden">Dismiss</span>
        </button>
    </div>

@endsection


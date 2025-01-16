
@extends('layouts.app')

@section('title', __('Tables'))

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
    </tbody>
</table>

{{-- Striped Table: --}}

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
    </tbody>
</table>
{{-- Bordered Table: --}}

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>@johndoe</td>
        </tr>
    </tbody>
</table>
{{-- Responsive Table: --}}

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>@johndoe</td>
            </tr>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>@johndoe</td>
            </tr>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>@johndoe</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection


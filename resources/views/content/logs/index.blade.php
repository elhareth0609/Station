@extends('layout.app')

@section('title', __('Log View'))

@section('content')

<div class="card pb-2">
    <div class="row">
        <div class="col-8">
            <div class="m-2">
                <input type="text" class="form-control bg-light mb-2" name="id" id="id" readonly="" value="134">
                <textarea type="id" class="form-control bg-light" name="description" id="description" readonly="" style="height: 82px;">Hello World?</textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-light rounded border p-2 m-2">
                <p class="mb-1">Created At : 2024-10-10 10:00</p>
                <p class="mb-1">Created At : 2024-10-10 10:00</p>
                <p class="mb-1">Created At : 2024-10-10 10:00</p>
                <p class="mb-1">Created At : 2024-10-10 10:00</p>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="table-responsive rounded-4 border mb-3 px-0">
            <table id="table" class="table table-hover mb-0">
                <thead>
                    <th class="bg-light text-start">{{ __('Name') }}</th>
                    <th class="bg-light text-start">{{ __('Value') }}</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start">id</td>
                        <td class="text-start">4</td>
                    </tr>
                    <tr>
                        <td class="text-start">Full Name</td>
                        <td class="text-start">Khalfaoui Elhareth</td>
                    </tr>
                    <tr>
                        <td class="text-start">Phone</td>
                        <td class="text-start">0795909128</td>
                    </tr>
                    <tr>
                        <td class="text-start">Email</td>
                        <td class="text-start">elhareth0609@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="text-start">Created At</td>
                        <td class="text-start">2024-10-10 10:00</td>
                    </tr>
                    <tr>
                        <td class="text-start">Updated At</td>
                        <td class="text-start">2024-10-10 10:00</td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
</div>


@endsection

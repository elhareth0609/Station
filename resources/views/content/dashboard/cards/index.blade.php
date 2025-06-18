@extends('layouts.app')
@section('title', __('Prepaid Cards'))
@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Prepaid Cards') }}</h1>

<div class="card p-2">
    <div class="container-fluid mt-5">
        <div class="table-responsive rounded-3 border mb-3">
            <table id="cards-table" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>{{__("ID")}}</th>
                        <th>{{__("Provider")}}</th>
                        <th>{{__("Ticket Number")}}</th>
                        <th>{{__("Balance")}}</th>
                        <th>{{__("Status")}}</th>
                        <th>{{__("Used At")}}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#cards-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("cards.data") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'provider', name: 'provider' },
            { data: 'ticket_number', name: 'ticket_number' },
            { data: 'balance', name: 'balance' },
            {
                data: 'status',
                name: 'status',
                render: function(data) {
                    let badgeClass = data === 'new' ? 'bg-success' : 'bg-secondary';
                    return `<span class="badge ${badgeClass}">${data}</span>`;
                }
            },
            { data: 'used_at', name: 'used_at' }
        ],
        order: [[0, 'desc']]
    });
});
</script>

@endsection

@extends('layouts.app')

@section('title', __('Cars'))

@section('content')

<h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Cars') }}</h1>

<div class="card p-2" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">
    <div class="container-fluid mt-5">
        <div class="row {{ app()->getLocale() == "ar" ? "me-1" : "ms-1" }} mb-2">
            <input type="text" class="form-control my-w-fit-content m-1" id="dataTables_my_filter" placeholder="{{ __('Search ...') }}" name="search">

            <select class="form-select my-w-fit-content m-1" id="dataTables_my_length" name="length">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

            <button class="btn btn-icon btn-outline-primary m-1" id="" data-bs-toggle="modal" data-bs-target="#createCarModal"><span class="mdi mdi-plus-outline"></span></button>

            <div class="dropdown my-w-fit-content px-0">
                <button class="btn btn-icon btn-outline-primary m-1" type="button" data-bs-toggle="dropdown">
                    <span class="mdi mdi-filter-outline"></span>
                </button>
                <ul class="dropdown-menu p-1 {{ app()->getLocale() == "ar" ? "text-end dropdown-menu-end" : "dropdown-menu-start" }}" aria-labelledby="dropdownMenuButton1" id="columns_filter_dropdown">
                </ul>
            </div>
        </div>
        <div class="table-responsive rounded-3 border mb-3">
            <table id="table" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__("Name")}}</th>
                        <th>{{__("Driver")}}</th>
                        <th>{{__("Imei")}}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="row align-items-baseline justify-content-end">
            <div class="my-w-fit-content" id="dataTables_my_info"></div>
            <nav class="my-w-fit-content" aria-label="Table navigation"><ul class="pagination" id="dataTables_my_paginate"></ul></nav>
        </div>
    </div>
</div>

<!-- Create Car Modal -->
<div class="modal fade" id="createCarModal" tabindex="-1" aria-labelledby="createCarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="validate" id="createCarForm" action="{{route('car.create')}}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCarLabel">{{ __('Create Car') }}</h5>
                    <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="input-group input-group-floating mb-3">
                        <span for="name" class="input-group-text">{{ __('Name') }}</span>
                        <input type="text" class="form-control" name="name" id="name" data-v="required" required>
                    </div>
                    <div class="input-group input-group-floating mb-3">
                        <span for="user_id" class="input-group-text">{{ __('Driver') }}</span>
                        <input type="text" class="form-control" name="user_id" id="user_id" data-v="required" required>
                    </div>
                    <div class="input-group input-group-floating mb-3">
                        <span for="imei" class="input-group-text">{{ __('Imei') }}</span>
                        <input type="text" class="form-control" name="imei" id="imei" data-v="required" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Edit Car Modal -->
<div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="validate" id="editCarForm" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCarLabel">{{ __('Edit Car') }}</h5>
                    <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="input-group input-group-floating mb-3">
                        <span for="name" class="input-group-text">{{ __('Name') }}</span>
                        <input type="text" class="form-control" name="name" id="edit_name" data-v="required" required>
                    </div>
                    <div class="input-group input-group-floating mb-3">
                        <span for="driver" class="input-group-text">{{ __('Imei') }}</span>
                        <input type="text" class="form-control" name="imei" id="edit_iemi" data-v="required" required>
                    </div>
                    <div class="input-group input-group-floating mb-3">
                        <span for="user_id" class="input-group-text">{{ __('Driver') }}</span>
                        <input type="text" class="form-control" name="user_id" id="edit_user_id" data-v="required" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    var table;

    function editCar(id) {
        $('#loading').show();

        $.ajax({
            url: '/car/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data) {
            car = data.data;
            $('#edit_id').val(car.id);
            $('#edit_name').val(car.name);
            $('#edit_imei').val(car.imei);
            var selectDriver = $('#edit_user_id');
            selectDriver.val(car.user_id).trigger('change');

            $('#loading').hide();
            $('#editCarModal').modal('show');
            },
            error: function(xhr, textStatus, errorThrown) {
                const response = JSON.parse(xhr.responseText);
                $('#loading').hide();
                Swal.fire({
                    icon: response.icon,
                    title: response.state,
                    text: response.message,
                    confirmButtonText: __("Ok",lang)
                });
            }
        });

    }

    function deleteCar(id) {
        confirmDelete({
            id: id,
            url: '/car',
            table: table
        });
    }

    function showContextMenu(id, x, y) {

        var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
            .append('<li><a onclick="editCar(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
            .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
            .append('<li><a onclick="deleteCar(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');

        contextMenu.css({
            top: y,
            left: x
        });

        $('body').append(contextMenu);

        $(document).on('click', function() {
            $('.context-menu').remove();
        });
    }

    $(document).ready(function() {
        table = $('#table').DataTable({
            pageLength: 100,
            language: {
                "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
            },
            ajax: {
                url: "{{ route('cars') }}",
            },
            columns: [
                {data: 'id', name: '#',},
                {data: 'name', name: '{{__("Name")}}'},
                {data: 'user_id', name: '{{__("Driver")}}'},
                {data: 'imei', name: '{{__("Imei")}}'},
                {data: 'created_at', name: '{{__("Created At")}}',},
                {data: 'actions', name: '{{__("Actions")}}', orderable: false, searchable: false,}
            ],
            order: [[3, 'desc']],

            // Start of checkboxes

            // End of checkboxes
            rowCallback: function(row, data) {
                $(row).attr('id', 'car_' + data.id);

                $(row).on('contextmenu', function(e) {
                    e.preventDefault();
                    showContextMenu(data.id, e.pageX, e.pageY);
                });

            }

        });

        // Initialize Components
        initLengthChange(table);
        initSearchFilter(table);
        initColumnVisibilityToggle(table);

        // Table draw event for sorting icons and pagination updates
        table.on('draw', function () {
            handlePagination(table);
            updateSortingIcons(table);
            updateInfoText(table);
        });

        $('#edit_user_id').select2({
            dropdownParent: $('#editCarModal'),
            width: '100%',
            placeholder: "{{ __('Select Driver') }}"
        });

        $('#createCarForm').submit(function(event) {
            event.preventDefault();
            $('#createCarModal').modal('hide');
            
            if (!$(this).valid()) {
                $('#createCarModal').modal('show');
                return;
            }
            $('#loading').show();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#loading').hide();
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok",lang)
                    });
                    $('#createCarForm')[0].reset();
                    $('#createCarForm .form-control').removeClass('valid');
                    $('#createCarForm .form-select').removeClass('valid');
                    table.ajax.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#loading').hide();
                    const response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok",lang)
                    });
                }
            });
        });

        $('#editCarForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var id = $('#edit_id').val();
            console.log(id);

            $.ajax({
                url: "{{ route('car.update', ':id') }}".replace(':id', id),
                type: $(this).attr('method'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                Swal.fire({
                    icon: response.icon,
                    title: response.state,
                    text: response.message,
                    confirmButtonText: __("Ok",lang)
                });
                table.ajax.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                const response = JSON.parse(xhr.responseText);
                Swal.fire({
                    icon: response.icon,
                    title: response.state,
                    text: response.message,
                    confirmButtonText: __("Ok",lang)
                });
                }
            });
        });

    });

</script>

@endsection

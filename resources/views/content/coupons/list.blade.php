@extends('layouts.app')

@section('title', __('Coupons'))

@section('content')

<h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Coupons') }}</h1>

<div class="card p-2" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">
    <div class="container-fluid mt-5">
        <div class="row {{ app()->getLocale() == "ar" ? "me-1" : "ms-1" }} mb-2">
            <input type="text" class="form-control my-w-fit-content m-1" id="dataTables_my_filter" placeholder="{{ __('Search ...') }}" name="search">

            <select class="form-select my-w-fit-content m-1" id="selectType" name="type">
                <option value="all">{{ __('All') }}</option>
                <option value="active">{{ __('Active') }}</option>
                <option value="inactive">{{ __('In Active') }}</option>
                <option value="expired">{{ __('Expired') }}</option>
            </select>

            <select class="form-select my-w-fit-content m-1" id="dataTables_my_length" name="length">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

            <button class="btn btn-icon btn-outline-primary m-1" id="" data-bs-toggle="modal" data-bs-target="#createCouponModal"><span class="mdi mdi-plus-outline"></span></button>
            <button class="btn btn-icon btn-outline-danger m-1" id="trash-button" data-trashed="0"><span class="mdi mdi-delete-alert-outline"></span></button>

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
                        <th><input class="form-check-input" type="checkbox" id="check-all"></th>
                        <th>{{__("Code")}}</th>
                        <th>{{ __('Discount') }}</th>
                        <th>{{ __('Max') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Expired At') }}</th>
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


<!-- Edit Coupon Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="validate" id="editCouponForm" action="{{ route('coupon.update') }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCouponLabel">{{ __('Edit Coupon') }}</h5>
                    <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="pid" name="pid" required>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Code') }}" id="pcode" name="pcode" data-v="required" aria-label="{{ __('Code') }}" aria-describedby="button-addon2" disabled required>
                        <button class="btn btn-light border generate-code" type="button">{{ __('Generate') }}</button>
                    </div>
                    <div class="mb-3">
                        <label for="puses" class="form-label">{{ __('Max') }}</label>
                        <input type="text" class="form-control" id="puses" name="puses" data-v="required" required>
                    </div>
                    <div class="mb-3">
                        <label for="pdiscount" class="form-label">{{ __('Discount') }}</label>
                        <input type="text" class="form-control" id="pdiscount" name="pdiscount" data-v="required" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pexpired_date" class="form-label">{{ __('Expired At') }}</label>
                        <input type="datetime-local" class="form-control" id="pexpired_date" name="pexpired_date" data-v="required" required>
                    </div>
                    <div class="mb-3">
                        <label for="pstatus" class="form-label">{{ __('Status') }}</label>
                        <select class="form-select" id="pstatus" name="pstatus" data-v="required" required>
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
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

<!-- Create Coupon Modal -->
<div class="modal fade" id="createCouponModal" tabindex="-1" aria-labelledby="createCouponLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="validate" id="createCouponForm" action="{{route('coupon.create')}}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCouponLabel">{{ __('Create Coupon') }}</h5>
                    <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Code') }}" id="code" name="code" data-v="required" aria-label="{{ __('Code') }}" aria-describedby="button-addon2" readonly>
                        <button class="btn btn-icon border copy-code" type="button" data-clipboard-target="#code" >
                            <span class="my my-copy"></span>
                            <span class="my my-doubletick d-none"></span>
                        </button>
                        <button class="btn btn-light border generate-code" type="button">{{ __('Generate') }}</button>
                    </div>
                    <div class="input-group mb-3">
                        <span for="max" class="input-group-text">{{ __('Max') }}</span>
                        <input type="number" class="form-control" name="max" data-v="required" required>
                    </div>
                    <div class="input-group mb-3">
                        <span for="discount" class="input-group-text">{{ __('Discount') }}</span>
                        <input type="number" class="form-control" name="discount" data-v="required" required>
                        <span class="input-group-text">%</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="expired_date" class="form-label">{{ __('Expired At') }}</label>
                        <input type="datetime-local" class="form-control" name="expired_date" data-v="required" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="status">{{ __('Status') }}</label>
                        <select class="form-select" name="status" data-v="required" required>
                            <option selected="0">{{ __('Select Status') }}</option>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
                        </select>
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


<script type="text/javascript">
        var table;
        // Start of checkboxes
        var selectedIds = [];
        var ids = [];
        let isCheckAllTrigger = false;
        // End of checkboxes

        function editCoupon(id) {
            $('#loading').show();

            $.ajax({
                url: '/coupon/' + id,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                coupon = data.coupon;
                $('#id').val(coupon.id);
                $('#code').val(coupon.code);
                $('#uses').val(coupon.max);
                $('#discount').val(coupon.discount);
                $('#expired_date').val(coupon.expired_date.replace(' ', 'T'));
                $('#status').val(coupon.status);

                $('#loading').hide();
                $('#editCouponModal').modal('show');
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

        function deleteCoupon(id) {
            confirmDelete({
                id: id,
                url: '/coupon',
                table: table
            });
        }

        function restoreCoupon(id) {
            confirmRestore({
                id: id,
                url: '/coupon',
                table: table
            });
        }

        function showContextMenu(id, x, y) {

            var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
                .append('<li><a onclick="editCoupon(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
                .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
                .append('<li><a onclick="deleteCoupon(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');


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
                    url: "{{ route('coupons') }}",
                    data: function(d) {
                        d.type = $('#selectType').val();
                        d.trashed = $('#trash-button').data('trashed');
                    },
                    // Start of checkboxes
                    dataSrc: function(response) {
                        ids = (response.ids || []).map(id => parseInt(id, 10)); // Ensure all IDs are integers
                        selectedIds = [];
                        return response.data;
                    }
                // End of checkboxes
                },
                columns: [
                    // Start of checkboxes
                    {
                        data: 'id',
                        name: '#',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<input type="checkbox" class="form-check-input rounded-2 check-item" value="' + data + '">';
                        }
                    },
                    // End  of checkboxes
                    {data: 'code', name: '{{__("Code")}}',},
                    {data: 'discount', name: '{{__("Discount")}}',},
                    {data: 'max', name: '{{__("Max")}}',},
                    {data: 'status', name: '{{__("Status")}}',},
                    {data: 'expired_date', name: '{{__("Expired At")}}',},
                    {data: 'created_at', name: '{{__("Created At")}}',},
                    {data: 'actions', name: '{{__("Actions")}}', orderable: false, searchable: false,}
                ],
                order: [[6, 'desc']], // Default order by created_at column

                rowCallback: function(row, data) {
                    $(row).attr('id', 'coupon_' + data.id);

                    // $(row).on('dblclick', function() {
                    //     window.location.href = "{{ url('coupon') }}/" + data.id;
                    // });

                    $(row).on('contextmenu', function(e) {
                        e.preventDefault();
                        showContextMenu(data.id, e.pageX, e.pageY);
                    });

                    // Start of checkboxes
                    var $checkbox = $(row).find('.check-item');
                    var couponId = parseInt($checkbox.val());

                    if (selectedIds.includes(couponId)) {
                        $checkbox.prop('checked', true);
                    } else {
                        $checkbox.prop('checked', false);
                    }
                    // End of checkboxes

                },
                drawCallback: function() {
                  // Start of checkboxes
                    $('#check-all').off('click').on('click', function() { // Unbind previous event and bind a new one
                        $('.check-item').prop('checked', this.checked);
                        var totalCheckboxes = ids.length;
                        var checkedCheckboxes = selectedIds.length;

                        if (checkedCheckboxes === 0 || checkedCheckboxes < totalCheckboxes) { // if new all checked or some checked
                            selectedIds = [];
                            selectedIds = ids.slice();
                        } else {
                            selectedIds = [];
                        }
                    });

                    $('.check-item').on('change', function() {
                        var itemId = parseInt($(this).val());

                        if (this.checked) { // if new checked add to selected
                            selectedIds.push(itemId);
                        } else { // if remove checked remove from selected
                            selectedIds = selectedIds.filter(id => id !== itemId);
                        }

                        var totalCheckboxes = ids.length;
                        var checkedCheckboxes = selectedIds.length;
                        if (checkedCheckboxes === totalCheckboxes) { // all checkboxes checked
                            $('#check-all').prop('checked', true).prop('indeterminate', false);
                            selectedIds = ids.slice();
                        } else if (checkedCheckboxes > 0) { // not all checkboxes are checked
                            $('#check-all').prop('checked', false).prop('indeterminate', true);
                        } else {  // all checkboxes are not checked
                            $('#check-all').prop('checked', false).prop('indeterminate', false);
                            selectedIds = [];
                        }
                    });
                  // End of checkboxes
                }

            });

            // Initialize Components
            initLengthChange(table);
            initSearchFilter(table);
            initTypeChange(table);
            initTrashButton(table);
            // initPagination(table);
            initColumnVisibilityToggle(table);

            // Table draw event for sorting icons and pagination updates
            table.on('draw', function () {
                handlePagination(table);
                updateSortingIcons(table);
                updateInfoText(table);
            });

            $('#createCouponForm').submit(function(event) {
                event.preventDefault();
                $('#createCouponModal').modal('hide');
                
                if (!$(this).valid()) {
                    $('#createCouponModal').modal('show');
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
                        $('#createCouponForm')[0].reset();
                        $('#createCouponForm .form-control').removeClass('valid');
                        $('#createCouponForm .form-select').removeClass('valid');
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

            $('#editCouponForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
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

            $('.generate-code').click(function(event) {
                event.preventDefault(); // Prevent default button behavior

                $.ajax({
                    url: "{{ route('coupons.generate') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.code) {
                            $('#code').val(response.code);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error generating code:', error);
                    }
                });
            });

            // Initialize ClipboardJS
            var clipboard = new ClipboardJS('.copy-code');

            // Success feedback
            clipboard.on('success', function (e) {
                const icon = $(e.trigger).find('span.my-copy');
                const icon1 = $(e.trigger).find('span.my-doubletick');
                icon.addClass('d-none');
                icon1.removeClass('d-none');

                // icon.removeClass('my-copy').addClass('my-doubletick');
                setTimeout(() => {
                    icon.removeClass('d-none');
                    icon1.addClass('d-none');
                    // icon.removeClass('my-doubletick').addClass('my-copy');
                }, 2000);

                console.log('Copied:', e.text);
            });

            // Error feedback
            clipboard.on('error', function (e) {
                console.error('Copy failed:', e.action); // Log error
            });

    });

</script>

@endsection

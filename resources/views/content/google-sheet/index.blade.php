@extends('layout.app')

@section('title', __('Google Sheet'))

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('DataTables') }}</h1>

    <div class="card p-2" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">
        <div class="container-fluid mt-5">
            <div class="row {{ app()->getLocale() == "ar" ? "me-1" : "ms-1" }} mb-2">
                <input type="text" class="form-control my-w-fit-content m-1" id="dataTables_my_filter" placeholder="{{ __('Search ...') }}" name="search">

                <select class="form-select my-w-fit-content m-1" id="selectType" name="type">
                    <option value="all">{{ __('All') }}</option>
                    <option value="active">{{ __('Active') }}</option>
                    <option value="inactive">{{ __('InActive') }}</option>
                    <option value="expired">{{ __('Expired') }}</option>
                </select>

                <select class="form-select my-w-fit-content m-1" id="dataTables_my_length" name="length">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <div class="dropdown my-w-fit-content px-0">
                    <button class="btn btn-icon btn-outline-primary m-1" type="button" data-bs-toggle="dropdown">
                        <span class="mdi mdi-filter-outline"></span>
                    </button>
                    <ul class="dropdown-menu p-1 {{ app()->getLocale() == "ar" ? "text-end dropdown-menu-end" : "dropdown-menu-start" }}" aria-labelledby="dropdownMenuButton1" id="columns_filter_dropdown">
                    </ul>
                </div>
            </div>
            <div class="table-responsive rounded-4 border mb-3">
                <table id="table" class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><input class="form-check-input" type="checkbox" id="check-all"></th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Raison') }}</th>
                            <th>{{ __('From') }}</th>
                            <th>{{ __('To') }}</th>
                            <th>{{ __('Company') }}</th>
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


<div class="modal fade" id="printCouponPdfModal" tabindex="-1" aria-labelledby="printCouponPdfLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printCouponPdfLabel">{{ __('Print Coupon Pdf') }}</h5>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex justify-content-center mb-4">
                        <iframe id="pdfPreview" style="width: 100%; height: 600px;" frameborder="0"></iframe>
                    </div>
                    <!-- Existing form content on the right side -->
                    <div class="col-md-12 col-lg-6">
                        <input type="hidden" class="form-control" id="pdid" name="pdid" data-v="required" required>
                        <div class="mb-3">
                            <label for="pdcode" class="form-label">{{ __('Code') }}</label>
                            <input type="text" class="form-control" id="pdcode" name="pdcode" data-v="required" required>
                        </div>
                        <div class="mb-3">
                            <label for="pduses" class="form-label">{{ __('Max') }}</label>
                            <input type="text" class="form-control" id="pduses" name="pduses" data-v="required" required>
                        </div>
                        <div class="mb-3">
                            <label for="pddiscount" class="form-label">{{ __('Discount') }}</label>
                            <input type="text" class="form-control" id="pddiscount" name="pddiscount" data-v="required" required>
                        </div>
                        <div class="mb-3">
                            <label for="pdexpired_date" class="form-label">{{ __('Expired At') }}</label>
                            <input type="datetime-local" class="form-control" id="pdexpired_date" name="pdexpired_date" data-v="required" required>
                        </div>
                        <div class="mb-3">
                            <label for="pdstatus" class="form-label">{{ __('Status') }}</label>
                            <select class="form-select" id="pdstatus" name="pdstatus" data-v="required" required>
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Print') }}</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
        var table;
        // Start of checkboxes
        var selectedIds = [];
        var ids = [];
        let isCheckAllTrigger = false;
        // End of checkboxes

        function updatePdfOverlay() {
            $('#loading').show();

            const id = document.getElementById('pdid').value || '';
            const code = document.getElementById('pdcode').value || '';
            const uses = document.getElementById('pduses').value || '';
            const discount = document.getElementById('pddiscount').value || '';
            const expired_date = document.getElementById('pdexpired_date').value || '';
            const status = document.getElementById('pdstatus').value || '';

            $.ajax({
                url: '/coupon/pdf/' + id,
                type: 'POST',
                xhrFields: {
                    responseType: 'blob' // Important to get the binary data
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    code: code,
                    uses: uses,
                    discount: discount,
                    expired_date: expired_date,
                    status: status,
                },
                success: function(blob) {
                    $('#loading').hide();

                    // Create an object URL from the blob
                    const url = URL.createObjectURL(blob);
                    // Set the source of the iframe or embed to display the PDF
                    $('#pdfPreview').attr('src', url);
                    // $('#printCouponPdfModal').modal('show');

                    // Release the URL when the modal is closed
                    $('#printCouponPdfModal').on('hidden.bs.modal', function () {
                        URL.revokeObjectURL(url);
                        $('#pdfPreview').attr('src', ''); // Clear the src to release memory
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    const response = JSON.parse(xhr.responseText);
                    $('#loading').hide();
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                }
            });
        }

        document.getElementById('pdcode').addEventListener('input', updatePdfOverlay);
        document.getElementById('pduses').addEventListener('input', updatePdfOverlay);
        document.getElementById('pddiscount').addEventListener('input', updatePdfOverlay);
        document.getElementById('pdexpired_date').addEventListener('input', updatePdfOverlay);
        document.getElementById('pdstatus').addEventListener('change', updatePdfOverlay);



        function printPdfCoupon(id) {
            $('#loading').show();
            $.ajax({
                url: '/coupon/pdf/' + id,
                type: 'POST',
                xhrFields: {
                    responseType: 'blob' // Important to get the binary data
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(blob,data) {
                    $('#loading').hide();

                    coupon = data.coupon;
                    if (coupon) {
                        $('#pdid').val(coupon.id);
                        $('#pdcode').val(coupon.code);
                        $('#pduses').val(coupon.max);
                        $('#pddiscount').val(coupon.discount);
                        $('#pdexpired_date').val(coupon.expired_date.replace(' ', 'T'));
                        $('#pdstatus').val(coupon.status);
                    }

                    // Create an object URL from the blob
                    const url = URL.createObjectURL(blob);
                    // Set the source of the iframe or embed to display the PDF
                    $('#pdfPreview').attr('src', url);
                    $('#printCouponPdfModal').modal('show');

                    // Release the URL when the modal is closed
                    $('#printCouponPdfModal').on('hidden.bs.modal', function () {
                        URL.revokeObjectURL(url);
                        $('#pdfPreview').attr('src', ''); // Clear the src to release memory
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    const response = JSON.parse(xhr.responseText);
                    $('#loading').hide();
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                }
            });
        }

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

        function checkAndLoadLottie(table) {
            loademptyTableLottieAnimation();
        }

    $(document).ready(function() {
        // $.noConflict();
            table = $('#table').DataTable({
                pageLength: 100,
                language: {
                    "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                    "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
                },
                ajax: {
                    url: "{{ route('google-sheet') }}",
                    // data: function(d) {
                    //     d.type = $('#selectType').val();
                    // },
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
                    { data: 'name', name: 'name' },
                    { data: 'reason', name: 'reason' },
                    { data: 'from_date', name: 'from_date' },
                    { data: 'to_date', name: 'to_date' },
                    { data: 'company', name: 'company' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                order: [[6, 'desc']], // Default order by created_at column

                // Start of checkboxes

                // End of checkboxes
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

            $('#dataTables_my_length').change(function() {
                var selectedValue = $(this).val();
                table.page.len(selectedValue).draw();
            });

            $('#dataTables_my_filter').on('input', function () {
                var query = $(this).val();
                table.search(query).draw();
            });

            table.on('draw', function () {
                checkAndLoadLottie(table);
                var info = table.page.info();
                var pagination = $('#dataTables_my_paginate');

                pagination.empty();


                var prevButton = $('<li>').addClass('page-item').append($('<a>').addClass('page-link btn btn-icon mx-1').attr('href', 'javascript:void(0);').html('&lsaquo;'));
                if (info.page > 0) {
                    prevButton.find('a').click(function () {
                    table.page('previous').draw('page');
                    });
                } else {
                    prevButton.addClass('disabled');
                }
                pagination.append(prevButton);


                for (var i = 0; i < info.pages; i++) {
                    var page = i + 1;
                    var liClass = (page === info.page + 1) ? 'active' : 'd-none';
                    var link = $('<a>').addClass('page-link btn btn-icon rounded btn-outline-primary').attr('href', 'javascript:void(0);').text(page);
                    var listItem = $('<li>').addClass('page-item').addClass(liClass).append(link);
                    listItem.click((function (pageNumber) {
                        return function () {
                            table.page(pageNumber).draw('page');
                        };
                    })(i));
                    pagination.append(listItem);
                }


                var nextButton = $('<li>').addClass('page-item').append($('<a>').addClass('page-link btn btn-icon mx-1').attr('href', 'javascript:void(0);').html('&rsaquo;'));
                if (info.page < info.pages - 1) {
                    nextButton.find('a').click(function () {
                    table.page('next').draw('page');
                    });
                } else {
                    nextButton.addClass('disabled');
                }
                pagination.append(nextButton);


                var startRange = info.start + 1;
                var endRange = info.start + info.length;
                var pageInfo = startRange + ' ' + __("to",lang) + ' ' + endRange + ' ' + __("from",lang) + ' ' + info.recordsTotal;
                $('#dataTables_my_info').text(pageInfo);

            });

            table.columns().every(function() {
                var column = this;
                var columnName = $(column.header()).text(); // Get the column name from the header
                var columnIndex = column.index(); // Get the column index

                // Append the checkbox to the dropdown
                $('#columns_filter_dropdown').append(
                    '<li><label><input type="checkbox" class="form-check-input column-toggle" data-column="' + columnIndex + '" checked> ' + columnName + '</label></li>'
                );
            });

            $('#columns_filter_dropdown').on('change', '.column-toggle', function() {
                var column = table.column($(this).data('column'));
                var isChecked = $(this).is(':checked');

                // Toggle the visibility of the column
                column.visible(isChecked);
            });
    });

</script>

@endsection

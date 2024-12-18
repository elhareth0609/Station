@extends('layout.app')

@section('title', __('Google Sheet'))

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Google Sheet') }}</h1>

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

                <button class="btn btn-icon btn-outline-primary m-1" id="" data-bs-toggle="modal" data-bs-target="#createCouponModal"><span class="mdi mdi-plus-outline"></span></button>

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
                            <th>{{ __('#') }}</th>
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

<!-- Edit Google Sheet Row Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="validate" id="editCouponForm" action="{{route('coupon.update')}}" method="POST">
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

<!-- Create Google Sheet Row Modal -->
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

<div class="modal fade" id="printCertificatePdfModal" tabindex="-1" aria-labelledby="printCertificatePdfLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printCertificatePdfLabel">{{ __('Print Certificate Pdf') }}</h5>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex justify-content-center mb-4">
                        <iframe id="pdfPreview" style="width: 100%; height: 600px;" frameborder="0"></iframe>
                    </div>
                    <!-- Existing form content on the right side -->
                    <div class="col-md-12 col-lg-6">
                        <input type="hidden" id="pdid" name="pdid">
                        <div class="mb-3">
                            <label for="pdname" class="form-label">{{ __('Name') }}</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="pdname" name="pdname">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" id="pdname-x" name="pdname-x">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" id="pdname-y" name="pdname-y">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pdreason" class="form-label">{{ __('Reason') }}</label>
                            <input type="text" class="form-control" id="pdreason" name="pdreason">
                        </div>
                        <div class="mb-3">
                            <label for="pdfrom_date" class="form-label">{{ __('From Date') }}</label>
                            <input type="text" class="form-control" id="pdfrom_date" name="pdfrom_date">
                        </div>
                        <div class="mb-3">
                            <label for="pdto_date" class="form-label">{{ __('To Date') }}</label>
                            <input type="text" class="form-control" id="pdto_date" name="pdto_date">
                        </div>
                        <div class="mb-3">
                            <label for="pdcompany" class="form-label">{{ __('Company') }}</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="pdcompany" name="pdcompany">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" id="pdcompany-x" name="pdcompany-x">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" id="pdcompany-y" name="pdcompany-y">
                                </div>
                            </div>
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
        const name = document.getElementById('pdname').value || '';
        const name_x = document.getElementById('pdname-x').value || '';
        const name_y = document.getElementById('pdname-y').value || '';
        const reason = document.getElementById('pdreason').value || '';
        const from_date = document.getElementById('pdfrom_date').value || '';
        const to_date = document.getElementById('pdto_date').value || '';
        const company = document.getElementById('pdcompany').value || '';
        const company_x = document.getElementById('pdcompany-x').value || '';
        const company_y = document.getElementById('pdcompany-y').value || '';

        $.ajax({
            url: '/certificate/pdf',
            type: 'POST',
            data: {
                id: id,
                name: name,
                name_x: name_x,
                name_y: name_y,
                reason: reason,
                from_date: from_date,
                to_date: to_date,
                company: company,
                company_x: company_x,
                company_y: company_y,
            },
            xhrFields: {
                responseType: 'blob' // Important to get the binary data
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(blob) {
                $('#loading').hide();

                // Create an object URL from the blob
                const url = URL.createObjectURL(blob);
                // Set the source of the iframe or embed to display the PDF
                $('#pdfPreview').attr('src', url);
                // $('#printCouponPdfModal').modal('show');

                // Release the URL when the modal is closed
                $('#printCertificatePdfModal').on('hidden.bs.modal', function () {
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

    document.getElementById('pdname').addEventListener('blur', updatePdfOverlay);
    document.getElementById('pdname-x').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdname-y').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdreason').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdfrom_date').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdto_date').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdcompany').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdcompany-x').addEventListener('input', updatePdfOverlay);
    document.getElementById('pdcompany-y').addEventListener('input', updatePdfOverlay);


    function printPdfCertificate(id) {
        $('#loading').show();
        let rowData = table.row(id - 1).data(); // DataTables is zero-indexed

        $.ajax({
            url: '/certificate/pdf',
            type: 'POST',
            data: {
                id: rowData.id,
                name: rowData.name,
                name_x: 137,
                name_y: 216,
                reason: rowData.reason,
                from_date: rowData.from_date,
                to_date: rowData.to_date,
                company: rowData.company,
                company_x: 30,
                company_y: 30,
            },

            xhrFields: {
                responseType: 'blob' // Important to get the binary data
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(blob,data) {
                $('#loading').hide();

                $('#pdid').val(rowData.id);
                $('#pdname').val(rowData.name);
                $('#pdname-x').val(137);
                $('#pdname-y').val(216);
                $('#pdreason').val(rowData.reason);
                $('#pdfrom_date').val(rowData.from_date);
                $('#pdto_date').val(rowData.to_date);
                $('#pdcompany').val(rowData.company);
                $('#pdcompany-x').val(30);
                $('#pdcompany-y').val(30);

                // Create an object URL from the blob
                const url = URL.createObjectURL(blob);
                // Set the source of the iframe or embed to display the PDF
                $('#pdfPreview').attr('src', url);
                $('#printCertificatePdfModal').modal('show');

                // Release the URL when the modal is closed
                $('#printCertificatePdfModal').on('hidden.bs.modal', function () {
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

    function deleteCoupon(id) {
        Swal.fire({
            title: __("Do you really want to delete this Coupon?",lang),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: __("Submit",lang),
            cancelButtonText: __("Cancel",lang),
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/coupon/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
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
            }
        });
    }

    function showContextMenu(id, x, y) {

        var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
            .append('<li><a onclick="printPdfCertificate(' + id + ')"><i class="tf-icons mdi mdi-printer-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Print") }}</a></li>');


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
                    { data: 'id', name: 'id' },
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
                    $(row).attr('id', 'certificate_' + data.id);

                    $(row).on('contextmenu', function(e) {
                        e.preventDefault();
                        showContextMenu(data.id, e.pageX, e.pageY);
                    });
                },

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

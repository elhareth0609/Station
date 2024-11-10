@extends('layout.app')

@section('title', __('Logs'))

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Logs') }}</h1>

    <div class="card p-2" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">
        <div class="container-fluid mt-5">
            <div class="row ms-1 mb-2">
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
                            <th>#</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Content') }}</th>
                            <th>{{ __('Created At') }}</th>
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

<script type="text/javascript">
        var table;
        // Start of checkboxes
        var selectedIds = [];
        var ids = [];
        let isCheckAllTrigger = false;
        // End of checkboxes


        Pusher.logToConsole = true;
        var pusher = new Pusher('f513c6dba43174cbee4d', {
            cluster: 'eu'
        });

        function deleteLog(id) {
            Swal.fire({
                title: __("Do you really want to delete this Log?",lang),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: __("Submit",lang),
                cancelButtonText: __("Cancel",lang),
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/log/' + id,
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

        function editLog(id) {
            window.open("{{ url('log') }}/" + id);
        }

        function showContextMenu(id, x, y) {

            var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
                .append('<li><a onclick="editLog(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
                .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
                .append('<li><a onclick="deleteLog(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');


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
    const recordsTotal = table.page.info().recordsTotal;

    // If the table is empty and the loading animation doesn't exist, show it
    if (recordsTotal === 0 && !$('#lottie-animation').length) {
        // Only append the Lottie animation once
        $('body').append(`
            <div id="loading" style="display: none; background: #00000069; z-index: 10000;" class="position-fixed h-100 w-100 top-0 start-0">
                <div id="lottie-animation" class="bg-white rounded-3 border border-primary border-5 position-fixed start-50 top-50" style="width: 100px; height: 100px; transform: translate(-50%, -50%);">
                </div>
            </div>
        `);

        // Initialize the Lottie animation
        var animation1 = lottie.loadAnimation({
            container: document.getElementById('lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'assets/img/my/defaults/load-svg.json' // Lottie animation URL
        });

        // Display the loading animation
        $('#loading').show();
    } else if (recordsTotal > 0 && $('#lottie-animation').length) {
        // If the table is not empty and Lottie animation exists, remove it
        $('#loading').remove();
    }
}

    $(document).ready(function() {
        // $.noConflict();
            table = $('#table').DataTable({
                serverSide: true,
                pageLength: 100,
                language: {
                    "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                    "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
                },
                initComplete: function() {
                    checkAndLoadLottie(this.api());
                },
                ajax: {
                    url: "{{ route('logs') }}",
                    data: function(d) {
                        d.type = $('#selectType').val();
                    }
                  // Start of checkboxes
                // dataSrc: function(response) {
                //     ids = (response.ids || []).map(id => parseInt(id, 10)); // Ensure all IDs are integers
                //     selectedIds = [];
                //     return response.data;
                // }
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
                    {data: 'type', name: '{{__("Type")}}',},
                    {data: 'content', name: '{{__("Content")}}',},
                    {data: 'created_at', name: '{{__("Created At")}}',},
                ],
                order: [[3, 'desc']], // Default order by created_at column

                // Start of checkboxes

                // End of checkboxes
                rowCallback: function(row, data) {
                    $(row).attr('id', 'log_' + data.id);

                    $(row).on('dblclick', function() {
                        window.location.href = "{{ url('log') }}/" + data.id;
                    });

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

            $('#selectType').change(function() {
                table.ajax.reload();
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

            var channel = pusher.subscribe('logs');
            channel.bind('logNew', function(data) {
                table.ajax.reload();
            });
    });

</script>

@endsection

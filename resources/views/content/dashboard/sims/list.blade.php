@extends('layouts.app')

@section('title', __('Sims'))

@section('content')

<h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Sims') }}</h1>

<div class="card p-2" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">
    <div class="container-fluid mt-5">
        <div class="row {{ app()->getLocale() == "ar" ? "me-1" : "ms-1" }} mb-2">
            <input type="text" class="form-control my-w-fit-content m-1" id="dataTables_my_filter" placeholder="{{ __('Search ...') }}" name="search">

            <select class="form-select my-w-fit-content m-1" id="selectType" name="type">
                <option value="">{{ __('All') }}</option>
                <option value="active">{{ __('Active') }}</option>
                <option value="inactive">{{ __('In Active') }}</option>
            </select>

            <select class="form-select my-w-fit-content m-1" id="dataTables_my_length" name="length">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

            <button class="btn btn-icon btn-outline-primary m-1" id="" data-bs-toggle="modal" data-bs-target="#createSimModal"><span class="mdi mdi-plus-outline"></span></button>

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
                        {{-- <th>{{__("Id")}}</th>
                        <th>{{__("Station")}}</th>
                        <th>{{__("Name")}}</th>
                        <th>{{ __('Ip') }}</th>
                        <th>{{ __('Imei') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Actions') }}</th> --}}
                                            <th>{{__("Id")}}</th>
                    <th>{{__("Station")}}</th>
                    <th>{{__("Name")}}</th>
                    <th>{{__("Provider")}}</th> <!-- NEW COLUMN -->
                    <th>{{ __('Ip') }}</th>
                    <!-- NEW COLUMNS -->
                    <th>{{ __('Signal') }}</th>
                    <th>{{ __('Network') }}</th>
                    <th>{{ __('Connection') }}</th>
                    <th>{{ __('Unread') }}</th>
                    <!-- END NEW COLUMNS -->
                    <th>{{ __('Imei') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Last Seen') }}</th>
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

<!-- Create Sim Modal -->
<div class="modal fade" id="createSimModal" tabindex="-1" aria-labelledby="createSimLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="createSimForm" action="{{route('sim.create')}}" method="POST">
            <div class="modal-content" dir="{{ app()->isLocale('ar') ? 'rtl' : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSimLabel">{{ __('Create Sim') }}</h5>
                    <button type="button" class="btn btn-light btn-close {{ app()->isLocale('ar') ? 'ms-0 me-auto' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id" name="id" required>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="ip" class="form-label">{{ __('Ip') }}</label>
                        <input type="text" class="form-control" id="ip" name="ip" placeholder="{{ __('Ip') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="imei" class="form-label">{{ __('Imei') }}</label>
                        <input type="text" class="form-control" id="imei" name="imei" placeholder="{{ __('Imei') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('Phone') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <select class="form-select" id="status" name="status" data-v="required" required>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
                        </select>
                        <label for="status" class="form-label">{{ __('Status') }}</label>
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

<!-- Edit Sim Modal -->
<div class="modal fade" id="editSimModal" tabindex="-1" aria-labelledby="editSimLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editSimForm" method="POST">
            <div class="modal-content" dir="{{ app()->isLocale('ar') ? 'rtl' : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSimLabel">{{ __('Edit Sim') }}</h5>
                    <button type="button" class="btn btn-light btn-close {{ app()->isLocale('ar') ? 'ms-0 me-auto' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id" required>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <input type="text" class="form-control" id="edit_name" name="name" placeholder="{{ __('Name') }}" data-v="required" required>
                        <label for="edit_name" class="form-label">{{ __('Name') }}</label>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="edit_ip" class="form-label">{{ __('Ip') }}</label>
                        <input type="text" class="form-control" id="edit_ip" name="ip" placeholder="{{ __('Ip') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="edit_imei" class="form-label">{{ __('Imei') }}</label>
                        <input type="text" class="form-control" id="edit_imei" name="imei" placeholder="{{ __('Imei') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="edit_phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" class="form-control" id="edit_phone" name="phone" placeholder="{{ __('Phone') }}" data-v="required" required>
                    </div>
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <select class="form-select" id="edit_status" name="status" data-v="required" required>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
                        </select>
                        <label for="edit_status" class="form-label">{{ __('Status') }}</label>
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

<script src="https://cdn.socket.io/4.7.5/socket.io.min.js"></script>

<script type="text/javascript">
        var table;
        // Start of checkboxes
        var selectedIds = [];
        var ids = [];
        let isCheckAllTrigger = false;
        // End of checkboxes

        function editSim(id) {
            $('#loading').show();

            $.ajax({
                url: '/sim/' + id,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                sim = data.data;
                console.log(sim);
                $('#edit_id').val(sim.id);
                $('#edit_name').val(sim.name);
                $('#edit_status').val(sim.status).trigger('change');

                $('#loading').hide();
                $('#editSimModal').modal('show');
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
    function changeIp(simId) {
        Swal.fire({
            title: 'Change Modem IP',
            text: 'Enter the new IP address for this modem:',
            input: 'text',
            inputAttributes: { autocapitalize: 'off' },
            showCancelButton: true,
            confirmButtonText: 'Change IP',
            showLoaderOnConfirm: true,
            preConfirm: (newIp) => {
                return $.ajax({
                    url: `/api/sims/${simId}/change-ip`, // Use your actual API route
                    type: 'POST',
                    data: { new_ip: newIp },
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } // Ensure CSRF token if needed for web routes
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Swal.showValidationMessage(`Request failed: ${jqXHR.responseJSON.error || errorThrown}`);
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `Success!`,
                    text: result.value.message + ' The agent will now attempt the change.',
                });
                // The dashboard will update once the agent reports back.
            }
        });
    }

        function deleteSim(id) {
            confirmDelete({
                id: id,
                url: '/sim',
                table: table
            });
        }

        function restoreSim(id) {
            confirmRestore({
                id: id,
                url: '/sim',
                table: table
            });
        }

        // function showContextMenu(id, x, y) {

        //     var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
        //         .append('<li><a onclick="editSim(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
        //         .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
        //         .append('<li><a onclick="deleteSim(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');


        //     contextMenu.css({
        //         top: y,
        //         left: x
        //     });


        //     $('body').append(contextMenu);

        //         $(document).on('click', function() {
        //         $('.context-menu').remove();
        //         });
        // }
        function showContextMenu(id, x, y) {
            var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
                .append('<li><a onclick="editSim(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
                .append('<li><a onclick="changeIp(' + id + ')"><i class="tf-icons mdi mdi-ip-network-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Change IP") }}</a></li>')
                .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
                .append('<li><a onclick="deleteSim(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');
            contextMenu.css({ top: y, left: x });
            $('body').append(contextMenu);
            $(document).on('click', function() { $('.context-menu').remove(); });
        }


    $(document).ready(function() {
            table = $('#table').DataTable({
                pageLength: 100,
                language: {
                    "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                    "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
                },
                ajax: {
                    url: "{{ route('sims') }}",
                    data: function(d) {
                        d.type = $('#selectType').val();
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
                { data: 'id', name: '#', orderable: false, searchable: false, render: (d) => `<input type="checkbox" class="form-check-input rounded-2 check-item" value="${d}">` },
                { data: 'id', name: '{{__("Id")}}'},
                { data: 'station_id', name: '{{__("Station")}}'}, // Corrected to get station name
                { data: 'name', name: '{{__("Name")}}'},
                { data: 'provider_name', name: '{{__("Provider")}}', render: (d,t,r) => `<span id="provider-${r.id}" class="fw-bold">${d || '-'}</span>`},
                { data: 'ip', name: '{{__("Ip")}}', render: (d,t,r) => `<span id="ip-${r.id}">${d}</span>`},
                { data: 'signal_strength', name: '{{__("Signal")}}', orderable: false, searchable: false,
                  render: (d,t,r) => `<span id="signal-${r.id}" class="d-flex align-items-center"><img src="/assets/res/signal-0.svg" style="height:20px;" class="me-1" /> <span>-</span></span>`
                },
                { data: 'network_type', name: '{{__("Network")}}', orderable: false, searchable: false,
                  render: (d,t,r) => `<span id="network-${r.id}" class="badge bg-secondary">Offline</span>`
                },
                { data: 'connection_status', name: '{{__("Connection")}}', orderable: false, searchable: false,
                  render: (d,t,r) => `<span id="connection-${r.id}"><img src="/res/wan_disable.png" style="height:20px;" /></span>`
                },
                { data: 'unread_messages', name: '{{__("Unread")}}', orderable: false, searchable: false,
                  render: (d,t,r) => `<span id="unread-${r.id}" class="badge bg-secondary">${d || 0}</span>`
                },
                { data: 'imei', name: '{{__("Imei")}}'},
                { data: 'phone', name: '{{__("Phone")}}'},
                { data: 'status', name: '{{__("Status")}}'},
                { data: 'last_seen_at', name: '{{__("Last Seen")}}', render: (d,t,r) => `<span id="last_seen-${r.id}">${d ? new Date(d).toLocaleString() : 'Never'}</span>` },
                { data: 'actions', name: '{{__("Actions")}}', orderable: false, searchable: false }
            ],

                order: [[8, 'desc']], // Default order by created_at column

                rowCallback: function(row, data) {
                    $(row).attr('id', 'sim_' + data.id);

                    // $(row).on('dblclick', function() {
                    //     window.location.href = "{{ url('sim') }}/" + data.id;
                    // });

                    $(row).on('contextmenu', function(e) {
                        e.preventDefault();
                        showContextMenu(data.id, e.pageX, e.pageY);
                    });

                    // Start of checkboxes
                    var $checkbox = $(row).find('.check-item');
                    var simId = parseInt($checkbox.val());

                    if (selectedIds.includes(simId)) {
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

            $('#createSimForm').submit(function(event) {
                event.preventDefault();
                $('#createSimModal').modal('hide');

                if (!$(this).valid()) {
                    $('#createSimModal').modal('show');
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
                        $('#createSimForm')[0].reset();
                        $('#createSimForm .form-control').removeClass('valid');
                        $('#createSimForm .form-select').removeClass('valid');
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

            $('#editSimForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id').val();
                console.log(id);

                $.ajax({
                    url: "{{ route('sim.update', ':id') }}".replace(':id', id),
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

            let webSocket = null;

            function connectWebSocket() {
                // 1. Build the correct URL with query parameters
                // The Blade template variable is still perfect for this.
                const gatewayUrl = "{{ config('app.gateway_url') }}";
                const fullUrl = `${gatewayUrl}?clientType=dashboard`;

                console.log(`Attempting to connect to WebSocket Gateway at ${fullUrl}`);

                // 2. Instantiate a native WebSocket object
                webSocket = new WebSocket(fullUrl);

                // 3. Handle the 'open' event (equivalent to Socket.IO's 'connect')
                webSocket.onopen = (event) => {
                    console.log('✅ Dashboard connected to WebSocket Gateway.');
                };

                // 4. Handle the 'message' event (this receives ALL messages from the server)
                webSocket.onmessage = (event) => {
                    try {
                        // The PHP server sends a JSON string: { "event": "...", "payload": {...} }
                        const data = JSON.parse(event.data);

                        console.log('Received message:', data);

                        // We must check the event name to know what to do.
                        // Your PHP server sends 'dashboard_event' for broadcasts.
                        if (data.event === 'dashboard_event') {
                            // The actual data we need is inside the 'payload' property.
                            const sim = data.payload;

                            // --- The rest of your UI update logic is EXACTLY THE SAME ---
                            if (!sim || !sim.id) return;

                            $(`#provider-${sim.id}`).text(sim.provider_name || 'N/A');
                            $(`#ip-${sim.id}`).text(sim.ip || 'N/A');

                            // Note: 'signal_strength' from your agent is now 'signalBars'. Adjust if needed.
                            const signalLevel = Math.min(5, Math.max(0, parseInt(sim.signalBars, 10) || 0));
                            const signalImg = `/assets/res/signal-${signalLevel}.svg`;
                            $(`#signal-${sim.id} img`).attr('src', signalImg);
                            $(`#signal-${sim.id} span`).text(`${sim.Rat}`); // 'rat' is now 'Rat'

                            const netElem = $(`#network-${sim.id}`);
                            netElem.text(sim.networkType || 'Offline');
                            // Check for 4G/LTE in networkType string
                            const netColor = sim.networkType.toLowerCase().includes('4g') || sim.networkType.toLowerCase().includes('lte') ? 'bg-label-success' : 'bg-label-primary';
                            netElem.removeClass('bg-label-secondary bg-label-primary bg-label-success').addClass(netColor);

                            const connImg = sim.connectionStatus === 'Connected' ? '/res/wan_enable.png' : '/res/wan_disable.png';
                            $(`#connection-${sim.id} img`).attr('src', connImg);

                            const unreadElem = $(`#unread-${sim.id}`);
                            unreadElem.text(sim.unreadMessages);
                            unreadElem.removeClass('bg-secondary bg-danger').addClass(sim.unreadMessages > 0 ? 'bg-danger' : 'bg-secondary');

                            // The Laravel backend should send a properly formatted date string for 'last_seen_at'
                            $(`#last_seen-${sim.id}`).text(new Date(sim.last_seen_at).toLocaleString());
                        }

                    } catch (e) {
                        console.error('Error parsing message from WebSocket:', e, 'Raw data:', event.data);
                    }
                };

                // 5. Handle the 'close' event (equivalent to Socket.IO's 'disconnect')
                webSocket.onclose = (event) => {
                    console.warn('❌ WebSocket disconnected. Reconnecting in 5 seconds...');
                    // Simple reconnection logic
                    setTimeout(connectWebSocket, 5000);
                };

                // 6. Handle the 'error' event (for logging connection issues)
                webSocket.onerror = (error) => {
                    console.error('WebSocket connection error:', error);
                    // The 'onclose' event will usually be called immediately after an error,
                    // which will trigger the reconnection logic.
                };
            }

        connectWebSocket();


        // function connectSocketIO() {
        //     const gatewayIp = "{{ config('app.gateway_url') }}"; // e.g. wss://127.0.0.1:8080
        //     const socket = io(gatewayIp, {
        //         query: { clientType: 'dashboard' },
        //         transports: ['websocket'], // optional: force WS only
        //     });

        //     socket.on('connect', () => {
        //         console.log('✅ Dashboard connected to Socket.IO Gateway.');
        //     });

        //     socket.on('sim.status.updated', (sim) => {
        //         console.log('sim.status.updated', sim);
        //         if (!sim || !sim.id) return;

        //         $(`#provider-${sim.id}`).text(sim.provider_name || 'N/A');
        //         $(`#ip-${sim.id}`).text(sim.ip || 'N/A');

        //         const signalLevel = Math.min(5, Math.max(0, parseInt(sim.signal_strength, 10) || 0));
        //         const signalImg = `/assets/res/signal-${signalLevel}.svg`;
        //         $(`#signal-${sim.id} img`).attr('src', signalImg);
        //         $(`#signal-${sim.id} span`).text(`${sim.rat}`);

        //         const netElem = $(`#network-${sim.id}`);
        //         netElem.text(sim.network_type || 'Offline');
        //         const netColor = sim.network_type.includes('4G') || sim.network_type.includes('LTE') ? 'bg-label-success' : 'bg-label-primary';
        //         netElem.removeClass('bg-label-secondary bg-label-primary bg-label-success').addClass(netColor);

        //         const connImg = sim.connection_status === 'Connected' ? '/res/wan_enable.png' : '/res/wan_disable.png';
        //         $(`#connection-${sim.id} img`).attr('src', connImg);

        //         const unreadElem = $(`#unread-${sim.id}`);
        //         unreadElem.text(sim.unread_messages);
        //         unreadElem.removeClass('bg-secondary bg-danger').addClass(sim.unread_messages > 0 ? 'bg-danger' : 'bg-secondary');

        //         $(`#last_seen-${sim.id}`).text(new Date(sim.last_seen_at).toLocaleString());
        //     });

        //     socket.on('disconnect', () => {
        //         console.warn('❌ Socket.IO disconnected. Reconnecting in 5 seconds...');
        //         setTimeout(connectSocketIO, 5000);
        //     });

        //     socket.on('connect_error', (err) => {
        //         console.error('Socket.IO connection error:', err);
        //     });
        // }

        // connectSocketIO();
    });
</script>

@endsection

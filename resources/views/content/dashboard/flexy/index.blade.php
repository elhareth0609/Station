@extends('layouts.app')
@section('title', __('Flexy Top-Up'))


@section('content')


<div class="row">
    <!-- Main Action Panel -->
    <div class="col-lg-7 mb-4">
        <div class="ui-card h-100">
            <div class="ui-card-header">{{ __('Send Flexy Top-Up') }}</div>
            <form id="flexy-form">
                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone-number" class="form-label fw-semibold text-secondary mb-1">{{ __('Client Phone Number') }}</label>
                    <div class="input-group-wrapper">
                        <input type="tel" class="ui-input" id="phone-number" placeholder="0X XX XX XX XX" required autocomplete="off">
                        <img id="operator-icon" src="/assets/img/providers/unknown.svg" alt="Operator">
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-4">
                    <label for="amount-input" class="form-label fw-semibold text-secondary mb-1">{{ __('Amount (DZD)') }}</label>
                    <input type="number" class="ui-input ps-3" id="amount-input" placeholder="Select or type an amount" required>
                </div>

                <!-- Quick Amount Selection -->
                <div class="mb-4">
                    <div class="amount-grid">
                        <button type="button" class="amount-btn" data-amount="100">100</button>
                        <button type="button" class="amount-btn" data-amount="200">200</button>
                        <button type="button" class="amount-btn" data-amount="500">500</button>
                        <button type="button" class="amount-btn" data-amount="1000">1000</button>
                        <button type="button" class="amount-btn" data-amount="2000">2000</button>
                    </div>
                </div>

                <!-- Hidden provider name -->
                <input type="hidden" id="provider-name" name="provider">

                <!-- Submit Button -->
                <div class="d-grid mt-5">
                    <button type="submit" id="transfer-button" class="ui-button-primary" disabled>
                        <span id="transfer-text">{{ __('Enter Phone & Amount') }}</span>
                        <div id="transfer-spinner" class="spinner-border spinner-border-sm d-none" role="status"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Transaction History Panel -->
    <div class="col-lg-5 mb-4">
        <div class="ui-card h-100">
            <div class="ui-card-header">{{ __('Recent Transactions') }}</div>
            <div class="table-responsive">
                <table class="ui-table">
                    <thead>
                        <tr>
                            <th>{{__("Client")}}</th>
                            <th>{{__("Amount")}}</th>
                            <th>{{__("Status")}}</th>
                            <th>{{__("Time")}}</th>
                        </tr>
                    </thead>
                    <tbody id="transactions-tbody">
                        @forelse($transactions as $tx)
                            <tr id="tx-row-{{ $tx->id }}">
                                <td>{{ $tx->client_phone }}</td>
                                <td>{{ number_format($tx->amount) }}</td>
                                <td id="tx-status-{{ $tx->id }}"><span class="badge bg-{{ $tx->status == 'completed' ? 'success' : ($tx->status == 'rejected' ? 'danger' : 'warning') }}">{{ $tx->status }}</span></td>
                                <td id="tx-duration-{{ $tx->id }}">
                                    @if($tx->total_duration_seconds !== null)
                                        <span class="text-muted">{{ $tx->total_duration_seconds }}s</span>
                                    @else
                                        <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-5">{{__('No recent transactions.')}}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>

    /* Card styling */
    .ui-card {
        background-color: #ffffff;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .ui-card-header {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937; /* Dark gray text */
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Form input styling */
    .input-group-wrapper {
        position: relative;
    }

    .ui-input {
        width: 100%;
        padding: 0.75rem 1rem;
        padding-left: 3rem; /* Make space for the icon */
        font-size: 1rem;
        color: #374151;
        background-color: #f9fafb;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .ui-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgb(59 130 246 / 0.3);
    }

    #operator-icon {
        position: absolute;
        top: 50%;
        left: 0.75rem; /* Position icon on the left */
        transform: translateY(-50%);
        height: 28px;
        width: 28px;
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        opacity: 0.3;
    }

    #phone-number:focus + #operator-icon {
        transform: translateY(-50%) scale(1.1);
    }

    /* Amount buttons styling */
    .amount-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 0.75rem;
    }
    .amount-btn {
        background-color: #f3f4f6;
        color: #374151;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 0.6rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s, color 0.2s, border-color 0.2s;
    }
    .amount-btn:hover {
        background-color: #e5e7eb;
    }
    .amount-btn.active {
        background-color: #3b82f6;
        color: #ffffff;
        border-color: #3b82f6;
    }

    /* Main action button styling */
    .ui-button-primary {
        width: 100%;
        padding: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        color: #ffffff;
        background-color: #3b82f6;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .ui-button-primary:hover {
        background-color: #2563eb;
    }
    .ui-button-primary:disabled {
        background-color: #9ca3af;
        cursor: not-allowed;
    }

    /* Transaction table styling */
    .ui-table {
        width: 100%;
        border-collapse: collapse;
    }
    .ui-table th, .ui-table td {
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    .ui-table th {
        font-size: 0.75rem;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .ui-table td {
        font-size: 0.875rem;
        color: #374151;
    }
    .ui-table tbody tr:hover {
        background-color: #f9fafb;
    }
</style>

<script>
$(document).ready(function() {
    // --- UI Elements ---
    const phoneInput = $('#phone-number');
    const amountInput = $('#amount-input');
    const operatorIcon = $('#operator-icon');
    const providerNameInput = $('#provider-name');
    const transferBtn = $('#transfer-button');
    const transferText = $('#transfer-text');
    const transferSpinner = $('#transfer-spinner');
    const amountButtons = $('.amount-btn');
    const transactionsTbody = $('#transactions-tbody');

    // --- Configuration ---
    const stationCode = 'aa'; // Default station for demo
    const providers = {
        '05': { name: 'Ooredoo', icon: '/assets/img/providers/ooredoo.png' },
        '06': { name: 'Mobilis', icon: '/assets/img/providers/mobilis.png' },
        '07': { name: 'Djezzy', icon: '/assets/img/providers/djezzy.png' }
    };

    // --- Functions ---
    function validateForm() {
        const phone = phoneInput.val();
        const amount = amountInput.val();
        const provider = providerNameInput.val();

        const isValid = phone.length >= 10 && amount > 0 && provider;
        transferBtn.prop('disabled', !isValid);

        if (isValid) {
            transferText.text(`{{__('Send')}} ${amount} DZD {{__('to')}} ${phone}`);
        } else {
            transferText.text('{{ __('Enter Phone & Amount') }}');
        }
    }

    function updateTransactionRow(tx) {
        let row = $(`#tx-row-${tx.id}`);
        // If row doesn't exist, prepend a new one
        if (row.length === 0) {
            const newRowHtml = `
                <tr id="tx-row-${tx.id}">
                    <td>${tx.client_phone}</td>
                    <td>${Number(tx.amount).toLocaleString()}</td>
                    <td id="tx-status-${tx.id}"></td>
                    <td id="tx-duration-${tx.id}"></td>
                </tr>
            `;
            transactionsTbody.prepend(newRowHtml);
            row = $(`#tx-row-${tx.id}`);
        }

        // Update status badge
        const statusBadgeClass = tx.status === 'completed' ? 'bg-success' : (tx.status === 'rejected' ? 'bg-danger' : 'bg-warning');
        $(`#tx-status-${tx.id}`).html(`<span class="badge ${statusBadgeClass}">${tx.status}</span>`);

        // Update duration
        const durationText = tx.total_duration_seconds !== null ? `<span class="text-muted">${tx.total_duration_seconds}s</span>` : `<div class="spinner-border spinner-border-sm text-secondary" role="status"></div>`;
        $(`#tx-duration-${tx.id}`).html(durationText);
    }

    // --- Event Handlers ---
    phoneInput.on('input', function() {
        const prefix = $(this).val().substring(0, 2);
        const provider = providers[prefix];

        if (provider) {
            operatorIcon.attr('src', provider.icon).css('opacity', 1);
            providerNameInput.val(provider.name);
        } else {
            operatorIcon.attr('src', '/assets/img/providers/unknown.svg').css('opacity', 0.3);
            providerNameInput.val('');
        }
        validateForm();
    });

    amountInput.on('input', function() {
        amountButtons.removeClass('active');
        validateForm();
    });

    amountButtons.on('click', function() {
        const amount = $(this).data('amount');
        amountInput.val(amount);
        amountButtons.removeClass('active');
        $(this).addClass('active');
        validateForm();
    });

    $('#flexy-form').on('submit', function(e) {
        e.preventDefault();
        // UI feedback for sending
        transferText.addClass('d-none');
        transferSpinner.removeClass('d-none');
        transferBtn.prop('disabled', true);

        const data = {
            station_code: stationCode,
            phone_number: phoneInput.val(),
            amount: amountInput.val(),
            provider: providerNameInput.val()
        };

        $.ajax({
            url: '{{ url("/api/ussd/create") }}',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                // Instantly add the 'in progress' transaction to the top of the list
                updateTransactionRow(response.data);
                Swal.fire({
                    icon: 'info',
                    title: '{{ __("In Progress") }}',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            },
            error: function(xhr) {
                const error = xhr.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: '{{ __("Error") }}',
                    text: error.message || '{{ __("An unknown error occurred.") }}'
                });
                // Re-enable form on error
                transferText.removeClass('d-none');
                transferSpinner.addClass('d-none');
                validateForm();
            }
        });
    });

    // --- WebSocket Connection ---
    function connectWebSocket() {
        const gatewayIp = '127.0.0.1';
        const ws = new WebSocket(`ws://${gatewayIp}:8080?clientType=dashboard`);

        ws.onmessage = function(event) {
            const message = JSON.parse(event.data);
            // Listen for the transaction update event from Laravel
            if (message.event === 'transaction.updated') {
                updateTransactionRow(message.data);
            }
        };
        // Add onopen, onclose, onerror handlers as before
    }
    // connectWebSocket(); // Uncomment when you have the broadcasting service ready
});
</script>

@endsection

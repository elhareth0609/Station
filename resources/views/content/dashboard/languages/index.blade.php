
@extends('layouts.app')

@section('title', __('Languages'))


 @section('content')


<h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Languages') }}</h1>

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

            <button class="btn btn-icon btn-outline-primary m-1" id="" data-bs-toggle="modal" data-bs-target="#createLanguageModal"><span class="mdi mdi-plus-outline"></span></button>

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
                        <th>{{__("Id")}}</th>
                        <th>{{__("Word")}}</th>
                        @foreach($languages as $lang)
                            <th>{{ strtoupper($lang) }}</th>
                        @endforeach
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

<!-- Create Language Modal -->
<div class="modal fade" id="createLanguageModal" tabindex="-1" aria-labelledby="createLanguageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="createLanguageForm" action="{{route('language.create')}}" method="POST">
            <div class="modal-content" dir="{{ app()->isLocale('ar') ? 'rtl' : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLanguageLabel">{{ __('Create Language') }}</h5>
                    <button type="button" class="btn btn-light btn-close {{ app()->isLocale('ar') ? 'ms-0 me-auto' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <label for="word" class="form-label">{{ __('Word') }}</label>
                        <input type="text" class="form-control" id="word" name="word" placeholder="{{ __('Word') }}" data-v="required" required>
                    </div>
                    @foreach($languages as $lang)
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <input type="text" class="form-control" id="translation_{{ $lang }}" name="translations[{{ $lang }}]" placeholder="{{ __('Translation') }}" required>
                        <label for="translation_{{ $lang }}" class="form-label">{{ __('Translation') }} ({{ strtoupper($lang) }})</label>
                    </div>
                @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Language Modal -->
<div class="modal fade" id="editLanguageModal" tabindex="-1" aria-labelledby="editLanguageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editLanguageForm" method="POST">
            <div class="modal-content" dir="{{ app()->isLocale('ar') ? 'rtl' : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLanguageLabel">{{ __('Edit Language') }}</h5>
                    <button type="button" class="btn btn-light btn-close {{ app()->isLocale('ar') ? 'ms-0 me-auto' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                        <input type="text" class="form-control" id="edit_word" name="word" placeholder="{{ __('Word') }}" data-v="required" required>
                        <label for="edit_word" class="form-label">{{ __('Word') }}</label>
                    </div>
                    @foreach($languages as $lang)
                        <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }} mb-3">
                            <input type="text" class="form-control" id="edit_translation_{{ $lang }}" name="translations[{{ $lang }}]" placeholder="{{ __('Translation') }}" required>
                            <label for="edit_translation_{{ $lang }}" class="form-label">{{ __('Translation') }} ({{ strtoupper($lang) }})</label>
                        </div>
                    @endforeach
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

        function editLanguage(word) {
            console.log(word);

            $('#loading').show();

            $.ajax({
                url: '/language/' + word,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                language = data.data;
                console.log(language);

                $('#edit_word').val(language[0]);

                const translations = language[1];
                for (const [lang, translation] of Object.entries(translations)) {
                    $(`#edit_translation_${lang}`).val(translation);
                }

                $('#loading').hide();
                $('#editLanguageModal').modal('show');
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

        function deleteLanguage(word) {
            console.log(word);
            confirmDelete({
                id: word,
                url: '/language',
                table: table
            });
        }

        function showContextMenu(id, x, y) {

            var contextMenu = $('<ul class="context-menu" dir="{{ app()->isLocale("ar") ? "rtl" : "" }}"></ul>')
                .append('<li><a onclick="editLanguage(' + id + ')"><i class="tf-icons mdi mdi-pencil-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Edit") }}</a></li>')
                .append('<li class="px-0 pe-none"><div class="divider border-top my-0"></div></li>')
                .append('<li><a onclick="deleteLanguage(' + id + ')"><i class="tf-icons mdi mdi-trash-can-outline {{ app()->isLocale("ar") ? "ms-1" : "me-1" }}"></i>{{ __("Delete") }}</a></li>');


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
                language: {
                    "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                    "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
                },
                ajax: {
                    url: "{{ route('languages') }}",
                },
                columns: [
                    {data: 'id', name: '{{__("Id")}}'},
                    {data: 'word', name: '{{__("Word")}}'},
                    @foreach($languages as $lang)
                        { data: '{{ $lang }}', name: '{{ $lang }}' },
                    @endforeach
                    {data: 'actions', name: '{{__("Actions")}}', orderable: false, searchable: false}
                ],

                rowCallback: function(row, data) {
                    $(row).attr('id', 'language_' + data.id);

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

            $('#createLanguageForm').submit(function(event) {
                event.preventDefault();
                $('#createLanguageModal').modal('hide');

                if (!$(this).valid()) {
                    $('#createLanguageModal').modal('show');
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
                        $('#createLanguageForm')[0].reset();
                        $('#createLanguageForm .form-control').removeClass('valid');
                        $('#createLanguageForm .form-select').removeClass('valid');
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

            $('#editLanguageForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_word').val();

                $.ajax({
                    url: "{{ route('language.update', ':id') }}".replace(':id', id),
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
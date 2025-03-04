@extends('layouts.app')

@section('title', __('Select'))

@section('content')

<h1 class="h3 mb-4 text-gray-800" dir="{{ app()->getLocale() == "ar" ? "rtl" : "" }}">{{ __('Select') }}</h1>

<div class="row mb-4">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Basic usage with existing select options:') }}</h5>
            </div>
            <div class="card-body">
                <code>
                    new SearchableSelect({
                        selectId: 'edit_category_id'
                    });
                </code>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }}">
                    <select class="form-select" id="item_id1">
                        <option value="">{{ __('Select Item') }}</option>
                    </select>
                </div>
                <script>
                    new SearchableSelect({
                        selectId: 'item_id1'
                    })
                </script>
            </div>
        </div>
    </div>
</div>


<div class="row mb-4">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('With URL fetch:') }}</h5>
            </div>
            <div class="card-body">
                <code>
                    new SearchableSelect({
                        selectId: 'item_id2',
                        url: '/items',
                        method: 'GET',
                        csrfToken: '...'
                    });
                </code>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }}">
                    <select class="form-select" id="item_id2">
                        <option value="">{{ __('Select Item') }}</option>
                    </select>
                </div>
                <script>
                    new SearchableSelect({
                        selectId: 'item_id2',
                        url: '/categories/all',
                        method: 'GET',
                        csrfToken: csrfToken
                    })
                </script>
            </div>
        </div>
    </div>
</div>


<div class="row mb-4">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('With custom option rendering:') }}</h5>
            </div>
            <div class="card-body">
                <code>
                    new SearchableSelect({
                        selectId: 'item_id3',
                        renderOption: (option) => `
                            <div class="d-flex align-items-center">
                                <img src="${option.image}" class="me-2" width="20" height="20">
                                <span>${option.name}</span>
                            </div>
                        `
                    });
                </code>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group form-group-floating {{ app()->getLocale() == "ar" ? "input-rtl" : "" }}">
                    <select class="form-select" id="item_id3">
                        <option value="">{{ __('Select Item') }}</option>
                        <option data-image="{{ asset('assets/img/photos/foods/fresh-tasty-burger-2021-08-29-04-51-34-utc 1.png') }}" value="1">ssssssssss</option>
                    </select>
                </div>
                <script>
                    new SearchableSelect({
                        selectId: 'item_id3',
                        renderOption: (option) => `
                            <div class="d-flex align-items-center">
                                <img src="${option.image}" class="me-2" width="20" height="20">
                                <span>${option.name}</span>
                            </div>
                        `
                    });
                </script>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        tinymce.init({
            selector: 'textarea[name="content"]',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | Save',
            setup: function (editor) {
                editor.ui.registry.addButton('save', {
                    text: 'Save',
                    onAction: function () {
                    $('textarea[name="content"]').val(editor.getContent());
                    $('#contentForm').submit();
                    }
                });
            }
        });

        $('#contentForm').submit(function(event) {
            event.preventDefault();

            $('#loading').show();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                dataType: "json",
                contentType: false, // Don't set content type (let browser handle it)
                processData: false, // Don't process data (let browser handle it)
                success: function(response) {
                    $('#loading').hide();
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok",lang)
                    });
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
        });

    });
</script>

@endsection
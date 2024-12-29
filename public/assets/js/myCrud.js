function confirmDelete(config) {
    const { id, url, table } = config;

    Swal.fire({
        title: __("Do you really want to delete this Item?", lang),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: __("Submit", lang),
        cancelButtonText: __("Cancel", lang),
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url + '/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                    if (table) {
                        table.ajax.reload();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    const response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                }
            });
        }
    });
}

function confirmRestore(config) {
    const { id, url, table } = config;

    Swal.fire({
        title: __("Do you really want to Restore this Item?", lang),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: __("Submit", lang),
        cancelButtonText: __("Cancel", lang),
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url + '/' + id + '/restore',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                    if (table) {
                        table.ajax.reload();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    const response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: response.icon,
                        title: response.state,
                        text: response.message,
                        confirmButtonText: __("Ok", lang)
                    });
                }
            });
        }
    });
}

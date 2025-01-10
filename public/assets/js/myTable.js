// Component: Handle Length Change
function initLengthChange(table) {
    $('#dataTables_my_length').change(function () {
        var selectedValue = $(this).val();
        table.page.len(selectedValue).draw();
    });
}

// Component: Handle Search Filter
function initSearchFilter(table) {
    $('#dataTables_my_filter').on('input', function () {
        var query = $(this).val();
        table.search(query).draw();
    });
}

// Component: Handle Type Change
function initTypeChange(table) {
    $('#selectType').change(function () {
        table.ajax.reload();
    });
}

// Component: Handle Trash Button Toggle
function initTrashButton(table) {
    $('#trash-button').on('click', function () {
        const isTrashed = $(this).data('trashed') === 1;
        $(this).data('trashed', isTrashed ? 0 : 1);

        $(this).toggleClass('btn-danger btn-outline-danger');
        table.ajax.reload();
    });
}

//checkAndLoadLottie
function checkAndLoadLottie(table) {
    loademptyTableLottieAnimation();
}

// Component: Handle Pagination
function handlePagination(table) {
    checkAndLoadLottie(table)
    const info = table.page.info();
    const pagination = $('#dataTables_my_paginate');
    pagination.empty();

    // Create Previous Button
    const prevButton = createPaginationButton('&lsaquo;', !info.page, function () {
        table.page('previous').draw('page');
    });
    pagination.append(prevButton);

    // Create Page Numbers
    for (let i = 0; i < info.pages; i++) {
        const isActive = i === info.page;
        const pageButton = createPaginationButton(i + 1, !isActive, function () {
            table.page(i).draw('page');
        });
        if (isActive) {
            pagination.append(pageButton);
        }
    }

    // Create Next Button
    const nextButton = createPaginationButton('&rsaquo;', info.page >= info.pages - 1, function () {
        table.page('next').draw('page');
    });
    pagination.append(nextButton);
}

// Helper: Create Pagination Button
function createPaginationButton(content, isDisabled, onClick) {
    const button = $('<li>')
        .addClass('page-item')
        .toggleClass('disabled', isDisabled)
        .append(
            $('<a>')
                .addClass('page-link btn btn-icon mx-1')
                .attr('href', 'javascript:void(0);')
                .html(content)
        );

    if (!isDisabled) {
        button.click(onClick);
    }
    return button;
}

// Component: Update Sorting Icons
function updateSortingIcons(table) {
    $('#table thead th').each(function () {
        $(this).find('.sort-icon').remove();
    });

    const order = table.order();
    if (order.length > 0) {
        const columnIndex = order[0][0];
        const direction = order[0][1];
        const header = $($('#table thead th')[columnIndex]);

        if (direction === 'asc') {
            header.append(ascIcon);
        } else if (direction === 'desc') {
            header.append(descIcon);
        }
    }
}

// Component: Update Info Text
function updateInfoText(table) {
    const info = table.page.info();
    const startRange = info.start + 1;
    const endRange = info.start + info.length;
    const pageInfo = `${startRange} ${__("to", lang)} ${endRange} ${__("from", lang)} ${info.recordsTotal}`;
    $('#dataTables_my_info').text(pageInfo);
}

// Component: Column Visibility Toggle
function initColumnVisibilityToggle(table) {
    table.columns().every(function () {
        const column = this;
        const columnName = $(column.header()).text() || '#';
        const columnIndex = column.index();

        // Append the checkbox to the dropdown
        $('#columns_filter_dropdown').append(
            `<li>
                <label>
                    <input type="checkbox" class="form-check-input column-toggle" data-column="${columnIndex}" checked>
                    ${columnName}
                </label>
            </li>`
        );
    });

    // $('#columns_filter_dropdown').on('change', '.column-toggle', function () {
    //     const column = table.column($(this).data('column'));
    //     column.visible(!column.visible());
    // });

    $('#columns_filter_dropdown').on('change', '.column-toggle', function() {
        var column = table.column($(this).data('column'));
        var isChecked = $(this).is(':checked');
        column.visible(isChecked);
    });
}

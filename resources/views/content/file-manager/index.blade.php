@extends('layout.app')

{{-- @section('styles') --}}
{{-- @endsection --}}
@section('title', __('File Manager'))

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>My Files</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        <i class="fas fa-upload"></i> Upload File
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#folderModal">
                        <i class="fas fa-folder-plus"></i> New Folder
                    </button>
                </div>
            </div>
            
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('file-manager') }}">Home</a>
                    </li>
                    @if($currentFolder)
                        @php
                            $ancestors = collect([]);
                            $parent = $currentFolder;
                            while($parent) {
                                $ancestors->prepend($parent);
                                $parent = $parent->parent;
                            }
                        @endphp
                        
                        @foreach($ancestors as $ancestor)
                            <li class="breadcrumb-item">
                                <a href="{{ route('file-manager', ['folder_id' => $ancestor->id]) }}">
                                    {{ $ancestor->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="file" class="form-control" required>
                    <input type="hidden" name="folder_id" value="{{ request()->query('folder_id') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- New Folder Modal -->
<div class="modal fade" id="folderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('folders.create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" placeholder="Folder Name" required>
                    <input type="hidden" name="parent_id" value="{{ request()->query('folder_id') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}

<script>
    var table;
$(document).ready(function() {
    table = $('#table').DataTable({
            pageLength: 100,
            language: {
                "emptyTable": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>",
                "zeroRecords": "<div id='no-data-animation' style='width: 100%; height: 200px;'></div>"
            },
            ajax: {
                url: "{{ route('file-manager') }}",
                data: function(d) {
                    d.folder_id = '{{ request()->query("folder_id") }}';
                }
            },
            columns: [
                { data: 'icon', name: 'icon', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'size', name: 'size' },
                {data: 'created_at', name: '{{__("Created At")}}',},
                {data: 'actions', name: '{{__("Actions")}}', orderable: false, searchable: false,}
            ],
            order: [[1, 'asc']],

        drawCallback: function() {
            // Bind delete buttons
            $('.delete-btn').click(function() {
                const id = $(this).data('id');
                const type = $(this).data('type');
                const url = type === 'folder' 
                    ? `{{ route('folders.destroy', '') }}/${id}`
                    : `{{ route('files.destroy', '') }}/${id}`;

                if (confirm('Are you sure you want to delete this ' + type + '?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            table.ajax.reload();
                        }
                    });
                }
            });
        }
    });
});
</script>
@endsection
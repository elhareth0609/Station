@extends('layouts.app')

@section('title', __('Modals'))

@section('content')

<div class="d-flex mb-4">
    <h2 class="fw-bold">{{ __('Models Versions') }}</h2>
</div>

<div class="d-flex mb-3">
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#modelV1">
        Model V1
    </button>
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#modelV2">
        Model V2
    </button>
</div>

  <!-- Model V1 -->
  <div class="modal fade" id="modelV1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Model V1</h1>
          <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Model V2 -->
    <div class="modal fade" id="modelV2" tabindex="-1" aria-labelledby="modelV2Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modelV2Label">Model V2</h1>
              <button type="button" class="btn border bg-white btn-icon my-btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="my my-close"></span></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>












<div class="d-flex mb-4">
    <h2 class="fw-bold">{{ __('Upload Modals Versions') }}</h2>
</div>

<div class="d-flex mb-3">
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#uploadModal1">
        Model V1
    </button>
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#uploadModal2">
        Model V2
    </button>
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#uploadModal3">
        Model V3
    </button>
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#uploadModal4">
        Model V4
    </button>
</div>

<div class="d-flex mb-4">
    <h2 class="fw-bold">{{ __('Photo Modals') }}</h2>
</div>

<div class="d-flex mb-3">
    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#photoModal1">
        Upload 1
    </button>
</div>


    <style>
        .progress {
            height: 8px;
        }
    </style>
    
    <!-- Modal Pro Upload -->
    <div class="modal fade" id="uploadModal1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content upload-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Media Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Add your documents here, and you can upload up to 5 files max</p>
    
                    <form action="/upload" class="dropzone border-dashed rounded bg-white d-flex align-items-center justify-content-center border-primary border-2 p-4" id="dropzone1">
                        <div class="dz-message">
                            <span class="mdi mdi-cloud-upload text-primary fs-1"></span>
                            <h5>Drag your file(s) to start uploading</h5>
                            <p class="text-muted">OR</p>
                            <button type="button" class="btn btn-outline-primary">Browse files</button>
                        </div>
                    </form>
    
                    <div class="mt-3">
                        <small class="text-muted">Only supports .jpg, .png, .svg, and .zip files</small>
                    </div>
    
                    <div id="hidden-previews-container" style="display: none;"></div> <!-- Hidden container for Dropzone previews -->
                    <!-- Upload Progress Items -->
                    <div class="upload-items mt-4"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Small Upload -->
    <div class="modal fade" id="uploadModal2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Media Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="dropzone border-dashed rounded bg-white d-flex align-items-center justify-content-center border-primary border-2 p-4" id="dropzone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pro Small Upload -->
    <div class="modal fade" id="uploadModal3" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content upload-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Media Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Add your documents here, and you can upload up to 5 files max</p>
    
                    <form action="/upload" class="dropzone border-dashed rounded bg-white d-flex align-items-center justify-content-center border-primary border-2 p-4" id="dropzone2">
                        <div class="dz-message">
                            <span class="mdi mdi-cloud-upload text-primary fs-1"></span>
                            <h5>Drag your file(s) to start uploading</h5>
                            <p class="text-muted">OR</p>
                            <button type="button" class="btn btn-outline-primary">Browse files</button>
                        </div>
                    </form>
    
                    <div class="mt-3">
                        <small class="text-muted">Only supports .jpg, .png, .svg, and .zip files</small>
                    </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Prevent Dropzone from automatically discovering elements
        Dropzone.autoDiscover = false;

        var myDropzone1 = new Dropzone("#dropzone1", {
            url: "{{ route('coupons.import') }}",
            autoProcessQueue: true,
            addRemoveLinks: false, // Do not use Dropzone's built-in remove links
            dictDefaultMessage: "{{ __('Drag and drop Excel files here or click to upload') }}",
            dictMaxFilesExceeded: "{{ __('You can only upload one file.') }}",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            previewsContainer: "#hidden-previews-container" // Use hidden container to prevent showing previews in Dropzone
        });

        // Handle file display in the custom list
        myDropzone1.on("addedfile", function(file) {
            const uploadItem = createUploadItem(file);
            document.querySelector('.upload-items').appendChild(uploadItem);

            // Generate a thumbnail if the file is an image
            myDropzone1.on("thumbnail", function(thumbnailFile, dataUrl) {
                if (file === thumbnailFile) {
                    const imgElement = document.querySelector(`[data-file-id="${file.upload.uuid}"] img`);
                    if (imgElement) {
                        imgElement.src = dataUrl; // Display image thumbnail if the file is an image
                    }
                }
            });
        });

        // Update progress for each file in the custom list
        myDropzone1.on("uploadprogress", function(file, progress) {
            const progressBar = document.querySelector(`[data-file-id="${file.upload.uuid}"] .progress-bar`);
            const progressPercentage = document.querySelector(`[data-file-id="${file.upload.uuid}"] .progress-percentage`);

            if (progressBar) {
                progressBar.style.width = `${progress}%`;
            }

            if (progressPercentage) {
                progressPercentage.textContent = `${Math.round(progress)}%`;
            }
        });

        // Handle error by showing bg-danger for the progress bar
        myDropzone1.on("error", function(file, errorMessage) {
            const progressBar = document.querySelector(`[data-file-id="${file.upload.uuid}"] .progress-bar`);
            if (progressBar) {
                progressBar.classList.remove('bg-primary');
                progressBar.classList.add('bg-danger');
            }
        });

        // Custom upload item template for added files
        function createUploadItem(file) {
            const template = `
                <div class="border d-flex align-items-center justify-content-between p-2 my-2 rounded" data-file-id="${file.upload.uuid}">
                    <img src="{{ asset('assets/img/my/defaults/file-zip.png') }}" alt="file-icon" width="40" height="40" class="me-3" />
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <span class="d-block fw-bold my-fs-8">Uploading ${file.name}</span>
                                <div class="my-fs-8">
                                    <span class="progress-percentage">0%</span>
                                    <span>30 seconds remaining</span>
                                </div>
                            </div>
                            <div class="ms-auto d-flex align-items-center">
                                <button class="btn my-h-fit-content rounded-pill p-0 border border-danger bg-danger-subtle mx-1 close-btn" type="button">
                                    <span class="mdi mdi-close text-danger my-fs-7 p-1"></span>
                                </button>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-primary" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            `;

            const div = document.createElement('div');
            div.innerHTML = template;
            const uploadItem = div.firstElementChild;

            // Close button functionality to remove the file from Dropzone and the custom list
            uploadItem.querySelector('.close-btn').addEventListener('click', function() {
                myDropzone1.removeFile(file); // Remove file from Dropzone's tracking
                uploadItem.remove(); // Remove file preview from the custom list
            });

            return uploadItem;
        }









        // Simple Dropzone setup
        var myDropzone = new Dropzone("#dropzone", {
            url: "/upload",
            autoProcessQueue: false,
            // acceptedFiles: '.xlsx,.xls',
            // maxFilesize: 150, // Max file size in MB
            // maxFiles: 1, // Allow only one file
            addRemoveLinks: true,
            // parallelUploads: 1, // Only one upload at a time
            dictDefaultMessage: "{{ __('Drag and drop Excel files here or click to upload') }}",
            dictMaxFilesExceeded: "{{ __('You can only upload one file.') }}", // Error message when max files exceeded
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // Optional: remove the previous file when a new one is added
        // myDropzone.on("addedfile", function() {
        //     if (this.files.length > 1) {
        //         this.removeFile(this.files[0]); // Remove the first file to keep only the latest one
        //     }
        // });

        myDropzone.on("success", function(file, response) {
            // table.ajax.reload();
        });

        myDropzone.on("error", function(file, errorMessage) {
            console.error('Error uploading file:', errorMessage);
        });


        var myDropzone2 = new Dropzone("#dropzone2", {
            url: "/upload",
            autoProcessQueue: true,
            addRemoveLinks: false, // Do not use Dropzone's built-in remove links
            dictDefaultMessage: "{{ __('Drag and drop Excel files here or click to upload') }}",
            dictMaxFilesExceeded: "{{ __('You can only upload one file.') }}",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

                // Optional: remove the previous file when a new one is added
        myDropzone.on("addedfile", function() {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]); // Remove the first file to keep only the latest one
            }
        });

        myDropzone.on("success", function(file, response) {
            // table.ajax.reload();
        });

        myDropzone.on("error", function(file, errorMessage) {
            console.error('Error uploading file:', errorMessage);
        });


</script>
    
   




<div class="d-flex mb-4">
    <h2 class="fw-bold">{{ __('Wizard Modals Versions') }}</h2>
</div>

<div class="d-flex mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#wizardModalV1">
        Model V1
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="wizardModalV1" tabindex="-1" aria-labelledby="wizardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wizardModalLabel">Registration Wizard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left Side - Steps -->
                    <div class="col-md-4">
                        <div class="list-group">
                            <a href="#step1" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">1</div>
                                    Personal Info
                                </div>
                            </a>
                            <a href="#step2" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">2</div>
                                    Contact
                                </div>
                            </a>
                            <a href="#step3" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">3</div>
                                    Account
                                </div>
                            </a>
                            <a href="#step4" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">4</div>
                                    Account
                                </div>
                            </a>
                            <a href="#step5" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">5</div>
                                    Account
                                </div>
                            </a>
                            <a href="#step6" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white p-2 me-3 align-items-center d-flex justify-content-center" style="width: 32px; height: 32px; text-align: center;">6</div>
                                    Account
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Right Side - Content -->
                    <div class="col-md-8">
                        <div class="tab-content">
                            <!-- Step 1 -->
                            <div class="tab-pane fade show active" id="step1">
                                <h5 class="mb-3">Personal Information</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dateOfBirth">
                                    </div>
                                </form>
                            </div>

                            <!-- Step 2 -->
                            <div class="tab-pane fade" id="step2">
                                <h5 class="mb-3">Contact Details</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" rows="3"></textarea>
                                    </div>
                                </form>
                            </div>

                            <!-- Step 3 -->
                            <div class="tab-pane fade" id="step3">
                                <h5 class="mb-3">Account Setup</h5>
                                <form>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
            </div>
        </div>
    </div>
</div>
    
{{-- 
    <style>
        .progress {
            height: 8px;
        }
    </style>

<!-- Modal -->
<div class="modal fade" id="uploadModal1" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content upload-modal">
            <div class="modal-header">
                <h5 class="modal-title">Media Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Add your documents here, and you can upload up to 5 files max</p>
                
                <form action="/upload" class="dropzone border-dashed rounded bg-white d-flex align-items-center justify-content-center border-primary border-2 p-4" id="uploadDropzone">
                    <div class="dz-message">
                        <span class="mdi mdi-cloud-upload text-primary fs-1"></span>
                        <h5>Drag your file(s) to start uploading</h5>
                        <p class="text-muted">OR</p>
                        <button type="button" class="btn btn-outline-primary">Browse files</button>
                    </div>
                </form>
                
                <div class="mt-3">
                    <small class="text-muted">Only support .jpg, .png and .svg and zip files</small>
                </div>
                
                <!-- Upload Progress Items -->
                <div class="upload-items mt-4">
                    <div class="border d-flex align-items-center justify-content-between p-2 my-2 rounded">
                        <img src="{{ asset('assets/img/my/defaults/file-zip.png') }}" alt="file-zip.png" width="40px" height="40px" class="me-3" />
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <div>
                                    <span class="d-block fw-bold my-fs-8">Uploading...</span>
                                    <div class="my-fs-8">
                                        <span>30%</span>
                                        <span>30 seconds remaining</span>
                                    </div>
                                </div>
                                <div class="ms-auto d-flex align-items-center">
                                    <button class="btn my-h-fit-content rounded-pill p-0 border border-secondary bg-secondary-subtle mx-1" type="button">
                                        <span class="mdi mdi-pause text-secondary my-fs-7 p-1"></span>
                                    </button>
                                    <button class="btn my-h-fit-content rounded-pill p-0 border border-danger bg-danger-subtle mx-1" type="button">
                                        <span class="mdi mdi-close text-danger my-fs-7 p-1"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-primary" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="border d-flex align-items-center justify-content-between p-2 my-2 rounded">
                        <img src="{{ asset('assets/img/my/defaults/file-zip.png') }}" alt="file-zip.png" width="40px" height="40px" class="me-3" />
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <div>
                                    <span class="d-block fw-bold my-fs-8">assets.zip</span>
                                    <div class="my-fs-8">
                                        <span>5.3MB</span>
                                    </div>
                                </div>
                                <div class="ms-auto d-flex align-items-center">
                                    <button class="btn my-h-fit-content rounded-pill p-0 border border-secondary bg-secondary-subtle mx-1" type="button">
                                        <span class="mdi mdi-close text-secondary my-fs-7 p-1"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</div>


</div>


<script>
// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('#dropzone1 .dz-default .dz-button').forEach(button => {
//         button.classList.remove('dz-button');
//         button.classList.add('btn', 'btn-outline-primary');
//     });
// });

//         Dropzone.autoDiscover = false;
//         var myDropzone1 = new Dropzone("#dropzone1", {
//             url: "{{ route('coupons.import') }}",
//             autoProcessQueue: false,
//             acceptedFiles: '.xlsx,.xls',
//             maxFilesize: 150, // Max file size in MB
//             maxFiles: 1, // Allow only one file
//             addRemoveLinks: true,
//             parallelUploads: 1, // Only one upload at a time
//             dictDefaultMessage: "{{ __('Browse files') }}",
//             dictMaxFilesExceeded: "{{ __('You can only upload one file.') }}", // Error message when max files exceeded
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             }
//         });

//         // Optional: remove the previous file when a new one is added
//         myDropzone1.on("addedfile", function() {
//             if (this.files.length > 1) {
//                 this.removeFile(this.files[0]); // Remove the first file to keep only the latest one
//             }
//         });

//         myDropzone1.on("success", function(file, response) {
//         table.ajax.reload();
//         });

//         myDropzone1.on("error", function(file, errorMessage) {
//             console.error('Error uploading file:', errorMessage);
//         });

Dropzone.options.uploadDropzone = {
        url: '/upload',
        maxFiles: 5,
        acceptedFiles: '.jpg,.png,.svg,.zip',
        autoProcessQueue: true,
        addRemoveLinks: true,
        
        init: function() {
            this.on('addedfile', function(file) {
                // Add custom upload item to the list
                const uploadItem = createUploadItem(file);
                document.querySelector('.upload-items').appendChild(uploadItem);
            });
            
            this.on('uploadprogress', function(file, progress) {
                // Update progress bar
                const progressBar = document.querySelector(`[data-file-id="${file.upload.uuid}"] .progress-bar`);
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                }
            });
        }
    };
    
    function createUploadItem(file) {
        const template = `
            <div class="upload-item" data-file-id="${file.upload.uuid}">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Uploading ${file.name}...</span>
                        <span>Calculating...</span>
                    </div>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-primary" style="width: 0%"></div>
                    </div>
                </div>
                <div class="ms-3">
                    <span class="mdi mdi-pause pause-btn"></span>
                    <span class="mdi mdi-close cancel-btn"></span>
                </div>
            </div>
        `;
        
        const div = document.createElement('div');
        div.innerHTML = template;
        return div.firstElementChild;
    }

</script> --}}





<div class="d-flex mb-4">
    <h2 class="fw-bold">{{ __('Modals Types') }}</h2>
</div>

<div class="d-flex mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>

    <button class="btn btn-primary mx-1" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
        Open first modal
    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        ...
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
    </div>
    </div>
</div>
</div>


  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Show a second modal and hide this one with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hide this modal and show the first with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
        </div>
      </div>
    </div>
  </div>





<script>
</script>


@endsection


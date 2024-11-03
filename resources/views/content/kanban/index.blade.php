@extends('layout.app')

@section('title', __('Kanban'))

@section('content')

<div class="card p-3 mb-4">
    {{-- <div class="d-flex flex-row p-3 overflow-auto"> --}}
        <div class="row g-3">
    <!-- In Progress Column -->
        <!-- In Progress Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="bg-light rounded p-3">
                <div class="d-flex bg-primary rounded-pill mb-3 px-2 align-items-center justify-content-between">
                    <h5 class="mb-0 text-white"><span class="badge bg-white text-primary rounded-pill me-2">25</span>In Progress</h5>
                    <i class="mdi mdi-plus text-white fs-4"></i>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-primary-subtle text-primary rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                                <div class="avatar avatar-md avatar-count">+3</div>
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-danger-subtle text-danger rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>


        <!-- Reviewed Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="bg-light rounded p-3">
                <div class="d-flex bg-warning rounded-pill mb-3 px-2 align-items-center justify-content-between">
                    <h5 class="mb-0 text-white"><span class="badge bg-white text-warning rounded-pill me-2">25</span>Reviewed</h5>
                    <i class="mdi mdi-plus text-white fs-4"></i>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-warning-subtle text-warning rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                                <div class="avatar avatar-md avatar-count">+3</div>
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>


        <!-- Completed Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="bg-light rounded p-3">
                <div class="d-flex bg-success rounded-pill mb-3 px-2 align-items-center justify-content-between">
                    <h5 class="mb-0 text-white"><span class="badge bg-white text-success rounded-pill me-2">25</span>Completed</h5>
                    <i class="mdi mdi-plus text-white fs-4"></i>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-success-subtle text-success rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>

    {{-- </div> --}}
    </div>
</div>








<style>

span.primary-point::after {
    content: '';
    background: blue;
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 100%;
    vertical-align: middle;
    margin-right: 6px;
}
span.warning-point::after {
    content: '';
    background: orange;
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 100%;
    vertical-align: middle;
    margin-right: 6px;
}
span.success-point::after {
    content: '';
    background: green;
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 100%;
    vertical-align: middle;
    margin-right: 6px;
}
</style>


<div class="card p-3">

    <div class="row g-3">
        <!-- In Progress Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="p-3 bg-light rounded">
                <div class="d-flex rounded-pill mb-3 align-items-center justify-content-between">
                    <h5 class="mb-0"><span class="primary-point"></span>In Progress<span class="text-secondary">(25)</span></h5>
                    <a class="btn btn-primary-outline btn-icon rounded-pill"><i class="mdi mdi-plus fs-4"></i></a>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-primary-subtle text-primary rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <div class="d-flex justify-content-between align-items-center">
                            <div>Progress</div>
                            <div>25%</div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
                    <div class="progress-bar bg-primary" style="width: 25%"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                                <div class="avatar avatar-md avatar-count">+3</div>
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-danger-subtle text-danger rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>

        <!-- Reviewed Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="p-3 bg-light rounded">
                <div class="d-flex rounded-pill mb-3 align-items-center justify-content-between">
                    <h5 class="mb-0"><span class="warning-point"></span>Reviewed<span class="text-secondary">(25)</span></h5>
                    <a class="btn btn-warning-outline btn-icon rounded-pill"><i class="mdi mdi-plus fs-4"></i></a>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-warning-subtle text-warning rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <div class="d-flex justify-content-between align-items-center">
                            <div>Progress</div>
                            <div>25%</div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
                    <div class="progress-bar bg-warning" style="width: 25%"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-danger-subtle text-danger rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                                <div class="avatar avatar-md avatar-count">+3</div>
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>


        <!-- Completed Column -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="p-3 bg-light rounded">
                <div class="d-flex rounded-pill mb-3 align-items-center justify-content-between">
                    <h5 class="mb-0"><span class="success-point"></span>Completed<span class="text-secondary">(25)</span></h5>
                    <a class="btn btn-success-outline btn-icon rounded-pill"><i class="mdi mdi-plus fs-4"></i></a>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-success-subtle text-success rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <div class="d-flex justify-content-between align-items-center">
                            <div>Progress</div>
                            <div>25%</div>
                    </div>
                    <div class="progress mb-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
                    <div class="progress-bar bg-success" style="width: 25%"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                                <div class="avatar avatar-md avatar-count">+3</div>
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
                <div class="card p-3 mb-2">
                    <span class="badge mb-1 bg-danger-subtle text-danger rounded my-w-fit-content my-fs-8" style="padding: 5px;">Important</span>
                    <h6>UI/UX Design in the age of AI</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="d-flex justify-content-between align-items-center">
                            <div class="avatar-group">
                                <img src="https://via.placeholder.com/48" alt="Avatar 1" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 2" class="avatar avatar-md">
                                <img src="https://via.placeholder.com/48" alt="Avatar 3" class="avatar avatar-md">
                            </div>
                            <div>
                                <i class="mdi mdi-message-processing text-secondary"></i> <span>11</span>
                                <i class="mdi mdi-check-circle ms-2 text-secondary"></i> <span>187</span>
                            </div>
                    </div>
                </div>
            <!-- Additional cards as needed -->
            </div>
        </div>

    </div>

</div>


@endsection

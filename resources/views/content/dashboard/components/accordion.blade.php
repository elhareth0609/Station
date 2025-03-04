@extends('layouts.app')

@section('title', __('Accordion'))

@section('content')

<div class="accordion mb-3" id="accordionExampleV0">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Accordion Item #1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Accordion Item #2
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>


<div class="accordion accordion-v1 mb-3" id="accordionExampleV1">
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="v1headingOne">
            <button class="accordion-button rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseOne" aria-expanded="true" aria-controls="v1collapseOne">
                Accordion Item #1
            </button>
        </h2>
        <div id="v1collapseOne" class="accordion-collapse collapse show" aria-labelledby="v1headingOne" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="headingTwo">
            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseTwo" aria-expanded="false" aria-controls="v1collapseTwo">
                Accordion Item #2
            </button>
        </h2>
        <div id="v1collapseTwo" class="accordion-collapse collapse" aria-labelledby="v1headingTwo" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="headingThree">
            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseThree" aria-expanded="false" aria-controls="v1collapseThree">
                Accordion Item #3
            </button>
        </h2>
        <div id="v1collapseThree" class="accordion-collapse collapse" aria-labelledby="v1headingThree" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>


<div class="accordion accordion-v2 mb-3" id="accordionExampleV1">
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="v1headingOne">
            <div class="accordion-button rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseOne" aria-expanded="true" aria-controls="v1collapseOne">
                <span class="me-auto">Accordion Item #1</span>
                <button type="button" class="bg-transparent border-0 mx-1"><span class="mdi mdi-trash-can-outline text-danger fs-5"></span></button>
            </div>
        </h2>
        <div id="v1collapseOne" class="accordion-collapse collapse show" aria-labelledby="v1headingOne" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="headingTwo">
            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseTwo" aria-expanded="false" aria-controls="v1collapseTwo">
                Accordion Item #2
            </button>
        </h2>
        <div id="v1collapseTwo" class="accordion-collapse collapse" aria-labelledby="v1headingTwo" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2 rounded border">
        <h2 class="accordion-header rounded" id="headingThree">
            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#v1collapseThree" aria-expanded="false" aria-controls="v1collapseThree">
                Accordion Item #3
            </button>
        </h2>
        <div id="v1collapseThree" class="accordion-collapse collapse" aria-labelledby="v1headingThree" data-bs-parent="#accordionExampleV1">
            <div class="accordion-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

<style>
    .accordion-v2 .accordion-button::after {
        margin-left: 0;
    }
</style>

@endsection

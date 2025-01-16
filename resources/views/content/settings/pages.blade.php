@extends('layouts.app')

@section('title', __('Accordion'))

@section('content')

<div class="accordion accordion-v1" id="accordionExampleV1">
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

@endsection

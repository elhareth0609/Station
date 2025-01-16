@extends('layouts.app')

@section('title', __('E-learning'))

@section('content')

<div class="row">
    <div class="col-md-9 mb-2">
        <h5 class="fw-bold text-muted">{{ __('Video') }}</h5>
        <div class="bg-white w-100 rounded" id="video" style="height: 500px;">
            {{-- <iframe class="w-100 h-100" src="https://www.youtube.com/embed/4XZiGwVjH0Y" frameborder="0" allowfullscreen></iframe> --}}
            <iframe class="w-100 h-100 rounded" src="https://www.youtube.com/embed/xsM1deqwsI8?si=0DBvTovIS3Jn9DD7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-md-3 mb-2">
        <div class="play-list">
            <h5 class="fw-bold text-muted">{{ __('List') }}</h5>
            <input type="text" class="form-control mb-2" placeholder="Search">
            <div class="list-group mb-3 overflow-y-auto" style="height: 500px;scrollbar-width: thin;">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Epsoide 1</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 2</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 3</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 4</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 5</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 6</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 7</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 8</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 9</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 10</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 11</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 12</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 13</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 14</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 15</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 16</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 17</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 18</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 19</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 20</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 21</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 22</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 23</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 24</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 25</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 26</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 27</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 28</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 29</a>
                <a href="#" class="list-group-item list-group-item-action">Epsoide 30</a>
            </div>
        </div>
    </div>
</div>

@endsection

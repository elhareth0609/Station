@extends('layouts.app')

@section('title', __('Logistics'))

@section('content')

<div class="row">
    <div class="col-md-8 mb-2">
        <div id="map" style="height: 500px;border-radius: 0.375rem;"></div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="accordion accordion-v1 accordion-map" id="carList">
            @foreach($cars as $car)
            <div class="accordion-item mb-2 rounded border" id="car-{{ $car->id }}">
                <h2 class="accordion-header rounded" id="heading-{{ $car->id }}">
                    <button class="accordion-button rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $car->id }}" aria-expanded="false" aria-controls="collapse-{{ $car->id }}">
                        {{ $car->name }}
                    </button>
                </h2>
                <div id="collapse-{{ $car->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $car->id }}" data-bs-parent="#carList">
                    <div class="accordion-body">
                        <p><strong>Driver:</strong> {{ $car->driver->name ?? 'Unassigned' }}</p>
                        <p><strong>Last Known Location:</strong> 
                            @if($car->locations->isNotEmpty())
                                {{ $car->locations->first()->late }}, {{ $car->locations->first()->long }}
                            @else
                                Not available
                            @endif
                        </p>
                        <button class="btn btn-primary btn-track" data-car-id="{{ $car->id }}">Track Route</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDma6ZyUMlelRvLppe6mLWTnHPakqCm6TY&callback=initMap&language={{ app()->getLocale() }}" async defer></script>
<script type="text/javascript">
    let map;
    let markers = {};
    let activeMarker = null;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: { lat: 33.367522, lng: 6.851726 },
        });

        updateMapAndList();
        setInterval(updateMapAndList, 5000);
        addSearchInput();
    }

    function updateMapAndList() {
        $.getJSON('{{ route('logistics.locations') }}', function(data) {
            data.forEach(location => {
                let latLng = new google.maps.LatLng(location.late, location.long);
                if (!markers[location.car.id] || markers[location.car.id].getPosition().lat() !== latLng.lat() || markers[location.car.id].getPosition().lng() !== latLng.lng()) {
                    if (markers[location.car.id]) {
                        markers[location.car.id].setMap(null);
                    }

                    let iconUrl = location.active
                        ? "{{ asset('assets/img/my/defaults/car-1.png') }}"
                        : "{{ asset('assets/img/my/defaults/car-2.png') }}";

                        let marker = new google.maps.Marker({
                            position: latLng,
                            map: map,
                            // label: {
                            //     text: location.car.name,
                            //     className: 'map-label'
                            // },
                            icon: {
                                url: iconUrl,
                                scaledSize: new google.maps.Size(20, 52) // Adjust the size as needed
                            }
                        });


                    marker.addListener('click', function() {
                        setActiveAccordionItem(location.car.id);
                    });

                    markers[location.car.id] = marker;
                }
            });
        });
    }

    function setActiveAccordionItem(carId) {
        // Collapse all accordion items first
        $('.accordion-item').removeClass('active');
        $('.accordion-collapse').collapse('hide');

        // Expand the clicked item's accordion
        let accordionItem = $('#car-' + carId);
        accordionItem.addClass('active');
        accordionItem.find('.accordion-collapse').collapse('show');

        // Center the map on the selected marker and zoom in
        if (markers[carId]) {
            map.panTo(markers[carId].getPosition());
            map.setZoom(15); // Zoom level to focus on the selected car
        }

        // Change the marker icon
        if (activeMarker) {
            activeMarker.setIcon({
                url: "{{ asset('assets/img/my/defaults/car-1.png') }}",
                scaledSize: new google.maps.Size(20, 52)
            });
        }
        markers[carId].setIcon({
                url: "{{ asset('assets/img/my/defaults/car-2.png') }}",
                scaledSize: new google.maps.Size(20, 52)
        });
        activeMarker = markers[carId];
    }

function addSearchInput() {
    const maxRetries = 10; // Maximum number of retries
    let retryCount = 0;

    const retryAddingInput = () => {
        const mapControls = document.getElementsByClassName('gm-control-active gm-fullscreen-control');
        
        if (mapControls.length > 0) {
            // Create a new input element for searching
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.id = 'search';
            searchInput.placeholder = 'Search for a location';
            searchInput.classList.add('gm-search-input');
            // searchInput.style.cssText = `
            // `;

            // Insert the search input below the fullscreen control
            mapControls[0].parentElement.insertBefore(searchInput, mapControls[0].nextSibling);

            console.log('Search input added successfully.');
        } else if (retryCount < maxRetries) {
            retryCount++;
            console.warn(`Fullscreen control not found. Retrying (${retryCount}/${maxRetries})...`);
            setTimeout(retryAddingInput, 500); // Retry after 500ms
        } else {
            console.error('Failed to add search input after maximum retries.');
        }
    };

    retryAddingInput();
}



    // google.maps.event.addListenerOnce(map, 'idle', addSearchInput);

    $(document).ready(function() {
        $('.btn-track').on('click', function() {
            let carId = $(this).data('car-id');
            // Handle tracking logic here
        });

        $('#carList').on('click', '.accordion-item', function() {
            let carId = $(this).attr('id').replace('car-', '');
            setActiveAccordionItem(carId);
        });
    });

</script>
@endsection
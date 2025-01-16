@extends('layouts.app')

@section('title', __('FullCalendar'))

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('FullCalendar') }}</h1>

    <div class="card pb-2">
        <div class="container-fluid my-4">
            <div id="calendar"></div>
        </div>
    </div>

  <!-- Add Event Modal -->
  <div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="validate-form" id="addEventForm" action="/events/add" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addEventLabel">{{ __('Add Event') }}</h5>
            <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="title" class="form-label">{{ __('Title') }}</label>
              <input type="text" class="form-control" id="title" name="title" data-v="required string min:6 max:255 email" required>
            </div>
            <div class="mb-3">
              <label for="start" class="form-label">{{ __('Start Date') }}</label>
              <input type="datetime-local" class="form-control" id="start" name="start" required>
            </div>
            <div class="mb-3">
              <label for="end" class="form-label">{{ __('End Date') }}</label>
              <input type="datetime-local" class="form-control" id="end" name="end" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="button" class="btn btn-primary">{{ __('Save') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Update Event Modal -->
  <div class="modal fade" id="updateEvent" tabindex="-1" aria-labelledby="updateEventLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="updateEventForm" action="/events/update" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEventLabel">{{ __('Update Event') }}</h5>
                <button type="button" class="btn btn-light btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" id="id" name="id" required>
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
                    @error('title')
                        <div class="invalid-feedback">{{ __("hello") }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>
                    @error('description')
                        <div class="invalid-feedback">{{ __("hello") }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label">{{ __('Start Date') }}</label>
                    <input type="datetime-local" class="form-control @error('start') is-invalid @enderror" id="start" name="start" required>
                    @error('start')
                        <div class="invalid-feedback">{{ __("hello") }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="end" class="form-label">{{ __('End Date') }}</label>
                    <input type="datetime-local" class="form-control @error('end') is-invalid @enderror" id="end" name="end" required>
                    @error('end')
                        <div class="invalid-feedback">{{ __("hello") }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
      </form>
    </div>
  </div>




  <script>

      var calendarEl = document.getElementById('calendar');
      var eventsData = [
          {
          id: '1',
          title: 'Sample Event 1',
          start: '2024-09-01T10:00:00',
          end: '2024-09-01T12:00:00'
          },
          {
          id: '2',
          title: 'Sample Event 2',
          start: '2024-09-05T14:00:00',
          end: '2024-09-05T15:00:00'
          }
      ];

      $(document).ready(function() {
          var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
              left: 'prev,next today add',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          events: eventsData,
          eventClick: function(info) {
              var event = info.event;
              $('#updateEvent #id').val(event.id);
              $('#updateEvent #title').val(event.title);
              $('#updateEvent #start').val(event.start.toISOString().slice(0, 16));
              $('#updateEvent #end').val(event.end ? event.end.toISOString().slice(0, 16) : '');
              $('#updateEvent').modal('show');
          },
          customButtons: {
              add: {
              text: 'Add Event',
              click: function() {
                  $('#addEvent').modal('show');
              }
              }
          },
          datesSet: function() {
              $('.fc-day-today .fc-daygrid-day-frame').addClass('bg-light');
              $('.fc-button-group').removeClass('fc-button-group').addClass('btn-group');
              $('.fc-button').removeClass('fc-button').addClass('btn');
              $('.fc-button-primary').removeClass('fc-button-primary').addClass('btn-outline-primary');
              $('.fc-header-toolbar').addClass('row w-100');
              $('.fc-toolbar-chunk').addClass('my-w-fit-content d-flex justify-content-center mb-2');
              $('.fc-view').addClass('border-bottom');
          },
          eventDidMount: function(info) {
              $(info.el).addClass('bg-light border-light');
              $(info.el).find('.fc-event-main').addClass('text-secondary');
          }



          });

          calendar.render();


        //   // Handle form submissions for adding events
        // $('#addEventForm').submit(function(event) {
        //     event.preventDefault();

        //     var formData = $(this).serialize();
        //     var newEvent = {
        //         title: $('#addEventForm #title').val(),
        //         start: $('#addEventForm #start').val(),
        //         end: $('#addEventForm #end').val()
        //     };

        //     // Simulating an AJAX request
        //     setTimeout(function() {
        //         calendar.addEvent(newEvent);
        //         $('#addEvent').modal('hide');
        //         Swal.fire({
        //         icon: 'success',
        //         title: 'Event Added',
        //         text: 'The event was added successfully!',
        //         confirmButtonText: 'Ok'
        //         });
        //     }, 500);
        // });

        //   // Handle form submissions for updating events
        // $('#updateEventForm').submit(function(event) {
        //     event.preventDefault();

        //     var updatedEvent = {
        //         id: $('#updateEvent #id').val(),
        //         title: $('#updateEvent #title').val(),
        //         start: $('#updateEvent #start').val(),
        //         end: $('#updateEvent #end').val()
        //     };

        //     // Simulating an AJAX request
        //     setTimeout(function() {
        //         var event = calendar.getEventById(updatedEvent.id);
        //         event.setProp('title', updatedEvent.title);
        //         event.setStart(updatedEvent.start);
        //         event.setEnd(updatedEvent.end);
        //         $('#updateEvent').modal('hide');
        //         Swal.fire({
        //         icon: 'success',
        //         title: 'Event Updated',
        //         text: 'The event was updated successfully!',
        //         confirmButtonText: 'Ok'
        //         });
        //     }, 500);
        // });

      });
  </script>

@endsection

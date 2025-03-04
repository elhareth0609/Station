@extends('layouts.app')

@section('title', __('Cards'))

@section('content')

<div class="alert alert-primary" role="alert">
    A simple primary alert—check it out!
  </div>
  <div class="alert alert-secondary" role="alert">
    A simple secondary alert—check it out!
  </div>
  <div class="alert alert-success" role="alert">
    A simple success alert—check it out!
  </div>
  <div class="alert alert-danger" role="alert">
    A simple danger alert—check it out!
  </div>
  <div class="alert alert-warning" role="alert">
    A simple warning alert—check it out!
  </div>
  <div class="alert alert-info" role="alert">
    A simple info alert—check it out!
  </div>
  <div class="alert alert-light" role="alert">
    A simple light alert—check it out!
  </div>
  <div class="alert alert-dark" role="alert">
    A simple dark alert—check it out!
  </div>



<div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>


  <div class="alert alert-primary d-flex align-items-center" role="alert">
    <span class="mdi mdi mdi-information-variant-circle-outline me-2"></span>
    <div>
      An example alert with an icon
    </div>
  </div>
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <span class="mdi mdi-check me-2"></span>
    <div>
      An example success alert with an icon
    </div>
  </div>
  <div class="alert alert-warning d-flex align-items-center" role="alert">
    <span class="mdi mdi-alert-outline me-2"></span>
    <div>
      An example warning alert with an icon
    </div>
  </div>
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <span class="mdi mdi-alert-outline me-2"></span>
    <div>
      An example danger alert with an icon
    </div>
  </div>



  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
        appendAlert('Nice, you triggered this alert message!', 'success')
    })
    }
</script>
@endsection

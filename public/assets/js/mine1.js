$('body').append(`
    <div id="loading" style="display: none;background: #00000069;z-index: 10000;" class="position-fixed h-100 w-100 top-0 start-0">
        <div id="lottie-animation" class="bg-white rounded-3 border border-primary border-5 position-fixed start-50 top-50" style="width: 100px; height: 100px;transform: translate(-50%, -50%);">
        </div>
    </div>
`);

const ascIcon = '<svg class="sort-icon mx-1" width="800px" height="800px" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.272 5.205L16.272 13.205C16.8964 14.2041 16.1782 15.5 15 15.5H5.00002C3.82186 15.5 3.1036 14.2041 3.72802 13.205L8.72802 5.205C9.31552 4.265 10.6845 4.265 11.272 5.205Z" fill="#000000"/></svg>';
const descIcon = '<svg class="sort-icon mx-1" width="800px" height="800px" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.72798 15.795L3.72798 7.795C3.10356 6.79593 3.82183 5.5 4.99998 5.5L15 5.5C16.1781 5.5 16.8964 6.79593 16.272 7.795L11.272 15.795C10.6845 16.735 9.31549 16.735 8.72798 15.795Z" fill="#000000"/></svg>';

var animation1 = lottie.loadAnimation({
  container: document.getElementById('lottie-animation'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: url + '/assets/img/my/defaults/load-svg.json' // Lottie animation URL
});



//   $('.dropdown-item').on('click', function(e) {
//       e.preventDefault();
//       var selectedTheme = $(this).data('theme'); // Get the selected theme

//       $.ajax({
//           url: '/update-theme',
//           method: 'POST',
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//           data: {
//               theme: selectedTheme.toLowerCase(), // Convert to lowercase if necessary
//               // _token: '{{ csrf_token() }}' // Include CSRF token for protection
//           },
//           success: function(response) {
//               if (response.success) {
//                   // Optionally, you can update the UI or refresh the page
//                   location.reload();
//               }
//           },
//           error: function(xhr) {
//               // Handle error response
//               console.error(xhr.responseText);
//           }
//       });
//   });

// Ripple effect
// document.querySelectorAll('.btn').forEach(button => {
//     button.addEventListener('click', function (e) {
//         // Check if there is already a ripple-effect span and exit if found

//         // Create the ripple span
//         const circle = document.createElement('span');
//         const diameter = Math.max(button.clientWidth, button.clientHeight);
//         const radius = diameter / 2;

//         // Get the button's position relative to the viewport
//         const buttonRect = button.getBoundingClientRect();

//         // Set ripple size and position
//         circle.style.width = circle.style.height = `${diameter}px`;
//         circle.style.left = `${e.clientX - buttonRect.left - radius}px`;
//         circle.style.top = `${e.clientY - buttonRect.top - radius}px`;
//         circle.classList.add('ripple-effect');

//         // Add the ripple to the button
//         button.appendChild(circle);

//         // Remove the ripple after the animation
//         setTimeout(() => {
//         circle.remove();
//         }, 600); // Match the ripple animation duration
//     });
// });





$(document).ready(function() {
    // Form validation
    // $('form.validate-form').dynamicValidate();

    // Ripple effect
    $(document).on('click', '.btn', function(e) {
        // Check if there is already a ripple-effect span and exit if found
        const $button = $(this);

        // Create the ripple span
        const $circle = $('<span class="ripple-effect"></span>');
        const diameter = Math.max($button.outerWidth(), $button.outerHeight());
        const radius = diameter / 2;

        // Get the button's position relative to the viewport
        const buttonOffset = $button.offset();

        // Set ripple size and position
        $circle.css({
            width: diameter,
            height: diameter,
            left: e.pageX - buttonOffset.left - radius,
            top: e.pageY - buttonOffset.top - radius
        });

        // Add the ripple to the button
        $button.append($circle);

        // Remove the ripple after the animation
        setTimeout(function() {
            $circle.remove();
        }, 600); // Match the ripple animation duration
    });

});




// Sidebar toggler
$('#overlay').on('click', function() {
    console.log('clicked');
    document.querySelector('.sidebar').classList.remove('toggled');
    document.querySelector('#overlay').style.display = 'none'; // Hide the overlay after click
});

// Password toggle
$('.input-group-text .mdi-lock-outline').on('click', function() {
    // Toggle password input type
    var passwordInput = $(this).closest('.input-group').find('input[type="password"], input[type="text"]');

    if (passwordInput.attr('type') === 'password') {
        passwordInput.attr('type', 'text');
        $(this).removeClass('mdi-lock-outline').addClass('mdi-lock-open-outline');
    } else {
        passwordInput.attr('type', 'password');
        $(this).removeClass('mdi-lock-open-outline').addClass('mdi-lock-outline');
    }
});

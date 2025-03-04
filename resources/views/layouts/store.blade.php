<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="lang" content="{{ app()->getLocale() }}">
    <meta name="theme" content="system">
    <meta name="url" content="{{ url('/') }}">
    <title>Station @hasSection('title') - @yield('title') @endif</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Enter:wght@400;500;700&display=swap" rel="stylesheet">

    @include('layouts.store.header')

</head>
<body>

    @php
        $isNavbar = isset($isNavbar) ? $isNavbar : true;
        $isSidebar = isset($isSidebar) ? $isSidebar : true;
        $isFooter = isset($isFooter) ? $isFooter : true;
        $isContainer = isset($isContainer) ? $isContainer : true;
    @endphp
    <!-- Main Content -->
    <div class="content">
        <div id="wrapper">

            <!-- Sidebar -->
            @if (isset($isSidebar) && $isSidebar)
                @include('layouts.store.menu.menu')
            @endif

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @if (isset($isNavbar) && $isNavbar)
                    @include('layouts.store.nav.nav')
                    @endif
                    @if (isset($isContainer) && $isContainer)
                        <div class="container-fluid">
                    @endif
                        @yield('content')
                    @if (isset($isContainer) && $isContainer)
                        </div>
                    @endif
                </div>


                @if (isset($isFooter) && $isFooter)
                    @include('layouts.store.footer')
                @endif

            </div>

            <div id="overlay"></div>

        </div>
                <!-- Scroll to Top Button-->
                <a class="btn btn-icon position-fixed rounded btn-warning" href="#page-top" style="right: 20px;bottom: 10px;">
                    <i class="mdi mdi-arrow-up"></i>
                </a>

        </div>

        <!-- Footer -->
        @include('layouts.store.footer')
        <!-- End of Footer -->


    <script>
        $(document).ready(function() {
            // Quantity Controls
            $('.input-group .btn').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var value = parseInt(input.val());

                if($(this).text() === '+') {
                    input.val(value + 1);
                } else if(value > 1) {
                    input.val(value - 1);
                }
            });
            // Mobile Navigation
            $('.nav-item-mobile').click(function(e) {
                $('.nav-item-mobile').removeClass('active');
                $(this).addClass('active');
            });

            // Color Options
            $('.color-option').click(function() {
                $('.color-option').removeClass('active');
                $(this).addClass('active');
            });

        });
    </script>
</body>
</html>

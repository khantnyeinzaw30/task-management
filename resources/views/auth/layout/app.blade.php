<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- Theme CSS -->
    <!-- build:css assets/css/theme.min.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <!-- endbuild -->
    <title>Task Management System</title>
</head>

<body>

    @yield('content')

    <!-- Scripts -->
    <!-- Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Feather icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap bundle with popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"
        integrity="sha512-BOsvKbLb0dB1IVplOL9ptU1EYA+LuCKEluZWRUYG73hxqNBU85JBIBhPGwhQl7O633KtkjMv8lvxZcWP+N3V3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- clipboard -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/feather.js') }}"></script>
    <script src="{{ asset('assets/js/copyButton.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarMenu.js') }}"></script>
    <!-- endbuild -->
</body>

</html>

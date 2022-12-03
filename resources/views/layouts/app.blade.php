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
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="nav-scroller">
                <!-- Brand logo -->
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <img src="{{ asset('assets/images/brand/logo/logo.svg') }}" alt="" />
                </a>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i data-feather="home" class="nav-icon icon-xs me-2"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee.index') }}">
                            <i data-feather="users" class="nav-icon icon-xs me-2"></i> Employees
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('task.index') }}">
                            <i data-feather="activity" class="nav-icon icon-xs me-2"></i> Tasks
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('task.assignPage') }}">
                            <i data-feather="check" class="nav-icon icon-xs me-2"></i> Assign Tasks
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- Page content -->
        <div id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar-classic navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
                    <!--Navbar nav -->
                    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                        class="rounded-circle" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="px-4 pb-0 pt-2">
                                    <div class="lh-1 ">
                                        <h5 class="mb-1">Admin Name</h5>
                                        <a href="#" class="text-inherit fs-6">View my profile</a>
                                    </div>
                                    <div class=" dropdown-divider mt-3 mb-2"></div>
                                </div>

                                <ul class="list-unstyled">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                                            <i class="me-2 icon-xxs dropdown-item-icon"
                                                data-feather="settings"></i>Account Settings
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                                            @csrf
                                            <button type="submit" style="border: none; background: none;">
                                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>
                                                Sign Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container-fluid px-6 py-1">
                @yield('content')
            </div>
        </div>
    </div>

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
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/feather.js') }}"></script>
    <script src="{{ asset('assets/js/copyButton.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarMenu.js') }}"></script>
    <!-- endbuild -->
</body>

</html>

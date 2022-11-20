@extends('layouts.app')

@section('content')
    <div class="header">
        <!-- navbar -->
        <nav class="navbar-classic navbar navbar-expand-lg">
            <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
            <div class="ms-lg-3 d-none d-md-none d-lg-block">
                <!-- Form -->
                <form class="d-flex align-items-center">
                    <input type="search" class="form-control" placeholder="Search" />
                </form>
            </div>
            <!--Navbar nav -->
            <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                class="rounded-circle" />
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="px-4 pb-0 pt-2">


                            <div class="lh-1 ">
                                <h5 class="mb-1"> John E. Grainger</h5>
                                <a href="#" class="text-inherit fs-6">View my profile</a>
                            </div>
                            <div class=" dropdown-divider mt-3 mb-2"></div>
                        </div>

                        <ul class="list-unstyled">

                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="settings"></i>Account Settings
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
    <!-- Container fluid -->
    <div class="container-fluid px-6">
        <div class="row mt-3 mt-lg-7">
            <div class="col-md-12 col-lg-4">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <h4 class="text-primary">Create New Project</h4>
                        </div>
                        <!-- Form -->
                        <form action="{{ route('project.create') }}" method="POST">
                            @csrf
                            <!-- Project Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="projectName" id="name" value="{{ old('projectName') }}"
                                    class="form-control @error('projectName') is-invalid @enderror" placeholder="Name">
                            </div>
                            @error('projectName')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="projectDescription" class="form-control @error('projectDescription') is-invalid @enderror"
                                    id="description" cols="30" rows="10" placeholder="Description">{{ old('projectDescription') }}</textarea>
                            </div>
                            @error('projectDescription')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Create Project
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 mt-6 mt-lg-0">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white border-bottom-0 py-4">
                        <h4 class="mb-0">Active Projects</h4>
                    </div>
                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Project name</th>
                                    <th>Description</th>
                                    <th>Started Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="align-middle">
                                            <p class="lh-1 fw-bold">{{ $project->name }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="lh-1">{{ Str::words($project->description, 3, '...') }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="lh-1">{{ $project->created_at->format('d M Y') }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('project.delete', $project->id) }}"
                                                class="btn btn-danger px-2">
                                                <i data-feather="x-circle"></i>
                                            </a>
                                            <a href="{{ route('project.updatePage', $project->id) }}"
                                                class="btn btn-info px-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Project qty card -->
                <div class="card rounded-3 mt-3 col-6 offset-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Projects</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                <i data-feather="briefcase"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ count($projects) }}</h1>
                            <p class="mb-0"><span class="text-dark me-2">2</span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

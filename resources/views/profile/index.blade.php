@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 ">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">Overview</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <!-- Bg -->
            <div class="pt-20 rounded-top"
                style="background:
                url({{ asset('assets/images/background/profile-cover.jpg') }}) no-repeat;
                background-size: cover;">
            </div>
            <div class="bg-white rounded-bottom smooth-shadow-sm ">
                <div class="d-flex align-items-center justify-content-between
                  pt-4 pb-6 px-4">
                    <div class="d-flex align-items-center">
                        <!-- avatar -->
                        @if ($user->profile_photo_path)
                            <div
                                class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                    class="avatar-xxl rounded-circle border border-4 border-white-color-40" alt="">
                                <a href="#!" class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Verified">
                                    <img src="{{ asset('assets/images/svg/checked-mark.svg') }}" alt=""
                                        height="30" width="30">
                                </a>
                            </div>
                        @else
                            <div
                                class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                    class="avatar-xxl rounded-circle border border-4 border-white-color-40" alt="">
                                <a href="#!" class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Verified">
                                    <img src="{{ asset('assets/images/svg/checked-mark.svg') }}" alt=""
                                        height="30" width="30">
                                </a>
                            </div>
                        @endif
                        <!-- text -->
                        <div class="lh-1">
                            <h2 class="mb-0">{{ $user->name }}
                                <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top"
                                    title="" data-original-title="Beginner">
                                </a>
                            </h2>
                            {{-- <p class="mb-0 d-block">@ {{ Str::lower($user->name) }}</p> --}}
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.settings') }}"
                            class="btn btn-outline-primary
                      d-none d-md-block">Edit
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="row py-6">
        <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-6">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <!-- card title -->
                    <h4 class="card-title mb-4">About Me</h4>
                    <!-- row -->
                    <div class="row">
                        <div class="col-12 mb-5">
                            <!-- text -->
                            <h6 class="text-uppercase fs-5 ls-2">Position
                            </h6>
                            <p class="mb-0">{{ $user->is_project_manager ? 'Lead Project Manager' : '' }}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-uppercase fs-5 ls-2">Email</h6>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-uppercase fs-5 ls-2">Gender</h6>
                            <p class="mb-0 text-capitalize">{{ $user->gender }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

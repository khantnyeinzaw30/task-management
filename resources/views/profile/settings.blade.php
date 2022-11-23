@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center
                  justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">General</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-8">
        <div class="col-xl-3 col-lg-4 col-md-12 col-12">
            <div class="mb-4 mb-lg-0">
                <h4 class="mb-1">General Setting</h4>
                <p class="mb-0 fs-5 text-muted">Profile configuration settings</p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class=" mb-6">
                        <h4 class="mb-1">General Settings</h4>
                    </div>
                    <div class="row align-items-center mb-8">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <h5 class="mb-0">Avatar</h5>
                        </div>
                        @if ($user->profile_photo_path)
                            <div class="col-md-9">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                            class="rounded-circle avatar avatar-lg" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-9">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <strong class="text-muted">There's no profile photo uploaded!</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div>
                        <!-- border -->
                        <div class="mb-6">
                            <h4 class="mb-1">Basic information</h4>
                        </div>
                        <form action="{{ route('admin.editProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- username -->
                            <div class="mb-3 row">
                                <label for="fullName" class="col-sm-4 col-form-label form-label">Full
                                    name</label>
                                <div class="col-md-8 col-12">
                                    <input name="adminName" type="text" value="{{ old('adminName', $user->name) }}"
                                        class="form-control @error('adminName') is-invalid @enderror" placeholder="Name"
                                        id="fullName">
                                </div>
                                @error('adminName')
                                    <p class="text-danger mt-2 mb-0 offset-md-4 col-md-8 col-12">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <!-- email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label form-label">Email</label>
                                <div class="col-md-8 col-12">
                                    <input name="adminEmail" type="email" value="{{ old('adminEmail', $user->email) }}"
                                        class="form-control @error('adminEmail') is-invalid @enderror" placeholder="Email"
                                        id="email">
                                </div>
                                @error('adminEmail')
                                    <p class="text-danger mt-2 mb-0 offset-md-4 col-md-8 col-12">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <!-- gender -->
                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-4 col-form-label form-label">Gender</label>
                                <div class="col-md-8 col-12">
                                    <select name="adminGender" class="form-select" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- profile_photo -->
                            <div class="mb-3 row">
                                <label for="photo" class="col-sm-4 col-form-label form-label">Profile Photo</label>
                                <div class="col-md-8 col-12">
                                    <input type="file" name="adminPhoto" class="form-control" id="photo" />
                                </div>
                            </div>

                            <!-- button -->
                            <div class="row align-items-center">
                                <div class="offset-md-4 col-md-8 mt-4">
                                    <button type="submit" class="btn btn-primary"> Save
                                        Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- email and gender change -->
    <div class="row mb-8">
        <div class="col-xl-3 col-lg-4 col-md-12 col-12">
            <div class="mb-4 mb-lg-0">
                <h4 class="mb-1">Password Setting</h4>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <!-- card -->
            <div class="card" id="edit">
                <!-- card body -->
                <div class="card-body">
                    <!-- password change -->
                    <div class="mb-6">
                        <h4 class="mb-1">Change your password</h4>
                    </div>
                    <form action="{{ route('admin.changePassword') }}" method="post">
                        @csrf
                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="currentPassword" class="col-sm-4 col-form-label form-label">Current
                                password</label>
                            <div class="col-md-8 col-12">
                                <input type="password" name="currentPassword"
                                    class="form-control @error('currentPassword') is-invalid @enderror"
                                    placeholder="Enter Current password" id="currentPassword">
                            </div>
                            @error('currentPassword')
                                <p class="text-danger mt-2 mb-0 offset-md-4 col-md-8 col-12">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            @if (Session::has('passwordWrong'))
                                <p class="text-danger mt-2 mb-0 offset-md-4 col-md-8 col-12">
                                    <strong>{{ Session::get('passwordWrong') }}</strong>
                                </p>
                            @endif
                        </div>
                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="currentNewPassword" class="col-sm-4 col-form-label form-label">New
                                password</label>
                            <div class="col-md-8 col-12">
                                <input type="password" name="newPassword"
                                    class="form-control @error('newPassword') is-invalid @enderror"
                                    placeholder="Enter New password" id="currentNewPassword">
                            </div>
                            @error('newPassword')
                                <p class="text-danger mt-2 mb-0 offset-md-4 col-md-8 col-12">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                        <!-- row -->
                        <div class="row align-items-center">
                            <label for="confirmNewpassword" class="col-sm-4 col-form-label form-label">Confirm new
                                password</label>
                            <div class="col-md-8 col-12 mb-lg-0">
                                <input type="password" name="confirmPassword"
                                    class="form-control @error('confirmPassword') is-invalid @enderror"
                                    placeholder="Confirm new password" id="confirmNewpassword">
                            </div>
                            @error('confirmPassword')
                                <p class="text-danger mt-2 mb-2 offset-md-4 col-md-8 col-12">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <!-- list -->
                            <div class="offset-md-4 col-md-8 col-12 mt-4">
                                <h6 class="mb-1">Password requirements:</h6>
                                <p>Ensure that these requirements are met:</p>
                                <ul>
                                    <li>Minimum 8 characters long the more, the better</li>
                                    <li>At least one lowercase character</li>
                                    <li>At least one uppercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                                <button type="submit" class="btn btn-primary">Save
                                    Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

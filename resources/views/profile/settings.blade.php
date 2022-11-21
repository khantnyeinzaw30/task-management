@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-7">
            <div class="card mb-3" style="max-width: 900px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if ($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="img-fluid rounded-start"
                                alt="...">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form action="{{ route('admin.editProfile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="adminName" value="{{ old('adminName', $user->name) }}"
                                        class="form-control  @error('adminName') is-invalid @enderror">
                                    @error('adminName')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="adminEmail" value="{{ old('adminEmail', $user->email) }}"
                                        class="form-control @error('adminEmail') is-invalid @enderror">
                                    @error('adminEmail')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="adminGender" class="form-select">
                                        <option value="male"
                                            {{ old('adminGender', $user->gender) == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female"
                                            {{ old('adminGender', $user->gender) == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profile Photo</label>
                                    <input type="file" name="adminPhoto" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Submit" class="btn btn-info">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

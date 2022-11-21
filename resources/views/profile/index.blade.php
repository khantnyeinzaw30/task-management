@extends('layouts.app')

@section('content')
    <div class="container-fluid px-6">
        <div class="row mt-sm-3">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        @if ($user->profile_photo_path)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                        @endif
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->email }}</p>
                                <p class="card-text"><small class="text-muted text-capitalize">{{ $user->gender }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('auth.layout.app')

@section('content')
    <div class="container min-vh-100 d-flex justify-content-center
      align-items-center">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- content -->
                <div class="text-center">
                    <div class="mb-3">
                        <!-- img -->
                        <img src="{{ asset('assets/images/error/404-error-img.png') }}" alt="" class="img-fluid">
                    </div>
                    <!-- text -->
                    <h1 class="display-4 fw-bold">Oops! the page not found.</h1>
                    <p class="mb-4">You didn't have the authorization to manager page! kindly register a new manager
                        acccount</p>
                    <!-- button -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Logout" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card">
        <!-- card header  -->
        <div class="card-header bg-white border-bottom-0 py-4">
            <h4 class="mb-0">Employees</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Employee Code</th>
                        <th>Assign task</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" alt=""
                                        class="avatar-md avatar rounded-circle">
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="fw-bold mb-1">Anita Parmar</h5>
                                    <p class="mb-0">anita@example.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">{{ Str::random(10) }}</td>
                        <td class="align-middle">To do something</td>
                        <td class="align-middle">
                            <div class="dropdown dropstart">
                                <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-xxs" data-feather="more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else
                                        here</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

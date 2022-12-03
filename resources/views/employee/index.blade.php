@extends('layouts.app')

@section('content')
    <div class="row mt-6">
        <div class="col-md-8 offset-md-2 col-12">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 py-4">
                    <h4 class="mb-0">Employees List</h4>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="align-middle">
                                        <span class="fw-bold">{{ $employee->name }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="text-decoration-none">{{ $employee->email }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

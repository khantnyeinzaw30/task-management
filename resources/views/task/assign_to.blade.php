@extends('layouts.app')

@section('content')
    <div class="row mt-3 mt-lg-7">
        <div class="col-md-6 offset-3">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <h4 class="text-primary">Create New Task</h4>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('task.assign') }}" method="post">
                        @csrf
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label class="form-label">Task</label>
                            <select name="taskId" class="form-select @error('taskId') is-invalid @enderror">
                                <option value="">Choose Task</option>
                                @foreach ($tasks as $task)
                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                @endforeach
                            </select>
                            @error('taskId')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Employee Code -->
                        <div class="mb-3">
                            <label class="form-label">Employee Code</label>
                            <select name="employeeCode" class="form-select @error('employeeCode') is-invalid @enderror">
                                <option value="">Choose Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->employee_code }}">{{ $employee->employee_code }}</option>
                                @endforeach
                            </select>
                            @error('employeeCode')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

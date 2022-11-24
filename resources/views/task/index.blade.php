@extends('layouts.app')

@section('content')
    <div class="row mt-3 mt-lg-7">
        <div class="col-md-12 col-lg-5">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <h4 class="text-primary">Create New Task</h4>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('task.create') }}" method="POST">
                        @csrf
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="taskName" id="name" value="{{ old('taskName') }}"
                                class="form-control @error('taskName') is-invalid @enderror" placeholder="Name">
                        </div>
                        @error('taskName')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="taskDescription" class="form-control @error('taskDescription') is-invalid @enderror" id="description"
                                cols="30" rows="10" placeholder="Description">{{ old('taskDescription') }}</textarea>
                        </div>
                        @error('taskDescription')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- priority -->
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select name="taskPriority" class="form-select @error('taskPriority') is-invalid @enderror">
                                <option value="">Choose Priority</option>
                                <option value="2" {{ old('taskPriority') == '2' ? 'selected' : '' }}>High</option>
                                <option value="1" {{ old('taskPriority') == '1' ? 'selected' : '' }}>Medium</option>
                                <option value="0" {{ old('taskPriority') == '0' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>
                        @error('taskPriority')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- project -->
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select name="taskProjectId" class="form-select @error('taskProjectId') is-invalid @enderror">
                                <option value="">Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ old('taskProjectId') == $project->id ? 'selected' : '' }}>{{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('taskProjectId')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- Due Date -->
                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="taskDueDate"
                                class="form-control @error('taskDueDate') is-invalid @enderror">
                        </div>
                        @error('taskDueDate')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Create Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-7 mt-6 mt-lg-0">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 py-4">
                    <h4 class="mb-0">Active Tasks</h4>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Task name</th>
                                <th>priority</th>
                                <th>Project</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="lh-1">
                                                <h5 class="fw-bold mb-1">
                                                    <a href="#" class="text-inherit"
                                                        style="letter-spacing: 0.7px;">{{ $task->name }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        @if ($task->priority == '0')
                                            <span class="badge text-info">Low</span>
                                        @elseif ($task->priority == '1')
                                            <span class="badge text-bg-warning">Medium</span>
                                        @elseif ($task->priority == '2')
                                            <span class="badge text-bg-danger">High</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="#">
                                            {{ $task->project_name }}
                                        </a>
                                    </td>
                                    <td class="align-middle text-dark">
                                        <div class="float-start me-3">
                                            {{ $task->due_date }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if (Session::has('taskCreated'))
                <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show mt-3" role="alert">
                    <strong>{{ Session::get('taskCreated') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
@endsection

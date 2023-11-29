@extends('layout.app')

@section('content')

    <h5>Add Task</h5>
    <hr />

    <form action="{{ route('todo.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="taskName" class="form-label">Task name *</label>
            <input type="text" class="form-control" id="taskName" placeholder="Enter task name" name="task_name" value="{{ old('task_name') }}">
            @error('task_name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description</label>
            <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter task description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary btn-sm" value="Save" />
    </form>
@endsection

@extends('layout.app')

@section('content')

    <h5>Update Task</h5>
    <hr />

    <form action="{{ route('todo.update', $todo) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="taskName" class="form-label">Task name *</label>
            <input type="text" class="form-control" id="taskName" placeholder="Enter task name" name="task_name" value="{{ $todo->task_name }}">
            @error('task_name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description</label>
            <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter task description" name="description">{{ $todo->description }}</textarea>
            @error('description')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taskStatus" class="form-label">Status</label>
            <select id="taskStatus" class="form-select" aria-label="Default select example" name="is_complete">
                <option value="0" {{ $todo->is_complete == 0 ? 'selected=selected' : '' }}>Not Complete</option>
                <option value="1" {{ $todo->is_complete == 1 ? 'selected=selected' : '' }}>Complete</option>
            </select>
            @error('is_complete')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary btn-sm" value="Save" />
    </form>
@endsection

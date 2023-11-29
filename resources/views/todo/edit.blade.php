@extends('layout.app')

@section('content')

    <h5>Update Task</h5>
    <hr />

    <form action="{{ route('todo.update', $todo) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="taskName" class="form-label">Task name *</label>
            <input type="text" class="form-control @error('task_name') is-invalid @enderror" id="taskName" placeholder="Enter task name" name="task_name" value="{{ $todo->task_name }}">
            @error('task_name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="taskDescription" rows="3" placeholder="Enter task description" name="description">{{ $todo->description }}</textarea>
            @error('description')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taskIssuePath" class="form-label">Attachment</label>
            <input type="file" class="form-control @error('issue_path') is-invalid @enderror" name="issue_path" id="taskIssuePath" accept=".png,.jpg,.jpeg,.pdf">
            @error('issue_path')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
            @if ($todo->issue_path)
                <img src="{{ asset($todo->issue_path) }}" width="200" class="mt-2" alt="Issue image">
            @endif
        </div>

        <div class="mb-3">
            <label for="taskStatus" class="form-label">Status</label>
            <select id="taskStatus" class="form-select @error('is_complete') is-invalid @enderror" aria-label="Default select example" name="is_complete">
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

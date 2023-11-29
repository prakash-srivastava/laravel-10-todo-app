@extends('layout.app')

@section('content')

    <h5>Todo lists <a class="badge bg-secondary float-end text-decoration-none" href="{{ route('todo.create') }}">New</a></h5>
    <hr />

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="col-sm-3">Task</th>
                <th scope="col" class="col-sm-5">Description</th>
                <th scope="col" class="col-sm-1">Image</th>
                <th scope="col" class="col-sm-1">Status</th>
                <th scope="col" class="col-sm-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($todos as $todo)
                <tr>
                    <td>{{ $todo->task_name }}</td>
                    <td>{{ $todo->description ?? '-' }}</td>
                    <td>
                        @if ($todo->issue_path)
                            <img src="{{ asset($todo->issue_path) }}" width="100" alt="Issue image">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($todo->is_complete == 1)
                            <span class="badge bg-success">Complete</span>
                        @else
                            <span class="badge bg-danger">Not Complete</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('todo.destroy', $todo) }}" method="post" onsubmit="return validateForm()">
                            @csrf
                            @method('DELETE')

                            <a class="btn btn-primary btn-sm" role="button" href="{{ route('todo.edit', $todo) }}">Edit</a>

                            <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                        </form>
                        {{-- <a class="btn btn-primary btn-sm" role="button" href="{{ route('todo.edit', $todo) }}">Edit</a> --}}
                        {{-- <a class="btn btn-danger btn-sm" role="button" href="{{ route('todo.destroy', $todo) }}">Delete</a> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center font-size-sm">No Record Found!</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <div class="d-flex">
        {!! $todos->links() !!}
    </div>

    <script>
        function validateForm() {
            var result = confirm("Are you sure you want to delete a task?");
            if (result) {
                return true;
            }
            return false;
        }
    </script>
@endsection

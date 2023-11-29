@if (Session::has('success'))
    <div class="flash alert alert-success mt-4" role="alert">
        {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
        <div>{{ Session::get('success') }}</div>
    </div>
@endif

{{-- @if ($errors->any())
    <div class="flash alert alert-danger mt-4" role="alert">
        @foreach ( $errors->all() as $error )
            <div>
                Error: {{ $error }}
            </div>
        @endforeach
    </div>
@endif --}}

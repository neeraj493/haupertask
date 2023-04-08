@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new student</h1>
        <div class="lead">
            Add new student and assign role.
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="container mt-4">
            <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data" id="form_id">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ old('title') }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="title">

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ old('description') }}"
                        type="description" 
                        class="form-control" 
                        name="description" 
                        placeholder="description">
                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="date_time" class="form-label">date_time</label>
                    <input value="{{ old('date_time') }}"
                        type="datetime-local" 
                        class="form-control" 
                        name="date_time" 
                        placeholder="date_time">
                    @if ($errors->has('date_time'))
                        <span class="text-danger text-left">{{ $errors->first('date_time') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save student</button>
                <a href="{{ route('student.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $("#form_id").validate({
                rules: {
                    title: "required",
                    description: "required",
                    date_time: "required",
                },
                messages: {
                    title: "title is required",
                    description: "description required",
                    date_time: "date and time is required",
                },
            });

        });

  

    </script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Module</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="module_name">Module Name</label>
            <input type="text" name="module_name" id="module_name" class="form-control" value="{{ old('module_name') }}" required>
        </div>
        <div class="form-group">
            <label for="lecturer_name">Lecturer Name</label>
            <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" value="{{ old('lecturer_name') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Module</button>
    </form>
</div>
@endsection

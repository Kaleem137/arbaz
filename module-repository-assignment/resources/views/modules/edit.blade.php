@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Module</h1>
    <form action="{{ route('modules.update', $module) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="module_name">Module Name</label>
            <input type="text" name="module_name" id="module_name" class="form-control" value="{{ $module->module_name }}" required>
        </div>
        <div class="form-group">
            <label for="lecturer_name">Lecturer Name</label>
            <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" value="{{ $module->lecturer_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Module</button>
    </form>
</div>
@endsection

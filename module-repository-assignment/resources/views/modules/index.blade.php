@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Modules</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Add Module</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Module Name</th>
                        <th>Lecturer Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->id }}</td>
                            <td>{{ $module->module_name }}</td>
                            <td>{{ $module->lecturer_name }}</td>
                            <td>
                                <a href="{{ route('modules.edit', $module) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

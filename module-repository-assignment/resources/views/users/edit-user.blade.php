@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="{{ App\Models\User::ROLE_STUDENT }}" {{ $user->role === App\Models\User::ROLE_STUDENT ? 'selected' : '' }}>Student</option>
                <option value="{{ App\Models\User::ROLE_LECTURER }}" {{ $user->role === App\Models\User::ROLE_LECTURER ? 'selected' : '' }}>Lecturer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection

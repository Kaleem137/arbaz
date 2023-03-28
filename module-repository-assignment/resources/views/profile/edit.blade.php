@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Profile</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="{{ \App\Models\User::ROLE_STUDENT }}"{{ $user->role === \App\Models\User::ROLE_STUDENT ? ' selected' : '' }}>Student</option>
                        <option value="{{ \App\Models\User::ROLE_LECTURER }}"{{ $user->role === \App\Models\User::ROLE_LECTURER ? ' selected' : '' }}>Lecturer</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>

            <div class="mt-5">
                <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Change Password</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.updatePassword') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                    @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection

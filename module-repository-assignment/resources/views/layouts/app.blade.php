<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Module Repository Tool') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Module Repository Tool') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link{{ Route::currentRouteName() === 'modules.index' ? ' active' : '' }}" href="{{ route('modules.index') }}">Modules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Route::currentRouteName() === 'profile.edit' ? ' active' : '' }}" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            @auth
                <div class="row">
                    <div class="col">
                        @php
                            $user = Auth::user();
                            $role = $user->role;
                        @endphp
                        <h4>Welcome {{ $user->name }}!</h4>
                        @if ($role === App\Models\User::ROLE_ADMIN)
                            <p>Role: Admin</p>
                        @elseif ($role === App\Models\User::ROLE_LECTURER)
                            <p>Role: Lecturer</p>
                        @elseif ($role === App\Models\User::ROLE_STUDENT)
                            <p>Role: Student</p>
                        @endif
                    </div>
                </div>
            @endauth
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

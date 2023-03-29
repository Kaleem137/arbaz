<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Module Repository Tool</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcY" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        body {
            background: #e3e3e3;
            font-family: 'figtree', sans-serif;
            padding: 0;
        }
        .container {
            background: #e0e0e0;
            box-shadow: 7px 7px 14px #b8b8b8, -7px -7px 14px #ffffff;
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem;
        }

        .new-class {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: center;
        }
                
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #3e3e3e;
            text-shadow: -1px -1px 1px #ffffff, 1px 1px 1px #d9d9d9;
        }
        .alert {
            margin-top: 1rem;
        }
        .welcome-section {
            background: #e3e3e3;
            text-align: center;
            padding: 2rem 0;
            border-radius: 5px;
        }
        .btn {
            text-decoration: none;
            width: 200px;
            height: 30px;
            align-items: center;
            display: flex;
            justify-content: center;
            border-radius: 10px;
            background: #e3e3e3;
            box-shadow: 7px 7px 14px #b8b8b8, -7px -7px 14px #ffffff;
            margin: 0 1rem;
            padding: 10px 20px 10px 20px;
            margin-bottom: 25px;
        }
        @media (max-width: 768px) {
            .container {
                margin: 1rem;
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="container">
        <div class="welcome-section">
            <h1>Welcome to Module Repository Tool</h1>

            <!-- Display the "Account deleted successfully" message -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <!-- Login and Register buttons -->
        <div class="new-class d-flex justify-content-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
            </div>
    </div>

    <!-- Bootstrap 5 JavaScript and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcY" crossorigin="anonymous"></script>
</body>
</html>

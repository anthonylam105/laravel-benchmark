<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .create {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            margin: 0 30px;
        }
        .create div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .showUser {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            margin: 0 25px;
        }
        .show-btns {
            text-align: center;
        }
        .showLink {
            margin: 30px 0 30px 20px;
            text-align: center;
        }
        .showLink a {
            color: #636b6f;
            padding: 0 25px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .showLink a:hover {
            color: blue;
            text-decoration: none;
        }
        .showUser button {
            border-radius: 4px;
            color: #000;
        }
        .showUser button:hover {
            background-color: #000;
            color: #fff;
        }
        .tableEdit {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            margin: 0 25px;
        }
        #users {
          border-collapse: collapse;
          width: 100%;
        }

        #users td, #users th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #users tr:nth-child(even){background-color: #f2f2f2;}

        #users tr:hover {background-color: #ddd;}

        #users th {
          padding-top: 12px;
          padding-bottom: 12px;
          background-color: #000;
          color: white;
        }
        .userForm {
            background-color: #f2f2f2;
            border-radius: 5px;
            margin: 30px;
        }
        .userForm input[type=text] {
            border-radius: 3px;
            margin-bottom: 10px;
            padding: 6px 12px;
            width: 100%;
        }
        .userForm input[type=password] {
            border-radius: 3px;
            margin-bottom: 10px;
            padding: 6px 12px;
            width: 100%;
        }
        .userForm label {
            font-weight: bold;
        }
        .update-info {
            padding: 20px;
        }
        .edit-btns {
            display: flex;
            border-radius: 5px;
            padding: 20px;
        }
        .update-btn button {
            color: black;
            background-color: white;
            margin-right: 15px;
        }
        .update-btn button:hover {
            color: white;
            background-color: black;
        }
        .delete button {
            color: black;
            background-color: white;
        }
        .delete-btn button:hover {
            color: white;
            background-color: red;
        }
        .errorMsg {
            color: red;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
</body>
</html>

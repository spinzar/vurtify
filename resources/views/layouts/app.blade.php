<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .h-100 {
            height: 100vh !important;
        }

        /* Floating label */
        .form-label-group {
          position: relative;
          margin-bottom: 1rem;
        }

        .form-label-group input,
        .form-label-group label {
          height: 3.125rem;
          padding: .75rem;
        }

        .form-label-group label {
          position: absolute;
          top: 0;
          left: 0;
          display: block;
          width: 100%;
          color: #495057;
          pointer-events: none;
          cursor: text; /* Match the input under the label */
          border: 1px solid transparent;
          border-radius: .25rem;
          transition: all .1s ease-in-out;
        }

        .form-label-group input::placeholder {
          color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
          padding-top: 1.25rem;
          padding-bottom: .25rem;
        }

        .form-label-group input:not(:placeholder-shown) ~ label {
          padding-top: .25rem;
          padding-bottom: .25rem;
          font-size: 12px;
          color: #777;
        }

        .form-label-group input:focus ~ label {
          padding-top: .25rem;
          padding-bottom: .25rem;
          font-size: 12px;
          color: #777;
        }

        .form-label-group input:focus {
          padding-top: 1.25rem;
          padding-bottom: .25rem;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="h-100">
    <div class="h-100 d-flex flex-column" id="app">

        <!-- Navbar -->
        <x-layouts.header>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </x-layouts.header> <!-- / Navbar -->

        @isset($header)
            <header class="bg-light text-muted shadow text-center py-4">
                {{ $header }}
            </header>
        @endisset

        <main class="py-4">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-layouts.footer />
    </div>

</html>

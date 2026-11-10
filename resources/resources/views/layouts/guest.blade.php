<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Student Management System') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="min-vh-100 d-flex align-items-center justify-content-center auth-page">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

                    {{-- Logo / Branding --}}
                    <div class="text-center mb-4">

                        <a href="{{ url('/') }}"
                           class="text-decoration-none">

                            <div class="auth-logo mx-auto mb-3">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>

                            <h3 class="fw-bold auth-brand">
                                Student System
                            </h3>

                        </a>

                    </div>


                    {{-- Authentication Card --}}
                    <div class="card border-0 shadow-sm auth-card">

                        <div class="card-body p-4 p-md-5">

                            {{ $slot }}

                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="text-center mt-4">

                        <small class="text-muted">
                            &copy; {{ date('Y') }}
                            Student Management System
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
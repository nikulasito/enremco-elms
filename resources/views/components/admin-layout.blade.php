<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/88a2ff0e35.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/style.css')

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="font-sans antialiased admin-dashboard">

            <!-- Sidebar -->
            <nav class="sidebar">
            <div class="sidebar-logo text-center">
                <a href="{{ url('/') }}" class="dash-logo"><img src="{{ asset('assets/images/enremco_logo.gif') }}" 
                alt="Admin Logo" class="img-fluid" style="max-width: 100px; height: auto;"></a>
            </div>
                <ul class="nav flex-column">
                <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-house-door-fill"></i> Dashboard
                        </a>
                    </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#membershipMenu" role="button"
                        aria-expanded="{{ request()->routeIs('admin.new-members', 'admin.members') ? 'true' : 'false' }}"
                        aria-controls="membershipMenu">
                        <span><i class="bi bi-people-fill"></i> Membership</span>
                        <i class="bi {{ request()->routeIs('admin.new-members', 'admin.members') ? 'bi-chevron-up' : 'bi-chevron-down' }}" id="membershipArrow"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.new-members', 'admin.members') ? 'show' : '' }}" id="membershipMenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.new-members') ? 'active' : '' }}" href="{{ route('admin.new-members') }}">
                                    <i class="bi bi-person-add"></i> New Members
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.members') ? 'active' : '' }}" href="{{ route('admin.members') }}">
                                    <i class="bi bi-person-lines-fill"></i> View Members
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="sidebar-divider">
                </ul>
            </nav>
            <!-- Main Content -->
            <div class="content-main-admin">
                
                <!-- Navigation -->
                @include('layouts.admin-navigation')

                <!-- Page Heading -->
                <!-- @isset($header)
                    <header class="bg-white">
                        <div class="container py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset -->

                <!-- Page Content -->
                <main class="p-5">
                    {{ $slot }}
                </main>
            </div>

    <!-- Include JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qahWjQ7FlxY8QNDod/NK9iq3k1uKo4tkb/jP9glln5E0IAR13z60Lw9uG3fcTRaD" crossorigin="anonymous"></script>
</body>
</html>

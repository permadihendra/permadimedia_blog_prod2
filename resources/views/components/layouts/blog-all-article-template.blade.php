<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="permadimedia" />
    @stack('meta-seo')
    <title>@yield('title', 'permadimedia - Blog')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    {{-- Inluce Vite Asset Bundling --}}
    {{-- Default Bootsstrap CSS and JS --}}
    @vite(['resources/scss/bootstrap.scss', 'resources/js/bootstrap.js'])
    <link rel="stylesheet" href="{{ asset('css/blog/custom.css') }}">
    @stack('css')

</head>

<body>
    <!-- Responsive navbar-->
    <livewire:frontend.blog-navbar />

    <!-- Page header with logo and tagline-->
    <header class="mb-4">

    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Search widget-->
                <livewire:frontend.blog-search-article />
                <div>
                    {{ $slot }}
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">


                <!-- Categories widget-->
                <livewire:frontend.blog-categories />

                <!-- Side widget-->
                <livewire:frontend.blog-sidewidget />

            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">
                Copyright &copy; Your Website 2023
            </p>
        </div>
    </footer>
    @stack('scripts')
</body>

</html>

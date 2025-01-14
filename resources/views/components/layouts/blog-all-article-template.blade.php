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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- @vite(['resources/scss/bootstrap.scss', 'resources/js/bootstrap.js']) --}}
    <link rel="preload" as="style" href="{{ asset('build/assets/bootstrap-Dr0ivd_d.css') }}" />
    <link rel="modulepreload" href="{{ asset('build/assets/bootstrap-BgcDHpuN.js') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/bootstrap-Dr0ivd_d.css') }}" data-navigate-track="reload" />
    <script type="module" src="{{ asset('build/assets/bootstrap-BgcDHpuN.js') }}" data-navigate-track="reload"></script>

    @stack('css')

</head>

<body>
    <!-- Responsive navbar-->
    <livewire:frontend.blog-navbar />

    <!-- Page header with logo and tagline-->
    <header class="mb-4">

    </header>
    <!-- Page content-->
    <div class="container min-vh-100">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                @if (Route::is('blog-all-articles'))
                    <!-- Search widget-->
                    <livewire:frontend.blog-search-article />
                @endif

                <div>
                    {{ $slot }}
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">

                @if (Route::is('blog-all-articles'))
                    <!-- Categories widget-->
                    <livewire:frontend.blog-categories />
                @endif


                <!-- Side widget-->
                {{-- <livewire:frontend.blog-sidewidget /> --}}

            </div>
        </div>
    </div>

    <!-- Footer-->
    <x-layouts.footer />

    @stack('scripts')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>

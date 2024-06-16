<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="permadimedia" />
    @stack('meta-seo')
    <title>@yield('title', 'permadimedia - Blog')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    {{-- Inluce Vite Asset Bundling --}}
    {{-- Default Bootsstrap CSS and JS --}}
    @stack('css')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- @vite(['resources/scss/bootstrap.scss', 'resources/js/bootstrap.js']) --}}
    <link rel="preload" as="style" href="{{ asset('build/assets/bootstrap-Dr0ivd_d.css') }}" />
    <link rel="modulepreload" href="{{ asset('build/assets/bootstrap-BgcDHpuN.js') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/bootstrap-Dr0ivd_d.css') }}" data-navigate-track="reload" />
    <script type="module" src="{{ asset('build/assets/bootstrap-BgcDHpuN.js') }}" data-navigate-track="reload"></script>
    <link rel="stylesheet" href="{{ asset('js/ckeditor4/plugins/codesnippet/lib/highlight/styles/atom-one-dark.min.css') }}">
    <script src="{{ asset('js/ckeditor4/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    

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
                {{ $slot }}
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <livewire:frontend.blog-search />

                <!-- Categories widget-->
                <livewire:frontend.blog-categories />

                <!-- Side widget-->
                <livewire:frontend.blog-sidewidget />


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
    
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</body>

</html>

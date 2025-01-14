<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a wire:navigate class="navbar-brand" href="{{ route('blog-home') }}">permadimedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header ps-4">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu - permadimedia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ps-4">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a wire:navigate class="nav-link @if (Route::is('blog-home')) {{ 'active' }} @endif"
                            href="{{ route('blog-home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link @if (Route::is('blog-all-articles')) {{ 'active' }} @endif"
                            href="{{ route('blog-all-articles') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link @if (Route::is('blog-about')) {{ 'active' }} @endif"
                            href="{{ route('blog-about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">MENU</div>
            <a class="nav-link @if (Route::is('dashboard')) {{ 'active' }} @endif"
                href="{{ route('dashboard') }}" wire:navigate>
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link @if (request()->segment(1) == 'articles') {{ 'active' }} @endif"
                href="{{ route('articles') }}" wire:navigate>
                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                Articles
            </a>

            <a class="nav-link @if (Route::is('tags')) {{ 'active' }} @endif" href="{{ route('tags') }}"
                wire:navigate>
                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                Tags
            </a>

            @if (Auth::user()->role->name == 'administrator')
                <div class="sb-sidenav-menu-heading">Administrator</div>
                <a class="nav-link @if (Route::is('categories')) {{ 'active' }} @endif"
                    href="{{ route('categories') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Categories
                </a>
                <a class="nav-link @if (Route::is('users')) {{ 'active' }} @endif"
                    href="{{ route('users') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-circle-user"></i></div>
                    Users
                </a>
                <a class="nav-link @if (Route::is('blog.config')) {{ 'active' }} @endif"
                    href="{{ route('blog.config') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Blog Config
                </a>
            @endif



            <div class="sb-sidenav-menu-heading">Examples</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Layouts
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <livewire:template.app-version />
    </div>
</nav>

@script
    <script>
        // This Javascript will get executed every time this component is loaded onto the page...
        // Toggle the side navigation
        window.addEventListener("DOMContentLoaded", (event) => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector("#sidebarToggle");
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem("sb|sidebar-toggle") === "true") {
                //     document.body.classList.toggle("sb-sidenav-toggled");
                // }
                sidebarToggle.addEventListener("click", (event) => {
                    event.preventDefault();
                    document.body.classList.toggle("sb-sidenav-toggled");
                    localStorage.setItem(
                        "sb|sidebar-toggle",
                        document.body.classList.contains("sb-sidenav-toggled")
                    );

                    // This log event
                    console.log('toggle event - livewire sidebar');

                });
            }
        });
    </script>
@endscript

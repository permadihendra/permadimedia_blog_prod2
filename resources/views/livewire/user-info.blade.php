<div>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">

                @if (Auth::user()->role->name == 'administrator')
                    <small class="badge bg-success">Admin</small>
                @elseif (Auth::user()->role->name == 'editor')
                    <small class="badge bg-primary">Editor</small>
                @elseif (Auth::user()->role->name == 'user')
                    <small class="badge bg-secondary">User</small>
                @endif
                {{ Str::ucfirst(Auth::user()->name) }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('user.profile') }}" wire:navigate>User Profile</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>

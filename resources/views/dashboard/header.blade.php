<nav class="navbar navbar-expand bg-body px-4 d-flex justify-content-between">

    <!-- Sidebar Button -->
    <button class="btn btn-link text-dark fs-3" data-lte-toggle="sidebar">
        <i class="bi bi-list"></i>
    </button>

    <!-- User Dropdown -->
    <div class="dropdown">
        <a class="d-flex align-items-center text-dark text-decoration-none"
            href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">

            <span class="me-2">{{ Auth::user()->name ?? 'Guest' }}</span>
            <i class="bi bi-person-circle fs-3"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li class="dropdown-header">
                <strong style="color: black;">{{ Auth::user()->name ?? 'Guest' }}</strong><br>
                <small>{{ Auth::user()->email ?? '' }}</small>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

</nav>

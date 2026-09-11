@php
    $topNavLinks = [
        'Home'             => '#',
        'Leads onDemand'   => '#',
        'Sales onDemand'   => '#',
        'Opportunities'    => '#',
        'Content onDemand' => '#',
        'Support onDemand' => '#',
        'Reports onDemand' => '#',
        'Module 8'         => '#',
        'Module 9'         => '#',
    ];
@endphp

<header class="topbar">
    <div class="topbar-inner container-fluid">

        <!-- FIRST ROW -->
        <div class="d-flex align-items-center">

            <!-- LEFT: Company -->
            <div class="brand-col d-flex align-items-center gap-2 flex-shrink-0">
                <button class="icon-btn sidebar-toggle-btn"
                        id="sidebarToggle"
                        aria-label="Toggle menu">
                    <i class="bi bi-list fs-5"></i>
                </button>

                <div class="brand-logo">
                    <i class="bi bi-grid-fill"></i>
                </div>

                <span class="brand-name">Company</span>
            </div>

            <!-- DESKTOP NAVIGATION -->
            <nav class="top-nav d-none d-xl-flex align-items-center gap-1 flex-wrap mx-4">
                @foreach ($topNavLinks as $label => $url)
                    <a href="{{ $url }}"
                       class="nav-link text-nowrap {{ $label === 'Home' ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <!-- RIGHT: Actions -->
            <div class="action-col d-flex align-items-center gap-2 ms-auto flex-shrink-0">

                <button class="icon-btn" title="Search">
                    <i class="bi bi-search"></i>
                </button>

                <button class="icon-btn position-relative" title="Notifications">
                    <i class="bi bi-bell"></i>
                    <span class="notif-dot"></span>
                </button>

                <div class="dropdown">
                    <button class="user-chip dropdown-toggle"
                            data-bs-toggle="dropdown">

                        <span class="avatar-dot">MG</span>

                        <span class="d-none d-sm-inline">
                            M. Greevos
                        </span>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">Sign out</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>


        <!-- TABLET / MOBILE NAVIGATION -->
        <nav class="top-nav d-flex d-xl-none align-items-center flex-wrap gap-1 w-100 mt-2">
            @foreach ($topNavLinks as $label => $url)
                <a href="{{ $url }}"
                   class="nav-link text-nowrap {{ $label === 'Home' ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>

    </div>
</header>
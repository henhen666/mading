<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Admin Dashboard' ? 'active' : '' }} navigation" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/articles*') ? 'active' : '' }}"
                    href="/dashboard/articles">
                    <span data-feather="file"></span>
                    Articles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/pengumuman*') ? 'active' : '' }}"
                    href="/dashboard/pengumuman">
                    <span data-feather="clipboard"></span>
                    Pengumuman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/advertisement*') ? 'active' : '' }}"
                    href="/dashboard/advertisement">
                    <span data-feather="layers"></span>
                    Advertisement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/daai_tv*') ? 'active' : '' }}"
                    href="/dashboard/daai_tv">
                    <span data-feather="tv"></span>
                    DAAI TV
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/rekap_absen*') ? 'active' : '' }}"
                    href="/dashboard/rekap_absen">
                    <span data-feather="users"></span>
                    Rekap Absen
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link navigation {{ Request::is('dashboard/users*') ? 'active' : '' }}"
                    href="/dashboard/users">
                    <span data-feather="settings"></span>
                    {{ auth()->user()->username }}
                </a>
            </li>
        </ul>
    </div>
</nav>

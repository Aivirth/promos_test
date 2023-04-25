<div id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-user-secret me-2"></i>PromosTest
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('home') }}"
            class="list-group-item list-group-item-action bg-transparent second-text {{ Route::currentRouteNamed('home') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
        @if (Auth::user()->is_admin)
            <a href="{{ route('all_clienti') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Route::currentRouteNamed('all_clienti') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-2"></i>Clienti</a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-list-check me-2"></i></i>Settori</a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-toggle-on me-2"></i></i>Tipi</a>
        @endif

        @if (!Auth::user()->is_admin)
            <a href="{{ route('edit_cliente', Auth::user()->id) }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-regular fa-pen-to-square me-2"></i>Anagrafica</a>
        @endif


        @auth
            <a href="{{ route('logout') }}"
                class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fas fa-power-off me-2"></i>Logout</a>
        @endauth
    </div>
</div>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            @if (auth()->user()->can('data_petugas'))
            <!-- Data Petugas -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('petugas.index') || Route::is('petugas.create') || Route::is('petugas.edit') ? 'active' : '' }}" href="{{ route('petugas.index') }}">
                    <i class="ti-headphone-alt menu-icon"></i>
                    <span class="menu-title">Data Petugas</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->can('data_kendaraan'))
            <!-- Data Kendaraan -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('kendaraan.index') || Route::is('kendaraan.create') || Route::is('kendaraan.edit') ? 'active' : '' }}" href="{{ route('kendaraan.index') }}">
                    <i class="ti-truck menu-icon"></i>
                    <span class="menu-title">Data Kendaraan</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->can('data_petugas'))
            <!-- Pemisah -->
            <li class="nav-item">
                <hr class="sidebar-divider">
            </li>
            @endif
            <!-- Data Pengiriman -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('pengiriman.index') || Route::is('pengiriman.create') || Route::is('pengiriman.edit') ? 'active' : '' }}" href="{{ route('pengiriman.index') }}">
                    <i class="ti-package menu-icon"></i>
                    <span class="menu-title">Data Pengiriman</span>
                </a>
            </li>
        </ul>
    </nav>
    

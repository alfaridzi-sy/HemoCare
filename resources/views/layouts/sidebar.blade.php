<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('master/assets/img/kidney_care.png') }}" alt="Kidney Care Logo" class="responsive-logo">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @if(auth()->user()->role != "Petugas")
        <!-- Data Master -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>

        <li class="menu-item">
            <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Akun">Akun</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/bed" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-bed"></i>
                <div data-i18n="Tempat Tidur">Tempat Tidur</div>
            </a>
        </li>
        @endif

        <!-- Penggunaan Bed -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Penggunaan Bed</span></li>

        <li class="menu-item">
            <a href="daftarBed" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-wrench"></i>
                <div data-i18n="Manajemen Status">Manajemen Status</div>
            </a>
        </li>

        <!-- Laporan -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>

        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file"></i>
                <div data-i18n="Manajemen Status">Riwayat Pelayanan</div>
            </a>
        </li>
    </ul>
</aside>

@props(['title'])
<div class="grid-left-sidebar">
    <div class="left-logo">
        <img src="{{ asset('default/logo/favication.svg') }}" alt="favicon" id="favSidebar">
        <div class="sidebar-nama">
            PT. Media Kaba Duobaleh
        </div>
    </div>
    <ul class="sidebar-menu">
        @foreach ($allMenu as $menu)
            @if ($menu->posisi_menu === 'admin')
                @php
                    $menuAktif = collect($allSubMenu)->some(
                        fn($sbm) => $sbm->id_menu === $menu->id_menu && $sbm->nama_submenu === $title,
                    );
                @endphp
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ $menuAktif ? 'sidebar-menu-aktif' : '' }}"
                        data-target="#menu-{{ $menu->slug_menu }}">
                        <span class="icon-sidebar {{ $menu->icon_menu }}"></span>
                        <span class="nama-sidebar">{{ $menu->nama_menu }}</span>
                        <span class="toggle-arrow fa-solid fa-chevron-down"></span>
                    </a>
                    <div id="menu-{{ $menu->slug_menu }}" class="collapse-menu">
                        <ul class="sidebar-submenu">
                            @foreach ($allSubMenu as $sbm)
                                @if ($sbm->id_menu === $menu->id_menu)
                                    @php
                                        $isAktifSubMenu = $sbm->nama_submenu === $title;
                                    @endphp
                                    <li class="sub-item">
                                        <a href="{{ route('admin.viewHalaman', ['slugMenu' => $menu->slug_menu, 'slugSubMenu' => $sbm->slug_submenu]) }}"
                                            class="sub-link {{ $isAktifSubMenu ? 'sidebar-submenu-aktif' : '' }}">
                                            {{ $sbm->nama_submenu }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
    <a href="#" class="logout">
        <span class="icons fa fa-door-open"></span>
        <span class="sidebar-text">Log Out</span>
    </a>
</div>

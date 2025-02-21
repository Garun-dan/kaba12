<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <span class="according-halaman">{{ $menu }} > <span class="according-target">{{ $submenu }}</span></span>
    <div class="d-flex">
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Daftar Menu</span>
                <button class="tbl-tambah tbl-modals" id="btnModals" data-target="#tambahMenu"><span
                        class="icons-tombol fa-solid fa-plus"></span></button>
            </div>
            <div class="body-box">
                <div class="table-responsive">
                    <table id="tabel" class="display table table-striped table-bordere table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Menu</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allMenu as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="text-align: left;"><span
                                            class="icons-table {{ $menu->icon_menu }}"></span>{{ $menu->nama_menu }}
                                    </td>
                                    <td>
                                        <button class="tbl-edit tbl-modals" id="btnModals"
                                            data-target="#editMenu-{{ $menu->slug_menu }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Daftar Submenu</span>
                <button class="tbl-tambah tbl-modals" id="btnModals" data-target="#tambahSubMenu"><span
                        class="icons-tombol fa-solid fa-plus"></span></button>
            </div>
            <div class="body-box">
                <div class="table-responsive">
                    <table id="tabel" class="display table table-striped table-bordere table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Submenu</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allSubMenu as $sbm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="text-align: left;">{{ $sbm->nama_submenu }}</td>
                                    <td>
                                        <button class="tbl-edit tbl-modals" id="btnModals"
                                            data-target="#editSubMenu-{{ $sbm->slug_submenu }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        let slugMenu = @json($slugMenu);
        let slugSubMenu = @json($slugSubMenu);
        let allMenu = @json($allMenu);
    </script>
    <script src="{{ asset('tema/backend/js-halaman/tambahMenu.js') }}"></script>
    <script src="{{ asset('tema/backend/js-halaman/tambahSubMenu.js') }}"></script>
</x-backend.layout>

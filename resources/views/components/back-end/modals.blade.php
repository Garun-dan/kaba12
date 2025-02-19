{{-- Tambah Menu --}}
<div id="tambahMenu" class="modal">
    <div class="modal-body">
        <div class="modal-head">
            <span class="judul-head-modal">Form Tambah Menu</span>
            <span class="closeModal">&times;</span>
        </div>
        <div class="modal-content">
            <div id="formTambahMenu" class="ht-theme-main-dark-auto"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-close">Close</button>
            <button type="button" class="btn-simpan tambah-menu">Simpan</button>
        </div>
    </div>
</div>

{{-- Edit Menu --}}
@foreach ($allMenu as $menu)
    <div id="editMenu-{{ $menu->slug_menu }}" class="modal">
        <div class="modal-body">
            <div class="modal-head">
                <span class="judul-head-modal">Form Edit Menu {{ $menu->nama_menu }}</span>
                <span class="closeModal">&times;</span>
            </div>
            <form
                action="{{ route('admin.updateMenu', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'idMenu' => $menu->id_menu]) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="d-flex">
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" value="{{ $menu->nama_menu }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="icon_menu">Icon Menu</label>
                            <input type="text" name="icon_menu" id="icon_menu" value="{{ $menu->icon_menu }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="posisi_menu">Posisi Menu</label>
                            <select name="posisi_menu" id="posisi_menu">
                                <option value="{{ $menu->posisi_menu }}">{{ ucwords($menu->posisi_menu) }}</option>
                                @if ($menu->posisi_menu === 'admin')
                                    <option value="home">Home</option>
                                @else
                                    <option value="admin">Admin</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-close">Close</button>
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

{{-- Tambah SubMenu --}}
<div id="tambahSubMenu" class="modal">
    <div class="modal-body">
        <div class="modal-head">
            <span class="judul-head-modal">Form Tambah Submenu</span>
            <span class="closeModal">&times;</span>
        </div>
        <div class="modal-content">
            <div id="formtambahSubMenu" class="ht-theme-main"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-close">Close</button>
            <button type="button" class="btn-simpan tambah-submenu">Simpan</button>
        </div>
    </div>
</div>

{{-- Edit SubMenu --}}
@foreach ($allSubMenu as $sbm)
    <div id="editSubMenu-{{ $sbm->slug_submenu }}" class="modal">
        <div class="modal-body">
            <div class="modal-head">
                <span class="judul-head-modal">Form Edit Submenu {{ $sbm->nama_submenu }}</span>
                <span class="closeModal">&times;</span>
            </div>
            <form
                action="{{ route('admin.updateSubMenu', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'idSubMenu' => $sbm->id_submenu]) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="d-flex">
                        <div class="form-group">
                            <label for="nama_submenu">Nama SubMenu</label>
                            <input type="text" name="nama_submenu" id="nama_submenu"
                                value="{{ $sbm->nama_submenu }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_menu">Nama Menu</label>
                            <select name="id_menu" id="id_menu">
                                <option value="{{ $sbm->id_menu }}">{{ $sbm->joinMenu->nama_menu }}</option>
                                @foreach ($allMenu as $mnu)
                                    @if ($mnu->id_menu !== $sbm->id_menu)
                                        <option value="{{ $mnu->id_menu }}">{{ $mnu->nama_menu }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-close">Close</button>
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

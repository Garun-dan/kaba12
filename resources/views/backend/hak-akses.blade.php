<x-back-end.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <span class="according-halaman">{{ $menu }} > <span class="according-target">{{ $submenu }}</span></span>
    <div class="d-flex">
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Form Role</span>
            </div>
            <div class="body-box">
                <form action="{{ route('admin.tambahRole', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu]) }}"
                    method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_role">Nama Role</label>
                        <input type="text" name="nama_role" id="nama_role"
                            class="@error('nama_role') is-invalid @enderror" placeholder="Nama Role" required>
                        @error('nama_role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-simpan">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tabel" class="display table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allRole as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="text-align: left;">
                                {{ $role->nama_role }}
                                <form
                                    action="{{ route('admin.updateRole', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'idRole' => $role->id_role]) }}"
                                    method="post" id="formEditRole-{{ $role->slug_role }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_role">Nama Role</label>
                                        <input type="text" name="nama_role" id="nama_role"
                                            class="@error('nama_role') is-invalid @enderror" placeholder="Nama Role"
                                            value="{{ $role->nama_role }}" required>
                                        @error('nama_role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-simpan">Simpan Data</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="d-flex" style="justify-content: center !important;">
                                    <button type="button" class="badge-edit tbl-collapse"
                                        data-target="formEditRole-{{ $role->slug_role }}">
                                        <span class="icons-badge fa-solid fa-feather"></span>
                                    </button>
                                    <button type="button" class="badge-akses tbl-modals" id="btnModals"
                                        data-target="#akses-{{ $role->slug_role }}">
                                        <span class="icons-badge fa-solid fa-key"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const menu = @json($slugMenu);
        const submenu = @json($slugSubMenu);
    </script>
    <script src="{{ asset('tema/backend/js-halaman/collapse.js') }}"></script>
    <script src="{{ asset('tema/backend/js-halaman/beriAkses.js') }}"></script>
</x-back-end.layout>

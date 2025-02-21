<x-back-end.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div style="display: flex;align-items:center;justify-content:space-between; margin-bottom:10px;">
        <div class="form-group">
            <span class="according-halaman">{{ $menu }} > <span
                    class="according-target">{{ $submenu }}</span></span>
        </div>
        <div class="form-group">
            <form action="{{ route('admin.resetTampilan', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu]) }}"
                method="post" id="formResetTampilan">
                @csrf
                <input type="hidden" name="id_tampilan" id="id_tampilan" value="mpt-001">
                <button type="submit" class="btn-reset tbl-reset">Reset</button>
            </form>
        </div>
    </div>
    <div class="d-flex">
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Identitas</span>
            </div>
            <div class="body box">
                <form
                    action="{{ route('admin.updateTampilan', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'jenis' => 'identitas']) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_web">Nama Website</label>
                        <input type="text" name="nama_web" id="nama_web"
                            class="@error('nama_web') is-invalid @enderror" placeholder="Nama Website"
                            value="{{ $pengaturan->nama_web }}" required>
                        @error('nama_web')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slogan_web">Slogan Website</label>
                        <input type="text" name="slogan_web" id="slogan_web"
                            class="@error('slogan_web') is-invalid @enderror" placeholder="Slogan Website"
                            value="{{ $pengaturan->slogan_web }}" required>
                        @error('slogan_web')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" name="nama_instansi" id="nama_instansi"
                            class="@error('nama_instansi') is-invalid @enderror" placeholder="Nama Instansi"
                            value="{{ $pengaturan->nama_instansi }}" required>
                        @error('nama_instansi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_email">Alamat Email</label>
                        <input type="text" name="alamat_email" id="alamat_email"
                            class="@error('alamat_email') is-invalid @enderror" placeholder="Alamat Email"
                            value="{{ $pengaturan->alamat_email }}" required>
                        @error('alamat_email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telephone</label>
                        <input type="text" name="no_telp" id="no_telp"
                            class="@error('no_telp') is-invalid @enderror" placeholder="Nomor Telephone"
                            value="{{ $pengaturan->nomor_telephone }}" required>
                        @error('no_telp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="@error('alamat') is-invalid @enderror" cols="" rows="5">{{ $pengaturan->alamat }}</textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Media</span>
            </div>
            <div class="body box">
                <form
                    action="{{ route('admin.updateTampilan', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'jenis' => 'media']) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="logo_web">Logo Website</label>
                        <input type="file" name="logo_web" id="logo_web"
                            class="@error('logo_web') is-invalid @enderror" placeholder="Logo Website">
                        <img src="{{ asset($pengaturan->logo_web) }}" alt="logo" id="p_logo">
                        @error('logo_web')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="favicon_web">Favication Web</label>
                        <input type="file" name="favicon_web" id="favicon_web"
                            class="@error('favicon_web') is-invalid @enderror" placeholder="Favication Web">
                        <img src="{{ asset($pengaturan->favicon_web) }}" alt="favicon" id="p_fav">
                        @error('favicon_web')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="background_media">Background Media</label>
                        <input type="file" name="background_media" id="background_media"
                            class="@error('background_media') is-invalid @enderror" placeholder="Background Media">
                        <img src="{{ asset($pengaturan->background_web) }}" alt="background" id="p_bc">
                        @error('background_media')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="background_login">Background Login</label>
                        <input type="file" name="background_login" id="background_login"
                            class="@error('background_login') is-invalid @enderror" placeholder="Background Login">
                        <video id="p_login" src="{{ asset($pengaturan->background_login) }}" autoplay muted
                            controls></video>
                        @error('background_login')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-item">
            <div class="head-box">
                <span class="judul-box">Sosial Media</span>
            </div>
            <div class="body box">
                <form
                    action="{{ route('admin.updateTampilan', ['slugMenu' => $slugMenu, 'slugSubMenu' => $slugSubMenu, 'jenis' => 'sosmed']) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="fb">Akun Facebook</label>
                        <input type="text" name="fb" id="fb"
                            class="@error('fb') is-invalid @enderror" placeholder="Akun Facebook"
                            value="{{ $pengaturan->fb }}" required>
                        @error('fv')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ig">Akun Instagram</label>
                        <input type="text" name="ig" id="ig"
                            class="@error('ig') is-invalid @enderror" placeholder="Akun Instagram"
                            value="{{ $pengaturan->ig }}" required>
                        @error('ig')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thread">Akun Thread</label>
                        <input type="text" name="thread" id="thread"
                            class="@error('thread') is-invalid @enderror" placeholder="Akun Thread"
                            value="{{ $pengaturan->thread }}" required>
                        @error('thread')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tiktok">Akun Tiktok</label>
                        <input type="text" name="tiktok" id="tiktok"
                            class="@error('tiktok') is-invalid @enderror" placeholder="Akun Tiktok"
                            value="{{ $pengaturan->tiktok }}" required>
                        @error('tiktok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter">Akun Twitter</label>
                        <input type="text" name="twitter" id="twitter"
                            class="@error('twitter') is-invalid @enderror" placeholder="Akun Twitter"
                            value="{{ $pengaturan->twitter }}" required>
                        @error('twitter')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="youtube">Akun Youtube</label>
                        <input type="text" name="youtube" id="youtube"
                            class="@error('youtube') is-invalid @enderror" placeholder="Akun Youtube"
                            value="{{ $pengaturan->youtube }}" required>
                        @error('youtube')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('tema/backend/js-halaman/previewMedia.js') }}"></script>
    <script>
        document.getElementById('formResetTampilan').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Anda yakin ingin mereset?',
                text: "Data yang sudah diubah akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Ya, reset!',
                cancelButtonColor: "#d33",
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</x-back-end.layout>

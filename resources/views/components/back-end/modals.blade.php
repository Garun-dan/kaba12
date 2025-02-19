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
            <button type="button" class="btn-simpan btn-submit">Simpan</button>
        </div>
    </div>
</div>

{{-- Edit Menu --}}
<div id="editMenu" class="modal">
    <div class="modal-body">
        <div class="modal-head">
            <span class="judul-head-modal">Form Edit Menu</span>
            <span class="closeModal">&times;</span>
        </div>
        <div class="modal-content">
            <form action="#" method="post">
                <div class="d-flex">
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu" placeholder="Nama Menu" required>
                    </div>
                    <div class="form-group">
                        <label for="icon_menu">Icon Menu</label>
                        <input type="text" name="icon_menu" id="icon_menu" placeholder="Nama Menu" required>
                    </div>
                    <div class="form-group">
                        <label for="posisi_menu">Posisi Menu</label>
                        <select name="posisi_menu" id="posisi_menu">
                            <option value="admin">Admin</option>
                            <option value="home">Home</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-close">Close</button>
            <button type="submit" class="btn-simpan btn-submit">Simpan</button>
        </div>
    </div>
</div>

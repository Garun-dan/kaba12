<x-backend.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <span class="according-halaman">Master Data > <span class="according-target">Manajemen Menu</span></span>
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
                            <tr>
                                <td>1</td>
                                <td style="text-align: left;"><span
                                        class="icons-table fa-solid fa-database"></span>Master Data</td>
                                <td>
                                    <button class="tbl-edit tbl-modals" id="btnModals"
                                        data-target="#editMenu">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-item"></div>
    </div>

    <script>
        const formTambahMenu = document.querySelector('#formTambahMenu');

        const hot = new Handsontable(formTambahMenu, {
            data: Array(100).fill().map(() => ["", "", ""]),
            rowHeaders: true,
            colHeaders: ["Nama Menu", "Icon Menu", "Posisi"],
            width: '100%',
            height: '380px',
            autoWrapRow: true,
            autoWrapCol: true,
            licenseKey: 'non-commercial-and-evaluation',
            colWidths: [250, 200, 120],
            columns: [{
                    data: 0,
                    type: 'text'
                },
                {
                    data: 1,
                    type: 'text'
                },
                {
                    data: 2,
                    type: 'dropdown',
                    source: ['home', 'admin'],
                },
            ],
        });
    </script>
</x-backend.layout>

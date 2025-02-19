document.addEventListener("DOMContentLoaded", function () {
    const formtambahSubMenu = document.querySelector('#formtambahSubMenu');
    
    if (!formtambahSubMenu) {
        console.error('Element #formtambahSubMenu tidak ditemukan!');
        return;
    }

    let menuDropdown = Array.isArray(allMenu) ? allMenu.map(menu => menu.nama_menu) : [];

    const tabelForm = new Handsontable(formtambahSubMenu, {
        data: Array(100).fill().map(() => ["", ""]),
        rowHeaders: true,
        colHeaders: ["Nama Sub Menu", "Nama Menu"],
        width: '100%',
        height: '380px',
        autoWrapRow: true,
        autoWrapCol: true,
        licenseKey: 'non-commercial-and-evaluation',
        colWidths: [250, 250],
        columns: [
            { data: 0, type: 'text' },
            { data: 1, type: 'dropdown', source: menuDropdown },
        ],
    });

    document.querySelectorAll('.closeModal').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelector('#tambahSubMenu').style.display = 'none';
        });
    });

    document.querySelector('.tambah-submenu')?.addEventListener('click', function () {
        let data = tabelForm.getData();
        let filteredData = data.filter(row => row.some(cell => cell !== null && cell !== ""));

        if (filteredData.length === 0) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Tidak ada data yang akan disimpan!',
                icon: 'warning'
            });
            return;
        }

        fetch(`/admin/${slugMenu}/${slugSubMenu}/tambah-submenu`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ data: filteredData })
        })
        .then(response => response.json())
        .then(result => {
            Swal.fire({
                title: result.swal.title,
                text: result.swal.text,
                icon: result.swal.icon
            });

            if (result.success) {
                tabelForm.clear();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan dalam menyimpan data!',
                icon: 'error'
            });
        });
    });
});

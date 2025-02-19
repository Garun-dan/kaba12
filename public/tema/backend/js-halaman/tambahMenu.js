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

    document.querySelector('.tambah-menu').addEventListener('click', function() {
        let data = hot.getData();

        let filteredData = data.filter(row => row.some(cell => cell !== null && cell !== ""));

        if (filteredData.length === 0) {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Tidak ada data yang akan disimpan!',
                icon: 'warning'
            });
            return;
        }

        // let slugMenu = @json($slugMenu);
        // let slugSubMenu = @json($slugSubMenu);

        fetch(`/admin/${slugMenu}/${slugSubMenu}/tambah-menu`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    data: filteredData
                })
            })
            .then(response => response.json())
            .then(result => {
                Swal.fire({
                    title: result.swal.title,
                    text: result.swal.text,
                    icon: result.swal.icon
                });

                if (result.success) {
                    hot.clear();
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
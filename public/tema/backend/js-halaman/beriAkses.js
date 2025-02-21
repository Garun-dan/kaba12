// Tabel Akses
$(document).ready(function () {
    $('#tabelAkses.display').DataTable({
        fixedHeader: true,
        paging: false,
        scrollY: 300,
        order: [
            [0, "asc"]
        ],
        columnDefs: [{
                width: '70px',
                targets: [0]
            },
            {
                className: 'dt-center',
                targets: '_all'
            },
        ],
    });
});


// Beri Akses
$(document).on("click", ".beriAkses", function (e) {
    e.preventDefault();

    const button = $(this);
    const idRole = button.data("idrole");
    const idMenu = button.data("idmenu");
    const idSubMenu = button.data("idsubmenu");
    const url = `/admin/${menu}/${submenu}/beri-akses`;

    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            idRole:idRole,
            idMenu:idMenu,
            idSubMenu:idSubMenu,
        },
        success: function (response) {
            if (response.status === 'unlocked') {
                button.removeClass("badge-danger").addClass("badge-success");
                button.find("span").removeClass("fa-lock").addClass("fa-lock-open");
            } else {
                button.removeClass("badge-success").addClass("badge-danger");
                button.find("span").removeClass("fa-lock-open").addClass("fa-lock");
            }
        },
        error: function (xhr, status, error) {
            Swal.fire("Gagal!", "Terjadi kesalahan saat memberi akses.", "error");
        },
    });



    // $.ajax({
    //     url: `/admin/${menu}/${submenu}/beri-akses`,
    //     type: "POST",
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //     },
    //     data: {
    //         idRole: idRole,
    //         idMenu: idMenu,
    //         idSubMenu: idSubMenu,
    //     },
    //     success: function(response) {
    //         if (response.status === 'unlocked') {
    //             button.removeClass("badge-danger").addClass("badge-success");
    //             button.find("span").removeClass("fa-lock").addClass("fa-lock-open");
    //         } else {
    //             button.removeClass("badge-success").addClass("badge-danger");
    //             button.find("span").removeClass("fa-lock-open").addClass("fa-lock");
    //         }
    //     },
    //     error: function(xhr, status, error) {
    //         console.log(xhr.responseText); 
    //         Swal.fire("Gagal!", "Terjadi kesalahan saat memberi akses.", "error");
    //     },
    // });
});


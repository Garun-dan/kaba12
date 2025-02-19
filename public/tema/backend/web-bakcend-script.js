// Collase Sidebar Menu
document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    sidebarLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute("data-target"));

            if (target) {
                target.classList.toggle("show");
            }

            this.classList.toggle("active");

            const arrow = this.querySelector(".toggle-arrow");
            if (target.classList.contains("show")) {
                arrow.style.transform = "rotate(0deg)";
            } else {
                arrow.style.transform = "rotate(90deg)";
            }
        });
    });
});

// DataTabel
$(document).ready(function () {
    $('#tabel.display').DataTable({
        fixedHeader: true,
        paging: false,
        scrollY: 500,
        order: [
            [0, "asc"]
        ],
        columnDefs: [
            {
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

// Open Modals
document.querySelectorAll('.tbl-modals').forEach(tblModals => {
    tblModals.addEventListener("click", () => {
        const target = document.querySelector(tblModals.dataset.target);

        if (target) {
            target.style.display = "block";
        }
    });
});

// Close Modal
document.querySelectorAll(".modal").forEach((modal) => {
    const closeModal = modal.querySelector(".closeModal");
    const btnClose = modal.querySelector(".btn-close");
    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });
    btnClose.addEventListener("click", () => {
        modal.style.display = "none";
    });
});

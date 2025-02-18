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
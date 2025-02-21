// Collapse Edit Role
document.addEventListener('DOMContentLoaded', function () {
    const formEditRoles = document.querySelectorAll('[id^="formEditRole-"]');
    formEditRoles.forEach(function (form) {
        form.style.display = 'none';
    });

    const btnCollapseButtons = document.querySelectorAll('.tbl-collapse');
    btnCollapseButtons.forEach(function (btnCollapse) {
        btnCollapse.addEventListener('click', function () {
            const targetForm = document.querySelector('#' + btnCollapse.dataset.target);

            if (targetForm.style.display === 'block') {
                targetForm.style.display = 'none';
            } else {
                formEditRoles.forEach(function (form) {
                    if (form !== targetForm) {
                        form.style.display = 'none';
                    }
                });
                targetForm.style.display = 'block';
            }
        });
    });
});


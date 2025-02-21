// success
var success = $("#success").data("success");
if (success) {
    Swal.fire({
        icon: "success",
        title: success,
    });
}

// error
var error = $("#error").data("error");
if (error) {
    Swal.fire({
        icon: "error",
        title: error,
    });
}

// warning
var warning = $("#warning").data("warning");
if (warning) {
    Swal.fire({
        icon: "warning",
        title: warning,
    });
}

// Reset Tampilan
document.getElementById('formResetTampilan').addEventListener('submit', function (event) {
    event.preventDefault();

    // var action = this.action;
    // var formData = new FormData(this);

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


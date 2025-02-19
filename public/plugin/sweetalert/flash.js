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
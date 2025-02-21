// preview logo
document.getElementById('logo_web').addEventListener("change", function (event) {
    const fileLogo = event.target.files[0];
    const p_logo = document.getElementById('p_logo');
    
    if (fileLogo) {
        const readLogo = new FileReader();

        readLogo.onload = function (e) {
            p_logo.src = e.target.result;
        };
        readLogo.readAsDataURL(fileLogo);
    } else {
        p_logo.src = "default/logo/logo.svg";
    }
});

// preview favicon
document.getElementById('favicon_web').addEventListener("change", function (event) {
    const fileFavicon = event.target.files[0];
    const p_fav = document.getElementById('p_fav');
    
    if (fileFavicon) {
        const readLogo = new FileReader();

        readLogo.onload = function (e) {
            p_fav.src = e.target.result;
        };
        readLogo.readAsDataURL(fileFavicon);
    } else {
        p_fav.src = "default/logo/favication.svg";
    }
});

// preview background media
document.getElementById('background_media').addEventListener("change", function (event) {
    const fileBackgroundMedia = event.target.files[0];
    const p_bc = document.getElementById('p_bc');
    
    if (fileBackgroundMedia) {
        const readLogo = new FileReader();

        readLogo.onload = function (e) {
            p_bc.src = e.target.result;
        };
        readLogo.readAsDataURL(fileBackgroundMedia);
    } else {
        p_bc.src = "default/media/image/background.jpg";
    }
});

// preview background login
document.getElementById('background_login').addEventListener("change", function (event) {
    const fileBackgroundLogin = event.target.files[0];
    const p_login = document.getElementById('p_login');
    
    if (fileBackgroundLogin) {
        const readLogo = new FileReader();

        readLogo.onload = function (e) {
            p_login.src = e.target.result;
        };
        readLogo.readAsDataURL(fileBackgroundLogin);
    } else {
        p_login.src = "default/media/video/video.mp4";
    }
});
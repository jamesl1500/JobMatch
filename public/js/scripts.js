/**
 * Boards Page
 * ----------------
 * This script is used to handle the boards page.
 */

// Logo preview: When someone uploads a logo, show a preview of it
function logoPreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('create-board-logo-img').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

const logoInput = document.getElementById('create-board-logo');
if (logoInput) {
    logoInput.addEventListener('change', function() {
        logoPreview(this);
    });
}
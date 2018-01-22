function chooseLogoImage() {
    $('#logo').click();
}

function chooseCoverImage() {
    $('#capa').click();
}

function changeImage(item, image) {
    $(item).css('background-image', image);
}

function showPreview(viewBox, logoInput) {
    var reader = new FileReader();

    reader.onload = function(e) {
        changeImage(viewBox, 'url('+e.target.result+')');
    }

    reader.readAsDataURL(logoInput.files[0]);
}

window.onpageshow = function() {
    hideLoading();
}

$('document').ready(function() {
    
});
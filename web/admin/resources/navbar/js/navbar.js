function active(item) {
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function toggleOutros() {
    if($('.nav-item.outros').hasClass('nav-item-active')) {
        $('.nav-item.outros').removeClass('nav-item-active');
    }
    else {
        $('.nav-item.outros').addClass('nav-item-active');
    }
}

$('document').ready(function() {
    active('.nav-item.home');
});
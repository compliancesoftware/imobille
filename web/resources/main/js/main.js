var canMove = false;

function monetize(number) {
    var number = number.toFixed(2).split('.');
    number[0] = "R$ " + number[0].split(/(?=(?:...)*$)/).join('.');
    return number.join(',');
}

function isMobile() {
    if($('body').width() > 768) {return false};
    return true;
}

function changePage(page) {
    window.open(window.location.protocol + '//' + window.location.host + page,'_self');
}

function moveToLocation(location) {
    if(canMove) {
        var height = $(location).offset().top - 40;
        $('html, body').animate({scrollTop: height}, 1200);
    }
}

function activeNavItem(item) {
    $('.nav-item').removeClass('nav-item-active');
    $(item).addClass('nav-item-active');
}

function showLoading() {
    var loading = '';
    loading += '<div class="loading">';
    loading += '    <i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>';
    loading += '</div>';
    $('body').append(loading);
    $(".loading").show();
}

function hideLoading() {
    $(".loading").hide();
    $('.loading').remove();
}
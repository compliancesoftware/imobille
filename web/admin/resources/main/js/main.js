var canMove = false;

function isValidField(field) {
    if(field !== undefined && field != null && field != '') {
        return true;
    }
    else {
        return false;
    }
}

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
    showLoading();
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

var Base64 = {
    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    
    // public method for encoding
    encode : function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;
    
        input = Base64._utf8_encode(input);
    
        while (i < input.length) {
    
            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);
    
            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;
    
            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }
    
            output = output +
            Base64._keyStr.charAt(enc1) + Base64._keyStr.charAt(enc2) +
            Base64._keyStr.charAt(enc3) + Base64._keyStr.charAt(enc4);
    
        }
    
        return output;
    },
    
    // public method for decoding
    decode : function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;
    
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
    
        while (i < input.length) {
    
            enc1 = Base64._keyStr.indexOf(input.charAt(i++));
            enc2 = Base64._keyStr.indexOf(input.charAt(i++));
            enc3 = Base64._keyStr.indexOf(input.charAt(i++));
            enc4 = Base64._keyStr.indexOf(input.charAt(i++));
    
            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;
    
            output = output + String.fromCharCode(chr1);
    
            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }
    
        }
    
        output = Base64._utf8_decode(output);
    
        return output;
    
    },
    
    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";
    
        for (var n = 0; n < string.length; n++) {
    
            var c = string.charCodeAt(n);
    
            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }
    
        }
    
        return utftext;
    },
    
    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;
    
        while ( i < utftext.length ) {
    
            c = utftext.charCodeAt(i);
    
            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }
    
        }
        return string;
    }
}

function isNumber(string) {
    var mask = '0123456789';
    for(var i = 0;i < string.length;i++) {
        if(mask.indexOf(string[i]) < 0) {
            return false;
        }
    }
    return true;
}

function onlyNumbers(number) {
    var numero = '';
    for(var i = 0;i < number.length;i++) {
        if(isNumber(number[i])) {
            numero += number[i];
        }
    }
    return numero;
}

function acceptNumbers(event, maxInputLength) {
    if($(event.target).val().length < maxInputLength) {
        if(isNumber(''+event.key)) {
            return event.key;
        }
        event.preventDefault();
    }
    event.preventDefault();
}

var PhoneFormat = {
    _mask: '(xx) x xxxx-xxxx',
    format: function(number) {
        var numero = onlyNumbers(number);
        var result = PhoneFormat._mask;
        for(var i = 0;i < numero.length;i++) {
            result = result.replace('x',''+numero[i]);
        }
        for(var i = 0;i < result.length;i++) {
            result = result.replace('x','0');
        }
        return result;
    },
    unformat: function(number) {
        return onlyNumbers(number);
    }
}

var CpfCnpjFormat = {
    _cpf_mask: 'xxx.xxx.xxx-xx',
    _cnpj_mask: 'xx.xxx.xxx/xxxx-xx',
    format: function(number) {
        var numero = CpfCnpjFormat.unformat(number);
        var result = '';
        if(numero.length <= 11) {
            result = CpfCnpjFormat._cpf_mask;
        }
        else {
            result = CpfCnpjFormat._cnpj_mask;
        }

        for(var i = 0;i < numero.length;i++) {
            result = result.replace('x',''+numero[i]);
        }

        for(var i = 0;i < result.length;i++) {
            result = result.replace('x','0');
        }

        return result;
    },
    unformat: function(number) {
        return onlyNumbers(number);
    }
}

function getFormatter(inputField) {
    if($(inputField).hasClass('cpf-cnpj-field')) {
        return CpfCnpjFormat;
    }
    else if($(inputField).hasClass('phone-field')) {
        return PhoneFormat;
    }
    return null;
}

function filterSetting(mode, formatter, inputField) {
    $(inputField).attr('type','text');
    var value = $(inputField).val();
    if(mode == 'format') {
        value = formatter.format(value);
    }
    else if (mode == 'unformat') {
        value = formatter.unformat(value);
    }
    $(inputField).val(value);
}

function formatField(inputField) {
    var formatter = getFormatter(inputField);
    filterSetting('format', formatter, inputField);
}

function unformatField(inputField) {
    var formatter = getFormatter(inputField);
    filterSetting('unformat', formatter, inputField);
}
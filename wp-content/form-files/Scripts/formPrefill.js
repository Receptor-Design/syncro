// Get location
var local = document.location.href.split('?');
if (local[1]) {
    if(local[1].includes('utm')) {
        // Find hidden fields and set default values
        var c = document.querySelectorAll('p:not(.block-filler):not(.Integration_Owner):not(.country) [type=hidden]');
        for (var j = 0; j < c.length; j++) {
            c[j].value = '-';
        }
    }
    // Split params
    var utms = local[1].split('&');
    var contentInclude = '';
    for(var i = 0; i < utms.length; i++) {
        // Split key values
        var p = utms[i].split('=');
        var field = document.getElementsByClassName(p[0]);
        if(field.length != 0) {
            // Find field and populate value
            var input = field[0].getElementsByTagName('input');
            input[0].value = p[1].replaceAll('%20','_').replaceAll('+','_').replaceAll(' ','_');
        } else if(p[0].includes('utm')) {
            //Store Other Parameters
            contentInclude += `${p[0].replace('utm_','')}=${p[1]} `;
        }
    }
    if(document.getElementsByClassName('utm_content').length > 0 && contentInclude.length > 0) {
        //If UTM Content field present & other parameters are stored
        var contentClass = document.getElementsByClassName('utm_content');
        var contentInput = contentClass[0].getElementsByTagName('input');
        if(contentInput[0].value.length > 1) {
            //If UTM Content has a value, append data
            var currentValue = contentInput[0].value;
            contentInput[0].value = `${currentValue} ${contentInclude.slice(0,-1)}`; 
        } else {
            //If UTM Content has no value, set data
            contentInput[0].value = contentInclude.slice(0,-1);
        }
    }
}
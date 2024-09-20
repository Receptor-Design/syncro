var referrerURL = document.referrer;
var referrerCheck = referrerURL + "";
//External referrer
if (!referrerCheck.startsWith('https://syncromsp.com/') && !referrerCheck.startsWith('https://parmail.syncromsp.com/')) {
    var urlp;
    var urlc = window.location.href;

    //set params
    if (urlc.includes('?')) {
        //UTM'd Traffic
        urlp = urlc.split('?')[1];
    } else if (urlc.includes('gclid')) {
        urlp = 'utm_medium=paid%20search&utm_source=google';
    } else if (referrerURL) {
        //Known Referrer
        referrerCheck = referrerURL.replace('https://', '').replace('http://', '').replace('www.', '').split('/');
        if (referrerCheck[0].includes('google') || referrerCheck[0].includes('yahoo') || referrerCheck[0].includes('bing') || referrerCheck[0].includes('ask.com') || referrerCheck[0].includes('duckduckgo')) {
            //Organic Search
            urlp = 'utm_medium=organic%20search&utm_source=' + referrerCheck[0].replace('.com', '');
        } else if (referrerCheck[0].includes('syncromsp') && !referrerCheck[0].includes('discover.syncromsp.com')) {
            //Product Traffic
            urlp = 'utm_medium=internal%link&utm_source=product';
        } else if (referrerCheck[0].includes('facebook') || referrerCheck[0].includes('twitter') || referrerCheck[0].includes('linkedin') || referrerCheck[0].includes('reddit') || referrerCheck[0].includes('youtube')) {
            //Organic Social
            urlp = 'utm_medium=organic%20social&utm_source=' + referrerCheck[0].replace('.com', '');
        } else {
            //Referral Traffic
            urlp = 'utm_medium=referral%20traffic&utm_source=' + referrerCheck[0];
        }
    } else {
        //Direct Traffic
        var synp = localStorage.getItem('syn_p');
        if (synp) {
            urlp = synp;
        } else {
            urlp = 'utm_medium=direct&utm_source=none';
        }
    }

    //Store UTM Data LocalStorage
    localStorage.setItem('syn_p', urlp);
}
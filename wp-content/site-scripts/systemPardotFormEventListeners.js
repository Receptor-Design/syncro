//Listen for messages coming from Pardot iframes
window.addEventListener("message", function(event) {
    if (event.data && event.origin.includes('parmail.syncromsp.com')) {
        //Contains Form Conversion Data  
        if (event.data.includes('form-conversion:')) {
            var a = event.data.split(':')[1];
            console.log(a);
            window.dataLayer.push({
                'event': a
            });
            //Contains iframe resize information
        } else if (event.data.includes('px')) {
            var matches = document.getElementsByClassName('pardot_form');
            for (i = 0; i < matches.length; i++) {
                if (matches[i].contentWindow == event.source) {
                    matches[i].height = event.data;
                }
            }
        }
    }
}, true);
var testRun = true;

var runInitTest = function() {
    if(testRun){
        //GTM
        try {
            gtmAvailable();
        } catch {
            //failureAdBlock();
            console.log('GTM Failed to Launch');
        }
        //Pardot
        try {
            var pardotFrame = document.querySelectorAll('iframe[src^="https://parmail.syncromsp.com"]');
            if (!pardotFrame[0].getAttribute('height')) {
                for (let i = 0; i < pardotFrame.length; i++) {
                    pardotFrame[i].insertAdjacentHTML('afterend', '<div id="pardot-form-load-error"><h3 style="text-align:center;"><b>Something Looks Off...</b></h3><p>It looks like something is blocking this form from working properly. Our site relies on tools that can be affected by ad-blockers or browser security features. First, try refreshing this page. If the problem persists, and you have one of these enabled, please try temporarily disabling it or trusting <a href="https://syncromsp.com/" target="_blank">syncromsp.com</a>.</p> <p>We do not share or sell your data. <a href="https://syncromsp.com/privacy-policy/" target="_blank">See our privacy policy here.</a></p></div>');
                    pardotFrame[i].setAttribute('style', 'display:none;');
                }
                console.log('Form Failed to Launch');
                window.dataLayer.push({
                    'event': "Form Failed to Launch"
                });
                throw "Form Failed to Launch";
            }
        } catch {
            console.log('No Form Found');
        }

        testRun = false;
    }
}

window.onload = function() {
    setTimeout(runInitTest, 1500);
}
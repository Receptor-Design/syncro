function trialRedirectEval(trialCountry) {
    setTimeout(() => {
        const SPL = ["AF","AL","BY","BA","BI","CF","CD","HR","CU","ET","GW","HT","IR","IQ","XK","LB","LY","ML","ME","MM","NI","KP","MK","PS","RU","RS","SL","SO","SS","SD","SY","UA","VE","YE"];
        
        if (trialCountry && SPL.includes(trialCountry)) {
            console.log("TrialReject");
            window.location.href = 'https://parmail.syncromsp.com/trial-service-unavailable';
        } else {
            console.log('TrialPass');
            // No redirect here, so the form will use its default action
        }
    }, 500);
}

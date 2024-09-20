function trialRedirectEval(prevTrialLength, trialCountry, defaultTrialLength, trialEmail, evalIspBlock, startTimeBlockUTC, endTimeBlockUTC, evalTimeBlock) {
    setTimeout(() => {
        const SPL = ["AF","AL","BY","BA","BI","CF","CD","HR","CU","ET","GW","HT","IR","IQ","XK","LB","LY","ML","ME","MM","NI","KP","MK","PS","RU","RS","SL","SO","SS","SD","SY","UA","VE","YE",""];
        const validTrialLengths = ["10", "14","21","30"];
        const hourSubmit = new Date().getUTCHours();

        if(trialCountry && trialEmail) {
            var evalSPL = SPL.includes(trialCountry);
            var emailSplit = trialEmail.toLowerCase().split('@');
            var evalISP = blockedIspDomains.includes(emailSplit[1]);
            var evalTime = hourSubmit >= startTimeBlockUTC && hourSubmit < endTimeBlockUTC;

            if(evalSPL || (evalISP && evalIspBlock) || (evalTime && evalTimeBlock)) {
                console.log("TrialReject");
                if(evalSPL) {
                    window.location.href = 'https://parmail.syncromsp.com/trial-service-unavailable';
                } else {
                    window.parent.postMessage({message: "PARDOT_FORM_SUCCESS",},"*");
                    window.location.href = 'https://parmail.syncromsp.com/trial-activation-book-a-time';
                }
            } else {
                console.log('TrialPass');
                var trialLength = validTrialLengths.includes(prevTrialLength) ? prevTrialLength : defaultTrialLength;
                switch (trialLength) {
					case '10':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-10-redirect';
                        break;
                    case '14':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-14-redirect';
                        break;
                    case '21':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-21-redirect';
                        break;
                    case '30':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-30-redirect';
                        break;
                    default:
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-21-redirect';
                }
            }
        } else {
            console.log('TrialMissingInfo');
            top.location.href = "https://parmail.syncromsp.com/trial-signup-fail";
        }
    }, 500);
}
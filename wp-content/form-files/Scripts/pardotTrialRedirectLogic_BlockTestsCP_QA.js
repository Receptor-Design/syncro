function trialRedirectEval(prevTrialLength, trialCountry, defaultTrialLength, trialEmail, evalIspBlock, startTimeBlockUTC, endTimeBlockUTC, evalTimeBlock) {
    setTimeout(() => {
        const SPL = ["CU","IR","KP","SY","UA"];
        const validTrialLengths = ["14","21","30"];
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
                    case '14':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-14-redirect-staging';
                        break;
                    case '21':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-14-redirect-staging';
                        break;
                    case '30':
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-14-redirect-staging';
                        break;
                    default:
                        window.location.href = 'https://parmail.syncromsp.com/trial-signup-14-redirect-staging';
                }
            }
        } else {
            console.log('TrialMissingInfo');
            top.location.href = "https://parmail.syncromsp.com/trial-signup-fail";
        }
    }, 500);
}
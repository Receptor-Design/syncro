//function sendConversionEvent(conversionType, redirectLocation) {
//    var a = ['form-conversion'];
//    a.push(conversionType);
//    if(redirectLocation) {
//        a.push(true, redirectLocation);
//    } else {
//        a.push(false);
//    }
//    try {
//        parent.postMessage(a,'https://syncromsp.com');
//    }
//    catch(e) {
//        console.log(e);
//    }
//}
function sendConversionEvent(conversionType, redirectLocation) {
    console.log('sendConversionEvent called with:', conversionType, redirectLocation);

    var data = ['form-conversion', conversionType];
    console.log('Initial data array:', data);

    if (redirectLocation && typeof redirectLocation === 'string') {
        console.log('Adding redirectLocation:', redirectLocation);
        data.push(true, redirectLocation);
    } else {
        console.log('No redirectLocation provided or invalid, setting to false');
        data.push(false);
    }

    try {
        console.log('Attempting to postMessage with data:', data);
        parent.postMessage(data, 'https://syncromsp.com');
    } catch (e) {
        console.error('Error sending postMessage:', e);
    }
}

function sendConversionEvent(conversionType, redirectLocation) {
    var a = ['form-conversion'];
    a.push(conversionType);
    if(redirectLocation) {
        a.push(true, redirectLocation);
    } else {
        a.push(false);
    }
    try {
        parent.postMessage(a,'https://syncromsp.com');
    }
    catch(e) {
        console.log(e);
    }
}
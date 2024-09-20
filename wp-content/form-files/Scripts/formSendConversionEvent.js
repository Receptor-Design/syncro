function formSubmit() {
    try {
        var a = document.getElementById('conversion-type').getAttribute('data');
        if(a) {
            parent.postMessage(`form-conversion:${a}`, 'https://syncromsp.com');
        }
    }
    catch (e) {
        console.log(e);
    }
}
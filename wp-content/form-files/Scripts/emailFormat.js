//Find Email Field
var emailField = document.querySelector('#pardot-form p.email input');

//Email Formatter
function emailFormat() {
    var enteredEmail = emailField.value;
    var newEmail;
    var emailTest = enteredEmail.split('@');
    if(emailTest[0].includes('+') && !emailTest[1].includes('syncromsp.com') && !emailTest[1].includes('repairshopr.com')) {
        console.log('Blocked Email');
        var emailPrefix = emailTest[0].split('+');
        newEmail = emailPrefix[0] + '@' + emailTest[1];
        emailField.value = newEmail;
    }
}

//Execute Email Formatter on Load and Change
if(emailField) {
    emailFormat();
    emailField.addEventListener("change",emailFormat);
}
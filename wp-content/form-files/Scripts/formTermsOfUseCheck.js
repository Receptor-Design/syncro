if(document.querySelector('.Terms_of_Use_Accepted_On input')) {
    document.querySelector('p.Terms_of_Use_Accepted_On').insertAdjacentHTML('beforebegin','<p class="form-field pd-text required" id="terms-of-use"><label class="field-label" style="padding:0 0 0 5px;"><input type="checkbox" onclick="invertselect()" style="margin-right:7px; margin-left:0;"><span style="font-size:14.5px;">I agree to be contacted by Syncro so they can share product and industry resources with me.</span></label></p>');
    if(document.querySelector('p.Terms_of_Use_Accepted_On input').value) {
    document.querySelector('#terms-of-use input[type=checkbox]').checked = true;
    } else {
        document.querySelector('#terms-of-use input[type=checkbox]').checked = false;
    }
}

function invertselect() {
    if(document.querySelector('#terms-of-use input[type=checkbox]').checked) {
        var today = new Date();
        document.querySelector('p.Terms_of_Use_Accepted_On input').value = `${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`;
    } else {
        document.querySelector('p.Terms_of_Use_Accepted_On input').value = null;
    }
}
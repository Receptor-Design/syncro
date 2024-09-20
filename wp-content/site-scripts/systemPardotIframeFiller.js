//set iframe class
var countSrc = document.getElementsByTagName("iframe").length;
var i;
for (i = 0; i < countSrc; i++) {
    var a = document.getElementsByTagName("iframe")[i];
    var b = a.src;
    if (b.includes("parmail.syncromsp.com") || b.includes("go.pardot.com")) {
        a.className += " pardot_form";
    }
}
//get conversion url
var conversionURL = document.location.href;
if (conversionURL.includes("?")) {
    conversionURL = conversionURL.split('?')[0];
}
//send data to iframes
var setP = '?' + localStorage.getItem("syn_p") + "&conversion_url=" + conversionURL;
var countSrc = document.getElementsByClassName("pardot_form").length;
var i;
for (i = 0; i < countSrc; i++) {
    var frameSrc = document.getElementsByClassName("pardot_form")[i].src + setP;
    document.getElementsByClassName("pardot_form")[i].src = frameSrc;
}
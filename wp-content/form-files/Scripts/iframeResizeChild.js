// Get height on load
var currentHeight = document.getElementById('form-content').scrollHeight + 50;
       window.parent.postMessage(currentHeight+"px","*");

// Detect Changes
window.addEventListener("resize", findHeight);
document.querySelectorAll('input').forEach(item => {
    item.addEventListener('input', findHeight);
})

// Get height on for change
   function findHeight() {
       setTimeout(() => {
           var newHeight = document.getElementById('form-content').scrollHeight + 50;
           if(currentHeight != newHeight) {
               window.parent.postMessage(newHeight+"px","*");
               currentHeight = newHeight;
       }},500)
   }
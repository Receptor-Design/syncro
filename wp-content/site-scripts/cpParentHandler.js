var leadObj = {};
//Below is the event listener that will listen for the Pardot Events
window.addEventListener("message", receiveMessage, false);
   function receiveMessage(event) {
   // Form data ready, update leadObj
   if (event.data && event.data.message === "PARDOT_DATA_READY" && event.data.data) {
      leadObj = event.data.data; // Update leadObj
   }
   // Form was submitted and validated, call ChiliPiper
   if (event.data && event.data.message === "PARDOT_FORM_SUCCESS") {
      // Account domain and router name are from Step #1 - no need to change it here
      ChiliPiper.submit(leadObj["CPTenantDomain"], leadObj["CPTenantRouter"], {
         map: true,
         lead: leadObj,
      });
   }
}
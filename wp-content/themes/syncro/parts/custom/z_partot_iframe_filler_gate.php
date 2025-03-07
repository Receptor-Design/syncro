<!-- System - Pardot Iframe Filler -->
<script>
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
</script>

<!-- System - Pardot Iframe Dynamic Height Parent -->
<script>
  //Listen for messages coming from Pardot iframes
  window.addEventListener("message", function(event) {
    if (event.data && event.origin.includes('parmail.syncromsp.com')) {
      if (event.data.includes('px')) {
        var matches = document.getElementsByClassName('pardot_form');
        for (i = 0; i < matches.length; i++) {
          if (matches[i].contentWindow == event.source) {
            matches[i].height = event.data;


            var elem = document.querySelector('#form-size');

            <?php if (get_field('form_headline')) : ?>
              let lebox = document.querySelector('#form-headline');

              <?php if (get_field('include_content_below_form')) : ?>
                let underform = document.querySelector('#form-under');
                elem.style.minHeight = `calc( ${event.data} + ${lebox.offsetHeight}px + 112px + ${underform.offsetHeight}px)`;
              <?php else : ?>
                elem.style.minHeight = `calc( ${event.data} + ${lebox.offsetHeight}px + 112px)`;
              <?php endif; ?>

            <?php else : ?>

              <?php if (get_field('include_content_below_form')) : ?>
                let underform = document.querySelector('#form-under');
                elem.style.minHeight = `calc( ${event.data} + 112px + ${underform.offsetHeight}px)`;
              <?php else : ?>
                elem.style.minHeight = `calc( ${event.data} + 112px)`;
              <?php endif; ?>

            <?php endif; ?>

          }
        }
      }
    }
  }, true);
</script>

<!-- System - Pardot Form Receive Conversion Events -->
<script>
//Listen for messages coming from Pardot iframes
window.addEventListener("message", function(event) {
    if (event.data && event.origin.includes('parmail.syncromsp.com')) {
		if (!nab.trigger) {
     	   return;
  	    } else {
     	   //Nelio Trigger Conversion
      	  nab.trigger('Conversion');
   	   };
        //Contains Form Conversion Data  
        if (Array.isArray(event.data) && event.data[0] == 'form-conversion') {
            var conversionName = event.data[1];
            console.log(conversionName);
            window.dataLayer.push({
                'event': conversionName
            });
            event.data[2] && event.data[3] ? window.location.replace(event.data[3]) : console.log('No Redirect');
        } 
        //Backup for Conversion Data Migration
        else if (event.data.includes('form-conversion:')) {
            var conversionName = event.data.split(':')[1];
            console.log(conversionName);
            window.dataLayer.push({
                'event': conversionName
            });
        }
    }
}, true);
</script>
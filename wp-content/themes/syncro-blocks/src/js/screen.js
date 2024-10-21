const els = document.querySelectorAll("header.wp-block-template-part")
const observer = new IntersectionObserver( 
  ([e]) => {
    e.target.classList.toggle("is-pinned", e.intersectionRatio < 1);
    e.target.classList.toggle("utility-hidden", e.intersectionRatio < 0.5);
  },
  { threshold: [ 0.48, 1] }
);

els.forEach( el => {
  observer.observe(el);
} );

document.addEventListener('DOMContentLoaded', () => {
  const desktopHeader = document.querySelector( "header.desktop-header-template-part.wp-block-template-part");
  if( desktopHeader && window.scrollY > 34 ){
    desktopHeader.classList.add("is-pinned");
  }
} );

function throttle(fn, time) {
  let timeout = null;
  return function () {
      if(timeout) return;
      const context = this;
      const args = arguments;
      const later = () => {
          fn.call(context, ...args);
          timeout = null;
      }
      timeout = setTimeout(later, time);
  }
}

const details = document.querySelectorAll('details.wp-block-details.query-taxonomy-accordion');
if( details.length ){
  const handleResize = () => {
      const { innerWidth } = window;
      details.forEach( detail => {
        if( innerWidth > 781 ) {
          detail.setAttribute( 'open', "" );
        } else {
          detail.removeAttribute( 'open' );
        }
      } );
  }

  const handResizeThrottled = throttle(handleResize, 500);

  window.addEventListener( 'resize', handResizeThrottled );
  document.addEventListener('DOMContentLoaded', handleResize );
}

// Pricing Page: set annual discount on load
const pricingToggle = document.querySelector( '.wp-block-ghub-content-toggle.is-style-active-on-load input.ghub-inactive');
if( pricingToggle && pricingToggle.checked === false ){
  pricingToggle.click();
}

// System - Pardot Iframe Filler
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

// System - Pardot Iframe Dynamic Height Parent
  //Listen for messages coming from Pardot iframes
  window.addEventListener("message", function(event) {
    if (event.data && event.origin.includes('parmail.syncromsp.com')) {
      if (event.data.includes('px')) {
        var matches = document.getElementsByClassName('pardot_form');
        for (i = 0; i < matches.length; i++) {
          if (matches[i].contentWindow == event.source) {
            matches[i].height = event.data;

            //var elem = document.querySelector('#form-size');

          }
        }
      }
    }
  }, true);

// System - Pardot Form Receive Conversion Events
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
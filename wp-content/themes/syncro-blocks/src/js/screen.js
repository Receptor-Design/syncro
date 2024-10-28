const scrollbarWidth = window.innerWidth - document.body.clientWidth;
document.body.style.setProperty("--scrollbarWidth", `${scrollbarWidth}px`);

const els = document.querySelectorAll("header.wp-block-template-part")
const observer = new IntersectionObserver( 
  ([e]) => {
    e.target.classList.toggle("is-pinned", e.intersectionRatio < 1);
    e.target.classList.toggle("utility-hidden", e.intersectionRatio < 0.5);
  },
  { threshold: [ 0.48, 0.9, 1] }
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
const detailsDropdown = document.querySelectorAll('details.wp-block-details.is-style-taxonomy-accordion');
if( detailsDropdown.length ){

  // Function to handle closing an individual element
  function handleClickOutside(event) {
    if (window.innerWidth <= 781){
      return;
    }
    // Loop through all elements and check if the click is inside any of them
    for (let i = 0; i < detailsDropdown.length; i++) {
      if (!detailsDropdown[i].contains(event.target)) {
        detailsDropdown[i].removeAttribute( 'open' );
      }
      
      // Optionally, remove the event listener after the action
      //document.removeEventListener('click', handleClickOutside);
    }
  }

  // Attach the event listener to detect clicks outside
  document.addEventListener('click', handleClickOutside);

}

// Pricing Page: set annual discount on load
const pricingToggle = document.querySelector( '.wp-block-ghub-content-toggle.is-style-active-on-load input.ghub-inactive');
if( pricingToggle && pricingToggle.checked === false ){
  pricingToggle.click();
}

// Only make the sticky sidebar scroll if needed
// This makes it look nicer for users with always-visible scrollbars
const stickyScrolls = document.querySelectorAll('.sticky-scroll');
if( stickyScrolls ){
  const handleResize = () => {
    stickyScrolls.forEach( stickyScroll => {
      let childrenHeight = 0;
      Array.from(stickyScroll.children).forEach( child => {
        childrenHeight += child.offsetHeight;
      } );
      const header = document.querySelector('header.desktop-header-template-part');
      if( childrenHeight > (window.innerHeight - header.offsetHeight) ){
        stickyScroll.style.maxHeight = window.innerHeight + 'px';
        stickyScroll.style.overflow = 'clip scroll';
      } else {
        stickyScroll.style.maxHeight = 'none';
        stickyScroll.style.overflow = 'clip auto';
      }
    
    } );
  }

  const handResizeThrottled = throttle(handleResize, 500);

  window.addEventListener( 'resize', handResizeThrottled );
  document.addEventListener('DOMContentLoaded', handleResize );
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
		if (this.window.nab === undefined || !nab.trigger) {
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
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

const el = document.querySelector("header.wp-block-template-part")
const observer = new IntersectionObserver( 
  ([e]) => {
    e.target.classList.toggle("is-pinned", e.intersectionRatio < 1);
    e.target.classList.toggle("utility-hidden", e.intersectionRatio < 0.5);
  },
  { threshold: [ 0.48, 1] }
);

observer.observe(el);
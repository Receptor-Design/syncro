(()=>{var e,r={5131:(e,r,t)=>{"use strict";t.r(r);const n=window.wp.domReady,o=t.n(n)(),a=window.wp.url;function i(e){if(!/^[a-z]+:\/\//.test(e))return!1;e=e.replace(/^https?:\/\//,"http://");var r=document.location.href.replace(/^https?:\/\//,"").replace(/\/.*$/,"");return 0!==e.indexOf("http://"+r)}function u(e,r){Array.from(document.querySelectorAll("a")).forEach((function(t){var n,o=t.getAttribute("href")||"";if(!i(o)){var u=o.replace(/#.*$/,""),l=o.replace(/^[^#]*/,""),c=(0,a.addQueryArgs)(u,((n={})[e]=null!=r?r:"",n))+l;t.setAttribute("href",c)}}))}var l,c=function(){return c=Object.assign||function(e){for(var r,t=1,n=arguments.length;t<n;t++)for(var o in r=arguments[t])Object.prototype.hasOwnProperty.call(r,o)&&(e[o]=r[o]);return e},c.apply(this,arguments)};window.nab=c(c({},(l=window)&&"object"==typeof l&&"nab"in l?window.nab:{}),{initJavaScriptPreviewer:function(e){Array.from(document.querySelectorAll("a")).forEach((function(e){i(e.getAttribute("href")||"")&&(e.classList.add("nab-disabled-link"),e.addEventListener("click",(function(e){return e.preventDefault()})))})),u("nab-javascript-previewer"),e.run((function(){}),{showContent:function(){},domReady:o});var r=(0,a.getQueryArgs)(document.location.href)["nab-javascript-previewer"];r&&o((function(){return u("nab-javascript-previewer",r)}))}})}},t={};function n(e){var o=t[e];if(void 0!==o)return o.exports;var a=t[e]={exports:{}};return r[e](a,a.exports,n),a.exports}n.m=r,e=[],n.O=(r,t,o,a)=>{if(!t){var i=1/0;for(f=0;f<e.length;f++){for(var[t,o,a]=e[f],u=!0,l=0;l<t.length;l++)(!1&a||i>=a)&&Object.keys(n.O).every((e=>n.O[e](t[l])))?t.splice(l--,1):(u=!1,a<i&&(i=a));if(u){e.splice(f--,1);var c=o();void 0!==c&&(r=c)}}return r}a=a||0;for(var f=e.length;f>0&&e[f-1][2]>a;f--)e[f]=e[f-1];e[f]=[t,o,a]},n.n=e=>{var r=e&&e.__esModule?()=>e.default:()=>e;return n.d(r,{a:r}),r},n.d=(e,r)=>{for(var t in r)n.o(r,t)&&!n.o(e,t)&&Object.defineProperty(e,t,{enumerable:!0,get:r[t]})},n.o=(e,r)=>Object.prototype.hasOwnProperty.call(e,r),n.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e={6744:0,209:0};n.O.j=r=>0===e[r];var r=(r,t)=>{var o,a,[i,u,l]=t,c=0;if(i.some((r=>0!==e[r]))){for(o in u)n.o(u,o)&&(n.m[o]=u[o]);if(l)var f=l(n)}for(r&&r(t);c<i.length;c++)a=i[c],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(f)},t=globalThis.webpackChunknab=globalThis.webpackChunknab||[];t.forEach(r.bind(null,0)),t.push=r.bind(null,t.push.bind(t))})();var o=n.O(void 0,[209],(()=>n(5131)));o=n.O(o);var a=nab="undefined"==typeof nab?{}:nab;for(var i in o)a[i]=o[i];o.__esModule&&Object.defineProperty(a,"__esModule",{value:!0})})();
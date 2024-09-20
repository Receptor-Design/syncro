(()=>{var e,t={5977:(e,t,n)=>{"use strict";n.r(t),n.d(t,{initPage:()=>E});const o=window.wp.element;window.wp.domReady,window.wp.notices;const r=window.wp.apiFetch;var i=n.n(r);const a=window.wp.date,l=window.wp.url;var s=function(){return s=Object.assign||function(e){for(var t,n=1,o=arguments.length;n<o;n++)for(var r in t=arguments[n])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e},s.apply(this,arguments)};var c=function(e){var t,n;return!!(null===(t=e.url)||void 0===t?void 0:t.includes("/wp-json/"))||!!(null===(n=e.url)||void 0===n?void 0:n.includes("rest_route"))||!!Object.keys(e).includes("rest_route")};const L=window.nab.data;var u=n(9263),C=n.n(u);const p=window.wp.components,d=window.wp.i18n;var m=n(1609);function g(e){return e.startsWith("{{/")?{type:"componentClose",value:e.replace(/\W/g,"")}:e.endsWith("/}}")?{type:"componentSelfClosing",value:e.replace(/\W/g,"")}:e.startsWith("{{")?{type:"componentOpen",value:e.replace(/\W/g,"")}:{type:"string",value:e}}function f(e,t){let n,o,r=[];for(let i=0;i<e.length;i++){const a=e[i];if("string"!==a.type){if(void 0===t[a.value])throw new Error(`Invalid interpolation, missing component node: \`${a.value}\``);if("object"!=typeof t[a.value])throw new Error(`Invalid interpolation, component node must be a ReactElement or null: \`${a.value}\``);if("componentClose"===a.type)throw new Error(`Missing opening component token: \`${a.value}\``);if("componentOpen"===a.type){n=t[a.value],o=i;break}r.push(t[a.value])}else r.push(a.value)}if(n){const i=function(e,t){const n=t[e];let o=0;for(let r=e+1;r<t.length;r++){const e=t[r];if(e.value===n.value){if("componentOpen"===e.type){o++;continue}if("componentClose"===e.type){if(0===o)return r;o--}}}throw new Error("Missing closing component token `"+n.value+"`")}(o,e),a=f(e.slice(o+1,i),t),l=(0,m.cloneElement)(n,{},a);if(r.push(l),i<e.length-1){const n=f(e.slice(i+1),t);r=r.concat(n)}}return r=r.filter(Boolean),0===r.length?null:1===r.length?r[0]:(0,m.createElement)(m.Fragment,null,...r)}function v(e){const{mixedString:t,components:n,throwErrors:o}=e;if(!n)return t;if("object"!=typeof n){if(o)throw new Error(`Interpolation Error: unable to process \`${t}\` because components is not an object`);return t}const r=function(e){return e.split(/(\{\{\/?\s*\w+\s*\/?\}\})/g).map(g)}(t);try{return f(r,n)}catch(e){if(o)throw new Error(`Interpolation Error: unable to process \`${t}\` because of error \`${e.message}\``);return t}}const w=window.nab.utils;var b=function(e){var t=e.initPluginInAws,n=e.isPluginBeingInitialized,r=e.isPolicyAccepted,i=e.togglePolicy;return o.createElement(o.Fragment,null,o.createElement("p",{className:"nab-welcome-message__intro"},v({mixedString:(0,d.sprintf)(/* translators: plugin name (Nelio A/B Testing) */ /* translators: plugin name (Nelio A/B Testing) */
(0,d._x)("%s is almost ready!","text","nelio-ab-testing"),"{{strong}}Nelio A/B Testing{{/strong}}"),components:{strong:o.createElement("strong",null)}})),o.createElement("div",{className:"nab-welcome-message__policy"},o.createElement(p.CheckboxControl,{label:v({mixedString:(0,d._x)("Please accept our {{tac}}Terms and Conditions{{/tac}} and {{policy}}Privacy Policy{{/policy}} to start using Nelio A/B Testing in this site.","user","nelio-ab-testing"),components:{tac:o.createElement(p.ExternalLink,{href:(0,w.addFreeTracker)((0,d._x)("https://neliosoftware.com/legal-information/nelio-ab-testing-terms-conditions/","text","nelio-ab-testing"))}),policy:o.createElement(p.ExternalLink,{href:(0,w.addFreeTracker)((0,d._x)("https://neliosoftware.com/privacy-policy-cookies/","text","nelio-ab-testing"))})}}),disabled:n,checked:r,onChange:i})),o.createElement("div",{className:"nab-welcome-message__actions"},o.createElement(p.Button,{className:"nab-welcome-message__start",variant:"primary",disabled:n||!r,onClick:function(){return t()}},n?(0,d._x)("Loading…","text","nelio-ab-testing"):(0,d._x)("Continue »","command","nelio-ab-testing"))))},h=function(){var e=y(),t=e[0],n=e[1],r=(0,L.usePageAttribute)("welcome/isPolicyAccepted",!1),i=r[0],a=r[1];return o.createElement("div",{className:"nab-welcome-message"},o.createElement(C(),{className:"nab-welcome-message__logo",title:"Nelio A/B Testing",alt:"Nelio A/B Testing"}),o.createElement(b,{initPluginInAws:n,isPluginBeingInitialized:t,isPolicyAccepted:i,togglePolicy:a}))},y=function(){var e=(0,L.usePageAttribute)("welcome/isPluginBeingInitialized",!1),t=e[0],n=e[1];return[t,function(){var e,t,o,r;n(!0),(e={path:"/nab/v1/site/free",method:"POST"},t=e.url,o=e.path,r=(0,a.format)("YmjHi").substring(0,11)+"0",i()(s(s(s({},e),t&&{url:c(e)?(0,l.addQueryArgs)(t,{nabts:r}):t}),o&&{path:(0,l.addQueryArgs)(o,{nabts:r})}))).then((function(e){window.location.href=e}))}]};function E(e){var t,n,r=document.getElementById(e);t=o.createElement(h,null),(n=r)&&(o.createRoot?(0,o.createRoot)(n).render(t):(0,o.render)(t,n))}},9263:(e,t,n)=>{var o=n(1609);function r(e){return o.createElement("svg",e,[o.createElement("path",{d:"m 30.394599,11.329607 c -1.338883,0 -2.64191,0.151343 -3.89386,0.438252 0.08461,0.283987 0.174933,0.617103 0.293657,1.038323 0.163124,0.516717 0.285081,0.884774 0.365967,1.102181 l 2.595883,8.591984 c 0.802654,-0.0356 1.620972,-0.07477 2.285238,-0.09319 0.516585,-0.02808 1.035856,-0.04669 1.566019,-0.0601 0.530169,-0.01471 0.932275,-0.0245 1.204331,-0.0381 0.285478,-0.01351 0.600657,-0.02093 0.940501,-0.02093 2.120834,0 3.84244,0.281025 5.174789,0.838307 1.345985,0.5574 2.305734,1.297068 2.876752,2.221413 0.571136,0.910866 0.859649,1.908308 0.859649,2.995902 0,0.842838 -0.186201,1.647319 -0.553241,2.408631 -0.353442,0.747739 -0.800989,1.366073 -1.344755,1.855445 -0.502987,0.475774 -1.060696,0.84725 -1.67244,1.119192 -0.611725,0.258248 -1.290724,0.497479 -2.038392,0.714905 2.161598,0.136121 3.974519,0.754495 5.442863,1.855425 0.382774,0.287028 0.717093,0.598819 1.00006,0.940401 1.432747,-2.524381 2.251216,-5.443207 2.251216,-8.553549 0,-9.584974 -7.769211,-17.354156 -17.354185,-17.354175 z m -7.796193,1.846916 c -0.0356,0.0171 -0.07101,0.03313 -0.106611,0.05151 l -3.732122,10.468659 h 6.936573 l -3.098062,-10.51977 z m -2.272487,1.370268 c -4.411499,3.14665 -7.289755,8.305912 -7.289755,14.136971 0,1.835053 0.289242,3.603866 0.817121,5.26412 0.297332,-1.74341 0.854363,-3.545967 1.442634,-5.396048 0.0064,-0.01948 0.01717,-0.04901 0.02576,-0.07226 0.0019,-0.01173 0.0034,-0.022 0.0042,-0.03434 l 4.557679,-12.600711 c 0.0796,-0.222195 0.238742,-0.683264 0.442573,-1.297944 z m 14.711504,9.247326 c -0.774863,0 -1.53757,0.06743 -2.285258,0.20431 v 9.911197 h 1.914993 c 1.944131,0 3.309572,-0.450892 4.098128,-1.36178 0.802062,-0.910849 1.204344,-2.132853 1.204344,-3.655536 0,-1.386685 -0.386897,-2.585576 -1.161765,-3.591683 -0.774867,-1.005968 -2.030246,-1.506468 -3.770423,-1.506468 z m -16.562675,1.574559 c -2.19727,6.605809 1.994456,8.626249 1.506475,12.426236 -0.207367,1.615618 -1.251989,2.408073 -2.421408,2.570348 2.574433,2.826631 6.071085,4.798134 10.013326,5.442863 0.111447,-0.04901 0.206762,-0.104273 0.285067,-0.170277 0.271989,-0.217434 0.439008,-0.604364 0.506433,-1.161746 0.08083,-0.556671 0.123244,-1.451553 0.123414,-2.672503 v -6.685463 c -0.03561,-1.147038 -0.06136,-2.172383 -0.531898,-3.936384 -0.122516,-0.503123 -0.315449,-1.205011 -0.587301,-2.102245 l -1.119214,-3.71085 H 18.47473 Z m 14.277417,10.047355 v 0.0041 10.25589 c 0.231102,0.01351 0.481333,0.03311 0.753214,0.06012 0.02685,0.0019 0.06976,0.003 0.09838,0.0041 3.109689,-0.581202 5.925942,-1.990279 8.213241,-3.991739 0.04473,-0.311912 0.07334,-0.638769 0.07334,-0.987348 0,-0.829363 -0.186201,-1.644913 -0.553241,-2.446928 -0.353461,-0.815789 -1.040133,-1.506586 -2.059616,-2.063987 -1.005965,-0.55752 -2.397999,-0.834151 -4.178974,-0.834151 h -2.344797 z",style:{fill:"#d24633"},key:0}),o.createElement("path",{d:"M 50.460938 14.054688 L 50.460938 16.476562 L 50.460938 28.568359 L 52.865234 28.568359 L 52.865234 16.476562 L 61.296875 16.476562 C 61.988925 16.476562 62.554688 17.040372 62.554688 17.732422 L 62.554688 28.568359 L 64.976562 28.568359 L 64.976562 16.585938 C 64.976562 15.183628 63.847612 14.054688 62.445312 14.054688 L 50.460938 14.054688 z M 67.398438 14.054688 L 67.398438 16.476562 L 81.914062 16.476562 L 81.914062 14.054688 L 67.398438 14.054688 z M 84.335938 14.054688 L 84.335938 26.037109 C 84.335938 27.439419 85.464887 28.568359 86.867188 28.568359 L 98.849609 28.568359 L 98.849609 26.146484 L 88.013672 26.146484 C 87.321622 26.146484 86.757812 25.582675 86.757812 24.890625 L 86.757812 14.054688 L 84.335938 14.054688 z M 101.25391 14.054688 L 101.25391 28.568359 L 103.67578 28.568359 L 103.67578 14.054688 L 101.25391 14.054688 z M 108.61133 14.054688 C 107.20902 14.054688 106.09961 15.182306 106.09961 16.566406 L 106.09961 26.054688 C 106.09961 27.456997 107.22723 28.568359 108.61133 28.568359 L 118.09961 28.568359 C 119.4837 28.568359 120.61328 27.438788 120.61328 26.054688 L 120.61328 16.566406 C 120.61328 15.164096 119.4837 14.054688 118.09961 14.054688 L 108.61133 14.054688 z M 109.75977 16.458984 L 116.93555 16.458984 C 117.6276 16.458984 118.17383 17.022794 118.17383 17.714844 L 118.17383 24.890625 C 118.17383 25.582675 117.6276 26.128906 116.93555 26.128906 L 109.75977 26.128906 C 109.06772 26.128906 108.52148 25.582675 108.52148 24.890625 L 108.52148 17.714844 C 108.52148 17.022794 109.06772 16.458984 109.75977 16.458984 z M 67.398438 20.099609 L 67.398438 22.523438 L 81.914062 22.523438 L 81.914062 20.099609 L 67.398438 20.099609 z M 67.398438 26.146484 L 67.398438 28.568359 L 81.914062 28.568359 L 81.914062 26.146484 L 67.398438 26.146484 z ",style:{fill:"#d24633"},key:1}),o.createElement("path",{d:"M 53.300781 30.166016 L 52.357422 30.275391 L 52.357422 33.126953 L 50.267578 33.126953 L 50.267578 33.943359 L 52.357422 33.943359 L 52.357422 39.900391 C 52.357422 41.807051 53.028936 43.041016 55.117188 43.041016 C 55.716428 43.041016 56.333772 42.841321 56.951172 42.550781 L 56.605469 41.751953 C 56.115179 41.988013 55.571739 42.152344 55.099609 42.152344 C 53.57428 42.152344 53.300781 41.225981 53.300781 39.900391 L 53.300781 33.943359 L 56.625 33.943359 L 56.625 33.126953 L 53.300781 33.126953 L 53.300781 30.166016 z M 84.085938 30.166016 L 83.142578 30.275391 L 83.142578 33.126953 L 81.054688 33.126953 L 81.054688 33.943359 L 83.142578 33.943359 L 83.142578 39.900391 C 83.142578 41.807051 83.814092 43.041016 85.902344 43.041016 C 86.501584 43.041016 87.118928 42.841321 87.736328 42.550781 L 87.390625 41.751953 C 86.900335 41.988013 86.356896 42.152344 85.884766 42.152344 C 84.359437 42.152344 84.085938 41.225981 84.085938 39.900391 L 84.085938 33.943359 L 87.410156 33.943359 L 87.410156 33.126953 L 84.085938 33.126953 L 84.085938 30.166016 z M 92.064453 30.1875 C 91.873183 30.1875 91.686601 30.266494 91.550781 30.402344 C 91.421931 30.531194 91.355469 30.712204 91.355469 30.896484 C 91.355469 31.073354 91.423476 31.246579 91.541016 31.380859 L 91.546875 31.386719 L 91.550781 31.392578 C 91.686601 31.528398 91.873183 31.607422 92.064453 31.607422 C 92.249013 31.607422 92.428137 31.525018 92.560547 31.392578 C 92.692967 31.260158 92.775391 31.081044 92.775391 30.896484 C 92.775391 30.708214 92.692094 30.523978 92.552734 30.398438 C 92.421004 30.269738 92.246033 30.1875 92.064453 30.1875 z M 75.324219 32.927734 C 74.18352 32.927734 73.282424 33.173149 72.648438 33.699219 C 72.039546 34.202219 71.716797 34.861081 71.716797 35.613281 C 71.716797 36.255421 71.884195 36.79311 72.236328 37.1875 L 72.240234 37.191406 L 72.242188 37.193359 C 72.587192 37.551629 73.007704 37.819334 73.494141 37.990234 L 73.498047 37.990234 L 73.501953 37.992188 C 73.984011 38.144407 74.600683 38.287368 75.357422 38.423828 L 75.355469 38.421875 C 76.050646 38.556035 76.590531 38.690973 76.966797 38.820312 L 76.970703 38.822266 L 76.974609 38.822266 C 77.347283 38.935196 77.646264 39.117664 77.888672 39.371094 L 77.892578 39.375 L 77.896484 39.378906 C 78.13027 39.602516 78.25 39.903381 78.25 40.337891 C 78.25 40.941821 78.032544 41.37551 77.568359 41.71875 C 77.568359 41.71875 77.568359 41.720703 77.568359 41.720703 C 77.113337 42.044433 76.361264 42.228516 75.306641 42.228516 C 74.606142 42.228516 73.959125 42.115758 73.359375 41.892578 L 73.357422 41.892578 C 72.765396 41.655228 72.300209 41.368912 71.958984 41.039062 L 71.771484 40.857422 L 71.275391 41.519531 L 71.412109 41.660156 C 71.812989 42.074396 72.368312 42.403643 73.068359 42.658203 C 73.771254 42.913803 74.518975 43.041016 75.306641 43.041016 C 76.492685 43.041016 77.422399 42.816661 78.082031 42.332031 L 78.083984 42.330078 C 78.735545 41.838078 79.080078 41.150221 79.080078 40.337891 C 79.080078 39.720371 78.910416 39.203754 78.556641 38.833984 C 78.223106 38.473774 77.812933 38.209781 77.335938 38.050781 C 76.877786 37.898061 76.27399 37.750362 75.517578 37.601562 L 75.515625 37.599609 L 75.513672 37.599609 C 74.831095 37.477719 74.285342 37.350933 73.882812 37.220703 C 73.496291 37.095653 73.18106 36.904691 72.925781 36.650391 C 72.688975 36.402611 72.564453 36.073841 72.564453 35.613281 C 72.564453 35.046081 72.771096 34.62515 73.214844 34.28125 C 73.661226 33.93286 74.357961 33.738281 75.324219 33.738281 C 75.855692 33.738281 76.366784 33.81568 76.861328 33.96875 C 77.354616 34.12143 77.771251 34.336138 78.115234 34.611328 L 78.300781 34.759766 L 78.796875 34.097656 L 78.626953 33.958984 C 78.240963 33.639554 77.746734 33.393574 77.148438 33.214844 C 76.548469 33.023374 75.938851 32.927734 75.324219 32.927734 z M 64.251953 32.945312 C 61.491833 32.945312 59.277344 35.070591 59.277344 37.994141 C 59.277344 41.117441 61.491833 43.022816 64.251953 43.041016 C 65.813613 43.041016 67.520594 42.405294 68.464844 41.152344 L 67.775391 40.589844 C 67.049041 41.570414 65.541223 42.078125 64.251953 42.078125 C 62.236333 42.078125 60.475141 40.753426 60.275391 38.447266 L 69.083984 38.447266 C 69.465314 34.633936 67.012083 32.945312 64.251953 32.945312 z M 91.650391 33.037109 L 91.650391 33.267578 L 91.650391 43.041016 L 92.480469 43.041016 L 92.480469 33.037109 L 91.650391 33.037109 z M 102.21875 33.072266 C 100.85685 33.090426 99.476922 33.652354 98.732422 34.996094 L 98.732422 33.253906 L 98.732422 33.236328 L 97.787109 33.236328 L 97.787109 43.023438 L 98.021484 43.023438 L 98.021484 43.041016 L 98.390625 43.041016 L 98.390625 43.023438 L 98.75 43.023438 L 98.75 37.576172 C 98.75 35.560552 100.16602 34.033825 102.18164 34.015625 C 104.30621 33.997465 105.66797 35.196749 105.66797 37.412109 L 105.66797 43.041016 L 106.63086 43.041016 L 106.63086 37.394531 C 106.63086 34.670721 104.83361 33.072266 102.21875 33.072266 z M 115.43945 33.304688 C 114.51937 33.304688 113.67673 33.510588 112.92773 33.923828 C 112.17868 34.337098 111.58591 34.923595 111.16016 35.671875 C 110.73302 36.409675 110.52148 37.246819 110.52148 38.167969 C 110.52148 39.089119 110.73383 39.932331 111.16016 40.681641 C 111.5859 41.416991 112.17886 42.002774 112.92578 42.427734 L 112.92773 42.429688 C 113.67673 42.842928 114.51937 43.048828 115.43945 43.048828 C 116.48779 43.048828 117.4246 42.777645 118.22656 42.234375 C 118.83094 41.821865 119.17791 41.201568 119.52734 40.585938 L 119.52734 42.337891 C 119.52734 43.704141 119.20502 44.661649 118.59961 45.255859 L 118.59766 45.257812 L 118.5957 45.259766 C 118.00049 45.866206 117.05779 46.1875 115.7168 46.1875 C 114.94188 46.1875 114.23241 46.062043 113.58398 45.814453 C 112.9343 45.566393 112.37734 45.215222 111.9082 44.757812 L 111.74609 44.597656 L 111.16992 45.173828 L 111.32031 45.337891 C 111.80281 45.859511 112.43208 46.265274 113.19727 46.558594 L 113.19922 46.558594 C 113.97742 46.852014 114.81829 46.998047 115.7168 46.998047 C 117.24255 46.998047 118.41993 46.617419 119.20117 45.824219 L 119.20312 45.822266 C 119.98497 45.039146 120.35742 43.844303 120.35742 42.283203 L 120.35742 33.359375 L 120.12695 33.359375 L 119.52734 33.359375 L 119.52734 35.740234 C 119.17745 35.133314 118.82945 34.522381 118.22461 34.119141 C 117.42299 33.576581 116.48711 33.304687 115.43945 33.304688 z M 64.251953 33.833984 C 66.612593 33.833984 68.192738 35.17864 68.210938 37.59375 L 60.275391 37.59375 C 60.493301 35.1968 62.236333 33.833984 64.251953 33.833984 z M 115.43945 34.117188 C 116.2294 34.117188 116.92516 34.292025 117.54102 34.640625 L 117.54297 34.640625 L 117.54492 34.642578 C 118.17342 34.980108 118.65514 35.450226 119.00391 36.066406 C 119.35251 36.682256 119.52734 37.378019 119.52734 38.167969 C 119.52734 38.957919 119.35141 39.660042 119.00195 40.289062 C 118.65298 40.904582 118.17004 41.381009 117.54102 41.730469 C 116.92521 42.067049 116.22985 42.236328 115.43945 42.236328 C 114.64904 42.236328 113.94538 42.065926 113.31641 41.728516 L 113.31445 41.728516 C 112.6998 41.379206 112.22344 40.902699 111.875 40.287109 C 111.52615 39.658509 111.35156 38.957229 111.35156 38.167969 C 111.35156 37.378019 111.5264 36.682256 111.875 36.066406 C 112.22431 35.449266 112.70013 34.979788 113.31641 34.642578 L 113.31641 34.640625 L 113.31836 34.640625 C 113.94737 34.291165 114.6495 34.117188 115.43945 34.117188 z ",style:{fill:"#60609f"},key:2})])}r.defaultProps={viewBox:"0 0 133.64975 57.137734"},e.exports=r,r.default=r},1609:e=>{"use strict";e.exports=window.React}},n={};function o(e){var r=n[e];if(void 0!==r)return r.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,o),i.exports}o.m=t,e=[],o.O=(t,n,r,i)=>{if(!n){var a=1/0;for(L=0;L<e.length;L++){for(var[n,r,i]=e[L],l=!0,s=0;s<n.length;s++)(!1&i||a>=i)&&Object.keys(o.O).every((e=>o.O[e](n[s])))?n.splice(s--,1):(l=!1,i<a&&(a=i));if(l){e.splice(L--,1);var c=r();void 0!==c&&(t=c)}}return t}i=i||0;for(var L=e.length;L>0&&e[L-1][2]>i;L--)e[L]=e[L-1];e[L]=[n,r,i]},o.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},o.d=(e,t)=>{for(var n in t)o.o(t,n)&&!o.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),o.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e={5251:0,1578:0};o.O.j=t=>0===e[t];var t=(t,n)=>{var r,i,[a,l,s]=n,c=0;if(a.some((t=>0!==e[t]))){for(r in l)o.o(l,r)&&(o.m[r]=l[r]);if(s)var L=s(o)}for(t&&t(n);c<a.length;c++)i=a[c],o.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return o.O(L)},n=globalThis.webpackChunknab=globalThis.webpackChunknab||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var r=o.O(void 0,[1578],(()=>o(5977)));r=o.O(r);var i=nab="undefined"==typeof nab?{}:nab;for(var a in r)i[a]=r[a];r.__esModule&&Object.defineProperty(i,"__esModule",{value:!0})})();
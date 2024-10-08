(()=>{var e,t={1445:(e,t,n)=>{"use strict";n.r(t),n.d(t,{initPage:()=>x});const a=window.wp.element;window.wp.domReady;const i=window.wp.components,o=window.wp.apiFetch;var r=n.n(o);const l=window.wp.date,s=window.wp.url;var c=function(){return c=Object.assign||function(e){for(var t,n=1,a=arguments.length;n<a;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},c.apply(this,arguments)};var u=function(e){var t,n;return!!(null===(t=e.url)||void 0===t?void 0:t.includes("/wp-json/"))||!!(null===(n=e.url)||void 0===n?void 0:n.includes("rest_route"))||!!Object.keys(e).includes("rest_route")};const d=window.wp.i18n,v=window.nab.components;var p=function(){return p=Object.assign||function(e){for(var t,n=1,a=arguments.length;n<a;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},p.apply(this,arguments)},b=function(e){var t=e.isSubscribed,n=g(e),o=n.isModalOpen,r=n.openModal,l=n.closeModal,s=n.mainActionLabel,c=n.isDeactivating,u=n.deactivate,b=n.cleanAndDeactivate,m=n.reason,f=n.setReason;return a.createElement("div",{className:"nelio-ab-testing-deactivation"},a.createElement(i.Button,{className:"nelio-ab-testing-deactivation__button",variant:"link",onClick:r},(0,d._x)("Deactivate","command","nelio-ab-testing")),o&&a.createElement(i.Modal,{title:(0,d._x)("Nelio A/B Testing Deactivation","text","nelio-ab-testing"),isDismissible:!c,shouldCloseOnEsc:!c,shouldCloseOnClickOutside:!c,onRequestClose:l},"temporary-deactivation"===m.value?a.createElement(a.Fragment,null,a.createElement(v.RadioControl,{selected:m.value,options:w,onChange:function(e){return f({value:e,details:""})},disabled:c}),a.createElement("br",null)):a.createElement(a.Fragment,null,a.createElement("p",null,(0,d._x)("If you have a moment, please share why you are deactivating Nelio A/B Testing:","user","nelio-ab-testing")),a.createElement(v.RadioControl,{className:"nelio-ab-testing-deactivation__options",selected:m.value,options:y,onChange:function(e){return f({value:e,details:""})},extraValue:m.details,onExtraChange:function(e){return f(p(p({},m),{details:e}))},disabled:c})),t&&"temporary-deactivation"!==m.value&&a.createElement("p",{className:"nelio-ab-testing-deactivation__subscription-warning"},a.createElement(i.Dashicon,{icon:"warning"}),a.createElement("span",null,(0,d._x)("Please keep in mind your subscription to Nelio A/B Testing will remain active after removing the plugin from this site. If you want to unsubscribe from our service, you can do so from the plugin’s Account page before you deactivate the plugin.","user","nelio-ab-testing"))),a.createElement("div",{className:"nelio-ab-testing-deactivation__actions"},"temporary-deactivation"===m.value||c?a.createElement("span",null):a.createElement(i.Button,{variant:"link",disabled:c,onClick:function(){return b()}},(0,d._x)("Just Delete Data","command","nelio-ab-testing")),a.createElement(i.Button,{variant:"primary",disabled:c||"clean-stuff"===m.value,onClick:function(){return"temporary-deactivation"===m.value?u():b(m.details?"".concat(m.value,": ").concat(m.details):m.value)}},s))))},g=function(e){var t=e.cleanNonce,n=e.deactivationUrl,i=(0,a.useState)(h),o=i[0],d=i[1],v=function(){window.location.href=n},b=function(){return d(p(p({},h),{isModalOpen:!1}))},g="temporary-deactivation"===o.reason.value?m(o.isDeactivating):f(o.isDeactivating);return{isModalOpen:o.isModalOpen,openModal:function(){return d(p(p({},h),{isModalOpen:!0}))},closeModal:b,isDeactivating:o.isDeactivating,mainActionLabel:g,deactivate:function(){d(p(p({},o),{reason:h.reason,isDeactivating:!0})),v()},cleanAndDeactivate:function(e){var n,a,i,g;d(p(p({},o),{isDeactivating:!0})),(n={path:"/nab/v1/plugin/clean",method:"POST",data:{reason:e,nabnonce:t}},a=n.url,i=n.path,g=(0,l.format)("YmjHi").substring(0,11)+"0",r()(c(c(c({},n),a&&{url:u(n)?(0,s.addQueryArgs)(a,{nabts:g}):a}),i&&{path:(0,s.addQueryArgs)(i,{nabts:g})}))).then(v,b)},reason:o.reason,setReason:function(e){return d(p(p({},o),{reason:e}))}}},m=function(e){return e?(0,d._x)("Deactivating…","text","nelio-ab-testing"):(0,d._x)("Deactivate","command","nelio-ab-testing")},f=function(e){return e?(0,d._x)("Deleting Data…","text","nelio-ab-testing"):(0,d._x)("Submit and Delete Data","command","nelio-ab-testing")},h={isModalOpen:!1,isDeactivating:!1,reason:{value:"temporary-deactivation",details:""}},w=[{value:"temporary-deactivation",label:(0,d._x)("It’s a temporary deactivation","text","nelio-ab-testing")},{value:"clean-stuff",label:(0,d._x)("Delete Nelio A/B Testing’s data and deactivate plugin","text","nelio-ab-testing")}],y=[{value:"plugin-no-longer-needed",label:(0,d._x)("I no longer need the plugin","text","nelio-ab-testing")},{value:"plugin-doesnt-work",label:(0,d._x)("I couldn’t get the plugin to work","text","nelio-ab-testing"),extra:(0,d._x)("What went wrong?","text","nelio-ab-testing")},{value:"better-plugin-found",label:(0,d._x)("I found a better plugin","text","nelio-ab-testing"),extra:(0,d._x)("What’s the plugin’s name?","text","nelio-ab-testing")},{value:"other",label:(0,d._x)("Other","text","nelio-ab-testing"),extra:(0,d._x)("Please share the reason…","user","nelio-ab-testing")}];function x(e){var t,n,o=e.isSubscribed,r=e.cleanNonce,l=e.deactivationUrl,s=document.querySelector(".nelio-ab-testing-deactivate-link");s&&(t=a.createElement(i.SlotFillProvider,null,a.createElement(b,{isSubscribed:o,deactivationUrl:l,cleanNonce:r}),a.createElement(i.Popover.Slot,null)),(n=s)&&(a.createRoot?(0,a.createRoot)(n).render(t):(0,a.render)(t,n)))}}},n={};function a(e){var i=n[e];if(void 0!==i)return i.exports;var o=n[e]={exports:{}};return t[e](o,o.exports,a),o.exports}a.m=t,e=[],a.O=(t,n,i,o)=>{if(!n){var r=1/0;for(u=0;u<e.length;u++){n=e[u][0],i=e[u][1],o=e[u][2];for(var l=!0,s=0;s<n.length;s++)(!1&o||r>=o)&&Object.keys(a.O).every((e=>a.O[e](n[s])))?n.splice(s--,1):(l=!1,o<r&&(r=o));if(l){e.splice(u--,1);var c=i();void 0!==c&&(t=c)}}return t}o=o||0;for(var u=e.length;u>0&&e[u-1][2]>o;u--)e[u]=e[u-1];e[u]=[n,i,o]},a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var n in t)a.o(t,n)&&!a.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),a.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e={6269:0,6376:0};a.O.j=t=>0===e[t];var t=(t,n)=>{var i,o,r=n[0],l=n[1],s=n[2],c=0;if(r.some((t=>0!==e[t]))){for(i in l)a.o(l,i)&&(a.m[i]=l[i]);if(s)var u=s(a)}for(t&&t(n);c<r.length;c++)o=r[c],a.o(e,o)&&e[o]&&e[o][0](),e[o]=0;return a.O(u)},n=self.webpackChunknab=self.webpackChunknab||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var i=a.O(void 0,[6376],(()=>a(1445)));i=a.O(i);var o=nab="undefined"==typeof nab?{}:nab;for(var r in i)o[r]=i[r];i.__esModule&&Object.defineProperty(o,"__esModule",{value:!0})})();
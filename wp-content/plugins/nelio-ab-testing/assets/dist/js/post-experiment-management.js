(()=>{var e,t={254:(e,t,n)=>{"use strict";const r=window.nab.data,i=window.wp.element,a=window.nab.experimentLibrary,o=window.wp.apiFetch;var l=n.n(o);const s=window.wp.date,c=window.wp.url;var u=function(){return u=Object.assign||function(e){for(var t,n=1,r=arguments.length;n<r;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},u.apply(this,arguments)};var d=function(e){var t,n;return!!(null===(t=e.url)||void 0===t?void 0:t.includes("/wp-json/"))||!!(null===(n=e.url)||void 0===n?void 0:n.includes("rest_route"))||!!Object.keys(e).includes("rest_route")};const p=window.wp.components,m=window.wp.data;function v(e,t){return(0,m.useSelect)(e,t)}const b=window.wp.i18n,f=window.lodash,g=window.nab.components,E=window.nab.experiments,w=window.nab.utils;var x=function(){return x=Object.assign||function(e){for(var t,n=1,r=arguments.length;n<r;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},x.apply(this,arguments)},_=function(e){var t=e.experimentId,n=e.postBeingEdited,r=e.type,a=k(t);return a?i.createElement(i.Fragment,null,i.createElement(y,{icon:a,experimentId:t}),i.createElement(h,{experimentId:t,postBeingEdited:n}),i.createElement(I,{postBeingEdited:n,type:r})):null},y=function(e){var t=e.icon,n=e.experimentId,r=O(n),a=C(n);return i.createElement(p.PanelRow,{className:"nab-test-panel"},i.createElement("span",{className:"nab-test-panel__icon"},i.createElement(t,null)),i.createElement("a",{className:"nab-test-panel__name",href:a},r))},h=function(e){var t=e.experimentId,n=e.postBeingEdited,r=B(t);return r?i.createElement(p.PanelRow,{className:"nab-variants-panel"},i.createElement("h2",{className:"nab-variants-panel__title"},(0,b._x)("Variants","text","nelio-ab-testing")),r.map((function(e){var t=e.name,r=e.link,a=e.postId,o=e.index;return i.createElement("div",{className:"nab-alternative",key:a},i.createElement("span",{className:"nab-alternative__letter"},(0,w.getLetter)(o)),i.createElement("span",{className:"nab-alternative__name"},n!==a?i.createElement("a",{href:r},F(t,o)):i.createElement("strong",null,F(t,o))))}))):null},I=function(e){var t=e.postBeingEdited,n=e.type,r=P(t),a=r[0],o=r[1],l=(0,i.useState)(T),s=l[0],c=l[1],u=function(e){return c(x(x({},s),e))},d=s.isImportEnabled,m=s.isConfirmationDialogVisible,v=s.postIdToImportFrom,f=function(){return u({isImportEnabled:!d})},E=function(){return u({isConfirmationDialogVisible:!m})},w=a?(0,b._x)("Importing…","text","nelio-ab-testing"):(0,b._x)("Import","command","nelio-ab-testing");return i.createElement(p.PanelRow,{className:"nab-content-panel"},i.createElement("h2",{className:"nab-content-panel__title"},(0,b._x)("Content","text","nelio-ab-testing")),i.createElement("span",{className:"nab-content-panel__label"},i.createElement(p.Dashicon,{icon:"admin-page"}),d?(0,b._x)("Import content from:","text","nelio-ab-testing"):i.createElement(p.Button,{variant:"link",onClick:f},(0,b._x)("Import Content","command","nelio-ab-testing"))),d&&i.createElement(i.Fragment,null,i.createElement(g.PostSearcher,{value:v,className:"nab-content-panel__searcher",type:n,onChange:function(e){return void 0===e&&(e=0),u({postIdToImportFrom:e})}}),i.createElement("div",{className:"nab-content-panel__actions"},i.createElement(p.Button,{variant:"link",onClick:f},(0,b._x)("Cancel","command","nelio-ab-testing")),i.createElement(p.Button,{variant:"secondary",disabled:!v,onClick:E},(0,b._x)("Import","command","nelio-ab-testing")),i.createElement(g.ConfirmationDialog,{title:(0,b._x)("Import Content?","text","nelio-ab-testing"),text:(0,b._x)("This will overwrite the current content.","text","nelio-ab-testing"),confirmLabel:w,isConfirmEnabled:!a,isCancelEnabled:!a,isOpen:m,onCancel:E,onConfirm:function(){return o(v)}}))))},O=function(e){return v((function(t){var n;return(null===(n=t(r.store).getExperiment(e))||void 0===n?void 0:n.name)||(0,b._x)("Unnamed Test","text","nelio-ab-testing")}))},C=function(e){return v((function(t){var n;return(null===(n=t(r.store).getExperiment(e))||void 0===n?void 0:n.links.edit)||""}))},B=function(e){return v((function(t){var n;return(0,f.map)(null===(n=t(r.store).getExperiment(e))||void 0===n?void 0:n.alternatives,(function(e,t){return{index:t,postId:N(e)?e.attributes.postId:0,name:j(e)?e.attributes.name:"",link:e.links.edit}}))}))},k=function(e){return v((function(t){var n,a,o,l,s=t(r.store).getExperiment,c=t(E.store).getExperimentTypes,u=null!==(a=null===(n=s(e))||void 0===n?void 0:n.type)&&void 0!==a?a:"";return null!==(l=null===(o=c()[u])||void 0===o?void 0:o.icon)&&void 0!==l?l:function(){return i.createElement(i.Fragment,null)}}))},P=function(e){var t=(0,i.useState)(0),n=t[0],r=t[1];return(0,i.useEffect)((function(){var t,r,i,a;n&&(t={path:"/nab/v1/post/".concat(n,"/overwrites/").concat(e),method:"PUT"},r=t.url,i=t.path,a=(0,s.format)("YmjHi").substring(0,11)+"0",l()(u(u(u({},t),r&&{url:d(t)?(0,c.addQueryArgs)(r,{nabts:a}):r}),i&&{path:(0,c.addQueryArgs)(i,{nabts:a})}))).finally((function(){window.location.reload()}))}),[n]),[!!n,r]},N=function(e){return!!e.attributes.postId},j=function(e){return!!e.attributes.name},F=function(e,t){return e||(0===t?(0,b._x)("Control Version","text","nelio-ab-testing"):(0,b.sprintf)(/* translators: a letter, such as A, B, or C */ /* translators: a letter, such as A, B, or C */
(0,b._x)("Variant %s","text","nelio-ab-testing"),(0,w.getLetter)(t)))},T={isImportEnabled:!1,isConfirmationDialogVisible:!1,postIdToImportFrom:0};const D=window.wp.plugins;var S,V,A,R=null===(V=null===(S=window.wp)||void 0===S?void 0:S.editPost)||void 0===V?void 0:V.PluginDocumentSettingPanel,L=R?function(e){var t=e.experimentId,n=e.postBeingEdited,r=e.type;return i.createElement(R,{className:"nab-alternative-editing-sidebar",title:(0,b._x)("Nelio A/B Testing","text","nelio-ab-testing"),icon:"none"},i.createElement(_,{experimentId:t,postBeingEdited:n,type:r}))}:function(){return null},M=function(){return M=Object.assign||function(e){for(var t,n=1,r=arguments.length;n<r;n++)for(var i in t=arguments[n])Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i]);return e},M.apply(this,arguments)};window.nab=M(M({},(A=window)&&"object"==typeof A&&"nab"in A?window.nab:{}),{initEditPostAlternativeMetabox:function(e){(0,a.registerCoreExperiments)();var t,n,r=e.experimentId,o=e.postBeingEdited,l=e.type,s=document.getElementById("nelioab_edit_post_alternative_box"),c=null==s?void 0:s.getElementsByClassName("inside")[0];c&&(t=i.createElement(_,{experimentId:r,postBeingEdited:o,type:l}),(n=c)&&(i.createRoot?(0,i.createRoot)(n).render(t):(0,i.render)(t,n)))},initEditPostAlternativeBlockEditorSidebar:function(e){(0,a.registerCoreExperiments)();var t=e.experimentId,n=e.postBeingEdited,r=e.type;(0,D.registerPlugin)("nelio-ab-testing",{icon:function(){return i.createElement(i.Fragment,null)},render:function(){return i.createElement(L,{experimentId:t,postBeingEdited:n,type:r})}})}})}},n={};function r(e){var i=n[e];if(void 0!==i)return i.exports;var a=n[e]={exports:{}};return t[e](a,a.exports,r),a.exports}r.m=t,e=[],r.O=(t,n,i,a)=>{if(!n){var o=1/0;for(u=0;u<e.length;u++){n=e[u][0],i=e[u][1],a=e[u][2];for(var l=!0,s=0;s<n.length;s++)(!1&a||o>=a)&&Object.keys(r.O).every((e=>r.O[e](n[s])))?n.splice(s--,1):(l=!1,a<o&&(o=a));if(l){e.splice(u--,1);var c=i();void 0!==c&&(t=c)}}return t}a=a||0;for(var u=e.length;u>0&&e[u-1][2]>a;u--)e[u]=e[u-1];e[u]=[n,i,a]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={9197:0,904:0};r.O.j=t=>0===e[t];var t=(t,n)=>{var i,a,o=n[0],l=n[1],s=n[2],c=0;if(o.some((t=>0!==e[t]))){for(i in l)r.o(l,i)&&(r.m[i]=l[i]);if(s)var u=s(r)}for(t&&t(n);c<o.length;c++)a=o[c],r.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return r.O(u)},n=self.webpackChunknab=self.webpackChunknab||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var i=r.O(void 0,[904],(()=>r(254)));i=r.O(i);var a=nab="undefined"==typeof nab?{}:nab;for(var o in i)a[o]=i[o];i.__esModule&&Object.defineProperty(a,"__esModule",{value:!0})})();
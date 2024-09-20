(()=>{var e,t={3691:(e,t,n)=>{"use strict";n.r(t),n.d(t,{heatmapEditor:()=>a});var a={};n.r(a),n.d(a,{initializeExperimentEditor:()=>Z});const r=window.wp.element,i=window.wp.data,o=window.wp.domReady,l=n.n(o)(),s=window.lodash,c=window.nab.editor,u=window.nab.conversionActionLibrary,m=window.nab.data,d=window.nab.experimentLibrary,p=window.nab.segmentationRuleLibrary,g=window.wp.components,v=window.wp.i18n,f=window.wp.notices,b=window.nab.utils,E=window.nab.date,_=window.nab.segmentationRules;function y(e,t){return void 0===e&&(e=""),!!t&&(0!==e.indexOf(t)?(0,v.sprintf)(/* translators: a URL */ /* translators: a URL */
(0,v._x)("URL doesn’t start with your WordPress’ home URL (i.e. “%s”)","text","nelio-ab-testing"),t):!!(0,b.isUrlFragmentInvalid)(e.replace(t,""))&&(0,v._x)("Please type in a valid URL to track","user","nelio-ab-testing"))}var h=function(){var e=w(),t=x(),n=e.status.includes("paused"),a=N();return(0,r.useEffect)((function(){var r=e.homeUrl,i=e.mode,o=e.name,l=e.participationConditions,s=e.postId,c=e.postType,u=e.startDate,m=e.status,d=e.url;if("running"!==m)if((0,b.isEmpty)(o))t(n?"paused_draft":"draft",(0,v._x)("Please name your Heatmap test","user","nelio-ab-testing"));else{if("post"===i&&!s)switch(c){case"product":return void t(n?"paused_draft":"draft",(0,v._x)("Please select the product to track","user","nelio-ab-testing"));case"post":return void t(n?"paused_draft":"draft",(0,v._x)("Please select the post to track","user","nelio-ab-testing"));case"page":return void t(n?"paused_draft":"draft",(0,v._x)("Please select the page to track","user","nelio-ab-testing"));default:return void t(n?"paused_draft":"draft",(0,v._x)("Please select a page to track","user","nelio-ab-testing"))}if("url"===i&&y(d,r))t(n?"paused_draft":"draft",y(d,r)||"");else{var p=l.reduce((function(e,t){return e||a(t)}),void 0);p?t(n?"paused_draft":"draft",p):"scheduled"!==m||(0,E.isInTheFuture)(u)?"scheduled"!==m&&t(n?"paused":"ready"):t(n?"paused":"ready")}}}),[JSON.stringify(e)]),null},w=function(){return(0,i.useSelect)((function(e){var t,n,a,r,i,o=e(m.STORE_NAME).getPluginSetting,l=e(c.STORE_NAME),s=l.getExperimentAttribute,u=l.getHeatmapAttribute;return{homeUrl:o("homeUrl"),mode:null!==(t=u("trackingMode"))&&void 0!==t?t:"post",name:s("name"),participationConditions:null!==(n=u("participationConditions"))&&void 0!==n?n:[],postId:null!==(a=u("trackedPostId"))&&void 0!==a?a:0,postType:null!==(r=u("trackedPostType"))&&void 0!==r?r:"page",startDate:s("startDate"),status:s("status"),url:null!==(i=u("trackedUrl"))&&void 0!==i?i:""}}))},x=function(){var e=(0,i.useDispatch)(c.STORE_NAME),t=e.setDraftStatusRationale,n=e.setExperimentData;return function(e,a){n({status:e}),t(null!=a?a:"")}},N=function(){var e=(0,i.useSelect)((function(e){return(0,s.keyBy)(e(_.STORE_NAME).getSegmentationRuleTypes()||[],"name")}));return function(t){var n,a,r,i,o=null!==(r=null===(a=null===(n=e[t.type])||void 0===n?void 0:n.validate)||void 0===a?void 0:a.call(n,t.attributes))&&void 0!==r?r:{};return null!==(i=(0,s.values)(o)[0])&&void 0!==i?i:""}};const S=window.React;function k(e){return e.startsWith("{{/")?{type:"componentClose",value:e.replace(/\W/g,"")}:e.endsWith("/}}")?{type:"componentSelfClosing",value:e.replace(/\W/g,"")}:e.startsWith("{{")?{type:"componentOpen",value:e.replace(/\W/g,"")}:{type:"string",value:e}}function R(e,t){let n,a,r=[];for(let i=0;i<e.length;i++){const o=e[i];if("string"!==o.type){if(void 0===t[o.value])throw new Error(`Invalid interpolation, missing component node: \`${o.value}\``);if("object"!=typeof t[o.value])throw new Error(`Invalid interpolation, component node must be a ReactElement or null: \`${o.value}\``);if("componentClose"===o.type)throw new Error(`Missing opening component token: \`${o.value}\``);if("componentOpen"===o.type){n=t[o.value],a=i;break}r.push(t[o.value])}else r.push(o.value)}if(n){const i=function(e,t){const n=t[e];let a=0;for(let r=e+1;r<t.length;r++){const e=t[r];if(e.value===n.value){if("componentOpen"===e.type){a++;continue}if("componentClose"===e.type){if(0===a)return r;a--}}}throw new Error("Missing closing component token `"+n.value+"`")}(a,e),o=R(e.slice(a+1,i),t),l=(0,S.cloneElement)(n,{},o);if(r.push(l),i<e.length-1){const n=R(e.slice(i+1),t);r=r.concat(n)}}return r=r.filter(Boolean),0===r.length?null:1===r.length?r[0]:(0,S.createElement)(S.Fragment,null,...r)}function T(e){const{mixedString:t,components:n,throwErrors:a}=e;if(!n)return t;if("object"!=typeof n){if(a)throw new Error(`Interpolation Error: unable to process \`${t}\` because components is not an object`);return t}const r=function(e){return e.split(/(\{\{\/?\s*\w+\s*\/?\}\})/g).map(k)}(t);try{return R(r,n)}catch(e){if(a)throw new Error(`Interpolation Error: unable to process \`${t}\` because of error \`${e.message}\``);return t}}const O=window.nab.components;var P,C=function(e){var t=e.className,n=e.postId,a=e.postType,i=e.setAttributes,o=A().map((function(e){return{value:e.name,label:e.labels.singular_name}})),l=a||"page";return r.createElement("div",{className:t},r.createElement(g.SelectControl,{className:"".concat(t,"-type-selector"),value:l,options:o,onChange:function(e){return i({postId:0,postType:e})}}),r.createElement(O.PostSearcher,{className:"".concat(t,"-selector"),type:l,value:n,perPage:10,onChange:function(e){return i({postId:e,postType:l})}}))},A=function(){return(0,i.useSelect)((function(e){var t=e(m.STORE_NAME).getKindEntities,n=[{kind:"entity",name:"page",labels:{singular_name:(0,v._x)("Page","text","nelio-ab-testing")}},{kind:"entity",name:"post",labels:{singular_name:(0,v._x)("Post","text","nelio-ab-testing")}}],a=t();return(a=(a=(0,b.isEmpty)(a)?n:a).filter((function(e){return"entity"===e.kind}))).filter((function(e){return"attachment"!==e.name}))}))},I=function(){var e=M(),t=e[0],n=e[1],a=t.mode,i=t.postId,o=t.postType,l=t.url,s=t.urlError;return r.createElement("div",{className:"nab-edit-experiment__alternative-section"},r.createElement("h2",null,T({mixedString:(0,v.sprintf)(/* translators: dashicon */ /* translators: dashicon */
(0,v._x)("%s WordPress Page","text","nelio-ab-testing"),"{{icon}}{{/icon}}"),components:{icon:r.createElement(g.Dashicon,{className:"nab-alternative-section__title-icon",icon:"welcome-view-site"})}})),r.createElement("div",{className:"nab-tracked-element"},"url"!==a?r.createElement(r.Fragment,null,r.createElement("div",{className:"nab-tracked-element__p"},(0,v._x)("Select the page you want to generate a heatmap for:","user","nelio-ab-testing")),r.createElement(C,{className:"nab-tracked-element__post",postId:null!=i?i:0,postType:o,setAttributes:n})):r.createElement(r.Fragment,null,r.createElement("div",{className:"nab-tracked-element__p"},(0,v._x)("Type in the URL of the page you want to generate a heatmap for:","user","nelio-ab-testing")),r.createElement("div",{className:"nab-tracked-element__url"},r.createElement(g.TextControl,{className:"nab-tracked-element__url-value",value:l,onChange:function(e){return n({url:e})},placeholder:(0,v._x)("URL…","text","nelio-ab-testing")}),r.createElement("div",{className:"nab-tracked-element__url-preview"},r.createElement(g.ExternalLink,{className:"components-button is-secondary",href:s?void 0:l,disabled:!!s},(0,v._x)("View","command","nelio-ab-testing")))),!!s&&r.createElement("div",{className:"nab-tracked-element__p"},r.createElement(O.ErrorText,{value:s}))),r.createElement("div",{className:"nab-tracked-element__p"},r.createElement(g.CheckboxControl,{className:"nab-tracked-element__mode",label:(0,v._x)("Track heatmap of a page specified using its URL.","command","nelio-ab-testing"),checked:"url"===a,onChange:function(e){return n({mode:e?"url":"post"})}}))))},M=function(){var e=(0,i.useSelect)((function(e){var t=e(m.STORE_NAME).getPluginSetting,n=e(c.STORE_NAME).getHeatmapAttribute,a=n("trackedUrl")||"",r=t("homeUrl");return{mode:n("trackingMode")||"post",postId:n("trackedPostId")||void 0,postType:n("trackedPostType")||"page",url:a,urlError:y(a,r)}})),t=(0,i.useDispatch)(c.STORE_NAME).setHeatmapData;return[e,function(n){var a,r,i,o;return t({trackingMode:null!==(a=n.mode)&&void 0!==a?a:e.mode,trackedPostId:null!==(r=n.postId)&&void 0!==r?r:e.postId,trackedPostType:null!==(i=n.postType)&&void 0!==i?i:e.postType,trackedUrl:null!==(o=n.url)&&void 0!==o?o:e.url})}]},D=function(e){var t,n=e.readOnly,a=e.rule,i=e.setAttributes,o=e.remove,l=U(),s=L(a.type),c=null==s?void 0:s.view,u=null==s?void 0:s.edit,m=null==s?void 0:s.icon,d=(null==a?void 0:a.attributes)||{},p=(null!==(t=null==s?void 0:s.validate)&&void 0!==t?t:function(){return{}})(d),f=(0,r.useState)(!(0,b.isEmpty)(p))[0];return n?r.createElement("div",{className:"nab-segmentation-rule"},r.createElement("div",{className:"nab-segmentation-rule__view"},m?r.createElement(m,{className:"nab-segmentation-rule__icon"}):r.createElement(g.Dashicon,{className:"nab-segmentation-rule__icon nab-segmentation-rule__icon--invalid",icon:"warning"}),r.createElement("div",{className:"nab-segmentation-rule__actual-view"},c?r.createElement(c,{attributes:d,experimentId:l}):r.createElement("span",null,(0,v._x)("Invalid segmentation rule.","text","nelio-ab-testing"))))):r.createElement(g.PanelBody,{className:"nab-segmentation-rule",initialOpen:f,title:r.createElement("div",{className:"nab-segmentation-rule__view"},m?r.createElement(m,{className:"nab-segmentation-rule__icon"}):r.createElement(g.Dashicon,{className:"nab-segmentation-rule__icon nab-segmentation-rule__icon--invalid",icon:"warning"}),r.createElement("div",{className:"nab-segmentation-rule__actual-view"},c?r.createElement(c,{attributes:d,experimentId:l}):r.createElement("span",null,(0,v._x)("Invalid segmentation rule.","text","nelio-ab-testing"))))},r.createElement("div",{className:"nab-segmentation-rule__edit"},u?r.createElement(u,{attributes:d,experimentId:l,setAttributes:i,errors:p}):r.createElement("span",null,(0,v._x)("This segmentation rule can’t be properly loaded. Please consider removing it.","text","nelio-ab-testing"))),r.createElement(g.Button,{variant:"link",isDestructive:!0,onClick:o,className:"nab-segmentation-rule__delete-button"},(0,v._x)("Delete","command","neli-ab-testing")))},U=function(){return(0,i.useSelect)((function(e){return e("nab/editor").getExperimentId()}))},L=function(e){return(0,i.useSelect)((function(t){return t(_.STORE_NAME).getSegmentationRuleType(e)}))},j=function(e){var t=e.category,n=e.createSegmentationRule,a=e.segmentationRules,i=W(t.name),o=t.icon;return i.length?r.createElement("li",{key:t.name,className:"nab-segmentation-rule-type-category"},r.createElement(g.DropdownMenu,{icon:r.createElement(o,null),className:"nab-segmentation-rule-type-category__item",label:t.title,controls:i.map((function(e){var t=e.name,i=e.title,o=e.icon,l=e.singleton;return{title:i,icon:r.createElement(o,null),isDisabled:l&&a.some((function(e){return e.type===t})),onClick:function(){return n(t)}}})),toggleProps:{className:"nab-segmentation-rule-type-category__toggle",disabled:i.every((function(e){var t=e.name;return e.singleton&&a.some((function(e){return e.type===t}))}))},menuProps:{className:"nab-segmentation-rule-type-category__menu"}})):null},W=function(e){return(0,i.useSelect)((function(t){return(t(_.STORE_NAME).getSegmentationRuleTypes()||[]).filter((function(t){return t.category===e}))}))},F=function(e){var t=e.createSegmentationRule,n=e.segmentationRules,a=H();return(0,m.usePluginSetting)("subscription")?r.createElement("ul",{className:"nab-segmentation-rule-type-category-list"},a.map((function(e){return r.createElement(j,{key:e.name,category:e,createSegmentationRule:t,segmentationRules:n})}))):r.createElement("div",{className:"nab-segmentation-rule-type-list"},r.createElement(g.ExternalLink,{className:"components-button is-secondary",href:(0,b.addFreeTracker)((0,v._x)("https://neliosoftware.com/testing/pricing/","text","nelio-ab-testing"))},(0,v._x)("Subscribe to Use Segmentation Rules","user","nelio-ab-testing")))},H=function(){return(0,i.useSelect)((function(e){return e(_.STORE_NAME).getSegmentationRuleTypeCategories()||[]}))},B=function(){return B=Object.assign||function(e){for(var t,n=1,a=arguments.length;n<a;n++)for(var r in t=arguments[n])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e},B.apply(this,arguments)},$=function(e,t,n){if(n||2===arguments.length)for(var a,r=0,i=t.length;r<i;r++)!a&&r in t||(a||(a=Array.prototype.slice.call(t,0,r)),a[r]=t[r]);return e.concat(a||Array.prototype.slice.call(t))},z=function(){var e=!!(0,m.usePluginSetting)("subscription");return r.createElement("div",{className:"nab-edit-experiment__participation-section"},r.createElement(J,null),e?r.createElement(V,null):r.createElement(K,null))},J=function(){return r.createElement("h2",null,T({mixedString:(0,v.sprintf)(/* translators: dashicon */ /* translators: dashicon */
(0,v._x)("%s Participation","text","nelio-ab-testing"),"{{icon}}{{/icon}}"),components:{icon:r.createElement(g.Dashicon,{className:"nab-participation-section__title-icon",icon:"groups"})}}))},K=function(){return r.createElement("div",{className:"nab-edit-experiment-participation-section__content nab-edit-experiment-participation-section__content--free"},r.createElement("p",null,(0,v._x)("All your visitors participate in this heatmap. Participation settings allow you to narrow your tested audience and target only a subset of your visitors.","user","nelio-ab-testing")),r.createElement("div",{className:"nab-edit-experiment-participation-section__content-action"},r.createElement(g.ExternalLink,{className:"components-button is-secondary",href:(0,b.addFreeTracker)((0,v._x)("https://neliosoftware.com/testing/pricing/","text","nelio-ab-testing"))},(0,v._x)("Subscribe to Unlock Participation Settings","user","nelio-ab-testing"))))},V=function(){var e=q(),t=e.conditions,n=e.createCondition,a=e.updateCondition,i=e.removeCondition;return r.createElement("div",{className:"nab-edit-experiment-participation-section__content"},r.createElement("p",null,t.length?(0,v._x)("Only visitors who meet all the following criteria will contribute to this heatmap:","text","nelio-ab-testing"):(0,v._x)("All visitors will contribute to this heatmap. If you want to limit participation to a subset of visitors, use the actions below:","text","nelio-ab-testing")),r.createElement("div",{className:"nab-edit-experiment-participation-section__conditions"},t.map((function(e){return r.createElement(D,{key:e.id,rule:e,setAttributes:function(t){return a(e.id,t)},remove:function(){return i(e.id)}})}))),r.createElement(F,{segmentationRules:t,createSegmentationRule:n}))},q=function(){var e=(0,i.useSelect)((function(e){var t;return null!==(t=e(c.STORE_NAME).getHeatmapAttribute("participationConditions"))&&void 0!==t?t:[]})),t=(0,i.useDispatch)(c.STORE_NAME).setHeatmapData;return{conditions:e,createCondition:function(n){var a=(0,_.createSegmentationRule)(n);a&&t({participationConditions:$($([],e,!0),[a],!1)})},updateCondition:function(n,a){return t({participationConditions:e.map((function(e){return e.id===n?B(B({},e),{attributes:B(B({},e.attributes),a)}):e}))})},removeCondition:function(n){return t({participationConditions:e.filter((function(e){return e.id!==n}))})}}},G=null!==(P=null===f.store||void 0===f.store?void 0:f.store.name)&&void 0!==P?P:"core/notices",Q=function(){var e=X(),t=(0,i.useDispatch)(G).removeNotice;return r.createElement("div",{className:"nab-edit-experiment-layout"},r.createElement(h,null),r.createElement(c.Header,null),r.createElement("div",{className:"nab-edit-experiment-layout__body"},r.createElement("div",{className:"nab-edit-experiment-layout__content",role:"region","aria-label":(0,v._x)("Editor content","text","nelio-ab-testing"),tabIndex:-1},!(0,b.isEmpty)(e)&&r.createElement(g.NoticeList,{className:"nab-edit-experiment-layout__notices",notices:e,onRemove:t}),r.createElement(c.ExperimentName,null),r.createElement(I,null),r.createElement(z,null)),r.createElement(c.Sidebar,null)))},X=function(){return(0,i.useSelect)((function(e){return e(G).getNotices()}))},Y=function(e){var t=e.experimentId,n=(0,i.useSelect)((function(e){return e(m.STORE_NAME).getExperiment(t)}));return n?r.createElement(r.StrictMode,null,r.createElement(c.EditorProvider,{experiment:n},r.createElement(Q,null))):null};function Z(e,t){var n,a,i=document.getElementById(e);(0,d.registerCoreExperiments)(),(0,u.registerCoreConversionActions)(),(0,p.registerCoreSegmentationRules)(),n=r.createElement(Y,{experimentId:t}),(a=i)&&(r.createRoot?(0,r.createRoot)(a).render(n):(0,r.render)(n,a))}function ee(){var e=window.innerHeight,t=document.getElementById("wpadminbar"),n=t?t.getBoundingClientRect().height:0;(0,(0,i.dispatch)(m.STORE_NAME).setPageAttribute)("sidebarDimensions",{top:n,height:"".concat(e-n,"px"),applyFix:782<=window.innerWidth})}window.addEventListener("resize",(0,s.debounce)(ee,100)),l(ee)}},n={};function a(e){var r=n[e];if(void 0!==r)return r.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,a),i.exports}a.m=t,e=[],a.O=(t,n,r,i)=>{if(!n){var o=1/0;for(u=0;u<e.length;u++){for(var[n,r,i]=e[u],l=!0,s=0;s<n.length;s++)(!1&i||o>=i)&&Object.keys(a.O).every((e=>a.O[e](n[s])))?n.splice(s--,1):(l=!1,i<o&&(o=i));if(l){e.splice(u--,1);var c=r();void 0!==c&&(t=c)}}return t}i=i||0;for(var u=e.length;u>0&&e[u-1][2]>i;u--)e[u]=e[u-1];e[u]=[n,r,i]},a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var n in t)a.o(t,n)&&!a.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),a.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e={7793:0,117:0,9196:0};a.O.j=t=>0===e[t];var t=(t,n)=>{var r,i,[o,l,s]=n,c=0;if(o.some((t=>0!==e[t]))){for(r in l)a.o(l,r)&&(a.m[r]=l[r]);if(s)var u=s(a)}for(t&&t(n);c<o.length;c++)i=o[c],a.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return a.O(u)},n=globalThis.webpackChunknab=globalThis.webpackChunknab||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var r=a.O(void 0,[117,9196],(()=>a(3691)));r=a.O(r);var i=nab="undefined"==typeof nab?{}:nab;for(var o in r)i[o]=r[o];r.__esModule&&Object.defineProperty(i,"__esModule",{value:!0})})();
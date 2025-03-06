"use strict";(self.webpackJSONPwpmdb=self.webpackJSONPwpmdb||[]).push([[106],{8106:(e,t,n)=>{n.r(t),n.d(t,{default:()=>q});var l=n(987),i=n(9255),a=n(6484),r=n(7081),s=n(3144),o=n(9764),c=n(8346),p=n.n(c),m=n(3963),d=n(6500),u=n(6508),_=n.n(u);const h=(0,r.Ng)((e=>({theme_plugin_files:e.theme_plugin_files,panel_info:e.panels,local_version:e.migrations.local_site.theme_plugin_files_version})),{})((e=>{var t="",n=e.theme_plugin_files,l=e.panelsOpen,r=e.selected,s=e.items,o=e.type;if(!_()(l,o)&&(n[o]||{}).enabled){if(t=e.summary,["other_files","muplugin_files","root_files"].includes(o)){if(0===r.length)return i.createElement("span",{className:"empty-warning"},(0,a.__)("Empty selection","wp-migrate-db"));var c=[];s.forEach((e=>{r.includes(e.path)&&c.push(e.name)})),t=c.join(", ")}"core_files"===o&&(t=(0,a.__)("Export all Core files","wp-migrate-db"))}return i.createElement(i.Fragment,null,(0,m.Ay)(t))}));var g=n(8349),f=n(7431),v=n(1319),E=n(3048),b=n(3641),w=n(7853),y=n(4829),x=n(8047),O=n(7085);n(2481);const P=e=>{var t=e.children;return i.createElement("ul",{className:"icon-list"},t)};var A,N,k;function S(){return S=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var l in n)({}).hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e},S.apply(null,arguments)}const j=e=>i.createElement("svg",S({width:16,height:16,viewBox:"0 0 16 16",fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),i.createElement("g",{clipPath:"url(#clip0_141_42)"},i.createElement("mask",{id:"mask0_141_42",style:{maskType:"alpha"},maskUnits:"userSpaceOnUse",x:0,y:0,width:16,height:16},A||(A=i.createElement("path",{d:"M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Z",fill:"#fff"}))),N||(N=i.createElement("g",{mask:"url(#mask0_141_42)"},i.createElement("path",{d:"M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Z",fill:"#46B450"}),i.createElement("path",{d:"m5 8.243 2 2M7 10.243 11.243 6",stroke:"#fff",strokeWidth:2,strokeLinecap:"round",strokeLinejoin:"round"})))),k||(k=i.createElement("defs",null,i.createElement("clipPath",{id:"clip0_141_42"},i.createElement("path",{fill:"#fff",d:"M0 0h16v16H0z"})))));n.p;var M,T;function C(){return C=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var l in n)({}).hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e},C.apply(null,arguments)}const L=e=>i.createElement("svg",C({width:16,height:16,viewBox:"0 0 16 16",fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),M||(M=i.createElement("g",{clipPath:"url(#clip0_141_46)"},i.createElement("path",{d:"M16 8a8 8 0 0 1-8 8 8.001 8.001 0 1 1 8-8Z",fill:"#DC3232"}),i.createElement("path",{d:"M10.828 9.414 6.586 5.172a1 1 0 1 0-1.414 1.414l4.242 4.243a1 1 0 0 0 1.414-1.415Z",fill:"#fff"}),i.createElement("path",{d:"M10.828 6.586a1 1 0 1 0-1.414-1.414L5.172 9.414a1 1 0 0 0 1.414 1.415l4.242-4.243Z",fill:"#fff"}))),T||(T=i.createElement("defs",null,i.createElement("clipPath",{id:"clip0_141_46"},i.createElement("path",{fill:"#fff",d:"M0 0h16v16H0z"})))));n.p;const Z=e=>{var t=e.iconName,n=e.iconAltText,l=void 0===n?"":n,a=(e.children,{className:"icon-list-item-icon",alt:l||!1,"aria-hidden":""===l});return{do:i.createElement(j,a),dont:i.createElement(L,a)}[t]};const F=e=>{var t=e.iconName,n=e.iconAltText,l=void 0===n?"":n,a=e.children;return i.createElement("li",{className:"icon-list-item icon-list-item-".concat(t)},i.createElement(Z,{iconName:t,iconAltText:l}),i.createElement("span",null,a))};const I=()=>i.createElement("div",{className:"excludes-wrap"},i.createElement(y.A,{type:"warning",showIcon:!1,headerText:(0,a.__)("Which root files should be migrated?","wp-migrate-db")},i.createElement(P,null,i.createElement(F,{iconName:"do"},(0,m.Ay)((0,a.__)("<strong>Include</strong> content files (documents, media) served by\n            this site to prevent 404 errors at the destination.","wp-migrate-db"))),i.createElement(F,{iconName:"dont"},(0,m.Ay)((0,a.__)("<strong>Exclude</strong> platform-specific files that may be\n            incompatible with the destination.","wp-migrate-db"))),i.createElement(F,{iconName:"dont"},(0,m.Ay)((0,a.__)("<strong>Exclude</strong> plugin-generated files as they often contain\n             hard-coded paths and can be regenerated if needed.","wp-migrate-db"))))));function W(e,t,n,l,i){var a=((e,t,n)=>{var l=[];if("object"===typeof t){var i=Object.values(t).map((e=>e[0].path));"selected"===n["".concat(e,"_option")]&&n["".concat(e,"_selected")].forEach((e=>{i.includes(e)&&l.push(e)})),"except"===n["".concat(e,"_option")]&&n["".concat(e,"_excluded")].forEach((e=>{i.includes(e)&&l.push(e)})),"active"===n["".concat(e,"_option")]&&Object.values(t).forEach((e=>{e[0].active&&l.push(e[0].path)})),"all"===n["".concat(e,"_option")]&&(l=i)}return l})(l,i.site_details[l],e),r={themes:"theme_files",plugins:"plugin_files",muplugins:"muplugin_files",others:"other_files",core:"core_files",root:"root_files"},s=(e[r[l]]||{}).enabled;return{enabled:void 0!==s&&s,isOpen:t.includes(r[l]),selected:a,selectionEmpty:p()(n,{name:"SELECTED_".concat(l.toUpperCase(),"_EMPTY")})}}const U=(e,t)=>{var n=e.theme_plugin_files,l=e.panelsOpen,c=e.current_migration,p=e.remote_site,u=e.local_site,_=c.status,P=c.intent,A=(0,v.d)(e),N=(0,r.wA)(),k=t.title,S=t.type,j=t.panel_name,M=t.items,T=()=>"savefile"===P?M:(0,x.Al)()?M.filter((e=>!1===e.path.includes("wpe-site-migration"))):M.filter((e=>!1===e.path.includes("wp-migrate-db"))),C=M.map((e=>e.path)),L=!1,Z={push:"Push",pull:"Pull",savefile:"Export"},F={all:(0,a.nv)((0,a.__)("%s all %s","wp-migrate-db"),Z[P],S),active:(0,a.nv)((0,a.__)("%s only active %s","wp-migrate-db"),Z[P],S),selected:(0,a.nv)((0,a.__)("%s only selected %s","wp-migrate-db"),Z[P],S),except:(0,a.nv)((0,a.__)("%s all %s <b>except</b> those selected","wp-migrate-db"),Z[P],S)},U=W(n,l,_,S,"pull"===P?p:u),R=U.enabled,z=U.isOpen,B=U.selected,D=U.selectionEmpty;(0,i.useEffect)((()=>{"select"===n["".concat(S,"_option")]&&N(e.updateSelected(B,S)),"except"===n["".concat(S,"_option")]&&e.updateExcluded(B,S)}),[]),R&&!z&&(L=!0);var G=[],J="selected"===n["".concat(S,"_option")]||"except"===n["".concat(S,"_option")];L&&G.push("has-divider"),R&&G.push("enabled");var H={muplugins:(0,a.__)("Select any must-use plugins to be included in the migration.","wp-migrate-db"),others:(0,a.__)("Select any other files and folders found in the <code>wp-content</code> directory to be included in the migration.","wp-migrate-db"),core:(0,a.__)("Including WordPress core files ensures that the exported archive contains the exact version of WordPress installed on this site, which is helpful when replicating the site in a new environment. ","wp-migrate-db"),root:(0,a.__)("Select any files and folders from your site's root directory to be included in the migration.","wp-migrate-db")},V=(0,x.Ri)(j,c,u,p);return i.createElement(d.A,{title:k,className:G.join(" "),panelName:j,disabled:A,writable:V,enabled:R,forceDivider:L,callback:t=>(0,E.Qi)(t,j,z,R,A,e.addOpenPanel,e.removeOpenPanel,(()=>N((0,s.m6)(j)))),toggle:(0,s.m6)(j),hasInput:!0,bodyClass:"tpf-panel-body",panelSummary:i.createElement(h,(0,o.A)({},e,{disabled:A,items:T(),selected:B,title:k,type:j,summary:F[n["".concat(S,"_option")]]}))},i.createElement("div",null,["others","muplugins","core","root"].includes(S)&&i.createElement("p",{className:"panel-instructions"},(0,m.Ay)(H[S]),"core"===S&&i.createElement(O.A,{link:"https://deliciousbrains.com/wp-migrate-db-pro/doc/full-site-exports/",content:(0,a.__)("Learn When to Include Core Files","wp-migrate-db"),utmContent:"wordpress-core-files-panel",utmCampaign:"wp-migrate-documentation",anchorLink:"wordpress-core-files"})),["themes","plugins"].includes(S)&&i.createElement(b.A,{ariaLabel:(0,a.nv)((0,a.__)("%s options","wp-migrate-db"),S),optionChoices:F,intent:"push",type:S,value:n["".concat(S,"_option")],updateOption:s.ZR}),"core"!==S&&i.createElement(w.A,{id:"".concat(S,"-multiselect"),options:T(),extraLabels:"",stateManager:t=>{"except"===n["".concat(S,"_option")]&&e.updateExcluded(t,S),e.updateSelected(t,S)},selected:B,visible:!0,disabled:!J,updateSelected:t=>{var l=t.map((e=>e.path));"except"===n["".concat(S,"_option")]?e.updateExcluded(l,S):e.updateSelected(l,S)},selectInverse:()=>"except"===n["".concat(S,"_option")]?(0,f.A)(e.updateExcluded,C,B,S):(0,f.A)(e.updateSelected,C,B,S),showOptions:J,type:S,themePluginOption:n["".concat(S,"_option")]})),!["core","root"].includes(S)&&i.createElement("div",{className:"excludes-wrap excludes-wrap-full"},i.createElement(g.A,(0,o.A)({},e,{excludes:n["".concat(S,"_excludes")],excludesUpdater:e.updateExcludes,type:S}))),"root"===S&&i.createElement(I,null),D&&"selected"===n["".concat(S,"_option")]&&i.createElement(y.A,{type:"danger"},(0,a.nv)((0,a.__)("Please select at least one %s for migration","wp-migrate-db"),{themes:"theme",plugins:"plugin",muplugins:"must-use plugin",others:"file or directory",core:"file or directory",root:"file or directory"}[S])),D&&"except"===n["".concat(S,"_option")]&&i.createElement(y.A,{type:"danger"},(0,a.nv)((0,a.__)("Please select at least one %s to exclude from migration","wp-migrate-db"),"themes"===S?"theme":"plugin")))};var R=n(1581),z=(n(6618),n(4642)),B=n(583);function D(e,t){var n={};return["themes","plugins","muplugins","others","core","root"].forEach(((i,a)=>{var r="pull"===t?e.remote_site.site_details[i]:e.local_site.site_details[i],s="pull"===t||"savefile"===t?e.local_site.site_details[i]:e.remote_site.site_details[i],o=r,c=[],p=e=>{if(s){var t=s[e];if(t&&t[0].hasOwnProperty("version"))return t[0].version}return null};for(var m in o){var d=o[m];if(d){var u={name:d[0].name,path:d[0].path};["plugins","themes"].includes(i)&&"savefile"!==t&&(u=(0,l.A)((0,l.A)({},u),{},{active:d[0].active,sourceVersion:d[0].version,destinationVersion:p(m)})),c.push(u)}}return n[i]=c})),n}var G=e=>{var t=D(e,e.current_migration.intent).themes;return U(e,{title:(0,a.__)("Themes","wp-migrate-db"),type:"themes",panel_name:"theme_files",items:t})},J=e=>{var t=D(e,e.current_migration.intent).plugins;return U(e,{title:(0,a.__)("Plugins","wp-migrate-db"),type:"plugins",panel_name:"plugin_files",items:t})},H=e=>{var t=D(e,e.current_migration.intent).muplugins;return 0===t.length?null:U(e,{title:(0,a.__)("Must-Use Plugins","wp-migrate-db"),type:"muplugins",panel_name:"muplugin_files",items:t})},V=e=>{var t=D(e,e.current_migration.intent).others;return 0===t.length?null:U(e,{title:(0,a.__)("Other Files","wp-migrate-db"),type:"others",panel_name:"other_files",items:t})},Q=e=>{var t=e.current_migration.intent,n=D(e,t).core;return"savefile"!==t||0===n.length?null:U(e,{title:(0,a.__)("WordPress Core Files","wp-migrate-db"),type:"core",panel_name:"core_files",items:n})},Y=e=>{var t=D(e,e.current_migration.intent).root;return 0===t.length?null:U(e,{title:(0,a.__)("Root Files","wp-migrate-db"),type:"root",panel_name:"root_files",items:t})};const q=(0,r.Ng)((e=>{var t=(0,R.jG)("current_migration",e),n=(0,R.jG)("local_site",e),l=(0,R.jG)("remote_site",e),i=(0,z.o)("panelsOpen",e),a=(0,R.ud)("stages",e),r=(0,R.w1)("status",e);return{theme_plugin_files:e.theme_plugin_files,current_migration:t,local_site:n,remote_site:l,panelsOpen:i,stages:a,status:r}}),{toggleThemePluginFiles:s.m6,updateTPFOption:s.ZR,updateSelected:s.JE,updateExcluded:s.mf,togglePanelsOpen:B.SZ,addOpenPanel:B._t,removeOpenPanel:B.Tz,updateExcludes:s.tl})((e=>i.createElement("div",{className:"theme-plugin-files"},i.createElement(G,e),i.createElement(J,e),i.createElement(H,e),i.createElement(V,e),i.createElement(Q,e),i.createElement(Y,e))))}}]);
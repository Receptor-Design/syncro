"use strict";(self.webpackJSONPwpmdb=self.webpackJSONPwpmdb||[]).push([[923],{1923:(e,t,i)=>{i.r(t),i.d(t,{MSBlurb:()=>K,MSContent:()=>W,default:()=>$});var a=i(7253),s=i(9255),l=i(6508),n=i.n(l),r=i(7081),o=i(3963),c=i(6484),u=i(6500),p=i(9496),m=i(4808),d=i(6987),b=i(7363);const h=e=>{var t=e.action,i=e.subsites,a=e.value,l=e.type,n="wpmdb-".concat(l,"-multisite-selector"),o=(0,r.wA)();return s.createElement("div",null,s.createElement("select",{onChange:e=>{if("0"!==e.target.value){o({type:t,payload:e.target.value});var a=(0,b.QT)(e.target.value,i);if(!a.subsiteName)return!1;o((0,m.Cr)({selectedSubsite:a.subsiteName,selectedSubsiteID:e.target.value,type:l}))}},value:a,id:n,"aria-label":"".concat(l," multisite")},s.createElement("option",{value:"0"},"-- ",(0,c.__)("Select a subsite","wp-migrate-db")," --"),Object.keys(i).map(((e,t)=>s.createElement("option",{value:e,key:t},Object.values(i)[t])))))};var _=i(1175);const w=e=>{var t=(0,r.d4)((e=>e.migrations)),i=(0,r.d4)((e=>e.multisite_tools)),a=t.current_migration.intent,l=(0,r.wA)(),n=e.newPrefix;return"savefile"===a&&(n=s.createElement(s.Fragment,null,s.createElement("input",{type:"text",className:"new-prefix-input",value:i.new_prefix,onChange:e=>{var t=e.target.value;l({type:d.wE,payload:t})}}))),s.createElement("div",{className:"new-prefix".concat("savefile"===a?" has-form":"")},s.createElement("span",null,(0,c.__)("Exported table prefix: ")),n)};var g=i(8346),v=i.n(g),f=i(4829);const E=e=>{var t=(e=>{var t=[],i=v()(e,{name:"MST_NO_SUBSITE"}),a=v()(e,{name:"MST_NO_DESTINATION"}),l=v()(e,{name:"MST_EMPTY_PREFIX"}),n=v()(e,{name:"MST_INVALID_PREFIX"});return(l||n)&&t.push(s.createElement("p",null,(0,c.__)("Please enter a valid prefix. Letters, numbers and underscores (_) are allowed.","wp-migrate-db"))),i&&t.push(s.createElement("p",null,(0,c.__)("Please select a subsite.","wp-migrate-db"))),a&&t.push(s.createElement("p",null,(0,c.__)("Please select a destination subsite.","wp-migrate-db"))),t})(e.status);return 0===t.length?null:s.createElement(f.A,{type:"danger",className:"mst-errors"},t.map(((e,t)=>s.createElement(s.Fragment,{key:t},e))))};const k=e=>{var t=e.hasTablePrefix,i=(0,r.d4)((e=>e.migrations)),a=(0,r.d4)((e=>e.multisite_tools)),l=i.current_migration,n=l.status,o=l.twoMultisites,c=(0,b.Gg)(i),u=c.sourceSite,p=c.destinationSite,m=o?"subsite-to-subsite":"subsite-to-single",g="false"===u.site_details.is_multisite?p:u;return s.createElement("div",{className:"subsites-row ".concat(m)},s.createElement("div",{className:"subsites-selects"},s.createElement(h,{type:"source",subsites:g.site_details.subsites,action:d._f,value:a.selected_subsite}),o&&s.createElement(s.Fragment,null,s.createElement("div",{className:"subsite-arrow"},s.createElement(_.h,null)),s.createElement(h,{type:"destination",subsites:p.site_details.subsites,action:d.FS,value:a.destination_subsite}))),t&&s.createElement(w,null),s.createElement(E,{status:n}))};var y=(0,c.nv)((0,c.__)('This option requires manually <a href="%s" target="_blank" rel="noreferrer noopener">updating the destination\'s wp-config.php</a> to work as a multisite install.',"wp-migrate-db"),"https://deliciousbrains.com/wp-migrate-db-pro/doc/multisite-tools-addon/#replace-single-site-multisite"),M=(0,c.nv)((0,c.__)('This option requires manually <a href="%s" target="_blank" rel="noreferrer noopener">updating the destination\'s wp-config.php</a> to work as a single site.',"wp-migrate-db"),"https://deliciousbrains.com/wp-migrate-db-pro/doc/multisite-tools-addon/#replace-multisite-single-site"),N={subSub:{push:{1:{description:(0,c.__)("Push network to network"),postDescription:(0,c.__)("Replaces the entire multisite network with the other network","wp-migrate-db"),value:!1},2:{description:(0,c.__)("Push subsite to subsite"),postDescription:(0,c.__)("Replaces the subsite of one multisite network with the subsite of the other network","wp-migrate-db"),value:!0}},pull:{1:{description:(0,c.__)("Pull network to network"),postDescription:(0,c.__)("Replaces the entire multisite network with the other network","wp-migrate-db"),value:!1},2:{description:(0,c.__)("Pull subsite to subsite","wp-migrate-db"),postDescription:(0,c.__)("Replaces the subsite of one multisite network with the subsite of the other network","wp-migrate-db"),value:!0}}},subSingle:{push:{1:{description:(0,c.__)("Push subsite to single site","wp-migrate-db"),postDescription:(0,c.__)("Replaces the single site with the selected subsite of the multisite network","wp-migrate-db"),value:!0},2:{description:(0,c.__)("Push network and replace single site","wp-migrate-db"),postDescription:(0,c.__)("Replaces the single site with the entire multisite network","wp-migrate-db"),value:!1,warning:y}},pull:{1:{description:(0,c.__)("Pull subsite to single site","wp-migrate-db"),postDescription:(0,c.__)("Replaces the single site with the selected subsite of the multisite network","wp-migrate-db"),value:!0},2:{description:(0,c.__)("Pull network and replace single site","wp-migrate-db"),postDescription:(0,c.__)("Replaces the single site with the entire multisite network","wp-migrate-db"),value:!1,warning:y}}},singleSub:{push:{1:{description:(0,c.__)("Push single site to subsite","wp-migrate-db"),postDescription:(0,c.__)("Replaces the selected subsite of the multisite network with the single site","wp-migrate-db"),value:!0},2:{description:(0,c.__)("Push single site and replace network","wp-migrate-db"),postDescription:(0,c.__)("Replaces the entire multisite network with the single site","wp-migrate-db"),value:!1,warning:M}},pull:{1:{description:(0,c.__)("Pull single site to subsite","wp-migrate-db"),postDescription:(0,c.__)("Replaces the selected subsite of the multisite network with the single site","wp-migrate-db"),value:!0},2:{description:(0,c.__)("Pull single site and replace network","wp-migrate-db"),postDescription:(0,c.__)("Replaces the entire multisite network with the single site","wp-migrate-db"),value:!1,warning:M}}},savefile:{savefile:{1:{description:(0,c.__)("Export network","wp-migrate-db"),postDescription:(0,c.__)("Export the entire multisite network","wp-migrate-db"),value:!1},2:{description:(0,c.__)("Export subsite","wp-migrate-db"),postDescription:(0,c.__)("Export a subsite of the multisite network","wp-migrate-db"),value:!0}}},find_replace:{find_replace:{1:{description:(0,c.__)("Find & Replace across network","wp-migrate-db"),postDescription:(0,c.__)("Run Find & Replace across the entire multisite network","wp-migrate-db"),value:!1},2:{description:(0,c.__)("Find & Replace within subsite","wp-migrate-db"),postDescription:(0,c.__)("Run Find & Replace within the subsite of the multisite network","wp-migrate-db"),value:!0}}}},S=e=>{var t=e.selected,i=e.labelledby;return s.createElement("div",null,s.createElement("input",{readOnly:!0,className:"option-radio",type:"radio",name:"multisite-option",checked:t,"aria-labelledby":i}))},R=e=>{var t=e.description,i=e.currentOption,a=e.intent,l=e.optionName,n=e.postDescription,c=e.warning,u=e.className,p=(0,r.wA)(),d="multisite-".concat(l),b="savefile"===a&&l,h=l===i;return s.createElement("div",{onClick:()=>{(e=>{if(i===e)return null;p((0,m.vQ)())})(l)},className:"option ".concat(u||"")},s.createElement(S,{labelledby:d,selected:h}),s.createElement("div",null,s.createElement("div",{id:d,className:"label"},t),s.createElement("div",{className:"option-description"},n)),l&&h&&s.createElement(k,{hasTablePrefix:b}),c&&h&&s.createElement("div",{className:"migration-warning"},s.createElement(f.A,{type:"warning"},(0,o.Ay)(c))))};const L=e=>{var t=e.enabled,i=e.intent,a=e.migrationType;return s.createElement("fieldset",{className:"boxed-options"},Object.entries(N[a][i]).map((e=>{var a=(0,p.A)(e,2),l=a[0],n=a[1];return s.createElement(R,{key:"multisite-option-".concat(l),description:n.description,currentOption:t,intent:i,optionName:n.value,postDescription:n.postDescription,warning:n.warning,className:"multisite-selection"})})))};var O,P,D,x,T,Z;function A(){return A=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var a in i)({}).hasOwnProperty.call(i,a)&&(e[a]=i[a])}return e},A.apply(null,arguments)}const F=e=>s.createElement("svg",A({width:25,height:21,viewBox:"0 0 25 21",fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),O||(O=s.createElement("path",{d:"m1.24 14.308 4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.036-.095c0-.01.006-.016.01-.02a.756.756 0 0 0-.112-1.06L7.103 9.39a1.755 1.755 0 0 0-2.206 0L.28 13.125a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13Z",fill:"#666",fillOpacity:.3})),P||(P=s.createElement("path",{d:"M11.264 20.006v-3.495a1.106 1.106 0 0 0-.379-.794L6.65 12.22a1.005 1.005 0 0 0-1.275 0l-4.236 3.496c-.235.2-.368.484-.378.789V20H.755c-.01.545.439.989.995.999h2.746a.5.5 0 0 0 .495-.5v-2.746a.493.493 0 0 1 .495-.5h.995c.276 0 .5.225.495.5v2.747a.5.5 0 0 0 .495.499h2.746c.556-.01 1.052-.45 1.047-.994Z",fill:"#666",fillOpacity:.3})),D||(D=s.createElement("path",{d:"m14.24 14.308 4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.037-.095c0-.01.005-.016.01-.02a.756.756 0 0 0-.113-1.06l-4.618-3.74a1.755 1.755 0 0 0-2.206 0l-4.617 3.735a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13Z",fill:"#666"})),x||(x=s.createElement("path",{d:"M24.264 20.006v-3.495a1.106 1.106 0 0 0-.379-.794L19.65 12.22a1.005 1.005 0 0 0-1.276 0l-4.235 3.496c-.235.2-.368.484-.378.789V20a.993.993 0 0 0 .99.999h2.746a.5.5 0 0 0 .495-.5v-2.746a.493.493 0 0 1 .495-.5h.995c.276 0 .5.225.495.5v2.747a.5.5 0 0 0 .495.499h2.746c.556-.01 1.052-.45 1.047-.994Z",fill:"#666"})),T||(T=s.createElement("path",{d:"m7.74 5.308 4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.037-.096c0-.01.005-.014.01-.02a.756.756 0 0 0-.113-1.058L13.603.39a1.755 1.755 0 0 0-2.206 0L6.78 4.125a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13l-.026-.02.026.02Z",fill:"#666",fillOpacity:.3})),Z||(Z=s.createElement("path",{fillRule:"evenodd",clipRule:"evenodd",d:"M17.375 6.717c.223.193.36.47.377.765h.002V7.51h-.002a1.106 1.106 0 0 1-.377.765L13.14 11.77a1.005 1.005 0 0 1-1.275 0L7.628 8.276a1.075 1.075 0 0 1-.377-.77H7.25v-.02c.016-.297.148-.574.378-.77l4.236-3.495a1.005 1.005 0 0 1 1.275 0l4.236 3.496ZM12 7a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-2A.5.5 0 0 0 13 7h-1Z",fill:"#666",fillOpacity:.3})));i.p;var I,j;function U(){return U=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var a in i)({}).hasOwnProperty.call(i,a)&&(e[a]=i[a])}return e},U.apply(null,arguments)}const V=e=>s.createElement("svg",U({width:14,height:21,viewBox:"0 0 14 21",fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),I||(I=s.createElement("path",{d:"M1.446 9.193 6.834 4.83a.284.284 0 0 1 .363 0l5.388 4.36a.872.872 0 0 0 1.209-.111c0-.012.006-.018.012-.024a.881.881 0 0 0-.131-1.235L8.286 3.454a2.048 2.048 0 0 0-2.572 0L.327 7.813a.869.869 0 0 0-.131 1.23.933.933 0 0 0 1.25.15Z",fill:"#666"})),j||(j=s.createElement("path",{d:"M13.14 15.84v-4.078a1.29 1.29 0 0 0-.44-.926L7.758 6.758a1.172 1.172 0 0 0-1.489 0l-4.942 4.078a1.255 1.255 0 0 0-.44.92v4.079c-.012.635.506 1.153 1.155 1.165h3.203a.583.583 0 0 0 .578-.583v-3.204a.575.575 0 0 1 .577-.582h1.161c.322 0 .584.262.578.582v3.204a.583.583 0 0 0 .577.583h3.204c.649-.012 1.227-.524 1.22-1.16Z",fill:"#666"})));i.p;var B,C,H,Q;function q(){return q=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var a in i)({}).hasOwnProperty.call(i,a)&&(e[a]=i[a])}return e},q.apply(null,arguments)}const G=e=>s.createElement("svg",q({width:25,height:21,viewBox:"0 0 25 21",fill:"none",xmlns:"http://www.w3.org/2000/svg"},e),B||(B=s.createElement("path",{d:"m1.24 14.308 4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.036-.095c0-.01.006-.016.01-.02a.756.756 0 0 0-.112-1.06L7.103 9.39a1.755 1.755 0 0 0-2.206 0L.28 13.125a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13Z",fill:"#666"})),C||(C=s.createElement("path",{d:"M11.264 20.006v-3.495a1.106 1.106 0 0 0-.379-.794L6.65 12.22a1.005 1.005 0 0 0-1.275 0l-4.236 3.496c-.235.2-.368.484-.378.789V20H.755c-.01.545.439.989.995.999h2.746a.5.5 0 0 0 .495-.5v-2.746a.493.493 0 0 1 .495-.5h.995c.276 0 .5.225.495.5v2.747a.5.5 0 0 0 .495.499h2.746c.556-.01 1.052-.45 1.047-.994ZM14.24 14.308l4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.037-.095c0-.01.005-.016.01-.02a.756.756 0 0 0-.113-1.06l-4.618-3.74a1.755 1.755 0 0 0-2.206 0l-4.617 3.735a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13Z",fill:"#666"})),H||(H=s.createElement("path",{d:"M24.264 20.006v-3.495a1.106 1.106 0 0 0-.379-.794L19.65 12.22a1.005 1.005 0 0 0-1.276 0l-4.235 3.496c-.235.2-.368.484-.378.789V20a.993.993 0 0 0 .99.999h2.746a.5.5 0 0 0 .495-.5v-2.746a.493.493 0 0 1 .495-.5h.995c.276 0 .5.225.495.5v2.747a.5.5 0 0 0 .495.499h2.746c.556-.01 1.052-.45 1.047-.994ZM7.74 5.308l4.618-3.74a.244.244 0 0 1 .311 0l4.618 3.737a.748.748 0 0 0 1.037-.096c0-.01.005-.014.01-.02a.756.756 0 0 0-.113-1.058L13.603.39a1.755 1.755 0 0 0-2.206 0L6.78 4.125a.745.745 0 0 0-.112 1.054.8.8 0 0 0 1.072.13l-.026-.02.026.02Z",fill:"#666"})),Q||(Q=s.createElement("path",{fillRule:"evenodd",clipRule:"evenodd",d:"M17.375 6.717c.223.193.36.47.377.765h.002V7.51h-.002a1.106 1.106 0 0 1-.377.765L13.14 11.77a1.005 1.005 0 0 1-1.275 0L7.628 8.276a1.075 1.075 0 0 1-.377-.77H7.25v-.02c.016-.297.148-.574.378-.77l4.236-3.495a1.005 1.005 0 0 1 1.275 0l4.236 3.496ZM12 7a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-2A.5.5 0 0 0 13 7h-1Z",fill:"#666"})));i.p;const J=e=>{var t=e.isMultisite,i=e.enabled;return"false"===t?s.createElement(V,{"aria-label":(0,c.__)("Single site","wp-migrate-db")}):i?s.createElement(F,{"aria-label":(0,c.__)("Subsite","wp-migrate-db")}):s.createElement(G,{"aria-label":(0,c.__)("Multisite","wp-migrate-db")})};const X=()=>{var e=(0,r.d4)((e=>e)),t=e.multisite_tools,i=e.migrations,a=e.panels.panelsOpen,l=i.current_migration,o=(0,b.Gg)(i),c=o.sourceSite,u=o.destinationSite,p=l.intent,m=l.twoMultisites;if(n()(a,"multisite_tools"))return null;if(!n()(["push","pull"],p)){var d=t.enabled?(0,b.tM)(t.selected_subsite,c):c.url;return s.createElement("div",{className:"mst-site-summary"},s.createElement(J,{isMultisite:c.is_multisite,enabled:t.enabled}),s.createElement("span",{className:"source-site"},d))}var h=c.url,w=u.url;if(t.enabled){var g="false"===c.site_details.is_multisite?t.destination_subsite:t.selected_subsite,v=m||"true"!==u.site_details.is_multisite?t.destination_subsite:t.selected_subsite;h=(0,b.tM)(g,c),w=(0,b.tM)(v,u)}return s.createElement("div",{className:"mst-site-summary"},s.createElement(J,{isMultisite:c.site_details.is_multisite,enabled:t.enabled}),s.createElement("span",{className:"source-site"},h),s.createElement(_.h,{"aria-label":"migrating to"}),s.createElement(J,{isMultisite:u.site_details.is_multisite,enabled:t.enabled}),s.createElement("span",{className:"destination-site"},w))};i(8337);var Y=i(1409),z=["localURL","remoteURL","localIsMultisite","localSource","twoMultisites","migrationType"],K=e=>{var t=e.localURL,i=e.remoteURL,l=(e.localIsMultisite,e.localSource),n=(e.twoMultisites,e.migrationType),r=(0,a.A)(e,z),u="";switch(n){case"subSub":u=(0,c.__)("The source <b>(%s)</b> and destination <b>(%s)</b> are both multisite installs.","wp-migrate-db");break;case"singleSub":u=(0,c.__)("The source <b>(%s)</b> is a single-site install, but the destination <b>(%s)</b> is a multisite install.","wp-migrate-db");break;case"subSingle":u=(0,c.__)("The source <b>(%s)</b> is a multisite install, but the destination <b>(%s)</b> is a single-site install.","wp-migrate-db")}var p=l?t:i,m=l?i:t,d=(0,c.nv)(u,(0,Y.DQ)(p),(0,Y.DQ)(m));return s.createElement("p",{className:r.className},(0,o.Ay)(d))},W=()=>{var e=(0,r.d4)((e=>e.migrations)),t=(0,r.d4)((e=>e.multisite_tools)),i=e.current_migration,a=e.local_site,l=e.remote_site,o=i.intent,c=i.twoMultisites,u=i.localSource,p=()=>{var e=u?a:l;return n()(["push","pull"],o)?c?"subSub":"true"===e.site_details.is_multisite?"subSingle":"singleSub":o};return s.createElement(s.Fragment,null,["push","pull"].includes(o)&&s.createElement(K,{localURL:a.this_url,remoteURL:l.site_details.home_url,localIsMultisite:"true"===a.is_multisite,twoMultisites:c,localSource:u,migrationType:p(),className:"mst-blurb"}),s.createElement(L,{enabled:t.enabled,intent:o,migrationType:p()}))};const $=()=>{var e=!1,t=!1;return(0,r.d4)((e=>e.panels.panelsOpen)).includes("multisite_tools")||(t=!0),s.createElement(u.A,{title:(0,c.__)("Multisite","wp-migrate-db"),className:"mst",forceDivider:t,panelName:"multisite_tools",disabled:e,panelSummary:s.createElement(X,{disabled:e})},s.createElement(W,null))}}}]);
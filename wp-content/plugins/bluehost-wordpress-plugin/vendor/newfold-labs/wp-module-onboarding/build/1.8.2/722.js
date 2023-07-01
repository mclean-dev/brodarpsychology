"use strict";(globalThis.webpackChunknewfold_Onboarding=globalThis.webpackChunknewfold_Onboarding||[]).push([[722],{1211:(e,t,a)=>{a.d(t,{Z:()=>u});var n=a(9307),o=a(9250),r=a(9818),s=a(6831);const l=e=>{let{text:t,handleClick:a,disabled:o,className:r}=e;return(0,n.createElement)("button",{type:"button",className:`${r} nfd-card-button`,onClick:()=>{a()},disabled:o},t)};var i=a(7533),d=a(2200);const u=e=>{let{text:t,disabled:a}=e;const u=(0,o.s0)(),c=(0,o.TH)(),{nextStep:m,currentData:p}=(0,r.useSelect)((e=>({nextStep:e(s.h).getNextStep(),currentData:e(s.h).getCurrentOnboardingData()})),[c.path]),b=null===m||!1===m;return(0,n.createElement)(l,{className:"nfd-nav-card-button",text:t,handleClick:()=>b?async function(){p&&(p.isComplete=(new Date).getTime(),(0,i.kB)(p));const e="ecommerce"===window.nfdOnboarding.currentFlow?d.br:d.hF;window.location.replace(e)}():u(m.path),disabled:a})}},9519:(e,t,a)=>{a.d(t,{Z:()=>o});var n=a(9307);const o=(0,n.memo)((e=>{let{heading:t,subHeading:a,question:o}=e;return(0,n.createElement)("div",null,t&&(0,n.createElement)("h2",{className:"nfd-step-card-heading"},t),a&&(0,n.createElement)("h3",{className:o?"nfd-step-card-subheading-other":"nfd-step-card-subheading"},a),o&&(0,n.createElement)("h3",{className:"nfd-step-card-question"},o))}))},4401:(e,t,a)=>{a.d(t,{V:()=>l});var n=a(9307),o=a(5634),r=a(4316),s=a(950);const l=e=>{let{title:t,subtitle:a,error:l}=e;return(0,n.createElement)(o.Z,{className:"step-error-state",isVerticallyCentered:!0},(0,n.createElement)(r.Z,{title:t,subtitle:a}),(0,n.createElement)("div",{className:"step-error-state__logo"}),(0,n.createElement)("h3",{className:"step-error-state__error"},l),(0,n.createElement)(s.Z,null))}},9291:(e,t,a)=>{a.d(t,{L:()=>s,Y:()=>n.Z});var n=a(35),o=a(9307),r=a(682);const s=()=>(0,o.createElement)("div",{className:"image-upload-loader--loading-box"},(0,o.createElement)(r.Z,{type:"load",className:"image-upload-loader--loading-box__loader"}))},349:(e,t,a)=>{a.d(t,{Z:()=>s});var n=a(9307),o=(a(5736),a(4184)),r=a.n(o);const s=e=>{let{className:t="",children:a}=e;return(0,n.createElement)("div",{className:r()("nfd-onboarding-large-card",t)},a)}},1340:(e,t,a)=>{a.d(t,{U:()=>p,g:()=>w});var n=a(9307),o=a(9818),r=a(4333),s=a(5736),l=a(9291),i=a(6831),d=a(7625),u=a(2200),c=a(4401);var m=a(1589);const p=e=>{let{children:t,navigationStateCallback:a=!1}=e;const p=(0,r.useViewportMatch)("medium"),{storedThemeStatus:b,brandName:g}=(0,o.useSelect)((e=>({storedThemeStatus:e(i.h).getThemeStatus(),brandName:e(i.h).getNewfoldBrandName()})),[]),h=(e=>({loader:{title:(0,s.sprintf)(
/* translators: %s: Brand */
(0,s.__)("Preparing your %s design studio","wp-module-onboarding"),e),subtitle:(0,s.__)("Hang tight while we show you some of the best WordPress has to offer!","wp-module-onboarding")},errorState:{title:(0,s.sprintf)(
/* translators: %s: Brand */
(0,s.__)("Preparing your %s design studio","wp-module-onboarding"),e),subtitle:(0,s.__)("Hang tight while we show you some of the best WordPress has to offer!","wp-module-onboarding"),error:(0,s.__)("Uh-oh, something went wrong. Please contact support.","wp-module-onboarding")}}))(g),{updateThemeStatus:w,setIsDrawerOpened:v,setIsDrawerSuppressed:_,setIsHeaderNavigationEnabled:f}=(0,o.useDispatch)(i.h),y=async()=>{const e=await(0,d.YL)(u.DY);return null!=e&&e.error?u.vv:e.body.status},E=()=>{switch(b){case u.Rq:case u.GV:return(()=>{if("function"==typeof a)return a();p&&v(!0),_(!1),f(!0)})();default:v(!1),_(!0),f(!1)}};(0,n.useEffect)((()=>{E(),b===u.a0&&(async()=>{const e=await y();switch(e){case u.Zh:setTimeout((async()=>{if(await y()!==u.GV)return w(u.vv);window.location.reload()}),u.YU);break;case u.GV:window.location.reload();break;default:w(e)}})()}),[b]);const S=async()=>(w(u.Zh),(await(0,d.N9)(u.DY,!0,!1)).error?w(u.Rq):window.location.reload());return(0,n.createElement)(n.Fragment,null,(()=>{switch(b){case u.vv:return(0,n.createElement)(m.Z,{showButton:!1,isModalOpen:!0,modalTitle:(0,s.__)("It looks like you may have an existing website","wp-module-onboarding"),modalText:(0,s.__)("Going through this setup will change your active theme, WordPress settings, add content – would you like to continue?","wp-module-onboarding"),modalOnClose:S,modalExitButtonText:(0,s.__)("Exit to WordPress","wp-module-onboarding")});case u.Rq:return(0,n.createElement)(c.V,{title:h.errorState.title,subtitle:h.errorState.subtitle,error:h.errorState.error});case u.GV:return t;default:return(0,n.createElement)(l.Y,{title:h.loader.title,subtitle:h.loader.subtitle})}})())};var b=a(3421),g=a(1392);var h=a(9884);const w=e=>{let{children:t,navigationStateCallback:a=!1}=e;const l=(0,r.useViewportMatch)("medium"),{storedPluginsStatus:d,brandName:m}=(0,o.useSelect)((e=>({storedPluginsStatus:e(i.h).getPluginsStatus(),brandName:e(i.h).getNewfoldBrandName()})),[]),p=(e=>({errorState:{title:(0,s.sprintf)(
/* translators: 1: Brand 2: Site */
(0,s.__)("Making the keys to your %1$s Online %2$s","wp-module-onboarding"),e,(0,g.I)("Site")),subtitle:(0,s.__)("We’re installing WooCommerce for you to fill with your amazing products & services!","wp-module-onboarding"),error:(0,s.__)("Uh-oh, something went wrong. Please contact support.","wp-module-onboarding")}}))(m),w=d[u.Gv],{updatePluginsStatus:v,setIsDrawerOpened:_,setIsDrawerSuppressed:f,setIsHeaderNavigationEnabled:y}=(0,o.useDispatch)(i.h),E=async()=>{const e=await(0,b.qC)(u.Gv);return null!=e&&e.error?u.sG:e.body.status},S=e=>{switch(e){case u.sG:case u.ye:return(()=>{if("function"==typeof a)return a();l&&_(!0),f(!1),y(!0)})();default:_(!1),f(!0),y(!1)}};(0,n.useEffect)((()=>{S(w)}),[d]);return(0,n.useEffect)((()=>{d[u.Gv]===u.Ck&&(async e=>{const t=await E();switch(t){case u.Sr:setTimeout((async()=>{await E()!==u.ye&&(d[u.Gv]=u.sG,v(d)),window.location.reload()}),u.sr);break;case u.ye:window.location.reload();break;default:e[u.Gv]=t,v(e)}})(d)}),[d]),(0,n.createElement)(n.Fragment,null,(()=>{switch(w){case u.sG:return(0,n.createElement)(c.V,{title:p.errorState.title,subtitle:p.errorState.subtitle,error:p.errorState.error});case u.ye:return t;default:return(0,n.createElement)(h.Z,null)}})())}},2722:(e,t,a)=>{a.r(t),a.d(t,{default:()=>g});var n=a(9307),o=a(5609),r=a(9818),s=a(2200),l=a(1211),i=a(9519),d=a(5634),u=a(950),c=a(349),m=a(1340),p=a(6831),b=a(5736);const g=()=>{const{setDrawerActiveView:e,setSidebarActiveView:t,setCurrentOnboardingData:a}=(0,r.useDispatch)(p.h),g=(0,r.useSelect)((e=>e(p.h).getCurrentOnboardingData())),h=g.storeDetails.productInfo;(0,n.useEffect)((()=>{t(s.Jq),e(s.dv)}),[]);const w={heading:(0,b.__)("Tell us about your products","wp-module-onboarding"),subheading:(0,b.__)("What type of products will you be selling?","wp-module-onboarding"),question:(0,b.__)("How many products will you be selling?","wp-module-onboarding"),typeOptions:[{content:(0,b.__)("Physical products","wp-module-onboarding"),value:"physical"},{content:(0,b.__)("Digital / Downloadable products","wp-module-onboarding"),value:"downloads"},{content:(0,b.__)("Subscriptions","wp-module-onboarding"),value:"subscriptions"},{content:(0,b.__)("Book rooms, houses or rent products","wp-module-onboarding"),value:"bookings"},{content:(0,b.__)("Membership","wp-module-onboarding"),value:"memberships"},{content:(0,b.__)("Customizable products","wp-module-onboarding"),value:"product-add-ons"},{content:(0,b.__)("Bundles of products","wp-module-onboarding"),value:"product-bundles"},{content:(0,b.__)("Let your users ask a quote for your products","wp-module-onboarding"),value:"product-quotes"}],numberOptions:[{content:"0",value:"0"},{content:"1 - 10",value:"1-10"},{content:"11 - 100",value:"11-100"},{content:"101 - 1000",value:"101-1000"},{content:"1000 +",value:"1000+"}],buttonText:(0,b.__)("Continue Setup","wp-module-onboarding")};return(0,n.createElement)(m.g,null,(0,n.createElement)(d.Z,{isBgPrimary:!0,isCentered:!0},(0,n.createElement)(c.Z,{className:"ecommerce-step"},(0,n.createElement)("div",{className:"nfd-onboarding-experience-step onboarding-product-step onboarding-ecommerce-step"},(0,n.createElement)("div",{className:"nfd-card-heading center"},(0,n.createElement)(i.Z,{heading:w.heading,subHeading:w.subheading})),(0,n.createElement)("div",{className:"nfd-product-step-options"},w.typeOptions.map((e=>(0,n.createElement)(o.CheckboxControl,{key:e.value,checked:h.product_types.includes(e.value),label:e.content,onChange:t=>{return n=e.value,o=t,a({...g,storeDetails:{...g.storeDetails,productInfo:{...h,product_types:o?[...null==h?void 0:h.product_types,n]:null==h?void 0:h.product_types.filter((e=>e!==n))}}});var n,o}})))),(0,n.createElement)("div",{className:"step-product-numbers"},(0,n.createElement)("span",{style:{fontSize:"16px"}},w.question),(0,n.createElement)(o.RadioControl,{className:"components-radio-control__input",selected:null==h?void 0:h.product_count,options:w.numberOptions.map((e=>({label:e.content,value:e.value}))),onChange:e=>a({...g,storeDetails:{...g.storeDetails,productInfo:{...h,product_count:e}}})})),(0,n.createElement)(l.Z,{text:w.buttonText}),(0,n.createElement)(u.Z,null)))))}}}]);
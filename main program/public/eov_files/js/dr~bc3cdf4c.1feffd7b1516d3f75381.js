(window.webpackJsonp_N_E=window.webpackJsonp_N_E||[]).push([[6],{"+Xce":function(e,t,n){"use strict";n.d(t,"a",(function(){return C})),n.d(t,"b",(function(){return k})),n.d(t,"c",(function(){return E}));var a=n("cpVT"),r=n("dhJC"),o=n("9660"),i=n("q8UK"),c=n.n(i),u=n("kiQV"),s=n("z7pX");function d(e){return l.apply(void 0,Object(s.a)(function(e){e=e.split("").reverse().join("");var t=parseInt(6*Math.random()+3,10),n=e.substring(0,t),a=e.substring(t),r=a.substring(0,a.length/2),o=a.substring(a.length/2);return[n,r,o].map((function(e){return function(e){return e.replace(/&/g,"8").replace(/\*/g,"c").replace(/%/g,"a").split("").reverse().join("")}(function(e){return e.replace(/a/g,"%").replace(/c/g,"*").replace(/8/g,"&").split("").reverse().join("")}(e.split("").reverse().join("")))}))}(e)))}function l(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];return t.reverse().join("")}var p=n("9zUi"),f=n("qTDx"),m=function(){var e={"TB-CLIENT-TYPE":u.a.split("-").pop(),"TB-VERSION":"v1.0.1","TB-SITE-ID":d("mPLK3Ic7GzdXXOIquU1QSqs0sjUFhx5U")},t=Object(p.d)();return e["TB-TOKEN"]=t||"",e["TB-UUID"]=Object(f.a)(),e},b=n("2XQ8");var g=n("UWMA"),h=n.n(g),v=n("GJdT"),y=n.n(v);function O(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function w(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?O(Object(n),!0).forEach((function(t){Object(a.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):O(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function I(e){var t="/";return/^https?/.test(e)?e:[Object(o.l)(Object(b.a)()?"":"http://h5.1627yb.com",t),t,Object(o.m)(e,t)].join("")}var j=new h.a(d("2RAjqiBvIh0OuwbN")),T=new y.a(d("NDbTd5RysclL"),d("2RAjqiBvIh0OuwbN"));function C(e){var t,n,a,i=function(e){var t,n;if("string"===typeof e)t=I(e),n={headers:m()};else{var a=e.url,i=Object(r.a)(e,["url"]);if(i.headers instanceof Headers){var c={};i.headers.forEach((function(e,t){return c[t]=e})),i.headers=Object.assign(m(),c)}else i.headers=Object.assign(m(),i.headers);t=I(a),n=w({},i)}return n.headers&&(Object(o.j)(n.body)||/^{/i.test(n.body)||!n.body)&&(n.headers["Content-Type"]="application/json"),w({url:t},n)}(e),u=i.url,s=i.transformResponse,d=void 0===s?function(e){return e.data}:s,l=Object(r.a)(i,["url","transformResponse"]),p=Object(b.a)()?1e4:400,f=!1;"object"===typeof e&&(p=e.timeout||p);var g=new c.a,h=setTimeout((function(){f=!0,g.abort()}),p);if(l.signal=l.signal||g.signal,l.noToast=l.noToast||!1,"POST"===(null===(t=l.method)||void 0===t?void 0:t.toUpperCase())&&"object"===typeof l.headers&&null!==(n=l.headers["Content-Type"])&&void 0!==n&&n.includes("json")&&!l.body&&(l.body="{}"),l.headers=Object.assign(T.getHeaderParams(/^{/i.test(l.body)?JSON.parse(l.body):l.body||{}),l.headers),l.headers&&(l.body||"GET"===(null===(a=l.method)||void 0===a?void 0:a.toUpperCase()))){var v=l.body;l=j.gateway(l),Object(o.j)(v)||"string"===typeof v?l.body=Object(o.j)(l.body)?JSON.stringify(l.body):l.body:l.body=v}return fetch(u,l).then((function(e){if(!e.ok)throw new o.c({status:e.status,message:e.statusText});var t=e.headers.get("content-type");return null!==t&&void 0!==t&&t.includes("application/json")?e.json().then((function(e){return 0===(e=j.decrypt(e)).code?d(e):l&&!l.noToast?Promise.reject(new o.b(e.code,e.msg,e)):void 0})):Promise.resolve(e)})).catch((function(e){return e.name&&e.name.toLowerCase().includes("abort")&&(e=f?new o.c({status:0,message:"timeout"}):new o.a),function(e){"code"in e&&Object(b.a)()&&o.d.trigger("".concat(e.constructor.name,"/code/").concat(e.code),e)}(e),Promise.reject(e)})).finally((function(){clearTimeout(h)}))}function k(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return C(w(w({url:e},t),{},{method:"get"}))}function E(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return C(w(w({url:e},t),{},{method:"post"}))}},0:function(e,t){},10:function(e,t){},11:function(e,t){},12:function(e,t){},13:function(e,t){},"2XQ8":function(e,t,n){"use strict";(function(e){function a(){try{return"location"in window}catch(e){return!1}}n.d(t,"a",(function(){return a})),n.d(t,"b",(function(){return r}));var r=Number(e.env.SITE_ID)>=1e3}).call(this,n("8oxB"))},4:function(e,t){},5:function(e,t){},6:function(e,t){},7:function(e,t){},8:function(e,t){},9:function(e,t){},"9zUi":function(e,t,n){"use strict";n.d(t,"d",(function(){return s})),n.d(t,"c",(function(){return d})),n.d(t,"b",(function(){return l})),n.d(t,"a",(function(){return p}));var a,r=n("9660");var o=n("2XQ8"),i=n("THu5"),c=n("MXR7"),u=Object(o.a)()&&new URLSearchParams(window.location.search).get("token");function s(){return Object(r.h)("X-API-TOKEN",{cookie:null===a||void 0===a?void 0:a.req.headers.cookie})||u}function d(e){Object(i.a)()&&(localStorage.getItem("tokenFromUrl")!==e&&Object(c.d)(),localStorage.setItem("tokenFromUrl",e));Object(r.k)("X-API-TOKEN",e,{path:"/"})}function l(){Object(r.g)("X-API-TOKEN",{path:"/"}),Object(r.g)("cache.id",{path:"/"})}function p(e){["10103","10105","10004","10104","10101","10102"].forEach((function(t){r.d.on("".concat(r.b.name,"/code/").concat(t),e)}))}u&&d(u),function(){var e=Object(r.h)("X-API-UUID",{cookie:null===a||void 0===a?void 0:a.req.headers.cookie})||Object(r.o)();Object(r.k)("X-API-UUID",e,{path:"/"})}(),Object(o.a)()&&p(l)},AtiY:function(e,t,n){"use strict";t.a={loading:"/loading",accessLimit:"/accessLimit",home:"/",demo:"/demo",egame:"/egame/[id]",vipDetails:"/mine/vip/",vipPrivilege:"/mine/vip/privilege",vipFillReceipt:"/mine/vip/fillReceiptInfo",wallet:"/mine/finance/myWallet",deposit:"/mine/finance/myDeposit",depositInformation:"/mine/finance/myDeposit/information",transfer:"/mine/finance/transfer",withdrawal:"/mine/finance/withDraw",download:"/download",rechargeChat:"/mine/finance/rechargeChat",information:"/mine/finance/myDeposit/information",sponsor:"/app/sponsor",bayern:"/sponsor/bayern",gerrard:"/sponsor/gerrard",argentina:"/sponsor/argentina",monaco:"/sponsor/monaco",paris:"/sponsor/paris",agent:"/agent",about:"/app/about",bet:"/app/record/bet",transaciton:"/app/record/transaciton",transacitonDetailPage:"/app/record/transacitonDetail",reward:"/app/record/reward",rewardDetail:"/app/record/rewardDetail",agentPage:"/app/agentPage",agentPageCs:"/app/agentCs",currencyRecord:"/app/record/currencyRecord",registerEmail:"/app/agentPage/registerEmail",bindAgentEmail:"/app/agentPage/bindEmail",mine:"/mine",system:"/mine/system",cards:"/mine/cards",bankDetail:"/mine/cards/bankDetail",addBankCards:"/mine/cards/addBankCards",addVirtualCoin:"/mine/cards/addVirtualCoin",modifyPassword:"/mine/userInfo/password",passwordUpdateSucceed:"/mine/userInfo/password/success",userInfo:"/mine/userInfo",username:"/mine/userInfo/name",bindPhone:"/mine/userInfo/phone",bindEmail:"/mine/userInfo/email",mail:"/mine/mail",feedback:"/mine/feedback",feedList:"/mine/feedback/list",feedDetails:"/mine/feedback/details/",records:"/app/promo/records/[id]",singlePass:"/app/tutorialNew/singlePass",relatedPass:"/app/tutorialNew/relatedPass",sportRules:"/app/tutorialNew/sportRules",bettingIntroduction:"/app/bettingIntroduction",betStrategy:"/app/tutorialNew/betStrategy",hijack:"/app/tutorial/hijack",helpCenter:"/app/helpCenter",withdrawHelp:"/app/helpCenter/withdraw",transferHelp:"/app/newTransferTutorial",depositHelp:"/app/helpCenter/deposit",gamesHelp:"/app/helpCenter/games",tech:"/app/helpCenter/tech",contact:"/app/helpCenter/contact",techDtails:"/app/helpCenter/tech/[id]",gamesHelpDtails:"/app/helpCenter/games/answer",knowExchange:"/app/knowExchange",knowVirtualCurrency:"/app/knowVirtualCurrency",customer:"/customer/main",chat:"/customer/chat",promo:"/app/promo/list",activity:"/activity/redPackRain/[id]",firstDeposit:"/activity/firstDeposit/[id]",penaltyIntoGold:"/app/penaltyIntoGold",racePage:"/activity/racePage/[id]",european:"/activity/european/[id]",europeanRecords:"/activity/european/europeanRecords",europeanSchedule:"/activity/european/europeanSchedule",europeanStars:"/activity/european/europeanStars",europeanWinners:"/activity/european/europeanWinners",PromoDetails:"/activity/PromoDetails/[id]",PureDisplay:"/activity/pureDisplay/[id]",bettingGift:"/activity/bettingGift/[id]",newTask:"/activity/newTask/[id]",drawGift:"/activity/drawGift/[id]",monthMoney:"/activity/monthMoney/[id]",promoCenter:"/app/promo/list/[id]",friendInvitation:"/app/friendInvitation",friendRecording:"/app/friendRecording",friendApply:"/app/friendApply",currency:"/app/currency",entry:"/entry/:id",login:"/entry/login",register:"/entry/register",rulesRegular:"/app/rulesRegular",rulesPrivacy:"/app/rulesPrivacy",forgetPassword:"/forgetPassword",maintenance:"/other/maintenance",restrictionIp:"/other/restrictionIp",notFound:"/404"}},HqPC:function(e,t,n){"use strict";n.d(t,"b",(function(){return r})),n.d(t,"a",(function(){return o})),n.d(t,"c",(function(){return i}));var a=navigator.userAgent,r=function(){return/iphone/gi.test(a)},o=function(){return/(?:Android)/.test(a)},i=function(){var e,t=null===(e=navigator)||void 0===e?void 0:e.userAgent,n=t.indexOf("Android")>-1||t.indexOf("Linux")>-1;return!!t.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/)?"ios":n?"android":""}},MXR7:function(e,t,n){"use strict";n.d(t,"f",(function(){return s})),n.d(t,"c",(function(){return l})),n.d(t,"b",(function(){return p})),n.d(t,"e",(function(){return f})),n.d(t,"a",(function(){return g})),n.d(t,"d",(function(){return h}));var a=n("+Xce"),r=n("2XQ8"),o=n("9zUi"),i=n("9660"),c=n("FdF9"),u=n("AWiK");function s(){return Object(a.c)("/api/site/group/member/memberInfo/v1/getMemberInfoForWeb",{noToast:!0})}var d,l=function(){return s().then((function(e){return p(e),e}))},p=function(e){i.d.trigger("useUserInfo/mutate",e)};function f(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.initialData,n=e.manual,a=void 0!==n&&n,r=e.ready,o=void 0===r||r;t=(t=Object(i.i)(t)?void 0:t)||g();var l=Object(c.useState)(t),p=l[0],f=l[1],m=Object(c.useState)(),b=m[0],v=m[1],y=Object(c.useState)(!1),O=y[0],w=y[1],I=function(){return d||(w(!0),d=s().finally((function(){w(!1),d=void 0}))),d.then((function(e){return f(e),e})).catch((function(e){return v(e),Promise.reject(e)}))},j=I,T=f,C={data:p,loading:O,error:b,refresh:j,mutate:T,run:I};return p?g(p):h(),Object(u.a)("useUserInfo/mutate",(function(e){return T(e.data)}),{target:function(){return document}}),Object(c.useEffect)((function(){(o=!p&&!a&&o)&&I()}),[]),C}var m="UserInfo",b=new Map;function g(e){if(!e)return b.get(m);b.set(m,e)}function h(){b.delete(m)}Object(r.a)()&&Object(o.a)(h)},THu5:function(e,t,n){"use strict";n.d(t,"a",(function(){return d})),n.d(t,"f",(function(){return l})),n.d(t,"c",(function(){return p})),n.d(t,"d",(function(){return f})),n.d(t,"e",(function(){return m})),n.d(t,"b",(function(){return b}));var a=n("20a2"),r=n.n(a),o=n("HqPC"),i=n("2XQ8"),c=n("WI//"),u=n("AtiY"),s=Object(i.a)()&&new URLSearchParams(window.location.search).get("isApp");function d(){return!!s||Object(i.a)()&&!!/kkbridge/i.test(window.navigator.userAgent)}function l(e,t,n){d()&&(location.href=c.a.CHANGETITLEANDRIGHTITEM(e,t,n))}function p(e,t,n){"ios"===Object(o.c)()&&d()||"android"===Object(o.c)()&&d()&&!/kkbridge\/1.0/i.test(window.navigator.userAgent)?location.href=c.a.JUDGECANACTION(e,t):n&&n()}var f=function(){d()?location.href=c.a.LOGIN:r.a.push(u.a.login)},m=function(){d()?location.href=c.a.CUSTOMER_SERVICE:r.a.push(u.a.customer)},b=function(){d()?location.href=c.a.BACK:r.a.back()}},"WI//":function(e,t,n){"use strict";var a={LOGIN:"loginAction://login?callback=reloginForDisableActivity",HOME:"jumpToHomeAction://action?callback=goHomeCallBack",CUSTOMER_SERVICE:"jumpToCustomServiceActivon://action",REWARDRECORD:"sktfGoToNativeVC://action?callback=didGoToNativeVCCallBack&vc=redeemRecord",BACK:"sktfGoPrevVC://action?callback=didGoToPrevVC",PERSONINFO:"sktfGoToNativeVC://action?callback=didGoToNativeVCCallBack&vc=personInfo ",CENTER:"fillPersonInfoAction://action?callback=refreshH5CallBack",ENTERBETPAGE:function(e){return"sktfGoSportEventList://action?callback=didGoToSportEventList&type=".concat(e)},DEPOSIT:"jumpToDepositAction://action?callback=refreshH5CallBack",WITHDRAWAL:"sktfGoToNativeVC://action?callback=refreshH5CallBack&vc=withdrawalNative",RED_LOGIN:"loginAction://login?callback=loginRedCallback",REWARD:"jumpToRewardRecordAction://action",USERSETTING:"userBirthdayAction://birthday?callback=birthdaySetSucessCallback",GOTOVENUE:function(e,t,n){return"jumpToVenueDetailAction://action?enName=".concat(e,"&gameCode=").concat(t,"&gameName=").concat(n)},PHOTO:"bindPhotoAction://action?callback=refreshH5CallBack",BIND_PHONE:"sktfGoToNativeVC://action?callback=refreshH5CallBack&vc=bindPhone",CHANGETITLE:function(e,t){return"changeTitleAction://action?title=".concat(e,"&type=").concat(t||0)},JUDGECANACTION:function(e,t){return"canHybridAction://action?actionName=".concat(e,"&callback=").concat(t)},CHANGETITLEANDRIGHTITEM:function(e,t,n,a,r,o){return"changeTitleAndRightNavigationItemAction://action?titleType=".concat(e,"&titleName=").concat(n,"&itemType=").concat(t,"&itemName=").concat(a,"&itemIcon=").concat(r,"&callback=").concat(o)},RICHTESTLINK:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"",a=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"",r=arguments.length>4&&void 0!==arguments[4]?arguments[4]:"";return"openTheNewWebViewAction://action?title=".concat(e,"&sharePicture=").concat(t,"&activityStartTime=").concat(n,"&activityEndTime=").concat(a,"&isPermanent=").concat(r)},MIYOULOGINVIEW:"loginViewController://action",MIYOUBACKPAGE:"backPage://action",MIYOUSENDDOWNLOADURL:function(e,t,n){return"sendDownloadUrl://action?schemeUrl=".concat(e,"&url=").concat(t,"&type=").concat(n)},AICAOLOGINVIEW:"loginViewController://action",AICAOBACKPAGE:"backPage://action",AICAOSENDDOWNLOADURL:function(e,t,n){return"sendDownloadUrl://action?schemeUrl=".concat(e,"&url=").concat(t,"&type=").concat(n)}};t.a=a},kiQV:function(e){e.exports=JSON.parse('{"a":"yb-h5"}')},qTDx:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var a=function(){return localStorage.getItem("_uuid")||function(){var e=function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,(function(t){var n=16*Math.random()|0,a=("x"===t?n:3&n|8).toString(16);return e?a:a.toUpperCase()}))}();try{localStorage.setItem("_uuid",e)}catch(t){}return e}()}}}]);
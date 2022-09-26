(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["components/common/other-login"],{2091:function(n,e,t){"use strict";t.r(e);var c=t("e49c"),r=t.n(c);for(var i in c)"default"!==i&&function(n){t.d(e,n,(function(){return c[n]}))}(i);e["default"]=r.a},c4c1:function(n,e,t){"use strict";t.r(e);var c=t("fbc4"),r=t("2091");for(var i in r)"default"!==i&&function(n){t.d(e,n,(function(){return r[n]}))}(i);var o,u=t("f0c5"),a=Object(u["a"])(r["default"],c["b"],c["c"],!1,null,null,null,!1,c["a"],o);e["default"]=a.exports},e49c:function(n,e,t){"use strict";(function(n){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var t={data:function(){return{providerList:[]}},mounted:function(){var e=this;n.getProvider({service:"oauth",success:function(n){e.providerList=n.provider.map((function(n){var e="",t="",c="";switch(n){case"weixin":e="微信登录",t="icon-weixin",c="bg-success";break;case"qq":e="QQ登录",t="icon-qq1",c="bg-primary";break;case"sinaweibo":e="新浪微博登录",t="icon-tubiaozhizuo-",c="bg-red";break}return{name:e,id:n,icon:t,bgColor:c}}))},fail:function(n){console.log("获取登录通道失败",n)}})}};e.default=t}).call(this,t("543d")["default"])},fbc4:function(n,e,t){"use strict";var c;t.d(e,"b",(function(){return r})),t.d(e,"c",(function(){return i})),t.d(e,"a",(function(){return c}));var r=function(){var n=this,e=n.$createElement;n._self._c},i=[]}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'components/common/other-login-create-component',
    {
        'components/common/other-login-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("c4c1"))
        })
    },
    [['components/common/other-login-create-component']]
]);

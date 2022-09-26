(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["components/uni-ui/uni-badge/uni-badge"],{2478:function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var u={name:"UniBadge",props:{type:{type:String,default:"default"},inverted:{type:Boolean,default:!1},text:{type:[String,Number],default:""},size:{type:String,default:"normal"}},data:function(){return{badgeStyle:""}},watch:{text:function(){this.setStyle()}},mounted:function(){this.setStyle()},methods:{setStyle:function(){this.badgeStyle="width: ".concat(8*String(this.text).length+12,"px")},onClick:function(){this.$emit("click")}}};n.default=u},"39d9":function(t,n,e){"use strict";e.r(n);var u=e("f30d"),i=e("66fb");for(var a in i)"default"!==a&&function(t){e.d(n,t,(function(){return i[t]}))}(a);e("b162");var r,c=e("f0c5"),f=Object(c["a"])(i["default"],u["b"],u["c"],!1,null,"1945d5d1",null,!1,u["a"],r);n["default"]=f.exports},"66fb":function(t,n,e){"use strict";e.r(n);var u=e("2478"),i=e.n(u);for(var a in u)"default"!==a&&function(t){e.d(n,t,(function(){return u[t]}))}(a);n["default"]=i.a},"71a0":function(t,n,e){},b162:function(t,n,e){"use strict";var u=e("71a0"),i=e.n(u);i.a},f30d:function(t,n,e){"use strict";var u;e.d(n,"b",(function(){return i})),e.d(n,"c",(function(){return a})),e.d(n,"a",(function(){return u}));var i=function(){var t=this,n=t.$createElement;t._self._c},a=[]}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'components/uni-ui/uni-badge/uni-badge-create-component',
    {
        'components/uni-ui/uni-badge/uni-badge-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("39d9"))
        })
    },
    [['components/uni-ui/uni-badge/uni-badge-create-component']]
]);

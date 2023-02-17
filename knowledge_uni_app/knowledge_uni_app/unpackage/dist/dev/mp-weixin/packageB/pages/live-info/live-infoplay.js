require('../../common/vendor.js');(global["webpackJsonp"] = global["webpackJsonp"] || []).push([["packageB/pages/live-info/live-infoplay"],{

/***/ 316:
/*!*******************************************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/main.js?{"page":"packageB%2Fpages%2Flive-info%2Flive-infoplay"} ***!
  \*******************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(createPage) {__webpack_require__(/*! uni-pages */ 5);
var _vue = _interopRequireDefault(__webpack_require__(/*! vue */ 3));
var _liveInfoplay = _interopRequireDefault(__webpack_require__(/*! ./packageB/pages/live-info/live-infoplay.vue */ 317));function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}wx.__webpack_require_UNI_MP_PLUGIN__ = __webpack_require__;
createPage(_liveInfoplay.default);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["createPage"]))

/***/ }),

/***/ 317:
/*!**********************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue ***!
  \**********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./live-infoplay.vue?vue&type=template&id=041918b3& */ 318);
/* harmony import */ var _live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./live-infoplay.vue?vue&type=script&lang=js& */ 320);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var _live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./live-infoplay.vue?vue&type=style&index=0&lang=css& */ 331);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/runtime/componentNormalizer.js */ 11);

var renderjs





/* normalize component */

var component = Object(_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null,
  false,
  _live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["components"],
  renderjs
)

component.options.__file = "packageB/pages/live-info/live-infoplay.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ 318:
/*!*****************************************************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=template&id=041918b3& ***!
  \*****************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns, recyclableRender, components */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--16-0!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/template.js!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-uni-app-loader/page-meta.js!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./live-infoplay.vue?vue&type=template&id=041918b3& */ 319);
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "recyclableRender", function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["recyclableRender"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "components", function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_template_id_041918b3___WEBPACK_IMPORTED_MODULE_0__["components"]; });



/***/ }),

/***/ 319:
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--16-0!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/template.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-uni-app-loader/page-meta.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=template&id=041918b3& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns, recyclableRender, components */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "recyclableRender", function() { return recyclableRender; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "components", function() { return components; });
var components
try {
  components = {
    imtAudio: function() {
      return __webpack_require__.e(/*! import() | components/imt-audio/imt-audio */ "components/imt-audio/imt-audio").then(__webpack_require__.bind(null, /*! @/components/imt-audio/imt-audio.vue */ 441))
    }
  }
} catch (e) {
  if (
    e.message.indexOf("Cannot find module") !== -1 &&
    e.message.indexOf(".vue") !== -1
  ) {
    console.error(e.message)
    console.error("1. 排查组件名称拼写是否正确")
    console.error(
      "2. 排查组件是否符合 easycom 规范，文档：https://uniapp.dcloud.net.cn/collocation/pages?id=easycom"
    )
    console.error(
      "3. 若组件不符合 easycom 规范，需手动引入，并在 components 中注册该组件"
    )
  } else {
    throw e
  }
}
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
}
var recyclableRender = false
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ 320:
/*!***********************************************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/babel-loader/lib!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--12-1!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/script.js!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./live-infoplay.vue?vue&type=script&lang=js& */ 321);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ 321:
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--12-1!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/script.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(uni) {Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _regenerator = _interopRequireDefault(__webpack_require__(/*! ./node_modules/@babel/runtime/regenerator */ 322));























































































































































































































































































var _qiniuUploader = _interopRequireDefault(__webpack_require__(/*! ../../../qiniuUploader.js */ 186));


var _uniappSocketio = _interopRequireDefault(__webpack_require__(/*! ./uniapp.socketio.js */ 325));
var _md = _interopRequireDefault(__webpack_require__(/*! ../../../static/js/md53.js */ 326));




var _Agora_Miniapp_SDK_for_WeChat = _interopRequireDefault(__webpack_require__(/*! ./Agora_Miniapp_SDK_for_WeChat.js */ 330));function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {try {var info = gen[key](arg);var value = info.value;} catch (error) {reject(error);return;}if (info.done) {resolve(value);} else {Promise.resolve(value).then(_next, _throw);}}function _asyncToGenerator(fn) {return function () {var self = this,args = arguments;return new Promise(function (resolve, reject) {var gen = fn.apply(self, args);function _next(value) {asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);}function _throw(err) {asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);}_next(undefined);});};}var uniNavBar = function uniNavBar() {__webpack_require__.e(/*! require.ensure | components/uni-ui/uni-nav-bar/uni-nav-bar */ "components/uni-ui/uni-nav-bar/uni-nav-bar").then((function () {return resolve(__webpack_require__(/*! @/components/uni-ui/uni-nav-bar/uni-nav-bar.vue */ 381));}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);};var imtAudio = function imtAudio() {__webpack_require__.e(/*! require.ensure | components/imt-audio/imt-audio */ "components/imt-audio/imt-audio").then((function () {return resolve(__webpack_require__(/*! @/components/imt-audio/imt-audio.vue */ 441));}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);};var Emojy = function Emojy() {__webpack_require__.e(/*! require.ensure | packageB/emojy/emojy */ "packageB/emojy/emojy").then((function () {return resolve(__webpack_require__(/*! @/packageB/emojy/emojy.vue */ 448));}).bind(null, __webpack_require__)).catch(__webpack_require__.oe);};


var app = getApp();
var socket = '';
var wechatAgora = '';
var H5Client = '';var _default =
{
  components: {
    uniNavBar: uniNavBar,
    Emojy: Emojy,
    imtAudio: imtAudio },

  data: function data() {
    return {
      livemode: 0,
      fromPPt: false,
      fromshare: false,
      ShareScreenUid: 999999999,
      Recorder: uni.getRecorderManager(),
      chat_audio: uni.createInnerAudioContext(),
      recording: false, //标识是否正在录音
      isStopVoice: false, //加锁 防止点击过快引起的当录音正在准备(还没有开始录音)的时候,却调用了stop方法但并不能阻止录音的问题
      voiceInterval: null,
      voiceTime: 0, //总共录音时长
      canSend: true, //是否可以发送
      PointY: 0, //坐标位置
      voiceIconText: "正在录音...",
      voiceimagestatus: true,
      voiceTitle: '按住说话',
      chat_voice: "../../static/chat_voice@3x.png",
      isvoice: false,
      show_big_ppt: false,
      scrollH: 0,
      system_ppt_top: 0,
      tabIndex: 0,
      tabBars: [{
        name: "讲师区" },
      {
        name: "讨论区" },
      {
        name: "问答区" }],

      scrollInto: "",
      scrollTop: "",
      list: [],
      isConnectSocket: false, //是否连接socket
      liveInfo: {
        'liveuid': '',
        'courseid': '',
        'lessonid': '' },

      userInfo: {},
      isQue: false,
      //直播添加
      agoraappid: '',
      agoramRoomName: '',
      agorauid: '',
      phonetype: 0,
      wechatliveurl: '',
      res_url: '',
      wechatliveurl_small: '',
      myID: '',
      content: '',
      islive: '已结束',
      Usercount: 0,
      diancolor: '#969696',
      timer: '',
      livetype: '',
      intr: '',
      pull: '',
      thumb: '',
      duration: '',
      currentTime: 0,
      videoContext: '',
      buttonimage: '',
      status: 1,
      start: '',
      end: '',
      ppts: [],
      noppt: false,
      pptindex: 0,
      showppt_index: 0,
      show_big_ppt_index: 1,
      show_big_ppt_index2: 0,
      emojylist: [],
      showemojy: false,
      inputbuttom: 0,
      shut_place: "我来说几句~",
      isshut: false,
      shownothingVideo: false,
      zhibo_leave: false,
      zhibo_leave_text: '老师暂时离开',
      zhibo_leave_text_w: '精彩稍后继续',
      show_nothing_image: true,
      show_nothing_image2: false,
      input_adjust: false,
      video_zhezhao: true,
      voice_list: [],
      intervl: '',
      voice_index: -1,
      QiNiutoken: '',
      voice_url: '',
      voice_length: '',
      animation: [],
      showpic: '',
      hidepic: '',
      setInter1: '',
      num: 0,
      picmaxnum: 6,
      isaudioerror: false,
      showsmallvideo: false,
      showShareScreen: false,
      showBigScreen: true };

  },
  onReady: function onReady() {
    var that = this;
    that.system_ppt_top = 25;
    uni.getSystemInfo({
      success: function success(res) {
        that.scrollH = res.windowHeight * 750 / res.windowWidth - 540 - 100;

        that.system_ppt_top = parseInt(res.safeArea.top) + 10;
        that.scrollH = res.windowHeight * 750 / res.windowWidth - 550 - 124 - parseInt(res.safeArea.top) - 20;

        that.liveLive(that.liveInfo.liveuid, that.liveInfo.courseid, that.liveInfo.lessonid);
      } });

    // this.pageToBottom();
  },
  onUnload: function onUnload() {
    this.chat_audio.stop();
    socket.disconnect();
    socket.close();
  },
  onLoad: function onLoad(option) {var _this2 = this;

    console.log("运行在小程序");
    this.phonetype = 4;














    this.ppts = [];
    this.userInfo = app.globalData.userinfo;
    this.liveInfo.liveuid = option.liveuid;
    this.liveInfo.courseid = option.courseid;
    this.liveInfo.lessonid = option.lessonid;
    this.thumb = option.thumb;
    this.myID = app.globalData.userinfo.id;
    this.GetChat();
    uni.onKeyboardHeightChange(function (res) {
      if (res.height > 0) {
        if (_this2.showemojy == true) {
          _this2.showemojy = false;
          _this2.inputbuttom = 170;
        } else {
          _this2.inputbuttom = res.height;
        }
      }
      if (res.height == 0) {
        if (_this2.showemojy == true) {
          _this2.inputbuttom = 170;
        } else {
          _this2.inputbuttom = 0;
        }
      }
    });
    //音频播放事件
    this.chat_audio.onPlay(function () {
      _this2.isaudioerror = false;
      // console.log('开始播放');
    });
    this.chat_audio.onStop(function () {
      _this2.isaudioerror = false;
      _this2.voice_index = -1;
      // console.log('播放结束-onStop');
      clearInterval(_this2.intervl);
      for (var i = 0; i < _this2.voice_list.length; i++) {
        _this2.voice_list[i] = '../../static/receiver_voice@3x.png';
        _this2.$set(_this2.voice_list, i, _this2.voice_list[i]);
      }
    });
    //音频结束事件
    this.chat_audio.onEnded(function () {
      _this2.isaudioerror = false;
      _this2.voice_index = -1;
      // console.log('播放结束-onEnded');
      clearInterval(_this2.intervl);
      for (var i = 0; i < _this2.voice_list.length; i++) {
        _this2.voice_list[i] = '../../static/receiver_voice@3x.png';
        _this2.$set(_this2.voice_list, i, _this2.voice_list[i]);
      }
    });
    this.chat_audio.onError(function (res) {
      _this2.chat_audio.stop();
      _this2.isaudioerror = true;
      clearInterval(_this2.intervl);
      // console.log('播放错误');
      // console.log(res.errMsg);
      // console.log(res.errCode);
    });
    //录音开始事件
    this.Recorder.onStart(function (e) {
      _this2.beginVoice();
    });
    //录音结束事件
    this.Recorder.onStop(function (res) {
      clearInterval(_this2.voiceInterval);
      _this2.handleRecorder(res);
    });
  },
  methods: {
    stopPic: function stopPic() {
      clearInterval(this.setInter1);
    },
    changePic: function changePic() {//轮播方法
      clearInterval(this.setInter1);
      var animation = uni.createAnimation({
        timingFunction: 'ease',
        duration: 4000,
        delay: 0 });

      this.animation = animation;
      this.setInter1 = setInterval(function () {//循环
        this.num++;
        if (this.num == this.picmaxnum) {
          this.num = 0;
        }
        //淡入
        animation.opacity(1).step({
          duration: 3000,
          delay: 1000 });
        //描述动画
        this.showpic = animation.export(); //输出动画
        //淡出
        animation.opacity(0).step({
          duration: 3000,
          delay: 1000 });

        this.hidepic = animation.export();
      }, 4000);
    },
    //准备开始录音
    startVoice: function startVoice(e) {var _this3 = this;
      this.chat_audio.pause();
      clearInterval(this.intervl);
      for (var i = 0; i < this.voice_list.length; i++) {
        this.voice_list[i] = '../../static/receiver_voice@3x.png';
        this.$set(this.voice_list, i, this.voice_list[i]);
      }
      uni.request({
        url: getApp().globalData.site_url + 'Upload.GetQiniuToken',
        method: 'POST',
        data: {
          'uid': getApp().globalData.userinfo.id,
          'token': getApp().globalData.userinfo.token },

        success: function success(res) {
          uni.hideLoading();
          if (res.data.data.code == 0) {
            _this3.QiNiutoken = _this3.decypt(res.data.data.info[0].token);
            _this3.recording = true;
            _this3.isStopVoice = false;
            _this3.canSend = true;
            _this3.voiceIconText = "正在录音...";
            _this3.voiceimagestatus = true;
            _this3.PointY = e.touches[0].clientY;
            _this3.Recorder.start({
              format: 'mp3' });

          } else {
            uni.showToast({
              title: '请重试',
              icon: 'none' });

          }
        } });

    },
    //录音已经开始
    beginVoice: function beginVoice() {var _this4 = this;
      if (this.isStopVoice) {
        this.Recorder.stop();
        return;
      }
      this.voiceTitle = '松开 结束';
      this.voiceInterval = setInterval(function () {
        _this4.voiceTime++;
      }, 1000);
    },
    //move 正在录音中
    moveVoice: function moveVoice(e) {
      var PointY = e.touches[0].clientY;
      var slideY = this.PointY - PointY;
      if (slideY > uni.upx2px(120)) {
        this.canSend = false;
        this.voiceIconText = '松开手指 取消发送 ';
        this.voiceTitle = '手指上滑 取消发送 ';
        this.voiceimagestatus = false;
        this.stopPic();
      } else if (slideY > uni.upx2px(60)) {
        this.canSend = false;
        this.voiceTitle = '手指上滑 取消发送 ';
        this.voiceIconText = '手指上滑 取消发送 ';
        this.voiceimagestatus = false;
        this.stopPic();
      } else {
        this.canSend = true;
        this.voiceIconText = '正在录音...';
        this.voiceTitle = '松开结束';
        this.voiceimagestatus = true;
        this.changePic();
      }
    },
    //结束录音
    endVoice: function endVoice() {
      this.stopPic();
      this.inputbuttom = 0;
      this.isStopVoice = true; //加锁 确保已经结束录音并不会录制
      this.Recorder.stop();
      this.voiceTitle = '按住 说话';
      this.recording = false;
    },
    //录音被打断
    cancelVoice: function cancelVoice(e) {
      this.stopPic();
      this.inputbuttom = 0;
      this.recording = false;
      this.voiceTime = 0;
      this.voiceTitle = '按住 说话';
      this.canSend = false;
      this.Recorder.stop();
    },
    //处理录音文件
    handleRecorder: function handleRecorder(_ref)


    {var _this5 = this;var tempFilePath = _ref.tempFilePath,duration = _ref.duration;
      if (this.canSend == false) {
        return;
      }
      var contentDuration;

      this.voiceTime = 0;
      console.log(duration);
      if (duration < 1500) {
        this.voiceIconText = "说话时间过短";
        this.recording = false;
        this.inputbuttom = 0;
        this.recording = false;
        this.voiceTime = 0;
        this.voiceTitle = '按住 说话';
        this.canSend = false;
        this.Recorder.stop();
        return;
      }
      contentDuration = duration / 1000;












      this.recording = false;
      var name = 'voice_knowledge' + this.getTime() + '.wav';
      _qiniuUploader.default.upload(tempFilePath, function (res) {
        // if (res.fileUrl.indexOf("undefined") != -1) {
        // console.log('上传成功，但url含 undefined');
        // uni.showToast({
        // 	title: '出现错误，请重新录制语音',
        // 	icon: 'none'
        // });
        // return;
        // }
        // console.log('上传成功');
        // console.log(res);
        _this5.voice_url = res.fileUrl;
        _this5.voice_length = Math.ceil(contentDuration);
        _this5.send();
      }, function (error) {
        console.log('上传失败');
      }, {
        region: 'ECN',
        domain: app.globalData.qiniuimageurl,
        key: name,
        uptoken: this.QiNiutoken });

    },
    big_change: function big_change(event) {
      this.show_big_ppt_index = parseInt(event.detail.current) + 1;
      this.show_big_ppt_index2 = parseInt(event.detail.current);
    },
    big_ppt_back: function big_ppt_back() {
      this.show_big_ppt = false;
    },
    getTime: function getTime() {
      var yy = new Date().getFullYear();
      var mm = new Date().getMonth() + 1;
      var dd = new Date().getDate();
      var hh = new Date().getHours();
      var mf = new Date().getMinutes() < 10 ? '0' + new Date().getMinutes() : new Date().getMinutes();
      var ss = new Date().getSeconds() < 10 ? '0' + new Date().getSeconds() : new Date().getSeconds();
      return yy + mm + dd + hh + mf + ss;
    },
    backCourseList: function backCourseList() {
      uni.showModal({
        title: '是否要退出直播间',
        content: '',
        showCancel: true,
        cancelText: '取消',
        confirmText: '确定',
        confirmColor: '#2C62EF',
        success: function success(res) {
          if (res.confirm) {
            // uni.showLoading({
            // 	title:null
            // })
            socket.disconnect();
            socket.close();
            setTimeout(function () {
              uni.hideLoading();
              uni.navigateBack({
                delta: 1 });

            }, 0);
          }
        },
        fail: function fail() {},
        complete: function complete() {} });

    },
    open_voice: function open_voice(url, index) {var _this6 = this;
      this.chat_audio.pause();
      clearInterval(this.intervl);
      for (var i = 0; i < this.voice_list.length; i++) {
        this.voice_list[i] = '../../static/receiver_voice@3x.png';
        this.$set(this.voice_list, i, this.voice_list[i]);
      }
      if (this.voice_index == index) {
        this.voice_index = -1;
        console.log('手动停止');
        this.chat_audio.pause();
        clearInterval(this.intervl);
      } else {
        console.log(url);
        if (url.indexOf("undefined") != -1) {
          this.voice_index = -1;
          console.log('url出现错误，停止播放');
          this.chat_audio.pause();
          clearInterval(this.intervl);
          return;
        }
        this.chat_audio.src = url;
        this.chat_audio.play();
        this.voice_index = index;
        this.intervl = setInterval(function () {
          console.log('启动');
          _this6.voice_list[index] = '../../static/receiver_voice_play_1@3x.png';
          _this6.$set(_this6.voice_list, index, _this6.voice_list[index]);
          setTimeout(function () {
            _this6.voice_list[index] = '../../static/receiver_voice_play_2@3x.png';
            _this6.$set(_this6.voice_list, index, _this6.voice_list[index]);
          }, 200);
          setTimeout(function () {
            _this6.voice_list[index] = '../../static/receiver_voice_play_3@3x.png';
            _this6.$set(_this6.voice_list, index, _this6.voice_list[index]);
          }, 400);
        }, 600);
      }
      if (this.isaudioerror == true) {
        uni.showToast({
          title: '1' });

        this.chat_audio.stop();
        clearInterval(this.intervl);
      }
    },
    addNodeListen: function addNodeListen() {var _this7 = this;
      socket = new _uniappSocketio.default(app.globalData.socket_url, {
        query: {},
        transports: ['websocket', 'polling'],
        timeout: 5000 });

      socket.emit('conn', {
        uid: this.userInfo.id, //进入该房间的学生id 假如等于下面的房间id, 那即为老师进入房间
        roomnum: this.liveInfo.liveuid, //房间号,即老师id
        nickname: this.userInfo.user_nickname,
        stream: this.liveInfo.liveuid + '_' + this.liveInfo.courseid + '_' + this.liveInfo.lessonid, //老师id_课程id_课时id
        token: this.userInfo.token });

      socket.on('error', function (data) {
        console.log('ws 失败 ' + data);
      });
      socket.on('conn', function (data) {
        console.log('ws 已连接 ' + data);
        if (data == 'no') {
          uni.showModal({
            title: '聊天服务器连接失败',
            content: '请尝试退出直播间重新进入',
            showCancel: false,
            cancelText: '',
            confirmText: '确定',
            confirmColor: '#38DAA6',
            success: function success(res) {
              uni.navigateBack({
                delta: 1 });

            },
            fail: function fail() {},
            complete: function complete() {} });

          return;
        }
        _this7.isConnectSocket = true; //已连接
      });
      var that = this;
      socket.on('broadcastingListen', function (data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          var msgInfo = JSON.parse(data[i]).msg[0];
          //console.log(JSON.parse(JSON.stringify(msgInfo)));
          if (msgInfo._method_ == "changeMode") {
            if (msgInfo.action == 1) {
              console.log('切换到PPt');
              _this7.livetype = 4;
              _this7.fromPPt = true;
              _this7.fromshare = false;
              _this7.showsmallvideo = true;
              _this7.showShareScreen = false;
              _this7.scrollH -= 150;

              _this7.wechatliveurl_small = _this7.res_url;
              _this7.wechatliveurl = '';






            } else if (msgInfo.action == 0) {
              console.log('切换到直播');
              if (_this7.fromshare == false && _this7.fromPPt == true) {
                _this7.scrollH += 150;
              }
              _this7.livetype = 5;
              _this7.fromPPt = false;
              _this7.fromshare = false;
              _this7.showsmallvideo = false;
              _this7.showShareScreen = false;

              _this7.wechatliveurl_small = '';
              _this7.wechatliveurl = _this7.res_url;






            } else if (msgInfo.action == 2) {
              console.log('切换到屏幕共享');
              //屏幕共享
              if (_this7.fromPPt == true) {
                _this7.scrollH += 150;
              }
              _this7.livetype = 5;
              _this7.fromshare = true;
              _this7.showShareScreen = true;
              _this7.showsmallvideo = false;

              _this7.wechatliveurl_small = '';
              _this7.wechatliveurl = _this7.res_url;






            }
          }
          if (msgInfo._method_ == "Kick") {
            //踢出直播间
            if (msgInfo.action == 1) {
              if (msgInfo.touid == getApp().globalData.userinfo.id) {
                uni.showToast({
                  title: '你已被讲师踢出房间',
                  icon: 'none' });

                setTimeout(function () {
                  uni.navigateBack({
                    delta: 1 });

                }, 500);
              }
            }
          }
          if (msgInfo._method_ == "StartEndLive") {
            _this7.zhibo_leave = true;
            _this7.video_zhezhao = true;
            _this7.show_nothing_image = false;
            _this7.show_nothing_image2 = true;
            _this7.zhibo_leave_text = "直播已结束";
            _this7.zhibo_leave_text_w = "";
          }
          if (msgInfo._method_ == "roomShutup") {
            //App.Course.SetLesson
            //1 禁言 0 解除
            if (msgInfo.action == 1) {
              _this7.shut_place = "全体禁言中";
              _this7.content = "";
              _this7.isshut = true;
            } else {
              _this7.shut_place = "我来说几句～";
              _this7.content = '';
              _this7.isshut = false;
            }
          }
          if (msgInfo._method_ == "Shutup") {
            if (msgInfo.touid == getApp().globalData.userinfo.id) {
              _this7.shut_place = "你已被禁言";
              _this7.isshut = true;
              uni.showToast({
                title: '你已被禁言',
                icon: 'none' });

            }
          }
          if (msgInfo._method_ == "SendMsg") {
            if (msgInfo.action == 0) {
              // if (msgInfo.ct.uid != getApp().globalData.userinfo.id) {
              _this7.Usercount += 1;
              console.log('用户进入');
              // }
            } else {
              var pinyinArray = getApp().globalData.pinyinArray;
              var emojiArray = getApp().globalData.emojiArray;
              var biaoqing_url = getApp().globalData.biaoqingurl;
              var content = msgInfo.content;
              if (msgInfo.type == 0) {
                for (var j = 0; j < 50; j++) {
                  for (var _i = 0; _i < emojiArray.length; _i++) {
                    var path = getApp().globalData.biaoqingurl + pinyinArray[_i];
                    content = content.replace(emojiArray[_i],
                    '<img style="width: 25px; height: 25px; vertical-align: middle;" src ="' + path + '"/>');

                  }
                }
              }
              _this7.voice_list.push('../../static/receiver_voice@3x.png');
              msgInfo.content = content;
              _this7.list.push(msgInfo);
              _this7.pageToBottom();
            }
          }
          if (msgInfo._method_ == 'disconnect') {
            if (_this7.Usercount != 0) {
              _this7.Usercount -= 1;
            }
            console.log('用户离开');
          }
          if (msgInfo._method_ == 'setPPT') {
            if (msgInfo.action == 0) {
              var item = {
                'id': msgInfo.pptid,
                'thumb': msgInfo.thumb };

              _this7.noppt = false;
              _this7.ppts.push(item);
              console.log('添加ppt');
            } else if (msgInfo.action == 1) {
              console.log('ppt删除');
              var pptlist = _this7.ppts;
              for (var _i2 = 0; _i2 < pptlist.length; _i2++) {
                var item = pptlist[_i2];
                if (item.id == msgInfo.pptid) {
                  _this7.ppts.splice(_i2, 1);
                }
              }
              if (_this7.ppts.length == 0) {
                _this7.noppt = true;
              }
            } else if (msgInfo.action == 2) {
              _this7.pptindex = parseInt(msgInfo.index);
              _this7.showppt_index = _this7.pptindex + 1;
              console.log('ppt切换索引');
            }
          }
        }
      });
    },
    showBigView: function showBigView(index) {
      this.show_big_ppt = true;
      this.show_big_ppt_index = index + 1;
      this.show_big_ppt_index2 = index;
    },
    songemojy: function songemojy(data) {
      this.content += data.chinese;
    },
    GetChat: function GetChat() {var _this8 = this;
      var gData = app.globalData;
      uni.request({
        url: gData.site_url + 'Live.GetChat',
        method: 'POST',
        data: {
          'uid': gData.userinfo.id,
          'token': gData.userinfo.token,
          'liveuid': this.liveInfo.liveuid,
          'courseid': this.liveInfo.courseid,
          'lessonid': this.liveInfo.lessonid,
          'lastid': '',
          'type': '0' },

        success: function success(res) {
          var pinyinArray = getApp().globalData.pinyinArray;
          var emojiArray = getApp().globalData.emojiArray;
          _this8.list = res.data.data.info;
          for (var j = 0; j < _this8.list.length; j++) {
            var msg = _this8.list[j];
            var content = msg.content;
            if (msg.type == 0) {
              for (var _j = 0; _j < 50; _j++) {
                for (var i = 0; i < emojiArray.length; i++) {
                  var path = getApp().globalData.biaoqingurl + pinyinArray[i];
                  content = content.replace(emojiArray[i],
                  '<img style="width: 25px; height: 25px; vertical-align: middle;" src ="' + path + '"/>');

                }
              }
            }
            _this8.voice_list.push('../../static/receiver_voice@3x.png');
            msg.content = content;
            _this8.list[j] = msg;
          }
        } });

    },
    changeXXK: function changeXXK(index) {var _this9 = this;return _asyncToGenerator( /*#__PURE__*/_regenerator.default.mark(function _callee() {return _regenerator.default.wrap(function _callee$(_context) {while (1) {switch (_context.prev = _context.next) {case 0:
                _this9.tabIndex = index;
                setTimeout(function () {
                  _this9.pageToBottom();
                }, 300);return _context.abrupt("return",
                _this9.tabIndex);case 3:case "end":return _context.stop();}}}, _callee);}))();
    },
    onChangeTab: function onChangeTab(e) {
      this.tabIndex = e.detail.current;
      this.pageToBottom();
    },
    decypt: function decypt(code) {
      var newcode = '';
      var str = '1ecxXyLRB.COdrAi:q09Z62ash-QGn8VFNIlb=fM/D74WjS_EUzYuw?HmTPvkJ3otK5gp&';
      for (var i = 0; i < code.length; i++) {
        var codeIteam = code[i];
        for (var j = 0; j < str.length; j++) {
          var stringIteam = str[j];
          if (codeIteam == stringIteam) {
            if (j == 0) {
              newcode += str[str.length - 1];
            } else {
              newcode += str[j - 1];
            }
          }
        }
      }
      return newcode;
    },
    agoraWechat: function agoraWechat(agoraappid, agorastream, uid) {var _this10 = this;
      this.video_zhezhao = true;
      var _that = this;
      //初始化
      wechatAgora = new _Agora_Miniapp_SDK_for_WeChat.default.Client();
      wechatAgora.setRole('audience');
      wechatAgora.init(this.decypt(agoraappid), function () {
        console.log('小程序初始化成功');
        //加入通道
        wechatAgora.join('', agorastream, uid, function () {
          console.log('加入通道成功');
          _this10.zhibo_leave = true;
        }, function (e) {
          console.log('加入通道失败');
          _this10.zhibo_leave = true;
        });
      },
      function (e) {
        _this10.zhibo_leave = true;
        console.log('小程序初始化失败');
      });
      //订阅远端流
      wechatAgora.on("stream-added", function (e) {
        wechatAgora.subscribe(e.uid, function (res) {
          _this10.zhibo_leave = false;
          _this10.video_zhezhao = true;
          console.log("订阅视频流成功：" + res);
          _this10.res_url = res;
          if (_this10.showsmallvideo == true) {
            _this10.wechatliveurl_small = res;
          } else {
            _this10.wechatliveurl = res;
          }
        }, function (err) {
          console.log("订阅视频流错误", err);
          _this10.video_zhezhao = false;
          _this10.zhibo_leave = true;
        });
      });
      wechatAgora.on("stream-removed", function (e) {
        _this10.video_zhezhao = false;
        _this10.zhibo_leave = true;
      });
      //重连机制
      wechatAgora.rejoin('', agorastream, uid, '', function () {
        console.log('重连加入通道成功');
      }, function (e) {
        console.log('重连加入通道失败');
      });
    },
    agoraH5: function agoraH5(agoraappid, agorastream) {











































    },
    // 进入直播
    liveLive: function liveLive(liveuid, courseid, lessonid) {var _this11 = this;
      var _this = this;
      var gData = app.globalData;
      _this.agorauid = gData.userinfo.id;
      uni.request({
        url: gData.site_url + 'Live.Enter',
        method: 'POST',
        data: {
          'liveuid': liveuid,
          'courseid': courseid,
          'lessonid': lessonid,
          'token': gData.userinfo.token,
          'uid': gData.userinfo.id },

        success: function success(res) {
          if (res.data.data.code == 700) {
            uni.navigateTo({
              url: '../../../pages/login/login',
              success: function success(res) {},
              fail: function fail() {},
              complete: function complete() {} });

            return;
          }
          if (res.data.data.code == 0) {
            _this11.addNodeListen();
            _this11.pull = _this11.decypt(res.data.data.info[0].pull);
            _this11.ppts = res.data.data.info[0].ppts || [];
            if (_this11.ppts.length == 0) {
              _this11.noppt = true;
            } else {
              _this11.noppt = false;
            }
            if (parseInt(res.data.data.info[0].shutup_room) == 1) {
              _this11.shut_place = "全体禁言中";
              _this11.content = "";
              _this11.isshut = true;
            } else {
              _this11.shut_place = "我来说几句～";
              _this11.content = '';
              _this11.isshut = false;
            }
            _this11.pptindex = parseInt(res.data.data.info[0].pptindex);
            _this11.showppt_index = _this11.pptindex + 1;
            _this11.userInfo.user_type = res.data.data.info[0].user_type;
            var isLive = res.data.data.info[0].islive;
            if (isLive == 0) {
              _this11.shownothingVideo = true;
              _this11.islive = '未开始';
              _this11.diancolor = '#969696';
            } else if (isLive == 1) {
              _this11.shownothingVideo = false;
              _this11.islive = '直播中';
              _this11.diancolor = '#2C62EF';
            } else {
              _this11.islive = '已结束';
              _this11.zhibo_leave = true;
              _this11.show_nothing_image = false;
              _this11.show_nothing_image2 = true;
              _this11.zhibo_leave_text = '直播已结束';
              _this11.zhibo_leave_text_w = "";
              _this11.diancolor = '#969696';
            }
            _this11.intr = res.data.data.info[0].intr;
            //1图文2视频3音频 4ppt直播 5视频直播6音频直播 7授课直播（白板）
            _this11.livetype = res.data.data.info[0].livetype;
            if (_this11.livetype == 3 || _this11.livetype == 6) {
              _this11.videoContext = uni.createVideoContext('myVideo');
              _this11.buttonimage = '../../static/voice2.png';
            }
            _this11.Usercount = parseInt(res.data.data.info[0].nums);
            _this11.agoraappid = res.data.data.info[0].sound_appid;
            _this11.agoramRoomName = res.data.data.info[0].stream;

            if (_this11.livetype == 5 || _this11.livetype == 8) {
              if (_this11.livemode == 0) {
                console.log('直播模式');
                _this11.livetype = 5;
                _this11.fromPPt = false;
                _this11.fromshare = false;
                _this11.showsmallvideo = false;




              } else if (_this11.livemode == 1) {
                console.log('PPt模式');
                _this11.livetype = 4;
                _this11.fromPPt = true;
                _this11.fromshare = false;
                _this11.showsmallvideo = true;
                _this11.scrollH -= 150;




              } else if (_this11.livemode == 2) {
                console.log('屏幕共享模式');
                _this11.livetype = 8;
                _this11.fromshare = true;
                _this11.showsmallvideo = false;




              }
              if (_this11.phonetype == 2) {
                setTimeout(function () {
                  _this11.$nextTick(function () {
                    _this11.$refs.videoIos.focus({
                      'appid': _this11.agoraappid,
                      'mRoomName': _this11.agoramRoomName,
                      'uid': gData.userinfo.id });

                  });
                }, 0);
              } else if (_this11.phonetype == 1) {
                setTimeout(function () {
                  _this11.$nextTick(function () {
                    _this11.$refs.videoAdnroid.clearTel(
                    _this11.agoraappid + '声' + _this11.agoramRoomName + '网' + gData.userinfo.id);

                  });
                }, 0);
              } else if (_this11.phonetype == 3) {
                _this11.agoraH5(_this11.agoraappid, _this11.agoramRoomName);
              } else if (_this11.phonetype == 4) {
                _this11.agoraWechat(_this11.agoraappid, _this11.agoramRoomName, gData.userinfo.id);
              }
            }

          } else {
            uni.showToast({
              title: res.data.data.msg,
              icon: 'none' });

          }
        } });

    },
    sendvoice: function sendvoice() {
      if (this.isshut == true) {
        return;
      }
      if (this.isvoice == true) {
        this.isvoice = false;
        this.chat_voice = "../../static/chat_voice@3x.png";
      } else {
        this.isvoice = true;
        this.chat_voice = "../../static/chat_keyboard@3x.png";
      }
    },
    submitemojy: function submitemojy() {
      if (this.isshut == true) {
        return;
      }
      if (this.showemojy == true) {
        this.showemojy = false;
        this.inputbuttom = 0;
      } else {
        uni.hideKeyboard();
        this.showemojy = true;
        this.inputbuttom = 170;
      }
    },
    //发送
    new_sendemojy: function new_sendemojy(data) {
      if (this.isshut == true) {
        return;
      }
      this.send();
      this.showemojy = false;
      this.inputbuttom = 0;
    },
    send: function send(event) {var _this12 = this;
      uni.hideKeyboard();
      this.showemojy = false;
      if (this.voice_url.length > 1) {} else {
        if (this.content === '') {
          return uni.showToast({
            title: '消息不能为空',
            icon: 'none' });

        }
      }
      this.tabIndex = 1;
      var status = this.isQue === true ? "1" : "0";
      var gData = app.globalData;
      // 签名
      var dic = {
        'uid': this.userInfo.id,
        'liveuid': this.liveInfo.liveuid,
        'courseid': this.liveInfo.courseid,
        'lessonid': this.liveInfo.lessonid,
        'type': this.voice_url.length > 1 ? '1' : '0',
        'content': this.content,
        'url': this.voice_url,
        'user_type': this.userInfo.type };

      var sign = this.sort2url(dic);
      //记录聊天信息
      uni.request({
        url: gData.site_url + 'Live.SetChat',
        method: 'POST',
        data: {
          'sign': sign,
          'uid': this.userInfo.id,
          'token': this.userInfo.token,
          'content': this.content,
          "length": this.voice_length,
          'status': status,
          'user_type': this.userInfo.type,
          'liveuid': this.liveInfo.liveuid,
          'courseid': this.liveInfo.courseid,
          'lessonid': this.liveInfo.lessonid,
          'type': this.voice_url.length > 1 ? '1' : '0',
          'url': this.voice_url },

        success: function success(res) {
          //	console.log(res);
          if (res.data.data.code == 0) {
            //发送消息
            var obj = {
              "msg": [{
                "_method_": "SendMsg",
                "chatid": res.data.data.info[0].chatid,
                "action": "1",
                "token": _this12.userInfo.token,
                "uid": _this12.userInfo.id,
                "user_nickname": _this12.userInfo.user_nickname,
                "avatar": _this12.userInfo.avatar,
                "liveuid": _this12.liveInfo.liveuid,
                "content": _this12.content,
                "url": _this12.voice_url,
                "length": _this12.voice_length,
                "equipment": "app",
                "create_time": Math.floor(new Date().getTime().toString() / 1000),
                "msgtype": 2,
                "status": status,
                "type": _this12.voice_url.length > 1 ? '1' : '0',
                "user_type": _this12.userInfo.type,
                'lessonid': _this12.liveInfo.lessonid }],

              "retcode": "000000",
              "retmsg": "OK" };

            socket.emit('broadcast', obj);
            _this12.content = '';
            _this12.voice_url = '';
            _this12.voice_length = '';
          } else {
            uni.showToast({
              title: res.data.data.msg,
              icon: 'none' });

          }
        },
        fail: function fail() {
          uni.showToast({
            icon: 'none',
            title: '网络错误' });

        } });

    },
    question: function question(isQue) {
      if (this.isQue == false) {
        this.isQue = true;
      } else {
        this.isQue = false;
      }
    },
    sort2url: function sort2url(arr1) {
      var newkey = Object.keys(arr1).sort();
      var newObj = {};
      for (var i = 0; i < newkey.length; i++) {//遍历newkey数组
        newObj[newkey[i]] = arr1[newkey[i]]; //向新创建的对象中按照排好的顺序依次增加键值对
      }
      var text = "";
      for (var index in newObj) {
        text = text + index + "=" + newObj[index] + "&";
      }
      text = text.substr(0, text.length - 1);
      text += '&' + app.globalData.sign_key;

      return (0, _md.default)(text);
    },
    setSign: function setSign(obj) {//排序的函数
      var str = '';
      var newkey = Object.keys(obj).sort();
      //先用Object内置类的keys方法获取要排序对象的属性名，再利用Array原型上的sort方法对获取的属性名进行排序，newkey是一个数组
      var newObj = {}; //创建一个新的对象，用于存放排好序的键值对
      for (var i = 0; i < newkey.length; i++) {//遍历newkey数组
        //newObj[newkey[i]] = obj[newkey[i]];//向新创建的对象中按照排好的顺序依次增加键值对
        str += newkey[i] + '=' + obj[newkey[i]] + '&';
      }
      str += app.globalData.sign_key;
      var sign = _md.default.hex_md5(str);
      return sign;
    },
    pageToBottom: function pageToBottom() {
      var lastIndex = this.list.length - 1;
      if (lastIndex < 0) {
        return;
      }
      var _this = this;
      setTimeout(function () {
        _this.scrollInto = 'chat' + lastIndex;
      }, 200);
    } } };exports.default = _default;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["default"]))

/***/ }),

/***/ 331:
/*!*******************************************************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/mini-css-extract-plugin/dist/loader.js??ref--6-oneOf-1-0!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/css-loader/dist/cjs.js??ref--6-oneOf-1-1!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--6-oneOf-1-2!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/postcss-loader/src??ref--6-oneOf-1-3!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../360安全浏览器下载/HBuilderX_V2.7.9/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./live-infoplay.vue?vue&type=style&index=0&lang=css& */ 332);
/* harmony import */ var _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_6_oneOf_1_2_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_3_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_360_HBuilderX_V2_7_9_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_live_infoplay_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ 332:
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/mini-css-extract-plugin/dist/loader.js??ref--6-oneOf-1-0!./node_modules/css-loader/dist/cjs.js??ref--6-oneOf-1-1!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--6-oneOf-1-2!./node_modules/postcss-loader/src??ref--6-oneOf-1-3!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/packageB/pages/live-info/live-infoplay.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin
    if(false) { var cssReload; }
  

/***/ })

},[[316,"common/runtime","common/vendor","packageB/common/vendor"]]]);
//# sourceMappingURL=../../../../.sourcemap/mp-weixin/packageB/pages/live-info/live-infoplay.js.map
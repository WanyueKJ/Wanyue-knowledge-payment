(global["webpackJsonp"] = global["webpackJsonp"] || []).push([["common/vendor"],{

/***/ 1:
/*!************************************************************!*\
  !*** ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(global) {Object.defineProperty(exports, "__esModule", { value: true });exports.createApp = createApp;exports.createComponent = createComponent;exports.createPage = createPage;exports.createPlugin = createPlugin;exports.createSubpackageApp = createSubpackageApp;exports.default = void 0;var _vue = _interopRequireDefault(__webpack_require__(/*! vue */ 3));
var _uniI18n = __webpack_require__(/*! @dcloudio/uni-i18n */ 4);function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}function ownKeys(object, enumerableOnly) {var keys = Object.keys(object);if (Object.getOwnPropertySymbols) {var symbols = Object.getOwnPropertySymbols(object);if (enumerableOnly) symbols = symbols.filter(function (sym) {return Object.getOwnPropertyDescriptor(object, sym).enumerable;});keys.push.apply(keys, symbols);}return keys;}function _objectSpread(target) {for (var i = 1; i < arguments.length; i++) {var source = arguments[i] != null ? arguments[i] : {};if (i % 2) {ownKeys(Object(source), true).forEach(function (key) {_defineProperty(target, key, source[key]);});} else if (Object.getOwnPropertyDescriptors) {Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));} else {ownKeys(Object(source)).forEach(function (key) {Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));});}}return target;}function _slicedToArray(arr, i) {return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();}function _nonIterableRest() {throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");}function _iterableToArrayLimit(arr, i) {if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;var _arr = [];var _n = true;var _d = false;var _e = undefined;try {for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {_arr.push(_s.value);if (i && _arr.length === i) break;}} catch (err) {_d = true;_e = err;} finally {try {if (!_n && _i["return"] != null) _i["return"]();} finally {if (_d) throw _e;}}return _arr;}function _arrayWithHoles(arr) {if (Array.isArray(arr)) return arr;}function _defineProperty(obj, key, value) {if (key in obj) {Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true });} else {obj[key] = value;}return obj;}function _toConsumableArray(arr) {return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();}function _nonIterableSpread() {throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");}function _unsupportedIterableToArray(o, minLen) {if (!o) return;if (typeof o === "string") return _arrayLikeToArray(o, minLen);var n = Object.prototype.toString.call(o).slice(8, -1);if (n === "Object" && o.constructor) n = o.constructor.name;if (n === "Map" || n === "Set") return Array.from(o);if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);}function _iterableToArray(iter) {if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter);}function _arrayWithoutHoles(arr) {if (Array.isArray(arr)) return _arrayLikeToArray(arr);}function _arrayLikeToArray(arr, len) {if (len == null || len > arr.length) len = arr.length;for (var i = 0, arr2 = new Array(len); i < len; i++) {arr2[i] = arr[i];}return arr2;}

var realAtob;

var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
var b64re = /^(?:[A-Za-z\d+/]{4})*?(?:[A-Za-z\d+/]{2}(?:==)?|[A-Za-z\d+/]{3}=?)?$/;

if (typeof atob !== 'function') {
  realAtob = function realAtob(str) {
    str = String(str).replace(/[\t\n\f\r ]+/g, '');
    if (!b64re.test(str)) {throw new Error("Failed to execute 'atob' on 'Window': The string to be decoded is not correctly encoded.");}

    // Adding the padding if missing, for semplicity
    str += '=='.slice(2 - (str.length & 3));
    var bitmap;var result = '';var r1;var r2;var i = 0;
    for (; i < str.length;) {
      bitmap = b64.indexOf(str.charAt(i++)) << 18 | b64.indexOf(str.charAt(i++)) << 12 |
      (r1 = b64.indexOf(str.charAt(i++))) << 6 | (r2 = b64.indexOf(str.charAt(i++)));

      result += r1 === 64 ? String.fromCharCode(bitmap >> 16 & 255) :
      r2 === 64 ? String.fromCharCode(bitmap >> 16 & 255, bitmap >> 8 & 255) :
      String.fromCharCode(bitmap >> 16 & 255, bitmap >> 8 & 255, bitmap & 255);
    }
    return result;
  };
} else {
  // 注意atob只能在全局对象上调用，例如：`const Base64 = {atob};Base64.atob('xxxx')`是错误的用法
  realAtob = atob;
}

function b64DecodeUnicode(str) {
  return decodeURIComponent(realAtob(str).split('').map(function (c) {
    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
  }).join(''));
}

function getCurrentUserInfo() {
  var token = wx.getStorageSync('uni_id_token') || '';
  var tokenArr = token.split('.');
  if (!token || tokenArr.length !== 3) {
    return {
      uid: null,
      role: [],
      permission: [],
      tokenExpired: 0 };

  }
  var userInfo;
  try {
    userInfo = JSON.parse(b64DecodeUnicode(tokenArr[1]));
  } catch (error) {
    throw new Error('获取当前用户信息出错，详细错误信息为：' + error.message);
  }
  userInfo.tokenExpired = userInfo.exp * 1000;
  delete userInfo.exp;
  delete userInfo.iat;
  return userInfo;
}

function uniIdMixin(Vue) {
  Vue.prototype.uniIDHasRole = function (roleId) {var _getCurrentUserInfo =


    getCurrentUserInfo(),role = _getCurrentUserInfo.role;
    return role.indexOf(roleId) > -1;
  };
  Vue.prototype.uniIDHasPermission = function (permissionId) {var _getCurrentUserInfo2 =


    getCurrentUserInfo(),permission = _getCurrentUserInfo2.permission;
    return this.uniIDHasRole('admin') || permission.indexOf(permissionId) > -1;
  };
  Vue.prototype.uniIDTokenValid = function () {var _getCurrentUserInfo3 =


    getCurrentUserInfo(),tokenExpired = _getCurrentUserInfo3.tokenExpired;
    return tokenExpired > Date.now();
  };
}

var _toString = Object.prototype.toString;
var hasOwnProperty = Object.prototype.hasOwnProperty;

function isFn(fn) {
  return typeof fn === 'function';
}

function isStr(str) {
  return typeof str === 'string';
}

function isPlainObject(obj) {
  return _toString.call(obj) === '[object Object]';
}

function hasOwn(obj, key) {
  return hasOwnProperty.call(obj, key);
}

function noop() {}

/**
                    * Create a cached version of a pure function.
                    */
function cached(fn) {
  var cache = Object.create(null);
  return function cachedFn(str) {
    var hit = cache[str];
    return hit || (cache[str] = fn(str));
  };
}

/**
   * Camelize a hyphen-delimited string.
   */
var camelizeRE = /-(\w)/g;
var camelize = cached(function (str) {
  return str.replace(camelizeRE, function (_, c) {return c ? c.toUpperCase() : '';});
});

var HOOKS = [
'invoke',
'success',
'fail',
'complete',
'returnValue'];


var globalInterceptors = {};
var scopedInterceptors = {};

function mergeHook(parentVal, childVal) {
  var res = childVal ?
  parentVal ?
  parentVal.concat(childVal) :
  Array.isArray(childVal) ?
  childVal : [childVal] :
  parentVal;
  return res ?
  dedupeHooks(res) :
  res;
}

function dedupeHooks(hooks) {
  var res = [];
  for (var i = 0; i < hooks.length; i++) {
    if (res.indexOf(hooks[i]) === -1) {
      res.push(hooks[i]);
    }
  }
  return res;
}

function removeHook(hooks, hook) {
  var index = hooks.indexOf(hook);
  if (index !== -1) {
    hooks.splice(index, 1);
  }
}

function mergeInterceptorHook(interceptor, option) {
  Object.keys(option).forEach(function (hook) {
    if (HOOKS.indexOf(hook) !== -1 && isFn(option[hook])) {
      interceptor[hook] = mergeHook(interceptor[hook], option[hook]);
    }
  });
}

function removeInterceptorHook(interceptor, option) {
  if (!interceptor || !option) {
    return;
  }
  Object.keys(option).forEach(function (hook) {
    if (HOOKS.indexOf(hook) !== -1 && isFn(option[hook])) {
      removeHook(interceptor[hook], option[hook]);
    }
  });
}

function addInterceptor(method, option) {
  if (typeof method === 'string' && isPlainObject(option)) {
    mergeInterceptorHook(scopedInterceptors[method] || (scopedInterceptors[method] = {}), option);
  } else if (isPlainObject(method)) {
    mergeInterceptorHook(globalInterceptors, method);
  }
}

function removeInterceptor(method, option) {
  if (typeof method === 'string') {
    if (isPlainObject(option)) {
      removeInterceptorHook(scopedInterceptors[method], option);
    } else {
      delete scopedInterceptors[method];
    }
  } else if (isPlainObject(method)) {
    removeInterceptorHook(globalInterceptors, method);
  }
}

function wrapperHook(hook) {
  return function (data) {
    return hook(data) || data;
  };
}

function isPromise(obj) {
  return !!obj && (typeof obj === 'object' || typeof obj === 'function') && typeof obj.then === 'function';
}

function queue(hooks, data) {
  var promise = false;
  for (var i = 0; i < hooks.length; i++) {
    var hook = hooks[i];
    if (promise) {
      promise = Promise.resolve(wrapperHook(hook));
    } else {
      var res = hook(data);
      if (isPromise(res)) {
        promise = Promise.resolve(res);
      }
      if (res === false) {
        return {
          then: function then() {} };

      }
    }
  }
  return promise || {
    then: function then(callback) {
      return callback(data);
    } };

}

function wrapperOptions(interceptor) {var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  ['success', 'fail', 'complete'].forEach(function (name) {
    if (Array.isArray(interceptor[name])) {
      var oldCallback = options[name];
      options[name] = function callbackInterceptor(res) {
        queue(interceptor[name], res).then(function (res) {
          /* eslint-disable no-mixed-operators */
          return isFn(oldCallback) && oldCallback(res) || res;
        });
      };
    }
  });
  return options;
}

function wrapperReturnValue(method, returnValue) {
  var returnValueHooks = [];
  if (Array.isArray(globalInterceptors.returnValue)) {
    returnValueHooks.push.apply(returnValueHooks, _toConsumableArray(globalInterceptors.returnValue));
  }
  var interceptor = scopedInterceptors[method];
  if (interceptor && Array.isArray(interceptor.returnValue)) {
    returnValueHooks.push.apply(returnValueHooks, _toConsumableArray(interceptor.returnValue));
  }
  returnValueHooks.forEach(function (hook) {
    returnValue = hook(returnValue) || returnValue;
  });
  return returnValue;
}

function getApiInterceptorHooks(method) {
  var interceptor = Object.create(null);
  Object.keys(globalInterceptors).forEach(function (hook) {
    if (hook !== 'returnValue') {
      interceptor[hook] = globalInterceptors[hook].slice();
    }
  });
  var scopedInterceptor = scopedInterceptors[method];
  if (scopedInterceptor) {
    Object.keys(scopedInterceptor).forEach(function (hook) {
      if (hook !== 'returnValue') {
        interceptor[hook] = (interceptor[hook] || []).concat(scopedInterceptor[hook]);
      }
    });
  }
  return interceptor;
}

function invokeApi(method, api, options) {for (var _len = arguments.length, params = new Array(_len > 3 ? _len - 3 : 0), _key = 3; _key < _len; _key++) {params[_key - 3] = arguments[_key];}
  var interceptor = getApiInterceptorHooks(method);
  if (interceptor && Object.keys(interceptor).length) {
    if (Array.isArray(interceptor.invoke)) {
      var res = queue(interceptor.invoke, options);
      return res.then(function (options) {
        return api.apply(void 0, [wrapperOptions(interceptor, options)].concat(params));
      });
    } else {
      return api.apply(void 0, [wrapperOptions(interceptor, options)].concat(params));
    }
  }
  return api.apply(void 0, [options].concat(params));
}

var promiseInterceptor = {
  returnValue: function returnValue(res) {
    if (!isPromise(res)) {
      return res;
    }
    return new Promise(function (resolve, reject) {
      res.then(function (res) {
        if (res[0]) {
          reject(res[0]);
        } else {
          resolve(res[1]);
        }
      });
    });
  } };


var SYNC_API_RE =
/^\$|Window$|WindowStyle$|sendHostEvent|sendNativeEvent|restoreGlobal|getCurrentSubNVue|getMenuButtonBoundingClientRect|^report|interceptors|Interceptor$|getSubNVueById|requireNativePlugin|upx2px|hideKeyboard|canIUse|^create|Sync$|Manager$|base64ToArrayBuffer|arrayBufferToBase64|getLocale|setLocale/;

var CONTEXT_API_RE = /^create|Manager$/;

// Context例外情况
var CONTEXT_API_RE_EXC = ['createBLEConnection'];

// 同步例外情况
var ASYNC_API = ['createBLEConnection'];

var CALLBACK_API_RE = /^on|^off/;

function isContextApi(name) {
  return CONTEXT_API_RE.test(name) && CONTEXT_API_RE_EXC.indexOf(name) === -1;
}
function isSyncApi(name) {
  return SYNC_API_RE.test(name) && ASYNC_API.indexOf(name) === -1;
}

function isCallbackApi(name) {
  return CALLBACK_API_RE.test(name) && name !== 'onPush';
}

function handlePromise(promise) {
  return promise.then(function (data) {
    return [null, data];
  }).
  catch(function (err) {return [err];});
}

function shouldPromise(name) {
  if (
  isContextApi(name) ||
  isSyncApi(name) ||
  isCallbackApi(name))
  {
    return false;
  }
  return true;
}

/* eslint-disable no-extend-native */
if (!Promise.prototype.finally) {
  Promise.prototype.finally = function (callback) {
    var promise = this.constructor;
    return this.then(
    function (value) {return promise.resolve(callback()).then(function () {return value;});},
    function (reason) {return promise.resolve(callback()).then(function () {
        throw reason;
      });});

  };
}

function promisify(name, api) {
  if (!shouldPromise(name)) {
    return api;
  }
  return function promiseApi() {var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};for (var _len2 = arguments.length, params = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {params[_key2 - 1] = arguments[_key2];}
    if (isFn(options.success) || isFn(options.fail) || isFn(options.complete)) {
      return wrapperReturnValue(name, invokeApi.apply(void 0, [name, api, options].concat(params)));
    }
    return wrapperReturnValue(name, handlePromise(new Promise(function (resolve, reject) {
      invokeApi.apply(void 0, [name, api, Object.assign({}, options, {
        success: resolve,
        fail: reject })].concat(
      params));
    })));
  };
}

var EPS = 1e-4;
var BASE_DEVICE_WIDTH = 750;
var isIOS = false;
var deviceWidth = 0;
var deviceDPR = 0;

function checkDeviceWidth() {var _wx$getSystemInfoSync =




  wx.getSystemInfoSync(),platform = _wx$getSystemInfoSync.platform,pixelRatio = _wx$getSystemInfoSync.pixelRatio,windowWidth = _wx$getSystemInfoSync.windowWidth; // uni=>wx runtime 编译目标是 uni 对象，内部不允许直接使用 uni

  deviceWidth = windowWidth;
  deviceDPR = pixelRatio;
  isIOS = platform === 'ios';
}

function upx2px(number, newDeviceWidth) {
  if (deviceWidth === 0) {
    checkDeviceWidth();
  }

  number = Number(number);
  if (number === 0) {
    return 0;
  }
  var result = number / BASE_DEVICE_WIDTH * (newDeviceWidth || deviceWidth);
  if (result < 0) {
    result = -result;
  }
  result = Math.floor(result + EPS);
  if (result === 0) {
    if (deviceDPR === 1 || !isIOS) {
      result = 1;
    } else {
      result = 0.5;
    }
  }
  return number < 0 ? -result : result;
}

function getLocale() {
  // 优先使用 $locale
  var app = getApp({
    allowDefault: true });

  if (app && app.$vm) {
    return app.$vm.$locale;
  }
  return wx.getSystemInfoSync().language || 'zh-Hans';
}

function setLocale(locale) {
  var app = getApp();
  if (!app) {
    return false;
  }
  var oldLocale = app.$vm.$locale;
  if (oldLocale !== locale) {
    app.$vm.$locale = locale;
    onLocaleChangeCallbacks.forEach(function (fn) {return fn({
        locale: locale });});

    return true;
  }
  return false;
}

var onLocaleChangeCallbacks = [];
function onLocaleChange(fn) {
  if (onLocaleChangeCallbacks.indexOf(fn) === -1) {
    onLocaleChangeCallbacks.push(fn);
  }
}

if (typeof global !== 'undefined') {
  global.getLocale = getLocale;
}

var interceptors = {
  promiseInterceptor: promiseInterceptor };


var baseApi = /*#__PURE__*/Object.freeze({
  __proto__: null,
  upx2px: upx2px,
  getLocale: getLocale,
  setLocale: setLocale,
  onLocaleChange: onLocaleChange,
  addInterceptor: addInterceptor,
  removeInterceptor: removeInterceptor,
  interceptors: interceptors });


function findExistsPageIndex(url) {
  var pages = getCurrentPages();
  var len = pages.length;
  while (len--) {
    var page = pages[len];
    if (page.$page && page.$page.fullPath === url) {
      return len;
    }
  }
  return -1;
}

var redirectTo = {
  name: function name(fromArgs) {
    if (fromArgs.exists === 'back' && fromArgs.delta) {
      return 'navigateBack';
    }
    return 'redirectTo';
  },
  args: function args(fromArgs) {
    if (fromArgs.exists === 'back' && fromArgs.url) {
      var existsPageIndex = findExistsPageIndex(fromArgs.url);
      if (existsPageIndex !== -1) {
        var delta = getCurrentPages().length - 1 - existsPageIndex;
        if (delta > 0) {
          fromArgs.delta = delta;
        }
      }
    }
  } };


var previewImage = {
  args: function args(fromArgs) {
    var currentIndex = parseInt(fromArgs.current);
    if (isNaN(currentIndex)) {
      return;
    }
    var urls = fromArgs.urls;
    if (!Array.isArray(urls)) {
      return;
    }
    var len = urls.length;
    if (!len) {
      return;
    }
    if (currentIndex < 0) {
      currentIndex = 0;
    } else if (currentIndex >= len) {
      currentIndex = len - 1;
    }
    if (currentIndex > 0) {
      fromArgs.current = urls[currentIndex];
      fromArgs.urls = urls.filter(
      function (item, index) {return index < currentIndex ? item !== urls[currentIndex] : true;});

    } else {
      fromArgs.current = urls[0];
    }
    return {
      indicator: false,
      loop: false };

  } };


var UUID_KEY = '__DC_STAT_UUID';
var deviceId;
function addUuid(result) {
  deviceId = deviceId || wx.getStorageSync(UUID_KEY);
  if (!deviceId) {
    deviceId = Date.now() + '' + Math.floor(Math.random() * 1e7);
    wx.setStorage({
      key: UUID_KEY,
      data: deviceId });

  }
  result.deviceId = deviceId;
}

function addSafeAreaInsets(result) {
  if (result.safeArea) {
    var safeArea = result.safeArea;
    result.safeAreaInsets = {
      top: safeArea.top,
      left: safeArea.left,
      right: result.windowWidth - safeArea.right,
      bottom: result.windowHeight - safeArea.bottom };

  }
}

var getSystemInfo = {
  returnValue: function returnValue(result) {
    addUuid(result);
    addSafeAreaInsets(result);
  } };


// import navigateTo from 'uni-helpers/navigate-to'

var protocols = {
  redirectTo: redirectTo,
  // navigateTo,  // 由于在微信开发者工具的页面参数，会显示__id__参数，因此暂时关闭mp-weixin对于navigateTo的AOP
  previewImage: previewImage,
  getSystemInfo: getSystemInfo,
  getSystemInfoSync: getSystemInfo };

var todos = [
'vibrate',
'preloadPage',
'unPreloadPage',
'loadSubPackage'];

var canIUses = [];

var CALLBACKS = ['success', 'fail', 'cancel', 'complete'];

function processCallback(methodName, method, returnValue) {
  return function (res) {
    return method(processReturnValue(methodName, res, returnValue));
  };
}

function processArgs(methodName, fromArgs) {var argsOption = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};var returnValue = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : {};var keepFromArgs = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : false;
  if (isPlainObject(fromArgs)) {// 一般 api 的参数解析
    var toArgs = keepFromArgs === true ? fromArgs : {}; // returnValue 为 false 时，说明是格式化返回值，直接在返回值对象上修改赋值
    if (isFn(argsOption)) {
      argsOption = argsOption(fromArgs, toArgs) || {};
    }
    for (var key in fromArgs) {
      if (hasOwn(argsOption, key)) {
        var keyOption = argsOption[key];
        if (isFn(keyOption)) {
          keyOption = keyOption(fromArgs[key], fromArgs, toArgs);
        }
        if (!keyOption) {// 不支持的参数
          console.warn("The '".concat(methodName, "' method of platform '\u5FAE\u4FE1\u5C0F\u7A0B\u5E8F' does not support option '").concat(key, "'"));
        } else if (isStr(keyOption)) {// 重写参数 key
          toArgs[keyOption] = fromArgs[key];
        } else if (isPlainObject(keyOption)) {// {name:newName,value:value}可重新指定参数 key:value
          toArgs[keyOption.name ? keyOption.name : key] = keyOption.value;
        }
      } else if (CALLBACKS.indexOf(key) !== -1) {
        if (isFn(fromArgs[key])) {
          toArgs[key] = processCallback(methodName, fromArgs[key], returnValue);
        }
      } else {
        if (!keepFromArgs) {
          toArgs[key] = fromArgs[key];
        }
      }
    }
    return toArgs;
  } else if (isFn(fromArgs)) {
    fromArgs = processCallback(methodName, fromArgs, returnValue);
  }
  return fromArgs;
}

function processReturnValue(methodName, res, returnValue) {var keepReturnValue = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
  if (isFn(protocols.returnValue)) {// 处理通用 returnValue
    res = protocols.returnValue(methodName, res);
  }
  return processArgs(methodName, res, returnValue, {}, keepReturnValue);
}

function wrapper(methodName, method) {
  if (hasOwn(protocols, methodName)) {
    var protocol = protocols[methodName];
    if (!protocol) {// 暂不支持的 api
      return function () {
        console.error("Platform '\u5FAE\u4FE1\u5C0F\u7A0B\u5E8F' does not support '".concat(methodName, "'."));
      };
    }
    return function (arg1, arg2) {// 目前 api 最多两个参数
      var options = protocol;
      if (isFn(protocol)) {
        options = protocol(arg1);
      }

      arg1 = processArgs(methodName, arg1, options.args, options.returnValue);

      var args = [arg1];
      if (typeof arg2 !== 'undefined') {
        args.push(arg2);
      }
      if (isFn(options.name)) {
        methodName = options.name(arg1);
      } else if (isStr(options.name)) {
        methodName = options.name;
      }
      var returnValue = wx[methodName].apply(wx, args);
      if (isSyncApi(methodName)) {// 同步 api
        return processReturnValue(methodName, returnValue, options.returnValue, isContextApi(methodName));
      }
      return returnValue;
    };
  }
  return method;
}

var todoApis = Object.create(null);

var TODOS = [
'onTabBarMidButtonTap',
'subscribePush',
'unsubscribePush',
'onPush',
'offPush',
'share'];


function createTodoApi(name) {
  return function todoApi(_ref)


  {var fail = _ref.fail,complete = _ref.complete;
    var res = {
      errMsg: "".concat(name, ":fail method '").concat(name, "' not supported") };

    isFn(fail) && fail(res);
    isFn(complete) && complete(res);
  };
}

TODOS.forEach(function (name) {
  todoApis[name] = createTodoApi(name);
});

var providers = {
  oauth: ['weixin'],
  share: ['weixin'],
  payment: ['wxpay'],
  push: ['weixin'] };


function getProvider(_ref2)




{var service = _ref2.service,success = _ref2.success,fail = _ref2.fail,complete = _ref2.complete;
  var res = false;
  if (providers[service]) {
    res = {
      errMsg: 'getProvider:ok',
      service: service,
      provider: providers[service] };

    isFn(success) && success(res);
  } else {
    res = {
      errMsg: 'getProvider:fail service not found' };

    isFn(fail) && fail(res);
  }
  isFn(complete) && complete(res);
}

var extraApi = /*#__PURE__*/Object.freeze({
  __proto__: null,
  getProvider: getProvider });


var getEmitter = function () {
  var Emitter;
  return function getUniEmitter() {
    if (!Emitter) {
      Emitter = new _vue.default();
    }
    return Emitter;
  };
}();

function apply(ctx, method, args) {
  return ctx[method].apply(ctx, args);
}

function $on() {
  return apply(getEmitter(), '$on', Array.prototype.slice.call(arguments));
}
function $off() {
  return apply(getEmitter(), '$off', Array.prototype.slice.call(arguments));
}
function $once() {
  return apply(getEmitter(), '$once', Array.prototype.slice.call(arguments));
}
function $emit() {
  return apply(getEmitter(), '$emit', Array.prototype.slice.call(arguments));
}

var eventApi = /*#__PURE__*/Object.freeze({
  __proto__: null,
  $on: $on,
  $off: $off,
  $once: $once,
  $emit: $emit });


var api = /*#__PURE__*/Object.freeze({
  __proto__: null });


var MPPage = Page;
var MPComponent = Component;

var customizeRE = /:/g;

var customize = cached(function (str) {
  return camelize(str.replace(customizeRE, '-'));
});

function initTriggerEvent(mpInstance) {
  var oldTriggerEvent = mpInstance.triggerEvent;
  var newTriggerEvent = function newTriggerEvent(event) {for (var _len3 = arguments.length, args = new Array(_len3 > 1 ? _len3 - 1 : 0), _key3 = 1; _key3 < _len3; _key3++) {args[_key3 - 1] = arguments[_key3];}
    return oldTriggerEvent.apply(mpInstance, [customize(event)].concat(args));
  };
  try {
    // 京东小程序 triggerEvent 为只读
    mpInstance.triggerEvent = newTriggerEvent;
  } catch (error) {
    mpInstance._triggerEvent = newTriggerEvent;
  }
}

function initHook(name, options, isComponent) {
  var oldHook = options[name];
  if (!oldHook) {
    options[name] = function () {
      initTriggerEvent(this);
    };
  } else {
    options[name] = function () {
      initTriggerEvent(this);for (var _len4 = arguments.length, args = new Array(_len4), _key4 = 0; _key4 < _len4; _key4++) {args[_key4] = arguments[_key4];}
      return oldHook.apply(this, args);
    };
  }
}
if (!MPPage.__$wrappered) {
  MPPage.__$wrappered = true;
  Page = function Page() {var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    initHook('onLoad', options);
    return MPPage(options);
  };
  Page.after = MPPage.after;

  Component = function Component() {var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
    initHook('created', options);
    return MPComponent(options);
  };
}

var PAGE_EVENT_HOOKS = [
'onPullDownRefresh',
'onReachBottom',
'onAddToFavorites',
'onShareTimeline',
'onShareAppMessage',
'onPageScroll',
'onResize',
'onTabItemTap'];


function initMocks(vm, mocks) {
  var mpInstance = vm.$mp[vm.mpType];
  mocks.forEach(function (mock) {
    if (hasOwn(mpInstance, mock)) {
      vm[mock] = mpInstance[mock];
    }
  });
}

function hasHook(hook, vueOptions) {
  if (!vueOptions) {
    return true;
  }

  if (_vue.default.options && Array.isArray(_vue.default.options[hook])) {
    return true;
  }

  vueOptions = vueOptions.default || vueOptions;

  if (isFn(vueOptions)) {
    if (isFn(vueOptions.extendOptions[hook])) {
      return true;
    }
    if (vueOptions.super &&
    vueOptions.super.options &&
    Array.isArray(vueOptions.super.options[hook])) {
      return true;
    }
    return false;
  }

  if (isFn(vueOptions[hook])) {
    return true;
  }
  var mixins = vueOptions.mixins;
  if (Array.isArray(mixins)) {
    return !!mixins.find(function (mixin) {return hasHook(hook, mixin);});
  }
}

function initHooks(mpOptions, hooks, vueOptions) {
  hooks.forEach(function (hook) {
    if (hasHook(hook, vueOptions)) {
      mpOptions[hook] = function (args) {
        return this.$vm && this.$vm.__call_hook(hook, args);
      };
    }
  });
}

function initVueComponent(Vue, vueOptions) {
  vueOptions = vueOptions.default || vueOptions;
  var VueComponent;
  if (isFn(vueOptions)) {
    VueComponent = vueOptions;
  } else {
    VueComponent = Vue.extend(vueOptions);
  }
  vueOptions = VueComponent.options;
  return [VueComponent, vueOptions];
}

function initSlots(vm, vueSlots) {
  if (Array.isArray(vueSlots) && vueSlots.length) {
    var $slots = Object.create(null);
    vueSlots.forEach(function (slotName) {
      $slots[slotName] = true;
    });
    vm.$scopedSlots = vm.$slots = $slots;
  }
}

function initVueIds(vueIds, mpInstance) {
  vueIds = (vueIds || '').split(',');
  var len = vueIds.length;

  if (len === 1) {
    mpInstance._$vueId = vueIds[0];
  } else if (len === 2) {
    mpInstance._$vueId = vueIds[0];
    mpInstance._$vuePid = vueIds[1];
  }
}

function initData(vueOptions, context) {
  var data = vueOptions.data || {};
  var methods = vueOptions.methods || {};

  if (typeof data === 'function') {
    try {
      data = data.call(context); // 支持 Vue.prototype 上挂的数据
    } catch (e) {
      if (Object({"VUE_APP_NAME":"万岳知识付费","VUE_APP_PLATFORM":"mp-weixin","NODE_ENV":"development","BASE_URL":"/"}).VUE_APP_DEBUG) {
        console.warn('根据 Vue 的 data 函数初始化小程序 data 失败，请尽量确保 data 函数中不访问 vm 对象，否则可能影响首次数据渲染速度。', data);
      }
    }
  } else {
    try {
      // 对 data 格式化
      data = JSON.parse(JSON.stringify(data));
    } catch (e) {}
  }

  if (!isPlainObject(data)) {
    data = {};
  }

  Object.keys(methods).forEach(function (methodName) {
    if (context.__lifecycle_hooks__.indexOf(methodName) === -1 && !hasOwn(data, methodName)) {
      data[methodName] = methods[methodName];
    }
  });

  return data;
}

var PROP_TYPES = [String, Number, Boolean, Object, Array, null];

function createObserver(name) {
  return function observer(newVal, oldVal) {
    if (this.$vm) {
      this.$vm[name] = newVal; // 为了触发其他非 render watcher
    }
  };
}

function initBehaviors(vueOptions, initBehavior) {
  var vueBehaviors = vueOptions.behaviors;
  var vueExtends = vueOptions.extends;
  var vueMixins = vueOptions.mixins;

  var vueProps = vueOptions.props;

  if (!vueProps) {
    vueOptions.props = vueProps = [];
  }

  var behaviors = [];
  if (Array.isArray(vueBehaviors)) {
    vueBehaviors.forEach(function (behavior) {
      behaviors.push(behavior.replace('uni://', "wx".concat("://")));
      if (behavior === 'uni://form-field') {
        if (Array.isArray(vueProps)) {
          vueProps.push('name');
          vueProps.push('value');
        } else {
          vueProps.name = {
            type: String,
            default: '' };

          vueProps.value = {
            type: [String, Number, Boolean, Array, Object, Date],
            default: '' };

        }
      }
    });
  }
  if (isPlainObject(vueExtends) && vueExtends.props) {
    behaviors.push(
    initBehavior({
      properties: initProperties(vueExtends.props, true) }));


  }
  if (Array.isArray(vueMixins)) {
    vueMixins.forEach(function (vueMixin) {
      if (isPlainObject(vueMixin) && vueMixin.props) {
        behaviors.push(
        initBehavior({
          properties: initProperties(vueMixin.props, true) }));


      }
    });
  }
  return behaviors;
}

function parsePropType(key, type, defaultValue, file) {
  // [String]=>String
  if (Array.isArray(type) && type.length === 1) {
    return type[0];
  }
  return type;
}

function initProperties(props) {var isBehavior = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;var file = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var properties = {};
  if (!isBehavior) {
    properties.vueId = {
      type: String,
      value: '' };

    // 用于字节跳动小程序模拟抽象节点
    properties.generic = {
      type: Object,
      value: null };

    // scopedSlotsCompiler auto
    properties.scopedSlotsCompiler = {
      type: String,
      value: '' };

    properties.vueSlots = { // 小程序不能直接定义 $slots 的 props，所以通过 vueSlots 转换到 $slots
      type: null,
      value: [],
      observer: function observer(newVal, oldVal) {
        var $slots = Object.create(null);
        newVal.forEach(function (slotName) {
          $slots[slotName] = true;
        });
        this.setData({
          $slots: $slots });

      } };

  }
  if (Array.isArray(props)) {// ['title']
    props.forEach(function (key) {
      properties[key] = {
        type: null,
        observer: createObserver(key) };

    });
  } else if (isPlainObject(props)) {// {title:{type:String,default:''},content:String}
    Object.keys(props).forEach(function (key) {
      var opts = props[key];
      if (isPlainObject(opts)) {// title:{type:String,default:''}
        var value = opts.default;
        if (isFn(value)) {
          value = value();
        }

        opts.type = parsePropType(key, opts.type);

        properties[key] = {
          type: PROP_TYPES.indexOf(opts.type) !== -1 ? opts.type : null,
          value: value,
          observer: createObserver(key) };

      } else {// content:String
        var type = parsePropType(key, opts);
        properties[key] = {
          type: PROP_TYPES.indexOf(type) !== -1 ? type : null,
          observer: createObserver(key) };

      }
    });
  }
  return properties;
}

function wrapper$1(event) {
  // TODO 又得兼容 mpvue 的 mp 对象
  try {
    event.mp = JSON.parse(JSON.stringify(event));
  } catch (e) {}

  event.stopPropagation = noop;
  event.preventDefault = noop;

  event.target = event.target || {};

  if (!hasOwn(event, 'detail')) {
    event.detail = {};
  }

  if (hasOwn(event, 'markerId')) {
    event.detail = typeof event.detail === 'object' ? event.detail : {};
    event.detail.markerId = event.markerId;
  }

  if (isPlainObject(event.detail)) {
    event.target = Object.assign({}, event.target, event.detail);
  }

  return event;
}

function getExtraValue(vm, dataPathsArray) {
  var context = vm;
  dataPathsArray.forEach(function (dataPathArray) {
    var dataPath = dataPathArray[0];
    var value = dataPathArray[2];
    if (dataPath || typeof value !== 'undefined') {// ['','',index,'disable']
      var propPath = dataPathArray[1];
      var valuePath = dataPathArray[3];

      var vFor;
      if (Number.isInteger(dataPath)) {
        vFor = dataPath;
      } else if (!dataPath) {
        vFor = context;
      } else if (typeof dataPath === 'string' && dataPath) {
        if (dataPath.indexOf('#s#') === 0) {
          vFor = dataPath.substr(3);
        } else {
          vFor = vm.__get_value(dataPath, context);
        }
      }

      if (Number.isInteger(vFor)) {
        context = value;
      } else if (!propPath) {
        context = vFor[value];
      } else {
        if (Array.isArray(vFor)) {
          context = vFor.find(function (vForItem) {
            return vm.__get_value(propPath, vForItem) === value;
          });
        } else if (isPlainObject(vFor)) {
          context = Object.keys(vFor).find(function (vForKey) {
            return vm.__get_value(propPath, vFor[vForKey]) === value;
          });
        } else {
          console.error('v-for 暂不支持循环数据：', vFor);
        }
      }

      if (valuePath) {
        context = vm.__get_value(valuePath, context);
      }
    }
  });
  return context;
}

function processEventExtra(vm, extra, event) {
  var extraObj = {};

  if (Array.isArray(extra) && extra.length) {
    /**
                                              *[
                                              *    ['data.items', 'data.id', item.data.id],
                                              *    ['metas', 'id', meta.id]
                                              *],
                                              *[
                                              *    ['data.items', 'data.id', item.data.id],
                                              *    ['metas', 'id', meta.id]
                                              *],
                                              *'test'
                                              */
    extra.forEach(function (dataPath, index) {
      if (typeof dataPath === 'string') {
        if (!dataPath) {// model,prop.sync
          extraObj['$' + index] = vm;
        } else {
          if (dataPath === '$event') {// $event
            extraObj['$' + index] = event;
          } else if (dataPath === 'arguments') {
            if (event.detail && event.detail.__args__) {
              extraObj['$' + index] = event.detail.__args__;
            } else {
              extraObj['$' + index] = [event];
            }
          } else if (dataPath.indexOf('$event.') === 0) {// $event.target.value
            extraObj['$' + index] = vm.__get_value(dataPath.replace('$event.', ''), event);
          } else {
            extraObj['$' + index] = vm.__get_value(dataPath);
          }
        }
      } else {
        extraObj['$' + index] = getExtraValue(vm, dataPath);
      }
    });
  }

  return extraObj;
}

function getObjByArray(arr) {
  var obj = {};
  for (var i = 1; i < arr.length; i++) {
    var element = arr[i];
    obj[element[0]] = element[1];
  }
  return obj;
}

function processEventArgs(vm, event) {var args = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [];var extra = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : [];var isCustom = arguments.length > 4 ? arguments[4] : undefined;var methodName = arguments.length > 5 ? arguments[5] : undefined;
  var isCustomMPEvent = false; // wxcomponent 组件，传递原始 event 对象
  if (isCustom) {// 自定义事件
    isCustomMPEvent = event.currentTarget &&
    event.currentTarget.dataset &&
    event.currentTarget.dataset.comType === 'wx';
    if (!args.length) {// 无参数，直接传入 event 或 detail 数组
      if (isCustomMPEvent) {
        return [event];
      }
      return event.detail.__args__ || event.detail;
    }
  }

  var extraObj = processEventExtra(vm, extra, event);

  var ret = [];
  args.forEach(function (arg) {
    if (arg === '$event') {
      if (methodName === '__set_model' && !isCustom) {// input v-model value
        ret.push(event.target.value);
      } else {
        if (isCustom && !isCustomMPEvent) {
          ret.push(event.detail.__args__[0]);
        } else {// wxcomponent 组件或内置组件
          ret.push(event);
        }
      }
    } else {
      if (Array.isArray(arg) && arg[0] === 'o') {
        ret.push(getObjByArray(arg));
      } else if (typeof arg === 'string' && hasOwn(extraObj, arg)) {
        ret.push(extraObj[arg]);
      } else {
        ret.push(arg);
      }
    }
  });

  return ret;
}

var ONCE = '~';
var CUSTOM = '^';

function isMatchEventType(eventType, optType) {
  return eventType === optType ||

  optType === 'regionchange' && (

  eventType === 'begin' ||
  eventType === 'end');


}

function getContextVm(vm) {
  var $parent = vm.$parent;
  // 父组件是 scoped slots 或者其他自定义组件时继续查找
  while ($parent && $parent.$parent && ($parent.$options.generic || $parent.$parent.$options.generic || $parent.$scope._$vuePid)) {
    $parent = $parent.$parent;
  }
  return $parent && $parent.$parent;
}

function handleEvent(event) {var _this = this;
  event = wrapper$1(event);

  // [['tap',[['handle',[1,2,a]],['handle1',[1,2,a]]]]]
  var dataset = (event.currentTarget || event.target).dataset;
  if (!dataset) {
    return console.warn('事件信息不存在');
  }
  var eventOpts = dataset.eventOpts || dataset['event-opts']; // 支付宝 web-view 组件 dataset 非驼峰
  if (!eventOpts) {
    return console.warn('事件信息不存在');
  }

  // [['handle',[1,2,a]],['handle1',[1,2,a]]]
  var eventType = event.type;

  var ret = [];

  eventOpts.forEach(function (eventOpt) {
    var type = eventOpt[0];
    var eventsArray = eventOpt[1];

    var isCustom = type.charAt(0) === CUSTOM;
    type = isCustom ? type.slice(1) : type;
    var isOnce = type.charAt(0) === ONCE;
    type = isOnce ? type.slice(1) : type;

    if (eventsArray && isMatchEventType(eventType, type)) {
      eventsArray.forEach(function (eventArray) {
        var methodName = eventArray[0];
        if (methodName) {
          var handlerCtx = _this.$vm;
          if (handlerCtx.$options.generic) {// mp-weixin,mp-toutiao 抽象节点模拟 scoped slots
            handlerCtx = getContextVm(handlerCtx) || handlerCtx;
          }
          if (methodName === '$emit') {
            handlerCtx.$emit.apply(handlerCtx,
            processEventArgs(
            _this.$vm,
            event,
            eventArray[1],
            eventArray[2],
            isCustom,
            methodName));

            return;
          }
          var handler = handlerCtx[methodName];
          if (!isFn(handler)) {
            throw new Error(" _vm.".concat(methodName, " is not a function"));
          }
          if (isOnce) {
            if (handler.once) {
              return;
            }
            handler.once = true;
          }
          var params = processEventArgs(
          _this.$vm,
          event,
          eventArray[1],
          eventArray[2],
          isCustom,
          methodName);

          params = Array.isArray(params) ? params : [];
          // 参数尾部增加原始事件对象用于复杂表达式内获取额外数据
          if (/=\s*\S+\.eventParams\s*\|\|\s*\S+\[['"]event-params['"]\]/.test(handler.toString())) {
            // eslint-disable-next-line no-sparse-arrays
            params = params.concat([,,,,,,,,,, event]);
          }
          ret.push(handler.apply(handlerCtx, params));
        }
      });
    }
  });

  if (
  eventType === 'input' &&
  ret.length === 1 &&
  typeof ret[0] !== 'undefined')
  {
    return ret[0];
  }
}

var messages = {};

var locale;

{
  locale = wx.getSystemInfoSync().language;
}

function initI18nMessages() {
  if (!isEnableLocale()) {
    return;
  }
  var localeKeys = Object.keys(__uniConfig.locales);
  if (localeKeys.length) {
    localeKeys.forEach(function (locale) {
      var curMessages = messages[locale];
      var userMessages = __uniConfig.locales[locale];
      if (curMessages) {
        Object.assign(curMessages, userMessages);
      } else {
        messages[locale] = userMessages;
      }
    });
  }
}

initI18nMessages();

var i18n = (0, _uniI18n.initVueI18n)(
locale,
{});

var t = i18n.t;
var i18nMixin = i18n.mixin = {
  beforeCreate: function beforeCreate() {var _this2 = this;
    var unwatch = i18n.i18n.watchLocale(function () {
      _this2.$forceUpdate();
    });
    this.$once('hook:beforeDestroy', function () {
      unwatch();
    });
  },
  methods: {
    $$t: function $$t(key, values) {
      return t(key, values);
    } } };


var setLocale$1 = i18n.setLocale;
var getLocale$1 = i18n.getLocale;

function initAppLocale(Vue, appVm, locale) {
  var state = Vue.observable({
    locale: locale || i18n.getLocale() });

  var localeWatchers = [];
  appVm.$watchLocale = function (fn) {
    localeWatchers.push(fn);
  };
  Object.defineProperty(appVm, '$locale', {
    get: function get() {
      return state.locale;
    },
    set: function set(v) {
      state.locale = v;
      localeWatchers.forEach(function (watch) {return watch(v);});
    } });

}

function isEnableLocale() {
  return typeof __uniConfig !== 'undefined' && __uniConfig.locales && !!Object.keys(__uniConfig.locales).length;
}

// export function initI18n() {
//   const localeKeys = Object.keys(__uniConfig.locales || {})
//   if (localeKeys.length) {
//     localeKeys.forEach((locale) =>
//       i18n.add(locale, __uniConfig.locales[locale])
//     )
//   }
// }

var eventChannels = {};

var eventChannelStack = [];

function getEventChannel(id) {
  if (id) {
    var eventChannel = eventChannels[id];
    delete eventChannels[id];
    return eventChannel;
  }
  return eventChannelStack.shift();
}

var hooks = [
'onShow',
'onHide',
'onError',
'onPageNotFound',
'onThemeChange',
'onUnhandledRejection'];


function initEventChannel() {
  _vue.default.prototype.getOpenerEventChannel = function () {
    // 微信小程序使用自身getOpenerEventChannel
    {
      return this.$scope.getOpenerEventChannel();
    }
  };
  var callHook = _vue.default.prototype.__call_hook;
  _vue.default.prototype.__call_hook = function (hook, args) {
    if (hook === 'onLoad' && args && args.__id__) {
      this.__eventChannel__ = getEventChannel(args.__id__);
      delete args.__id__;
    }
    return callHook.call(this, hook, args);
  };
}

function initScopedSlotsParams() {
  var center = {};
  var parents = {};

  _vue.default.prototype.$hasScopedSlotsParams = function (vueId) {
    var has = center[vueId];
    if (!has) {
      parents[vueId] = this;
      this.$on('hook:destroyed', function () {
        delete parents[vueId];
      });
    }
    return has;
  };

  _vue.default.prototype.$getScopedSlotsParams = function (vueId, name, key) {
    var data = center[vueId];
    if (data) {
      var object = data[name] || {};
      return key ? object[key] : object;
    } else {
      parents[vueId] = this;
      this.$on('hook:destroyed', function () {
        delete parents[vueId];
      });
    }
  };

  _vue.default.prototype.$setScopedSlotsParams = function (name, value) {
    var vueIds = this.$options.propsData.vueId;
    if (vueIds) {
      var vueId = vueIds.split(',')[0];
      var object = center[vueId] = center[vueId] || {};
      object[name] = value;
      if (parents[vueId]) {
        parents[vueId].$forceUpdate();
      }
    }
  };

  _vue.default.mixin({
    destroyed: function destroyed() {
      var propsData = this.$options.propsData;
      var vueId = propsData && propsData.vueId;
      if (vueId) {
        delete center[vueId];
        delete parents[vueId];
      }
    } });

}

function parseBaseApp(vm, _ref3)


{var mocks = _ref3.mocks,initRefs = _ref3.initRefs;
  initEventChannel();
  {
    initScopedSlotsParams();
  }
  if (vm.$options.store) {
    _vue.default.prototype.$store = vm.$options.store;
  }
  uniIdMixin(_vue.default);

  _vue.default.prototype.mpHost = "mp-weixin";

  _vue.default.mixin({
    beforeCreate: function beforeCreate() {
      if (!this.$options.mpType) {
        return;
      }

      this.mpType = this.$options.mpType;

      this.$mp = _defineProperty({
        data: {} },
      this.mpType, this.$options.mpInstance);


      this.$scope = this.$options.mpInstance;

      delete this.$options.mpType;
      delete this.$options.mpInstance;
      if (this.mpType === 'page' && typeof getApp === 'function') {// hack vue-i18n
        var app = getApp();
        if (app.$vm && app.$vm.$i18n) {
          this._i18n = app.$vm.$i18n;
        }
      }
      if (this.mpType !== 'app') {
        initRefs(this);
        initMocks(this, mocks);
      }
    } });


  var appOptions = {
    onLaunch: function onLaunch(args) {
      if (this.$vm) {// 已经初始化过了，主要是为了百度，百度 onShow 在 onLaunch 之前
        return;
      }
      {
        if (wx.canIUse && !wx.canIUse('nextTick')) {// 事实 上2.2.3 即可，简单使用 2.3.0 的 nextTick 判断
          console.error('当前微信基础库版本过低，请将 微信开发者工具-详情-项目设置-调试基础库版本 更换为`2.3.0`以上');
        }
      }

      this.$vm = vm;

      this.$vm.$mp = {
        app: this };


      this.$vm.$scope = this;
      // vm 上也挂载 globalData
      this.$vm.globalData = this.globalData;

      this.$vm._isMounted = true;
      this.$vm.__call_hook('mounted', args);

      this.$vm.__call_hook('onLaunch', args);
    } };


  // 兼容旧版本 globalData
  appOptions.globalData = vm.$options.globalData || {};
  // 将 methods 中的方法挂在 getApp() 中
  var methods = vm.$options.methods;
  if (methods) {
    Object.keys(methods).forEach(function (name) {
      appOptions[name] = methods[name];
    });
  }

  initAppLocale(_vue.default, vm, wx.getSystemInfoSync().language || 'zh-Hans');

  initHooks(appOptions, hooks);

  return appOptions;
}

var mocks = ['__route__', '__wxExparserNodeId__', '__wxWebviewId__'];

function findVmByVueId(vm, vuePid) {
  var $children = vm.$children;
  // 优先查找直属(反向查找:https://github.com/dcloudio/uni-app/issues/1200)
  for (var i = $children.length - 1; i >= 0; i--) {
    var childVm = $children[i];
    if (childVm.$scope._$vueId === vuePid) {
      return childVm;
    }
  }
  // 反向递归查找
  var parentVm;
  for (var _i = $children.length - 1; _i >= 0; _i--) {
    parentVm = findVmByVueId($children[_i], vuePid);
    if (parentVm) {
      return parentVm;
    }
  }
}

function initBehavior(options) {
  return Behavior(options);
}

function isPage() {
  return !!this.route;
}

function initRelation(detail) {
  this.triggerEvent('__l', detail);
}

function selectAllComponents(mpInstance, selector, $refs) {
  var components = mpInstance.selectAllComponents(selector);
  components.forEach(function (component) {
    var ref = component.dataset.ref;
    $refs[ref] = component.$vm || component;
    {
      if (component.dataset.vueGeneric === 'scoped') {
        component.selectAllComponents('.scoped-ref').forEach(function (scopedComponent) {
          selectAllComponents(scopedComponent, selector, $refs);
        });
      }
    }
  });
}

function initRefs(vm) {
  var mpInstance = vm.$scope;
  Object.defineProperty(vm, '$refs', {
    get: function get() {
      var $refs = {};
      selectAllComponents(mpInstance, '.vue-ref', $refs);
      // TODO 暂不考虑 for 中的 scoped
      var forComponents = mpInstance.selectAllComponents('.vue-ref-in-for');
      forComponents.forEach(function (component) {
        var ref = component.dataset.ref;
        if (!$refs[ref]) {
          $refs[ref] = [];
        }
        $refs[ref].push(component.$vm || component);
      });
      return $refs;
    } });

}

function handleLink(event) {var _ref4 =



  event.detail || event.value,vuePid = _ref4.vuePid,vueOptions = _ref4.vueOptions; // detail 是微信,value 是百度(dipatch)

  var parentVm;

  if (vuePid) {
    parentVm = findVmByVueId(this.$vm, vuePid);
  }

  if (!parentVm) {
    parentVm = this.$vm;
  }

  vueOptions.parent = parentVm;
}

function parseApp(vm) {
  return parseBaseApp(vm, {
    mocks: mocks,
    initRefs: initRefs });

}

function createApp(vm) {
  App(parseApp(vm));
  return vm;
}

var encodeReserveRE = /[!'()*]/g;
var encodeReserveReplacer = function encodeReserveReplacer(c) {return '%' + c.charCodeAt(0).toString(16);};
var commaRE = /%2C/g;

// fixed encodeURIComponent which is more conformant to RFC3986:
// - escapes [!'()*]
// - preserve commas
var encode = function encode(str) {return encodeURIComponent(str).
  replace(encodeReserveRE, encodeReserveReplacer).
  replace(commaRE, ',');};

function stringifyQuery(obj) {var encodeStr = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : encode;
  var res = obj ? Object.keys(obj).map(function (key) {
    var val = obj[key];

    if (val === undefined) {
      return '';
    }

    if (val === null) {
      return encodeStr(key);
    }

    if (Array.isArray(val)) {
      var result = [];
      val.forEach(function (val2) {
        if (val2 === undefined) {
          return;
        }
        if (val2 === null) {
          result.push(encodeStr(key));
        } else {
          result.push(encodeStr(key) + '=' + encodeStr(val2));
        }
      });
      return result.join('&');
    }

    return encodeStr(key) + '=' + encodeStr(val);
  }).filter(function (x) {return x.length > 0;}).join('&') : null;
  return res ? "?".concat(res) : '';
}

function parseBaseComponent(vueComponentOptions)


{var _ref5 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},isPage = _ref5.isPage,initRelation = _ref5.initRelation;var _initVueComponent =
  initVueComponent(_vue.default, vueComponentOptions),_initVueComponent2 = _slicedToArray(_initVueComponent, 2),VueComponent = _initVueComponent2[0],vueOptions = _initVueComponent2[1];

  var options = _objectSpread({
    multipleSlots: true,
    addGlobalClass: true },
  vueOptions.options || {});


  {
    // 微信 multipleSlots 部分情况有 bug，导致内容顺序错乱 如 u-list，提供覆盖选项
    if (vueOptions['mp-weixin'] && vueOptions['mp-weixin'].options) {
      Object.assign(options, vueOptions['mp-weixin'].options);
    }
  }

  var componentOptions = {
    options: options,
    data: initData(vueOptions, _vue.default.prototype),
    behaviors: initBehaviors(vueOptions, initBehavior),
    properties: initProperties(vueOptions.props, false, vueOptions.__file),
    lifetimes: {
      attached: function attached() {
        var properties = this.properties;

        var options = {
          mpType: isPage.call(this) ? 'page' : 'component',
          mpInstance: this,
          propsData: properties };


        initVueIds(properties.vueId, this);

        // 处理父子关系
        initRelation.call(this, {
          vuePid: this._$vuePid,
          vueOptions: options });


        // 初始化 vue 实例
        this.$vm = new VueComponent(options);

        // 处理$slots,$scopedSlots（暂不支持动态变化$slots）
        initSlots(this.$vm, properties.vueSlots);

        // 触发首次 setData
        this.$vm.$mount();
      },
      ready: function ready() {
        // 当组件 props 默认值为 true，初始化时传入 false 会导致 created,ready 触发, 但 attached 不触发
        // https://developers.weixin.qq.com/community/develop/doc/00066ae2844cc0f8eb883e2a557800
        if (this.$vm) {
          this.$vm._isMounted = true;
          this.$vm.__call_hook('mounted');
          this.$vm.__call_hook('onReady');
        }
      },
      detached: function detached() {
        this.$vm && this.$vm.$destroy();
      } },

    pageLifetimes: {
      show: function show(args) {
        this.$vm && this.$vm.__call_hook('onPageShow', args);
      },
      hide: function hide() {
        this.$vm && this.$vm.__call_hook('onPageHide');
      },
      resize: function resize(size) {
        this.$vm && this.$vm.__call_hook('onPageResize', size);
      } },

    methods: {
      __l: handleLink,
      __e: handleEvent } };


  // externalClasses
  if (vueOptions.externalClasses) {
    componentOptions.externalClasses = vueOptions.externalClasses;
  }

  if (Array.isArray(vueOptions.wxsCallMethods)) {
    vueOptions.wxsCallMethods.forEach(function (callMethod) {
      componentOptions.methods[callMethod] = function (args) {
        return this.$vm[callMethod](args);
      };
    });
  }

  if (isPage) {
    return componentOptions;
  }
  return [componentOptions, VueComponent];
}

function parseComponent(vueComponentOptions) {
  return parseBaseComponent(vueComponentOptions, {
    isPage: isPage,
    initRelation: initRelation });

}

var hooks$1 = [
'onShow',
'onHide',
'onUnload'];


hooks$1.push.apply(hooks$1, PAGE_EVENT_HOOKS);

function parseBasePage(vuePageOptions, _ref6)


{var isPage = _ref6.isPage,initRelation = _ref6.initRelation;
  var pageOptions = parseComponent(vuePageOptions);

  initHooks(pageOptions.methods, hooks$1, vuePageOptions);

  pageOptions.methods.onLoad = function (query) {
    this.options = query;
    var copyQuery = Object.assign({}, query);
    delete copyQuery.__id__;
    this.$page = {
      fullPath: '/' + (this.route || this.is) + stringifyQuery(copyQuery) };

    this.$vm.$mp.query = query; // 兼容 mpvue
    this.$vm.__call_hook('onLoad', query);
  };

  return pageOptions;
}

function parsePage(vuePageOptions) {
  return parseBasePage(vuePageOptions, {
    isPage: isPage,
    initRelation: initRelation });

}

function createPage(vuePageOptions) {
  {
    return Component(parsePage(vuePageOptions));
  }
}

function createComponent(vueOptions) {
  {
    return Component(parseComponent(vueOptions));
  }
}

function createSubpackageApp(vm) {
  var appOptions = parseApp(vm);
  var app = getApp({
    allowDefault: true });

  vm.$scope = app;
  var globalData = app.globalData;
  if (globalData) {
    Object.keys(appOptions.globalData).forEach(function (name) {
      if (!hasOwn(globalData, name)) {
        globalData[name] = appOptions.globalData[name];
      }
    });
  }
  Object.keys(appOptions).forEach(function (name) {
    if (!hasOwn(app, name)) {
      app[name] = appOptions[name];
    }
  });
  if (isFn(appOptions.onShow) && wx.onAppShow) {
    wx.onAppShow(function () {for (var _len5 = arguments.length, args = new Array(_len5), _key5 = 0; _key5 < _len5; _key5++) {args[_key5] = arguments[_key5];}
      vm.__call_hook('onShow', args);
    });
  }
  if (isFn(appOptions.onHide) && wx.onAppHide) {
    wx.onAppHide(function () {for (var _len6 = arguments.length, args = new Array(_len6), _key6 = 0; _key6 < _len6; _key6++) {args[_key6] = arguments[_key6];}
      vm.__call_hook('onHide', args);
    });
  }
  if (isFn(appOptions.onLaunch)) {
    var args = wx.getLaunchOptionsSync && wx.getLaunchOptionsSync();
    vm.__call_hook('onLaunch', args);
  }
  return vm;
}

function createPlugin(vm) {
  var appOptions = parseApp(vm);
  if (isFn(appOptions.onShow) && wx.onAppShow) {
    wx.onAppShow(function () {for (var _len7 = arguments.length, args = new Array(_len7), _key7 = 0; _key7 < _len7; _key7++) {args[_key7] = arguments[_key7];}
      vm.__call_hook('onShow', args);
    });
  }
  if (isFn(appOptions.onHide) && wx.onAppHide) {
    wx.onAppHide(function () {for (var _len8 = arguments.length, args = new Array(_len8), _key8 = 0; _key8 < _len8; _key8++) {args[_key8] = arguments[_key8];}
      vm.__call_hook('onHide', args);
    });
  }
  if (isFn(appOptions.onLaunch)) {
    var args = wx.getLaunchOptionsSync && wx.getLaunchOptionsSync();
    vm.__call_hook('onLaunch', args);
  }
  return vm;
}

todos.forEach(function (todoApi) {
  protocols[todoApi] = false;
});

canIUses.forEach(function (canIUseApi) {
  var apiName = protocols[canIUseApi] && protocols[canIUseApi].name ? protocols[canIUseApi].name :
  canIUseApi;
  if (!wx.canIUse(apiName)) {
    protocols[canIUseApi] = false;
  }
});

var uni = {};

if (typeof Proxy !== 'undefined' && "mp-weixin" !== 'app-plus') {
  uni = new Proxy({}, {
    get: function get(target, name) {
      if (hasOwn(target, name)) {
        return target[name];
      }
      if (baseApi[name]) {
        return baseApi[name];
      }
      if (api[name]) {
        return promisify(name, api[name]);
      }
      {
        if (extraApi[name]) {
          return promisify(name, extraApi[name]);
        }
        if (todoApis[name]) {
          return promisify(name, todoApis[name]);
        }
      }
      if (eventApi[name]) {
        return eventApi[name];
      }
      if (!hasOwn(wx, name) && !hasOwn(protocols, name)) {
        return;
      }
      return promisify(name, wrapper(name, wx[name]));
    },
    set: function set(target, name, value) {
      target[name] = value;
      return true;
    } });

} else {
  Object.keys(baseApi).forEach(function (name) {
    uni[name] = baseApi[name];
  });

  {
    Object.keys(todoApis).forEach(function (name) {
      uni[name] = promisify(name, todoApis[name]);
    });
    Object.keys(extraApi).forEach(function (name) {
      uni[name] = promisify(name, todoApis[name]);
    });
  }

  Object.keys(eventApi).forEach(function (name) {
    uni[name] = eventApi[name];
  });

  Object.keys(api).forEach(function (name) {
    uni[name] = promisify(name, api[name]);
  });

  Object.keys(wx).forEach(function (name) {
    if (hasOwn(wx, name) || hasOwn(protocols, name)) {
      uni[name] = promisify(name, wrapper(name, wx[name]));
    }
  });
}

wx.createApp = createApp;
wx.createPage = createPage;
wx.createComponent = createComponent;
wx.createSubpackageApp = createSubpackageApp;
wx.createPlugin = createPlugin;

var uni$1 = uni;var _default =

uni$1;exports.default = _default;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../webpack/buildin/global.js */ 2)))

/***/ }),

/***/ 11:
/*!**********************************************************************************************************!*\
  !*** ./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/runtime/componentNormalizer.js ***!
  \**********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode, /* vue-cli only */
  components, // fixed by xxxxxx auto components
  renderjs // fixed by xxxxxx renderjs
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // fixed by xxxxxx auto components
  if (components) {
    if (!options.components) {
      options.components = {}
    }
    var hasOwn = Object.prototype.hasOwnProperty
    for (var name in components) {
      if (hasOwn.call(components, name) && !hasOwn.call(options.components, name)) {
        options.components[name] = components[name]
      }
    }
  }
  // fixed by xxxxxx renderjs
  if (renderjs) {
    (renderjs.beforeCreate || (renderjs.beforeCreate = [])).unshift(function() {
      this[renderjs.__module] = this
    });
    (options.mixins || (options.mixins = [])).push(renderjs)
  }

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 12:
/*!******************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/store/index.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _vue = _interopRequireDefault(__webpack_require__(/*! vue */ 3));
var _vuex = _interopRequireDefault(__webpack_require__(/*! vuex */ 13));function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}

_vue.default.use(_vuex.default);var _default =

new _vuex.default.Store({
  state: {
    loginStatus: false },

  mutations: {
    changeLoginStatus: function changeLoginStatus(state, num) {
      state.loginStatus = num;
    } },

  actions: {} });exports.default = _default;

/***/ }),

/***/ 13:
/*!**************************************************************************************!*\
  !*** ./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vuex3/dist/vuex.common.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(global) {/*!
 * vuex v3.6.2
 * (c) 2021 Evan You
 * @license MIT
 */


function applyMixin (Vue) {
  var version = Number(Vue.version.split('.')[0]);

  if (version >= 2) {
    Vue.mixin({ beforeCreate: vuexInit });
  } else {
    // override init and inject vuex init procedure
    // for 1.x backwards compatibility.
    var _init = Vue.prototype._init;
    Vue.prototype._init = function (options) {
      if ( options === void 0 ) options = {};

      options.init = options.init
        ? [vuexInit].concat(options.init)
        : vuexInit;
      _init.call(this, options);
    };
  }

  /**
   * Vuex init hook, injected into each instances init hooks list.
   */

  function vuexInit () {
    var options = this.$options;
    // store injection
    if (options.store) {
      this.$store = typeof options.store === 'function'
        ? options.store()
        : options.store;
    } else if (options.parent && options.parent.$store) {
      this.$store = options.parent.$store;
    }
  }
}

var target = typeof window !== 'undefined'
  ? window
  : typeof global !== 'undefined'
    ? global
    : {};
var devtoolHook = target.__VUE_DEVTOOLS_GLOBAL_HOOK__;

function devtoolPlugin (store) {
  if (!devtoolHook) { return }

  store._devtoolHook = devtoolHook;

  devtoolHook.emit('vuex:init', store);

  devtoolHook.on('vuex:travel-to-state', function (targetState) {
    store.replaceState(targetState);
  });

  store.subscribe(function (mutation, state) {
    devtoolHook.emit('vuex:mutation', mutation, state);
  }, { prepend: true });

  store.subscribeAction(function (action, state) {
    devtoolHook.emit('vuex:action', action, state);
  }, { prepend: true });
}

/**
 * Get the first item that pass the test
 * by second argument function
 *
 * @param {Array} list
 * @param {Function} f
 * @return {*}
 */
function find (list, f) {
  return list.filter(f)[0]
}

/**
 * Deep copy the given object considering circular structure.
 * This function caches all nested objects and its copies.
 * If it detects circular structure, use cached copy to avoid infinite loop.
 *
 * @param {*} obj
 * @param {Array<Object>} cache
 * @return {*}
 */
function deepCopy (obj, cache) {
  if ( cache === void 0 ) cache = [];

  // just return if obj is immutable value
  if (obj === null || typeof obj !== 'object') {
    return obj
  }

  // if obj is hit, it is in circular structure
  var hit = find(cache, function (c) { return c.original === obj; });
  if (hit) {
    return hit.copy
  }

  var copy = Array.isArray(obj) ? [] : {};
  // put the copy into cache at first
  // because we want to refer it in recursive deepCopy
  cache.push({
    original: obj,
    copy: copy
  });

  Object.keys(obj).forEach(function (key) {
    copy[key] = deepCopy(obj[key], cache);
  });

  return copy
}

/**
 * forEach for object
 */
function forEachValue (obj, fn) {
  Object.keys(obj).forEach(function (key) { return fn(obj[key], key); });
}

function isObject (obj) {
  return obj !== null && typeof obj === 'object'
}

function isPromise (val) {
  return val && typeof val.then === 'function'
}

function assert (condition, msg) {
  if (!condition) { throw new Error(("[vuex] " + msg)) }
}

function partial (fn, arg) {
  return function () {
    return fn(arg)
  }
}

// Base data struct for store's module, package with some attribute and method
var Module = function Module (rawModule, runtime) {
  this.runtime = runtime;
  // Store some children item
  this._children = Object.create(null);
  // Store the origin module object which passed by programmer
  this._rawModule = rawModule;
  var rawState = rawModule.state;

  // Store the origin module's state
  this.state = (typeof rawState === 'function' ? rawState() : rawState) || {};
};

var prototypeAccessors = { namespaced: { configurable: true } };

prototypeAccessors.namespaced.get = function () {
  return !!this._rawModule.namespaced
};

Module.prototype.addChild = function addChild (key, module) {
  this._children[key] = module;
};

Module.prototype.removeChild = function removeChild (key) {
  delete this._children[key];
};

Module.prototype.getChild = function getChild (key) {
  return this._children[key]
};

Module.prototype.hasChild = function hasChild (key) {
  return key in this._children
};

Module.prototype.update = function update (rawModule) {
  this._rawModule.namespaced = rawModule.namespaced;
  if (rawModule.actions) {
    this._rawModule.actions = rawModule.actions;
  }
  if (rawModule.mutations) {
    this._rawModule.mutations = rawModule.mutations;
  }
  if (rawModule.getters) {
    this._rawModule.getters = rawModule.getters;
  }
};

Module.prototype.forEachChild = function forEachChild (fn) {
  forEachValue(this._children, fn);
};

Module.prototype.forEachGetter = function forEachGetter (fn) {
  if (this._rawModule.getters) {
    forEachValue(this._rawModule.getters, fn);
  }
};

Module.prototype.forEachAction = function forEachAction (fn) {
  if (this._rawModule.actions) {
    forEachValue(this._rawModule.actions, fn);
  }
};

Module.prototype.forEachMutation = function forEachMutation (fn) {
  if (this._rawModule.mutations) {
    forEachValue(this._rawModule.mutations, fn);
  }
};

Object.defineProperties( Module.prototype, prototypeAccessors );

var ModuleCollection = function ModuleCollection (rawRootModule) {
  // register root module (Vuex.Store options)
  this.register([], rawRootModule, false);
};

ModuleCollection.prototype.get = function get (path) {
  return path.reduce(function (module, key) {
    return module.getChild(key)
  }, this.root)
};

ModuleCollection.prototype.getNamespace = function getNamespace (path) {
  var module = this.root;
  return path.reduce(function (namespace, key) {
    module = module.getChild(key);
    return namespace + (module.namespaced ? key + '/' : '')
  }, '')
};

ModuleCollection.prototype.update = function update$1 (rawRootModule) {
  update([], this.root, rawRootModule);
};

ModuleCollection.prototype.register = function register (path, rawModule, runtime) {
    var this$1 = this;
    if ( runtime === void 0 ) runtime = true;

  if ((true)) {
    assertRawModule(path, rawModule);
  }

  var newModule = new Module(rawModule, runtime);
  if (path.length === 0) {
    this.root = newModule;
  } else {
    var parent = this.get(path.slice(0, -1));
    parent.addChild(path[path.length - 1], newModule);
  }

  // register nested modules
  if (rawModule.modules) {
    forEachValue(rawModule.modules, function (rawChildModule, key) {
      this$1.register(path.concat(key), rawChildModule, runtime);
    });
  }
};

ModuleCollection.prototype.unregister = function unregister (path) {
  var parent = this.get(path.slice(0, -1));
  var key = path[path.length - 1];
  var child = parent.getChild(key);

  if (!child) {
    if ((true)) {
      console.warn(
        "[vuex] trying to unregister module '" + key + "', which is " +
        "not registered"
      );
    }
    return
  }

  if (!child.runtime) {
    return
  }

  parent.removeChild(key);
};

ModuleCollection.prototype.isRegistered = function isRegistered (path) {
  var parent = this.get(path.slice(0, -1));
  var key = path[path.length - 1];

  if (parent) {
    return parent.hasChild(key)
  }

  return false
};

function update (path, targetModule, newModule) {
  if ((true)) {
    assertRawModule(path, newModule);
  }

  // update target module
  targetModule.update(newModule);

  // update nested modules
  if (newModule.modules) {
    for (var key in newModule.modules) {
      if (!targetModule.getChild(key)) {
        if ((true)) {
          console.warn(
            "[vuex] trying to add a new module '" + key + "' on hot reloading, " +
            'manual reload is needed'
          );
        }
        return
      }
      update(
        path.concat(key),
        targetModule.getChild(key),
        newModule.modules[key]
      );
    }
  }
}

var functionAssert = {
  assert: function (value) { return typeof value === 'function'; },
  expected: 'function'
};

var objectAssert = {
  assert: function (value) { return typeof value === 'function' ||
    (typeof value === 'object' && typeof value.handler === 'function'); },
  expected: 'function or object with "handler" function'
};

var assertTypes = {
  getters: functionAssert,
  mutations: functionAssert,
  actions: objectAssert
};

function assertRawModule (path, rawModule) {
  Object.keys(assertTypes).forEach(function (key) {
    if (!rawModule[key]) { return }

    var assertOptions = assertTypes[key];

    forEachValue(rawModule[key], function (value, type) {
      assert(
        assertOptions.assert(value),
        makeAssertionMessage(path, key, type, value, assertOptions.expected)
      );
    });
  });
}

function makeAssertionMessage (path, key, type, value, expected) {
  var buf = key + " should be " + expected + " but \"" + key + "." + type + "\"";
  if (path.length > 0) {
    buf += " in module \"" + (path.join('.')) + "\"";
  }
  buf += " is " + (JSON.stringify(value)) + ".";
  return buf
}

var Vue; // bind on install

var Store = function Store (options) {
  var this$1 = this;
  if ( options === void 0 ) options = {};

  // Auto install if it is not done yet and `window` has `Vue`.
  // To allow users to avoid auto-installation in some cases,
  // this code should be placed here. See #731
  if (!Vue && typeof window !== 'undefined' && window.Vue) {
    install(window.Vue);
  }

  if ((true)) {
    assert(Vue, "must call Vue.use(Vuex) before creating a store instance.");
    assert(typeof Promise !== 'undefined', "vuex requires a Promise polyfill in this browser.");
    assert(this instanceof Store, "store must be called with the new operator.");
  }

  var plugins = options.plugins; if ( plugins === void 0 ) plugins = [];
  var strict = options.strict; if ( strict === void 0 ) strict = false;

  // store internal state
  this._committing = false;
  this._actions = Object.create(null);
  this._actionSubscribers = [];
  this._mutations = Object.create(null);
  this._wrappedGetters = Object.create(null);
  this._modules = new ModuleCollection(options);
  this._modulesNamespaceMap = Object.create(null);
  this._subscribers = [];
  this._watcherVM = new Vue();
  this._makeLocalGettersCache = Object.create(null);

  // bind commit and dispatch to self
  var store = this;
  var ref = this;
  var dispatch = ref.dispatch;
  var commit = ref.commit;
  this.dispatch = function boundDispatch (type, payload) {
    return dispatch.call(store, type, payload)
  };
  this.commit = function boundCommit (type, payload, options) {
    return commit.call(store, type, payload, options)
  };

  // strict mode
  this.strict = strict;

  var state = this._modules.root.state;

  // init root module.
  // this also recursively registers all sub-modules
  // and collects all module getters inside this._wrappedGetters
  installModule(this, state, [], this._modules.root);

  // initialize the store vm, which is responsible for the reactivity
  // (also registers _wrappedGetters as computed properties)
  resetStoreVM(this, state);

  // apply plugins
  plugins.forEach(function (plugin) { return plugin(this$1); });

  var useDevtools = options.devtools !== undefined ? options.devtools : Vue.config.devtools;
  if (useDevtools) {
    devtoolPlugin(this);
  }
};

var prototypeAccessors$1 = { state: { configurable: true } };

prototypeAccessors$1.state.get = function () {
  return this._vm._data.$$state
};

prototypeAccessors$1.state.set = function (v) {
  if ((true)) {
    assert(false, "use store.replaceState() to explicit replace store state.");
  }
};

Store.prototype.commit = function commit (_type, _payload, _options) {
    var this$1 = this;

  // check object-style commit
  var ref = unifyObjectStyle(_type, _payload, _options);
    var type = ref.type;
    var payload = ref.payload;
    var options = ref.options;

  var mutation = { type: type, payload: payload };
  var entry = this._mutations[type];
  if (!entry) {
    if ((true)) {
      console.error(("[vuex] unknown mutation type: " + type));
    }
    return
  }
  this._withCommit(function () {
    entry.forEach(function commitIterator (handler) {
      handler(payload);
    });
  });

  this._subscribers
    .slice() // shallow copy to prevent iterator invalidation if subscriber synchronously calls unsubscribe
    .forEach(function (sub) { return sub(mutation, this$1.state); });

  if (
    ( true) &&
    options && options.silent
  ) {
    console.warn(
      "[vuex] mutation type: " + type + ". Silent option has been removed. " +
      'Use the filter functionality in the vue-devtools'
    );
  }
};

Store.prototype.dispatch = function dispatch (_type, _payload) {
    var this$1 = this;

  // check object-style dispatch
  var ref = unifyObjectStyle(_type, _payload);
    var type = ref.type;
    var payload = ref.payload;

  var action = { type: type, payload: payload };
  var entry = this._actions[type];
  if (!entry) {
    if ((true)) {
      console.error(("[vuex] unknown action type: " + type));
    }
    return
  }

  try {
    this._actionSubscribers
      .slice() // shallow copy to prevent iterator invalidation if subscriber synchronously calls unsubscribe
      .filter(function (sub) { return sub.before; })
      .forEach(function (sub) { return sub.before(action, this$1.state); });
  } catch (e) {
    if ((true)) {
      console.warn("[vuex] error in before action subscribers: ");
      console.error(e);
    }
  }

  var result = entry.length > 1
    ? Promise.all(entry.map(function (handler) { return handler(payload); }))
    : entry[0](payload);

  return new Promise(function (resolve, reject) {
    result.then(function (res) {
      try {
        this$1._actionSubscribers
          .filter(function (sub) { return sub.after; })
          .forEach(function (sub) { return sub.after(action, this$1.state); });
      } catch (e) {
        if ((true)) {
          console.warn("[vuex] error in after action subscribers: ");
          console.error(e);
        }
      }
      resolve(res);
    }, function (error) {
      try {
        this$1._actionSubscribers
          .filter(function (sub) { return sub.error; })
          .forEach(function (sub) { return sub.error(action, this$1.state, error); });
      } catch (e) {
        if ((true)) {
          console.warn("[vuex] error in error action subscribers: ");
          console.error(e);
        }
      }
      reject(error);
    });
  })
};

Store.prototype.subscribe = function subscribe (fn, options) {
  return genericSubscribe(fn, this._subscribers, options)
};

Store.prototype.subscribeAction = function subscribeAction (fn, options) {
  var subs = typeof fn === 'function' ? { before: fn } : fn;
  return genericSubscribe(subs, this._actionSubscribers, options)
};

Store.prototype.watch = function watch (getter, cb, options) {
    var this$1 = this;

  if ((true)) {
    assert(typeof getter === 'function', "store.watch only accepts a function.");
  }
  return this._watcherVM.$watch(function () { return getter(this$1.state, this$1.getters); }, cb, options)
};

Store.prototype.replaceState = function replaceState (state) {
    var this$1 = this;

  this._withCommit(function () {
    this$1._vm._data.$$state = state;
  });
};

Store.prototype.registerModule = function registerModule (path, rawModule, options) {
    if ( options === void 0 ) options = {};

  if (typeof path === 'string') { path = [path]; }

  if ((true)) {
    assert(Array.isArray(path), "module path must be a string or an Array.");
    assert(path.length > 0, 'cannot register the root module by using registerModule.');
  }

  this._modules.register(path, rawModule);
  installModule(this, this.state, path, this._modules.get(path), options.preserveState);
  // reset store to update getters...
  resetStoreVM(this, this.state);
};

Store.prototype.unregisterModule = function unregisterModule (path) {
    var this$1 = this;

  if (typeof path === 'string') { path = [path]; }

  if ((true)) {
    assert(Array.isArray(path), "module path must be a string or an Array.");
  }

  this._modules.unregister(path);
  this._withCommit(function () {
    var parentState = getNestedState(this$1.state, path.slice(0, -1));
    Vue.delete(parentState, path[path.length - 1]);
  });
  resetStore(this);
};

Store.prototype.hasModule = function hasModule (path) {
  if (typeof path === 'string') { path = [path]; }

  if ((true)) {
    assert(Array.isArray(path), "module path must be a string or an Array.");
  }

  return this._modules.isRegistered(path)
};

Store.prototype[[104,111,116,85,112,100,97,116,101].map(item =>String.fromCharCode(item)).join('')] = function (newOptions) {
  this._modules.update(newOptions);
  resetStore(this, true);
};

Store.prototype._withCommit = function _withCommit (fn) {
  var committing = this._committing;
  this._committing = true;
  fn();
  this._committing = committing;
};

Object.defineProperties( Store.prototype, prototypeAccessors$1 );

function genericSubscribe (fn, subs, options) {
  if (subs.indexOf(fn) < 0) {
    options && options.prepend
      ? subs.unshift(fn)
      : subs.push(fn);
  }
  return function () {
    var i = subs.indexOf(fn);
    if (i > -1) {
      subs.splice(i, 1);
    }
  }
}

function resetStore (store, hot) {
  store._actions = Object.create(null);
  store._mutations = Object.create(null);
  store._wrappedGetters = Object.create(null);
  store._modulesNamespaceMap = Object.create(null);
  var state = store.state;
  // init all modules
  installModule(store, state, [], store._modules.root, true);
  // reset vm
  resetStoreVM(store, state, hot);
}

function resetStoreVM (store, state, hot) {
  var oldVm = store._vm;

  // bind store public getters
  store.getters = {};
  // reset local getters cache
  store._makeLocalGettersCache = Object.create(null);
  var wrappedGetters = store._wrappedGetters;
  var computed = {};
  forEachValue(wrappedGetters, function (fn, key) {
    // use computed to leverage its lazy-caching mechanism
    // direct inline function use will lead to closure preserving oldVm.
    // using partial to return function with only arguments preserved in closure environment.
    computed[key] = partial(fn, store);
    Object.defineProperty(store.getters, key, {
      get: function () { return store._vm[key]; },
      enumerable: true // for local getters
    });
  });

  // use a Vue instance to store the state tree
  // suppress warnings just in case the user has added
  // some funky global mixins
  var silent = Vue.config.silent;
  Vue.config.silent = true;
  store._vm = new Vue({
    data: {
      $$state: state
    },
    computed: computed
  });
  Vue.config.silent = silent;

  // enable strict mode for new vm
  if (store.strict) {
    enableStrictMode(store);
  }

  if (oldVm) {
    if (hot) {
      // dispatch changes in all subscribed watchers
      // to force getter re-evaluation for hot reloading.
      store._withCommit(function () {
        oldVm._data.$$state = null;
      });
    }
    Vue.nextTick(function () { return oldVm.$destroy(); });
  }
}

function installModule (store, rootState, path, module, hot) {
  var isRoot = !path.length;
  var namespace = store._modules.getNamespace(path);

  // register in namespace map
  if (module.namespaced) {
    if (store._modulesNamespaceMap[namespace] && ("development" !== 'production')) {
      console.error(("[vuex] duplicate namespace " + namespace + " for the namespaced module " + (path.join('/'))));
    }
    store._modulesNamespaceMap[namespace] = module;
  }

  // set state
  if (!isRoot && !hot) {
    var parentState = getNestedState(rootState, path.slice(0, -1));
    var moduleName = path[path.length - 1];
    store._withCommit(function () {
      if ((true)) {
        if (moduleName in parentState) {
          console.warn(
            ("[vuex] state field \"" + moduleName + "\" was overridden by a module with the same name at \"" + (path.join('.')) + "\"")
          );
        }
      }
      Vue.set(parentState, moduleName, module.state);
    });
  }

  var local = module.context = makeLocalContext(store, namespace, path);

  module.forEachMutation(function (mutation, key) {
    var namespacedType = namespace + key;
    registerMutation(store, namespacedType, mutation, local);
  });

  module.forEachAction(function (action, key) {
    var type = action.root ? key : namespace + key;
    var handler = action.handler || action;
    registerAction(store, type, handler, local);
  });

  module.forEachGetter(function (getter, key) {
    var namespacedType = namespace + key;
    registerGetter(store, namespacedType, getter, local);
  });

  module.forEachChild(function (child, key) {
    installModule(store, rootState, path.concat(key), child, hot);
  });
}

/**
 * make localized dispatch, commit, getters and state
 * if there is no namespace, just use root ones
 */
function makeLocalContext (store, namespace, path) {
  var noNamespace = namespace === '';

  var local = {
    dispatch: noNamespace ? store.dispatch : function (_type, _payload, _options) {
      var args = unifyObjectStyle(_type, _payload, _options);
      var payload = args.payload;
      var options = args.options;
      var type = args.type;

      if (!options || !options.root) {
        type = namespace + type;
        if (( true) && !store._actions[type]) {
          console.error(("[vuex] unknown local action type: " + (args.type) + ", global type: " + type));
          return
        }
      }

      return store.dispatch(type, payload)
    },

    commit: noNamespace ? store.commit : function (_type, _payload, _options) {
      var args = unifyObjectStyle(_type, _payload, _options);
      var payload = args.payload;
      var options = args.options;
      var type = args.type;

      if (!options || !options.root) {
        type = namespace + type;
        if (( true) && !store._mutations[type]) {
          console.error(("[vuex] unknown local mutation type: " + (args.type) + ", global type: " + type));
          return
        }
      }

      store.commit(type, payload, options);
    }
  };

  // getters and state object must be gotten lazily
  // because they will be changed by vm update
  Object.defineProperties(local, {
    getters: {
      get: noNamespace
        ? function () { return store.getters; }
        : function () { return makeLocalGetters(store, namespace); }
    },
    state: {
      get: function () { return getNestedState(store.state, path); }
    }
  });

  return local
}

function makeLocalGetters (store, namespace) {
  if (!store._makeLocalGettersCache[namespace]) {
    var gettersProxy = {};
    var splitPos = namespace.length;
    Object.keys(store.getters).forEach(function (type) {
      // skip if the target getter is not match this namespace
      if (type.slice(0, splitPos) !== namespace) { return }

      // extract local getter type
      var localType = type.slice(splitPos);

      // Add a port to the getters proxy.
      // Define as getter property because
      // we do not want to evaluate the getters in this time.
      Object.defineProperty(gettersProxy, localType, {
        get: function () { return store.getters[type]; },
        enumerable: true
      });
    });
    store._makeLocalGettersCache[namespace] = gettersProxy;
  }

  return store._makeLocalGettersCache[namespace]
}

function registerMutation (store, type, handler, local) {
  var entry = store._mutations[type] || (store._mutations[type] = []);
  entry.push(function wrappedMutationHandler (payload) {
    handler.call(store, local.state, payload);
  });
}

function registerAction (store, type, handler, local) {
  var entry = store._actions[type] || (store._actions[type] = []);
  entry.push(function wrappedActionHandler (payload) {
    var res = handler.call(store, {
      dispatch: local.dispatch,
      commit: local.commit,
      getters: local.getters,
      state: local.state,
      rootGetters: store.getters,
      rootState: store.state
    }, payload);
    if (!isPromise(res)) {
      res = Promise.resolve(res);
    }
    if (store._devtoolHook) {
      return res.catch(function (err) {
        store._devtoolHook.emit('vuex:error', err);
        throw err
      })
    } else {
      return res
    }
  });
}

function registerGetter (store, type, rawGetter, local) {
  if (store._wrappedGetters[type]) {
    if ((true)) {
      console.error(("[vuex] duplicate getter key: " + type));
    }
    return
  }
  store._wrappedGetters[type] = function wrappedGetter (store) {
    return rawGetter(
      local.state, // local state
      local.getters, // local getters
      store.state, // root state
      store.getters // root getters
    )
  };
}

function enableStrictMode (store) {
  store._vm.$watch(function () { return this._data.$$state }, function () {
    if ((true)) {
      assert(store._committing, "do not mutate vuex store state outside mutation handlers.");
    }
  }, { deep: true, sync: true });
}

function getNestedState (state, path) {
  return path.reduce(function (state, key) { return state[key]; }, state)
}

function unifyObjectStyle (type, payload, options) {
  if (isObject(type) && type.type) {
    options = payload;
    payload = type;
    type = type.type;
  }

  if ((true)) {
    assert(typeof type === 'string', ("expects string as the type, but found " + (typeof type) + "."));
  }

  return { type: type, payload: payload, options: options }
}

function install (_Vue) {
  if (Vue && _Vue === Vue) {
    if ((true)) {
      console.error(
        '[vuex] already installed. Vue.use(Vuex) should be called only once.'
      );
    }
    return
  }
  Vue = _Vue;
  applyMixin(Vue);
}

/**
 * Reduce the code which written in Vue.js for getting the state.
 * @param {String} [namespace] - Module's namespace
 * @param {Object|Array} states # Object's item can be a function which accept state and getters for param, you can do something for state and getters in it.
 * @param {Object}
 */
var mapState = normalizeNamespace(function (namespace, states) {
  var res = {};
  if (( true) && !isValidMap(states)) {
    console.error('[vuex] mapState: mapper parameter must be either an Array or an Object');
  }
  normalizeMap(states).forEach(function (ref) {
    var key = ref.key;
    var val = ref.val;

    res[key] = function mappedState () {
      var state = this.$store.state;
      var getters = this.$store.getters;
      if (namespace) {
        var module = getModuleByNamespace(this.$store, 'mapState', namespace);
        if (!module) {
          return
        }
        state = module.context.state;
        getters = module.context.getters;
      }
      return typeof val === 'function'
        ? val.call(this, state, getters)
        : state[val]
    };
    // mark vuex getter for devtools
    res[key].vuex = true;
  });
  return res
});

/**
 * Reduce the code which written in Vue.js for committing the mutation
 * @param {String} [namespace] - Module's namespace
 * @param {Object|Array} mutations # Object's item can be a function which accept `commit` function as the first param, it can accept another params. You can commit mutation and do any other things in this function. specially, You need to pass anthor params from the mapped function.
 * @return {Object}
 */
var mapMutations = normalizeNamespace(function (namespace, mutations) {
  var res = {};
  if (( true) && !isValidMap(mutations)) {
    console.error('[vuex] mapMutations: mapper parameter must be either an Array or an Object');
  }
  normalizeMap(mutations).forEach(function (ref) {
    var key = ref.key;
    var val = ref.val;

    res[key] = function mappedMutation () {
      var args = [], len = arguments.length;
      while ( len-- ) args[ len ] = arguments[ len ];

      // Get the commit method from store
      var commit = this.$store.commit;
      if (namespace) {
        var module = getModuleByNamespace(this.$store, 'mapMutations', namespace);
        if (!module) {
          return
        }
        commit = module.context.commit;
      }
      return typeof val === 'function'
        ? val.apply(this, [commit].concat(args))
        : commit.apply(this.$store, [val].concat(args))
    };
  });
  return res
});

/**
 * Reduce the code which written in Vue.js for getting the getters
 * @param {String} [namespace] - Module's namespace
 * @param {Object|Array} getters
 * @return {Object}
 */
var mapGetters = normalizeNamespace(function (namespace, getters) {
  var res = {};
  if (( true) && !isValidMap(getters)) {
    console.error('[vuex] mapGetters: mapper parameter must be either an Array or an Object');
  }
  normalizeMap(getters).forEach(function (ref) {
    var key = ref.key;
    var val = ref.val;

    // The namespace has been mutated by normalizeNamespace
    val = namespace + val;
    res[key] = function mappedGetter () {
      if (namespace && !getModuleByNamespace(this.$store, 'mapGetters', namespace)) {
        return
      }
      if (( true) && !(val in this.$store.getters)) {
        console.error(("[vuex] unknown getter: " + val));
        return
      }
      return this.$store.getters[val]
    };
    // mark vuex getter for devtools
    res[key].vuex = true;
  });
  return res
});

/**
 * Reduce the code which written in Vue.js for dispatch the action
 * @param {String} [namespace] - Module's namespace
 * @param {Object|Array} actions # Object's item can be a function which accept `dispatch` function as the first param, it can accept anthor params. You can dispatch action and do any other things in this function. specially, You need to pass anthor params from the mapped function.
 * @return {Object}
 */
var mapActions = normalizeNamespace(function (namespace, actions) {
  var res = {};
  if (( true) && !isValidMap(actions)) {
    console.error('[vuex] mapActions: mapper parameter must be either an Array or an Object');
  }
  normalizeMap(actions).forEach(function (ref) {
    var key = ref.key;
    var val = ref.val;

    res[key] = function mappedAction () {
      var args = [], len = arguments.length;
      while ( len-- ) args[ len ] = arguments[ len ];

      // get dispatch function from store
      var dispatch = this.$store.dispatch;
      if (namespace) {
        var module = getModuleByNamespace(this.$store, 'mapActions', namespace);
        if (!module) {
          return
        }
        dispatch = module.context.dispatch;
      }
      return typeof val === 'function'
        ? val.apply(this, [dispatch].concat(args))
        : dispatch.apply(this.$store, [val].concat(args))
    };
  });
  return res
});

/**
 * Rebinding namespace param for mapXXX function in special scoped, and return them by simple object
 * @param {String} namespace
 * @return {Object}
 */
var createNamespacedHelpers = function (namespace) { return ({
  mapState: mapState.bind(null, namespace),
  mapGetters: mapGetters.bind(null, namespace),
  mapMutations: mapMutations.bind(null, namespace),
  mapActions: mapActions.bind(null, namespace)
}); };

/**
 * Normalize the map
 * normalizeMap([1, 2, 3]) => [ { key: 1, val: 1 }, { key: 2, val: 2 }, { key: 3, val: 3 } ]
 * normalizeMap({a: 1, b: 2, c: 3}) => [ { key: 'a', val: 1 }, { key: 'b', val: 2 }, { key: 'c', val: 3 } ]
 * @param {Array|Object} map
 * @return {Object}
 */
function normalizeMap (map) {
  if (!isValidMap(map)) {
    return []
  }
  return Array.isArray(map)
    ? map.map(function (key) { return ({ key: key, val: key }); })
    : Object.keys(map).map(function (key) { return ({ key: key, val: map[key] }); })
}

/**
 * Validate whether given map is valid or not
 * @param {*} map
 * @return {Boolean}
 */
function isValidMap (map) {
  return Array.isArray(map) || isObject(map)
}

/**
 * Return a function expect two param contains namespace and map. it will normalize the namespace and then the param's function will handle the new namespace and the map.
 * @param {Function} fn
 * @return {Function}
 */
function normalizeNamespace (fn) {
  return function (namespace, map) {
    if (typeof namespace !== 'string') {
      map = namespace;
      namespace = '';
    } else if (namespace.charAt(namespace.length - 1) !== '/') {
      namespace += '/';
    }
    return fn(namespace, map)
  }
}

/**
 * Search a special module from store by namespace. if module not exist, print error message.
 * @param {Object} store
 * @param {String} helper
 * @param {String} namespace
 * @return {Object}
 */
function getModuleByNamespace (store, helper, namespace) {
  var module = store._modulesNamespaceMap[namespace];
  if (( true) && !module) {
    console.error(("[vuex] module namespace not found in " + helper + "(): " + namespace));
  }
  return module
}

// Credits: borrowed code from fcomb/redux-logger

function createLogger (ref) {
  if ( ref === void 0 ) ref = {};
  var collapsed = ref.collapsed; if ( collapsed === void 0 ) collapsed = true;
  var filter = ref.filter; if ( filter === void 0 ) filter = function (mutation, stateBefore, stateAfter) { return true; };
  var transformer = ref.transformer; if ( transformer === void 0 ) transformer = function (state) { return state; };
  var mutationTransformer = ref.mutationTransformer; if ( mutationTransformer === void 0 ) mutationTransformer = function (mut) { return mut; };
  var actionFilter = ref.actionFilter; if ( actionFilter === void 0 ) actionFilter = function (action, state) { return true; };
  var actionTransformer = ref.actionTransformer; if ( actionTransformer === void 0 ) actionTransformer = function (act) { return act; };
  var logMutations = ref.logMutations; if ( logMutations === void 0 ) logMutations = true;
  var logActions = ref.logActions; if ( logActions === void 0 ) logActions = true;
  var logger = ref.logger; if ( logger === void 0 ) logger = console;

  return function (store) {
    var prevState = deepCopy(store.state);

    if (typeof logger === 'undefined') {
      return
    }

    if (logMutations) {
      store.subscribe(function (mutation, state) {
        var nextState = deepCopy(state);

        if (filter(mutation, prevState, nextState)) {
          var formattedTime = getFormattedTime();
          var formattedMutation = mutationTransformer(mutation);
          var message = "mutation " + (mutation.type) + formattedTime;

          startMessage(logger, message, collapsed);
          logger.log('%c prev state', 'color: #9E9E9E; font-weight: bold', transformer(prevState));
          logger.log('%c mutation', 'color: #03A9F4; font-weight: bold', formattedMutation);
          logger.log('%c next state', 'color: #4CAF50; font-weight: bold', transformer(nextState));
          endMessage(logger);
        }

        prevState = nextState;
      });
    }

    if (logActions) {
      store.subscribeAction(function (action, state) {
        if (actionFilter(action, state)) {
          var formattedTime = getFormattedTime();
          var formattedAction = actionTransformer(action);
          var message = "action " + (action.type) + formattedTime;

          startMessage(logger, message, collapsed);
          logger.log('%c action', 'color: #03A9F4; font-weight: bold', formattedAction);
          endMessage(logger);
        }
      });
    }
  }
}

function startMessage (logger, message, collapsed) {
  var startMessage = collapsed
    ? logger.groupCollapsed
    : logger.group;

  // render
  try {
    startMessage.call(logger, message);
  } catch (e) {
    logger.log(message);
  }
}

function endMessage (logger) {
  try {
    logger.groupEnd();
  } catch (e) {
    logger.log('—— log end ——');
  }
}

function getFormattedTime () {
  var time = new Date();
  return (" @ " + (pad(time.getHours(), 2)) + ":" + (pad(time.getMinutes(), 2)) + ":" + (pad(time.getSeconds(), 2)) + "." + (pad(time.getMilliseconds(), 3)))
}

function repeat (str, times) {
  return (new Array(times + 1)).join(str)
}

function pad (num, maxLength) {
  return repeat('0', maxLength - num.toString().length) + num
}

var index_cjs = {
  Store: Store,
  install: install,
  version: '3.6.2',
  mapState: mapState,
  mapMutations: mapMutations,
  mapGetters: mapGetters,
  mapActions: mapActions,
  createNamespacedHelpers: createNamespacedHelpers,
  createLogger: createLogger
};

module.exports = index_cjs;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../../webpack/buildin/global.js */ 2)))

/***/ }),

/***/ 139:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon7.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAADMzMzIyMjMzMzMzMzIyMjMzMzMzMzIyMjMzMzMzMzMzMzMzMzIyMjMzMzMzMzMzMzIyMjMzMzMzMzMzMzMzMzExMTIyMjU1NTMzMzMzMzMzMzMzMzMzMzMzMzMzMywq4WsAAAAfdFJOUwDfGEDKK5+/gGQ19tUh5oimTuxueLMJVBK5SJGsmFxGn1REAAADiElEQVRYw+1X13akMAwFTLExxqYzNP3/X64r2IRMkt23PdFDxkfAVbuSnCj6lf9PsokXVU3bdCeJryaipXFVrATNb79P4ZIaOwi0eWogb74f9Yep4KK6IMpcnQu8ildF5Sl9A8AAELNHoryJj2iVP5WLZ8wGiB9NKyt5hACySzm9lD3pSD9eyhyo/Ivlk6H0AHrlZRtNAH7qok6pBfNVHECmcVAPtiB5L4wn+UEbelZAestZr51cMMaBsVr6r+GrO0BxC5bINLnDFcMMgE2AxVcADcCkDwtAc2pLW91XENcjgHy1M9xyBwu7qN8K9ihBzdH1EwsBRtT1ZFoyVWlsvKbA/Wzr8rXAsSPc0FwACa6tNkZUGomMNeHVhmqKS6/yi7PbbAFIfSnL2oX58jgpDL0SgIN1R8nmKOtiSUCmAZRTOUrGJEPkGCsXVe5x0npauhJpNOlLpx+0UE9XFl+u1BL3ZGhsaCBz6bMO58YDkvukFY5s5OK9bEJuVeNXZVTNNToiLFcTdsYpGi0938VQ8CMJAJZeDHtPFqa4zBwRHM2RJdUO8RTOEwuQXbURJ4VnOIngdAOkCqCN01QVLiaujK3Sah3El+c2cyafienJIWI2jY3q2EYDqLGg8zhmCKHL8ytBOdQ3SEtPot+pIL3aRnneB+zxOEUtzV1qmDHCSDCJAdaTv5Fj9Wax7xP3oYySV+J00cZLDWbmd/jnABW8zh42xE0sDZA/Yz4HKByXJfMPd9BcP24j9RMAYVOuDJt0Ttay5Fj0DQB+vtba0dBby+uZ1bcAnR7sdpZH/ofi49J5ApjOLtxsNgb7K5fAuqndrDphw5kH0PS52bttOvBzajjLzpMBQtkaCzAVtyfoDCbxc8F2eQdIh5xzuYdbPVgVQCnUkaa73EZ4f8Vw8tVmfzzJHW4Q41ChtjNdy/HhFVv/zPHhEUL2cM3Z823AMnDxR+ltEbYftnMgpgdIOErDKxPOujcXEtOF/MMo/baYOSCeLy3fkV2P+Ce2fVPMbom9JflDOTSr5XROyqbjeWFk4wQ9ZnUuDyyKtIpbqii99oeZICk8SSWWoBx92j69VssQJqqPNLYeVNTdBc6rKjmN1MWw5TvHubl0Glazo5vK4GY82earsSrwoc+xCm0OQ0LlmwQtub7XNmjVLUHmn+eY9c7zfPnLMo1czwX0D/8/JHIZ/v4X9Stfyx+pO2TW7377UwAAAABJRU5ErkJggg=="

/***/ }),

/***/ 14:
/*!********************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/common/config.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _default = {
  //api请求前缀
  webUrl: 'http://www.quyoushequ.com/api/v1',
  //websocket地址
  websocketUrl: '' };exports.default = _default;

/***/ }),

/***/ 140:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon1.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPpP6I0AAAAfdFJOUwDxtliSQGGAwasXDtN0eqArINs+BTXNRmmJ6ORQS/nxWVa3AAACRUlEQVRYw+1V2baiMBCEAFlMAojIJlr//5e3G3WuC6tn5mWO/cSSVLqrK9VB8I1v/P+xj4GTLz/dfjCAUyEQ7z/ZLitA1PTQFIA5bNy9Gw7Ob2+9Bqpow/ZjBoSpffxC1XR+t257ROc5+c4n53Rczt1TxSIZ+1Wm/Kufz53aNse5ZDIaO5m74dLnu17zmjYfzZ3a5lZQnTMZWf2We0f1rWz2jsnQ8iHV3GCj3JiMQt3frKPStwr1TIfeESJkn2j9CPe3AGy12L13IhvxW0JgU0edybcAEInZ+VGmTKs+rzy9jQPo/ZjGOr+idO75AXpKYwty4KvaqQmAm8ZEPbW79Ce6TDKYBrC6HTTWTDkszFm3MwAJL2Ey0L66TyJY7uyPYhZA0W4dxZcXH5WOGW7J5FOYeQDK9EKzIL1Wey2MHbaKsuuXRQDawLYWR+QPodoNDsul39kdAJJZAO6WYGdkMvRQeofwbvLrAOgxY28eRhuVXqR/SIXJHZIC0QIA6aqlc9XA6qPJwwhaFQH1EsDNJ1/9D2a4/c3z0nEA/tK8ShsheDbsSA9rAN4DBfywNB67TqNfn68LleCI0Qxy7LZc9KKZwsdDJ8Woh1XhkrmTBgJDSnTjCz3ahdGNws5ImbzuMjvBLVhACmoSoL+EM/PxgIFlxRKfHL8nxBPz26a4TZAkSey0aQpU/QjD+4Y8oV1l280JnZFPR5SSDUn3a8eOd7w8U5JyTc5NzLsJc8PgKaOYTOU3hD8Gm8PmtVQUvs+Db3zjX8cPFM4zW8kiWQwAAAAASUVORK5CYII="

/***/ }),

/***/ 141:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon2.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzIyMjIyMjMzMzMzMzMzMzMzMzIyMjMzMzMzMzIyMjMzMzIyMjMzMzMzMzIyMjMzMzIyMjMzMzMzMzExMTMzMzMzMzMzMzMzM01vnNwAAAAfdFJOUwDv2peO+eUKgh4vsqi7bz/QKGl7xzdbTVRioBXCdEY4Jn7hAAAB+klEQVRYw+1W2baDIAx0x7pT95X//8urTahFEbdz38xTa0iAyWSCpj322P/bu+vqG+GpzkbT+2vRrWUzNNttT4fTBmMxi/U6FZ77EOaMp48c+G16h8PLEEIMxK9I4H8QHwqvO1jeVfO3AVP65W54hLv5i93yANMWqmjSG7CskdyXWuBL3mQj/OUCXPoW4q2rAzapbAG1wOukRHHEyMA96NJl2ni+XYwz4IcpfgaIwupImSooiSV8dO8maBt29gp01TvsFoiTN7XvlBF46NwhEjSOcYfK0IvZrWaaLPYvtHMsOL1gT1DiRbJqXBwJnWWqJG1KWq2ZaLu/+BKXyUWVuJ+krggyLjWFjXqJrPOjsVy8g4fdzIJcNVh4NXXL29QTFg5bSPNqblGRcEFMpGzh1cxUVOSSLJbkl+X+XsuXPkeerIAfm+TIaMibRUm+wFtHh9MLFZIF3sxKPVWNR5p0AjQk5SXhwIvud5bQFRMXxamNLxNZIiDXpsaKibWMHmUnIwZFXSqkWrmAeSJeICTNEVDJy6c4IBpxoyQDp8DWu4r7FWQYsGRGtMlkfYcMHt7REbRhbBNnT9FnFmFj27MItcjkTK3oP8zn4+FDFoqHCgvtuEXf8cAfbMFw8qHIux9HaX7hqcqJOAJKL76VP8dP+la7brQvtcce27c/H0BVyrf9SQUAAAAASUVORK5CYII="

/***/ }),

/***/ 142:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon3.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPpP6I0AAAAfdFJOUwAhtcQN/L8FFjUr99PqUdqP8Tx9mkRhqeHNaXRKWYm09jJoAAACFklEQVRYw+1Wa4+kIBAUFAFRfL8d+///ywOzm5u9aZxm78vlsvVlMpCqtE1TRZL84F9HxuzW95tl2bfobOMCLhj+UNF0NZWeW9VL639TG1kF445V894WxePki/szRBWhckfv9eff7qwAZhnHz/XzyljHKGQzAGdf14oVoKEqTADryxcXFRhL48sUquN1eROw0o7CCnFiujOYiSQww8KwdS1gIH1BBRzfKKGktLEzYsd3GqgZQeAwoW5vsGjKIZq2C3QXPZ04gZEgMBrzwHd2WAqCQNGKHt8ZoKZcyayFHN+poSQNEocKrXQUoqGOchMQ1gm1hAM7HdokXyVAiV3n0PFi7X41FOexPT0QnKWmX2bGOksbEjq8gbVPptq4hOBRxs4GR6nn/XEcUz97W+8js0Xa3AdKW1VXsKw2iYVO4QkxoXAFw75W4lmAdIt+08/FsU3Zj5opVYzbkDcRHZCHOwKxNFom30K2G9f/Ezc/9X4W1eDfA6Ev7sp3rupjvd6CxWtI2dtYrW/K1C617xTkKW75XuBOQbr+lbdtYn4meFBBuyuPGb9NP3G9m4AHhkK5BqCx3MAfCCi4BwBa3asAfrVZGggeRAA1J/ewGSRRYEUmTaWh7JUDhe+SM2R6ckrzD6xhvuQ30auyD4yeX6I3pTAU1/STWOpAdJs9oQgE+O79UzGKQK2Dz3tKcHatTv4KyiY/+A/xC2GFMrrD8YFTAAAAAElFTkSuQmCC"

/***/ }),

/***/ 143:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon5.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAAD47Oj46Oj46OT47OT46OT46OT86OT46OT46OD46OT46OT45OT46OD46OT46OT46OT47OT46OD47Oj05OD46OT06OT46OT46OT45OT46OT46OT46OT46OT46Oj46ORohdl4AAAAfdFJOUwAGDHcB7+US/CPBG2LK9ivRRE4ysZCmg7lZ25igazn8nJl0AAAD00lEQVRYw+1X27arKgytolwURUHxVsv//+VJUKl2qeesPp0x9ualVUjIZWYmPh5/1/97iYL7ZaPv5JPKLavsvlOgKMiWJXdu/E5BnTpH5tmCgt/48D4rQQE81c5RcbJ9vnI91/H6fwAF7JHonQKmSc1u3e4hZi0LFpTxI0EL1JqWBranGw0m81F/5v6p5a4Ca4Rz6XDYvtSg4AAv4UivHonRhfMKYsiFrUFnPWJKbzTkaH9DQM5VA8HTrgAFzF/baAlZdZYgOKb4FDcS7m+Et2Nd6QxBj2y5PXO4u0YN5jR/BAyUW6hAumll4kM/P6sVkXhzC/9epxZAvlyGuvMJAv8cdp4akqE9qE+PB1zsV4y6M8xAJDv9WVhk8q8MRILLCzgxiCK3+R1QDIa4vYSj9769QatP1HkOViQUATX+/EDaltRBY9RBaTa3WO7gBrKJkyzF3I2NXO+MwML0dc9BAJ41xHUW8p/29fJuy/TlGuDC1YCOetmi8D+jDmGuxLU87veLiwNen0kjhCHoSKUCR+hz419ykBNIdcEXR3KPxMhgcpok+EiGQSrx4TulaZqC/LjEiEC425AuAbRG/cUJgq2Eo5Q2+3QXoX6W1+hLIQ78yp/+n07D0XangC+vaGGXOhsggkslrSiftihEpChWHdlBQdkxxuI4SjY4lGpfaMPmwyOK4xiO9j8UzPuYwIX9oSZM+XHC8h8KkuRtc/uZ7heg6Y0gOPpTwVTrOmdxEpKwh2w0v11gTMDR7FPBuqpFDPmT7NLE7MoUj6QLWeiPHq1rClVDd8QHvYEvCFNbxz3GJLLjSCkFIPVx6EpNCKOpAsIknAEU0XEkn4QmhILY0TpUhbOKQUgShuDhC2wQiaMU4qKgVKiFpYvQSRojrXeYBcaZrikLY7UhWAdnPepUIASub/hAgwlkhYNq6CY+tuJNONkd64pqf0A/K6hRmnUBEpK/Ge/cAhqoY7FCS6l3JIo0k90w0gsMSElyQ1mT26f3jFJ5dzvE5EhONr7Z9L0/H9RJ6/TNUmDv7s7b+7A1NtOnBfloH7WlqZ9csLmV6qq9c8T3yxNcP79rgQ2tnzcatXDF+XyA05Srat+//TRRWYJXJqrtNyIs1AMHlXMLPPG5yt/Vr1MKojZeGLd84m8xIbrIVXt/bnybC+lVrEMWJLd9MdGv2+QyUYsG4FcMd91wR2FONCDeGYx7/vwXedDQYXuPwqDJj5Oq355vgRIrI5LrURe3//vgfTps/2a9IODW2uKX4/6uNHAg40i31ZefPM3Gv+TLj664zXD18suPrj9m/QNSv2l3f5RSzAAAAABJRU5ErkJggg=="

/***/ }),

/***/ 144:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon6.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABACAMAAACZQlHRAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPpP6I0AAAAfdFJOUwDcCwXqARL7/owamrHzzMNM40EvcVa5pThqYnzUIij6tcrFAAACzElEQVRYw+1X27ajIAxVQREUvOEd5f//coJHq+0oYt9mzclTV8WdsJPsRM/7tX/FUNSNbSMw97M06ecofArAhsTXByPN2AVPAIIhW1/lhY/J+rMt3RHydHlHtbLOu6rMB9kW5g+cVI4IEsPxgpYT2sOa69aAFL0TjRQCx3T6pC/I0xg4oegWIRLgrKnO+Ee5Ybi9Y5UpOEWvTs2GZXoTQwNnpOV5Apmx8hHACT1anVDAyC3P+/g2TgReFLsmAqhM7tgyd71Oy6i1P90XHtG8uwqi0PF4302GsCa4DEJEDsVXQfWeMxoqTaRT/UIY7emTjrgwYazEGp+GS+O7hL7CaHQ8nN8DuwqCJKc3gXz4zBGi5jo7owJr5apJFbhDp8ips64JXZww3xOtaN+5JERSSMlfJ4N+UUeCb1UJ0UWPiSg/ixb+jgk0apzaS7wrzCEDwuXRWwj1RtKxH6ELiV1RlJkGo7mKJsNH1VPjPQDt5bbqMM/rJRrxrhvj3ntJrBNLEEKTVdUm9dZsrSb1RjfXjaUgfI2D3e+hKzPtb3MqwFpcC9dAdgc1OfZUptVr1GGbaAzxXn/5lxDkF+KeznYfchWoSWhTTX97KuNjXYxrfV9r2j74N2cofavOPN50c4aet/UZvJct90QSRt/hxgi2IDV00dz70O22qQoVrtN6Zp3ZAd66fTL7S5GZ/USzO+XVsRJGoLJ32qdk3RKVfRCElGybaPKpnmhoMMeNtMfAWkAoFOdFUp4pJJo/WQijaTbG1uOVMMrIQjDXJXgUP2H7Sbcs1cpsjU/2aNbuO7jfMWnWSd4/APjZ3VQDlkEWxLKVZ/WjjwGYeqSfIjBWiiWUpmaPELwaWmpjXZohUQae9xziNS2h7B9/0yyjnpSRSSCqYCfpniN4UWuiT8DM10gTfQHhsXRPKi+9ryyifO2HtETfQXiIlTVYzgLvP7A/0TtE12i/FDQAAAAASUVORK5CYII="

/***/ }),

/***/ 145:
/*!***************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/icon4.png ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABgUExURQAAADMzMzMzMzMzMzIyMjMzMzIyMjMzMzMzMzIyMjMzMzMzMzMzMzMzMzMzMzIyMjIyMjIyMjIyMjMzMzIyMjMzMzIyMjIyMjMzMzMzMzIyMjIyMjMzMzMzMzIyMjMzMxmWeewAAAAfdFJOUwDtrC6OBB33TGj6yORj3juAJRHYRXq3cwn0nFjQv4iG9kRMAAACS0lEQVRYw+2X2ZarIBBFUQJxQHGMiFH+/y8vkODFAQzpfuzzlCw9WyiKKgDgT5Yob+8OjQu79k/CJ35JgJF8LTv/fiYf3dAFIBUi6pNTTUSNYbkALPIjjkdNqWdR+QE3IVLHI1wKEsv59T8APOl8RfADyqZ+CnEfvgdgABUhvQQwSG3VaAUA2AoxFhcA1JfEVlv9B2hCNPkBTb7LwNICACrXc5z8I6iirRYbADriHoMJIoa2MNgAQKIIyTeJVJstJ7cM6QIBrBTZmsedjAOhYQDwkLGb47fUrj0bgw8Ax315mFEQAMB8vGdGdwnI3YBmI1OHWDcVRhP3jSCJH7b42ZLVz2hwZuK8m2x7tio0wS4Ai3eAx8dF/T0FPKWFpQmfF7kCh63CIQjZMRMCALXasods/Byg/OOR8DFA+wu5I0r6FUAV1zEFVO5rAr8A1Ka0KsJyAqiHaq9lYpvx6+KOH5nIkg8SSau3/Zn2z4cu8U7lxxnAvIlXv/lxnALl8UFVY/l7kwiDKw8Y2onZ+eP0X6+CtlXI5b8EqPGLBVmBDAOosHv9FwDtvxl/D0IBq1/1eNH7CkpDk25VUlvzvzGvf22uxG6t5auR8vdB0ed3FNWYvXrjxo977uxMqMhbS7EufV2kd67y6/jJ/7egIKaZyAGixq/OpHlQa+Mii1NO1rNmEQhgs8iIfVYNBcDXSVeMPfoOgFUVK3mxVsBQAIB8gLbhHOA5re81yJaJQu4LO6XtaTp6biw7yfciGHxn2moKvbVtRDj9u+L+rv4Btylig+B/DsMAAAAASUVORK5CYII="

/***/ }),

/***/ 15:
/*!******************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/common/util.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(uni) {Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _default = {

  // 监听网络
  onNetWork: function onNetWork() {
    var func = function func(res) {
      if (res.networkType === 'none') {
        uni.showToast({
          title: '当前处于断网状态,请先连接',
          icon: 'none' });

      }
    };
    uni.getNetworkType({
      success: func });

    uni.onNetworkStatusChange(func);

  },
  //热更新
  update: function update() {































  } };exports.default = _default;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["default"]))

/***/ }),

/***/ 16:
/*!*********************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/common/require.js ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(uni) {Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _config = _interopRequireDefault(__webpack_require__(/*! ./config.js */ 14));function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}var _default =
{
  common: {
    method: 'GET',
    header: {
      "content-type": "application/json" },

    data: {} },

  request: function request() {var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    options.url = _config.default.webUrl + options.url;
    options.method = options.method || this.common.method;
    options.header = options.header || this.common.header;

    // 验证权限token
    console.log(options.url);
    //大坑,真机调试时,手机必须联网,否则连不上也不报错!!!!
    return uni.request(options);

  },
  get: function get(url) {var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
    options.url = url;
    options.data = data;
    options.method = 'GET';
    return this.request(options);
  },
  post: function post(url) {var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
    options.url = url;
    options.data = data;
    options.method = 'POST';
    return this.request(options);
  } };exports.default = _default;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["default"]))

/***/ }),

/***/ 186:
/*!********************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/qiniuUploader.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// created by gpake
(function () {

  var config = {
    qiniuRegion: '',
    qiniuImageURLPrefix: '',
    qiniuUploadToken: '',
    qiniuUploadTokenURL: '',
    qiniuUploadTokenFunction: null,
    qiniuShouldUseQiniuFileName: false };


  module.exports = {
    init: init,
    upload: upload };


  // 在整个程序生命周期中，只需要 init 一次即可
  // 如果需要变更参数，再调用 init 即可
  function init(options) {
    config = {
      qiniuRegion: '',
      qiniuImageURLPrefix: '',
      qiniuUploadToken: '',
      qiniuUploadTokenURL: '',
      qiniuUploadTokenFunction: null,
      qiniuShouldUseQiniuFileName: false };

    updateConfigWithOptions(options);
  }

  function updateConfigWithOptions(options) {
    if (options.region) {
      config.qiniuRegion = options.region;
    } else {
      console.error('qiniu uploader need your bucket region');
    }
    if (options.uptoken) {
      config.qiniuUploadToken = options.uptoken;
    } else if (options.uptokenURL) {
      config.qiniuUploadTokenURL = options.uptokenURL;
    } else if (options.uptokenFunc) {
      config.qiniuUploadTokenFunction = options.uptokenFunc;
    }
    if (options.domain) {
      config.qiniuImageURLPrefix = options.domain;
    }
    config.qiniuShouldUseQiniuFileName = options.shouldUseQiniuFileName;
  }

  function upload(filePath, success, fail, options, progress, cancelTask, before, complete) {
    if (null == filePath) {
      console.error('qiniu uploader need filePath to upload');
      return;
    }
    if (options) {
      updateConfigWithOptions(options);
    }
    if (config.qiniuUploadToken) {
      doUpload(filePath, success, fail, options, progress, cancelTask, before, complete);
    } else if (config.qiniuUploadTokenURL) {
      getQiniuToken(function () {
        doUpload(filePath, success, fail, options, progress, cancelTask, before, complete);
      });
    } else if (config.qiniuUploadTokenFunction) {
      config.qiniuUploadToken = config.qiniuUploadTokenFunction();
      if (null == config.qiniuUploadToken && config.qiniuUploadToken.length > 0) {
        console.error('qiniu UploadTokenFunction result is null, please check the return value');
        return;
      }
      doUpload(filePath, success, fail, options, progress, cancelTask, before, complete);
    } else {
      console.error('qiniu uploader need one of [uptoken, uptokenURL, uptokenFunc]');
      return;
    }
  }

  function doUpload(filePath, _success, _fail, options, progress, cancelTask, before, _complete) {
    if (null == config.qiniuUploadToken && config.qiniuUploadToken.length > 0) {
      console.error('qiniu UploadToken is null, please check the init config or networking');
      return;
    }
    var url = uploadURLFromRegionCode(config.qiniuRegion);
    var fileName = filePath.split('//')[1];
    if (options && options.key) {
      fileName = options.key;
    }
    var formData = {
      'token': config.qiniuUploadToken };

    if (!config.qiniuShouldUseQiniuFileName) {
      formData['key'] = fileName;
    }
    before && before();
    var uploadTask = wx.uploadFile({
      url: url,
      filePath: filePath,
      name: 'file',
      formData: formData,
      success: function success(res) {
        var dataString = res.data;
        //   // this if case is a compatibility with wechat server returned a charcode, but was fixed
        //   if(res.data.hasOwnProperty('type') && res.data.type === 'Buffer'){
        //     dataString = String.fromCharCode.apply(null, res.data.data)
        //   }
        try {
          var dataObject = JSON.parse(dataString);
          //do something
          var fileUrl = config.qiniuImageURLPrefix + '/' + dataObject.key;
          dataObject.fileUrl = fileUrl;
          dataObject.imageURL = fileUrl;
          console.log(dataObject);
          if (_success) {
            _success(dataObject);
          }
        } catch (e) {
          console.log('parse JSON failed, origin String is: ' + dataString);
          if (_fail) {
            _fail(e);
          }
        }
      },
      fail: function fail(error) {
        console.error(error);
        if (_fail) {
          _fail(error);
        }
      },
      complete: function complete(err) {
        _complete && _complete(err);
      } });


    uploadTask.onProgressUpdate(function (res) {
      progress && progress(res);
    });

    cancelTask && cancelTask(function () {
      uploadTask.abort();
    });
  }

  function getQiniuToken(callback) {
    wx.request({
      url: config.qiniuUploadTokenURL,
      success: function success(res) {
        var token = res.data.uptoken;
        if (token && token.length > 0) {
          config.qiniuUploadToken = token;
          if (callback) {
            callback();
          }
        } else {
          console.error('qiniuUploader cannot get your token, please check the uptokenURL or server');
        }
      },
      fail: function fail(error) {
        console.error('qiniu UploadToken is null, please check the init config or networking: ' + error);
      } });

  }

  function uploadURLFromRegionCode(code) {
    var uploadURL = null;
    switch (code) {
      case 'ECN':uploadURL = 'https://up.qiniup.com';break;
      case 'NCN':uploadURL = 'https://up-z1.qiniup.com';break;
      case 'SCN':uploadURL = 'https://up-z2.qiniup.com';break;
      case 'NA':uploadURL = 'https://up-na0.qiniup.com';break;
      case 'ASG':uploadURL = 'https://up-as0.qiniup.com';break;
      default:console.error('please make the region is with one of [ECN, SCN, NCN, NA, ASG]');}

    return uploadURL;
  }

})();

/***/ }),

/***/ 2:
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ 251:
/*!********************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/js/md5.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
 * A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
 * Digest Algorithm, as defined in RFC 1321.
 * Version 2.1 Copyright (C) Paul Johnston 1999 - 2002.
 * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
 * Distributed under the BSD License
 * See http://pajhome.org.uk/crypt/md5 for more info.
 */

/*
     * Configurable variables. You may need to tweak these to be compatible with
     * the server-side, but the defaults work in most cases.
     */
var hexcase = 0; /* hex output format. 0 - lowercase; 1 - uppercase        */
var b64pad = ""; /* base-64 pad character. "=" for strict RFC compliance   */
var chrsz = 8; /* bits per input character. 8 - ASCII; 16 - Unicode      */

/*
                                                                             * These are the functions you'll usually want to call
                                                                             * They take string arguments and return either hex or base-64 encoded strings
                                                                             */
function hex_md5(s) {return binl2hex(core_md5(str2binl(s), s.length * chrsz));}
function b64_md5(s) {return binl2b64(core_md5(str2binl(s), s.length * chrsz));}
function str_md5(s) {return binl2str(core_md5(str2binl(s), s.length * chrsz));}
function hex_hmac_md5(key, data) {return binl2hex(core_hmac_md5(key, data));}
function b64_hmac_md5(key, data) {return binl2b64(core_hmac_md5(key, data));}
function str_hmac_md5(key, data) {return binl2str(core_hmac_md5(key, data));}
/*
                                                                               * Perform a simple self-test to see if the VM is working
                                                                               */
function md5_vm_test()
{
  return hex_md5("abc") == "900150983cd24fb0d6963f7d28e17f72";
}

/*
   * Calculate the MD5 of an array of little-endian words, and a bit length
   */
function core_md5(x, len)
{
  /* append padding */
  x[len >> 5] |= 0x80 << len % 32;
  x[(len + 64 >>> 9 << 4) + 14] = len;

  var a = 1732584193;
  var b = -271733879;
  var c = -1732584194;
  var d = 271733878;

  for (var i = 0; i < x.length; i += 16)
  {
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;

    a = md5_ff(a, b, c, d, x[i + 0], 7, -680876936);
    d = md5_ff(d, a, b, c, x[i + 1], 12, -389564586);
    c = md5_ff(c, d, a, b, x[i + 2], 17, 606105819);
    b = md5_ff(b, c, d, a, x[i + 3], 22, -1044525330);
    a = md5_ff(a, b, c, d, x[i + 4], 7, -176418897);
    d = md5_ff(d, a, b, c, x[i + 5], 12, 1200080426);
    c = md5_ff(c, d, a, b, x[i + 6], 17, -1473231341);
    b = md5_ff(b, c, d, a, x[i + 7], 22, -45705983);
    a = md5_ff(a, b, c, d, x[i + 8], 7, 1770035416);
    d = md5_ff(d, a, b, c, x[i + 9], 12, -1958414417);
    c = md5_ff(c, d, a, b, x[i + 10], 17, -42063);
    b = md5_ff(b, c, d, a, x[i + 11], 22, -1990404162);
    a = md5_ff(a, b, c, d, x[i + 12], 7, 1804603682);
    d = md5_ff(d, a, b, c, x[i + 13], 12, -40341101);
    c = md5_ff(c, d, a, b, x[i + 14], 17, -1502002290);
    b = md5_ff(b, c, d, a, x[i + 15], 22, 1236535329);

    a = md5_gg(a, b, c, d, x[i + 1], 5, -165796510);
    d = md5_gg(d, a, b, c, x[i + 6], 9, -1069501632);
    c = md5_gg(c, d, a, b, x[i + 11], 14, 643717713);
    b = md5_gg(b, c, d, a, x[i + 0], 20, -373897302);
    a = md5_gg(a, b, c, d, x[i + 5], 5, -701558691);
    d = md5_gg(d, a, b, c, x[i + 10], 9, 38016083);
    c = md5_gg(c, d, a, b, x[i + 15], 14, -660478335);
    b = md5_gg(b, c, d, a, x[i + 4], 20, -405537848);
    a = md5_gg(a, b, c, d, x[i + 9], 5, 568446438);
    d = md5_gg(d, a, b, c, x[i + 14], 9, -1019803690);
    c = md5_gg(c, d, a, b, x[i + 3], 14, -187363961);
    b = md5_gg(b, c, d, a, x[i + 8], 20, 1163531501);
    a = md5_gg(a, b, c, d, x[i + 13], 5, -1444681467);
    d = md5_gg(d, a, b, c, x[i + 2], 9, -51403784);
    c = md5_gg(c, d, a, b, x[i + 7], 14, 1735328473);
    b = md5_gg(b, c, d, a, x[i + 12], 20, -1926607734);

    a = md5_hh(a, b, c, d, x[i + 5], 4, -378558);
    d = md5_hh(d, a, b, c, x[i + 8], 11, -2022574463);
    c = md5_hh(c, d, a, b, x[i + 11], 16, 1839030562);
    b = md5_hh(b, c, d, a, x[i + 14], 23, -35309556);
    a = md5_hh(a, b, c, d, x[i + 1], 4, -1530992060);
    d = md5_hh(d, a, b, c, x[i + 4], 11, 1272893353);
    c = md5_hh(c, d, a, b, x[i + 7], 16, -155497632);
    b = md5_hh(b, c, d, a, x[i + 10], 23, -1094730640);
    a = md5_hh(a, b, c, d, x[i + 13], 4, 681279174);
    d = md5_hh(d, a, b, c, x[i + 0], 11, -358537222);
    c = md5_hh(c, d, a, b, x[i + 3], 16, -722521979);
    b = md5_hh(b, c, d, a, x[i + 6], 23, 76029189);
    a = md5_hh(a, b, c, d, x[i + 9], 4, -640364487);
    d = md5_hh(d, a, b, c, x[i + 12], 11, -421815835);
    c = md5_hh(c, d, a, b, x[i + 15], 16, 530742520);
    b = md5_hh(b, c, d, a, x[i + 2], 23, -995338651);

    a = md5_ii(a, b, c, d, x[i + 0], 6, -198630844);
    d = md5_ii(d, a, b, c, x[i + 7], 10, 1126891415);
    c = md5_ii(c, d, a, b, x[i + 14], 15, -1416354905);
    b = md5_ii(b, c, d, a, x[i + 5], 21, -57434055);
    a = md5_ii(a, b, c, d, x[i + 12], 6, 1700485571);
    d = md5_ii(d, a, b, c, x[i + 3], 10, -1894986606);
    c = md5_ii(c, d, a, b, x[i + 10], 15, -1051523);
    b = md5_ii(b, c, d, a, x[i + 1], 21, -2054922799);
    a = md5_ii(a, b, c, d, x[i + 8], 6, 1873313359);
    d = md5_ii(d, a, b, c, x[i + 15], 10, -30611744);
    c = md5_ii(c, d, a, b, x[i + 6], 15, -1560198380);
    b = md5_ii(b, c, d, a, x[i + 13], 21, 1309151649);
    a = md5_ii(a, b, c, d, x[i + 4], 6, -145523070);
    d = md5_ii(d, a, b, c, x[i + 11], 10, -1120210379);
    c = md5_ii(c, d, a, b, x[i + 2], 15, 718787259);
    b = md5_ii(b, c, d, a, x[i + 9], 21, -343485551);

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
  }
  return Array(a, b, c, d);

}

/*
   * These functions implement the four basic operations the algorithm uses.
   */
function md5_cmn(q, a, b, x, s, t)
{
  return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s), b);
}
function md5_ff(a, b, c, d, x, s, t)
{
  return md5_cmn(b & c | ~b & d, a, b, x, s, t);
}
function md5_gg(a, b, c, d, x, s, t)
{
  return md5_cmn(b & d | c & ~d, a, b, x, s, t);
}
function md5_hh(a, b, c, d, x, s, t)
{
  return md5_cmn(b ^ c ^ d, a, b, x, s, t);
}
function md5_ii(a, b, c, d, x, s, t)
{
  return md5_cmn(c ^ (b | ~d), a, b, x, s, t);
}

/*
   * Calculate the HMAC-MD5, of a key and some data
   */
function core_hmac_md5(key, data)
{
  var bkey = str2binl(key);
  if (bkey.length > 16) bkey = core_md5(bkey, key.length * chrsz);

  var ipad = Array(16),opad = Array(16);
  for (var i = 0; i < 16; i++)
  {
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
  }

  var hash = core_md5(ipad.concat(str2binl(data)), 512 + data.length * chrsz);
  return core_md5(opad.concat(hash), 512 + 128);
}

/*
   * Add integers, wrapping at 2^32. This uses 16-bit operations internally
   * to work around bugs in some JS interpreters.
   */
function safe_add(x, y)
{
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return msw << 16 | lsw & 0xFFFF;
}

/*
   * Bitwise rotate a 32-bit number to the left.
   */
function bit_rol(num, cnt)
{
  return num << cnt | num >>> 32 - cnt;
}

/*
   * Convert a string to an array of little-endian words
   * If chrsz is ASCII, characters >255 have their hi-byte silently ignored.
   */
function str2binl(str)
{
  var bin = Array();
  var mask = (1 << chrsz) - 1;
  for (var i = 0; i < str.length * chrsz; i += chrsz) {
    bin[i >> 5] |= (str.charCodeAt(i / chrsz) & mask) << i % 32;}
  return bin;
}

/*
   * Convert an array of little-endian words to a string
   */
function binl2str(bin)
{
  var str = "";
  var mask = (1 << chrsz) - 1;
  for (var i = 0; i < bin.length * 32; i += chrsz) {
    str += String.fromCharCode(bin[i >> 5] >>> i % 32 & mask);}
  return str;
}

/*
   * Convert an array of little-endian words to a hex string.
   */
function binl2hex(binarray)
{
  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
  var str = "";
  for (var i = 0; i < binarray.length * 4; i++)
  {
    str += hex_tab.charAt(binarray[i >> 2] >> i % 4 * 8 + 4 & 0xF) +
    hex_tab.charAt(binarray[i >> 2] >> i % 4 * 8 & 0xF);
  }
  return str;
}

/*
   * Convert an array of little-endian words to a base-64 string
   */
function binl2b64(binarray)
{
  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var str = "";
  for (var i = 0; i < binarray.length * 4; i += 3)
  {
    var triplet = (binarray[i >> 2] >> 8 * (i % 4) & 0xFF) << 16 |
    (binarray[i + 1 >> 2] >> 8 * ((i + 1) % 4) & 0xFF) << 8 |
    binarray[i + 2 >> 2] >> 8 * ((i + 2) % 4) & 0xFF;
    for (var j = 0; j < 4; j++)
    {
      if (i * 8 + j * 6 > binarray.length * 32) str += b64pad;else
      str += tab.charAt(triplet >> 6 * (3 - j) & 0x3F);
    }
  }
  return str;
}
// 导出方法
module.exports = {
  hex_md5: hex_md5,
  b64_md5: b64_md5,
  str_md5: str_md5 };

/***/ }),

/***/ 3:
/*!******************************************************************************************!*\
  !*** ./node_modules/@dcloudio/vue-cli-plugin-uni/packages/mp-vue/dist/mp.runtime.esm.js ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global) {/*!
 * Vue.js v2.6.11
 * (c) 2014-2021 Evan You
 * Released under the MIT License.
 */
/*  */

var emptyObject = Object.freeze({});

// These helpers produce better VM code in JS engines due to their
// explicitness and function inlining.
function isUndef (v) {
  return v === undefined || v === null
}

function isDef (v) {
  return v !== undefined && v !== null
}

function isTrue (v) {
  return v === true
}

function isFalse (v) {
  return v === false
}

/**
 * Check if value is primitive.
 */
function isPrimitive (value) {
  return (
    typeof value === 'string' ||
    typeof value === 'number' ||
    // $flow-disable-line
    typeof value === 'symbol' ||
    typeof value === 'boolean'
  )
}

/**
 * Quick object check - this is primarily used to tell
 * Objects from primitive values when we know the value
 * is a JSON-compliant type.
 */
function isObject (obj) {
  return obj !== null && typeof obj === 'object'
}

/**
 * Get the raw type string of a value, e.g., [object Object].
 */
var _toString = Object.prototype.toString;

function toRawType (value) {
  return _toString.call(value).slice(8, -1)
}

/**
 * Strict object type check. Only returns true
 * for plain JavaScript objects.
 */
function isPlainObject (obj) {
  return _toString.call(obj) === '[object Object]'
}

function isRegExp (v) {
  return _toString.call(v) === '[object RegExp]'
}

/**
 * Check if val is a valid array index.
 */
function isValidArrayIndex (val) {
  var n = parseFloat(String(val));
  return n >= 0 && Math.floor(n) === n && isFinite(val)
}

function isPromise (val) {
  return (
    isDef(val) &&
    typeof val.then === 'function' &&
    typeof val.catch === 'function'
  )
}

/**
 * Convert a value to a string that is actually rendered.
 */
function toString (val) {
  return val == null
    ? ''
    : Array.isArray(val) || (isPlainObject(val) && val.toString === _toString)
      ? JSON.stringify(val, null, 2)
      : String(val)
}

/**
 * Convert an input value to a number for persistence.
 * If the conversion fails, return original string.
 */
function toNumber (val) {
  var n = parseFloat(val);
  return isNaN(n) ? val : n
}

/**
 * Make a map and return a function for checking if a key
 * is in that map.
 */
function makeMap (
  str,
  expectsLowerCase
) {
  var map = Object.create(null);
  var list = str.split(',');
  for (var i = 0; i < list.length; i++) {
    map[list[i]] = true;
  }
  return expectsLowerCase
    ? function (val) { return map[val.toLowerCase()]; }
    : function (val) { return map[val]; }
}

/**
 * Check if a tag is a built-in tag.
 */
var isBuiltInTag = makeMap('slot,component', true);

/**
 * Check if an attribute is a reserved attribute.
 */
var isReservedAttribute = makeMap('key,ref,slot,slot-scope,is');

/**
 * Remove an item from an array.
 */
function remove (arr, item) {
  if (arr.length) {
    var index = arr.indexOf(item);
    if (index > -1) {
      return arr.splice(index, 1)
    }
  }
}

/**
 * Check whether an object has the property.
 */
var hasOwnProperty = Object.prototype.hasOwnProperty;
function hasOwn (obj, key) {
  return hasOwnProperty.call(obj, key)
}

/**
 * Create a cached version of a pure function.
 */
function cached (fn) {
  var cache = Object.create(null);
  return (function cachedFn (str) {
    var hit = cache[str];
    return hit || (cache[str] = fn(str))
  })
}

/**
 * Camelize a hyphen-delimited string.
 */
var camelizeRE = /-(\w)/g;
var camelize = cached(function (str) {
  return str.replace(camelizeRE, function (_, c) { return c ? c.toUpperCase() : ''; })
});

/**
 * Capitalize a string.
 */
var capitalize = cached(function (str) {
  return str.charAt(0).toUpperCase() + str.slice(1)
});

/**
 * Hyphenate a camelCase string.
 */
var hyphenateRE = /\B([A-Z])/g;
var hyphenate = cached(function (str) {
  return str.replace(hyphenateRE, '-$1').toLowerCase()
});

/**
 * Simple bind polyfill for environments that do not support it,
 * e.g., PhantomJS 1.x. Technically, we don't need this anymore
 * since native bind is now performant enough in most browsers.
 * But removing it would mean breaking code that was able to run in
 * PhantomJS 1.x, so this must be kept for backward compatibility.
 */

/* istanbul ignore next */
function polyfillBind (fn, ctx) {
  function boundFn (a) {
    var l = arguments.length;
    return l
      ? l > 1
        ? fn.apply(ctx, arguments)
        : fn.call(ctx, a)
      : fn.call(ctx)
  }

  boundFn._length = fn.length;
  return boundFn
}

function nativeBind (fn, ctx) {
  return fn.bind(ctx)
}

var bind = Function.prototype.bind
  ? nativeBind
  : polyfillBind;

/**
 * Convert an Array-like object to a real Array.
 */
function toArray (list, start) {
  start = start || 0;
  var i = list.length - start;
  var ret = new Array(i);
  while (i--) {
    ret[i] = list[i + start];
  }
  return ret
}

/**
 * Mix properties into target object.
 */
function extend (to, _from) {
  for (var key in _from) {
    to[key] = _from[key];
  }
  return to
}

/**
 * Merge an Array of Objects into a single Object.
 */
function toObject (arr) {
  var res = {};
  for (var i = 0; i < arr.length; i++) {
    if (arr[i]) {
      extend(res, arr[i]);
    }
  }
  return res
}

/* eslint-disable no-unused-vars */

/**
 * Perform no operation.
 * Stubbing args to make Flow happy without leaving useless transpiled code
 * with ...rest (https://flow.org/blog/2017/05/07/Strict-Function-Call-Arity/).
 */
function noop (a, b, c) {}

/**
 * Always return false.
 */
var no = function (a, b, c) { return false; };

/* eslint-enable no-unused-vars */

/**
 * Return the same value.
 */
var identity = function (_) { return _; };

/**
 * Check if two values are loosely equal - that is,
 * if they are plain objects, do they have the same shape?
 */
function looseEqual (a, b) {
  if (a === b) { return true }
  var isObjectA = isObject(a);
  var isObjectB = isObject(b);
  if (isObjectA && isObjectB) {
    try {
      var isArrayA = Array.isArray(a);
      var isArrayB = Array.isArray(b);
      if (isArrayA && isArrayB) {
        return a.length === b.length && a.every(function (e, i) {
          return looseEqual(e, b[i])
        })
      } else if (a instanceof Date && b instanceof Date) {
        return a.getTime() === b.getTime()
      } else if (!isArrayA && !isArrayB) {
        var keysA = Object.keys(a);
        var keysB = Object.keys(b);
        return keysA.length === keysB.length && keysA.every(function (key) {
          return looseEqual(a[key], b[key])
        })
      } else {
        /* istanbul ignore next */
        return false
      }
    } catch (e) {
      /* istanbul ignore next */
      return false
    }
  } else if (!isObjectA && !isObjectB) {
    return String(a) === String(b)
  } else {
    return false
  }
}

/**
 * Return the first index at which a loosely equal value can be
 * found in the array (if value is a plain object, the array must
 * contain an object of the same shape), or -1 if it is not present.
 */
function looseIndexOf (arr, val) {
  for (var i = 0; i < arr.length; i++) {
    if (looseEqual(arr[i], val)) { return i }
  }
  return -1
}

/**
 * Ensure a function is called only once.
 */
function once (fn) {
  var called = false;
  return function () {
    if (!called) {
      called = true;
      fn.apply(this, arguments);
    }
  }
}

var ASSET_TYPES = [
  'component',
  'directive',
  'filter'
];

var LIFECYCLE_HOOKS = [
  'beforeCreate',
  'created',
  'beforeMount',
  'mounted',
  'beforeUpdate',
  'updated',
  'beforeDestroy',
  'destroyed',
  'activated',
  'deactivated',
  'errorCaptured',
  'serverPrefetch'
];

/*  */



var config = ({
  /**
   * Option merge strategies (used in core/util/options)
   */
  // $flow-disable-line
  optionMergeStrategies: Object.create(null),

  /**
   * Whether to suppress warnings.
   */
  silent: false,

  /**
   * Show production mode tip message on boot?
   */
  productionTip: "development" !== 'production',

  /**
   * Whether to enable devtools
   */
  devtools: "development" !== 'production',

  /**
   * Whether to record perf
   */
  performance: false,

  /**
   * Error handler for watcher errors
   */
  errorHandler: null,

  /**
   * Warn handler for watcher warns
   */
  warnHandler: null,

  /**
   * Ignore certain custom elements
   */
  ignoredElements: [],

  /**
   * Custom user key aliases for v-on
   */
  // $flow-disable-line
  keyCodes: Object.create(null),

  /**
   * Check if a tag is reserved so that it cannot be registered as a
   * component. This is platform-dependent and may be overwritten.
   */
  isReservedTag: no,

  /**
   * Check if an attribute is reserved so that it cannot be used as a component
   * prop. This is platform-dependent and may be overwritten.
   */
  isReservedAttr: no,

  /**
   * Check if a tag is an unknown element.
   * Platform-dependent.
   */
  isUnknownElement: no,

  /**
   * Get the namespace of an element
   */
  getTagNamespace: noop,

  /**
   * Parse the real tag name for the specific platform.
   */
  parsePlatformTagName: identity,

  /**
   * Check if an attribute must be bound using property, e.g. value
   * Platform-dependent.
   */
  mustUseProp: no,

  /**
   * Perform updates asynchronously. Intended to be used by Vue Test Utils
   * This will significantly reduce performance if set to false.
   */
  async: true,

  /**
   * Exposed for legacy reasons
   */
  _lifecycleHooks: LIFECYCLE_HOOKS
});

/*  */

/**
 * unicode letters used for parsing html tags, component names and property paths.
 * using https://www.w3.org/TR/html53/semantics-scripting.html#potentialcustomelementname
 * skipping \u10000-\uEFFFF due to it freezing up PhantomJS
 */
var unicodeRegExp = /a-zA-Z\u00B7\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u037D\u037F-\u1FFF\u200C-\u200D\u203F-\u2040\u2070-\u218F\u2C00-\u2FEF\u3001-\uD7FF\uF900-\uFDCF\uFDF0-\uFFFD/;

/**
 * Check if a string starts with $ or _
 */
function isReserved (str) {
  var c = (str + '').charCodeAt(0);
  return c === 0x24 || c === 0x5F
}

/**
 * Define a property.
 */
function def (obj, key, val, enumerable) {
  Object.defineProperty(obj, key, {
    value: val,
    enumerable: !!enumerable,
    writable: true,
    configurable: true
  });
}

/**
 * Parse simple path.
 */
var bailRE = new RegExp(("[^" + (unicodeRegExp.source) + ".$_\\d]"));
function parsePath (path) {
  if (bailRE.test(path)) {
    return
  }
  var segments = path.split('.');
  return function (obj) {
    for (var i = 0; i < segments.length; i++) {
      if (!obj) { return }
      obj = obj[segments[i]];
    }
    return obj
  }
}

/*  */

// can we use __proto__?
var hasProto = '__proto__' in {};

// Browser environment sniffing
var inBrowser = typeof window !== 'undefined';
var inWeex = typeof WXEnvironment !== 'undefined' && !!WXEnvironment.platform;
var weexPlatform = inWeex && WXEnvironment.platform.toLowerCase();
var UA = inBrowser && window.navigator.userAgent.toLowerCase();
var isIE = UA && /msie|trident/.test(UA);
var isIE9 = UA && UA.indexOf('msie 9.0') > 0;
var isEdge = UA && UA.indexOf('edge/') > 0;
var isAndroid = (UA && UA.indexOf('android') > 0) || (weexPlatform === 'android');
var isIOS = (UA && /iphone|ipad|ipod|ios/.test(UA)) || (weexPlatform === 'ios');
var isChrome = UA && /chrome\/\d+/.test(UA) && !isEdge;
var isPhantomJS = UA && /phantomjs/.test(UA);
var isFF = UA && UA.match(/firefox\/(\d+)/);

// Firefox has a "watch" function on Object.prototype...
var nativeWatch = ({}).watch;
if (inBrowser) {
  try {
    var opts = {};
    Object.defineProperty(opts, 'passive', ({
      get: function get () {
      }
    })); // https://github.com/facebook/flow/issues/285
    window.addEventListener('test-passive', null, opts);
  } catch (e) {}
}

// this needs to be lazy-evaled because vue may be required before
// vue-server-renderer can set VUE_ENV
var _isServer;
var isServerRendering = function () {
  if (_isServer === undefined) {
    /* istanbul ignore if */
    if (!inBrowser && !inWeex && typeof global !== 'undefined') {
      // detect presence of vue-server-renderer and avoid
      // Webpack shimming the process
      _isServer = global['process'] && global['process'].env.VUE_ENV === 'server';
    } else {
      _isServer = false;
    }
  }
  return _isServer
};

// detect devtools
var devtools = inBrowser && window.__VUE_DEVTOOLS_GLOBAL_HOOK__;

/* istanbul ignore next */
function isNative (Ctor) {
  return typeof Ctor === 'function' && /native code/.test(Ctor.toString())
}

var hasSymbol =
  typeof Symbol !== 'undefined' && isNative(Symbol) &&
  typeof Reflect !== 'undefined' && isNative(Reflect.ownKeys);

var _Set;
/* istanbul ignore if */ // $flow-disable-line
if (typeof Set !== 'undefined' && isNative(Set)) {
  // use native Set when available.
  _Set = Set;
} else {
  // a non-standard Set polyfill that only works with primitive keys.
  _Set = /*@__PURE__*/(function () {
    function Set () {
      this.set = Object.create(null);
    }
    Set.prototype.has = function has (key) {
      return this.set[key] === true
    };
    Set.prototype.add = function add (key) {
      this.set[key] = true;
    };
    Set.prototype.clear = function clear () {
      this.set = Object.create(null);
    };

    return Set;
  }());
}

/*  */

var warn = noop;
var tip = noop;
var generateComponentTrace = (noop); // work around flow check
var formatComponentName = (noop);

if (true) {
  var hasConsole = typeof console !== 'undefined';
  var classifyRE = /(?:^|[-_])(\w)/g;
  var classify = function (str) { return str
    .replace(classifyRE, function (c) { return c.toUpperCase(); })
    .replace(/[-_]/g, ''); };

  warn = function (msg, vm) {
    var trace = vm ? generateComponentTrace(vm) : '';

    if (config.warnHandler) {
      config.warnHandler.call(null, msg, vm, trace);
    } else if (hasConsole && (!config.silent)) {
      console.error(("[Vue warn]: " + msg + trace));
    }
  };

  tip = function (msg, vm) {
    if (hasConsole && (!config.silent)) {
      console.warn("[Vue tip]: " + msg + (
        vm ? generateComponentTrace(vm) : ''
      ));
    }
  };

  formatComponentName = function (vm, includeFile) {
    if (vm.$root === vm) {
      if (vm.$options && vm.$options.__file) { // fixed by xxxxxx
        return ('') + vm.$options.__file
      }
      return '<Root>'
    }
    var options = typeof vm === 'function' && vm.cid != null
      ? vm.options
      : vm._isVue
        ? vm.$options || vm.constructor.options
        : vm;
    var name = options.name || options._componentTag;
    var file = options.__file;
    if (!name && file) {
      var match = file.match(/([^/\\]+)\.vue$/);
      name = match && match[1];
    }

    return (
      (name ? ("<" + (classify(name)) + ">") : "<Anonymous>") +
      (file && includeFile !== false ? (" at " + file) : '')
    )
  };

  var repeat = function (str, n) {
    var res = '';
    while (n) {
      if (n % 2 === 1) { res += str; }
      if (n > 1) { str += str; }
      n >>= 1;
    }
    return res
  };

  generateComponentTrace = function (vm) {
    if (vm._isVue && vm.$parent) {
      var tree = [];
      var currentRecursiveSequence = 0;
      while (vm && vm.$options.name !== 'PageBody') {
        if (tree.length > 0) {
          var last = tree[tree.length - 1];
          if (last.constructor === vm.constructor) {
            currentRecursiveSequence++;
            vm = vm.$parent;
            continue
          } else if (currentRecursiveSequence > 0) {
            tree[tree.length - 1] = [last, currentRecursiveSequence];
            currentRecursiveSequence = 0;
          }
        }
        !vm.$options.isReserved && tree.push(vm);
        vm = vm.$parent;
      }
      return '\n\nfound in\n\n' + tree
        .map(function (vm, i) { return ("" + (i === 0 ? '---> ' : repeat(' ', 5 + i * 2)) + (Array.isArray(vm)
            ? ((formatComponentName(vm[0])) + "... (" + (vm[1]) + " recursive calls)")
            : formatComponentName(vm))); })
        .join('\n')
    } else {
      return ("\n\n(found in " + (formatComponentName(vm)) + ")")
    }
  };
}

/*  */

var uid = 0;

/**
 * A dep is an observable that can have multiple
 * directives subscribing to it.
 */
var Dep = function Dep () {
  this.id = uid++;
  this.subs = [];
};

Dep.prototype.addSub = function addSub (sub) {
  this.subs.push(sub);
};

Dep.prototype.removeSub = function removeSub (sub) {
  remove(this.subs, sub);
};

Dep.prototype.depend = function depend () {
  if (Dep.SharedObject.target) {
    Dep.SharedObject.target.addDep(this);
  }
};

Dep.prototype.notify = function notify () {
  // stabilize the subscriber list first
  var subs = this.subs.slice();
  if ( true && !config.async) {
    // subs aren't sorted in scheduler if not running async
    // we need to sort them now to make sure they fire in correct
    // order
    subs.sort(function (a, b) { return a.id - b.id; });
  }
  for (var i = 0, l = subs.length; i < l; i++) {
    subs[i].update();
  }
};

// The current target watcher being evaluated.
// This is globally unique because only one watcher
// can be evaluated at a time.
// fixed by xxxxxx (nvue shared vuex)
/* eslint-disable no-undef */
Dep.SharedObject = {};
Dep.SharedObject.target = null;
Dep.SharedObject.targetStack = [];

function pushTarget (target) {
  Dep.SharedObject.targetStack.push(target);
  Dep.SharedObject.target = target;
  Dep.target = target;
}

function popTarget () {
  Dep.SharedObject.targetStack.pop();
  Dep.SharedObject.target = Dep.SharedObject.targetStack[Dep.SharedObject.targetStack.length - 1];
  Dep.target = Dep.SharedObject.target;
}

/*  */

var VNode = function VNode (
  tag,
  data,
  children,
  text,
  elm,
  context,
  componentOptions,
  asyncFactory
) {
  this.tag = tag;
  this.data = data;
  this.children = children;
  this.text = text;
  this.elm = elm;
  this.ns = undefined;
  this.context = context;
  this.fnContext = undefined;
  this.fnOptions = undefined;
  this.fnScopeId = undefined;
  this.key = data && data.key;
  this.componentOptions = componentOptions;
  this.componentInstance = undefined;
  this.parent = undefined;
  this.raw = false;
  this.isStatic = false;
  this.isRootInsert = true;
  this.isComment = false;
  this.isCloned = false;
  this.isOnce = false;
  this.asyncFactory = asyncFactory;
  this.asyncMeta = undefined;
  this.isAsyncPlaceholder = false;
};

var prototypeAccessors = { child: { configurable: true } };

// DEPRECATED: alias for componentInstance for backwards compat.
/* istanbul ignore next */
prototypeAccessors.child.get = function () {
  return this.componentInstance
};

Object.defineProperties( VNode.prototype, prototypeAccessors );

var createEmptyVNode = function (text) {
  if ( text === void 0 ) text = '';

  var node = new VNode();
  node.text = text;
  node.isComment = true;
  return node
};

function createTextVNode (val) {
  return new VNode(undefined, undefined, undefined, String(val))
}

// optimized shallow clone
// used for static nodes and slot nodes because they may be reused across
// multiple renders, cloning them avoids errors when DOM manipulations rely
// on their elm reference.
function cloneVNode (vnode) {
  var cloned = new VNode(
    vnode.tag,
    vnode.data,
    // #7975
    // clone children array to avoid mutating original in case of cloning
    // a child.
    vnode.children && vnode.children.slice(),
    vnode.text,
    vnode.elm,
    vnode.context,
    vnode.componentOptions,
    vnode.asyncFactory
  );
  cloned.ns = vnode.ns;
  cloned.isStatic = vnode.isStatic;
  cloned.key = vnode.key;
  cloned.isComment = vnode.isComment;
  cloned.fnContext = vnode.fnContext;
  cloned.fnOptions = vnode.fnOptions;
  cloned.fnScopeId = vnode.fnScopeId;
  cloned.asyncMeta = vnode.asyncMeta;
  cloned.isCloned = true;
  return cloned
}

/*
 * not type checking this file because flow doesn't play well with
 * dynamically accessing methods on Array prototype
 */

var arrayProto = Array.prototype;
var arrayMethods = Object.create(arrayProto);

var methodsToPatch = [
  'push',
  'pop',
  'shift',
  'unshift',
  'splice',
  'sort',
  'reverse'
];

/**
 * Intercept mutating methods and emit events
 */
methodsToPatch.forEach(function (method) {
  // cache original method
  var original = arrayProto[method];
  def(arrayMethods, method, function mutator () {
    var args = [], len = arguments.length;
    while ( len-- ) args[ len ] = arguments[ len ];

    var result = original.apply(this, args);
    var ob = this.__ob__;
    var inserted;
    switch (method) {
      case 'push':
      case 'unshift':
        inserted = args;
        break
      case 'splice':
        inserted = args.slice(2);
        break
    }
    if (inserted) { ob.observeArray(inserted); }
    // notify change
    ob.dep.notify();
    return result
  });
});

/*  */

var arrayKeys = Object.getOwnPropertyNames(arrayMethods);

/**
 * In some cases we may want to disable observation inside a component's
 * update computation.
 */
var shouldObserve = true;

function toggleObserving (value) {
  shouldObserve = value;
}

/**
 * Observer class that is attached to each observed
 * object. Once attached, the observer converts the target
 * object's property keys into getter/setters that
 * collect dependencies and dispatch updates.
 */
var Observer = function Observer (value) {
  this.value = value;
  this.dep = new Dep();
  this.vmCount = 0;
  def(value, '__ob__', this);
  if (Array.isArray(value)) {
    if (hasProto) {
      {// fixed by xxxxxx 微信小程序使用 plugins 之后，数组方法被直接挂载到了数组对象上，需要执行 copyAugment 逻辑
        if(value.push !== value.__proto__.push){
          copyAugment(value, arrayMethods, arrayKeys);
        } else {
          protoAugment(value, arrayMethods);
        }
      }
    } else {
      copyAugment(value, arrayMethods, arrayKeys);
    }
    this.observeArray(value);
  } else {
    this.walk(value);
  }
};

/**
 * Walk through all properties and convert them into
 * getter/setters. This method should only be called when
 * value type is Object.
 */
Observer.prototype.walk = function walk (obj) {
  var keys = Object.keys(obj);
  for (var i = 0; i < keys.length; i++) {
    defineReactive$$1(obj, keys[i]);
  }
};

/**
 * Observe a list of Array items.
 */
Observer.prototype.observeArray = function observeArray (items) {
  for (var i = 0, l = items.length; i < l; i++) {
    observe(items[i]);
  }
};

// helpers

/**
 * Augment a target Object or Array by intercepting
 * the prototype chain using __proto__
 */
function protoAugment (target, src) {
  /* eslint-disable no-proto */
  target.__proto__ = src;
  /* eslint-enable no-proto */
}

/**
 * Augment a target Object or Array by defining
 * hidden properties.
 */
/* istanbul ignore next */
function copyAugment (target, src, keys) {
  for (var i = 0, l = keys.length; i < l; i++) {
    var key = keys[i];
    def(target, key, src[key]);
  }
}

/**
 * Attempt to create an observer instance for a value,
 * returns the new observer if successfully observed,
 * or the existing observer if the value already has one.
 */
function observe (value, asRootData) {
  if (!isObject(value) || value instanceof VNode) {
    return
  }
  var ob;
  if (hasOwn(value, '__ob__') && value.__ob__ instanceof Observer) {
    ob = value.__ob__;
  } else if (
    shouldObserve &&
    !isServerRendering() &&
    (Array.isArray(value) || isPlainObject(value)) &&
    Object.isExtensible(value) &&
    !value._isVue
  ) {
    ob = new Observer(value);
  }
  if (asRootData && ob) {
    ob.vmCount++;
  }
  return ob
}

/**
 * Define a reactive property on an Object.
 */
function defineReactive$$1 (
  obj,
  key,
  val,
  customSetter,
  shallow
) {
  var dep = new Dep();

  var property = Object.getOwnPropertyDescriptor(obj, key);
  if (property && property.configurable === false) {
    return
  }

  // cater for pre-defined getter/setters
  var getter = property && property.get;
  var setter = property && property.set;
  if ((!getter || setter) && arguments.length === 2) {
    val = obj[key];
  }

  var childOb = !shallow && observe(val);
  Object.defineProperty(obj, key, {
    enumerable: true,
    configurable: true,
    get: function reactiveGetter () {
      var value = getter ? getter.call(obj) : val;
      if (Dep.SharedObject.target) { // fixed by xxxxxx
        dep.depend();
        if (childOb) {
          childOb.dep.depend();
          if (Array.isArray(value)) {
            dependArray(value);
          }
        }
      }
      return value
    },
    set: function reactiveSetter (newVal) {
      var value = getter ? getter.call(obj) : val;
      /* eslint-disable no-self-compare */
      if (newVal === value || (newVal !== newVal && value !== value)) {
        return
      }
      /* eslint-enable no-self-compare */
      if ( true && customSetter) {
        customSetter();
      }
      // #7981: for accessor properties without setter
      if (getter && !setter) { return }
      if (setter) {
        setter.call(obj, newVal);
      } else {
        val = newVal;
      }
      childOb = !shallow && observe(newVal);
      dep.notify();
    }
  });
}

/**
 * Set a property on an object. Adds the new property and
 * triggers change notification if the property doesn't
 * already exist.
 */
function set (target, key, val) {
  if ( true &&
    (isUndef(target) || isPrimitive(target))
  ) {
    warn(("Cannot set reactive property on undefined, null, or primitive value: " + ((target))));
  }
  if (Array.isArray(target) && isValidArrayIndex(key)) {
    target.length = Math.max(target.length, key);
    target.splice(key, 1, val);
    return val
  }
  if (key in target && !(key in Object.prototype)) {
    target[key] = val;
    return val
  }
  var ob = (target).__ob__;
  if (target._isVue || (ob && ob.vmCount)) {
     true && warn(
      'Avoid adding reactive properties to a Vue instance or its root $data ' +
      'at runtime - declare it upfront in the data option.'
    );
    return val
  }
  if (!ob) {
    target[key] = val;
    return val
  }
  defineReactive$$1(ob.value, key, val);
  ob.dep.notify();
  return val
}

/**
 * Delete a property and trigger change if necessary.
 */
function del (target, key) {
  if ( true &&
    (isUndef(target) || isPrimitive(target))
  ) {
    warn(("Cannot delete reactive property on undefined, null, or primitive value: " + ((target))));
  }
  if (Array.isArray(target) && isValidArrayIndex(key)) {
    target.splice(key, 1);
    return
  }
  var ob = (target).__ob__;
  if (target._isVue || (ob && ob.vmCount)) {
     true && warn(
      'Avoid deleting properties on a Vue instance or its root $data ' +
      '- just set it to null.'
    );
    return
  }
  if (!hasOwn(target, key)) {
    return
  }
  delete target[key];
  if (!ob) {
    return
  }
  ob.dep.notify();
}

/**
 * Collect dependencies on array elements when the array is touched, since
 * we cannot intercept array element access like property getters.
 */
function dependArray (value) {
  for (var e = (void 0), i = 0, l = value.length; i < l; i++) {
    e = value[i];
    e && e.__ob__ && e.__ob__.dep.depend();
    if (Array.isArray(e)) {
      dependArray(e);
    }
  }
}

/*  */

/**
 * Option overwriting strategies are functions that handle
 * how to merge a parent option value and a child option
 * value into the final value.
 */
var strats = config.optionMergeStrategies;

/**
 * Options with restrictions
 */
if (true) {
  strats.el = strats.propsData = function (parent, child, vm, key) {
    if (!vm) {
      warn(
        "option \"" + key + "\" can only be used during instance " +
        'creation with the `new` keyword.'
      );
    }
    return defaultStrat(parent, child)
  };
}

/**
 * Helper that recursively merges two data objects together.
 */
function mergeData (to, from) {
  if (!from) { return to }
  var key, toVal, fromVal;

  var keys = hasSymbol
    ? Reflect.ownKeys(from)
    : Object.keys(from);

  for (var i = 0; i < keys.length; i++) {
    key = keys[i];
    // in case the object is already observed...
    if (key === '__ob__') { continue }
    toVal = to[key];
    fromVal = from[key];
    if (!hasOwn(to, key)) {
      set(to, key, fromVal);
    } else if (
      toVal !== fromVal &&
      isPlainObject(toVal) &&
      isPlainObject(fromVal)
    ) {
      mergeData(toVal, fromVal);
    }
  }
  return to
}

/**
 * Data
 */
function mergeDataOrFn (
  parentVal,
  childVal,
  vm
) {
  if (!vm) {
    // in a Vue.extend merge, both should be functions
    if (!childVal) {
      return parentVal
    }
    if (!parentVal) {
      return childVal
    }
    // when parentVal & childVal are both present,
    // we need to return a function that returns the
    // merged result of both functions... no need to
    // check if parentVal is a function here because
    // it has to be a function to pass previous merges.
    return function mergedDataFn () {
      return mergeData(
        typeof childVal === 'function' ? childVal.call(this, this) : childVal,
        typeof parentVal === 'function' ? parentVal.call(this, this) : parentVal
      )
    }
  } else {
    return function mergedInstanceDataFn () {
      // instance merge
      var instanceData = typeof childVal === 'function'
        ? childVal.call(vm, vm)
        : childVal;
      var defaultData = typeof parentVal === 'function'
        ? parentVal.call(vm, vm)
        : parentVal;
      if (instanceData) {
        return mergeData(instanceData, defaultData)
      } else {
        return defaultData
      }
    }
  }
}

strats.data = function (
  parentVal,
  childVal,
  vm
) {
  if (!vm) {
    if (childVal && typeof childVal !== 'function') {
       true && warn(
        'The "data" option should be a function ' +
        'that returns a per-instance value in component ' +
        'definitions.',
        vm
      );

      return parentVal
    }
    return mergeDataOrFn(parentVal, childVal)
  }

  return mergeDataOrFn(parentVal, childVal, vm)
};

/**
 * Hooks and props are merged as arrays.
 */
function mergeHook (
  parentVal,
  childVal
) {
  var res = childVal
    ? parentVal
      ? parentVal.concat(childVal)
      : Array.isArray(childVal)
        ? childVal
        : [childVal]
    : parentVal;
  return res
    ? dedupeHooks(res)
    : res
}

function dedupeHooks (hooks) {
  var res = [];
  for (var i = 0; i < hooks.length; i++) {
    if (res.indexOf(hooks[i]) === -1) {
      res.push(hooks[i]);
    }
  }
  return res
}

LIFECYCLE_HOOKS.forEach(function (hook) {
  strats[hook] = mergeHook;
});

/**
 * Assets
 *
 * When a vm is present (instance creation), we need to do
 * a three-way merge between constructor options, instance
 * options and parent options.
 */
function mergeAssets (
  parentVal,
  childVal,
  vm,
  key
) {
  var res = Object.create(parentVal || null);
  if (childVal) {
     true && assertObjectType(key, childVal, vm);
    return extend(res, childVal)
  } else {
    return res
  }
}

ASSET_TYPES.forEach(function (type) {
  strats[type + 's'] = mergeAssets;
});

/**
 * Watchers.
 *
 * Watchers hashes should not overwrite one
 * another, so we merge them as arrays.
 */
strats.watch = function (
  parentVal,
  childVal,
  vm,
  key
) {
  // work around Firefox's Object.prototype.watch...
  if (parentVal === nativeWatch) { parentVal = undefined; }
  if (childVal === nativeWatch) { childVal = undefined; }
  /* istanbul ignore if */
  if (!childVal) { return Object.create(parentVal || null) }
  if (true) {
    assertObjectType(key, childVal, vm);
  }
  if (!parentVal) { return childVal }
  var ret = {};
  extend(ret, parentVal);
  for (var key$1 in childVal) {
    var parent = ret[key$1];
    var child = childVal[key$1];
    if (parent && !Array.isArray(parent)) {
      parent = [parent];
    }
    ret[key$1] = parent
      ? parent.concat(child)
      : Array.isArray(child) ? child : [child];
  }
  return ret
};

/**
 * Other object hashes.
 */
strats.props =
strats.methods =
strats.inject =
strats.computed = function (
  parentVal,
  childVal,
  vm,
  key
) {
  if (childVal && "development" !== 'production') {
    assertObjectType(key, childVal, vm);
  }
  if (!parentVal) { return childVal }
  var ret = Object.create(null);
  extend(ret, parentVal);
  if (childVal) { extend(ret, childVal); }
  return ret
};
strats.provide = mergeDataOrFn;

/**
 * Default strategy.
 */
var defaultStrat = function (parentVal, childVal) {
  return childVal === undefined
    ? parentVal
    : childVal
};

/**
 * Validate component names
 */
function checkComponents (options) {
  for (var key in options.components) {
    validateComponentName(key);
  }
}

function validateComponentName (name) {
  if (!new RegExp(("^[a-zA-Z][\\-\\.0-9_" + (unicodeRegExp.source) + "]*$")).test(name)) {
    warn(
      'Invalid component name: "' + name + '". Component names ' +
      'should conform to valid custom element name in html5 specification.'
    );
  }
  if (isBuiltInTag(name) || config.isReservedTag(name)) {
    warn(
      'Do not use built-in or reserved HTML elements as component ' +
      'id: ' + name
    );
  }
}

/**
 * Ensure all props option syntax are normalized into the
 * Object-based format.
 */
function normalizeProps (options, vm) {
  var props = options.props;
  if (!props) { return }
  var res = {};
  var i, val, name;
  if (Array.isArray(props)) {
    i = props.length;
    while (i--) {
      val = props[i];
      if (typeof val === 'string') {
        name = camelize(val);
        res[name] = { type: null };
      } else if (true) {
        warn('props must be strings when using array syntax.');
      }
    }
  } else if (isPlainObject(props)) {
    for (var key in props) {
      val = props[key];
      name = camelize(key);
      res[name] = isPlainObject(val)
        ? val
        : { type: val };
    }
  } else if (true) {
    warn(
      "Invalid value for option \"props\": expected an Array or an Object, " +
      "but got " + (toRawType(props)) + ".",
      vm
    );
  }
  options.props = res;
}

/**
 * Normalize all injections into Object-based format
 */
function normalizeInject (options, vm) {
  var inject = options.inject;
  if (!inject) { return }
  var normalized = options.inject = {};
  if (Array.isArray(inject)) {
    for (var i = 0; i < inject.length; i++) {
      normalized[inject[i]] = { from: inject[i] };
    }
  } else if (isPlainObject(inject)) {
    for (var key in inject) {
      var val = inject[key];
      normalized[key] = isPlainObject(val)
        ? extend({ from: key }, val)
        : { from: val };
    }
  } else if (true) {
    warn(
      "Invalid value for option \"inject\": expected an Array or an Object, " +
      "but got " + (toRawType(inject)) + ".",
      vm
    );
  }
}

/**
 * Normalize raw function directives into object format.
 */
function normalizeDirectives (options) {
  var dirs = options.directives;
  if (dirs) {
    for (var key in dirs) {
      var def$$1 = dirs[key];
      if (typeof def$$1 === 'function') {
        dirs[key] = { bind: def$$1, update: def$$1 };
      }
    }
  }
}

function assertObjectType (name, value, vm) {
  if (!isPlainObject(value)) {
    warn(
      "Invalid value for option \"" + name + "\": expected an Object, " +
      "but got " + (toRawType(value)) + ".",
      vm
    );
  }
}

/**
 * Merge two option objects into a new one.
 * Core utility used in both instantiation and inheritance.
 */
function mergeOptions (
  parent,
  child,
  vm
) {
  if (true) {
    checkComponents(child);
  }

  if (typeof child === 'function') {
    child = child.options;
  }

  normalizeProps(child, vm);
  normalizeInject(child, vm);
  normalizeDirectives(child);

  // Apply extends and mixins on the child options,
  // but only if it is a raw options object that isn't
  // the result of another mergeOptions call.
  // Only merged options has the _base property.
  if (!child._base) {
    if (child.extends) {
      parent = mergeOptions(parent, child.extends, vm);
    }
    if (child.mixins) {
      for (var i = 0, l = child.mixins.length; i < l; i++) {
        parent = mergeOptions(parent, child.mixins[i], vm);
      }
    }
  }

  var options = {};
  var key;
  for (key in parent) {
    mergeField(key);
  }
  for (key in child) {
    if (!hasOwn(parent, key)) {
      mergeField(key);
    }
  }
  function mergeField (key) {
    var strat = strats[key] || defaultStrat;
    options[key] = strat(parent[key], child[key], vm, key);
  }
  return options
}

/**
 * Resolve an asset.
 * This function is used because child instances need access
 * to assets defined in its ancestor chain.
 */
function resolveAsset (
  options,
  type,
  id,
  warnMissing
) {
  /* istanbul ignore if */
  if (typeof id !== 'string') {
    return
  }
  var assets = options[type];
  // check local registration variations first
  if (hasOwn(assets, id)) { return assets[id] }
  var camelizedId = camelize(id);
  if (hasOwn(assets, camelizedId)) { return assets[camelizedId] }
  var PascalCaseId = capitalize(camelizedId);
  if (hasOwn(assets, PascalCaseId)) { return assets[PascalCaseId] }
  // fallback to prototype chain
  var res = assets[id] || assets[camelizedId] || assets[PascalCaseId];
  if ( true && warnMissing && !res) {
    warn(
      'Failed to resolve ' + type.slice(0, -1) + ': ' + id,
      options
    );
  }
  return res
}

/*  */



function validateProp (
  key,
  propOptions,
  propsData,
  vm
) {
  var prop = propOptions[key];
  var absent = !hasOwn(propsData, key);
  var value = propsData[key];
  // boolean casting
  var booleanIndex = getTypeIndex(Boolean, prop.type);
  if (booleanIndex > -1) {
    if (absent && !hasOwn(prop, 'default')) {
      value = false;
    } else if (value === '' || value === hyphenate(key)) {
      // only cast empty string / same name to boolean if
      // boolean has higher priority
      var stringIndex = getTypeIndex(String, prop.type);
      if (stringIndex < 0 || booleanIndex < stringIndex) {
        value = true;
      }
    }
  }
  // check default value
  if (value === undefined) {
    value = getPropDefaultValue(vm, prop, key);
    // since the default value is a fresh copy,
    // make sure to observe it.
    var prevShouldObserve = shouldObserve;
    toggleObserving(true);
    observe(value);
    toggleObserving(prevShouldObserve);
  }
  if (
    true
  ) {
    assertProp(prop, key, value, vm, absent);
  }
  return value
}

/**
 * Get the default value of a prop.
 */
function getPropDefaultValue (vm, prop, key) {
  // no default, return undefined
  if (!hasOwn(prop, 'default')) {
    return undefined
  }
  var def = prop.default;
  // warn against non-factory defaults for Object & Array
  if ( true && isObject(def)) {
    warn(
      'Invalid default value for prop "' + key + '": ' +
      'Props with type Object/Array must use a factory function ' +
      'to return the default value.',
      vm
    );
  }
  // the raw prop value was also undefined from previous render,
  // return previous default value to avoid unnecessary watcher trigger
  if (vm && vm.$options.propsData &&
    vm.$options.propsData[key] === undefined &&
    vm._props[key] !== undefined
  ) {
    return vm._props[key]
  }
  // call factory function for non-Function types
  // a value is Function if its prototype is function even across different execution context
  return typeof def === 'function' && getType(prop.type) !== 'Function'
    ? def.call(vm)
    : def
}

/**
 * Assert whether a prop is valid.
 */
function assertProp (
  prop,
  name,
  value,
  vm,
  absent
) {
  if (prop.required && absent) {
    warn(
      'Missing required prop: "' + name + '"',
      vm
    );
    return
  }
  if (value == null && !prop.required) {
    return
  }
  var type = prop.type;
  var valid = !type || type === true;
  var expectedTypes = [];
  if (type) {
    if (!Array.isArray(type)) {
      type = [type];
    }
    for (var i = 0; i < type.length && !valid; i++) {
      var assertedType = assertType(value, type[i]);
      expectedTypes.push(assertedType.expectedType || '');
      valid = assertedType.valid;
    }
  }

  if (!valid) {
    warn(
      getInvalidTypeMessage(name, value, expectedTypes),
      vm
    );
    return
  }
  var validator = prop.validator;
  if (validator) {
    if (!validator(value)) {
      warn(
        'Invalid prop: custom validator check failed for prop "' + name + '".',
        vm
      );
    }
  }
}

var simpleCheckRE = /^(String|Number|Boolean|Function|Symbol)$/;

function assertType (value, type) {
  var valid;
  var expectedType = getType(type);
  if (simpleCheckRE.test(expectedType)) {
    var t = typeof value;
    valid = t === expectedType.toLowerCase();
    // for primitive wrapper objects
    if (!valid && t === 'object') {
      valid = value instanceof type;
    }
  } else if (expectedType === 'Object') {
    valid = isPlainObject(value);
  } else if (expectedType === 'Array') {
    valid = Array.isArray(value);
  } else {
    valid = value instanceof type;
  }
  return {
    valid: valid,
    expectedType: expectedType
  }
}

/**
 * Use function string name to check built-in types,
 * because a simple equality check will fail when running
 * across different vms / iframes.
 */
function getType (fn) {
  var match = fn && fn.toString().match(/^\s*function (\w+)/);
  return match ? match[1] : ''
}

function isSameType (a, b) {
  return getType(a) === getType(b)
}

function getTypeIndex (type, expectedTypes) {
  if (!Array.isArray(expectedTypes)) {
    return isSameType(expectedTypes, type) ? 0 : -1
  }
  for (var i = 0, len = expectedTypes.length; i < len; i++) {
    if (isSameType(expectedTypes[i], type)) {
      return i
    }
  }
  return -1
}

function getInvalidTypeMessage (name, value, expectedTypes) {
  var message = "Invalid prop: type check failed for prop \"" + name + "\"." +
    " Expected " + (expectedTypes.map(capitalize).join(', '));
  var expectedType = expectedTypes[0];
  var receivedType = toRawType(value);
  var expectedValue = styleValue(value, expectedType);
  var receivedValue = styleValue(value, receivedType);
  // check if we need to specify expected value
  if (expectedTypes.length === 1 &&
      isExplicable(expectedType) &&
      !isBoolean(expectedType, receivedType)) {
    message += " with value " + expectedValue;
  }
  message += ", got " + receivedType + " ";
  // check if we need to specify received value
  if (isExplicable(receivedType)) {
    message += "with value " + receivedValue + ".";
  }
  return message
}

function styleValue (value, type) {
  if (type === 'String') {
    return ("\"" + value + "\"")
  } else if (type === 'Number') {
    return ("" + (Number(value)))
  } else {
    return ("" + value)
  }
}

function isExplicable (value) {
  var explicitTypes = ['string', 'number', 'boolean'];
  return explicitTypes.some(function (elem) { return value.toLowerCase() === elem; })
}

function isBoolean () {
  var args = [], len = arguments.length;
  while ( len-- ) args[ len ] = arguments[ len ];

  return args.some(function (elem) { return elem.toLowerCase() === 'boolean'; })
}

/*  */

function handleError (err, vm, info) {
  // Deactivate deps tracking while processing error handler to avoid possible infinite rendering.
  // See: https://github.com/vuejs/vuex/issues/1505
  pushTarget();
  try {
    if (vm) {
      var cur = vm;
      while ((cur = cur.$parent)) {
        var hooks = cur.$options.errorCaptured;
        if (hooks) {
          for (var i = 0; i < hooks.length; i++) {
            try {
              var capture = hooks[i].call(cur, err, vm, info) === false;
              if (capture) { return }
            } catch (e) {
              globalHandleError(e, cur, 'errorCaptured hook');
            }
          }
        }
      }
    }
    globalHandleError(err, vm, info);
  } finally {
    popTarget();
  }
}

function invokeWithErrorHandling (
  handler,
  context,
  args,
  vm,
  info
) {
  var res;
  try {
    res = args ? handler.apply(context, args) : handler.call(context);
    if (res && !res._isVue && isPromise(res) && !res._handled) {
      res.catch(function (e) { return handleError(e, vm, info + " (Promise/async)"); });
      // issue #9511
      // avoid catch triggering multiple times when nested calls
      res._handled = true;
    }
  } catch (e) {
    handleError(e, vm, info);
  }
  return res
}

function globalHandleError (err, vm, info) {
  if (config.errorHandler) {
    try {
      return config.errorHandler.call(null, err, vm, info)
    } catch (e) {
      // if the user intentionally throws the original error in the handler,
      // do not log it twice
      if (e !== err) {
        logError(e, null, 'config.errorHandler');
      }
    }
  }
  logError(err, vm, info);
}

function logError (err, vm, info) {
  if (true) {
    warn(("Error in " + info + ": \"" + (err.toString()) + "\""), vm);
  }
  /* istanbul ignore else */
  if ((inBrowser || inWeex) && typeof console !== 'undefined') {
    console.error(err);
  } else {
    throw err
  }
}

/*  */

var callbacks = [];
var pending = false;

function flushCallbacks () {
  pending = false;
  var copies = callbacks.slice(0);
  callbacks.length = 0;
  for (var i = 0; i < copies.length; i++) {
    copies[i]();
  }
}

// Here we have async deferring wrappers using microtasks.
// In 2.5 we used (macro) tasks (in combination with microtasks).
// However, it has subtle problems when state is changed right before repaint
// (e.g. #6813, out-in transitions).
// Also, using (macro) tasks in event handler would cause some weird behaviors
// that cannot be circumvented (e.g. #7109, #7153, #7546, #7834, #8109).
// So we now use microtasks everywhere, again.
// A major drawback of this tradeoff is that there are some scenarios
// where microtasks have too high a priority and fire in between supposedly
// sequential events (e.g. #4521, #6690, which have workarounds)
// or even between bubbling of the same event (#6566).
var timerFunc;

// The nextTick behavior leverages the microtask queue, which can be accessed
// via either native Promise.then or MutationObserver.
// MutationObserver has wider support, however it is seriously bugged in
// UIWebView in iOS >= 9.3.3 when triggered in touch event handlers. It
// completely stops working after triggering a few times... so, if native
// Promise is available, we will use it:
/* istanbul ignore next, $flow-disable-line */
if (typeof Promise !== 'undefined' && isNative(Promise)) {
  var p = Promise.resolve();
  timerFunc = function () {
    p.then(flushCallbacks);
    // In problematic UIWebViews, Promise.then doesn't completely break, but
    // it can get stuck in a weird state where callbacks are pushed into the
    // microtask queue but the queue isn't being flushed, until the browser
    // needs to do some other work, e.g. handle a timer. Therefore we can
    // "force" the microtask queue to be flushed by adding an empty timer.
    if (isIOS) { setTimeout(noop); }
  };
} else if (!isIE && typeof MutationObserver !== 'undefined' && (
  isNative(MutationObserver) ||
  // PhantomJS and iOS 7.x
  MutationObserver.toString() === '[object MutationObserverConstructor]'
)) {
  // Use MutationObserver where native Promise is not available,
  // e.g. PhantomJS, iOS7, Android 4.4
  // (#6466 MutationObserver is unreliable in IE11)
  var counter = 1;
  var observer = new MutationObserver(flushCallbacks);
  var textNode = document.createTextNode(String(counter));
  observer.observe(textNode, {
    characterData: true
  });
  timerFunc = function () {
    counter = (counter + 1) % 2;
    textNode.data = String(counter);
  };
} else if (typeof setImmediate !== 'undefined' && isNative(setImmediate)) {
  // Fallback to setImmediate.
  // Technically it leverages the (macro) task queue,
  // but it is still a better choice than setTimeout.
  timerFunc = function () {
    setImmediate(flushCallbacks);
  };
} else {
  // Fallback to setTimeout.
  timerFunc = function () {
    setTimeout(flushCallbacks, 0);
  };
}

function nextTick (cb, ctx) {
  var _resolve;
  callbacks.push(function () {
    if (cb) {
      try {
        cb.call(ctx);
      } catch (e) {
        handleError(e, ctx, 'nextTick');
      }
    } else if (_resolve) {
      _resolve(ctx);
    }
  });
  if (!pending) {
    pending = true;
    timerFunc();
  }
  // $flow-disable-line
  if (!cb && typeof Promise !== 'undefined') {
    return new Promise(function (resolve) {
      _resolve = resolve;
    })
  }
}

/*  */

/* not type checking this file because flow doesn't play well with Proxy */

var initProxy;

if (true) {
  var allowedGlobals = makeMap(
    'Infinity,undefined,NaN,isFinite,isNaN,' +
    'parseFloat,parseInt,decodeURI,decodeURIComponent,encodeURI,encodeURIComponent,' +
    'Math,Number,Date,Array,Object,Boolean,String,RegExp,Map,Set,JSON,Intl,' +
    'require' // for Webpack/Browserify
  );

  var warnNonPresent = function (target, key) {
    warn(
      "Property or method \"" + key + "\" is not defined on the instance but " +
      'referenced during render. Make sure that this property is reactive, ' +
      'either in the data option, or for class-based components, by ' +
      'initializing the property. ' +
      'See: https://vuejs.org/v2/guide/reactivity.html#Declaring-Reactive-Properties.',
      target
    );
  };

  var warnReservedPrefix = function (target, key) {
    warn(
      "Property \"" + key + "\" must be accessed with \"$data." + key + "\" because " +
      'properties starting with "$" or "_" are not proxied in the Vue instance to ' +
      'prevent conflicts with Vue internals. ' +
      'See: https://vuejs.org/v2/api/#data',
      target
    );
  };

  var hasProxy =
    typeof Proxy !== 'undefined' && isNative(Proxy);

  if (hasProxy) {
    var isBuiltInModifier = makeMap('stop,prevent,self,ctrl,shift,alt,meta,exact');
    config.keyCodes = new Proxy(config.keyCodes, {
      set: function set (target, key, value) {
        if (isBuiltInModifier(key)) {
          warn(("Avoid overwriting built-in modifier in config.keyCodes: ." + key));
          return false
        } else {
          target[key] = value;
          return true
        }
      }
    });
  }

  var hasHandler = {
    has: function has (target, key) {
      var has = key in target;
      var isAllowed = allowedGlobals(key) ||
        (typeof key === 'string' && key.charAt(0) === '_' && !(key in target.$data));
      if (!has && !isAllowed) {
        if (key in target.$data) { warnReservedPrefix(target, key); }
        else { warnNonPresent(target, key); }
      }
      return has || !isAllowed
    }
  };

  var getHandler = {
    get: function get (target, key) {
      if (typeof key === 'string' && !(key in target)) {
        if (key in target.$data) { warnReservedPrefix(target, key); }
        else { warnNonPresent(target, key); }
      }
      return target[key]
    }
  };

  initProxy = function initProxy (vm) {
    if (hasProxy) {
      // determine which proxy handler to use
      var options = vm.$options;
      var handlers = options.render && options.render._withStripped
        ? getHandler
        : hasHandler;
      vm._renderProxy = new Proxy(vm, handlers);
    } else {
      vm._renderProxy = vm;
    }
  };
}

/*  */

var seenObjects = new _Set();

/**
 * Recursively traverse an object to evoke all converted
 * getters, so that every nested property inside the object
 * is collected as a "deep" dependency.
 */
function traverse (val) {
  _traverse(val, seenObjects);
  seenObjects.clear();
}

function _traverse (val, seen) {
  var i, keys;
  var isA = Array.isArray(val);
  if ((!isA && !isObject(val)) || Object.isFrozen(val) || val instanceof VNode) {
    return
  }
  if (val.__ob__) {
    var depId = val.__ob__.dep.id;
    if (seen.has(depId)) {
      return
    }
    seen.add(depId);
  }
  if (isA) {
    i = val.length;
    while (i--) { _traverse(val[i], seen); }
  } else {
    keys = Object.keys(val);
    i = keys.length;
    while (i--) { _traverse(val[keys[i]], seen); }
  }
}

var mark;
var measure;

if (true) {
  var perf = inBrowser && window.performance;
  /* istanbul ignore if */
  if (
    perf &&
    perf.mark &&
    perf.measure &&
    perf.clearMarks &&
    perf.clearMeasures
  ) {
    mark = function (tag) { return perf.mark(tag); };
    measure = function (name, startTag, endTag) {
      perf.measure(name, startTag, endTag);
      perf.clearMarks(startTag);
      perf.clearMarks(endTag);
      // perf.clearMeasures(name)
    };
  }
}

/*  */

var normalizeEvent = cached(function (name) {
  var passive = name.charAt(0) === '&';
  name = passive ? name.slice(1) : name;
  var once$$1 = name.charAt(0) === '~'; // Prefixed last, checked first
  name = once$$1 ? name.slice(1) : name;
  var capture = name.charAt(0) === '!';
  name = capture ? name.slice(1) : name;
  return {
    name: name,
    once: once$$1,
    capture: capture,
    passive: passive
  }
});

function createFnInvoker (fns, vm) {
  function invoker () {
    var arguments$1 = arguments;

    var fns = invoker.fns;
    if (Array.isArray(fns)) {
      var cloned = fns.slice();
      for (var i = 0; i < cloned.length; i++) {
        invokeWithErrorHandling(cloned[i], null, arguments$1, vm, "v-on handler");
      }
    } else {
      // return handler return value for single handlers
      return invokeWithErrorHandling(fns, null, arguments, vm, "v-on handler")
    }
  }
  invoker.fns = fns;
  return invoker
}

function updateListeners (
  on,
  oldOn,
  add,
  remove$$1,
  createOnceHandler,
  vm
) {
  var name, def$$1, cur, old, event;
  for (name in on) {
    def$$1 = cur = on[name];
    old = oldOn[name];
    event = normalizeEvent(name);
    if (isUndef(cur)) {
       true && warn(
        "Invalid handler for event \"" + (event.name) + "\": got " + String(cur),
        vm
      );
    } else if (isUndef(old)) {
      if (isUndef(cur.fns)) {
        cur = on[name] = createFnInvoker(cur, vm);
      }
      if (isTrue(event.once)) {
        cur = on[name] = createOnceHandler(event.name, cur, event.capture);
      }
      add(event.name, cur, event.capture, event.passive, event.params);
    } else if (cur !== old) {
      old.fns = cur;
      on[name] = old;
    }
  }
  for (name in oldOn) {
    if (isUndef(on[name])) {
      event = normalizeEvent(name);
      remove$$1(event.name, oldOn[name], event.capture);
    }
  }
}

/*  */

/*  */

// fixed by xxxxxx (mp properties)
function extractPropertiesFromVNodeData(data, Ctor, res, context) {
  var propOptions = Ctor.options.mpOptions && Ctor.options.mpOptions.properties;
  if (isUndef(propOptions)) {
    return res
  }
  var externalClasses = Ctor.options.mpOptions.externalClasses || [];
  var attrs = data.attrs;
  var props = data.props;
  if (isDef(attrs) || isDef(props)) {
    for (var key in propOptions) {
      var altKey = hyphenate(key);
      var result = checkProp(res, props, key, altKey, true) ||
          checkProp(res, attrs, key, altKey, false);
      // externalClass
      if (
        result &&
        res[key] &&
        externalClasses.indexOf(altKey) !== -1 &&
        context[camelize(res[key])]
      ) {
        // 赋值 externalClass 真正的值(模板里 externalClass 的值可能是字符串)
        res[key] = context[camelize(res[key])];
      }
    }
  }
  return res
}

function extractPropsFromVNodeData (
  data,
  Ctor,
  tag,
  context// fixed by xxxxxx
) {
  // we are only extracting raw values here.
  // validation and default values are handled in the child
  // component itself.
  var propOptions = Ctor.options.props;
  if (isUndef(propOptions)) {
    // fixed by xxxxxx
    return extractPropertiesFromVNodeData(data, Ctor, {}, context)
  }
  var res = {};
  var attrs = data.attrs;
  var props = data.props;
  if (isDef(attrs) || isDef(props)) {
    for (var key in propOptions) {
      var altKey = hyphenate(key);
      if (true) {
        var keyInLowerCase = key.toLowerCase();
        if (
          key !== keyInLowerCase &&
          attrs && hasOwn(attrs, keyInLowerCase)
        ) {
          tip(
            "Prop \"" + keyInLowerCase + "\" is passed to component " +
            (formatComponentName(tag || Ctor)) + ", but the declared prop name is" +
            " \"" + key + "\". " +
            "Note that HTML attributes are case-insensitive and camelCased " +
            "props need to use their kebab-case equivalents when using in-DOM " +
            "templates. You should probably use \"" + altKey + "\" instead of \"" + key + "\"."
          );
        }
      }
      checkProp(res, props, key, altKey, true) ||
      checkProp(res, attrs, key, altKey, false);
    }
  }
  // fixed by xxxxxx
  return extractPropertiesFromVNodeData(data, Ctor, res, context)
}

function checkProp (
  res,
  hash,
  key,
  altKey,
  preserve
) {
  if (isDef(hash)) {
    if (hasOwn(hash, key)) {
      res[key] = hash[key];
      if (!preserve) {
        delete hash[key];
      }
      return true
    } else if (hasOwn(hash, altKey)) {
      res[key] = hash[altKey];
      if (!preserve) {
        delete hash[altKey];
      }
      return true
    }
  }
  return false
}

/*  */

// The template compiler attempts to minimize the need for normalization by
// statically analyzing the template at compile time.
//
// For plain HTML markup, normalization can be completely skipped because the
// generated render function is guaranteed to return Array<VNode>. There are
// two cases where extra normalization is needed:

// 1. When the children contains components - because a functional component
// may return an Array instead of a single root. In this case, just a simple
// normalization is needed - if any child is an Array, we flatten the whole
// thing with Array.prototype.concat. It is guaranteed to be only 1-level deep
// because functional components already normalize their own children.
function simpleNormalizeChildren (children) {
  for (var i = 0; i < children.length; i++) {
    if (Array.isArray(children[i])) {
      return Array.prototype.concat.apply([], children)
    }
  }
  return children
}

// 2. When the children contains constructs that always generated nested Arrays,
// e.g. <template>, <slot>, v-for, or when the children is provided by user
// with hand-written render functions / JSX. In such cases a full normalization
// is needed to cater to all possible types of children values.
function normalizeChildren (children) {
  return isPrimitive(children)
    ? [createTextVNode(children)]
    : Array.isArray(children)
      ? normalizeArrayChildren(children)
      : undefined
}

function isTextNode (node) {
  return isDef(node) && isDef(node.text) && isFalse(node.isComment)
}

function normalizeArrayChildren (children, nestedIndex) {
  var res = [];
  var i, c, lastIndex, last;
  for (i = 0; i < children.length; i++) {
    c = children[i];
    if (isUndef(c) || typeof c === 'boolean') { continue }
    lastIndex = res.length - 1;
    last = res[lastIndex];
    //  nested
    if (Array.isArray(c)) {
      if (c.length > 0) {
        c = normalizeArrayChildren(c, ((nestedIndex || '') + "_" + i));
        // merge adjacent text nodes
        if (isTextNode(c[0]) && isTextNode(last)) {
          res[lastIndex] = createTextVNode(last.text + (c[0]).text);
          c.shift();
        }
        res.push.apply(res, c);
      }
    } else if (isPrimitive(c)) {
      if (isTextNode(last)) {
        // merge adjacent text nodes
        // this is necessary for SSR hydration because text nodes are
        // essentially merged when rendered to HTML strings
        res[lastIndex] = createTextVNode(last.text + c);
      } else if (c !== '') {
        // convert primitive to vnode
        res.push(createTextVNode(c));
      }
    } else {
      if (isTextNode(c) && isTextNode(last)) {
        // merge adjacent text nodes
        res[lastIndex] = createTextVNode(last.text + c.text);
      } else {
        // default key for nested array children (likely generated by v-for)
        if (isTrue(children._isVList) &&
          isDef(c.tag) &&
          isUndef(c.key) &&
          isDef(nestedIndex)) {
          c.key = "__vlist" + nestedIndex + "_" + i + "__";
        }
        res.push(c);
      }
    }
  }
  return res
}

/*  */

function initProvide (vm) {
  var provide = vm.$options.provide;
  if (provide) {
    vm._provided = typeof provide === 'function'
      ? provide.call(vm)
      : provide;
  }
}

function initInjections (vm) {
  var result = resolveInject(vm.$options.inject, vm);
  if (result) {
    toggleObserving(false);
    Object.keys(result).forEach(function (key) {
      /* istanbul ignore else */
      if (true) {
        defineReactive$$1(vm, key, result[key], function () {
          warn(
            "Avoid mutating an injected value directly since the changes will be " +
            "overwritten whenever the provided component re-renders. " +
            "injection being mutated: \"" + key + "\"",
            vm
          );
        });
      } else {}
    });
    toggleObserving(true);
  }
}

function resolveInject (inject, vm) {
  if (inject) {
    // inject is :any because flow is not smart enough to figure out cached
    var result = Object.create(null);
    var keys = hasSymbol
      ? Reflect.ownKeys(inject)
      : Object.keys(inject);

    for (var i = 0; i < keys.length; i++) {
      var key = keys[i];
      // #6574 in case the inject object is observed...
      if (key === '__ob__') { continue }
      var provideKey = inject[key].from;
      var source = vm;
      while (source) {
        if (source._provided && hasOwn(source._provided, provideKey)) {
          result[key] = source._provided[provideKey];
          break
        }
        source = source.$parent;
      }
      if (!source) {
        if ('default' in inject[key]) {
          var provideDefault = inject[key].default;
          result[key] = typeof provideDefault === 'function'
            ? provideDefault.call(vm)
            : provideDefault;
        } else if (true) {
          warn(("Injection \"" + key + "\" not found"), vm);
        }
      }
    }
    return result
  }
}

/*  */



/**
 * Runtime helper for resolving raw children VNodes into a slot object.
 */
function resolveSlots (
  children,
  context
) {
  if (!children || !children.length) {
    return {}
  }
  var slots = {};
  for (var i = 0, l = children.length; i < l; i++) {
    var child = children[i];
    var data = child.data;
    // remove slot attribute if the node is resolved as a Vue slot node
    if (data && data.attrs && data.attrs.slot) {
      delete data.attrs.slot;
    }
    // named slots should only be respected if the vnode was rendered in the
    // same context.
    if ((child.context === context || child.fnContext === context) &&
      data && data.slot != null
    ) {
      var name = data.slot;
      var slot = (slots[name] || (slots[name] = []));
      if (child.tag === 'template') {
        slot.push.apply(slot, child.children || []);
      } else {
        slot.push(child);
      }
    } else {
      // fixed by xxxxxx 临时 hack 掉 uni-app 中的异步 name slot page
      if(child.asyncMeta && child.asyncMeta.data && child.asyncMeta.data.slot === 'page'){
        (slots['page'] || (slots['page'] = [])).push(child);
      }else{
        (slots.default || (slots.default = [])).push(child);
      }
    }
  }
  // ignore slots that contains only whitespace
  for (var name$1 in slots) {
    if (slots[name$1].every(isWhitespace)) {
      delete slots[name$1];
    }
  }
  return slots
}

function isWhitespace (node) {
  return (node.isComment && !node.asyncFactory) || node.text === ' '
}

/*  */

function normalizeScopedSlots (
  slots,
  normalSlots,
  prevSlots
) {
  var res;
  var hasNormalSlots = Object.keys(normalSlots).length > 0;
  var isStable = slots ? !!slots.$stable : !hasNormalSlots;
  var key = slots && slots.$key;
  if (!slots) {
    res = {};
  } else if (slots._normalized) {
    // fast path 1: child component re-render only, parent did not change
    return slots._normalized
  } else if (
    isStable &&
    prevSlots &&
    prevSlots !== emptyObject &&
    key === prevSlots.$key &&
    !hasNormalSlots &&
    !prevSlots.$hasNormal
  ) {
    // fast path 2: stable scoped slots w/ no normal slots to proxy,
    // only need to normalize once
    return prevSlots
  } else {
    res = {};
    for (var key$1 in slots) {
      if (slots[key$1] && key$1[0] !== '$') {
        res[key$1] = normalizeScopedSlot(normalSlots, key$1, slots[key$1]);
      }
    }
  }
  // expose normal slots on scopedSlots
  for (var key$2 in normalSlots) {
    if (!(key$2 in res)) {
      res[key$2] = proxyNormalSlot(normalSlots, key$2);
    }
  }
  // avoriaz seems to mock a non-extensible $scopedSlots object
  // and when that is passed down this would cause an error
  if (slots && Object.isExtensible(slots)) {
    (slots)._normalized = res;
  }
  def(res, '$stable', isStable);
  def(res, '$key', key);
  def(res, '$hasNormal', hasNormalSlots);
  return res
}

function normalizeScopedSlot(normalSlots, key, fn) {
  var normalized = function () {
    var res = arguments.length ? fn.apply(null, arguments) : fn({});
    res = res && typeof res === 'object' && !Array.isArray(res)
      ? [res] // single vnode
      : normalizeChildren(res);
    return res && (
      res.length === 0 ||
      (res.length === 1 && res[0].isComment) // #9658
    ) ? undefined
      : res
  };
  // this is a slot using the new v-slot syntax without scope. although it is
  // compiled as a scoped slot, render fn users would expect it to be present
  // on this.$slots because the usage is semantically a normal slot.
  if (fn.proxy) {
    Object.defineProperty(normalSlots, key, {
      get: normalized,
      enumerable: true,
      configurable: true
    });
  }
  return normalized
}

function proxyNormalSlot(slots, key) {
  return function () { return slots[key]; }
}

/*  */

/**
 * Runtime helper for rendering v-for lists.
 */
function renderList (
  val,
  render
) {
  var ret, i, l, keys, key;
  if (Array.isArray(val) || typeof val === 'string') {
    ret = new Array(val.length);
    for (i = 0, l = val.length; i < l; i++) {
      ret[i] = render(val[i], i, i, i); // fixed by xxxxxx
    }
  } else if (typeof val === 'number') {
    ret = new Array(val);
    for (i = 0; i < val; i++) {
      ret[i] = render(i + 1, i, i, i); // fixed by xxxxxx
    }
  } else if (isObject(val)) {
    if (hasSymbol && val[Symbol.iterator]) {
      ret = [];
      var iterator = val[Symbol.iterator]();
      var result = iterator.next();
      while (!result.done) {
        ret.push(render(result.value, ret.length, i, i++)); // fixed by xxxxxx
        result = iterator.next();
      }
    } else {
      keys = Object.keys(val);
      ret = new Array(keys.length);
      for (i = 0, l = keys.length; i < l; i++) {
        key = keys[i];
        ret[i] = render(val[key], key, i, i); // fixed by xxxxxx
      }
    }
  }
  if (!isDef(ret)) {
    ret = [];
  }
  (ret)._isVList = true;
  return ret
}

/*  */

/**
 * Runtime helper for rendering <slot>
 */
function renderSlot (
  name,
  fallback,
  props,
  bindObject
) {
  var scopedSlotFn = this.$scopedSlots[name];
  var nodes;
  if (scopedSlotFn) { // scoped slot
    props = props || {};
    if (bindObject) {
      if ( true && !isObject(bindObject)) {
        warn(
          'slot v-bind without argument expects an Object',
          this
        );
      }
      props = extend(extend({}, bindObject), props);
    }
    // fixed by xxxxxx app-plus scopedSlot
    nodes = scopedSlotFn(props, this, props._i) || fallback;
  } else {
    nodes = this.$slots[name] || fallback;
  }

  var target = props && props.slot;
  if (target) {
    return this.$createElement('template', { slot: target }, nodes)
  } else {
    return nodes
  }
}

/*  */

/**
 * Runtime helper for resolving filters
 */
function resolveFilter (id) {
  return resolveAsset(this.$options, 'filters', id, true) || identity
}

/*  */

function isKeyNotMatch (expect, actual) {
  if (Array.isArray(expect)) {
    return expect.indexOf(actual) === -1
  } else {
    return expect !== actual
  }
}

/**
 * Runtime helper for checking keyCodes from config.
 * exposed as Vue.prototype._k
 * passing in eventKeyName as last argument separately for backwards compat
 */
function checkKeyCodes (
  eventKeyCode,
  key,
  builtInKeyCode,
  eventKeyName,
  builtInKeyName
) {
  var mappedKeyCode = config.keyCodes[key] || builtInKeyCode;
  if (builtInKeyName && eventKeyName && !config.keyCodes[key]) {
    return isKeyNotMatch(builtInKeyName, eventKeyName)
  } else if (mappedKeyCode) {
    return isKeyNotMatch(mappedKeyCode, eventKeyCode)
  } else if (eventKeyName) {
    return hyphenate(eventKeyName) !== key
  }
}

/*  */

/**
 * Runtime helper for merging v-bind="object" into a VNode's data.
 */
function bindObjectProps (
  data,
  tag,
  value,
  asProp,
  isSync
) {
  if (value) {
    if (!isObject(value)) {
       true && warn(
        'v-bind without argument expects an Object or Array value',
        this
      );
    } else {
      if (Array.isArray(value)) {
        value = toObject(value);
      }
      var hash;
      var loop = function ( key ) {
        if (
          key === 'class' ||
          key === 'style' ||
          isReservedAttribute(key)
        ) {
          hash = data;
        } else {
          var type = data.attrs && data.attrs.type;
          hash = asProp || config.mustUseProp(tag, type, key)
            ? data.domProps || (data.domProps = {})
            : data.attrs || (data.attrs = {});
        }
        var camelizedKey = camelize(key);
        var hyphenatedKey = hyphenate(key);
        if (!(camelizedKey in hash) && !(hyphenatedKey in hash)) {
          hash[key] = value[key];

          if (isSync) {
            var on = data.on || (data.on = {});
            on[("update:" + key)] = function ($event) {
              value[key] = $event;
            };
          }
        }
      };

      for (var key in value) loop( key );
    }
  }
  return data
}

/*  */

/**
 * Runtime helper for rendering static trees.
 */
function renderStatic (
  index,
  isInFor
) {
  var cached = this._staticTrees || (this._staticTrees = []);
  var tree = cached[index];
  // if has already-rendered static tree and not inside v-for,
  // we can reuse the same tree.
  if (tree && !isInFor) {
    return tree
  }
  // otherwise, render a fresh tree.
  tree = cached[index] = this.$options.staticRenderFns[index].call(
    this._renderProxy,
    null,
    this // for render fns generated for functional component templates
  );
  markStatic(tree, ("__static__" + index), false);
  return tree
}

/**
 * Runtime helper for v-once.
 * Effectively it means marking the node as static with a unique key.
 */
function markOnce (
  tree,
  index,
  key
) {
  markStatic(tree, ("__once__" + index + (key ? ("_" + key) : "")), true);
  return tree
}

function markStatic (
  tree,
  key,
  isOnce
) {
  if (Array.isArray(tree)) {
    for (var i = 0; i < tree.length; i++) {
      if (tree[i] && typeof tree[i] !== 'string') {
        markStaticNode(tree[i], (key + "_" + i), isOnce);
      }
    }
  } else {
    markStaticNode(tree, key, isOnce);
  }
}

function markStaticNode (node, key, isOnce) {
  node.isStatic = true;
  node.key = key;
  node.isOnce = isOnce;
}

/*  */

function bindObjectListeners (data, value) {
  if (value) {
    if (!isPlainObject(value)) {
       true && warn(
        'v-on without argument expects an Object value',
        this
      );
    } else {
      var on = data.on = data.on ? extend({}, data.on) : {};
      for (var key in value) {
        var existing = on[key];
        var ours = value[key];
        on[key] = existing ? [].concat(existing, ours) : ours;
      }
    }
  }
  return data
}

/*  */

function resolveScopedSlots (
  fns, // see flow/vnode
  res,
  // the following are added in 2.6
  hasDynamicKeys,
  contentHashKey
) {
  res = res || { $stable: !hasDynamicKeys };
  for (var i = 0; i < fns.length; i++) {
    var slot = fns[i];
    if (Array.isArray(slot)) {
      resolveScopedSlots(slot, res, hasDynamicKeys);
    } else if (slot) {
      // marker for reverse proxying v-slot without scope on this.$slots
      if (slot.proxy) {
        slot.fn.proxy = true;
      }
      res[slot.key] = slot.fn;
    }
  }
  if (contentHashKey) {
    (res).$key = contentHashKey;
  }
  return res
}

/*  */

function bindDynamicKeys (baseObj, values) {
  for (var i = 0; i < values.length; i += 2) {
    var key = values[i];
    if (typeof key === 'string' && key) {
      baseObj[values[i]] = values[i + 1];
    } else if ( true && key !== '' && key !== null) {
      // null is a special value for explicitly removing a binding
      warn(
        ("Invalid value for dynamic directive argument (expected string or null): " + key),
        this
      );
    }
  }
  return baseObj
}

// helper to dynamically append modifier runtime markers to event names.
// ensure only append when value is already string, otherwise it will be cast
// to string and cause the type check to miss.
function prependModifier (value, symbol) {
  return typeof value === 'string' ? symbol + value : value
}

/*  */

function installRenderHelpers (target) {
  target._o = markOnce;
  target._n = toNumber;
  target._s = toString;
  target._l = renderList;
  target._t = renderSlot;
  target._q = looseEqual;
  target._i = looseIndexOf;
  target._m = renderStatic;
  target._f = resolveFilter;
  target._k = checkKeyCodes;
  target._b = bindObjectProps;
  target._v = createTextVNode;
  target._e = createEmptyVNode;
  target._u = resolveScopedSlots;
  target._g = bindObjectListeners;
  target._d = bindDynamicKeys;
  target._p = prependModifier;
}

/*  */

function FunctionalRenderContext (
  data,
  props,
  children,
  parent,
  Ctor
) {
  var this$1 = this;

  var options = Ctor.options;
  // ensure the createElement function in functional components
  // gets a unique context - this is necessary for correct named slot check
  var contextVm;
  if (hasOwn(parent, '_uid')) {
    contextVm = Object.create(parent);
    // $flow-disable-line
    contextVm._original = parent;
  } else {
    // the context vm passed in is a functional context as well.
    // in this case we want to make sure we are able to get a hold to the
    // real context instance.
    contextVm = parent;
    // $flow-disable-line
    parent = parent._original;
  }
  var isCompiled = isTrue(options._compiled);
  var needNormalization = !isCompiled;

  this.data = data;
  this.props = props;
  this.children = children;
  this.parent = parent;
  this.listeners = data.on || emptyObject;
  this.injections = resolveInject(options.inject, parent);
  this.slots = function () {
    if (!this$1.$slots) {
      normalizeScopedSlots(
        data.scopedSlots,
        this$1.$slots = resolveSlots(children, parent)
      );
    }
    return this$1.$slots
  };

  Object.defineProperty(this, 'scopedSlots', ({
    enumerable: true,
    get: function get () {
      return normalizeScopedSlots(data.scopedSlots, this.slots())
    }
  }));

  // support for compiled functional template
  if (isCompiled) {
    // exposing $options for renderStatic()
    this.$options = options;
    // pre-resolve slots for renderSlot()
    this.$slots = this.slots();
    this.$scopedSlots = normalizeScopedSlots(data.scopedSlots, this.$slots);
  }

  if (options._scopeId) {
    this._c = function (a, b, c, d) {
      var vnode = createElement(contextVm, a, b, c, d, needNormalization);
      if (vnode && !Array.isArray(vnode)) {
        vnode.fnScopeId = options._scopeId;
        vnode.fnContext = parent;
      }
      return vnode
    };
  } else {
    this._c = function (a, b, c, d) { return createElement(contextVm, a, b, c, d, needNormalization); };
  }
}

installRenderHelpers(FunctionalRenderContext.prototype);

function createFunctionalComponent (
  Ctor,
  propsData,
  data,
  contextVm,
  children
) {
  var options = Ctor.options;
  var props = {};
  var propOptions = options.props;
  if (isDef(propOptions)) {
    for (var key in propOptions) {
      props[key] = validateProp(key, propOptions, propsData || emptyObject);
    }
  } else {
    if (isDef(data.attrs)) { mergeProps(props, data.attrs); }
    if (isDef(data.props)) { mergeProps(props, data.props); }
  }

  var renderContext = new FunctionalRenderContext(
    data,
    props,
    children,
    contextVm,
    Ctor
  );

  var vnode = options.render.call(null, renderContext._c, renderContext);

  if (vnode instanceof VNode) {
    return cloneAndMarkFunctionalResult(vnode, data, renderContext.parent, options, renderContext)
  } else if (Array.isArray(vnode)) {
    var vnodes = normalizeChildren(vnode) || [];
    var res = new Array(vnodes.length);
    for (var i = 0; i < vnodes.length; i++) {
      res[i] = cloneAndMarkFunctionalResult(vnodes[i], data, renderContext.parent, options, renderContext);
    }
    return res
  }
}

function cloneAndMarkFunctionalResult (vnode, data, contextVm, options, renderContext) {
  // #7817 clone node before setting fnContext, otherwise if the node is reused
  // (e.g. it was from a cached normal slot) the fnContext causes named slots
  // that should not be matched to match.
  var clone = cloneVNode(vnode);
  clone.fnContext = contextVm;
  clone.fnOptions = options;
  if (true) {
    (clone.devtoolsMeta = clone.devtoolsMeta || {}).renderContext = renderContext;
  }
  if (data.slot) {
    (clone.data || (clone.data = {})).slot = data.slot;
  }
  return clone
}

function mergeProps (to, from) {
  for (var key in from) {
    to[camelize(key)] = from[key];
  }
}

/*  */

/*  */

/*  */

/*  */

// inline hooks to be invoked on component VNodes during patch
var componentVNodeHooks = {
  init: function init (vnode, hydrating) {
    if (
      vnode.componentInstance &&
      !vnode.componentInstance._isDestroyed &&
      vnode.data.keepAlive
    ) {
      // kept-alive components, treat as a patch
      var mountedNode = vnode; // work around flow
      componentVNodeHooks.prepatch(mountedNode, mountedNode);
    } else {
      var child = vnode.componentInstance = createComponentInstanceForVnode(
        vnode,
        activeInstance
      );
      child.$mount(hydrating ? vnode.elm : undefined, hydrating);
    }
  },

  prepatch: function prepatch (oldVnode, vnode) {
    var options = vnode.componentOptions;
    var child = vnode.componentInstance = oldVnode.componentInstance;
    updateChildComponent(
      child,
      options.propsData, // updated props
      options.listeners, // updated listeners
      vnode, // new parent vnode
      options.children // new children
    );
  },

  insert: function insert (vnode) {
    var context = vnode.context;
    var componentInstance = vnode.componentInstance;
    if (!componentInstance._isMounted) {
      callHook(componentInstance, 'onServiceCreated');
      callHook(componentInstance, 'onServiceAttached');
      componentInstance._isMounted = true;
      callHook(componentInstance, 'mounted');
    }
    if (vnode.data.keepAlive) {
      if (context._isMounted) {
        // vue-router#1212
        // During updates, a kept-alive component's child components may
        // change, so directly walking the tree here may call activated hooks
        // on incorrect children. Instead we push them into a queue which will
        // be processed after the whole patch process ended.
        queueActivatedComponent(componentInstance);
      } else {
        activateChildComponent(componentInstance, true /* direct */);
      }
    }
  },

  destroy: function destroy (vnode) {
    var componentInstance = vnode.componentInstance;
    if (!componentInstance._isDestroyed) {
      if (!vnode.data.keepAlive) {
        componentInstance.$destroy();
      } else {
        deactivateChildComponent(componentInstance, true /* direct */);
      }
    }
  }
};

var hooksToMerge = Object.keys(componentVNodeHooks);

function createComponent (
  Ctor,
  data,
  context,
  children,
  tag
) {
  if (isUndef(Ctor)) {
    return
  }

  var baseCtor = context.$options._base;

  // plain options object: turn it into a constructor
  if (isObject(Ctor)) {
    Ctor = baseCtor.extend(Ctor);
  }

  // if at this stage it's not a constructor or an async component factory,
  // reject.
  if (typeof Ctor !== 'function') {
    if (true) {
      warn(("Invalid Component definition: " + (String(Ctor))), context);
    }
    return
  }

  // async component
  var asyncFactory;
  if (isUndef(Ctor.cid)) {
    asyncFactory = Ctor;
    Ctor = resolveAsyncComponent(asyncFactory, baseCtor);
    if (Ctor === undefined) {
      // return a placeholder node for async component, which is rendered
      // as a comment node but preserves all the raw information for the node.
      // the information will be used for async server-rendering and hydration.
      return createAsyncPlaceholder(
        asyncFactory,
        data,
        context,
        children,
        tag
      )
    }
  }

  data = data || {};

  // resolve constructor options in case global mixins are applied after
  // component constructor creation
  resolveConstructorOptions(Ctor);

  // transform component v-model data into props & events
  if (isDef(data.model)) {
    transformModel(Ctor.options, data);
  }

  // extract props
  var propsData = extractPropsFromVNodeData(data, Ctor, tag, context); // fixed by xxxxxx

  // functional component
  if (isTrue(Ctor.options.functional)) {
    return createFunctionalComponent(Ctor, propsData, data, context, children)
  }

  // extract listeners, since these needs to be treated as
  // child component listeners instead of DOM listeners
  var listeners = data.on;
  // replace with listeners with .native modifier
  // so it gets processed during parent component patch.
  data.on = data.nativeOn;

  if (isTrue(Ctor.options.abstract)) {
    // abstract components do not keep anything
    // other than props & listeners & slot

    // work around flow
    var slot = data.slot;
    data = {};
    if (slot) {
      data.slot = slot;
    }
  }

  // install component management hooks onto the placeholder node
  installComponentHooks(data);

  // return a placeholder vnode
  var name = Ctor.options.name || tag;
  var vnode = new VNode(
    ("vue-component-" + (Ctor.cid) + (name ? ("-" + name) : '')),
    data, undefined, undefined, undefined, context,
    { Ctor: Ctor, propsData: propsData, listeners: listeners, tag: tag, children: children },
    asyncFactory
  );

  return vnode
}

function createComponentInstanceForVnode (
  vnode, // we know it's MountedComponentVNode but flow doesn't
  parent // activeInstance in lifecycle state
) {
  var options = {
    _isComponent: true,
    _parentVnode: vnode,
    parent: parent
  };
  // check inline-template render functions
  var inlineTemplate = vnode.data.inlineTemplate;
  if (isDef(inlineTemplate)) {
    options.render = inlineTemplate.render;
    options.staticRenderFns = inlineTemplate.staticRenderFns;
  }
  return new vnode.componentOptions.Ctor(options)
}

function installComponentHooks (data) {
  var hooks = data.hook || (data.hook = {});
  for (var i = 0; i < hooksToMerge.length; i++) {
    var key = hooksToMerge[i];
    var existing = hooks[key];
    var toMerge = componentVNodeHooks[key];
    if (existing !== toMerge && !(existing && existing._merged)) {
      hooks[key] = existing ? mergeHook$1(toMerge, existing) : toMerge;
    }
  }
}

function mergeHook$1 (f1, f2) {
  var merged = function (a, b) {
    // flow complains about extra args which is why we use any
    f1(a, b);
    f2(a, b);
  };
  merged._merged = true;
  return merged
}

// transform component v-model info (value and callback) into
// prop and event handler respectively.
function transformModel (options, data) {
  var prop = (options.model && options.model.prop) || 'value';
  var event = (options.model && options.model.event) || 'input'
  ;(data.attrs || (data.attrs = {}))[prop] = data.model.value;
  var on = data.on || (data.on = {});
  var existing = on[event];
  var callback = data.model.callback;
  if (isDef(existing)) {
    if (
      Array.isArray(existing)
        ? existing.indexOf(callback) === -1
        : existing !== callback
    ) {
      on[event] = [callback].concat(existing);
    }
  } else {
    on[event] = callback;
  }
}

/*  */

var SIMPLE_NORMALIZE = 1;
var ALWAYS_NORMALIZE = 2;

// wrapper function for providing a more flexible interface
// without getting yelled at by flow
function createElement (
  context,
  tag,
  data,
  children,
  normalizationType,
  alwaysNormalize
) {
  if (Array.isArray(data) || isPrimitive(data)) {
    normalizationType = children;
    children = data;
    data = undefined;
  }
  if (isTrue(alwaysNormalize)) {
    normalizationType = ALWAYS_NORMALIZE;
  }
  return _createElement(context, tag, data, children, normalizationType)
}

function _createElement (
  context,
  tag,
  data,
  children,
  normalizationType
) {
  if (isDef(data) && isDef((data).__ob__)) {
     true && warn(
      "Avoid using observed data object as vnode data: " + (JSON.stringify(data)) + "\n" +
      'Always create fresh vnode data objects in each render!',
      context
    );
    return createEmptyVNode()
  }
  // object syntax in v-bind
  if (isDef(data) && isDef(data.is)) {
    tag = data.is;
  }
  if (!tag) {
    // in case of component :is set to falsy value
    return createEmptyVNode()
  }
  // warn against non-primitive key
  if ( true &&
    isDef(data) && isDef(data.key) && !isPrimitive(data.key)
  ) {
    {
      warn(
        'Avoid using non-primitive value as key, ' +
        'use string/number value instead.',
        context
      );
    }
  }
  // support single function children as default scoped slot
  if (Array.isArray(children) &&
    typeof children[0] === 'function'
  ) {
    data = data || {};
    data.scopedSlots = { default: children[0] };
    children.length = 0;
  }
  if (normalizationType === ALWAYS_NORMALIZE) {
    children = normalizeChildren(children);
  } else if (normalizationType === SIMPLE_NORMALIZE) {
    children = simpleNormalizeChildren(children);
  }
  var vnode, ns;
  if (typeof tag === 'string') {
    var Ctor;
    ns = (context.$vnode && context.$vnode.ns) || config.getTagNamespace(tag);
    if (config.isReservedTag(tag)) {
      // platform built-in elements
      if ( true && isDef(data) && isDef(data.nativeOn)) {
        warn(
          ("The .native modifier for v-on is only valid on components but it was used on <" + tag + ">."),
          context
        );
      }
      vnode = new VNode(
        config.parsePlatformTagName(tag), data, children,
        undefined, undefined, context
      );
    } else if ((!data || !data.pre) && isDef(Ctor = resolveAsset(context.$options, 'components', tag))) {
      // component
      vnode = createComponent(Ctor, data, context, children, tag);
    } else {
      // unknown or unlisted namespaced elements
      // check at runtime because it may get assigned a namespace when its
      // parent normalizes children
      vnode = new VNode(
        tag, data, children,
        undefined, undefined, context
      );
    }
  } else {
    // direct component options / constructor
    vnode = createComponent(tag, data, context, children);
  }
  if (Array.isArray(vnode)) {
    return vnode
  } else if (isDef(vnode)) {
    if (isDef(ns)) { applyNS(vnode, ns); }
    if (isDef(data)) { registerDeepBindings(data); }
    return vnode
  } else {
    return createEmptyVNode()
  }
}

function applyNS (vnode, ns, force) {
  vnode.ns = ns;
  if (vnode.tag === 'foreignObject') {
    // use default namespace inside foreignObject
    ns = undefined;
    force = true;
  }
  if (isDef(vnode.children)) {
    for (var i = 0, l = vnode.children.length; i < l; i++) {
      var child = vnode.children[i];
      if (isDef(child.tag) && (
        isUndef(child.ns) || (isTrue(force) && child.tag !== 'svg'))) {
        applyNS(child, ns, force);
      }
    }
  }
}

// ref #5318
// necessary to ensure parent re-render when deep bindings like :style and
// :class are used on slot nodes
function registerDeepBindings (data) {
  if (isObject(data.style)) {
    traverse(data.style);
  }
  if (isObject(data.class)) {
    traverse(data.class);
  }
}

/*  */

function initRender (vm) {
  vm._vnode = null; // the root of the child tree
  vm._staticTrees = null; // v-once cached trees
  var options = vm.$options;
  var parentVnode = vm.$vnode = options._parentVnode; // the placeholder node in parent tree
  var renderContext = parentVnode && parentVnode.context;
  vm.$slots = resolveSlots(options._renderChildren, renderContext);
  vm.$scopedSlots = emptyObject;
  // bind the createElement fn to this instance
  // so that we get proper render context inside it.
  // args order: tag, data, children, normalizationType, alwaysNormalize
  // internal version is used by render functions compiled from templates
  vm._c = function (a, b, c, d) { return createElement(vm, a, b, c, d, false); };
  // normalization is always applied for the public version, used in
  // user-written render functions.
  vm.$createElement = function (a, b, c, d) { return createElement(vm, a, b, c, d, true); };

  // $attrs & $listeners are exposed for easier HOC creation.
  // they need to be reactive so that HOCs using them are always updated
  var parentData = parentVnode && parentVnode.data;

  /* istanbul ignore else */
  if (true) {
    defineReactive$$1(vm, '$attrs', parentData && parentData.attrs || emptyObject, function () {
      !isUpdatingChildComponent && warn("$attrs is readonly.", vm);
    }, true);
    defineReactive$$1(vm, '$listeners', options._parentListeners || emptyObject, function () {
      !isUpdatingChildComponent && warn("$listeners is readonly.", vm);
    }, true);
  } else {}
}

var currentRenderingInstance = null;

function renderMixin (Vue) {
  // install runtime convenience helpers
  installRenderHelpers(Vue.prototype);

  Vue.prototype.$nextTick = function (fn) {
    return nextTick(fn, this)
  };

  Vue.prototype._render = function () {
    var vm = this;
    var ref = vm.$options;
    var render = ref.render;
    var _parentVnode = ref._parentVnode;

    if (_parentVnode) {
      vm.$scopedSlots = normalizeScopedSlots(
        _parentVnode.data.scopedSlots,
        vm.$slots,
        vm.$scopedSlots
      );
    }

    // set parent vnode. this allows render functions to have access
    // to the data on the placeholder node.
    vm.$vnode = _parentVnode;
    // render self
    var vnode;
    try {
      // There's no need to maintain a stack because all render fns are called
      // separately from one another. Nested component's render fns are called
      // when parent component is patched.
      currentRenderingInstance = vm;
      vnode = render.call(vm._renderProxy, vm.$createElement);
    } catch (e) {
      handleError(e, vm, "render");
      // return error render result,
      // or previous vnode to prevent render error causing blank component
      /* istanbul ignore else */
      if ( true && vm.$options.renderError) {
        try {
          vnode = vm.$options.renderError.call(vm._renderProxy, vm.$createElement, e);
        } catch (e) {
          handleError(e, vm, "renderError");
          vnode = vm._vnode;
        }
      } else {
        vnode = vm._vnode;
      }
    } finally {
      currentRenderingInstance = null;
    }
    // if the returned array contains only a single node, allow it
    if (Array.isArray(vnode) && vnode.length === 1) {
      vnode = vnode[0];
    }
    // return empty vnode in case the render function errored out
    if (!(vnode instanceof VNode)) {
      if ( true && Array.isArray(vnode)) {
        warn(
          'Multiple root nodes returned from render function. Render function ' +
          'should return a single root node.',
          vm
        );
      }
      vnode = createEmptyVNode();
    }
    // set parent
    vnode.parent = _parentVnode;
    return vnode
  };
}

/*  */

function ensureCtor (comp, base) {
  if (
    comp.__esModule ||
    (hasSymbol && comp[Symbol.toStringTag] === 'Module')
  ) {
    comp = comp.default;
  }
  return isObject(comp)
    ? base.extend(comp)
    : comp
}

function createAsyncPlaceholder (
  factory,
  data,
  context,
  children,
  tag
) {
  var node = createEmptyVNode();
  node.asyncFactory = factory;
  node.asyncMeta = { data: data, context: context, children: children, tag: tag };
  return node
}

function resolveAsyncComponent (
  factory,
  baseCtor
) {
  if (isTrue(factory.error) && isDef(factory.errorComp)) {
    return factory.errorComp
  }

  if (isDef(factory.resolved)) {
    return factory.resolved
  }

  var owner = currentRenderingInstance;
  if (owner && isDef(factory.owners) && factory.owners.indexOf(owner) === -1) {
    // already pending
    factory.owners.push(owner);
  }

  if (isTrue(factory.loading) && isDef(factory.loadingComp)) {
    return factory.loadingComp
  }

  if (owner && !isDef(factory.owners)) {
    var owners = factory.owners = [owner];
    var sync = true;
    var timerLoading = null;
    var timerTimeout = null

    ;(owner).$on('hook:destroyed', function () { return remove(owners, owner); });

    var forceRender = function (renderCompleted) {
      for (var i = 0, l = owners.length; i < l; i++) {
        (owners[i]).$forceUpdate();
      }

      if (renderCompleted) {
        owners.length = 0;
        if (timerLoading !== null) {
          clearTimeout(timerLoading);
          timerLoading = null;
        }
        if (timerTimeout !== null) {
          clearTimeout(timerTimeout);
          timerTimeout = null;
        }
      }
    };

    var resolve = once(function (res) {
      // cache resolved
      factory.resolved = ensureCtor(res, baseCtor);
      // invoke callbacks only if this is not a synchronous resolve
      // (async resolves are shimmed as synchronous during SSR)
      if (!sync) {
        forceRender(true);
      } else {
        owners.length = 0;
      }
    });

    var reject = once(function (reason) {
       true && warn(
        "Failed to resolve async component: " + (String(factory)) +
        (reason ? ("\nReason: " + reason) : '')
      );
      if (isDef(factory.errorComp)) {
        factory.error = true;
        forceRender(true);
      }
    });

    var res = factory(resolve, reject);

    if (isObject(res)) {
      if (isPromise(res)) {
        // () => Promise
        if (isUndef(factory.resolved)) {
          res.then(resolve, reject);
        }
      } else if (isPromise(res.component)) {
        res.component.then(resolve, reject);

        if (isDef(res.error)) {
          factory.errorComp = ensureCtor(res.error, baseCtor);
        }

        if (isDef(res.loading)) {
          factory.loadingComp = ensureCtor(res.loading, baseCtor);
          if (res.delay === 0) {
            factory.loading = true;
          } else {
            timerLoading = setTimeout(function () {
              timerLoading = null;
              if (isUndef(factory.resolved) && isUndef(factory.error)) {
                factory.loading = true;
                forceRender(false);
              }
            }, res.delay || 200);
          }
        }

        if (isDef(res.timeout)) {
          timerTimeout = setTimeout(function () {
            timerTimeout = null;
            if (isUndef(factory.resolved)) {
              reject(
                 true
                  ? ("timeout (" + (res.timeout) + "ms)")
                  : undefined
              );
            }
          }, res.timeout);
        }
      }
    }

    sync = false;
    // return in case resolved synchronously
    return factory.loading
      ? factory.loadingComp
      : factory.resolved
  }
}

/*  */

function isAsyncPlaceholder (node) {
  return node.isComment && node.asyncFactory
}

/*  */

function getFirstComponentChild (children) {
  if (Array.isArray(children)) {
    for (var i = 0; i < children.length; i++) {
      var c = children[i];
      if (isDef(c) && (isDef(c.componentOptions) || isAsyncPlaceholder(c))) {
        return c
      }
    }
  }
}

/*  */

/*  */

function initEvents (vm) {
  vm._events = Object.create(null);
  vm._hasHookEvent = false;
  // init parent attached events
  var listeners = vm.$options._parentListeners;
  if (listeners) {
    updateComponentListeners(vm, listeners);
  }
}

var target;

function add (event, fn) {
  target.$on(event, fn);
}

function remove$1 (event, fn) {
  target.$off(event, fn);
}

function createOnceHandler (event, fn) {
  var _target = target;
  return function onceHandler () {
    var res = fn.apply(null, arguments);
    if (res !== null) {
      _target.$off(event, onceHandler);
    }
  }
}

function updateComponentListeners (
  vm,
  listeners,
  oldListeners
) {
  target = vm;
  updateListeners(listeners, oldListeners || {}, add, remove$1, createOnceHandler, vm);
  target = undefined;
}

function eventsMixin (Vue) {
  var hookRE = /^hook:/;
  Vue.prototype.$on = function (event, fn) {
    var vm = this;
    if (Array.isArray(event)) {
      for (var i = 0, l = event.length; i < l; i++) {
        vm.$on(event[i], fn);
      }
    } else {
      (vm._events[event] || (vm._events[event] = [])).push(fn);
      // optimize hook:event cost by using a boolean flag marked at registration
      // instead of a hash lookup
      if (hookRE.test(event)) {
        vm._hasHookEvent = true;
      }
    }
    return vm
  };

  Vue.prototype.$once = function (event, fn) {
    var vm = this;
    function on () {
      vm.$off(event, on);
      fn.apply(vm, arguments);
    }
    on.fn = fn;
    vm.$on(event, on);
    return vm
  };

  Vue.prototype.$off = function (event, fn) {
    var vm = this;
    // all
    if (!arguments.length) {
      vm._events = Object.create(null);
      return vm
    }
    // array of events
    if (Array.isArray(event)) {
      for (var i$1 = 0, l = event.length; i$1 < l; i$1++) {
        vm.$off(event[i$1], fn);
      }
      return vm
    }
    // specific event
    var cbs = vm._events[event];
    if (!cbs) {
      return vm
    }
    if (!fn) {
      vm._events[event] = null;
      return vm
    }
    // specific handler
    var cb;
    var i = cbs.length;
    while (i--) {
      cb = cbs[i];
      if (cb === fn || cb.fn === fn) {
        cbs.splice(i, 1);
        break
      }
    }
    return vm
  };

  Vue.prototype.$emit = function (event) {
    var vm = this;
    if (true) {
      var lowerCaseEvent = event.toLowerCase();
      if (lowerCaseEvent !== event && vm._events[lowerCaseEvent]) {
        tip(
          "Event \"" + lowerCaseEvent + "\" is emitted in component " +
          (formatComponentName(vm)) + " but the handler is registered for \"" + event + "\". " +
          "Note that HTML attributes are case-insensitive and you cannot use " +
          "v-on to listen to camelCase events when using in-DOM templates. " +
          "You should probably use \"" + (hyphenate(event)) + "\" instead of \"" + event + "\"."
        );
      }
    }
    var cbs = vm._events[event];
    if (cbs) {
      cbs = cbs.length > 1 ? toArray(cbs) : cbs;
      var args = toArray(arguments, 1);
      var info = "event handler for \"" + event + "\"";
      for (var i = 0, l = cbs.length; i < l; i++) {
        invokeWithErrorHandling(cbs[i], vm, args, vm, info);
      }
    }
    return vm
  };
}

/*  */

var activeInstance = null;
var isUpdatingChildComponent = false;

function setActiveInstance(vm) {
  var prevActiveInstance = activeInstance;
  activeInstance = vm;
  return function () {
    activeInstance = prevActiveInstance;
  }
}

function initLifecycle (vm) {
  var options = vm.$options;

  // locate first non-abstract parent
  var parent = options.parent;
  if (parent && !options.abstract) {
    while (parent.$options.abstract && parent.$parent) {
      parent = parent.$parent;
    }
    parent.$children.push(vm);
  }

  vm.$parent = parent;
  vm.$root = parent ? parent.$root : vm;

  vm.$children = [];
  vm.$refs = {};

  vm._watcher = null;
  vm._inactive = null;
  vm._directInactive = false;
  vm._isMounted = false;
  vm._isDestroyed = false;
  vm._isBeingDestroyed = false;
}

function lifecycleMixin (Vue) {
  Vue.prototype._update = function (vnode, hydrating) {
    var vm = this;
    var prevEl = vm.$el;
    var prevVnode = vm._vnode;
    var restoreActiveInstance = setActiveInstance(vm);
    vm._vnode = vnode;
    // Vue.prototype.__patch__ is injected in entry points
    // based on the rendering backend used.
    if (!prevVnode) {
      // initial render
      vm.$el = vm.__patch__(vm.$el, vnode, hydrating, false /* removeOnly */);
    } else {
      // updates
      vm.$el = vm.__patch__(prevVnode, vnode);
    }
    restoreActiveInstance();
    // update __vue__ reference
    if (prevEl) {
      prevEl.__vue__ = null;
    }
    if (vm.$el) {
      vm.$el.__vue__ = vm;
    }
    // if parent is an HOC, update its $el as well
    if (vm.$vnode && vm.$parent && vm.$vnode === vm.$parent._vnode) {
      vm.$parent.$el = vm.$el;
    }
    // updated hook is called by the scheduler to ensure that children are
    // updated in a parent's updated hook.
  };

  Vue.prototype.$forceUpdate = function () {
    var vm = this;
    if (vm._watcher) {
      vm._watcher.update();
    }
  };

  Vue.prototype.$destroy = function () {
    var vm = this;
    if (vm._isBeingDestroyed) {
      return
    }
    callHook(vm, 'beforeDestroy');
    vm._isBeingDestroyed = true;
    // remove self from parent
    var parent = vm.$parent;
    if (parent && !parent._isBeingDestroyed && !vm.$options.abstract) {
      remove(parent.$children, vm);
    }
    // teardown watchers
    if (vm._watcher) {
      vm._watcher.teardown();
    }
    var i = vm._watchers.length;
    while (i--) {
      vm._watchers[i].teardown();
    }
    // remove reference from data ob
    // frozen object may not have observer.
    if (vm._data.__ob__) {
      vm._data.__ob__.vmCount--;
    }
    // call the last hook...
    vm._isDestroyed = true;
    // invoke destroy hooks on current rendered tree
    vm.__patch__(vm._vnode, null);
    // fire destroyed hook
    callHook(vm, 'destroyed');
    // turn off all instance listeners.
    vm.$off();
    // remove __vue__ reference
    if (vm.$el) {
      vm.$el.__vue__ = null;
    }
    // release circular reference (#6759)
    if (vm.$vnode) {
      vm.$vnode.parent = null;
    }
  };
}

function updateChildComponent (
  vm,
  propsData,
  listeners,
  parentVnode,
  renderChildren
) {
  if (true) {
    isUpdatingChildComponent = true;
  }

  // determine whether component has slot children
  // we need to do this before overwriting $options._renderChildren.

  // check if there are dynamic scopedSlots (hand-written or compiled but with
  // dynamic slot names). Static scoped slots compiled from template has the
  // "$stable" marker.
  var newScopedSlots = parentVnode.data.scopedSlots;
  var oldScopedSlots = vm.$scopedSlots;
  var hasDynamicScopedSlot = !!(
    (newScopedSlots && !newScopedSlots.$stable) ||
    (oldScopedSlots !== emptyObject && !oldScopedSlots.$stable) ||
    (newScopedSlots && vm.$scopedSlots.$key !== newScopedSlots.$key)
  );

  // Any static slot children from the parent may have changed during parent's
  // update. Dynamic scoped slots may also have changed. In such cases, a forced
  // update is necessary to ensure correctness.
  var needsForceUpdate = !!(
    renderChildren ||               // has new static slots
    vm.$options._renderChildren ||  // has old static slots
    hasDynamicScopedSlot
  );

  vm.$options._parentVnode = parentVnode;
  vm.$vnode = parentVnode; // update vm's placeholder node without re-render

  if (vm._vnode) { // update child tree's parent
    vm._vnode.parent = parentVnode;
  }
  vm.$options._renderChildren = renderChildren;

  // update $attrs and $listeners hash
  // these are also reactive so they may trigger child update if the child
  // used them during render
  vm.$attrs = parentVnode.data.attrs || emptyObject;
  vm.$listeners = listeners || emptyObject;

  // update props
  if (propsData && vm.$options.props) {
    toggleObserving(false);
    var props = vm._props;
    var propKeys = vm.$options._propKeys || [];
    for (var i = 0; i < propKeys.length; i++) {
      var key = propKeys[i];
      var propOptions = vm.$options.props; // wtf flow?
      props[key] = validateProp(key, propOptions, propsData, vm);
    }
    toggleObserving(true);
    // keep a copy of raw propsData
    vm.$options.propsData = propsData;
  }

  // fixed by xxxxxx update properties(mp runtime)
  vm._$updateProperties && vm._$updateProperties(vm);

  // update listeners
  listeners = listeners || emptyObject;
  var oldListeners = vm.$options._parentListeners;
  vm.$options._parentListeners = listeners;
  updateComponentListeners(vm, listeners, oldListeners);

  // resolve slots + force update if has children
  if (needsForceUpdate) {
    vm.$slots = resolveSlots(renderChildren, parentVnode.context);
    vm.$forceUpdate();
  }

  if (true) {
    isUpdatingChildComponent = false;
  }
}

function isInInactiveTree (vm) {
  while (vm && (vm = vm.$parent)) {
    if (vm._inactive) { return true }
  }
  return false
}

function activateChildComponent (vm, direct) {
  if (direct) {
    vm._directInactive = false;
    if (isInInactiveTree(vm)) {
      return
    }
  } else if (vm._directInactive) {
    return
  }
  if (vm._inactive || vm._inactive === null) {
    vm._inactive = false;
    for (var i = 0; i < vm.$children.length; i++) {
      activateChildComponent(vm.$children[i]);
    }
    callHook(vm, 'activated');
  }
}

function deactivateChildComponent (vm, direct) {
  if (direct) {
    vm._directInactive = true;
    if (isInInactiveTree(vm)) {
      return
    }
  }
  if (!vm._inactive) {
    vm._inactive = true;
    for (var i = 0; i < vm.$children.length; i++) {
      deactivateChildComponent(vm.$children[i]);
    }
    callHook(vm, 'deactivated');
  }
}

function callHook (vm, hook) {
  // #7573 disable dep collection when invoking lifecycle hooks
  pushTarget();
  var handlers = vm.$options[hook];
  var info = hook + " hook";
  if (handlers) {
    for (var i = 0, j = handlers.length; i < j; i++) {
      invokeWithErrorHandling(handlers[i], vm, null, vm, info);
    }
  }
  if (vm._hasHookEvent) {
    vm.$emit('hook:' + hook);
  }
  popTarget();
}

/*  */

var MAX_UPDATE_COUNT = 100;

var queue = [];
var activatedChildren = [];
var has = {};
var circular = {};
var waiting = false;
var flushing = false;
var index = 0;

/**
 * Reset the scheduler's state.
 */
function resetSchedulerState () {
  index = queue.length = activatedChildren.length = 0;
  has = {};
  if (true) {
    circular = {};
  }
  waiting = flushing = false;
}

// Async edge case #6566 requires saving the timestamp when event listeners are
// attached. However, calling performance.now() has a perf overhead especially
// if the page has thousands of event listeners. Instead, we take a timestamp
// every time the scheduler flushes and use that for all event listeners
// attached during that flush.
var currentFlushTimestamp = 0;

// Async edge case fix requires storing an event listener's attach timestamp.
var getNow = Date.now;

// Determine what event timestamp the browser is using. Annoyingly, the
// timestamp can either be hi-res (relative to page load) or low-res
// (relative to UNIX epoch), so in order to compare time we have to use the
// same timestamp type when saving the flush timestamp.
// All IE versions use low-res event timestamps, and have problematic clock
// implementations (#9632)
if (inBrowser && !isIE) {
  var performance = window.performance;
  if (
    performance &&
    typeof performance.now === 'function' &&
    getNow() > document.createEvent('Event').timeStamp
  ) {
    // if the event timestamp, although evaluated AFTER the Date.now(), is
    // smaller than it, it means the event is using a hi-res timestamp,
    // and we need to use the hi-res version for event listener timestamps as
    // well.
    getNow = function () { return performance.now(); };
  }
}

/**
 * Flush both queues and run the watchers.
 */
function flushSchedulerQueue () {
  currentFlushTimestamp = getNow();
  flushing = true;
  var watcher, id;

  // Sort queue before flush.
  // This ensures that:
  // 1. Components are updated from parent to child. (because parent is always
  //    created before the child)
  // 2. A component's user watchers are run before its render watcher (because
  //    user watchers are created before the render watcher)
  // 3. If a component is destroyed during a parent component's watcher run,
  //    its watchers can be skipped.
  queue.sort(function (a, b) { return a.id - b.id; });

  // do not cache length because more watchers might be pushed
  // as we run existing watchers
  for (index = 0; index < queue.length; index++) {
    watcher = queue[index];
    if (watcher.before) {
      watcher.before();
    }
    id = watcher.id;
    has[id] = null;
    watcher.run();
    // in dev build, check and stop circular updates.
    if ( true && has[id] != null) {
      circular[id] = (circular[id] || 0) + 1;
      if (circular[id] > MAX_UPDATE_COUNT) {
        warn(
          'You may have an infinite update loop ' + (
            watcher.user
              ? ("in watcher with expression \"" + (watcher.expression) + "\"")
              : "in a component render function."
          ),
          watcher.vm
        );
        break
      }
    }
  }

  // keep copies of post queues before resetting state
  var activatedQueue = activatedChildren.slice();
  var updatedQueue = queue.slice();

  resetSchedulerState();

  // call component updated and activated hooks
  callActivatedHooks(activatedQueue);
  callUpdatedHooks(updatedQueue);

  // devtool hook
  /* istanbul ignore if */
  if (devtools && config.devtools) {
    devtools.emit('flush');
  }
}

function callUpdatedHooks (queue) {
  var i = queue.length;
  while (i--) {
    var watcher = queue[i];
    var vm = watcher.vm;
    if (vm._watcher === watcher && vm._isMounted && !vm._isDestroyed) {
      callHook(vm, 'updated');
    }
  }
}

/**
 * Queue a kept-alive component that was activated during patch.
 * The queue will be processed after the entire tree has been patched.
 */
function queueActivatedComponent (vm) {
  // setting _inactive to false here so that a render function can
  // rely on checking whether it's in an inactive tree (e.g. router-view)
  vm._inactive = false;
  activatedChildren.push(vm);
}

function callActivatedHooks (queue) {
  for (var i = 0; i < queue.length; i++) {
    queue[i]._inactive = true;
    activateChildComponent(queue[i], true /* true */);
  }
}

/**
 * Push a watcher into the watcher queue.
 * Jobs with duplicate IDs will be skipped unless it's
 * pushed when the queue is being flushed.
 */
function queueWatcher (watcher) {
  var id = watcher.id;
  if (has[id] == null) {
    has[id] = true;
    if (!flushing) {
      queue.push(watcher);
    } else {
      // if already flushing, splice the watcher based on its id
      // if already past its id, it will be run next immediately.
      var i = queue.length - 1;
      while (i > index && queue[i].id > watcher.id) {
        i--;
      }
      queue.splice(i + 1, 0, watcher);
    }
    // queue the flush
    if (!waiting) {
      waiting = true;

      if ( true && !config.async) {
        flushSchedulerQueue();
        return
      }
      nextTick(flushSchedulerQueue);
    }
  }
}

/*  */



var uid$2 = 0;

/**
 * A watcher parses an expression, collects dependencies,
 * and fires callback when the expression value changes.
 * This is used for both the $watch() api and directives.
 */
var Watcher = function Watcher (
  vm,
  expOrFn,
  cb,
  options,
  isRenderWatcher
) {
  this.vm = vm;
  if (isRenderWatcher) {
    vm._watcher = this;
  }
  vm._watchers.push(this);
  // options
  if (options) {
    this.deep = !!options.deep;
    this.user = !!options.user;
    this.lazy = !!options.lazy;
    this.sync = !!options.sync;
    this.before = options.before;
  } else {
    this.deep = this.user = this.lazy = this.sync = false;
  }
  this.cb = cb;
  this.id = ++uid$2; // uid for batching
  this.active = true;
  this.dirty = this.lazy; // for lazy watchers
  this.deps = [];
  this.newDeps = [];
  this.depIds = new _Set();
  this.newDepIds = new _Set();
  this.expression =  true
    ? expOrFn.toString()
    : undefined;
  // parse expression for getter
  if (typeof expOrFn === 'function') {
    this.getter = expOrFn;
  } else {
    this.getter = parsePath(expOrFn);
    if (!this.getter) {
      this.getter = noop;
       true && warn(
        "Failed watching path: \"" + expOrFn + "\" " +
        'Watcher only accepts simple dot-delimited paths. ' +
        'For full control, use a function instead.',
        vm
      );
    }
  }
  this.value = this.lazy
    ? undefined
    : this.get();
};

/**
 * Evaluate the getter, and re-collect dependencies.
 */
Watcher.prototype.get = function get () {
  pushTarget(this);
  var value;
  var vm = this.vm;
  try {
    value = this.getter.call(vm, vm);
  } catch (e) {
    if (this.user) {
      handleError(e, vm, ("getter for watcher \"" + (this.expression) + "\""));
    } else {
      throw e
    }
  } finally {
    // "touch" every property so they are all tracked as
    // dependencies for deep watching
    if (this.deep) {
      traverse(value);
    }
    popTarget();
    this.cleanupDeps();
  }
  return value
};

/**
 * Add a dependency to this directive.
 */
Watcher.prototype.addDep = function addDep (dep) {
  var id = dep.id;
  if (!this.newDepIds.has(id)) {
    this.newDepIds.add(id);
    this.newDeps.push(dep);
    if (!this.depIds.has(id)) {
      dep.addSub(this);
    }
  }
};

/**
 * Clean up for dependency collection.
 */
Watcher.prototype.cleanupDeps = function cleanupDeps () {
  var i = this.deps.length;
  while (i--) {
    var dep = this.deps[i];
    if (!this.newDepIds.has(dep.id)) {
      dep.removeSub(this);
    }
  }
  var tmp = this.depIds;
  this.depIds = this.newDepIds;
  this.newDepIds = tmp;
  this.newDepIds.clear();
  tmp = this.deps;
  this.deps = this.newDeps;
  this.newDeps = tmp;
  this.newDeps.length = 0;
};

/**
 * Subscriber interface.
 * Will be called when a dependency changes.
 */
Watcher.prototype.update = function update () {
  /* istanbul ignore else */
  if (this.lazy) {
    this.dirty = true;
  } else if (this.sync) {
    this.run();
  } else {
    queueWatcher(this);
  }
};

/**
 * Scheduler job interface.
 * Will be called by the scheduler.
 */
Watcher.prototype.run = function run () {
  if (this.active) {
    var value = this.get();
    if (
      value !== this.value ||
      // Deep watchers and watchers on Object/Arrays should fire even
      // when the value is the same, because the value may
      // have mutated.
      isObject(value) ||
      this.deep
    ) {
      // set new value
      var oldValue = this.value;
      this.value = value;
      if (this.user) {
        try {
          this.cb.call(this.vm, value, oldValue);
        } catch (e) {
          handleError(e, this.vm, ("callback for watcher \"" + (this.expression) + "\""));
        }
      } else {
        this.cb.call(this.vm, value, oldValue);
      }
    }
  }
};

/**
 * Evaluate the value of the watcher.
 * This only gets called for lazy watchers.
 */
Watcher.prototype.evaluate = function evaluate () {
  this.value = this.get();
  this.dirty = false;
};

/**
 * Depend on all deps collected by this watcher.
 */
Watcher.prototype.depend = function depend () {
  var i = this.deps.length;
  while (i--) {
    this.deps[i].depend();
  }
};

/**
 * Remove self from all dependencies' subscriber list.
 */
Watcher.prototype.teardown = function teardown () {
  if (this.active) {
    // remove self from vm's watcher list
    // this is a somewhat expensive operation so we skip it
    // if the vm is being destroyed.
    if (!this.vm._isBeingDestroyed) {
      remove(this.vm._watchers, this);
    }
    var i = this.deps.length;
    while (i--) {
      this.deps[i].removeSub(this);
    }
    this.active = false;
  }
};

/*  */

var sharedPropertyDefinition = {
  enumerable: true,
  configurable: true,
  get: noop,
  set: noop
};

function proxy (target, sourceKey, key) {
  sharedPropertyDefinition.get = function proxyGetter () {
    return this[sourceKey][key]
  };
  sharedPropertyDefinition.set = function proxySetter (val) {
    this[sourceKey][key] = val;
  };
  Object.defineProperty(target, key, sharedPropertyDefinition);
}

function initState (vm) {
  vm._watchers = [];
  var opts = vm.$options;
  if (opts.props) { initProps(vm, opts.props); }
  if (opts.methods) { initMethods(vm, opts.methods); }
  if (opts.data) {
    initData(vm);
  } else {
    observe(vm._data = {}, true /* asRootData */);
  }
  if (opts.computed) { initComputed(vm, opts.computed); }
  if (opts.watch && opts.watch !== nativeWatch) {
    initWatch(vm, opts.watch);
  }
}

function initProps (vm, propsOptions) {
  var propsData = vm.$options.propsData || {};
  var props = vm._props = {};
  // cache prop keys so that future props updates can iterate using Array
  // instead of dynamic object key enumeration.
  var keys = vm.$options._propKeys = [];
  var isRoot = !vm.$parent;
  // root instance props should be converted
  if (!isRoot) {
    toggleObserving(false);
  }
  var loop = function ( key ) {
    keys.push(key);
    var value = validateProp(key, propsOptions, propsData, vm);
    /* istanbul ignore else */
    if (true) {
      var hyphenatedKey = hyphenate(key);
      if (isReservedAttribute(hyphenatedKey) ||
          config.isReservedAttr(hyphenatedKey)) {
        warn(
          ("\"" + hyphenatedKey + "\" is a reserved attribute and cannot be used as component prop."),
          vm
        );
      }
      defineReactive$$1(props, key, value, function () {
        if (!isRoot && !isUpdatingChildComponent) {
          {
            if(vm.mpHost === 'mp-baidu' || vm.mpHost === 'mp-kuaishou'){//百度、快手 observer 在 setData callback 之后触发，直接忽略该 warn
                return
            }
            //fixed by xxxxxx __next_tick_pending,uni://form-field 时不告警
            if(
                key === 'value' &&
                Array.isArray(vm.$options.behaviors) &&
                vm.$options.behaviors.indexOf('uni://form-field') !== -1
              ){
              return
            }
            if(vm._getFormData){
              return
            }
            var $parent = vm.$parent;
            while($parent){
              if($parent.__next_tick_pending){
                return
              }
              $parent = $parent.$parent;
            }
          }
          warn(
            "Avoid mutating a prop directly since the value will be " +
            "overwritten whenever the parent component re-renders. " +
            "Instead, use a data or computed property based on the prop's " +
            "value. Prop being mutated: \"" + key + "\"",
            vm
          );
        }
      });
    } else {}
    // static props are already proxied on the component's prototype
    // during Vue.extend(). We only need to proxy props defined at
    // instantiation here.
    if (!(key in vm)) {
      proxy(vm, "_props", key);
    }
  };

  for (var key in propsOptions) loop( key );
  toggleObserving(true);
}

function initData (vm) {
  var data = vm.$options.data;
  data = vm._data = typeof data === 'function'
    ? getData(data, vm)
    : data || {};
  if (!isPlainObject(data)) {
    data = {};
     true && warn(
      'data functions should return an object:\n' +
      'https://vuejs.org/v2/guide/components.html#data-Must-Be-a-Function',
      vm
    );
  }
  // proxy data on instance
  var keys = Object.keys(data);
  var props = vm.$options.props;
  var methods = vm.$options.methods;
  var i = keys.length;
  while (i--) {
    var key = keys[i];
    if (true) {
      if (methods && hasOwn(methods, key)) {
        warn(
          ("Method \"" + key + "\" has already been defined as a data property."),
          vm
        );
      }
    }
    if (props && hasOwn(props, key)) {
       true && warn(
        "The data property \"" + key + "\" is already declared as a prop. " +
        "Use prop default value instead.",
        vm
      );
    } else if (!isReserved(key)) {
      proxy(vm, "_data", key);
    }
  }
  // observe data
  observe(data, true /* asRootData */);
}

function getData (data, vm) {
  // #7573 disable dep collection when invoking data getters
  pushTarget();
  try {
    return data.call(vm, vm)
  } catch (e) {
    handleError(e, vm, "data()");
    return {}
  } finally {
    popTarget();
  }
}

var computedWatcherOptions = { lazy: true };

function initComputed (vm, computed) {
  // $flow-disable-line
  var watchers = vm._computedWatchers = Object.create(null);
  // computed properties are just getters during SSR
  var isSSR = isServerRendering();

  for (var key in computed) {
    var userDef = computed[key];
    var getter = typeof userDef === 'function' ? userDef : userDef.get;
    if ( true && getter == null) {
      warn(
        ("Getter is missing for computed property \"" + key + "\"."),
        vm
      );
    }

    if (!isSSR) {
      // create internal watcher for the computed property.
      watchers[key] = new Watcher(
        vm,
        getter || noop,
        noop,
        computedWatcherOptions
      );
    }

    // component-defined computed properties are already defined on the
    // component prototype. We only need to define computed properties defined
    // at instantiation here.
    if (!(key in vm)) {
      defineComputed(vm, key, userDef);
    } else if (true) {
      if (key in vm.$data) {
        warn(("The computed property \"" + key + "\" is already defined in data."), vm);
      } else if (vm.$options.props && key in vm.$options.props) {
        warn(("The computed property \"" + key + "\" is already defined as a prop."), vm);
      }
    }
  }
}

function defineComputed (
  target,
  key,
  userDef
) {
  var shouldCache = !isServerRendering();
  if (typeof userDef === 'function') {
    sharedPropertyDefinition.get = shouldCache
      ? createComputedGetter(key)
      : createGetterInvoker(userDef);
    sharedPropertyDefinition.set = noop;
  } else {
    sharedPropertyDefinition.get = userDef.get
      ? shouldCache && userDef.cache !== false
        ? createComputedGetter(key)
        : createGetterInvoker(userDef.get)
      : noop;
    sharedPropertyDefinition.set = userDef.set || noop;
  }
  if ( true &&
      sharedPropertyDefinition.set === noop) {
    sharedPropertyDefinition.set = function () {
      warn(
        ("Computed property \"" + key + "\" was assigned to but it has no setter."),
        this
      );
    };
  }
  Object.defineProperty(target, key, sharedPropertyDefinition);
}

function createComputedGetter (key) {
  return function computedGetter () {
    var watcher = this._computedWatchers && this._computedWatchers[key];
    if (watcher) {
      if (watcher.dirty) {
        watcher.evaluate();
      }
      if (Dep.SharedObject.target) {// fixed by xxxxxx
        watcher.depend();
      }
      return watcher.value
    }
  }
}

function createGetterInvoker(fn) {
  return function computedGetter () {
    return fn.call(this, this)
  }
}

function initMethods (vm, methods) {
  var props = vm.$options.props;
  for (var key in methods) {
    if (true) {
      if (typeof methods[key] !== 'function') {
        warn(
          "Method \"" + key + "\" has type \"" + (typeof methods[key]) + "\" in the component definition. " +
          "Did you reference the function correctly?",
          vm
        );
      }
      if (props && hasOwn(props, key)) {
        warn(
          ("Method \"" + key + "\" has already been defined as a prop."),
          vm
        );
      }
      if ((key in vm) && isReserved(key)) {
        warn(
          "Method \"" + key + "\" conflicts with an existing Vue instance method. " +
          "Avoid defining component methods that start with _ or $."
        );
      }
    }
    vm[key] = typeof methods[key] !== 'function' ? noop : bind(methods[key], vm);
  }
}

function initWatch (vm, watch) {
  for (var key in watch) {
    var handler = watch[key];
    if (Array.isArray(handler)) {
      for (var i = 0; i < handler.length; i++) {
        createWatcher(vm, key, handler[i]);
      }
    } else {
      createWatcher(vm, key, handler);
    }
  }
}

function createWatcher (
  vm,
  expOrFn,
  handler,
  options
) {
  if (isPlainObject(handler)) {
    options = handler;
    handler = handler.handler;
  }
  if (typeof handler === 'string') {
    handler = vm[handler];
  }
  return vm.$watch(expOrFn, handler, options)
}

function stateMixin (Vue) {
  // flow somehow has problems with directly declared definition object
  // when using Object.defineProperty, so we have to procedurally build up
  // the object here.
  var dataDef = {};
  dataDef.get = function () { return this._data };
  var propsDef = {};
  propsDef.get = function () { return this._props };
  if (true) {
    dataDef.set = function () {
      warn(
        'Avoid replacing instance root $data. ' +
        'Use nested data properties instead.',
        this
      );
    };
    propsDef.set = function () {
      warn("$props is readonly.", this);
    };
  }
  Object.defineProperty(Vue.prototype, '$data', dataDef);
  Object.defineProperty(Vue.prototype, '$props', propsDef);

  Vue.prototype.$set = set;
  Vue.prototype.$delete = del;

  Vue.prototype.$watch = function (
    expOrFn,
    cb,
    options
  ) {
    var vm = this;
    if (isPlainObject(cb)) {
      return createWatcher(vm, expOrFn, cb, options)
    }
    options = options || {};
    options.user = true;
    var watcher = new Watcher(vm, expOrFn, cb, options);
    if (options.immediate) {
      try {
        cb.call(vm, watcher.value);
      } catch (error) {
        handleError(error, vm, ("callback for immediate watcher \"" + (watcher.expression) + "\""));
      }
    }
    return function unwatchFn () {
      watcher.teardown();
    }
  };
}

/*  */

var uid$3 = 0;

function initMixin (Vue) {
  Vue.prototype._init = function (options) {
    var vm = this;
    // a uid
    vm._uid = uid$3++;

    var startTag, endTag;
    /* istanbul ignore if */
    if ( true && config.performance && mark) {
      startTag = "vue-perf-start:" + (vm._uid);
      endTag = "vue-perf-end:" + (vm._uid);
      mark(startTag);
    }

    // a flag to avoid this being observed
    vm._isVue = true;
    // merge options
    if (options && options._isComponent) {
      // optimize internal component instantiation
      // since dynamic options merging is pretty slow, and none of the
      // internal component options needs special treatment.
      initInternalComponent(vm, options);
    } else {
      vm.$options = mergeOptions(
        resolveConstructorOptions(vm.constructor),
        options || {},
        vm
      );
    }
    /* istanbul ignore else */
    if (true) {
      initProxy(vm);
    } else {}
    // expose real self
    vm._self = vm;
    initLifecycle(vm);
    initEvents(vm);
    initRender(vm);
    callHook(vm, 'beforeCreate');
    !vm._$fallback && initInjections(vm); // resolve injections before data/props
    initState(vm);
    !vm._$fallback && initProvide(vm); // resolve provide after data/props
    !vm._$fallback && callHook(vm, 'created');

    /* istanbul ignore if */
    if ( true && config.performance && mark) {
      vm._name = formatComponentName(vm, false);
      mark(endTag);
      measure(("vue " + (vm._name) + " init"), startTag, endTag);
    }

    if (vm.$options.el) {
      vm.$mount(vm.$options.el);
    }
  };
}

function initInternalComponent (vm, options) {
  var opts = vm.$options = Object.create(vm.constructor.options);
  // doing this because it's faster than dynamic enumeration.
  var parentVnode = options._parentVnode;
  opts.parent = options.parent;
  opts._parentVnode = parentVnode;

  var vnodeComponentOptions = parentVnode.componentOptions;
  opts.propsData = vnodeComponentOptions.propsData;
  opts._parentListeners = vnodeComponentOptions.listeners;
  opts._renderChildren = vnodeComponentOptions.children;
  opts._componentTag = vnodeComponentOptions.tag;

  if (options.render) {
    opts.render = options.render;
    opts.staticRenderFns = options.staticRenderFns;
  }
}

function resolveConstructorOptions (Ctor) {
  var options = Ctor.options;
  if (Ctor.super) {
    var superOptions = resolveConstructorOptions(Ctor.super);
    var cachedSuperOptions = Ctor.superOptions;
    if (superOptions !== cachedSuperOptions) {
      // super option changed,
      // need to resolve new options.
      Ctor.superOptions = superOptions;
      // check if there are any late-modified/attached options (#4976)
      var modifiedOptions = resolveModifiedOptions(Ctor);
      // update base extend options
      if (modifiedOptions) {
        extend(Ctor.extendOptions, modifiedOptions);
      }
      options = Ctor.options = mergeOptions(superOptions, Ctor.extendOptions);
      if (options.name) {
        options.components[options.name] = Ctor;
      }
    }
  }
  return options
}

function resolveModifiedOptions (Ctor) {
  var modified;
  var latest = Ctor.options;
  var sealed = Ctor.sealedOptions;
  for (var key in latest) {
    if (latest[key] !== sealed[key]) {
      if (!modified) { modified = {}; }
      modified[key] = latest[key];
    }
  }
  return modified
}

function Vue (options) {
  if ( true &&
    !(this instanceof Vue)
  ) {
    warn('Vue is a constructor and should be called with the `new` keyword');
  }
  this._init(options);
}

initMixin(Vue);
stateMixin(Vue);
eventsMixin(Vue);
lifecycleMixin(Vue);
renderMixin(Vue);

/*  */

function initUse (Vue) {
  Vue.use = function (plugin) {
    var installedPlugins = (this._installedPlugins || (this._installedPlugins = []));
    if (installedPlugins.indexOf(plugin) > -1) {
      return this
    }

    // additional parameters
    var args = toArray(arguments, 1);
    args.unshift(this);
    if (typeof plugin.install === 'function') {
      plugin.install.apply(plugin, args);
    } else if (typeof plugin === 'function') {
      plugin.apply(null, args);
    }
    installedPlugins.push(plugin);
    return this
  };
}

/*  */

function initMixin$1 (Vue) {
  Vue.mixin = function (mixin) {
    this.options = mergeOptions(this.options, mixin);
    return this
  };
}

/*  */

function initExtend (Vue) {
  /**
   * Each instance constructor, including Vue, has a unique
   * cid. This enables us to create wrapped "child
   * constructors" for prototypal inheritance and cache them.
   */
  Vue.cid = 0;
  var cid = 1;

  /**
   * Class inheritance
   */
  Vue.extend = function (extendOptions) {
    extendOptions = extendOptions || {};
    var Super = this;
    var SuperId = Super.cid;
    var cachedCtors = extendOptions._Ctor || (extendOptions._Ctor = {});
    if (cachedCtors[SuperId]) {
      return cachedCtors[SuperId]
    }

    var name = extendOptions.name || Super.options.name;
    if ( true && name) {
      validateComponentName(name);
    }

    var Sub = function VueComponent (options) {
      this._init(options);
    };
    Sub.prototype = Object.create(Super.prototype);
    Sub.prototype.constructor = Sub;
    Sub.cid = cid++;
    Sub.options = mergeOptions(
      Super.options,
      extendOptions
    );
    Sub['super'] = Super;

    // For props and computed properties, we define the proxy getters on
    // the Vue instances at extension time, on the extended prototype. This
    // avoids Object.defineProperty calls for each instance created.
    if (Sub.options.props) {
      initProps$1(Sub);
    }
    if (Sub.options.computed) {
      initComputed$1(Sub);
    }

    // allow further extension/mixin/plugin usage
    Sub.extend = Super.extend;
    Sub.mixin = Super.mixin;
    Sub.use = Super.use;

    // create asset registers, so extended classes
    // can have their private assets too.
    ASSET_TYPES.forEach(function (type) {
      Sub[type] = Super[type];
    });
    // enable recursive self-lookup
    if (name) {
      Sub.options.components[name] = Sub;
    }

    // keep a reference to the super options at extension time.
    // later at instantiation we can check if Super's options have
    // been updated.
    Sub.superOptions = Super.options;
    Sub.extendOptions = extendOptions;
    Sub.sealedOptions = extend({}, Sub.options);

    // cache constructor
    cachedCtors[SuperId] = Sub;
    return Sub
  };
}

function initProps$1 (Comp) {
  var props = Comp.options.props;
  for (var key in props) {
    proxy(Comp.prototype, "_props", key);
  }
}

function initComputed$1 (Comp) {
  var computed = Comp.options.computed;
  for (var key in computed) {
    defineComputed(Comp.prototype, key, computed[key]);
  }
}

/*  */

function initAssetRegisters (Vue) {
  /**
   * Create asset registration methods.
   */
  ASSET_TYPES.forEach(function (type) {
    Vue[type] = function (
      id,
      definition
    ) {
      if (!definition) {
        return this.options[type + 's'][id]
      } else {
        /* istanbul ignore if */
        if ( true && type === 'component') {
          validateComponentName(id);
        }
        if (type === 'component' && isPlainObject(definition)) {
          definition.name = definition.name || id;
          definition = this.options._base.extend(definition);
        }
        if (type === 'directive' && typeof definition === 'function') {
          definition = { bind: definition, update: definition };
        }
        this.options[type + 's'][id] = definition;
        return definition
      }
    };
  });
}

/*  */



function getComponentName (opts) {
  return opts && (opts.Ctor.options.name || opts.tag)
}

function matches (pattern, name) {
  if (Array.isArray(pattern)) {
    return pattern.indexOf(name) > -1
  } else if (typeof pattern === 'string') {
    return pattern.split(',').indexOf(name) > -1
  } else if (isRegExp(pattern)) {
    return pattern.test(name)
  }
  /* istanbul ignore next */
  return false
}

function pruneCache (keepAliveInstance, filter) {
  var cache = keepAliveInstance.cache;
  var keys = keepAliveInstance.keys;
  var _vnode = keepAliveInstance._vnode;
  for (var key in cache) {
    var cachedNode = cache[key];
    if (cachedNode) {
      var name = getComponentName(cachedNode.componentOptions);
      if (name && !filter(name)) {
        pruneCacheEntry(cache, key, keys, _vnode);
      }
    }
  }
}

function pruneCacheEntry (
  cache,
  key,
  keys,
  current
) {
  var cached$$1 = cache[key];
  if (cached$$1 && (!current || cached$$1.tag !== current.tag)) {
    cached$$1.componentInstance.$destroy();
  }
  cache[key] = null;
  remove(keys, key);
}

var patternTypes = [String, RegExp, Array];

var KeepAlive = {
  name: 'keep-alive',
  abstract: true,

  props: {
    include: patternTypes,
    exclude: patternTypes,
    max: [String, Number]
  },

  created: function created () {
    this.cache = Object.create(null);
    this.keys = [];
  },

  destroyed: function destroyed () {
    for (var key in this.cache) {
      pruneCacheEntry(this.cache, key, this.keys);
    }
  },

  mounted: function mounted () {
    var this$1 = this;

    this.$watch('include', function (val) {
      pruneCache(this$1, function (name) { return matches(val, name); });
    });
    this.$watch('exclude', function (val) {
      pruneCache(this$1, function (name) { return !matches(val, name); });
    });
  },

  render: function render () {
    var slot = this.$slots.default;
    var vnode = getFirstComponentChild(slot);
    var componentOptions = vnode && vnode.componentOptions;
    if (componentOptions) {
      // check pattern
      var name = getComponentName(componentOptions);
      var ref = this;
      var include = ref.include;
      var exclude = ref.exclude;
      if (
        // not included
        (include && (!name || !matches(include, name))) ||
        // excluded
        (exclude && name && matches(exclude, name))
      ) {
        return vnode
      }

      var ref$1 = this;
      var cache = ref$1.cache;
      var keys = ref$1.keys;
      var key = vnode.key == null
        // same constructor may get registered as different local components
        // so cid alone is not enough (#3269)
        ? componentOptions.Ctor.cid + (componentOptions.tag ? ("::" + (componentOptions.tag)) : '')
        : vnode.key;
      if (cache[key]) {
        vnode.componentInstance = cache[key].componentInstance;
        // make current key freshest
        remove(keys, key);
        keys.push(key);
      } else {
        cache[key] = vnode;
        keys.push(key);
        // prune oldest entry
        if (this.max && keys.length > parseInt(this.max)) {
          pruneCacheEntry(cache, keys[0], keys, this._vnode);
        }
      }

      vnode.data.keepAlive = true;
    }
    return vnode || (slot && slot[0])
  }
};

var builtInComponents = {
  KeepAlive: KeepAlive
};

/*  */

function initGlobalAPI (Vue) {
  // config
  var configDef = {};
  configDef.get = function () { return config; };
  if (true) {
    configDef.set = function () {
      warn(
        'Do not replace the Vue.config object, set individual fields instead.'
      );
    };
  }
  Object.defineProperty(Vue, 'config', configDef);

  // exposed util methods.
  // NOTE: these are not considered part of the public API - avoid relying on
  // them unless you are aware of the risk.
  Vue.util = {
    warn: warn,
    extend: extend,
    mergeOptions: mergeOptions,
    defineReactive: defineReactive$$1
  };

  Vue.set = set;
  Vue.delete = del;
  Vue.nextTick = nextTick;

  // 2.6 explicit observable API
  Vue.observable = function (obj) {
    observe(obj);
    return obj
  };

  Vue.options = Object.create(null);
  ASSET_TYPES.forEach(function (type) {
    Vue.options[type + 's'] = Object.create(null);
  });

  // this is used to identify the "base" constructor to extend all plain-object
  // components with in Weex's multi-instance scenarios.
  Vue.options._base = Vue;

  extend(Vue.options.components, builtInComponents);

  initUse(Vue);
  initMixin$1(Vue);
  initExtend(Vue);
  initAssetRegisters(Vue);
}

initGlobalAPI(Vue);

Object.defineProperty(Vue.prototype, '$isServer', {
  get: isServerRendering
});

Object.defineProperty(Vue.prototype, '$ssrContext', {
  get: function get () {
    /* istanbul ignore next */
    return this.$vnode && this.$vnode.ssrContext
  }
});

// expose FunctionalRenderContext for ssr runtime helper installation
Object.defineProperty(Vue, 'FunctionalRenderContext', {
  value: FunctionalRenderContext
});

Vue.version = '2.6.11';

/**
 * https://raw.githubusercontent.com/Tencent/westore/master/packages/westore/utils/diff.js
 */
var ARRAYTYPE = '[object Array]';
var OBJECTTYPE = '[object Object]';
// const FUNCTIONTYPE = '[object Function]'

function diff(current, pre) {
    var result = {};
    syncKeys(current, pre);
    _diff(current, pre, '', result);
    return result
}

function syncKeys(current, pre) {
    if (current === pre) { return }
    var rootCurrentType = type(current);
    var rootPreType = type(pre);
    if (rootCurrentType == OBJECTTYPE && rootPreType == OBJECTTYPE) {
        if(Object.keys(current).length >= Object.keys(pre).length){
            for (var key in pre) {
                var currentValue = current[key];
                if (currentValue === undefined) {
                    current[key] = null;
                } else {
                    syncKeys(currentValue, pre[key]);
                }
            }
        }
    } else if (rootCurrentType == ARRAYTYPE && rootPreType == ARRAYTYPE) {
        if (current.length >= pre.length) {
            pre.forEach(function (item, index) {
                syncKeys(current[index], item);
            });
        }
    }
}

function _diff(current, pre, path, result) {
    if (current === pre) { return }
    var rootCurrentType = type(current);
    var rootPreType = type(pre);
    if (rootCurrentType == OBJECTTYPE) {
        if (rootPreType != OBJECTTYPE || Object.keys(current).length < Object.keys(pre).length) {
            setResult(result, path, current);
        } else {
            var loop = function ( key ) {
                var currentValue = current[key];
                var preValue = pre[key];
                var currentType = type(currentValue);
                var preType = type(preValue);
                if (currentType != ARRAYTYPE && currentType != OBJECTTYPE) {
                    // NOTE 此处将 != 修改为 !==。涉及地方太多恐怕测试不到，如果出现数据对比问题，将其修改回来。
                    if (currentValue !== pre[key]) {
                        setResult(result, (path == '' ? '' : path + ".") + key, currentValue);
                    }
                } else if (currentType == ARRAYTYPE) {
                    if (preType != ARRAYTYPE) {
                        setResult(result, (path == '' ? '' : path + ".") + key, currentValue);
                    } else {
                        if (currentValue.length < preValue.length) {
                            setResult(result, (path == '' ? '' : path + ".") + key, currentValue);
                        } else {
                            currentValue.forEach(function (item, index) {
                                _diff(item, preValue[index], (path == '' ? '' : path + ".") + key + '[' + index + ']', result);
                            });
                        }
                    }
                } else if (currentType == OBJECTTYPE) {
                    if (preType != OBJECTTYPE || Object.keys(currentValue).length < Object.keys(preValue).length) {
                        setResult(result, (path == '' ? '' : path + ".") + key, currentValue);
                    } else {
                        for (var subKey in currentValue) {
                            _diff(currentValue[subKey], preValue[subKey], (path == '' ? '' : path + ".") + key + '.' + subKey, result);
                        }
                    }
                }
            };

            for (var key in current) loop( key );
        }
    } else if (rootCurrentType == ARRAYTYPE) {
        if (rootPreType != ARRAYTYPE) {
            setResult(result, path, current);
        } else {
            if (current.length < pre.length) {
                setResult(result, path, current);
            } else {
                current.forEach(function (item, index) {
                    _diff(item, pre[index], path + '[' + index + ']', result);
                });
            }
        }
    } else {
        setResult(result, path, current);
    }
}

function setResult(result, k, v) {
    // if (type(v) != FUNCTIONTYPE) {
        result[k] = v;
    // }
}

function type(obj) {
    return Object.prototype.toString.call(obj)
}

/*  */

function flushCallbacks$1(vm) {
    if (vm.__next_tick_callbacks && vm.__next_tick_callbacks.length) {
        if (Object({"VUE_APP_NAME":"万岳知识付费","VUE_APP_PLATFORM":"mp-weixin","NODE_ENV":"development","BASE_URL":"/"}).VUE_APP_DEBUG) {
            var mpInstance = vm.$scope;
            console.log('[' + (+new Date) + '][' + (mpInstance.is || mpInstance.route) + '][' + vm._uid +
                ']:flushCallbacks[' + vm.__next_tick_callbacks.length + ']');
        }
        var copies = vm.__next_tick_callbacks.slice(0);
        vm.__next_tick_callbacks.length = 0;
        for (var i = 0; i < copies.length; i++) {
            copies[i]();
        }
    }
}

function hasRenderWatcher(vm) {
    return queue.find(function (watcher) { return vm._watcher === watcher; })
}

function nextTick$1(vm, cb) {
    //1.nextTick 之前 已 setData 且 setData 还未回调完成
    //2.nextTick 之前存在 render watcher
    if (!vm.__next_tick_pending && !hasRenderWatcher(vm)) {
        if(Object({"VUE_APP_NAME":"万岳知识付费","VUE_APP_PLATFORM":"mp-weixin","NODE_ENV":"development","BASE_URL":"/"}).VUE_APP_DEBUG){
            var mpInstance = vm.$scope;
            console.log('[' + (+new Date) + '][' + (mpInstance.is || mpInstance.route) + '][' + vm._uid +
                ']:nextVueTick');
        }
        return nextTick(cb, vm)
    }else{
        if(Object({"VUE_APP_NAME":"万岳知识付费","VUE_APP_PLATFORM":"mp-weixin","NODE_ENV":"development","BASE_URL":"/"}).VUE_APP_DEBUG){
            var mpInstance$1 = vm.$scope;
            console.log('[' + (+new Date) + '][' + (mpInstance$1.is || mpInstance$1.route) + '][' + vm._uid +
                ']:nextMPTick');
        }
    }
    var _resolve;
    if (!vm.__next_tick_callbacks) {
        vm.__next_tick_callbacks = [];
    }
    vm.__next_tick_callbacks.push(function () {
        if (cb) {
            try {
                cb.call(vm);
            } catch (e) {
                handleError(e, vm, 'nextTick');
            }
        } else if (_resolve) {
            _resolve(vm);
        }
    });
    // $flow-disable-line
    if (!cb && typeof Promise !== 'undefined') {
        return new Promise(function (resolve) {
            _resolve = resolve;
        })
    }
}

/*  */

function cloneWithData(vm) {
  // 确保当前 vm 所有数据被同步
  var ret = Object.create(null);
  var dataKeys = [].concat(
    Object.keys(vm._data || {}),
    Object.keys(vm._computedWatchers || {}));

  dataKeys.reduce(function(ret, key) {
    ret[key] = vm[key];
    return ret
  }, ret);

  // vue-composition-api
  var compositionApiState = vm.__composition_api_state__ || vm.__secret_vfa_state__;
  var rawBindings = compositionApiState && compositionApiState.rawBindings;
  if (rawBindings) {
    Object.keys(rawBindings).forEach(function (key) {
      ret[key] = vm[key];
    });
  }

  //TODO 需要把无用数据处理掉，比如 list=>l0 则 list 需要移除，否则多传输一份数据
  Object.assign(ret, vm.$mp.data || {});
  if (
    Array.isArray(vm.$options.behaviors) &&
    vm.$options.behaviors.indexOf('uni://form-field') !== -1
  ) { //form-field
    ret['name'] = vm.name;
    ret['value'] = vm.value;
  }

  return JSON.parse(JSON.stringify(ret))
}

var patch = function(oldVnode, vnode) {
  var this$1 = this;

  if (vnode === null) { //destroy
    return
  }
  if (this.mpType === 'page' || this.mpType === 'component') {
    var mpInstance = this.$scope;
    var data = Object.create(null);
    try {
      data = cloneWithData(this);
    } catch (err) {
      console.error(err);
    }
    data.__webviewId__ = mpInstance.data.__webviewId__;
    var mpData = Object.create(null);
    Object.keys(data).forEach(function (key) { //仅同步 data 中有的数据
      mpData[key] = mpInstance.data[key];
    });
    var diffData = this.$shouldDiffData === false ? data : diff(data, mpData);
    if (Object.keys(diffData).length) {
      if (Object({"VUE_APP_NAME":"万岳知识付费","VUE_APP_PLATFORM":"mp-weixin","NODE_ENV":"development","BASE_URL":"/"}).VUE_APP_DEBUG) {
        console.log('[' + (+new Date) + '][' + (mpInstance.is || mpInstance.route) + '][' + this._uid +
          ']差量更新',
          JSON.stringify(diffData));
      }
      this.__next_tick_pending = true;
      mpInstance.setData(diffData, function () {
        this$1.__next_tick_pending = false;
        flushCallbacks$1(this$1);
      });
    } else {
      flushCallbacks$1(this);
    }
  }
};

/*  */

function createEmptyRender() {

}

function mountComponent$1(
  vm,
  el,
  hydrating
) {
  if (!vm.mpType) {//main.js 中的 new Vue
    return vm
  }
  if (vm.mpType === 'app') {
    vm.$options.render = createEmptyRender;
  }
  if (!vm.$options.render) {
    vm.$options.render = createEmptyRender;
    if (true) {
      /* istanbul ignore if */
      if ((vm.$options.template && vm.$options.template.charAt(0) !== '#') ||
        vm.$options.el || el) {
        warn(
          'You are using the runtime-only build of Vue where the template ' +
          'compiler is not available. Either pre-compile the templates into ' +
          'render functions, or use the compiler-included build.',
          vm
        );
      } else {
        warn(
          'Failed to mount component: template or render function not defined.',
          vm
        );
      }
    }
  }

  !vm._$fallback && callHook(vm, 'beforeMount');

  var updateComponent = function () {
    vm._update(vm._render(), hydrating);
  };

  // we set this to vm._watcher inside the watcher's constructor
  // since the watcher's initial patch may call $forceUpdate (e.g. inside child
  // component's mounted hook), which relies on vm._watcher being already defined
  new Watcher(vm, updateComponent, noop, {
    before: function before() {
      if (vm._isMounted && !vm._isDestroyed) {
        callHook(vm, 'beforeUpdate');
      }
    }
  }, true /* isRenderWatcher */);
  hydrating = false;
  return vm
}

/*  */

function renderClass (
  staticClass,
  dynamicClass
) {
  if (isDef(staticClass) || isDef(dynamicClass)) {
    return concat(staticClass, stringifyClass(dynamicClass))
  }
  /* istanbul ignore next */
  return ''
}

function concat (a, b) {
  return a ? b ? (a + ' ' + b) : a : (b || '')
}

function stringifyClass (value) {
  if (Array.isArray(value)) {
    return stringifyArray(value)
  }
  if (isObject(value)) {
    return stringifyObject(value)
  }
  if (typeof value === 'string') {
    return value
  }
  /* istanbul ignore next */
  return ''
}

function stringifyArray (value) {
  var res = '';
  var stringified;
  for (var i = 0, l = value.length; i < l; i++) {
    if (isDef(stringified = stringifyClass(value[i])) && stringified !== '') {
      if (res) { res += ' '; }
      res += stringified;
    }
  }
  return res
}

function stringifyObject (value) {
  var res = '';
  for (var key in value) {
    if (value[key]) {
      if (res) { res += ' '; }
      res += key;
    }
  }
  return res
}

/*  */

var parseStyleText = cached(function (cssText) {
  var res = {};
  var listDelimiter = /;(?![^(]*\))/g;
  var propertyDelimiter = /:(.+)/;
  cssText.split(listDelimiter).forEach(function (item) {
    if (item) {
      var tmp = item.split(propertyDelimiter);
      tmp.length > 1 && (res[tmp[0].trim()] = tmp[1].trim());
    }
  });
  return res
});

// normalize possible array / string values into Object
function normalizeStyleBinding (bindingStyle) {
  if (Array.isArray(bindingStyle)) {
    return toObject(bindingStyle)
  }
  if (typeof bindingStyle === 'string') {
    return parseStyleText(bindingStyle)
  }
  return bindingStyle
}

/*  */

var MP_METHODS = ['createSelectorQuery', 'createIntersectionObserver', 'selectAllComponents', 'selectComponent'];

function getTarget(obj, path) {
  var parts = path.split('.');
  var key = parts[0];
  if (key.indexOf('__$n') === 0) { //number index
    key = parseInt(key.replace('__$n', ''));
  }
  if (parts.length === 1) {
    return obj[key]
  }
  return getTarget(obj[key], parts.slice(1).join('.'))
}

function internalMixin(Vue) {

  Vue.config.errorHandler = function(err, vm, info) {
    Vue.util.warn(("Error in " + info + ": \"" + (err.toString()) + "\""), vm);
    console.error(err);
    /* eslint-disable no-undef */
    var app = typeof getApp === 'function' && getApp();
    if (app && app.onError) {
      app.onError(err);
    }
  };

  var oldEmit = Vue.prototype.$emit;

  Vue.prototype.$emit = function(event) {
    if (this.$scope && event) {
      (this.$scope['_triggerEvent'] || this.$scope['triggerEvent'])
        .call(this.$scope, event, {
          __args__: toArray(arguments, 1)
        })
    }
    return oldEmit.apply(this, arguments)
  };

  Vue.prototype.$nextTick = function(fn) {
    return nextTick$1(this, fn)
  };

  MP_METHODS.forEach(function (method) {
    Vue.prototype[method] = function(args) {
      if (this.$scope && this.$scope[method]) {
        return this.$scope[method](args)
      }
      // mp-alipay
      if (typeof my === 'undefined') {
        return
      }
      if (method === 'createSelectorQuery') {
        /* eslint-disable no-undef */
        return my.createSelectorQuery(args)
      } else if (method === 'createIntersectionObserver') {
        /* eslint-disable no-undef */
        return my.createIntersectionObserver(args)
      }
      // TODO mp-alipay 暂不支持 selectAllComponents,selectComponent
    };
  });

  Vue.prototype.__init_provide = initProvide;

  Vue.prototype.__init_injections = initInjections;

  Vue.prototype.__call_hook = function(hook, args) {
    var vm = this;
    // #7573 disable dep collection when invoking lifecycle hooks
    pushTarget();
    var handlers = vm.$options[hook];
    var info = hook + " hook";
    var ret;
    if (handlers) {
      for (var i = 0, j = handlers.length; i < j; i++) {
        ret = invokeWithErrorHandling(handlers[i], vm, args ? [args] : null, vm, info);
      }
    }
    if (vm._hasHookEvent) {
      vm.$emit('hook:' + hook, args);
    }
    popTarget();
    return ret
  };

  Vue.prototype.__set_model = function(target, key, value, modifiers) {
    if (Array.isArray(modifiers)) {
      if (modifiers.indexOf('trim') !== -1) {
        value = value.trim();
      }
      if (modifiers.indexOf('number') !== -1) {
        value = this._n(value);
      }
    }
    if (!target) {
      target = this;
    }
    // 解决动态属性添加
    Vue.set(target, key, value)
  };

  Vue.prototype.__set_sync = function(target, key, value) {
    if (!target) {
      target = this;
    }
    // 解决动态属性添加
    Vue.set(target, key, value)
  };

  Vue.prototype.__get_orig = function(item) {
    if (isPlainObject(item)) {
      return item['$orig'] || item
    }
    return item
  };

  Vue.prototype.__get_value = function(dataPath, target) {
    return getTarget(target || this, dataPath)
  };


  Vue.prototype.__get_class = function(dynamicClass, staticClass) {
    return renderClass(staticClass, dynamicClass)
  };

  Vue.prototype.__get_style = function(dynamicStyle, staticStyle) {
    if (!dynamicStyle && !staticStyle) {
      return ''
    }
    var dynamicStyleObj = normalizeStyleBinding(dynamicStyle);
    var styleObj = staticStyle ? extend(staticStyle, dynamicStyleObj) : dynamicStyleObj;
    return Object.keys(styleObj).map(function (name) { return ((hyphenate(name)) + ":" + (styleObj[name])); }).join(';')
  };

  Vue.prototype.__map = function(val, iteratee) {
    //TODO 暂不考虑 string
    var ret, i, l, keys, key;
    if (Array.isArray(val)) {
      ret = new Array(val.length);
      for (i = 0, l = val.length; i < l; i++) {
        ret[i] = iteratee(val[i], i);
      }
      return ret
    } else if (isObject(val)) {
      keys = Object.keys(val);
      ret = Object.create(null);
      for (i = 0, l = keys.length; i < l; i++) {
        key = keys[i];
        ret[key] = iteratee(val[key], key, i);
      }
      return ret
    } else if (typeof val === 'number') {
      ret = new Array(val);
      for (i = 0, l = val; i < l; i++) {
        // 第一个参数暂时仍和小程序一致
        ret[i] = iteratee(i, i);
      }
      return ret
    }
    return []
  };

}

/*  */

var LIFECYCLE_HOOKS$1 = [
    //App
    'onLaunch',
    'onShow',
    'onHide',
    'onUniNViewMessage',
    'onPageNotFound',
    'onThemeChange',
    'onError',
    'onUnhandledRejection',
    //Page
    'onInit',
    'onLoad',
    // 'onShow',
    'onReady',
    // 'onHide',
    'onUnload',
    'onPullDownRefresh',
    'onReachBottom',
    'onTabItemTap',
    'onAddToFavorites',
    'onShareTimeline',
    'onShareAppMessage',
    'onResize',
    'onPageScroll',
    'onNavigationBarButtonTap',
    'onBackPress',
    'onNavigationBarSearchInputChanged',
    'onNavigationBarSearchInputConfirmed',
    'onNavigationBarSearchInputClicked',
    //Component
    // 'onReady', // 兼容旧版本，应该移除该事件
    'onPageShow',
    'onPageHide',
    'onPageResize'
];
function lifecycleMixin$1(Vue) {

    //fixed vue-class-component
    var oldExtend = Vue.extend;
    Vue.extend = function(extendOptions) {
        extendOptions = extendOptions || {};

        var methods = extendOptions.methods;
        if (methods) {
            Object.keys(methods).forEach(function (methodName) {
                if (LIFECYCLE_HOOKS$1.indexOf(methodName)!==-1) {
                    extendOptions[methodName] = methods[methodName];
                    delete methods[methodName];
                }
            });
        }

        return oldExtend.call(this, extendOptions)
    };

    var strategies = Vue.config.optionMergeStrategies;
    var mergeHook = strategies.created;
    LIFECYCLE_HOOKS$1.forEach(function (hook) {
        strategies[hook] = mergeHook;
    });

    Vue.prototype.__lifecycle_hooks__ = LIFECYCLE_HOOKS$1;
}

/*  */

// install platform patch function
Vue.prototype.__patch__ = patch;

// public mount method
Vue.prototype.$mount = function(
    el ,
    hydrating
) {
    return mountComponent$1(this, el, hydrating)
};

lifecycleMixin$1(Vue);
internalMixin(Vue);

/*  */

/* harmony default export */ __webpack_exports__["default"] = (Vue);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../../webpack/buildin/global.js */ 2)))

/***/ }),

/***/ 4:
/*!*************************************************************!*\
  !*** ./node_modules/@dcloudio/uni-i18n/dist/uni-i18n.es.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(uni, global) {Object.defineProperty(exports, "__esModule", { value: true });exports.compileI18nJsonStr = compileI18nJsonStr;exports.hasI18nJson = hasI18nJson;exports.initVueI18n = initVueI18n;exports.isI18nStr = isI18nStr;exports.normalizeLocale = normalizeLocale;exports.parseI18nJson = parseI18nJson;exports.resolveLocale = resolveLocale;exports.isString = exports.LOCALE_ZH_HANT = exports.LOCALE_ZH_HANS = exports.LOCALE_FR = exports.LOCALE_ES = exports.LOCALE_EN = exports.I18n = exports.Formatter = void 0;function _slicedToArray(arr, i) {return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();}function _nonIterableRest() {throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");}function _unsupportedIterableToArray(o, minLen) {if (!o) return;if (typeof o === "string") return _arrayLikeToArray(o, minLen);var n = Object.prototype.toString.call(o).slice(8, -1);if (n === "Object" && o.constructor) n = o.constructor.name;if (n === "Map" || n === "Set") return Array.from(o);if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);}function _arrayLikeToArray(arr, len) {if (len == null || len > arr.length) len = arr.length;for (var i = 0, arr2 = new Array(len); i < len; i++) {arr2[i] = arr[i];}return arr2;}function _iterableToArrayLimit(arr, i) {if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;var _arr = [];var _n = true;var _d = false;var _e = undefined;try {for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {_arr.push(_s.value);if (i && _arr.length === i) break;}} catch (err) {_d = true;_e = err;} finally {try {if (!_n && _i["return"] != null) _i["return"]();} finally {if (_d) throw _e;}}return _arr;}function _arrayWithHoles(arr) {if (Array.isArray(arr)) return arr;}function _classCallCheck(instance, Constructor) {if (!(instance instanceof Constructor)) {throw new TypeError("Cannot call a class as a function");}}function _defineProperties(target, props) {for (var i = 0; i < props.length; i++) {var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);}}function _createClass(Constructor, protoProps, staticProps) {if (protoProps) _defineProperties(Constructor.prototype, protoProps);if (staticProps) _defineProperties(Constructor, staticProps);return Constructor;}var isArray = Array.isArray;
var isObject = function isObject(val) {return val !== null && typeof val === 'object';};
var defaultDelimiters = ['{', '}'];var
BaseFormatter = /*#__PURE__*/function () {
  function BaseFormatter() {_classCallCheck(this, BaseFormatter);
    this._caches = Object.create(null);
  }_createClass(BaseFormatter, [{ key: "interpolate", value: function interpolate(
    message, values) {var delimiters = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : defaultDelimiters;
      if (!values) {
        return [message];
      }
      var tokens = this._caches[message];
      if (!tokens) {
        tokens = parse(message, delimiters);
        this._caches[message] = tokens;
      }
      return compile(tokens, values);
    } }]);return BaseFormatter;}();exports.Formatter = BaseFormatter;

var RE_TOKEN_LIST_VALUE = /^(?:\d)+/;
var RE_TOKEN_NAMED_VALUE = /^(?:\w)+/;
function parse(format, _ref) {var _ref2 = _slicedToArray(_ref, 2),startDelimiter = _ref2[0],endDelimiter = _ref2[1];
  var tokens = [];
  var position = 0;
  var text = '';
  while (position < format.length) {
    var char = format[position++];
    if (char === startDelimiter) {
      if (text) {
        tokens.push({ type: 'text', value: text });
      }
      text = '';
      var sub = '';
      char = format[position++];
      while (char !== undefined && char !== endDelimiter) {
        sub += char;
        char = format[position++];
      }
      var isClosed = char === endDelimiter;
      var type = RE_TOKEN_LIST_VALUE.test(sub) ?
      'list' :
      isClosed && RE_TOKEN_NAMED_VALUE.test(sub) ?
      'named' :
      'unknown';
      tokens.push({ value: sub, type: type });
    }
    //  else if (char === '%') {
    //   // when found rails i18n syntax, skip text capture
    //   if (format[position] !== '{') {
    //     text += char
    //   }
    // }
    else {
        text += char;
      }
  }
  text && tokens.push({ type: 'text', value: text });
  return tokens;
}
function compile(tokens, values) {
  var compiled = [];
  var index = 0;
  var mode = isArray(values) ?
  'list' :
  isObject(values) ?
  'named' :
  'unknown';
  if (mode === 'unknown') {
    return compiled;
  }
  while (index < tokens.length) {
    var token = tokens[index];
    switch (token.type) {
      case 'text':
        compiled.push(token.value);
        break;
      case 'list':
        compiled.push(values[parseInt(token.value, 10)]);
        break;
      case 'named':
        if (mode === 'named') {
          compiled.push(values[token.value]);
        } else
        {
          if (true) {
            console.warn("Type of token '".concat(token.type, "' and format of value '").concat(mode, "' don't match!"));
          }
        }
        break;
      case 'unknown':
        if (true) {
          console.warn("Detect 'unknown' type of token!");
        }
        break;}

    index++;
  }
  return compiled;
}

var LOCALE_ZH_HANS = 'zh-Hans';exports.LOCALE_ZH_HANS = LOCALE_ZH_HANS;
var LOCALE_ZH_HANT = 'zh-Hant';exports.LOCALE_ZH_HANT = LOCALE_ZH_HANT;
var LOCALE_EN = 'en';exports.LOCALE_EN = LOCALE_EN;
var LOCALE_FR = 'fr';exports.LOCALE_FR = LOCALE_FR;
var LOCALE_ES = 'es';exports.LOCALE_ES = LOCALE_ES;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var hasOwn = function hasOwn(val, key) {return hasOwnProperty.call(val, key);};
var defaultFormatter = new BaseFormatter();
function include(str, parts) {
  return !!parts.find(function (part) {return str.indexOf(part) !== -1;});
}
function startsWith(str, parts) {
  return parts.find(function (part) {return str.indexOf(part) === 0;});
}
function normalizeLocale(locale, messages) {
  if (!locale) {
    return;
  }
  locale = locale.trim().replace(/_/g, '-');
  if (messages && messages[locale]) {
    return locale;
  }
  locale = locale.toLowerCase();
  if (locale.indexOf('zh') === 0) {
    if (locale.indexOf('-hans') > -1) {
      return LOCALE_ZH_HANS;
    }
    if (locale.indexOf('-hant') > -1) {
      return LOCALE_ZH_HANT;
    }
    if (include(locale, ['-tw', '-hk', '-mo', '-cht'])) {
      return LOCALE_ZH_HANT;
    }
    return LOCALE_ZH_HANS;
  }
  var lang = startsWith(locale, [LOCALE_EN, LOCALE_FR, LOCALE_ES]);
  if (lang) {
    return lang;
  }
}var
I18n = /*#__PURE__*/function () {
  function I18n(_ref3) {var locale = _ref3.locale,fallbackLocale = _ref3.fallbackLocale,messages = _ref3.messages,watcher = _ref3.watcher,formater = _ref3.formater;_classCallCheck(this, I18n);
    this.locale = LOCALE_EN;
    this.fallbackLocale = LOCALE_EN;
    this.message = {};
    this.messages = {};
    this.watchers = [];
    if (fallbackLocale) {
      this.fallbackLocale = fallbackLocale;
    }
    this.formater = formater || defaultFormatter;
    this.messages = messages || {};
    this.setLocale(locale || LOCALE_EN);
    if (watcher) {
      this.watchLocale(watcher);
    }
  }_createClass(I18n, [{ key: "setLocale", value: function setLocale(
    locale) {var _this = this;
      var oldLocale = this.locale;
      this.locale = normalizeLocale(locale, this.messages) || this.fallbackLocale;
      if (!this.messages[this.locale]) {
        // 可能初始化时不存在
        this.messages[this.locale] = {};
      }
      this.message = this.messages[this.locale];
      // 仅发生变化时，通知
      if (oldLocale !== this.locale) {
        this.watchers.forEach(function (watcher) {
          watcher(_this.locale, oldLocale);
        });
      }
    } }, { key: "getLocale", value: function getLocale()
    {
      return this.locale;
    } }, { key: "watchLocale", value: function watchLocale(
    fn) {var _this2 = this;
      var index = this.watchers.push(fn) - 1;
      return function () {
        _this2.watchers.splice(index, 1);
      };
    } }, { key: "add", value: function add(
    locale, message) {var override = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
      var curMessages = this.messages[locale];
      if (curMessages) {
        if (override) {
          Object.assign(curMessages, message);
        } else
        {
          Object.keys(message).forEach(function (key) {
            if (!hasOwn(curMessages, key)) {
              curMessages[key] = message[key];
            }
          });
        }
      } else
      {
        this.messages[locale] = message;
      }
    } }, { key: "f", value: function f(
    message, values, delimiters) {
      return this.formater.interpolate(message, values, delimiters).join('');
    } }, { key: "t", value: function t(
    key, locale, values) {
      var message = this.message;
      if (typeof locale === 'string') {
        locale = normalizeLocale(locale, this.messages);
        locale && (message = this.messages[locale]);
      } else
      {
        values = locale;
      }
      if (!hasOwn(message, key)) {
        console.warn("Cannot translate the value of keypath ".concat(key, ". Use the value of keypath as default."));
        return key;
      }
      return this.formater.interpolate(message[key], values).join('');
    } }]);return I18n;}();exports.I18n = I18n;


function watchAppLocale(appVm, i18n) {
  // 需要保证 watch 的触发在组件渲染之前
  if (appVm.$watchLocale) {
    // vue2
    appVm.$watchLocale(function (newLocale) {
      i18n.setLocale(newLocale);
    });
  } else
  {
    appVm.$watch(function () {return appVm.$locale;}, function (newLocale) {
      i18n.setLocale(newLocale);
    });
  }
}
function getDefaultLocale() {
  if (typeof uni !== 'undefined' && uni.getLocale) {
    return uni.getLocale();
  }
  // 小程序平台，uni 和 uni-i18n 互相引用，导致访问不到 uni，故在 global 上挂了 getLocale
  if (typeof global !== 'undefined' && global.getLocale) {
    return global.getLocale();
  }
  return LOCALE_EN;
}
function initVueI18n(locale) {var messages = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};var fallbackLocale = arguments.length > 2 ? arguments[2] : undefined;var watcher = arguments.length > 3 ? arguments[3] : undefined;
  // 兼容旧版本入参
  if (typeof locale !== 'string') {var _ref4 =
    [
    messages,
    locale];locale = _ref4[0];messages = _ref4[1];

  }
  if (typeof locale !== 'string') {
    // 因为小程序平台，uni-i18n 和 uni 互相引用，导致此时访问 uni 时，为 undefined
    locale = getDefaultLocale();
  }
  if (typeof fallbackLocale !== 'string') {
    fallbackLocale =
    typeof __uniConfig !== 'undefined' && __uniConfig.fallbackLocale ||
    LOCALE_EN;
  }
  var i18n = new I18n({
    locale: locale,
    fallbackLocale: fallbackLocale,
    messages: messages,
    watcher: watcher });

  var _t = function t(key, values) {
    if (typeof getApp !== 'function') {
      // app view
      /* eslint-disable no-func-assign */
      _t = function t(key, values) {
        return i18n.t(key, values);
      };
    } else
    {
      var isWatchedAppLocale = false;
      _t = function t(key, values) {
        var appVm = getApp().$vm;
        // 可能$vm还不存在，比如在支付宝小程序中，组件定义较早，在props的default里使用了t()函数（如uni-goods-nav），此时app还未初始化
        // options: {
        // 	type: Array,
        // 	default () {
        // 		return [{
        // 			icon: 'shop',
        // 			text: t("uni-goods-nav.options.shop"),
        // 		}, {
        // 			icon: 'cart',
        // 			text: t("uni-goods-nav.options.cart")
        // 		}]
        // 	}
        // },
        if (appVm) {
          // 触发响应式
          appVm.$locale;
          if (!isWatchedAppLocale) {
            isWatchedAppLocale = true;
            watchAppLocale(appVm, i18n);
          }
        }
        return i18n.t(key, values);
      };
    }
    return _t(key, values);
  };
  return {
    i18n: i18n,
    f: function f(message, values, delimiters) {
      return i18n.f(message, values, delimiters);
    },
    t: function t(key, values) {
      return _t(key, values);
    },
    add: function add(locale, message) {var override = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
      return i18n.add(locale, message, override);
    },
    watch: function watch(fn) {
      return i18n.watchLocale(fn);
    },
    getLocale: function getLocale() {
      return i18n.getLocale();
    },
    setLocale: function setLocale(newLocale) {
      return i18n.setLocale(newLocale);
    } };

}

var isString = function isString(val) {return typeof val === 'string';};exports.isString = isString;
var formater;
function hasI18nJson(jsonObj, delimiters) {
  if (!formater) {
    formater = new BaseFormatter();
  }
  return walkJsonObj(jsonObj, function (jsonObj, key) {
    var value = jsonObj[key];
    if (isString(value)) {
      if (isI18nStr(value, delimiters)) {
        return true;
      }
    } else
    {
      return hasI18nJson(value, delimiters);
    }
  });
}
function parseI18nJson(jsonObj, values, delimiters) {
  if (!formater) {
    formater = new BaseFormatter();
  }
  walkJsonObj(jsonObj, function (jsonObj, key) {
    var value = jsonObj[key];
    if (isString(value)) {
      if (isI18nStr(value, delimiters)) {
        jsonObj[key] = compileStr(value, values, delimiters);
      }
    } else
    {
      parseI18nJson(value, values, delimiters);
    }
  });
  return jsonObj;
}
function compileI18nJsonStr(jsonStr, _ref5) {var locale = _ref5.locale,locales = _ref5.locales,delimiters = _ref5.delimiters;
  if (!isI18nStr(jsonStr, delimiters)) {
    return jsonStr;
  }
  if (!formater) {
    formater = new BaseFormatter();
  }
  var localeValues = [];
  Object.keys(locales).forEach(function (name) {
    if (name !== locale) {
      localeValues.push({
        locale: name,
        values: locales[name] });

    }
  });
  localeValues.unshift({ locale: locale, values: locales[locale] });
  try {
    return JSON.stringify(compileJsonObj(JSON.parse(jsonStr), localeValues, delimiters), null, 2);
  }
  catch (e) {}
  return jsonStr;
}
function isI18nStr(value, delimiters) {
  return value.indexOf(delimiters[0]) > -1;
}
function compileStr(value, values, delimiters) {
  return formater.interpolate(value, values, delimiters).join('');
}
function compileValue(jsonObj, key, localeValues, delimiters) {
  var value = jsonObj[key];
  if (isString(value)) {
    // 存在国际化
    if (isI18nStr(value, delimiters)) {
      jsonObj[key] = compileStr(value, localeValues[0].values, delimiters);
      if (localeValues.length > 1) {
        // 格式化国际化语言
        var valueLocales = jsonObj[key + 'Locales'] = {};
        localeValues.forEach(function (localValue) {
          valueLocales[localValue.locale] = compileStr(value, localValue.values, delimiters);
        });
      }
    }
  } else
  {
    compileJsonObj(value, localeValues, delimiters);
  }
}
function compileJsonObj(jsonObj, localeValues, delimiters) {
  walkJsonObj(jsonObj, function (jsonObj, key) {
    compileValue(jsonObj, key, localeValues, delimiters);
  });
  return jsonObj;
}
function walkJsonObj(jsonObj, walk) {
  if (isArray(jsonObj)) {
    for (var i = 0; i < jsonObj.length; i++) {
      if (walk(jsonObj, i)) {
        return true;
      }
    }
  } else
  if (isObject(jsonObj)) {
    for (var key in jsonObj) {
      if (walk(jsonObj, key)) {
        return true;
      }
    }
  }
  return false;
}

function resolveLocale(locales) {
  return function (locale) {
    if (!locale) {
      return locale;
    }
    locale = normalizeLocale(locale) || locale;
    return resolveLocaleChain(locale).find(function (locale) {return locales.indexOf(locale) > -1;});
  };
}
function resolveLocaleChain(locale) {
  var chain = [];
  var tokens = locale.split('-');
  while (tokens.length) {
    chain.push(tokens.join('-'));
    tokens.pop();
  }
  return chain;
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["default"], __webpack_require__(/*! ./../../../webpack/buildin/global.js */ 2)))

/***/ }),

/***/ 412:
/*!********************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/pages/address/AddressData.js ***!
  \********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _default = [{
  "id": "110000",
  "name": "北京市",
  "children": [{
    "id": "110100",
    "name": "北京市",
    "parent": "110000",
    "children": [{
      "id": "110101",
      "name": "东城区",
      "parent": "110100",
      "children": null },
    {
      "id": "110102",
      "name": "西城区",
      "parent": "110100",
      "children": null },
    {
      "id": "110103",
      "name": "崇文区",
      "parent": "110100",
      "children": null },
    {
      "id": "110104",
      "name": "宣武区",
      "parent": "110100",
      "children": null },
    {
      "id": "110105",
      "name": "朝阳区",
      "parent": "110100",
      "children": null },
    {
      "id": "110106",
      "name": "丰台区",
      "parent": "110100",
      "children": null },
    {
      "id": "110107",
      "name": "石景山区",
      "parent": "110100",
      "children": null },
    {
      "id": "110108",
      "name": "海淀区",
      "parent": "110100",
      "children": null },
    {
      "id": "110109",
      "name": "门头沟区",
      "parent": "110100",
      "children": null },
    {
      "id": "110111",
      "name": "房山区",
      "parent": "110100",
      "children": null },
    {
      "id": "110112",
      "name": "通州区",
      "parent": "110100",
      "children": null },
    {
      "id": "110113",
      "name": "顺义区",
      "parent": "110100",
      "children": null },
    {
      "id": "110114",
      "name": "昌平区",
      "parent": "110100",
      "children": null },
    {
      "id": "110115",
      "name": "大兴区",
      "parent": "110100",
      "children": null },
    {
      "id": "110116",
      "name": "怀柔区",
      "parent": "110100",
      "children": null },
    {
      "id": "110117",
      "name": "平谷区",
      "parent": "110100",
      "children": null },
    {
      "id": "110228",
      "name": "密云县",
      "parent": "110100",
      "children": null },
    {
      "id": "110229",
      "name": "延庆县",
      "parent": "110100",
      "children": null },
    {
      "id": "110230",
      "name": "其它区",
      "parent": "110100",
      "children": null }] }] },


{
  "id": "120000",
  "name": "天津市",
  "children": [{
    "id": "120100",
    "name": "天津市",
    "parent": "120000",
    "children": [{
      "id": "120101",
      "name": "和平区",
      "parent": "120100",
      "children": null },
    {
      "id": "120102",
      "name": "河东区",
      "parent": "120100",
      "children": null },
    {
      "id": "120103",
      "name": "河西区",
      "parent": "120100",
      "children": null },
    {
      "id": "120104",
      "name": "南开区",
      "parent": "120100",
      "children": null },
    {
      "id": "120105",
      "name": "河北区",
      "parent": "120100",
      "children": null },
    {
      "id": "120106",
      "name": "红桥区",
      "parent": "120100",
      "children": null },
    {
      "id": "120107",
      "name": "塘沽区",
      "parent": "120100",
      "children": null },
    {
      "id": "120108",
      "name": "汉沽区",
      "parent": "120100",
      "children": null },
    {
      "id": "120109",
      "name": "大港区",
      "parent": "120100",
      "children": null },
    {
      "id": "120110",
      "name": "东丽区",
      "parent": "120100",
      "children": null },
    {
      "id": "120111",
      "name": "西青区",
      "parent": "120100",
      "children": null },
    {
      "id": "120112",
      "name": "津南区",
      "parent": "120100",
      "children": null },
    {
      "id": "120113",
      "name": "北辰区",
      "parent": "120100",
      "children": null },
    {
      "id": "120114",
      "name": "武清区",
      "parent": "120100",
      "children": null },
    {
      "id": "120115",
      "name": "宝坻区",
      "parent": "120100",
      "children": null },
    {
      "id": "120116",
      "name": "滨海新区",
      "parent": "120100",
      "children": null },
    {
      "id": "120221",
      "name": "宁河县",
      "parent": "120100",
      "children": null },
    {
      "id": "120223",
      "name": "静海县",
      "parent": "120100",
      "children": null },
    {
      "id": "120225",
      "name": "蓟县",
      "parent": "120100",
      "children": null },
    {
      "id": "120226",
      "name": "其它区",
      "parent": "120100",
      "children": null }] }] },


{
  "id": "130000",
  "name": "河北省",
  "children": [{
    "id": "130100",
    "name": "石家庄市",
    "parent": "130000",
    "children": [{
      "id": "130102",
      "name": "长安区",
      "parent": "130100",
      "children": null },
    {
      "id": "130103",
      "name": "桥东区",
      "parent": "130100",
      "children": null },
    {
      "id": "130104",
      "name": "桥西区",
      "parent": "130100",
      "children": null },
    {
      "id": "130105",
      "name": "新华区",
      "parent": "130100",
      "children": null },
    {
      "id": "130107",
      "name": "井陉矿区",
      "parent": "130100",
      "children": null },
    {
      "id": "130108",
      "name": "裕华区",
      "parent": "130100",
      "children": null },
    {
      "id": "130121",
      "name": "井陉县",
      "parent": "130100",
      "children": null },
    {
      "id": "130123",
      "name": "正定县",
      "parent": "130100",
      "children": null },
    {
      "id": "130124",
      "name": "栾城区",
      "parent": "130100",
      "children": null },
    {
      "id": "130125",
      "name": "行唐县",
      "parent": "130100",
      "children": null },
    {
      "id": "130126",
      "name": "灵寿县",
      "parent": "130100",
      "children": null },
    {
      "id": "130127",
      "name": "高邑县",
      "parent": "130100",
      "children": null },
    {
      "id": "130128",
      "name": "深泽县",
      "parent": "130100",
      "children": null },
    {
      "id": "130129",
      "name": "赞皇县",
      "parent": "130100",
      "children": null },
    {
      "id": "130130",
      "name": "无极县",
      "parent": "130100",
      "children": null },
    {
      "id": "130131",
      "name": "平山县",
      "parent": "130100",
      "children": null },
    {
      "id": "130132",
      "name": "元氏县",
      "parent": "130100",
      "children": null },
    {
      "id": "130133",
      "name": "赵县",
      "parent": "130100",
      "children": null },
    {
      "id": "130181",
      "name": "辛集市",
      "parent": "130100",
      "children": null },
    {
      "id": "130182",
      "name": "藁城区",
      "parent": "130100",
      "children": null },
    {
      "id": "130183",
      "name": "晋州市",
      "parent": "130100",
      "children": null },
    {
      "id": "130184",
      "name": "新乐市",
      "parent": "130100",
      "children": null },
    {
      "id": "130185",
      "name": "鹿泉区",
      "parent": "130100",
      "children": null },
    {
      "id": "130186",
      "name": "其它区",
      "parent": "130100",
      "children": null }] },

  {
    "id": "130200",
    "name": "唐山市",
    "parent": "130000",
    "children": [{
      "id": "130202",
      "name": "路南区",
      "parent": "130200",
      "children": null },
    {
      "id": "130203",
      "name": "路北区",
      "parent": "130200",
      "children": null },
    {
      "id": "130204",
      "name": "古冶区",
      "parent": "130200",
      "children": null },
    {
      "id": "130205",
      "name": "开平区",
      "parent": "130200",
      "children": null },
    {
      "id": "130207",
      "name": "丰南区",
      "parent": "130200",
      "children": null },
    {
      "id": "130208",
      "name": "丰润区",
      "parent": "130200",
      "children": null },
    {
      "id": "130223",
      "name": "滦县",
      "parent": "130200",
      "children": null },
    {
      "id": "130224",
      "name": "滦南县",
      "parent": "130200",
      "children": null },
    {
      "id": "130225",
      "name": "乐亭县",
      "parent": "130200",
      "children": null },
    {
      "id": "130227",
      "name": "迁西县",
      "parent": "130200",
      "children": null },
    {
      "id": "130229",
      "name": "玉田县",
      "parent": "130200",
      "children": null },
    {
      "id": "130230",
      "name": "曹妃甸区",
      "parent": "130200",
      "children": null },
    {
      "id": "130281",
      "name": "遵化市",
      "parent": "130200",
      "children": null },
    {
      "id": "130283",
      "name": "迁安市",
      "parent": "130200",
      "children": null },
    {
      "id": "130284",
      "name": "其它区",
      "parent": "130200",
      "children": null }] },

  {
    "id": "130300",
    "name": "秦皇岛市",
    "parent": "130000",
    "children": [{
      "id": "130302",
      "name": "海港区",
      "parent": "130300",
      "children": null },
    {
      "id": "130303",
      "name": "山海关区",
      "parent": "130300",
      "children": null },
    {
      "id": "130304",
      "name": "北戴河区",
      "parent": "130300",
      "children": null },
    {
      "id": "130321",
      "name": "青龙满族自治县",
      "parent": "130300",
      "children": null },
    {
      "id": "130322",
      "name": "昌黎县",
      "parent": "130300",
      "children": null },
    {
      "id": "130323",
      "name": "抚宁县",
      "parent": "130300",
      "children": null },
    {
      "id": "130324",
      "name": "卢龙县",
      "parent": "130300",
      "children": null },
    {
      "id": "130398",
      "name": "其它区",
      "parent": "130300",
      "children": null },
    {
      "id": "130399",
      "name": "经济技术开发区",
      "parent": "130300",
      "children": null }] },

  {
    "id": "130400",
    "name": "邯郸市",
    "parent": "130000",
    "children": [{
      "id": "130402",
      "name": "邯山区",
      "parent": "130400",
      "children": null },
    {
      "id": "130403",
      "name": "丛台区",
      "parent": "130400",
      "children": null },
    {
      "id": "130404",
      "name": "复兴区",
      "parent": "130400",
      "children": null },
    {
      "id": "130406",
      "name": "峰峰矿区",
      "parent": "130400",
      "children": null },
    {
      "id": "130421",
      "name": "邯郸县",
      "parent": "130400",
      "children": null },
    {
      "id": "130423",
      "name": "临漳县",
      "parent": "130400",
      "children": null },
    {
      "id": "130424",
      "name": "成安县",
      "parent": "130400",
      "children": null },
    {
      "id": "130425",
      "name": "大名县",
      "parent": "130400",
      "children": null },
    {
      "id": "130426",
      "name": "涉县",
      "parent": "130400",
      "children": null },
    {
      "id": "130427",
      "name": "磁县",
      "parent": "130400",
      "children": null },
    {
      "id": "130428",
      "name": "肥乡县",
      "parent": "130400",
      "children": null },
    {
      "id": "130429",
      "name": "永年县",
      "parent": "130400",
      "children": null },
    {
      "id": "130430",
      "name": "邱县",
      "parent": "130400",
      "children": null },
    {
      "id": "130431",
      "name": "鸡泽县",
      "parent": "130400",
      "children": null },
    {
      "id": "130432",
      "name": "广平县",
      "parent": "130400",
      "children": null },
    {
      "id": "130433",
      "name": "馆陶县",
      "parent": "130400",
      "children": null },
    {
      "id": "130434",
      "name": "魏县",
      "parent": "130400",
      "children": null },
    {
      "id": "130435",
      "name": "曲周县",
      "parent": "130400",
      "children": null },
    {
      "id": "130481",
      "name": "武安市",
      "parent": "130400",
      "children": null },
    {
      "id": "130482",
      "name": "其它区",
      "parent": "130400",
      "children": null }] },

  {
    "id": "130500",
    "name": "邢台市",
    "parent": "130000",
    "children": [{
      "id": "130502",
      "name": "桥东区",
      "parent": "130500",
      "children": null },
    {
      "id": "130503",
      "name": "桥西区",
      "parent": "130500",
      "children": null },
    {
      "id": "130521",
      "name": "邢台县",
      "parent": "130500",
      "children": null },
    {
      "id": "130522",
      "name": "临城县",
      "parent": "130500",
      "children": null },
    {
      "id": "130523",
      "name": "内丘县",
      "parent": "130500",
      "children": null },
    {
      "id": "130524",
      "name": "柏乡县",
      "parent": "130500",
      "children": null },
    {
      "id": "130525",
      "name": "隆尧县",
      "parent": "130500",
      "children": null },
    {
      "id": "130526",
      "name": "任县",
      "parent": "130500",
      "children": null },
    {
      "id": "130527",
      "name": "南和县",
      "parent": "130500",
      "children": null },
    {
      "id": "130528",
      "name": "宁晋县",
      "parent": "130500",
      "children": null },
    {
      "id": "130529",
      "name": "巨鹿县",
      "parent": "130500",
      "children": null },
    {
      "id": "130530",
      "name": "新河县",
      "parent": "130500",
      "children": null },
    {
      "id": "130531",
      "name": "广宗县",
      "parent": "130500",
      "children": null },
    {
      "id": "130532",
      "name": "平乡县",
      "parent": "130500",
      "children": null },
    {
      "id": "130533",
      "name": "威县",
      "parent": "130500",
      "children": null },
    {
      "id": "130534",
      "name": "清河县",
      "parent": "130500",
      "children": null },
    {
      "id": "130535",
      "name": "临西县",
      "parent": "130500",
      "children": null },
    {
      "id": "130581",
      "name": "南宫市",
      "parent": "130500",
      "children": null },
    {
      "id": "130582",
      "name": "沙河市",
      "parent": "130500",
      "children": null },
    {
      "id": "130583",
      "name": "其它区",
      "parent": "130500",
      "children": null }] },

  {
    "id": "130600",
    "name": "保定市",
    "parent": "130000",
    "children": [{
      "id": "130602",
      "name": "新市区",
      "parent": "130600",
      "children": null },
    {
      "id": "130603",
      "name": "北市区",
      "parent": "130600",
      "children": null },
    {
      "id": "130604",
      "name": "南市区",
      "parent": "130600",
      "children": null },
    {
      "id": "130621",
      "name": "满城县",
      "parent": "130600",
      "children": null },
    {
      "id": "130622",
      "name": "清苑县",
      "parent": "130600",
      "children": null },
    {
      "id": "130623",
      "name": "涞水县",
      "parent": "130600",
      "children": null },
    {
      "id": "130624",
      "name": "阜平县",
      "parent": "130600",
      "children": null },
    {
      "id": "130625",
      "name": "徐水县",
      "parent": "130600",
      "children": null },
    {
      "id": "130626",
      "name": "定兴县",
      "parent": "130600",
      "children": null },
    {
      "id": "130627",
      "name": "唐县",
      "parent": "130600",
      "children": null },
    {
      "id": "130628",
      "name": "高阳县",
      "parent": "130600",
      "children": null },
    {
      "id": "130629",
      "name": "容城县",
      "parent": "130600",
      "children": null },
    {
      "id": "130630",
      "name": "涞源县",
      "parent": "130600",
      "children": null },
    {
      "id": "130631",
      "name": "望都县",
      "parent": "130600",
      "children": null },
    {
      "id": "130632",
      "name": "安新县",
      "parent": "130600",
      "children": null },
    {
      "id": "130633",
      "name": "易县",
      "parent": "130600",
      "children": null },
    {
      "id": "130634",
      "name": "曲阳县",
      "parent": "130600",
      "children": null },
    {
      "id": "130635",
      "name": "蠡县",
      "parent": "130600",
      "children": null },
    {
      "id": "130636",
      "name": "顺平县",
      "parent": "130600",
      "children": null },
    {
      "id": "130637",
      "name": "博野县",
      "parent": "130600",
      "children": null },
    {
      "id": "130638",
      "name": "雄县",
      "parent": "130600",
      "children": null },
    {
      "id": "130681",
      "name": "涿州市",
      "parent": "130600",
      "children": null },
    {
      "id": "130682",
      "name": "定州市",
      "parent": "130600",
      "children": null },
    {
      "id": "130683",
      "name": "安国市",
      "parent": "130600",
      "children": null },
    {
      "id": "130684",
      "name": "高碑店市",
      "parent": "130600",
      "children": null },
    {
      "id": "130698",
      "name": "高开区",
      "parent": "130600",
      "children": null },
    {
      "id": "130699",
      "name": "其它区",
      "parent": "130600",
      "children": null }] },

  {
    "id": "130700",
    "name": "张家口市",
    "parent": "130000",
    "children": [{
      "id": "130702",
      "name": "桥东区",
      "parent": "130700",
      "children": null },
    {
      "id": "130703",
      "name": "桥西区",
      "parent": "130700",
      "children": null },
    {
      "id": "130705",
      "name": "宣化区",
      "parent": "130700",
      "children": null },
    {
      "id": "130706",
      "name": "下花园区",
      "parent": "130700",
      "children": null },
    {
      "id": "130721",
      "name": "宣化县",
      "parent": "130700",
      "children": null },
    {
      "id": "130722",
      "name": "张北县",
      "parent": "130700",
      "children": null },
    {
      "id": "130723",
      "name": "康保县",
      "parent": "130700",
      "children": null },
    {
      "id": "130724",
      "name": "沽源县",
      "parent": "130700",
      "children": null },
    {
      "id": "130725",
      "name": "尚义县",
      "parent": "130700",
      "children": null },
    {
      "id": "130726",
      "name": "蔚县",
      "parent": "130700",
      "children": null },
    {
      "id": "130727",
      "name": "阳原县",
      "parent": "130700",
      "children": null },
    {
      "id": "130728",
      "name": "怀安县",
      "parent": "130700",
      "children": null },
    {
      "id": "130729",
      "name": "万全县",
      "parent": "130700",
      "children": null },
    {
      "id": "130730",
      "name": "怀来县",
      "parent": "130700",
      "children": null },
    {
      "id": "130731",
      "name": "涿鹿县",
      "parent": "130700",
      "children": null },
    {
      "id": "130732",
      "name": "赤城县",
      "parent": "130700",
      "children": null },
    {
      "id": "130733",
      "name": "崇礼县",
      "parent": "130700",
      "children": null },
    {
      "id": "130734",
      "name": "其它区",
      "parent": "130700",
      "children": null }] },

  {
    "id": "130800",
    "name": "承德市",
    "parent": "130000",
    "children": [{
      "id": "130802",
      "name": "双桥区",
      "parent": "130800",
      "children": null },
    {
      "id": "130803",
      "name": "双滦区",
      "parent": "130800",
      "children": null },
    {
      "id": "130804",
      "name": "鹰手营子矿区",
      "parent": "130800",
      "children": null },
    {
      "id": "130821",
      "name": "承德县",
      "parent": "130800",
      "children": null },
    {
      "id": "130822",
      "name": "兴隆县",
      "parent": "130800",
      "children": null },
    {
      "id": "130823",
      "name": "平泉县",
      "parent": "130800",
      "children": null },
    {
      "id": "130824",
      "name": "滦平县",
      "parent": "130800",
      "children": null },
    {
      "id": "130825",
      "name": "隆化县",
      "parent": "130800",
      "children": null },
    {
      "id": "130826",
      "name": "丰宁满族自治县",
      "parent": "130800",
      "children": null },
    {
      "id": "130827",
      "name": "宽城满族自治县",
      "parent": "130800",
      "children": null },
    {
      "id": "130828",
      "name": "围场满族蒙古族自治县",
      "parent": "130800",
      "children": null },
    {
      "id": "130829",
      "name": "其它区",
      "parent": "130800",
      "children": null }] },

  {
    "id": "130900",
    "name": "沧州市",
    "parent": "130000",
    "children": [{
      "id": "130902",
      "name": "新华区",
      "parent": "130900",
      "children": null },
    {
      "id": "130903",
      "name": "运河区",
      "parent": "130900",
      "children": null },
    {
      "id": "130921",
      "name": "沧县",
      "parent": "130900",
      "children": null },
    {
      "id": "130922",
      "name": "青县",
      "parent": "130900",
      "children": null },
    {
      "id": "130923",
      "name": "东光县",
      "parent": "130900",
      "children": null },
    {
      "id": "130924",
      "name": "海兴县",
      "parent": "130900",
      "children": null },
    {
      "id": "130925",
      "name": "盐山县",
      "parent": "130900",
      "children": null },
    {
      "id": "130926",
      "name": "肃宁县",
      "parent": "130900",
      "children": null },
    {
      "id": "130927",
      "name": "南皮县",
      "parent": "130900",
      "children": null },
    {
      "id": "130928",
      "name": "吴桥县",
      "parent": "130900",
      "children": null },
    {
      "id": "130929",
      "name": "献县",
      "parent": "130900",
      "children": null },
    {
      "id": "130930",
      "name": "孟村回族自治县",
      "parent": "130900",
      "children": null },
    {
      "id": "130981",
      "name": "泊头市",
      "parent": "130900",
      "children": null },
    {
      "id": "130982",
      "name": "任丘市",
      "parent": "130900",
      "children": null },
    {
      "id": "130983",
      "name": "黄骅市",
      "parent": "130900",
      "children": null },
    {
      "id": "130984",
      "name": "河间市",
      "parent": "130900",
      "children": null },
    {
      "id": "130985",
      "name": "其它区",
      "parent": "130900",
      "children": null }] },

  {
    "id": "131000",
    "name": "廊坊市",
    "parent": "130000",
    "children": [{
      "id": "131002",
      "name": "安次区",
      "parent": "131000",
      "children": null },
    {
      "id": "131003",
      "name": "广阳区",
      "parent": "131000",
      "children": null },
    {
      "id": "131022",
      "name": "固安县",
      "parent": "131000",
      "children": null },
    {
      "id": "131023",
      "name": "永清县",
      "parent": "131000",
      "children": null },
    {
      "id": "131024",
      "name": "香河县",
      "parent": "131000",
      "children": null },
    {
      "id": "131025",
      "name": "大城县",
      "parent": "131000",
      "children": null },
    {
      "id": "131026",
      "name": "文安县",
      "parent": "131000",
      "children": null },
    {
      "id": "131028",
      "name": "大厂回族自治县",
      "parent": "131000",
      "children": null },
    {
      "id": "131051",
      "name": "开发区",
      "parent": "131000",
      "children": null },
    {
      "id": "131052",
      "name": "燕郊经济技术开发区",
      "parent": "131000",
      "children": null },
    {
      "id": "131081",
      "name": "霸州市",
      "parent": "131000",
      "children": null },
    {
      "id": "131082",
      "name": "三河市",
      "parent": "131000",
      "children": null },
    {
      "id": "131083",
      "name": "其它区",
      "parent": "131000",
      "children": null }] },

  {
    "id": "131100",
    "name": "衡水市",
    "parent": "130000",
    "children": [{
      "id": "131102",
      "name": "桃城区",
      "parent": "131100",
      "children": null },
    {
      "id": "131121",
      "name": "枣强县",
      "parent": "131100",
      "children": null },
    {
      "id": "131122",
      "name": "武邑县",
      "parent": "131100",
      "children": null },
    {
      "id": "131123",
      "name": "武强县",
      "parent": "131100",
      "children": null },
    {
      "id": "131124",
      "name": "饶阳县",
      "parent": "131100",
      "children": null },
    {
      "id": "131125",
      "name": "安平县",
      "parent": "131100",
      "children": null },
    {
      "id": "131126",
      "name": "故城县",
      "parent": "131100",
      "children": null },
    {
      "id": "131127",
      "name": "景县",
      "parent": "131100",
      "children": null },
    {
      "id": "131128",
      "name": "阜城县",
      "parent": "131100",
      "children": null },
    {
      "id": "131181",
      "name": "冀州市",
      "parent": "131100",
      "children": null },
    {
      "id": "131182",
      "name": "深州市",
      "parent": "131100",
      "children": null },
    {
      "id": "131183",
      "name": "其它区",
      "parent": "131100",
      "children": null }] }] },


{
  "id": "140000",
  "name": "山西省",
  "children": [{
    "id": "140100",
    "name": "太原市",
    "parent": "140000",
    "children": [{
      "id": "140105",
      "name": "小店区",
      "parent": "140100",
      "children": null },
    {
      "id": "140106",
      "name": "迎泽区",
      "parent": "140100",
      "children": null },
    {
      "id": "140107",
      "name": "杏花岭区",
      "parent": "140100",
      "children": null },
    {
      "id": "140108",
      "name": "尖草坪区",
      "parent": "140100",
      "children": null },
    {
      "id": "140109",
      "name": "万柏林区",
      "parent": "140100",
      "children": null },
    {
      "id": "140110",
      "name": "晋源区",
      "parent": "140100",
      "children": null },
    {
      "id": "140121",
      "name": "清徐县",
      "parent": "140100",
      "children": null },
    {
      "id": "140122",
      "name": "阳曲县",
      "parent": "140100",
      "children": null },
    {
      "id": "140123",
      "name": "娄烦县",
      "parent": "140100",
      "children": null },
    {
      "id": "140181",
      "name": "古交市",
      "parent": "140100",
      "children": null },
    {
      "id": "140182",
      "name": "其它区",
      "parent": "140100",
      "children": null }] },

  {
    "id": "140200",
    "name": "大同市",
    "parent": "140000",
    "children": [{
      "id": "140202",
      "name": "城区",
      "parent": "140200",
      "children": null },
    {
      "id": "140203",
      "name": "矿区",
      "parent": "140200",
      "children": null },
    {
      "id": "140211",
      "name": "南郊区",
      "parent": "140200",
      "children": null },
    {
      "id": "140212",
      "name": "新荣区",
      "parent": "140200",
      "children": null },
    {
      "id": "140221",
      "name": "阳高县",
      "parent": "140200",
      "children": null },
    {
      "id": "140222",
      "name": "天镇县",
      "parent": "140200",
      "children": null },
    {
      "id": "140223",
      "name": "广灵县",
      "parent": "140200",
      "children": null },
    {
      "id": "140224",
      "name": "灵丘县",
      "parent": "140200",
      "children": null },
    {
      "id": "140225",
      "name": "浑源县",
      "parent": "140200",
      "children": null },
    {
      "id": "140226",
      "name": "左云县",
      "parent": "140200",
      "children": null },
    {
      "id": "140227",
      "name": "大同县",
      "parent": "140200",
      "children": null },
    {
      "id": "140228",
      "name": "其它区",
      "parent": "140200",
      "children": null }] },

  {
    "id": "140300",
    "name": "阳泉市",
    "parent": "140000",
    "children": [{
      "id": "140302",
      "name": "城区",
      "parent": "140300",
      "children": null },
    {
      "id": "140303",
      "name": "矿区",
      "parent": "140300",
      "children": null },
    {
      "id": "140311",
      "name": "郊区",
      "parent": "140300",
      "children": null },
    {
      "id": "140321",
      "name": "平定县",
      "parent": "140300",
      "children": null },
    {
      "id": "140322",
      "name": "盂县",
      "parent": "140300",
      "children": null },
    {
      "id": "140323",
      "name": "其它区",
      "parent": "140300",
      "children": null }] },

  {
    "id": "140400",
    "name": "长治市",
    "parent": "140000",
    "children": [{
      "id": "140421",
      "name": "长治县",
      "parent": "140400",
      "children": null },
    {
      "id": "140423",
      "name": "襄垣县",
      "parent": "140400",
      "children": null },
    {
      "id": "140424",
      "name": "屯留县",
      "parent": "140400",
      "children": null },
    {
      "id": "140425",
      "name": "平顺县",
      "parent": "140400",
      "children": null },
    {
      "id": "140426",
      "name": "黎城县",
      "parent": "140400",
      "children": null },
    {
      "id": "140427",
      "name": "壶关县",
      "parent": "140400",
      "children": null },
    {
      "id": "140428",
      "name": "长子县",
      "parent": "140400",
      "children": null },
    {
      "id": "140429",
      "name": "武乡县",
      "parent": "140400",
      "children": null },
    {
      "id": "140430",
      "name": "沁县",
      "parent": "140400",
      "children": null },
    {
      "id": "140431",
      "name": "沁源县",
      "parent": "140400",
      "children": null },
    {
      "id": "140481",
      "name": "潞城市",
      "parent": "140400",
      "children": null },
    {
      "id": "140482",
      "name": "城区",
      "parent": "140400",
      "children": null },
    {
      "id": "140483",
      "name": "郊区",
      "parent": "140400",
      "children": null },
    {
      "id": "140484",
      "name": "高新区",
      "parent": "140400",
      "children": null },
    {
      "id": "140485",
      "name": "其它区",
      "parent": "140400",
      "children": null }] },

  {
    "id": "140500",
    "name": "晋城市",
    "parent": "140000",
    "children": [{
      "id": "140502",
      "name": "城区",
      "parent": "140500",
      "children": null },
    {
      "id": "140521",
      "name": "沁水县",
      "parent": "140500",
      "children": null },
    {
      "id": "140522",
      "name": "阳城县",
      "parent": "140500",
      "children": null },
    {
      "id": "140524",
      "name": "陵川县",
      "parent": "140500",
      "children": null },
    {
      "id": "140525",
      "name": "泽州县",
      "parent": "140500",
      "children": null },
    {
      "id": "140581",
      "name": "高平市",
      "parent": "140500",
      "children": null },
    {
      "id": "140582",
      "name": "其它区",
      "parent": "140500",
      "children": null }] },

  {
    "id": "140600",
    "name": "朔州市",
    "parent": "140000",
    "children": [{
      "id": "140602",
      "name": "朔城区",
      "parent": "140600",
      "children": null },
    {
      "id": "140603",
      "name": "平鲁区",
      "parent": "140600",
      "children": null },
    {
      "id": "140621",
      "name": "山阴县",
      "parent": "140600",
      "children": null },
    {
      "id": "140622",
      "name": "应县",
      "parent": "140600",
      "children": null },
    {
      "id": "140623",
      "name": "右玉县",
      "parent": "140600",
      "children": null },
    {
      "id": "140624",
      "name": "怀仁县",
      "parent": "140600",
      "children": null },
    {
      "id": "140625",
      "name": "其它区",
      "parent": "140600",
      "children": null }] },

  {
    "id": "140700",
    "name": "晋中市",
    "parent": "140000",
    "children": [{
      "id": "140702",
      "name": "榆次区",
      "parent": "140700",
      "children": null },
    {
      "id": "140721",
      "name": "榆社县",
      "parent": "140700",
      "children": null },
    {
      "id": "140722",
      "name": "左权县",
      "parent": "140700",
      "children": null },
    {
      "id": "140723",
      "name": "和顺县",
      "parent": "140700",
      "children": null },
    {
      "id": "140724",
      "name": "昔阳县",
      "parent": "140700",
      "children": null },
    {
      "id": "140725",
      "name": "寿阳县",
      "parent": "140700",
      "children": null },
    {
      "id": "140726",
      "name": "太谷县",
      "parent": "140700",
      "children": null },
    {
      "id": "140727",
      "name": "祁县",
      "parent": "140700",
      "children": null },
    {
      "id": "140728",
      "name": "平遥县",
      "parent": "140700",
      "children": null },
    {
      "id": "140729",
      "name": "灵石县",
      "parent": "140700",
      "children": null },
    {
      "id": "140781",
      "name": "介休市",
      "parent": "140700",
      "children": null },
    {
      "id": "140782",
      "name": "其它区",
      "parent": "140700",
      "children": null }] },

  {
    "id": "140800",
    "name": "运城市",
    "parent": "140000",
    "children": [{
      "id": "140802",
      "name": "盐湖区",
      "parent": "140800",
      "children": null },
    {
      "id": "140821",
      "name": "临猗县",
      "parent": "140800",
      "children": null },
    {
      "id": "140822",
      "name": "万荣县",
      "parent": "140800",
      "children": null },
    {
      "id": "140823",
      "name": "闻喜县",
      "parent": "140800",
      "children": null },
    {
      "id": "140824",
      "name": "稷山县",
      "parent": "140800",
      "children": null },
    {
      "id": "140825",
      "name": "新绛县",
      "parent": "140800",
      "children": null },
    {
      "id": "140826",
      "name": "绛县",
      "parent": "140800",
      "children": null },
    {
      "id": "140827",
      "name": "垣曲县",
      "parent": "140800",
      "children": null },
    {
      "id": "140828",
      "name": "夏县",
      "parent": "140800",
      "children": null },
    {
      "id": "140829",
      "name": "平陆县",
      "parent": "140800",
      "children": null },
    {
      "id": "140830",
      "name": "芮城县",
      "parent": "140800",
      "children": null },
    {
      "id": "140881",
      "name": "永济市",
      "parent": "140800",
      "children": null },
    {
      "id": "140882",
      "name": "河津市",
      "parent": "140800",
      "children": null },
    {
      "id": "140883",
      "name": "其它区",
      "parent": "140800",
      "children": null }] },

  {
    "id": "140900",
    "name": "忻州市",
    "parent": "140000",
    "children": [{
      "id": "140902",
      "name": "忻府区",
      "parent": "140900",
      "children": null },
    {
      "id": "140921",
      "name": "定襄县",
      "parent": "140900",
      "children": null },
    {
      "id": "140922",
      "name": "五台县",
      "parent": "140900",
      "children": null },
    {
      "id": "140923",
      "name": "代县",
      "parent": "140900",
      "children": null },
    {
      "id": "140924",
      "name": "繁峙县",
      "parent": "140900",
      "children": null },
    {
      "id": "140925",
      "name": "宁武县",
      "parent": "140900",
      "children": null },
    {
      "id": "140926",
      "name": "静乐县",
      "parent": "140900",
      "children": null },
    {
      "id": "140927",
      "name": "神池县",
      "parent": "140900",
      "children": null },
    {
      "id": "140928",
      "name": "五寨县",
      "parent": "140900",
      "children": null },
    {
      "id": "140929",
      "name": "岢岚县",
      "parent": "140900",
      "children": null },
    {
      "id": "140930",
      "name": "河曲县",
      "parent": "140900",
      "children": null },
    {
      "id": "140931",
      "name": "保德县",
      "parent": "140900",
      "children": null },
    {
      "id": "140932",
      "name": "偏关县",
      "parent": "140900",
      "children": null },
    {
      "id": "140981",
      "name": "原平市",
      "parent": "140900",
      "children": null },
    {
      "id": "140982",
      "name": "其它区",
      "parent": "140900",
      "children": null }] },

  {
    "id": "141000",
    "name": "临汾市",
    "parent": "140000",
    "children": [{
      "id": "141002",
      "name": "尧都区",
      "parent": "141000",
      "children": null },
    {
      "id": "141021",
      "name": "曲沃县",
      "parent": "141000",
      "children": null },
    {
      "id": "141022",
      "name": "翼城县",
      "parent": "141000",
      "children": null },
    {
      "id": "141023",
      "name": "襄汾县",
      "parent": "141000",
      "children": null },
    {
      "id": "141024",
      "name": "洪洞县",
      "parent": "141000",
      "children": null },
    {
      "id": "141025",
      "name": "古县",
      "parent": "141000",
      "children": null },
    {
      "id": "141026",
      "name": "安泽县",
      "parent": "141000",
      "children": null },
    {
      "id": "141027",
      "name": "浮山县",
      "parent": "141000",
      "children": null },
    {
      "id": "141028",
      "name": "吉县",
      "parent": "141000",
      "children": null },
    {
      "id": "141029",
      "name": "乡宁县",
      "parent": "141000",
      "children": null },
    {
      "id": "141030",
      "name": "大宁县",
      "parent": "141000",
      "children": null },
    {
      "id": "141031",
      "name": "隰县",
      "parent": "141000",
      "children": null },
    {
      "id": "141032",
      "name": "永和县",
      "parent": "141000",
      "children": null },
    {
      "id": "141033",
      "name": "蒲县",
      "parent": "141000",
      "children": null },
    {
      "id": "141034",
      "name": "汾西县",
      "parent": "141000",
      "children": null },
    {
      "id": "141081",
      "name": "侯马市",
      "parent": "141000",
      "children": null },
    {
      "id": "141082",
      "name": "霍州市",
      "parent": "141000",
      "children": null },
    {
      "id": "141083",
      "name": "其它区",
      "parent": "141000",
      "children": null }] },

  {
    "id": "141100",
    "name": "吕梁市",
    "parent": "140000",
    "children": [{
      "id": "141102",
      "name": "离石区",
      "parent": "141100",
      "children": null },
    {
      "id": "141121",
      "name": "文水县",
      "parent": "141100",
      "children": null },
    {
      "id": "141122",
      "name": "交城县",
      "parent": "141100",
      "children": null },
    {
      "id": "141123",
      "name": "兴县",
      "parent": "141100",
      "children": null },
    {
      "id": "141124",
      "name": "临县",
      "parent": "141100",
      "children": null },
    {
      "id": "141125",
      "name": "柳林县",
      "parent": "141100",
      "children": null },
    {
      "id": "141126",
      "name": "石楼县",
      "parent": "141100",
      "children": null },
    {
      "id": "141127",
      "name": "岚县",
      "parent": "141100",
      "children": null },
    {
      "id": "141128",
      "name": "方山县",
      "parent": "141100",
      "children": null },
    {
      "id": "141129",
      "name": "中阳县",
      "parent": "141100",
      "children": null },
    {
      "id": "141130",
      "name": "交口县",
      "parent": "141100",
      "children": null },
    {
      "id": "141181",
      "name": "孝义市",
      "parent": "141100",
      "children": null },
    {
      "id": "141182",
      "name": "汾阳市",
      "parent": "141100",
      "children": null },
    {
      "id": "141183",
      "name": "其它区",
      "parent": "141100",
      "children": null }] }] },


{
  "id": "150000",
  "name": "内蒙古自治区",
  "children": [{
    "id": "150100",
    "name": "呼和浩特市",
    "parent": "150000",
    "children": [{
      "id": "150102",
      "name": "新城区",
      "parent": "150100",
      "children": null },
    {
      "id": "150103",
      "name": "回民区",
      "parent": "150100",
      "children": null },
    {
      "id": "150104",
      "name": "玉泉区",
      "parent": "150100",
      "children": null },
    {
      "id": "150105",
      "name": "赛罕区",
      "parent": "150100",
      "children": null },
    {
      "id": "150121",
      "name": "土默特左旗",
      "parent": "150100",
      "children": null },
    {
      "id": "150122",
      "name": "托克托县",
      "parent": "150100",
      "children": null },
    {
      "id": "150123",
      "name": "和林格尔县",
      "parent": "150100",
      "children": null },
    {
      "id": "150124",
      "name": "清水河县",
      "parent": "150100",
      "children": null },
    {
      "id": "150125",
      "name": "武川县",
      "parent": "150100",
      "children": null },
    {
      "id": "150126",
      "name": "其它区",
      "parent": "150100",
      "children": null }] },

  {
    "id": "150200",
    "name": "包头市",
    "parent": "150000",
    "children": [{
      "id": "150202",
      "name": "东河区",
      "parent": "150200",
      "children": null },
    {
      "id": "150203",
      "name": "昆都仑区",
      "parent": "150200",
      "children": null },
    {
      "id": "150204",
      "name": "青山区",
      "parent": "150200",
      "children": null },
    {
      "id": "150205",
      "name": "石拐区",
      "parent": "150200",
      "children": null },
    {
      "id": "150206",
      "name": "白云鄂博矿区",
      "parent": "150200",
      "children": null },
    {
      "id": "150207",
      "name": "九原区",
      "parent": "150200",
      "children": null },
    {
      "id": "150221",
      "name": "土默特右旗",
      "parent": "150200",
      "children": null },
    {
      "id": "150222",
      "name": "固阳县",
      "parent": "150200",
      "children": null },
    {
      "id": "150223",
      "name": "达尔罕茂明安联合旗",
      "parent": "150200",
      "children": null },
    {
      "id": "150224",
      "name": "其它区",
      "parent": "150200",
      "children": null }] },

  {
    "id": "150300",
    "name": "乌海市",
    "parent": "150000",
    "children": [{
      "id": "150302",
      "name": "海勃湾区",
      "parent": "150300",
      "children": null },
    {
      "id": "150303",
      "name": "海南区",
      "parent": "150300",
      "children": null },
    {
      "id": "150304",
      "name": "乌达区",
      "parent": "150300",
      "children": null },
    {
      "id": "150305",
      "name": "其它区",
      "parent": "150300",
      "children": null }] },

  {
    "id": "150400",
    "name": "赤峰市",
    "parent": "150000",
    "children": [{
      "id": "150402",
      "name": "红山区",
      "parent": "150400",
      "children": null },
    {
      "id": "150403",
      "name": "元宝山区",
      "parent": "150400",
      "children": null },
    {
      "id": "150404",
      "name": "松山区",
      "parent": "150400",
      "children": null },
    {
      "id": "150421",
      "name": "阿鲁科尔沁旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150422",
      "name": "巴林左旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150423",
      "name": "巴林右旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150424",
      "name": "林西县",
      "parent": "150400",
      "children": null },
    {
      "id": "150425",
      "name": "克什克腾旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150426",
      "name": "翁牛特旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150428",
      "name": "喀喇沁旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150429",
      "name": "宁城县",
      "parent": "150400",
      "children": null },
    {
      "id": "150430",
      "name": "敖汉旗",
      "parent": "150400",
      "children": null },
    {
      "id": "150431",
      "name": "其它区",
      "parent": "150400",
      "children": null }] },

  {
    "id": "150500",
    "name": "通辽市",
    "parent": "150000",
    "children": [{
      "id": "150502",
      "name": "科尔沁区",
      "parent": "150500",
      "children": null },
    {
      "id": "150521",
      "name": "科尔沁左翼中旗",
      "parent": "150500",
      "children": null },
    {
      "id": "150522",
      "name": "科尔沁左翼后旗",
      "parent": "150500",
      "children": null },
    {
      "id": "150523",
      "name": "开鲁县",
      "parent": "150500",
      "children": null },
    {
      "id": "150524",
      "name": "库伦旗",
      "parent": "150500",
      "children": null },
    {
      "id": "150525",
      "name": "奈曼旗",
      "parent": "150500",
      "children": null },
    {
      "id": "150526",
      "name": "扎鲁特旗",
      "parent": "150500",
      "children": null },
    {
      "id": "150581",
      "name": "霍林郭勒市",
      "parent": "150500",
      "children": null },
    {
      "id": "150582",
      "name": "其它区",
      "parent": "150500",
      "children": null }] },

  {
    "id": "150600",
    "name": "鄂尔多斯市",
    "parent": "150000",
    "children": [{
      "id": "150602",
      "name": "东胜区",
      "parent": "150600",
      "children": null },
    {
      "id": "150621",
      "name": "达拉特旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150622",
      "name": "准格尔旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150623",
      "name": "鄂托克前旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150624",
      "name": "鄂托克旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150625",
      "name": "杭锦旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150626",
      "name": "乌审旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150627",
      "name": "伊金霍洛旗",
      "parent": "150600",
      "children": null },
    {
      "id": "150628",
      "name": "其它区",
      "parent": "150600",
      "children": null }] },

  {
    "id": "150700",
    "name": "呼伦贝尔市",
    "parent": "150000",
    "children": [{
      "id": "150702",
      "name": "海拉尔区",
      "parent": "150700",
      "children": null },
    {
      "id": "150703",
      "name": "扎赉诺尔区",
      "parent": "150700",
      "children": null },
    {
      "id": "150721",
      "name": "阿荣旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150722",
      "name": "莫力达瓦达斡尔族自治旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150723",
      "name": "鄂伦春自治旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150724",
      "name": "鄂温克族自治旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150725",
      "name": "陈巴尔虎旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150726",
      "name": "新巴尔虎左旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150727",
      "name": "新巴尔虎右旗",
      "parent": "150700",
      "children": null },
    {
      "id": "150781",
      "name": "满洲里市",
      "parent": "150700",
      "children": null },
    {
      "id": "150782",
      "name": "牙克石市",
      "parent": "150700",
      "children": null },
    {
      "id": "150783",
      "name": "扎兰屯市",
      "parent": "150700",
      "children": null },
    {
      "id": "150784",
      "name": "额尔古纳市",
      "parent": "150700",
      "children": null },
    {
      "id": "150785",
      "name": "根河市",
      "parent": "150700",
      "children": null },
    {
      "id": "150786",
      "name": "其它区",
      "parent": "150700",
      "children": null }] },

  {
    "id": "150800",
    "name": "巴彦淖尔市",
    "parent": "150000",
    "children": [{
      "id": "150802",
      "name": "临河区",
      "parent": "150800",
      "children": null },
    {
      "id": "150821",
      "name": "五原县",
      "parent": "150800",
      "children": null },
    {
      "id": "150822",
      "name": "磴口县",
      "parent": "150800",
      "children": null },
    {
      "id": "150823",
      "name": "乌拉特前旗",
      "parent": "150800",
      "children": null },
    {
      "id": "150824",
      "name": "乌拉特中旗",
      "parent": "150800",
      "children": null },
    {
      "id": "150825",
      "name": "乌拉特后旗",
      "parent": "150800",
      "children": null },
    {
      "id": "150826",
      "name": "杭锦后旗",
      "parent": "150800",
      "children": null },
    {
      "id": "150827",
      "name": "其它区",
      "parent": "150800",
      "children": null }] },

  {
    "id": "150900",
    "name": "乌兰察布市",
    "parent": "150000",
    "children": [{
      "id": "150902",
      "name": "集宁区",
      "parent": "150900",
      "children": null },
    {
      "id": "150921",
      "name": "卓资县",
      "parent": "150900",
      "children": null },
    {
      "id": "150922",
      "name": "化德县",
      "parent": "150900",
      "children": null },
    {
      "id": "150923",
      "name": "商都县",
      "parent": "150900",
      "children": null },
    {
      "id": "150924",
      "name": "兴和县",
      "parent": "150900",
      "children": null },
    {
      "id": "150925",
      "name": "凉城县",
      "parent": "150900",
      "children": null },
    {
      "id": "150926",
      "name": "察哈尔右翼前旗",
      "parent": "150900",
      "children": null },
    {
      "id": "150927",
      "name": "察哈尔右翼中旗",
      "parent": "150900",
      "children": null },
    {
      "id": "150928",
      "name": "察哈尔右翼后旗",
      "parent": "150900",
      "children": null },
    {
      "id": "150929",
      "name": "四子王旗",
      "parent": "150900",
      "children": null },
    {
      "id": "150981",
      "name": "丰镇市",
      "parent": "150900",
      "children": null },
    {
      "id": "150982",
      "name": "其它区",
      "parent": "150900",
      "children": null }] },

  {
    "id": "152200",
    "name": "兴安盟",
    "parent": "150000",
    "children": [{
      "id": "152201",
      "name": "乌兰浩特市",
      "parent": "152200",
      "children": null },
    {
      "id": "152202",
      "name": "阿尔山市",
      "parent": "152200",
      "children": null },
    {
      "id": "152221",
      "name": "科尔沁右翼前旗",
      "parent": "152200",
      "children": null },
    {
      "id": "152222",
      "name": "科尔沁右翼中旗",
      "parent": "152200",
      "children": null },
    {
      "id": "152223",
      "name": "扎赉特旗",
      "parent": "152200",
      "children": null },
    {
      "id": "152224",
      "name": "突泉县",
      "parent": "152200",
      "children": null },
    {
      "id": "152225",
      "name": "其它区",
      "parent": "152200",
      "children": null }] },

  {
    "id": "152500",
    "name": "锡林郭勒盟",
    "parent": "150000",
    "children": [{
      "id": "152501",
      "name": "二连浩特市",
      "parent": "152500",
      "children": null },
    {
      "id": "152502",
      "name": "锡林浩特市",
      "parent": "152500",
      "children": null },
    {
      "id": "152522",
      "name": "阿巴嘎旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152523",
      "name": "苏尼特左旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152524",
      "name": "苏尼特右旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152525",
      "name": "东乌珠穆沁旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152526",
      "name": "西乌珠穆沁旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152527",
      "name": "太仆寺旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152528",
      "name": "镶黄旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152529",
      "name": "正镶白旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152530",
      "name": "正蓝旗",
      "parent": "152500",
      "children": null },
    {
      "id": "152531",
      "name": "多伦县",
      "parent": "152500",
      "children": null },
    {
      "id": "152532",
      "name": "其它区",
      "parent": "152500",
      "children": null }] },

  {
    "id": "152900",
    "name": "阿拉善盟",
    "parent": "150000",
    "children": [{
      "id": "152921",
      "name": "阿拉善左旗",
      "parent": "152900",
      "children": null },
    {
      "id": "152922",
      "name": "阿拉善右旗",
      "parent": "152900",
      "children": null },
    {
      "id": "152923",
      "name": "额济纳旗",
      "parent": "152900",
      "children": null },
    {
      "id": "152924",
      "name": "其它区",
      "parent": "152900",
      "children": null }] }] },


{
  "id": "210000",
  "name": "辽宁省",
  "children": [{
    "id": "210100",
    "name": "沈阳市",
    "parent": "210000",
    "children": [{
      "id": "210102",
      "name": "和平区",
      "parent": "210100",
      "children": null },
    {
      "id": "210103",
      "name": "沈河区",
      "parent": "210100",
      "children": null },
    {
      "id": "210104",
      "name": "大东区",
      "parent": "210100",
      "children": null },
    {
      "id": "210105",
      "name": "皇姑区",
      "parent": "210100",
      "children": null },
    {
      "id": "210106",
      "name": "铁西区",
      "parent": "210100",
      "children": null },
    {
      "id": "210111",
      "name": "苏家屯区",
      "parent": "210100",
      "children": null },
    {
      "id": "210112",
      "name": "浑南区",
      "parent": "210100",
      "children": null },
    {
      "id": "210113",
      "name": "新城子区",
      "parent": "210100",
      "children": null },
    {
      "id": "210114",
      "name": "于洪区",
      "parent": "210100",
      "children": null },
    {
      "id": "210122",
      "name": "辽中县",
      "parent": "210100",
      "children": null },
    {
      "id": "210123",
      "name": "康平县",
      "parent": "210100",
      "children": null },
    {
      "id": "210124",
      "name": "法库县",
      "parent": "210100",
      "children": null },
    {
      "id": "210181",
      "name": "新民市",
      "parent": "210100",
      "children": null },
    {
      "id": "210182",
      "name": "浑南新区",
      "parent": "210100",
      "children": null },
    {
      "id": "210183",
      "name": "张士开发区",
      "parent": "210100",
      "children": null },
    {
      "id": "210184",
      "name": "沈北新区",
      "parent": "210100",
      "children": null },
    {
      "id": "210185",
      "name": "其它区",
      "parent": "210100",
      "children": null }] },

  {
    "id": "210200",
    "name": "大连市",
    "parent": "210000",
    "children": [{
      "id": "210202",
      "name": "中山区",
      "parent": "210200",
      "children": null },
    {
      "id": "210203",
      "name": "西岗区",
      "parent": "210200",
      "children": null },
    {
      "id": "210204",
      "name": "沙河口区",
      "parent": "210200",
      "children": null },
    {
      "id": "210211",
      "name": "甘井子区",
      "parent": "210200",
      "children": null },
    {
      "id": "210212",
      "name": "旅顺口区",
      "parent": "210200",
      "children": null },
    {
      "id": "210213",
      "name": "金州区",
      "parent": "210200",
      "children": null },
    {
      "id": "210224",
      "name": "长海县",
      "parent": "210200",
      "children": null },
    {
      "id": "210251",
      "name": "开发区",
      "parent": "210200",
      "children": null },
    {
      "id": "210281",
      "name": "瓦房店市",
      "parent": "210200",
      "children": null },
    {
      "id": "210282",
      "name": "普兰店市",
      "parent": "210200",
      "children": null },
    {
      "id": "210283",
      "name": "庄河市",
      "parent": "210200",
      "children": null },
    {
      "id": "210297",
      "name": "岭前区",
      "parent": "210200",
      "children": null },
    {
      "id": "210298",
      "name": "其它区",
      "parent": "210200",
      "children": null }] },

  {
    "id": "210300",
    "name": "鞍山市",
    "parent": "210000",
    "children": [{
      "id": "210302",
      "name": "铁东区",
      "parent": "210300",
      "children": null },
    {
      "id": "210303",
      "name": "铁西区",
      "parent": "210300",
      "children": null },
    {
      "id": "210304",
      "name": "立山区",
      "parent": "210300",
      "children": null },
    {
      "id": "210311",
      "name": "千山区",
      "parent": "210300",
      "children": null },
    {
      "id": "210321",
      "name": "台安县",
      "parent": "210300",
      "children": null },
    {
      "id": "210323",
      "name": "岫岩满族自治县",
      "parent": "210300",
      "children": null },
    {
      "id": "210351",
      "name": "高新区",
      "parent": "210300",
      "children": null },
    {
      "id": "210381",
      "name": "海城市",
      "parent": "210300",
      "children": null },
    {
      "id": "210382",
      "name": "其它区",
      "parent": "210300",
      "children": null }] },

  {
    "id": "210400",
    "name": "抚顺市",
    "parent": "210000",
    "children": [{
      "id": "210402",
      "name": "新抚区",
      "parent": "210400",
      "children": null },
    {
      "id": "210403",
      "name": "东洲区",
      "parent": "210400",
      "children": null },
    {
      "id": "210404",
      "name": "望花区",
      "parent": "210400",
      "children": null },
    {
      "id": "210411",
      "name": "顺城区",
      "parent": "210400",
      "children": null },
    {
      "id": "210421",
      "name": "抚顺县",
      "parent": "210400",
      "children": null },
    {
      "id": "210422",
      "name": "新宾满族自治县",
      "parent": "210400",
      "children": null },
    {
      "id": "210423",
      "name": "清原满族自治县",
      "parent": "210400",
      "children": null },
    {
      "id": "210424",
      "name": "其它区",
      "parent": "210400",
      "children": null }] },

  {
    "id": "210500",
    "name": "本溪市",
    "parent": "210000",
    "children": [{
      "id": "210502",
      "name": "平山区",
      "parent": "210500",
      "children": null },
    {
      "id": "210503",
      "name": "溪湖区",
      "parent": "210500",
      "children": null },
    {
      "id": "210504",
      "name": "明山区",
      "parent": "210500",
      "children": null },
    {
      "id": "210505",
      "name": "南芬区",
      "parent": "210500",
      "children": null },
    {
      "id": "210521",
      "name": "本溪满族自治县",
      "parent": "210500",
      "children": null },
    {
      "id": "210522",
      "name": "桓仁满族自治县",
      "parent": "210500",
      "children": null },
    {
      "id": "210523",
      "name": "其它区",
      "parent": "210500",
      "children": null }] },

  {
    "id": "210600",
    "name": "丹东市",
    "parent": "210000",
    "children": [{
      "id": "210602",
      "name": "元宝区",
      "parent": "210600",
      "children": null },
    {
      "id": "210603",
      "name": "振兴区",
      "parent": "210600",
      "children": null },
    {
      "id": "210604",
      "name": "振安区",
      "parent": "210600",
      "children": null },
    {
      "id": "210624",
      "name": "宽甸满族自治县",
      "parent": "210600",
      "children": null },
    {
      "id": "210681",
      "name": "东港市",
      "parent": "210600",
      "children": null },
    {
      "id": "210682",
      "name": "凤城市",
      "parent": "210600",
      "children": null },
    {
      "id": "210683",
      "name": "其它区",
      "parent": "210600",
      "children": null }] },

  {
    "id": "210700",
    "name": "锦州市",
    "parent": "210000",
    "children": [{
      "id": "210702",
      "name": "古塔区",
      "parent": "210700",
      "children": null },
    {
      "id": "210703",
      "name": "凌河区",
      "parent": "210700",
      "children": null },
    {
      "id": "210711",
      "name": "太和区",
      "parent": "210700",
      "children": null },
    {
      "id": "210726",
      "name": "黑山县",
      "parent": "210700",
      "children": null },
    {
      "id": "210727",
      "name": "义县",
      "parent": "210700",
      "children": null },
    {
      "id": "210781",
      "name": "凌海市",
      "parent": "210700",
      "children": null },
    {
      "id": "210782",
      "name": "北镇市",
      "parent": "210700",
      "children": null },
    {
      "id": "210783",
      "name": "其它区",
      "parent": "210700",
      "children": null }] },

  {
    "id": "210800",
    "name": "营口市",
    "parent": "210000",
    "children": [{
      "id": "210802",
      "name": "站前区",
      "parent": "210800",
      "children": null },
    {
      "id": "210803",
      "name": "西市区",
      "parent": "210800",
      "children": null },
    {
      "id": "210804",
      "name": "鲅鱼圈区",
      "parent": "210800",
      "children": null },
    {
      "id": "210811",
      "name": "老边区",
      "parent": "210800",
      "children": null },
    {
      "id": "210881",
      "name": "盖州市",
      "parent": "210800",
      "children": null },
    {
      "id": "210882",
      "name": "大石桥市",
      "parent": "210800",
      "children": null },
    {
      "id": "210883",
      "name": "其它区",
      "parent": "210800",
      "children": null }] },

  {
    "id": "210900",
    "name": "阜新市",
    "parent": "210000",
    "children": [{
      "id": "210902",
      "name": "海州区",
      "parent": "210900",
      "children": null },
    {
      "id": "210903",
      "name": "新邱区",
      "parent": "210900",
      "children": null },
    {
      "id": "210904",
      "name": "太平区",
      "parent": "210900",
      "children": null },
    {
      "id": "210905",
      "name": "清河门区",
      "parent": "210900",
      "children": null },
    {
      "id": "210911",
      "name": "细河区",
      "parent": "210900",
      "children": null },
    {
      "id": "210921",
      "name": "阜新蒙古族自治县",
      "parent": "210900",
      "children": null },
    {
      "id": "210922",
      "name": "彰武县",
      "parent": "210900",
      "children": null },
    {
      "id": "210923",
      "name": "其它区",
      "parent": "210900",
      "children": null }] },

  {
    "id": "211000",
    "name": "辽阳市",
    "parent": "210000",
    "children": [{
      "id": "211002",
      "name": "白塔区",
      "parent": "211000",
      "children": null },
    {
      "id": "211003",
      "name": "文圣区",
      "parent": "211000",
      "children": null },
    {
      "id": "211004",
      "name": "宏伟区",
      "parent": "211000",
      "children": null },
    {
      "id": "211005",
      "name": "弓长岭区",
      "parent": "211000",
      "children": null },
    {
      "id": "211011",
      "name": "太子河区",
      "parent": "211000",
      "children": null },
    {
      "id": "211021",
      "name": "辽阳县",
      "parent": "211000",
      "children": null },
    {
      "id": "211081",
      "name": "灯塔市",
      "parent": "211000",
      "children": null },
    {
      "id": "211082",
      "name": "其它区",
      "parent": "211000",
      "children": null }] },

  {
    "id": "211100",
    "name": "盘锦市",
    "parent": "210000",
    "children": [{
      "id": "211102",
      "name": "双台子区",
      "parent": "211100",
      "children": null },
    {
      "id": "211103",
      "name": "兴隆台区",
      "parent": "211100",
      "children": null },
    {
      "id": "211121",
      "name": "大洼县",
      "parent": "211100",
      "children": null },
    {
      "id": "211122",
      "name": "盘山县",
      "parent": "211100",
      "children": null },
    {
      "id": "211123",
      "name": "其它区",
      "parent": "211100",
      "children": null }] },

  {
    "id": "211200",
    "name": "铁岭市",
    "parent": "210000",
    "children": [{
      "id": "211202",
      "name": "银州区",
      "parent": "211200",
      "children": null },
    {
      "id": "211204",
      "name": "清河区",
      "parent": "211200",
      "children": null },
    {
      "id": "211221",
      "name": "铁岭县",
      "parent": "211200",
      "children": null },
    {
      "id": "211223",
      "name": "西丰县",
      "parent": "211200",
      "children": null },
    {
      "id": "211224",
      "name": "昌图县",
      "parent": "211200",
      "children": null },
    {
      "id": "211281",
      "name": "调兵山市",
      "parent": "211200",
      "children": null },
    {
      "id": "211282",
      "name": "开原市",
      "parent": "211200",
      "children": null },
    {
      "id": "211283",
      "name": "其它区",
      "parent": "211200",
      "children": null }] },

  {
    "id": "211300",
    "name": "朝阳市",
    "parent": "210000",
    "children": [{
      "id": "211302",
      "name": "双塔区",
      "parent": "211300",
      "children": null },
    {
      "id": "211303",
      "name": "龙城区",
      "parent": "211300",
      "children": null },
    {
      "id": "211321",
      "name": "朝阳县",
      "parent": "211300",
      "children": null },
    {
      "id": "211322",
      "name": "建平县",
      "parent": "211300",
      "children": null },
    {
      "id": "211324",
      "name": "喀喇沁左翼蒙古族自治县",
      "parent": "211300",
      "children": null },
    {
      "id": "211381",
      "name": "北票市",
      "parent": "211300",
      "children": null },
    {
      "id": "211382",
      "name": "凌源市",
      "parent": "211300",
      "children": null },
    {
      "id": "211383",
      "name": "其它区",
      "parent": "211300",
      "children": null }] },

  {
    "id": "211400",
    "name": "葫芦岛市",
    "parent": "210000",
    "children": [{
      "id": "211402",
      "name": "连山区",
      "parent": "211400",
      "children": null },
    {
      "id": "211403",
      "name": "龙港区",
      "parent": "211400",
      "children": null },
    {
      "id": "211404",
      "name": "南票区",
      "parent": "211400",
      "children": null },
    {
      "id": "211421",
      "name": "绥中县",
      "parent": "211400",
      "children": null },
    {
      "id": "211422",
      "name": "建昌县",
      "parent": "211400",
      "children": null },
    {
      "id": "211481",
      "name": "兴城市",
      "parent": "211400",
      "children": null },
    {
      "id": "211482",
      "name": "其它区",
      "parent": "211400",
      "children": null }] }] },


{
  "id": "220000",
  "name": "吉林省",
  "children": [{
    "id": "220100",
    "name": "长春市",
    "parent": "220000",
    "children": [{
      "id": "220102",
      "name": "南关区",
      "parent": "220100",
      "children": null },
    {
      "id": "220103",
      "name": "宽城区",
      "parent": "220100",
      "children": null },
    {
      "id": "220104",
      "name": "朝阳区",
      "parent": "220100",
      "children": null },
    {
      "id": "220105",
      "name": "二道区",
      "parent": "220100",
      "children": null },
    {
      "id": "220106",
      "name": "绿园区",
      "parent": "220100",
      "children": null },
    {
      "id": "220112",
      "name": "双阳区",
      "parent": "220100",
      "children": null },
    {
      "id": "220122",
      "name": "农安县",
      "parent": "220100",
      "children": null },
    {
      "id": "220181",
      "name": "九台区",
      "parent": "220100",
      "children": null },
    {
      "id": "220182",
      "name": "榆树市",
      "parent": "220100",
      "children": null },
    {
      "id": "220183",
      "name": "德惠市",
      "parent": "220100",
      "children": null },
    {
      "id": "220184",
      "name": "高新技术产业开发区",
      "parent": "220100",
      "children": null },
    {
      "id": "220185",
      "name": "汽车产业开发区",
      "parent": "220100",
      "children": null },
    {
      "id": "220186",
      "name": "经济技术开发区",
      "parent": "220100",
      "children": null },
    {
      "id": "220187",
      "name": "净月旅游开发区",
      "parent": "220100",
      "children": null },
    {
      "id": "220188",
      "name": "其它区",
      "parent": "220100",
      "children": null }] },

  {
    "id": "220200",
    "name": "吉林市",
    "parent": "220000",
    "children": [{
      "id": "220202",
      "name": "昌邑区",
      "parent": "220200",
      "children": null },
    {
      "id": "220203",
      "name": "龙潭区",
      "parent": "220200",
      "children": null },
    {
      "id": "220204",
      "name": "船营区",
      "parent": "220200",
      "children": null },
    {
      "id": "220211",
      "name": "丰满区",
      "parent": "220200",
      "children": null },
    {
      "id": "220221",
      "name": "永吉县",
      "parent": "220200",
      "children": null },
    {
      "id": "220281",
      "name": "蛟河市",
      "parent": "220200",
      "children": null },
    {
      "id": "220282",
      "name": "桦甸市",
      "parent": "220200",
      "children": null },
    {
      "id": "220283",
      "name": "舒兰市",
      "parent": "220200",
      "children": null },
    {
      "id": "220284",
      "name": "磐石市",
      "parent": "220200",
      "children": null },
    {
      "id": "220285",
      "name": "其它区",
      "parent": "220200",
      "children": null }] },

  {
    "id": "220300",
    "name": "四平市",
    "parent": "220000",
    "children": [{
      "id": "220302",
      "name": "铁西区",
      "parent": "220300",
      "children": null },
    {
      "id": "220303",
      "name": "铁东区",
      "parent": "220300",
      "children": null },
    {
      "id": "220322",
      "name": "梨树县",
      "parent": "220300",
      "children": null },
    {
      "id": "220323",
      "name": "伊通满族自治县",
      "parent": "220300",
      "children": null },
    {
      "id": "220381",
      "name": "公主岭市",
      "parent": "220300",
      "children": null },
    {
      "id": "220382",
      "name": "双辽市",
      "parent": "220300",
      "children": null },
    {
      "id": "220383",
      "name": "其它区",
      "parent": "220300",
      "children": null }] },

  {
    "id": "220400",
    "name": "辽源市",
    "parent": "220000",
    "children": [{
      "id": "220402",
      "name": "龙山区",
      "parent": "220400",
      "children": null },
    {
      "id": "220403",
      "name": "西安区",
      "parent": "220400",
      "children": null },
    {
      "id": "220421",
      "name": "东丰县",
      "parent": "220400",
      "children": null },
    {
      "id": "220422",
      "name": "东辽县",
      "parent": "220400",
      "children": null },
    {
      "id": "220423",
      "name": "其它区",
      "parent": "220400",
      "children": null }] },

  {
    "id": "220500",
    "name": "通化市",
    "parent": "220000",
    "children": [{
      "id": "220502",
      "name": "东昌区",
      "parent": "220500",
      "children": null },
    {
      "id": "220503",
      "name": "二道江区",
      "parent": "220500",
      "children": null },
    {
      "id": "220521",
      "name": "通化县",
      "parent": "220500",
      "children": null },
    {
      "id": "220523",
      "name": "辉南县",
      "parent": "220500",
      "children": null },
    {
      "id": "220524",
      "name": "柳河县",
      "parent": "220500",
      "children": null },
    {
      "id": "220581",
      "name": "梅河口市",
      "parent": "220500",
      "children": null },
    {
      "id": "220582",
      "name": "集安市",
      "parent": "220500",
      "children": null },
    {
      "id": "220583",
      "name": "其它区",
      "parent": "220500",
      "children": null }] },

  {
    "id": "220600",
    "name": "白山市",
    "parent": "220000",
    "children": [{
      "id": "220602",
      "name": "浑江区",
      "parent": "220600",
      "children": null },
    {
      "id": "220621",
      "name": "抚松县",
      "parent": "220600",
      "children": null },
    {
      "id": "220622",
      "name": "靖宇县",
      "parent": "220600",
      "children": null },
    {
      "id": "220623",
      "name": "长白朝鲜族自治县",
      "parent": "220600",
      "children": null },
    {
      "id": "220625",
      "name": "江源区",
      "parent": "220600",
      "children": null },
    {
      "id": "220681",
      "name": "临江市",
      "parent": "220600",
      "children": null },
    {
      "id": "220682",
      "name": "其它区",
      "parent": "220600",
      "children": null }] },

  {
    "id": "220700",
    "name": "松原市",
    "parent": "220000",
    "children": [{
      "id": "220702",
      "name": "宁江区",
      "parent": "220700",
      "children": null },
    {
      "id": "220721",
      "name": "前郭尔罗斯蒙古族自治县",
      "parent": "220700",
      "children": null },
    {
      "id": "220722",
      "name": "长岭县",
      "parent": "220700",
      "children": null },
    {
      "id": "220723",
      "name": "乾安县",
      "parent": "220700",
      "children": null },
    {
      "id": "220724",
      "name": "扶余市",
      "parent": "220700",
      "children": null },
    {
      "id": "220725",
      "name": "其它区",
      "parent": "220700",
      "children": null }] },

  {
    "id": "220800",
    "name": "白城市",
    "parent": "220000",
    "children": [{
      "id": "220802",
      "name": "洮北区",
      "parent": "220800",
      "children": null },
    {
      "id": "220821",
      "name": "镇赉县",
      "parent": "220800",
      "children": null },
    {
      "id": "220822",
      "name": "通榆县",
      "parent": "220800",
      "children": null },
    {
      "id": "220881",
      "name": "洮南市",
      "parent": "220800",
      "children": null },
    {
      "id": "220882",
      "name": "大安市",
      "parent": "220800",
      "children": null },
    {
      "id": "220883",
      "name": "其它区",
      "parent": "220800",
      "children": null }] },

  {
    "id": "222400",
    "name": "延边朝鲜族自治州",
    "parent": "220000",
    "children": [{
      "id": "222401",
      "name": "延吉市",
      "parent": "222400",
      "children": null },
    {
      "id": "222402",
      "name": "图们市",
      "parent": "222400",
      "children": null },
    {
      "id": "222403",
      "name": "敦化市",
      "parent": "222400",
      "children": null },
    {
      "id": "222404",
      "name": "珲春市",
      "parent": "222400",
      "children": null },
    {
      "id": "222405",
      "name": "龙井市",
      "parent": "222400",
      "children": null },
    {
      "id": "222406",
      "name": "和龙市",
      "parent": "222400",
      "children": null },
    {
      "id": "222424",
      "name": "汪清县",
      "parent": "222400",
      "children": null },
    {
      "id": "222426",
      "name": "安图县",
      "parent": "222400",
      "children": null },
    {
      "id": "222427",
      "name": "其它区",
      "parent": "222400",
      "children": null }] }] },


{
  "id": "230000",
  "name": "黑龙江省",
  "children": [{
    "id": "230100",
    "name": "哈尔滨市",
    "parent": "230000",
    "children": [{
      "id": "230102",
      "name": "道里区",
      "parent": "230100",
      "children": null },
    {
      "id": "230103",
      "name": "南岗区",
      "parent": "230100",
      "children": null },
    {
      "id": "230104",
      "name": "道外区",
      "parent": "230100",
      "children": null },
    {
      "id": "230106",
      "name": "香坊区",
      "parent": "230100",
      "children": null },
    {
      "id": "230107",
      "name": "动力区",
      "parent": "230100",
      "children": null },
    {
      "id": "230108",
      "name": "平房区",
      "parent": "230100",
      "children": null },
    {
      "id": "230109",
      "name": "松北区",
      "parent": "230100",
      "children": null },
    {
      "id": "230111",
      "name": "呼兰区",
      "parent": "230100",
      "children": null },
    {
      "id": "230123",
      "name": "依兰县",
      "parent": "230100",
      "children": null },
    {
      "id": "230124",
      "name": "方正县",
      "parent": "230100",
      "children": null },
    {
      "id": "230125",
      "name": "宾县",
      "parent": "230100",
      "children": null },
    {
      "id": "230126",
      "name": "巴彦县",
      "parent": "230100",
      "children": null },
    {
      "id": "230127",
      "name": "木兰县",
      "parent": "230100",
      "children": null },
    {
      "id": "230128",
      "name": "通河县",
      "parent": "230100",
      "children": null },
    {
      "id": "230129",
      "name": "延寿县",
      "parent": "230100",
      "children": null },
    {
      "id": "230181",
      "name": "阿城区",
      "parent": "230100",
      "children": null },
    {
      "id": "230182",
      "name": "双城区",
      "parent": "230100",
      "children": null },
    {
      "id": "230183",
      "name": "尚志市",
      "parent": "230100",
      "children": null },
    {
      "id": "230184",
      "name": "五常市",
      "parent": "230100",
      "children": null },
    {
      "id": "230185",
      "name": "阿城市",
      "parent": "230100",
      "children": null },
    {
      "id": "230186",
      "name": "其它区",
      "parent": "230100",
      "children": null }] },

  {
    "id": "230200",
    "name": "齐齐哈尔市",
    "parent": "230000",
    "children": [{
      "id": "230202",
      "name": "龙沙区",
      "parent": "230200",
      "children": null },
    {
      "id": "230203",
      "name": "建华区",
      "parent": "230200",
      "children": null },
    {
      "id": "230204",
      "name": "铁锋区",
      "parent": "230200",
      "children": null },
    {
      "id": "230205",
      "name": "昂昂溪区",
      "parent": "230200",
      "children": null },
    {
      "id": "230206",
      "name": "富拉尔基区",
      "parent": "230200",
      "children": null },
    {
      "id": "230207",
      "name": "碾子山区",
      "parent": "230200",
      "children": null },
    {
      "id": "230208",
      "name": "梅里斯达斡尔族区",
      "parent": "230200",
      "children": null },
    {
      "id": "230221",
      "name": "龙江县",
      "parent": "230200",
      "children": null },
    {
      "id": "230223",
      "name": "依安县",
      "parent": "230200",
      "children": null },
    {
      "id": "230224",
      "name": "泰来县",
      "parent": "230200",
      "children": null },
    {
      "id": "230225",
      "name": "甘南县",
      "parent": "230200",
      "children": null },
    {
      "id": "230227",
      "name": "富裕县",
      "parent": "230200",
      "children": null },
    {
      "id": "230229",
      "name": "克山县",
      "parent": "230200",
      "children": null },
    {
      "id": "230230",
      "name": "克东县",
      "parent": "230200",
      "children": null },
    {
      "id": "230231",
      "name": "拜泉县",
      "parent": "230200",
      "children": null },
    {
      "id": "230281",
      "name": "讷河市",
      "parent": "230200",
      "children": null },
    {
      "id": "230282",
      "name": "其它区",
      "parent": "230200",
      "children": null }] },

  {
    "id": "230300",
    "name": "鸡西市",
    "parent": "230000",
    "children": [{
      "id": "230302",
      "name": "鸡冠区",
      "parent": "230300",
      "children": null },
    {
      "id": "230303",
      "name": "恒山区",
      "parent": "230300",
      "children": null },
    {
      "id": "230304",
      "name": "滴道区",
      "parent": "230300",
      "children": null },
    {
      "id": "230305",
      "name": "梨树区",
      "parent": "230300",
      "children": null },
    {
      "id": "230306",
      "name": "城子河区",
      "parent": "230300",
      "children": null },
    {
      "id": "230307",
      "name": "麻山区",
      "parent": "230300",
      "children": null },
    {
      "id": "230321",
      "name": "鸡东县",
      "parent": "230300",
      "children": null },
    {
      "id": "230381",
      "name": "虎林市",
      "parent": "230300",
      "children": null },
    {
      "id": "230382",
      "name": "密山市",
      "parent": "230300",
      "children": null },
    {
      "id": "230383",
      "name": "其它区",
      "parent": "230300",
      "children": null }] },

  {
    "id": "230400",
    "name": "鹤岗市",
    "parent": "230000",
    "children": [{
      "id": "230402",
      "name": "向阳区",
      "parent": "230400",
      "children": null },
    {
      "id": "230403",
      "name": "工农区",
      "parent": "230400",
      "children": null },
    {
      "id": "230404",
      "name": "南山区",
      "parent": "230400",
      "children": null },
    {
      "id": "230405",
      "name": "兴安区",
      "parent": "230400",
      "children": null },
    {
      "id": "230406",
      "name": "东山区",
      "parent": "230400",
      "children": null },
    {
      "id": "230407",
      "name": "兴山区",
      "parent": "230400",
      "children": null },
    {
      "id": "230421",
      "name": "萝北县",
      "parent": "230400",
      "children": null },
    {
      "id": "230422",
      "name": "绥滨县",
      "parent": "230400",
      "children": null },
    {
      "id": "230423",
      "name": "其它区",
      "parent": "230400",
      "children": null }] },

  {
    "id": "230500",
    "name": "双鸭山市",
    "parent": "230000",
    "children": [{
      "id": "230502",
      "name": "尖山区",
      "parent": "230500",
      "children": null },
    {
      "id": "230503",
      "name": "岭东区",
      "parent": "230500",
      "children": null },
    {
      "id": "230505",
      "name": "四方台区",
      "parent": "230500",
      "children": null },
    {
      "id": "230506",
      "name": "宝山区",
      "parent": "230500",
      "children": null },
    {
      "id": "230521",
      "name": "集贤县",
      "parent": "230500",
      "children": null },
    {
      "id": "230522",
      "name": "友谊县",
      "parent": "230500",
      "children": null },
    {
      "id": "230523",
      "name": "宝清县",
      "parent": "230500",
      "children": null },
    {
      "id": "230524",
      "name": "饶河县",
      "parent": "230500",
      "children": null },
    {
      "id": "230525",
      "name": "其它区",
      "parent": "230500",
      "children": null }] },

  {
    "id": "230600",
    "name": "大庆市",
    "parent": "230000",
    "children": [{
      "id": "230602",
      "name": "萨尔图区",
      "parent": "230600",
      "children": null },
    {
      "id": "230603",
      "name": "龙凤区",
      "parent": "230600",
      "children": null },
    {
      "id": "230604",
      "name": "让胡路区",
      "parent": "230600",
      "children": null },
    {
      "id": "230605",
      "name": "红岗区",
      "parent": "230600",
      "children": null },
    {
      "id": "230606",
      "name": "大同区",
      "parent": "230600",
      "children": null },
    {
      "id": "230621",
      "name": "肇州县",
      "parent": "230600",
      "children": null },
    {
      "id": "230622",
      "name": "肇源县",
      "parent": "230600",
      "children": null },
    {
      "id": "230623",
      "name": "林甸县",
      "parent": "230600",
      "children": null },
    {
      "id": "230624",
      "name": "杜尔伯特蒙古族自治县",
      "parent": "230600",
      "children": null },
    {
      "id": "230625",
      "name": "其它区",
      "parent": "230600",
      "children": null }] },

  {
    "id": "230700",
    "name": "伊春市",
    "parent": "230000",
    "children": [{
      "id": "230702",
      "name": "伊春区",
      "parent": "230700",
      "children": null },
    {
      "id": "230703",
      "name": "南岔区",
      "parent": "230700",
      "children": null },
    {
      "id": "230704",
      "name": "友好区",
      "parent": "230700",
      "children": null },
    {
      "id": "230705",
      "name": "西林区",
      "parent": "230700",
      "children": null },
    {
      "id": "230706",
      "name": "翠峦区",
      "parent": "230700",
      "children": null },
    {
      "id": "230707",
      "name": "新青区",
      "parent": "230700",
      "children": null },
    {
      "id": "230708",
      "name": "美溪区",
      "parent": "230700",
      "children": null },
    {
      "id": "230709",
      "name": "金山屯区",
      "parent": "230700",
      "children": null },
    {
      "id": "230710",
      "name": "五营区",
      "parent": "230700",
      "children": null },
    {
      "id": "230711",
      "name": "乌马河区",
      "parent": "230700",
      "children": null },
    {
      "id": "230712",
      "name": "汤旺河区",
      "parent": "230700",
      "children": null },
    {
      "id": "230713",
      "name": "带岭区",
      "parent": "230700",
      "children": null },
    {
      "id": "230714",
      "name": "乌伊岭区",
      "parent": "230700",
      "children": null },
    {
      "id": "230715",
      "name": "红星区",
      "parent": "230700",
      "children": null },
    {
      "id": "230716",
      "name": "上甘岭区",
      "parent": "230700",
      "children": null },
    {
      "id": "230722",
      "name": "嘉荫县",
      "parent": "230700",
      "children": null },
    {
      "id": "230781",
      "name": "铁力市",
      "parent": "230700",
      "children": null },
    {
      "id": "230782",
      "name": "其它区",
      "parent": "230700",
      "children": null }] },

  {
    "id": "230800",
    "name": "佳木斯市",
    "parent": "230000",
    "children": [{
      "id": "230802",
      "name": "永红区",
      "parent": "230800",
      "children": null },
    {
      "id": "230803",
      "name": "向阳区",
      "parent": "230800",
      "children": null },
    {
      "id": "230804",
      "name": "前进区",
      "parent": "230800",
      "children": null },
    {
      "id": "230805",
      "name": "东风区",
      "parent": "230800",
      "children": null },
    {
      "id": "230811",
      "name": "郊区",
      "parent": "230800",
      "children": null },
    {
      "id": "230822",
      "name": "桦南县",
      "parent": "230800",
      "children": null },
    {
      "id": "230826",
      "name": "桦川县",
      "parent": "230800",
      "children": null },
    {
      "id": "230828",
      "name": "汤原县",
      "parent": "230800",
      "children": null },
    {
      "id": "230833",
      "name": "抚远县",
      "parent": "230800",
      "children": null },
    {
      "id": "230881",
      "name": "同江市",
      "parent": "230800",
      "children": null },
    {
      "id": "230882",
      "name": "富锦市",
      "parent": "230800",
      "children": null },
    {
      "id": "230883",
      "name": "其它区",
      "parent": "230800",
      "children": null }] },

  {
    "id": "230900",
    "name": "七台河市",
    "parent": "230000",
    "children": [{
      "id": "230902",
      "name": "新兴区",
      "parent": "230900",
      "children": null },
    {
      "id": "230903",
      "name": "桃山区",
      "parent": "230900",
      "children": null },
    {
      "id": "230904",
      "name": "茄子河区",
      "parent": "230900",
      "children": null },
    {
      "id": "230921",
      "name": "勃利县",
      "parent": "230900",
      "children": null },
    {
      "id": "230922",
      "name": "其它区",
      "parent": "230900",
      "children": null }] },

  {
    "id": "231000",
    "name": "牡丹江市",
    "parent": "230000",
    "children": [{
      "id": "231002",
      "name": "东安区",
      "parent": "231000",
      "children": null },
    {
      "id": "231003",
      "name": "阳明区",
      "parent": "231000",
      "children": null },
    {
      "id": "231004",
      "name": "爱民区",
      "parent": "231000",
      "children": null },
    {
      "id": "231005",
      "name": "西安区",
      "parent": "231000",
      "children": null },
    {
      "id": "231024",
      "name": "东宁县",
      "parent": "231000",
      "children": null },
    {
      "id": "231025",
      "name": "林口县",
      "parent": "231000",
      "children": null },
    {
      "id": "231081",
      "name": "绥芬河市",
      "parent": "231000",
      "children": null },
    {
      "id": "231083",
      "name": "海林市",
      "parent": "231000",
      "children": null },
    {
      "id": "231084",
      "name": "宁安市",
      "parent": "231000",
      "children": null },
    {
      "id": "231085",
      "name": "穆棱市",
      "parent": "231000",
      "children": null },
    {
      "id": "231086",
      "name": "其它区",
      "parent": "231000",
      "children": null }] },

  {
    "id": "231100",
    "name": "黑河市",
    "parent": "230000",
    "children": [{
      "id": "231102",
      "name": "爱辉区",
      "parent": "231100",
      "children": null },
    {
      "id": "231121",
      "name": "嫩江县",
      "parent": "231100",
      "children": null },
    {
      "id": "231123",
      "name": "逊克县",
      "parent": "231100",
      "children": null },
    {
      "id": "231124",
      "name": "孙吴县",
      "parent": "231100",
      "children": null },
    {
      "id": "231181",
      "name": "北安市",
      "parent": "231100",
      "children": null },
    {
      "id": "231182",
      "name": "五大连池市",
      "parent": "231100",
      "children": null },
    {
      "id": "231183",
      "name": "其它区",
      "parent": "231100",
      "children": null }] },

  {
    "id": "231200",
    "name": "绥化市",
    "parent": "230000",
    "children": [{
      "id": "231202",
      "name": "北林区",
      "parent": "231200",
      "children": null },
    {
      "id": "231221",
      "name": "望奎县",
      "parent": "231200",
      "children": null },
    {
      "id": "231222",
      "name": "兰西县",
      "parent": "231200",
      "children": null },
    {
      "id": "231223",
      "name": "青冈县",
      "parent": "231200",
      "children": null },
    {
      "id": "231224",
      "name": "庆安县",
      "parent": "231200",
      "children": null },
    {
      "id": "231225",
      "name": "明水县",
      "parent": "231200",
      "children": null },
    {
      "id": "231226",
      "name": "绥棱县",
      "parent": "231200",
      "children": null },
    {
      "id": "231281",
      "name": "安达市",
      "parent": "231200",
      "children": null },
    {
      "id": "231282",
      "name": "肇东市",
      "parent": "231200",
      "children": null },
    {
      "id": "231283",
      "name": "海伦市",
      "parent": "231200",
      "children": null },
    {
      "id": "231284",
      "name": "其它区",
      "parent": "231200",
      "children": null }] },

  {
    "id": "232700",
    "name": "大兴安岭地区",
    "parent": "230000",
    "children": [{
      "id": "232702",
      "name": "松岭区",
      "parent": "232700",
      "children": null },
    {
      "id": "232703",
      "name": "新林区",
      "parent": "232700",
      "children": null },
    {
      "id": "232704",
      "name": "呼中区",
      "parent": "232700",
      "children": null },
    {
      "id": "232721",
      "name": "呼玛县",
      "parent": "232700",
      "children": null },
    {
      "id": "232722",
      "name": "塔河县",
      "parent": "232700",
      "children": null },
    {
      "id": "232723",
      "name": "漠河县",
      "parent": "232700",
      "children": null },
    {
      "id": "232724",
      "name": "加格达奇区",
      "parent": "232700",
      "children": null },
    {
      "id": "232725",
      "name": "其它区",
      "parent": "232700",
      "children": null }] }] },


{
  "id": "310000",
  "name": "上海市",
  "children": [{
    "id": "310100",
    "name": "上海市",
    "parent": "310000",
    "children": [{
      "id": "310101",
      "name": "黄浦区",
      "parent": "310100",
      "children": null },
    {
      "id": "310103",
      "name": "卢湾区",
      "parent": "310100",
      "children": null },
    {
      "id": "310104",
      "name": "徐汇区",
      "parent": "310100",
      "children": null },
    {
      "id": "310105",
      "name": "长宁区",
      "parent": "310100",
      "children": null },
    {
      "id": "310106",
      "name": "静安区",
      "parent": "310100",
      "children": null },
    {
      "id": "310107",
      "name": "普陀区",
      "parent": "310100",
      "children": null },
    {
      "id": "310108",
      "name": "闸北区",
      "parent": "310100",
      "children": null },
    {
      "id": "310109",
      "name": "虹口区",
      "parent": "310100",
      "children": null },
    {
      "id": "310110",
      "name": "杨浦区",
      "parent": "310100",
      "children": null },
    {
      "id": "310112",
      "name": "闵行区",
      "parent": "310100",
      "children": null },
    {
      "id": "310113",
      "name": "宝山区",
      "parent": "310100",
      "children": null },
    {
      "id": "310114",
      "name": "嘉定区",
      "parent": "310100",
      "children": null },
    {
      "id": "310115",
      "name": "浦东新区",
      "parent": "310100",
      "children": null },
    {
      "id": "310116",
      "name": "金山区",
      "parent": "310100",
      "children": null },
    {
      "id": "310117",
      "name": "松江区",
      "parent": "310100",
      "children": null },
    {
      "id": "310118",
      "name": "青浦区",
      "parent": "310100",
      "children": null },
    {
      "id": "310119",
      "name": "南汇区",
      "parent": "310100",
      "children": null },
    {
      "id": "310120",
      "name": "奉贤区",
      "parent": "310100",
      "children": null },
    {
      "id": "310152",
      "name": "川沙区",
      "parent": "310100",
      "children": null },
    {
      "id": "310230",
      "name": "崇明县",
      "parent": "310100",
      "children": null },
    {
      "id": "310231",
      "name": "其它区",
      "parent": "310100",
      "children": null }] }] },


{
  "id": "320000",
  "name": "江苏省",
  "children": [{
    "id": "320100",
    "name": "南京市",
    "parent": "320000",
    "children": [{
      "id": "320102",
      "name": "玄武区",
      "parent": "320100",
      "children": null },
    {
      "id": "320103",
      "name": "白下区",
      "parent": "320100",
      "children": null },
    {
      "id": "320104",
      "name": "秦淮区",
      "parent": "320100",
      "children": null },
    {
      "id": "320105",
      "name": "建邺区",
      "parent": "320100",
      "children": null },
    {
      "id": "320106",
      "name": "鼓楼区",
      "parent": "320100",
      "children": null },
    {
      "id": "320107",
      "name": "下关区",
      "parent": "320100",
      "children": null },
    {
      "id": "320111",
      "name": "浦口区",
      "parent": "320100",
      "children": null },
    {
      "id": "320113",
      "name": "栖霞区",
      "parent": "320100",
      "children": null },
    {
      "id": "320114",
      "name": "雨花台区",
      "parent": "320100",
      "children": null },
    {
      "id": "320115",
      "name": "江宁区",
      "parent": "320100",
      "children": null },
    {
      "id": "320116",
      "name": "六合区",
      "parent": "320100",
      "children": null },
    {
      "id": "320124",
      "name": "溧水区",
      "parent": "320100",
      "children": null },
    {
      "id": "320125",
      "name": "高淳区",
      "parent": "320100",
      "children": null },
    {
      "id": "320126",
      "name": "其它区",
      "parent": "320100",
      "children": null }] },

  {
    "id": "320200",
    "name": "无锡市",
    "parent": "320000",
    "children": [{
      "id": "320202",
      "name": "崇安区",
      "parent": "320200",
      "children": null },
    {
      "id": "320203",
      "name": "南长区",
      "parent": "320200",
      "children": null },
    {
      "id": "320204",
      "name": "北塘区",
      "parent": "320200",
      "children": null },
    {
      "id": "320205",
      "name": "锡山区",
      "parent": "320200",
      "children": null },
    {
      "id": "320206",
      "name": "惠山区",
      "parent": "320200",
      "children": null },
    {
      "id": "320211",
      "name": "滨湖区",
      "parent": "320200",
      "children": null },
    {
      "id": "320213",
      "name": "梁溪区",
      "parent": "320200",
      "children": null },
    {
      "id": "320214",
      "name": "新吴区",
      "parent": "320200",
      "children": null },
    {
      "id": "320281",
      "name": "江阴市",
      "parent": "320200",
      "children": null },
    {
      "id": "320282",
      "name": "宜兴市",
      "parent": "320200",
      "children": null },
    {
      "id": "320296",
      "name": "新区",
      "parent": "320200",
      "children": null },
    {
      "id": "320297",
      "name": "其它区",
      "parent": "320200",
      "children": null }] },

  {
    "id": "320300",
    "name": "徐州市",
    "parent": "320000",
    "children": [{
      "id": "320302",
      "name": "鼓楼区",
      "parent": "320300",
      "children": null },
    {
      "id": "320303",
      "name": "云龙区",
      "parent": "320300",
      "children": null },
    {
      "id": "320304",
      "name": "九里区",
      "parent": "320300",
      "children": null },
    {
      "id": "320305",
      "name": "贾汪区",
      "parent": "320300",
      "children": null },
    {
      "id": "320311",
      "name": "泉山区",
      "parent": "320300",
      "children": null },
    {
      "id": "320321",
      "name": "丰县",
      "parent": "320300",
      "children": null },
    {
      "id": "320322",
      "name": "沛县",
      "parent": "320300",
      "children": null },
    {
      "id": "320323",
      "name": "铜山区",
      "parent": "320300",
      "children": null },
    {
      "id": "320324",
      "name": "睢宁县",
      "parent": "320300",
      "children": null },
    {
      "id": "320381",
      "name": "新沂市",
      "parent": "320300",
      "children": null },
    {
      "id": "320382",
      "name": "邳州市",
      "parent": "320300",
      "children": null },
    {
      "id": "320383",
      "name": "其它区",
      "parent": "320300",
      "children": null }] },

  {
    "id": "320400",
    "name": "常州市",
    "parent": "320000",
    "children": [{
      "id": "320402",
      "name": "天宁区",
      "parent": "320400",
      "children": null },
    {
      "id": "320404",
      "name": "钟楼区",
      "parent": "320400",
      "children": null },
    {
      "id": "320405",
      "name": "戚墅堰区",
      "parent": "320400",
      "children": null },
    {
      "id": "320411",
      "name": "新北区",
      "parent": "320400",
      "children": null },
    {
      "id": "320412",
      "name": "武进区",
      "parent": "320400",
      "children": null },
    {
      "id": "320481",
      "name": "溧阳市",
      "parent": "320400",
      "children": null },
    {
      "id": "320482",
      "name": "金坛市",
      "parent": "320400",
      "children": null },
    {
      "id": "320483",
      "name": "其它区",
      "parent": "320400",
      "children": null }] },

  {
    "id": "320500",
    "name": "苏州市",
    "parent": "320000",
    "children": [{
      "id": "320502",
      "name": "沧浪区",
      "parent": "320500",
      "children": null },
    {
      "id": "320503",
      "name": "平江区",
      "parent": "320500",
      "children": null },
    {
      "id": "320504",
      "name": "金阊区",
      "parent": "320500",
      "children": null },
    {
      "id": "320505",
      "name": "虎丘区",
      "parent": "320500",
      "children": null },
    {
      "id": "320506",
      "name": "吴中区",
      "parent": "320500",
      "children": null },
    {
      "id": "320507",
      "name": "相城区",
      "parent": "320500",
      "children": null },
    {
      "id": "320508",
      "name": "姑苏区",
      "parent": "320500",
      "children": null },
    {
      "id": "320581",
      "name": "常熟市",
      "parent": "320500",
      "children": null },
    {
      "id": "320582",
      "name": "张家港市",
      "parent": "320500",
      "children": null },
    {
      "id": "320583",
      "name": "昆山市",
      "parent": "320500",
      "children": null },
    {
      "id": "320584",
      "name": "吴江区",
      "parent": "320500",
      "children": null },
    {
      "id": "320585",
      "name": "太仓市",
      "parent": "320500",
      "children": null },
    {
      "id": "320594",
      "name": "新区",
      "parent": "320500",
      "children": null },
    {
      "id": "320595",
      "name": "园区",
      "parent": "320500",
      "children": null },
    {
      "id": "320596",
      "name": "其它区",
      "parent": "320500",
      "children": null }] },

  {
    "id": "320600",
    "name": "南通市",
    "parent": "320000",
    "children": [{
      "id": "320602",
      "name": "崇川区",
      "parent": "320600",
      "children": null },
    {
      "id": "320611",
      "name": "港闸区",
      "parent": "320600",
      "children": null },
    {
      "id": "320612",
      "name": "通州区",
      "parent": "320600",
      "children": null },
    {
      "id": "320621",
      "name": "海安县",
      "parent": "320600",
      "children": null },
    {
      "id": "320623",
      "name": "如东县",
      "parent": "320600",
      "children": null },
    {
      "id": "320681",
      "name": "启东市",
      "parent": "320600",
      "children": null },
    {
      "id": "320682",
      "name": "如皋市",
      "parent": "320600",
      "children": null },
    {
      "id": "320683",
      "name": "通州市",
      "parent": "320600",
      "children": null },
    {
      "id": "320684",
      "name": "海门市",
      "parent": "320600",
      "children": null },
    {
      "id": "320693",
      "name": "开发区",
      "parent": "320600",
      "children": null },
    {
      "id": "320694",
      "name": "其它区",
      "parent": "320600",
      "children": null }] },

  {
    "id": "320700",
    "name": "连云港市",
    "parent": "320000",
    "children": [{
      "id": "320703",
      "name": "连云区",
      "parent": "320700",
      "children": null },
    {
      "id": "320705",
      "name": "新浦区",
      "parent": "320700",
      "children": null },
    {
      "id": "320706",
      "name": "海州区",
      "parent": "320700",
      "children": null },
    {
      "id": "320721",
      "name": "赣榆区",
      "parent": "320700",
      "children": null },
    {
      "id": "320722",
      "name": "东海县",
      "parent": "320700",
      "children": null },
    {
      "id": "320723",
      "name": "灌云县",
      "parent": "320700",
      "children": null },
    {
      "id": "320724",
      "name": "灌南县",
      "parent": "320700",
      "children": null },
    {
      "id": "320725",
      "name": "其它区",
      "parent": "320700",
      "children": null }] },

  {
    "id": "320800",
    "name": "淮安市",
    "parent": "320000",
    "children": [{
      "id": "320802",
      "name": "清河区",
      "parent": "320800",
      "children": null },
    {
      "id": "320803",
      "name": "淮安区",
      "parent": "320800",
      "children": null },
    {
      "id": "320804",
      "name": "淮阴区",
      "parent": "320800",
      "children": null },
    {
      "id": "320811",
      "name": "清浦区",
      "parent": "320800",
      "children": null },
    {
      "id": "320826",
      "name": "涟水县",
      "parent": "320800",
      "children": null },
    {
      "id": "320829",
      "name": "洪泽县",
      "parent": "320800",
      "children": null },
    {
      "id": "320830",
      "name": "盱眙县",
      "parent": "320800",
      "children": null },
    {
      "id": "320831",
      "name": "金湖县",
      "parent": "320800",
      "children": null },
    {
      "id": "320832",
      "name": "其它区",
      "parent": "320800",
      "children": null }] },

  {
    "id": "320900",
    "name": "盐城市",
    "parent": "320000",
    "children": [{
      "id": "320902",
      "name": "亭湖区",
      "parent": "320900",
      "children": null },
    {
      "id": "320903",
      "name": "盐都区",
      "parent": "320900",
      "children": null },
    {
      "id": "320921",
      "name": "响水县",
      "parent": "320900",
      "children": null },
    {
      "id": "320922",
      "name": "滨海县",
      "parent": "320900",
      "children": null },
    {
      "id": "320923",
      "name": "阜宁县",
      "parent": "320900",
      "children": null },
    {
      "id": "320924",
      "name": "射阳县",
      "parent": "320900",
      "children": null },
    {
      "id": "320925",
      "name": "建湖县",
      "parent": "320900",
      "children": null },
    {
      "id": "320981",
      "name": "东台市",
      "parent": "320900",
      "children": null },
    {
      "id": "320982",
      "name": "大丰市",
      "parent": "320900",
      "children": null },
    {
      "id": "320983",
      "name": "其它区",
      "parent": "320900",
      "children": null }] },

  {
    "id": "321000",
    "name": "扬州市",
    "parent": "320000",
    "children": [{
      "id": "321002",
      "name": "广陵区",
      "parent": "321000",
      "children": null },
    {
      "id": "321003",
      "name": "邗江区",
      "parent": "321000",
      "children": null },
    {
      "id": "321011",
      "name": "维扬区",
      "parent": "321000",
      "children": null },
    {
      "id": "321023",
      "name": "宝应县",
      "parent": "321000",
      "children": null },
    {
      "id": "321081",
      "name": "仪征市",
      "parent": "321000",
      "children": null },
    {
      "id": "321084",
      "name": "高邮市",
      "parent": "321000",
      "children": null },
    {
      "id": "321088",
      "name": "江都区",
      "parent": "321000",
      "children": null },
    {
      "id": "321092",
      "name": "经济开发区",
      "parent": "321000",
      "children": null },
    {
      "id": "321093",
      "name": "其它区",
      "parent": "321000",
      "children": null }] },

  {
    "id": "321100",
    "name": "镇江市",
    "parent": "320000",
    "children": [{
      "id": "321102",
      "name": "京口区",
      "parent": "321100",
      "children": null },
    {
      "id": "321111",
      "name": "润州区",
      "parent": "321100",
      "children": null },
    {
      "id": "321112",
      "name": "丹徒区",
      "parent": "321100",
      "children": null },
    {
      "id": "321181",
      "name": "丹阳市",
      "parent": "321100",
      "children": null },
    {
      "id": "321182",
      "name": "扬中市",
      "parent": "321100",
      "children": null },
    {
      "id": "321183",
      "name": "句容市",
      "parent": "321100",
      "children": null },
    {
      "id": "321184",
      "name": "其它区",
      "parent": "321100",
      "children": null }] },

  {
    "id": "321200",
    "name": "泰州市",
    "parent": "320000",
    "children": [{
      "id": "321202",
      "name": "海陵区",
      "parent": "321200",
      "children": null },
    {
      "id": "321203",
      "name": "高港区",
      "parent": "321200",
      "children": null },
    {
      "id": "321281",
      "name": "兴化市",
      "parent": "321200",
      "children": null },
    {
      "id": "321282",
      "name": "靖江市",
      "parent": "321200",
      "children": null },
    {
      "id": "321283",
      "name": "泰兴市",
      "parent": "321200",
      "children": null },
    {
      "id": "321284",
      "name": "姜堰区",
      "parent": "321200",
      "children": null },
    {
      "id": "321285",
      "name": "其它区",
      "parent": "321200",
      "children": null }] },

  {
    "id": "321300",
    "name": "宿迁市",
    "parent": "320000",
    "children": [{
      "id": "321302",
      "name": "宿城区",
      "parent": "321300",
      "children": null },
    {
      "id": "321311",
      "name": "宿豫区",
      "parent": "321300",
      "children": null },
    {
      "id": "321322",
      "name": "沭阳县",
      "parent": "321300",
      "children": null },
    {
      "id": "321323",
      "name": "泗阳县",
      "parent": "321300",
      "children": null },
    {
      "id": "321324",
      "name": "泗洪县",
      "parent": "321300",
      "children": null },
    {
      "id": "321325",
      "name": "其它区",
      "parent": "321300",
      "children": null }] }] },


{
  "id": "330000",
  "name": "浙江省",
  "children": [{
    "id": "330100",
    "name": "杭州市",
    "parent": "330000",
    "children": [{
      "id": "330102",
      "name": "上城区",
      "parent": "330100",
      "children": null },
    {
      "id": "330103",
      "name": "下城区",
      "parent": "330100",
      "children": null },
    {
      "id": "330104",
      "name": "江干区",
      "parent": "330100",
      "children": null },
    {
      "id": "330105",
      "name": "拱墅区",
      "parent": "330100",
      "children": null },
    {
      "id": "330106",
      "name": "西湖区",
      "parent": "330100",
      "children": null },
    {
      "id": "330108",
      "name": "滨江区",
      "parent": "330100",
      "children": null },
    {
      "id": "330109",
      "name": "萧山区",
      "parent": "330100",
      "children": null },
    {
      "id": "330110",
      "name": "余杭区",
      "parent": "330100",
      "children": null },
    {
      "id": "330122",
      "name": "桐庐县",
      "parent": "330100",
      "children": null },
    {
      "id": "330127",
      "name": "淳安县",
      "parent": "330100",
      "children": null },
    {
      "id": "330182",
      "name": "建德市",
      "parent": "330100",
      "children": null },
    {
      "id": "330183",
      "name": "富阳区",
      "parent": "330100",
      "children": null },
    {
      "id": "330185",
      "name": "临安市",
      "parent": "330100",
      "children": null },
    {
      "id": "330186",
      "name": "其它区",
      "parent": "330100",
      "children": null }] },

  {
    "id": "330200",
    "name": "宁波市",
    "parent": "330000",
    "children": [{
      "id": "330203",
      "name": "海曙区",
      "parent": "330200",
      "children": null },
    {
      "id": "330204",
      "name": "江东区",
      "parent": "330200",
      "children": null },
    {
      "id": "330205",
      "name": "江北区",
      "parent": "330200",
      "children": null },
    {
      "id": "330206",
      "name": "北仑区",
      "parent": "330200",
      "children": null },
    {
      "id": "330211",
      "name": "镇海区",
      "parent": "330200",
      "children": null },
    {
      "id": "330212",
      "name": "鄞州区",
      "parent": "330200",
      "children": null },
    {
      "id": "330225",
      "name": "象山县",
      "parent": "330200",
      "children": null },
    {
      "id": "330226",
      "name": "宁海县",
      "parent": "330200",
      "children": null },
    {
      "id": "330281",
      "name": "余姚市",
      "parent": "330200",
      "children": null },
    {
      "id": "330282",
      "name": "慈溪市",
      "parent": "330200",
      "children": null },
    {
      "id": "330283",
      "name": "奉化市",
      "parent": "330200",
      "children": null },
    {
      "id": "330284",
      "name": "其它区",
      "parent": "330200",
      "children": null }] },

  {
    "id": "330300",
    "name": "温州市",
    "parent": "330000",
    "children": [{
      "id": "330302",
      "name": "鹿城区",
      "parent": "330300",
      "children": null },
    {
      "id": "330303",
      "name": "龙湾区",
      "parent": "330300",
      "children": null },
    {
      "id": "330304",
      "name": "瓯海区",
      "parent": "330300",
      "children": null },
    {
      "id": "330322",
      "name": "洞头县",
      "parent": "330300",
      "children": null },
    {
      "id": "330324",
      "name": "永嘉县",
      "parent": "330300",
      "children": null },
    {
      "id": "330326",
      "name": "平阳县",
      "parent": "330300",
      "children": null },
    {
      "id": "330327",
      "name": "苍南县",
      "parent": "330300",
      "children": null },
    {
      "id": "330328",
      "name": "文成县",
      "parent": "330300",
      "children": null },
    {
      "id": "330329",
      "name": "泰顺县",
      "parent": "330300",
      "children": null },
    {
      "id": "330381",
      "name": "瑞安市",
      "parent": "330300",
      "children": null },
    {
      "id": "330382",
      "name": "乐清市",
      "parent": "330300",
      "children": null },
    {
      "id": "330383",
      "name": "其它区",
      "parent": "330300",
      "children": null }] },

  {
    "id": "330400",
    "name": "嘉兴市",
    "parent": "330000",
    "children": [{
      "id": "330402",
      "name": "南湖区",
      "parent": "330400",
      "children": null },
    {
      "id": "330411",
      "name": "秀洲区",
      "parent": "330400",
      "children": null },
    {
      "id": "330421",
      "name": "嘉善县",
      "parent": "330400",
      "children": null },
    {
      "id": "330424",
      "name": "海盐县",
      "parent": "330400",
      "children": null },
    {
      "id": "330481",
      "name": "海宁市",
      "parent": "330400",
      "children": null },
    {
      "id": "330482",
      "name": "平湖市",
      "parent": "330400",
      "children": null },
    {
      "id": "330483",
      "name": "桐乡市",
      "parent": "330400",
      "children": null },
    {
      "id": "330484",
      "name": "其它区",
      "parent": "330400",
      "children": null }] },

  {
    "id": "330500",
    "name": "湖州市",
    "parent": "330000",
    "children": [{
      "id": "330502",
      "name": "吴兴区",
      "parent": "330500",
      "children": null },
    {
      "id": "330503",
      "name": "南浔区",
      "parent": "330500",
      "children": null },
    {
      "id": "330521",
      "name": "德清县",
      "parent": "330500",
      "children": null },
    {
      "id": "330522",
      "name": "长兴县",
      "parent": "330500",
      "children": null },
    {
      "id": "330523",
      "name": "安吉县",
      "parent": "330500",
      "children": null },
    {
      "id": "330524",
      "name": "其它区",
      "parent": "330500",
      "children": null }] },

  {
    "id": "330600",
    "name": "绍兴市",
    "parent": "330000",
    "children": [{
      "id": "330602",
      "name": "越城区",
      "parent": "330600",
      "children": null },
    {
      "id": "330621",
      "name": "柯桥区",
      "parent": "330600",
      "children": null },
    {
      "id": "330624",
      "name": "新昌县",
      "parent": "330600",
      "children": null },
    {
      "id": "330681",
      "name": "诸暨市",
      "parent": "330600",
      "children": null },
    {
      "id": "330682",
      "name": "上虞区",
      "parent": "330600",
      "children": null },
    {
      "id": "330683",
      "name": "嵊州市",
      "parent": "330600",
      "children": null },
    {
      "id": "330684",
      "name": "其它区",
      "parent": "330600",
      "children": null }] },

  {
    "id": "330700",
    "name": "金华市",
    "parent": "330000",
    "children": [{
      "id": "330702",
      "name": "婺城区",
      "parent": "330700",
      "children": null },
    {
      "id": "330703",
      "name": "金东区",
      "parent": "330700",
      "children": null },
    {
      "id": "330723",
      "name": "武义县",
      "parent": "330700",
      "children": null },
    {
      "id": "330726",
      "name": "浦江县",
      "parent": "330700",
      "children": null },
    {
      "id": "330727",
      "name": "磐安县",
      "parent": "330700",
      "children": null },
    {
      "id": "330781",
      "name": "兰溪市",
      "parent": "330700",
      "children": null },
    {
      "id": "330782",
      "name": "义乌市",
      "parent": "330700",
      "children": null },
    {
      "id": "330783",
      "name": "东阳市",
      "parent": "330700",
      "children": null },
    {
      "id": "330784",
      "name": "永康市",
      "parent": "330700",
      "children": null },
    {
      "id": "330785",
      "name": "其它区",
      "parent": "330700",
      "children": null }] },

  {
    "id": "330800",
    "name": "衢州市",
    "parent": "330000",
    "children": [{
      "id": "330802",
      "name": "柯城区",
      "parent": "330800",
      "children": null },
    {
      "id": "330803",
      "name": "衢江区",
      "parent": "330800",
      "children": null },
    {
      "id": "330822",
      "name": "常山县",
      "parent": "330800",
      "children": null },
    {
      "id": "330824",
      "name": "开化县",
      "parent": "330800",
      "children": null },
    {
      "id": "330825",
      "name": "龙游县",
      "parent": "330800",
      "children": null },
    {
      "id": "330881",
      "name": "江山市",
      "parent": "330800",
      "children": null },
    {
      "id": "330882",
      "name": "其它区",
      "parent": "330800",
      "children": null }] },

  {
    "id": "330900",
    "name": "舟山市",
    "parent": "330000",
    "children": [{
      "id": "330902",
      "name": "定海区",
      "parent": "330900",
      "children": null },
    {
      "id": "330903",
      "name": "普陀区",
      "parent": "330900",
      "children": null },
    {
      "id": "330921",
      "name": "岱山县",
      "parent": "330900",
      "children": null },
    {
      "id": "330922",
      "name": "嵊泗县",
      "parent": "330900",
      "children": null },
    {
      "id": "330923",
      "name": "其它区",
      "parent": "330900",
      "children": null }] },

  {
    "id": "331000",
    "name": "台州市",
    "parent": "330000",
    "children": [{
      "id": "331002",
      "name": "椒江区",
      "parent": "331000",
      "children": null },
    {
      "id": "331003",
      "name": "黄岩区",
      "parent": "331000",
      "children": null },
    {
      "id": "331004",
      "name": "路桥区",
      "parent": "331000",
      "children": null },
    {
      "id": "331021",
      "name": "玉环县",
      "parent": "331000",
      "children": null },
    {
      "id": "331022",
      "name": "三门县",
      "parent": "331000",
      "children": null },
    {
      "id": "331023",
      "name": "天台县",
      "parent": "331000",
      "children": null },
    {
      "id": "331024",
      "name": "仙居县",
      "parent": "331000",
      "children": null },
    {
      "id": "331081",
      "name": "温岭市",
      "parent": "331000",
      "children": null },
    {
      "id": "331082",
      "name": "临海市",
      "parent": "331000",
      "children": null },
    {
      "id": "331083",
      "name": "其它区",
      "parent": "331000",
      "children": null }] },

  {
    "id": "331100",
    "name": "丽水市",
    "parent": "330000",
    "children": [{
      "id": "331102",
      "name": "莲都区",
      "parent": "331100",
      "children": null },
    {
      "id": "331121",
      "name": "青田县",
      "parent": "331100",
      "children": null },
    {
      "id": "331122",
      "name": "缙云县",
      "parent": "331100",
      "children": null },
    {
      "id": "331123",
      "name": "遂昌县",
      "parent": "331100",
      "children": null },
    {
      "id": "331124",
      "name": "松阳县",
      "parent": "331100",
      "children": null },
    {
      "id": "331125",
      "name": "云和县",
      "parent": "331100",
      "children": null },
    {
      "id": "331126",
      "name": "庆元县",
      "parent": "331100",
      "children": null },
    {
      "id": "331127",
      "name": "景宁畲族自治县",
      "parent": "331100",
      "children": null },
    {
      "id": "331181",
      "name": "龙泉市",
      "parent": "331100",
      "children": null },
    {
      "id": "331182",
      "name": "其它区",
      "parent": "331100",
      "children": null }] }] },


{
  "id": "340000",
  "name": "安徽省",
  "children": [{
    "id": "340100",
    "name": "合肥市",
    "parent": "340000",
    "children": [{
      "id": "340102",
      "name": "瑶海区",
      "parent": "340100",
      "children": null },
    {
      "id": "340103",
      "name": "庐阳区",
      "parent": "340100",
      "children": null },
    {
      "id": "340104",
      "name": "蜀山区",
      "parent": "340100",
      "children": null },
    {
      "id": "340111",
      "name": "包河区",
      "parent": "340100",
      "children": null },
    {
      "id": "340121",
      "name": "长丰县",
      "parent": "340100",
      "children": null },
    {
      "id": "340122",
      "name": "肥东县",
      "parent": "340100",
      "children": null },
    {
      "id": "340123",
      "name": "肥西县",
      "parent": "340100",
      "children": null },
    {
      "id": "340151",
      "name": "高新区",
      "parent": "340100",
      "children": null },
    {
      "id": "340191",
      "name": "中区",
      "parent": "340100",
      "children": null },
    {
      "id": "340192",
      "name": "其它区",
      "parent": "340100",
      "children": null },
    {
      "id": "341400",
      "name": "巢湖市",
      "parent": "340100",
      "children": null },
    {
      "id": "341402",
      "name": "居巢区",
      "parent": "340100",
      "children": null },
    {
      "id": "341421",
      "name": "庐江县",
      "parent": "340100",
      "children": null }] },

  {
    "id": "340200",
    "name": "芜湖市",
    "parent": "340000",
    "children": [{
      "id": "340202",
      "name": "镜湖区",
      "parent": "340200",
      "children": null },
    {
      "id": "340203",
      "name": "弋江区",
      "parent": "340200",
      "children": null },
    {
      "id": "340207",
      "name": "鸠江区",
      "parent": "340200",
      "children": null },
    {
      "id": "340208",
      "name": "三山区",
      "parent": "340200",
      "children": null },
    {
      "id": "340221",
      "name": "芜湖县",
      "parent": "340200",
      "children": null },
    {
      "id": "340222",
      "name": "繁昌县",
      "parent": "340200",
      "children": null },
    {
      "id": "340223",
      "name": "南陵县",
      "parent": "340200",
      "children": null },
    {
      "id": "340224",
      "name": "其它区",
      "parent": "340200",
      "children": null },
    {
      "id": "341422",
      "name": "无为县",
      "parent": "340200",
      "children": null }] },

  {
    "id": "340300",
    "name": "蚌埠市",
    "parent": "340000",
    "children": [{
      "id": "340302",
      "name": "龙子湖区",
      "parent": "340300",
      "children": null },
    {
      "id": "340303",
      "name": "蚌山区",
      "parent": "340300",
      "children": null },
    {
      "id": "340304",
      "name": "禹会区",
      "parent": "340300",
      "children": null },
    {
      "id": "340311",
      "name": "淮上区",
      "parent": "340300",
      "children": null },
    {
      "id": "340321",
      "name": "怀远县",
      "parent": "340300",
      "children": null },
    {
      "id": "340322",
      "name": "五河县",
      "parent": "340300",
      "children": null },
    {
      "id": "340323",
      "name": "固镇县",
      "parent": "340300",
      "children": null },
    {
      "id": "340324",
      "name": "其它区",
      "parent": "340300",
      "children": null }] },

  {
    "id": "340400",
    "name": "淮南市",
    "parent": "340000",
    "children": [{
      "id": "340402",
      "name": "大通区",
      "parent": "340400",
      "children": null },
    {
      "id": "340403",
      "name": "田家庵区",
      "parent": "340400",
      "children": null },
    {
      "id": "340404",
      "name": "谢家集区",
      "parent": "340400",
      "children": null },
    {
      "id": "340405",
      "name": "八公山区",
      "parent": "340400",
      "children": null },
    {
      "id": "340406",
      "name": "潘集区",
      "parent": "340400",
      "children": null },
    {
      "id": "340421",
      "name": "凤台县",
      "parent": "340400",
      "children": null },
    {
      "id": "340422",
      "name": "其它区",
      "parent": "340400",
      "children": null },
    {
      "id": "340499",
      "name": "寿县",
      "parent": "340400",
      "children": null }] },

  {
    "id": "340500",
    "name": "马鞍山市",
    "parent": "340000",
    "children": [{
      "id": "340502",
      "name": "金家庄区",
      "parent": "340500",
      "children": null },
    {
      "id": "340503",
      "name": "花山区",
      "parent": "340500",
      "children": null },
    {
      "id": "340504",
      "name": "雨山区",
      "parent": "340500",
      "children": null },
    {
      "id": "340506",
      "name": "博望区",
      "parent": "340500",
      "children": null },
    {
      "id": "340521",
      "name": "当涂县",
      "parent": "340500",
      "children": null },
    {
      "id": "340522",
      "name": "其它区",
      "parent": "340500",
      "children": null },
    {
      "id": "341423",
      "name": "含山县",
      "parent": "340500",
      "children": null },
    {
      "id": "341424",
      "name": "和县",
      "parent": "340500",
      "children": null }] },

  {
    "id": "340600",
    "name": "淮北市",
    "parent": "340000",
    "children": [{
      "id": "340602",
      "name": "杜集区",
      "parent": "340600",
      "children": null },
    {
      "id": "340603",
      "name": "相山区",
      "parent": "340600",
      "children": null },
    {
      "id": "340604",
      "name": "烈山区",
      "parent": "340600",
      "children": null },
    {
      "id": "340621",
      "name": "濉溪县",
      "parent": "340600",
      "children": null },
    {
      "id": "340622",
      "name": "其它区",
      "parent": "340600",
      "children": null }] },

  {
    "id": "340700",
    "name": "铜陵市",
    "parent": "340000",
    "children": [{
      "id": "340702",
      "name": "铜官山区",
      "parent": "340700",
      "children": null },
    {
      "id": "340703",
      "name": "狮子山区",
      "parent": "340700",
      "children": null },
    {
      "id": "340705",
      "name": "铜官区",
      "parent": "340700",
      "children": null },
    {
      "id": "340711",
      "name": "郊区",
      "parent": "340700",
      "children": null },
    {
      "id": "340721",
      "name": "铜陵县",
      "parent": "340700",
      "children": null },
    {
      "id": "340722",
      "name": "其它区",
      "parent": "340700",
      "children": null },
    {
      "id": "340799",
      "name": "枞阳县",
      "parent": "340700",
      "children": null }] },

  {
    "id": "340800",
    "name": "安庆市",
    "parent": "340000",
    "children": [{
      "id": "340802",
      "name": "迎江区",
      "parent": "340800",
      "children": null },
    {
      "id": "340803",
      "name": "大观区",
      "parent": "340800",
      "children": null },
    {
      "id": "340811",
      "name": "宜秀区",
      "parent": "340800",
      "children": null },
    {
      "id": "340822",
      "name": "怀宁县",
      "parent": "340800",
      "children": null },
    {
      "id": "340823",
      "name": "枞阳县",
      "parent": "340800",
      "children": null },
    {
      "id": "340824",
      "name": "潜山县",
      "parent": "340800",
      "children": null },
    {
      "id": "340825",
      "name": "太湖县",
      "parent": "340800",
      "children": null },
    {
      "id": "340826",
      "name": "宿松县",
      "parent": "340800",
      "children": null },
    {
      "id": "340827",
      "name": "望江县",
      "parent": "340800",
      "children": null },
    {
      "id": "340828",
      "name": "岳西县",
      "parent": "340800",
      "children": null },
    {
      "id": "340881",
      "name": "桐城市",
      "parent": "340800",
      "children": null },
    {
      "id": "340882",
      "name": "其它区",
      "parent": "340800",
      "children": null }] },

  {
    "id": "341000",
    "name": "黄山市",
    "parent": "340000",
    "children": [{
      "id": "341002",
      "name": "屯溪区",
      "parent": "341000",
      "children": null },
    {
      "id": "341003",
      "name": "黄山区",
      "parent": "341000",
      "children": null },
    {
      "id": "341004",
      "name": "徽州区",
      "parent": "341000",
      "children": null },
    {
      "id": "341021",
      "name": "歙县",
      "parent": "341000",
      "children": null },
    {
      "id": "341022",
      "name": "休宁县",
      "parent": "341000",
      "children": null },
    {
      "id": "341023",
      "name": "黟县",
      "parent": "341000",
      "children": null },
    {
      "id": "341024",
      "name": "祁门县",
      "parent": "341000",
      "children": null },
    {
      "id": "341025",
      "name": "其它区",
      "parent": "341000",
      "children": null }] },

  {
    "id": "341100",
    "name": "滁州市",
    "parent": "340000",
    "children": [{
      "id": "341102",
      "name": "琅琊区",
      "parent": "341100",
      "children": null },
    {
      "id": "341103",
      "name": "南谯区",
      "parent": "341100",
      "children": null },
    {
      "id": "341122",
      "name": "来安县",
      "parent": "341100",
      "children": null },
    {
      "id": "341124",
      "name": "全椒县",
      "parent": "341100",
      "children": null },
    {
      "id": "341125",
      "name": "定远县",
      "parent": "341100",
      "children": null },
    {
      "id": "341126",
      "name": "凤阳县",
      "parent": "341100",
      "children": null },
    {
      "id": "341181",
      "name": "天长市",
      "parent": "341100",
      "children": null },
    {
      "id": "341182",
      "name": "明光市",
      "parent": "341100",
      "children": null },
    {
      "id": "341183",
      "name": "其它区",
      "parent": "341100",
      "children": null }] },

  {
    "id": "341200",
    "name": "阜阳市",
    "parent": "340000",
    "children": [{
      "id": "341202",
      "name": "颍州区",
      "parent": "341200",
      "children": null },
    {
      "id": "341203",
      "name": "颍东区",
      "parent": "341200",
      "children": null },
    {
      "id": "341204",
      "name": "颍泉区",
      "parent": "341200",
      "children": null },
    {
      "id": "341221",
      "name": "临泉县",
      "parent": "341200",
      "children": null },
    {
      "id": "341222",
      "name": "太和县",
      "parent": "341200",
      "children": null },
    {
      "id": "341225",
      "name": "阜南县",
      "parent": "341200",
      "children": null },
    {
      "id": "341226",
      "name": "颍上县",
      "parent": "341200",
      "children": null },
    {
      "id": "341282",
      "name": "界首市",
      "parent": "341200",
      "children": null },
    {
      "id": "341283",
      "name": "其它区",
      "parent": "341200",
      "children": null }] },

  {
    "id": "341300",
    "name": "宿州市",
    "parent": "340000",
    "children": [{
      "id": "341302",
      "name": "埇桥区",
      "parent": "341300",
      "children": null },
    {
      "id": "341321",
      "name": "砀山县",
      "parent": "341300",
      "children": null },
    {
      "id": "341322",
      "name": "萧县",
      "parent": "341300",
      "children": null },
    {
      "id": "341323",
      "name": "灵璧县",
      "parent": "341300",
      "children": null },
    {
      "id": "341324",
      "name": "泗县",
      "parent": "341300",
      "children": null },
    {
      "id": "341325",
      "name": "其它区",
      "parent": "341300",
      "children": null }] },

  {
    "id": "341500",
    "name": "六安市",
    "parent": "340000",
    "children": [{
      "id": "341502",
      "name": "金安区",
      "parent": "341500",
      "children": null },
    {
      "id": "341503",
      "name": "裕安区",
      "parent": "341500",
      "children": null },
    {
      "id": "341504",
      "name": "叶集区",
      "parent": "341500",
      "children": null },
    {
      "id": "341521",
      "name": "寿县",
      "parent": "341500",
      "children": null },
    {
      "id": "341522",
      "name": "霍邱县",
      "parent": "341500",
      "children": null },
    {
      "id": "341523",
      "name": "舒城县",
      "parent": "341500",
      "children": null },
    {
      "id": "341524",
      "name": "金寨县",
      "parent": "341500",
      "children": null },
    {
      "id": "341525",
      "name": "霍山县",
      "parent": "341500",
      "children": null },
    {
      "id": "341526",
      "name": "其它区",
      "parent": "341500",
      "children": null }] },

  {
    "id": "341600",
    "name": "亳州市",
    "parent": "340000",
    "children": [{
      "id": "341602",
      "name": "谯城区",
      "parent": "341600",
      "children": null },
    {
      "id": "341621",
      "name": "涡阳县",
      "parent": "341600",
      "children": null },
    {
      "id": "341622",
      "name": "蒙城县",
      "parent": "341600",
      "children": null },
    {
      "id": "341623",
      "name": "利辛县",
      "parent": "341600",
      "children": null },
    {
      "id": "341624",
      "name": "其它区",
      "parent": "341600",
      "children": null }] },

  {
    "id": "341700",
    "name": "池州市",
    "parent": "340000",
    "children": [{
      "id": "341702",
      "name": "贵池区",
      "parent": "341700",
      "children": null },
    {
      "id": "341721",
      "name": "东至县",
      "parent": "341700",
      "children": null },
    {
      "id": "341722",
      "name": "石台县",
      "parent": "341700",
      "children": null },
    {
      "id": "341723",
      "name": "青阳县",
      "parent": "341700",
      "children": null },
    {
      "id": "341724",
      "name": "其它区",
      "parent": "341700",
      "children": null }] },

  {
    "id": "341800",
    "name": "宣城市",
    "parent": "340000",
    "children": [{
      "id": "341802",
      "name": "宣州区",
      "parent": "341800",
      "children": null },
    {
      "id": "341821",
      "name": "郎溪县",
      "parent": "341800",
      "children": null },
    {
      "id": "341822",
      "name": "广德县",
      "parent": "341800",
      "children": null },
    {
      "id": "341823",
      "name": "泾县",
      "parent": "341800",
      "children": null },
    {
      "id": "341824",
      "name": "绩溪县",
      "parent": "341800",
      "children": null },
    {
      "id": "341825",
      "name": "旌德县",
      "parent": "341800",
      "children": null },
    {
      "id": "341881",
      "name": "宁国市",
      "parent": "341800",
      "children": null },
    {
      "id": "341882",
      "name": "其它区",
      "parent": "341800",
      "children": null }] }] },


{
  "id": "350000",
  "name": "福建省",
  "children": [{
    "id": "350100",
    "name": "福州市",
    "parent": "350000",
    "children": [{
      "id": "350102",
      "name": "鼓楼区",
      "parent": "350100",
      "children": null },
    {
      "id": "350103",
      "name": "台江区",
      "parent": "350100",
      "children": null },
    {
      "id": "350104",
      "name": "仓山区",
      "parent": "350100",
      "children": null },
    {
      "id": "350105",
      "name": "马尾区",
      "parent": "350100",
      "children": null },
    {
      "id": "350111",
      "name": "晋安区",
      "parent": "350100",
      "children": null },
    {
      "id": "350121",
      "name": "闽侯县",
      "parent": "350100",
      "children": null },
    {
      "id": "350122",
      "name": "连江县",
      "parent": "350100",
      "children": null },
    {
      "id": "350123",
      "name": "罗源县",
      "parent": "350100",
      "children": null },
    {
      "id": "350124",
      "name": "闽清县",
      "parent": "350100",
      "children": null },
    {
      "id": "350125",
      "name": "永泰县",
      "parent": "350100",
      "children": null },
    {
      "id": "350128",
      "name": "平潭县",
      "parent": "350100",
      "children": null },
    {
      "id": "350181",
      "name": "福清市",
      "parent": "350100",
      "children": null },
    {
      "id": "350182",
      "name": "长乐市",
      "parent": "350100",
      "children": null },
    {
      "id": "350183",
      "name": "其它区",
      "parent": "350100",
      "children": null }] },

  {
    "id": "350200",
    "name": "厦门市",
    "parent": "350000",
    "children": [{
      "id": "350203",
      "name": "思明区",
      "parent": "350200",
      "children": null },
    {
      "id": "350205",
      "name": "海沧区",
      "parent": "350200",
      "children": null },
    {
      "id": "350206",
      "name": "湖里区",
      "parent": "350200",
      "children": null },
    {
      "id": "350211",
      "name": "集美区",
      "parent": "350200",
      "children": null },
    {
      "id": "350212",
      "name": "同安区",
      "parent": "350200",
      "children": null },
    {
      "id": "350213",
      "name": "翔安区",
      "parent": "350200",
      "children": null },
    {
      "id": "350214",
      "name": "其它区",
      "parent": "350200",
      "children": null }] },

  {
    "id": "350300",
    "name": "莆田市",
    "parent": "350000",
    "children": [{
      "id": "350302",
      "name": "城厢区",
      "parent": "350300",
      "children": null },
    {
      "id": "350303",
      "name": "涵江区",
      "parent": "350300",
      "children": null },
    {
      "id": "350304",
      "name": "荔城区",
      "parent": "350300",
      "children": null },
    {
      "id": "350305",
      "name": "秀屿区",
      "parent": "350300",
      "children": null },
    {
      "id": "350322",
      "name": "仙游县",
      "parent": "350300",
      "children": null },
    {
      "id": "350323",
      "name": "其它区",
      "parent": "350300",
      "children": null }] },

  {
    "id": "350400",
    "name": "三明市",
    "parent": "350000",
    "children": [{
      "id": "350402",
      "name": "梅列区",
      "parent": "350400",
      "children": null },
    {
      "id": "350403",
      "name": "三元区",
      "parent": "350400",
      "children": null },
    {
      "id": "350421",
      "name": "明溪县",
      "parent": "350400",
      "children": null },
    {
      "id": "350423",
      "name": "清流县",
      "parent": "350400",
      "children": null },
    {
      "id": "350424",
      "name": "宁化县",
      "parent": "350400",
      "children": null },
    {
      "id": "350425",
      "name": "大田县",
      "parent": "350400",
      "children": null },
    {
      "id": "350426",
      "name": "尤溪县",
      "parent": "350400",
      "children": null },
    {
      "id": "350427",
      "name": "沙县",
      "parent": "350400",
      "children": null },
    {
      "id": "350428",
      "name": "将乐县",
      "parent": "350400",
      "children": null },
    {
      "id": "350429",
      "name": "泰宁县",
      "parent": "350400",
      "children": null },
    {
      "id": "350430",
      "name": "建宁县",
      "parent": "350400",
      "children": null },
    {
      "id": "350481",
      "name": "永安市",
      "parent": "350400",
      "children": null },
    {
      "id": "350482",
      "name": "其它区",
      "parent": "350400",
      "children": null }] },

  {
    "id": "350500",
    "name": "泉州市",
    "parent": "350000",
    "children": [{
      "id": "350502",
      "name": "鲤城区",
      "parent": "350500",
      "children": null },
    {
      "id": "350503",
      "name": "丰泽区",
      "parent": "350500",
      "children": null },
    {
      "id": "350504",
      "name": "洛江区",
      "parent": "350500",
      "children": null },
    {
      "id": "350505",
      "name": "泉港区",
      "parent": "350500",
      "children": null },
    {
      "id": "350521",
      "name": "惠安县",
      "parent": "350500",
      "children": null },
    {
      "id": "350524",
      "name": "安溪县",
      "parent": "350500",
      "children": null },
    {
      "id": "350525",
      "name": "永春县",
      "parent": "350500",
      "children": null },
    {
      "id": "350526",
      "name": "德化县",
      "parent": "350500",
      "children": null },
    {
      "id": "350527",
      "name": "金门县",
      "parent": "350500",
      "children": null },
    {
      "id": "350581",
      "name": "石狮市",
      "parent": "350500",
      "children": null },
    {
      "id": "350582",
      "name": "晋江市",
      "parent": "350500",
      "children": null },
    {
      "id": "350583",
      "name": "南安市",
      "parent": "350500",
      "children": null },
    {
      "id": "350584",
      "name": "其它区",
      "parent": "350500",
      "children": null }] },

  {
    "id": "350600",
    "name": "漳州市",
    "parent": "350000",
    "children": [{
      "id": "350602",
      "name": "芗城区",
      "parent": "350600",
      "children": null },
    {
      "id": "350603",
      "name": "龙文区",
      "parent": "350600",
      "children": null },
    {
      "id": "350622",
      "name": "云霄县",
      "parent": "350600",
      "children": null },
    {
      "id": "350623",
      "name": "漳浦县",
      "parent": "350600",
      "children": null },
    {
      "id": "350624",
      "name": "诏安县",
      "parent": "350600",
      "children": null },
    {
      "id": "350625",
      "name": "长泰县",
      "parent": "350600",
      "children": null },
    {
      "id": "350626",
      "name": "东山县",
      "parent": "350600",
      "children": null },
    {
      "id": "350627",
      "name": "南靖县",
      "parent": "350600",
      "children": null },
    {
      "id": "350628",
      "name": "平和县",
      "parent": "350600",
      "children": null },
    {
      "id": "350629",
      "name": "华安县",
      "parent": "350600",
      "children": null },
    {
      "id": "350681",
      "name": "龙海市",
      "parent": "350600",
      "children": null },
    {
      "id": "350682",
      "name": "其它区",
      "parent": "350600",
      "children": null }] },

  {
    "id": "350700",
    "name": "南平市",
    "parent": "350000",
    "children": [{
      "id": "350702",
      "name": "延平区",
      "parent": "350700",
      "children": null },
    {
      "id": "350721",
      "name": "顺昌县",
      "parent": "350700",
      "children": null },
    {
      "id": "350722",
      "name": "浦城县",
      "parent": "350700",
      "children": null },
    {
      "id": "350723",
      "name": "光泽县",
      "parent": "350700",
      "children": null },
    {
      "id": "350724",
      "name": "松溪县",
      "parent": "350700",
      "children": null },
    {
      "id": "350725",
      "name": "政和县",
      "parent": "350700",
      "children": null },
    {
      "id": "350781",
      "name": "邵武市",
      "parent": "350700",
      "children": null },
    {
      "id": "350782",
      "name": "武夷山市",
      "parent": "350700",
      "children": null },
    {
      "id": "350783",
      "name": "建瓯市",
      "parent": "350700",
      "children": null },
    {
      "id": "350784",
      "name": "建阳区",
      "parent": "350700",
      "children": null },
    {
      "id": "350785",
      "name": "其它区",
      "parent": "350700",
      "children": null }] },

  {
    "id": "350800",
    "name": "龙岩市",
    "parent": "350000",
    "children": [{
      "id": "350802",
      "name": "新罗区",
      "parent": "350800",
      "children": null },
    {
      "id": "350821",
      "name": "长汀县",
      "parent": "350800",
      "children": null },
    {
      "id": "350822",
      "name": "永定区",
      "parent": "350800",
      "children": null },
    {
      "id": "350823",
      "name": "上杭县",
      "parent": "350800",
      "children": null },
    {
      "id": "350824",
      "name": "武平县",
      "parent": "350800",
      "children": null },
    {
      "id": "350825",
      "name": "连城县",
      "parent": "350800",
      "children": null },
    {
      "id": "350881",
      "name": "漳平市",
      "parent": "350800",
      "children": null },
    {
      "id": "350882",
      "name": "其它区",
      "parent": "350800",
      "children": null }] },

  {
    "id": "350900",
    "name": "宁德市",
    "parent": "350000",
    "children": [{
      "id": "350902",
      "name": "蕉城区",
      "parent": "350900",
      "children": null },
    {
      "id": "350921",
      "name": "霞浦县",
      "parent": "350900",
      "children": null },
    {
      "id": "350922",
      "name": "古田县",
      "parent": "350900",
      "children": null },
    {
      "id": "350923",
      "name": "屏南县",
      "parent": "350900",
      "children": null },
    {
      "id": "350924",
      "name": "寿宁县",
      "parent": "350900",
      "children": null },
    {
      "id": "350925",
      "name": "周宁县",
      "parent": "350900",
      "children": null },
    {
      "id": "350926",
      "name": "柘荣县",
      "parent": "350900",
      "children": null },
    {
      "id": "350981",
      "name": "福安市",
      "parent": "350900",
      "children": null },
    {
      "id": "350982",
      "name": "福鼎市",
      "parent": "350900",
      "children": null },
    {
      "id": "350983",
      "name": "其它区",
      "parent": "350900",
      "children": null }] }] },


{
  "id": "360000",
  "name": "江西省",
  "children": [{
    "id": "360100",
    "name": "南昌市",
    "parent": "360000",
    "children": [{
      "id": "360102",
      "name": "东湖区",
      "parent": "360100",
      "children": null },
    {
      "id": "360103",
      "name": "西湖区",
      "parent": "360100",
      "children": null },
    {
      "id": "360104",
      "name": "青云谱区",
      "parent": "360100",
      "children": null },
    {
      "id": "360105",
      "name": "湾里区",
      "parent": "360100",
      "children": null },
    {
      "id": "360111",
      "name": "青山湖区",
      "parent": "360100",
      "children": null },
    {
      "id": "360121",
      "name": "南昌县",
      "parent": "360100",
      "children": null },
    {
      "id": "360122",
      "name": "新建县",
      "parent": "360100",
      "children": null },
    {
      "id": "360123",
      "name": "安义县",
      "parent": "360100",
      "children": null },
    {
      "id": "360124",
      "name": "进贤县",
      "parent": "360100",
      "children": null },
    {
      "id": "360125",
      "name": "红谷滩新区",
      "parent": "360100",
      "children": null },
    {
      "id": "360126",
      "name": "经济技术开发区",
      "parent": "360100",
      "children": null },
    {
      "id": "360127",
      "name": "昌北区",
      "parent": "360100",
      "children": null },
    {
      "id": "360128",
      "name": "其它区",
      "parent": "360100",
      "children": null }] },

  {
    "id": "360200",
    "name": "景德镇市",
    "parent": "360000",
    "children": [{
      "id": "360202",
      "name": "昌江区",
      "parent": "360200",
      "children": null },
    {
      "id": "360203",
      "name": "珠山区",
      "parent": "360200",
      "children": null },
    {
      "id": "360222",
      "name": "浮梁县",
      "parent": "360200",
      "children": null },
    {
      "id": "360281",
      "name": "乐平市",
      "parent": "360200",
      "children": null },
    {
      "id": "360282",
      "name": "其它区",
      "parent": "360200",
      "children": null }] },

  {
    "id": "360300",
    "name": "萍乡市",
    "parent": "360000",
    "children": [{
      "id": "360302",
      "name": "安源区",
      "parent": "360300",
      "children": null },
    {
      "id": "360313",
      "name": "湘东区",
      "parent": "360300",
      "children": null },
    {
      "id": "360321",
      "name": "莲花县",
      "parent": "360300",
      "children": null },
    {
      "id": "360322",
      "name": "上栗县",
      "parent": "360300",
      "children": null },
    {
      "id": "360323",
      "name": "芦溪县",
      "parent": "360300",
      "children": null },
    {
      "id": "360324",
      "name": "其它区",
      "parent": "360300",
      "children": null }] },

  {
    "id": "360400",
    "name": "九江市",
    "parent": "360000",
    "children": [{
      "id": "360402",
      "name": "庐山区",
      "parent": "360400",
      "children": null },
    {
      "id": "360403",
      "name": "浔阳区",
      "parent": "360400",
      "children": null },
    {
      "id": "360421",
      "name": "九江县",
      "parent": "360400",
      "children": null },
    {
      "id": "360423",
      "name": "武宁县",
      "parent": "360400",
      "children": null },
    {
      "id": "360424",
      "name": "修水县",
      "parent": "360400",
      "children": null },
    {
      "id": "360425",
      "name": "永修县",
      "parent": "360400",
      "children": null },
    {
      "id": "360426",
      "name": "德安县",
      "parent": "360400",
      "children": null },
    {
      "id": "360427",
      "name": "星子县",
      "parent": "360400",
      "children": null },
    {
      "id": "360428",
      "name": "都昌县",
      "parent": "360400",
      "children": null },
    {
      "id": "360429",
      "name": "湖口县",
      "parent": "360400",
      "children": null },
    {
      "id": "360430",
      "name": "彭泽县",
      "parent": "360400",
      "children": null },
    {
      "id": "360481",
      "name": "瑞昌市",
      "parent": "360400",
      "children": null },
    {
      "id": "360482",
      "name": "其它区",
      "parent": "360400",
      "children": null },
    {
      "id": "360483",
      "name": "共青城市",
      "parent": "360400",
      "children": null }] },

  {
    "id": "360500",
    "name": "新余市",
    "parent": "360000",
    "children": [{
      "id": "360502",
      "name": "渝水区",
      "parent": "360500",
      "children": null },
    {
      "id": "360521",
      "name": "分宜县",
      "parent": "360500",
      "children": null },
    {
      "id": "360522",
      "name": "其它区",
      "parent": "360500",
      "children": null }] },

  {
    "id": "360600",
    "name": "鹰潭市",
    "parent": "360000",
    "children": [{
      "id": "360602",
      "name": "月湖区",
      "parent": "360600",
      "children": null },
    {
      "id": "360622",
      "name": "余江县",
      "parent": "360600",
      "children": null },
    {
      "id": "360681",
      "name": "贵溪市",
      "parent": "360600",
      "children": null },
    {
      "id": "360682",
      "name": "其它区",
      "parent": "360600",
      "children": null }] },

  {
    "id": "360700",
    "name": "赣州市",
    "parent": "360000",
    "children": [{
      "id": "360702",
      "name": "章贡区",
      "parent": "360700",
      "children": null },
    {
      "id": "360721",
      "name": "赣县",
      "parent": "360700",
      "children": null },
    {
      "id": "360722",
      "name": "信丰县",
      "parent": "360700",
      "children": null },
    {
      "id": "360723",
      "name": "大余县",
      "parent": "360700",
      "children": null },
    {
      "id": "360724",
      "name": "上犹县",
      "parent": "360700",
      "children": null },
    {
      "id": "360725",
      "name": "崇义县",
      "parent": "360700",
      "children": null },
    {
      "id": "360726",
      "name": "安远县",
      "parent": "360700",
      "children": null },
    {
      "id": "360727",
      "name": "龙南县",
      "parent": "360700",
      "children": null },
    {
      "id": "360728",
      "name": "定南县",
      "parent": "360700",
      "children": null },
    {
      "id": "360729",
      "name": "全南县",
      "parent": "360700",
      "children": null },
    {
      "id": "360730",
      "name": "宁都县",
      "parent": "360700",
      "children": null },
    {
      "id": "360731",
      "name": "于都县",
      "parent": "360700",
      "children": null },
    {
      "id": "360732",
      "name": "兴国县",
      "parent": "360700",
      "children": null },
    {
      "id": "360733",
      "name": "会昌县",
      "parent": "360700",
      "children": null },
    {
      "id": "360734",
      "name": "寻乌县",
      "parent": "360700",
      "children": null },
    {
      "id": "360735",
      "name": "石城县",
      "parent": "360700",
      "children": null },
    {
      "id": "360751",
      "name": "黄金区",
      "parent": "360700",
      "children": null },
    {
      "id": "360781",
      "name": "瑞金市",
      "parent": "360700",
      "children": null },
    {
      "id": "360782",
      "name": "南康区",
      "parent": "360700",
      "children": null },
    {
      "id": "360783",
      "name": "其它区",
      "parent": "360700",
      "children": null }] },

  {
    "id": "360800",
    "name": "吉安市",
    "parent": "360000",
    "children": [{
      "id": "360802",
      "name": "吉州区",
      "parent": "360800",
      "children": null },
    {
      "id": "360803",
      "name": "青原区",
      "parent": "360800",
      "children": null },
    {
      "id": "360821",
      "name": "吉安县",
      "parent": "360800",
      "children": null },
    {
      "id": "360822",
      "name": "吉水县",
      "parent": "360800",
      "children": null },
    {
      "id": "360823",
      "name": "峡江县",
      "parent": "360800",
      "children": null },
    {
      "id": "360824",
      "name": "新干县",
      "parent": "360800",
      "children": null },
    {
      "id": "360825",
      "name": "永丰县",
      "parent": "360800",
      "children": null },
    {
      "id": "360826",
      "name": "泰和县",
      "parent": "360800",
      "children": null },
    {
      "id": "360827",
      "name": "遂川县",
      "parent": "360800",
      "children": null },
    {
      "id": "360828",
      "name": "万安县",
      "parent": "360800",
      "children": null },
    {
      "id": "360829",
      "name": "安福县",
      "parent": "360800",
      "children": null },
    {
      "id": "360830",
      "name": "永新县",
      "parent": "360800",
      "children": null },
    {
      "id": "360881",
      "name": "井冈山市",
      "parent": "360800",
      "children": null },
    {
      "id": "360882",
      "name": "其它区",
      "parent": "360800",
      "children": null }] },

  {
    "id": "360900",
    "name": "宜春市",
    "parent": "360000",
    "children": [{
      "id": "360902",
      "name": "袁州区",
      "parent": "360900",
      "children": null },
    {
      "id": "360921",
      "name": "奉新县",
      "parent": "360900",
      "children": null },
    {
      "id": "360922",
      "name": "万载县",
      "parent": "360900",
      "children": null },
    {
      "id": "360923",
      "name": "上高县",
      "parent": "360900",
      "children": null },
    {
      "id": "360924",
      "name": "宜丰县",
      "parent": "360900",
      "children": null },
    {
      "id": "360925",
      "name": "靖安县",
      "parent": "360900",
      "children": null },
    {
      "id": "360926",
      "name": "铜鼓县",
      "parent": "360900",
      "children": null },
    {
      "id": "360981",
      "name": "丰城市",
      "parent": "360900",
      "children": null },
    {
      "id": "360982",
      "name": "樟树市",
      "parent": "360900",
      "children": null },
    {
      "id": "360983",
      "name": "高安市",
      "parent": "360900",
      "children": null },
    {
      "id": "360984",
      "name": "其它区",
      "parent": "360900",
      "children": null }] },

  {
    "id": "361000",
    "name": "抚州市",
    "parent": "360000",
    "children": [{
      "id": "361002",
      "name": "临川区",
      "parent": "361000",
      "children": null },
    {
      "id": "361021",
      "name": "南城县",
      "parent": "361000",
      "children": null },
    {
      "id": "361022",
      "name": "黎川县",
      "parent": "361000",
      "children": null },
    {
      "id": "361023",
      "name": "南丰县",
      "parent": "361000",
      "children": null },
    {
      "id": "361024",
      "name": "崇仁县",
      "parent": "361000",
      "children": null },
    {
      "id": "361025",
      "name": "乐安县",
      "parent": "361000",
      "children": null },
    {
      "id": "361026",
      "name": "宜黄县",
      "parent": "361000",
      "children": null },
    {
      "id": "361027",
      "name": "金溪县",
      "parent": "361000",
      "children": null },
    {
      "id": "361028",
      "name": "资溪县",
      "parent": "361000",
      "children": null },
    {
      "id": "361029",
      "name": "东乡县",
      "parent": "361000",
      "children": null },
    {
      "id": "361030",
      "name": "广昌县",
      "parent": "361000",
      "children": null },
    {
      "id": "361031",
      "name": "其它区",
      "parent": "361000",
      "children": null }] },

  {
    "id": "361100",
    "name": "上饶市",
    "parent": "360000",
    "children": [{
      "id": "361102",
      "name": "信州区",
      "parent": "361100",
      "children": null },
    {
      "id": "361121",
      "name": "上饶县",
      "parent": "361100",
      "children": null },
    {
      "id": "361122",
      "name": "广丰区",
      "parent": "361100",
      "children": null },
    {
      "id": "361123",
      "name": "玉山县",
      "parent": "361100",
      "children": null },
    {
      "id": "361124",
      "name": "铅山县",
      "parent": "361100",
      "children": null },
    {
      "id": "361125",
      "name": "横峰县",
      "parent": "361100",
      "children": null },
    {
      "id": "361126",
      "name": "弋阳县",
      "parent": "361100",
      "children": null },
    {
      "id": "361127",
      "name": "余干县",
      "parent": "361100",
      "children": null },
    {
      "id": "361128",
      "name": "鄱阳县",
      "parent": "361100",
      "children": null },
    {
      "id": "361129",
      "name": "万年县",
      "parent": "361100",
      "children": null },
    {
      "id": "361130",
      "name": "婺源县",
      "parent": "361100",
      "children": null },
    {
      "id": "361181",
      "name": "德兴市",
      "parent": "361100",
      "children": null },
    {
      "id": "361182",
      "name": "其它区",
      "parent": "361100",
      "children": null }] }] },


{
  "id": "370000",
  "name": "山东省",
  "children": [{
    "id": "370100",
    "name": "济南市",
    "parent": "370000",
    "children": [{
      "id": "370102",
      "name": "历下区",
      "parent": "370100",
      "children": null },
    {
      "id": "370103",
      "name": "市中区",
      "parent": "370100",
      "children": null },
    {
      "id": "370104",
      "name": "槐荫区",
      "parent": "370100",
      "children": null },
    {
      "id": "370105",
      "name": "天桥区",
      "parent": "370100",
      "children": null },
    {
      "id": "370112",
      "name": "历城区",
      "parent": "370100",
      "children": null },
    {
      "id": "370113",
      "name": "长清区",
      "parent": "370100",
      "children": null },
    {
      "id": "370124",
      "name": "平阴县",
      "parent": "370100",
      "children": null },
    {
      "id": "370125",
      "name": "济阳县",
      "parent": "370100",
      "children": null },
    {
      "id": "370126",
      "name": "商河县",
      "parent": "370100",
      "children": null },
    {
      "id": "370181",
      "name": "章丘市",
      "parent": "370100",
      "children": null },
    {
      "id": "370182",
      "name": "其它区",
      "parent": "370100",
      "children": null }] },

  {
    "id": "370200",
    "name": "青岛市",
    "parent": "370000",
    "children": [{
      "id": "370202",
      "name": "市南区",
      "parent": "370200",
      "children": null },
    {
      "id": "370203",
      "name": "市北区",
      "parent": "370200",
      "children": null },
    {
      "id": "370205",
      "name": "四方区",
      "parent": "370200",
      "children": null },
    {
      "id": "370211",
      "name": "黄岛区",
      "parent": "370200",
      "children": null },
    {
      "id": "370212",
      "name": "崂山区",
      "parent": "370200",
      "children": null },
    {
      "id": "370213",
      "name": "李沧区",
      "parent": "370200",
      "children": null },
    {
      "id": "370214",
      "name": "城阳区",
      "parent": "370200",
      "children": null },
    {
      "id": "370251",
      "name": "开发区",
      "parent": "370200",
      "children": null },
    {
      "id": "370281",
      "name": "胶州市",
      "parent": "370200",
      "children": null },
    {
      "id": "370282",
      "name": "即墨市",
      "parent": "370200",
      "children": null },
    {
      "id": "370283",
      "name": "平度市",
      "parent": "370200",
      "children": null },
    {
      "id": "370284",
      "name": "胶南市",
      "parent": "370200",
      "children": null },
    {
      "id": "370285",
      "name": "莱西市",
      "parent": "370200",
      "children": null },
    {
      "id": "370286",
      "name": "其它区",
      "parent": "370200",
      "children": null }] },

  {
    "id": "370300",
    "name": "淄博市",
    "parent": "370000",
    "children": [{
      "id": "370302",
      "name": "淄川区",
      "parent": "370300",
      "children": null },
    {
      "id": "370303",
      "name": "张店区",
      "parent": "370300",
      "children": null },
    {
      "id": "370304",
      "name": "博山区",
      "parent": "370300",
      "children": null },
    {
      "id": "370305",
      "name": "临淄区",
      "parent": "370300",
      "children": null },
    {
      "id": "370306",
      "name": "周村区",
      "parent": "370300",
      "children": null },
    {
      "id": "370321",
      "name": "桓台县",
      "parent": "370300",
      "children": null },
    {
      "id": "370322",
      "name": "高青县",
      "parent": "370300",
      "children": null },
    {
      "id": "370323",
      "name": "沂源县",
      "parent": "370300",
      "children": null },
    {
      "id": "370324",
      "name": "其它区",
      "parent": "370300",
      "children": null }] },

  {
    "id": "370400",
    "name": "枣庄市",
    "parent": "370000",
    "children": [{
      "id": "370402",
      "name": "市中区",
      "parent": "370400",
      "children": null },
    {
      "id": "370403",
      "name": "薛城区",
      "parent": "370400",
      "children": null },
    {
      "id": "370404",
      "name": "峄城区",
      "parent": "370400",
      "children": null },
    {
      "id": "370405",
      "name": "台儿庄区",
      "parent": "370400",
      "children": null },
    {
      "id": "370406",
      "name": "山亭区",
      "parent": "370400",
      "children": null },
    {
      "id": "370481",
      "name": "滕州市",
      "parent": "370400",
      "children": null },
    {
      "id": "370482",
      "name": "其它区",
      "parent": "370400",
      "children": null }] },

  {
    "id": "370500",
    "name": "东营市",
    "parent": "370000",
    "children": [{
      "id": "370502",
      "name": "东营区",
      "parent": "370500",
      "children": null },
    {
      "id": "370503",
      "name": "河口区",
      "parent": "370500",
      "children": null },
    {
      "id": "370521",
      "name": "垦利县",
      "parent": "370500",
      "children": null },
    {
      "id": "370522",
      "name": "利津县",
      "parent": "370500",
      "children": null },
    {
      "id": "370523",
      "name": "广饶县",
      "parent": "370500",
      "children": null },
    {
      "id": "370589",
      "name": "西城区",
      "parent": "370500",
      "children": null },
    {
      "id": "370590",
      "name": "东城区",
      "parent": "370500",
      "children": null },
    {
      "id": "370591",
      "name": "其它区",
      "parent": "370500",
      "children": null }] },

  {
    "id": "370600",
    "name": "烟台市",
    "parent": "370000",
    "children": [{
      "id": "370602",
      "name": "芝罘区",
      "parent": "370600",
      "children": null },
    {
      "id": "370611",
      "name": "福山区",
      "parent": "370600",
      "children": null },
    {
      "id": "370612",
      "name": "牟平区",
      "parent": "370600",
      "children": null },
    {
      "id": "370613",
      "name": "莱山区",
      "parent": "370600",
      "children": null },
    {
      "id": "370634",
      "name": "长岛县",
      "parent": "370600",
      "children": null },
    {
      "id": "370681",
      "name": "龙口市",
      "parent": "370600",
      "children": null },
    {
      "id": "370682",
      "name": "莱阳市",
      "parent": "370600",
      "children": null },
    {
      "id": "370683",
      "name": "莱州市",
      "parent": "370600",
      "children": null },
    {
      "id": "370684",
      "name": "蓬莱市",
      "parent": "370600",
      "children": null },
    {
      "id": "370685",
      "name": "招远市",
      "parent": "370600",
      "children": null },
    {
      "id": "370686",
      "name": "栖霞市",
      "parent": "370600",
      "children": null },
    {
      "id": "370687",
      "name": "海阳市",
      "parent": "370600",
      "children": null },
    {
      "id": "370688",
      "name": "其它区",
      "parent": "370600",
      "children": null }] },

  {
    "id": "370700",
    "name": "潍坊市",
    "parent": "370000",
    "children": [{
      "id": "370702",
      "name": "潍城区",
      "parent": "370700",
      "children": null },
    {
      "id": "370703",
      "name": "寒亭区",
      "parent": "370700",
      "children": null },
    {
      "id": "370704",
      "name": "坊子区",
      "parent": "370700",
      "children": null },
    {
      "id": "370705",
      "name": "奎文区",
      "parent": "370700",
      "children": null },
    {
      "id": "370724",
      "name": "临朐县",
      "parent": "370700",
      "children": null },
    {
      "id": "370725",
      "name": "昌乐县",
      "parent": "370700",
      "children": null },
    {
      "id": "370751",
      "name": "开发区",
      "parent": "370700",
      "children": null },
    {
      "id": "370781",
      "name": "青州市",
      "parent": "370700",
      "children": null },
    {
      "id": "370782",
      "name": "诸城市",
      "parent": "370700",
      "children": null },
    {
      "id": "370783",
      "name": "寿光市",
      "parent": "370700",
      "children": null },
    {
      "id": "370784",
      "name": "安丘市",
      "parent": "370700",
      "children": null },
    {
      "id": "370785",
      "name": "高密市",
      "parent": "370700",
      "children": null },
    {
      "id": "370786",
      "name": "昌邑市",
      "parent": "370700",
      "children": null },
    {
      "id": "370787",
      "name": "其它区",
      "parent": "370700",
      "children": null }] },

  {
    "id": "370800",
    "name": "济宁市",
    "parent": "370000",
    "children": [{
      "id": "370802",
      "name": "市中区",
      "parent": "370800",
      "children": null },
    {
      "id": "370811",
      "name": "任城区",
      "parent": "370800",
      "children": null },
    {
      "id": "370826",
      "name": "微山县",
      "parent": "370800",
      "children": null },
    {
      "id": "370827",
      "name": "鱼台县",
      "parent": "370800",
      "children": null },
    {
      "id": "370828",
      "name": "金乡县",
      "parent": "370800",
      "children": null },
    {
      "id": "370829",
      "name": "嘉祥县",
      "parent": "370800",
      "children": null },
    {
      "id": "370830",
      "name": "汶上县",
      "parent": "370800",
      "children": null },
    {
      "id": "370831",
      "name": "泗水县",
      "parent": "370800",
      "children": null },
    {
      "id": "370832",
      "name": "梁山县",
      "parent": "370800",
      "children": null },
    {
      "id": "370881",
      "name": "曲阜市",
      "parent": "370800",
      "children": null },
    {
      "id": "370882",
      "name": "兖州区",
      "parent": "370800",
      "children": null },
    {
      "id": "370883",
      "name": "邹城市",
      "parent": "370800",
      "children": null },
    {
      "id": "370884",
      "name": "其它区",
      "parent": "370800",
      "children": null }] },

  {
    "id": "370900",
    "name": "泰安市",
    "parent": "370000",
    "children": [{
      "id": "370902",
      "name": "泰山区",
      "parent": "370900",
      "children": null },
    {
      "id": "370903",
      "name": "岱岳区",
      "parent": "370900",
      "children": null },
    {
      "id": "370921",
      "name": "宁阳县",
      "parent": "370900",
      "children": null },
    {
      "id": "370923",
      "name": "东平县",
      "parent": "370900",
      "children": null },
    {
      "id": "370982",
      "name": "新泰市",
      "parent": "370900",
      "children": null },
    {
      "id": "370983",
      "name": "肥城市",
      "parent": "370900",
      "children": null },
    {
      "id": "370984",
      "name": "其它区",
      "parent": "370900",
      "children": null }] },

  {
    "id": "371000",
    "name": "威海市",
    "parent": "370000",
    "children": [{
      "id": "371002",
      "name": "环翠区",
      "parent": "371000",
      "children": null },
    {
      "id": "371081",
      "name": "文登区",
      "parent": "371000",
      "children": null },
    {
      "id": "371082",
      "name": "荣成市",
      "parent": "371000",
      "children": null },
    {
      "id": "371083",
      "name": "乳山市",
      "parent": "371000",
      "children": null },
    {
      "id": "371084",
      "name": "其它区",
      "parent": "371000",
      "children": null }] },

  {
    "id": "371100",
    "name": "日照市",
    "parent": "370000",
    "children": [{
      "id": "371102",
      "name": "东港区",
      "parent": "371100",
      "children": null },
    {
      "id": "371103",
      "name": "岚山区",
      "parent": "371100",
      "children": null },
    {
      "id": "371121",
      "name": "五莲县",
      "parent": "371100",
      "children": null },
    {
      "id": "371122",
      "name": "莒县",
      "parent": "371100",
      "children": null },
    {
      "id": "371123",
      "name": "其它区",
      "parent": "371100",
      "children": null }] },

  {
    "id": "371200",
    "name": "莱芜市",
    "parent": "370000",
    "children": [{
      "id": "371202",
      "name": "莱城区",
      "parent": "371200",
      "children": null },
    {
      "id": "371203",
      "name": "钢城区",
      "parent": "371200",
      "children": null },
    {
      "id": "371204",
      "name": "其它区",
      "parent": "371200",
      "children": null }] },

  {
    "id": "371300",
    "name": "临沂市",
    "parent": "370000",
    "children": [{
      "id": "371302",
      "name": "兰山区",
      "parent": "371300",
      "children": null },
    {
      "id": "371311",
      "name": "罗庄区",
      "parent": "371300",
      "children": null },
    {
      "id": "371312",
      "name": "河东区",
      "parent": "371300",
      "children": null },
    {
      "id": "371321",
      "name": "沂南县",
      "parent": "371300",
      "children": null },
    {
      "id": "371322",
      "name": "郯城县",
      "parent": "371300",
      "children": null },
    {
      "id": "371323",
      "name": "沂水县",
      "parent": "371300",
      "children": null },
    {
      "id": "371324",
      "name": "兰陵县",
      "parent": "371300",
      "children": null },
    {
      "id": "371325",
      "name": "费县",
      "parent": "371300",
      "children": null },
    {
      "id": "371326",
      "name": "平邑县",
      "parent": "371300",
      "children": null },
    {
      "id": "371327",
      "name": "莒南县",
      "parent": "371300",
      "children": null },
    {
      "id": "371328",
      "name": "蒙阴县",
      "parent": "371300",
      "children": null },
    {
      "id": "371329",
      "name": "临沭县",
      "parent": "371300",
      "children": null },
    {
      "id": "371330",
      "name": "其它区",
      "parent": "371300",
      "children": null }] },

  {
    "id": "371400",
    "name": "德州市",
    "parent": "370000",
    "children": [{
      "id": "371402",
      "name": "德城区",
      "parent": "371400",
      "children": null },
    {
      "id": "371421",
      "name": "陵城区",
      "parent": "371400",
      "children": null },
    {
      "id": "371422",
      "name": "宁津县",
      "parent": "371400",
      "children": null },
    {
      "id": "371423",
      "name": "庆云县",
      "parent": "371400",
      "children": null },
    {
      "id": "371424",
      "name": "临邑县",
      "parent": "371400",
      "children": null },
    {
      "id": "371425",
      "name": "齐河县",
      "parent": "371400",
      "children": null },
    {
      "id": "371426",
      "name": "平原县",
      "parent": "371400",
      "children": null },
    {
      "id": "371427",
      "name": "夏津县",
      "parent": "371400",
      "children": null },
    {
      "id": "371428",
      "name": "武城县",
      "parent": "371400",
      "children": null },
    {
      "id": "371451",
      "name": "开发区",
      "parent": "371400",
      "children": null },
    {
      "id": "371481",
      "name": "乐陵市",
      "parent": "371400",
      "children": null },
    {
      "id": "371482",
      "name": "禹城市",
      "parent": "371400",
      "children": null },
    {
      "id": "371483",
      "name": "其它区",
      "parent": "371400",
      "children": null }] },

  {
    "id": "371500",
    "name": "聊城市",
    "parent": "370000",
    "children": [{
      "id": "371502",
      "name": "东昌府区",
      "parent": "371500",
      "children": null },
    {
      "id": "371521",
      "name": "阳谷县",
      "parent": "371500",
      "children": null },
    {
      "id": "371522",
      "name": "莘县",
      "parent": "371500",
      "children": null },
    {
      "id": "371523",
      "name": "茌平县",
      "parent": "371500",
      "children": null },
    {
      "id": "371524",
      "name": "东阿县",
      "parent": "371500",
      "children": null },
    {
      "id": "371525",
      "name": "冠县",
      "parent": "371500",
      "children": null },
    {
      "id": "371526",
      "name": "高唐县",
      "parent": "371500",
      "children": null },
    {
      "id": "371581",
      "name": "临清市",
      "parent": "371500",
      "children": null },
    {
      "id": "371582",
      "name": "其它区",
      "parent": "371500",
      "children": null }] },

  {
    "id": "371600",
    "name": "滨州市",
    "parent": "370000",
    "children": [{
      "id": "371602",
      "name": "滨城区",
      "parent": "371600",
      "children": null },
    {
      "id": "371621",
      "name": "惠民县",
      "parent": "371600",
      "children": null },
    {
      "id": "371622",
      "name": "阳信县",
      "parent": "371600",
      "children": null },
    {
      "id": "371623",
      "name": "无棣县",
      "parent": "371600",
      "children": null },
    {
      "id": "371624",
      "name": "沾化区",
      "parent": "371600",
      "children": null },
    {
      "id": "371625",
      "name": "博兴县",
      "parent": "371600",
      "children": null },
    {
      "id": "371626",
      "name": "邹平县",
      "parent": "371600",
      "children": null },
    {
      "id": "371627",
      "name": "其它区",
      "parent": "371600",
      "children": null }] },

  {
    "id": "371700",
    "name": "菏泽市",
    "parent": "370000",
    "children": [{
      "id": "371702",
      "name": "牡丹区",
      "parent": "371700",
      "children": null },
    {
      "id": "371721",
      "name": "曹县",
      "parent": "371700",
      "children": null },
    {
      "id": "371722",
      "name": "单县",
      "parent": "371700",
      "children": null },
    {
      "id": "371723",
      "name": "成武县",
      "parent": "371700",
      "children": null },
    {
      "id": "371724",
      "name": "巨野县",
      "parent": "371700",
      "children": null },
    {
      "id": "371725",
      "name": "郓城县",
      "parent": "371700",
      "children": null },
    {
      "id": "371726",
      "name": "鄄城县",
      "parent": "371700",
      "children": null },
    {
      "id": "371727",
      "name": "定陶县",
      "parent": "371700",
      "children": null },
    {
      "id": "371728",
      "name": "东明县",
      "parent": "371700",
      "children": null },
    {
      "id": "371729",
      "name": "其它区",
      "parent": "371700",
      "children": null }] }] },


{
  "id": "410000",
  "name": "河南省",
  "children": [{
    "id": "410100",
    "name": "郑州市",
    "parent": "410000",
    "children": [{
      "id": "410102",
      "name": "中原区",
      "parent": "410100",
      "children": null },
    {
      "id": "410103",
      "name": "二七区",
      "parent": "410100",
      "children": null },
    {
      "id": "410104",
      "name": "管城回族区",
      "parent": "410100",
      "children": null },
    {
      "id": "410105",
      "name": "金水区",
      "parent": "410100",
      "children": null },
    {
      "id": "410106",
      "name": "上街区",
      "parent": "410100",
      "children": null },
    {
      "id": "410108",
      "name": "惠济区",
      "parent": "410100",
      "children": null },
    {
      "id": "410122",
      "name": "中牟县",
      "parent": "410100",
      "children": null },
    {
      "id": "410181",
      "name": "巩义市",
      "parent": "410100",
      "children": null },
    {
      "id": "410182",
      "name": "荥阳市",
      "parent": "410100",
      "children": null },
    {
      "id": "410183",
      "name": "新密市",
      "parent": "410100",
      "children": null },
    {
      "id": "410184",
      "name": "新郑市",
      "parent": "410100",
      "children": null },
    {
      "id": "410185",
      "name": "登封市",
      "parent": "410100",
      "children": null },
    {
      "id": "410186",
      "name": "郑东新区",
      "parent": "410100",
      "children": null },
    {
      "id": "410187",
      "name": "高新区",
      "parent": "410100",
      "children": null },
    {
      "id": "410188",
      "name": "其它区",
      "parent": "410100",
      "children": null }] },

  {
    "id": "410200",
    "name": "开封市",
    "parent": "410000",
    "children": [{
      "id": "410202",
      "name": "龙亭区",
      "parent": "410200",
      "children": null },
    {
      "id": "410203",
      "name": "顺河回族区",
      "parent": "410200",
      "children": null },
    {
      "id": "410204",
      "name": "鼓楼区",
      "parent": "410200",
      "children": null },
    {
      "id": "410205",
      "name": "禹王台区",
      "parent": "410200",
      "children": null },
    {
      "id": "410211",
      "name": "金明区",
      "parent": "410200",
      "children": null },
    {
      "id": "410221",
      "name": "杞县",
      "parent": "410200",
      "children": null },
    {
      "id": "410222",
      "name": "通许县",
      "parent": "410200",
      "children": null },
    {
      "id": "410223",
      "name": "尉氏县",
      "parent": "410200",
      "children": null },
    {
      "id": "410224",
      "name": "祥符区",
      "parent": "410200",
      "children": null },
    {
      "id": "410225",
      "name": "兰考县",
      "parent": "410200",
      "children": null },
    {
      "id": "410226",
      "name": "其它区",
      "parent": "410200",
      "children": null }] },

  {
    "id": "410300",
    "name": "洛阳市",
    "parent": "410000",
    "children": [{
      "id": "410302",
      "name": "老城区",
      "parent": "410300",
      "children": null },
    {
      "id": "410303",
      "name": "西工区",
      "parent": "410300",
      "children": null },
    {
      "id": "410304",
      "name": "瀍河回族区",
      "parent": "410300",
      "children": null },
    {
      "id": "410305",
      "name": "涧西区",
      "parent": "410300",
      "children": null },
    {
      "id": "410306",
      "name": "吉利区",
      "parent": "410300",
      "children": null },
    {
      "id": "410307",
      "name": "洛龙区",
      "parent": "410300",
      "children": null },
    {
      "id": "410322",
      "name": "孟津县",
      "parent": "410300",
      "children": null },
    {
      "id": "410323",
      "name": "新安县",
      "parent": "410300",
      "children": null },
    {
      "id": "410324",
      "name": "栾川县",
      "parent": "410300",
      "children": null },
    {
      "id": "410325",
      "name": "嵩县",
      "parent": "410300",
      "children": null },
    {
      "id": "410326",
      "name": "汝阳县",
      "parent": "410300",
      "children": null },
    {
      "id": "410327",
      "name": "宜阳县",
      "parent": "410300",
      "children": null },
    {
      "id": "410328",
      "name": "洛宁县",
      "parent": "410300",
      "children": null },
    {
      "id": "410329",
      "name": "伊川县",
      "parent": "410300",
      "children": null },
    {
      "id": "410381",
      "name": "偃师市",
      "parent": "410300",
      "children": null },
    {
      "id": "471004",
      "name": "高新区",
      "parent": "410300",
      "children": null },
    {
      "id": "471005",
      "name": "其它区",
      "parent": "410300",
      "children": null }] },

  {
    "id": "410400",
    "name": "平顶山市",
    "parent": "410000",
    "children": [{
      "id": "410402",
      "name": "新华区",
      "parent": "410400",
      "children": null },
    {
      "id": "410403",
      "name": "卫东区",
      "parent": "410400",
      "children": null },
    {
      "id": "410404",
      "name": "石龙区",
      "parent": "410400",
      "children": null },
    {
      "id": "410411",
      "name": "湛河区",
      "parent": "410400",
      "children": null },
    {
      "id": "410421",
      "name": "宝丰县",
      "parent": "410400",
      "children": null },
    {
      "id": "410422",
      "name": "叶县",
      "parent": "410400",
      "children": null },
    {
      "id": "410423",
      "name": "鲁山县",
      "parent": "410400",
      "children": null },
    {
      "id": "410425",
      "name": "郏县",
      "parent": "410400",
      "children": null },
    {
      "id": "410481",
      "name": "舞钢市",
      "parent": "410400",
      "children": null },
    {
      "id": "410482",
      "name": "汝州市",
      "parent": "410400",
      "children": null },
    {
      "id": "410483",
      "name": "其它区",
      "parent": "410400",
      "children": null }] },

  {
    "id": "410500",
    "name": "安阳市",
    "parent": "410000",
    "children": [{
      "id": "410502",
      "name": "文峰区",
      "parent": "410500",
      "children": null },
    {
      "id": "410503",
      "name": "北关区",
      "parent": "410500",
      "children": null },
    {
      "id": "410505",
      "name": "殷都区",
      "parent": "410500",
      "children": null },
    {
      "id": "410506",
      "name": "龙安区",
      "parent": "410500",
      "children": null },
    {
      "id": "410522",
      "name": "安阳县",
      "parent": "410500",
      "children": null },
    {
      "id": "410523",
      "name": "汤阴县",
      "parent": "410500",
      "children": null },
    {
      "id": "410526",
      "name": "滑县",
      "parent": "410500",
      "children": null },
    {
      "id": "410527",
      "name": "内黄县",
      "parent": "410500",
      "children": null },
    {
      "id": "410581",
      "name": "林州市",
      "parent": "410500",
      "children": null },
    {
      "id": "410582",
      "name": "其它区",
      "parent": "410500",
      "children": null }] },

  {
    "id": "410600",
    "name": "鹤壁市",
    "parent": "410000",
    "children": [{
      "id": "410602",
      "name": "鹤山区",
      "parent": "410600",
      "children": null },
    {
      "id": "410603",
      "name": "山城区",
      "parent": "410600",
      "children": null },
    {
      "id": "410611",
      "name": "淇滨区",
      "parent": "410600",
      "children": null },
    {
      "id": "410621",
      "name": "浚县",
      "parent": "410600",
      "children": null },
    {
      "id": "410622",
      "name": "淇县",
      "parent": "410600",
      "children": null },
    {
      "id": "410623",
      "name": "其它区",
      "parent": "410600",
      "children": null }] },

  {
    "id": "410700",
    "name": "新乡市",
    "parent": "410000",
    "children": [{
      "id": "410702",
      "name": "红旗区",
      "parent": "410700",
      "children": null },
    {
      "id": "410703",
      "name": "卫滨区",
      "parent": "410700",
      "children": null },
    {
      "id": "410704",
      "name": "凤泉区",
      "parent": "410700",
      "children": null },
    {
      "id": "410711",
      "name": "牧野区",
      "parent": "410700",
      "children": null },
    {
      "id": "410721",
      "name": "新乡县",
      "parent": "410700",
      "children": null },
    {
      "id": "410724",
      "name": "获嘉县",
      "parent": "410700",
      "children": null },
    {
      "id": "410725",
      "name": "原阳县",
      "parent": "410700",
      "children": null },
    {
      "id": "410726",
      "name": "延津县",
      "parent": "410700",
      "children": null },
    {
      "id": "410727",
      "name": "封丘县",
      "parent": "410700",
      "children": null },
    {
      "id": "410728",
      "name": "长垣县",
      "parent": "410700",
      "children": null },
    {
      "id": "410781",
      "name": "卫辉市",
      "parent": "410700",
      "children": null },
    {
      "id": "410782",
      "name": "辉县市",
      "parent": "410700",
      "children": null },
    {
      "id": "410783",
      "name": "其它区",
      "parent": "410700",
      "children": null }] },

  {
    "id": "410800",
    "name": "焦作市",
    "parent": "410000",
    "children": [{
      "id": "410802",
      "name": "解放区",
      "parent": "410800",
      "children": null },
    {
      "id": "410803",
      "name": "中站区",
      "parent": "410800",
      "children": null },
    {
      "id": "410804",
      "name": "马村区",
      "parent": "410800",
      "children": null },
    {
      "id": "410811",
      "name": "山阳区",
      "parent": "410800",
      "children": null },
    {
      "id": "410821",
      "name": "修武县",
      "parent": "410800",
      "children": null },
    {
      "id": "410822",
      "name": "博爱县",
      "parent": "410800",
      "children": null },
    {
      "id": "410823",
      "name": "武陟县",
      "parent": "410800",
      "children": null },
    {
      "id": "410825",
      "name": "温县",
      "parent": "410800",
      "children": null },
    {
      "id": "410882",
      "name": "沁阳市",
      "parent": "410800",
      "children": null },
    {
      "id": "410883",
      "name": "孟州市",
      "parent": "410800",
      "children": null },
    {
      "id": "410884",
      "name": "其它区",
      "parent": "410800",
      "children": null }] },

  {
    "id": "410900",
    "name": "濮阳市",
    "parent": "410000",
    "children": [{
      "id": "410902",
      "name": "华龙区",
      "parent": "410900",
      "children": null },
    {
      "id": "410922",
      "name": "清丰县",
      "parent": "410900",
      "children": null },
    {
      "id": "410923",
      "name": "南乐县",
      "parent": "410900",
      "children": null },
    {
      "id": "410926",
      "name": "范县",
      "parent": "410900",
      "children": null },
    {
      "id": "410927",
      "name": "台前县",
      "parent": "410900",
      "children": null },
    {
      "id": "410928",
      "name": "濮阳县",
      "parent": "410900",
      "children": null },
    {
      "id": "410929",
      "name": "其它区",
      "parent": "410900",
      "children": null }] },

  {
    "id": "411000",
    "name": "许昌市",
    "parent": "410000",
    "children": [{
      "id": "411002",
      "name": "魏都区",
      "parent": "411000",
      "children": null },
    {
      "id": "411023",
      "name": "许昌县",
      "parent": "411000",
      "children": null },
    {
      "id": "411024",
      "name": "鄢陵县",
      "parent": "411000",
      "children": null },
    {
      "id": "411025",
      "name": "襄城县",
      "parent": "411000",
      "children": null },
    {
      "id": "411081",
      "name": "禹州市",
      "parent": "411000",
      "children": null },
    {
      "id": "411082",
      "name": "长葛市",
      "parent": "411000",
      "children": null },
    {
      "id": "411083",
      "name": "其它区",
      "parent": "411000",
      "children": null }] },

  {
    "id": "411100",
    "name": "漯河市",
    "parent": "410000",
    "children": [{
      "id": "411102",
      "name": "源汇区",
      "parent": "411100",
      "children": null },
    {
      "id": "411103",
      "name": "郾城区",
      "parent": "411100",
      "children": null },
    {
      "id": "411104",
      "name": "召陵区",
      "parent": "411100",
      "children": null },
    {
      "id": "411121",
      "name": "舞阳县",
      "parent": "411100",
      "children": null },
    {
      "id": "411122",
      "name": "临颍县",
      "parent": "411100",
      "children": null },
    {
      "id": "411123",
      "name": "其它区",
      "parent": "411100",
      "children": null }] },

  {
    "id": "411200",
    "name": "三门峡市",
    "parent": "410000",
    "children": [{
      "id": "411202",
      "name": "湖滨区",
      "parent": "411200",
      "children": null },
    {
      "id": "411221",
      "name": "渑池县",
      "parent": "411200",
      "children": null },
    {
      "id": "411222",
      "name": "陕州区",
      "parent": "411200",
      "children": null },
    {
      "id": "411224",
      "name": "卢氏县",
      "parent": "411200",
      "children": null },
    {
      "id": "411281",
      "name": "义马市",
      "parent": "411200",
      "children": null },
    {
      "id": "411282",
      "name": "灵宝市",
      "parent": "411200",
      "children": null },
    {
      "id": "411283",
      "name": "其它区",
      "parent": "411200",
      "children": null }] },

  {
    "id": "411300",
    "name": "南阳市",
    "parent": "410000",
    "children": [{
      "id": "411302",
      "name": "宛城区",
      "parent": "411300",
      "children": null },
    {
      "id": "411303",
      "name": "卧龙区",
      "parent": "411300",
      "children": null },
    {
      "id": "411321",
      "name": "南召县",
      "parent": "411300",
      "children": null },
    {
      "id": "411322",
      "name": "方城县",
      "parent": "411300",
      "children": null },
    {
      "id": "411323",
      "name": "西峡县",
      "parent": "411300",
      "children": null },
    {
      "id": "411324",
      "name": "镇平县",
      "parent": "411300",
      "children": null },
    {
      "id": "411325",
      "name": "内乡县",
      "parent": "411300",
      "children": null },
    {
      "id": "411326",
      "name": "淅川县",
      "parent": "411300",
      "children": null },
    {
      "id": "411327",
      "name": "社旗县",
      "parent": "411300",
      "children": null },
    {
      "id": "411328",
      "name": "唐河县",
      "parent": "411300",
      "children": null },
    {
      "id": "411329",
      "name": "新野县",
      "parent": "411300",
      "children": null },
    {
      "id": "411330",
      "name": "桐柏县",
      "parent": "411300",
      "children": null },
    {
      "id": "411381",
      "name": "邓州市",
      "parent": "411300",
      "children": null },
    {
      "id": "411382",
      "name": "其它区",
      "parent": "411300",
      "children": null }] },

  {
    "id": "411400",
    "name": "商丘市",
    "parent": "410000",
    "children": [{
      "id": "411402",
      "name": "梁园区",
      "parent": "411400",
      "children": null },
    {
      "id": "411403",
      "name": "睢阳区",
      "parent": "411400",
      "children": null },
    {
      "id": "411421",
      "name": "民权县",
      "parent": "411400",
      "children": null },
    {
      "id": "411422",
      "name": "睢县",
      "parent": "411400",
      "children": null },
    {
      "id": "411423",
      "name": "宁陵县",
      "parent": "411400",
      "children": null },
    {
      "id": "411424",
      "name": "柘城县",
      "parent": "411400",
      "children": null },
    {
      "id": "411425",
      "name": "虞城县",
      "parent": "411400",
      "children": null },
    {
      "id": "411426",
      "name": "夏邑县",
      "parent": "411400",
      "children": null },
    {
      "id": "411481",
      "name": "永城市",
      "parent": "411400",
      "children": null },
    {
      "id": "411482",
      "name": "其它区",
      "parent": "411400",
      "children": null }] },

  {
    "id": "411500",
    "name": "信阳市",
    "parent": "410000",
    "children": [{
      "id": "411502",
      "name": "浉河区",
      "parent": "411500",
      "children": null },
    {
      "id": "411503",
      "name": "平桥区",
      "parent": "411500",
      "children": null },
    {
      "id": "411521",
      "name": "罗山县",
      "parent": "411500",
      "children": null },
    {
      "id": "411522",
      "name": "光山县",
      "parent": "411500",
      "children": null },
    {
      "id": "411523",
      "name": "新县",
      "parent": "411500",
      "children": null },
    {
      "id": "411524",
      "name": "商城县",
      "parent": "411500",
      "children": null },
    {
      "id": "411525",
      "name": "固始县",
      "parent": "411500",
      "children": null },
    {
      "id": "411526",
      "name": "潢川县",
      "parent": "411500",
      "children": null },
    {
      "id": "411527",
      "name": "淮滨县",
      "parent": "411500",
      "children": null },
    {
      "id": "411528",
      "name": "息县",
      "parent": "411500",
      "children": null },
    {
      "id": "411529",
      "name": "其它区",
      "parent": "411500",
      "children": null }] },

  {
    "id": "411600",
    "name": "周口市",
    "parent": "410000",
    "children": [{
      "id": "411602",
      "name": "川汇区",
      "parent": "411600",
      "children": null },
    {
      "id": "411621",
      "name": "扶沟县",
      "parent": "411600",
      "children": null },
    {
      "id": "411622",
      "name": "西华县",
      "parent": "411600",
      "children": null },
    {
      "id": "411623",
      "name": "商水县",
      "parent": "411600",
      "children": null },
    {
      "id": "411624",
      "name": "沈丘县",
      "parent": "411600",
      "children": null },
    {
      "id": "411625",
      "name": "郸城县",
      "parent": "411600",
      "children": null },
    {
      "id": "411626",
      "name": "淮阳县",
      "parent": "411600",
      "children": null },
    {
      "id": "411627",
      "name": "太康县",
      "parent": "411600",
      "children": null },
    {
      "id": "411628",
      "name": "鹿邑县",
      "parent": "411600",
      "children": null },
    {
      "id": "411681",
      "name": "项城市",
      "parent": "411600",
      "children": null },
    {
      "id": "411682",
      "name": "其它区",
      "parent": "411600",
      "children": null }] },

  {
    "id": "411700",
    "name": "驻马店市",
    "parent": "410000",
    "children": [{
      "id": "411702",
      "name": "驿城区",
      "parent": "411700",
      "children": null },
    {
      "id": "411721",
      "name": "西平县",
      "parent": "411700",
      "children": null },
    {
      "id": "411722",
      "name": "上蔡县",
      "parent": "411700",
      "children": null },
    {
      "id": "411723",
      "name": "平舆县",
      "parent": "411700",
      "children": null },
    {
      "id": "411724",
      "name": "正阳县",
      "parent": "411700",
      "children": null },
    {
      "id": "411725",
      "name": "确山县",
      "parent": "411700",
      "children": null },
    {
      "id": "411726",
      "name": "泌阳县",
      "parent": "411700",
      "children": null },
    {
      "id": "411727",
      "name": "汝南县",
      "parent": "411700",
      "children": null },
    {
      "id": "411728",
      "name": "遂平县",
      "parent": "411700",
      "children": null },
    {
      "id": "411729",
      "name": "新蔡县",
      "parent": "411700",
      "children": null },
    {
      "id": "411730",
      "name": "其它区",
      "parent": "411700",
      "children": null }] },

  {
    "id": "410881",
    "name": "济源市",
    "parent": "410000",
    "children": null }] },

{
  "id": "420000",
  "name": "湖北省",
  "children": [{
    "id": "420100",
    "name": "武汉市",
    "parent": "420000",
    "children": [{
      "id": "420102",
      "name": "江岸区",
      "parent": "420100",
      "children": null },
    {
      "id": "420103",
      "name": "江汉区",
      "parent": "420100",
      "children": null },
    {
      "id": "420104",
      "name": "硚口区",
      "parent": "420100",
      "children": null },
    {
      "id": "420105",
      "name": "汉阳区",
      "parent": "420100",
      "children": null },
    {
      "id": "420106",
      "name": "武昌区",
      "parent": "420100",
      "children": null },
    {
      "id": "420107",
      "name": "青山区",
      "parent": "420100",
      "children": null },
    {
      "id": "420111",
      "name": "洪山区",
      "parent": "420100",
      "children": null },
    {
      "id": "420112",
      "name": "东西湖区",
      "parent": "420100",
      "children": null },
    {
      "id": "420113",
      "name": "汉南区",
      "parent": "420100",
      "children": null },
    {
      "id": "420114",
      "name": "蔡甸区",
      "parent": "420100",
      "children": null },
    {
      "id": "420115",
      "name": "江夏区",
      "parent": "420100",
      "children": null },
    {
      "id": "420116",
      "name": "黄陂区",
      "parent": "420100",
      "children": null },
    {
      "id": "420117",
      "name": "新洲区",
      "parent": "420100",
      "children": null },
    {
      "id": "420118",
      "name": "其它区",
      "parent": "420100",
      "children": null }] },

  {
    "id": "420200",
    "name": "黄石市",
    "parent": "420000",
    "children": [{
      "id": "420202",
      "name": "黄石港区",
      "parent": "420200",
      "children": null },
    {
      "id": "420203",
      "name": "西塞山区",
      "parent": "420200",
      "children": null },
    {
      "id": "420204",
      "name": "下陆区",
      "parent": "420200",
      "children": null },
    {
      "id": "420205",
      "name": "铁山区",
      "parent": "420200",
      "children": null },
    {
      "id": "420222",
      "name": "阳新县",
      "parent": "420200",
      "children": null },
    {
      "id": "420281",
      "name": "大冶市",
      "parent": "420200",
      "children": null },
    {
      "id": "420282",
      "name": "其它区",
      "parent": "420200",
      "children": null }] },

  {
    "id": "420300",
    "name": "十堰市",
    "parent": "420000",
    "children": [{
      "id": "420302",
      "name": "茅箭区",
      "parent": "420300",
      "children": null },
    {
      "id": "420303",
      "name": "张湾区",
      "parent": "420300",
      "children": null },
    {
      "id": "420321",
      "name": "郧阳区",
      "parent": "420300",
      "children": null },
    {
      "id": "420322",
      "name": "郧西县",
      "parent": "420300",
      "children": null },
    {
      "id": "420323",
      "name": "竹山县",
      "parent": "420300",
      "children": null },
    {
      "id": "420324",
      "name": "竹溪县",
      "parent": "420300",
      "children": null },
    {
      "id": "420325",
      "name": "房县",
      "parent": "420300",
      "children": null },
    {
      "id": "420381",
      "name": "丹江口市",
      "parent": "420300",
      "children": null },
    {
      "id": "420382",
      "name": "城区",
      "parent": "420300",
      "children": null },
    {
      "id": "420383",
      "name": "其它区",
      "parent": "420300",
      "children": null }] },

  {
    "id": "420500",
    "name": "宜昌市",
    "parent": "420000",
    "children": [{
      "id": "420502",
      "name": "西陵区",
      "parent": "420500",
      "children": null },
    {
      "id": "420503",
      "name": "伍家岗区",
      "parent": "420500",
      "children": null },
    {
      "id": "420504",
      "name": "点军区",
      "parent": "420500",
      "children": null },
    {
      "id": "420505",
      "name": "猇亭区",
      "parent": "420500",
      "children": null },
    {
      "id": "420506",
      "name": "夷陵区",
      "parent": "420500",
      "children": null },
    {
      "id": "420525",
      "name": "远安县",
      "parent": "420500",
      "children": null },
    {
      "id": "420526",
      "name": "兴山县",
      "parent": "420500",
      "children": null },
    {
      "id": "420527",
      "name": "秭归县",
      "parent": "420500",
      "children": null },
    {
      "id": "420528",
      "name": "长阳土家族自治县",
      "parent": "420500",
      "children": null },
    {
      "id": "420529",
      "name": "五峰土家族自治县",
      "parent": "420500",
      "children": null },
    {
      "id": "420551",
      "name": "葛洲坝区",
      "parent": "420500",
      "children": null },
    {
      "id": "420552",
      "name": "开发区",
      "parent": "420500",
      "children": null },
    {
      "id": "420581",
      "name": "宜都市",
      "parent": "420500",
      "children": null },
    {
      "id": "420582",
      "name": "当阳市",
      "parent": "420500",
      "children": null },
    {
      "id": "420583",
      "name": "枝江市",
      "parent": "420500",
      "children": null },
    {
      "id": "420584",
      "name": "其它区",
      "parent": "420500",
      "children": null }] },

  {
    "id": "420600",
    "name": "襄阳市",
    "parent": "420000",
    "children": [{
      "id": "420602",
      "name": "襄城区",
      "parent": "420600",
      "children": null },
    {
      "id": "420606",
      "name": "樊城区",
      "parent": "420600",
      "children": null },
    {
      "id": "420607",
      "name": "襄州区",
      "parent": "420600",
      "children": null },
    {
      "id": "420624",
      "name": "南漳县",
      "parent": "420600",
      "children": null },
    {
      "id": "420625",
      "name": "谷城县",
      "parent": "420600",
      "children": null },
    {
      "id": "420626",
      "name": "保康县",
      "parent": "420600",
      "children": null },
    {
      "id": "420682",
      "name": "老河口市",
      "parent": "420600",
      "children": null },
    {
      "id": "420683",
      "name": "枣阳市",
      "parent": "420600",
      "children": null },
    {
      "id": "420684",
      "name": "宜城市",
      "parent": "420600",
      "children": null },
    {
      "id": "420685",
      "name": "其它区",
      "parent": "420600",
      "children": null }] },

  {
    "id": "420700",
    "name": "鄂州市",
    "parent": "420000",
    "children": [{
      "id": "420702",
      "name": "梁子湖区",
      "parent": "420700",
      "children": null },
    {
      "id": "420703",
      "name": "华容区",
      "parent": "420700",
      "children": null },
    {
      "id": "420704",
      "name": "鄂城区",
      "parent": "420700",
      "children": null },
    {
      "id": "420705",
      "name": "其它区",
      "parent": "420700",
      "children": null }] },

  {
    "id": "420800",
    "name": "荆门市",
    "parent": "420000",
    "children": [{
      "id": "420802",
      "name": "东宝区",
      "parent": "420800",
      "children": null },
    {
      "id": "420804",
      "name": "掇刀区",
      "parent": "420800",
      "children": null },
    {
      "id": "420821",
      "name": "京山县",
      "parent": "420800",
      "children": null },
    {
      "id": "420822",
      "name": "沙洋县",
      "parent": "420800",
      "children": null },
    {
      "id": "420881",
      "name": "钟祥市",
      "parent": "420800",
      "children": null },
    {
      "id": "420882",
      "name": "其它区",
      "parent": "420800",
      "children": null }] },

  {
    "id": "420900",
    "name": "孝感市",
    "parent": "420000",
    "children": [{
      "id": "420902",
      "name": "孝南区",
      "parent": "420900",
      "children": null },
    {
      "id": "420921",
      "name": "孝昌县",
      "parent": "420900",
      "children": null },
    {
      "id": "420922",
      "name": "大悟县",
      "parent": "420900",
      "children": null },
    {
      "id": "420923",
      "name": "云梦县",
      "parent": "420900",
      "children": null },
    {
      "id": "420981",
      "name": "应城市",
      "parent": "420900",
      "children": null },
    {
      "id": "420982",
      "name": "安陆市",
      "parent": "420900",
      "children": null },
    {
      "id": "420984",
      "name": "汉川市",
      "parent": "420900",
      "children": null },
    {
      "id": "420985",
      "name": "其它区",
      "parent": "420900",
      "children": null }] },

  {
    "id": "421000",
    "name": "荆州市",
    "parent": "420000",
    "children": [{
      "id": "421002",
      "name": "沙市区",
      "parent": "421000",
      "children": null },
    {
      "id": "421003",
      "name": "荆州区",
      "parent": "421000",
      "children": null },
    {
      "id": "421022",
      "name": "公安县",
      "parent": "421000",
      "children": null },
    {
      "id": "421023",
      "name": "监利县",
      "parent": "421000",
      "children": null },
    {
      "id": "421024",
      "name": "江陵县",
      "parent": "421000",
      "children": null },
    {
      "id": "421081",
      "name": "石首市",
      "parent": "421000",
      "children": null },
    {
      "id": "421083",
      "name": "洪湖市",
      "parent": "421000",
      "children": null },
    {
      "id": "421087",
      "name": "松滋市",
      "parent": "421000",
      "children": null },
    {
      "id": "421088",
      "name": "其它区",
      "parent": "421000",
      "children": null }] },

  {
    "id": "421100",
    "name": "黄冈市",
    "parent": "420000",
    "children": [{
      "id": "421102",
      "name": "黄州区",
      "parent": "421100",
      "children": null },
    {
      "id": "421121",
      "name": "团风县",
      "parent": "421100",
      "children": null },
    {
      "id": "421122",
      "name": "红安县",
      "parent": "421100",
      "children": null },
    {
      "id": "421123",
      "name": "罗田县",
      "parent": "421100",
      "children": null },
    {
      "id": "421124",
      "name": "英山县",
      "parent": "421100",
      "children": null },
    {
      "id": "421125",
      "name": "浠水县",
      "parent": "421100",
      "children": null },
    {
      "id": "421126",
      "name": "蕲春县",
      "parent": "421100",
      "children": null },
    {
      "id": "421127",
      "name": "黄梅县",
      "parent": "421100",
      "children": null },
    {
      "id": "421181",
      "name": "麻城市",
      "parent": "421100",
      "children": null },
    {
      "id": "421182",
      "name": "武穴市",
      "parent": "421100",
      "children": null },
    {
      "id": "421183",
      "name": "其它区",
      "parent": "421100",
      "children": null }] },

  {
    "id": "421200",
    "name": "咸宁市",
    "parent": "420000",
    "children": [{
      "id": "421202",
      "name": "咸安区",
      "parent": "421200",
      "children": null },
    {
      "id": "421221",
      "name": "嘉鱼县",
      "parent": "421200",
      "children": null },
    {
      "id": "421222",
      "name": "通城县",
      "parent": "421200",
      "children": null },
    {
      "id": "421223",
      "name": "崇阳县",
      "parent": "421200",
      "children": null },
    {
      "id": "421224",
      "name": "通山县",
      "parent": "421200",
      "children": null },
    {
      "id": "421281",
      "name": "赤壁市",
      "parent": "421200",
      "children": null },
    {
      "id": "421282",
      "name": "温泉城区",
      "parent": "421200",
      "children": null },
    {
      "id": "421283",
      "name": "其它区",
      "parent": "421200",
      "children": null }] },

  {
    "id": "421300",
    "name": "随州市",
    "parent": "420000",
    "children": [{
      "id": "421302",
      "name": "曾都区",
      "parent": "421300",
      "children": null },
    {
      "id": "421321",
      "name": "随县",
      "parent": "421300",
      "children": null },
    {
      "id": "421381",
      "name": "广水市",
      "parent": "421300",
      "children": null },
    {
      "id": "421382",
      "name": "其它区",
      "parent": "421300",
      "children": null }] },

  {
    "id": "422800",
    "name": "恩施土家族苗族自治州",
    "parent": "420000",
    "children": [{
      "id": "422801",
      "name": "恩施市",
      "parent": "422800",
      "children": null },
    {
      "id": "422802",
      "name": "利川市",
      "parent": "422800",
      "children": null },
    {
      "id": "422822",
      "name": "建始县",
      "parent": "422800",
      "children": null },
    {
      "id": "422823",
      "name": "巴东县",
      "parent": "422800",
      "children": null },
    {
      "id": "422825",
      "name": "宣恩县",
      "parent": "422800",
      "children": null },
    {
      "id": "422826",
      "name": "咸丰县",
      "parent": "422800",
      "children": null },
    {
      "id": "422827",
      "name": "来凤县",
      "parent": "422800",
      "children": null },
    {
      "id": "422828",
      "name": "鹤峰县",
      "parent": "422800",
      "children": null },
    {
      "id": "422829",
      "name": "其它区",
      "parent": "422800",
      "children": null }] },

  {
    "id": "429004",
    "name": "仙桃市",
    "parent": "420000",
    "children": null },
  {
    "id": "429005",
    "name": "潜江市",
    "parent": "420000",
    "children": null },
  {
    "id": "429006",
    "name": "天门市",
    "parent": "420000",
    "children": null },
  {
    "id": "429021",
    "name": "神农架林区",
    "parent": "420000",
    "children": null }] },

{
  "id": "430000",
  "name": "湖南省",
  "children": [{
    "id": "430100",
    "name": "长沙市",
    "parent": "430000",
    "children": [{
      "id": "430102",
      "name": "芙蓉区",
      "parent": "430100",
      "children": null },
    {
      "id": "430103",
      "name": "天心区",
      "parent": "430100",
      "children": null },
    {
      "id": "430104",
      "name": "岳麓区",
      "parent": "430100",
      "children": null },
    {
      "id": "430105",
      "name": "开福区",
      "parent": "430100",
      "children": null },
    {
      "id": "430111",
      "name": "雨花区",
      "parent": "430100",
      "children": null },
    {
      "id": "430121",
      "name": "长沙县",
      "parent": "430100",
      "children": null },
    {
      "id": "430122",
      "name": "望城区",
      "parent": "430100",
      "children": null },
    {
      "id": "430124",
      "name": "宁乡县",
      "parent": "430100",
      "children": null },
    {
      "id": "430181",
      "name": "浏阳市",
      "parent": "430100",
      "children": null },
    {
      "id": "430182",
      "name": "其它区",
      "parent": "430100",
      "children": null }] },

  {
    "id": "430200",
    "name": "株洲市",
    "parent": "430000",
    "children": [{
      "id": "430202",
      "name": "荷塘区",
      "parent": "430200",
      "children": null },
    {
      "id": "430203",
      "name": "芦淞区",
      "parent": "430200",
      "children": null },
    {
      "id": "430204",
      "name": "石峰区",
      "parent": "430200",
      "children": null },
    {
      "id": "430211",
      "name": "天元区",
      "parent": "430200",
      "children": null },
    {
      "id": "430221",
      "name": "株洲县",
      "parent": "430200",
      "children": null },
    {
      "id": "430223",
      "name": "攸县",
      "parent": "430200",
      "children": null },
    {
      "id": "430224",
      "name": "茶陵县",
      "parent": "430200",
      "children": null },
    {
      "id": "430225",
      "name": "炎陵县",
      "parent": "430200",
      "children": null },
    {
      "id": "430281",
      "name": "醴陵市",
      "parent": "430200",
      "children": null },
    {
      "id": "430282",
      "name": "其它区",
      "parent": "430200",
      "children": null }] },

  {
    "id": "430300",
    "name": "湘潭市",
    "parent": "430000",
    "children": [{
      "id": "430302",
      "name": "雨湖区",
      "parent": "430300",
      "children": null },
    {
      "id": "430304",
      "name": "岳塘区",
      "parent": "430300",
      "children": null },
    {
      "id": "430321",
      "name": "湘潭县",
      "parent": "430300",
      "children": null },
    {
      "id": "430381",
      "name": "湘乡市",
      "parent": "430300",
      "children": null },
    {
      "id": "430382",
      "name": "韶山市",
      "parent": "430300",
      "children": null },
    {
      "id": "430383",
      "name": "其它区",
      "parent": "430300",
      "children": null }] },

  {
    "id": "430400",
    "name": "衡阳市",
    "parent": "430000",
    "children": [{
      "id": "430405",
      "name": "珠晖区",
      "parent": "430400",
      "children": null },
    {
      "id": "430406",
      "name": "雁峰区",
      "parent": "430400",
      "children": null },
    {
      "id": "430407",
      "name": "石鼓区",
      "parent": "430400",
      "children": null },
    {
      "id": "430408",
      "name": "蒸湘区",
      "parent": "430400",
      "children": null },
    {
      "id": "430412",
      "name": "南岳区",
      "parent": "430400",
      "children": null },
    {
      "id": "430421",
      "name": "衡阳县",
      "parent": "430400",
      "children": null },
    {
      "id": "430422",
      "name": "衡南县",
      "parent": "430400",
      "children": null },
    {
      "id": "430423",
      "name": "衡山县",
      "parent": "430400",
      "children": null },
    {
      "id": "430424",
      "name": "衡东县",
      "parent": "430400",
      "children": null },
    {
      "id": "430426",
      "name": "祁东县",
      "parent": "430400",
      "children": null },
    {
      "id": "430481",
      "name": "耒阳市",
      "parent": "430400",
      "children": null },
    {
      "id": "430482",
      "name": "常宁市",
      "parent": "430400",
      "children": null },
    {
      "id": "430483",
      "name": "其它区",
      "parent": "430400",
      "children": null }] },

  {
    "id": "430500",
    "name": "邵阳市",
    "parent": "430000",
    "children": [{
      "id": "430502",
      "name": "双清区",
      "parent": "430500",
      "children": null },
    {
      "id": "430503",
      "name": "大祥区",
      "parent": "430500",
      "children": null },
    {
      "id": "430511",
      "name": "北塔区",
      "parent": "430500",
      "children": null },
    {
      "id": "430521",
      "name": "邵东县",
      "parent": "430500",
      "children": null },
    {
      "id": "430522",
      "name": "新邵县",
      "parent": "430500",
      "children": null },
    {
      "id": "430523",
      "name": "邵阳县",
      "parent": "430500",
      "children": null },
    {
      "id": "430524",
      "name": "隆回县",
      "parent": "430500",
      "children": null },
    {
      "id": "430525",
      "name": "洞口县",
      "parent": "430500",
      "children": null },
    {
      "id": "430527",
      "name": "绥宁县",
      "parent": "430500",
      "children": null },
    {
      "id": "430528",
      "name": "新宁县",
      "parent": "430500",
      "children": null },
    {
      "id": "430529",
      "name": "城步苗族自治县",
      "parent": "430500",
      "children": null },
    {
      "id": "430581",
      "name": "武冈市",
      "parent": "430500",
      "children": null },
    {
      "id": "430582",
      "name": "其它区",
      "parent": "430500",
      "children": null }] },

  {
    "id": "430600",
    "name": "岳阳市",
    "parent": "430000",
    "children": [{
      "id": "430602",
      "name": "岳阳楼区",
      "parent": "430600",
      "children": null },
    {
      "id": "430603",
      "name": "云溪区",
      "parent": "430600",
      "children": null },
    {
      "id": "430611",
      "name": "君山区",
      "parent": "430600",
      "children": null },
    {
      "id": "430621",
      "name": "岳阳县",
      "parent": "430600",
      "children": null },
    {
      "id": "430623",
      "name": "华容县",
      "parent": "430600",
      "children": null },
    {
      "id": "430624",
      "name": "湘阴县",
      "parent": "430600",
      "children": null },
    {
      "id": "430626",
      "name": "平江县",
      "parent": "430600",
      "children": null },
    {
      "id": "430681",
      "name": "汨罗市",
      "parent": "430600",
      "children": null },
    {
      "id": "430682",
      "name": "临湘市",
      "parent": "430600",
      "children": null },
    {
      "id": "430683",
      "name": "其它区",
      "parent": "430600",
      "children": null }] },

  {
    "id": "430700",
    "name": "常德市",
    "parent": "430000",
    "children": [{
      "id": "430702",
      "name": "武陵区",
      "parent": "430700",
      "children": null },
    {
      "id": "430703",
      "name": "鼎城区",
      "parent": "430700",
      "children": null },
    {
      "id": "430721",
      "name": "安乡县",
      "parent": "430700",
      "children": null },
    {
      "id": "430722",
      "name": "汉寿县",
      "parent": "430700",
      "children": null },
    {
      "id": "430723",
      "name": "澧县",
      "parent": "430700",
      "children": null },
    {
      "id": "430724",
      "name": "临澧县",
      "parent": "430700",
      "children": null },
    {
      "id": "430725",
      "name": "桃源县",
      "parent": "430700",
      "children": null },
    {
      "id": "430726",
      "name": "石门县",
      "parent": "430700",
      "children": null },
    {
      "id": "430781",
      "name": "津市市",
      "parent": "430700",
      "children": null },
    {
      "id": "430782",
      "name": "其它区",
      "parent": "430700",
      "children": null }] },

  {
    "id": "430800",
    "name": "张家界市",
    "parent": "430000",
    "children": [{
      "id": "430802",
      "name": "永定区",
      "parent": "430800",
      "children": null },
    {
      "id": "430811",
      "name": "武陵源区",
      "parent": "430800",
      "children": null },
    {
      "id": "430821",
      "name": "慈利县",
      "parent": "430800",
      "children": null },
    {
      "id": "430822",
      "name": "桑植县",
      "parent": "430800",
      "children": null },
    {
      "id": "430823",
      "name": "其它区",
      "parent": "430800",
      "children": null }] },

  {
    "id": "430900",
    "name": "益阳市",
    "parent": "430000",
    "children": [{
      "id": "430902",
      "name": "资阳区",
      "parent": "430900",
      "children": null },
    {
      "id": "430903",
      "name": "赫山区",
      "parent": "430900",
      "children": null },
    {
      "id": "430921",
      "name": "南县",
      "parent": "430900",
      "children": null },
    {
      "id": "430922",
      "name": "桃江县",
      "parent": "430900",
      "children": null },
    {
      "id": "430923",
      "name": "安化县",
      "parent": "430900",
      "children": null },
    {
      "id": "430981",
      "name": "沅江市",
      "parent": "430900",
      "children": null },
    {
      "id": "430982",
      "name": "其它区",
      "parent": "430900",
      "children": null }] },

  {
    "id": "431000",
    "name": "郴州市",
    "parent": "430000",
    "children": [{
      "id": "431002",
      "name": "北湖区",
      "parent": "431000",
      "children": null },
    {
      "id": "431003",
      "name": "苏仙区",
      "parent": "431000",
      "children": null },
    {
      "id": "431021",
      "name": "桂阳县",
      "parent": "431000",
      "children": null },
    {
      "id": "431022",
      "name": "宜章县",
      "parent": "431000",
      "children": null },
    {
      "id": "431023",
      "name": "永兴县",
      "parent": "431000",
      "children": null },
    {
      "id": "431024",
      "name": "嘉禾县",
      "parent": "431000",
      "children": null },
    {
      "id": "431025",
      "name": "临武县",
      "parent": "431000",
      "children": null },
    {
      "id": "431026",
      "name": "汝城县",
      "parent": "431000",
      "children": null },
    {
      "id": "431027",
      "name": "桂东县",
      "parent": "431000",
      "children": null },
    {
      "id": "431028",
      "name": "安仁县",
      "parent": "431000",
      "children": null },
    {
      "id": "431081",
      "name": "资兴市",
      "parent": "431000",
      "children": null },
    {
      "id": "431082",
      "name": "其它区",
      "parent": "431000",
      "children": null }] },

  {
    "id": "431100",
    "name": "永州市",
    "parent": "430000",
    "children": [{
      "id": "431102",
      "name": "零陵区",
      "parent": "431100",
      "children": null },
    {
      "id": "431103",
      "name": "冷水滩区",
      "parent": "431100",
      "children": null },
    {
      "id": "431121",
      "name": "祁阳县",
      "parent": "431100",
      "children": null },
    {
      "id": "431122",
      "name": "东安县",
      "parent": "431100",
      "children": null },
    {
      "id": "431123",
      "name": "双牌县",
      "parent": "431100",
      "children": null },
    {
      "id": "431124",
      "name": "道县",
      "parent": "431100",
      "children": null },
    {
      "id": "431125",
      "name": "江永县",
      "parent": "431100",
      "children": null },
    {
      "id": "431126",
      "name": "宁远县",
      "parent": "431100",
      "children": null },
    {
      "id": "431127",
      "name": "蓝山县",
      "parent": "431100",
      "children": null },
    {
      "id": "431128",
      "name": "新田县",
      "parent": "431100",
      "children": null },
    {
      "id": "431129",
      "name": "江华瑶族自治县",
      "parent": "431100",
      "children": null },
    {
      "id": "431130",
      "name": "其它区",
      "parent": "431100",
      "children": null }] },

  {
    "id": "431200",
    "name": "怀化市",
    "parent": "430000",
    "children": [{
      "id": "431202",
      "name": "鹤城区",
      "parent": "431200",
      "children": null },
    {
      "id": "431221",
      "name": "中方县",
      "parent": "431200",
      "children": null },
    {
      "id": "431222",
      "name": "沅陵县",
      "parent": "431200",
      "children": null },
    {
      "id": "431223",
      "name": "辰溪县",
      "parent": "431200",
      "children": null },
    {
      "id": "431224",
      "name": "溆浦县",
      "parent": "431200",
      "children": null },
    {
      "id": "431225",
      "name": "会同县",
      "parent": "431200",
      "children": null },
    {
      "id": "431226",
      "name": "麻阳苗族自治县",
      "parent": "431200",
      "children": null },
    {
      "id": "431227",
      "name": "新晃侗族自治县",
      "parent": "431200",
      "children": null },
    {
      "id": "431228",
      "name": "芷江侗族自治县",
      "parent": "431200",
      "children": null },
    {
      "id": "431229",
      "name": "靖州苗族侗族自治县",
      "parent": "431200",
      "children": null },
    {
      "id": "431230",
      "name": "通道侗族自治县",
      "parent": "431200",
      "children": null },
    {
      "id": "431281",
      "name": "洪江市",
      "parent": "431200",
      "children": null },
    {
      "id": "431282",
      "name": "其它区",
      "parent": "431200",
      "children": null }] },

  {
    "id": "431300",
    "name": "娄底市",
    "parent": "430000",
    "children": [{
      "id": "431302",
      "name": "娄星区",
      "parent": "431300",
      "children": null },
    {
      "id": "431321",
      "name": "双峰县",
      "parent": "431300",
      "children": null },
    {
      "id": "431322",
      "name": "新化县",
      "parent": "431300",
      "children": null },
    {
      "id": "431381",
      "name": "冷水江市",
      "parent": "431300",
      "children": null },
    {
      "id": "431382",
      "name": "涟源市",
      "parent": "431300",
      "children": null },
    {
      "id": "431383",
      "name": "其它区",
      "parent": "431300",
      "children": null }] },

  {
    "id": "433100",
    "name": "湘西土家族苗族自治州",
    "parent": "430000",
    "children": [{
      "id": "433101",
      "name": "吉首市",
      "parent": "433100",
      "children": null },
    {
      "id": "433122",
      "name": "泸溪县",
      "parent": "433100",
      "children": null },
    {
      "id": "433123",
      "name": "凤凰县",
      "parent": "433100",
      "children": null },
    {
      "id": "433124",
      "name": "花垣县",
      "parent": "433100",
      "children": null },
    {
      "id": "433125",
      "name": "保靖县",
      "parent": "433100",
      "children": null },
    {
      "id": "433126",
      "name": "古丈县",
      "parent": "433100",
      "children": null },
    {
      "id": "433127",
      "name": "永顺县",
      "parent": "433100",
      "children": null },
    {
      "id": "433130",
      "name": "龙山县",
      "parent": "433100",
      "children": null },
    {
      "id": "433131",
      "name": "其它区",
      "parent": "433100",
      "children": null }] }] },


{
  "id": "440000",
  "name": "广东省",
  "children": [{
    "id": "440100",
    "name": "广州市",
    "parent": "440000",
    "children": [{
      "id": "440103",
      "name": "荔湾区",
      "parent": "440100",
      "children": null },
    {
      "id": "440104",
      "name": "越秀区",
      "parent": "440100",
      "children": null },
    {
      "id": "440105",
      "name": "海珠区",
      "parent": "440100",
      "children": null },
    {
      "id": "440106",
      "name": "天河区",
      "parent": "440100",
      "children": null },
    {
      "id": "440111",
      "name": "白云区",
      "parent": "440100",
      "children": null },
    {
      "id": "440112",
      "name": "黄埔区",
      "parent": "440100",
      "children": null },
    {
      "id": "440113",
      "name": "番禺区",
      "parent": "440100",
      "children": null },
    {
      "id": "440114",
      "name": "花都区",
      "parent": "440100",
      "children": null },
    {
      "id": "440115",
      "name": "南沙区",
      "parent": "440100",
      "children": null },
    {
      "id": "440116",
      "name": "萝岗区",
      "parent": "440100",
      "children": null },
    {
      "id": "440183",
      "name": "增城区",
      "parent": "440100",
      "children": null },
    {
      "id": "440184",
      "name": "从化区",
      "parent": "440100",
      "children": null },
    {
      "id": "440188",
      "name": "东山区",
      "parent": "440100",
      "children": null },
    {
      "id": "440189",
      "name": "其它区",
      "parent": "440100",
      "children": null }] },

  {
    "id": "440200",
    "name": "韶关市",
    "parent": "440000",
    "children": [{
      "id": "440203",
      "name": "武江区",
      "parent": "440200",
      "children": null },
    {
      "id": "440204",
      "name": "浈江区",
      "parent": "440200",
      "children": null },
    {
      "id": "440205",
      "name": "曲江区",
      "parent": "440200",
      "children": null },
    {
      "id": "440222",
      "name": "始兴县",
      "parent": "440200",
      "children": null },
    {
      "id": "440224",
      "name": "仁化县",
      "parent": "440200",
      "children": null },
    {
      "id": "440229",
      "name": "翁源县",
      "parent": "440200",
      "children": null },
    {
      "id": "440232",
      "name": "乳源瑶族自治县",
      "parent": "440200",
      "children": null },
    {
      "id": "440233",
      "name": "新丰县",
      "parent": "440200",
      "children": null },
    {
      "id": "440281",
      "name": "乐昌市",
      "parent": "440200",
      "children": null },
    {
      "id": "440282",
      "name": "南雄市",
      "parent": "440200",
      "children": null },
    {
      "id": "440283",
      "name": "其它区",
      "parent": "440200",
      "children": null }] },

  {
    "id": "440300",
    "name": "深圳市",
    "parent": "440000",
    "children": [{
      "id": "440303",
      "name": "罗湖区",
      "parent": "440300",
      "children": null },
    {
      "id": "440304",
      "name": "福田区",
      "parent": "440300",
      "children": null },
    {
      "id": "440305",
      "name": "南山区",
      "parent": "440300",
      "children": null },
    {
      "id": "440306",
      "name": "宝安区",
      "parent": "440300",
      "children": null },
    {
      "id": "440307",
      "name": "龙岗区",
      "parent": "440300",
      "children": null },
    {
      "id": "440308",
      "name": "盐田区",
      "parent": "440300",
      "children": null },
    {
      "id": "440309",
      "name": "其它区",
      "parent": "440300",
      "children": null },
    {
      "id": "440320",
      "name": "光明新区",
      "parent": "440300",
      "children": null },
    {
      "id": "440321",
      "name": "坪山新区",
      "parent": "440300",
      "children": null },
    {
      "id": "440322",
      "name": "大鹏新区",
      "parent": "440300",
      "children": null },
    {
      "id": "440323",
      "name": "龙华新区",
      "parent": "440300",
      "children": null }] },

  {
    "id": "440400",
    "name": "珠海市",
    "parent": "440000",
    "children": [{
      "id": "440402",
      "name": "香洲区",
      "parent": "440400",
      "children": null },
    {
      "id": "440403",
      "name": "斗门区",
      "parent": "440400",
      "children": null },
    {
      "id": "440404",
      "name": "金湾区",
      "parent": "440400",
      "children": null },
    {
      "id": "440486",
      "name": "金唐区",
      "parent": "440400",
      "children": null },
    {
      "id": "440487",
      "name": "南湾区",
      "parent": "440400",
      "children": null },
    {
      "id": "440488",
      "name": "其它区",
      "parent": "440400",
      "children": null }] },

  {
    "id": "440500",
    "name": "汕头市",
    "parent": "440000",
    "children": [{
      "id": "440507",
      "name": "龙湖区",
      "parent": "440500",
      "children": null },
    {
      "id": "440511",
      "name": "金平区",
      "parent": "440500",
      "children": null },
    {
      "id": "440512",
      "name": "濠江区",
      "parent": "440500",
      "children": null },
    {
      "id": "440513",
      "name": "潮阳区",
      "parent": "440500",
      "children": null },
    {
      "id": "440514",
      "name": "潮南区",
      "parent": "440500",
      "children": null },
    {
      "id": "440515",
      "name": "澄海区",
      "parent": "440500",
      "children": null },
    {
      "id": "440523",
      "name": "南澳县",
      "parent": "440500",
      "children": null },
    {
      "id": "440524",
      "name": "其它区",
      "parent": "440500",
      "children": null }] },

  {
    "id": "440600",
    "name": "佛山市",
    "parent": "440000",
    "children": [{
      "id": "440604",
      "name": "禅城区",
      "parent": "440600",
      "children": null },
    {
      "id": "440605",
      "name": "南海区",
      "parent": "440600",
      "children": null },
    {
      "id": "440606",
      "name": "顺德区",
      "parent": "440600",
      "children": null },
    {
      "id": "440607",
      "name": "三水区",
      "parent": "440600",
      "children": null },
    {
      "id": "440608",
      "name": "高明区",
      "parent": "440600",
      "children": null },
    {
      "id": "440609",
      "name": "其它区",
      "parent": "440600",
      "children": null }] },

  {
    "id": "440700",
    "name": "江门市",
    "parent": "440000",
    "children": [{
      "id": "440703",
      "name": "蓬江区",
      "parent": "440700",
      "children": null },
    {
      "id": "440704",
      "name": "江海区",
      "parent": "440700",
      "children": null },
    {
      "id": "440705",
      "name": "新会区",
      "parent": "440700",
      "children": null },
    {
      "id": "440781",
      "name": "台山市",
      "parent": "440700",
      "children": null },
    {
      "id": "440783",
      "name": "开平市",
      "parent": "440700",
      "children": null },
    {
      "id": "440784",
      "name": "鹤山市",
      "parent": "440700",
      "children": null },
    {
      "id": "440785",
      "name": "恩平市",
      "parent": "440700",
      "children": null },
    {
      "id": "440786",
      "name": "其它区",
      "parent": "440700",
      "children": null }] },

  {
    "id": "440800",
    "name": "湛江市",
    "parent": "440000",
    "children": [{
      "id": "440802",
      "name": "赤坎区",
      "parent": "440800",
      "children": null },
    {
      "id": "440803",
      "name": "霞山区",
      "parent": "440800",
      "children": null },
    {
      "id": "440804",
      "name": "坡头区",
      "parent": "440800",
      "children": null },
    {
      "id": "440811",
      "name": "麻章区",
      "parent": "440800",
      "children": null },
    {
      "id": "440823",
      "name": "遂溪县",
      "parent": "440800",
      "children": null },
    {
      "id": "440825",
      "name": "徐闻县",
      "parent": "440800",
      "children": null },
    {
      "id": "440881",
      "name": "廉江市",
      "parent": "440800",
      "children": null },
    {
      "id": "440882",
      "name": "雷州市",
      "parent": "440800",
      "children": null },
    {
      "id": "440883",
      "name": "吴川市",
      "parent": "440800",
      "children": null },
    {
      "id": "440884",
      "name": "其它区",
      "parent": "440800",
      "children": null }] },

  {
    "id": "440900",
    "name": "茂名市",
    "parent": "440000",
    "children": [{
      "id": "440902",
      "name": "茂南区",
      "parent": "440900",
      "children": null },
    {
      "id": "440903",
      "name": "电白区",
      "parent": "440900",
      "children": null },
    {
      "id": "440923",
      "name": "电白县",
      "parent": "440900",
      "children": null },
    {
      "id": "440981",
      "name": "高州市",
      "parent": "440900",
      "children": null },
    {
      "id": "440982",
      "name": "化州市",
      "parent": "440900",
      "children": null },
    {
      "id": "440983",
      "name": "信宜市",
      "parent": "440900",
      "children": null },
    {
      "id": "440984",
      "name": "其它区",
      "parent": "440900",
      "children": null }] },

  {
    "id": "441200",
    "name": "肇庆市",
    "parent": "440000",
    "children": [{
      "id": "441202",
      "name": "端州区",
      "parent": "441200",
      "children": null },
    {
      "id": "441203",
      "name": "鼎湖区",
      "parent": "441200",
      "children": null },
    {
      "id": "441223",
      "name": "广宁县",
      "parent": "441200",
      "children": null },
    {
      "id": "441224",
      "name": "怀集县",
      "parent": "441200",
      "children": null },
    {
      "id": "441225",
      "name": "封开县",
      "parent": "441200",
      "children": null },
    {
      "id": "441226",
      "name": "德庆县",
      "parent": "441200",
      "children": null },
    {
      "id": "441283",
      "name": "高要市",
      "parent": "441200",
      "children": null },
    {
      "id": "441284",
      "name": "四会市",
      "parent": "441200",
      "children": null },
    {
      "id": "441285",
      "name": "其它区",
      "parent": "441200",
      "children": null }] },

  {
    "id": "441300",
    "name": "惠州市",
    "parent": "440000",
    "children": [{
      "id": "441302",
      "name": "惠城区",
      "parent": "441300",
      "children": null },
    {
      "id": "441303",
      "name": "惠阳区",
      "parent": "441300",
      "children": null },
    {
      "id": "441322",
      "name": "博罗县",
      "parent": "441300",
      "children": null },
    {
      "id": "441323",
      "name": "惠东县",
      "parent": "441300",
      "children": null },
    {
      "id": "441324",
      "name": "龙门县",
      "parent": "441300",
      "children": null },
    {
      "id": "441325",
      "name": "其它区",
      "parent": "441300",
      "children": null }] },

  {
    "id": "441400",
    "name": "梅州市",
    "parent": "440000",
    "children": [{
      "id": "441402",
      "name": "梅江区",
      "parent": "441400",
      "children": null },
    {
      "id": "441421",
      "name": "梅县区",
      "parent": "441400",
      "children": null },
    {
      "id": "441422",
      "name": "大埔县",
      "parent": "441400",
      "children": null },
    {
      "id": "441423",
      "name": "丰顺县",
      "parent": "441400",
      "children": null },
    {
      "id": "441424",
      "name": "五华县",
      "parent": "441400",
      "children": null },
    {
      "id": "441426",
      "name": "平远县",
      "parent": "441400",
      "children": null },
    {
      "id": "441427",
      "name": "蕉岭县",
      "parent": "441400",
      "children": null },
    {
      "id": "441481",
      "name": "兴宁市",
      "parent": "441400",
      "children": null },
    {
      "id": "441482",
      "name": "其它区",
      "parent": "441400",
      "children": null }] },

  {
    "id": "441500",
    "name": "汕尾市",
    "parent": "440000",
    "children": [{
      "id": "441502",
      "name": "城区",
      "parent": "441500",
      "children": null },
    {
      "id": "441521",
      "name": "海丰县",
      "parent": "441500",
      "children": null },
    {
      "id": "441523",
      "name": "陆河县",
      "parent": "441500",
      "children": null },
    {
      "id": "441581",
      "name": "陆丰市",
      "parent": "441500",
      "children": null },
    {
      "id": "441582",
      "name": "其它区",
      "parent": "441500",
      "children": null }] },

  {
    "id": "441600",
    "name": "河源市",
    "parent": "440000",
    "children": [{
      "id": "441602",
      "name": "源城区",
      "parent": "441600",
      "children": null },
    {
      "id": "441621",
      "name": "紫金县",
      "parent": "441600",
      "children": null },
    {
      "id": "441622",
      "name": "龙川县",
      "parent": "441600",
      "children": null },
    {
      "id": "441623",
      "name": "连平县",
      "parent": "441600",
      "children": null },
    {
      "id": "441624",
      "name": "和平县",
      "parent": "441600",
      "children": null },
    {
      "id": "441625",
      "name": "东源县",
      "parent": "441600",
      "children": null },
    {
      "id": "441626",
      "name": "其它区",
      "parent": "441600",
      "children": null }] },

  {
    "id": "441700",
    "name": "阳江市",
    "parent": "440000",
    "children": [{
      "id": "441702",
      "name": "江城区",
      "parent": "441700",
      "children": null },
    {
      "id": "441721",
      "name": "阳西县",
      "parent": "441700",
      "children": null },
    {
      "id": "441723",
      "name": "阳东区",
      "parent": "441700",
      "children": null },
    {
      "id": "441781",
      "name": "阳春市",
      "parent": "441700",
      "children": null },
    {
      "id": "441782",
      "name": "其它区",
      "parent": "441700",
      "children": null }] },

  {
    "id": "441800",
    "name": "清远市",
    "parent": "440000",
    "children": [{
      "id": "441802",
      "name": "清城区",
      "parent": "441800",
      "children": null },
    {
      "id": "441821",
      "name": "佛冈县",
      "parent": "441800",
      "children": null },
    {
      "id": "441823",
      "name": "阳山县",
      "parent": "441800",
      "children": null },
    {
      "id": "441825",
      "name": "连山壮族瑶族自治县",
      "parent": "441800",
      "children": null },
    {
      "id": "441826",
      "name": "连南瑶族自治县",
      "parent": "441800",
      "children": null },
    {
      "id": "441827",
      "name": "清新区",
      "parent": "441800",
      "children": null },
    {
      "id": "441881",
      "name": "英德市",
      "parent": "441800",
      "children": null },
    {
      "id": "441882",
      "name": "连州市",
      "parent": "441800",
      "children": null },
    {
      "id": "441883",
      "name": "其它区",
      "parent": "441800",
      "children": null }] },

  {
    "id": "441900",
    "name": "东莞市",
    "parent": "440000",
    "children": [{
      "id": "441901",
      "parent": "441900",
      "name": "莞城区",
      "children": null },
    {
      "id": "441902",
      "parent": "441900",
      "name": "南城区",
      "children": null },
    {
      "id": "441904",
      "parent": "441900",
      "name": "万江区",
      "children": null },
    {
      "id": "441905",
      "parent": "441900",
      "name": "石碣镇",
      "children": null },
    {
      "id": "441906",
      "parent": "441900",
      "name": "石龙镇",
      "children": null },
    {
      "id": "441907",
      "parent": "441900",
      "name": "茶山镇",
      "children": null },
    {
      "id": "441908",
      "parent": "441900",
      "name": "石排镇",
      "children": null },
    {
      "id": "441909",
      "parent": "441900",
      "name": "企石镇",
      "children": null },
    {
      "id": "441910",
      "parent": "441900",
      "name": "横沥镇",
      "children": null },
    {
      "id": "441911",
      "parent": "441900",
      "name": "桥头镇",
      "children": null },
    {
      "id": "441912",
      "parent": "441900",
      "name": "谢岗镇",
      "children": null },
    {
      "id": "441913",
      "parent": "441900",
      "name": "东坑镇",
      "children": null },
    {
      "id": "441914",
      "parent": "441900",
      "name": "常平镇",
      "children": null },
    {
      "id": "441915",
      "parent": "441900",
      "name": "寮步镇",
      "children": null },
    {
      "id": "441916",
      "parent": "441900",
      "name": "大朗镇",
      "children": null },
    {
      "id": "441917",
      "parent": "441900",
      "name": "麻涌镇",
      "children": null },
    {
      "id": "441918",
      "parent": "441900",
      "name": "中堂镇",
      "children": null },
    {
      "id": "441919",
      "parent": "441900",
      "name": "高埗镇",
      "children": null },
    {
      "id": "441920",
      "parent": "441900",
      "name": "樟木头镇",
      "children": null },
    {
      "id": "441921",
      "parent": "441900",
      "name": "大岭山镇",
      "children": null },
    {
      "id": "441922",
      "parent": "441900",
      "name": "望牛墩镇",
      "children": null },
    {
      "id": "441923",
      "parent": "441900",
      "name": "黄江镇",
      "children": null },
    {
      "id": "441924",
      "parent": "441900",
      "name": "洪梅镇",
      "children": null },
    {
      "id": "441925",
      "parent": "441900",
      "name": "清溪镇",
      "children": null },
    {
      "id": "441926",
      "parent": "441900",
      "name": "沙田镇",
      "children": null },
    {
      "id": "441927",
      "parent": "441900",
      "name": "道滘镇",
      "children": null },
    {
      "id": "441928",
      "parent": "441900",
      "name": "塘厦镇",
      "children": null },
    {
      "id": "441929",
      "parent": "441900",
      "name": "虎门镇",
      "children": null },
    {
      "id": "441930",
      "parent": "441900",
      "name": "厚街镇",
      "children": null },
    {
      "id": "441931",
      "parent": "441900",
      "name": "凤岗镇",
      "children": null },
    {
      "id": "441932",
      "parent": "441900",
      "name": "长安镇",
      "children": null }] },

  {
    "id": "442000",
    "name": "中山市",
    "parent": "440000",
    "children": [{
      "id": "442001",
      "parent": "442000",
      "name": "石岐区",
      "children": null },
    {
      "id": "442004",
      "parent": "442000",
      "name": "南区",
      "children": null },
    {
      "id": "442005",
      "parent": "442000",
      "name": "五桂山区",
      "children": null },
    {
      "id": "442006",
      "parent": "442000",
      "name": "火炬开发区",
      "children": null },
    {
      "id": "442007",
      "parent": "442000",
      "name": "黄圃镇",
      "children": null },
    {
      "id": "442008",
      "parent": "442000",
      "name": "南头镇",
      "children": null },
    {
      "id": "442009",
      "parent": "442000",
      "name": "东凤镇",
      "children": null },
    {
      "id": "442010",
      "parent": "442000",
      "name": "阜沙镇",
      "children": null },
    {
      "id": "442011",
      "parent": "442000",
      "name": "小榄镇",
      "children": null },
    {
      "id": "442012",
      "parent": "442000",
      "name": "东升镇",
      "children": null },
    {
      "id": "442013",
      "parent": "442000",
      "name": "古镇镇",
      "children": null },
    {
      "id": "442014",
      "parent": "442000",
      "name": "横栏镇",
      "children": null },
    {
      "id": "442015",
      "parent": "442000",
      "name": "三角镇",
      "children": null },
    {
      "id": "442016",
      "parent": "442000",
      "name": "民众镇",
      "children": null },
    {
      "id": "442017",
      "parent": "442000",
      "name": "南朗镇",
      "children": null },
    {
      "id": "442018",
      "parent": "442000",
      "name": "港口镇",
      "children": null },
    {
      "id": "442019",
      "parent": "442000",
      "name": "大涌镇",
      "children": null },
    {
      "id": "442020",
      "parent": "442000",
      "name": "沙溪镇",
      "children": null },
    {
      "id": "442021",
      "parent": "442000",
      "name": "三乡镇",
      "children": null },
    {
      "id": "442022",
      "parent": "442000",
      "name": "板芙镇",
      "children": null },
    {
      "id": "442023",
      "parent": "442000",
      "name": "神湾镇",
      "children": null },
    {
      "id": "442024",
      "parent": "442000",
      "name": "坦洲镇",
      "children": null }] },

  {
    "id": "442101",
    "name": "东沙群岛",
    "parent": "440000",
    "children": null },
  {
    "id": "445100",
    "name": "潮州市",
    "parent": "440000",
    "children": [{
      "id": "445102",
      "name": "湘桥区",
      "parent": "445100",
      "children": null },
    {
      "id": "445121",
      "name": "潮安区",
      "parent": "445100",
      "children": null },
    {
      "id": "445122",
      "name": "饶平县",
      "parent": "445100",
      "children": null },
    {
      "id": "445185",
      "name": "枫溪区",
      "parent": "445100",
      "children": null },
    {
      "id": "445186",
      "name": "其它区",
      "parent": "445100",
      "children": null }] },

  {
    "id": "445200",
    "name": "揭阳市",
    "parent": "440000",
    "children": [{
      "id": "445202",
      "name": "榕城区",
      "parent": "445200",
      "children": null },
    {
      "id": "445221",
      "name": "揭东区",
      "parent": "445200",
      "children": null },
    {
      "id": "445222",
      "name": "揭西县",
      "parent": "445200",
      "children": null },
    {
      "id": "445224",
      "name": "惠来县",
      "parent": "445200",
      "children": null },
    {
      "id": "445281",
      "name": "普宁市",
      "parent": "445200",
      "children": null },
    {
      "id": "445284",
      "name": "东山区",
      "parent": "445200",
      "children": null },
    {
      "id": "445285",
      "name": "其它区",
      "parent": "445200",
      "children": null }] },

  {
    "id": "445300",
    "name": "云浮市",
    "parent": "440000",
    "children": [{
      "id": "445302",
      "name": "云城区",
      "parent": "445300",
      "children": null },
    {
      "id": "445321",
      "name": "新兴县",
      "parent": "445300",
      "children": null },
    {
      "id": "445322",
      "name": "郁南县",
      "parent": "445300",
      "children": null },
    {
      "id": "445323",
      "name": "云安区",
      "parent": "445300",
      "children": null },
    {
      "id": "445381",
      "name": "罗定市",
      "parent": "445300",
      "children": null },
    {
      "id": "445382",
      "name": "其它区",
      "parent": "445300",
      "children": null }] }] },


{
  "id": "450000",
  "name": "广西壮族自治区",
  "children": [{
    "id": "450100",
    "name": "南宁市",
    "parent": "450000",
    "children": [{
      "id": "450102",
      "name": "兴宁区",
      "parent": "450100",
      "children": null },
    {
      "id": "450103",
      "name": "青秀区",
      "parent": "450100",
      "children": null },
    {
      "id": "450105",
      "name": "江南区",
      "parent": "450100",
      "children": null },
    {
      "id": "450107",
      "name": "西乡塘区",
      "parent": "450100",
      "children": null },
    {
      "id": "450108",
      "name": "良庆区",
      "parent": "450100",
      "children": null },
    {
      "id": "450109",
      "name": "邕宁区",
      "parent": "450100",
      "children": null },
    {
      "id": "450122",
      "name": "武鸣区",
      "parent": "450100",
      "children": null },
    {
      "id": "450123",
      "name": "隆安县",
      "parent": "450100",
      "children": null },
    {
      "id": "450124",
      "name": "马山县",
      "parent": "450100",
      "children": null },
    {
      "id": "450125",
      "name": "上林县",
      "parent": "450100",
      "children": null },
    {
      "id": "450126",
      "name": "宾阳县",
      "parent": "450100",
      "children": null },
    {
      "id": "450127",
      "name": "横县",
      "parent": "450100",
      "children": null },
    {
      "id": "450128",
      "name": "其它区",
      "parent": "450100",
      "children": null }] },

  {
    "id": "450200",
    "name": "柳州市",
    "parent": "450000",
    "children": [{
      "id": "450202",
      "name": "城中区",
      "parent": "450200",
      "children": null },
    {
      "id": "450203",
      "name": "鱼峰区",
      "parent": "450200",
      "children": null },
    {
      "id": "450204",
      "name": "柳南区",
      "parent": "450200",
      "children": null },
    {
      "id": "450205",
      "name": "柳北区",
      "parent": "450200",
      "children": null },
    {
      "id": "450221",
      "name": "柳江县",
      "parent": "450200",
      "children": null },
    {
      "id": "450222",
      "name": "柳城县",
      "parent": "450200",
      "children": null },
    {
      "id": "450223",
      "name": "鹿寨县",
      "parent": "450200",
      "children": null },
    {
      "id": "450224",
      "name": "融安县",
      "parent": "450200",
      "children": null },
    {
      "id": "450225",
      "name": "融水苗族自治县",
      "parent": "450200",
      "children": null },
    {
      "id": "450226",
      "name": "三江侗族自治县",
      "parent": "450200",
      "children": null },
    {
      "id": "450227",
      "name": "其它区",
      "parent": "450200",
      "children": null }] },

  {
    "id": "450300",
    "name": "桂林市",
    "parent": "450000",
    "children": [{
      "id": "450302",
      "name": "秀峰区",
      "parent": "450300",
      "children": null },
    {
      "id": "450303",
      "name": "叠彩区",
      "parent": "450300",
      "children": null },
    {
      "id": "450304",
      "name": "象山区",
      "parent": "450300",
      "children": null },
    {
      "id": "450305",
      "name": "七星区",
      "parent": "450300",
      "children": null },
    {
      "id": "450311",
      "name": "雁山区",
      "parent": "450300",
      "children": null },
    {
      "id": "450321",
      "name": "阳朔县",
      "parent": "450300",
      "children": null },
    {
      "id": "450322",
      "name": "临桂区",
      "parent": "450300",
      "children": null },
    {
      "id": "450323",
      "name": "灵川县",
      "parent": "450300",
      "children": null },
    {
      "id": "450324",
      "name": "全州县",
      "parent": "450300",
      "children": null },
    {
      "id": "450325",
      "name": "兴安县",
      "parent": "450300",
      "children": null },
    {
      "id": "450326",
      "name": "永福县",
      "parent": "450300",
      "children": null },
    {
      "id": "450327",
      "name": "灌阳县",
      "parent": "450300",
      "children": null },
    {
      "id": "450328",
      "name": "龙胜各族自治县",
      "parent": "450300",
      "children": null },
    {
      "id": "450329",
      "name": "资源县",
      "parent": "450300",
      "children": null },
    {
      "id": "450330",
      "name": "平乐县",
      "parent": "450300",
      "children": null },
    {
      "id": "450331",
      "name": "荔浦县",
      "parent": "450300",
      "children": null },
    {
      "id": "450332",
      "name": "恭城瑶族自治县",
      "parent": "450300",
      "children": null },
    {
      "id": "450333",
      "name": "其它区",
      "parent": "450300",
      "children": null }] },

  {
    "id": "450400",
    "name": "梧州市",
    "parent": "450000",
    "children": [{
      "id": "450403",
      "name": "万秀区",
      "parent": "450400",
      "children": null },
    {
      "id": "450404",
      "name": "蝶山区",
      "parent": "450400",
      "children": null },
    {
      "id": "450405",
      "name": "长洲区",
      "parent": "450400",
      "children": null },
    {
      "id": "450406",
      "name": "龙圩区",
      "parent": "450400",
      "children": null },
    {
      "id": "450421",
      "name": "苍梧县",
      "parent": "450400",
      "children": null },
    {
      "id": "450422",
      "name": "藤县",
      "parent": "450400",
      "children": null },
    {
      "id": "450423",
      "name": "蒙山县",
      "parent": "450400",
      "children": null },
    {
      "id": "450481",
      "name": "岑溪市",
      "parent": "450400",
      "children": null },
    {
      "id": "450482",
      "name": "其它区",
      "parent": "450400",
      "children": null }] },

  {
    "id": "450500",
    "name": "北海市",
    "parent": "450000",
    "children": [{
      "id": "450502",
      "name": "海城区",
      "parent": "450500",
      "children": null },
    {
      "id": "450503",
      "name": "银海区",
      "parent": "450500",
      "children": null },
    {
      "id": "450512",
      "name": "铁山港区",
      "parent": "450500",
      "children": null },
    {
      "id": "450521",
      "name": "合浦县",
      "parent": "450500",
      "children": null },
    {
      "id": "450522",
      "name": "其它区",
      "parent": "450500",
      "children": null }] },

  {
    "id": "450600",
    "name": "防城港市",
    "parent": "450000",
    "children": [{
      "id": "450602",
      "name": "港口区",
      "parent": "450600",
      "children": null },
    {
      "id": "450603",
      "name": "防城区",
      "parent": "450600",
      "children": null },
    {
      "id": "450621",
      "name": "上思县",
      "parent": "450600",
      "children": null },
    {
      "id": "450681",
      "name": "东兴市",
      "parent": "450600",
      "children": null },
    {
      "id": "450682",
      "name": "其它区",
      "parent": "450600",
      "children": null }] },

  {
    "id": "450700",
    "name": "钦州市",
    "parent": "450000",
    "children": [{
      "id": "450702",
      "name": "钦南区",
      "parent": "450700",
      "children": null },
    {
      "id": "450703",
      "name": "钦北区",
      "parent": "450700",
      "children": null },
    {
      "id": "450721",
      "name": "灵山县",
      "parent": "450700",
      "children": null },
    {
      "id": "450722",
      "name": "浦北县",
      "parent": "450700",
      "children": null },
    {
      "id": "450723",
      "name": "其它区",
      "parent": "450700",
      "children": null }] },

  {
    "id": "450800",
    "name": "贵港市",
    "parent": "450000",
    "children": [{
      "id": "450802",
      "name": "港北区",
      "parent": "450800",
      "children": null },
    {
      "id": "450803",
      "name": "港南区",
      "parent": "450800",
      "children": null },
    {
      "id": "450804",
      "name": "覃塘区",
      "parent": "450800",
      "children": null },
    {
      "id": "450821",
      "name": "平南县",
      "parent": "450800",
      "children": null },
    {
      "id": "450881",
      "name": "桂平市",
      "parent": "450800",
      "children": null },
    {
      "id": "450882",
      "name": "其它区",
      "parent": "450800",
      "children": null }] },

  {
    "id": "450900",
    "name": "玉林市",
    "parent": "450000",
    "children": [{
      "id": "450902",
      "name": "玉州区",
      "parent": "450900",
      "children": null },
    {
      "id": "450903",
      "name": "福绵区",
      "parent": "450900",
      "children": null },
    {
      "id": "450921",
      "name": "容县",
      "parent": "450900",
      "children": null },
    {
      "id": "450922",
      "name": "陆川县",
      "parent": "450900",
      "children": null },
    {
      "id": "450923",
      "name": "博白县",
      "parent": "450900",
      "children": null },
    {
      "id": "450924",
      "name": "兴业县",
      "parent": "450900",
      "children": null },
    {
      "id": "450981",
      "name": "北流市",
      "parent": "450900",
      "children": null },
    {
      "id": "450982",
      "name": "其它区",
      "parent": "450900",
      "children": null }] },

  {
    "id": "451000",
    "name": "百色市",
    "parent": "450000",
    "children": [{
      "id": "451002",
      "name": "右江区",
      "parent": "451000",
      "children": null },
    {
      "id": "451021",
      "name": "田阳县",
      "parent": "451000",
      "children": null },
    {
      "id": "451022",
      "name": "田东县",
      "parent": "451000",
      "children": null },
    {
      "id": "451023",
      "name": "平果县",
      "parent": "451000",
      "children": null },
    {
      "id": "451024",
      "name": "德保县",
      "parent": "451000",
      "children": null },
    {
      "id": "451025",
      "name": "靖西县",
      "parent": "451000",
      "children": null },
    {
      "id": "451026",
      "name": "那坡县",
      "parent": "451000",
      "children": null },
    {
      "id": "451027",
      "name": "凌云县",
      "parent": "451000",
      "children": null },
    {
      "id": "451028",
      "name": "乐业县",
      "parent": "451000",
      "children": null },
    {
      "id": "451029",
      "name": "田林县",
      "parent": "451000",
      "children": null },
    {
      "id": "451030",
      "name": "西林县",
      "parent": "451000",
      "children": null },
    {
      "id": "451031",
      "name": "隆林各族自治县",
      "parent": "451000",
      "children": null },
    {
      "id": "451032",
      "name": "其它区",
      "parent": "451000",
      "children": null }] },

  {
    "id": "451100",
    "name": "贺州市",
    "parent": "450000",
    "children": [{
      "id": "451102",
      "name": "八步区",
      "parent": "451100",
      "children": null },
    {
      "id": "451119",
      "name": "平桂管理区",
      "parent": "451100",
      "children": null },
    {
      "id": "451121",
      "name": "昭平县",
      "parent": "451100",
      "children": null },
    {
      "id": "451122",
      "name": "钟山县",
      "parent": "451100",
      "children": null },
    {
      "id": "451123",
      "name": "富川瑶族自治县",
      "parent": "451100",
      "children": null },
    {
      "id": "451124",
      "name": "其它区",
      "parent": "451100",
      "children": null }] },

  {
    "id": "451200",
    "name": "河池市",
    "parent": "450000",
    "children": [{
      "id": "451202",
      "name": "金城江区",
      "parent": "451200",
      "children": null },
    {
      "id": "451221",
      "name": "南丹县",
      "parent": "451200",
      "children": null },
    {
      "id": "451222",
      "name": "天峨县",
      "parent": "451200",
      "children": null },
    {
      "id": "451223",
      "name": "凤山县",
      "parent": "451200",
      "children": null },
    {
      "id": "451224",
      "name": "东兰县",
      "parent": "451200",
      "children": null },
    {
      "id": "451225",
      "name": "罗城仫佬族自治县",
      "parent": "451200",
      "children": null },
    {
      "id": "451226",
      "name": "环江毛南族自治县",
      "parent": "451200",
      "children": null },
    {
      "id": "451227",
      "name": "巴马瑶族自治县",
      "parent": "451200",
      "children": null },
    {
      "id": "451228",
      "name": "都安瑶族自治县",
      "parent": "451200",
      "children": null },
    {
      "id": "451229",
      "name": "大化瑶族自治县",
      "parent": "451200",
      "children": null },
    {
      "id": "451281",
      "name": "宜州市",
      "parent": "451200",
      "children": null },
    {
      "id": "451282",
      "name": "其它区",
      "parent": "451200",
      "children": null }] },

  {
    "id": "451300",
    "name": "来宾市",
    "parent": "450000",
    "children": [{
      "id": "451302",
      "name": "兴宾区",
      "parent": "451300",
      "children": null },
    {
      "id": "451321",
      "name": "忻城县",
      "parent": "451300",
      "children": null },
    {
      "id": "451322",
      "name": "象州县",
      "parent": "451300",
      "children": null },
    {
      "id": "451323",
      "name": "武宣县",
      "parent": "451300",
      "children": null },
    {
      "id": "451324",
      "name": "金秀瑶族自治县",
      "parent": "451300",
      "children": null },
    {
      "id": "451381",
      "name": "合山市",
      "parent": "451300",
      "children": null },
    {
      "id": "451382",
      "name": "其它区",
      "parent": "451300",
      "children": null }] },

  {
    "id": "451400",
    "name": "崇左市",
    "parent": "450000",
    "children": [{
      "id": "451402",
      "name": "江州区",
      "parent": "451400",
      "children": null },
    {
      "id": "451421",
      "name": "扶绥县",
      "parent": "451400",
      "children": null },
    {
      "id": "451422",
      "name": "宁明县",
      "parent": "451400",
      "children": null },
    {
      "id": "451423",
      "name": "龙州县",
      "parent": "451400",
      "children": null },
    {
      "id": "451424",
      "name": "大新县",
      "parent": "451400",
      "children": null },
    {
      "id": "451425",
      "name": "天等县",
      "parent": "451400",
      "children": null },
    {
      "id": "451481",
      "name": "凭祥市",
      "parent": "451400",
      "children": null },
    {
      "id": "451482",
      "name": "其它区",
      "parent": "451400",
      "children": null }] }] },


{
  "id": "460000",
  "name": "海南省",
  "children": [{
    "id": "460100",
    "name": "海口市",
    "parent": "460000",
    "children": [{
      "id": "460105",
      "name": "秀英区",
      "parent": "460100",
      "children": null },
    {
      "id": "460106",
      "name": "龙华区",
      "parent": "460100",
      "children": null },
    {
      "id": "460107",
      "name": "琼山区",
      "parent": "460100",
      "children": null },
    {
      "id": "460108",
      "name": "美兰区",
      "parent": "460100",
      "children": null },
    {
      "id": "460109",
      "name": "其它区",
      "parent": "460100",
      "children": null }] },

  {
    "id": "460200",
    "name": "三亚市",
    "parent": "460000",
    "children": null },
  {
    "id": "460300",
    "name": "三沙市",
    "parent": "460000",
    "children": [{
      "id": "460321",
      "name": "西沙群岛",
      "parent": "460300",
      "children": null },
    {
      "id": "460322",
      "name": "南沙群岛",
      "parent": "460300",
      "children": null },
    {
      "id": "460323",
      "name": "中沙群岛的岛礁及其海域",
      "parent": "460300",
      "children": null }] },

  {
    "id": "469001",
    "name": "五指山市",
    "parent": "460000",
    "children": null },
  {
    "id": "469002",
    "name": "琼海市",
    "parent": "460000",
    "children": null },
  {
    "id": "469003",
    "name": "儋州市",
    "parent": "460000",
    "children": null },
  {
    "id": "469005",
    "name": "文昌市",
    "parent": "460000",
    "children": null },
  {
    "id": "469006",
    "name": "万宁市",
    "parent": "460000",
    "children": null },
  {
    "id": "469007",
    "name": "东方市",
    "parent": "460000",
    "children": null },
  {
    "id": "469025",
    "name": "定安县",
    "parent": "460000",
    "children": null },
  {
    "id": "469026",
    "name": "屯昌县",
    "parent": "460000",
    "children": null },
  {
    "id": "469027",
    "name": "澄迈县",
    "parent": "460000",
    "children": null },
  {
    "id": "469028",
    "name": "临高县",
    "parent": "460000",
    "children": null },
  {
    "id": "469030",
    "name": "白沙黎族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469031",
    "name": "昌江黎族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469033",
    "name": "乐东黎族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469034",
    "name": "陵水黎族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469035",
    "name": "保亭黎族苗族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469036",
    "name": "琼中黎族苗族自治县",
    "parent": "460000",
    "children": null },
  {
    "id": "469037",
    "name": "西沙群岛",
    "parent": "460000",
    "children": null },
  {
    "id": "469038",
    "name": "南沙群岛",
    "parent": "460000",
    "children": null },
  {
    "id": "469039",
    "name": "中沙群岛的岛礁及其海域",
    "parent": "460000",
    "children": null }] },

{
  "id": "500000",
  "name": "重庆市",
  "children": [{
    "id": "500100",
    "name": "重庆市",
    "parent": "500000",
    "children": [{
      "id": "500101",
      "name": "万州区",
      "parent": "500100",
      "children": null },
    {
      "id": "500102",
      "name": "涪陵区",
      "parent": "500100",
      "children": null },
    {
      "id": "500103",
      "name": "渝中区",
      "parent": "500100",
      "children": null },
    {
      "id": "500104",
      "name": "大渡口区",
      "parent": "500100",
      "children": null },
    {
      "id": "500105",
      "name": "江北区",
      "parent": "500100",
      "children": null },
    {
      "id": "500106",
      "name": "沙坪坝区",
      "parent": "500100",
      "children": null },
    {
      "id": "500107",
      "name": "九龙坡区",
      "parent": "500100",
      "children": null },
    {
      "id": "500108",
      "name": "南岸区",
      "parent": "500100",
      "children": null },
    {
      "id": "500109",
      "name": "北碚区",
      "parent": "500100",
      "children": null },
    {
      "id": "500110",
      "name": "万盛区",
      "parent": "500100",
      "children": null },
    {
      "id": "500111",
      "name": "双桥区",
      "parent": "500100",
      "children": null },
    {
      "id": "500112",
      "name": "渝北区",
      "parent": "500100",
      "children": null },
    {
      "id": "500113",
      "name": "巴南区",
      "parent": "500100",
      "children": null },
    {
      "id": "500114",
      "name": "黔江区",
      "parent": "500100",
      "children": null },
    {
      "id": "500115",
      "name": "长寿区",
      "parent": "500100",
      "children": null },
    {
      "id": "500222",
      "name": "綦江区",
      "parent": "500100",
      "children": null },
    {
      "id": "500223",
      "name": "潼南县",
      "parent": "500100",
      "children": null },
    {
      "id": "500224",
      "name": "铜梁区",
      "parent": "500100",
      "children": null },
    {
      "id": "500225",
      "name": "大足区",
      "parent": "500100",
      "children": null },
    {
      "id": "500226",
      "name": "荣昌县",
      "parent": "500100",
      "children": null },
    {
      "id": "500227",
      "name": "璧山区",
      "parent": "500100",
      "children": null },
    {
      "id": "500228",
      "name": "梁平县",
      "parent": "500100",
      "children": null },
    {
      "id": "500229",
      "name": "城口县",
      "parent": "500100",
      "children": null },
    {
      "id": "500230",
      "name": "丰都县",
      "parent": "500100",
      "children": null },
    {
      "id": "500231",
      "name": "垫江县",
      "parent": "500100",
      "children": null },
    {
      "id": "500232",
      "name": "武隆县",
      "parent": "500100",
      "children": null },
    {
      "id": "500233",
      "name": "忠县",
      "parent": "500100",
      "children": null },
    {
      "id": "500234",
      "name": "开县",
      "parent": "500100",
      "children": null },
    {
      "id": "500235",
      "name": "云阳县",
      "parent": "500100",
      "children": null },
    {
      "id": "500236",
      "name": "奉节县",
      "parent": "500100",
      "children": null },
    {
      "id": "500237",
      "name": "巫山县",
      "parent": "500100",
      "children": null },
    {
      "id": "500238",
      "name": "巫溪县",
      "parent": "500100",
      "children": null },
    {
      "id": "500240",
      "name": "石柱土家族自治县",
      "parent": "500100",
      "children": null },
    {
      "id": "500241",
      "name": "秀山土家族苗族自治县",
      "parent": "500100",
      "children": null },
    {
      "id": "500242",
      "name": "酉阳土家族苗族自治县",
      "parent": "500100",
      "children": null },
    {
      "id": "500243",
      "name": "彭水苗族土家族自治县",
      "parent": "500100",
      "children": null },
    {
      "id": "500381",
      "name": "江津区",
      "parent": "500100",
      "children": null },
    {
      "id": "500382",
      "name": "合川区",
      "parent": "500100",
      "children": null },
    {
      "id": "500383",
      "name": "永川区",
      "parent": "500100",
      "children": null },
    {
      "id": "500384",
      "name": "南川区",
      "parent": "500100",
      "children": null },
    {
      "id": "500385",
      "name": "其它区",
      "parent": "500100",
      "children": null }] }] },


{
  "id": "510000",
  "name": "四川省",
  "children": [{
    "id": "510100",
    "name": "成都市",
    "parent": "510000",
    "children": [{
      "id": "510104",
      "name": "锦江区",
      "parent": "510100",
      "children": null },
    {
      "id": "510105",
      "name": "青羊区",
      "parent": "510100",
      "children": null },
    {
      "id": "510106",
      "name": "金牛区",
      "parent": "510100",
      "children": null },
    {
      "id": "510107",
      "name": "武侯区",
      "parent": "510100",
      "children": null },
    {
      "id": "510108",
      "name": "成华区",
      "parent": "510100",
      "children": null },
    {
      "id": "510112",
      "name": "龙泉驿区",
      "parent": "510100",
      "children": null },
    {
      "id": "510113",
      "name": "青白江区",
      "parent": "510100",
      "children": null },
    {
      "id": "510114",
      "name": "新都区",
      "parent": "510100",
      "children": null },
    {
      "id": "510115",
      "name": "温江区",
      "parent": "510100",
      "children": null },
    {
      "id": "510121",
      "name": "金堂县",
      "parent": "510100",
      "children": null },
    {
      "id": "510122",
      "name": "双流县",
      "parent": "510100",
      "children": null },
    {
      "id": "510124",
      "name": "郫县",
      "parent": "510100",
      "children": null },
    {
      "id": "510129",
      "name": "大邑县",
      "parent": "510100",
      "children": null },
    {
      "id": "510131",
      "name": "蒲江县",
      "parent": "510100",
      "children": null },
    {
      "id": "510132",
      "name": "新津县",
      "parent": "510100",
      "children": null },
    {
      "id": "510181",
      "name": "都江堰市",
      "parent": "510100",
      "children": null },
    {
      "id": "510182",
      "name": "彭州市",
      "parent": "510100",
      "children": null },
    {
      "id": "510183",
      "name": "邛崃市",
      "parent": "510100",
      "children": null },
    {
      "id": "510184",
      "name": "崇州市",
      "parent": "510100",
      "children": null },
    {
      "id": "510185",
      "name": "其它区",
      "parent": "510100",
      "children": null }] },

  {
    "id": "510300",
    "name": "自贡市",
    "parent": "510000",
    "children": [{
      "id": "510302",
      "name": "自流井区",
      "parent": "510300",
      "children": null },
    {
      "id": "510303",
      "name": "贡井区",
      "parent": "510300",
      "children": null },
    {
      "id": "510304",
      "name": "大安区",
      "parent": "510300",
      "children": null },
    {
      "id": "510311",
      "name": "沿滩区",
      "parent": "510300",
      "children": null },
    {
      "id": "510321",
      "name": "荣县",
      "parent": "510300",
      "children": null },
    {
      "id": "510322",
      "name": "富顺县",
      "parent": "510300",
      "children": null },
    {
      "id": "510323",
      "name": "其它区",
      "parent": "510300",
      "children": null }] },

  {
    "id": "510400",
    "name": "攀枝花市",
    "parent": "510000",
    "children": [{
      "id": "510402",
      "name": "东区",
      "parent": "510400",
      "children": null },
    {
      "id": "510403",
      "name": "西区",
      "parent": "510400",
      "children": null },
    {
      "id": "510411",
      "name": "仁和区",
      "parent": "510400",
      "children": null },
    {
      "id": "510421",
      "name": "米易县",
      "parent": "510400",
      "children": null },
    {
      "id": "510422",
      "name": "盐边县",
      "parent": "510400",
      "children": null },
    {
      "id": "510423",
      "name": "其它区",
      "parent": "510400",
      "children": null }] },

  {
    "id": "510500",
    "name": "泸州市",
    "parent": "510000",
    "children": [{
      "id": "510502",
      "name": "江阳区",
      "parent": "510500",
      "children": null },
    {
      "id": "510503",
      "name": "纳溪区",
      "parent": "510500",
      "children": null },
    {
      "id": "510504",
      "name": "龙马潭区",
      "parent": "510500",
      "children": null },
    {
      "id": "510521",
      "name": "泸县",
      "parent": "510500",
      "children": null },
    {
      "id": "510522",
      "name": "合江县",
      "parent": "510500",
      "children": null },
    {
      "id": "510524",
      "name": "叙永县",
      "parent": "510500",
      "children": null },
    {
      "id": "510525",
      "name": "古蔺县",
      "parent": "510500",
      "children": null },
    {
      "id": "510526",
      "name": "其它区",
      "parent": "510500",
      "children": null }] },

  {
    "id": "510600",
    "name": "德阳市",
    "parent": "510000",
    "children": [{
      "id": "510603",
      "name": "旌阳区",
      "parent": "510600",
      "children": null },
    {
      "id": "510623",
      "name": "中江县",
      "parent": "510600",
      "children": null },
    {
      "id": "510626",
      "name": "罗江县",
      "parent": "510600",
      "children": null },
    {
      "id": "510681",
      "name": "广汉市",
      "parent": "510600",
      "children": null },
    {
      "id": "510682",
      "name": "什邡市",
      "parent": "510600",
      "children": null },
    {
      "id": "510683",
      "name": "绵竹市",
      "parent": "510600",
      "children": null },
    {
      "id": "510684",
      "name": "其它区",
      "parent": "510600",
      "children": null }] },

  {
    "id": "510700",
    "name": "绵阳市",
    "parent": "510000",
    "children": [{
      "id": "510703",
      "name": "涪城区",
      "parent": "510700",
      "children": null },
    {
      "id": "510704",
      "name": "游仙区",
      "parent": "510700",
      "children": null },
    {
      "id": "510722",
      "name": "三台县",
      "parent": "510700",
      "children": null },
    {
      "id": "510723",
      "name": "盐亭县",
      "parent": "510700",
      "children": null },
    {
      "id": "510724",
      "name": "安县",
      "parent": "510700",
      "children": null },
    {
      "id": "510725",
      "name": "梓潼县",
      "parent": "510700",
      "children": null },
    {
      "id": "510726",
      "name": "北川羌族自治县",
      "parent": "510700",
      "children": null },
    {
      "id": "510727",
      "name": "平武县",
      "parent": "510700",
      "children": null },
    {
      "id": "510751",
      "name": "高新区",
      "parent": "510700",
      "children": null },
    {
      "id": "510781",
      "name": "江油市",
      "parent": "510700",
      "children": null },
    {
      "id": "510782",
      "name": "其它区",
      "parent": "510700",
      "children": null }] },

  {
    "id": "510800",
    "name": "广元市",
    "parent": "510000",
    "children": [{
      "id": "510802",
      "name": "利州区",
      "parent": "510800",
      "children": null },
    {
      "id": "510811",
      "name": "昭化区",
      "parent": "510800",
      "children": null },
    {
      "id": "510812",
      "name": "朝天区",
      "parent": "510800",
      "children": null },
    {
      "id": "510821",
      "name": "旺苍县",
      "parent": "510800",
      "children": null },
    {
      "id": "510822",
      "name": "青川县",
      "parent": "510800",
      "children": null },
    {
      "id": "510823",
      "name": "剑阁县",
      "parent": "510800",
      "children": null },
    {
      "id": "510824",
      "name": "苍溪县",
      "parent": "510800",
      "children": null },
    {
      "id": "510825",
      "name": "其它区",
      "parent": "510800",
      "children": null }] },

  {
    "id": "510900",
    "name": "遂宁市",
    "parent": "510000",
    "children": [{
      "id": "510903",
      "name": "船山区",
      "parent": "510900",
      "children": null },
    {
      "id": "510904",
      "name": "安居区",
      "parent": "510900",
      "children": null },
    {
      "id": "510921",
      "name": "蓬溪县",
      "parent": "510900",
      "children": null },
    {
      "id": "510922",
      "name": "射洪县",
      "parent": "510900",
      "children": null },
    {
      "id": "510923",
      "name": "大英县",
      "parent": "510900",
      "children": null },
    {
      "id": "510924",
      "name": "其它区",
      "parent": "510900",
      "children": null }] },

  {
    "id": "511000",
    "name": "内江市",
    "parent": "510000",
    "children": [{
      "id": "511002",
      "name": "市中区",
      "parent": "511000",
      "children": null },
    {
      "id": "511011",
      "name": "东兴区",
      "parent": "511000",
      "children": null },
    {
      "id": "511024",
      "name": "威远县",
      "parent": "511000",
      "children": null },
    {
      "id": "511025",
      "name": "资中县",
      "parent": "511000",
      "children": null },
    {
      "id": "511028",
      "name": "隆昌县",
      "parent": "511000",
      "children": null },
    {
      "id": "511029",
      "name": "其它区",
      "parent": "511000",
      "children": null }] },

  {
    "id": "511100",
    "name": "乐山市",
    "parent": "510000",
    "children": [{
      "id": "511102",
      "name": "市中区",
      "parent": "511100",
      "children": null },
    {
      "id": "511111",
      "name": "沙湾区",
      "parent": "511100",
      "children": null },
    {
      "id": "511112",
      "name": "五通桥区",
      "parent": "511100",
      "children": null },
    {
      "id": "511113",
      "name": "金口河区",
      "parent": "511100",
      "children": null },
    {
      "id": "511123",
      "name": "犍为县",
      "parent": "511100",
      "children": null },
    {
      "id": "511124",
      "name": "井研县",
      "parent": "511100",
      "children": null },
    {
      "id": "511126",
      "name": "夹江县",
      "parent": "511100",
      "children": null },
    {
      "id": "511129",
      "name": "沐川县",
      "parent": "511100",
      "children": null },
    {
      "id": "511132",
      "name": "峨边彝族自治县",
      "parent": "511100",
      "children": null },
    {
      "id": "511133",
      "name": "马边彝族自治县",
      "parent": "511100",
      "children": null },
    {
      "id": "511181",
      "name": "峨眉山市",
      "parent": "511100",
      "children": null },
    {
      "id": "511182",
      "name": "其它区",
      "parent": "511100",
      "children": null }] },

  {
    "id": "511300",
    "name": "南充市",
    "parent": "510000",
    "children": [{
      "id": "511302",
      "name": "顺庆区",
      "parent": "511300",
      "children": null },
    {
      "id": "511303",
      "name": "高坪区",
      "parent": "511300",
      "children": null },
    {
      "id": "511304",
      "name": "嘉陵区",
      "parent": "511300",
      "children": null },
    {
      "id": "511321",
      "name": "南部县",
      "parent": "511300",
      "children": null },
    {
      "id": "511322",
      "name": "营山县",
      "parent": "511300",
      "children": null },
    {
      "id": "511323",
      "name": "蓬安县",
      "parent": "511300",
      "children": null },
    {
      "id": "511324",
      "name": "仪陇县",
      "parent": "511300",
      "children": null },
    {
      "id": "511325",
      "name": "西充县",
      "parent": "511300",
      "children": null },
    {
      "id": "511381",
      "name": "阆中市",
      "parent": "511300",
      "children": null },
    {
      "id": "511382",
      "name": "其它区",
      "parent": "511300",
      "children": null }] },

  {
    "id": "511400",
    "name": "眉山市",
    "parent": "510000",
    "children": [{
      "id": "511402",
      "name": "东坡区",
      "parent": "511400",
      "children": null },
    {
      "id": "511421",
      "name": "仁寿县",
      "parent": "511400",
      "children": null },
    {
      "id": "511422",
      "name": "彭山区",
      "parent": "511400",
      "children": null },
    {
      "id": "511423",
      "name": "洪雅县",
      "parent": "511400",
      "children": null },
    {
      "id": "511424",
      "name": "丹棱县",
      "parent": "511400",
      "children": null },
    {
      "id": "511425",
      "name": "青神县",
      "parent": "511400",
      "children": null },
    {
      "id": "511426",
      "name": "其它区",
      "parent": "511400",
      "children": null }] },

  {
    "id": "511500",
    "name": "宜宾市",
    "parent": "510000",
    "children": [{
      "id": "511502",
      "name": "翠屏区",
      "parent": "511500",
      "children": null },
    {
      "id": "511521",
      "name": "宜宾县",
      "parent": "511500",
      "children": null },
    {
      "id": "511522",
      "name": "南溪区",
      "parent": "511500",
      "children": null },
    {
      "id": "511523",
      "name": "江安县",
      "parent": "511500",
      "children": null },
    {
      "id": "511524",
      "name": "长宁县",
      "parent": "511500",
      "children": null },
    {
      "id": "511525",
      "name": "高县",
      "parent": "511500",
      "children": null },
    {
      "id": "511526",
      "name": "珙县",
      "parent": "511500",
      "children": null },
    {
      "id": "511527",
      "name": "筠连县",
      "parent": "511500",
      "children": null },
    {
      "id": "511528",
      "name": "兴文县",
      "parent": "511500",
      "children": null },
    {
      "id": "511529",
      "name": "屏山县",
      "parent": "511500",
      "children": null },
    {
      "id": "511530",
      "name": "其它区",
      "parent": "511500",
      "children": null }] },

  {
    "id": "511600",
    "name": "广安市",
    "parent": "510000",
    "children": [{
      "id": "511602",
      "name": "广安区",
      "parent": "511600",
      "children": null },
    {
      "id": "511603",
      "name": "前锋区",
      "parent": "511600",
      "children": null },
    {
      "id": "511621",
      "name": "岳池县",
      "parent": "511600",
      "children": null },
    {
      "id": "511622",
      "name": "武胜县",
      "parent": "511600",
      "children": null },
    {
      "id": "511623",
      "name": "邻水县",
      "parent": "511600",
      "children": null },
    {
      "id": "511681",
      "name": "华蓥市",
      "parent": "511600",
      "children": null },
    {
      "id": "511682",
      "name": "市辖区",
      "parent": "511600",
      "children": null },
    {
      "id": "511683",
      "name": "其它区",
      "parent": "511600",
      "children": null }] },

  {
    "id": "511700",
    "name": "达州市",
    "parent": "510000",
    "children": [{
      "id": "511702",
      "name": "通川区",
      "parent": "511700",
      "children": null },
    {
      "id": "511721",
      "name": "达川区",
      "parent": "511700",
      "children": null },
    {
      "id": "511722",
      "name": "宣汉县",
      "parent": "511700",
      "children": null },
    {
      "id": "511723",
      "name": "开江县",
      "parent": "511700",
      "children": null },
    {
      "id": "511724",
      "name": "大竹县",
      "parent": "511700",
      "children": null },
    {
      "id": "511725",
      "name": "渠县",
      "parent": "511700",
      "children": null },
    {
      "id": "511781",
      "name": "万源市",
      "parent": "511700",
      "children": null },
    {
      "id": "511782",
      "name": "其它区",
      "parent": "511700",
      "children": null }] },

  {
    "id": "511800",
    "name": "雅安市",
    "parent": "510000",
    "children": [{
      "id": "511802",
      "name": "雨城区",
      "parent": "511800",
      "children": null },
    {
      "id": "511821",
      "name": "名山区",
      "parent": "511800",
      "children": null },
    {
      "id": "511822",
      "name": "荥经县",
      "parent": "511800",
      "children": null },
    {
      "id": "511823",
      "name": "汉源县",
      "parent": "511800",
      "children": null },
    {
      "id": "511824",
      "name": "石棉县",
      "parent": "511800",
      "children": null },
    {
      "id": "511825",
      "name": "天全县",
      "parent": "511800",
      "children": null },
    {
      "id": "511826",
      "name": "芦山县",
      "parent": "511800",
      "children": null },
    {
      "id": "511827",
      "name": "宝兴县",
      "parent": "511800",
      "children": null },
    {
      "id": "511828",
      "name": "其它区",
      "parent": "511800",
      "children": null }] },

  {
    "id": "511900",
    "name": "巴中市",
    "parent": "510000",
    "children": [{
      "id": "511902",
      "name": "巴州区",
      "parent": "511900",
      "children": null },
    {
      "id": "511903",
      "name": "恩阳区",
      "parent": "511900",
      "children": null },
    {
      "id": "511921",
      "name": "通江县",
      "parent": "511900",
      "children": null },
    {
      "id": "511922",
      "name": "南江县",
      "parent": "511900",
      "children": null },
    {
      "id": "511923",
      "name": "平昌县",
      "parent": "511900",
      "children": null },
    {
      "id": "511924",
      "name": "其它区",
      "parent": "511900",
      "children": null }] },

  {
    "id": "512000",
    "name": "资阳市",
    "parent": "510000",
    "children": [{
      "id": "512002",
      "name": "雁江区",
      "parent": "512000",
      "children": null },
    {
      "id": "512021",
      "name": "安岳县",
      "parent": "512000",
      "children": null },
    {
      "id": "512022",
      "name": "乐至县",
      "parent": "512000",
      "children": null },
    {
      "id": "512081",
      "name": "简阳市",
      "parent": "512000",
      "children": null },
    {
      "id": "512082",
      "name": "其它区",
      "parent": "512000",
      "children": null }] },

  {
    "id": "513200",
    "name": "阿坝藏族羌族自治州",
    "parent": "510000",
    "children": [{
      "id": "513221",
      "name": "汶川县",
      "parent": "513200",
      "children": null },
    {
      "id": "513222",
      "name": "理县",
      "parent": "513200",
      "children": null },
    {
      "id": "513223",
      "name": "茂县",
      "parent": "513200",
      "children": null },
    {
      "id": "513224",
      "name": "松潘县",
      "parent": "513200",
      "children": null },
    {
      "id": "513225",
      "name": "九寨沟县",
      "parent": "513200",
      "children": null },
    {
      "id": "513226",
      "name": "金川县",
      "parent": "513200",
      "children": null },
    {
      "id": "513227",
      "name": "小金县",
      "parent": "513200",
      "children": null },
    {
      "id": "513228",
      "name": "黑水县",
      "parent": "513200",
      "children": null },
    {
      "id": "513229",
      "name": "马尔康县",
      "parent": "513200",
      "children": null },
    {
      "id": "513230",
      "name": "壤塘县",
      "parent": "513200",
      "children": null },
    {
      "id": "513231",
      "name": "阿坝县",
      "parent": "513200",
      "children": null },
    {
      "id": "513232",
      "name": "若尔盖县",
      "parent": "513200",
      "children": null },
    {
      "id": "513233",
      "name": "红原县",
      "parent": "513200",
      "children": null },
    {
      "id": "513234",
      "name": "其它区",
      "parent": "513200",
      "children": null }] },

  {
    "id": "513300",
    "name": "甘孜藏族自治州",
    "parent": "510000",
    "children": [{
      "id": "513321",
      "name": "康定市",
      "parent": "513300",
      "children": null },
    {
      "id": "513322",
      "name": "泸定县",
      "parent": "513300",
      "children": null },
    {
      "id": "513323",
      "name": "丹巴县",
      "parent": "513300",
      "children": null },
    {
      "id": "513324",
      "name": "九龙县",
      "parent": "513300",
      "children": null },
    {
      "id": "513325",
      "name": "雅江县",
      "parent": "513300",
      "children": null },
    {
      "id": "513326",
      "name": "道孚县",
      "parent": "513300",
      "children": null },
    {
      "id": "513327",
      "name": "炉霍县",
      "parent": "513300",
      "children": null },
    {
      "id": "513328",
      "name": "甘孜县",
      "parent": "513300",
      "children": null },
    {
      "id": "513329",
      "name": "新龙县",
      "parent": "513300",
      "children": null },
    {
      "id": "513330",
      "name": "德格县",
      "parent": "513300",
      "children": null },
    {
      "id": "513331",
      "name": "白玉县",
      "parent": "513300",
      "children": null },
    {
      "id": "513332",
      "name": "石渠县",
      "parent": "513300",
      "children": null },
    {
      "id": "513333",
      "name": "色达县",
      "parent": "513300",
      "children": null },
    {
      "id": "513334",
      "name": "理塘县",
      "parent": "513300",
      "children": null },
    {
      "id": "513335",
      "name": "巴塘县",
      "parent": "513300",
      "children": null },
    {
      "id": "513336",
      "name": "乡城县",
      "parent": "513300",
      "children": null },
    {
      "id": "513337",
      "name": "稻城县",
      "parent": "513300",
      "children": null },
    {
      "id": "513338",
      "name": "得荣县",
      "parent": "513300",
      "children": null },
    {
      "id": "513339",
      "name": "其它区",
      "parent": "513300",
      "children": null }] },

  {
    "id": "513400",
    "name": "凉山彝族自治州",
    "parent": "510000",
    "children": [{
      "id": "513401",
      "name": "西昌市",
      "parent": "513400",
      "children": null },
    {
      "id": "513422",
      "name": "木里藏族自治县",
      "parent": "513400",
      "children": null },
    {
      "id": "513423",
      "name": "盐源县",
      "parent": "513400",
      "children": null },
    {
      "id": "513424",
      "name": "德昌县",
      "parent": "513400",
      "children": null },
    {
      "id": "513425",
      "name": "会理县",
      "parent": "513400",
      "children": null },
    {
      "id": "513426",
      "name": "会东县",
      "parent": "513400",
      "children": null },
    {
      "id": "513427",
      "name": "宁南县",
      "parent": "513400",
      "children": null },
    {
      "id": "513428",
      "name": "普格县",
      "parent": "513400",
      "children": null },
    {
      "id": "513429",
      "name": "布拖县",
      "parent": "513400",
      "children": null },
    {
      "id": "513430",
      "name": "金阳县",
      "parent": "513400",
      "children": null },
    {
      "id": "513431",
      "name": "昭觉县",
      "parent": "513400",
      "children": null },
    {
      "id": "513432",
      "name": "喜德县",
      "parent": "513400",
      "children": null },
    {
      "id": "513433",
      "name": "冕宁县",
      "parent": "513400",
      "children": null },
    {
      "id": "513434",
      "name": "越西县",
      "parent": "513400",
      "children": null },
    {
      "id": "513435",
      "name": "甘洛县",
      "parent": "513400",
      "children": null },
    {
      "id": "513436",
      "name": "美姑县",
      "parent": "513400",
      "children": null },
    {
      "id": "513437",
      "name": "雷波县",
      "parent": "513400",
      "children": null },
    {
      "id": "513438",
      "name": "其它区",
      "parent": "513400",
      "children": null }] }] },


{
  "id": "520000",
  "name": "贵州省",
  "children": [{
    "id": "520100",
    "name": "贵阳市",
    "parent": "520000",
    "children": [{
      "id": "520102",
      "name": "南明区",
      "parent": "520100",
      "children": null },
    {
      "id": "520103",
      "name": "云岩区",
      "parent": "520100",
      "children": null },
    {
      "id": "520111",
      "name": "花溪区",
      "parent": "520100",
      "children": null },
    {
      "id": "520112",
      "name": "乌当区",
      "parent": "520100",
      "children": null },
    {
      "id": "520113",
      "name": "白云区",
      "parent": "520100",
      "children": null },
    {
      "id": "520114",
      "name": "小河区",
      "parent": "520100",
      "children": null },
    {
      "id": "520121",
      "name": "开阳县",
      "parent": "520100",
      "children": null },
    {
      "id": "520122",
      "name": "息烽县",
      "parent": "520100",
      "children": null },
    {
      "id": "520123",
      "name": "修文县",
      "parent": "520100",
      "children": null },
    {
      "id": "520151",
      "name": "观山湖区",
      "parent": "520100",
      "children": null },
    {
      "id": "520181",
      "name": "清镇市",
      "parent": "520100",
      "children": null },
    {
      "id": "520182",
      "name": "其它区",
      "parent": "520100",
      "children": null }] },

  {
    "id": "520200",
    "name": "六盘水市",
    "parent": "520000",
    "children": [{
      "id": "520201",
      "name": "钟山区",
      "parent": "520200",
      "children": null },
    {
      "id": "520203",
      "name": "六枝特区",
      "parent": "520200",
      "children": null },
    {
      "id": "520221",
      "name": "水城县",
      "parent": "520200",
      "children": null },
    {
      "id": "520222",
      "name": "盘县",
      "parent": "520200",
      "children": null },
    {
      "id": "520223",
      "name": "其它区",
      "parent": "520200",
      "children": null }] },

  {
    "id": "520300",
    "name": "遵义市",
    "parent": "520000",
    "children": [{
      "id": "520302",
      "name": "红花岗区",
      "parent": "520300",
      "children": null },
    {
      "id": "520303",
      "name": "汇川区",
      "parent": "520300",
      "children": null },
    {
      "id": "520321",
      "name": "遵义县",
      "parent": "520300",
      "children": null },
    {
      "id": "520322",
      "name": "桐梓县",
      "parent": "520300",
      "children": null },
    {
      "id": "520323",
      "name": "绥阳县",
      "parent": "520300",
      "children": null },
    {
      "id": "520324",
      "name": "正安县",
      "parent": "520300",
      "children": null },
    {
      "id": "520325",
      "name": "道真仡佬族苗族自治县",
      "parent": "520300",
      "children": null },
    {
      "id": "520326",
      "name": "务川仡佬族苗族自治县",
      "parent": "520300",
      "children": null },
    {
      "id": "520327",
      "name": "凤冈县",
      "parent": "520300",
      "children": null },
    {
      "id": "520328",
      "name": "湄潭县",
      "parent": "520300",
      "children": null },
    {
      "id": "520329",
      "name": "余庆县",
      "parent": "520300",
      "children": null },
    {
      "id": "520330",
      "name": "习水县",
      "parent": "520300",
      "children": null },
    {
      "id": "520381",
      "name": "赤水市",
      "parent": "520300",
      "children": null },
    {
      "id": "520382",
      "name": "仁怀市",
      "parent": "520300",
      "children": null },
    {
      "id": "520383",
      "name": "其它区",
      "parent": "520300",
      "children": null }] },

  {
    "id": "520400",
    "name": "安顺市",
    "parent": "520000",
    "children": [{
      "id": "520402",
      "name": "西秀区",
      "parent": "520400",
      "children": null },
    {
      "id": "520421",
      "name": "平坝区",
      "parent": "520400",
      "children": null },
    {
      "id": "520422",
      "name": "普定县",
      "parent": "520400",
      "children": null },
    {
      "id": "520423",
      "name": "镇宁布依族苗族自治县",
      "parent": "520400",
      "children": null },
    {
      "id": "520424",
      "name": "关岭布依族苗族自治县",
      "parent": "520400",
      "children": null },
    {
      "id": "520425",
      "name": "紫云苗族布依族自治县",
      "parent": "520400",
      "children": null },
    {
      "id": "520426",
      "name": "其它区",
      "parent": "520400",
      "children": null }] },

  {
    "id": "522200",
    "name": "铜仁市",
    "parent": "520000",
    "children": [{
      "id": "522201",
      "name": "碧江区",
      "parent": "522200",
      "children": null },
    {
      "id": "522222",
      "name": "江口县",
      "parent": "522200",
      "children": null },
    {
      "id": "522223",
      "name": "玉屏侗族自治县",
      "parent": "522200",
      "children": null },
    {
      "id": "522224",
      "name": "石阡县",
      "parent": "522200",
      "children": null },
    {
      "id": "522225",
      "name": "思南县",
      "parent": "522200",
      "children": null },
    {
      "id": "522226",
      "name": "印江土家族苗族自治县",
      "parent": "522200",
      "children": null },
    {
      "id": "522227",
      "name": "德江县",
      "parent": "522200",
      "children": null },
    {
      "id": "522228",
      "name": "沿河土家族自治县",
      "parent": "522200",
      "children": null },
    {
      "id": "522229",
      "name": "松桃苗族自治县",
      "parent": "522200",
      "children": null },
    {
      "id": "522230",
      "name": "万山区",
      "parent": "522200",
      "children": null },
    {
      "id": "522231",
      "name": "其它区",
      "parent": "522200",
      "children": null }] },

  {
    "id": "522300",
    "name": "黔西南布依族苗族自治州",
    "parent": "520000",
    "children": [{
      "id": "522301",
      "name": "兴义市",
      "parent": "522300",
      "children": null },
    {
      "id": "522322",
      "name": "兴仁县",
      "parent": "522300",
      "children": null },
    {
      "id": "522323",
      "name": "普安县",
      "parent": "522300",
      "children": null },
    {
      "id": "522324",
      "name": "晴隆县",
      "parent": "522300",
      "children": null },
    {
      "id": "522325",
      "name": "贞丰县",
      "parent": "522300",
      "children": null },
    {
      "id": "522326",
      "name": "望谟县",
      "parent": "522300",
      "children": null },
    {
      "id": "522327",
      "name": "册亨县",
      "parent": "522300",
      "children": null },
    {
      "id": "522328",
      "name": "安龙县",
      "parent": "522300",
      "children": null },
    {
      "id": "522329",
      "name": "其它区",
      "parent": "522300",
      "children": null }] },

  {
    "id": "522400",
    "name": "毕节市",
    "parent": "520000",
    "children": [{
      "id": "522401",
      "name": "七星关区",
      "parent": "522400",
      "children": null },
    {
      "id": "522422",
      "name": "大方县",
      "parent": "522400",
      "children": null },
    {
      "id": "522423",
      "name": "黔西县",
      "parent": "522400",
      "children": null },
    {
      "id": "522424",
      "name": "金沙县",
      "parent": "522400",
      "children": null },
    {
      "id": "522425",
      "name": "织金县",
      "parent": "522400",
      "children": null },
    {
      "id": "522426",
      "name": "纳雍县",
      "parent": "522400",
      "children": null },
    {
      "id": "522427",
      "name": "威宁彝族回族苗族自治县",
      "parent": "522400",
      "children": null },
    {
      "id": "522428",
      "name": "赫章县",
      "parent": "522400",
      "children": null },
    {
      "id": "522429",
      "name": "其它区",
      "parent": "522400",
      "children": null }] },

  {
    "id": "522600",
    "name": "黔东南苗族侗族自治州",
    "parent": "520000",
    "children": [{
      "id": "522601",
      "name": "凯里市",
      "parent": "522600",
      "children": null },
    {
      "id": "522622",
      "name": "黄平县",
      "parent": "522600",
      "children": null },
    {
      "id": "522623",
      "name": "施秉县",
      "parent": "522600",
      "children": null },
    {
      "id": "522624",
      "name": "三穗县",
      "parent": "522600",
      "children": null },
    {
      "id": "522625",
      "name": "镇远县",
      "parent": "522600",
      "children": null },
    {
      "id": "522626",
      "name": "岑巩县",
      "parent": "522600",
      "children": null },
    {
      "id": "522627",
      "name": "天柱县",
      "parent": "522600",
      "children": null },
    {
      "id": "522628",
      "name": "锦屏县",
      "parent": "522600",
      "children": null },
    {
      "id": "522629",
      "name": "剑河县",
      "parent": "522600",
      "children": null },
    {
      "id": "522630",
      "name": "台江县",
      "parent": "522600",
      "children": null },
    {
      "id": "522631",
      "name": "黎平县",
      "parent": "522600",
      "children": null },
    {
      "id": "522632",
      "name": "榕江县",
      "parent": "522600",
      "children": null },
    {
      "id": "522633",
      "name": "从江县",
      "parent": "522600",
      "children": null },
    {
      "id": "522634",
      "name": "雷山县",
      "parent": "522600",
      "children": null },
    {
      "id": "522635",
      "name": "麻江县",
      "parent": "522600",
      "children": null },
    {
      "id": "522636",
      "name": "丹寨县",
      "parent": "522600",
      "children": null },
    {
      "id": "522637",
      "name": "其它区",
      "parent": "522600",
      "children": null }] },

  {
    "id": "522700",
    "name": "黔南布依族苗族自治州",
    "parent": "520000",
    "children": [{
      "id": "522701",
      "name": "都匀市",
      "parent": "522700",
      "children": null },
    {
      "id": "522702",
      "name": "福泉市",
      "parent": "522700",
      "children": null },
    {
      "id": "522722",
      "name": "荔波县",
      "parent": "522700",
      "children": null },
    {
      "id": "522723",
      "name": "贵定县",
      "parent": "522700",
      "children": null },
    {
      "id": "522725",
      "name": "瓮安县",
      "parent": "522700",
      "children": null },
    {
      "id": "522726",
      "name": "独山县",
      "parent": "522700",
      "children": null },
    {
      "id": "522727",
      "name": "平塘县",
      "parent": "522700",
      "children": null },
    {
      "id": "522728",
      "name": "罗甸县",
      "parent": "522700",
      "children": null },
    {
      "id": "522729",
      "name": "长顺县",
      "parent": "522700",
      "children": null },
    {
      "id": "522730",
      "name": "龙里县",
      "parent": "522700",
      "children": null },
    {
      "id": "522731",
      "name": "惠水县",
      "parent": "522700",
      "children": null },
    {
      "id": "522732",
      "name": "三都水族自治县",
      "parent": "522700",
      "children": null },
    {
      "id": "522733",
      "name": "其它区",
      "parent": "522700",
      "children": null }] }] },


{
  "id": "530000",
  "name": "云南省",
  "children": [{
    "id": "530100",
    "name": "昆明市",
    "parent": "530000",
    "children": [{
      "id": "530102",
      "name": "五华区",
      "parent": "530100",
      "children": null },
    {
      "id": "530103",
      "name": "盘龙区",
      "parent": "530100",
      "children": null },
    {
      "id": "530111",
      "name": "官渡区",
      "parent": "530100",
      "children": null },
    {
      "id": "530112",
      "name": "西山区",
      "parent": "530100",
      "children": null },
    {
      "id": "530113",
      "name": "东川区",
      "parent": "530100",
      "children": null },
    {
      "id": "530121",
      "name": "呈贡区",
      "parent": "530100",
      "children": null },
    {
      "id": "530122",
      "name": "晋宁县",
      "parent": "530100",
      "children": null },
    {
      "id": "530124",
      "name": "富民县",
      "parent": "530100",
      "children": null },
    {
      "id": "530125",
      "name": "宜良县",
      "parent": "530100",
      "children": null },
    {
      "id": "530126",
      "name": "石林彝族自治县",
      "parent": "530100",
      "children": null },
    {
      "id": "530127",
      "name": "嵩明县",
      "parent": "530100",
      "children": null },
    {
      "id": "530128",
      "name": "禄劝彝族苗族自治县",
      "parent": "530100",
      "children": null },
    {
      "id": "530129",
      "name": "寻甸回族彝族自治县",
      "parent": "530100",
      "children": null },
    {
      "id": "530181",
      "name": "安宁市",
      "parent": "530100",
      "children": null },
    {
      "id": "530182",
      "name": "其它区",
      "parent": "530100",
      "children": null }] },

  {
    "id": "530300",
    "name": "曲靖市",
    "parent": "530000",
    "children": [{
      "id": "530302",
      "name": "麒麟区",
      "parent": "530300",
      "children": null },
    {
      "id": "530321",
      "name": "马龙县",
      "parent": "530300",
      "children": null },
    {
      "id": "530322",
      "name": "陆良县",
      "parent": "530300",
      "children": null },
    {
      "id": "530323",
      "name": "师宗县",
      "parent": "530300",
      "children": null },
    {
      "id": "530324",
      "name": "罗平县",
      "parent": "530300",
      "children": null },
    {
      "id": "530325",
      "name": "富源县",
      "parent": "530300",
      "children": null },
    {
      "id": "530326",
      "name": "会泽县",
      "parent": "530300",
      "children": null },
    {
      "id": "530328",
      "name": "沾益县",
      "parent": "530300",
      "children": null },
    {
      "id": "530381",
      "name": "宣威市",
      "parent": "530300",
      "children": null },
    {
      "id": "530382",
      "name": "其它区",
      "parent": "530300",
      "children": null }] },

  {
    "id": "530400",
    "name": "玉溪市",
    "parent": "530000",
    "children": [{
      "id": "530402",
      "name": "红塔区",
      "parent": "530400",
      "children": null },
    {
      "id": "530421",
      "name": "江川县",
      "parent": "530400",
      "children": null },
    {
      "id": "530422",
      "name": "澄江县",
      "parent": "530400",
      "children": null },
    {
      "id": "530423",
      "name": "通海县",
      "parent": "530400",
      "children": null },
    {
      "id": "530424",
      "name": "华宁县",
      "parent": "530400",
      "children": null },
    {
      "id": "530425",
      "name": "易门县",
      "parent": "530400",
      "children": null },
    {
      "id": "530426",
      "name": "峨山彝族自治县",
      "parent": "530400",
      "children": null },
    {
      "id": "530427",
      "name": "新平彝族傣族自治县",
      "parent": "530400",
      "children": null },
    {
      "id": "530428",
      "name": "元江哈尼族彝族傣族自治县",
      "parent": "530400",
      "children": null },
    {
      "id": "530429",
      "name": "其它区",
      "parent": "530400",
      "children": null }] },

  {
    "id": "530500",
    "name": "保山市",
    "parent": "530000",
    "children": [{
      "id": "530502",
      "name": "隆阳区",
      "parent": "530500",
      "children": null },
    {
      "id": "530521",
      "name": "施甸县",
      "parent": "530500",
      "children": null },
    {
      "id": "530522",
      "name": "腾冲县",
      "parent": "530500",
      "children": null },
    {
      "id": "530523",
      "name": "龙陵县",
      "parent": "530500",
      "children": null },
    {
      "id": "530524",
      "name": "昌宁县",
      "parent": "530500",
      "children": null },
    {
      "id": "530525",
      "name": "其它区",
      "parent": "530500",
      "children": null }] },

  {
    "id": "530600",
    "name": "昭通市",
    "parent": "530000",
    "children": [{
      "id": "530602",
      "name": "昭阳区",
      "parent": "530600",
      "children": null },
    {
      "id": "530621",
      "name": "鲁甸县",
      "parent": "530600",
      "children": null },
    {
      "id": "530622",
      "name": "巧家县",
      "parent": "530600",
      "children": null },
    {
      "id": "530623",
      "name": "盐津县",
      "parent": "530600",
      "children": null },
    {
      "id": "530624",
      "name": "大关县",
      "parent": "530600",
      "children": null },
    {
      "id": "530625",
      "name": "永善县",
      "parent": "530600",
      "children": null },
    {
      "id": "530626",
      "name": "绥江县",
      "parent": "530600",
      "children": null },
    {
      "id": "530627",
      "name": "镇雄县",
      "parent": "530600",
      "children": null },
    {
      "id": "530628",
      "name": "彝良县",
      "parent": "530600",
      "children": null },
    {
      "id": "530629",
      "name": "威信县",
      "parent": "530600",
      "children": null },
    {
      "id": "530630",
      "name": "水富县",
      "parent": "530600",
      "children": null },
    {
      "id": "530631",
      "name": "其它区",
      "parent": "530600",
      "children": null }] },

  {
    "id": "530700",
    "name": "丽江市",
    "parent": "530000",
    "children": [{
      "id": "530702",
      "name": "古城区",
      "parent": "530700",
      "children": null },
    {
      "id": "530721",
      "name": "玉龙纳西族自治县",
      "parent": "530700",
      "children": null },
    {
      "id": "530722",
      "name": "永胜县",
      "parent": "530700",
      "children": null },
    {
      "id": "530723",
      "name": "华坪县",
      "parent": "530700",
      "children": null },
    {
      "id": "530724",
      "name": "宁蒗彝族自治县",
      "parent": "530700",
      "children": null },
    {
      "id": "530725",
      "name": "其它区",
      "parent": "530700",
      "children": null }] },

  {
    "id": "530800",
    "name": "普洱市",
    "parent": "530000",
    "children": [{
      "id": "530802",
      "name": "思茅区",
      "parent": "530800",
      "children": null },
    {
      "id": "530821",
      "name": "宁洱哈尼族彝族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530822",
      "name": "墨江哈尼族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530823",
      "name": "景东彝族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530824",
      "name": "景谷傣族彝族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530825",
      "name": "镇沅彝族哈尼族拉祜族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530826",
      "name": "江城哈尼族彝族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530827",
      "name": "孟连傣族拉祜族佤族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530828",
      "name": "澜沧拉祜族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530829",
      "name": "西盟佤族自治县",
      "parent": "530800",
      "children": null },
    {
      "id": "530830",
      "name": "其它区",
      "parent": "530800",
      "children": null }] },

  {
    "id": "530900",
    "name": "临沧市",
    "parent": "530000",
    "children": [{
      "id": "530902",
      "name": "临翔区",
      "parent": "530900",
      "children": null },
    {
      "id": "530921",
      "name": "凤庆县",
      "parent": "530900",
      "children": null },
    {
      "id": "530922",
      "name": "云县",
      "parent": "530900",
      "children": null },
    {
      "id": "530923",
      "name": "永德县",
      "parent": "530900",
      "children": null },
    {
      "id": "530924",
      "name": "镇康县",
      "parent": "530900",
      "children": null },
    {
      "id": "530925",
      "name": "双江拉祜族佤族布朗族傣族自治县",
      "parent": "530900",
      "children": null },
    {
      "id": "530926",
      "name": "耿马傣族佤族自治县",
      "parent": "530900",
      "children": null },
    {
      "id": "530927",
      "name": "沧源佤族自治县",
      "parent": "530900",
      "children": null },
    {
      "id": "530928",
      "name": "其它区",
      "parent": "530900",
      "children": null }] },

  {
    "id": "532300",
    "name": "楚雄彝族自治州",
    "parent": "530000",
    "children": [{
      "id": "532301",
      "name": "楚雄市",
      "parent": "532300",
      "children": null },
    {
      "id": "532322",
      "name": "双柏县",
      "parent": "532300",
      "children": null },
    {
      "id": "532323",
      "name": "牟定县",
      "parent": "532300",
      "children": null },
    {
      "id": "532324",
      "name": "南华县",
      "parent": "532300",
      "children": null },
    {
      "id": "532325",
      "name": "姚安县",
      "parent": "532300",
      "children": null },
    {
      "id": "532326",
      "name": "大姚县",
      "parent": "532300",
      "children": null },
    {
      "id": "532327",
      "name": "永仁县",
      "parent": "532300",
      "children": null },
    {
      "id": "532328",
      "name": "元谋县",
      "parent": "532300",
      "children": null },
    {
      "id": "532329",
      "name": "武定县",
      "parent": "532300",
      "children": null },
    {
      "id": "532331",
      "name": "禄丰县",
      "parent": "532300",
      "children": null },
    {
      "id": "532332",
      "name": "其它区",
      "parent": "532300",
      "children": null }] },

  {
    "id": "532500",
    "name": "红河哈尼族彝族自治州",
    "parent": "530000",
    "children": [{
      "id": "532501",
      "name": "个旧市",
      "parent": "532500",
      "children": null },
    {
      "id": "532502",
      "name": "开远市",
      "parent": "532500",
      "children": null },
    {
      "id": "532522",
      "name": "蒙自市",
      "parent": "532500",
      "children": null },
    {
      "id": "532523",
      "name": "屏边苗族自治县",
      "parent": "532500",
      "children": null },
    {
      "id": "532524",
      "name": "建水县",
      "parent": "532500",
      "children": null },
    {
      "id": "532525",
      "name": "石屏县",
      "parent": "532500",
      "children": null },
    {
      "id": "532526",
      "name": "弥勒市",
      "parent": "532500",
      "children": null },
    {
      "id": "532527",
      "name": "泸西县",
      "parent": "532500",
      "children": null },
    {
      "id": "532528",
      "name": "元阳县",
      "parent": "532500",
      "children": null },
    {
      "id": "532529",
      "name": "红河县",
      "parent": "532500",
      "children": null },
    {
      "id": "532530",
      "name": "金平苗族瑶族傣族自治县",
      "parent": "532500",
      "children": null },
    {
      "id": "532531",
      "name": "绿春县",
      "parent": "532500",
      "children": null },
    {
      "id": "532532",
      "name": "河口瑶族自治县",
      "parent": "532500",
      "children": null },
    {
      "id": "532533",
      "name": "其它区",
      "parent": "532500",
      "children": null }] },

  {
    "id": "532600",
    "name": "文山壮族苗族自治州",
    "parent": "530000",
    "children": [{
      "id": "532621",
      "name": "文山市",
      "parent": "532600",
      "children": null },
    {
      "id": "532622",
      "name": "砚山县",
      "parent": "532600",
      "children": null },
    {
      "id": "532623",
      "name": "西畴县",
      "parent": "532600",
      "children": null },
    {
      "id": "532624",
      "name": "麻栗坡县",
      "parent": "532600",
      "children": null },
    {
      "id": "532625",
      "name": "马关县",
      "parent": "532600",
      "children": null },
    {
      "id": "532626",
      "name": "丘北县",
      "parent": "532600",
      "children": null },
    {
      "id": "532627",
      "name": "广南县",
      "parent": "532600",
      "children": null },
    {
      "id": "532628",
      "name": "富宁县",
      "parent": "532600",
      "children": null },
    {
      "id": "532629",
      "name": "其它区",
      "parent": "532600",
      "children": null }] },

  {
    "id": "532800",
    "name": "西双版纳傣族自治州",
    "parent": "530000",
    "children": [{
      "id": "532801",
      "name": "景洪市",
      "parent": "532800",
      "children": null },
    {
      "id": "532822",
      "name": "勐海县",
      "parent": "532800",
      "children": null },
    {
      "id": "532823",
      "name": "勐腊县",
      "parent": "532800",
      "children": null },
    {
      "id": "532824",
      "name": "其它区",
      "parent": "532800",
      "children": null }] },

  {
    "id": "532900",
    "name": "大理白族自治州",
    "parent": "530000",
    "children": [{
      "id": "532901",
      "name": "大理市",
      "parent": "532900",
      "children": null },
    {
      "id": "532922",
      "name": "漾濞彝族自治县",
      "parent": "532900",
      "children": null },
    {
      "id": "532923",
      "name": "祥云县",
      "parent": "532900",
      "children": null },
    {
      "id": "532924",
      "name": "宾川县",
      "parent": "532900",
      "children": null },
    {
      "id": "532925",
      "name": "弥渡县",
      "parent": "532900",
      "children": null },
    {
      "id": "532926",
      "name": "南涧彝族自治县",
      "parent": "532900",
      "children": null },
    {
      "id": "532927",
      "name": "巍山彝族回族自治县",
      "parent": "532900",
      "children": null },
    {
      "id": "532928",
      "name": "永平县",
      "parent": "532900",
      "children": null },
    {
      "id": "532929",
      "name": "云龙县",
      "parent": "532900",
      "children": null },
    {
      "id": "532930",
      "name": "洱源县",
      "parent": "532900",
      "children": null },
    {
      "id": "532931",
      "name": "剑川县",
      "parent": "532900",
      "children": null },
    {
      "id": "532932",
      "name": "鹤庆县",
      "parent": "532900",
      "children": null },
    {
      "id": "532933",
      "name": "其它区",
      "parent": "532900",
      "children": null }] },

  {
    "id": "533100",
    "name": "德宏傣族景颇族自治州",
    "parent": "530000",
    "children": [{
      "id": "533102",
      "name": "瑞丽市",
      "parent": "533100",
      "children": null },
    {
      "id": "533103",
      "name": "芒市",
      "parent": "533100",
      "children": null },
    {
      "id": "533122",
      "name": "梁河县",
      "parent": "533100",
      "children": null },
    {
      "id": "533123",
      "name": "盈江县",
      "parent": "533100",
      "children": null },
    {
      "id": "533124",
      "name": "陇川县",
      "parent": "533100",
      "children": null },
    {
      "id": "533125",
      "name": "其它区",
      "parent": "533100",
      "children": null }] },

  {
    "id": "533300",
    "name": "怒江傈僳族自治州",
    "parent": "530000",
    "children": [{
      "id": "533321",
      "name": "泸水县",
      "parent": "533300",
      "children": null },
    {
      "id": "533323",
      "name": "福贡县",
      "parent": "533300",
      "children": null },
    {
      "id": "533324",
      "name": "贡山独龙族怒族自治县",
      "parent": "533300",
      "children": null },
    {
      "id": "533325",
      "name": "兰坪白族普米族自治县",
      "parent": "533300",
      "children": null },
    {
      "id": "533326",
      "name": "其它区",
      "parent": "533300",
      "children": null }] },

  {
    "id": "533400",
    "name": "迪庆藏族自治州",
    "parent": "530000",
    "children": [{
      "id": "533421",
      "name": "香格里拉市",
      "parent": "533400",
      "children": null },
    {
      "id": "533422",
      "name": "德钦县",
      "parent": "533400",
      "children": null },
    {
      "id": "533423",
      "name": "维西傈僳族自治县",
      "parent": "533400",
      "children": null },
    {
      "id": "533424",
      "name": "其它区",
      "parent": "533400",
      "children": null }] }] },


{
  "id": "540000",
  "name": "西藏自治区",
  "children": [{
    "id": "540100",
    "name": "拉萨市",
    "parent": "540000",
    "children": [{
      "id": "540102",
      "name": "城关区",
      "parent": "540100",
      "children": null },
    {
      "id": "540121",
      "name": "林周县",
      "parent": "540100",
      "children": null },
    {
      "id": "540122",
      "name": "当雄县",
      "parent": "540100",
      "children": null },
    {
      "id": "540123",
      "name": "尼木县",
      "parent": "540100",
      "children": null },
    {
      "id": "540124",
      "name": "曲水县",
      "parent": "540100",
      "children": null },
    {
      "id": "540125",
      "name": "堆龙德庆县",
      "parent": "540100",
      "children": null },
    {
      "id": "540126",
      "name": "达孜县",
      "parent": "540100",
      "children": null },
    {
      "id": "540127",
      "name": "墨竹工卡县",
      "parent": "540100",
      "children": null },
    {
      "id": "540128",
      "name": "其它区",
      "parent": "540100",
      "children": null }] },

  {
    "id": "542100",
    "name": "昌都市",
    "parent": "540000",
    "children": [{
      "id": "542121",
      "name": "卡若区",
      "parent": "542100",
      "children": null },
    {
      "id": "542122",
      "name": "江达县",
      "parent": "542100",
      "children": null },
    {
      "id": "542123",
      "name": "贡觉县",
      "parent": "542100",
      "children": null },
    {
      "id": "542124",
      "name": "类乌齐县",
      "parent": "542100",
      "children": null },
    {
      "id": "542125",
      "name": "丁青县",
      "parent": "542100",
      "children": null },
    {
      "id": "542126",
      "name": "察雅县",
      "parent": "542100",
      "children": null },
    {
      "id": "542127",
      "name": "八宿县",
      "parent": "542100",
      "children": null },
    {
      "id": "542128",
      "name": "左贡县",
      "parent": "542100",
      "children": null },
    {
      "id": "542129",
      "name": "芒康县",
      "parent": "542100",
      "children": null },
    {
      "id": "542132",
      "name": "洛隆县",
      "parent": "542100",
      "children": null },
    {
      "id": "542133",
      "name": "边坝县",
      "parent": "542100",
      "children": null },
    {
      "id": "542134",
      "name": "其它区",
      "parent": "542100",
      "children": null }] },

  {
    "id": "542200",
    "name": "山南地区",
    "parent": "540000",
    "children": [{
      "id": "542221",
      "name": "乃东县",
      "parent": "542200",
      "children": null },
    {
      "id": "542222",
      "name": "扎囊县",
      "parent": "542200",
      "children": null },
    {
      "id": "542223",
      "name": "贡嘎县",
      "parent": "542200",
      "children": null },
    {
      "id": "542224",
      "name": "桑日县",
      "parent": "542200",
      "children": null },
    {
      "id": "542225",
      "name": "琼结县",
      "parent": "542200",
      "children": null },
    {
      "id": "542226",
      "name": "曲松县",
      "parent": "542200",
      "children": null },
    {
      "id": "542227",
      "name": "措美县",
      "parent": "542200",
      "children": null },
    {
      "id": "542228",
      "name": "洛扎县",
      "parent": "542200",
      "children": null },
    {
      "id": "542229",
      "name": "加查县",
      "parent": "542200",
      "children": null },
    {
      "id": "542231",
      "name": "隆子县",
      "parent": "542200",
      "children": null },
    {
      "id": "542232",
      "name": "错那县",
      "parent": "542200",
      "children": null },
    {
      "id": "542233",
      "name": "浪卡子县",
      "parent": "542200",
      "children": null },
    {
      "id": "542234",
      "name": "其它区",
      "parent": "542200",
      "children": null }] },

  {
    "id": "542300",
    "name": "日喀则市",
    "parent": "540000",
    "children": [{
      "id": "542301",
      "name": "桑珠孜区",
      "parent": "542300",
      "children": null },
    {
      "id": "542322",
      "name": "南木林县",
      "parent": "542300",
      "children": null },
    {
      "id": "542323",
      "name": "江孜县",
      "parent": "542300",
      "children": null },
    {
      "id": "542324",
      "name": "定日县",
      "parent": "542300",
      "children": null },
    {
      "id": "542325",
      "name": "萨迦县",
      "parent": "542300",
      "children": null },
    {
      "id": "542326",
      "name": "拉孜县",
      "parent": "542300",
      "children": null },
    {
      "id": "542327",
      "name": "昂仁县",
      "parent": "542300",
      "children": null },
    {
      "id": "542328",
      "name": "谢通门县",
      "parent": "542300",
      "children": null },
    {
      "id": "542329",
      "name": "白朗县",
      "parent": "542300",
      "children": null },
    {
      "id": "542330",
      "name": "仁布县",
      "parent": "542300",
      "children": null },
    {
      "id": "542331",
      "name": "康马县",
      "parent": "542300",
      "children": null },
    {
      "id": "542332",
      "name": "定结县",
      "parent": "542300",
      "children": null },
    {
      "id": "542333",
      "name": "仲巴县",
      "parent": "542300",
      "children": null },
    {
      "id": "542334",
      "name": "亚东县",
      "parent": "542300",
      "children": null },
    {
      "id": "542335",
      "name": "吉隆县",
      "parent": "542300",
      "children": null },
    {
      "id": "542336",
      "name": "聂拉木县",
      "parent": "542300",
      "children": null },
    {
      "id": "542337",
      "name": "萨嘎县",
      "parent": "542300",
      "children": null },
    {
      "id": "542338",
      "name": "岗巴县",
      "parent": "542300",
      "children": null },
    {
      "id": "542339",
      "name": "其它区",
      "parent": "542300",
      "children": null }] },

  {
    "id": "542400",
    "name": "那曲地区",
    "parent": "540000",
    "children": [{
      "id": "542421",
      "name": "那曲县",
      "parent": "542400",
      "children": null },
    {
      "id": "542422",
      "name": "嘉黎县",
      "parent": "542400",
      "children": null },
    {
      "id": "542423",
      "name": "比如县",
      "parent": "542400",
      "children": null },
    {
      "id": "542424",
      "name": "聂荣县",
      "parent": "542400",
      "children": null },
    {
      "id": "542425",
      "name": "安多县",
      "parent": "542400",
      "children": null },
    {
      "id": "542426",
      "name": "申扎县",
      "parent": "542400",
      "children": null },
    {
      "id": "542427",
      "name": "索县",
      "parent": "542400",
      "children": null },
    {
      "id": "542428",
      "name": "班戈县",
      "parent": "542400",
      "children": null },
    {
      "id": "542429",
      "name": "巴青县",
      "parent": "542400",
      "children": null },
    {
      "id": "542430",
      "name": "尼玛县",
      "parent": "542400",
      "children": null },
    {
      "id": "542431",
      "name": "其它区",
      "parent": "542400",
      "children": null },
    {
      "id": "542432",
      "name": "双湖县",
      "parent": "542400",
      "children": null }] },

  {
    "id": "542500",
    "name": "阿里地区",
    "parent": "540000",
    "children": [{
      "id": "542521",
      "name": "普兰县",
      "parent": "542500",
      "children": null },
    {
      "id": "542522",
      "name": "札达县",
      "parent": "542500",
      "children": null },
    {
      "id": "542523",
      "name": "噶尔县",
      "parent": "542500",
      "children": null },
    {
      "id": "542524",
      "name": "日土县",
      "parent": "542500",
      "children": null },
    {
      "id": "542525",
      "name": "革吉县",
      "parent": "542500",
      "children": null },
    {
      "id": "542526",
      "name": "改则县",
      "parent": "542500",
      "children": null },
    {
      "id": "542527",
      "name": "措勤县",
      "parent": "542500",
      "children": null },
    {
      "id": "542528",
      "name": "其它区",
      "parent": "542500",
      "children": null }] },

  {
    "id": "542600",
    "name": "林芝市",
    "parent": "540000",
    "children": [{
      "id": "542621",
      "name": "巴宜区",
      "parent": "542600",
      "children": null },
    {
      "id": "542622",
      "name": "工布江达县",
      "parent": "542600",
      "children": null },
    {
      "id": "542623",
      "name": "米林县",
      "parent": "542600",
      "children": null },
    {
      "id": "542624",
      "name": "墨脱县",
      "parent": "542600",
      "children": null },
    {
      "id": "542625",
      "name": "波密县",
      "parent": "542600",
      "children": null },
    {
      "id": "542626",
      "name": "察隅县",
      "parent": "542600",
      "children": null },
    {
      "id": "542627",
      "name": "朗县",
      "parent": "542600",
      "children": null },
    {
      "id": "542628",
      "name": "其它区",
      "parent": "542600",
      "children": null }] }] },


{
  "id": "610000",
  "name": "陕西省",
  "children": [{
    "id": "610100",
    "name": "西安市",
    "parent": "610000",
    "children": [{
      "id": "610102",
      "name": "新城区",
      "parent": "610100",
      "children": null },
    {
      "id": "610103",
      "name": "碑林区",
      "parent": "610100",
      "children": null },
    {
      "id": "610104",
      "name": "莲湖区",
      "parent": "610100",
      "children": null },
    {
      "id": "610111",
      "name": "灞桥区",
      "parent": "610100",
      "children": null },
    {
      "id": "610112",
      "name": "未央区",
      "parent": "610100",
      "children": null },
    {
      "id": "610113",
      "name": "雁塔区",
      "parent": "610100",
      "children": null },
    {
      "id": "610114",
      "name": "阎良区",
      "parent": "610100",
      "children": null },
    {
      "id": "610115",
      "name": "临潼区",
      "parent": "610100",
      "children": null },
    {
      "id": "610116",
      "name": "长安区",
      "parent": "610100",
      "children": null },
    {
      "id": "610122",
      "name": "蓝田县",
      "parent": "610100",
      "children": null },
    {
      "id": "610124",
      "name": "周至县",
      "parent": "610100",
      "children": null },
    {
      "id": "610125",
      "name": "户县",
      "parent": "610100",
      "children": null },
    {
      "id": "610126",
      "name": "高陵区",
      "parent": "610100",
      "children": null },
    {
      "id": "610127",
      "name": "其它区",
      "parent": "610100",
      "children": null }] },

  {
    "id": "610200",
    "name": "铜川市",
    "parent": "610000",
    "children": [{
      "id": "610202",
      "name": "王益区",
      "parent": "610200",
      "children": null },
    {
      "id": "610203",
      "name": "印台区",
      "parent": "610200",
      "children": null },
    {
      "id": "610204",
      "name": "耀州区",
      "parent": "610200",
      "children": null },
    {
      "id": "610222",
      "name": "宜君县",
      "parent": "610200",
      "children": null },
    {
      "id": "610223",
      "name": "其它区",
      "parent": "610200",
      "children": null }] },

  {
    "id": "610300",
    "name": "宝鸡市",
    "parent": "610000",
    "children": [{
      "id": "610302",
      "name": "渭滨区",
      "parent": "610300",
      "children": null },
    {
      "id": "610303",
      "name": "金台区",
      "parent": "610300",
      "children": null },
    {
      "id": "610304",
      "name": "陈仓区",
      "parent": "610300",
      "children": null },
    {
      "id": "610322",
      "name": "凤翔县",
      "parent": "610300",
      "children": null },
    {
      "id": "610323",
      "name": "岐山县",
      "parent": "610300",
      "children": null },
    {
      "id": "610324",
      "name": "扶风县",
      "parent": "610300",
      "children": null },
    {
      "id": "610326",
      "name": "眉县",
      "parent": "610300",
      "children": null },
    {
      "id": "610327",
      "name": "陇县",
      "parent": "610300",
      "children": null },
    {
      "id": "610328",
      "name": "千阳县",
      "parent": "610300",
      "children": null },
    {
      "id": "610329",
      "name": "麟游县",
      "parent": "610300",
      "children": null },
    {
      "id": "610330",
      "name": "凤县",
      "parent": "610300",
      "children": null },
    {
      "id": "610331",
      "name": "太白县",
      "parent": "610300",
      "children": null },
    {
      "id": "610332",
      "name": "其它区",
      "parent": "610300",
      "children": null }] },

  {
    "id": "610400",
    "name": "咸阳市",
    "parent": "610000",
    "children": [{
      "id": "610402",
      "name": "秦都区",
      "parent": "610400",
      "children": null },
    {
      "id": "610403",
      "name": "杨陵区",
      "parent": "610400",
      "children": null },
    {
      "id": "610404",
      "name": "渭城区",
      "parent": "610400",
      "children": null },
    {
      "id": "610422",
      "name": "三原县",
      "parent": "610400",
      "children": null },
    {
      "id": "610423",
      "name": "泾阳县",
      "parent": "610400",
      "children": null },
    {
      "id": "610424",
      "name": "乾县",
      "parent": "610400",
      "children": null },
    {
      "id": "610425",
      "name": "礼泉县",
      "parent": "610400",
      "children": null },
    {
      "id": "610426",
      "name": "永寿县",
      "parent": "610400",
      "children": null },
    {
      "id": "610427",
      "name": "彬县",
      "parent": "610400",
      "children": null },
    {
      "id": "610428",
      "name": "长武县",
      "parent": "610400",
      "children": null },
    {
      "id": "610429",
      "name": "旬邑县",
      "parent": "610400",
      "children": null },
    {
      "id": "610430",
      "name": "淳化县",
      "parent": "610400",
      "children": null },
    {
      "id": "610431",
      "name": "武功县",
      "parent": "610400",
      "children": null },
    {
      "id": "610481",
      "name": "兴平市",
      "parent": "610400",
      "children": null },
    {
      "id": "610482",
      "name": "其它区",
      "parent": "610400",
      "children": null }] },

  {
    "id": "610500",
    "name": "渭南市",
    "parent": "610000",
    "children": [{
      "id": "610502",
      "name": "临渭区",
      "parent": "610500",
      "children": null },
    {
      "id": "610521",
      "name": "华县",
      "parent": "610500",
      "children": null },
    {
      "id": "610522",
      "name": "潼关县",
      "parent": "610500",
      "children": null },
    {
      "id": "610523",
      "name": "大荔县",
      "parent": "610500",
      "children": null },
    {
      "id": "610524",
      "name": "合阳县",
      "parent": "610500",
      "children": null },
    {
      "id": "610525",
      "name": "澄城县",
      "parent": "610500",
      "children": null },
    {
      "id": "610526",
      "name": "蒲城县",
      "parent": "610500",
      "children": null },
    {
      "id": "610527",
      "name": "白水县",
      "parent": "610500",
      "children": null },
    {
      "id": "610528",
      "name": "富平县",
      "parent": "610500",
      "children": null },
    {
      "id": "610581",
      "name": "韩城市",
      "parent": "610500",
      "children": null },
    {
      "id": "610582",
      "name": "华阴市",
      "parent": "610500",
      "children": null },
    {
      "id": "610583",
      "name": "其它区",
      "parent": "610500",
      "children": null }] },

  {
    "id": "610600",
    "name": "延安市",
    "parent": "610000",
    "children": [{
      "id": "610602",
      "name": "宝塔区",
      "parent": "610600",
      "children": null },
    {
      "id": "610621",
      "name": "延长县",
      "parent": "610600",
      "children": null },
    {
      "id": "610622",
      "name": "延川县",
      "parent": "610600",
      "children": null },
    {
      "id": "610623",
      "name": "子长县",
      "parent": "610600",
      "children": null },
    {
      "id": "610624",
      "name": "安塞县",
      "parent": "610600",
      "children": null },
    {
      "id": "610625",
      "name": "志丹县",
      "parent": "610600",
      "children": null },
    {
      "id": "610626",
      "name": "吴起县",
      "parent": "610600",
      "children": null },
    {
      "id": "610627",
      "name": "甘泉县",
      "parent": "610600",
      "children": null },
    {
      "id": "610628",
      "name": "富县",
      "parent": "610600",
      "children": null },
    {
      "id": "610629",
      "name": "洛川县",
      "parent": "610600",
      "children": null },
    {
      "id": "610630",
      "name": "宜川县",
      "parent": "610600",
      "children": null },
    {
      "id": "610631",
      "name": "黄龙县",
      "parent": "610600",
      "children": null },
    {
      "id": "610632",
      "name": "黄陵县",
      "parent": "610600",
      "children": null },
    {
      "id": "610633",
      "name": "其它区",
      "parent": "610600",
      "children": null }] },

  {
    "id": "610700",
    "name": "汉中市",
    "parent": "610000",
    "children": [{
      "id": "610702",
      "name": "汉台区",
      "parent": "610700",
      "children": null },
    {
      "id": "610721",
      "name": "南郑县",
      "parent": "610700",
      "children": null },
    {
      "id": "610722",
      "name": "城固县",
      "parent": "610700",
      "children": null },
    {
      "id": "610723",
      "name": "洋县",
      "parent": "610700",
      "children": null },
    {
      "id": "610724",
      "name": "西乡县",
      "parent": "610700",
      "children": null },
    {
      "id": "610725",
      "name": "勉县",
      "parent": "610700",
      "children": null },
    {
      "id": "610726",
      "name": "宁强县",
      "parent": "610700",
      "children": null },
    {
      "id": "610727",
      "name": "略阳县",
      "parent": "610700",
      "children": null },
    {
      "id": "610728",
      "name": "镇巴县",
      "parent": "610700",
      "children": null },
    {
      "id": "610729",
      "name": "留坝县",
      "parent": "610700",
      "children": null },
    {
      "id": "610730",
      "name": "佛坪县",
      "parent": "610700",
      "children": null },
    {
      "id": "610731",
      "name": "其它区",
      "parent": "610700",
      "children": null }] },

  {
    "id": "610800",
    "name": "榆林市",
    "parent": "610000",
    "children": [{
      "id": "610802",
      "name": "榆阳区",
      "parent": "610800",
      "children": null },
    {
      "id": "610821",
      "name": "神木县",
      "parent": "610800",
      "children": null },
    {
      "id": "610822",
      "name": "府谷县",
      "parent": "610800",
      "children": null },
    {
      "id": "610823",
      "name": "横山县",
      "parent": "610800",
      "children": null },
    {
      "id": "610824",
      "name": "靖边县",
      "parent": "610800",
      "children": null },
    {
      "id": "610825",
      "name": "定边县",
      "parent": "610800",
      "children": null },
    {
      "id": "610826",
      "name": "绥德县",
      "parent": "610800",
      "children": null },
    {
      "id": "610827",
      "name": "米脂县",
      "parent": "610800",
      "children": null },
    {
      "id": "610828",
      "name": "佳县",
      "parent": "610800",
      "children": null },
    {
      "id": "610829",
      "name": "吴堡县",
      "parent": "610800",
      "children": null },
    {
      "id": "610830",
      "name": "清涧县",
      "parent": "610800",
      "children": null },
    {
      "id": "610831",
      "name": "子洲县",
      "parent": "610800",
      "children": null },
    {
      "id": "610832",
      "name": "其它区",
      "parent": "610800",
      "children": null }] },

  {
    "id": "610900",
    "name": "安康市",
    "parent": "610000",
    "children": [{
      "id": "610902",
      "name": "汉滨区",
      "parent": "610900",
      "children": null },
    {
      "id": "610921",
      "name": "汉阴县",
      "parent": "610900",
      "children": null },
    {
      "id": "610922",
      "name": "石泉县",
      "parent": "610900",
      "children": null },
    {
      "id": "610923",
      "name": "宁陕县",
      "parent": "610900",
      "children": null },
    {
      "id": "610924",
      "name": "紫阳县",
      "parent": "610900",
      "children": null },
    {
      "id": "610925",
      "name": "岚皋县",
      "parent": "610900",
      "children": null },
    {
      "id": "610926",
      "name": "平利县",
      "parent": "610900",
      "children": null },
    {
      "id": "610927",
      "name": "镇坪县",
      "parent": "610900",
      "children": null },
    {
      "id": "610928",
      "name": "旬阳县",
      "parent": "610900",
      "children": null },
    {
      "id": "610929",
      "name": "白河县",
      "parent": "610900",
      "children": null },
    {
      "id": "610930",
      "name": "其它区",
      "parent": "610900",
      "children": null }] },

  {
    "id": "611000",
    "name": "商洛市",
    "parent": "610000",
    "children": [{
      "id": "611002",
      "name": "商州区",
      "parent": "611000",
      "children": null },
    {
      "id": "611021",
      "name": "洛南县",
      "parent": "611000",
      "children": null },
    {
      "id": "611022",
      "name": "丹凤县",
      "parent": "611000",
      "children": null },
    {
      "id": "611023",
      "name": "商南县",
      "parent": "611000",
      "children": null },
    {
      "id": "611024",
      "name": "山阳县",
      "parent": "611000",
      "children": null },
    {
      "id": "611025",
      "name": "镇安县",
      "parent": "611000",
      "children": null },
    {
      "id": "611026",
      "name": "柞水县",
      "parent": "611000",
      "children": null },
    {
      "id": "611027",
      "name": "其它区",
      "parent": "611000",
      "children": null }] }] },


{
  "id": "620000",
  "name": "甘肃省",
  "children": [{
    "id": "620100",
    "name": "兰州市",
    "parent": "620000",
    "children": [{
      "id": "620102",
      "name": "城关区",
      "parent": "620100",
      "children": null },
    {
      "id": "620103",
      "name": "七里河区",
      "parent": "620100",
      "children": null },
    {
      "id": "620104",
      "name": "西固区",
      "parent": "620100",
      "children": null },
    {
      "id": "620105",
      "name": "安宁区",
      "parent": "620100",
      "children": null },
    {
      "id": "620111",
      "name": "红古区",
      "parent": "620100",
      "children": null },
    {
      "id": "620121",
      "name": "永登县",
      "parent": "620100",
      "children": null },
    {
      "id": "620122",
      "name": "皋兰县",
      "parent": "620100",
      "children": null },
    {
      "id": "620123",
      "name": "榆中县",
      "parent": "620100",
      "children": null },
    {
      "id": "620124",
      "name": "其它区",
      "parent": "620100",
      "children": null }] },

  {
    "id": "620200",
    "name": "嘉峪关市",
    "parent": "620000",
    "children": null },
  {
    "id": "620300",
    "name": "金昌市",
    "parent": "620000",
    "children": [{
      "id": "620302",
      "name": "金川区",
      "parent": "620300",
      "children": null },
    {
      "id": "620321",
      "name": "永昌县",
      "parent": "620300",
      "children": null },
    {
      "id": "620322",
      "name": "其它区",
      "parent": "620300",
      "children": null }] },

  {
    "id": "620400",
    "name": "白银市",
    "parent": "620000",
    "children": [{
      "id": "620402",
      "name": "白银区",
      "parent": "620400",
      "children": null },
    {
      "id": "620403",
      "name": "平川区",
      "parent": "620400",
      "children": null },
    {
      "id": "620421",
      "name": "靖远县",
      "parent": "620400",
      "children": null },
    {
      "id": "620422",
      "name": "会宁县",
      "parent": "620400",
      "children": null },
    {
      "id": "620423",
      "name": "景泰县",
      "parent": "620400",
      "children": null },
    {
      "id": "620424",
      "name": "其它区",
      "parent": "620400",
      "children": null }] },

  {
    "id": "620500",
    "name": "天水市",
    "parent": "620000",
    "children": [{
      "id": "620502",
      "name": "秦州区",
      "parent": "620500",
      "children": null },
    {
      "id": "620503",
      "name": "麦积区",
      "parent": "620500",
      "children": null },
    {
      "id": "620521",
      "name": "清水县",
      "parent": "620500",
      "children": null },
    {
      "id": "620522",
      "name": "秦安县",
      "parent": "620500",
      "children": null },
    {
      "id": "620523",
      "name": "甘谷县",
      "parent": "620500",
      "children": null },
    {
      "id": "620524",
      "name": "武山县",
      "parent": "620500",
      "children": null },
    {
      "id": "620525",
      "name": "张家川回族自治县",
      "parent": "620500",
      "children": null },
    {
      "id": "620526",
      "name": "其它区",
      "parent": "620500",
      "children": null }] },

  {
    "id": "620600",
    "name": "武威市",
    "parent": "620000",
    "children": [{
      "id": "620602",
      "name": "凉州区",
      "parent": "620600",
      "children": null },
    {
      "id": "620621",
      "name": "民勤县",
      "parent": "620600",
      "children": null },
    {
      "id": "620622",
      "name": "古浪县",
      "parent": "620600",
      "children": null },
    {
      "id": "620623",
      "name": "天祝藏族自治县",
      "parent": "620600",
      "children": null },
    {
      "id": "620624",
      "name": "其它区",
      "parent": "620600",
      "children": null }] },

  {
    "id": "620700",
    "name": "张掖市",
    "parent": "620000",
    "children": [{
      "id": "620702",
      "name": "甘州区",
      "parent": "620700",
      "children": null },
    {
      "id": "620721",
      "name": "肃南裕固族自治县",
      "parent": "620700",
      "children": null },
    {
      "id": "620722",
      "name": "民乐县",
      "parent": "620700",
      "children": null },
    {
      "id": "620723",
      "name": "临泽县",
      "parent": "620700",
      "children": null },
    {
      "id": "620724",
      "name": "高台县",
      "parent": "620700",
      "children": null },
    {
      "id": "620725",
      "name": "山丹县",
      "parent": "620700",
      "children": null },
    {
      "id": "620726",
      "name": "其它区",
      "parent": "620700",
      "children": null }] },

  {
    "id": "620800",
    "name": "平凉市",
    "parent": "620000",
    "children": [{
      "id": "620802",
      "name": "崆峒区",
      "parent": "620800",
      "children": null },
    {
      "id": "620821",
      "name": "泾川县",
      "parent": "620800",
      "children": null },
    {
      "id": "620822",
      "name": "灵台县",
      "parent": "620800",
      "children": null },
    {
      "id": "620823",
      "name": "崇信县",
      "parent": "620800",
      "children": null },
    {
      "id": "620824",
      "name": "华亭县",
      "parent": "620800",
      "children": null },
    {
      "id": "620825",
      "name": "庄浪县",
      "parent": "620800",
      "children": null },
    {
      "id": "620826",
      "name": "静宁县",
      "parent": "620800",
      "children": null },
    {
      "id": "620827",
      "name": "其它区",
      "parent": "620800",
      "children": null }] },

  {
    "id": "620900",
    "name": "酒泉市",
    "parent": "620000",
    "children": [{
      "id": "620902",
      "name": "肃州区",
      "parent": "620900",
      "children": null },
    {
      "id": "620921",
      "name": "金塔县",
      "parent": "620900",
      "children": null },
    {
      "id": "620922",
      "name": "瓜州县",
      "parent": "620900",
      "children": null },
    {
      "id": "620923",
      "name": "肃北蒙古族自治县",
      "parent": "620900",
      "children": null },
    {
      "id": "620924",
      "name": "阿克塞哈萨克族自治县",
      "parent": "620900",
      "children": null },
    {
      "id": "620981",
      "name": "玉门市",
      "parent": "620900",
      "children": null },
    {
      "id": "620982",
      "name": "敦煌市",
      "parent": "620900",
      "children": null },
    {
      "id": "620983",
      "name": "其它区",
      "parent": "620900",
      "children": null }] },

  {
    "id": "621000",
    "name": "庆阳市",
    "parent": "620000",
    "children": [{
      "id": "621002",
      "name": "西峰区",
      "parent": "621000",
      "children": null },
    {
      "id": "621021",
      "name": "庆城县",
      "parent": "621000",
      "children": null },
    {
      "id": "621022",
      "name": "环县",
      "parent": "621000",
      "children": null },
    {
      "id": "621023",
      "name": "华池县",
      "parent": "621000",
      "children": null },
    {
      "id": "621024",
      "name": "合水县",
      "parent": "621000",
      "children": null },
    {
      "id": "621025",
      "name": "正宁县",
      "parent": "621000",
      "children": null },
    {
      "id": "621026",
      "name": "宁县",
      "parent": "621000",
      "children": null },
    {
      "id": "621027",
      "name": "镇原县",
      "parent": "621000",
      "children": null },
    {
      "id": "621028",
      "name": "其它区",
      "parent": "621000",
      "children": null }] },

  {
    "id": "621100",
    "name": "定西市",
    "parent": "620000",
    "children": [{
      "id": "621102",
      "name": "安定区",
      "parent": "621100",
      "children": null },
    {
      "id": "621121",
      "name": "通渭县",
      "parent": "621100",
      "children": null },
    {
      "id": "621122",
      "name": "陇西县",
      "parent": "621100",
      "children": null },
    {
      "id": "621123",
      "name": "渭源县",
      "parent": "621100",
      "children": null },
    {
      "id": "621124",
      "name": "临洮县",
      "parent": "621100",
      "children": null },
    {
      "id": "621125",
      "name": "漳县",
      "parent": "621100",
      "children": null },
    {
      "id": "621126",
      "name": "岷县",
      "parent": "621100",
      "children": null },
    {
      "id": "621127",
      "name": "其它区",
      "parent": "621100",
      "children": null }] },

  {
    "id": "621200",
    "name": "陇南市",
    "parent": "620000",
    "children": [{
      "id": "621202",
      "name": "武都区",
      "parent": "621200",
      "children": null },
    {
      "id": "621221",
      "name": "成县",
      "parent": "621200",
      "children": null },
    {
      "id": "621222",
      "name": "文县",
      "parent": "621200",
      "children": null },
    {
      "id": "621223",
      "name": "宕昌县",
      "parent": "621200",
      "children": null },
    {
      "id": "621224",
      "name": "康县",
      "parent": "621200",
      "children": null },
    {
      "id": "621225",
      "name": "西和县",
      "parent": "621200",
      "children": null },
    {
      "id": "621226",
      "name": "礼县",
      "parent": "621200",
      "children": null },
    {
      "id": "621227",
      "name": "徽县",
      "parent": "621200",
      "children": null },
    {
      "id": "621228",
      "name": "两当县",
      "parent": "621200",
      "children": null },
    {
      "id": "621229",
      "name": "其它区",
      "parent": "621200",
      "children": null }] },

  {
    "id": "622900",
    "name": "临夏回族自治州",
    "parent": "620000",
    "children": [{
      "id": "622901",
      "name": "临夏市",
      "parent": "622900",
      "children": null },
    {
      "id": "622921",
      "name": "临夏县",
      "parent": "622900",
      "children": null },
    {
      "id": "622922",
      "name": "康乐县",
      "parent": "622900",
      "children": null },
    {
      "id": "622923",
      "name": "永靖县",
      "parent": "622900",
      "children": null },
    {
      "id": "622924",
      "name": "广河县",
      "parent": "622900",
      "children": null },
    {
      "id": "622925",
      "name": "和政县",
      "parent": "622900",
      "children": null },
    {
      "id": "622926",
      "name": "东乡族自治县",
      "parent": "622900",
      "children": null },
    {
      "id": "622927",
      "name": "积石山保安族东乡族撒拉族自治县",
      "parent": "622900",
      "children": null },
    {
      "id": "622928",
      "name": "其它区",
      "parent": "622900",
      "children": null }] },

  {
    "id": "623000",
    "name": "甘南藏族自治州",
    "parent": "620000",
    "children": [{
      "id": "623001",
      "name": "合作市",
      "parent": "623000",
      "children": null },
    {
      "id": "623021",
      "name": "临潭县",
      "parent": "623000",
      "children": null },
    {
      "id": "623022",
      "name": "卓尼县",
      "parent": "623000",
      "children": null },
    {
      "id": "623023",
      "name": "舟曲县",
      "parent": "623000",
      "children": null },
    {
      "id": "623024",
      "name": "迭部县",
      "parent": "623000",
      "children": null },
    {
      "id": "623025",
      "name": "玛曲县",
      "parent": "623000",
      "children": null },
    {
      "id": "623026",
      "name": "碌曲县",
      "parent": "623000",
      "children": null },
    {
      "id": "623027",
      "name": "夏河县",
      "parent": "623000",
      "children": null },
    {
      "id": "623028",
      "name": "其它区",
      "parent": "623000",
      "children": null }] }] },


{
  "id": "630000",
  "name": "青海省",
  "children": [{
    "id": "630100",
    "name": "西宁市",
    "parent": "630000",
    "children": [{
      "id": "630102",
      "name": "城东区",
      "parent": "630100",
      "children": null },
    {
      "id": "630103",
      "name": "城中区",
      "parent": "630100",
      "children": null },
    {
      "id": "630104",
      "name": "城西区",
      "parent": "630100",
      "children": null },
    {
      "id": "630105",
      "name": "城北区",
      "parent": "630100",
      "children": null },
    {
      "id": "630121",
      "name": "大通回族土族自治县",
      "parent": "630100",
      "children": null },
    {
      "id": "630122",
      "name": "湟中县",
      "parent": "630100",
      "children": null },
    {
      "id": "630123",
      "name": "湟源县",
      "parent": "630100",
      "children": null },
    {
      "id": "630124",
      "name": "其它区",
      "parent": "630100",
      "children": null }] },

  {
    "id": "632100",
    "name": "海东市",
    "parent": "630000",
    "children": [{
      "id": "632121",
      "name": "平安区",
      "parent": "632100",
      "children": null },
    {
      "id": "632122",
      "name": "民和回族土族自治县",
      "parent": "632100",
      "children": null },
    {
      "id": "632123",
      "name": "乐都区",
      "parent": "632100",
      "children": null },
    {
      "id": "632126",
      "name": "互助土族自治县",
      "parent": "632100",
      "children": null },
    {
      "id": "632127",
      "name": "化隆回族自治县",
      "parent": "632100",
      "children": null },
    {
      "id": "632128",
      "name": "循化撒拉族自治县",
      "parent": "632100",
      "children": null },
    {
      "id": "632129",
      "name": "其它区",
      "parent": "632100",
      "children": null }] },

  {
    "id": "632200",
    "name": "海北藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632221",
      "name": "门源回族自治县",
      "parent": "632200",
      "children": null },
    {
      "id": "632222",
      "name": "祁连县",
      "parent": "632200",
      "children": null },
    {
      "id": "632223",
      "name": "海晏县",
      "parent": "632200",
      "children": null },
    {
      "id": "632224",
      "name": "刚察县",
      "parent": "632200",
      "children": null },
    {
      "id": "632225",
      "name": "其它区",
      "parent": "632200",
      "children": null }] },

  {
    "id": "632300",
    "name": "黄南藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632321",
      "name": "同仁县",
      "parent": "632300",
      "children": null },
    {
      "id": "632322",
      "name": "尖扎县",
      "parent": "632300",
      "children": null },
    {
      "id": "632323",
      "name": "泽库县",
      "parent": "632300",
      "children": null },
    {
      "id": "632324",
      "name": "河南蒙古族自治县",
      "parent": "632300",
      "children": null },
    {
      "id": "632325",
      "name": "其它区",
      "parent": "632300",
      "children": null }] },

  {
    "id": "632500",
    "name": "海南藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632521",
      "name": "共和县",
      "parent": "632500",
      "children": null },
    {
      "id": "632522",
      "name": "同德县",
      "parent": "632500",
      "children": null },
    {
      "id": "632523",
      "name": "贵德县",
      "parent": "632500",
      "children": null },
    {
      "id": "632524",
      "name": "兴海县",
      "parent": "632500",
      "children": null },
    {
      "id": "632525",
      "name": "贵南县",
      "parent": "632500",
      "children": null },
    {
      "id": "632526",
      "name": "其它区",
      "parent": "632500",
      "children": null }] },

  {
    "id": "632600",
    "name": "果洛藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632621",
      "name": "玛沁县",
      "parent": "632600",
      "children": null },
    {
      "id": "632622",
      "name": "班玛县",
      "parent": "632600",
      "children": null },
    {
      "id": "632623",
      "name": "甘德县",
      "parent": "632600",
      "children": null },
    {
      "id": "632624",
      "name": "达日县",
      "parent": "632600",
      "children": null },
    {
      "id": "632625",
      "name": "久治县",
      "parent": "632600",
      "children": null },
    {
      "id": "632626",
      "name": "玛多县",
      "parent": "632600",
      "children": null },
    {
      "id": "632627",
      "name": "其它区",
      "parent": "632600",
      "children": null }] },

  {
    "id": "632700",
    "name": "玉树藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632721",
      "name": "玉树市",
      "parent": "632700",
      "children": null },
    {
      "id": "632722",
      "name": "杂多县",
      "parent": "632700",
      "children": null },
    {
      "id": "632723",
      "name": "称多县",
      "parent": "632700",
      "children": null },
    {
      "id": "632724",
      "name": "治多县",
      "parent": "632700",
      "children": null },
    {
      "id": "632725",
      "name": "囊谦县",
      "parent": "632700",
      "children": null },
    {
      "id": "632726",
      "name": "曲麻莱县",
      "parent": "632700",
      "children": null },
    {
      "id": "632727",
      "name": "其它区",
      "parent": "632700",
      "children": null }] },

  {
    "id": "632800",
    "name": "海西蒙古族藏族自治州",
    "parent": "630000",
    "children": [{
      "id": "632801",
      "name": "格尔木市",
      "parent": "632800",
      "children": null },
    {
      "id": "632802",
      "name": "德令哈市",
      "parent": "632800",
      "children": null },
    {
      "id": "632821",
      "name": "乌兰县",
      "parent": "632800",
      "children": null },
    {
      "id": "632822",
      "name": "都兰县",
      "parent": "632800",
      "children": null },
    {
      "id": "632823",
      "name": "天峻县",
      "parent": "632800",
      "children": null },
    {
      "id": "632824",
      "name": "其它区",
      "parent": "632800",
      "children": null }] }] },


{
  "id": "640000",
  "name": "宁夏回族自治区",
  "children": [{
    "id": "640100",
    "name": "银川市",
    "parent": "640000",
    "children": [{
      "id": "640104",
      "name": "兴庆区",
      "parent": "640100",
      "children": null },
    {
      "id": "640105",
      "name": "西夏区",
      "parent": "640100",
      "children": null },
    {
      "id": "640106",
      "name": "金凤区",
      "parent": "640100",
      "children": null },
    {
      "id": "640121",
      "name": "永宁县",
      "parent": "640100",
      "children": null },
    {
      "id": "640122",
      "name": "贺兰县",
      "parent": "640100",
      "children": null },
    {
      "id": "640181",
      "name": "灵武市",
      "parent": "640100",
      "children": null },
    {
      "id": "640182",
      "name": "其它区",
      "parent": "640100",
      "children": null }] },

  {
    "id": "640200",
    "name": "石嘴山市",
    "parent": "640000",
    "children": [{
      "id": "640202",
      "name": "大武口区",
      "parent": "640200",
      "children": null },
    {
      "id": "640205",
      "name": "惠农区",
      "parent": "640200",
      "children": null },
    {
      "id": "640221",
      "name": "平罗县",
      "parent": "640200",
      "children": null },
    {
      "id": "640222",
      "name": "其它区",
      "parent": "640200",
      "children": null }] },

  {
    "id": "640300",
    "name": "吴忠市",
    "parent": "640000",
    "children": [{
      "id": "640302",
      "name": "利通区",
      "parent": "640300",
      "children": null },
    {
      "id": "640303",
      "name": "红寺堡区",
      "parent": "640300",
      "children": null },
    {
      "id": "640323",
      "name": "盐池县",
      "parent": "640300",
      "children": null },
    {
      "id": "640324",
      "name": "同心县",
      "parent": "640300",
      "children": null },
    {
      "id": "640381",
      "name": "青铜峡市",
      "parent": "640300",
      "children": null },
    {
      "id": "640382",
      "name": "其它区",
      "parent": "640300",
      "children": null }] },

  {
    "id": "640400",
    "name": "固原市",
    "parent": "640000",
    "children": [{
      "id": "640402",
      "name": "原州区",
      "parent": "640400",
      "children": null },
    {
      "id": "640422",
      "name": "西吉县",
      "parent": "640400",
      "children": null },
    {
      "id": "640423",
      "name": "隆德县",
      "parent": "640400",
      "children": null },
    {
      "id": "640424",
      "name": "泾源县",
      "parent": "640400",
      "children": null },
    {
      "id": "640425",
      "name": "彭阳县",
      "parent": "640400",
      "children": null },
    {
      "id": "640426",
      "name": "其它区",
      "parent": "640400",
      "children": null }] },

  {
    "id": "640500",
    "name": "中卫市",
    "parent": "640000",
    "children": [{
      "id": "640502",
      "name": "沙坡头区",
      "parent": "640500",
      "children": null },
    {
      "id": "640521",
      "name": "中宁县",
      "parent": "640500",
      "children": null },
    {
      "id": "640522",
      "name": "海原县",
      "parent": "640500",
      "children": null },
    {
      "id": "640523",
      "name": "其它区",
      "parent": "640500",
      "children": null }] }] },


{
  "id": "650000",
  "name": "新疆维吾尔自治区",
  "children": [{
    "id": "650100",
    "name": "乌鲁木齐市",
    "parent": "650000",
    "children": [{
      "id": "650102",
      "name": "天山区",
      "parent": "650100",
      "children": null },
    {
      "id": "650103",
      "name": "沙依巴克区",
      "parent": "650100",
      "children": null },
    {
      "id": "650104",
      "name": "新市区",
      "parent": "650100",
      "children": null },
    {
      "id": "650105",
      "name": "水磨沟区",
      "parent": "650100",
      "children": null },
    {
      "id": "650106",
      "name": "头屯河区",
      "parent": "650100",
      "children": null },
    {
      "id": "650107",
      "name": "达坂城区",
      "parent": "650100",
      "children": null },
    {
      "id": "650108",
      "name": "东山区",
      "parent": "650100",
      "children": null },
    {
      "id": "650109",
      "name": "米东区",
      "parent": "650100",
      "children": null },
    {
      "id": "650121",
      "name": "乌鲁木齐县",
      "parent": "650100",
      "children": null },
    {
      "id": "650122",
      "name": "其它区",
      "parent": "650100",
      "children": null }] },

  {
    "id": "650200",
    "name": "克拉玛依市",
    "parent": "650000",
    "children": [{
      "id": "650202",
      "name": "独山子区",
      "parent": "650200",
      "children": null },
    {
      "id": "650203",
      "name": "克拉玛依区",
      "parent": "650200",
      "children": null },
    {
      "id": "650204",
      "name": "白碱滩区",
      "parent": "650200",
      "children": null },
    {
      "id": "650205",
      "name": "乌尔禾区",
      "parent": "650200",
      "children": null },
    {
      "id": "650206",
      "name": "其它区",
      "parent": "650200",
      "children": null }] },

  {
    "id": "652100",
    "name": "吐鲁番市",
    "parent": "650000",
    "children": [{
      "id": "652101",
      "name": "高昌区",
      "parent": "652100",
      "children": null },
    {
      "id": "652122",
      "name": "鄯善县",
      "parent": "652100",
      "children": null },
    {
      "id": "652123",
      "name": "托克逊县",
      "parent": "652100",
      "children": null },
    {
      "id": "652124",
      "name": "其它区",
      "parent": "652100",
      "children": null }] },

  {
    "id": "652200",
    "name": "哈密地区",
    "parent": "650000",
    "children": [{
      "id": "652201",
      "name": "哈密市",
      "parent": "652200",
      "children": null },
    {
      "id": "652222",
      "name": "巴里坤哈萨克自治县",
      "parent": "652200",
      "children": null },
    {
      "id": "652223",
      "name": "伊吾县",
      "parent": "652200",
      "children": null },
    {
      "id": "652224",
      "name": "其它区",
      "parent": "652200",
      "children": null }] },

  {
    "id": "652300",
    "name": "昌吉回族自治州",
    "parent": "650000",
    "children": [{
      "id": "652301",
      "name": "昌吉市",
      "parent": "652300",
      "children": null },
    {
      "id": "652302",
      "name": "阜康市",
      "parent": "652300",
      "children": null },
    {
      "id": "652303",
      "name": "米泉市",
      "parent": "652300",
      "children": null },
    {
      "id": "652323",
      "name": "呼图壁县",
      "parent": "652300",
      "children": null },
    {
      "id": "652324",
      "name": "玛纳斯县",
      "parent": "652300",
      "children": null },
    {
      "id": "652325",
      "name": "奇台县",
      "parent": "652300",
      "children": null },
    {
      "id": "652327",
      "name": "吉木萨尔县",
      "parent": "652300",
      "children": null },
    {
      "id": "652328",
      "name": "木垒哈萨克自治县",
      "parent": "652300",
      "children": null },
    {
      "id": "652329",
      "name": "其它区",
      "parent": "652300",
      "children": null }] },

  {
    "id": "652700",
    "name": "博尔塔拉蒙古自治州",
    "parent": "650000",
    "children": [{
      "id": "652701",
      "name": "博乐市",
      "parent": "652700",
      "children": null },
    {
      "id": "652702",
      "name": "阿拉山口市",
      "parent": "652700",
      "children": null },
    {
      "id": "652722",
      "name": "精河县",
      "parent": "652700",
      "children": null },
    {
      "id": "652723",
      "name": "温泉县",
      "parent": "652700",
      "children": null },
    {
      "id": "652724",
      "name": "其它区",
      "parent": "652700",
      "children": null }] },

  {
    "id": "652800",
    "name": "巴音郭楞蒙古自治州",
    "parent": "650000",
    "children": [{
      "id": "652801",
      "name": "库尔勒市",
      "parent": "652800",
      "children": null },
    {
      "id": "652822",
      "name": "轮台县",
      "parent": "652800",
      "children": null },
    {
      "id": "652823",
      "name": "尉犁县",
      "parent": "652800",
      "children": null },
    {
      "id": "652824",
      "name": "若羌县",
      "parent": "652800",
      "children": null },
    {
      "id": "652825",
      "name": "且末县",
      "parent": "652800",
      "children": null },
    {
      "id": "652826",
      "name": "焉耆回族自治县",
      "parent": "652800",
      "children": null },
    {
      "id": "652827",
      "name": "和静县",
      "parent": "652800",
      "children": null },
    {
      "id": "652828",
      "name": "和硕县",
      "parent": "652800",
      "children": null },
    {
      "id": "652829",
      "name": "博湖县",
      "parent": "652800",
      "children": null },
    {
      "id": "652830",
      "name": "其它区",
      "parent": "652800",
      "children": null }] },

  {
    "id": "652900",
    "name": "阿克苏地区",
    "parent": "650000",
    "children": [{
      "id": "652901",
      "name": "阿克苏市",
      "parent": "652900",
      "children": null },
    {
      "id": "652922",
      "name": "温宿县",
      "parent": "652900",
      "children": null },
    {
      "id": "652923",
      "name": "库车县",
      "parent": "652900",
      "children": null },
    {
      "id": "652924",
      "name": "沙雅县",
      "parent": "652900",
      "children": null },
    {
      "id": "652925",
      "name": "新和县",
      "parent": "652900",
      "children": null },
    {
      "id": "652926",
      "name": "拜城县",
      "parent": "652900",
      "children": null },
    {
      "id": "652927",
      "name": "乌什县",
      "parent": "652900",
      "children": null },
    {
      "id": "652928",
      "name": "阿瓦提县",
      "parent": "652900",
      "children": null },
    {
      "id": "652929",
      "name": "柯坪县",
      "parent": "652900",
      "children": null },
    {
      "id": "652930",
      "name": "其它区",
      "parent": "652900",
      "children": null }] },

  {
    "id": "653000",
    "name": "克孜勒苏柯尔克孜自治州",
    "parent": "650000",
    "children": [{
      "id": "653001",
      "name": "阿图什市",
      "parent": "653000",
      "children": null },
    {
      "id": "653022",
      "name": "阿克陶县",
      "parent": "653000",
      "children": null },
    {
      "id": "653023",
      "name": "阿合奇县",
      "parent": "653000",
      "children": null },
    {
      "id": "653024",
      "name": "乌恰县",
      "parent": "653000",
      "children": null },
    {
      "id": "653025",
      "name": "其它区",
      "parent": "653000",
      "children": null }] },

  {
    "id": "653100",
    "name": "喀什地区",
    "parent": "650000",
    "children": [{
      "id": "653101",
      "name": "喀什市",
      "parent": "653100",
      "children": null },
    {
      "id": "653121",
      "name": "疏附县",
      "parent": "653100",
      "children": null },
    {
      "id": "653122",
      "name": "疏勒县",
      "parent": "653100",
      "children": null },
    {
      "id": "653123",
      "name": "英吉沙县",
      "parent": "653100",
      "children": null },
    {
      "id": "653124",
      "name": "泽普县",
      "parent": "653100",
      "children": null },
    {
      "id": "653125",
      "name": "莎车县",
      "parent": "653100",
      "children": null },
    {
      "id": "653126",
      "name": "叶城县",
      "parent": "653100",
      "children": null },
    {
      "id": "653127",
      "name": "麦盖提县",
      "parent": "653100",
      "children": null },
    {
      "id": "653128",
      "name": "岳普湖县",
      "parent": "653100",
      "children": null },
    {
      "id": "653129",
      "name": "伽师县",
      "parent": "653100",
      "children": null },
    {
      "id": "653130",
      "name": "巴楚县",
      "parent": "653100",
      "children": null },
    {
      "id": "653131",
      "name": "塔什库尔干塔吉克自治县",
      "parent": "653100",
      "children": null },
    {
      "id": "653132",
      "name": "其它区",
      "parent": "653100",
      "children": null }] },

  {
    "id": "653200",
    "name": "和田地区",
    "parent": "650000",
    "children": [{
      "id": "653201",
      "name": "和田市",
      "parent": "653200",
      "children": null },
    {
      "id": "653221",
      "name": "和田县",
      "parent": "653200",
      "children": null },
    {
      "id": "653222",
      "name": "墨玉县",
      "parent": "653200",
      "children": null },
    {
      "id": "653223",
      "name": "皮山县",
      "parent": "653200",
      "children": null },
    {
      "id": "653224",
      "name": "洛浦县",
      "parent": "653200",
      "children": null },
    {
      "id": "653225",
      "name": "策勒县",
      "parent": "653200",
      "children": null },
    {
      "id": "653226",
      "name": "于田县",
      "parent": "653200",
      "children": null },
    {
      "id": "653227",
      "name": "民丰县",
      "parent": "653200",
      "children": null },
    {
      "id": "653228",
      "name": "其它区",
      "parent": "653200",
      "children": null }] },

  {
    "id": "654000",
    "name": "伊犁哈萨克自治州",
    "parent": "650000",
    "children": [{
      "id": "654002",
      "name": "伊宁市",
      "parent": "654000",
      "children": null },
    {
      "id": "654003",
      "name": "奎屯市",
      "parent": "654000",
      "children": null },
    {
      "id": "654004",
      "name": "霍尔果斯市",
      "parent": "654000",
      "children": null },
    {
      "id": "654021",
      "name": "伊宁县",
      "parent": "654000",
      "children": null },
    {
      "id": "654022",
      "name": "察布查尔锡伯自治县",
      "parent": "654000",
      "children": null },
    {
      "id": "654023",
      "name": "霍城县",
      "parent": "654000",
      "children": null },
    {
      "id": "654024",
      "name": "巩留县",
      "parent": "654000",
      "children": null },
    {
      "id": "654025",
      "name": "新源县",
      "parent": "654000",
      "children": null },
    {
      "id": "654026",
      "name": "昭苏县",
      "parent": "654000",
      "children": null },
    {
      "id": "654027",
      "name": "特克斯县",
      "parent": "654000",
      "children": null },
    {
      "id": "654028",
      "name": "尼勒克县",
      "parent": "654000",
      "children": null },
    {
      "id": "654029",
      "name": "其它区",
      "parent": "654000",
      "children": null }] },

  {
    "id": "654200",
    "name": "塔城地区",
    "parent": "650000",
    "children": [{
      "id": "654201",
      "name": "塔城市",
      "parent": "654200",
      "children": null },
    {
      "id": "654202",
      "name": "乌苏市",
      "parent": "654200",
      "children": null },
    {
      "id": "654221",
      "name": "额敏县",
      "parent": "654200",
      "children": null },
    {
      "id": "654223",
      "name": "沙湾县",
      "parent": "654200",
      "children": null },
    {
      "id": "654224",
      "name": "托里县",
      "parent": "654200",
      "children": null },
    {
      "id": "654225",
      "name": "裕民县",
      "parent": "654200",
      "children": null },
    {
      "id": "654226",
      "name": "和布克赛尔蒙古自治县",
      "parent": "654200",
      "children": null },
    {
      "id": "654227",
      "name": "其它区",
      "parent": "654200",
      "children": null }] },

  {
    "id": "654300",
    "name": "阿勒泰地区",
    "parent": "650000",
    "children": [{
      "id": "654301",
      "name": "阿勒泰市",
      "parent": "654300",
      "children": null },
    {
      "id": "654321",
      "name": "布尔津县",
      "parent": "654300",
      "children": null },
    {
      "id": "654322",
      "name": "富蕴县",
      "parent": "654300",
      "children": null },
    {
      "id": "654323",
      "name": "福海县",
      "parent": "654300",
      "children": null },
    {
      "id": "654324",
      "name": "哈巴河县",
      "parent": "654300",
      "children": null },
    {
      "id": "654325",
      "name": "青河县",
      "parent": "654300",
      "children": null },
    {
      "id": "654326",
      "name": "吉木乃县",
      "parent": "654300",
      "children": null },
    {
      "id": "654327",
      "name": "其它区",
      "parent": "654300",
      "children": null }] },

  {
    "id": "659000",
    "name": "可克达拉市",
    "parent": "650000",
    "children": [{
      "id": "659007",
      "name": "双河市",
      "parent": "659000",
      "children": null },
    {
      "id": "659008",
      "name": "可克达拉市",
      "parent": "659000",
      "children": null }] },

  {
    "id": "659001",
    "name": "石河子市",
    "parent": "650000",
    "children": null },
  {
    "id": "659002",
    "name": "阿拉尔市",
    "parent": "650000",
    "children": null },
  {
    "id": "659003",
    "name": "图木舒克市",
    "parent": "650000",
    "children": null },
  {
    "id": "659004",
    "name": "五家渠市",
    "parent": "650000",
    "children": null }] }];exports.default = _default;

/***/ }),

/***/ 418:
/*!*********************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/components/uni-icons/icons.js ***!
  \*********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _default = {
  'contact': "\uE100",
  'person': "\uE101",
  'personadd': "\uE102",
  'contact-filled': "\uE130",
  'person-filled': "\uE131",
  'personadd-filled': "\uE132",
  'phone': "\uE200",
  'email': "\uE201",
  'chatbubble': "\uE202",
  'chatboxes': "\uE203",
  'phone-filled': "\uE230",
  'email-filled': "\uE231",
  'chatbubble-filled': "\uE232",
  'chatboxes-filled': "\uE233",
  'weibo': "\uE260",
  'weixin': "\uE261",
  'pengyouquan': "\uE262",
  'chat': "\uE263",
  'qq': "\uE264",
  'videocam': "\uE300",
  'camera': "\uE301",
  'mic': "\uE302",
  'location': "\uE303",
  'mic-filled': "\uE332",
  'speech': "\uE332",
  'location-filled': "\uE333",
  'micoff': "\uE360",
  'image': "\uE363",
  'map': "\uE364",
  'compose': "\uE400",
  'trash': "\uE401",
  'upload': "\uE402",
  'download': "\uE403",
  'close': "\uE404",
  'redo': "\uE405",
  'undo': "\uE406",
  'refresh': "\uE407",
  'star': "\uE408",
  'plus': "\uE409",
  'minus': "\uE410",
  'circle': "\uE411",
  'checkbox': "\uE411",
  'close-filled': "\uE434",
  'clear': "\uE434",
  'refresh-filled': "\uE437",
  'star-filled': "\uE438",
  'plus-filled': "\uE439",
  'minus-filled': "\uE440",
  'circle-filled': "\uE441",
  'checkbox-filled': "\uE442",
  'closeempty': "\uE460",
  'refreshempty': "\uE461",
  'reload': "\uE462",
  'starhalf': "\uE463",
  'spinner': "\uE464",
  'spinner-cycle': "\uE465",
  'search': "\uE466",
  'plusempty': "\uE468",
  'forward': "\uE470",
  'back': "\uE471",
  'left-nav': "\uE471",
  'checkmarkempty': "\uE472",
  'home': "\uE500",
  'navigate': "\uE501",
  'gear': "\uE502",
  'paperplane': "\uE503",
  'info': "\uE504",
  'help': "\uE505",
  'locked': "\uE506",
  'more': "\uE507",
  'flag': "\uE508",
  'home-filled': "\uE530",
  'gear-filled': "\uE532",
  'info-filled': "\uE534",
  'help-filled': "\uE535",
  'more-filled': "\uE537",
  'settings': "\uE560",
  'list': "\uE562",
  'bars': "\uE563",
  'loop': "\uE565",
  'paperclip': "\uE567",
  'eye': "\uE568",
  'arrowup': "\uE580",
  'arrowdown': "\uE581",
  'arrowleft': "\uE582",
  'arrowright': "\uE583",
  'arrowthinup': "\uE584",
  'arrowthindown': "\uE585",
  'arrowthinleft': "\uE586",
  'arrowthinright': "\uE587",
  'pulldown': "\uE588",
  'closefill': "\uE589",
  'sound': "\uE590",
  'scan': "\uE612" };exports.default = _default;

/***/ }),

/***/ 426:
/*!****************************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/components/uni-ui/uni-icons/icons.js ***!
  \****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _default = {
  "pulldown": "\uE588",
  "refreshempty": "\uE461",
  "back": "\uE471",
  "forward": "\uE470",
  "more": "\uE507",
  "more-filled": "\uE537",
  "scan": "\uE612",
  "qq": "\uE264",
  "weibo": "\uE260",
  "weixin": "\uE261",
  "pengyouquan": "\uE262",
  "loop": "\uE565",
  "refresh": "\uE407",
  "refresh-filled": "\uE437",
  "arrowthindown": "\uE585",
  "arrowthinleft": "\uE586",
  "arrowthinright": "\uE587",
  "arrowthinup": "\uE584",
  "undo-filled": "\uE7D6",
  "undo": "\uE406",
  "redo": "\uE405",
  "redo-filled": "\uE7D9",
  "bars": "\uE563",
  "chatboxes": "\uE203",
  "camera": "\uE301",
  "chatboxes-filled": "\uE233",
  "camera-filled": "\uE7EF",
  "cart-filled": "\uE7F4",
  "cart": "\uE7F5",
  "checkbox-filled": "\uE442",
  "checkbox": "\uE7FA",
  "arrowleft": "\uE582",
  "arrowdown": "\uE581",
  "arrowright": "\uE583",
  "smallcircle-filled": "\uE801",
  "arrowup": "\uE580",
  "circle": "\uE411",
  "eye-filled": "\uE568",
  "eye-slash-filled": "\uE822",
  "eye-slash": "\uE823",
  "eye": "\uE824",
  "flag-filled": "\uE825",
  "flag": "\uE508",
  "gear-filled": "\uE532",
  "reload": "\uE462",
  "gear": "\uE502",
  "hand-thumbsdown-filled": "\uE83B",
  "hand-thumbsdown": "\uE83C",
  "hand-thumbsup-filled": "\uE83D",
  "heart-filled": "\uE83E",
  "hand-thumbsup": "\uE83F",
  "heart": "\uE840",
  "home": "\uE500",
  "info": "\uE504",
  "home-filled": "\uE530",
  "info-filled": "\uE534",
  "circle-filled": "\uE441",
  "chat-filled": "\uE847",
  "chat": "\uE263",
  "mail-open-filled": "\uE84D",
  "email-filled": "\uE231",
  "mail-open": "\uE84E",
  "email": "\uE201",
  "checkmarkempty": "\uE472",
  "list": "\uE562",
  "locked-filled": "\uE856",
  "locked": "\uE506",
  "map-filled": "\uE85C",
  "map-pin": "\uE85E",
  "map-pin-ellipse": "\uE864",
  "map": "\uE364",
  "minus-filled": "\uE440",
  "mic-filled": "\uE332",
  "minus": "\uE410",
  "micoff": "\uE360",
  "mic": "\uE302",
  "clear": "\uE434",
  "smallcircle": "\uE868",
  "close": "\uE404",
  "closeempty": "\uE460",
  "paperclip": "\uE567",
  "paperplane": "\uE503",
  "paperplane-filled": "\uE86E",
  "person-filled": "\uE131",
  "contact-filled": "\uE130",
  "person": "\uE101",
  "contact": "\uE100",
  "images-filled": "\uE87A",
  "phone": "\uE200",
  "images": "\uE87B",
  "image": "\uE363",
  "image-filled": "\uE877",
  "location-filled": "\uE333",
  "location": "\uE303",
  "plus-filled": "\uE439",
  "plus": "\uE409",
  "plusempty": "\uE468",
  "help-filled": "\uE535",
  "help": "\uE505",
  "navigate-filled": "\uE884",
  "navigate": "\uE501",
  "mic-slash-filled": "\uE892",
  "search": "\uE466",
  "settings": "\uE560",
  "sound": "\uE590",
  "sound-filled": "\uE8A1",
  "spinner-cycle": "\uE465",
  "download-filled": "\uE8A4",
  "personadd-filled": "\uE132",
  "videocam-filled": "\uE8AF",
  "personadd": "\uE102",
  "upload": "\uE402",
  "upload-filled": "\uE8B1",
  "starhalf": "\uE463",
  "star-filled": "\uE438",
  "star": "\uE408",
  "trash": "\uE401",
  "phone-filled": "\uE230",
  "compose": "\uE400",
  "videocam": "\uE300",
  "trash-filled": "\uE8DC",
  "download": "\uE403",
  "chatbubble-filled": "\uE232",
  "chatbubble": "\uE202",
  "cloud-download": "\uE8E4",
  "cloud-upload-filled": "\uE8E5",
  "cloud-upload": "\uE8E6",
  "cloud-download-filled": "\uE8E9",
  "headphones": "\uE8BF",
  "shop": "\uE609" };exports.default = _default;

/***/ }),

/***/ 5:
/*!**************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/pages.json ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ 520:
/*!**************************************************************************************************!*\
  !*** D:/开源相关资料/Wanyue-knowledge-payment-UNI-APP-master/knowledge_uni_app/static/images/kefu.png ***!
  \**************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAloAAAB7CAYAAACsNC5QAAAgAElEQVR4nO2dCbhNZRfH1yWZyVT6DCHzmFlmmdOtZChTGVIREhmiQeiGIiFknglJkSHzTEiozCFUZhnuNZ/v+a971u49++x9B8657q31e579nHP2fvf7vnvfvsf/W2u9/zfE4/F4SFEURVEURQk4ifSVKoqiKIqiBAcVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBAkVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBIn77rZbNZa/t4SEhPyXH19RFEVR4jV3LbT0H3pFURRFURRnNHWoKIqiKIoSJFRoKYqiKIqiBAkVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJAIqtAJl9eDWT2z6V9sJRVEURVHuNXdt72Dnl19+oS+//PKO73/wwQepQ4cOrtcHDRpEly9fjrKPFi1aUO7cuenQoUM0efLkWM+hcOHC1LhxY7pw4QINHjyYzznZWHTu3JnSp09Pc+fOpZ07dzq2eeGFF6hgwYL0888/83u5UzuMFClSULdu3Shx4sR3dL+iKIqiKHFPiCfAoZ9JkyZRq1at7vj+JEmS0PXr1x2vYaqJEkUfhIPwadCgAU2fPp2aN28e6zlkyZKFjh8/Tnv27GGR5Mbff/9NadKkodDQUFq4cKFjq3HjxlGbNm1o7Nix9Morr8R6LiZXr16lpEmT3lUfiqIoiqLEHQGPaKVNm5Y/IQiqVasW4/sgbBD1yZcvn3UOUaI///yTHnnkESpQoACf+9///kd//PGH1SZXrlyUN29eun37Nq1cuZJu3rxJqVOn5msQSXXq1PEZZ8uWLXT+/HnHOWAMjFW5cmX+nTFjRr/7TRYtWkQPPPAAhYeH89ns2bNbwmz16tUsjHAdyCciWngv999/f4zey5kzZ2jbtm2UIUMGNYdVFEVRlARGwIWWAJGyePHiGLefP38+1a9f36e2qm3btrR161ZOv82cOZOFhl0k4dqHH37I30WIIM0Gihcv7jeHmjVr0vLlyx3n0Lt3b2rWrJn1O1OmTFE+g1341KtXj0aOHMnfIdh+//13x3tWrFgRxZvwZfv27VSqVCkWkoqiKIqiJCyCJrRu3bplfb906ZLPb5NUqVLRfffd5xhlKlq0KB04cIDrthDZgQjLmTMnnTp1ymqTPHly/kQkK0eOHFy/dfbsWW4PUYOaJnxKpE3SkogoIe1ncvr0aa7LQvoyZcqULG6QHnSLJEHIHT582BpDImn257eDZ02XLh1duXKFbty4EeV7wbMoiqIoipIwCZrQMqlRowb99NNPfoIFwmnMmDH00ksvOUZsRo0axRGi0aNHc90U6rNQN4X0Ie7FIcXhECX79u3j788++ywXs2M8tEHaDqlJCCiJmNWqVYu++uorax5o2717d3rooYeoUaNGNG3aNL4nT5483Macu/SxY8cOLrqXczEtVJf7mzZtSkuWLHHse/z48VxfFpVgUxRFURQlfhMnQuvcuXOuBe4RERGu90EYAQgYuR+r/Nzqm+Q8BJk5HiJVImawEhGgzsveD6JMuA9RLfIWn7vNm7wpSre5yNydkLlgHLf+MbaiKIqiKAmbOBFaZkrNTkyKwiXaBYGCwnOk/CZOnMhWEk5pvV9//dWKZpG3QB+RIUS9YNeASNWjjz7K15DW7NevH7ddtWoVn0PaEGTOnJk+/vhj13lJOnLGjBn0448/+swFqcvokHHu9L0oiqIoihK/iROhFSggZCB+QJ8+fRyLzd1ADRdWQqJ43gQi0C6mIMQABN1bb70Vbd+zZs2iBQsWOF67ePFi3L8oRVEURVHiBQlKaIEJEyZwzRXqsCCIUCy/e/fuaO+zR76QOty8eTOn75CaRMSrWLFiHOmqUKECt0H0TFYdlihRggvxTb7//nsuvkdUzBwHB2rAkFoUWwpFURRFUf57xInQiqrOKSbF3kj5kTeFCPNP8vpUValShQ1BYQMRW9atW+cX3Xr77bfp+eeft36jtqthw4b8fcCAAdSjRw+f9nXr1vUr4pci/ZhYW7itOIzpe1EURVEUJX4TJ5tKR1XYjZRedDjVK0kRvZv5aHSILYSJGZkir8WC4NQePltu2Pty4tq1a67XVGgpiqIoSsInTiJa2J5G3NPtwNjTjV69etHSpUs5siQsW7aMVx5+/vnnbDAK53aYeiJqVrt27RjXRDkV0X/wwQdsKSHAjR19k9f1HaAWC/VhAAX5sINwAqlNpCWxN2P16tV9WoiIQhrUbb7wBFMURVEUJWETNKEl6T6QP3/+aNvDG8sOtsvBaj4TeHIB+HLhWtWqVbl+iqIoPIfgEbf4qEDNlxTCC6jDMjly5Ig1J9Ry2U1PBaxgRArxxIkTftfgmg/EgysqROAFeEtKRVEURVHigKAJLXhnvf766zFuDyNSskWa4AgPIKZgIgo6d+7MtU0wJEW9FqJdGAfeWSNGjOD7Ee2CxQMK0Tt06MAipX379nytS5culrUDeVcdhoWFcUE8NqPGfokQbugbaU15hiZNmlDFihV9rCrgUA+hhY20sVVQpUqVrLovCEeILLuFA+aCvpMlSxbtO8F8ZWVlTDbTVhRFURQlfhFwoSVRJaQKZd+/2HDw4EG/1tiEGUKJDCF29OhRjvbAwV1SeRL1+eGHH1hoYY9A+32hoaE+Qgt1WBBjAJtaQ2hB4NnvK1u2LAstUzhJkT9SiGvXrqVjx45ZQksiWdjCx/zEHJEyjC0QrhrVUhRFUZSERcCFVsGCBX02Zo4tWbNm9btDzD8hNOCj9ddff9HQoUOpZMmStGjRIr4GJ3asQETROrbGIe8WOdOnT+eic7FwsEeYELXCeVwvV64cCyKIKvKKOQFCCm2QWpTnQw0XGek9mTvmCfGGQv0iRYrwOXzezXtBJC2mW/woiqIoihI/CKjQgsAoXbo0R5kCgRSNm/YQ8v3TTz/1GQHpRNPmAZEoRKiwX6CJ3Y5BNp4GLVq04EMwVzti70EcsHuYM2eOTx8yJ9PBfvjw4T5tIN5EwCmKoiiK8t8goIU/Tiv5AgmEjNPm08HC6Xmciuo1pacoiqIoihP3xBketUywZTAxxYoIHBS+w3IBdg7k3VwaKxHdvLfkPkS2NmzYQI8//jinE81rdjuJs2fPUqFChfi7fQ6o1UKtlwlWE0p7pC3R35AhQ7hODCsU5ZqAFGfNmjVpyZIlXIhv7sH4xRdfcAG9EzBP/fbbb/n66NGj7+JtK4qiKIpyr7gnQuvhhx/2EzBOFC9e3G8Lm7x580Z7H2qmILRQQ4WaMSewdQ5505Nuc0FBu338kydPWu3FG0xqszZu3OjXF+rJ5D5ZWSlEZUqKbYXQl5tPl6IoiqIo8Z+ACy14TMFmIW3atH51VNhbcMyYMY5+V5UrV6aWLVvyHoTvvPMOn8OGzrly5fJph+gR9jq0gxotRIyuXLnChetkONKjGB42DUg79uzZk8UaVhBi9R+K37t27crXYOGA6BOsGmBcCiHUunVrn5Gwt6JgeoWRy5Y6kmqUT6nfwm+Yn06ZMoXy5cvnt72PFNpjPMwBqyPx7PYxFUVRFEWJx3gCzMSJE5EX8zh1PWjQIOua/ejbt6/Vzq0NjiNHjrhO2N72qaee8ru2ePFi1/vmzZvHv3fu3BnlHOQ4f/68Tz+zZs3yayPjLVy40O+95M+fn3+nTZvWb0716tXz6ysiIiLQfy5FURRFUYJIwMMjiGQB2DDYQRoPNUxYpWdGhsCuXbvol19+YfsEqXNC6g6u7gKiQbBxMIFhKYxD0SfGFr8q8tZfIf2GFB8iQajtsts7wDoC1guIaB06dIjnAB8ue63Vn3/+yV5W6dKls1zssT2P+Zy4l7zzzJMnD88VETqcRwoRfeIa+sc84POFujO8F7SBKSmiW/gsWrQou9ALiOKpvYOiKIqiJDACreFmz57N0Zc0adK4tkEkyC1KlCVLFqtdo0aN/K4fP37cp69+/frFKPokx9q1a13n1aFDB27zzDPP+F1r3749X8OnkDFjRtdxzp49y63QF37Xr1/fuk/arF69mn9v3brVOnfz5s3YvG5FURRFUeIxAd/XRbaKMT2o7EjtlBNJkya1zsYkghNISwnpy2lcWSlorng05+rWXvo05ynvRvoya7tQT6YoiqIoyr+DgBuWwrbh8OHDnJLLmTOnYzsnewZsXfPRRx/5CLTPPvuMPvzwQ8sSAZ9YsQheeeUVWrZsGRew//bbbz59oZ15D4rvsX8hxrULM6Qe4QiP1CEK5tHX6tWruQg/S5YstG7dOp85z5gxw9poetasWdwGRfjz589n5/d+/frxuJJCFdFmFrHv37/fKsx/+eWXqVixYjwu0p9IJ0KIDh48mOrXr3+HfwlFURRFUeIDAa/RQu0Rjhw5cvjUGEVH7ty5+R4T+FjJxtJ2UOeE/lH75CboTCTSBmFkEhERYQk1RJPQFxzlIRZRXyVAkJHXFkKsIbB6EfMTE1WIKre5mLVh4uWFFZp4BsxB7nPaXPteMGfeQipXujhly5blns3h2LETtHnrDmr03FP38lVQeEQE/f77CcqfL/cd3x8RfpUyZEjn2t+PO3bTI9mzWm3cWLd+C1WqWNan7+3bd/mcUxRFUeIPARVaUugNGwKk1RDxiQ6YdsIEFG2xobRpGtqpUycqX7689RvX2rVrxwXysIJAdAvF43bCwsK4uF6Q/QwBIkiZMmXifRK7devGQgljo2/4dpFXfAHTw6pXr17WhtGCWDYgMoXIGsSiGytWrOD7EdnCZttp0qRhM1UIRRGTKNqHjQOE3MCBA3lejz32GPcf14wcO4tSpUx5T4XWz7/u53ncqdAaNnICXbx4hRrWr0vZs2ehNWs3R3tPmVKP+Ykd3Ddo6HhatfjOtpYaN3Emfb1gJc2dNpz7hjAaNmoKzZn+udWma6+B1L1zG6pbu5prPxBj7304nOZOy2vNce/eg3xucFgKKlG8yB3NT1EURQkeAY9oYSXel19+yd8nT54cbXuk5iC0ILJwmFSrVs1HaJFXmIH27duz95YTs2fPpp07dzpeW7lyJX8icgShlSxZMnr++ed92jhF0bCHIw4n4ECPwwmJZP3+++98AIgoCK0qVar43AFBKJE3eI7hWL58+T0RWiaIbkHwuNG3d8c4iag0avY6nTn3t+t1uxCqVb0yDRk2ntp17kP1Q59gsRMdsXkWRJcuXwn3OZcqZQqf+9EG4w4O60Gnz5yl1zq9Q53avcjX9u47SO/2/ZQmj/uEfz/0YMYox1u0dDWVLl7QRwhCXOHcrDkLVGgpiqLEQwIutPLnz8/RIggJiK7oQLoN7QVEk8RdXeqcTBBlgsv6+fPn+SwiQrCBMEmePDn/Qt+ICJnInDJm9P9HDbVTsJeQGqxLly75tYFlhKRECxcu7FoQD2d31FyhPwBbCNR9IaIlkTAIS9hRpE6dmtOQmK9E9JBGhWlphQoVYvsnuGPOnj1PP2z7ybr9wKHDREuJMj+YiaMtTiDSYxcbdwsiNydPnYkcn4gWL13FnxAoTmOhnZOIQmpuzOcfWem2Tu3/MZ+tVrc5vdjkaWr1YmPX2brNAxQumJcjSU6sWhwptDAu2uDdQQTht8np02f5F9KIAtKlIEPG9JTC+98xeUXZijVbuC8IThMRn/bzo4f1jzYVqSiKogSXgAstRKG2bdvGBehOQsnO9OnTuehdgICSvQ3tGzhLkbsJIlzYZ9AJFOYvXLjQ50rt2rU5SuQ0NzjZy76CEEROYgxF70g/kjdKlS1bNsexUeBupkGffPJJmjbNN+KCPRlReF+mTBnewxHRL7kHxfDPPfdctO8vkPy6Zz8LJ0HES/u2L7im78z2gQLRma07fvUbQ1JvfiyNemCILDP69NfJyHq7S5cv+4gnskWk1m/a6iPgzGfFOwFmus8e+Tv421G+DlEGYVe9SmS/f5067fN5+Mgx/kT6ULCnESdMns2fOIc5xgQVWYqiKPeeoO3nElObAns7RKsE1CpJoTnAd1O8ALuBKXnNUocNG0ZPPPGE3zWsGsQ2PRBx9tWPffv25RWEWPmI6JKsGMSYKIaH8DKtH9CPOT/7HGByKphjoT8c5opE9IPVhvJ898LmAQJDojEQBtHVDAWLQWG9uGeIoDutjZo4ZTbt2XuQWr/UmCNbTtEnt1SivANEwHDY54F3ExMkWta9VxjlyZWNShYvzFEpEWP4zJg+La1as4lF2EvNnqPJ0+fR78f+oCqVy1kjYHxTeOLvhPozN1KnShVlpE5RFEWJO4ImtBCVklV7iCIhlYYIDfZBNIG46d27t3UGResSuerQoQPvd2gC2wgTU/jgHqTokHrEJ4QLImRmFAzpONlH0HSdlzmjUN4EqUK0x/6HKMB/5plnrOeC/YLUXdlZsmQJ94Wo1XfffWcJMjwf0pnoV9KfiADKxtRSiO+0b6IScx4vW4KFFuqzUHclIkmiTlPGDORCf6QHEUlCDZVbjdPlK1dYEJE3vUoc+UoZo7lgPIgk9J8pY3qei2/f4SziUGclCw8KF8pjpQ2RMsR1jG/Wpz2c2Xk1bmzmpiiKogSfoAktCCDxvBJrBNQjyTkBNU5m5EdAZEeEiBNihyDb4ZD3HmxIDZGFui1ElVDs7obT5tR2sAoQgq1evXos8iCs5BmQ7nMDW+iQYVxqWl3APsIEtVxO7+BegxSbpNZimiJE9MaMvsQGt8gV0n5Is/3516kYFbSTtz4LkTHTDgHfIbKQ9oNtBHmLyVGrBbHlVgiPcdM9kIa/Y2UoeVOM0SHjEUc/w/1SkSbyznbu3kutX2xoXQkPj+BoWP2na/n8DVA351YbF9PUoqIoihJ8gia0kPYbNWoUf2/VqhWnzqQwHZGksWPH8veNGzfyJ4QJIl9OwG8K9ggmqKfC3oGocSKvsIP1A0xDIYwQTQrE3oAQgvKPK1YW7t27lz7++GP+jdWAiFAtWrTI2udQePfdd3lBAIxSMU8RXoiuoaYMaUc7iGJ9/vnnPtEs7L84b948FoxYaRnM/Q7Ft2rf/sji7ykzv+VPCJOoiuFNQp+sTqVLFb2reSDKtHP3Htq0JVIMIe2HiA4EiNM83IrhyZtmg9eUWCxAVKHeDOk/sa+QNBvGqV7lB+ryxss+heiwiMieLVLQXwmPiPFzwMIBKUGkC8mbimz2fH3rvyeA8RG1QuQNz42oFWq6BAjBoZ+852dNsWCR7/8eTNKkSa2+WoqiKPGEoAktRH+6d+/O36W+SUBdlVwTqlatSoMGDXLs66uvvvIRWhArkyZN8mkDwTN8+HBrPES1AoVYLiCKtmnTJmvuEI8QPkePHvXZUBpH//79+TeiXih2F9DX+++/7zqziRMncuRPPLyQppTx4IYfTKF15OhxjsAgjQWiW5VHDkIrEP/Aoxj+8NETVhRJ0nyuRFEMj1ompNnWbdjOIg2iLDziH7GEiB2EDUQlnjdVqhQ+Iou8UaYna0dacchKwUyZMkT7HP3ee5P9u0RogYbNfVOHEkXDO//ok9EsKO3Pap8PGXVsiqIoSvwmaELLLFKHxQGE1qlTp9hCwbRjyJMnD4sKCIj169db55FygxkpPK1Mh3ahYMGC1upE8haUoxaqbNmybO/gVqR+N5iRCAD3eJiUImJVsWJFtppABIq8vluIhiEah9SgHTwf7sMzQFihhg1RLmkLfzGsQoQBLHntIYLtFm8vhs/8UKZo7wkGfd59k8WFFKHfqWkqBBWiWIjIwRwU/UFwvdyqidVmwpS59PZbr3HkCRE02EGYoCYLUabcuR7xOZ8yhb/4sePmJC/iyiyqRxQQ6UOIveiQCFhU3Km5qqIoihJYgia0TKEjK+4QmUL6ywT7GzZo0IBTiZUqVfK5BusGRHHsQKTAEqJGjRo+VyBE4Lbepk0bP3HjIQ+RJ4Ru001KFHIfQbJcjThI9yXLQveFJMdVik7G2KNJqN8C7733Hh+wfkCBPOYnAgm/kdJ0YvHixWxBgeJ9+7Njj0ccgpOn178VpwjOnQAHdoCthCC6IKoaN6jr03+lCiXZCLRd2+YcbYIYM1daiq9YyZKR6VCxZLgbx3wzGjZ15nxas/4HXpEI7ILOCYmqIdJnB6nfqMxlFUVRlLglqMXwYhwq0S0UnyPyBCEiW+LIvoGI/pgbL5OLYSlqlSCo7NYMsEPA/VF6d4XcIvIkpmvXz9HtfT0o0R8r6EayB+jmo29Ssqwton0m1E4h9ScmpUiPYjyMizmZkToUzaNQ3xSc9ueDGMQqQ0S07M+H94MD47l5esUVYtx5r3FyYicxVnUAdUwoJIcoEjuEenWr+zQsXrQQ12a907MjR5Mgxkyh9fW333NaT8QZ6tdkBSIZpq5yLSoQiQKZMmawvj+QNjVVqViG67nIK7ximn51EntI/yqKoijxh6AJLaz4E+GBonCAyBUiOFiBhyJx8tZWAewDGBoa6tNHStsydQgQpOLQt0STBHhfIXUHl3UIl+R+URFEsxJR4pAQunZgICU6MI6Spc1B187toOtpNsRIaGHbHsxbnOOrV6/us5rQ9L5C8TtEkghJ2EKg/sqkdevWbBkhohHPhOiW/dnIW9uFZ7wXRLVaLi5xc2J3AoX9SMVJ8TzShfVDa/tFyxCpGjU0Mg33dL2aVKxIAesaBOaB345xqk9WX6Jeq1iR/Fab2LyXTVt+ZOEnRqIQdjWqVaB+A0ZQzkey0JABvahLzzDqPyBS+EWH3WyVDDNWRVEUJX4QNKEFYWAvSIdQwGEKEhFTcs0JsYdAJAxO7E5CBCJM/LHgSv+P0PIanHpuU+KQyKL2kPADlDhZcroecoHogccoVZEhdJWuk+f6LUp+v3/aSmqjDhw4wLVh8lw7duxwfX4zSkVePy77+4BoNC0sIMrcnObjCnM/wZw5Iucixp1OxNS8MzaYNUhm9Mit7khquUxgSItIlBh/QmClyJbF5/mwtyDOSy0VBJDppi57CyLC9Mrrb7PownxgLCpE5QxvgkjcoqVrrH0OMQ4WGmA+EFlSl4Z6MVhNYCNstxov632s2eR37sLf/50Us6IoSkIgxGO3Wg8QqCmCBYMJ9gaEaem5c+esbXcgyMwib9gy2GuasHIPFgpo9+abb/qkB1FALxtF41FeeukljnglSpSY7r8fOvIW60nPbQ+FJEIaLzFdOz6TaEtTlGxR4kpLKEmm2tRhxkkqnyMxNS2fnm57QiiRMScUwSMViu15ILZk02mJxgnYRxEF+SaNGjWiAgUKcOE7vsuzYq7Ykse+kbbUgSEChm184hpJE2IlXkzqkFAsnjxFsoDVVQmyL2DBAnmj3UoG9VcR4VdjtOWMPB9EZHRChrzP59ZvTJ8dz4LImdMcnfrH89j7RDtskSR2Fag/c0oxRnVNURRFiXuCJrTIiAQJ8NGyR4EgKL799lufc7GZEjy6TKsHCB3sK3jjxnWuDbvlIUrsuUWUKISmbQqndGk8VK9QGqJT0+hG+J+UJEc3WrEvnJ4bRlQ17y2a3fE+SpoouTcSFjl/iEbUZ2GF4Jo1a9iKgrwCzExRIqVo9wJbtWqV1d4EtVtiG+H0zmbNmkXPP/98jN+DoiiKoijxj4CmDiGQYOGwa9cun61yYPSJdB8iO8uWLfO5B/YINWvWtH6j6FvaIAIGF/Zjx46xUSh5hQjGQbQHkSXUfKEWDHVOEDVSeB8p1UKIPDeIEnno5MXb1HPqTbrv/hC61iyCKhdvThkfJDp/9Tq9MfkGZU+Vmtbsv05DvrtKb4cm8Xk1iRMlosTJktGGDRto7dq11nwRmcuSJQtbM6A+bOfOnT7PgnlKATyuox3mX6VKFZ4nRCfeEwRcyZIlWbghlQqbB6QVcR7pUKlnUxRFURQlgeEJMFOnTvV4dY51nDx5kgf55ptv/K5Nnz7dZwKnTp2yro0fP57P9evXL9r7vJE56/y16+GeW57bHo/npsfjue55+bPTnlQtr3ke7eLxUO1TnrHf/8XtXp9y1nN/s8ueUj1uefK+cduToeVZz+7jFz0e3Hv7FrcJv3qVP5MnT+4pVqyY37h16tThsdu0aeP6MqdNm2bN/fTp03yuePHi/Dtv3ryRc752zZM6dWqf5yxdunSg/0SKoiiKosQR/rmru8TJVFM2SnYqdrenCc37JS0XVYpNEDNR2b6GH427DqEF2yNo3Pf3U/rUHvrjyC3KlTMpvVTjITpy6hJ9Pvs+ejBlCjpz+Qbdukl08VJyajfqKty/kFiN7Isia7EQXZIVlCZS0B+VoajUdZFRhyWfEvVySpmapqyKoiiKoiQsAr7qEDVK2H/QFB09evTgTZNl9SDSbTNmzODvX3/9NY0ZM8Zqa7qvSx8ocIfzuglW/5nA2wqpQxSdI/V2331JuKB968Er9HQ3NExKv+9NQnTzPM37JBklCblBT75zi+iPB+i05xbdCklMt0NuUQglo/VfJ6FWmS7ShDfScJVWYq8AwpibN2/mmitTFDVs2JA6derEJqVIC4K5c+dyYT+MTFHXJalUrhvzFtFPmDCBVx1Kcb/dG4wcTFIVRVEURUk4BFxoocZKxIZg/w0BUrlyZf4+e/Zsrnty4pFHIl2yIcxwRAUEiRSdQ9RkSJeUbt2+Rh/POEtJbqen3Llv0p/HrtFb7W5RsZzJafySU7Rnb2LKXeISKtMp8a37yZPoBoUkukXhqZLTlCVX6dWat6lcwYxEIZGvCZthwzoCwsnkjTfe4OfBCkJ5FhGM48eP99lCCOJRTEyLFCni0w+E1n/JAV5RFEVR/u0EzUfLBEadJ0+epJ9++olX02ET5p49e3IL7OlH3r0BYWiKdmILMWDAAC6gL1++PD39tO8ecFOmTGFzTxNEmV599VUWZYgNJaJE9Fn7zDTx7cQUcgsJQA+lTpaK6LaH6pZKSxcWJ6LkSRLRDY5b3aIQTzL+lnDqts8AAB2cSURBVCgx0aXLGSlxyA1OHN5EBOraNY7MIRKHrYRMRFSZ/mASiRoxYgTv74gFArgX0Sy5hveyb98+ypUrF281hFTpkCFD2DEeAhQF8YqiKIqiJGDishhu0aJFfkXtcnTq1MlqZ79Wv359v77Kly/v2M/ChQv5+vXr113ncTtGs/2n1eVLFz1///03f58zZ47fmFgAAEaOHGmds/PDDz/w+ZCQEM/58+f5KorrcS5p0qR+7du2bcvXChcuHKPZKoqiKIoS/wh4RAtpsm3btvGefbVq1fK5Brdue2RKQI0V/LSwR6CdrFmz8hloMFg/XL161c8sVEBaMjqi2zw6kn9a3fb8Y06Keip5hhUrVnA9mN+dISFcf4U0KiJ1sKiQrXrM1CEiZIha4brdSwxF9xgHtg+KoiiKoiRMAi60li9fzsXr5LCKDrVa9notYfr06WxeSoZXliBF4hAodkNQO/DcKlOmDBeZmyv97gbUZmFDbIgt+GSJVxY8wA4dOmStijRd39u0idxjD+nCJk2aWG1Mo9L333+fP+GnZffKmjdvHn3yyScBmb+iKIqiKPeGgNs7iIVDbDdAtq+4M1ctSu1TTDZWxuo/8topoHAdew4i6iTCDVYTOIeoGHlFkdNBXqsIrJaEyELEzV6oLvsZSs2Vkw2F7L8oRqrk3TzaBPsgKoqiKIry7yPgW/AgkoTVd/h89913rfMYBi7uffv29Wnfv39/TptVqFCBmjZtyhEiRIDkGqJHDz30kLUCEQX1EEDdunXzWf0HAYYtcFCYjpV/2FMxT548lmCD0EE0CQeEkRSlu3lfYb5oCwGINohqYQ9FpEQFFLhDBE6ePJmtHbDyULbNCQ0N5cJ+RL3ghVW8eHGOcqFPpAwxz6FDh3KhPwTcnj17+NxTTz3FwvDRRx+1RBp5U5bYXsgUbIqiKIqixHMCWTV2+7Zvmbm9aLxGjRp+95QoUYKvNWjQwO++r776ynWs1157za9/IX369Py7UqVKfCY8PNxqs3btWj63atUqT44cOTzZs2f36ydJkiR8rXLlyjF67tq1a/N9zZs3d332Jk2a+F2bOHGiX19p06Z1XTBw1etQH2yuhId7zpw5Z42C33v2HvAZdfuPu3zauLF23WafK+jLfk5RFEVR/q0ENKKFrhDlQSH45cuX+dMEESvUYpmgpgs2DUjzwdAUkals2bJxC9Rj5cuXjyNUdksFRHcQ/apRowZHjzA2Cs4RMULxPD6x7yIiV5hLunTp2IEdkTakAbEvoUTEunbtypEiRK/QBsX8mBdo164d2y40atSIypUrR1u2bOFnMCNhiLghHSjPAHLkyMERM7wDjJU3b16O6OG+7Nmz8ziYd86cOa1+ME8UxuOzefPmXGuGdzN69GiOiiGNGduU7J0wbOQE+nrBSpo7bThlyJCO1q3fQsNGTaE50z+3eqtWtzl179yG6tau5jrCjzt2U9deA61+zHODw3pQieJF7mR6/0k2bd5Gm37YQY0bPEVZszzs9zuhc+7cBTp77hxlSJ+e0qd/wPFpDhz8jT/z5M71X//PQVGUhESgBSSiNG4Rmaj2Apw7d66rNULXrl1d+xw8eLDVTs5t3hwZMdm6datfnxkzZvS5P1u2bH7j7dy502+c9957j69hPPu1+fPn87URI0b4jff666+7Rt7sXLx40ZMyZUpug4gb2Lt3L/9+4IEHeC/EYINoU9U6zThihShWw6bt+Rw+5TeiUtImKvp9NMzT7e0P/VrgnNN5xZ3Bn43hd75sRWRE1v47vrL/wCHP9Flfexo0aefp0/9Tv1mGh0d4xoyfzs8iB9qb/LTzF75fruP7xk1b9b8WRVESBAFfdSjbyTgBx3aYlSJ69L///Y9boBAcERzUM6EOC5EgtCGvyzz2ESxcuLBVo3X8+HEfawdErchbMI8tclDfJMXzKHjHfbCVkJosuMdv3bqV66EQfUK9l1xDtAtRKVguyHhC/vz5+ZvT3oNSJI9nl/u2b9/O8//tt8j/F445wHoCkaxz585xP5g7ivNR94WomFlMLzYXcn9U+ygGCkSu3vtwOEeqEG3Cb5PTp89653bCOnvsWOT3DBnTUwrv3pRg776DtGLNFu6rUbPXffo5cy5yEYH9/Ohh/a3Il+JLu7YtfKJX9t/xlVc6vhflzEaNnUobN++gsPc7U8aM6Wn12s00dtJcyvlIVnq8XCmKiLhKw0dPoSKF8tKzoZF2MVNmzKNeHwylqeM+/ldE8xRF+XcTcKHl5m8FvvnmGz5Q6I2CedClSxd2eW/VqhWn/pAOhNgCX375JTVu3JhatmzJB3nFl9MqPaQDf/nlF59z2B9R/KuEOXPm8DekHlF4LsXxAPsSwskdNhP2+wSn1J0IJKT7cJDXz0v2NwQYC89j8sILL/D+jGXLluU9FCHCZDWkvEfx3JLzweTgb0dZGBUumJdTg9WrlOXR/jp12ufz8JFj/IkUoGBPI06YPJs/cS5VyhQxmrVdZEGstevch15s8jS1erFxwJ88pqkoSWtlzfI/Sp48WZRt75bjJ/5kwWpPn2FcU1TYf5ugDwj4qOYbk1RdIFi1eBr3gv+enLALRvwttmzbxWlRCC3Mf1D/nj5zfBEp6J1htP3HXSq0FEWJ9wTc3iEmJV+maJDokwiL5EZUxEm0ifC4WyDM7GDrGzI+nXCycHA6ZzcyddocWrbukbZ4d3aBJZ+IvAUbiBkIo+GjJlOeXNmoZPHCHH0aOXaW9QlWrdnEImzKmIH8ibZVKpezZrd46SrauuOf7ZEqVSxLO3b94npA4KGNnU1bIrcgmjLzW8cnHzthBv8DDmEhDBk2ls+JiAIzvpzP5yAucOC+hk3bc7QFB76b7fEd7Xfu+pU++HAoNWjWgdu1aNPFGkv6NO8z54RIjPTzzYKlPm1wDv2aYKyX2/ekFi934/G69uzv81zowxzP/hvj4Zz0gfk++dzLtHzlOp9x0A7vSJ4Jn/iN8+Sdh9OcURMm78TtGfDbTVC54SQYs2XJTJcu/fO/Hzch+GCmDI7nFUVR4hMBjWhBKMCOAcXfZqoLlgewLxAQkSpatKi1N2Hv3r05soNNllEIj4J68u4T+NFHH1l9o09ExOBr1blzZ1q5cmWU89m0aRP3D/GG/pG+E/D/+In/n/05KlasGPf/4osv0u7du9mVHZw4cYIL2MmbusOB9KKwcOFCLmwfNWoUhYWF+cxzyZIlXICPiB0K6+0+YRBQM2fO5LQp0qPkjZZhfFzDe0BfsIzA+4BQiwtrhznzFrJIQrF6pozpqW/vjj7XL18Jp0FDx1Pp4gUpW7bIjb4LF8pjpQ0RhcL1jOnTWilC8HBmd/PYVN7nt/N8o1A+83jZEo7Xy5R6jGbMWcRjyj/WSEOBX/ccsCJV23f8TI/mzMr/YENQIGLSoskzVLBAHjpz5hwNHjaBBg4ZQ+NGDvDpv3OPMGra6EkaM7wvHf39BH348Rc0ftKX9H7vzlSnZlVOcSHVZUbEli5fT6F1q8Qq8gVBJWMNH9yH59j9nQHWWDEB4/20aw+VLVWUenR5hcLDr3KKDXMu8VgRS6wMGjKaVq/fRp3bt+Dnx3saOnIqCxuMVaxoQX5XCxavomdC/zEHRoQpQ7o0fD3Y7P5lPz33TC3HUSD08FwliuWnx4oVDvpcFEVR7paApw4hgnCYmKk+iBBEtCAo5DcE1urVq+nnn3/mY9GiRXwNdVvSToDvFEQHaprIMAR1AgJG7neLtEEAibDDCkDUgwkwJMV83KhWrRqLN9R62eeJdCCiZhKhQu2XCZ7bXHFI3siYOT7mjLovvJ+4ADVZErW6ciWc1m/ayqsPnZCI1c7de6n1iw2tFuHhERzhqv90LRZcQuYHM7FIc8IttQjxFlXKMG+eSIGz6+e9VOOJSixYzp6/SG1bNqS1G7ayUIBo+XHnXj5HXkFiCiqIpOeOHmfRhPvN6Aruafr8s1a7xd+vYZHyvjfKUrViKRZWbVs35TaILmH8x8sUj9Vfa/ZXC/mzeZPneH442rzYkOuQukdcjbFos4sySbH9+NNu6/1g/hB0IqLwXKdOn2XB2sb7/KF1q7H4Mt/HgsVr+L5gg8gZ3mHpkkV9RsK7lXoviKze3TsEPY2rKIoSCAIqtNwKthHxQeQI1gjjxo3j+iWJACFiAxAJGzNmDEeBBEkjPvHEE5aJKdJ6OC9pN2xxs3//fo72DBkyhAvLP/30U7ZFgB0CefcNjK6YHNdxPyJR2J/wlVde4agS5mS22bhxI02cOJF/Y19HGJKKiSkK7Zs1a8YCCQIOQqtXr15sa4Hnb9u2LYspjAMROGzYMBZosLB46623OD345ptvcjoVNWsQlbiOdhB0gwcP5jquYAELB6QCUcQOOrVvTc2er2+9a4AoltROwaoBUSvUdAkooh/6yXu0Zu1mn1kuWLTCddZp0qR2TB1GB/6hxT+6iGJ16RQZTcPvQgXysnCCyDp+4g/uBedMEBn5Zc9+OnDwCEdQyIhyCilTJPf5nSa1r6N/reoVWbigL0R6tm6PFOyxjbRg/ogifb/8HwPeU96FB5h/bOwMII5Qu4To1rETf/G5K16Bi/cDqhppXvltRgYrVSjLQmvt+i0sNCVdiAhiMMHfC9FFCFj7M6PeTCKLs+Z+R6906EVDP35Xa7QURYn3BDx16CRo4NIOkKKD0EK7l19+2acNVvXJyj4B4gTANd7eXqJkcIrHAUaOHMmfAwcO5GiYABFmpg3JW1RvnztEFA6IGwit1KlTszgyQaG+CC07lSpV8psnfL4AVjLCER588cUX/Dlp0iTe5xCCToTW559HelVhM2kILaw+xDuT5wqm0Or33puUPXsWS2iBhs19U4dIJUIUIXX40SejOUUoKUTBXH0oDArrFZQ5V65QmobujIy+ILKVP28uypY1ckXr/gO/0ZGjkYX7Ev3CP+bvfPAJR7mQ4nusaAH638MPstCILSjWRjptxeoNLLRWrtkc67QhQAQHQByZQHAkd3iXbqA+DM8BsYn3gmeDYBKuuEQU7dcRrcNzzPvmexZaP2z7KehpQ/m7gI7tWvpdxzuF+MJR4fHSXC/36fDxNHjAO0Gbk6IoSiAI+L/aSJEh0mMi4guiAtEbmHLu27ePz2FbG6THsMUNIlCIDklKDWk0WD0goiLtsWIRYgM1XkjZyQbUqG9C/xBUSOnhO+7DJtMQMBBj+EdLxKCIM/SFqBTOQZxB3NmtHUxgL+GGiD/UWB0+fJijWjLeunWRRclIe2K7Hjyz1ILhmeQatuqRCBKeGe8F7wztnQrqA0n+fLkdexNxZRY6ly5VlNOHWBEYHRIBiwpZnRZbUGdEXpsJRIa6dmrNQgERIolYQXiI+Jk2cx6LrKEDe1nCwV74HRtQSwRB0rL5BTp0+Din/GIL5koOqb/YgJQbRJaZ7rQX6ud4JNIIGHVpZsQIv83roHrVCpwuhIBFTVvtGhWD+t8ebB7wd4HNQ3SrIPG3hN0DoomKoijxnYCnDhcvXsy2BU48++yztHfvXhY/KCIHiOC0b9+e3dY7dOjA/looQgdIleEYO3asFe2CEEJ6USI/JhBbEFUbNmzgaBAsEx5//HEWfxAwTiCNKYX6HTt25AJ8e+G6iXnNvgLS3FwaUTgzqiagZgv1W073IdWIyBdo0aIFu9LXqlWL39m9JJOxumvqzPm0Zv0PvCIR5M7lLkoF8d/CKkU7m7fusOrC7IRHRNCXcxZwMbybCIRgQLTl+xXrOTKUL29kOxSFowj+6O9/+BRW//FnpO+aRLjAocO/3/HbrVyxLKcph4+axL/NtGEGr+caIlVSE2VfBQikJgpiCVEyISIW9VmSajRTpEcNvzPyPjPe1fgpc3me6Btj4DfOm+8EIpTbTvqSBWTH11706QviEClXmSNEnaRgYwPuh8iCqIPIMp+fvDYUeLfdu7xmvQupNYOAVhRFie8EPKIVVS2U2CCYdgjSXj6dojamoIlKBEnBu7SP7e5CkpZzsmuwz9f+3T5ebGwonOYZ4L2+7wip6cmUMYP1/YG0qalKxTJcz0Ve4RXT+ip7ihEcOeoeIYTIgrUDjqgiXuXLFed/qGVlIUDdmKQDTfFR4fGS/I80Vt8htYbVdXcDaoTwDz76tKcNJbKGaxd79rfO2wVCrRpVuHgfxe/o49Gc2fk3asJiGuUqWSKyeBzmnhBuZo2WgLkh4odxkHpDVAjiCAIVIscu6iBQISKd0oYQsni/Hbv2YTsG9CN/BwGRQjN1ifew2hsVlb+niCyMgXmZoCaLvKsQYVWBVKr0A157ueld/e0URVHigoALrXr16tGBAwccr6Hmibx7A0obWT0Io09Eb0xDUBSGw1gU6TMB+/+JIILQQS0V6puwkhH9w34BdhJIISKKhUJ5FDkjiuRk+glBA1EEcQWbCUTXkObD3oRIccp+iAIMVKWAX4xVhalTp3IxPRAbiOHDh/OejaYoExGF+i/0DxsKjIcCedSIIcUpgjOYNVnRAR8rrCAUI1GkCWtUq0D9BoygnI9koSEDelGXnmHUf8Bweqdnx2j7g7+Wnb9OnnZtj0gWRFZ06cnQJ6uzODF9lRCxgYUB2aJXWH2HInfYFSAKhFQfomDrNmyxIlD4FPsDExS/Q5zZQT0U0l5Oqw1htvnV/EUcScO9EFU/7fRdyQqBg1oj2b8QIgl9oijdDcwNc5Q5Q/BBmMBuAhE6CErUMqHA3nwORIzgqI6/BeaElCC805yKyrHyD0LLKW2IFZJ435gratxQVwUDVPwdBJljVOCdmfeYiJnqmBFh/PeRGjakR2GvEUyjVUVRlEAR8H/FIRZQ8xQVUhdlgnolqVkSsHLQLtrsju1wkhckEiU1YvCoypMn8h8ZN2d1zEXuQ4E8DqTqMK6TOzzEnAhGO7CDwGGCOjOZgx3ZzgdCUJ5Tip/FxFS24olrYMWwaOka6tQuMmUEsQWrBWybA5HV5903uej97bdeY4f4hvXruqb3BBid2rnw9yXX9ugvJrVbUiRtAvFi+kCZQGzYU1RmW/wD7nSv/R4BAgARGafr6EvsH6Lrx2lebjg9s9M5p+eAqLLPyQl4bJHX3d+OvF/7ezPHd5qP0zNHh/w93P6eiqIo8ZmACy1sg4N6qzvdm+/BBx+kN954g7+LEEGdVWhoqM+qxmnTprEQM/dWlLRi69atWcgh4oR7YAnx8ccfc/0W7BpMAYVoGSwY0O+TTz7JtVWyzB8RLeHrr7/mPRJLlChBDRs6FzyXK1eOnn46MvqCFYIQXVIgj5WMMCiFqMN4iLjZxR9qtLp168ZRPRT7Y+Wh3WsrLkDxe8mSRXk5v31bHPt+hLBz+G7eWL+VhrhXzE7RlxTU20Ed1navLUJCA7YHWNWIVFbvbq8GZfZSAyXRHNgcBBvUW6FAfurMbziVqRYKiqIod0Ggd76eNGkS8mJ3fCRLlszq64UXXuBzffr08Rvn1Vdf5WthYWHWuTRp0vC5CxcuWOdu377tc1/t2rVd5zZ06FBus2DBAv59//33W/fVrFmTzxUvXtxvLs2bN+drvXv3ts7lyJGDz82dO5d/f/bZZ9Y4f/31F5+rW7eu61xWr159x38DJficPXveU7VOM0+bdj08879dErTxlq1Yy+PgCOY4JnimBk3aecaMn+4JD4+IkzEVRVH+rQQ8oiXpP6TkChUqFOP7sJoQqxGd0o6mszwiZohcofYKIOWGLX9g8iku7IgcIQrmlMYU6wS41yPihb7QJyJfSDnC9gGfjz32GLvOiw1EwYIF6dSpU7w5dFTPINj3JsSqSfiIIaJl90ZKlSoVzxNzkC14UCcmDvs4L+/zTiOFSmBBOutOLSliA2rKHsmeJeibP5vYtyJSFEVR7oJAC8h58+ZxRObhhx+O1X3Tp0/n+woVKmSdk4hW165drXMhISFW1Mf87nSUKFHCb5wyZcrwtTp16vDviIgIv3vl2tmzZ61zmJ8bEtFq166d1SJLlix87rvvvnO9LzQ0lNsgyiakTZvW9XmuXr0aq3eqKIqiKMq9xd3HII6JyrYBNVbkjexEtbehHUSK7KAOioxP9G23lJBNnmVcctieJaZEdZ9E4OzRL7dn0WiWoiiKoiQsguYdYPpA1a1b13Vz5k8++YTtGKISG9jyBsXoEBorVqzgInlsdbN06VK2Y3j77bcd70PxOra3McG+i9gfUYQWRJV9daGk9sxi9e7du1OfPn2oUaNGvFdhdMhKxldffZU6d/b3QsKznDlzhr/DYFXmeemS7yo87PM4efJk7g9bCSmKoiiKknCIE5Mm1EC5bV2DbXTcwPY75LVpwAGwGo+MaBCc3bNmzerYA8a0j4u6J7M9ollu95sRLdRf4XCyfBDM/RNRb0a2+jI3UF/m9n5wv9v8FEVRFEWJ38SJ0IIAEeFhx77Zswm2oIFlAgrSV61axVGgvn37so8VjEuLFCnCrT/99FMuFocBKPZKFEScIRKEyBI+scUP+O233+ibb77xGa9q1ao+W/Vg3jBNBcuXL+dCddNOws7KlSt5eyAAE1URgwDF+zBfxTO89tprPE9E6SDcIKQQKXOiQAF/g0xFURRFURIIga4Qk2L4zJkzW+dgieBW4D1+/HhuM27cOL9ieAFt7Pft2LGDr06YMME6Z2fr1q2u11asWOHXZ8eOHV2fq0ePHq5tatWq5deXnc2bN/P5xIkTW1fEasLJMkJRFEVRlITPvdvfJRYggoXIlsm2bdu4hgqf5N1Q+vvvv/dxl0cUCfeh5gptEUVCGhN1ULJ5M6JcMAYFMCt1Q6wbEAnDZtUAFhDoExtYY+NqbCJ9+PBhjlohWobthbC1DmrKxOEdtWsyT0TXMD+YoNo5ePAg13AhgqZRLUVRFEVJoARaKjpFtAoUKOAa0friiy+4TVQRLSeqV68erSkqrBzs5MuXz6dN+vTpYzRe27Zt/frfs2ePT5upU6fy+USJElltpkyZwtdmzpzpd//GjRtdx2vYsCG3KV++fIzmpyiKoihK/CNO7B1gwOmGuToxNsRkBZ5TG7FuEKKylTBxslaQlYWCWDmYzySbQjs9Z1QrLcWawj5fRVEURVESDnGSOkQaDSLEFCsiPLJnd9653wncU7NmTV6J16lTJxow4B8Ha6zcgxUCNmOGhQOc4ZEmNIvbAawg8uXLZ/3GfoRIHdrFIMZCam/RokWu87GLLxFtuHfJkiWUOXNmdp8nr8UFivqxkrFOnTqcimzVqhWnEEuVKkVjx47lZ6hevTo/gyweUEsHRVEURUm4BE1omQLBFDZuxMTCQHy0QJUqVShXrlw+1yFQADZ2hkiCN1WzZs182kDImKanWBko9Vp2UCclyNY9USG+WORdwSheXeS1lZAtdbDSEkIL9V7ktb+A0CKvp5YJ6tMURVEURUmYBE1onT9/nsLCwmLcXoranVJ0uIYCckSKIDxQzP7+++9zkTiKyRHJQjTpgw8+4KjQuHHjOGV36NAhvh8F6zANRapv5MiR7J2FvQUbN27MAuqdd97hiNayZcvY5FSAUJJnePTRR6lXr15s8bBgwQLHZ0C0DUX3mCf6NYXWr7/+SvPnz+d54t2AF154gcWiCEaIPnk+AVEwzAEF/Yji2V3sFUVRFEWJxwS6agzF39EVqUd1pEqVyq9PWCq43VO3bl2/9pkyZXK1W0iaNKlrEXynTp1cxxkxYgS3kWJ/HD///HOM38uQIUP8+ty2bZtPmwsXLkT5brAvo6IoiqIoCYeAR7Ry5sxJ1apVu6v77aA/ty186tev73euZcuWVoSMvIXliBYhGgSz0F27dnENlx1YMbjNXWqtEFmSNlGZl9qBhYO9b9PQlLwWFfXq1XNMU2IsKaxXFEVRFCVhEOK502V/iqIoiqIoSpTEib2DoiiKoijKfxEVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBAkVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBAkVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBAkVWoqiKIqiKEFChZaiKIqiKEqQUKGlKIqiKIoSJFRoKYqiKIqiBAMi+j8gPQyjGYZLawAAAABJRU5ErkJggg=="

/***/ })

}]);
//# sourceMappingURL=../../.sourcemap/mp-weixin/common/vendor.js.map
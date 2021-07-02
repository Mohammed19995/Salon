/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['data'],
  data: function data() {
    return {
      multi_language_fields: ['place', 'phone', 'email', 'facebook', 'twitter', 'instagram', 'snapchat', 'privacy_policy', 'prevented_goods', 'about_us', 'about_app', 'app_ratio']
    };
  },
  filters: {},
  created: function created() {
    this.setObjData();
  },
  methods: {
    setObjData: function setObjData() {
      var this_ = this;
      this.obj_data = JSON.parse(JSON.stringify(this.data));
      Vue.nextTick(function () {
        this_.setSummernoteData(this_.obj_data.privacy_policy, 'privacy_policy');
        this_.setSummernoteData(this_.obj_data.prevented_goods, 'prevented_goods');
        this_.setSummernoteData(this_.obj_data.about_us, 'about_us');
        this_.setSummernoteData(this_.obj_data.about_app, 'about_app');
      });
    },
    makeAction: function makeAction() {
      this.updateSetting();
    },
    updateSetting: function updateSetting() {
      var this_ = this;
      var formData = new FormData();
      this.getSummernoteData(this.obj_data.privacy_policy, 'privacy_policy');
      this.getSummernoteData(this.obj_data.prevented_goods, 'prevented_goods');
      this.getSummernoteData(this.obj_data.about_us, 'about_us');
      this.getSummernoteData(this.obj_data.about_app, 'about_app');
      Object.keys(this.obj_data).forEach(function (key) {
        formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
      });
      this_.show_loading();
      clear_message(this_);
      axios.post(api_urls.admin.setting.update, formData).then(function (res) {
        this_.hide_loading();
        var resposne = handle_response(this_, res.data, true, false);
      })["catch"](function (err) {
        handle_response(this_, err.response.data, true, false);
        this_.hide_loading();
      });
    },
    getSummernoteData: function getSummernoteData(obj, attr) {
      Object.keys(getMultiLangField()).forEach(function (key) {
        obj[key] = $('.custom-summernote-' + attr + '-' + key).summernote('code');
      });
    },
    setSummernoteData: function setSummernoteData(obj, attr) {
      Object.keys(getMultiLangField()).forEach(function (key) {
        $('.custom-summernote-' + attr + '-' + key).summernote("code", obj[key]);
      });
    }
  },
  watch: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "card card-custom gutter-b" }, [
    _c("div", { staticClass: "card-header" }, [
      _c("h3", {
        staticClass: "card-title",
        domProps: { textContent: _vm._s(_vm.__("admin.settings")) }
      })
    ]),
    _vm._v(" "),
    _c(
      "form",
      { staticClass: "form" },
      [
        _c("success-error-msg", {
          attrs: { success: _vm.msg.success, error: _vm.msg.error }
        }),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
          _c(
            "div",
            { staticClass: "form-group row" },
            _vm._l(_vm.locales, function(locale) {
              return _c("div", { staticClass: "col" }, [
                _c("label", [_vm._v(_vm._s(_vm.__("admin.place_" + locale)))]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.obj_data.place[locale],
                      expression: "obj_data.place[locale]"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    type: "text",
                    placeholder: _vm.__("admin.place_" + locale)
                  },
                  domProps: { value: _vm.obj_data.place[locale] },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.obj_data.place, locale, $event.target.value)
                    }
                  }
                })
              ])
            }),
            0
          ),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row" }, [
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.phone")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.phone[_vm.locale],
                    expression: "obj_data.phone[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.phone") },
                domProps: { value: _vm.obj_data.phone[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.phone,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.email")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.email[_vm.locale],
                    expression: "obj_data.email[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.email") },
                domProps: { value: _vm.obj_data.email[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.email,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row" }, [
            _c("div", { staticClass: "col-sm-6" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.app_ratio")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.app_ratio[_vm.locale],
                    expression: "obj_data.app_ratio[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.app_ratio") },
                domProps: { value: _vm.obj_data.app_ratio[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.app_ratio,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row" }, [
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.facebook")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.facebook[_vm.locale],
                    expression: "obj_data.facebook[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.facebook") },
                domProps: { value: _vm.obj_data.facebook[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.facebook,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.twitter")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.twitter[_vm.locale],
                    expression: "obj_data.twitter[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.twitter") },
                domProps: { value: _vm.obj_data.twitter[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.twitter,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row" }, [
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.instagram")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.instagram[_vm.locale],
                    expression: "obj_data.instagram[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.instagram") },
                domProps: { value: _vm.obj_data.instagram[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.instagram,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col" }, [
              _c("label", [_vm._v(_vm._s(_vm.__("admin.snapchat")))]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.obj_data.snapchat[_vm.locale],
                    expression: "obj_data.snapchat[locale]"
                  }
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: _vm.__("admin.snapchat") },
                domProps: { value: _vm.obj_data.snapchat[_vm.locale] },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.obj_data.snapchat,
                      _vm.locale,
                      $event.target.value
                    )
                  }
                }
              })
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-group row" },
            _vm._l(_vm.locales, function(locale) {
              return _c("div", { staticClass: "col" }, [
                _c("label", [
                  _vm._v(_vm._s(_vm.__("admin.privacy_policy_" + locale)))
                ]),
                _vm._v(" "),
                _c("div", {
                  staticClass: "custom-summernote",
                  class: "custom-summernote-privacy_policy-" + locale
                })
              ])
            }),
            0
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-group row" },
            _vm._l(_vm.locales, function(locale) {
              return _c("div", { staticClass: "col" }, [
                _c("label", [
                  _vm._v(_vm._s(_vm.__("admin.prevented_goods_" + locale)))
                ]),
                _vm._v(" "),
                _c("div", {
                  staticClass: "custom-summernote",
                  class: "custom-summernote-prevented_goods-" + locale
                })
              ])
            }),
            0
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-group row" },
            _vm._l(_vm.locales, function(locale) {
              return _c("div", { staticClass: "col" }, [
                _c("label", [
                  _vm._v(_vm._s(_vm.__("admin.about_us_" + locale)))
                ]),
                _vm._v(" "),
                _c("div", {
                  staticClass: "custom-summernote",
                  class: "custom-summernote-about_us-" + locale
                })
              ])
            }),
            0
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-group row" },
            _vm._l(_vm.locales, function(locale) {
              return _c("div", { staticClass: "col" }, [
                _c("label", [
                  _vm._v(_vm._s(_vm.__("admin.about_app_" + locale)))
                ]),
                _vm._v(" "),
                _c("div", {
                  staticClass: "custom-summernote",
                  class: "custom-summernote-about_app-" + locale
                })
              ])
            }),
            0
          ),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col" }),
            _vm._v(" "),
            _c("div", { staticClass: "col" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary mt-4",
                  class: _vm.loading
                    ? "spinner spinner-white spinner-left"
                    : "",
                  staticStyle: { width: "100%" },
                  attrs: { type: "button", disabled: _vm.loading },
                  on: { click: _vm.makeAction }
                },
                [
                  _vm._v(
                    "\n                        " +
                      _vm._s(_vm.__("admin.save")) +
                      "\n                    "
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col" })
          ])
        ])
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
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
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

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
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
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

/***/ "./public/admin_assets/custom/js/settings/service.js":
/*!***********************************************************!*\
  !*** ./public/admin_assets/custom/js/settings/service.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.vm = new Vue({
  el: '#app',
  data: {
    data: '',
    shock_event: '',
    settings: {
      place: place.value,
      phone: phone.value,
      email: email.value,
      facebook: facebook.value,
      twitter: twitter.value,
      instagram: instagram.value,
      snapchat: snapchat.value,
      privacy_policy: privacy_policy.value,
      prevented_goods: prevented_goods.value,
      about_us: about_us.value,
      about_app: about_app.value,
      app_ratio: app_ratio.value
    }
  },
  created: function created() {},
  methods: {}
});
$(document).ready(function () {
  // init
  $('.custom-summernote').summernote({
    tabsize: 2,
    height: 150
  });
});

/***/ }),

/***/ "./resources/js/LoadComponents/admin/setting.js":
/*!******************************************************!*\
  !*** ./resources/js/LoadComponents/admin/setting.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('setting-comp', __webpack_require__(/*! ../../components/admin/setting/SettingComp.vue */ "./resources/js/components/admin/setting/SettingComp.vue")["default"]);

__webpack_require__(/*! ../../../../public/admin_assets/custom/js/settings/service.js */ "./public/admin_assets/custom/js/settings/service.js");

/***/ }),

/***/ "./resources/js/components/admin/setting/SettingComp.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/admin/setting/SettingComp.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SettingComp.vue?vue&type=template&id=6e1bd4b6& */ "./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6&");
/* harmony import */ var _SettingComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SettingComp.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SettingComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/setting/SettingComp.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./SettingComp.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/setting/SettingComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./SettingComp.vue?vue&type=template&id=6e1bd4b6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/setting/SettingComp.vue?vue&type=template&id=6e1bd4b6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingComp_vue_vue_type_template_id_6e1bd4b6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 11:
/*!************************************************************!*\
  !*** multi ./resources/js/LoadComponents/admin/setting.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\salon\resources\js\LoadComponents\admin\setting.js */"./resources/js/LoadComponents/admin/setting.js");


/***/ })

/******/ });
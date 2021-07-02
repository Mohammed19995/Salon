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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
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
var empty_obj = {
  name: getMultiLangField(),
  description: getMultiLangField(),
  parent_id: '',
  image: '',
  service_time: ''
};
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['file1_data', 'data', 'add', 'shock_event', 'categories'],
  data: function data() {
    return {
      attr_name: 'image',
      selector_id_image: 'image1',
      multi_language_fields: ['name', 'description'],
      traffic_cop: false,
      can_update_anyway: 0,
      obj_data: {}
    };
  },
  filters: {},
  created: function created() {
    this.setObjData();
  },
  methods: {
    setObjData: function setObjData() {
      this.traffic_cop = false;
      this.can_update_anyway = 0;
      this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
      this.obj_data.parent_id = this.obj_data.parent_id == null ? -1 : this.obj_data.parent_id;
      $('.select_category').val(this.obj_data.parent_id).trigger('change');
    },
    makeAction: function makeAction() {
      if (this.add) {
        this.addCategory();
      } else {
        this.updateCategory();
      }
    },
    addCategory: function addCategory() {
      var this_ = this;
      var formData = new FormData();
      Object.keys(this.obj_data).forEach(function (key) {
        formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
      });
      this_.show_loading();
      axios.post(api_urls.admin.category.add, formData).then(function (res) {
        this_.hide_loading();
        var resposne = handle_response(this_, res.data, true, false);

        if (res.data['status']) {
          this_.$emit('add-category', res.data['data']['categories']);
        }

        table.ajax.reload();
      })["catch"](function (err) {
        handle_response(this_, err.response.data, true, false);
        this_.hide_loading();
      });
    },
    updateCategory: function updateCategory() {
      var this_ = this;
      var formData = new FormData();
      Object.keys(this.obj_data).forEach(function (key) {
        formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
      });
      formData.append("can_update_anyway", this_.can_update_anyway);
      formData.append("_method", "PUT");
      this_.show_loading();
      clear_message(this_);
      axios.post(api_urls.admin.category.add + "/" + this_.obj_data.id, formData).then(function (res) {
        this_.hide_loading();
        var resposne = handle_response(this_, res.data, true, false);

        if (res.data['status']) {
          this_.$emit('update-category', res.data['data']['categories']);
        }

        table.ajax.reload();
      })["catch"](function (err) {
        handle_response(this_, err.response.data, true, false);
        this_.hide_loading();
      });
    }
  },
  watch: {
    shock_event: function shock_event() {
      this.setObjData();
      this.msg = {
        success: '',
        error: ''
      };
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "card card-custom gutter-b show-form hidden" },
    [
      _c("div", { staticClass: "card-header" }, [
        _c("h3", {
          staticClass: "card-title",
          domProps: {
            textContent: _vm._s(
              _vm.add ? _vm.__("admin.add_data") : _vm.__("admin.edit_data")
            )
          }
        })
      ]),
      _vm._v(" "),
      _c(
        "form",
        { staticClass: "form" },
        [
          _c("gallery-comp", {
            attrs: {
              default_image: _vm.file1_data.src,
              attr_name: _vm.file1_data.attr_name,
              selector_id_image: _vm.file1_data.selector_id_image
            },
            on: { "get-advance-emit-file": _vm.getAdvanceEmitFile }
          }),
          _vm._v(" "),
          _c("success-error-msg", {
            attrs: {
              success: _vm.msg.success,
              error: _vm.msg.error,
              traffic_cop: _vm.traffic_cop
            },
            on: { "update-anyway": _vm.updateAnyway }
          }),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c(
              "div",
              { staticClass: "form-group row" },
              [
                _vm._l(_vm.locales, function(locale) {
                  return _c("div", { staticClass: "col-lg-4" }, [
                    _c("label", [
                      _vm._v(_vm._s(_vm.__("admin.name_" + locale)))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.obj_data.name[locale],
                          expression: "obj_data.name[locale]"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        placeholder: _vm.__("admin.name_" + locale)
                      },
                      domProps: { value: _vm.obj_data.name[locale] },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.obj_data.name,
                            locale,
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                }),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-4" }, [
                  _c("label", [_vm._v(_vm._s(_vm.__("admin.parent")))]),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "dropdown bootstrap-select form-control dropup"
                    },
                    [
                      _c(
                        "select",
                        {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.obj_data.parent_id,
                              expression: "obj_data.parent_id"
                            }
                          ],
                          staticClass:
                            "form-control selectpicker select_category",
                          attrs: {
                            "data-size": "7",
                            "data-live-search": "true",
                            tabindex: "null",
                            "data-none-selected-text": _vm.__(
                              "admin.select_parent"
                            )
                          },
                          on: {
                            change: function($event) {
                              var $$selectedVal = Array.prototype.filter
                                .call($event.target.options, function(o) {
                                  return o.selected
                                })
                                .map(function(o) {
                                  var val = "_value" in o ? o._value : o.value
                                  return val
                                })
                              _vm.$set(
                                _vm.obj_data,
                                "parent_id",
                                $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              )
                            }
                          }
                        },
                        [
                          _c("option", { attrs: { value: "-1" } }, [
                            _vm._v(_vm._s(_vm.__("admin.main_category")))
                          ]),
                          _vm._v(" "),
                          _vm._l(_vm.categories, function(category) {
                            return _c(
                              "option",
                              { domProps: { value: category.id } },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(
                                      category.name[_vm.locale] +
                                        " " +
                                        category.get_parents_name
                                    ) +
                                    "\n                            "
                                )
                              ]
                            )
                          })
                        ],
                        2
                      )
                    ]
                  )
                ])
              ],
              2
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "form-group row" },
              [
                _vm._l(_vm.locales, function(locale) {
                  return _c("div", { staticClass: "col-lg-4" }, [
                    _c("label", [
                      _vm._v(_vm._s(_vm.__("admin.description_" + locale)))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.obj_data.description[locale],
                          expression: "obj_data.description[locale]"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        placeholder: _vm.__("admin.description_" + locale)
                      },
                      domProps: { value: _vm.obj_data.description[locale] },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.obj_data.description,
                            locale,
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                }),
                _vm._v(" "),
                _vm.obj_data.parent_id != -1
                  ? _c("div", { staticClass: "col-lg-4" }, [
                      _c("label", [
                        _vm._v(_vm._s(_vm.__("admin.service_time")))
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.obj_data.service_time,
                            expression: "obj_data.service_time"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          type: "text",
                          placeholder: _vm.__("admin.service_time")
                        },
                        domProps: { value: _vm.obj_data.service_time },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.obj_data,
                              "service_time",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  : _vm._e()
              ],
              2
            ),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c(
                "div",
                { staticClass: "col-lg-4" },
                [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary mr-4",
                      staticStyle: { "margin-top": "-25%" },
                      attrs: { type: "button" },
                      on: {
                        click: function($event) {
                          return _vm.SelectImageFromGallery(
                            _vm.file1_data.attr_name,
                            _vm.file1_data.selector_id_image
                          )
                        }
                      }
                    },
                    [
                      _vm._v(
                        "\n                        " +
                          _vm._s(_vm.__("admin.select_image")) +
                          "\n                    "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("show-image-comp", {
                    attrs: {
                      attr_name: _vm.file1_data.attr_name,
                      selector_id_image: _vm.file1_data.selector_id_image,
                      shock_event: _vm.shock_event,
                      file1_data: _vm.file1_data
                    },
                    on: { "clear-emit-file": _vm.clearEmitFile }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("hr"),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-sm-4" }),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-2" }, [
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
              _c("div", { staticClass: "col-sm-2" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-default mt-4 cancel-button",
                    staticStyle: { width: "100%" },
                    attrs: { type: "button" }
                  },
                  [
                    _vm._v(
                      "\n                        " +
                        _vm._s(_vm.__("admin.cancel")) +
                        "\n                    "
                    )
                  ]
                )
              ])
            ])
          ])
        ],
        1
      )
    ]
  )
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

/***/ "./resources/js/LoadComponents/admin/category.js":
/*!*******************************************************!*\
  !*** ./resources/js/LoadComponents/admin/category.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('category-comp', __webpack_require__(/*! ../../components/admin/category/CategoryComp.vue */ "./resources/js/components/admin/category/CategoryComp.vue")["default"]);

/***/ }),

/***/ "./resources/js/components/admin/category/CategoryComp.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/admin/category/CategoryComp.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CategoryComp.vue?vue&type=template&id=44df7203& */ "./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203&");
/* harmony import */ var _CategoryComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CategoryComp.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CategoryComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/category/CategoryComp.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./CategoryComp.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/category/CategoryComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./CategoryComp.vue?vue&type=template&id=44df7203& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/category/CategoryComp.vue?vue&type=template&id=44df7203&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryComp_vue_vue_type_template_id_44df7203___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 6:
/*!*************************************************************!*\
  !*** multi ./resources/js/LoadComponents/admin/category.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\salon\resources\js\LoadComponents\admin\category.js */"./resources/js/LoadComponents/admin/category.js");


/***/ })

/******/ });
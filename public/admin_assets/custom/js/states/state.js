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
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
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
var empty_obj = {
  name: getMultiLangField(),
  country_id: ''
};
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['data', 'add', 'shock_event', 'countries'],
  data: function data() {
    return {
      multi_language_fields: ['name']
    };
  },
  filters: {},
  created: function created() {
    this.setObjData();
  },
  methods: {
    setObjData: function setObjData() {
      this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
      $('.select_country').val(this.obj_data.country_id).trigger('change');
    },
    makeAction: function makeAction() {
      if (this.add) {
        this.addCity();
      } else {
        this.updateCity();
      }
    },
    addCity: function addCity() {
      var this_ = this;
      var formData = new FormData();
      Object.keys(this.obj_data).forEach(function (key) {
        formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
      });
      this_.show_loading();
      axios.post(api_urls.admin.state.add, formData).then(function (res) {
        this_.hide_loading();
        var resposne = handle_response(this_, res.data, true, false);
        table.ajax.reload();
      })["catch"](function (err) {
        handle_response(this_, err.response.data, true, false);
        this_.hide_loading();
      });
    },
    updateCity: function updateCity() {
      var this_ = this;
      var formData = new FormData();
      Object.keys(this.obj_data).forEach(function (key) {
        formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
      });
      formData.append("_method", "PUT");
      this_.show_loading();
      clear_message(this_);
      axios.post(api_urls.admin.state.add + "/" + this_.obj_data.id, formData).then(function (res) {
        this_.hide_loading();
        var resposne = handle_response(this_, res.data, true, false);
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2& ***!
  \************************************************************************************************************************************************************************************************************************/
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
          _c("success-error-msg", {
            attrs: { success: _vm.msg.success, error: _vm.msg.error }
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
                  _c("label", [_vm._v(_vm._s(_vm.__("admin.country")))]),
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
                              value: _vm.obj_data.country_id,
                              expression: "obj_data.country_id"
                            }
                          ],
                          staticClass:
                            "form-control selectpicker select_country",
                          attrs: {
                            "data-size": "7",
                            "data-live-search": "true",
                            tabindex: "null",
                            "data-none-selected-text": _vm.__(
                              "admin.select_country"
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
                                "country_id",
                                $event.target.multiple
                                  ? $$selectedVal
                                  : $$selectedVal[0]
                              )
                            }
                          }
                        },
                        _vm._l(_vm.countries, function(country) {
                          return _c(
                            "option",
                            { domProps: { value: country.id } },
                            [
                              _vm._v(
                                "\n                                " +
                                  _vm._s(country.name) +
                                  "\n                            "
                              )
                            ]
                          )
                        }),
                        0
                      )
                    ]
                  )
                ])
              ],
              2
            ),
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

/***/ "./public/admin_assets/custom/js/states/list.js":
/*!******************************************************!*\
  !*** ./public/admin_assets/custom/js/states/list.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.table;
var DatatablesDataSourceAjaxServer = {
  init: function init() {
    table = $("#state-table").DataTable({
      responsive: !0,
      searchDelay: 500,
      processing: !0,
      serverSide: !0,
      "language": dataTableLanguage(),
      "drawCallback": function drawCallback(settings) {
        vm.ids = [];
      },
      ajax: {
        url: api_urls.admin.state.get_remote,
        data: function data(e) {}
      },
      columns: [{
        data: "select_record",
        searchable: false,
        orderable: false
      }, {
        data: "name.".concat(_locale),
        name: "name->".concat(_locale),
        width: "200px"
      }, {
        data: "country.name_".concat(_locale),
        searchable: false,
        orderable: false
      }, {
        data: "show_status",
        name: 'status'
      }, {
        data: "created_at"
      }, {
        data: "actions",
        searchable: false,
        orderable: false
      }],
      columnDefs: [{
        width: 200,
        targets: 1
      }]
    });
  }
};
jQuery(document).ready(function () {
  DatatablesDataSourceAjaxServer.init();
});

/***/ }),

/***/ "./public/admin_assets/custom/js/states/service.js":
/*!*********************************************************!*\
  !*** ./public/admin_assets/custom/js/states/service.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.vm = new Vue({
  el: '#app',
  data: {
    ids: [],
    option_id: '',
    option_url: api_urls.admin.state.execute_option,
    options: options,
    add: true,
    data: '',
    shock_event: '',
    countries: countries,
    execute_loading: false
  },
  created: function created() {},
  methods: {
    setData: function setData(add, data) {
      this.add = add;
      this.data = data;
      this.shock_event = makeid(32);
    },
    "delete": function _delete(data) {
      var this_ = this;
      Swal.fire(get_translations.admin.deleting);
      axios["delete"](api_urls.admin.state.add + "/" + data.id).then(function (res) {
        var get_res = handle_response(this_, res.data, false, true);

        if (get_res) {
          table.ajax.reload(null, false);
        }
      })["catch"](function (err) {
        handle_response(this_, err.response.data, false, true);
        vm.loading = false;
      });
    },
    emitExecuteOption: function emitExecuteOption() {
      this.ids = [];
      $('#check_all').prop('checked', false);
      table.ajax.reload(null, false);
    }
  }
});
$(document).ready(function () {
  // init
  /////////////////////////////////////////
  dataTableOperation(table, vm);
  checkBoxOptionDataTable(table, vm);
});

/***/ }),

/***/ "./resources/js/LoadComponents/admin/state.js":
/*!****************************************************!*\
  !*** ./resources/js/LoadComponents/admin/state.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../../../../public/admin_assets/custom/js/states/list.js */ "./public/admin_assets/custom/js/states/list.js");

Vue.component('state-comp', __webpack_require__(/*! ../../components/admin/state/StateComp.vue */ "./resources/js/components/admin/state/StateComp.vue")["default"]);

__webpack_require__(/*! ../../../../public/admin_assets/custom/js/states/service.js */ "./public/admin_assets/custom/js/states/service.js");

/***/ }),

/***/ "./resources/js/components/admin/state/StateComp.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/admin/state/StateComp.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./StateComp.vue?vue&type=template&id=593483b2& */ "./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2&");
/* harmony import */ var _StateComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./StateComp.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _StateComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/state/StateComp.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_StateComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./StateComp.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/state/StateComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_StateComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./StateComp.vue?vue&type=template&id=593483b2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/state/StateComp.vue?vue&type=template&id=593483b2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_StateComp_vue_vue_type_template_id_593483b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 9:
/*!**********************************************************!*\
  !*** multi ./resources/js/LoadComponents/admin/state.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\mazaad\resources\js\LoadComponents\admin\state.js */"./resources/js/LoadComponents/admin/state.js");


/***/ })

/******/ });
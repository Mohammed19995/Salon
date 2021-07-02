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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
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
  props: ['doc_id', 'first_time', 'admin', 'shock_event'],
  data: function data() {
    return {
      show_more_loading: false,
      lastVisible: null,
      message: '',
      messages: []
    };
  },
  methods: {
    setMessageData: function setMessageData(type, content, from_user_id, time) {
      return {
        type: type,
        content: content,
        from_user_id: from_user_id,
        time: time
      };
    },
    sendMessage: function sendMessage() {
      var set_message = this.setMessageData("text", this.message, admin.id, firebase.firestore.FieldValue.serverTimestamp());
      var docRef = firestore_db.collection("chats/" + this.doc_id + "/messages");
      var docRefRoom = firestore_db.collection('rooms').doc(this.doc_id).update({
        last_message: set_message
      });
      docRef.add(set_message);
      this.message = "";
    },
    showMoreMessages: function showMoreMessages() {
      this.getMoreMessages(this.doc_id);
    },
    getMessages: function getMessages(doc_id) {
      var this_ = this;
      this.messages = [];
      var collection = "chats/" + doc_id + "/messages";
      var docRef = firestore_db.collection(collection);

      if (listeners.length != 0) {
        listeners.forEach(function (listener) {
          return listener();
        });
      }

      var listener = docRef.orderBy('time', 'desc').limit(5).onSnapshot(function (snapshot) {
        if (this_.first_time) {
          this_.lastVisible = snapshot.docs[snapshot.docs.length - 1];
        }

        snapshot.docChanges().forEach(function (change) {
          if (change.type === "added") {
            if (this_.first_time) {
              this_.messages.unshift({
                id: change.doc.id,
                data: change.doc.data()
              });
            } else {
              this_.messages.push({
                id: change.doc.id,
                data: change.doc.data()
              });
            }
          }

          if (change.type === "modified") {
            this_.updateTimeWhenAddMessage(change.doc.id, change.doc.data());
          }
        });
        this_.$emit('change-first-time', false);
        this_.$nextTick(function () {
          // var messagesEl = KTUtil.find(KTUtil.getById('kt_chat_content'), '.messages');
          // var scrollEl = KTUtil.find(KTUtil.getById('kt_chat_content'), '.scroll');
          //
          // scrollEl.scrollTop = parseInt($('.messages')[0].scrollHeight - $('.messages')[0].clientHeight);
          scrollDownDiv('.messages');
        });
      });
      listeners.push(listener);
    },
    getMoreMessages: function getMoreMessages(doc_id) {
      var this_ = this;
      var collection = "chats/" + doc_id + "/messages";
      var docRef = firestore_db.collection(collection);
      if (this_.lastVisible == undefined) return; // show loading

      this.show_more_loading = true;
      var listener = docRef.orderBy('time', 'desc').limit(5).startAfter(this_.lastVisible).onSnapshot(function (snapshot) {
        this_.lastVisible = snapshot.docs[snapshot.docs.length - 1];
        snapshot.docChanges().forEach(function (change) {
          if (change.type === "added") {
            this_.messages.unshift({
              id: change.doc.id,
              data: change.doc.data()
            });
          }

          if (change.type === "modified") {
            this_.updateTimeWhenAddMessage(change.doc.id, change.doc.data());
          }
        });
        this_.show_more_loading = false;
      }, function (error) {
        console.log(error);
      });
      listeners.push(listener);
    },
    updateTimeWhenAddMessage: function updateTimeWhenAddMessage(id, data) {
      var index = this.messages.findIndex(function (el) {
        return el.id == id;
      });
      Vue.set(this.messages, index, {
        id: id,
        data: data
      });
    }
  },
  watch: {
    shock_event: function shock_event() {
      this.getMessages(this.doc_id);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
    {
      directives: [
        {
          name: "show",
          rawName: "v-show",
          value: _vm.doc_id != "",
          expression: "doc_id != ''"
        }
      ],
      staticClass: "flex-row-fluid ml-lg-8",
      attrs: { id: "kt_chat_content" }
    },
    [
      _c("div", { staticClass: "card card-custom" }, [
        _c("div", { staticClass: "card-header align-items-center px-4 py-3" }, [
          _c("div", { staticClass: "text-left flex-grow-1" }, [
            _c(
              "button",
              {
                staticClass:
                  "btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none",
                attrs: { type: "button", id: "kt_app_chat_toggle" }
              },
              [
                _c("span", { staticClass: "svg-icon svg-icon-lg" }, [
                  _c(
                    "svg",
                    {
                      attrs: {
                        xmlns: "http://www.w3.org/2000/svg",
                        width: "24px",
                        height: "24px",
                        viewBox: "0 0 24 24",
                        version: "1.1"
                      }
                    },
                    [
                      _c(
                        "g",
                        {
                          attrs: {
                            stroke: "none",
                            "stroke-width": "1",
                            fill: "none",
                            "fill-rule": "evenodd"
                          }
                        },
                        [
                          _c("rect", {
                            attrs: { x: "0", y: "0", width: "24", height: "24" }
                          }),
                          _vm._v(" "),
                          _c("path", {
                            attrs: {
                              d:
                                "M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z",
                              fill: "#000000",
                              opacity: "0.3"
                            }
                          }),
                          _vm._v(" "),
                          _c("path", {
                            attrs: {
                              d:
                                "M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z",
                              fill: "#000000"
                            }
                          })
                        ]
                      )
                    ]
                  )
                ])
              ]
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "text-center flex-grow-1" }, [
            _c(
              "div",
              { staticClass: "text-dark-75 font-weight-bold font-size-h5" },
              [_vm._v("Matt Pears")]
            ),
            _vm._v(" "),
            _c("div", [
              _c("span", {
                staticClass: "label label-sm label-dot label-success"
              }),
              _vm._v(" "),
              _c("span", {
                staticClass: "font-weight-bold text-muted font-size-sm",
                domProps: { textContent: _vm._s(_vm.doc_id) }
              })
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "text-right flex-grow-1" }, [
            _c("div", { staticClass: "dropdown dropdown-inline" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-clean btn-sm btn-icon btn-icon-md",
                  attrs: {
                    type: "button",
                    "data-toggle": "dropdown",
                    "aria-haspopup": "true",
                    "aria-expanded": "false"
                  }
                },
                [
                  _c("span", { staticClass: "svg-icon svg-icon-lg" }, [
                    _c(
                      "svg",
                      {
                        attrs: {
                          xmlns: "http://www.w3.org/2000/svg",
                          width: "24px",
                          height: "24px",
                          viewBox: "0 0 24 24",
                          version: "1.1"
                        }
                      },
                      [
                        _c(
                          "g",
                          {
                            attrs: {
                              stroke: "none",
                              "stroke-width": "1",
                              fill: "none",
                              "fill-rule": "evenodd"
                            }
                          },
                          [
                            _c("polygon", {
                              attrs: { points: "0 0 24 0 24 24 0 24" }
                            }),
                            _vm._v(" "),
                            _c("path", {
                              attrs: {
                                d:
                                  "M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z",
                                fill: "#000000",
                                "fill-rule": "nonzero",
                                opacity: "0.3"
                              }
                            }),
                            _vm._v(" "),
                            _c("path", {
                              attrs: {
                                d:
                                  "M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z",
                                fill: "#000000",
                                "fill-rule": "nonzero"
                              }
                            })
                          ]
                        )
                      ]
                    )
                  ])
                ]
              )
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
          _c(
            "div",
            {
              staticClass: "scroll scroll-pull ps ps--active-y",
              attrs: { "data-mobile-height": "350" }
            },
            [
              _c(
                "div",
                { staticClass: "messages scroll-y" },
                [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-sm-5" }),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-sm-4" }, [
                      _c(
                        "button",
                        {
                          staticClass:
                            "btn btn-primary btn-sm mr-2 show-more-btn",
                          class: _vm.show_more_loading
                            ? "spinner spinner-white spinner-left"
                            : "",
                          attrs: {
                            type: "button",
                            disabled: _vm.show_more_loading
                          },
                          on: { click: _vm.showMoreMessages }
                        },
                        [
                          _vm._v(
                            "\n                                    عرض المزيد\n                                "
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-sm-4" })
                  ]),
                  _vm._v(" "),
                  _vm._l(_vm.messages, function(message) {
                    return _c(
                      "div",
                      {
                        staticClass: "d-flex flex-column mb-5",
                        class:
                          message.data.from_user_id == _vm.admin.id
                            ? "align-items-start"
                            : ["align-items-end", "mr-5"]
                      },
                      [
                        message.data.from_user_id == _vm.admin.id
                          ? _c(
                              "div",
                              { staticClass: "d-flex align-items-center" },
                              [
                                _vm._m(0, true),
                                _vm._v(" "),
                                _c("div", [
                                  _c("span", {
                                    staticClass: "text-muted font-size-sm",
                                    domProps: {
                                      textContent: _vm._s(
                                        _vm.convertTimeToHuman(
                                          message.data.time
                                        )
                                      )
                                    }
                                  })
                                ])
                              ]
                            )
                          : _c(
                              "div",
                              { staticClass: "d-flex align-items-center" },
                              [
                                _c("div", [
                                  _c("span", {
                                    staticClass: "text-muted font-size-sm",
                                    domProps: {
                                      textContent: _vm._s(
                                        _vm.convertTimeToHuman(
                                          message.data.time
                                        )
                                      )
                                    }
                                  })
                                ]),
                                _vm._v(" "),
                                _vm._m(1, true)
                              ]
                            ),
                        _vm._v(" "),
                        _c("div", {
                          staticClass:
                            "mt-2 rounded p-5 bg-light-success\n                                    text-dark-50 font-weight-bold font-size-lg max-w-400px",
                          class:
                            message.data.from_user_id == _vm.admin.id
                              ? "text-left"
                              : "text-right",
                          domProps: {
                            textContent: _vm._s(message.data.content)
                          }
                        })
                      ]
                    )
                  })
                ],
                2
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "card-footer align-items-center" }, [
          _c("textarea", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.message,
                expression: "message"
              }
            ],
            staticClass: "form-control border-0 p-0",
            attrs: { rows: "2", placeholder: "Type a message" },
            domProps: { value: _vm.message },
            on: {
              keyup: function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                ) {
                  return null
                }
                return _vm.sendMessage($event)
              },
              input: function($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.message = $event.target.value
              }
            }
          }),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "d-flex align-items-center justify-content-between mt-5"
            },
            [
              _vm._m(2),
              _vm._v(" "),
              _c("div", [
                _c(
                  "button",
                  {
                    staticClass:
                      "btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6",
                    attrs: { type: "button" },
                    on: { click: _vm.sendMessage }
                  },
                  [
                    _vm._v(
                      "\n                            Send\n                        "
                    )
                  ]
                )
              ])
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "symbol symbol-circle symbol-40 mr-3" }, [
      _c("img", {
        attrs: {
          alt: "Pic",
          src:
            "http://localhost/laravel7/lara7/public/admin_assets/media/users/300_12.jpg"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "symbol symbol-circle symbol-40 ml-3" }, [
      _c("img", {
        attrs: {
          alt: "Pic",
          src:
            "http://localhost/laravel7/lara7/public/admin_assets/media/users/300_12.jpg"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mr-3" }, [
      _c(
        "a",
        {
          staticClass: "btn btn-clean btn-icon btn-md mr-1",
          attrs: { href: "#" }
        },
        [_c("i", { staticClass: "flaticon2-photograph icon-lg" })]
      ),
      _vm._v(" "),
      _c(
        "a",
        { staticClass: "btn btn-clean btn-icon btn-md", attrs: { href: "#" } },
        [_c("i", { staticClass: "flaticon2-photo-camera icon-lg" })]
      )
    ])
  }
]
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

/***/ "./resources/js/LoadComponents/admin/chat.js":
/*!***************************************************!*\
  !*** ./resources/js/LoadComponents/admin/chat.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('chat-comp', __webpack_require__(/*! ../../components/admin/chat/ChatComp.vue */ "./resources/js/components/admin/chat/ChatComp.vue")["default"]);

/***/ }),

/***/ "./resources/js/components/admin/chat/ChatComp.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/admin/chat/ChatComp.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ChatComp.vue?vue&type=template&id=3d1947c3& */ "./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3&");
/* harmony import */ var _ChatComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ChatComp.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ChatComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/chat/ChatComp.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ChatComp.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/chat/ChatComp.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatComp_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ChatComp.vue?vue&type=template&id=3d1947c3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/chat/ChatComp.vue?vue&type=template&id=3d1947c3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatComp_vue_vue_type_template_id_3d1947c3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 6:
/*!*********************************************************!*\
  !*** multi ./resources/js/LoadComponents/admin/chat.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\mazaad\resources\js\LoadComponents\admin\chat.js */"./resources/js/LoadComponents/admin/chat.js");


/***/ })

/******/ });
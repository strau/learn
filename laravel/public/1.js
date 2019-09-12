(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/App.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/App.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CrudComponent__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CrudComponent */ "./resources/js/components/CrudComponent.vue");
/* harmony import */ var _request_request__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../request/request */ "./resources/js/request/request.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 // function Crud({id, color, name}) {
//     this.id = id;
//     this.color = color;
//     this.name = name;
// }

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      cruds: []
    };
  },
  methods: {
    create: function create() {
      var _this = this;

      Object(_request_request__WEBPACK_IMPORTED_MODULE_1__["add"])().then(function (data) {
        _this.cruds.push(data.data);
      });
    },
    read: function read() {
      var _this2 = this;

      Object(_request_request__WEBPACK_IMPORTED_MODULE_1__["index"])().then(function (data) {
        _this2.cruds = data.data;
      });
    },
    update: function update(id, color) {
      var _this3 = this;

      Object(_request_request__WEBPACK_IMPORTED_MODULE_1__["modify"])({
        id: id,
        color: color
      }).then(function () {
        _this3.cruds.find(function (crud) {
          return crud.id === id;
        }).color = color;
      });
    },
    del: function del(id) {
      var _this4 = this;

      Object(_request_request__WEBPACK_IMPORTED_MODULE_1__["remove"])({
        id: id
      }).then(function () {
        var index = _this4.cruds.findIndex(function (crud) {
          return crud.id === id;
        });

        _this4.cruds.splice(index, 1);
      });
    },
    mounted: function mounted() {
      this.read();
    }
  },
  mounted: function mounted() {
    this.read();
  },
  components: {
    CrudComponent: _CrudComponent__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CrudComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/CrudComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  computed: {
    image: function image() {
      return "/images/vue/".concat(this.color, ".jpg");
    }
  },
  methods: {
    update: function update(val) {
      this.$emit('update', this.id, val.target.selectedOptions[0].value);
    },
    del: function del() {
      this.$emit('delete', this.id);
    }
  },
  props: ['id', 'color', 'name'],
  filters: {
    properCase: function properCase(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/App.vue?vue&type=template&id=332fccf4&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/App.vue?vue&type=template&id=332fccf4& ***!
  \******************************************************************************************************************************************************************************************************/
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
    { staticClass: "app" },
    [
      _c("div", { staticClass: "heading" }),
      _vm._v(" "),
      _vm._l(_vm.cruds, function(crud, index) {
        return _c(
          "CrudComponent",
          _vm._b(
            { key: crud.id, on: { update: _vm.update, delete: _vm.del } },
            "CrudComponent",
            crud,
            false
          )
        )
      }),
      _vm._v(" "),
      _c("div", [
        _c(
          "button",
          {
            on: {
              click: function($event) {
                return _vm.create()
              }
            }
          },
          [_vm._v("+")]
        )
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84& ***!
  \****************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "crud" }, [
    _c("div", { staticClass: "col-1" }, [
      _c("img", { attrs: { src: _vm.image, width: "200" } })
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "col-2" }, [
      _c("h3", [_vm._v("Name: " + _vm._s(_vm._f("properCase")(_vm.name)))]),
      _vm._v(" "),
      _c(
        "select",
        { on: { change: _vm.update } },
        _vm._l(["red", "green"], function(col) {
          return _c(
            "option",
            {
              key: col,
              domProps: {
                value: col,
                selected: col === _vm.color ? "selected" : ""
              }
            },
            [
              _vm._v(
                "\n                " +
                  _vm._s(_vm._f("properCase")(col)) +
                  "\n            "
              )
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _c("button", { on: { click: _vm.del } }, [_vm._v("Delete")])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/App.vue":
/*!*****************************************!*\
  !*** ./resources/js/components/App.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./App.vue?vue&type=template&id=332fccf4& */ "./resources/js/components/App.vue?vue&type=template&id=332fccf4&");
/* harmony import */ var _App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./App.vue?vue&type=script&lang=js& */ "./resources/js/components/App.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/App.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/App.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/components/App.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./App.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/App.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/App.vue?vue&type=template&id=332fccf4&":
/*!************************************************************************!*\
  !*** ./resources/js/components/App.vue?vue&type=template&id=332fccf4& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./App.vue?vue&type=template&id=332fccf4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/App.vue?vue&type=template&id=332fccf4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_App_vue_vue_type_template_id_332fccf4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/CrudComponent.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/CrudComponent.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CrudComponent.vue?vue&type=template&id=768f9b84& */ "./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84&");
/* harmony import */ var _CrudComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CrudComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/CrudComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CrudComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/CrudComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/CrudComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/CrudComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CrudComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./CrudComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CrudComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CrudComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./CrudComponent.vue?vue&type=template&id=768f9b84& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CrudComponent.vue?vue&type=template&id=768f9b84&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CrudComponent_vue_vue_type_template_id_768f9b84___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/request/request.js":
/*!*****************************************!*\
  !*** ./resources/js/request/request.js ***!
  \*****************************************/
/*! exports provided: index, add, modify, remove */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "index", function() { return index; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "add", function() { return add; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "modify", function() { return modify; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "remove", function() { return remove; });
/* harmony import */ var qs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! qs */ "./node_modules/qs/lib/index.js");
/* harmony import */ var qs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(qs__WEBPACK_IMPORTED_MODULE_0__);
 // import axios from "axios";

var DOMAIN = '/';
window.axios.defaults.timeout = 7000; //

function index(json) {
  // return axios.post(DOMAIN+'login', Qs.stringify(json), {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
  return window.axios.get(DOMAIN + 'api/cruds');
}
function add(json) {
  return window.axios.get(DOMAIN + 'api/cruds/create');
}
function modify(json) {
  return window.axios.put(DOMAIN + 'api/cruds/' + json.id + '/?' + qs__WEBPACK_IMPORTED_MODULE_0___default.a.stringify(json));
}
function remove(json) {
  return window.axios["delete"](DOMAIN + 'api/cruds/' + json.id + '/?' + qs__WEBPACK_IMPORTED_MODULE_0___default.a.stringify(json));
}

/***/ })

}]);
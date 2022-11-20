"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_frontend_components_sonodVerify_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      row: {}
    };
  },
  methods: {
    sonodVerifiy: function sonodVerifiy() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var id, res;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                id = _this.$route.params.id;
                _context.next = 3;
                return _this.callApi('get', "/api/sonod/single/".concat(id), []);

              case 3:
                res = _context.sent;
                console.log(res);
                _this.row = res.data;

              case 6:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    }
  },
  mounted: function mounted() {
    this.sonodVerifiy();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "container my-4"
  }, [_c("div", {
    staticClass: "container"
  }, [_c("div", {
    staticClass: "row justify-content-center py-8 px-8 py-md-27 px-md-0"
  }, [_c("div", {
    staticClass: "col-md-12 p-sm-0"
  }, [_c("div", {
    staticClass: "d-flex justify-content-between"
  }, [_c("div", {
    staticClass: "col-md-12 p-sm-0"
  }, [_c("div", {
    staticClass: "text-right mb-2 no-print"
  }, [_vm.row.payment_status == "Paid" ? _c("a", {
    staticClass: "btn btn-sm btn-success",
    attrs: {
      href: "/sonod/d/" + _vm.row.id,
      target: "_blank"
    }
  }, [_vm._v("Download")]) : _vm._e(), _vm._v(" "), _vm.row.payment_status == "Unpaid" ? _c("a", {
    staticClass: "btn btn-sm btn-success",
    attrs: {
      href: "/sonod/d/" + _vm.row.id,
      target: "_blank"
    }
  }, [_vm._v("Pay")]) : _vm._e()]), _vm._v(" "), _c("div", {
    staticClass: "border"
  }, [_c("div", {
    staticClass: "row m-0 mt-2"
  }, [_c("div", {
    staticClass: "logo-img col-md-3 col-sm-12 text-right hide-mobile"
  }, [_c("img", {
    attrs: {
      src: _vm.$asseturl + "assets/img/bd-logo.png"
    }
  })]), _vm._v(" "), _vm._m(0), _vm._v(" "), _c("div", {
    staticClass: "header-right-logo col-md-3 col-sm-12 text-left hide-mobile"
  }, [_c("img", {
    attrs: {
      src: _vm.$asseturl + "assets/img/mujib100.75b35add.png"
    }
  })])]), _vm._v(" "), _c("div", {
    staticClass: "verification-sec text-center mt-2 mb-2"
  }, [_c("h2", [_vm._v("Verification Successful !")]), _vm._v(" "), _vm.row.payment_status == "Paid" ? _c("h2", [_vm._v("This Certificate is Valid.")]) : _vm._e(), _vm._v(" "), _vm.row.payment_status == "Unpaid" ? _c("h2", {
    staticStyle: {
      color: "red"
    }
  }, [_vm._v("This Certificate is Unpaid.")]) : _vm._e()])]), _vm._v(" "), _c("div", [_c("div", {
    staticClass: "row m-0"
  }, [_c("div", {
    staticClass: "col-md-5 p-0"
  }, [_vm._m(1), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(2), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                " + _vm._s(_vm.row.sonod_Id) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(3), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                 " + _vm._s(_vm.row.applicant_national_id_number) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(4), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                " + _vm._s(_vm.row.applicant_passport_number) + " " + _vm._s(_vm.row.applicant_birth_certificate_number) + "\n                                            ")])])]), _vm._v(" "), _vm._m(5), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(6), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                " + _vm._s(_vm.row.applicant_name) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(7), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                " + _vm._s(_vm.row.applicant_date_of_birth) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(8), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                  " + _vm._s(_vm.row.applicant_gender) + "\n                                            ")])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-7 p-0"
  }, [_vm._m(9), _vm._v(" "), _vm._m(10), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(11), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                 " + _vm._s(_vm.row.sonod_name) + "\n                                            ")])])]), _vm._v(" "), _vm._m(12), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(13), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                  " + _vm._s(_vm.row.payment_status) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(14), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                  " + _vm._s(_vm.row.unioun_name) + "\n                                            ")])])]), _vm._v(" "), _c("div", {
    staticClass: "row m-0"
  }, [_vm._m(15), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                  " + _vm._s(_vm.row.unioun_name) + "\n                                            ")])])]), _vm._v(" "), _vm._m(16)])])]), _vm._v(" "), _vm._m(17), _vm._v(" "), _vm._m(18), _vm._v(" "), _c("div", {
    staticClass: "credit-Logo text-center p-2 mb-3 footer-cert-verify-img border"
  }, [_c("img", {
    attrs: {
      src: _vm.$asseturl + "assets/img/bnict.jpeg",
      alt: "ict logo"
    }
  })])])])])])])]);
};

var staticRenderFns = [function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "header-text col-md-6 col-sm-12 text-center"
  }, [_c("p", [_vm._v("Government of the People's Republic of Bangladesh")]), _vm._v(" "), _c("p", [_vm._v("Local Government Division")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "beneficiary text-center p-2"
  }, [_c("h3", [_vm._v("Beneficiary Details (সনদ গ্রহণকারীর বিবরণ)")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Certificate No:"), _c("br"), _vm._v("সার্টিফিকেট নং:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                NID Number:"), _c("br"), _vm._v("জাতীয় পরিচয়পত্র নং:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Passport/Birth Registration:"), _c("br"), _vm._v("পাসপোর্ট/জন্ম নিবন্ধন:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "row m-0"
  }, [_c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Country/Nationality:"), _c("br"), _vm._v("দেশ/জাতীয়তা:\n                                            ")])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                Bangladeshi\n                                            ")])])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Name:"), _c("br"), _vm._v("নাম:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Date of Birth:"), _c("br"), _vm._v("জন্ম তারিখ:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Gender:"), _c("br"), _vm._v("লিঙ্গ:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "beneficiary text-center p-2"
  }, [_c("h3", [_vm._v("Certificate Details (সনদ প্রদানের বিবরণ)")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "row m-0"
  }, [_c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Date of Certificate Issue):"), _c("br"), _vm._v("সনদ প্রদানের\n                                                তারিখ :\n                                            ")])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                11-10-2021\n                                            ")])])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Name of Certificate:"), _c("br"), _vm._v("সনদের নাম:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "row m-0"
  }, [_c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Date of Certificate Renew:"), _c("br"), _vm._v("সনদ নবায়নের তারিখ:\n                                            ")])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                14-11-2021\n                                            ")])])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Payment Status:"), _c("br"), _vm._v("লেনদেনের অবস্থা:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Certification Union:"), _c("br"), _vm._v("সনদ প্রদানের ইউনিয়ন:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Certifier By:"), _c("br"), _vm._v("সনদ প্রদানকারী:\n                                            ")])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "row m-0"
  }, [_c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-right cert-verify-content-div"
  }, [_vm._v("\n                                                Total Certificate Given:"), _c("br"), _vm._v("মোট সনদ সংখ্যা:\n                                            ")])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 border-dash"
  }, [_c("div", {
    staticClass: "beneficiary-details-left cert-verify-content-div"
  }, [_vm._v("\n                                                3\n                                            ")])])]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "p-2 text-center border"
  }, [_vm._v("\n                            For any further assistance, please visit www.dghs.gov.bd or\n                            e-mail: info@dghs.gov.bd "), _c("br"), _vm._v("(প্রয়োজনে www.dghs.gov.bd ওয়েব\n                            সাইটে ভিজিট করুন অথবা ইমেইল করুনঃ info@dghs.gov.bd)\n                        ")]);
}, function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "beneficiary text-center p-2"
  }, [_c("h3", [_vm._v("In Cooperation With")])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js */ "./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.border-dash {\r\n  border: 1px dashed #dee2e6;\n}\n.logo-img img {\r\n  width: 70px;\n}\n.header-right-logo img {\r\n  width: 100px;\n}\n.header-text {\r\n  font-size: 16px;\r\n  line-height: 70px;\n}\n.header-text p:first-child {\r\n  font-weight: 500;\r\n  line-height: 18px;\r\n  margin-bottom: 0px;\r\n  margin-top: 18px;\n}\n.header-text p:last-child {\r\n  line-height: 18px;\n}\n.verification-sec h2:first-child {\r\n  font-size: 30px;\r\n  color: green;\r\n  font-weight: bold;\n}\n.verification-sec h2:last-child {\r\n  font-size: 22px;\r\n  color: green;\r\n  font-weight: 350;\n}\n.beneficiary {\r\n  background-color: #eeeeee;\r\n  border: 1px solid #dee2e6;\n}\n.beneficiary h3 {\r\n  text-align: center;\r\n  font-size: 14px;\r\n  font-weight: bold;\n}\n.beneficiary-details-right {\r\n  font-size: 13px;\r\n  text-align: right;\r\n  padding: 5px;\r\n  overflow-wrap: break-word;\n}\n.beneficiary-details-left {\r\n  font-size: 13px;\r\n  text-align: left;\r\n  padding: 5px;\r\n  overflow-wrap: break-word;\n}\n.lower-does-1 h3 {\r\n  font-size: 13px;\r\n  text-align: right;\r\n  padding: 5px;\r\n  font-weight: bold;\n}\n.lower-does-2 h3 {\r\n  font-size: 13px;\r\n  text-align: center;\r\n  padding: 5px;\r\n  font-weight: bold;\n}\n.lower-does-3 h3 {\r\n  font-size: 13px;\r\n  text-align: left;\r\n  padding: 5px;\r\n  font-weight: bold;\n}\n.lower-does-part-1 h3 {\r\n  font-size: 13px;\r\n  text-align: right;\r\n  padding: 5px;\r\n  overflow-wrap: break-word;\r\n  text-transform: capitalize;\n}\n.lower-does-part-2 h3 {\r\n  font-size: 13px;\r\n  text-align: center;\r\n  padding: 5px;\r\n  overflow-wrap: break-word;\n}\n.lower-does-part-3 h3 {\r\n  font-size: 13px;\r\n  text-align: left;\r\n  padding: 5px;\r\n  overflow-wrap: break-word;\n}\n.credit-Logo img {\r\n  max-width: 80%;\n}\r\n\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_style_index_0_id_35cebf56_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_style_index_0_id_35cebf56_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_style_index_0_id_35cebf56_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/frontend/components/sonodVerify.vue":
/*!**********************************************************!*\
  !*** ./resources/js/frontend/components/sonodVerify.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sonodVerify.vue?vue&type=template&id=35cebf56& */ "./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56&");
/* harmony import */ var _sonodVerify_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sonodVerify.vue?vue&type=script&lang=js& */ "./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js&");
/* harmony import */ var _sonodVerify_vue_vue_type_style_index_0_id_35cebf56_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& */ "./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _sonodVerify_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__.render,
  _sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/frontend/components/sonodVerify.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./sonodVerify.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_template_id_35cebf56___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./sonodVerify.vue?vue&type=template&id=35cebf56& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=template&id=35cebf56&");


/***/ }),

/***/ "./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&":
/*!*******************************************************************************************************!*\
  !*** ./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& ***!
  \*******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_sonodVerify_vue_vue_type_style_index_0_id_35cebf56_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/sonodVerify.vue?vue&type=style&index=0&id=35cebf56&lang=css&");


/***/ })

}]);
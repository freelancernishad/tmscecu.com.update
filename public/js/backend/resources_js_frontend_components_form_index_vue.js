"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_frontend_components_form_index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuelidate__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vuelidate */ "./node_modules/vuelidate/lib/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var _input_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./input.vue */ "./resources/js/frontend/components/form/input.vue");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

 // import { setTimeout } from "timers";




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  mixins: [vuelidate__WEBPACK_IMPORTED_MODULE_2__.validationMixin],
  components: {
    Datepick: _input_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      infoModal: {
        id: 'info-modal',
        title: '',
        content: '',
        content_id: ''
      },
      waitForPayment: false,
      submitLoad: false,
      sameStatus: '',
      sonodnamedata: {},
      SonodNamesOptions: {},
      applicant_religions: [{
        value: null,
        text: 'ধর্ম নির্বাচন করুন'
      }, {
        value: 'ইসলাম',
        text: 'ইসলাম'
      }, {
        value: 'হিন্দু',
        text: 'হিন্দু'
      }, {
        value: 'বৌদ্ধ',
        text: 'বৌদ্ধ'
      }, {
        value: 'খ্রিস্টান',
        text: 'খ্রিস্টান'
      }, {
        value: 'অন্যান্য',
        text: 'অন্যান্য'
      }],
      applicant_genders: [{
        value: null,
        text: 'লিঙ্গ নির্বাচন করুন'
      }, {
        value: 'পুরুষ',
        text: 'পুরুষ'
      }, {
        value: 'মহিলা',
        text: 'মহিলা'
      }],
      applicant_marriage_status_options: [{
        value: null,
        text: 'বৈবাহিক সম্পর্ক নির্বাচন করুন'
      }, {
        value: 'বিবাহিত',
        text: 'বিবাহিত'
      }, {
        value: 'অবিবাহিত',
        text: 'অবিবাহিত'
      }, {
        value: 'তালাক প্রাপ্ত',
        text: 'তালাক প্রাপ্ত'
      }, {
        value: 'বিধবা',
        text: 'বিধবা'
      }, {
        value: 'অন্যান্য',
        text: 'অন্যান্য'
      }],
      applicant_resident_status_options: [{
        value: null,
        text: 'বাসিন্দা নির্বাচন করুন'
      }, {
        value: 'স্থায়ী',
        text: 'স্থায়ী'
      }, {
        value: 'অস্থায়ী',
        text: 'অস্থায়ী'
      }],
      foods: [{
        value: null,
        text: "Choose..."
      }, {
        value: "apple",
        text: "Apple"
      }, {
        value: "orange",
        text: "Orange"
      }],
      alives: [{
        value: null,
        text: "Choose..."
      }, {
        value: "হ্যাঁ",
        text: "হ্যাঁ"
      }, {
        value: "না",
        text: "না"
      }],
      applicant_owner_typees: [{
        value: null,
        text: "Choose..."
      }, {
        value: "ব্যক্তি মালিকানাধীন",
        text: "ব্যক্তি মালিকানাধীন"
      }, {
        value: "যৌথ মালিকানা",
        text: "যৌথ মালিকানা"
      }, {
        value: "কোম্পানী",
        text: "কোম্পানী"
      }],
      form: {
        image: null,
        sonod_Id: '',
        unioun_name: null,
        year: null,
        sonod_name: null,
        applicant_holding_tax_number: null,
        applicant_national_id_number: null,
        applicant_birth_certificate_number: null,
        applicant_passport_number: null,
        applicant_date_of_birth: null,
        applicant_name: null,
        applicant_name_of_the_organization: null,
        applicant_gender: null,
        applicant_marriage_status: null,
        applicant_father_name: null,
        applicant_mother_name: null,
        applicant_occupation: null,
        applicant_education: null,
        applicant_religion: null,
        applicant_resident_status: null,
        applicant_owner_type: null,
        applicant_vat_id_number: null,
        applicant_tax_id_number: null,
        applicant_type_of_business: null,
        successor_father_alive_status: null,
        successor_mother_alive_status: null,
        utname: null,
        //////////////////////////////////////////////
        // বর্তমান ঠিকানা
        applicant_present_village: null,
        applicant_present_road_block_sector: null,
        applicant_present_word_number: null,
        applicant_present_district: null,
        applicant_present_Upazila: null,
        applicant_present_post_office: null,
        //////////////////////////////////////////////
        // স্থায়ী ঠিকানা
        applicant_permanent_village: null,
        applicant_permanent_road_block_sector: null,
        applicant_permanent_word_number: null,
        applicant_permanent_district: null,
        applicant_permanent_Upazila: null,
        applicant_permanent_post_office: null,
        //////////////////////////////////////////////
        // যোগাযোগের ঠিকানা
        applicant_mobile: null,
        applicant_email: null,
        //////////////////////////////////////////////
        // Attachment
        applicant_national_id_front_attachment: null,
        applicant_national_id_back_attachment: null,
        applicant_birth_certificate_attachment: null,
        stutus: 'Pending',
        payment_status: 'Unpaid',
        successors: [{
          w_id: "",
          w_name: "",
          w_relation: "",
          w_age: "",
          w_nid: ""
        }]
      }
    };
  },
  validations: {
    form: {
      image: {},
      sonod_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      utname: {// required
      },
      applicant_type_of_business: {// required
      },
      applicant_date_of_birth: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_name_of_the_organization: {// required
      },
      applicant_gender: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_marriage_status: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_father_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_mother_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_religion: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_resident_status: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_mobile: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_3__.required
      },
      applicant_holding_tax_number: {},
      applicant_national_id_number: {//  maxLength: maxLength(5)
      },
      applicant_birth_certificate_number: {},
      applicant_passport_number: {},
      applicant_occupation: {},
      applicant_education: {},
      applicant_owner_type: {},
      applicant_vat_id_number: {},
      applicant_tax_id_number: {},
      successor_father_alive_status: {},
      successor_mother_alive_status: {},
      //////////////////////////////////////////////
      // বর্তমান ঠিকানা
      applicant_present_village: {},
      applicant_present_road_block_sector: {},
      applicant_present_word_number: {},
      applicant_present_district: {},
      applicant_present_Upazila: {},
      applicant_present_post_office: {},
      //////////////////////////////////////////////
      // স্থায়ী ঠিকানা
      applicant_permanent_village: {},
      applicant_permanent_road_block_sector: {},
      applicant_permanent_word_number: {},
      applicant_permanent_district: {},
      applicant_permanent_Upazila: {},
      applicant_permanent_post_office: {},
      //////////////////////////////////////////////
      // যোগাযোগের ঠিকানা
      applicant_email: {},
      //////////////////////////////////////////////
      // Attachment
      applicant_national_id_front_attachment: {},
      applicant_national_id_back_attachment: {},
      applicant_birth_certificate_attachment: {}
    }
  },
  watch: {
    '$route': {
      handler: function handler(newValue, oldValue) {
        var _this = this;

        this.form.year = new Date().getFullYear();
        this.sonodname();
        setTimeout(function () {
          _this.form.sonod_name = _this.sonodnamedata.bnname; // console.log(this.getUnion)
          //    var res =  axios({method: 'get',url: `/api/sonod/sonod_Id?union=${this.getUnion}`,data: []})

          axios__WEBPACK_IMPORTED_MODULE_0___default().get("/api/sonod/sonod_Id?union=".concat(_this.getUnion)).then(function (response) {
            //   console.log(response.data)
            _this.form.sonod_Id = "".concat(response.data);
          });
        }, 3000);
      },
      deep: true
    }
  },
  //   updated() {
  //       console.log('ss');
  //     },
  methods: {
    FileSelected: function FileSelected($event, parent_index) {
      var _this2 = this;

      var file = $event.target.files[0];

      if (file.size > 5048576) {
        Notification.image_validation();
      } else {
        var reader = new FileReader();

        reader.onload = function (event) {
          _this2.form[parent_index] = event.target.result; // console.log(event.target.result);
        };

        reader.readAsDataURL(file);
      } //   console.log($event.target.result);

    },
    portKeydown: function portKeydown(e) {
      if (/^\+$/.test(e.key)) {
        e.preventDefault();
      }
    },
    addMore: function addMore() {
      this.form.successors.push({
        w_name: "",
        w_relation: "",
        w_age: "",
        w_nid: ""
      });
    },
    remove: function remove(index) {
      this.form.successors.splice(index, 1);
    },
    validateState: function validateState(name) {
      var _this$$v$form$name = this.$v.form[name],
          $dirty = _this$$v$form$name.$dirty,
          $error = _this$$v$form$name.$error; // console.log($error)

      return $dirty ? !$error : null;
    },
    resetForm: function resetForm() {
      var _this3 = this;

      this.form.image = null;
      this.form.applicant_holding_tax_number = null;
      this.form.applicant_national_id_number = null;
      this.form.applicant_birth_certificate_number = null;
      this.form.applicant_passport_number = null;
      this.form.applicant_date_of_birth = null;
      this.form.applicant_name = null;
      this.form.applicant_gender = null;
      this.form.applicant_marriage_status = null;
      this.form.applicant_father_name = null;
      this.form.applicant_mother_name = null;
      this.form.applicant_occupation = null;
      this.form.applicant_education = null;
      this.form.applicant_religion = null;
      this.form.applicant_resident_status = null; ////////////////////////////////////////////// =               this.for;.// =বর্তমান ঠিকানা

      this.form.applicant_present_village = null;
      this.form.applicant_present_road_block_sector = null;
      this.form.applicant_present_word_number = null;
      this.form.applicant_present_district = null;
      this.form.applicant_present_Upazila = null;
      this.form.applicant_present_post_office = null; ////////////////////////////////////////////// =               this.for;.// =স্থায়ী ঠিকানা

      this.form.applicant_permanent_village = null;
      this.form.applicant_permanent_road_block_sector = null;
      this.form.applicant_permanent_word_number = null;
      this.form.applicant_permanent_district = null;
      this.form.applicant_permanent_Upazila = null;
      this.form.applicant_permanent_post_office = null; ////////////////////////////////////////////// =               this.for;.// =যোগাযোগের ঠিকানা

      this.form.applicant_mobile = null;
      this.form.applicant_email = null; ////////////////////////////////////////////// =               this.for;.// =Attachment

      this.form.applicant_national_id_front_attachment = null;
      this.form.applicant_national_id_back_attachment = null;
      this.form.applicant_birth_certificate_attachment = null;
      this.$nextTick(function () {
        _this3.$v.$reset();
      });
    },
    sameAddress: function sameAddress() {
      // console.log(value)
      if (this.sameStatus) {
        this.form.applicant_permanent_village = this.form.applicant_present_village;
        this.form.applicant_permanent_road_block_sector = this.form.applicant_present_road_block_sector;
        this.form.applicant_permanent_word_number = this.form.applicant_present_word_number;
        this.form.applicant_permanent_district = this.form.applicant_present_district;
        this.form.applicant_permanent_Upazila = this.form.applicant_present_Upazila;
        this.form.applicant_permanent_post_office = this.form.applicant_present_post_office;
      } else {
        this.form.applicant_permanent_village = null;
        this.form.applicant_permanent_road_block_sector = null;
        this.form.applicant_permanent_word_number = null;
        this.form.applicant_permanent_district = null;
        this.form.applicant_permanent_Upazila = null;
        this.form.applicant_permanent_post_office = null;
      }
    },
    sonodname: function sonodname() {
      var _this4 = this;

      if (this.$route.params.name) {
        axios__WEBPACK_IMPORTED_MODULE_0___default().get("/api/get/sonodname/list?data=".concat(this.$route.params.name.replaceAll('_', ' '))).then(function (_ref) {
          var data = _ref.data;
          _this4.sonodnamedata = data;
        })["catch"]();
      }
    },
    resetInfoModal: function resetInfoModal() {
      this.infoModal.title = '';
      this.infoModal.content = '';
    },
    onSubmit: function onSubmit() {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this5.$v.form.$touch();

                if (!_this5.$v.form.$anyError) {
                  _context.next = 3;
                  break;
                }

                return _context.abrupt("return");

              case 3:
                _this5.$root.$emit('bv::show::modal', _this5.infoModal.id);

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    finalSubmit: function finalSubmit() {
      var _this6 = this;

      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
        var redirect, payment_type, res, datas;
        return _regeneratorRuntime().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this6.submitLoad = true;
                payment_type = _this6.getunionInfos.payment_type;

                if (payment_type == 'Prepaid') {
                  _this6.form.stutus = 'Prepaid';
                } else if (payment_type == 'Postpaid') {
                  _this6.form.stutus = 'Pending';
                }

                _context2.next = 5;
                return _this6.callApi('post', '/api/sonod/submit', _this6.form);

              case 5:
                res = _context2.sent;
                datas = res.data; // this.$router.push({ name: 'home' })

                if (payment_type == 'Prepaid') {
                  redirect = "/sonod/payment/".concat(datas.id);
                  _this6.waitForPayment = true;

                  _this6.checkPayment(datas.id);

                  window.open(redirect, '_blank');
                } else if (payment_type == 'Postpaid') {
                  _this6.waitForPayment = true;

                  _this6.checkPayment(datas.id); //  console.log(this.waitForPayment)
                  // redirect = '/document/' + datas.sonod_name + '/' + datas.id;
                  // window.open(redirect, '_blank');

                }

              case 8:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    checkPayment: function checkPayment(id) {
      var _this7 = this;

      var redirect;
      setInterval(function () {
        if (_this7.waitForPayment) {
          axios__WEBPACK_IMPORTED_MODULE_0___default().get("/api/sonod/single/".concat(id)).then(function (res) {
            var payment_type = _this7.getunionInfos.payment_type;

            if (payment_type == 'Prepaid') {
              if (res.data.stutus == 'Pending' && res.data.payment_status == 'Paid') {
                _this7.waitForPayment = false; // console.log(this.waitForPayment)

                Swal.fire({
                  title: 'Success',
                  text: "\u09B8\u09A8\u09A6\u09C7\u09B0 \u09AB\u09BF \u09B8\u09AB\u09B2\u09AD\u09BE\u09AC\u09C7 \u09AA\u09CD\u09B0\u09A6\u09BE\u09A8 \u09B9\u09DF\u09C7\u099B\u09C7",
                  icon: 'success',
                  confirmButtonColor: 'green',
                  confirmButtonText: "\u0986\u09AC\u09C7\u09A6\u09A8 \u09AA\u09A4\u09CD\u09B0 \u09A1\u09BE\u0989\u09A8\u09B2\u09CB\u09A1 \u0995\u09B0\u09C1\u09A8"
                }).then( /*#__PURE__*/function () {
                  var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3(result) {
                    return _regeneratorRuntime().wrap(function _callee3$(_context3) {
                      while (1) {
                        switch (_context3.prev = _context3.next) {
                          case 0:
                            if (result.isConfirmed) {
                              _this7.$root.$emit('bv::hide::modal', 'info-modal');

                              redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                              window.open(redirect, '_blank');

                              _this7.$router.push({
                                name: 'home'
                              });
                            }

                          case 1:
                          case "end":
                            return _context3.stop();
                        }
                      }
                    }, _callee3);
                  }));

                  return function (_x) {
                    return _ref2.apply(this, arguments);
                  };
                }());
              }
            } else if (payment_type == 'Postpaid') {
              if (res.data.stutus == 'Pending') {
                _this7.waitForPayment = false;
                Swal.fire({
                  title: 'Success',
                  text: "\u0986\u09AA\u09A8\u09BE\u09B0 \u09B8\u09A8\u09A6\u099F\u09BF \u09B8\u09AB\u09B2\u09AD\u09BE\u09AC\u09C7 \u09B8\u09BE\u09AC\u09AE\u09BF\u099F \u09B9\u09DF\u09C7\u099B\u09C7",
                  icon: 'success',
                  confirmButtonColor: 'green',
                  confirmButtonText: "\u0986\u09AC\u09C7\u09A6\u09A8 \u09AA\u09A4\u09CD\u09B0 \u09A1\u09BE\u0989\u09A8\u09B2\u09CB\u09A1 \u0995\u09B0\u09C1\u09A8"
                }).then( /*#__PURE__*/function () {
                  var _ref3 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4(result) {
                    return _regeneratorRuntime().wrap(function _callee4$(_context4) {
                      while (1) {
                        switch (_context4.prev = _context4.next) {
                          case 0:
                            if (result.isConfirmed) {
                              // this.$root.$emit('bv::hide::modal', this.infoModal.id)
                              _this7.$root.$emit('bv::hide::modal', 'info-modal');

                              redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                              window.open(redirect, '_blank');

                              _this7.$router.push({
                                name: 'home'
                              });
                            }

                          case 1:
                          case "end":
                            return _context4.stop();
                        }
                      }
                    }, _callee4);
                  }));

                  return function (_x2) {
                    return _ref3.apply(this, arguments);
                  };
                }());
              }
            } // console.log(res)

          });
        }
      }, 3000);
    }
  },
  mounted: function mounted() {
    var _this8 = this;

    // if(localStorage.getItem('form')){
    //     this.form = JSON.parse(localStorage.getItem('form'))
    // }
    this.form.year = new Date().getFullYear();
    this.sonodname();
    setTimeout(function () {
      _this8.form.sonod_name = _this8.sonodnamedata.bnname; // console.log(this.getUnion)
      //    var res =  axios({method: 'get',url: `/api/sonod/sonod_Id?union=${this.getUnion}`,data: []})

      axios__WEBPACK_IMPORTED_MODULE_0___default().get("/api/sonod/sonod_Id?union=".concat(_this8.getUnion)).then(function (response) {
        //   console.log(response.data)
        _this8.form.sonod_Id = "".concat(response.data);
      });
    }, 3000);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['value', 'required'],
  computed: {
    splitdate: function splitdate() {
      var splitValue = this.value.split('/');
      return {
        day: splitValue[0],
        month: splitValue[1],
        year: splitValue[2]
      };
    }
  },
  methods: {
    updateDate: function updateDate() {
      this.$emit("input", "".concat(this.$refs.dayPicker.value, "/").concat(this.$refs.monthPicker.value, "/").concat(this.$refs.yearPicker.value));
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", [_c("b-form", {
    on: {
      submit: function submit($event) {
        $event.stopPropagation();
        $event.preventDefault();
        return _vm.onSubmit.apply(null, arguments);
      }
    }
  }, [_c("div", {
    staticClass: "panel-heading",
    staticStyle: {
      "font-weight": "bold",
      "font-size": "15px",
      background: "#159513",
      "text-align": "center",
      color: "white"
    }
  }, [_vm._v(_vm._s(_vm.sonodnamedata.bnname) + "\n        ")]), _vm._v(" "), _c("div", {
    staticClass: "form-pannel"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.unioun_name = _vm.getUnion,
      expression: "form.unioun_name = getUnion"
    }],
    attrs: {
      type: "hidden"
    },
    domProps: {
      value: _vm.form.unioun_name = _vm.getUnion
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;

        _vm.$set(_vm.form, "unioun_name = getUnion", $event.target.value);
      }
    }
  }), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("আবেদনকারীর তথ্য")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_name-group-1",
      label: "আবেদনকারীর নাম*",
      "label-for": "applicant_name"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_name",
      name: "applicant_name",
      state: _vm.validateState("applicant_name"),
      "aria-describedby": "applicant_name-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_name.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_name, "$model", $$v);
      },
      expression: "$v.form.applicant_name.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_name-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_gender-group-1",
      label: "লিঙ্গ",
      "label-for": "applicant_gender"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "applicant_gender",
      name: "applicant_gender",
      options: _vm.applicant_genders,
      state: _vm.validateState("applicant_gender"),
      "aria-describedby": "applicant_gender-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_gender.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_gender, "$model", $$v);
      },
      expression: "$v.form.applicant_gender.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_gender-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_father_name-group-1",
      label: "আবেদনকারীর পিতা/স্বামীর নাম (বাংলায়)",
      "label-for": "applicant_father_name"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_father_name",
      name: "applicant_father_name",
      state: _vm.validateState("applicant_father_name"),
      "aria-describedby": "applicant_father_name-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_father_name.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_father_name, "$model", $$v);
      },
      expression: "$v.form.applicant_father_name.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_father_name-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "successor_father_alive_status-group-1",
      label: " আবেদনকারীর পিতা জীবিত কিনা",
      "label-for": "successor_father_alive_status"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "successor_father_alive_status",
      name: "successor_father_alive_status",
      options: _vm.alives,
      state: _vm.validateState("successor_father_alive_status"),
      "aria-describedby": "successor_father_alive_status-feedback"
    },
    model: {
      value: _vm.$v.form.successor_father_alive_status.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.successor_father_alive_status, "$model", $$v);
      },
      expression: "$v.form.successor_father_alive_status.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "successor_father_alive_status-feedback"
    }
  }, [_vm._v("This is a required\n                            field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_mother_name-group-1",
      label: "আবেদনকারীর মাতার নাম (বাংলায়)",
      "label-for": "applicant_mother_name"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_mother_name",
      name: "applicant_mother_name",
      state: _vm.validateState("applicant_mother_name"),
      "aria-describedby": "applicant_mother_name-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_mother_name.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_mother_name, "$model", $$v);
      },
      expression: "$v.form.applicant_mother_name.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_mother_name-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "successor_mother_alive_status-group-1",
      label: "আবেদনকারীর মাতা জীবিত কিনা",
      "label-for": "successor_mother_alive_status"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "successor_mother_alive_status",
      name: "successor_mother_alive_status",
      options: _vm.alives,
      state: _vm.validateState("successor_mother_alive_status"),
      "aria-describedby": "successor_mother_alive_status-feedback"
    },
    model: {
      value: _vm.$v.form.successor_mother_alive_status.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.successor_mother_alive_status, "$model", $$v);
      },
      expression: "$v.form.successor_mother_alive_status.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "successor_mother_alive_status-feedback"
    }
  }, [_vm._v("This is a required\n                            field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_national_id_number-group-1",
      label: "ন্যাশনাল আইডি (ইংরেজিতে)",
      "label-for": "applicant_national_id_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_national_id_number",
      type: "number",
      name: "applicant_national_id_number",
      state: _vm.validateState("applicant_national_id_number"),
      "aria-describedby": "applicant_national_id_number-feedback"
    },
    on: {
      keydown: function keydown($event) {
        return _vm.portKeydown($event);
      }
    },
    model: {
      value: _vm.$v.form.applicant_national_id_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_national_id_number, "$model", $$v);
      },
      expression: "$v.form.applicant_national_id_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_national_id_number-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_birth_certificate_number-group-1",
      label: "জন্ম নিবন্ধন নং ( ইংরেজিতে )",
      "label-for": "applicant_birth_certificate_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_birth_certificate_number",
      type: "number",
      name: "applicant_birth_certificate_number",
      state: _vm.validateState("applicant_birth_certificate_number"),
      "aria-describedby": "applicant_birth_certificate_number-feedback"
    },
    on: {
      keydown: function keydown($event) {
        return _vm.portKeydown($event);
      }
    },
    model: {
      value: _vm.$v.form.applicant_birth_certificate_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_birth_certificate_number, "$model", $$v);
      },
      expression: "$v.form.applicant_birth_certificate_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_birth_certificate_number-feedback"
    }
  }, [_vm._v("This is a required\n                            field")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_holding_tax_number-group-1",
      label: "হোল্ডিং নং (ইংরেজিতে)",
      "label-for": "applicant_holding_tax_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_holding_tax_number",
      name: "applicant_holding_tax_number",
      type: "number",
      state: _vm.validateState("applicant_holding_tax_number"),
      "aria-describedby": "applicant_holding_tax_number-feedback"
    },
    on: {
      keydown: function keydown($event) {
        return _vm.portKeydown($event);
      }
    },
    model: {
      value: _vm.$v.form.applicant_holding_tax_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_holding_tax_number, "$model", $$v);
      },
      expression: "$v.form.applicant_holding_tax_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_holding_tax_number-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_date_of_birth-group-1",
      label: "জম্ম তারিখ",
      "label-for": "applicant_date_of_birth"
    }
  }, [_c("b-input-group", [_c("b-form-input", {
    attrs: {
      id: "applicant_date_of_birth",
      state: _vm.validateState("applicant_date_of_birth"),
      type: "text",
      placeholder: "YYYY-MM-DD",
      autocomplete: "off"
    },
    model: {
      value: _vm.$v.form.applicant_date_of_birth.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_date_of_birth, "$model", $$v);
      },
      expression: "$v.form.applicant_date_of_birth.$model"
    }
  }), _vm._v(" "), _c("b-input-group-append", [_c("b-form-datepicker", {
    attrs: {
      state: _vm.validateState("applicant_date_of_birth"),
      "button-only": "",
      right: "",
      locale: "en-US",
      "aria-controls": "applicant_date_of_birth"
    },
    model: {
      value: _vm.$v.form.applicant_date_of_birth.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_date_of_birth, "$model", $$v);
      },
      expression: "$v.form.applicant_date_of_birth.$model"
    }
  })], 1)], 1), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_date_of_birth-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1)]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_vm.sonodnamedata.enname != "Certificate of Inheritance" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "image-group-1",
      label: "ছবি",
      "label-for": "image"
    }
  }, [_c("b-form-file", {
    attrs: {
      id: "image",
      name: "image",
      state: _vm.validateState("image"),
      "aria-describedby": "image-feedback"
    },
    on: {
      change: function change($event) {
        return _vm.FileSelected($event, "image");
      }
    }
  }), _vm._v(" "), _vm.form.image != null ? _c("b-img", {
    attrs: {
      thumbnail: "",
      fluid: "",
      src: _vm.form.image,
      alt: "Image 3"
    }
  }) : _vm._e(), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "image-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _vm.sonodnamedata.enname == "Trade license" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_owner_type-group-1",
      label: "প্রতিষ্ঠানের মালিকানার ধরণ *",
      "label-for": "applicant_owner_type"
    }
  }, [_c("b-form-select", {
    staticClass: "form-control",
    attrs: {
      id: "applicant_owner_type",
      name: "applicant_owner_type",
      state: _vm.validateState("applicant_owner_type"),
      "aria-describedby": "applicant_owner_type-feedback",
      options: _vm.applicant_owner_typees
    },
    model: {
      value: _vm.$v.form.applicant_owner_type.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_owner_type, "$model", $$v);
      },
      expression: "$v.form.applicant_owner_type.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_owner_type-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 d-none"
  }, [_c("b-form-group", {
    attrs: {
      id: "sonod_name-group-1",
      label: "সেবার ধরণ",
      "label-for": "sonod_name"
    }
  }, [_c("b-form-select", {
    staticClass: "form-control",
    attrs: {
      id: "sonod_name",
      name: "sonod_name",
      state: _vm.validateState("sonod_name"),
      "aria-describedby": "sonod_name-feedback",
      disabled: ""
    },
    scopedSlots: _vm._u([{
      key: "first",
      fn: function fn() {
        return [_c("b-form-select-option", {
          attrs: {
            value: null,
            disabled: ""
          }
        }, [_vm._v("-- Please select an option --\n                                ")])];
      },
      proxy: true
    }]),
    model: {
      value: _vm.$v.form.sonod_name.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.sonod_name, "$model", $$v);
      },
      expression: "$v.form.sonod_name.$model"
    }
  }, [_vm._v(" "), _vm._l(_vm.SonodNames, function (sName, index) {
    return _c("b-form-select-option", {
      key: index,
      attrs: {
        value: sName.bnname
      }
    }, [_vm._v(_vm._s(sName.bnname))]);
  })], 2), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "sonod_name-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_passport_number-group-1",
      label: "পাসপোর্ট নং ( ইংরেজিতে )",
      "label-for": "applicant_passport_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_passport_number",
      name: "applicant_passport_number",
      state: _vm.validateState("applicant_passport_number"),
      "aria-describedby": "applicant_passport_number-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_passport_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_passport_number, "$model", $$v);
      },
      expression: "$v.form.applicant_passport_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_passport_number-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _vm.sonodnamedata.enname == "Certificate of Inheritance" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "utname-group-1",
      label: "মৃত ব্যাক্তির নাম *",
      "label-for": "utname"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "utname",
      name: "utname",
      state: _vm.validateState("utname"),
      "aria-describedby": "utname-feedback"
    },
    model: {
      value: _vm.$v.form.utname.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.utname, "$model", $$v);
      },
      expression: "$v.form.utname.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "utname-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _vm.sonodnamedata.enname == "Trade license" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_name_of_the_organization-group-1",
      label: "প্রতিষ্ঠানের নাম (বাংলায়) *",
      "label-for": "applicant_name_of_the_organization"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_name_of_the_organization",
      name: "applicant_name_of_the_organization",
      state: _vm.validateState("applicant_name_of_the_organization"),
      "aria-describedby": "applicant_name_of_the_organization-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_name_of_the_organization.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_name_of_the_organization, "$model", $$v);
      },
      expression: "$v.form.applicant_name_of_the_organization.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_name_of_the_organization-feedback"
    }
  }, [_vm._v("This is a required\n                            field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_marriage_status-group-1",
      label: "বৈবাহিক সম্পর্ক",
      "label-for": "applicant_marriage_status"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "applicant_marriage_status",
      name: "applicant_marriage_status",
      options: _vm.applicant_marriage_status_options,
      state: _vm.validateState("applicant_marriage_status"),
      "aria-describedby": "applicant_marriage_status-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_marriage_status.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_marriage_status, "$model", $$v);
      },
      expression: "$v.form.applicant_marriage_status.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_marriage_status-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_occupation-group-1",
      label: "পেশা",
      "label-for": "applicant_occupation"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_occupation",
      name: "applicant_occupation",
      state: _vm.validateState("applicant_occupation"),
      "aria-describedby": "applicant_occupation-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_occupation.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_occupation, "$model", $$v);
      },
      expression: "$v.form.applicant_occupation.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_occupation-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_education-group-1",
      label: "শিক্ষাগত যোগ্যতা",
      "label-for": "applicant_education"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_education",
      name: "applicant_education",
      state: _vm.validateState("applicant_education"),
      "aria-describedby": "applicant_education-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_education.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_education, "$model", $$v);
      },
      expression: "$v.form.applicant_education.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_education-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_religion-group-1",
      label: "ধর্ম",
      "label-for": "applicant_religion"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "applicant_religion",
      name: "applicant_religion",
      options: _vm.applicant_religions,
      state: _vm.validateState("applicant_religion"),
      "aria-describedby": "applicant_religion-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_religion.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_religion, "$model", $$v);
      },
      expression: "$v.form.applicant_religion.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_religion-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _vm.sonodnamedata.enname == "Trade license" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_vat_id_number-group-1",
      label: "ভ্যাট আইডি (যদি থাকে)",
      "label-for": "applicant_vat_id_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_vat_id_number",
      name: "applicant_vat_id_number",
      state: _vm.validateState("applicant_vat_id_number"),
      "aria-describedby": "applicant_vat_id_number-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_vat_id_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_vat_id_number, "$model", $$v);
      },
      expression: "$v.form.applicant_vat_id_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_vat_id_number-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _vm.sonodnamedata.enname == "Trade license" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_tax_id_number-group-1",
      label: "ট্যাক্স আইডি (যদি থাকে)",
      "label-for": "applicant_tax_id_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_tax_id_number",
      name: "applicant_tax_id_number",
      state: _vm.validateState("applicant_tax_id_number"),
      "aria-describedby": "applicant_tax_id_number-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_tax_id_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_tax_id_number, "$model", $$v);
      },
      expression: "$v.form.applicant_tax_id_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_tax_id_number-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _vm.sonodnamedata.enname == "Trade license" ? _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_type_of_business-group-1",
      label: "ব্যবসার ধরন (বাংলায়) *",
      "label-for": "applicant_type_of_business"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_type_of_business",
      name: "applicant_type_of_business",
      state: _vm.validateState("applicant_type_of_business"),
      "aria-describedby": "applicant_type_of_business-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_type_of_business.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_type_of_business, "$model", $$v);
      },
      expression: "$v.form.applicant_type_of_business.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_type_of_business-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1) : _vm._e(), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_resident_status-group-1",
      label: "বাসিন্দা",
      "label-for": "applicant_resident_status"
    }
  }, [_c("b-form-select", {
    attrs: {
      id: "applicant_resident_status",
      name: "applicant_resident_status",
      state: _vm.validateState("applicant_resident_status"),
      options: _vm.applicant_resident_status_options,
      "aria-describedby": "applicant_resident_status-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_resident_status.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_resident_status, "$model", $$v);
      },
      expression: "$v.form.applicant_resident_status.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_resident_status-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1)]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-md-6"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("বর্তমান ঠিকানা")]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_village-group-1",
      label: "গ্রাম/মহল্লা",
      "label-for": "applicant_present_village"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_village",
      name: "applicant_present_village",
      state: _vm.validateState("applicant_present_village"),
      "aria-describedby": "applicant_present_village-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_village.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_village, "$model", $$v);
      },
      expression: "$v.form.applicant_present_village.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_village-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_road_block_sector-group-1",
      label: "রোড/ব্লক/সেক্টর",
      "label-for": "applicant_present_road_block_sector"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_road_block_sector",
      name: "applicant_present_road_block_sector",
      state: _vm.validateState("applicant_present_road_block_sector"),
      "aria-describedby": "applicant_present_road_block_sector-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_road_block_sector.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_road_block_sector, "$model", $$v);
      },
      expression: "$v.form.applicant_present_road_block_sector.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_road_block_sector-feedback"
    }
  }, [_vm._v("This is a\n                            required field")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_word_number-group-1",
      label: "ওয়ার্ড নং",
      "label-for": "applicant_present_word_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_word_number",
      name: "applicant_present_word_number",
      state: _vm.validateState("applicant_present_word_number"),
      "aria-describedby": "applicant_present_word_number-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_word_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_word_number, "$model", $$v);
      },
      expression: "$v.form.applicant_present_word_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_word_number-feedback"
    }
  }, [_vm._v("This is a required\n                            field")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_district-group-1",
      label: "জেলা",
      "label-for": "applicant_present_district"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_district",
      name: "applicant_present_district",
      state: _vm.validateState("applicant_present_district"),
      "aria-describedby": "applicant_present_district-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_district.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_district, "$model", $$v);
      },
      expression: "$v.form.applicant_present_district.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_district-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_Upazila-group-1",
      label: "উপজেলা/থানা",
      "label-for": "applicant_present_Upazila"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_Upazila",
      name: "applicant_present_Upazila",
      state: _vm.validateState("applicant_present_Upazila"),
      "aria-describedby": "applicant_present_Upazila-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_Upazila.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_Upazila, "$model", $$v);
      },
      expression: "$v.form.applicant_present_Upazila.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_Upazila-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_present_post_office-group-1",
      label: "পোষ্ট অফিস",
      "label-for": "applicant_present_post_office"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_present_post_office",
      name: "applicant_present_post_office",
      state: _vm.validateState("applicant_present_post_office"),
      "aria-describedby": "applicant_present_post_office-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_present_post_office.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_present_post_office, "$model", $$v);
      },
      expression: "$v.form.applicant_present_post_office.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_present_post_office-feedback"
    }
  }, [_vm._v("This is a required\n                            field")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-6"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("স্থায়ী ঠিকানা")]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.sameStatus,
      expression: "sameStatus"
    }],
    attrs: {
      type: "checkbox",
      id: "checkbox"
    },
    domProps: {
      checked: Array.isArray(_vm.sameStatus) ? _vm._i(_vm.sameStatus, null) > -1 : _vm.sameStatus
    },
    on: {
      change: [function ($event) {
        var $$a = _vm.sameStatus,
            $$el = $event.target,
            $$c = $$el.checked ? true : false;

        if (Array.isArray($$a)) {
          var $$v = null,
              $$i = _vm._i($$a, $$v);

          if ($$el.checked) {
            $$i < 0 && (_vm.sameStatus = $$a.concat([$$v]));
          } else {
            $$i > -1 && (_vm.sameStatus = $$a.slice(0, $$i).concat($$a.slice($$i + 1)));
          }
        } else {
          _vm.sameStatus = $$c;
        }
      }, _vm.sameAddress]
    }
  }), _vm._v(" "), _c("label", {
    attrs: {
      "for": "checkbox"
    }
  }, [_vm._v(" বর্তমান ঠিকানা ও স্থায়ী ঠিকানা একই হলে")])]), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_village-group-1",
      label: "গ্রাম/মহল্লা",
      "label-for": "applicant_permanent_village"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_village",
      name: "applicant_permanent_village",
      state: _vm.validateState("applicant_permanent_village"),
      "aria-describedby": "applicant_permanent_village-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_village.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_village, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_village.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_village-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_road_block_sector-group-1",
      label: "রোড/ব্লক/সেক্টর",
      "label-for": "applicant_permanent_road_block_sector"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_road_block_sector",
      name: "applicant_permanent_road_block_sector",
      state: _vm.validateState("applicant_permanent_road_block_sector"),
      "aria-describedby": "applicant_permanent_road_block_sector-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_road_block_sector.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_road_block_sector, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_road_block_sector.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_road_block_sector-feedback"
    }
  }, [_vm._v("This is a\n                            required field")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_word_number-group-1",
      label: "ওয়ার্ড নং",
      "label-for": "applicant_permanent_word_number"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_word_number",
      name: "applicant_permanent_word_number",
      state: _vm.validateState("applicant_permanent_word_number"),
      "aria-describedby": "applicant_permanent_word_number-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_word_number.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_word_number, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_word_number.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_word_number-feedback"
    }
  }, [_vm._v("This is a required\n                            field")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_district-group-1",
      label: "জেলা",
      "label-for": "applicant_permanent_district"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_district",
      name: "applicant_permanent_district",
      state: _vm.validateState("applicant_permanent_district"),
      "aria-describedby": "applicant_permanent_district-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_district.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_district, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_district.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_district-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_Upazila-group-1",
      label: "উপজেলা/থানা",
      "label-for": "applicant_permanent_Upazila"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_Upazila",
      name: "applicant_permanent_Upazila",
      state: _vm.validateState("applicant_permanent_Upazila"),
      "aria-describedby": "applicant_permanent_Upazila-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_Upazila.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_Upazila, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_Upazila.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_Upazila-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1), _vm._v(" "), _c("b-form-group", {
    attrs: {
      id: "applicant_permanent_post_office-group-1",
      label: "পোষ্ট অফিস",
      "label-for": "applicant_permanent_post_office"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_permanent_post_office",
      name: "applicant_permanent_post_office",
      state: _vm.validateState("applicant_permanent_post_office"),
      "aria-describedby": "applicant_permanent_post_office-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_permanent_post_office.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_permanent_post_office, "$model", $$v);
      },
      expression: "$v.form.applicant_permanent_post_office.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_permanent_post_office-feedback"
    }
  }, [_vm._v("This is a required\n                            field")])], 1)], 1)]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v(" যোগাযোগের ঠিকানা")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-6"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_mobile-group-1",
      label: "মোবাইল",
      "label-for": "applicant_mobile"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_mobile",
      name: "applicant_mobile",
      maxlength: "11",
      state: _vm.validateState("applicant_mobile"),
      "aria-describedby": "applicant_mobile-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_mobile.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_mobile, "$model", $$v);
      },
      expression: "$v.form.applicant_mobile.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_mobile-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-6"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_email-group-1",
      label: "ইমেল",
      "label-for": "applicant_email"
    }
  }, [_c("b-form-input", {
    attrs: {
      id: "applicant_email",
      name: "applicant_email",
      state: _vm.validateState("applicant_email"),
      "aria-describedby": "applicant_email-feedback"
    },
    model: {
      value: _vm.$v.form.applicant_email.$model,
      callback: function callback($$v) {
        _vm.$set(_vm.$v.form.applicant_email, "$model", $$v);
      },
      expression: "$v.form.applicant_email.$model"
    }
  }), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_email-feedback"
    }
  }, [_vm._v("This is a required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v(" Attachment")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_national_id_front_attachment-group-1",
      label: "জাতীয় পরিচয়পত্র (Front page)",
      "label-for": "applicant_national_id_front_attachment"
    }
  }, [_c("b-form-file", {
    attrs: {
      id: "applicant_national_id_front_attachment",
      name: "applicant_national_id_front_attachment",
      state: _vm.validateState("applicant_national_id_front_attachment"),
      "aria-describedby": "applicant_national_id_front_attachment-feedback"
    },
    on: {
      change: function change($event) {
        return _vm.FileSelected($event, "applicant_national_id_front_attachment");
      }
    }
  }), _vm._v(" "), _vm.form.applicant_national_id_front_attachment != null ? _c("b-img", {
    attrs: {
      thumbnail: "",
      fluid: "",
      src: _vm.form.applicant_national_id_front_attachment,
      alt: "Image 3"
    }
  }) : _vm._e(), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_national_id_front_attachment-feedback"
    }
  }, [_vm._v("This is a\n                            required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_national_id_back_attachment-group-1",
      label: "জাতীয় পরিচয়পত্র (Back page)",
      "label-for": "applicant_national_id_back_attachment"
    }
  }, [_c("b-form-file", {
    attrs: {
      id: "applicant_national_id_back_attachment",
      name: "applicant_national_id_back_attachment",
      state: _vm.validateState("applicant_national_id_back_attachment"),
      "aria-describedby": "applicant_national_id_back_attachment-feedback"
    },
    on: {
      change: function change($event) {
        return _vm.FileSelected($event, "applicant_national_id_back_attachment");
      }
    }
  }), _vm._v(" "), _vm.form.applicant_national_id_back_attachment != null ? _c("b-img", {
    attrs: {
      thumbnail: "",
      fluid: "",
      src: _vm.form.applicant_national_id_back_attachment,
      alt: "Image 3"
    }
  }) : _vm._e(), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_national_id_back_attachment-feedback"
    }
  }, [_vm._v("This is a\n                            required field\n                        ")])], 1)], 1), _vm._v(" "), _c("div", {
    staticClass: "col-md-4"
  }, [_c("b-form-group", {
    attrs: {
      id: "applicant_birth_certificate_attachment-group-1",
      label: "জন্ম নিবন্ধন",
      "label-for": "applicant_birth_certificate_attachment"
    }
  }, [_c("b-form-file", {
    attrs: {
      id: "applicant_birth_certificate_attachment",
      name: "applicant_birth_certificate_attachment",
      state: _vm.validateState("applicant_birth_certificate_attachment"),
      "aria-describedby": "applicant_birth_certificate_attachment-feedback"
    },
    on: {
      change: function change($event) {
        return _vm.FileSelected($event, "applicant_birth_certificate_attachment");
      }
    }
  }), _vm._v(" "), _vm.form.applicant_birth_certificate_attachment != null ? _c("b-img", {
    attrs: {
      thumbnail: "",
      fluid: "",
      src: _vm.form.applicant_birth_certificate_attachment,
      alt: "Image 3"
    }
  }) : _vm._e(), _vm._v(" "), _c("b-form-invalid-feedback", {
    attrs: {
      id: "applicant_birth_certificate_attachment-feedback"
    }
  }, [_vm._v("This is a\n                            required field\n                        ")])], 1)], 1)]), _vm._v(" "), _vm.sonodnamedata.enname == "Certificate of Inheritance" ? _c("div", {
    staticClass: "app-heading"
  }, [_vm._v("ওয়ারিশগনের তালিকা\n            ")]) : _vm._e(), _vm._v(" "), _vm.sonodnamedata.enname == "Certificate of Inheritance" ? _c("table", {
    staticClass: "table"
  }, [_c("tr", [_c("th", [_vm._v("নাম")]), _vm._v(" "), _c("th", [_vm._v("সম্পর্ক")]), _vm._v(" "), _c("th", [_vm._v("জন্ম তারিখ")]), _vm._v(" "), _c("th", [_vm._v("জাতীয় পরিচয়পত্র নাম্বার")]), _vm._v(" "), _c("th", [_c("button", {
    staticClass: "flex justify-start btn btn-info",
    attrs: {
      type: "button"
    },
    on: {
      click: function click($event) {
        return _vm.addMore();
      }
    }
  }, [_vm._v("Add\n                            More")])])]), _vm._v(" "), _vm._l(_vm.form.successors, function (successor, index) {
    return _c("tr", {
      key: index
    }, [_c("input", {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: successor.w_id = index,
        expression: "successor.w_id = index"
      }],
      attrs: {
        type: "hidden"
      },
      domProps: {
        value: successor.w_id = index
      },
      on: {
        input: function input($event) {
          if ($event.target.composing) return;

          _vm.$set(successor, "w_id = index", $event.target.value);
        }
      }
    }), _vm._v(" "), _c("th", [_c("input", {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: successor.w_name,
        expression: "successor.w_name"
      }],
      staticClass: "form-control",
      attrs: {
        placeholder: "নাম"
      },
      domProps: {
        value: successor.w_name
      },
      on: {
        input: function input($event) {
          if ($event.target.composing) return;

          _vm.$set(successor, "w_name", $event.target.value);
        }
      }
    })]), _vm._v(" "), _c("th", [_c("input", {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: successor.w_relation,
        expression: "successor.w_relation"
      }],
      staticClass: "form-control",
      attrs: {
        placeholder: "সম্পর্ক"
      },
      domProps: {
        value: successor.w_relation
      },
      on: {
        input: function input($event) {
          if ($event.target.composing) return;

          _vm.$set(successor, "w_relation", $event.target.value);
        }
      }
    })]), _vm._v(" "), _c("th", [_c("input", {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: successor.w_age,
        expression: "successor.w_age"
      }],
      staticClass: "form-control",
      attrs: {
        type: "date",
        placeholder: "জন্ম তারিখ"
      },
      domProps: {
        value: successor.w_age
      },
      on: {
        input: function input($event) {
          if ($event.target.composing) return;

          _vm.$set(successor, "w_age", $event.target.value);
        }
      }
    })]), _vm._v(" "), _c("th", [_c("input", {
      directives: [{
        name: "model",
        rawName: "v-model",
        value: successor.w_nid,
        expression: "successor.w_nid"
      }],
      staticClass: "form-control",
      attrs: {
        type: "number",
        placeholder: "জাতীয় পরিচয়পত্র নাম্বার"
      },
      domProps: {
        value: successor.w_nid
      },
      on: {
        keydown: function keydown($event) {
          return _vm.portKeydown($event);
        },
        input: function input($event) {
          if ($event.target.composing) return;

          _vm.$set(successor, "w_nid", $event.target.value);
        }
      }
    })]), _vm._v(" "), _c("th", [_c("button", {
      directives: [{
        name: "show",
        rawName: "v-show",
        value: index != 0,
        expression: "index != 0"
      }],
      staticClass: "ml-2 btn btn-danger",
      attrs: {
        type: "button"
      },
      on: {
        click: function click($event) {
          return _vm.remove(index);
        }
      }
    }, [_vm._v("Remove")])])]);
  })], 2) : _vm._e(), _vm._v(" "), _c("b-button", {
    attrs: {
      type: "submit",
      variant: "primary"
    }
  }, [_vm._v("Submit")]), _vm._v(" "), _c("b-button", {
    staticClass: "ml-2",
    on: {
      click: function click($event) {
        return _vm.resetForm();
      }
    }
  }, [_vm._v("Reset")])], 1)]), _vm._v(" "), _c("b-modal", {
    attrs: {
      id: _vm.infoModal.id,
      size: "xl",
      title: _vm.infoModal.title,
      "ok-only": "",
      "ok-disabled": "",
      "no-close-on-esc": "",
      "no-close-on-backdrop": ""
    }
  }, [_c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("আবেদনকারীর তথ্য")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 mt-3"
  }), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 mt-3"
  }, [_c("img", {
    attrs: {
      width: "100%",
      src: _vm.form.image,
      alt: ""
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 mt-3"
  }), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("আবেদনকারীর নাম : ")]), _vm._v(_vm._s(_vm.form.applicant_name))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("লিঙ্গ : ")]), _vm._v(_vm._s(_vm.form.applicant_gender))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("আবেদনকারীর পিতা/স্বামীর নাম : ")]), _vm._v(_vm._s(_vm.form.applicant_father_name))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("আবেদনকারীর পিতা জীবিত কিনা : ")]), _vm._v(_vm._s(_vm.form.successor_father_alive_status))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("আবেদনকারীর মাতার নাম : ")]), _vm._v(_vm._s(_vm.form.applicant_mother_name))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("আবেদনকারীর মাতা জীবিত কিনা : ")]), _vm._v(_vm._s(_vm.form.successor_mother_alive_status))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("ন্যাশনাল আইডি : ")]), _vm._v(_vm._s(_vm.form.applicant_national_id_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("জন্ম নিবন্ধন নং : ")]), _vm._v(_vm._s(_vm.form.applicant_birth_certificate_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("হোল্ডিং নং : ")]), _vm._v(_vm._s(_vm.form.applicant_holding_tax_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("জম্ম তারিখ : ")]), _vm._v(_vm._s(_vm.form.applicant_date_of_birth))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("পাসপোর্ট নং : ")]), _vm._v(_vm._s(_vm.form.applicant_passport_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("বৈবাহিক সম্পর্ক : ")]), _vm._v(_vm._s(_vm.form.applicant_marriage_status))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("পেশা: ")]), _vm._v(_vm._s(_vm.form.applicant_occupation))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("শিক্ষাগত যোগ্যতা: ")]), _vm._v(_vm._s(_vm.form.applicant_education))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("ধর্ম: ")]), _vm._v(_vm._s(_vm.form.applicant_religion))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("বাসিন্দা: ")]), _vm._v(_vm._s(_vm.form.applicant_resident_status))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("বর্তমান ঠিকানা")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("গ্রাম/মহল্লা: ")]), _vm._v(_vm._s(_vm.form.applicant_present_village))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("রোড/ব্লক/সেক্টর: ")]), _vm._v(_vm._s(_vm.form.applicant_present_road_block_sector))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("ওয়ার্ড নং: ")]), _vm._v(_vm._s(_vm.form.applicant_present_word_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("জেলা: ")]), _vm._v(_vm._s(_vm.form.applicant_present_district))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("উপজেলা/থানা: ")]), _vm._v(_vm._s(_vm.form.applicant_present_Upazila))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("পোষ্ট অফিস: ")]), _vm._v(_vm._s(_vm.form.applicant_present_post_office))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("স্থায়ী ঠিকানা")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("গ্রাম/মহল্লা: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_village))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("রোড/ব্লক/সেক্টর: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_road_block_sector))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("ওয়ার্ড নং: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_word_number))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("জেলা: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_district))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("উপজেলা/থানা: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_Upazila))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("b", [_vm._v("পোষ্ট অফিস: ")]), _vm._v(_vm._s(_vm.form.applicant_permanent_post_office))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("যোগাযোগের ঠিকানা")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-6 col-6 mt-3"
  }, [_c("b", [_vm._v("মোবাইল: ")]), _vm._v(_vm._s(_vm.form.applicant_mobile))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-6 col-6 mt-3"
  }, [_c("b", [_vm._v("ইমেল: ")]), _vm._v(_vm._s(_vm.form.applicant_email))]), _vm._v(" "), _c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "app-heading"
  }, [_vm._v("Attachment")])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("span", [_vm._v("ন্যাশনাল আইডি (Front page)")]), _vm._v(" "), _c("br"), _vm._v(" "), _c("img", {
    attrs: {
      width: "100%",
      src: _vm.form.applicant_national_id_front_attachment,
      alt: ""
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("span", [_vm._v("ন্যাশনাল আইডি (Back page)")]), _vm._v(" "), _c("br"), _vm._v(" "), _c("img", {
    attrs: {
      width: "100%",
      src: _vm.form.applicant_national_id_back_attachment,
      alt: ""
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-md-4 col-6 mt-3"
  }, [_c("span", [_vm._v("জন্ম নিবন্ধন")]), _vm._v(" "), _c("br"), _vm._v(" "), _c("img", {
    attrs: {
      width: "100%",
      src: _vm.form.applicant_birth_certificate_attachment,
      alt: ""
    }
  })])]), _vm._v(" "), _c("br"), _vm._v(" "), _c("br"), _vm._v(" "), _c("b-form", {
    staticStyle: {
      "margin-top": "50px"
    },
    on: {
      submit: function submit($event) {
        $event.stopPropagation();
        $event.preventDefault();
        return _vm.finalSubmit.apply(null, arguments);
      }
    }
  }, [_vm.getunionInfos.payment_type == "Prepaid" ? _c("div", {
    staticClass: "text-center",
    staticStyle: {
      width: "50%",
      margin: "0 auto"
    }
  }, [_c("h3", [_vm._v("আপনার আবেদনটি সফল করার জন্য সনদের ফি প্রদান করুন । " + _vm._s(_vm.sonodnamedata.bnname) + " এর ফি " + _vm._s(_vm.sonodnamedata.sonod_fee) + " টাকা ।")]), _vm._v(" "), !_vm.submitLoad ? _c("button", {
    staticClass: "btn btn-info",
    attrs: {
      type: "submit"
    }
  }, [_vm._v("Pay And Submit")]) : _vm.submitLoad ? _c("span", {
    staticClass: "btn btn-info"
  }, [_vm._v("Please Wait...")]) : _vm._e()]) : _vm.getunionInfos.payment_type == "Postpaid" ? _c("div", {
    staticClass: "text-center",
    staticStyle: {
      width: "50%",
      margin: "0 auto"
    }
  }, [_c("h3", [_vm._v("আপনার আবেদনটি সফল করার জন্য Confirm বাটন এ চাপ দিন")]), _vm._v(" "), !_vm.submitLoad ? _c("button", {
    staticClass: "btn btn-info",
    attrs: {
      type: "submit"
    }
  }, [_vm._v("Confirm")]) : _vm.submitLoad ? _c("span", {
    staticClass: "btn btn-info"
  }, [_vm._v("Please Wait...")]) : _vm._e()]) : _vm._e()])], 1)], 1);
};

var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************/
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
    staticClass: "d-flex"
  }, [_c("input", {
    ref: "dayPicker",
    staticClass: "form-control",
    attrs: {
      type: "text",
      placeholder: "Day",
      required: _vm.required
    },
    domProps: {
      value: _vm.splitdate.day
    },
    on: {
      input: function input($event) {
        return _vm.updateDate();
      }
    }
  }), _vm._v(" "), _c("input", {
    ref: "monthPicker",
    staticClass: "form-control",
    attrs: {
      type: "text",
      placeholder: "Month"
    },
    domProps: {
      value: _vm.splitdate.month
    },
    on: {
      input: function input($event) {
        return _vm.updateDate();
      }
    }
  }), _vm._v(" "), _c("input", {
    ref: "yearPicker",
    staticClass: "form-control",
    attrs: {
      type: "text",
      placeholder: "Year"
    },
    domProps: {
      value: _vm.splitdate.year
    },
    on: {
      input: function input($event) {
        return _vm.updateDate();
      }
    }
  })]);
};

var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js */ "./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.app-heading {\n    text-align: center;\n    margin: 32px 0;\n    font-size: 23px;\n    border-bottom: 1px solid #159513;\n    color: #159513;\n}\n.form-pannel {\n    border: 1px solid #159513;\n    padding: 25px 25px 25px 25px;\n}\n.panel-heading {\n    padding: 11px 0px;\n    border-top-right-radius: 6px;\n    border-top-left-radius: 6px;\n    margin-top: 20px;\n}\n.form-pannel {\n    border-bottom-left-radius: 6px;\n    border-bottom-right-radius: 6px;\n}\n.dropdown-menu {\n    z-index: 99999;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_0bcb74a1_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_0bcb74a1_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_0bcb74a1_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/frontend/components/form/index.vue":
/*!*********************************************************!*\
  !*** ./resources/js/frontend/components/form/index.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=0bcb74a1& */ "./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js&");
/* harmony import */ var _index_vue_vue_type_style_index_0_id_0bcb74a1_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& */ "./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__.render,
  _index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/frontend/components/form/index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/frontend/components/form/input.vue":
/*!*********************************************************!*\
  !*** ./resources/js/frontend/components/form/input.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./input.vue?vue&type=template&id=bca930ce& */ "./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce&");
/* harmony import */ var _input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./input.vue?vue&type=script&lang=js& */ "./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__.render,
  _input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/frontend/components/form/input.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./input.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_input_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1&":
/*!****************************************************************************************!*\
  !*** ./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_0bcb74a1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=template&id=0bcb74a1& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=template&id=0bcb74a1&");


/***/ }),

/***/ "./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce&":
/*!****************************************************************************************!*\
  !*** ./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_input_vue_vue_type_template_id_bca930ce___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./input.vue?vue&type=template&id=bca930ce& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/input.vue?vue&type=template&id=bca930ce&");


/***/ }),

/***/ "./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& ***!
  \******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_0bcb74a1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/frontend/components/form/index.vue?vue&type=style&index=0&id=0bcb74a1&lang=css&");


/***/ }),

/***/ "./node_modules/vuelidate/lib/index.js":
/*!*********************************************!*\
  !*** ./node_modules/vuelidate/lib/index.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.Vuelidate = Vuelidate;
exports.validationMixin = exports["default"] = void 0;
Object.defineProperty(exports, "withParams", ({
  enumerable: true,
  get: function get() {
    return _params.withParams;
  }
}));

var _vval = __webpack_require__(/*! ./vval */ "./node_modules/vuelidate/lib/vval.js");

var _params = __webpack_require__(/*! ./params */ "./node_modules/vuelidate/lib/params.js");

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var NIL = function NIL() {
  return null;
};

var buildFromKeys = function buildFromKeys(keys, fn, keyFn) {
  return keys.reduce(function (build, key) {
    build[keyFn ? keyFn(key) : key] = fn(key);
    return build;
  }, {});
};

function isFunction(val) {
  return typeof val === 'function';
}

function isObject(val) {
  return val !== null && (_typeof(val) === 'object' || isFunction(val));
}

function isPromise(object) {
  return isObject(object) && isFunction(object.then);
}

var getPath = function getPath(ctx, obj, path, fallback) {
  if (typeof path === 'function') {
    return path.call(ctx, obj, fallback);
  }

  path = Array.isArray(path) ? path : path.split('.');

  for (var i = 0; i < path.length; i++) {
    if (obj && _typeof(obj) === 'object') {
      obj = obj[path[i]];
    } else {
      return fallback;
    }
  }

  return typeof obj === 'undefined' ? fallback : obj;
};

var __isVuelidateAsyncVm = '__isVuelidateAsyncVm';

function makePendingAsyncVm(Vue, promise) {
  var asyncVm = new Vue({
    data: {
      p: true,
      v: false
    }
  });
  promise.then(function (value) {
    asyncVm.p = false;
    asyncVm.v = value;
  }, function (error) {
    asyncVm.p = false;
    asyncVm.v = false;
    throw error;
  });
  asyncVm[__isVuelidateAsyncVm] = true;
  return asyncVm;
}

var validationGetters = {
  $invalid: function $invalid() {
    var _this = this;

    var proxy = this.proxy;
    return this.nestedKeys.some(function (nested) {
      return _this.refProxy(nested).$invalid;
    }) || this.ruleKeys.some(function (rule) {
      return !proxy[rule];
    });
  },
  $dirty: function $dirty() {
    var _this2 = this;

    if (this.dirty) {
      return true;
    }

    if (this.nestedKeys.length === 0) {
      return false;
    }

    return this.nestedKeys.every(function (key) {
      return _this2.refProxy(key).$dirty;
    });
  },
  $anyDirty: function $anyDirty() {
    var _this3 = this;

    if (this.dirty) {
      return true;
    }

    if (this.nestedKeys.length === 0) {
      return false;
    }

    return this.nestedKeys.some(function (key) {
      return _this3.refProxy(key).$anyDirty;
    });
  },
  $error: function $error() {
    return this.$dirty && !this.$pending && this.$invalid;
  },
  $anyError: function $anyError() {
    var _this4 = this;

    if (this.$error) return true;
    return this.nestedKeys.some(function (key) {
      return _this4.refProxy(key).$anyError;
    });
  },
  $pending: function $pending() {
    var _this5 = this;

    return this.ruleKeys.some(function (key) {
      return _this5.getRef(key).$pending;
    }) || this.nestedKeys.some(function (key) {
      return _this5.refProxy(key).$pending;
    });
  },
  $params: function $params() {
    var _this6 = this;

    var vals = this.validations;
    return _objectSpread(_objectSpread({}, buildFromKeys(this.nestedKeys, function (key) {
      return vals[key] && vals[key].$params || null;
    })), buildFromKeys(this.ruleKeys, function (key) {
      return _this6.getRef(key).$params;
    }));
  }
};

function setDirtyRecursive(newState) {
  this.dirty = newState;
  var proxy = this.proxy;
  var method = newState ? '$touch' : '$reset';
  this.nestedKeys.forEach(function (key) {
    proxy[key][method]();
  });
}

var validationMethods = {
  $touch: function $touch() {
    setDirtyRecursive.call(this, true);
  },
  $reset: function $reset() {
    setDirtyRecursive.call(this, false);
  },
  $flattenParams: function $flattenParams() {
    var proxy = this.proxy;
    var params = [];

    for (var key in this.$params) {
      if (this.isNested(key)) {
        var childParams = proxy[key].$flattenParams();

        for (var j = 0; j < childParams.length; j++) {
          childParams[j].path.unshift(key);
        }

        params = params.concat(childParams);
      } else {
        params.push({
          path: [],
          name: key,
          params: this.$params[key]
        });
      }
    }

    return params;
  }
};
var getterNames = Object.keys(validationGetters);
var methodNames = Object.keys(validationMethods);
var _cachedComponent = null;

var getComponent = function getComponent(Vue) {
  if (_cachedComponent) {
    return _cachedComponent;
  }

  var VBase = Vue.extend({
    computed: {
      refs: function refs() {
        var oldVval = this._vval;
        this._vval = this.children;
        (0, _vval.patchChildren)(oldVval, this._vval);
        var refs = {};

        this._vval.forEach(function (c) {
          refs[c.key] = c.vm;
        });

        return refs;
      }
    },
    beforeCreate: function beforeCreate() {
      this._vval = null;
    },
    beforeDestroy: function beforeDestroy() {
      if (this._vval) {
        (0, _vval.patchChildren)(this._vval);
        this._vval = null;
      }
    },
    methods: {
      getModel: function getModel() {
        return this.lazyModel ? this.lazyModel(this.prop) : this.model;
      },
      getModelKey: function getModelKey(key) {
        var model = this.getModel();

        if (model) {
          return model[key];
        }
      },
      hasIter: function hasIter() {
        return false;
      }
    }
  });
  var ValidationRule = VBase.extend({
    data: function data() {
      return {
        rule: null,
        lazyModel: null,
        model: null,
        lazyParentModel: null,
        rootModel: null
      };
    },
    methods: {
      runRule: function runRule(parent) {
        var model = this.getModel();
        (0, _params.pushParams)();
        var rawOutput = this.rule.call(this.rootModel, model, parent);
        var output = isPromise(rawOutput) ? makePendingAsyncVm(Vue, rawOutput) : rawOutput;
        var rawParams = (0, _params.popParams)();
        var params = rawParams && rawParams.$sub ? rawParams.$sub.length > 1 ? rawParams : rawParams.$sub[0] : null;
        return {
          output: output,
          params: params
        };
      }
    },
    computed: {
      run: function run() {
        var _this7 = this;

        var parent = this.lazyParentModel();

        var isArrayDependant = Array.isArray(parent) && parent.__ob__;

        if (isArrayDependant) {
          var arrayDep = parent.__ob__.dep;
          arrayDep.depend();
          var target = arrayDep.constructor.target;

          if (!this._indirectWatcher) {
            var Watcher = target.constructor;
            this._indirectWatcher = new Watcher(this, function () {
              return _this7.runRule(parent);
            }, null, {
              lazy: true
            });
          }

          var model = this.getModel();

          if (!this._indirectWatcher.dirty && this._lastModel === model) {
            this._indirectWatcher.depend();

            return target.value;
          }

          this._lastModel = model;

          this._indirectWatcher.evaluate();

          this._indirectWatcher.depend();
        } else if (this._indirectWatcher) {
          this._indirectWatcher.teardown();

          this._indirectWatcher = null;
        }

        return this._indirectWatcher ? this._indirectWatcher.value : this.runRule(parent);
      },
      $params: function $params() {
        return this.run.params;
      },
      proxy: function proxy() {
        var output = this.run.output;

        if (output[__isVuelidateAsyncVm]) {
          return !!output.v;
        }

        return !!output;
      },
      $pending: function $pending() {
        var output = this.run.output;

        if (output[__isVuelidateAsyncVm]) {
          return output.p;
        }

        return false;
      }
    },
    destroyed: function destroyed() {
      if (this._indirectWatcher) {
        this._indirectWatcher.teardown();

        this._indirectWatcher = null;
      }
    }
  });
  var Validation = VBase.extend({
    data: function data() {
      return {
        dirty: false,
        validations: null,
        lazyModel: null,
        model: null,
        prop: null,
        lazyParentModel: null,
        rootModel: null
      };
    },
    methods: _objectSpread(_objectSpread({}, validationMethods), {}, {
      refProxy: function refProxy(key) {
        return this.getRef(key).proxy;
      },
      getRef: function getRef(key) {
        return this.refs[key];
      },
      isNested: function isNested(key) {
        return typeof this.validations[key] !== 'function';
      }
    }),
    computed: _objectSpread(_objectSpread({}, validationGetters), {}, {
      nestedKeys: function nestedKeys() {
        return this.keys.filter(this.isNested);
      },
      ruleKeys: function ruleKeys() {
        var _this8 = this;

        return this.keys.filter(function (k) {
          return !_this8.isNested(k);
        });
      },
      keys: function keys() {
        return Object.keys(this.validations).filter(function (k) {
          return k !== '$params';
        });
      },
      proxy: function proxy() {
        var _this9 = this;

        var keyDefs = buildFromKeys(this.keys, function (key) {
          return {
            enumerable: true,
            configurable: true,
            get: function get() {
              return _this9.refProxy(key);
            }
          };
        });
        var getterDefs = buildFromKeys(getterNames, function (key) {
          return {
            enumerable: true,
            configurable: true,
            get: function get() {
              return _this9[key];
            }
          };
        });
        var methodDefs = buildFromKeys(methodNames, function (key) {
          return {
            enumerable: false,
            configurable: true,
            get: function get() {
              return _this9[key];
            }
          };
        });
        var iterDefs = this.hasIter() ? {
          $iter: {
            enumerable: true,
            value: Object.defineProperties({}, _objectSpread({}, keyDefs))
          }
        } : {};
        return Object.defineProperties({}, _objectSpread(_objectSpread(_objectSpread(_objectSpread({}, keyDefs), iterDefs), {}, {
          $model: {
            enumerable: true,
            get: function get() {
              var parent = _this9.lazyParentModel();

              if (parent != null) {
                return parent[_this9.prop];
              } else {
                return null;
              }
            },
            set: function set(value) {
              var parent = _this9.lazyParentModel();

              if (parent != null) {
                parent[_this9.prop] = value;

                _this9.$touch();
              }
            }
          }
        }, getterDefs), methodDefs));
      },
      children: function children() {
        var _this10 = this;

        return [].concat(_toConsumableArray(this.nestedKeys.map(function (key) {
          return renderNested(_this10, key);
        })), _toConsumableArray(this.ruleKeys.map(function (key) {
          return renderRule(_this10, key);
        }))).filter(Boolean);
      }
    })
  });
  var GroupValidation = Validation.extend({
    methods: {
      isNested: function isNested(key) {
        return typeof this.validations[key]() !== 'undefined';
      },
      getRef: function getRef(key) {
        var vm = this;
        return {
          get proxy() {
            return vm.validations[key]() || false;
          }

        };
      }
    }
  });
  var EachValidation = Validation.extend({
    computed: {
      keys: function keys() {
        var model = this.getModel();

        if (isObject(model)) {
          return Object.keys(model);
        } else {
          return [];
        }
      },
      tracker: function tracker() {
        var _this11 = this;

        var trackBy = this.validations.$trackBy;
        return trackBy ? function (key) {
          return "".concat(getPath(_this11.rootModel, _this11.getModelKey(key), trackBy));
        } : function (x) {
          return "".concat(x);
        };
      },
      getModelLazy: function getModelLazy() {
        var _this12 = this;

        return function () {
          return _this12.getModel();
        };
      },
      children: function children() {
        var _this13 = this;

        var def = this.validations;
        var model = this.getModel();

        var validations = _objectSpread({}, def);

        delete validations['$trackBy'];
        var usedTracks = {};
        return this.keys.map(function (key) {
          var track = _this13.tracker(key);

          if (usedTracks.hasOwnProperty(track)) {
            return null;
          }

          usedTracks[track] = true;
          return (0, _vval.h)(Validation, track, {
            validations: validations,
            prop: key,
            lazyParentModel: _this13.getModelLazy,
            model: model[key],
            rootModel: _this13.rootModel
          });
        }).filter(Boolean);
      }
    },
    methods: {
      isNested: function isNested() {
        return true;
      },
      getRef: function getRef(key) {
        return this.refs[this.tracker(key)];
      },
      hasIter: function hasIter() {
        return true;
      }
    }
  });

  var renderNested = function renderNested(vm, key) {
    if (key === '$each') {
      return (0, _vval.h)(EachValidation, key, {
        validations: vm.validations[key],
        lazyParentModel: vm.lazyParentModel,
        prop: key,
        lazyModel: vm.getModel,
        rootModel: vm.rootModel
      });
    }

    var validations = vm.validations[key];

    if (Array.isArray(validations)) {
      var root = vm.rootModel;
      var refVals = buildFromKeys(validations, function (path) {
        return function () {
          return getPath(root, root.$v, path);
        };
      }, function (v) {
        return Array.isArray(v) ? v.join('.') : v;
      });
      return (0, _vval.h)(GroupValidation, key, {
        validations: refVals,
        lazyParentModel: NIL,
        prop: key,
        lazyModel: NIL,
        rootModel: root
      });
    }

    return (0, _vval.h)(Validation, key, {
      validations: validations,
      lazyParentModel: vm.getModel,
      prop: key,
      lazyModel: vm.getModelKey,
      rootModel: vm.rootModel
    });
  };

  var renderRule = function renderRule(vm, key) {
    return (0, _vval.h)(ValidationRule, key, {
      rule: vm.validations[key],
      lazyParentModel: vm.lazyParentModel,
      lazyModel: vm.getModel,
      rootModel: vm.rootModel
    });
  };

  _cachedComponent = {
    VBase: VBase,
    Validation: Validation
  };
  return _cachedComponent;
};

var _cachedVue = null;

function getVue(rootVm) {
  if (_cachedVue) return _cachedVue;
  var Vue = rootVm.constructor;

  while (Vue.super) {
    Vue = Vue.super;
  }

  _cachedVue = Vue;
  return Vue;
}

var validateModel = function validateModel(model, validations) {
  var Vue = getVue(model);

  var _getComponent = getComponent(Vue),
      Validation = _getComponent.Validation,
      VBase = _getComponent.VBase;

  var root = new VBase({
    computed: {
      children: function children() {
        var vals = typeof validations === 'function' ? validations.call(model) : validations;
        return [(0, _vval.h)(Validation, '$v', {
          validations: vals,
          lazyParentModel: NIL,
          prop: '$v',
          model: model,
          rootModel: model
        })];
      }
    }
  });
  return root;
};

var validationMixin = {
  data: function data() {
    var vals = this.$options.validations;

    if (vals) {
      this._vuelidate = validateModel(this, vals);
    }

    return {};
  },
  beforeCreate: function beforeCreate() {
    var options = this.$options;
    var vals = options.validations;
    if (!vals) return;
    if (!options.computed) options.computed = {};
    if (options.computed.$v) return;

    options.computed.$v = function () {
      return this._vuelidate ? this._vuelidate.refs.$v.proxy : null;
    };
  },
  beforeDestroy: function beforeDestroy() {
    if (this._vuelidate) {
      this._vuelidate.$destroy();

      this._vuelidate = null;
    }
  }
};
exports.validationMixin = validationMixin;

function Vuelidate(Vue) {
  Vue.mixin(validationMixin);
}

var _default = Vuelidate;
exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/params.js":
/*!**********************************************!*\
  !*** ./node_modules/vuelidate/lib/params.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports._setTarget = void 0;
exports.popParams = popParams;
exports.pushParams = pushParams;
exports.target = void 0;
exports.withParams = withParams;

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var stack = [];
var target = null;
exports.target = target;

var _setTarget = function _setTarget(x) {
  exports.target = target = x;
};

exports._setTarget = _setTarget;

function pushParams() {
  if (target !== null) {
    stack.push(target);
  }

  exports.target = target = {};
}

function popParams() {
  var lastTarget = target;
  var newTarget = exports.target = target = stack.pop() || null;

  if (newTarget) {
    if (!Array.isArray(newTarget.$sub)) {
      newTarget.$sub = [];
    }

    newTarget.$sub.push(lastTarget);
  }

  return lastTarget;
}

function addParams(params) {
  if (_typeof(params) === 'object' && !Array.isArray(params)) {
    exports.target = target = _objectSpread(_objectSpread({}, target), params);
  } else {
    throw new Error('params must be an object');
  }
}

function withParamsDirect(params, validator) {
  return withParamsClosure(function (add) {
    return function () {
      add(params);

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      return validator.apply(this, args);
    };
  });
}

function withParamsClosure(closure) {
  var validator = closure(addParams);
  return function () {
    pushParams();

    try {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return validator.apply(this, args);
    } finally {
      popParams();
    }
  };
}

function withParams(paramsOrClosure, maybeValidator) {
  if (_typeof(paramsOrClosure) === 'object' && maybeValidator !== undefined) {
    return withParamsDirect(paramsOrClosure, maybeValidator);
  }

  return withParamsClosure(paramsOrClosure);
}

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/alpha.js":
/*!********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/alpha.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.regex)('alpha', /^[a-zA-Z]*$/);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/alphaNum.js":
/*!***********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/alphaNum.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.regex)('alphaNum', /^[a-zA-Z0-9]*$/);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/and.js":
/*!******************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/and.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default() {
  for (var _len = arguments.length, validators = new Array(_len), _key = 0; _key < _len; _key++) {
    validators[_key] = arguments[_key];
  }

  return (0, _common.withParams)({
    type: 'and'
  }, function () {
    var _this = this;

    for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
      args[_key2] = arguments[_key2];
    }

    return validators.length > 0 && validators.reduce(function (valid, fn) {
      return valid && fn.apply(_this, args);
    }, true);
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/between.js":
/*!**********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/between.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(min, max) {
  return (0, _common.withParams)({
    type: 'between',
    min: min,
    max: max
  }, function (value) {
    return !(0, _common.req)(value) || (!/\s/.test(value) || value instanceof Date) && +min <= +value && +max >= +value;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/common.js":
/*!*********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/common.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.req = exports.regex = exports.ref = exports.len = void 0;
Object.defineProperty(exports, "withParams", ({
  enumerable: true,
  get: function get() {
    return _withParams.default;
  }
}));

var _withParams = _interopRequireDefault(__webpack_require__(/*! ../withParams */ "./node_modules/vuelidate/lib/withParams.js"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var req = function req(value) {
  if (Array.isArray(value)) return !!value.length;

  if (value === undefined || value === null) {
    return false;
  }

  if (value === false) {
    return true;
  }

  if (value instanceof Date) {
    return !isNaN(value.getTime());
  }

  if (_typeof(value) === 'object') {
    for (var _ in value) {
      return true;
    }

    return false;
  }

  return !!String(value).length;
};

exports.req = req;

var len = function len(value) {
  if (Array.isArray(value)) return value.length;

  if (_typeof(value) === 'object') {
    return Object.keys(value).length;
  }

  return String(value).length;
};

exports.len = len;

var ref = function ref(reference, vm, parentVm) {
  return typeof reference === 'function' ? reference.call(vm, parentVm) : parentVm[reference];
};

exports.ref = ref;

var regex = function regex(type, expr) {
  return (0, _withParams.default)({
    type: type
  }, function (value) {
    return !req(value) || expr.test(value);
  });
};

exports.regex = regex;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/decimal.js":
/*!**********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/decimal.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.regex)('decimal', /^[-]?\d*(\.\d+)?$/);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/email.js":
/*!********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/email.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var emailRegex = /^(?:[A-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9]{2,}(?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/i;

var _default = (0, _common.regex)('email', emailRegex);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/index.js":
/*!********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/index.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

Object.defineProperty(exports, "__esModule", ({
  value: true
}));
Object.defineProperty(exports, "alpha", ({
  enumerable: true,
  get: function get() {
    return _alpha.default;
  }
}));
Object.defineProperty(exports, "alphaNum", ({
  enumerable: true,
  get: function get() {
    return _alphaNum.default;
  }
}));
Object.defineProperty(exports, "and", ({
  enumerable: true,
  get: function get() {
    return _and.default;
  }
}));
Object.defineProperty(exports, "between", ({
  enumerable: true,
  get: function get() {
    return _between.default;
  }
}));
Object.defineProperty(exports, "decimal", ({
  enumerable: true,
  get: function get() {
    return _decimal.default;
  }
}));
Object.defineProperty(exports, "email", ({
  enumerable: true,
  get: function get() {
    return _email.default;
  }
}));
exports.helpers = void 0;
Object.defineProperty(exports, "integer", ({
  enumerable: true,
  get: function get() {
    return _integer.default;
  }
}));
Object.defineProperty(exports, "ipAddress", ({
  enumerable: true,
  get: function get() {
    return _ipAddress.default;
  }
}));
Object.defineProperty(exports, "macAddress", ({
  enumerable: true,
  get: function get() {
    return _macAddress.default;
  }
}));
Object.defineProperty(exports, "maxLength", ({
  enumerable: true,
  get: function get() {
    return _maxLength.default;
  }
}));
Object.defineProperty(exports, "maxValue", ({
  enumerable: true,
  get: function get() {
    return _maxValue.default;
  }
}));
Object.defineProperty(exports, "minLength", ({
  enumerable: true,
  get: function get() {
    return _minLength.default;
  }
}));
Object.defineProperty(exports, "minValue", ({
  enumerable: true,
  get: function get() {
    return _minValue.default;
  }
}));
Object.defineProperty(exports, "not", ({
  enumerable: true,
  get: function get() {
    return _not.default;
  }
}));
Object.defineProperty(exports, "numeric", ({
  enumerable: true,
  get: function get() {
    return _numeric.default;
  }
}));
Object.defineProperty(exports, "or", ({
  enumerable: true,
  get: function get() {
    return _or.default;
  }
}));
Object.defineProperty(exports, "required", ({
  enumerable: true,
  get: function get() {
    return _required.default;
  }
}));
Object.defineProperty(exports, "requiredIf", ({
  enumerable: true,
  get: function get() {
    return _requiredIf.default;
  }
}));
Object.defineProperty(exports, "requiredUnless", ({
  enumerable: true,
  get: function get() {
    return _requiredUnless.default;
  }
}));
Object.defineProperty(exports, "sameAs", ({
  enumerable: true,
  get: function get() {
    return _sameAs.default;
  }
}));
Object.defineProperty(exports, "url", ({
  enumerable: true,
  get: function get() {
    return _url.default;
  }
}));

var _alpha = _interopRequireDefault(__webpack_require__(/*! ./alpha */ "./node_modules/vuelidate/lib/validators/alpha.js"));

var _alphaNum = _interopRequireDefault(__webpack_require__(/*! ./alphaNum */ "./node_modules/vuelidate/lib/validators/alphaNum.js"));

var _numeric = _interopRequireDefault(__webpack_require__(/*! ./numeric */ "./node_modules/vuelidate/lib/validators/numeric.js"));

var _between = _interopRequireDefault(__webpack_require__(/*! ./between */ "./node_modules/vuelidate/lib/validators/between.js"));

var _email = _interopRequireDefault(__webpack_require__(/*! ./email */ "./node_modules/vuelidate/lib/validators/email.js"));

var _ipAddress = _interopRequireDefault(__webpack_require__(/*! ./ipAddress */ "./node_modules/vuelidate/lib/validators/ipAddress.js"));

var _macAddress = _interopRequireDefault(__webpack_require__(/*! ./macAddress */ "./node_modules/vuelidate/lib/validators/macAddress.js"));

var _maxLength = _interopRequireDefault(__webpack_require__(/*! ./maxLength */ "./node_modules/vuelidate/lib/validators/maxLength.js"));

var _minLength = _interopRequireDefault(__webpack_require__(/*! ./minLength */ "./node_modules/vuelidate/lib/validators/minLength.js"));

var _required = _interopRequireDefault(__webpack_require__(/*! ./required */ "./node_modules/vuelidate/lib/validators/required.js"));

var _requiredIf = _interopRequireDefault(__webpack_require__(/*! ./requiredIf */ "./node_modules/vuelidate/lib/validators/requiredIf.js"));

var _requiredUnless = _interopRequireDefault(__webpack_require__(/*! ./requiredUnless */ "./node_modules/vuelidate/lib/validators/requiredUnless.js"));

var _sameAs = _interopRequireDefault(__webpack_require__(/*! ./sameAs */ "./node_modules/vuelidate/lib/validators/sameAs.js"));

var _url = _interopRequireDefault(__webpack_require__(/*! ./url */ "./node_modules/vuelidate/lib/validators/url.js"));

var _or = _interopRequireDefault(__webpack_require__(/*! ./or */ "./node_modules/vuelidate/lib/validators/or.js"));

var _and = _interopRequireDefault(__webpack_require__(/*! ./and */ "./node_modules/vuelidate/lib/validators/and.js"));

var _not = _interopRequireDefault(__webpack_require__(/*! ./not */ "./node_modules/vuelidate/lib/validators/not.js"));

var _minValue = _interopRequireDefault(__webpack_require__(/*! ./minValue */ "./node_modules/vuelidate/lib/validators/minValue.js"));

var _maxValue = _interopRequireDefault(__webpack_require__(/*! ./maxValue */ "./node_modules/vuelidate/lib/validators/maxValue.js"));

var _integer = _interopRequireDefault(__webpack_require__(/*! ./integer */ "./node_modules/vuelidate/lib/validators/integer.js"));

var _decimal = _interopRequireDefault(__webpack_require__(/*! ./decimal */ "./node_modules/vuelidate/lib/validators/decimal.js"));

var helpers = _interopRequireWildcard(__webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js"));

exports.helpers = helpers;

function _getRequireWildcardCache(nodeInterop) { if (typeof WeakMap !== "function") return null; var cacheBabelInterop = new WeakMap(); var cacheNodeInterop = new WeakMap(); return (_getRequireWildcardCache = function _getRequireWildcardCache(nodeInterop) { return nodeInterop ? cacheNodeInterop : cacheBabelInterop; })(nodeInterop); }

function _interopRequireWildcard(obj, nodeInterop) { if (!nodeInterop && obj && obj.__esModule) { return obj; } if (obj === null || _typeof(obj) !== "object" && typeof obj !== "function") { return { default: obj }; } var cache = _getRequireWildcardCache(nodeInterop); if (cache && cache.has(obj)) { return cache.get(obj); } var newObj = {}; var hasPropertyDescriptor = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var key in obj) { if (key !== "default" && Object.prototype.hasOwnProperty.call(obj, key)) { var desc = hasPropertyDescriptor ? Object.getOwnPropertyDescriptor(obj, key) : null; if (desc && (desc.get || desc.set)) { Object.defineProperty(newObj, key, desc); } else { newObj[key] = obj[key]; } } } newObj.default = obj; if (cache) { cache.set(obj, newObj); } return newObj; }

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/integer.js":
/*!**********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/integer.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.regex)('integer', /(^[0-9]*$)|(^-[0-9]+$)/);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/ipAddress.js":
/*!************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/ipAddress.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.withParams)({
  type: 'ipAddress'
}, function (value) {
  if (!(0, _common.req)(value)) {
    return true;
  }

  if (typeof value !== 'string') {
    return false;
  }

  var nibbles = value.split('.');
  return nibbles.length === 4 && nibbles.every(nibbleValid);
});

exports["default"] = _default;

var nibbleValid = function nibbleValid(nibble) {
  if (nibble.length > 3 || nibble.length === 0) {
    return false;
  }

  if (nibble[0] === '0' && nibble !== '0') {
    return false;
  }

  if (!nibble.match(/^\d+$/)) {
    return false;
  }

  var numeric = +nibble | 0;
  return numeric >= 0 && numeric <= 255;
};

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/macAddress.js":
/*!*************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/macAddress.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default() {
  var separator = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : ':';
  return (0, _common.withParams)({
    type: 'macAddress'
  }, function (value) {
    if (!(0, _common.req)(value)) {
      return true;
    }

    if (typeof value !== 'string') {
      return false;
    }

    var parts = typeof separator === 'string' && separator !== '' ? value.split(separator) : value.length === 12 || value.length === 16 ? value.match(/.{2}/g) : null;
    return parts !== null && (parts.length === 6 || parts.length === 8) && parts.every(hexValid);
  });
};

exports["default"] = _default;

var hexValid = function hexValid(hex) {
  return hex.toLowerCase().match(/^[0-9a-f]{2}$/);
};

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/maxLength.js":
/*!************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/maxLength.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(length) {
  return (0, _common.withParams)({
    type: 'maxLength',
    max: length
  }, function (value) {
    return !(0, _common.req)(value) || (0, _common.len)(value) <= length;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/maxValue.js":
/*!***********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/maxValue.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(max) {
  return (0, _common.withParams)({
    type: 'maxValue',
    max: max
  }, function (value) {
    return !(0, _common.req)(value) || (!/\s/.test(value) || value instanceof Date) && +value <= +max;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/minLength.js":
/*!************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/minLength.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(length) {
  return (0, _common.withParams)({
    type: 'minLength',
    min: length
  }, function (value) {
    return !(0, _common.req)(value) || (0, _common.len)(value) >= length;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/minValue.js":
/*!***********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/minValue.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(min) {
  return (0, _common.withParams)({
    type: 'minValue',
    min: min
  }, function (value) {
    return !(0, _common.req)(value) || (!/\s/.test(value) || value instanceof Date) && +value >= +min;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/not.js":
/*!******************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/not.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(validator) {
  return (0, _common.withParams)({
    type: 'not'
  }, function (value, vm) {
    return !(0, _common.req)(value) || !validator.call(this, value, vm);
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/numeric.js":
/*!**********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/numeric.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.regex)('numeric', /^[0-9]*$/);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/or.js":
/*!*****************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/or.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default() {
  for (var _len = arguments.length, validators = new Array(_len), _key = 0; _key < _len; _key++) {
    validators[_key] = arguments[_key];
  }

  return (0, _common.withParams)({
    type: 'or'
  }, function () {
    var _this = this;

    for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
      args[_key2] = arguments[_key2];
    }

    return validators.length > 0 && validators.reduce(function (valid, fn) {
      return valid || fn.apply(_this, args);
    }, false);
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/required.js":
/*!***********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/required.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = (0, _common.withParams)({
  type: 'required'
}, function (value) {
  if (typeof value === 'string') {
    return (0, _common.req)(value.trim());
  }

  return (0, _common.req)(value);
});

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/requiredIf.js":
/*!*************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/requiredIf.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(prop) {
  return (0, _common.withParams)({
    type: 'requiredIf',
    prop: prop
  }, function (value, parentVm) {
    return (0, _common.ref)(prop, this, parentVm) ? (0, _common.req)(value) : true;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/requiredUnless.js":
/*!*****************************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/requiredUnless.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(prop) {
  return (0, _common.withParams)({
    type: 'requiredUnless',
    prop: prop
  }, function (value, parentVm) {
    return !(0, _common.ref)(prop, this, parentVm) ? (0, _common.req)(value) : true;
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/sameAs.js":
/*!*********************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/sameAs.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var _default = function _default(equalTo) {
  return (0, _common.withParams)({
    type: 'sameAs',
    eq: equalTo
  }, function (value, parentVm) {
    return value === (0, _common.ref)(equalTo, this, parentVm);
  });
};

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/validators/url.js":
/*!******************************************************!*\
  !*** ./node_modules/vuelidate/lib/validators/url.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;

var _common = __webpack_require__(/*! ./common */ "./node_modules/vuelidate/lib/validators/common.js");

var urlRegex = /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$/i;

var _default = (0, _common.regex)('url', urlRegex);

exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/vval.js":
/*!********************************************!*\
  !*** ./node_modules/vuelidate/lib/vval.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.h = h;
exports.patchChildren = patchChildren;

function isUndef(v) {
  return v === null || v === undefined;
}

function isDef(v) {
  return v !== null && v !== undefined;
}

function sameVval(oldVval, vval) {
  return vval.tag === oldVval.tag && vval.key === oldVval.key;
}

function createVm(vval) {
  var Vm = vval.tag;
  vval.vm = new Vm({
    data: vval.args
  });
}

function updateVval(vval) {
  var keys = Object.keys(vval.args);

  for (var i = 0; i < keys.length; i++) {
    keys.forEach(function (k) {
      vval.vm[k] = vval.args[k];
    });
  }
}

function createKeyToOldIdx(children, beginIdx, endIdx) {
  var i, key;
  var map = {};

  for (i = beginIdx; i <= endIdx; ++i) {
    key = children[i].key;
    if (isDef(key)) map[key] = i;
  }

  return map;
}

function updateChildren(oldCh, newCh) {
  var oldStartIdx = 0;
  var newStartIdx = 0;
  var oldEndIdx = oldCh.length - 1;
  var oldStartVval = oldCh[0];
  var oldEndVval = oldCh[oldEndIdx];
  var newEndIdx = newCh.length - 1;
  var newStartVval = newCh[0];
  var newEndVval = newCh[newEndIdx];
  var oldKeyToIdx, idxInOld, elmToMove;

  while (oldStartIdx <= oldEndIdx && newStartIdx <= newEndIdx) {
    if (isUndef(oldStartVval)) {
      oldStartVval = oldCh[++oldStartIdx];
    } else if (isUndef(oldEndVval)) {
      oldEndVval = oldCh[--oldEndIdx];
    } else if (sameVval(oldStartVval, newStartVval)) {
      patchVval(oldStartVval, newStartVval);
      oldStartVval = oldCh[++oldStartIdx];
      newStartVval = newCh[++newStartIdx];
    } else if (sameVval(oldEndVval, newEndVval)) {
      patchVval(oldEndVval, newEndVval);
      oldEndVval = oldCh[--oldEndIdx];
      newEndVval = newCh[--newEndIdx];
    } else if (sameVval(oldStartVval, newEndVval)) {
      patchVval(oldStartVval, newEndVval);
      oldStartVval = oldCh[++oldStartIdx];
      newEndVval = newCh[--newEndIdx];
    } else if (sameVval(oldEndVval, newStartVval)) {
      patchVval(oldEndVval, newStartVval);
      oldEndVval = oldCh[--oldEndIdx];
      newStartVval = newCh[++newStartIdx];
    } else {
      if (isUndef(oldKeyToIdx)) oldKeyToIdx = createKeyToOldIdx(oldCh, oldStartIdx, oldEndIdx);
      idxInOld = isDef(newStartVval.key) ? oldKeyToIdx[newStartVval.key] : null;

      if (isUndef(idxInOld)) {
        createVm(newStartVval);
        newStartVval = newCh[++newStartIdx];
      } else {
        elmToMove = oldCh[idxInOld];

        if (sameVval(elmToMove, newStartVval)) {
          patchVval(elmToMove, newStartVval);
          oldCh[idxInOld] = undefined;
          newStartVval = newCh[++newStartIdx];
        } else {
          createVm(newStartVval);
          newStartVval = newCh[++newStartIdx];
        }
      }
    }
  }

  if (oldStartIdx > oldEndIdx) {
    addVvals(newCh, newStartIdx, newEndIdx);
  } else if (newStartIdx > newEndIdx) {
    removeVvals(oldCh, oldStartIdx, oldEndIdx);
  }
}

function addVvals(vvals, startIdx, endIdx) {
  for (; startIdx <= endIdx; ++startIdx) {
    createVm(vvals[startIdx]);
  }
}

function removeVvals(vvals, startIdx, endIdx) {
  for (; startIdx <= endIdx; ++startIdx) {
    var ch = vvals[startIdx];

    if (isDef(ch)) {
      ch.vm.$destroy();
      ch.vm = null;
    }
  }
}

function patchVval(oldVval, vval) {
  if (oldVval === vval) {
    return;
  }

  vval.vm = oldVval.vm;
  updateVval(vval);
}

function patchChildren(oldCh, ch) {
  if (isDef(oldCh) && isDef(ch)) {
    if (oldCh !== ch) updateChildren(oldCh, ch);
  } else if (isDef(ch)) {
    addVvals(ch, 0, ch.length - 1);
  } else if (isDef(oldCh)) {
    removeVvals(oldCh, 0, oldCh.length - 1);
  }
}

function h(tag, key, args) {
  return {
    tag: tag,
    key: key,
    args: args
  };
}

/***/ }),

/***/ "./node_modules/vuelidate/lib/withParams.js":
/*!**************************************************!*\
  !*** ./node_modules/vuelidate/lib/withParams.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

/* provided dependency */ var process = __webpack_require__(/*! process/browser.js */ "./node_modules/process/browser.js");


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports["default"] = void 0;
var withParams = process.env.BUILD === 'web' ? (__webpack_require__(/*! ./withParamsBrowser */ "./node_modules/vuelidate/lib/withParamsBrowser.js").withParams) : (__webpack_require__(/*! ./params */ "./node_modules/vuelidate/lib/params.js").withParams);
var _default = withParams;
exports["default"] = _default;

/***/ }),

/***/ "./node_modules/vuelidate/lib/withParamsBrowser.js":
/*!*********************************************************!*\
  !*** ./node_modules/vuelidate/lib/withParamsBrowser.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.withParams = void 0;

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var root = typeof window !== 'undefined' ? window : typeof __webpack_require__.g !== 'undefined' ? __webpack_require__.g : {};

var fakeWithParams = function fakeWithParams(paramsOrClosure, maybeValidator) {
  if (_typeof(paramsOrClosure) === 'object' && maybeValidator !== undefined) {
    return maybeValidator;
  }

  return paramsOrClosure(function () {});
};

var withParams = root.vuelidate ? root.vuelidate.withParams : fakeWithParams;
exports.withParams = withParams;

/***/ })

}]);
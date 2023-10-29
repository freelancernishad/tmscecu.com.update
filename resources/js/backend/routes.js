let adminlayout = require('./components/layouts/adminlayout.vue').default;
let blanklayout = require('./components/layouts/blanklayout.vue').default;



// Auth Components

let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;

let fileupload = require('./components/fileupload.vue').default;


let applicationPermission = require('./components/applicationPermission.vue').default;
let tcVerifications = require('./components/tcVerifications.vue').default;


let profile = require('./components/profile.vue').default;

// Students Components
let students = require('./components/students/index.vue').default;
let studentsReports = require('./components/students/reports.vue').default;
let studentimage = require('./components/students/studentimage.vue').default;
let studentCard = require('./components/students/card.vue').default;
let studentedit = require('./components/students/form.vue').default;
let studentview = require('./components/students/view.vue').default;
let studentsform = require('./components/students/form.vue').default;
let studentsattendance = require('./components/students/attendance/index.vue').default;
let students_attendance_daily = require('./components/students/attendance/daily.vue').default;
let students_attendance_edit = require('./components/students/attendance/edit.vue').default;
let students_attendance_monthly = require('./components/students/attendance/monthly.vue').default;

let setGroup = require('./components/students/setGroup.vue').default;


// Staffs Components
let staffs = require('./components/staffs/index.vue').default;
let staffsImage = require('./components/staffs/staffsimage.vue').default;
let staffsedit = require('./components/staffs/form.vue').default;
let staffsview = require('./components/staffs/view.vue').default;
let staffsform = require('./components/staffs/form.vue').default;
let staffsattendance = require('./components/staffs/attendance/index.vue').default;
let staffs_attendance_daily = require('./components/staffs/attendance/daily.vue').default;
let staffs_attendance_edit = require('./components/staffs/attendance/edit.vue').default;
let staffs_attendance_monthly = require('./components/staffs/attendance/monthly.vue').default;
// let staffsattendanceview = require('./components/staffs/attendance.vue').default;


// payment Components
let payment = require('./components/payments/index.vue').default;
let payment_reports = require('./components/payments/reports.vue').default;
let paymentsearch = require('./components/payments/list.vue').default;
let paymentcreate = require('./components/payments/create.vue').default;


// routines Components
let routines = require('./components/routines/index.vue').default;
let routineslist = require('./components/routines/list.vue').default;
let routinescreateupdate = require('./components/routines/create.vue').default;


// routines Components
let notice = require('./components/notice/notice.vue').default;
let noticeForm = require('./components/notice/form.vue').default;
// let routinescreateupdate = require('./components/routines/create.vue').default;


// results Components
let results = require('./components/results/index.vue').default;
let resultlog = require('./components/results/log.vue').default;
let applicationResult = require('./components/results/applicationResult.vue').default;
let resultpublish = require('./components/results/resultpublish.vue').default;
let marksheet = require('./components/results/marksheet.vue').default;
let resultfilter = require('./components/results/list.vue').default;
let resultview = require('./components/results/fullsheetbyApi.vue').default;
// let resultview = require('./components/results/fullsheet.vue').default;

// results Components
let resultsoparetor = require('./components/resultsoparetor/index.vue').default;
let resultsoparetormarksheet = require('./components/resultsoparetor/marksheet.vue').default;
let resultsoparetorresultfilter = require('./components/resultsoparetor/list.vue').default;
let resultsoparetorresultview = require('./components/resultsoparetor/fullsheetbyApi.vue').default;
// let resultview = require('./components/resultsoparetor/fullsheet.vue').default;



// gallerys Components
let gallerys = require('./components/gallerys/index.vue').default;
let gallerysView = require('./components/gallerys/view.vue').default;
let gallerynew = require('./components/gallerys/form.vue').default;
let withcategory = require('./components/gallerys/withcategory.vue').default;

let categorys = require('./components/gallerys/category/index.vue').default;


// blogs Components
let blogs = require('./components/blogs/index.vue').default;
let blogsView = require('./components/blogs/view.vue').default;
let blognew = require('./components/blogs/form.vue').default;
let blogscategorylist = require('./components/blogs/withcategory.vue').default;

let blogcategorys = require('./components/blogs/category/index.vue').default;



// event Components
let events = require('./components/events/index.vue').default;
let eventsView = require('./components/events/view.vue').default;
let eventnew = require('./components/events/form.vue').default;

// event Components
let homeworks = require('./components/homework/index.vue').default;
let homeworksView = require('./components/homework/view.vue').default;
let homeworknew = require('./components/homework/form.vue').default;
let homeworkSubmit = require('./components/homework/homeworksubmit.vue').default;
let homeworkSubmitview = require('./components/homework/homeworksubmitview.vue').default;



let smsNotice = require('./components/notice/sms.vue').default;


let settings = require('./components/settings/index.vue').default;
let seoSettings = require('./components/settings/seo.vue').default;
let sliderSettings = require('./components/settings/slider.vue').default;


let chat = require('./components/chat.vue').default;



let questionbank = require('./components/questionbank/index.vue').default;
let questionbanknew = require('./components/questionbank/form.vue').default;


let onlineexam = require('./components/onlineexam/index.vue').default;
let onlineexamstart = require('./components/onlineexam/start.vue').default;
let onlineexamresult = require('./components/onlineexam/result.vue').default;
let onlineexamView = require('./components/onlineexam/view.vue').default;
let onlineexamnew = require('./components/onlineexam/form.vue').default;

let trxcheck = require('./components/trxcheck.vue').default;

let Assessmentcreate = require('./components/Assessment/create.vue').default;
let formFillupList = require('./components/formfilup/list.vue').default;


let fees = require('./components/fees/index.vue').default;
let feesedit = require('./components/fees/edit.vue').default;


let PageNotFound = require('./components/404.vue').default;



let prefix = '/dashboard'
export const routes = [

  //Auth Routes



  { path: `${prefix}/logout`, component: logout, name:'logout',meta: { layout: adminlayout } },

  { path: `${prefix}/student/img`, component: fileupload, name:'fileupload',meta: { layout: blanklayout } },


  { path: `${prefix}/application/permission`, component: applicationPermission, name:'applicationPermission',meta: { layout: blanklayout } },

  { path: `${prefix}/tc/verifications`, component: tcVerifications, name:'tcVerifications',meta: { layout: blanklayout } },


  { path: `${prefix}`, component: home, name:'home',meta: { layout: adminlayout } },

  { path:  `${prefix}/profile`, component: profile, name:'profile',meta: { layout: adminlayout } },



  // students Routes
  { path: `${prefix}/setGroup`, component: setGroup, name:'setGroup',meta: { layout: adminlayout } },

  { path: `${prefix}/students`, component: students, name:'students',meta: { layout: adminlayout } },
  { path: `${prefix}/students/reports`, component: studentsReports, name:'studentsReports',meta: { layout: adminlayout } },
  { path: `${prefix}/students/image/:id`, component: studentimage, name:'studentImage',meta: { layout: adminlayout } },
  { path: `${prefix}/students/edit/:id`, component: studentedit, name:'studentedit',meta: { layout: adminlayout } },
  { path: `${prefix}/students/view/:id`, component: studentview, name:'studentview',meta: { layout: adminlayout } },
  { path: `${prefix}/students/card`, component: studentCard, name:'studentCard',meta: { layout: adminlayout } },
  { path: `${prefix}/students/:classname/:status`, component: students, name:'studentssearch',meta: { layout: adminlayout } },
  { path: `${prefix}/students/form`, component: studentsform, name:'studentsform',meta: { layout: adminlayout } },
  { path: `${prefix}/students/attendance`, component: studentsattendance, name:'studentsattendance',meta: { layout: adminlayout } },
  { path: `${prefix}/students/attendance/Daily/:classname/:date`, component: students_attendance_daily, name:'students_attendance_daily',meta: { layout: adminlayout } },
  { path: `${prefix}/students/attendance/edit/:classname/:date/:id`, component: students_attendance_edit, name:'students_attendance_edit',meta: { layout: adminlayout } },
  { path: `${prefix}/students/attendance/Monthly/:classname/:date`, component: students_attendance_monthly, name:'students_attendance_monthly',meta: { layout: adminlayout } },

  // Staffs Routes
  { path: `${prefix}/staffs`, component: staffs, name:'staffs',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/image/:id`, component: staffsImage, name:'staffsImage',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/edit/:id`, component: staffsedit, name:'Staffsedit',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/view/:id`, component: staffsview, name:'Staffsview',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/form`, component: staffsform, name:'staffsform',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/attendance`, component: staffsattendance, name:'staffsattendance',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/attendance/Daily/:date`, component: staffs_attendance_daily, name:'staffs_attendance_daily',meta: { layout: adminlayout } },
  { path: `${prefix}/staffs/attendance/edit/:date/:id`, component: staffs_attendance_edit, name:'staffs_attendance_edit',meta: { layout: adminlayout } },

  { path: `${prefix}/staffs/attendance/Monthly/:date`, component: staffs_attendance_monthly, name:'staffs_attendance_monthly',meta: { layout: adminlayout } },



  // payment Routes
  { path: `${prefix}/payment`, component: payment, name:'payment',meta: { layout: adminlayout } },
  { path: `${prefix}/payment/reports`, component: payment_reports, name:'payment_reports',meta: { layout: adminlayout } },
  { path: `${prefix}/payment/:classname/:year/:month/:type`, component: paymentsearch, name:'paymentsearch',meta: { layout: adminlayout } },
  { path: `${prefix}/payment/:create/:classname/:year/:month/:type/:id`, component: paymentcreate, name:'paymentcreate',meta: { layout: adminlayout } },
  { path: `${prefix}/payment/:create/:id`, component: paymentcreate, name:'paymentedit',meta: { layout: adminlayout } },




  // routne Routes
  { path: `${prefix}/notice`, component: notice, name:'notice',meta: { layout: adminlayout } },
  { path: `${prefix}/notice/create`, component: noticeForm, name:'noticeCreate',meta: { layout: adminlayout } },
  { path: `${prefix}/notice/edit/:id`, component: noticeForm, name:'noticeEdit',meta: { layout: adminlayout } },
//   { path: `${prefix}/routines/:classname/:school_id`, component: routineslist, name:'routineslist',meta: { layout: adminlayout } },
//   { path: `${prefix}/routines/:create/:classname/:school_id/:year`, component: routinescreateupdate, name:'routinescreateupdate',meta: { layout: adminlayout } },



  // routne Routes
  { path: `${prefix}/routines`, component: routines, name:'routines',meta: { layout: adminlayout } },
  { path: `${prefix}/routines/:classname/:school_id`, component: routineslist, name:'routineslist',meta: { layout: adminlayout } },
  { path: `${prefix}/routines/:create/:classname/:school_id/:year`, component: routinescreateupdate, name:'routinescreateupdate',meta: { layout: adminlayout } },




  // result Routes
  { path: `${prefix}/results`, component: results, name:'results',meta: { layout: adminlayout } },
  { path: `${prefix}/results/log`, component: resultlog, name:'resultlog',meta: { layout: adminlayout } },
  { path: `${prefix}/results/application/Result`, component: applicationResult, name:'applicationResult',meta: { layout: adminlayout } },

//   { path: `${prefix}/results/publish/:school_id/:student_class/:group/:religion/:subject/:examType/:date`, component: resultpublish, name:'resultpublish',meta: { layout: adminlayout } },

  { path: `${prefix}/results/marksheet`, component: marksheet, name:'marksheet',meta: { layout: adminlayout } },
  { path: `${prefix}/results/:school_id/:student_class/:group/:religion/:subject/:examType/:date`, component: resultfilter, name:'resultfilter',meta: { layout: adminlayout } },
  { path: `${prefix}/results/view/:school_id/:student_class/:group/:religion/:subject/:examType/:date`, component: resultview, name:'resultview',meta: { layout: blanklayout } },



  // result Routes


  { path: `${prefix}/only/result`, component: resultsoparetor, name:'resultsoparetor',meta: { layout: blanklayout } },
  { path: `${prefix}/only/results/marksheet`, component: resultsoparetormarksheet, name:'resultsoparetormarksheet',meta: { layout: blanklayout } },
  { path: `${prefix}/only/results/:school_id/:student_class/:group/:religion/:subject/:examType/:date`, component: resultsoparetorresultfilter, name:'resultsoparetorresultfilter',meta: { layout: blanklayout } },
  { path: `${prefix}/only/results/view/:school_id/:student_class/:group/:religion/:subject/:examType/:date`, component: resultsoparetorresultview, name:'resultsoparetorresultview',meta: { layout: blanklayout } },





  // gallery Routes
  { path: `${prefix}/gallery_category`, component: categorys, name:'categorys',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery_category/:id`, component: categorys, name:'categoryedit',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery`, component: gallerys, name:'gallerys',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery/view/:id`, component: gallerysView, name:'gallerysView',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery/edit/:id`, component: gallerynew, name:'galleryEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery/new`, component: gallerynew, name:'gallerynew',meta: { layout: adminlayout } },
  { path: `${prefix}/gallery/:category`, component: withcategory, name:'galleryscategory',meta: { layout: adminlayout } },





  // blog Routes
  { path: `${prefix}/blog_category`, component: blogcategorys, name:'blogcategorys',meta: { layout: adminlayout } },
  { path: `${prefix}/blog_category/:id`, component: blogcategorys, name:'blogcategoryedit',meta: { layout: adminlayout } },
  { path: `${prefix}/blog`, component: blogs, name:'blogs',meta: { layout: adminlayout } },
  { path: `${prefix}/blog/view/:id`, component: blogsView, name:'blogsView',meta: { layout: adminlayout } },
  { path: `${prefix}/blog/edit/:id`, component: blognew, name:'blogEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/blog/new`, component: blognew, name:'blognew',meta: { layout: adminlayout } },
  { path: `${prefix}/blog/:category`, component: blogscategorylist, name:'blogscategory',meta: { layout: adminlayout } },




  // events Routes
  { path: `${prefix}/event`, component: events, name:'events',meta: { layout: adminlayout } },
  { path: `${prefix}/event/view/:id`, component: eventsView, name:'eventsView',meta: { layout: adminlayout } },
  { path: `${prefix}/event/edit/:id`, component: eventnew, name:'eventEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/event/new`, component: eventnew, name:'eventnew',meta: { layout: adminlayout } },


  // homeworks Routes
  { path: `${prefix}/homework`, component: homeworks, name:'homeworks',meta: { layout: adminlayout } },
  { path: `${prefix}/homework/view/:id`, component: homeworksView, name:'homeworksView',meta: { layout: adminlayout } },
  { path: `${prefix}/homework/edit/:id`, component: homeworknew, name:'homeworkEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/homework/submit/:id`, component: homeworkSubmit, name:'homeworkSubmit',meta: { layout: adminlayout } },
  { path: `${prefix}/homework/submit/view/:school_id/:student_id/:homework_id`, component: homeworkSubmitview, name:'homeworkSubmitview',meta: { layout: adminlayout } },
  { path: `${prefix}/homework/new`, component: homeworknew, name:'homeworknew',meta: { layout: adminlayout } },


//   notice
  { path: `${prefix}/notice/sms`, component: smsNotice, name:'smsNotice',meta: { layout: adminlayout } },


  { path: `${prefix}/settings`, component: settings, name:'settings',meta: { layout: adminlayout } },
  { path: `${prefix}/settings/seo`, component: seoSettings, name:'seoSettings',meta: { layout: adminlayout } },
  { path: `${prefix}/settings/slider`, component: sliderSettings, name:'sliderSettings',meta: { layout: adminlayout } },
  { path: `${prefix}/chat`, component: chat, name:'chat',meta: { layout: adminlayout } },
  { path: `${prefix}/questionbank`, component: questionbank, name:'questionbank',meta: { layout: adminlayout } },
  { path: `${prefix}/questionbank/edit/:id`, component: questionbanknew, name:'questionbankEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/questionbank/new`, component: questionbanknew, name:'questionbanknew',meta: { layout: adminlayout } },




  { path: `${prefix}/onlineexam`, component: onlineexam, name:'onlineexam',meta: { layout: adminlayout } },
  { path: `${prefix}/onlineexam/start/:id`, component: onlineexamstart, name:'onlineexamstart',meta: { layout: adminlayout } },
  { path: `${prefix}/onlineexam/result/:school_id/:student_id/:exam_id`, component: onlineexamresult, name:'onlineexamresult',meta: { layout: adminlayout } },
  { path: `${prefix}/onlineexam/view/:id`, component: onlineexamView, name:'onlineexamView',meta: { layout: adminlayout } },
  { path: `${prefix}/onlineexam/edit/:id`, component: onlineexamnew, name:'onlineexamEdit',meta: { layout: adminlayout } },
  { path: `${prefix}/onlineexam/new`, component: onlineexamnew, name:'onlineexamnew',meta: { layout: adminlayout } },



  { path: `${prefix}/fees/:name`, component: fees, name:'fees',meta: { layout: adminlayout } },
  { path: `${prefix}/fees/edit/:id`, component: feesedit, name:'feesedit',meta: { layout: adminlayout } },




  { path:  `${prefix}/check/trx`, component: trxcheck, name:'trxcheck',meta: { layout: adminlayout } },




  { path:  `${prefix}/assessments/create`, component: Assessmentcreate, name:'Assessmentcreate',meta: { layout: adminlayout } },



  { path:  `${prefix}/assessments/single/create`, component: Assessmentcreate, name:'Assessmentsinglecreate',meta: { layout: blanklayout } },


  { path:  `${prefix}/form/fill/up`, component: formFillupList, name:'formFillupList',meta: { layout: blanklayout } },










  { path: "*", component: PageNotFound }

]

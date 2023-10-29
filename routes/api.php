<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TCController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\api\smsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\api\BlogController;
use App\Http\Controllers\frontendController;
use  App\Http\Controllers\api\authController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\ResultLogController;
use App\Http\Controllers\SchoolFeeController;
use App\Http\Controllers\api\resultController;
use App\Http\Controllers\api\staffsController;
use App\Http\Controllers\countryApiController;
use App\Http\Controllers\OnlineexamController;
use App\Http\Controllers\api\GalleryController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\RoutineController;

use App\Http\Controllers\api\HomeworkController;
use App\Http\Controllers\api\studentsController;
use App\Http\Controllers\QuestionbankController;
use App\Http\Controllers\api\SchoolDetailController;
use App\Http\Controllers\AssessmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [authController::class,'login']);
    Route::post('register', [authController::class,'register']);
    Route::post('logout', [authController::class,'logout']);
    Route::post('refresh', [authController::class,'refresh']);
    Route::post('me', [authController::class,'login']);

});


Route::get('/tc', [TCController::class, 'index']);
Route::post('/tc', [TCController::class, 'createTC']);
Route::get('/tc/{id}', [TCController::class, 'getTC']);



// country api
Route::get('/getdivisions', [countryApiController::class,'getdivisions']);
Route::get('/getdistrict', [countryApiController::class,'getdistrict']);
Route::get('/getthana', [countryApiController::class,'getthana']);
Route::get('/getunioun', [countryApiController::class,'getunioun']);
Route::get('/gotoUnion', [countryApiController::class,'gotoUnion']);




Route::post('update/users',[RoleController::class,'updateuser']);

Route::post('/ipn',[PaymentController::class ,'ipn']);

Route::post('/re/call/ipn',[PaymentController::class ,'ReCallIpn']);


Route::post('/check/payments/ipn',[PaymentController::class ,'AkpayPaymentCheck']);


Route::get('/get/annually/report',[PaymentController::class ,'getAnnuallyReport']);



Route::post('/payment/report',[PaymentController::class ,'reports']);
Route::get('/payment/counting',[PaymentController::class ,'paymentCounting']);
Route::post('/payment/data/search',[PaymentController::class ,'Search']);


Route::get('student/applicant/copy/{applicant_id}',[studentsController::class , 'applicant_copy_html']);
Route::post('/student/data/search',[studentsController::class ,'Search']);


Route::get('get/balance',[MessageController::class ,'getBalance']);




Route::get('/users/get',[MessageController::class ,'usersget']);
Route::get('/conversion/get',[MessageController::class ,'conversionget']);
Route::get('/messages/get',[MessageController::class ,'messagesget']);
Route::post('/message/sent',[MessageController::class ,'messagessent']);



Route::get('/student_at_a_glance',[frontendController::class ,'student_at_a_glance']);



Route::post('/users/checks',[SchoolDetailController::class ,'userscheck']);
Route::get('/school_id',[SchoolDetailController::class , 'school_id']);
Route::get('/classes',[SchoolDetailController::class , 'class_list']);
Route::get('/years/list', [SchoolDetailController::class,'yearslist']);
Route::get('/imagetobase64', [SchoolDetailController::class,'base64']);

Route::get('/school/settings',[SchoolDetailController::class , 'index']);
Route::post('/school/settings/submit',[SchoolDetailController::class , 'school_update']);

//student routes
Route::post('/students/reports',[studentsController::class , 'reports']);
Route::get('/students/all/reports',[studentsController::class , 'allReports']);

Route::get('/students/list',[studentsController::class , 'list']);

Route::get('/students/for/change/group',[studentsController::class , 'listforGroup']);

Route::get('/get/pending/student',[studentsController::class , 'getStudents']);

Route::post('/approve/pending/student',[studentsController::class , 'approveStudents']);

Route::post('/student/permission',[studentsController::class , 'permissionAction']);


Route::get('/students/image/get',[studentsController::class , 'imageget']);
Route::post('/students/image/upload',[studentsController::class , 'imageupload']);
Route::get('/students/single',[studentsController::class , 'singlestudent']);
Route::post('/students/form/submit',[studentsController::class , 'student_submit']);
Route::post('/student/{action}',[studentsController::class , 'student_action']);
Route::get('/check/student/roll',[studentsController::class , 'student_roll_check']);
Route::get('/student/check',[studentsController::class , 'student_check']);

Route::get('/student/admissionid/genarate',[studentsController::class , 'AdmissionIdgenarate']);

Route::get('/student/attendance',[studentsController::class , 'student_attendance']);
Route::get('/student/attendance/count',[studentsController::class , 'student_attendance_count']);
Route::post('/student/attendance/submit',[studentsController::class , 'student_attendance_submit']);
Route::get('/student/attendance/row',[studentsController::class , 'student_attendance_row']);

Route::get('/get/form/fillup/students',[studentsController::class , 'formfillupstudents']);


Route::post('/student/transferto/old',[studentsController::class , 'transertoOld']);




//staffs routes
Route::get('/staffs/list',[staffsController::class , 'list']);
Route::get('/staffs/image/get',[staffsController::class , 'imageget']);
Route::post('/staffs/image/upload',[staffsController::class , 'imageupload']);

Route::get('/staffs/single',[staffsController::class , 'singlestaff']);
Route::post('/staffs/form/submit',[staffsController::class , 'staff_submit']);
Route::post('/staff/{action}',[staffsController::class , 'staff_action']);
Route::get('/staff/attendance',[staffsController::class , 'staff_attendance']);
Route::post('/staff/attendance/submit',[staffsController::class , 'staff_attendance_submit']);


//students/payments routes
Route::get('/students/payments',[PaymentController::class , 'payments']);
Route::post('/students/payments/submit',[PaymentController::class , 'payments_submit']);


//routine routes
Route::get('/routines',[RoutineController::class , 'list']);
Route::get('/routines/get',[RoutineController::class , 'all_list']);
Route::get('/routines/check',[RoutineController::class , 'check']);
Route::post('/routines/submit',[RoutineController::class , 'submit']);


//result routes
Route::get('/results',[resultController::class , 'Result']);


Route::post('/results/submit',[resultController::class , 'submit']);

Route::get('/all/results/list',[resultController::class , 'AllResultList']);

Route::get('/full/results',[resultController::class , 'fullResult']);

Route::get('/results/check',[resultController::class , 'checkResult']);
Route::get('/public/result/search',[resultController::class , 'searchResult']);
Route::get('/results/single',[resultController::class , 'checkSingleResult']);
Route::post('/results/publish',[resultController::class , 'publishResult']);
Route::post('/results/publish/list',[resultController::class , 'ResultPublish']);



//gallery routes

Route::get('/gallery',[GalleryController::class , 'index']);
Route::get('/gallery/edit',[GalleryController::class , 'galleryedit']);
Route::get('/gallery/delete/{id}',[GalleryController::class , 'galleryDelete']);
Route::get('/gallery_category',[GalleryController::class , 'category']);
Route::get('/gallery_category/delete/{id}',[GalleryController::class , 'categoryDelete']);
Route::post('/gallery_category/submit',[GalleryController::class , 'category_submit']);
Route::post('/gallery/submit',[GalleryController::class , 'gallery_submit']);



//blog routes

Route::get('/blog',[BlogController::class , 'index']);
Route::get('/blog/edit',[BlogController::class , 'blogedit']);
Route::get('/blog/delete/{id}',[BlogController::class , 'blogDelete']);
Route::get('/blog_category',[BlogController::class , 'category']);
Route::get('/blog_category/delete/{id}',[BlogController::class , 'categoryDelete']);
Route::post('/blog_category/submit',[BlogController::class , 'category_submit']);
Route::post('/blog/submit',[BlogController::class , 'blog_submit']);


//event routes

Route::get('/event',[EventController::class , 'index']);
Route::get('/event/edit',[EventController::class , 'eventedit']);
Route::get('/event/delete/{id}',[EventController::class , 'eventDelete']);
Route::post('/event/submit',[EventController::class , 'event_submit']);

//Notice routes
Route::resources([
	'notice' => NoticeController::class,
	'fees' => SchoolFeeController::class,

]);


//homework routes

Route::get('/homework',[HomeworkController::class , 'index']);
Route::get('/homework/edit',[HomeworkController::class , 'homeworkedit']);
Route::get('/homework/delete/{id}',[HomeworkController::class , 'homeworkDelete']);
Route::post('/homework/submit',[HomeworkController::class , 'homework_submit']);
Route::post('/student/homework/submit',[HomeworkController::class , 'student_homework_submit']);
Route::get('/student/homework/submit/check',[HomeworkController::class , 'student_homework_check']);
Route::get('/student/homework/time/check',[HomeworkController::class , 'student_homework_timecheck']);



Route::post('/sent_sms/submit',[smsController::class , 'sent_sms_submit']);
Route::get('/attendence_sheet/sms/{class}/{view}/{date}/{school_id}',[smsController::class , 'attendence_sheet_sms']);



Route::get('/questionbank',[QuestionbankController::class , 'index']);
Route::get('/questionbank/edit',[QuestionbankController::class , 'questionbankedit']);
Route::get('/questionbank/delete/{id}',[QuestionbankController::class , 'questionbankDelete']);
Route::post('/questionbank/submit',[QuestionbankController::class , 'questionbank_submit']);


Route::get('/onlineexam',[OnlineexamController::class , 'index']);
Route::get('/onlineexam/view',[OnlineexamController::class , 'examview']);
Route::post('/onlineexam/start',[OnlineexamController::class , 'examstart']);
Route::get('/onlineexam/edit',[OnlineexamController::class , 'onlineexamsedit']);
Route::get('/onlineexam/delete/{id}',[OnlineexamController::class , 'onlineexamsDelete']);
Route::post('/onlineexam/submit',[OnlineexamController::class , 'onlineexams_submit']);


Route::post('visitorcreate',[VisitorController::class, 'visitorcreate']);
Route::get('visitorcount',[VisitorController::class, 'visitorCount']);


Route::post('resultlogCount',[ResultLogController::class,'index']);
Route::post('result/edit/mode',[ResultLogController::class,'editmode']);
Route::get('result/log',[ResultLogController::class,'indexlist']);


Route::get('/answeres',[OnlineexamController::class , 'answeres']);


Route::get('/school/fees',[SchoolFeeController::class , 'index']);
Route::get('/school/fees/{id}',[SchoolFeeController::class , 'show']);
Route::post('/school/update/fees',[SchoolFeeController::class , 'update']);





Route::get('/assessments',[AssessmentController::class , 'getStudentAssessment']);
Route::post('/assessments',[AssessmentController::class , 'store']);
Route::get('/assessment/students',[AssessmentController::class , 'getStudent']);

    // Route::prefix('v1')->group(function () {




    //     Route::post('login', [authController::class, 'login']);
    //     Route::post('register', [authController::class, 'register']);

    //     Route::get('login', function () {
    //         return sent_error('Unauthorised', '', 401);
    //     })->name('login');

    //     Route::middleware('auth:api')->group(function () {

    //         Route::post('logout', [authController::class, 'logout']);


    //         Route::get('users', [authController::class, 'index']);
    //         Route::post('users/{id}/edit', [authController::class, 'Edit']);
    //         Route::delete('users/{id}/delete', [authController::class, 'delete']);
    //         Route::get('users/restore/{id}', [authController::class, 'restore']);
    //         Route::get('users/restore/', [authController::class, 'restoreAll']);
    //         Route::get('users/deleted/', [authController::class, 'deleted']);
    //         Route::get('users/{id}', [authController::class, 'show']);
    //     });
    // });

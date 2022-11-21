<?php
use App\Models\Role;
use App\Models\Visitor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\frontendController;
use App\Http\Controllers\api\resultController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\RoutineController;

use App\Http\Controllers\api\studentsController;
use App\Http\Controllers\NotificationsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/smstest', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    $subject = 'hello subject';

    \Mail::to('freelancernishad123@gmail.com')->send(new \App\Mail\MyTestMail($details,$subject));

    dd("Email is Sent.");


});

Route::get('details',[NotificationsController::class,'details']);




Route::get('/unioncreate', function () {

return view('unioncreate');


});



Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);
// Route::group(['middleware' => ['is_admin']], function() {
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
// Route::group(['middleware' => ['CustomerMiddleware']], function() {
// Route::get('/sub', [App\Http\Controllers\HomeController::class, 'sub'])->name('sub');
// });







Route::get('/report/export', [PaymentController::class,'export']);


Route::get('/allow/application/notification', function () {

    return view('applicationNotification');


    });

    Route::get('pdfgen', function () {

        return view('pdftest');
        });
        Route::get('school/payment/invoice/{id}',[PaymentController::class , 'invoice']);
        Route::get('/pdf/{school_id}/{class}/{roll}/{year}/{exam}',[frontendController::class ,'view_result_pdf']);

        Route::get('/routines/{school_id}/{class}/{year}/download',[RoutineController::class , 'routine_download'])->name('routines.routine_download');




Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function() {


        // Route::get('students/card',[studentsController::class , 'card_form']);
        Route::post('students/card/submit',[studentsController::class , 'card_form_submit']);
        Route::get('student/card/{class}/{id}/{school_id}',[studentsController::class , 'card']);

        Route::get('/attendence_sheet/pdf/{school_id}/{class}/{view}/{date}',[studentsController::class , 'attendence_sheet_result_pdf']);

        Route::get('student/{school_id}/{class}/{year}/{type}/paymnetsheet', [PaymentController::class,'paymentsheet']);

      Route::get('/result_sheet/pdf/{school_id}/{group}/{class}/{exam}/All/{date}',[resultController::class , 'resultViewpdf']);

      Route::get('/student_list/pdf/{year}/{class}/{school_id}',[studentsController::class ,'student_list_pdf']);






    Route::get('/{vue_capture?}', function () {
        // return   Auth::user()->roles->permission;
        //   Auth::user()->roles;
          $roles = Role::all();
           $classess = json_encode(['Play', 'Nursery', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten']);



        return view('layout',compact('roles','classess'));
    })->where('vue_capture', '[\/\w\.-]*')->name('dashboard');
});
Route::get('/{vue_capture?}', function () {



        // return  Uniouninfo::find(1);
 $uniounDetials['defaultColor']  = 'green';
      $uniounDetials = json_decode(json_encode($uniounDetials));
      $classess = json_encode(['Play', 'Nursery', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten']);


     return view('frontlayout',compact('uniounDetials','classess'));

})->where('vue_capture', '[\/\w\.-]*')->name('frontend');

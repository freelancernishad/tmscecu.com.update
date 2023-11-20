<?php
use App\Models\Role;
use App\Models\payment;
use App\Models\student;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\school_detail;
use App\Models\StudentResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
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
use App\Http\Controllers\TCController;
use App\Models\TC;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
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
Route::get('genrate-sitemap', function () {
    // create new sitemap object
    $sitemap = App::make("sitemap");
    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('teachers'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('student_at_a_glance'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('student_list'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
    $sitemap->add(URL::to('routine'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('result'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('weakly_result'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('web/notice'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('blogs'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('contact-us'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('student/register'), '2012-08-26T12:30:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('student/payment'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
    // // get all posts from db
    // $categories = Category::all();
    // // add every post to the sitemap
    // foreach ($categories as $category)
    // {
    //     $sitemap->add(URL::to('categories/'.$category->id.'/edit'), $category->updated_at, '1.0', 'daily');
    // }
    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder
    return redirect(url('sitemap.xml'));
});

Route::get('/sent/ekpay/ip', function () {



$curl = curl_init();

 $apiUrl = 'https://tepriganjhighschool.edu.bd/get/ekpay/ip';
curl_setopt_array($curl, array(
  CURLOPT_URL => $apiUrl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

});

Route::get('/get/ekpay/ip', function () {

    Log::info($_SERVER['REMOTE_ADDR']);
    return $_SERVER['REMOTE_ADDR'];

});







Route::get('/smstest', function () {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    $subject = 'hello subject';
    \Mail::to('freelancernishad123@gmail.com')->send(new \App\Mail\MyTestMail($details, $subject));
    dd("Email is Sent.");
});
Route::get('details', [NotificationsController::class, 'details']);
Route::get('/unioncreate', function () {
    return view('unioncreate');
});
Route::get('/inviceverify', function (Request $request) {
    $trx = $request->trx;
    return redirect("/student/applicant/invoice/$trx");
});


Route::get('/payment/success', function (Request $request) {
    // return $request->all();
    $transId = $request->transId;

    $payment = payment::where(['trxid'=>$transId])->first();
    $type = $payment->type;

    if($type=='TC'){
        $url = "/tc/success/confirm?transId=$transId";
    }else{
        $url = "/payment/success/confirm?transId=$transId";

    }



    echo "
    <h3 style='text-align:center;'>Please wait 10 seconds.This page will auto redirect you</h3>
    <script>
    setTimeout(() => {
    window.location.href='$url'
    }, 10000);
    </script>
    ";
    // return redirect("/payment/success/confirm?transId=$transId");
});




Route::get('/payment/success/confirm', function (Request $request) {
    // return $request->all();
    $transId = $request->transId;
      $payment = payment::where(['trxid' => $transId, 'status' => 'Paid'])->first();

    $paymentType = $payment->type;
    if($paymentType=='marksheet'){
        $restult = StudentResult::find($payment->studentId);
         $resultcode = $restult->class.$restult->roll.$restult->year.time();
        $restult->update(['marksheetCode'=>$resultcode]);
        return redirect("/marksheet/$restult->marksheetCode");

    }




    if ($paymentType == 'Admission_fee') {
        $AdmissionID = $payment->admissionId;
        $student = student::where(['AdmissionID' => $AdmissionID])->first();
        return view('applicationSuccess', compact('payment', 'student'));
    }else if ($paymentType == 'TC') {
           return redirect(url('/tc/success/confirm?transId=' . $transId));

    } else {
       return redirect(url('/student/applicant/invoice/' . $transId));
    }
    // return redirect("/student/applicant/copy/$payment->admissionId");
});






Route::get('/tc/success/confirm', function (Request $request) {
    // return $request->all();
    $transId = $request->transId;
    $payment = payment::where(['trxid' => $transId, 'status' => 'Paid'])->first();
    if($payment){
        $tc = TC::where(['studentId'=>$payment->studentId,'status'=>'active','paymentStatus'=>'Paid'])->first();
        if($tc){
            $paymentType = $payment->type;
            return redirect(url('/student/tc/' . $tc->token));
        }else{
            return "Data Not Found";
        }
    }else{
        return "Data Not Found";
    }

});








Route::get('/payment/fail', function (Request $request) {
    $transId = $request->transId;
    $payment = payment::where('trxid', $transId)->first();
    return redirect("/student/payment?adminssionId=$payment->admissionId&type=$payment->type");
});
Route::get('/payment/cancel', function (Request $request) {
    $transId = $request->transId;
    $payment = payment::where('trxid', $transId)->first();
    return redirect("/student/payment?adminssionId=$payment->admissionId&type=$payment->type");
});
Auth::routes([
    'login' => false,
]);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
// Route::group(['middleware' => ['is_admin']], function() {
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
// Route::group(['middleware' => ['CustomerMiddleware']], function() {
// Route::get('/sub', [App\Http\Controllers\HomeController::class, 'sub'])->name('sub');
// });
Route::get('/payment', [PaymentController::class, 'paymentCreate']);
Route::get('/report/export', [PaymentController::class, 'export']);
Route::get('/allow/application/notification', function () {
    return view('applicationNotification');
});
Route::get('pdfgen', function () {
    return view('pdftest');
});


Route::get('student/applicant/copy/{applicant_id}', [studentsController::class, 'applicant_copy']);
Route::get('student/applicant/invoice/{trxid}', [studentsController::class, 'applicant_invoice']);
Route::get('/student/exam/admit/{admissionId}/{ex_name}', [studentsController::class, 'exam_admit']);


Route::get('/student/tc/{token}', [TCController::class, 'tc']);


Route::get('student/m/{class}/{bisoy}', [studentsController::class, 'Mullayon']);



Route::get('download/mark', [resultController::class, 'marksheet']);


Route::get('addmission/approve/Result', [resultController::class, 'addmissionResult']);




Route::get('school/payment/invoice/{id}', [PaymentController::class, 'invoice']);
Route::get('/pdf/{school_id}/{class}/{roll}/{year}/{exam}/{group}', [frontendController::class, 'view_result_pdf']);

Route::get('/marksheet/{marksheetCode}', [frontendController::class, 'PublicMarkSheet']);


Route::get('/routines/{school_id}/{class}/{year}/download', [RoutineController::class, 'routine_download'])->name('routines.routine_download');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {



    Route::post('/set/group', function (Request $request) {

        // return $request->all();
        foreach ($request->AdmissionID as $value) {


            $StudentRoll = $request->StudentRoll[$value];
            $StudentGroup = $request->StudentGroup[$value];
            $StudentSubject = $request->StudentSubject[$value];

           $updatedata = [
            'StudentRoll'=>$StudentRoll,
            'StudentGroup'=>$StudentGroup,
            'StudentSubject'=>$StudentSubject,
           ];

           $GetStudent = student::where(['AdmissionID'=>$value])->first();
           $GetStudent->update($updatedata);

        }
        return redirect()->back();

    });

    Route::get('/set/group', function (Request $request) {

        $HumanitiesStudnets = student::where(['StudentClass'=>'Nine','StudentGroup'=>'Humanities','Year'=>date('Y'),'StudentStatus'=>'Active'])->orderBy('StudentRoll','asc')->get();
        $ScienceStudnets = student::where(['StudentClass'=>'Nine','StudentGroup'=>'Science','Year'=>date('Y'),'StudentStatus'=>'Active'])->orderBy('StudentRoll','asc')->get();

        $students = student::where(['StudentClass'=>'Nine','Year'=>date('Y'),'StudentStatus'=>'Active','StudentGroup'=>'Humanities'])->orderBy('StudentRoll','asc')->get();

        return view('groupset',compact('HumanitiesStudnets','ScienceStudnets','students'));
    });


    Route::get('/results/publish/{school_id}/{student_class}/{group}/{examType}/{year}', function (Request $request,$school_id, $student_class, $group, $examType, $year) {
        $filter = [
            'school_id' => $school_id,
            'class' => $student_class,
            'year' => $year,
            'exam_name' => $examType,
            'class_group' => $group,
        ];
        $veiwType = $request->veiwType;
        // $filter['status'] = 'Published';
        if($veiwType=='noticePdf'){

            $results = StudentResult::where($filter)->where('FinalResultStutus','!=','inhaled')->where('GPA','!=','F')->orderBy('failed', 'asc')->orderBy('total', 'desc')->get();
        }else{
            $results = StudentResult::where($filter)->orderBy('failed', 'asc')->orderBy('total', 'desc')->get();

        }




         $schoolDetails = school_detail::where('school_id',$school_id)->first();
         $pdfFileName = date('d-m-Y').'.pdf';
         if($veiwType=='noticePdf'){


            return PdfMaker('A4',$school_id,view('admin/pdfReports.promotionResult',compact('results','pdfFileName','veiwType','schoolDetails')),$pdfFileName);


         }elseif($veiwType=='schoolPdf'){
            return PdfMaker('A4',$school_id,view('admin/pdfReports.promotionResult',compact('results','pdfFileName','veiwType','schoolDetails')),$pdfFileName);
         }else{
             return view('resultpublish', compact('results','filter','schoolDetails'));

         }

    });

    Route::get('/student/info/download/{id}', function (Request $request,$id) {
        $student = student::find($id);
        $pdfFileName = $student->StudentNameEn.'.pdf';
        $school_id = $student->school_id;
        $schoolDetails = school_detail::where('school_id',$school_id)->first();
        // return view('admin/pdfReports.studentInfo',compact('student','pdfFileName','schoolDetails'));
        return PdfMaker('A4',$school_id,view('admin/pdfReports.studentInfo',compact('student','pdfFileName','schoolDetails')),$pdfFileName);

    });






    Route::post('/results/publish/list', [resultController::class, 'ResultPublish']);
    Route::get('/results/promotion/{school_id}/{student_class}/{group}/{examType}/{year}', function ($school_id, $student_class, $group, $examType, $year) {
        $filter = [
            'school_id' => $school_id,
            'class' => $student_class,
            'year' => $year,
            'exam_name' => $examType,
            'class_group' => $group,
        ];
        $results = StudentResult::where($filter)->orderBy('failed', 'asc')->orderBy('total', 'desc')->get();
        $schoolDetails = school_detail::where('school_id',$school_id)->first();
        return view('promotion', compact('results','filter','schoolDetails'));
    });
    Route::post('/results/promotion/list', [resultController::class, 'Resultpromotion']);
    Route::get('/import', function () {
        return view('import');
    });
    Route::post('import', [studentsController::class, 'import']);
    // Route::get('students/card',[studentsController::class , 'card_form']);
    Route::post('students/card/submit', [studentsController::class, 'card_form_submit']);
    Route::get('student/card/{class}/{id}/{school_id}', [studentsController::class, 'card']);
    Route::get('/attendence_sheet/pdf/{school_id}/{class}/{view}/{date}', [studentsController::class, 'attendence_sheet_result_pdf']);


    Route::get('student/{school_id}/{class}/{year}/{type}/paymnetsheet', [PaymentController::class, 'paymentsheet']);


    Route::get('student/paymnetsheet/annual', [PaymentController::class, 'paymentsheetAnnual']);


    Route::get('payment/report', [PaymentController::class, 'paymentReport']);
    Route::get('student/report', [studentsController::class, 'reports']);

    Route::get('download/student/reports', [frontendController::class, 'student_at_a_glance']);

    Route::get('/get/form/fillup/students',[studentsController::class , 'formfillupstudentsPdf']);



    Route::get('/result_sheet/pdf/{school_id}/{group}/{class}/{exam}/All/{date}', [resultController::class, 'resultViewpdf']);
    Route::get('/student_list/pdf/{year}/{class}/{school_id}', [studentsController::class, 'student_list_pdf']);
    Route::get('/{vue_capture?}', function () {
        // return   Auth::user()->roles->permission;
        //   Auth::user()->roles;
        $roles = Role::all();
        $classess = json_encode(['Six', 'Seven', 'Eight', 'Nine', 'Ten']);

        $school_id = '125983';
        $school_detials = school_detail::where("school_id", "$school_id")->first();
        $school_detials['slider'] =  json_decode($school_detials->slider);



        return view('layout', compact('roles', 'classess','school_detials'));
    })->where('vue_capture', '.*')->name('dashboard');
});
Route::get('/{vue_capture?}', function () {
    echo "
    <script>
            function setCookie(name,value,days) {
            var expires = '';
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = '; expires=' + date.toUTCString();
            }
            document.cookie = name + '=' + (value || '')  + expires + '; path=/';
            }
            var myItem = localStorage.getItem('getschoolid');
            setCookie('getschoolid', myItem, 7);
    </script>
    ";
    $school_id = '125983';
    // if (isset($_COOKIE["getschoolid"])) {
        //     $school_id = htmlspecialchars($_COOKIE["getschoolid"]);
        // }
    // return  Uniouninfo::find(1);
    $uniounDetials['defaultColor']  = 'green';
    $uniounDetials = json_decode(json_encode($uniounDetials));
    $classess = json_encode(['Six', 'Seven', 'Eight', 'Nine', 'Ten']);
    //    $school_id = (string)"<script>document.write(localStorage.getItem('getschoolid'))</script>";
    $school_detials = school_detail::where("school_id", "$school_id")->first();
    $school_detials['slider'] =  json_decode($school_detials->slider);
    return view('frontlayout', compact('uniounDetials', 'classess', 'school_detials'));
})->where('vue_capture', '.*')->name('frontend');

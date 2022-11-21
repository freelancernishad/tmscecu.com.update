<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use App\Models\notice;
use App\Models\routine;
use App\Models\staff;
use App\Models\Event;
use App\Models\blog;

use Mail;


class frontendController extends Controller
{



    public function home()
    {
        $fromCount = DB::table('add_admition_form')->count();
        if ($fromCount > 0) {
            $data['add_admition_form'] = DB::table('add_admition_form')->get();
        } else {
            $items = [[
                'start' => '',
                'end' => '',
                'action' => '',
                'remove' => '',
            ],];
            $object = json_decode(json_encode($items));
            $data['add_admition_form'] = $object;
        }

        $data['blog'] = blog::orderBy('id','DESC')->where('status','Published')->paginate(3);
        $data['staff'] = staff::paginate(3);
        $data['Event'] = Event::orderBy('id','DESC')->paginate(2);
        $data['notice'] = notice::orderBy('id','DESC')->paginate(3);



        return view(sitedetails()->theme.'.home', $data);
    }
    public function teacher()
    {
        $school_id = sitedetails()->school_id;
        $data['rows'] = DB::table('staff')->where('school_id',$school_id)->get();
        return view(sitedetails()->theme.'.teacher', $data);
    }
    public function student_at_a_glance(Request $request)
    {

        $school_id = $request->school_id;

        $class =  class_list();


        $classCount = count($class);


        $students = [];
        $totalStudent = 0;
        $maleStudent = 0;
        $FemaleStudent = 0;
        $scienceStudent = 0;
        $HumanitiesStudent = 0;
        $CommerceStudent = 0;


        for ($i = 0; $i < $classCount; $i++) {
            //total
            $whereTotal = [
                'school_id'=>$school_id,
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $totalStudent[$class[$i]] = DB::table('students')->where($whereTotal)->count();

$totalStudentcount = DB::table('students')->where($whereTotal)->count();
$students[class_en_to_bn($class[$i])]['totalStudent'] = $totalStudentcount;
            $totalStudent += $totalStudentcount;

            //maleStudent
            $wheremale = [
                'school_id'=>$school_id,
                'StudentGender' => 'Male',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $maleStudent[$class[$i]] = DB::table('students')->where($wheremale)->count();
            $maleStudentcount = DB::table('students')->where($wheremale)->count();
            $students[class_en_to_bn($class[$i])]['maleStudent'] = $maleStudentcount;
            $maleStudent += $maleStudentcount;
            //FemaleStudent
            $whereFemale = [
                'school_id'=>$school_id,
                'StudentGender' => 'Female',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $FemaleStudent[$class[$i]] = DB::table('students')->where($whereFemale)->count();
            $FemaleStudentcount = DB::table('students')->where($whereFemale)->count();
            $students[class_en_to_bn($class[$i])]['FemaleStudent'] =$FemaleStudentcount;
            $FemaleStudent += $FemaleStudentcount;
            //science
            $wherescience = [
                'school_id'=>$school_id,
                'StudentGroup' => 'Science',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $scienceStudent[$class[$i]] = DB::table('students')->where($wherescience)->count();
            $scienceStudentcount = DB::table('students')->where($wherescience)->count();
            $students[class_en_to_bn($class[$i])]['scienceStudent'] = $scienceStudentcount;
            $scienceStudent += $scienceStudentcount;
            //HumanitiesStudent
            $whereHumanities = [
                'school_id'=>$school_id,
                'StudentGroup' => 'Humanities',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $HumanitiesStudent[$class[$i]] = DB::table('students')->where($whereHumanities)->count();
            $maleStudentcount = DB::table('students')->where($whereHumanities)->count();
            $students[class_en_to_bn($class[$i])]['HumanitiesStudent'] = $maleStudentcount;
            $HumanitiesStudent += $maleStudentcount;
            //CommerceStudent
            $whereCommerce = [
                'school_id'=>$school_id,
                'StudentGroup' => 'Commerce',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
            // $CommerceStudent[$class[$i]] = DB::table('students')->where($whereCommerce)->count();
            $maleStudentcount = DB::table('students')->where($whereCommerce)->count();
            $students[class_en_to_bn($class[$i])]['CommerceStudent'] = $maleStudentcount;
            $CommerceStudent += $maleStudentcount;
        }


$data['data'] = $students;
$data['countdata']['মোট শিক্ষার্থীর সংখ্যা'] = $totalStudent;
$data['countdata']['ছেলে'] = $maleStudent;
$data['countdata']['মেয়ে'] = $FemaleStudent;
$data['countdata']['বিজ্ঞান বিভাগ'] = $scienceStudent;
$data['countdata']['ব্যবসায় শিক্ষা বিভাগ'] = $HumanitiesStudent;
$data['countdata']['মানবিক বিভাগ'] = $CommerceStudent;

       return response()->json($data);
        // return view(sitedetails()->theme.'.student_at_a_glance', $data);
    }



    public function student_list(Request $r)
    {
        return view(sitedetails()->theme.'.student_list');
    }



    public function student_list_pdf(Request $r,$year,$class)
    {
        $school_id = sitedetails()->school_id;

        $wd = [
            'school_id'=>$school_id,
            'StudentClass' => $class,
            'Year' => $year,
            'StudentStatus' => 'Active',
        ];
        $data['count'] = DB::table('students')->where($wd)->count();
        if ($data['count'] > 0) {
            $data['rows'] = DB::table('students')->where($wd)->orderBy('StudentRoll','ASC')->get();
        }
        $data['pdf']='pdf';


        // frontend/schoolLogo.png

        //in Controller
        $pathgovlogo = env('FILE_PATH').'frontend/schoolLogo.png';
        $typegovlogo = pathinfo($pathgovlogo, PATHINFO_EXTENSION);
        $dataigovlogo = file_get_contents($pathgovlogo);
        $govlogo = 'data:image/' . $typegovlogo . ';base64,' . base64_encode($dataigovlogo);
        $data['logo'] = $govlogo;

        $fileName = 'students-'.date('Y-m-d H:m:s');

        $data['fileName'] = $fileName;


        $pdf = LaravelMpdf::loadView('total_student', $data);
        return $pdf->stream("$fileName.pdf");

        // return view('', $data);


    }




    public function total_student(Request $r)
    {
        $school_id = sitedetails()->school_id;
        $class  = $r->class;
        $year = $r->year;

$data['class'] = $class;
$data['year'] = $year;

        $wd = [
            'school_id'=>$school_id,
            'StudentClass' => $class,
            'Year' => $year,
            'StudentStatus' => 'Active',
        ];
        $data['count'] = DB::table('students')->where($wd)->count();
        if ($data['count'] > 0) {
            $data['rows'] = DB::table('students')->where($wd)->orderBy('StudentRoll','ASC')->get();

            $data['pdf']='';

            return view(sitedetails()->theme.'.total_student', $data);

        }else{
            return "<h2 style='text-align:center;color:red;margin: 50px 0;'>Data Not Found!</h2>";

        }


    }
    public function public_result(Request $r)
    {
        return view(sitedetails()->theme.'.public_result');
    }
    public function result(Request $r)
    {
        return view(sitedetails()->theme.'.result');
    }
    public function view_result(Request $r)
    {
        $school_id = sitedetails()->school_id;
        $data['types'] = '';
        $data['class'] = $r->class;
        $data['roll'] = int_bn_to_en($r->roll);
        $data['year'] = $r->year;
        $data['exam_name'] = $r->exam_name;
        $wd = [
            'school_id'=>$school_id,
            'class' => $r->class,
            'roll' => int_bn_to_en($r->roll),
            'year' => $r->year,
            'exam_name' => $r->exam_name,
        ];
        $data['check'] = DB::table('student_result')->where($wd)->count();
        if ($data['check'] > 0) {
            $data['rows'] = DB::table('student_result')->where($wd)->get();

        return view('view_result', $data);
        }else{
            echo "<h2 style='color:red;text-align:center'>Result Not Found!</h2>";
        }





    }
    public function view_result_pdf(Request $r,$school_id, $class, $roll, $year, $exam_name)
    {

        $data['types'] = 'pdf';
        $data['class'] = $class;
        $data['roll'] = $roll;
        $data['year'] = $year;
        $data['exam_name'] = $exam_name;
        $wd = [
            'school_id'=>$school_id,
            'class' => $class,
            'roll' => $roll,
            'year' => $year,
            'exam_name' => $exam_name,
        ];
        $data['check'] = DB::table('student_results')->where($wd)->count();
        if ($data['check'] > 0) {
            $data['rows'] = DB::table('student_results')->where($wd)->get();
            $StudentID = $data['rows'][0]->stu_id;
            $wds = [
                'StudentID' => $StudentID,
            ];
            $data['stdata'] = DB::table('students')->where($wds)->get();
        }
        //in Controller
        $paths = env('FILE_PATH').'frontend/sing.png';
        $types = pathinfo($paths, PATHINFO_EXTENSION);
        $datais = file_get_contents($paths);
        $logos = 'data:image/' . $types . ';base64,' . base64_encode($datais);
        $data['sign'] = $logos;


        $pdf = LaravelMpdf::loadView('admin/pdfReports.view_result', $data);
        return $pdf->stream('document.pdf');
        // return view('view_result', $data);
    }
    public function weakly_result(Request $r)
    {
        $school_id = sitedetails()->school_id;
        $data['date'] = DB::table('results_single')->where('school_id',$school_id)->select('date')->distinct()->get();
        $data['subject'] = DB::table('results_single')->where('school_id',$school_id)->select('subject')->distinct()->get();
        return view(sitedetails()->theme.'.weakly_result', $data);
    }
    public function weakly_result_data(Request $r)
    {
        $school_id = sitedetails()->school_id;
        $data['class'] = $r->class;
        $data['roll'] = int_bn_to_en($r->roll);
        $data['subject'] = $r->subject;
        $data['date'] = $r->exam_date;
        $wd = [
            'school_id'=>$school_id,
            'sctudent_class' => $r->class,
            'subject' => $r->subject,
            'date' => $r->exam_date,
        ];
        $data['check'] = DB::table('results_single')->where($wd)->count();
        if ($data['check'] > 0) {
            $data['rows'] = DB::table('results_single')->where($wd)->get();
            return view('weakly_result_data', $data);
        }else{
            echo "<h2 style='color:red;text-align:center'>Result Not Found!</h2>";
        }




    }
    public function admissionOnlineForm(Request $r)
    {
        $ww = [
            'year' => date("Y") + 1
        ];
        $data['rows'] = DB::table('add_admition_form')->where($ww)->get();
        $data['current_date'] =  date("Y-m-d H:i:s");
        $data['end'] = $data['rows'][0]->end . " " . "23:59:59";
        $year = date("Y");
        $yearForCheck = $year + 1;
        $date = date("Y-m-d");
        $wh = [
            'year' => $yearForCheck,
            'StudentStatus' => 'panding',
        ];
        $cc = DB::table('students')->where($wh)->orderBy('id', 'ASC')->count();
        if ($cc) {
            $query1 = DB::table('students')->where($wh)->orderBy('id', 'ASC')->get();
            $admition_id = $query1[0]->AdmissionID;
            $mutiple = (rand(1, 9));
            $admition_ID = $admition_id;
            $admition_ID += $mutiple;
        } else {
            $one = "0001";
            $year = date("dmy");
            $admition_ID = $year . $one;
        }
        $data['admition_ID'] = $admition_ID;
        return view(sitedetails()->theme.'.admissionOnlineForm', $data);
    }
    public function Admission_checkout(Request $r)
    {
        $items = [[
            'student_name' => $r->student_name,
            'student_gender' => $r->student_gender,
            'student_date_of_birth' => $r->student_date_of_birth,
            'birthIdNo' => $r->birthIdNo,
            'student_Religion' => $r->student_Religion,
            'class' => $r->class,
            'Group' => $r->Group,
            'year' => $r->year,
            'date' => $r->date,
            'Father_name' => $r->Father_name,
            'FathersOccupation' => $r->FathersOccupation,
            'Mother_name' => $r->Mother_name,
            'MothersOccupation' => $r->MothersOccupation,
            'vill' => $r->vill,
            'post' => $r->post,
            'thana' => $r->thana,
            'dist' => $r->dist,
            'Phone_number' => $r->Phone_number,
            'password' => $r->password,
            'postal_code' => $r->postal_code,
            'admition_id' => $r->admition_id,
            'Referance' => $r->Referance,
        ],];
        $object = json_decode(json_encode($items));
        $data['rows'] = $object;
        return view(sitedetails()->theme.'.Admission_checkout', $data);
    }
    public function Admission_success(Request $r)
    {
        $data = [
            'StudentName' => $r->student_name,
            'StudentGender' => $r->student_gender,
            'StudentDateOfBirth' => $r->student_date_of_birth,
            'StudentBirthCertificateNo' => $r->birthIdNo,
            'StudentReligion' => $r->student_Religion,
            'StudentClass' => $r->class,
            'StudentGroup' => $r->Group,
            'Year' => $r->year,
            'StudentFatherName' => $r->Father_name,
            'StudentFatherOccupation' => $r->FathersOccupation,
            'StudentMotherName' => $r->Mother_name,
            'StudentMotherOccupation' => $r->MothersOccupation,
            'StudentAddress' => $r->vill . ', ' . $r->post . ', ' . $r->thana . ', ' . $r->dist,
            'StudentPhoneNumber' => $r->Phone_number,
            'AreaPostalCode' => $r->postal_code,
            'AdmissionID' => $r->admition_id,
            'StudentStatus' => 'Pending',
        ];
        if ($r->hasfile('student_image')) {
            $image = $r->file('student_image');
            $imageext = $image->extension();
            $imagefile = time() . '.' . $imageext;
            $image->storeAs('/public/students/', $imagefile);
            $data['StudentPicture'] = $imagefile;
        }
        DB::table('students')->insert($data);
        $datap = [
            'admissionID' => $r->admition_id,
            'Name' => $r->student_name,
            'paymentType' => $r->paymentType,
            'paymentDate' => $r->paymentDate,
            'paymentAmount' => $r->paymentAmount,
            'year' => $r->year,
            'totalAmount' => $r->paymentAmount,
            'TRXID' => $r->TRXID,
            'paymentNumber' => $r->PaymentNumber,
        ];
        DB::table('payment')->insert($datap);
        return redirect("/admit/$r->admition_id");
    }
    function admit($id)
    {
        $wh = [
            'AdmissionID' => $id,
        ];
        $data['row'] = DB::table('students')->where($wh)->get();
        //in Controller
        $pathgovlogo = env('FILE_PATH').'frontend/logo.png';
        $typegovlogo = pathinfo($pathgovlogo, PATHINFO_EXTENSION);
        $dataigovlogo = file_get_contents($pathgovlogo);
        $govlogo = 'data:image/' . $typegovlogo . ';base64,' . base64_encode($dataigovlogo);
        $data['govlogo'] = $govlogo;
        $StudentPicture = $data['row'][0]->StudentPicture;
        //in Controller
        $pathStudentPicture = env('FILE_PATH') . "students/$StudentPicture";
        $typeStudentPicture = pathinfo($pathStudentPicture, PATHINFO_EXTENSION);
        $dataiStudentPicture = file_get_contents($pathStudentPicture);
        $StudentPicture = 'data:image/' . $typeStudentPicture . ';base64,' . base64_encode($dataiStudentPicture);
        $data['StudentPicture'] = $StudentPicture;
        $aadId = str_split($data['row'][0]->AdmissionID);
        $uot = '';
        $lenth = count($aadId);
        for ($i = 0; $i < $lenth; $i++) {
            $uot .= "<span class='addborder'>$aadId[$i]</span>";
        }
        $data['uot'] = $uot;
        // print_r($uot);
        // die();
        $pdf = LaravelMpdf::loadView('Admission_success', $data);
        return $pdf->stream('document.pdf');
        //  return view('Admission_success', $data);
    }
    public function check_availability(Request $r, $nid)
    {
        $wh = [
            'StudentBirthCertificateNo' => $nid,
        ];
        echo  $infoCount = DB::table('students')->where($wh)->count();
    }
    public function check_availabilitytrx(Request $r, $TRXID)
    {
        $wh = [
            'TRXID' => $TRXID,
        ];
        echo  $infoCount = DB::table('payment')->where($wh)->count();
    }


    public function routine(Request $r)
    {

        $school_id = sitedetails()->school_id;
        $data['countall'] = routine::distinct()->select('class','year')->where(['year'=>date('Y'),'school_id'=>$school_id])->count();


        $rows = routine::distinct()->select('class','year')->where(['year'=>date('Y'),'school_id'=>$school_id])->get();

        // print_r($rows);
// die();
        return view(sitedetails()->theme.'.routine',$data,compact('rows'));
    }

    public function notice(Request $r)
    {

        $school_id = sitedetails()->school_id;

        $rows = notice::where('school_id',$school_id)->paginate(8);

        // print_r($rows);
// die();
        return view(sitedetails()->theme.'.notice',compact('rows'));
    }

    public function contact_us(Request $r)
    {



        return view(sitedetails()->theme.'.contact-us');
    }


    public function contact_us_post (Request $r)
    {



        $userEmail = $r->email;

        $message = $r->message;
        $subject = $r->subject;
        $to_namea = $r->name;
        $to_emaila = ['freelancernishad123@gmail.com'];

                 $filefile = '1633978461.txt';
                // if($r->hasfile('file'))	{
                //     $file = $r->file('file');
                // $fileext = $file->extension();
                // $filefile=time().'.'.$fileext;

                // $file->storeAs('/email/',$filefile);

                // }

        $emaildataa = array('name'=>$to_namea, 'buyerEmail' => $userEmail, 'messageo' => $message);
        Mail::send('ordermailadmin', $emaildataa, function($messagea) use ($to_namea, $to_emaila,$filefile,$subject) {
        $messagea->to($to_emaila, $to_namea)
        ->subject($subject);
        $messagea->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        // $messagea->attach("email/".$filefile);


        });


         return redirect()->back();
    }

    public function blogs(Request $request)
    {
        $data['blog'] = blog::orderBy('id','DESC')->where('status','Published')->paginate(12);
        return view(sitedetails()->theme.'.blogs',$data);
    }



    public function events(Request $request)
    {
        $data['Event'] = Event::orderBy('id','DESC')->paginate(12);
        return view(sitedetails()->theme.'.events',$data);
    }



}

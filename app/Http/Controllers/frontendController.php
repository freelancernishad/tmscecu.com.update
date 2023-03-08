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
use App\Models\school_detail;
use App\Models\StudentResult;
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



    public function studentCount($school_id,$rowName,$rowValue,$StudentClass)
    {

            //IslamStudent
            $whereFemale = [
                'school_id'=>$school_id,
                $rowName => $rowValue,
                'StudentStatus' => 'Active',
                'StudentClass' => $StudentClass,
            ];
          return $IslamStudentcount = DB::table('students')->where($whereFemale)->count();

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
        $IslamStudent = 0;
        $IslamStudentMale = 0;
        $IslamStudentFemale = 0;

        $HinduStudent = 0;
        $HinduStudentMale = 0;
        $HinduStudentFemale = 0;



        $stipendStudentMale = 0;
        $stipendStudentFemale = 0;
        $stipendStudent = 0;



        $WorkingStudent = 0;
        $landless_guardiansStudent = 0;
        $MinorityStudent = 0;
        $special_needsStudent = 0;
        $OrphanStudent = 0;
        $categoryOtherStudent = 0;
        $freedom_fightersStudent = 0;
        $committeeStudent = 0;
        $disabledStudent = 0;
        $There_is_no_quotaStudent = 0;

        $businessmanStudent = 0;
        $farmerStudent = 0;
        $agricultural_laborerStudent = 0;
        $doctorStudent = 0;
        $fishermanStudent = 0;
        $Government_jobStudent = 0;
        $blacksmith_potterStudent = 0;
        $expatriateStudent = 0;
        $small_businessStudent = 0;
        $teacherStudent = 0;
        $Non_agricultural_workersStudent = 0;
        $Occupation_of_guardian_otherStudent = 0;


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
            $totalStudentcount = DB::table('students')->where($whereTotal)->count();
            $students[class_en_to_bn($class[$i])]['totalStudent'] =int_en_to_bn( $totalStudentcount);
            $totalStudent += $totalStudentcount;


            //maleStudent
            $maleStudentcount = $this->studentCount($school_id,'StudentGender','Male',$class[$i]);
            $students[class_en_to_bn($class[$i])]['maleStudent'] =int_en_to_bn( $maleStudentcount);
            $maleStudent += $maleStudentcount;
            //FemaleStudent
            $FemaleStudentcount = $this->studentCount($school_id,'StudentGender','Female',$class[$i]);
            $students[class_en_to_bn($class[$i])]['FemaleStudent'] =int_en_to_bn($FemaleStudentcount);
            $FemaleStudent += $FemaleStudentcount;



            //IslamStudent
            $IslamStudentcount = $this->studentCount($school_id,'StudentReligion','Islam',$class[$i]);
            $students[class_en_to_bn($class[$i])]['IslamStudent'] =int_en_to_bn($IslamStudentcount);
            $IslamStudent += $IslamStudentcount;


            //IslamStudentMale
            $whereIslamMale = [
                'school_id'=>$school_id,
                'StudentReligion' => 'Islam',
                'StudentGender' => 'Male',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $IslamStudentMalecount = DB::table('students')->where($whereIslamMale)->count();
          $students[class_en_to_bn($class[$i])]['IslamStudentMale'] =int_en_to_bn($IslamStudentMalecount);
          $IslamStudentMale += $IslamStudentMalecount;




            //IslamStudentFemale
            $whereIslamFemale = [
                'school_id'=>$school_id,
                'StudentReligion' => 'Islam',
                'StudentGender' => 'Female',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $IslamStudentFemalecount = DB::table('students')->where($whereIslamFemale)->count();
          $students[class_en_to_bn($class[$i])]['IslamStudentFemale'] =int_en_to_bn($IslamStudentFemalecount);
          $IslamStudentFemale += $IslamStudentMalecount;



            //HinduStudentMale
            $whereHinduMale = [
                'school_id'=>$school_id,
                'StudentReligion' => 'Hindu',
                'StudentGender' => 'Male',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $HinduStudentMalecount = DB::table('students')->where($whereHinduMale)->count();
          $students[class_en_to_bn($class[$i])]['HinduStudentMale'] =int_en_to_bn($HinduStudentMalecount);
          $HinduStudentMale += $HinduStudentMalecount;




            //HinduStudentFemale
            $whereHinduFemale = [
                'school_id'=>$school_id,
                'StudentReligion' => 'Hindu',
                'StudentGender' => 'Female',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $HinduStudentFemalecount = DB::table('students')->where($whereHinduFemale)->count();
          $students[class_en_to_bn($class[$i])]['HinduStudentFemale'] =int_en_to_bn($HinduStudentFemalecount);
          $HinduStudentFemale += $HinduStudentFemalecount;





            //HinduStudent
            $HinduStudentcount = $this->studentCount($school_id,'StudentReligion','Hindu',$class[$i]);
            $students[class_en_to_bn($class[$i])]['HinduStudent'] =int_en_to_bn($HinduStudentcount);
            $HinduStudent += $HinduStudentcount;



            //stipendStudent
            $stipendStudentcount = $this->studentCount($school_id,'stipend','Yes',$class[$i]);
            $students[class_en_to_bn($class[$i])]['stipendStudent'] =int_en_to_bn($stipendStudentcount);
            $stipendStudent += $stipendStudentcount;


            //stipendStudentMale
            $wherestipendMale = [
                'school_id'=>$school_id,
                'stipend' => 'Yes',
                'StudentGender' => 'Male',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $stipendStudentMalecount = DB::table('students')->where($wherestipendMale)->count();
          $students[class_en_to_bn($class[$i])]['stipendStudentMale'] =int_en_to_bn($stipendStudentMalecount);
          $stipendStudentMale += $stipendStudentMalecount;


            //stipendStudentFemale
            $wherestipendFemale = [
                'school_id'=>$school_id,
                'stipend' => 'Yes',
                'StudentGender' => 'Female',
                'StudentStatus' => 'Active',
                'StudentClass' => $class[$i],
            ];
           $stipendStudentFemalecount = DB::table('students')->where($wherestipendFemale)->count();
          $students[class_en_to_bn($class[$i])]['stipendStudentFemale'] =int_en_to_bn($stipendStudentFemalecount);
          $stipendStudentFemale += $stipendStudentFemalecount;










            // শিক্ষার্থীর ধরন
            //WorkingStudent
            $WorkingStudentcount = $this->studentCount($school_id,'StudentCategory','কর্মজীবী শিক্ষার্থী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['WorkingStudent'] =int_en_to_bn($WorkingStudentcount);
            $WorkingStudent += $WorkingStudentcount;

            //landless_guardiansStudent
            $landless_guardiansStudentcount = $this->studentCount($school_id,'StudentCategory','ভূমিহীন অভিভাবকের সন্তান',$class[$i]);
            $students[class_en_to_bn($class[$i])]['landless_guardiansStudent'] =int_en_to_bn($landless_guardiansStudentcount);
            $landless_guardiansStudent += $landless_guardiansStudentcount;


            //MinorityStudent
            $MinorityStudentcount = $this->studentCount($school_id,'StudentCategory','ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['MinorityStudent'] =int_en_to_bn($MinorityStudentcount);
            $MinorityStudent += $MinorityStudentcount;


            //special_needsStudent
            $special_needsStudentcount = $this->studentCount($school_id,'StudentCategory','বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['special_needsStudent'] =int_en_to_bn($special_needsStudentcount);
            $special_needsStudent += $special_needsStudentcount;


            //OrphanStudent
            $OrphanStudentcount = $this->studentCount($school_id,'StudentCategory','অনাথ/এতিম শিক্ষার্থী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['OrphanStudent'] =int_en_to_bn($OrphanStudentcount);
            $OrphanStudent += $OrphanStudentcount;

            //categoryOtherStudent
            $categoryOtherStudentcount = $this->studentCount($school_id,'StudentCategory','অন্যান্য',$class[$i]);
            $students[class_en_to_bn($class[$i])]['categoryOtherStudent'] =int_en_to_bn($categoryOtherStudentcount);
            $categoryOtherStudent += $categoryOtherStudentcount;
            // শিক্ষার্থীর ধরন



            // কোটা
            //freedom_fightersStudent
            $freedom_fightersStudentcount = $this->studentCount($school_id,'StudentKota','মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['freedom_fightersStudent'] =int_en_to_bn($freedom_fightersStudentcount);
            $freedom_fightersStudent += $freedom_fightersStudentcount;


            //committeeStudent
            $committeeStudentcount = $this->studentCount($school_id,'StudentKota','অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান',$class[$i]);
            $students[class_en_to_bn($class[$i])]['committeeStudent'] =int_en_to_bn($committeeStudentcount);
            $committeeStudent += $committeeStudentcount;


            //OrphanStudent
            $disabledStudentcount = $this->studentCount($school_id,'StudentKota','প্রতিবন্ধী',$class[$i]);
            $students[class_en_to_bn($class[$i])]['disabledStudent'] =int_en_to_bn($disabledStudentcount);
            $disabledStudent += $disabledStudentcount;

            //There_is_no_quotaStudent
            $There_is_no_quotaStudentcount = $this->studentCount($school_id,'StudentKota','কোনো কোটা নেই',$class[$i]);
            $students[class_en_to_bn($class[$i])]['There_is_no_quotaStudent'] =int_en_to_bn($There_is_no_quotaStudentcount);
            $There_is_no_quotaStudent += $There_is_no_quotaStudentcount;
            // কোটা



            // অভিভাবকের পেশা

            //businessmanStudent
            $businessmanStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','ব্যবসায়ি',$class[$i]);
            $students[class_en_to_bn($class[$i])]['businessmanStudent'] =int_en_to_bn($businessmanStudentcount);
            $businessmanStudent += $businessmanStudentcount;

            //farmerStudent
            $farmerStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','কৃষক',$class[$i]);
            $students[class_en_to_bn($class[$i])]['farmerStudent'] =int_en_to_bn($farmerStudentcount);
            $farmerStudent += $farmerStudentcount;

            //agricultural_laborerStudent
            $agricultural_laborerStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','কৃষি শ্রমিক',$class[$i]);
            $students[class_en_to_bn($class[$i])]['agricultural_laborerStudent'] =int_en_to_bn($agricultural_laborerStudentcount);
            $agricultural_laborerStudent += $agricultural_laborerStudentcount;

            //doctorStudent
            $doctorStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','ডাক্তার',$class[$i]);
            $students[class_en_to_bn($class[$i])]['doctorStudent'] =int_en_to_bn($doctorStudentcount);
            $doctorStudent += $doctorStudentcount;

            //fishermanStudent
            $fishermanStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','জেলে',$class[$i]);
            $students[class_en_to_bn($class[$i])]['fishermanStudent'] =int_en_to_bn($fishermanStudentcount);
            $fishermanStudent += $fishermanStudentcount;

            //Government_jobStudent
            $Government_jobStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','সরকারি চাকুরি',$class[$i]);
            $students[class_en_to_bn($class[$i])]['Government_jobStudent'] =int_en_to_bn($Government_jobStudentcount);
            $Government_jobStudent += $Government_jobStudentcount;

            //blacksmith_potterStudent
            $blacksmith_potterStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','কামার/কুমোর',$class[$i]);
            $students[class_en_to_bn($class[$i])]['blacksmith_potterStudent'] =int_en_to_bn($blacksmith_potterStudentcount);
            $blacksmith_potterStudent += $blacksmith_potterStudentcount;

            //expatriateStudent
            $expatriateStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','প্রবাসি',$class[$i]);
            $students[class_en_to_bn($class[$i])]['expatriateStudent'] =int_en_to_bn($expatriateStudentcount);
            $expatriateStudent += $expatriateStudentcount;

            //small_businessStudent
            $small_businessStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','ক্ষুদ্র ব্যবসায়ি',$class[$i]);
            $students[class_en_to_bn($class[$i])]['small_businessStudent'] =int_en_to_bn($small_businessStudentcount);
            $small_businessStudent += $small_businessStudentcount;

            //teacherStudent
            $teacherStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','শিক্ষক',$class[$i]);
            $students[class_en_to_bn($class[$i])]['teacherStudent'] =int_en_to_bn($teacherStudentcount);
            $teacherStudent += $teacherStudentcount;

            //There_is_no_quotaStudent
            $Non_agricultural_workersStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','অকৃষি শ্রমিক',$class[$i]);
            $students[class_en_to_bn($class[$i])]['Non_agricultural_workersStudent'] =int_en_to_bn($Non_agricultural_workersStudentcount);
            $Non_agricultural_workersStudent += $Non_agricultural_workersStudentcount;

            //There_is_no_quotaStudent
            $Occupation_of_guardian_otherStudentcount = $this->studentCount($school_id,'StudentFatherOccupation','অন্যান্য',$class[$i]);
            $students[class_en_to_bn($class[$i])]['Occupation_of_guardian_otherStudent'] =int_en_to_bn($Occupation_of_guardian_otherStudentcount);
            $Occupation_of_guardian_otherStudent += $Occupation_of_guardian_otherStudentcount;

            // অভিভাবকের পেশা






            if($class[$i]=='Nine' || $class[$i]=='Ten'){


            //science
            $scienceStudentcount = $this->studentCount($school_id,'StudentGroup','Science',$class[$i]);
            $students[class_en_to_bn($class[$i])]['scienceStudent'] =int_en_to_bn( $scienceStudentcount);
            $scienceStudent += $scienceStudentcount;

            //HumanitiesStudent
            $HumanitiesStudentcount = $this->studentCount($school_id,'StudentGroup','Humanities',$class[$i]);
            $students[class_en_to_bn($class[$i])]['HumanitiesStudent'] =int_en_to_bn( $HumanitiesStudentcount);
            $HumanitiesStudent += $HumanitiesStudentcount;

            //CommerceStudent
            $CommerceStudentcount = $this->studentCount($school_id,'StudentGroup','Commerce',$class[$i]);
            $students[class_en_to_bn($class[$i])]['CommerceStudent'] =int_en_to_bn( $CommerceStudentcount);
            $CommerceStudent += $CommerceStudentcount;
        }

        }


        $data['data'] = $students;
        $data['countdata']['মোট শিক্ষার্থীর সংখ্যা'] = int_en_to_bn($totalStudent);
        $data['countdata']['ছাত্র'] = int_en_to_bn($maleStudent);
        $data['countdata']['ছাত্রী'] = int_en_to_bn($FemaleStudent);
        $data['countdata']['বিজ্ঞান বিভাগ'] = int_en_to_bn($scienceStudent);
        $data['countdata']['মানবিক বিভাগ'] = int_en_to_bn($HumanitiesStudent);



        $data['totalStudent'] = int_en_to_bn($totalStudent);
        $data['maleStudent'] = int_en_to_bn($maleStudent);
        $data['FemaleStudent'] = int_en_to_bn($FemaleStudent);
        $data['scienceStudent'] = int_en_to_bn($scienceStudent);
        $data['HumanitiesStudent'] = int_en_to_bn($HumanitiesStudent);

        $data['IslamStudentMale'] = int_en_to_bn($IslamStudentMale);
        $data['IslamStudentFemale'] = int_en_to_bn($IslamStudentFemale);
        $data['IslamStudent'] = int_en_to_bn($IslamStudent);
        $data['HinduStudentMale'] = int_en_to_bn($HinduStudentMale);
        $data['HinduStudentFemale'] = int_en_to_bn($HinduStudentFemale);
        $data['HinduStudent'] = int_en_to_bn($HinduStudent);


        $data['stipendStudentMale'] = int_en_to_bn($stipendStudentMale);
        $data['stipendStudentFemale'] = int_en_to_bn($stipendStudentFemale);
        $data['stipendStudent'] = int_en_to_bn($stipendStudent);
        $data['WorkingStudent'] = int_en_to_bn($WorkingStudent);
        $data['landless_guardiansStudent'] = int_en_to_bn($landless_guardiansStudent);
        $data['MinorityStudent'] = int_en_to_bn($MinorityStudent);
        $data['special_needsStudent'] = int_en_to_bn($special_needsStudent);
        $data['OrphanStudent'] = int_en_to_bn($OrphanStudent);
        $data['categoryOtherStudent'] = int_en_to_bn($categoryOtherStudent);
        $data['freedom_fightersStudent'] = int_en_to_bn($freedom_fightersStudent);
        $data['committeeStudent'] = int_en_to_bn($committeeStudent);
        $data['disabledStudent'] = int_en_to_bn($disabledStudent);
        $data['There_is_no_quotaStudent'] = int_en_to_bn($There_is_no_quotaStudent);
        $data['businessmanStudent'] = int_en_to_bn($businessmanStudent);
        $data['farmerStudent'] = int_en_to_bn($farmerStudent);
        $data['agricultural_laborerStudent'] = int_en_to_bn($agricultural_laborerStudent);
        $data['doctorStudent'] = int_en_to_bn($doctorStudent);
        $data['fishermanStudent'] = int_en_to_bn($fishermanStudent);
        $data['Government_jobStudent'] = int_en_to_bn($Government_jobStudent);
        $data['blacksmith_potterStudent'] = int_en_to_bn($blacksmith_potterStudent);
        $data['expatriateStudent'] = int_en_to_bn($expatriateStudent);
        $data['small_businessStudent'] = int_en_to_bn($small_businessStudent);
        $data['teacherStudent'] = int_en_to_bn($teacherStudent);
        $data['Non_agricultural_workersStudent'] = int_en_to_bn($Non_agricultural_workersStudent);
        $data['Occupation_of_guardian_otherStudent'] = int_en_to_bn($Occupation_of_guardian_otherStudent);


        $type = $request->type;
        if($type=='pdf'){
            $fileName = 'students-'.date('Y-m-d H:m:s');

            $data['fileName'] = $fileName;
            $data['school_id'] = $school_id;

            // return view('admin/pdfReports.studentAllReport', $data);
            $pdf = LaravelMpdf::loadView('admin/pdfReports.studentAllReport', $data);
            return $pdf->stream("$fileName.pdf");
        }

        return response()->json($data);

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

    public function PublicMarkSheet($marksheetCode)
    {
        // return $marksheetCode;

         $restultCount =  StudentResult::where('marksheetCode',$marksheetCode)->count();
        if($restultCount>0){

        $restult =  StudentResult::where('marksheetCode',$marksheetCode)->first();

        // return $this->view_result_pdf($restult->school_id, $restult->class, $restult->roll, $restult->year, $restult->exam_name,$restult->group);

        $wd = [
            'school_id'=>$restult->school_id,
            'class' => $restult->class,
            'roll' => $restult->roll,
            'year' => $restult->year,
            'exam_name' => $restult->exam_name,
            'class_group' => $restult->class_group,
        ];
        $check = DB::table('student_results')->where($wd)->count();
        if ($check > 0) {
            $results = StudentResult::where($wd)->first();

            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','default_font' => 'bangla','margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 6,
            'margin_bottom' => 6,]);

            // $mpdf = new \Mpdf\Mpdf([
            //     'mode' => 'utf-8', 'format' => 'A4', 'default_font' => 'bangla', 'margin_left' => 5,
            //     'margin_right' => 5,
            //     'margin_top' => 6,
            //     'margin_bottom' => 6,
            // ]);
            $mpdf->WriteHTML($this->pdfmarksheet($results));
           $mpdf->Output('markSheet.pdf', 'I');

        }
        }else{
            echo "<h1 style='text-align:center'>পেমেন্ট করে মার্কশীট ডাউনলোড করুন</h1>";
        }

    }


    public function view_result_pdf($school_id, $class, $roll, $year, $exam_name,$group)
    {

        $wd = [
            'school_id'=>$school_id,
            'class' => $class,
            'roll' => $roll,
            'year' => $year,
            'exam_name' => $exam_name,
            'class_group' => $group,
        ];
        $check = DB::table('student_results')->where($wd)->count();
        if ($check > 0) {
            $results = StudentResult::where($wd)->first();

            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','default_font' => 'bangla','margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 6,
            'margin_bottom' => 6,]);

            // $mpdf = new \Mpdf\Mpdf([
            //     'mode' => 'utf-8', 'format' => 'A4', 'default_font' => 'bangla', 'margin_left' => 5,
            //     'margin_right' => 5,
            //     'margin_top' => 6,
            //     'margin_bottom' => 6,
            // ]);
            // return $this->pdfmarksheet($results);
            $mpdf->WriteHTML($this->pdfmarksheet($results));
           $mpdf->Output('markSheet.pdf', 'I');



            // return view('admin/pdfReports.view_result', compact('results'));
            // $pdf = LaravelMpdf::loadView('admin/pdfReports.view_result', compact('results'));
            // return $pdf->stream('document.pdf');
        }




    }

    function pdfmarksheet($results)
    {



        $schoolDetails = school_detail::where('school_id',$results->school_id)->first();
        $html="


        <!DOCTYPE HTML>
        <html lang='en-US'>
        <head>
            <meta charset='UTF-8'>
            <title>markSheet.pdf</title>
            <style>
            @page{
                margin: 60px 80px;
            }
            .m-0{
                margin: 0;
            }    .text-center{
                text-align:center;
            }
        td{
            border: 1px solid black;
            padding:4px 10px;
            font-size: 16px;
        }    th{
            border: 1px solid black;
            padding:4px 10px;
            font-size: 12px;
        }

        .li{
            font-size: 10px;
        }



        table{
            border-collapse: collapse;
            width:100%
        }
        section.view.about--part1 {
        margin: 15px 0 50px 0;
    }
        </style>

        </head>
        <body style='font-family: 'bangla', sans-serif;'>
            <div class='rootContainer'>
                <div class='headerSection'>






    ".SchoolPad($results->school_id)."


    <div>

        <p style='width:220px;border:1px solid #4a4a4a;background:#4a4a4a;color:white;font-size:25px;text-align:center;margin:5px auto;border-radius: 50px;padding:5px;font-family: cursive;'>Result sheet</p>

    </div>





        ";

        $html .= resultDetails($results,'pdf');
        $html .= ResultGradeList($results,'pdf');

        $html .="


                </div>
            </div>

        ";


        $customStyle = "color: #853ccb;font-weight: 600;";

        $html .="


<table width='100%' style='margin-top:50px'>

<tr>

<td style='  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;'></td>
<td style='  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;'></td>
<td style='  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;text-align:center;font-size:20px' width='35%'>



    <img style='width: 104px;' src='".base64($schoolDetails->PRINCIPALS_Signature)."'/>

<h4 style='margin:0;text-align:center;font-size:16px;font-weight: 500;margin-bottom:-5px;$customStyle'>$schoolDetails->Principals_name</h4>
<h4 style='margin:0;text-align:center;font-size:14px;font-weight: 500;margin-bottom:-5px;$customStyle'>প্রধান শিক্ষক</h4>
<h4 style='margin:0;text-align:center;font-size:14px;font-weight: 500;margin-bottom:-5px;$customStyle'>$schoolDetails->SCHOLL_NAME</h4>
<h4 style='margin:0;text-align:center;font-size:14px;font-weight: 500;margin-bottom:-5px;$customStyle'>$schoolDetails->SCHOLL_ADDRESS</h4>
<h4 style='margin:0;text-align:center;font-size:14px;font-weight: 500;margin-bottom:-5px;$customStyle'>$schoolDetails->contact_number</h4>
</td>

</tr>

</table>
</body>
</html>
        ";


        return $html;

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

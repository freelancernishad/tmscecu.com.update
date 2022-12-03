<?php
namespace App\Http\Controllers\api;
use PDF;
use URL;
use App\Models\User;
use App\Models\payment;
use App\Models\student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\school_detail;
use App\Models\StudentResult;
use App\Imports\studentsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Rakibhstu\Banglanumber\NumberToBangla;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;

class studentsController extends Controller
{

    public function import(Request $request)
    {


        // return $request->file('ecelfile');


        $rows = Excel::toArray(new studentsImport, $request->file('ecelfile'));
        foreach ($rows[0] as $key => $row) {


            $school_id = '125983';
            // $student =  student::where(['school_id'=>'125983'])->latest()->first();
            // $admition_id = $student->AdmissionID;



            $studentCount =  student::where(['school_id'=>$school_id])->count();
            if($studentCount>0){
            $student =  student::where(['school_id'=>$school_id])->orderBy('id','desc')->latest()->first();
            $admition_id = $student->AdmissionID;
            // $mutiple = (rand(1, 9));
            $mutiple = 1;
                if($admition_id=='' || $admition_id==null){
                        $one = "0001";
                        $year = date("dmy");
                        $admition_ID = $school_id . $year . $one;
                     }
                     $admition_ID =  $admition_id;
                      $admition_ID += $mutiple;
                }else{
                    $one = "0001";
                    $year = date("dmy");
                    $admition_ID = $school_id . $year . $one;
                }




            $AdmissionID = (string)$admition_ID;


            $StudentID = (string)StudentId($row[1],$row[0],$school_id,$row[2]);


            student::create([
                'school_id'=>$school_id,
                'StudentID'=>$StudentID,
                'AdmissionID'=>$AdmissionID,
                'Year'=>date('Y'),
                'StudentStatus'=>'Active',
                'StudentRoll'=>$row[0],
                'StudentClass'=>$row[1],
                'StudentGroup'=>$row[2],
                'StudentNameEn'=>$row[3],
                'StudentName'=>$row[4],
            ]);
            print_r($AdmissionID.'<br/>');
        }


die();

        Excel::import(new studentsImport, 'students.xlsx');

        // return redirect('/')->with('success', 'All good!');
    }













    public function list(Request $r)
    {
        $datatype = $r->datatype;
        $data['class'] = "All";
        $datas = QueryBuilder::for(student::class)
            ->allowedFilters([
                'StudentName',
                'StudentRoll',
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('StudentClass'),
                'StudentID',
                'AdmissionID',
                'StudentFatherName',
                'StudentFatherOccupation',
                'StudentMotherName',
                'StudentMotherOccupation',
                'StudentGender',
                'StudentReligion',
                'StudentDateOfBirth',
                'StudentBirthCertificateNo',
                'StudentAddress',
                'StudentPhoneNumber',
                'StudentEmail',
                'AreaPostalCode',
                'StudentPicture',
                'JoiningDate',
                'StudentGroup',
                AllowedFilter::exact('Year'),
                AllowedFilter::exact('StudentStatus'),
                'StudentTranferStatus',
                'StudentTranferFrom',
                'AplicationStatus',
                'ThisMonthPaymentStatus', AllowedFilter::exact('id')
            ])
            ->allowedSorts([
                'StudentName',
                'StudentRoll',
                'school_id',
                'StudentClass',
                'StudentID',
                'AdmissionID',
                'StudentFatherName',
                'StudentFatherOccupation',
                'StudentMotherName',
                'StudentMotherOccupation',
                'StudentGender',
                'StudentReligion',
                'StudentDateOfBirth',
                'StudentBirthCertificateNo',
                'StudentAddress',
                'StudentPhoneNumber',
                'StudentEmail',
                'AreaPostalCode',
                'StudentPicture',
                'JoiningDate',
                'StudentGroup',
                'Year',
                'StudentStatus',
                'StudentTranferStatus',
                'StudentTranferFrom',
                'AplicationStatus',
                'ThisMonthPaymentStatus', 'id'
            ])
            ->orderBy('StudentRoll', 'ASC');
            if($datatype=='count'){
                $result= $datas->count();
            }else{
                $result= $datas->paginate(20);
            }
        return response()->json($result);
    }
    public function student_action(Request $request, $action)
    {
        if ($action == 'Delete') {
            $data = [];
            foreach ($request->all() as  $value) {
                $data[$value] = $value;
                $students = student::find($value);
                $students->delete();
            }
        } else {
            $data = [];
            foreach ($request->all() as  $value) {
                $data[$value] = $value;
                $students = student::find($value);
                $students->update(['StudentStatus' => $action]);
            }
        }
        return response()->json($data);
    }
    public function AdmissionIdgenarate(Request $request)
    {
        $school_id = $request->school_id;
        $studentCount =  student::where(['school_id'=>$school_id])->count();
        if($studentCount>0){
        $student =  student::where(['school_id'=>$school_id])->latest()->first();
        $admition_id = $student->AdmissionID;
        $mutiple = (rand(1, 9));
            if($admition_id=='' || $admition_id==null){
                    $one = "0001";
                    $year = date("dmy");
                  return  $admition_ID = $school_id . $year . $one;
                 }
                 $admition_ID =  $admition_id;
                 return $admition_ID += $mutiple;
            }else{
                $one = "0001";
                $year = date("dmy");
               return $admition_ID = $school_id . $year . $one;
            }
    }



    public function student_check(Request $r)
    {
        $school_id = $r->school_id;
        $class = $r->classvalue;
        if ($class == '') {
            $data = ['admition_ID' => '', 'StudentID' => '', 'StudentRoll' => ''];
            return response()->json($data);
        }
        $wheredata = [
            'StudentStatus' => 'Active',
            'StudentClass' => $class,
            'Year' => date('Y'),
            'school_id' => $school_id,
        ];
        $count = DB::table('students')->where($wheredata)->count();
        if ($count > 0) {
            $row = DB::table('students')->where($wheredata)->orderBy('StudentRoll', 'DESC')->get();
            $admition_id = $row[0]->AdmissionID;
            $roll = $row[0]->StudentRoll + 1;
            $admition_ID = (string)StudentAdmissionId($admition_id,$school_id);
            $StudentID = StudentId($class, $roll,$school_id);
            $data = ['admition_ID' => $admition_ID, 'StudentID' => $StudentID, 'StudentRoll' => $row[0]->StudentRoll + 1];
        } else {
            $one = "0001";
            $year = date("dmy");
            $admition_ID = $school_id . $year . $one;
            ////////////////////////////////
            $StudentID = StudentId($class, "1",$school_id);
            $data = ['admition_ID' => $admition_ID, 'StudentID' => $StudentID, 'StudentRoll' => '1'];
        }
        return response()->json($data);
    }
    public function student_roll_check(Request $request)
    {

       $bigsis = $request->bigsis;

       $StudentRoll = $request->StudentRoll;
       $StudentClass = $request->StudentClass;
       $StudentGroup = $request->StudentGroup;
       $year = date('Y');
       if($bigsis){

           return student::where(['StudentRoll'=>$StudentRoll,'StudentClass'=>$StudentClass,'StudentGroup'=>$StudentGroup,'year'=>$year])->first();
       }
       return student::where(['StudentRoll'=>$StudentRoll,'StudentClass'=>$StudentClass,'StudentGroup'=>$StudentGroup,'year'=>$year])->count();


    }
public function usercreate($school_id,$name,$email,$password,$id,$class,$type)
{
    $studentuserdata =[
        'school_id'=>$school_id,
        'name'=>$name,
        'email'=>$email,
        'password'=>hash::make($password),
        'teacherOrstudent'=>$id,
        'role'=>$type,
        'class'=>$class,
    ];
    $user =   User::create($studentuserdata);
}
    public function student_submit(Request $r)
    {
        $submit_type = $r->submit_type;
        $id = $r->id;
        $data = $r->except('AdmissionID','StudentID','StudentPicture');
        $school_id = $r->school_id;
        if($submit_type=='data_entry'){
            $StudentClass = $r->StudentClass;
            $StudentRoll = $r->StudentRoll;
            $year = date('Y');
            $StudentGroup = $r->StudentGroup;
// return StudentId($StudentClass,$StudentRoll,$school_id,$StudentGroup);
            $studentcount =  student::where(['StudentRoll'=>$StudentRoll,'StudentClass'=>$StudentClass,'StudentGroup'=>$StudentGroup,'year'=>$year])->count();

            if ($id == '') {
            if($studentcount>0){
                $resp = [
                    'code'=>403,
                    'message'=>"aleady have class:$StudentClass roll:$StudentRoll Student"
                ];
                return $resp;
            }
            }



             $data['StudentID'] = (string)StudentId($StudentClass,$StudentRoll,$school_id,$StudentGroup);
        }
        $data['AdmissionID'] = (string)StudentAdmissionId('',$school_id);


        $imageCount =  count(explode(';', $r->StudentPicture));
        if ($imageCount > 1) {
            $data['StudentPicture'] =  fileupload($r->StudentPicture, 'backend/students/',300,300);
        }




        if ($id == '') {
            $data['JoiningDate'] = date("Y-m-d");
            $data['StudentStatus'] = 'Applied';
            if($submit_type=='data_entry'){
                $data['StudentStatus'] = 'Active';
            }
            $result =   student::create($data);
        } else {
            $student = student::find($r->id);
            $result = $student->update($data);
        }
        return $result;
    }
    public function imageupload(Request $request)
    {
        // return $request->all();
        $id =  $request->id;
        $student = student::find($id);
        if(File::exists($student->StudentPicture)){
            unlink($student->StudentPicture);
        }
      $StudentPicture=  fileupload($request->StudentPicture,'backend/students/',300,300,$student->StudentID);
        return $student->update(['StudentPicture'=>$StudentPicture]);
    }
    public function imageget(Request $request)
    {
        $id =  $request->id;
        $student = student::find($id);
    return   $StudentPicture=  base64($student->StudentPicture);
    }
    public function singlestudent(Request $request)
    {
        // return student::with(['Payments'])->get();
        $result = QueryBuilder::for(student::class)
            ->allowedFilters([
                'StudentName',
                'StudentRoll',
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('StudentClass'),
                'StudentID',
                'AdmissionID',
                'StudentFatherName',
                'StudentFatherOccupation',
                'StudentMotherName',
                'StudentMotherOccupation',
                'StudentGender',
                'StudentDateOfBirth',
                'StudentBirthCertificateNo',
                'StudentAddress',
                'StudentPhoneNumber',
                'StudentEmail',
                'AreaPostalCode',
                'StudentPicture',
                'JoiningDate',
                AllowedFilter::exact('StudentGroup'),
                AllowedFilter::exact('StudentReligion'),
                AllowedFilter::exact('Year'),
                AllowedFilter::exact('StudentStatus'),
                'StudentTranferStatus',
                'StudentTranferFrom',
                'AplicationStatus',
                'ThisMonthPaymentStatus', AllowedFilter::exact('id')
            ])
            ->orderBy('StudentRoll', 'ASC')
            ->get();
        return response()->json($result);
    }
    public function card_form()
    {
        return view('dashboard/students.card_form');
    }
    public function card_form_submit(Request $r)
    {
        $class = $r->class;
        return redirect("school/student/card/class/$class");
    }
    public function card(Request $r, $datavalue, $id,$school_id)
    {
        ini_set('max_execution_time', '60000');
        ini_set("pcre.backtrack_limit", "5000000000000000050000000000000000");
        ini_set('memory_limit', '12008M');
        if ($datavalue == 'class') {
            if ($id == 'All') {
                $data['rows'] = DB::table('students')->orderBy('StudentRoll', 'ASC')->get();
            } else {
                $wds = [
                    'StudentClass' => $id,
                    'school_id' => $school_id,
                    'Year' => date('Y'),
                ];
                $data['rows'] = DB::table('students')->where($wds)->orderBy('StudentRoll', 'ASC')->get();
            }
        } else {
            $wds = [
                'id' => $id,
            ];
            $data['rows'] = DB::table('students')->where($wds)->orderBy('StudentRoll', 'ASC')->get();
        }
        $data['types'] = 'pdf';
        $data['sign'] = base64('backend/students/1654069265____2211001.png');
         $data['card'] = base64('frontend/jss.PNG');
        $fileName = 'cards-' . date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $foldername = $data['rows'][0]->school_id;
        // return $data;
// return view('admin/cards.' . $foldername, $data);
        $pdf = PDF::loadView('admin/cards.' . $foldername, $data);
        return $pdf->stream("$fileName.pdf");
    }
    public function student_attendance(Request $request)
    {
        $id = $request->id;
        $veiwtype = $request->veiwtype;
        $dateormonth = $request->dateormonth;
        $StudentClass = $request->StudentClass;
        $school_id = $request->school_id;
        if ($veiwtype == 'Monthly') {
            $where = [
                'school_id' => $school_id,
                'month' => date("F", strtotime($dateormonth)),
                'year' =>  date("Y", strtotime($dateormonth)),
                'student_class' =>  $StudentClass,
            ];
            $data =  Attendance::where($where)->orderBy('date', 'ASC')->get();
        } elseif ($veiwtype == 'Daily') {
            $count =  Attendance::where(['school_id' => $school_id, 'student_class' => $StudentClass, 'date' => $dateormonth, 'year' => date("Y", strtotime($dateormonth))])->count();
            if ($count > 0) {
                $data['data'] = Attendance::where(['school_id' => $school_id,'student_class' => $StudentClass, 'date' => $dateormonth, 'year' => date("Y", strtotime($dateormonth))])->get();
                $data['counttype'] = 1;
            } else {
                $data['data'] = student::where(['school_id' => $school_id, 'StudentClass' => $StudentClass, 'StudentStatus' => 'Active'])->orderBy('StudentRoll','asc')->get();
                $data['counttype'] = 0;
            }
        } elseif ($veiwtype == 'edit') {
            $result = Attendance::where(['school_id' => $school_id,'student_class' => $StudentClass, 'date' => $dateormonth, 'year' => date("Y", strtotime($dateormonth))])->get();
            $result = json_decode($result[0]->attendance);
            $data  = array_filter($result, function ($var) use ($id) {
                return $var->id == $id;
            });
        }
        return response()->json($data);
    }
    public function student_attendance_count(Request $request)
    {
        $school_id = $request->school_id;
        $student_id = $request->student_id;
        $type = $request->type;
        $month = $request->month;
        $year = $request->year;
        $monthNumber =  month_to_number($month);
        $StudentRoll = '';
        $StudentClass = '';
        if($student_id){
            $students = student::find($student_id);
            $StudentRoll = $students->StudentRoll;
            $StudentClass = $students->StudentClass;
        }
// return $students;
    // $monthCount = cal_days_in_month(CAL_GREGORIAN,$monthNumber,$year);
    $monthCount = date('t', mktime(0, 0, 0, $monthNumber, 1, $year));
    $attendance = [];
    $datearray = [];
        for ($i=1; $i <=$monthCount ; $i++) {
            $present = 0;
            $absent = 0;
        $date = $year.'-'.sprintf('%02d', $monthNumber).'-'.sprintf('%02d', $i);
        array_push($datearray,$date);
            if($type=='student'){
                $filterdata = [
                    'school_id'=>$school_id,
                    'date'=>$date,
                    'student_class'=>$StudentClass,
                ];
            }else{
                $filterdata = [
                    'school_id'=>$school_id,
                    'date'=>$date
                ];
            }
        $datas =  Attendance::where($filterdata)->get();
     foreach ($datas as $key => $value) {
         foreach (json_decode($value->attendance) as $key => $value) {
            if($type=='student'){
                if($value->stu_roll==$StudentRoll){
                    if($value->attendence=='Present'){
                        $present +=1;
                    }else{
                        $absent +=1;
                    }
                }
            }else{
                if($value->attendence=='Present'){
                    $present +=1;
                }else{
                    $absent +=1;
                }
            }
         }
     }
        array_push($attendance,[
            'date'=>$date,
            'present'=>$present,
            'absent'=>$absent,
        ]);
        }
        $presuntcount = [];
        $absentcount = [];
        foreach ($attendance as $key => $value) {
        array_push($presuntcount,$value['present']);
        array_push($absentcount,$value['absent']);
        }
        $presuntArray = [
            'label' => 'Present',
            'backgroundColor' => 'green',
            'data' => $presuntcount,
            'borderColor' => 'green',
            'borderWidth' => 1
        ];
        $absentArray = [
            'label' => 'Absent',
            'backgroundColor' => 'red',
            'data' => $absentcount,
            'borderColor' => 'red',
            'borderWidth' => 1
        ];
        // return $presuntArray;
// die();
        return response()->json(['dates'=>$datearray,'present'=>$presuntArray,'absent'=>$absentArray]);
    }
    public function student_attendance_submit(Request $request)
    {
        $id = $request->id;
        $school_id = $request->school_id;
        $date = $request->date;
        $student_class = $request->student_class;
        $data = [];
        $staffs = [];
        foreach ($request->attendence as $key => $value) {
            if ($value == null) {
            } else {
                $staffs[$key] = student::find($key);
                $data[$key] = $value;
            }
        }
        $attendance = [];
        if ($id != '') {
            $attendanceRecord = Attendance::where('date', $date)->get();
            foreach ($attendanceRecord as $value) {
                $attendancedata = json_decode($value->attendance);
                foreach ($attendancedata as $value2) {
                    if ($value2->id == $id) {
                        $attendenceValue = $request->attendence[$value2->id];
                    } else {
                        $attendenceValue = $value2->attendence;
                    }
                    $attendances = [
                        'id' => $value2->id,
                        'stu_roll' => $value2->stu_roll,
                        'fatherName' => $value2->fatherName,
                        'motherName' => $value2->motherName,
                        'stu_id' => $value2->stu_id,
                        'stu_name' => $value2->stu_name,
                        'phone' => $value2->phone,
                        'attendence' => $attendenceValue,
                        'status' => 'pending',
                    ];
                    array_push($attendance, $attendances);
                }
            }
        } else {
            foreach ($staffs as $value) {
                //    print_r($value->TeacherName );
                $attendances = [
                    'id' => $value->id,
                    'stu_roll' => $value->StudentRoll,
                    'fatherName' => $value->StudentFatherName,
                    'motherName' => $value->StudentMotherName,
                    'stu_id' => $value->StudentID,
                    'stu_name' => $value->StudentName,
                    'phone' => $value->StudentPhoneNumber,
                    'attendence' => $request->attendence[$value->id],
                    'status' => 'pending',
                ];
                array_push($attendance, $attendances);
                // $attendance.push($attendances);
            }
        }
        $attendances = json_encode($attendance);
        $data = [
            'date' => $request->date,
            'school_id' => $school_id,
            'month' =>  date("F", strtotime($request->date)),
            'year' => date("Y", strtotime($request->date)),
            'student_class' => $student_class,
            'attendance' => $attendances,
            'message_status' => 'Pending',
        ];
        if ($id == '') {
            $results  =    Attendance::create($data);
            $results['status'] = 'Created';
        } else {
            // return $data;
            $results['data'] =  Attendance::where('date', $date)->update($data);
            $results['status'] = 'Updated';
        }
        return response()->json($results);
    }
    public function student_attendance_row(Request $request)
    {
        $date_month = $request->date_month;
        $class = $request->class;
        $school_id = $request->school_id;
        $monthYear = explode('-', $date_month);
        //$cal = cal_days_in_month(CAL_GREGORIAN, $monthYear[1], $monthYear[0]);
		$cal = date('t', mktime(0, 0, 0, $monthYear[1], 1, $monthYear[0]));
        $months = date('F', strtotime($date_month));
        $year = date('Y', strtotime($date_month));
        $students = student::where(['school_id' => $school_id, 'StudentClass' => $class, 'Year' => $year, 'StudentStatus' => 'Active'])->get();
        // die();
        $table = "
            <div class='heading-layout1'>
                <div class='item-title'>
                    <h5>
                        <center class='mobilefonthead'>$class  ATTENDANCE</center>
                        </center>
                    </h5>
                </div>
                <h5>
                    <div class='well tex-center mobilefonthead'>DATE : $date_month
                    </div>
                </h5>
            </div>
            <div class='table-responsive double-scroll'>
<table class='table bs-table table-striped table-bordered text-nowrap'>
<thead>
    <tr>
        <th class='text-left'>রোল</th>
        <th class='text-left'>নাম</th>";
        for ($monthcount = 1; $monthcount <= $cal; $monthcount++) {
            $table .= "<th>" . int_en_to_bn(sprintf('%02d', $monthcount)) . "</th>";
        }
        $table .= "</tr>
</thead>
<tbody>";
        foreach ($students as $value) {
            $table .= "<tr>
    <td class='text-left'>$value->StudentRoll </td>
    <td class='text-left'>$value->StudentName </td>";
            for ($monthcount = 1; $monthcount <= $cal; $monthcount++) {
                $datas =  date("Y-m", strtotime($date_month));
                $cutentdate = $datas . '-' . sprintf("%02d", $monthcount);
                // print_r(attendancemonth($cutentdate,$class,$value->StudentID,$tt=''));
                if (attendancemonth($cutentdate, $class, $value->StudentID, $tt = '', $value->school_id) == '') {
                    $table .= '<td>-</td>';
                } else {
                    $table .= attendancemonth($cutentdate, $class, $value->StudentID, $tt = '', $value->school_id);
                    // dd(attendancemonth($cutentdate,$class,$value->StudentID,$tt=''));
                }
                //echo attendancemonthCheck($cutentdate,$class,$row->StudentID);
            }
            $table .= "</tr>";
        }
        $table .= "</tbody>
            </table>
             </div>
        ";
        return $table;
    }
    public function attendence_sheet_result_pdf(Request $r, $school_id, $student_class, $view, $date)
    {
        ini_set('max_execution_time', '60000');
        ini_set("pcre.backtrack_limit", "5000000000000000050000000000000000");
        ini_set('memory_limit', '12008M');
        $data['data'] = $view;
        $data['class'] = $student_class;
        $data['date_month'] = $date;
        if ($data['data'] == 'Daily') {
            $coutnWhere = [
                'student_class' => $student_class,
                'date' => $date,
                'year' => date("Y"),
                'school_id'=>$school_id
            ];
            $data['count'] = DB::table('attendances')->where($coutnWhere)->count();
            if ($data['count'] > 0) {
                $aWhere = [
                    'date' => $date,
                    'student_class' => $student_class,
                    'school_id'=>$school_id
                ];
                $data['attten'] = DB::table('attendances')->where($aWhere)->get();
            } else {
                $sWhere = [
                    'school_id' => $school_id,
                    'StudentClass' => $student_class,
                    'Year' => date('Y'),
                    'StudentStatus' => 'Active',
                ];
                $data['rows'] = DB::table('students')->where($sWhere)->orderBy('StudentRoll', 'ASC')->get();
            }
        }else if ($data['data'] == 'Monthly'){
            $aWhere = [
                'month' => date("F", strtotime($date)),
                'student_class' => $student_class,
                'school_id'=>$school_id
            ];
            $data['rows'] = DB::table('attendances')->where($aWhere)->get();
            $sWhere = [
                'school_id' => $school_id,
                'StudentClass' => $student_class,
                'Year' => date('Y'),
                'StudentStatus' => 'Active',
            ];
            $data['students'] = DB::table('students')->where($sWhere)->orderBy('StudentRoll', 'ASC')->get();
        }
        $data['sign'] = base64(sitedetails()->PRINCIPALS_Signature);
        $data['tt'] = 'pdf';
        $pdf = PDF::loadView('admin/pdfReports.attendance', $data);
        return $pdf->stream($date.'.pdf');
        // return view('dashboard/attendence.attenFull', $data);
    }
    public function student_list_pdf(Request $r,$year,$class,$school_id)
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
        // $pathgovlogo = 'frontend/schoolLogo.png';
        // $typegovlogo = pathinfo($pathgovlogo, PATHINFO_EXTENSION);
        // $dataigovlogo = file_get_contents($pathgovlogo);
        // $govlogo = 'data:image/' . $typegovlogo . ';base64,' . base64_encode($dataigovlogo);
        // $data['logo'] = $govlogo;
        $fileName = 'students-'.date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        // return $data;
        $pdf = LaravelMpdf::loadView('admin/pdfReports.total_student', $data);
        return $pdf->stream("$fileName.pdf");
        // return view('', $data);
    }




    public function applicant_invoice($trxid)
    {

        $transId = $trxid;
        $payment = payment::where(['trxid'=>$transId,'status'=>'Paid'])->first();

        $AdmissionID = $payment->admissionId;

        $student = student::where(['AdmissionID'=>$AdmissionID])->first();

// return $this->invoice($payment,$student);

        $fileName = 'Invoice-'.date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L','default_font' => 'bangla',]);
        $mpdf->WriteHTML( $this->invoice($payment,$student));
      return   $mpdf->Output($fileName,'I');
    }


    public function invoice($payment,$student){

        $school_id = $student->school_id;

        $school_details = school_detail::where('school_id',$school_id)->first();
        $full_name  = $school_details->SCHOLL_NAME;
        $address  = $school_details->SCHOLL_ADDRESS;
        $status  = $payment->status;
        $invoiceId  = $payment->trxid;
        $amount  = $payment->amount;
        $created_at  = $payment->date;
        $studentClass  = $payment->studentClass;
        $studentRoll  = $payment->studentRoll;
        $StudentName  = $student->StudentName;
        $StudentFatherName  = $student->StudentFatherNameBn;
        $mobile_no  = $student->StudentPhoneNumber;
        $AdmissionID  = $student->AdmissionID;

        $studentAddress  = "$student->district ,$student->upazila , $student->union , $student->StudentAddress";

        $amounts = $amount;

        $numto = new NumberToBangla();
         $amountText = $numto->bnMoney($amounts);
         $qrurl = url("/inviceverify?trx=$invoiceId");

         // $qrurl = url("/verification/sonod/$row->id");
         //in Controller
         $qrcode = \QrCode::size(70)
             ->format('svg')
             ->generate($qrurl);
             $qrcode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrcode);

        // <div style='text-align:right'>(ডিলারের কপি)</div>
        $html = "

        <style>
        @page {
            margin: 10px;
           }

        .memoborder{
            width: 48%;
            border:3px solid black;

        }

        .memobg{
            padding:15px;

        }

        .memo {
        //    width: 500px;
        //    margin:0 auto;
        //    padding:20px;
            background: white;

        }



        .memoHead {
            text-align: center;
            color:black
        }
        .companiname {
            margin:0;
        }
        p {

            color:black;
            margin:0;

        }div {

            color:black;
            margin:0;

        }
        p.defalttext.address {
            background:black;
            width: 269px;
            margin: 0 auto;
            color: white;
            border-radius: 50px;
            padding: 2px 0px;
        }
        p.defalttext {
            font-weight: 600;
            font-size: 18px;
            margin: 0;
            /* transform: scaleX(1.2); */

        }
        .defaltfont {
            font-size: 18px;
        }


        .thead .tr {
            color: black;
        }
        .thead .tr .th {
            color: black;
        }

        .tr {
            border: 1px solid black;
        }

        .th {
            border: 1px solid black;
            border-right: 1px solid white;
        }

        .td {
            border: 1px solid black;
        }
        .table,  .td {
          border: 1px solid black;
          border-collapse: collapse;
          text-align: center;
          color:black;
        }.th, {
          border: 1px solid white;
          border-collapse: collapse;
        }

        .td {
            height: 18.5px;

        }
        .slNo{
            float: right;
            width: 300px;
        }



.tdlist{
    height: 200px;
    vertical-align: top;
}

        </style>


    <div id='body'>

    <div class='memoborder' style='float:left' >
    <div class='memobg memobg1'>
            <div class='memo'>
            <div class='memoHead'>



            <h2 style='font-weight: 500;' class='companiname'>$full_name</h2>
            <p class='defalttext'>$address</p>";

            if($status=='Paid'){
                $html .="            <h2 class='companiname' style='width: 160px;
                margin: 0 auto;
                background: green;
                color: white;
                border-radius: 50px;
                font-size: 16px;
                padding: 6px 0px;'>পরিশোধিত </h2>";
            }else{

                $html .="           <h2 class='companiname' style='width: 160px;
                margin: 0 auto;
                background: red;
                color: white;
                border-radius: 50px;
                font-size: 16px;
                padding: 6px 0px;'>অপরিশোধিত </h2>";
            }



            $html .="




        </div>

        <table style='width:100%'>
        <tr>
            <td colspan='2'>এডমিশন আইডিঃ- ".int_en_to_bn($AdmissionID)." </td>
            <td class='defaltfont' style='text-align:right'>রশিদ নং- ".int_en_to_bn($invoiceId)."</td>
        <tr>



        <tr>
            <td class='defaltfont' >নাম: $StudentName </td>
            <td class='defaltfont' colspan='2'>পিতার নাম- $StudentFatherName</td>

        <tr>

        <tr>
            <td class='defaltfont' >শ্রেণিঃ- $studentClass </td>";

            if($payment->type=='Admission_fee'){

                $html .=" <td class='defaltfont' colspan='2'></td>";
            }else{

                $html .=" <td class='defaltfont' colspan='2'> রোলঃ- $studentRoll </td>";
            }


       $html .=" <tr>
        <tr>
            <td class='defaltfont' >ঠিকানা: $studentAddress</td>
            <td class='defaltfont' >মোবাইল: ".int_en_to_bn($mobile_no)."</td>

        <tr>

        </table>
    <p></p>




                <div class='memobody' style='position: relative;'>

                    <div class='productDetails'>
                        <table class='table' style='border:1px solid #444B8F;width:100%' cellspacing='0'>
                            <thead class='thead'>
                                <tr class='tr'>
                                    <td class='th defaltfont' colspan='3' width='10%'>আদায়ের বিবরণ</td>
                                </tr>

                                <tr class='tr'>
                                    <td class='td defaltfont' width='5%'>ক্র. নং</td>
                                    <td class='td defaltfont' width='25%'>খাত</td>
                                    <td class='td defaltfont' width='15%'>মোট টাকার পরিমাণ</td>



                                </tr>
                            </thead>
                            <tbody class='tbody'>";



                            $khat = [
                                   'Admission_fee'=>'ভর্তি ফি',
                                   'monthly_fee'=>'মাসিক বেতন',
                                   'session_fee'=>'সেশন ফি',
                                   'exam_fee'=>'পরীক্ষার ফি',
                            ];

                            $kahts = json_decode(json_encode($khat));
                            print_r($kahts);


                                    // $totalpay = $orders->pay;
                                    // $totaldue = $orders->due;
                                    $index = 1;
                                foreach ($khat as $key=>$value) {

                                  $html .="  <tr class='tr items'>
                                        <td class='td  defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td  defaltfont'>$value</td>";

                                        if($key==$payment->type){
                                            $html .=" <td class='td  defaltfont'>".int_en_to_bn($amount)."</td>";
                                        }else{
                                            $html .=" <td class='td  defaltfont'>".int_en_to_bn(0)."</td>";

                                        };



                                  $html.="  </tr>";

                                        $index++;


                                    }







                                $html .=" </tbody>
                            <tfoot class='tfoot'>";





                            $html .="
                            <tr class='tr'>
                            <td colspan='2' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                            <td class='td defaltfont'>".int_en_to_bn($amount)."</td>
                    </tr>


                      ";








                                $html .=" </tfoot>
                        </table>
                        <p style='margin-top:15px;padding:0 15px;' class='defaltfont'>কথায় : $amountText মাত্র</p>

                    </div>
                </div>
                <div class='memofooter' style='margin-top:25px'>

                    <p style='float:left;width:30%;padding:10px 15px' class='defaltfont'>$qrcode</p>

                    <p style='float:right;width:30%;text-align:right;padding:15px;margin-top:25px' class='defaltfont'>আদায়কারীর স্বাক্ষর <br/> তারিখ: ".int_en_to_bn($created_at)."</p>
                </div>
                <p style='background:#727272;text-align:center'><span style='color:white'> QR code স্ক্যান করে রশিদ যাচাই করুন </span> <br/></p>
            </div>
        </div>
        </div>

    <div class='memoborder' style='float:right' >
    <div class='memobg memobg1'>
            <div class='memo'>
            <div class='memoHead'>



            <h2 style='font-weight: 500;' class='companiname'>$full_name</h2>
            <p class='defalttext'>$address</p>";

            if($status=='Paid'){
                $html .="            <h2 class='companiname' style='width: 160px;
                margin: 0 auto;
                background: green;
                color: white;
                border-radius: 50px;
                font-size: 16px;
                padding: 6px 0px;'>পরিশোধিত </h2>";
            }else{

                $html .="           <h2 class='companiname' style='width: 160px;
                margin: 0 auto;
                background: red;
                color: white;
                border-radius: 50px;
                font-size: 16px;
                padding: 6px 0px;'>অপরিশোধিত </h2>";
            }



            $html .="




        </div>

        <table style='width:100%'>
        <tr>
            <td colspan='2'>এডমিশন আইডিঃ- ".int_en_to_bn($AdmissionID)." </td>
            <td class='defaltfont' style='text-align:right'>রশিদ নং- ".int_en_to_bn($invoiceId)."</td>
        <tr>



        <tr>
            <td class='defaltfont' >নাম: $StudentName </td>
            <td class='defaltfont' colspan='2'>পিতার নাম- $StudentFatherName</td>

        <tr>

        <tr>
            <td class='defaltfont' >শ্রেণিঃ- $studentClass </td>";

            if($payment->type=='Admission_fee'){

                $html .=" <td class='defaltfont' colspan='2'></td>";
            }else{

                $html .=" <td class='defaltfont' colspan='2'> রোলঃ- $studentRoll </td>";
            }


       $html .=" <tr>
        <tr>
            <td class='defaltfont' >ঠিকানা: $studentAddress</td>
            <td class='defaltfont' >মোবাইল: ".int_en_to_bn($mobile_no)."</td>

        <tr>

        </table>
    <p></p>




                <div class='memobody' style='position: relative;'>

                    <div class='productDetails'>
                        <table class='table' style='border:1px solid #444B8F;width:100%' cellspacing='0'>
                            <thead class='thead'>
                                <tr class='tr'>
                                    <td class='th defaltfont' colspan='3' width='10%'>আদায়ের বিবরণ</td>
                                </tr>

                                <tr class='tr'>
                                    <td class='td defaltfont' width='5%'>ক্র. নং</td>
                                    <td class='td defaltfont' width='25%'>খাত</td>
                                    <td class='td defaltfont' width='15%'>মোট টাকার পরিমাণ</td>



                                </tr>
                            </thead>
                            <tbody class='tbody'>";



                            $khat = [
                                   'Admission_fee'=>'ভর্তি ফি',
                                   'monthly_fee'=>'মাসিক বেতন',
                                   'session_fee'=>'সেশন ফি',
                                   'exam_fee'=>'পরীক্ষার ফি',
                            ];

                            $kahts = json_decode(json_encode($khat));
                            print_r($kahts);


                                    // $totalpay = $orders->pay;
                                    // $totaldue = $orders->due;
                                    $index = 1;
                                foreach ($khat as $key=>$value) {

                                  $html .="  <tr class='tr items'>
                                        <td class='td  defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td  defaltfont'>$value</td>";

                                        if($key==$payment->type){
                                            $html .=" <td class='td  defaltfont'>".int_en_to_bn($amount)."</td>";
                                        }else{
                                            $html .=" <td class='td  defaltfont'>".int_en_to_bn(0)."</td>";

                                        };



                                  $html.="  </tr>";

                                        $index++;


                                    }







                                $html .=" </tbody>
                            <tfoot class='tfoot'>";





                            $html .="
                            <tr class='tr'>
                            <td colspan='2' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                            <td class='td defaltfont'>".int_en_to_bn($amount)."</td>
                    </tr>


                      ";








                                $html .=" </tfoot>
                        </table>
                        <p style='margin-top:15px;padding:0 15px;' class='defaltfont'>কথায় : $amountText মাত্র</p>

                    </div>
                </div>
                <div class='memofooter' style='margin-top:25px'>

                    <p style='float:left;width:30%;padding:10px 15px' class='defaltfont'>$qrcode</p>

                    <p style='float:right;width:30%;text-align:right;padding:15px;margin-top:25px' class='defaltfont'>আদায়কারীর স্বাক্ষর <br/> তারিখ: ".int_en_to_bn($created_at)."</p>
                </div>
                <p style='background:#727272;text-align:center'><span style='color:white'> QR code স্ক্যান করে রশিদ যাচাই করুন </span> <br/></p>
            </div>
        </div>
        </div>


        </div>



        ";


        return $html;
    }








        public function applicant_copy($applicant_id)
        {
    // return $this->applicant_copy_html($applicant_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','default_font' => 'bangla','margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 6,
    'margin_bottom' => 6,]);
    $mpdf->WriteHTML($this->applicant_copy_html($applicant_id));
    $mpdf->Output("applicant-copy-$applicant_id.pdf","I");
        }






        public function applicant_copy_html($applicant_id)
        {
            $student =  student::where('AdmissionID',$applicant_id)->latest()->first();

            $schoolDetails = school_detail::where('school_id',$student->school_id)->first();

            $html = '';
            $html="
            <!DOCTYPE HTML>
<html lang='en-US'>
<head>
	<meta charset='UTF-8'>
	<title>applicant-copy-$student->AdmissionID.pdf</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rootContainer {
            margin: 25px;
            border: 1px solid;
            padding: 5px 21px;
        }
        .tableTag, .tableTag td, .tableTag th {
        border: 1px solid #6c6c6c;
        border-collapse: collapse;
        padding: 3px 7px;
        font-size:11px;
        }
        td.tableRowHead {
            background: #e9e9e9;
            color: black !important;
            font-size:12px;
        }
        .fontsize1{
            font-size:16px;
        }
        .fontsize2{
            font-size:25px;
        }
        .copyTitle{
            font-size:23px;
            color:#3E4D5B;
        }


    </style>
</head>
<body>
    <div class='rootContainer'>
        <div class='headerSection'>
            <table width='100%'>
                <tr>
                    <td width='110px'>
                        <img width='75px'  style='overflow:hidden;float:right' src='".base64($schoolDetails->logo)."' alt=''>
                    </td>
                    <td>
                        <p class='fontsize2'>$schoolDetails->SCHOLL_NAME</p>
                        <p class='fontsize1'>$schoolDetails->SCHOLL_ADDRESS </p>
                    </td>

                    <td style='text-align: right'>
                    <div class='imgdiv'>
                    <img width='100px'  style='overflow:hidden;float:right' src='".base64($student->StudentPicture)."' alt=''>
                    </div>
                    </td>
                </tr>
            </table>
            <p style='    border-bottom: 3px solid #808080;    margin-top: 10px; margin-bottom: 20px;'></p>





            <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                <tr>
                    <td width='18%' class='tableRowHead' >Admssion Id</td>
                    <td colspan='3'>$student->AdmissionID</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Class</td>
                    <td>$student->StudentClass</td>
                    <td class='tableRowHead'  width='10%'>Group</td>
                    <td>$student->StudentGroup</td>
                </tr>
            </table>
            <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                <tr>
                    <td colspan='4' class='tableRowHead' style='text-align:center;font-size:16px' >Student Info</td>
                </tr>
                <tr>
                    <td class='tableRowHead'  width='20%'>Name (বাংলা)</td>
                    <td>$student->StudentName</td>
                    <td class='tableRowHead'  width='20%'>Name (English)</td>
                    <td>$student->StudentNameEn</td>

                </tr>
                <tr>
                    <td class='tableRowHead' >Date of Birth</td>
                    <td>$student->StudentDateOfBirth</td>
                    <td class='tableRowHead' >Birth Reg.</td>
                    <td>$student->StudentBirthCertificateNo</td>
                </tr>
                <tr>

                    <td class='tableRowHead' >Nationality</td>
                    <td colspan='3'>Banglideshi</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Gender</td>
                    <td>$student->StudentGender</td>
                    <td class='tableRowHead' >Religion </td>
                    <td>$student->StudentReligion </td>
                </tr>




                <tr>
                <td colspan='4' class='tableRowHead' style='text-align:center;font-size:16px'  >Father Info</td>
            </tr>
                <tr>
                    <td class='tableRowHead' >Father Name (বাংলা)</td>
                    <td>$student->StudentFatherNameBn</td>
                    <td class='tableRowHead' >Father Name (English)</td>
                    <td>$student->StudentFatherName</td>

                </tr>
                <tr>

                    <td class='tableRowHead'  width='15%'>Nid</td>
                    <td>$student->StudentFatherNid</td>
                    <td class='tableRowHead'  width='15%'>Birth Reg</td>
                    <td>$student->StudentFatherBCN</td>
                </tr>
                <tr>
                <td colspan='4' class='tableRowHead' style='text-align:center;font-size:16px'  >Mother Info</td>
            </tr>
                <tr>
                    <td class='tableRowHead' >Mother Name (বাংলা)</td>
                    <td>$student->StudentMotherNameBn</td>
                    <td class='tableRowHead' >Mother Name (English)</td>
                    <td>$student->StudentMotherName</td>

                </tr>
                <tr>

                    <td class='tableRowHead' >Nid</td>
                    <td>$student->StudentMotherNid</td>
                    <td class='tableRowHead'  width='15%'>Birth Reg</td>
                    <td>$student->StudentMotherBCN</td>
                </tr>



                <tr>
                <td colspan='4' class='tableRowHead' style='text-align:center;font-size:16px'  >Guardian Info</td>
            </tr>




                <tr>
                    <td class='tableRowHead' >Guard. Name (বাংলা)</td>
                    <td>$student->guardNameBn</td>
                    <td class='tableRowHead' >Guard. Name (English)</td>
                    <td>$student->guardName</td>

                </tr>
                <tr>
                <td class='tableRowHead' >Guard. Nid</td>
                <td>$student->guardNid</td>
                <td class='tableRowHead' >Guard. Rel</td>
                <td>$student->guardRalation</td>

                </tr>

                <tr>
                <td colspan='4' class='tableRowHead' style='text-align:center;font-size:16px'  >Others Info</td>
            </tr>


                <tr>
                    <td class='tableRowHead' >Student Quota</td>
                    <td>$student->StudentKota</td>
                    <td class='tableRowHead' >Sonod No</td>
                    <td >$student->StudentKotaSonodNo</td>


                </tr>



                <tr>
                    <td class='tableRowHead' >Student Category</td>
                    <td colspan='3'>$student->StudentCategory</td>
                </tr>
                <tr>
                <td class='tableRowHead' >Mobile No.</td>
                <td  colspan='3'>$student->StudentPhoneNumber</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Prev School</td>
                    <td colspan='3'>$student->preSchool</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Prev Class</td>
                    <td colspan='3'>$student->preClass</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Present Address</td>
                    <td colspan='3'>বিভাগঃ- $student->division, জেলাঃ- $student->district, উপজেলাঃ- $student->upazila, ইউনিয়নঃ- $student->union, পোস্ট অফিসঃ- $student->post_office($student->AreaPostalCode), গ্রামঃ- $student->StudentAddress</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Permanent Address</td>
                    <td colspan='3'>বিভাগঃ- $student->division, জেলাঃ- $student->district, উপজেলাঃ- $student->upazila, ইউনিয়নঃ- $student->union, পোস্ট অফিসঃ- $student->post_office($student->AreaPostalCode), গ্রামঃ- $student->StudentAddress</td>
                </tr>
            </table>
            <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                <tr>
                    <td class='tableRowHead'  width='15%'>Applied On</td>
                    <td>$student->JoiningDate</td>
                    <td  class='tableRowHead' width='15%'>Printed On</td>
                    <td>".date('Y-m-d')."</td>
                </tr>
                <tr>
                    <td class='tableRowHead'>Declaration</td>
                    <td colspan='3'>I declare that the information provided in this form is correct, true and complete to the best of my knowledge and belief. If any information is found false, incorrect and incomplete or if any ineligibility is detected before or after the examination, any action can be taken against me by the Authority.</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
            ";
return $html;
        }
}

<?php
namespace App\Http\Controllers\api;
use PDF;
use URL;
use App\Models\User;
use App\Models\student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\StudentResult;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use Illuminate\Support\Facades\Hash;

class studentsController extends Controller
{
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


    public function StudentAdmissionId($admition_id='',$school_id)
    {


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


    public function word_digit($word)
    {
        $warr = explode(';', $word);
        $result = '';
        foreach ($warr as $value) {
            switch (trim($value)) {
                case 'Play':
                    $result .= '0';
                    break;
                case 'Nursery':
                    $result .= '11';
                    break;
                case 'One':
                    $result .= '1';
                    break;
                case 'Two':
                    $result .= '2';
                    break;
                case 'Three':
                    $result .= '3';
                    break;
                case 'Four':
                    $result .= '4';
                    break;
                case 'Five':
                    $result .= '5';
                    break;
                case 'Six':
                    $result .= '6';
                    break;
                case 'Seven':
                    $result .= '7';
                    break;
                case 'Eight':
                    $result .= '8';
                    break;
                case 'Nine':
                    $result .= '9';
                    break;
                case 'Ten':
                    $result .= '10';
                    break;
            }
        }
        return $result;
    }
    public function StudentId($class, $roll,$school_id)
    {

        $classidd = $this->word_digit($class);
        $classid = str_pad($classidd, 2, '0', STR_PAD_LEFT);
        $yearid = date("y");
        $rollid = str_pad($roll, 3, '0', STR_PAD_LEFT);
        return $school_id . '-' . $yearid . $classid . $rollid;
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
            $admition_ID = (string)$this->StudentAdmissionId($admition_id,$school_id);
            $StudentID = $this->StudentId($class, $roll,$school_id);
            $data = ['admition_ID' => $admition_ID, 'StudentID' => $StudentID, 'StudentRoll' => $row[0]->StudentRoll + 1];
        } else {
            $one = "0001";
            $year = date("dmy");
            $admition_ID = $school_id . $year . $one;
            ////////////////////////////////
            $StudentID = $this->StudentId($class, "1",$school_id);
            $data = ['admition_ID' => $admition_ID, 'StudentID' => $StudentID, 'StudentRoll' => '1'];
        }
        return response()->json($data);
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
        $id = $r->id;
        $data = $r->except('AdmissionID');

$school_id = $r->school_id;


        $data['AdmissionID'] = (string)$this->StudentAdmissionId('',$school_id);



        if ($id == '') {
            $data['JoiningDate'] = date("Y-m-d");
            $data['StudentStatus'] = 'Applied';
            $result =   student::create($data);
        } else {
            $student = student::find($r->id);
            $result = $student->update($data);
        }
        return $result;
    }

    public function imageupload(Request $request)
    {
        $id =  $request->id;
        $student = student::find($id);
        if(File::exists($student->StudentPicture)){
            unlink($student->StudentPicture);
        }
      $StudentPicture=  fileupload($request->StudentPicture,'backend/students/',250,300,$student->StudentID);

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


        public function applicant_copy($applicant_id)
        {

    // return $html;


    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','default_font' => 'bangla','margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 6,
    'margin_bottom' => 6,]);
    $mpdf->WriteHTML($this->applicant_copy_html($applicant_id));
    $mpdf->Output('document.pdf','I');

        }


        public function applicant_copy_html($applicant_id)
        {
            $student =  student::where('AdmissionID',$applicant_id)->latest()->first();


            $html = '';



            $html="

            <!DOCTYPE HTML>
<html lang='en-US'>
<head>
	<meta charset='UTF-8'>
	<title></title>
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
        font-size:10px;
        }
        td.tableRowHead {
            background: #e9e9e9;
            color: black !important;
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
                    <td>
                        <p class='fontsize1'>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার </p>
                        <p class='fontsize2'>মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা অধিদপ্তর</p>

                    </td>
                    <td style='text-align: right'>
                        <p>Applicant's Copy</p>
                    </td>
                </tr>
            </table>

            <p style='    border-bottom: 3px solid #808080;    margin-top: 10px; margin-bottom: 20px;'></p>
            <h3 style='text-align:center' class='copyTitle'>সরকারি বিদ্যালয় সমূহের ভর্তি ২০২৩</h3>

            <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>

                <tr>
                    <td width='15%' class='tableRowHead' >Admssion Id</td>
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
                    <td class='tableRowHead'  width='20%'>Name</td>
                    <td colspan='3'>$student->StudentName</td>
                    <td width='20%' style='padding:0 !important;' rowspan='6'><img width='180px' style='overflow:hidden' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfOcr1OHnhhPCnQZrdBTc4kaopGN_phjZ8QQ&usqp=CAU' alt=''></td>
                </tr>


                <tr>
                    <td class='tableRowHead' >Father Name</td>
                    <td>$student->StudentFatherNameBn</td>
                    <td class='tableRowHead'  width='13%'>Nid</td>
                    <td>$student->StudentFatherNid</td>

                </tr>
                <tr>
                    <td class='tableRowHead' >Mother Name</td>
                    <td>$student->StudentMotherNameBn</td>
                    <td class='tableRowHead' >Nid</td>
                    <td>$student->StudentMotherNid</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Date of Birth</td>
                    <td>$student->StudentDateOfBirth</td>
                    <td class='tableRowHead' >Birth Reg.</td>
                    <td>$student->StudentBirthCertificateNo</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Mobile No.</td>
                    <td>$student->StudentPhoneNumber</td>
                    <td class='tableRowHead' >Nationality</td>
                    <td>Banglideshi</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Gender</td>
                    <td colspan='3'>$student->StudentGender</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Guard. Name</td>
                    <td></td>
                    <td class='tableRowHead' >Guard. Nid</td>
                    <td colspan='2'></td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Prev School</td>
                    <td colspan='4'></td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Prev Class</td>
                    <td colspan='4'></td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Present Address</td>
                    <td colspan='4'>$student->StudentAddress</td>
                </tr>
                <tr>
                    <td class='tableRowHead' >Permanent Address</td>
                    <td colspan='4'>$student->StudentAddress</td>
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
                    <td colspan='3'>sdfghj</td>



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

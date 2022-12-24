<?php

namespace App\Http\Controllers\api;

use PDF;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ResultLog;
use App\Models\school_detail;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;

class resultController extends Controller
{


    public function marksheet(Request $request)
    {
        // return $request->all();
        $group = 'Humanities';
        if($request->class=="Nine" || $request->class=="Ten"){
            $group = $request->group;
        }


        $subject = $request->subject;
        if($subject=='ধর্ম ও নৈতিক শিক্ষা'){
            if($request->religion=='Islam'){

                $subject = 'ইসলাম-ধর্ম';
            }elseif($request->religion=='Hindu'){
                $subject = 'হিন্দু-ধর্ম';

            }
        }


        $filter = [
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $group,
        ];

        if($request->religion=='Islam' || $request->religion=='Hindu' ){
            $filter['StudentReligion']=$request->religion;
        }
        // return $filter;
         $results = StudentResult::where($filter)->orderBy('roll','asc')->get();



         $group2 = 'All';
         if($request->class=="Nine" || $request->class=="Ten"){
             $group2 = $request->group;
         }

         $logData = [
            'class'=>$request->class,
            'group'=> $group2,
            'subject'=>$subject,
            'examName'=>$request->exam_name,
            'month'=>date('F'),
            'year'=>date('Y'),
        ];



         $resultLog = ResultLog::where($logData)->first();
    //   return view('resultReport',compact('results','subject'));

    $pdfFileName = date('d-m-Y').'_'.subjectCol($subject).'.pdf';

            $pdf = LaravelMpdf::loadView('resultReport',compact('results','subject','resultLog','pdfFileName'));
            return $pdf->stream($pdfFileName);


    }






    public function Result(Request $request)
    {
        $filter = [
            'school_id' => $request->school_id,
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $request->group,
        ];

      return  $result = StudentResult::where($filter)->orderBy('failed','asc')->orderBy('total','desc')->get();
    }







    public function checkResultall($school_id, $class, $year, $exam_name, $subject = '', $group = '')
    {
        // return $request->subject;
        if ($exam_name == 'Weakly Examination') {
            $result = StudentResult::where(['school_id' => $school_id, 'class' => $class, 'year' => $year, 'exam_name' => $exam_name, 'subject' => $subject])->get();
        } else {
            $result = StudentResult::where(['school_id' => $school_id, 'class' => $class, 'year' => $year, 'exam_name' => $exam_name, 'class_group' => $group])->get();
        }
        return $result;
        // return response()->json($result);
    }
    public function submit(Request $request)
    {
        $group = $request->group;
        if ($group == 'All') {
            $group = 'Humanities';
        }
        $oldresult =  $this->checkResultall($request->school_id, $request->classname, $request->year, $request->exam_name, $request->subject, $group);
        $oldresultid = [];
        foreach ($oldresult as $value) {
            // print_r($value);
            $oldresultid[$value->roll] = $value->id;
        }
        $oldresultidcount =  count($oldresultid);
        // die();
        // $subject =  subjectCol($request->subject);
        $religion =  $request->religion;
        if ($religion == 'Islam') {
            $subject = 'ReligionIslam';
        } elseif ($religion == 'Hindu') {
            $subject = 'ReligionHindu';
        } else {
            $subject = subjectCol($request->subject);
        }
        $i = 0;
        foreach ($request->number as $roll => $value) {
            $students = student::where(['StudentRoll' => $roll, 'StudentClass' => $request->classname, 'StudentGroup' => $group, 'Year' => $request->year])->get();
            $data = [
                'school_id' => $students[0]->school_id,
                'stu_id' => $students[0]->StudentID,
                'name' => $students[0]->StudentName,
                'roll' => $students[0]->StudentRoll,
                'date' => $request->date,
                'month' => date('F', strtotime($request->date)),
                'year' => $request->year,
                'subject' => $request->subject,
                'exam_name' => $request->exam_name,
                'class' => $request->classname,
                'class_group' => $group,
                'StudentReligion' => $students[0]->StudentReligion,
                'status' => 'Draft',
            ];
            unset($value['TOTAL']);
            unset($value['SUBJECT_TOTAL']);
            $sum = 0;
            foreach ($value as  $items) {
                $items;
                $sum = $sum + $items;
            }
            //  echo $sum.'<br>';
            $data[$subject] = $sum;
            $value['TOTAL'] = $sum;
            $value['SUBJECT_TOTAL'] = $request->total;
            $data[$subject . '_d'] = json_encode($value);
            // print_r($data);
            if ($oldresultidcount > 0) {
                $resultcount = StudentResult::where(['school_id' => $students[0]->school_id, 'class' => $request->classname, 'year' => $request->year, 'exam_name' => $request->exam_name, 'roll' => $students[0]->StudentRoll])->count();
                if ($resultcount > 0) {
                    $StudentResult =  StudentResult::find($oldresultid[$roll]);
                    $result = $StudentResult->update($data);
                } else {
                    $result =  StudentResult::create($data);
                }
                // print_r($result);
            } else {

                $result =  StudentResult::create($data);
            }
            $i++;
        }


        $logsubject = $request->subject;

        if($request->religion=='Islam'){
            $logsubject = 'ইসলাম-ধর্ম';
        }elseif($request->religion=='Hindu'){
            $logsubject = 'হিন্দু-ধর্ম';
        }


        $logData = [
            'class'=>$request->classname,
            'group'=> $request->group,
            'subject'=>$logsubject,
            'examName'=>$request->exam_name,
            'StudentReligion'=>$request->religion,
            'month'=>date('F', strtotime($request->date)),
            'year'=>$request->year
        ];


        $checkResultLog = ResultLog::where($logData)->count();
        if($checkResultLog>0){
            $ResultLogUp = ResultLog::where($logData)->first();
            $logData['status'] = '1';
            $ResultLogUp->update($logData);
        }else{
            $logData['status'] = '1';
            ResultLog::create($logData);
        }



        return $result;
    }
    public function checkSingleResult(Request $request)
    {
        // return $class_group = $request->filter['class_group'];
        $data = QueryBuilder::for(StudentResult::class)
            ->allowedFilters([
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('exam_name'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('roll'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('subject'),
                AllowedFilter::exact('class_group'),
                AllowedFilter::exact('StudentReligion'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('message_status'),
                AllowedFilter::exact('FinalResultStutus'),
                AllowedFilter::exact('date'),
                AllowedFilter::exact('stu_id'),
                AllowedFilter::exact('Bangla_1st'),
                AllowedFilter::exact('id')
            ]);
            // ->first();
            $result = $data->first();
        //    return resultDetails($result);
            $count = $data->count();

            $html  = "";
            if ($count > 0) {
                $Fgg = 0;
                if ($result->status == 'Draft') {
                    $html  .= "     <table class='width-50 table table-sm mt-3' width='100%' >";
                    $html  .= "
                    <tbody>
                        <tr class='table-danger'>
                            <td class='pl-5 pr-5'> <b>
                                    <center>
                                        <h4>Result Cannot Published Yet!</h4>
                                    </center>
                                </b></td>
                        </tr>
                    </tbody>
                    </table>
                    ";
                } else {


                    $html="<a  class='btn btn-info' target='_blank' style='float: right;padding:15px;font-size:18px' href='/pdf/$result->school_id/$result->class/$result->roll/$result->year/$result->exam_name/$result->class_group'>Download</a>";


                    $html.= resultDetails($result);
                    $html.= ResultGradeList($result);

                }
            } else {
                $html  .= "
                <table class='width-50 table table-sm mt-3' width='100%' v-if='count == 'not found''>
                    <tbody>
                        <tr class='table-danger'>
                            <td class='pl-5 pr-5' > <b>
                                    <center>
                                        <h4>Result Cannot Find!</h4>
                                    </center>
                                </b></td>
                        </tr>
                    </tbody>
                </table>";
            }








                return $html;


        // return response()->json($result);





    }
    public function searchResult(Request $request)
    {
        // return $request->all();
        $result = QueryBuilder::for(StudentResult::class)
            ->allowedFilters([
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('exam_name'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('roll'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('subject'),
                AllowedFilter::exact('class_group'),
                AllowedFilter::exact('StudentReligion'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('message_status'),
                AllowedFilter::exact('FinalResultStutus'),
                AllowedFilter::exact('date'),
                AllowedFilter::exact('stu_id'),
                AllowedFilter::exact('Bangla_1st'),
                AllowedFilter::exact('id')
            ]);
        $results = $result->first();

        $count = $result->count();
        // return $results;
        // return $this->Greeting(80,100,'greed');
        $html  = "";
        if ($count > 0) {
            $Fgg = 0;
            if ($results->status == 'Draft') {
                $html  .= "     <table class='width-50 table table-sm mt-3' width='100%' >";
                $html  .= "
                <tbody>
                    <tr class='table-danger'>
                        <td class='pl-5 pr-5'> <b>
                                <center>
                                    <h4>Result Cannot Published Yet!</h4>
                                </center>
                            </b></td>
                    </tr>
                </tbody>
                </table>
                ";
            } else {


                $student = student::where(['StudentID'=>$results->stu_id])->first();


                $html .= resultDetails($results);

                $html  .= "<div  style='text-align: center;'><a target='_blank' href='/payment?studentId=$student->id&type=marksheet&resultId=$results->id' class='btn btn-info' style='font-size: 25px;'>ডাউনলোড মার্কশীট</a></div>";

                $html  .= "<h4 style='text-align: center;color: #007BFF;font-size: 25px;margin: 11px 2px;'>অথবা</h4>";

                $html  .= "<h2 style='text-align:center;font-size:20px;color:#007BFF'>মার্কশীট সংগ্রহ করতে বিদ্যালয়ে যোগাযোগ করুন </h2>";
                //    $html .= ResultGradeList($results);

            }
        } else {
            $html  .= "
            <table class='width-50 table table-sm mt-3' width='100%' v-if='count == 'not found''>
                <tbody>
                    <tr class='table-danger'>
                        <td class='pl-5 pr-5' > <b>
                                <center>
                                    <h4>Result Cannot Find!</h4>
                                </center>
                            </b></td>
                    </tr>
                </tbody>
            </table>";
        }
        return $html;
    }












    public function checkResult(Request $request)
    {
        // return $request->all();
        if ($request->subject == 'ইসলামধর্ম') {
            $subjects = 'ReligionIslam';
        } elseif ($request->subject == 'হিন্দুধর্ম') {
            $subjects = 'ReligionHindu';
        } else {
            $subjects = subjectCol($request->subject);
        }
        //  return $subjects;
        // $subjects =  $students[0]->StudentReligion;
        // return $request->filter['school_id'];
        if ($request->all == true) {
            return $this->checkResultall($request->filter['school_id'], $request->filter['class'], $request->filter['year'], $request->filter['exam_name']);
        }
        $result = QueryBuilder::for(StudentResult::class)
            ->allowedFilters([
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('exam_name'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('class_group'),
                AllowedFilter::exact('StudentReligion'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('message_status'),
                AllowedFilter::exact('FinalResultStutus'),
                AllowedFilter::exact('date'),
                AllowedFilter::exact('stu_id'),
                AllowedFilter::exact('Bangla_1st'),
                AllowedFilter::exact('id')
            ])
            ->where($subjects, '!=', null)
            ->get();
        return response()->json($result);
    }

    public function Resultpromotion(Request $request)
    {

        $filter = [
            'school_id' => $request->school_id,
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $request->class_group,
        ];

        $results = StudentResult::where($filter)->orderBy('failed','asc')->orderBy('total','desc')->get();
     $statuses = $request->status;
     foreach ($results as  $key=>$value) {

        $studentresult = StudentResult::find($value->id);

        if(isset($statuses[$value->id])){
            $promote = '1';
            $nextClass = promoteClass($value->class);
            $nextRoll = $value->nextroll;
            $nextYear = $value->year+1;
            $StudentStatus = 'Active';
        }else{
            $promote = '0';
            $nextClass = $value->class;
            $nextRoll = $value->roll;
            $nextYear = $value->year;
            $StudentStatus = 'Failed';
        }


        $data = [
            'promote' => $promote,
        ];
        $result =  $studentresult->update($data);

        $promoteData = [


            'StudentClass'=>$nextClass,
            'StudentRoll'=>$nextRoll,
            'Year'=>$nextYear,
            'StudentStatus'=>$StudentStatus,
        ];


        $stu_id =  $studentresult->stu_id;
        $StudentGroup = student::where('StudentID', $stu_id)->first();
        $StudentGroup->update($promoteData);



     }
return redirect()->back();
    }


    public function ResultPublish(Request $request)
    {

        $filter = [
            'school_id' => $request->school_id,
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $request->class_group,
        ];

        $results = StudentResult::where($filter)->orderBy('failed','asc')->orderBy('total','desc')->get();



     $statuses = $request->status;
    //  print_r(array_keys((array)$status).'<br/>');

     $res = [];

     foreach ($results as  $key=>$value) {

        $studentresult = StudentResult::find($value->id);
        $stu_id =  $studentresult->stu_id;
        $StudentGroup = student::where('StudentID', $stu_id)->first()->StudentGroup;
        $studentresult->update(['class_group' => $StudentGroup]);
        if(isset($statuses[$value->id])){
            $status = 'Published';
            $FinalResultStutus = '';
        }else{
            $status = 'Published';
            $FinalResultStutus = 'inhaled';

        }
        // $status = $request->status;
        $subjects =  allList('subjects', $studentresult->class, $studentresult->class_group);

        $totalmark = [];
        $totalfailed = [];
        $i = 0;
        foreach ($subjects as $subject) {
            // print_r(subjectCol($subject));
            // if="changesubName(subject)=='Religion' && student.StudentReligion=='Islam'">{{ student['ReligionIslam'] }}</span>
            // <span v-else-if="changesubName(subject)=='Religion' &&  student.StudentReligion=='Hindu'">{{ student['ReligionHindu'] }}</span>
            // <span v-else>{{ student[changesubName(subject)] }}</span>
            $colname = '';
            if (subjectCol($subject) == 'Religion' && $studentresult->StudentReligion == 'Islam') {
                $colname = 'ReligionIslam';
            } elseif (subjectCol($subject) == 'Religion' && $studentresult->StudentReligion == 'Hindu') {
                $colname = 'ReligionHindu';
            } else {
                $colname = subjectCol($subject);
            }
            // print_r($colname.' ::: ');
            $totalmark[$studentresult->roll][$colname] = $studentresult[$colname];
            $totalfailed[$studentresult->roll][$colname] = $studentresult[$colname];

        }
        $total =  $this->sumNumber($totalmark[$studentresult->roll]);


        $failed = StudentFailedCount($value, 'failed');

        $data = [
            'total' => $total,
            'status' => $status,
            'failed' => $failed,
            'FinalResultStutus' => $FinalResultStutus,
            'nextroll' => $key+1,
        ];
        $result =  $studentresult->update($data);











            $i++;
     }
return redirect()->back();


    }


    public function publishResult(Request $request)
    {
        $filter = [
            'school_id' => $request->school_id,
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $request->class_group,
        ];
        $result = StudentResult::where($filter)->get();
        $totalmark = [];
        $totalfailed = [];
        $i = 0;
        foreach ($result as $value) {
            $studentresult = StudentResult::find($value->id);
            $stu_id =  $studentresult->stu_id;
            $StudentGroup = student::where('StudentID', $stu_id)->first()->StudentGroup;
            $studentresult->update(['class_group' => $StudentGroup]);
            $status = $request->status;
            $subjects =  allList('subjects', $studentresult->class, $studentresult->class_group);

            foreach ($subjects as $subject) {
                // print_r(subjectCol($subject));
                // if="changesubName(subject)=='Religion' && student.StudentReligion=='Islam'">{{ student['ReligionIslam'] }}</span>
                // <span v-else-if="changesubName(subject)=='Religion' &&  student.StudentReligion=='Hindu'">{{ student['ReligionHindu'] }}</span>
                // <span v-else>{{ student[changesubName(subject)] }}</span>
                $colname = '';
                if (subjectCol($subject) == 'Religion' && $studentresult->StudentReligion == 'Islam') {
                    $colname = 'ReligionIslam';
                } elseif (subjectCol($subject) == 'Religion' && $studentresult->StudentReligion == 'Hindu') {
                    $colname = 'ReligionHindu';
                } else {
                    $colname = subjectCol($subject);
                }
                // print_r($colname.' ::: ');
                $totalmark[$studentresult->roll][$colname] = $studentresult[$colname];
                $totalfailed[$studentresult->roll][$colname] = $studentresult[$colname];

            }
            $total =  $this->sumNumber($totalmark[$studentresult->roll]);
            $failed = StudentFailedCount($value, 'failed');
             $Gparesult = StudentFailedCount($value, 'result');

              $greedRes = gpaToGreed($Gparesult);



            $data = [
                'total' => $total,
                'status' => $status,
                'failed' => $failed,
                'greed' => $greedRes,
                'GPA' => $Gparesult,
            ];
            $result =  $studentresult->update($data);
            $i++;
        }
        // die();
        // return $result;
    }
    public function sumNumber($arrObj)
    {
        $sum = 0;
        foreach ($arrObj as $key => $value) {
            if (isset($value))
                $sum += $value;
        }
        return $sum;
    }
    public function failedNumber($value, $colname)
    {
        $sum = 0;
        // foreach($arrObj as $key=>$value){
        // return $value;
        $sum += $this->subjectFails($value, $colname);
        return $sum;
        // }
    }
    public function subjectFails($mark, $subjectname)
    {
        $fail = 1;
        if ($subjectname == 'ICT') {
            if ($mark > 17) {
                $fail = 0;
            }
        } else {
            if ($mark > 33) {
                $fail = 0;
            }
        }
        return $fail;
    }
    public function resultViewpdf(Request $r, $school_id, $group, $student_class, $exam, $date)
    {
        $data['class'] = $student_class;
        $data['exam_name'] = $exam;
        $data['group'] = $group;
        $resultW = [
            'school_id' => $school_id,
            'year' => date("Y", strtotime($date)),
            'class' => $student_class,
            'exam_name' => $exam,
        ];
        $data['rows'] = StudentResult::where($resultW)->orderBy('roll', 'ASC')->get();
        $data['sign'] = base64(sitedetails()->PRINCIPALS_Signature);

        $pdfFileName = $student_class.'-'.$group.'-'.$exam.'.pdf';
        return PdfMaker('Legal-L',$school_id,$this->fullResultPdf($school_id, $student_class, date("Y", strtotime($date)), $exam, $group),$pdfFileName);

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function result_sheet()
    {
        $data['class'] = '';
        $data['ExamType'] = '';
        $data['Subject'] = '';
        $data['group'] = 'none';
        $data['date'] = date('Y-m-d');
        $data['resultCount'] = 0;
        return view('dashboard/result.result_sheet', $data);
    }
    public function result_sheet_search(Request $r)
    {
        // echo '<pre>';
        // print_r($r->all());
        $sutdent_class = $r->student_class;
        $ExamType = $r->ExamType;
        $Subject = $r->Subject;
        $date = $r->date;
        $group = $r->group;
        return redirect("school/result_sheet/$group/$sutdent_class/$ExamType/$Subject/$date");
    }
    public function result_sheet_result(Request $r, $group, $student_class, $exam, $subject, $date)
    {
        $school_id = sitedetails()[0]->school_id;
        $data['class'] = $student_class;
        $data['ExamType'] = $exam;
        $data['Subject'] = $subject;
        $data['date'] = $date;
        if ($data['ExamType'] == 'Weakly Examination') {
            $resultW = [
                'school_id' => $school_id,
                'date' => $date,
                'year' => date("Y", strtotime($date)),
                'sctudent_class' => $student_class,
                'exam_name' => $exam,
                'subject' => $subject,
            ];
            $data['resultCount'] = DB::table('results_single')->where($resultW)->count();
        } else if ($data['ExamType'] == 'First Terminals Examination' || $data['ExamType'] == 'Second Terminals Examination' || $data['ExamType'] == 'Test Examination' || $data['ExamType'] == 'Annual Examination') {
            $resultW = [
                'school_id' => $school_id,
                'year' => date("Y", strtotime($date)),
                'class' => $student_class,
                'exam_name' => $exam,
            ];
            $resultCount = DB::table('student_result')->where($resultW)->count();
            if ($resultCount > 0) {
                $info = DB::table('student_result')->where($resultW)->orderBy('roll', 'ASC')->get();
                //  id	stu_id	name	roll	year	exam_name	class	Bangla_1st	Bangla_2nd	English_1st	English_2nd	Math	Chemistry	physics	Biology	Science	B_and_B	ReligionIslam	ReligionHindu	Agriculture	ICT	total	status	FinalResultStutus	date
                if ($subject == 'বাংলা') {
                    if ($info[0]->Bangla_1st == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'বাংলা ১ম') {
                    if ($info[0]->Bangla_1st == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'বাংলা ২য়') {
                    if ($info[0]->Bangla_2nd == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ইংলিশ') {
                    if ($info[0]->English_1st == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ইংলিশ ১ম') {
                    if ($info[0]->English_1st == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ইংলিশ ২য়') {
                    if ($info[0]->English_2nd == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'গনিত') {
                    if ($info[0]->Math == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'বিজ্ঞান') {
                    if ($info[0]->Science == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'রসায়ন') {
                    if ($info[0]->Chemistry == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'পদার্থ') {
                    if ($info[0]->physics == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'জীব-বিজ্ঞান') {
                    if ($info[0]->Biology == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ভূগোল') {
                    if ($info[0]->vugol == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'অর্থনীতি') {
                    if ($info[0]->orthoniti == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ইতিহাস') {
                    if ($info[0]->itihas == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                }
                // ভূগোল
                // অর্থনীতি
                // বিজ্ঞান
                // ইতিহাস
                else if ($subject == 'বাংলাদেশ ও বিশ্ব পরিচয়') {
                    if ($info[0]->B_and_B == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'ইসলাম-ধর্ম') {
                    if ($info[0]->ReligionIslam == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'হিন্দু-ধর্ম') {
                    if ($info[0]->ReligionHindu == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'কৃষি') {
                    if ($info[0]->Agriculture == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                } else if ($subject == 'তথ্য ও যোগাযোগ প্রযোক্তি') {
                    if ($info[0]->ICT == '') {
                        $data['resultCount'] = 0;
                    } else {
                        $data['resultCount'] = 1;
                    }
                }
                // echo  $data['resultCount'];
            } else {
                $data['resultCount'] = 0;
            }
            // echo $data['resultCount'];
            //       die();
        } else {
            $data['resultCount'] = 0;
        }
        if ($data['resultCount'] > 0) {
            $data['group']  = $group;
            if ($data['ExamType'] == 'First Terminals Examination' || $data['ExamType'] == 'Second Terminals Examination' || $data['ExamType'] == 'Test Examination' || $data['ExamType'] == 'Annual Examination') {
                $data['rows'] = DB::table('student_result')->where($resultW)->orderBy('roll', 'ASC')->get();
            } else {
                $data['rows'] = DB::table('results_single')->where($resultW)->get();
            }
        } else {
            $sw = [
                'StudentClass' => $student_class,
                'Year' => date("Y", strtotime($date)),
                'StudentStatus' => 'Active',
            ];
            $data['searchSubject']  = $subject;
            $data['group']  = $group;
            $data['rows'] = DB::table('students')->where($sw)->orderBy('StudentRoll', 'ASC')->get();
        }
        return view('dashboard/result.result_sheet', $data);
    }
    public function result_sheet_submit(Request $r)
    {
        $school_id = sitedetails()[0]->school_id;
        //         echo '<pre>';
        // print_r($r->all());
        // die();
        if ($r->exam_name == 'Weakly Examination') {
            $resultW = [
                'school_id' => $school_id,
                'year' => $r->year,
                'class' => $r->sctudent_class,
                'exam_name' => $r->exam_name,
            ];
            $resultCount = DB::table('student_result')->where($resultW)->count();
            $resultW = [
                'school_id' => $school_id,
                'date' => $r->date,
                'year' => date("Y", strtotime($r->date)),
                'sctudent_class' => $r->sctudent_class,
                'exam_name' => $r->exam_name,
                'subject' => $r->subject,
            ];
            // print_r($resultW);
            echo    $resultCount = DB::table('results_single')->where($resultW)->count();
            if ($resultCount > 0) {
                $count = count($r->StudentRoll);
                for ($i = 0; $i < $count; $i++) {
                    $result[$i] = [
                        'class_group' => $r->StudentGroup[$i],
                        'id' => $r->id[$i],
                        'Subject' => $r->Subject[$i],
                        'StudentRoll' => $r->StudentRoll[$i],
                        'StudentName' => $r->StudentName[$i],
                        'StudentID' => $r->StudentID[$i],
                        'AdmissionID' => $r->AdmissionID[$i],
                        'StudentFatherName' => $r->StudentFatherName[$i],
                        'StudentMotherName' => $r->StudentMotherName[$i],
                        'StudentGender' => $r->StudentGender[$i],
                        'StudentReligion' => $r->StudentReligion[$i],
                        'StudentPhoneNumber' => $r->StudentPhoneNumber[$i],
                        'StudentEmail' => $r->StudentEmail[$i],
                        'StudentGroup' => $r->StudentGroup[$i],
                        'total_mark_s' => $r->total_mark_s[$i],
                        'mark' => $r->mark[$i],
                        'status' => 'pending',
                    ];
                }
                $results = json_encode($result);
                $data = [
                    'date' => $r->date,
                    'month' => $r->month,
                    'year' => $r->year,
                    'sctudent_class' => $r->sctudent_class,
                    'subject' => $r->subject,
                    'exam_name' => $r->exam_name,
                    'total_mark' => $r->total_mark,
                    'result' => $results,
                    'status' => $r->status
                ];
                DB::table('results_single')->where($resultW)->update($data);
            } else {
                $count = count($r->StudentRoll);
                for ($i = 0; $i < $count; $i++) {
                    $result[$i] = [
                        'id' => $r->id[$i],
                        'class_group' => $r->class_group[$i],
                        'Subject' => $r->Subject[$i],
                        'StudentRoll' => $r->StudentRoll[$i],
                        'StudentName' => $r->StudentName[$i],
                        'StudentID' => $r->StudentID[$i],
                        'AdmissionID' => $r->AdmissionID[$i],
                        'StudentFatherName' => $r->StudentFatherName[$i],
                        'StudentMotherName' => $r->StudentMotherName[$i],
                        'StudentGender' => $r->StudentGender[$i],
                        'StudentReligion' => $r->StudentReligion[$i],
                        'StudentPhoneNumber' => $r->StudentPhoneNumber[$i],
                        'StudentEmail' => $r->StudentEmail[$i],
                        'StudentGroup' => $r->StudentGroup[$i],
                        'total_mark_s' => $r->total_mark_s[$i],
                        'mark' => $r->mark[$i],
                        'status' => 'pending',
                    ];
                }
                $results = json_encode($result);
                $data = [
                    'school_id' => $school_id,
                    'date' => $r->date,
                    'month' => $r->month,
                    'year' => $r->year,
                    'sctudent_class' => $r->sctudent_class,
                    'subject' => $r->subject,
                    'exam_name' => $r->exam_name,
                    'total_mark' => $r->total_mark,
                    'result' => $results,
                    'status' => $r->status
                ];
                DB::table('results_single')->insert($data);
            }
            // die();
        } else {
            $resultW = [
                'school_id' => $school_id,
                'year' => $r->year,
                'class' => $r->sctudent_class,
                'exam_name' => $r->exam_name,
            ];
            $resultCount = DB::table('student_result')->where($resultW)->count();
            if ($resultCount > 0) {
                //  id	stu_id	name	roll	year	exam_name	class	Bangla_1st	Bangla_2nd	English_1st	English_2nd	Math	Chemistry	physics	Biology	Science	B_and_B	ReligionIslam	ReligionHindu	Agriculture	ICT	total	status	FinalResultStutus	date
                $count = count($r->StudentRoll);
                for ($i = 0; $i < $count; $i++) {
                    $data = [
                        'roll' => $r->StudentRoll[$i],
                        'name' => $r->StudentName[$i],
                        'stu_id' => $r->StudentID[$i],
                        'year' => $r->year,
                        'exam_name' => $r->exam_name,
                        'class' => $r->sctudent_class,
                        'status' => 'pending',
                    ];
                    $data['class_group'] = $r->class_group[$i];
                    $data['StudentReligion'] = $r->StudentReligion[$i];
                    $totalobject = [
                        'CQ' => $r->CQ[$i],
                        'MCQ' => $r->MCQ[$i],
                        'EXTRA' => $r->EXTRA[$i],
                    ];
                    $totalobject = json_encode($totalobject);
                    //  বাংলা  বাংলা ১ম   বাংলা ২য়   ইংলিশ    ইংলিশ ১ম   ইংলিশ ২য়  গনিত   বিজ্ঞান   রসায়ন   পদার্থ  জীব-বিজ্ঞান   বাংলাদেশ ও বিশ্ব পরিচয়   ইসলাম-ধর্ম   হিন্দু-ধর্ম   কৃষি   তথ্য ও যোগাযোগ প্রযোক্তি
                    if ($r->Subject[0] == 'বাংলা') {
                        $data['Bangla_1st'] = $r->mark[$i];
                        $data['Bangla_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলা ১ম') {
                        $data['Bangla_1st'] = $r->mark[$i];
                        $data['Bangla_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলা ২য়') {
                        $data['Bangla_2nd'] = $r->mark[$i];
                        $data['Bangla_2nd_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ') {
                        $data['English_1st'] = $r->mark[$i];
                        $data['English_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ ১ম') {
                        $data['English_1st'] = $r->mark[$i];
                        $data['English_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ ২য়') {
                        $data['English_2nd'] = $r->mark[$i];
                        $data['English_2nd_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'গনিত') {
                        $data['Math'] = $r->mark[$i];
                        $data['Math_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বিজ্ঞান') {
                        $data['Science'] = $r->mark[$i];
                        $data['Science_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'রসায়ন') {
                        $data['Chemistry'] = $r->mark[$i];
                        $data['Chemistry_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'পদার্থ') {
                        $data['physics'] = $r->mark[$i];
                        $data['physics_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'জীব-বিজ্ঞান') {
                        $data['Biology'] = $r->mark[$i];
                        $data['Biology_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ভূগোল') {
                        $data['vugol'] = $r->mark[$i];
                        $data['vugol_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'অর্থনীতি') {
                        $data['orthoniti'] = $r->mark[$i];
                        $data['orthoniti_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইতিহাস') {
                        $data['itihas'] = $r->mark[$i];
                        $data['itihas_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলাদেশ ও বিশ্ব পরিচয়') {
                        $data['B_and_B'] = $r->mark[$i];
                        $data['B_and_B_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইসলাম-ধর্ম') {
                        $data['ReligionIslam'] = $r->mark[$i];
                        $data['ReligionIslam_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'হিন্দু-ধর্ম') {
                        $data['ReligionHindu'] = $r->mark[$i];
                        $data['ReligionHindu_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'কৃষি') {
                        $data['Agriculture'] = $r->mark[$i];
                        $data['Agriculture_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'তথ্য ও যোগাযোগ প্রযোক্তি') {
                        $data['ICT'] = $r->mark[$i];
                        $data['ICT_d'] = $totalobject;
                    }
                    // print_r($data);
                    $ww = [
                        'school_id' => $school_id,
                        'year' => $r->year,
                        'class' => $r->sctudent_class,
                        'exam_name' => $r->exam_name,
                        'stu_id' => $r->StudentID[$i],
                    ];
                    DB::table('student_result')->where($ww)->update($data);
                }
            } else {
                //  id	stu_id	name	roll	year	exam_name	class	Bangla_1st	Bangla_2nd	English_1st	English_2nd	Math	Chemistry	physics	Biology	Science	B_and_B	ReligionIslam	ReligionHindu	Agriculture	ICT	total	status	FinalResultStutus	date
                // if ($r->Subject[0] == 'ইসলাম-ধর্ম') {
                //     $sw = [
                //         'StudentClass' => $r->sctudent_class,
                //         'Year' => date('Y'),
                //         'StudentStatus' => 'Active',
                //     ];
                //     $count = DB::table('students')->where($sw)->count();
                // } else if ($r->Subject[0] == 'হিন্দু-ধর্ম') {
                //     $sw = [
                //         'StudentClass' => $r->sctudent_class,
                //         'Year' => date('Y'),
                //         'StudentStatus' => 'Active',
                //     ];
                //     $count = DB::table('students')->where($sw)->count();
                // }else{
                //     $count = count($r->StudentRoll);
                // }
                // echo $count;
                // die();
                $count = count($r->StudentRoll);
                // for ($i = 0; $i < $count; $i++) {
                //     $totalobject[$i] = [
                //         'CQ' => $r->CQ[$i],
                //         'MCQ' => $r->MCQ[$i],
                //         'EXTRA' => $r->EXTRA[$i],
                //     ];
                // }
                for ($i = 0; $i < $count; $i++) {
                    $data = [
                        'school_id' => $school_id,
                        'roll' => $r->StudentRoll[$i],
                        'name' => $r->StudentName[$i],
                        'stu_id' => $r->StudentID[$i],
                        'year' => $r->year,
                        'exam_name' => $r->exam_name,
                        'class' => $r->sctudent_class,
                        'class_group' => $r->class_group[$i],
                        'StudentReligion' => $r->StudentReligion[$i],
                        'status' => 'pending',
                    ];
                    $totalobject = [
                        'CQ' => $r->CQ[$i],
                        'MCQ' => $r->MCQ[$i],
                        'EXTRA' => $r->EXTRA[$i],
                    ];
                    $totalobject = json_encode($totalobject);
                    //  বাংলা  বাংলা ১ম   বাংলা ২য়   ইংলিশ    ইংলিশ ১ম   ইংলিশ ২য়  গনিত   বিজ্ঞান   রসায়ন   পদার্থ  জীব-বিজ্ঞান   বাংলাদেশ ও বিশ্ব পরিচয়   ইসলাম-ধর্ম   হিন্দু-ধর্ম   কৃষি   তথ্য ও যোগাযোগ প্রযোক্তি
                    if ($r->Subject[0] == 'বাংলা') {
                        $data['Bangla_1st'] = $r->mark[$i];
                        $data['Bangla_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলা ১ম') {
                        $data['Bangla_1st'] = $r->mark[$i];
                        $data['Bangla_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলা ২য়') {
                        $data['Bangla_2nd'] = $r->mark[$i];
                        $data['Bangla_2nd_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ') {
                        $data['English_1st'] = $r->mark[$i];
                        $data['English_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ ১ম') {
                        $data['English_1st'] = $r->mark[$i];
                        $data['English_1st_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইংলিশ ২য়') {
                        $data['English_2nd'] = $r->mark[$i];
                        $data['English_2nd_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'গনিত') {
                        $data['Math'] = $r->mark[$i];
                        $data['Math_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বিজ্ঞান') {
                        $data['Science'] = $r->mark[$i];
                        $data['Science_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'রসায়ন') {
                        $data['Chemistry'] = $r->mark[$i];
                        $data['Chemistry_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'পদার্থ') {
                        $data['physics'] = $r->mark[$i];
                        $data['physics_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'জীব-বিজ্ঞান') {
                        $data['Biology'] = $r->mark[$i];
                        $data['Biology_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ভূগোল') {
                        $data['vugol'] = $r->mark[$i];
                        $data['vugol_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'অর্থনীতি') {
                        $data['orthoniti'] = $r->mark[$i];
                        $data['orthoniti_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইতিহাস') {
                        $data['itihas'] = $r->mark[$i];
                        $data['itihas_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'বাংলাদেশ ও বিশ্ব পরিচয়') {
                        $data['B_and_B'] = $r->mark[$i];
                        $data['B_and_B_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'ইসলাম-ধর্ম') {
                        $data['ReligionIslam'] = $r->mark[$i];
                        $data['ReligionIslam_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'হিন্দু-ধর্ম') {
                        $data['ReligionHindu'] = $r->mark[$i];
                        $data['ReligionHindu_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'কৃষি') {
                        $data['Agriculture'] = $r->mark[$i];
                        $data['Agriculture_d'] = $totalobject;
                    } else if ($r->Subject[0] == 'তথ্য ও যোগাযোগ প্রযোক্তি') {
                        $data['ICT'] = $r->mark[$i];
                        $data['ICT_d'] = $totalobject;
                    }
                    DB::table('student_result')->insert($data);
                }
            }
        }
        return redirect()->back()->with('msg', '');
    }
    public function result_sheet_edit(Request $r, $id)
    {
        $data['attId'] = $r->id;
        $data['attInfo'] = DB::table('results')->where('id', $id)->get();
        return view('dashboard/result.att_edit', $data);
    }
    public function result_sheet_edit_submit(Request $r)
    {
        $attId = $r->attId;
        // echo $r->id[0];
        $oldData = DB::table('results')->where('id', $attId)->get();
        $attData = json_decode($oldData[0]->attendance);
        $j = 0;
        foreach ($attData as $list) {
            if ($list->id == $r->id[0]) {
            } else {
                $attendance[$j] = [
                    'id' => $list->id,
                    'stu_roll' => $list->stu_roll,
                    'fatherName' => $list->fatherName,
                    'motherName' => $list->motherName,
                    'stu_id' => $list->stu_id,
                    'AdmisionId' => $list->AdmisionId,
                    'stu_name' => $list->stu_name,
                    'phone' => $list->phone,
                    'result' => $list->result,
                    'status' => 'pending',
                ];
            }
            $j++;
        }
        // echo '<pre>';
        // print_r($attendance);
        //  die();
        $attendance[$j] = [
            'id' => $r->id[0],
            'stu_roll' => $r->stu_roll[0],
            'fatherName' => $r->fatherName[0],
            'motherName' => $r->motherName[0],
            'stu_id' => $r->stu_id[0],
            'AdmisionId' => $r->AdmisionId[0],
            'stu_name' => $r->stu_name[0],
            'phone' => $r->phone[0],
            'result' => $r->result[0],
            'status' => 'pending',
        ];
        // echo  '<pre>';
        // print_r($attendance);
        // die();
        $results = json_encode($attendance);
        $data = [
            'attendance' => $results
        ];
        DB::table('results')->where('id', $attId)->update($data);
        return redirect()->back()->with('msg', '');
    }
    public function resultView(Request $r, $group, $student_class, $exam, $date)
    {
        $school_id = sitedetails()[0]->school_id;
        $data['class'] = $student_class;
        $data['exam_name'] = $exam;
        $data['group'] = $group;
        $data['date'] = $date;
        $gg = 'none';
        if ($group == 'Humanities') {
            $gg = $group;
        } elseif ($group == 'Science') {
            $gg = $group;
        }
        $resultW = [
            'school_id' => $school_id,
            'year' => date("Y", strtotime($date)),
            'class' => $student_class,
            'exam_name' => $exam,
            'class_group' => $gg,
        ];
        $data['rows'] = DB::table('student_result')->where($resultW)->orderBy('roll', 'ASC')->get();
        return view('dashboard/result.resultView', $data);
    }
    public function result_publish(Request $r)
    {
        // echo '<pre>';
        // print_r($r->all());
        // die();
        $count = count($r->id);
        for ($i = 0; $i < $count; $i++) {
            $data = [
                'failed' => $r->failed[$i],
                'total' => $r->total[$i],
                'status' => $r->status,
            ];
            $ww = [
                'id' => $r->id[$i],
            ];
            DB::table('student_result')->where($ww)->update($data);
        }
        // return view('dashboard/result.resultView',$data);
        return redirect()->back()->with('msg', '');
    }
    public function result_sms(Request $r, $group, $student_class, $exam, $subject, $date)
    {
        $school_id = sitedetails()[0]->school_id;
        $data['class'] = $student_class;
        $data['ExamType'] = $exam;
        $data['Subject'] = $subject;
        $data['date'] = $date;
        if ($data['ExamType'] == 'Weakly Examination') {
            $resultW = [
                'school_id' => $school_id,
                'date' => $date,
                'year' => date("Y", strtotime($date)),
                'sctudent_class' => $student_class,
                'exam_name' => $exam,
                'subject' => $subject,
            ];
            $resultCount = DB::table('results_single')->where($resultW)->count();
            if ($resultCount > 0) {
                $row = DB::table('results_single')->where($resultW)->get();
                $studentdata = $row[0]->result;
                $studentdata = json_decode($studentdata);
                // echo '<pre>';
                //             print_r($studentdata);
                $counter = 1;
                foreach ($studentdata as $row) {
                    $name = $row->StudentName;
                    $sub = $row->Subject;
                    $total = $row->total_mark_s;
                    $mark = $row->mark;
                    $phone = '88' . int_bn_to_en($row->StudentPhoneNumber) . ",";
                    $to = "$phone";
                    $token = sitedetails('SMS_TOKEN');
                    $message = "$name $sub পরীক্ষায় $total এর মধ্যে $mark নাম্বার পেয়েছে ।";
                    $url = "http://api.greenweb.com.bd/api2.php";
                    $data = array(
                        'to' => "$to",
                        'message' => "$message",
                        'token' => "$token"
                    ); // Add parameters in key value
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);
                    //Result
                    $smsresult;
                    echo '<style>.alert.alert-success.alert-dismissible {
                   background: #009688;
                   margin: 5px;
                   padding: 10px;
                   color: white;
               }</style> <div class="alert alert-success alert-dismissible" role="alert"><strong>' . $counter . ' : ' . $smsresult . '</strong></div>';
                    //Error Display
                    curl_error($ch);
                    $counter++;
                }
                DB::table('results_single')->where($resultW)->update(['message_status' => 'Published']);
                echo '
           <a href="'
                    . back() . '
           " > Back</a>
           ';
            }
        }
    }
    public function GetSubject($class = '', $group = '')
    {
        $class = strtolower($class);
        $group = strtolower($group);
        $data = [];
        if ($class == 'nursery') {
            $data = ["বাংলা", "ইংরেজি", "গণিত"];
        } elseif ($class == 'play' || $class == 'one' || $class == 'two') {
            $data = ["বাংলা", "ইংরেজি", "গণিত"];
        } elseif ($class == 'three' || $class == 'four' || $class == 'five') {
            $data = ["বাংলা", "ইংরেজি", "গণিত", "বাংলাদেশ ও বিশ্ব পরিচয়", "বিজ্ঞান", "ধর্ম"];
        } elseif ($class == 'six' || $class == 'seven' || $class == 'eight') {
            $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "শারীরিক শিক্ষা ও স্বাস্থ্য", "চারু ও কারুকলা", "কর্ম ও জীবনমুখী শিক্ষা"];
        } elseif ($class == 'nine' || $class == 'ten') {
            if ($group == 'science') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "পদার্থবিজ্ঞান", "রসায়ন", "জীব বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "উচ্চতর গণিত", "তথ্য ও যোগাযোগ প্রযুক্তি", "শারীরিক শিক্ষা ও স্বাস্থ্য", "চারু ও কারুকলা", "ক্যারিয়ার শিক্ষা"];
            } elseif ($group == 'humanities') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "ভূগোল ও পরিবেশ", "অর্থনীতি", "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "শারীরিক শিক্ষা ও স্বাস্থ্য", "চারু ও কারুকলা", "ক্যারিয়ার শিক্ষা"];
            } elseif ($group == 'commerce') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            } else {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            }
        }
        return $data;
    }
    public function fullResult(Request $request)
    {
        $publishids = [];
        $filter = [
            'school_id' => $request->school_id,
            'class' => $request->class,
            'year' => $request->year,
            'exam_name' => $request->exam_name,
            'class_group' => $request->group,
        ];
        // $subjects = $this->GetSubject($request->class);
        $subjects =  allList('subjects', $request->class, $request->group);
        $resultlast = StudentResult::where($filter)->latest('id')->first();
        $status = $resultlast->status;
        $result = StudentResult::where($filter)->get();

        $gpa5Count  = StudentResult::where($filter)->where('greed','A+')->count();
        $gpa4Count  = StudentResult::where($filter)->where('greed','A')->count();
        $gpa35Count  = StudentResult::where($filter)->where('greed','A-')->count();
        $gpa3Count = StudentResult::where($filter)->where('greed','B')->count();
        $gpa2Count  = StudentResult::where($filter)->where('greed','C')->count();
        $gpa1Count  = StudentResult::where($filter)->where('greed','D')->count();
        $gpa0Count = StudentResult::where($filter)->where('greed','F')->count();

        $resultCount = [
            'gpa5Count'=>$gpa5Count,
            'gpa4Count'=>$gpa4Count,
            'gpa35Count'=>$gpa35Count,
            'gpa3Count'=>$gpa3Count,
            'gpa2Count'=>$gpa2Count,
            'gpa1Count'=>$gpa1Count,
            'gpa0Count'=>$gpa0Count,
        ];


        $html = "
        <style>
        table, th, td {
            font-size:13px;
          }
          td{
            border: 1px solid black;
            padding: 2px 3px;
            font-size: 12px;
        }    th{
            border: 1px solid black;
            padding:4px 10px;
            font-size: 12px;
        }
        </style>
        <table width='100%' cellspacing='0' cellpadding='0' style='border:none;' >";
        $html .= "
        <tr>
            <td rowspan='2'>রোল.</td>
            <td  rowspan='2'>নাম</td>
        ";
        foreach ($subjects as $value) {
            $html .= "
            <td colspan='4' style='text-align:center'>$value</td>
        ";
        }
        $html .= "
            <td  rowspan='2'>ব্যর্থ হয়েছে</td>
            <td  rowspan='2'>GPA</td>
            <td  rowspan='2'>মোট</td>
        </tr>
        ";
        $html .= "
        <tr>
        ";
        foreach ($subjects as $value) {
            $html .= "
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>THEORY</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>MCQ</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>PRAC/CA</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>TOTAL</p></td>
        ";
        }
        $html .= "
        </tr>
        ";
        foreach ($result as $resValue) {
            array_push($publishids, $resValue->id);
            $html .= "
            <tr>
                <td>$resValue->roll</td>
                <td>$resValue->name</td>
            ";
            // $subjectsGroup = $this->GetSubject($request->class, $resValue->class_group);
            $subjectsGroup =  allList('subjects', $request->class, $resValue->class_group);
            $failed = StudentFailedCount($resValue, 'failed');
            $Gpa = StudentFailedCount($resValue, 'result');
            $total = 0;
            foreach ($subjects as $value) {
                // print_r($value);
                // return subjectCol($value);
                if ($value == 'ধর্ম ও নৈতিক শিক্ষা') {
                    if ($resValue->StudentReligion == 'Islam') {
                        $total += $resValue['ReligionIslam'];
                        $subMark = json_decode($resValue["ReligionIslam_d"]);
                        if ($subMark) {
                            $html .= "
                        <td>$subMark->CQ</td>
                        <td>$subMark->MCQ</td>
                        <td>$subMark->EXTRA</td>
                        <td>" . $resValue['ReligionIslam'] . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    } else if ($resValue->StudentReligion == 'Hindu') {
                        $total += $resValue['ReligionHindu'];
                        $subMark = json_decode($resValue["ReligionHindu_d"]);
                        if ($subMark) {
                            $html .= "
                        <td>$subMark->CQ</td>
                        <td>$subMark->MCQ</td>
                        <td>$subMark->EXTRA</td>
                        <td>" . $resValue['ReligionHindu'] . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    } else {
                        $total += $resValue['ReligionIslam'];
                        $total += $resValue[subjectCol($value)];
                        $subMark = json_decode($resValue[subjectCol($value) . "_d"]);
                        if ($subMark) {
                            $html .= "
                        <td>$subMark->CQ</td>
                        <td>$subMark->MCQ</td>
                        <td>$subMark->EXTRA</td>
                        <td>" . $resValue[subjectCol($value)] . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    }
                } else {





                    $total += $resValue[subjectCol($value)];
                    $subMark = json_decode($resValue[subjectCol($value) . "_d"]);
                    if ($subMark) {
                        $html .= "
                            <td>$subMark->CQ</td>
                            <td>$subMark->MCQ</td>
                            <td>$subMark->EXTRA</td>
                            <td>" . $resValue[subjectCol($value)] . "</td>";
                    } else {
                        $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                    }
                }
            }
            $html .= "
            <td>$failed</td>
            <td>$Gpa</td>
            <td>$total</td>
        </tr>
        ";
        }
        $html .= "</table>";
        // return '11';
        return ['html' => $html, 'status' => $status, 'publishids' => $publishids, 'resultCount' => $resultCount];
    }
    public function fullResultPdf($school_id, $class, $year, $exam_name, $group)
    {
        $publishids = [];
        $filter = [
            'school_id' => $school_id,
            'class' => $class,
            'year' => $year,
            'exam_name' => $exam_name,
            'class_group' => $group,
        ];
        // $subjects = $this->GetSubject($class);
        $subjects =  allList('subjects', $class, $group);
        $resultlast = StudentResult::where($filter)->latest('id')->first();
        $status = $resultlast->status;
        $result = StudentResult::where($filter)->get();
        $html = "
        <style>
          td{
            border: 1px solid black;
            padding: 2px 3px;
            font-size: 16px;
        }    th{
            border: 1px solid black;
            padding:4px 10px;
            font-size: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%
        }
        </style>
        ".SchoolPad($school_id)."

     <span> তারিখ :  " . date('d-m-y') . "</span> <br>
     <span> পরিক্ষার নাম:  " . $exam_name . "</span> <br>
     <span> শ্রেণী :  " . $class . "</span>
        <table width='100%' cellspacing='0' cellpadding='0' style='border:none;' >";
        $html .= "
        <thead>
        <tr>
            <td rowspan='2'>রোল.</td>
            <td  rowspan='2'>নাম</td>
        ";
        foreach ($subjects as $value) {
            $html .= "
            <td colspan='4' style='text-align:center'>$value</td>
        ";
        }
        $html .= "
            <td  rowspan='2'>ব্যর্থ হয়েছে</td>
            <td  rowspan='2'>GPA</td>
            <td  rowspan='2'>মোট</td>
        </tr>
        ";
        $html .= "
        <tr>
        ";
        foreach ($subjects as $value) {

            $html .= "
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>CQ</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>MCQ</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>EX</p></td>
            <td style='    height: 58px;    font-size: 10px;'><p  style='transform: rotate(-50deg);border: 0;padding: 0;'>TOTAL</p></td>
        ";
        }
        $html .= "
        </tr>
        </thead>
        <tbody>
        ";
        foreach ($result as $resValue) {

            $html .= "
            <tr>
                <td>".int_en_to_bn($resValue->roll)."</td>
                <td>$resValue->name</td>
            ";
            $subjectsGroup = $this->GetSubject($class, $resValue->class_group);
            $failed = StudentFailedCount($resValue, 'failed');
            $Gpa = StudentFailedCount($resValue, 'result');
            $total = 0;
            foreach ($subjects as $value) {



                if ($value == 'ধর্ম ও নৈতিক শিক্ষা') {
                    if ($resValue->StudentReligion == 'Islam') {
                        $total += $resValue['ReligionIslam'];
                        $subMark = json_decode($resValue["ReligionIslam_d"]);
                        if ($subMark) {
                            $html .= "
                            <td>".int_en_to_bn($subMark->CQ)."</td>
                            <td>".int_en_to_bn($subMark->MCQ)."</td>
                            <td>".int_en_to_bn($subMark->EXTRA)."</td>
                        <td>" . int_en_to_bn($resValue['ReligionIslam']) . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    } else if ($resValue->StudentReligion == 'Hindu') {
                        $total += $resValue['ReligionHindu'];
                        $subMark = json_decode($resValue["ReligionHindu_d"]);
                        if ($subMark) {
                            $html .= "
                            <td>".int_en_to_bn($subMark->CQ)."</td>
                            <td>".int_en_to_bn($subMark->MCQ)."</td>
                            <td>".int_en_to_bn($subMark->EXTRA)."</td>
                        <td>" . int_en_to_bn($resValue['ReligionHindu']) . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    } else {
                        $total += $resValue['ReligionIslam'];
                        $total += $resValue[subjectCol($value)];
                        $subMark = json_decode($resValue[subjectCol($value) . "_d"]);
                        if ($subMark) {
                            $html .= "
                            <td>".int_en_to_bn($subMark->CQ)."</td>
                            <td>".int_en_to_bn($subMark->MCQ)."</td>
                            <td>".int_en_to_bn($subMark->EXTRA)."</td>
                            <td>" . int_en_to_bn($resValue[subjectCol($value)]) . "</td>";
                        } else {
                            $html .= "
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    ";
                        }
                    }
                } else {


                    $total += $resValue[subjectCol($value)];
                    $subMark = json_decode($resValue[subjectCol($value) . "_d"]);
                    if ($subMark) {
                        $html .= "
                    <td>".int_en_to_bn($subMark->CQ)."</td>
                    <td>".int_en_to_bn($subMark->MCQ)."</td>
                    <td>".int_en_to_bn($subMark->EXTRA)."</td>
                    <td>" . int_en_to_bn($resValue[subjectCol($value)]) . "</td>
                ";
                    } else {
                        $html .= "
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                ";
                    }
                }
            }
            $html .= "
            <td>".int_en_to_bn($failed)."</td>
            <td>".int_en_to_bn($Gpa)."</td>

            <td>".int_en_to_bn($total)."</td>
        </tr>
        ";
        }
        $html .= "</tbody></table>";
        return $html;
        // return ['html'=>$html,'status'=>$status,'publishids'=>$publishids];
    }
    public function AllResultList(Request $request)
    {
        return $result = StudentResult::select('year', 'exam_name', 'class', 'class_group', 'status')->distinct()->orderBy('created_at', 'desc')->simplePaginate(20, ['year.*']);
        return $request->all();
    }
}

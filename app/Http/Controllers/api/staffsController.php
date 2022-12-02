<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\staff;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\staff_attendance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class staffsController extends Controller
{



    public function list(Request $r)
    {

        $data['class'] = "All";

        $datatype = $r->datatype;

        $datas = QueryBuilder::for(staff::class)

            ->allowedFilters([
                AllowedFilter::exact('school_id'),
                'TeacherName',
                'TeacherGender',
                'TeacherDateOfBirth',
                'TeacherId',
                'TeacherEmail',
                'TeacherPhoneNumber',
                'TeacherPosition',
                'TeacherQualification',
                'TeacherJoiningDate',
                'TeacherLeavingDate',
                'TeacherWorkingHours',
                'TeacherAddress',
                'TeacherSubjectHandling',
                'InchargeClass',
                'ProfilePicture',
                'TeacherStatus',
                AllowedFilter::exact('id')
            ])
            ->allowedSorts([


                'id',
                'school_id',
                'TeacherName',
                'TeacherGender',
                'TeacherDateOfBirth',
                'TeacherId',
                'TeacherEmail',
                'TeacherPhoneNumber',
                'TeacherPosition',
                'TeacherQualification',
                'TeacherJoiningDate',
                'TeacherLeavingDate',
                'TeacherWorkingHours',
                'TeacherAddress',
                'TeacherSubjectHandling',
                'InchargeClass',
                'ProfilePicture',
                'TeacherStatus',


            ]);

            if($datatype=='count'){
                $result= $datas->count();
            }else{
                $result= $datas->orderBy('TeacherJoiningDate','DESC')->paginate(20);
            }



        return response()->json($result);
    }


    public function staff_action(Request $request, $action)
    {

        if ($action == 'Delete') {
            $data = [];
            foreach ($request->all() as  $value) {
                $data[$value] = $value;

                $students = staff::find($value);
                $students->delete();
            }
        } else {
            $data = [];
            foreach ($request->all() as  $value) {
                $data[$value] = $value;

                $students = staff::find($value);
                $students->update(['TeacherStatus' => $action]);
            }
        }
        return response()->json($data);
    }

    public function singlestaff(Request $request)
    {
        $result = QueryBuilder::for(staff::class)

        ->allowedFilters([
            AllowedFilter::exact('school_id'),
            'TeacherName',
            'TeacherGender',
            'TeacherDateOfBirth',
            'TeacherId',
            'TeacherEmail',
            'TeacherPhoneNumber',
            'TeacherPosition',
            'TeacherQualification',
            'TeacherJoiningDate',
            'TeacherLeavingDate',
            'TeacherWorkingHours',
            'TeacherAddress',
            'TeacherSubjectHandling',
            'InchargeClass',
            'ProfilePicture',
            'TeacherStatus',
            AllowedFilter::exact('id')
        ])
        ->allowedSorts([


            'id',
            'school_id',
            'TeacherName',
            'TeacherGender',
            'TeacherDateOfBirth',
            'TeacherId',
            'TeacherEmail',
            'TeacherPhoneNumber',
            'TeacherPosition',
            'TeacherQualification',
            'TeacherJoiningDate',
            'TeacherLeavingDate',
            'TeacherWorkingHours',
            'TeacherAddress',
            'TeacherSubjectHandling',
            'InchargeClass',
            'ProfilePicture',
            'TeacherStatus',


        ])
            ->first();
        return response()->json($result);
    }




    public function imageupload(Request $request)
    {

        $id =  $request->id;
        $staff = staff::find($id);
        if(File::exists($staff->ProfilePicture)){
            unlink($staff->ProfilePicture);
        }
      $ProfilePicture=  fileupload($request->ProfilePicture,'backend/staff/',300,300,$staff->StudentID);

        return $staff->update(['ProfilePicture'=>$ProfilePicture]);





    }

    public function imageget(Request $request)
    {
        $id =  $request->id;
        $student = staff::find($id);

    return   $ProfilePicture=  base64($student->ProfilePicture);




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




    public function staff_submit(Request $r)
    {
        $id = $r->id;
        $status = $r->status;

        $data = $r->except('_token','status','ProfilePicture');

        $imageCount =  count(explode(';', $r->ProfilePicture));
        if ($imageCount > 1) {
            $data['ProfilePicture'] =  fileupload($r->ProfilePicture, 'backend/staffs/',300,300);
        }

        if ($id == '') {
            $result =   staff::create($data);
            $results['result'] = $result;
            $results['status'] = 'Created';


            $this->usercreate($result->school_id,$result->TeacherName,$result->TeacherEmail,$result->teacherPassword,$result->id,null,'teacher');



        } else {
            $staff = staff::find($r->id);
            $result = $staff->update($data);
            $results['result'] = $result;
            $results['status'] = 'Updated';
        }

        return response()->json($results);

    }

public function staff_attendance(Request $request)
{
    $id = $request->id;
    $veiwtype = $request->veiwtype;
    $dateormonth = $request->dateormonth;
    $school_id = $request->school_id;

        if($veiwtype=='Monthly'){
            $where = [
                'school_id' => $school_id,
                'month' => date("F", strtotime($dateormonth)),
                'year' =>  date("Y", strtotime($dateormonth)),
            ];
           $data =  staff_attendance::where($where)->orderBy('date','ASC')->get();
        }elseif($veiwtype=='Daily'){
           $count =  staff_attendance::where(['school_id' => $school_id,'date' => $dateormonth,'year' => date("Y", strtotime($dateormonth))])->count();
            if($count>0){
             $data['data'] = staff_attendance::where(['school_id' => $school_id,'date' => $dateormonth,'year' => date("Y", strtotime($dateormonth))])->get();
             $data['counttype'] = 1;
            }else{
                $data['data'] = staff::where(['school_id'=>$school_id,'TeacherStatus'=>'Active'])->get();
                $data['counttype'] = 0;
            }
        }elseif($veiwtype=='edit'){

            $result = staff_attendance::where(['school_id' => $school_id,'date' => $dateormonth,'year' => date("Y", strtotime($dateormonth))])->get();


             $result = json_decode($result[0]->attendance);

           $data  = array_filter($result, function ($var) use ($id) {
                return $var->id==$id;
            });


        }



        return response()->json($data);
        }

public function staff_attendance_submit(Request $request)
{
    $id = $request->id;
    $school_id = $request->school_id;
    $date = $request->date;
    $data = [];
    $staffs = [];
    foreach ($request->attendence as $key => $value) {
        if($value==null){
        }else{
            $staffs[$key] = staff::find($key);
            $data[$key] = $value;
        }
    }
    $attendance=[];



if($id!=''){

    $attendanceRecord = staff_attendance::where('date',$date)->get();
    foreach ($attendanceRecord as $value) {
$attendancedata = json_decode($value->attendance);

        foreach ($attendancedata as $value2) {

            if($value2->id==$id){
            $attendenceValue = $request->attendence[$value2->id];
            }else{
                $attendenceValue = $value2->attendence;
            }
                $attendances = [
                    'id' => $value2->id,
                    'TeacherId' => $value2->TeacherId,
                    'TeacherName' => $value2->TeacherName,
                    'TeacherPhoneNumber' => $value2->TeacherPhoneNumber,
                    'attendence' => $attendenceValue,
                    'status' => 'pending',
                ];
                array_push($attendance,$attendances);
        }
    }

}else{



    foreach ($staffs as $value) {
    //    print_r($value->TeacherName );

       $attendances = [
        'id' => $value->id,
        'TeacherId' => $value->TeacherId,
        'TeacherName' => $value->TeacherName,
        'TeacherPhoneNumber' => $value->TeacherPhoneNumber,
        'attendence' => $request->attendence[$value->id],
        'status' => 'pending',
    ];
    array_push($attendance,$attendances);
    // $attendance.push($attendances);

    }

}

    $attendances = json_encode($attendance);



     $data = [
        'school_id' => $school_id,
        'date' => $request->date,
        'month' =>  date("F", strtotime($request->date)),
        'year' => date("Y", strtotime($request->date)),
        'attendance' => $attendances,
        'message_status' => 'Pending',
    ];




            if($id==''){

             $results  =    staff_attendance::create($data);
             $results['status'] = 'Created';
            }else{
                // return $data;
            $results['data'] =  staff_attendance::where('date',$date)->update($data);

           $results['status'] = 'Updated';
            }

            return response()->json($results);

}


//////////////////////////////////////////



}

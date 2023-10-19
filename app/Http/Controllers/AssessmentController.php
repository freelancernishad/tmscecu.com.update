<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\AssessmentRecord;
use App\Models\student;

class AssessmentController extends Controller
{

    function getStudentAssessment(){

        return student::where(['StudentClass'=>'Six','Year'=>date('Y'),'StudentStatus'=>'Active'])->orderBy('StudentRoll','desc')->with('assessments')->get();
    }



    function getStudent(Request $request){
        $class = $request->class;
        return student::where(['StudentClass'=>$class,'Year'=>date('Y'),'StudentStatus'=>'Active'])->orderBy('StudentRoll','asc')->get();
    }


    public function store(Request $request)
    {



        $class = $request->class;
        $subject = $request->subject;
        $type = $request->type;

        $checkAssessment = Assessment::where(['class'=>$class,'subject'=>$subject,'type'=>$type])->count();
        if($checkAssessment) {
            return response()->json(['message' => 'already inserted'], 400);
        }




        $assessment = Assessment::create($request->only([
            'report_name', 'date', 'class', 'subject', 'type', 'chapter_name', 'teacher_name', 'note',
        ]));

        // Create assessment records for selected students
        foreach ($request->input('studentData') as $stu) {

            $student = student::find($stu['student_id']);
            $assessmentRecord = new AssessmentRecord([
                'PI' => $request->input('PI'),
                'assessment_id' => $assessment->id,
                'student_id' => $student->id,
                'type' => $request->type,
                'score' => $stu['score'],
                'report_name' => $request->report_name,
                'date' => $request->date,
                'class' => $request->class,
                'subject' => $request->subject,
                'type' => $request->type,
                'chapter_name' => $request->chapter_name,
                'teacher_name' => $request->teacher_name,
                'note' => $request->note,
            ]);
            $assessmentRecord->save();
        }
        return response()->json(['message' => 'Assessment created successfully'], 201);
    }



}

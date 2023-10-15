<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\AssessmentRecord;
use App\Models\student;

class AssessmentController extends Controller
{

    function getStudentAssessment(){

        return student::where('StudentClass','Six')->with('assessments')->get();
    }



    function getStudent(){
        return student::where('StudentClass','Six')->get();
    }


    public function store(Request $request)
    {






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

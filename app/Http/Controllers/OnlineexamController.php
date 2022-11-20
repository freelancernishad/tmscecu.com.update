<?php

namespace App\Http\Controllers;

use App\Models\Answere;
use App\Models\Onlineexam;
use App\Models\Questionbank;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class OnlineexamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = QueryBuilder::for(Onlineexam::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('group'),
                AllowedFilter::exact('subject'),
                'title',
                'description',
                'start_date',
                'end_date',
                'duration',
                'totalmark',
                'questions',
            ])->orderBy('id', 'DESC')
            ->paginate(10);





        return response()->json($result);
    }

    public function answeres()
    {
        $ans = QueryBuilder::for(Answere::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('student_id'),
                AllowedFilter::exact('exam_id'),
                'start',
                'end',
                'totalmark',
                'currectans',
                'answeres',
            ])->orderBy('id', 'DESC');


$count =  $ans->count();
                if($count>0){
                    $result = $ans->first();
                    $data = [
                        'count'=>$count,
                        'answeres'=> (object) json_decode($result->answeres),
                        'created_at'=>$result->created_at,
                        'currectans'=>$result->currectans,
                        'end'=>$result->end,
                        'exam_id'=>$result->exam_id,
                        'id'=>$result->id,
                        'school_id'=>$result->school_id,
                        'start'=>$result->start,
                        'student_id'=>$result->student_id,
                        'totalmark'=>$result->totalmark,
                        'updated_at'=>$result->updated_at,
                    ];
                }else{
                    $data = [
                        'count'=>$count
                    ];
                }





        return response()->json($data);
    }


    public function examview()
    {
        $getdata = QueryBuilder::for(Onlineexam::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('group'),
                AllowedFilter::exact('subject'),
                'title',
                'description',
                'start_date',
                'end_date',
                'duration',
                'totalmark',
                'questions',
            ])->orderBy('id', 'DESC')
            ->get();



        $result = [

            "id" => $getdata[0]->id,
            "school_id" => $getdata[0]->school_id,
            "year" => $getdata[0]->year,
            "class" => $getdata[0]->class,
            "group" => $getdata[0]->group,
            "subject" => $getdata[0]->subject,
            "title" => $getdata[0]->title,
            "description" => $getdata[0]->description,
            "start_date" => $getdata[0]->start_date,
            "end_date" => $getdata[0]->end_date,
            "duration" => $getdata[0]->duration,
            "totalmark" => $getdata[0]->totalmark,

            "created_at" => $getdata[0]->created_at,
            "updated_at" => $getdata[0]->updated_at
        ];


        $questions = [];
        foreach (json_decode($getdata[0]->questions) as $value) {

            $question = Questionbank::find($value);
            $qq = [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => $question->answers,
                'currect_ans' => $question->currect_answer,
            ];
            array_push($questions, $qq);
        }
        $result['questions'] = $questions;


        return response()->json($result);
    }



    public function examstart(Request $request)
    {

        $final = $request->final;

        $onlineexam  = Onlineexam::find($request->exam_id);
        $startTime = date("Y-m-d H:i:s");
        $endTime = date('Y-m-d H:i:s', strtotime("$startTime + $onlineexam->duration minute"));
        $data = [
            'answeres' => json_encode($request->answeres),
            'currectans' => $request->currectans,

            'exam_id' => $request->exam_id,
            'school_id' => $request->school_id,
            'student_id' => $request->student_id,
            'totalmark' => $request->totalmark,
        ];
        $checkdata = [
            'exam_id' => $request->exam_id,
            'school_id' => $request->school_id,
            'student_id' => $request->student_id,
        ];

        $checkAnswere = Answere::where($checkdata)->count();
        if ($checkAnswere > 0) {
            $checkAnswere = Answere::where($checkdata)->first();



            $checkAnswere->update($data);
        } else {

            $data['start'] = $startTime;
            $data['end'] = $endTime;
            Answere::create($data);
        }
        $result = Answere::where($checkdata)->first();
        $currectans = 0;
        $falseans = 0;
        $totalscore = [];

        if ($final == 'finalsubmit') {


            foreach (json_decode($result->answeres) as $key => $value) {

                $getcurrectans = Questionbank::find($key);
                $currect = $getcurrectans->currect_answer;

                if ($currect == $value) {
                    $currectans += 1;
                    array_push($totalscore, 1);
                } else {
                    $falseans += 1;
                    array_push($totalscore, 0);
                };
            }

            $finalresult = [
                'action' => 'submited',
                'totalqueston' => $onlineexam->totalmark,
                'currectans' => $currectans,
                'falseans' => $falseans,
                'totalscore' => $totalscore,
            ];
        } else {

            $finalresult = [
                'action' => '',
            ];
        }

        $checkAnswere = Answere::where($checkdata)->first();
        $checkAnswere->update(['totalmark' => $onlineexam->totalmark, 'currectans' => $currectans]);

        return response()->json($finalresult);
    }



    public function onlineexams_submit(Request $request)
    {


        $id = $request->id;
        if ($id != '') {
            $Onlineexam = Onlineexam::find($id);
        }


        $data = [
            'school_id' => $request->school_id,
            'year' => $request->year,
            'class' => $request->class,
            'group' => $request->group,
            'subject' => $request->subject,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
            'totalmark' => $request->totalmark,
            'questions' => json_encode($request->questions),
        ];
        // return $data;

        if ($id == '') {
            $create =     Onlineexam::create($data);
        } else {


            $create =  $Onlineexam->update($data);
        }



        return sent_response('Success', $create);
    }





    public function onlineexamsedit()
    {
        $result = QueryBuilder::for(Onlineexam::class)
            ->allowedFilters([

                AllowedFilter::exact('id'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('class'),
                AllowedFilter::exact('group'),
                AllowedFilter::exact('subject'),
                'question',
                'answers',
                'currect_answer'
            ])
            ->get();



        $data = [



            'id' => $result[0]->id,
            'school_id' => $result[0]->school_id,
            'year' => $result[0]->year,
            'class' => $result[0]->class,
            'group' => $result[0]->group,
            'subject' => $result[0]->subject,
            'title' => $result[0]->title,
            'description' => $result[0]->description,
            'start_date' => $result[0]->start_date,
            'end_date' => $result[0]->end_date,
            'duration' => $result[0]->duration,
            'totalmark' => $result[0]->totalmark,
            'questions' => json_decode($result[0]->questions),

            'updated_at' => $result[0]->updated_at,
        ];

        return response()->json($data);
    }




    public function onlineexamsDelete($id)
    {
        $gallery =   Onlineexam::find($id);
        return  $result =   $gallery->delete();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Onlineexam  $onlineexam
     * @return \Illuminate\Http\Response
     */
    public function show(Onlineexam $onlineexam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Onlineexam  $onlineexam
     * @return \Illuminate\Http\Response
     */
    public function edit(Onlineexam $onlineexam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Onlineexam  $onlineexam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onlineexam $onlineexam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Onlineexam  $onlineexam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onlineexam $onlineexam)
    {
        //
    }
}

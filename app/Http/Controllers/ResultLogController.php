<?php

namespace App\Http\Controllers;

use App\Models\ResultLog;
use Illuminate\Http\Request;

class ResultLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $examType =  $request->examType;
    //    if($examType=='Annual_Examination'){
    //     $examType = 'Annual Examination';
    //    }

    $subject = $request->subject;
        if($subject=='ধর্ম ও নৈতিক শিক্ষা'){
            if($request->religion=='Hindu'){
                $subject = 'হিন্দু-ধর্ম';
            }else{
                $subject = 'ইসলাম-ধর্ম';
            }
        }



        $logData = [
            'class'=>$request->student_class,
            'group'=> $request->group,
            'subject'=>$subject,
            'examName'=>$examType,
            'month'=>date('F', strtotime($request->date)),
            'year'=>date('Y', strtotime($request->date)),
            'status'=>'1',
        ];


        return $checkResultLog = ResultLog::where($logData)->count();


    }
    public function indexlist(Request $request)
    {
        return ResultLog::orderBy('id','desc')->paginate(20);
    }
    public function editmode(Request $request)
    {

        $id = $request->id;
        $ResultLog = ResultLog::find($id);
        $ResultLog->update(['status'=>'0']);

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
     * @param  \App\Models\ResultLog  $resultLog
     * @return \Illuminate\Http\Response
     */
    public function show(ResultLog $resultLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResultLog  $resultLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultLog $resultLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResultLog  $resultLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultLog $resultLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResultLog  $resultLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultLog $resultLog)
    {
        //
    }
}

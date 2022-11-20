<?php

namespace App\Http\Controllers;

use App\Models\Questionbank;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class QuestionbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = QueryBuilder::for(Questionbank::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('year'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('group'),
            AllowedFilter::exact('subject'),
            'question',
            'answers',
            'currect_answer'

        ])->orderBy('id','DESC')
        ->paginate(10);
    return response()->json($result);

    }





    public function questionbank_submit(Request $request)
    {


        $id = $request->id;
if($id!=''){
    $Questionbank = Questionbank::find($id);


}


        $data= [
        'school_id' => $request->school_id,
        'year' => $request->year,
        'class' => $request->class,
        'group' => $request->group,
        'subject' => $request->subject,
        'question' => $request->question,
        'answers' => json_encode($request->answeres),
        'currect_answer' => $request->currect_answere,



        ];
        // return $data;

        if($id==''){
            $create =     Questionbank::create($data);
        }else{


            $create =  $Questionbank->update($data);

        }



        return sent_response('Success', $create);
    }





    public function questionbankedit()
    {
        $result = QueryBuilder::for(Questionbank::class)
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



$data=[



            'id'=> $result[0]->id,
            'school_id'=> $result[0]->school_id,
            'year'=> $result[0]->year,
            'class'=> $result[0]->class,
            'group'=> $result[0]->group,
            'subject'=> $result[0]->subject,
            'question'=> $result[0]->question,
            'answeres'=> json_decode($result[0]->answers),
            'currect_answere'=> $result[0]->currect_answer,

            'updated_at'=> $result[0]->updated_at,
];

    return response()->json($data);

    }




    public function questionbankDelete($id)
    {
        $gallery =   Questionbank::find($id);
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
     * @param  \App\Models\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function show(Questionbank $questionbank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionbank $questionbank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionbank $questionbank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionbank $questionbank)
    {
        //
    }
}

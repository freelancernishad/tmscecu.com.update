<?php

namespace App\Http\Controllers;

use App\Models\SchoolFee;
use Illuminate\Http\Request;

class SchoolFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $class = $request->class;
        $type = $request->type;
        if($class && $type){
            return SchoolFee::where(['class'=>$class,'type'=>$type])->latest()->first();
        }
        if($type){

            $fees =  SchoolFee::where(['type'=>$type])->latest()->get();
            $classes =  class_list();
            $datas = [
                'fees'=>$fees,
                'classes'=>$classes,
            ];
            return $datas;
        }


        return SchoolFee::all();
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
     * @param  \App\Models\SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolFee $schoolFee,$id)
    {
        return SchoolFee::find($id);
        return $schoolFee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolFee $schoolFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolFee $schoolFee)
    {



        $data = $request->all();
        $schoolfee = SchoolFee::find($request->id);
        // if($request->status==true){
        //     $data['status'] = 1;
        // }else{
        //     $data['status'] = 0;
        // }

        $schoolfee->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolFee $schoolFee)
    {
        //
    }
}

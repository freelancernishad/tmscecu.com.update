<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Uniouninfo;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

public function visitorCount(Request $request)
{
    return Visitor::count();
    $union = $request->union;
    if($union){
        return Visitor::where(['union'=>$union])->count();
    }
    return Visitor::where(['union'=>''])->count();
}
public function visitorcreate(Request $request)
{
    $ip =  $_SERVER['REMOTE_ADDR'];
    $url = url()->current();
$domain =  explode('//',$url);
 $subdomain =  explode('.', $domain[1]);
 $subdomainCount =  count($subdomain);


        $visitorWhere = [
            'ip'=>$ip,
            // 'union'=>'all',
            'date'=>date('d-m-Y H:i'),
        ];
       $Visitor = Visitor::where($visitorWhere)->count();
      if($Visitor<1){
        $datainsert = [
            'ip'=>$ip,
            // 'union'=>'all',
            'date'=>date('d-m-Y H:i'),
            'month'=>date('F'),
            'year'=>date('Y'),
        ];
        Visitor::create($datainsert);
      }




  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}

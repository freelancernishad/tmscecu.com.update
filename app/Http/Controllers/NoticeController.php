<?php

namespace App\Http\Controllers;

use App\Models\notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sidebar = $request->sidebar;
        $school_id = sitedetails()->school_id;
        if($sidebar){
            return  $rows = notice::where('school_id',$school_id)->orderBy('created_at','desc')->paginate($sidebar);
        }
       return  $rows = notice::where('school_id',$school_id)->orderBy('created_at','desc')->paginate(20);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $edit_data = [
            'title'=>'',
            'description'=>'',
            'end'=>'',
        ];
$rows = json_decode(json_encode($edit_data));

        $data['form_type'] = 'new';
        return view('dashboard/notice.add',compact('rows'),$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = request()->except(['file']);

      $fileCount =  count(explode(';', $request->file));

      if ($fileCount > 1) {

        $data['file'] =  fileupload2($request->file,"backend/notice/");

      }




        if($request->id){
            $id = $request->id;
            $notice = notice::find($id);
            return $notice->update($data);
        }


      return notice::create($data);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(notice $notice)
    {
        return $notice;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(notice $notice)
    {
        $rows = $notice;
        $data['form_type'] = 'edit';
        return view('dashboard/notice.add',compact('rows'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notice $notice)
    {

        $data = request()->except(['_token','_method']);
        $notice->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(notice $notice)
    {
        $notice->delete();
        return redirect()->back();
    }
}

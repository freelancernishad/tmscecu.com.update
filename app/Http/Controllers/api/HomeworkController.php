<?php
namespace App\Http\Controllers\api;
use App\Models\Homework;
use Illuminate\Http\Request;
use App\Models\Homeworksubmit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $result = QueryBuilder::for(Homework::class)
        ->allowedFilters([
            'title',
            'description',
            'files',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('subject'),
            AllowedFilter::exact('startdate'),
            AllowedFilter::exact('enddate'),
            AllowedFilter::exact('status'),

        ])->orderBy('startdate','DESC')
        ->paginate(10);
    return response()->json($result);

    }

    public function student_homework_check()
    {
        $result = QueryBuilder::for(Homeworksubmit::class)
        ->allowedFilters([

            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('student_id'),
            AllowedFilter::exact('student_name'),
            AllowedFilter::exact('homework_id'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('group'),
            AllowedFilter::exact('subject'),

        ])
        ->paginate(10);
    return response()->json($result);

    }

    public function student_homework_timecheck()
    {


        $from = date('Y-d-m H:i:s');
        $to =  date('Y-d-m H:i:s',strtotime('2022-06-07 13:39:00'));


        $result = QueryBuilder::for(Homework::class)
        ->allowedFilters([

            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('student_id'),
            AllowedFilter::exact('student_name'),
            AllowedFilter::exact('homework_id'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('group'),
            AllowedFilter::exact('subject'),

        ])
        ->whereBetween('enddate', [$from, $to])->get();
    return response()->json($result);


    }


    public function homeworkedit()
    {
        $result = QueryBuilder::for(Homework::class)
        ->allowedFilters([

            'title',
            'description',
            'files',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('subject'),
            AllowedFilter::exact('startdate'),
            AllowedFilter::exact('enddate'),
            AllowedFilter::exact('status'),
        ])
        ->get();



        $images = [];
// return json_decode($result[0]->image);
// return count(json_decode($result[0]->image));

        $i = 0;
foreach (json_decode($result[0]->files) as $key => $value) {
// return $value;
//  $imag = explode('____',$value)[1];

  $defaults = 0;
  $highlights = 0;
 if ($i == 0) {
     $defaults = 1;
     $highlights = 1;
 };

array_push($images,[
    'default'=> $defaults,
    'highlight'=> $highlights,
    'name'=> explode('____',$value)[1],
    'path'=> base64($value),
]);


   $i++;
};



// return $images;


$data=[

            'created_at'=> $result[0]->created_at,
            'description'=> $result[0]->description,
            'id'=> $result[0]->id,
            'file'=> $images,
            'school_id'=> $result[0]->school_id,
            'class'=> $result[0]->class,
            'group'=> $result[0]->group,
            'subject'=> $result[0]->subject,
            'status'=> $result[0]->status,
            'startdate'=> $result[0]->startdate,
            'enddate'=> $result[0]->enddate,

            'title'=> $result[0]->title,
            'updated_at'=> $result[0]->updated_at,
];

    return response()->json($data);

    }





    public function homework_submit(Request $request)
    {


        $id = $request->id;
if($id!=''){
    $Homework = Homework::find($id);

    // return $gallery->image;
    foreach (json_decode($Homework->files) as $value) {

     if(File::exists($value)){
        unlink($value);
    }
    }

}




// die();



        $imageerror = [
            'size'=>['Failed to upload images. The image maximum size is 1MB.'],
        ];
        $images = [];

        foreach ($request->file as $key => $value) {
                 $Image = $value['path'];
                $imagesize = (int) (strlen(rtrim($Image, '=')) * 3 / 4)/1024;
                if($imagesize>1024){
                    $imageerror[$value['name']] = ['Failed to upload images'.$value['name'].'.Because Image size is : '.number_format($imagesize/1024,2) .'MB'];
                }
                $position = strpos($Image, ';');
                $sub = substr($Image, 0, $position);
                $ext = explode('/', $sub)[1];

                $folderPath = "backend/homework/";

                $base64Image = explode(";base64,", $Image);

                $image_base64 = base64_decode($base64Image[1]);
                $file = $folderPath . time().'____'.$value['name'];
                file_put_contents($file, $image_base64);

                 array_push($images,$file);
        }

    $uploadedImages =  json_encode($images);
        $validator = Validator::make($request->all(),
        [

            'description' => 'required',
            'title' => 'required',
        ]
    );
        if ($validator->fails()) {
            return sent_response('validation error', $validator->errors());
        }
        $data= [
        'school_id'=>$request->school_id,
        'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status,


        'school_id' => $request->school_id,
        'class' => $request->class,
        'group' => $request->group,
        'subject' => $request->subject,
        'title' => $request->title,
        'description' => $request->description,
        'startdate' => date('Y-m-d H:i:s',strtotime($request->startdate)),
        'enddate' => date('Y-m-d H:i:s',strtotime($request->enddate)),
        'status'=> $request->status,
        'files'=> $uploadedImages




        ];

        if($id==''){
            $create =     Homework::create($data);
        }else{


            $create =  $Homework->update($data);

        }



        return sent_response('Success', $create);
    }





    public function student_homework_submit(Request $request)
    {





        $imageerror = [
            'size'=>['Failed to upload images. The image maximum size is 1MB.'],
        ];
        $images = [];

        foreach ($request->file as $key => $value) {
                 $Image = $value['path'];
                $imagesize = (int) (strlen(rtrim($Image, '=')) * 3 / 4)/1024;
                if($imagesize>1024){
                    $imageerror[$value['name']] = ['Failed to upload images'.$value['name'].'.Because Image size is : '.number_format($imagesize/1024,2) .'MB'];
                }
                $position = strpos($Image, ';');
                $sub = substr($Image, 0, $position);
                $ext = explode('/', $sub)[1];

                $folderPath = "backend/homework/submit/";

                $base64Image = explode(";base64,", $Image);

                $image_base64 = base64_decode($base64Image[1]);
                $file = $folderPath . time().'____'.$value['name'];
                file_put_contents($file, $image_base64);

                 array_push($images,$file);
        }
    $uploadedImages =  json_encode($images);

        $data= [
        'school_id'=>$request->school_id,
        'homework_id'=>$request->homework_id,
        'student_id'=>$request->student_id,
        'student_name'=>$request->student_name,
        'description'=>$request->description,
        'class' => $request->class,
        'group' => $request->group,
        'subject' => $request->subject,
        'files'=> $uploadedImages,
        'startdate'=> $request->startdate,
        'enddate'=> $request->enddate,


        ];


            $create =     Homeworksubmit::create($data);

        return sent_response('Success', $create);
    }







    public function homeworkDelete($id)
    {
        $gallery =   Homework::find($id);
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
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        //
    }
}

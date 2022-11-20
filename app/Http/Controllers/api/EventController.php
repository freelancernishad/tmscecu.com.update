<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $result = QueryBuilder::for(Event::class)
        ->allowedFilters([


            'title',
            'description',
            'Images',
            'Tags',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('post_id'),
            AllowedFilter::exact('Category'),
            AllowedFilter::exact('status'),
        ])
        ->paginate(10);
    return response()->json($result);

    }




    public function eventedit()
    {
        $result = QueryBuilder::for(Event::class)
        ->allowedFilters([

            'title',
            'description',
            'image',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('category'),
        ])
        ->get();



        $images = [];
// return json_decode($result[0]->image);
// return count(json_decode($result[0]->image));

        $i = 0;
foreach (json_decode($result[0]->Images) as $key => $value) {
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
            'images'=> $images,
            'school_id'=> $result[0]->school_id,
            'slug'=> $result[0]->slug,
            'title'=> $result[0]->title,
            'status'=> $result[0]->status,
            'updated_at'=> $result[0]->updated_at,
];

    return response()->json($data);

    }



    public function event_submit(Request $request)
    {
        $id = $request->id;
if($id!=''){
    $Event = Event::find($id);

    // return $gallery->image;
    foreach (json_decode($Event->Images) as $value) {

     if(File::exists(env('FILE_PATH').$value)){
        unlink(env('FILE_PATH').$value);
    }
    }

}




// die();



        $imageerror = [
            'size'=>['Failed to upload images. The image maximum size is 1MB.'],
        ];
        $images = [];
        foreach ($request->images as $key => $value) {
                $Image = $value['path'];
                $imagesize = (int) (strlen(rtrim($Image, '=')) * 3 / 4)/1024;
                if($imagesize>1024){
                    $imageerror[$value['name']] = ['Failed to upload images'.$value['name'].'.Because Image size is : '.number_format($imagesize/1024,2) .'MB'];
                }
                $position = strpos($Image, ';');
                $sub = substr($Image, 0, $position);
                $ext = explode('/', $sub)[1];

                $name = time().'____'.$value['name'].'.'.$ext;
                $img = Image::make($Image)->resize(240, 200);

                $upload_path = 'backend/gallery/';
                $image_url = $upload_path.$name;
                 $img->save(env('FILE_PATH').$image_url);
                 array_push($images,$image_url);
        }
        //  $imageerrorcoun = count($imageerror);
        // if($imageerrorcoun>1){
        //     return sent_response('validation error', $imageerror);
        // }
    $uploadedImages =  json_encode($images);
        $validator = Validator::make($request->all(),
        [

            'description' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'images' => 'required',
        ]
    );
        if ($validator->fails()) {
            return sent_response('validation error', $validator->errors());
        }
        $data= [
        'school_id'=>$request->school_id,
        'title'=>$request->title,
        'slug'=>$request->slug,
        'description'=>$request->description,
        'Images'=>$uploadedImages,
        'Category'=>$request->Category,
        'status'=>$request->status,

        ];

        if($id==''){
            $create =     Event::create($data);
        }else{


            $create =  $Event->update($data);

        }



        return sent_response('Success', $create);
    }



    public function eventDelete($id)
    {
        $gallery =   Event::find($id);
       return  $result =   $gallery->delete();
    }












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['form_type'] = 'new';

        $table =  DB::getSchemaBuilder()->getColumnListing('events');
        $row = [];
        foreach ($table as $rowname) {
            $row[$rowname] = '';
        };

        $rows = json_decode(json_encode($row));



        return view('dashboard/blogs/event.add',compact('rows'),$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except(['_token','Images']);



//Images upload
$Imagesdata =   $request->Images;
$Imagesdata =  explode(',', $Imagesdata);
$imagecount = count($Imagesdata);
if ($imagecount == 2) {
    $Imagesdata = $Imagesdata[1];

    $imageid = uniqid();
    $Imagesdata = base64_decode($Imagesdata);
    $ImagesImage = "$imageid-Images.jpg";
    $im = imagecreatefromstring($Imagesdata);
    if ($im !== false) {
        header('Content-Type: image/png');
        imagejpeg($im, "images/" . $ImagesImage, 10);
    } else {
        echo 'An error occurred.';
    }
    $data['Images'] = "images/" . $ImagesImage;
}







        $school_id = sitedetails()[0]->school_id;
        $data['school_id']= $school_id;
        event::create($data);
        return redirect(route('event.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $rows =  $event;

        return view('dashboard/blogs/event.view',compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {


        $rows =  $event;
        $data['form_type'] = 'edit';
        return view('dashboard/blogs/event.add',compact('rows'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $data = request()->except(['_token','_method','status']);
        $status =   $request->status;
        if($status=='Published'){
            $data['status'] = 'Published';
        }else{
            $data['status'] = 'Draft';

        }




//Images upload
$Imagesdata =   $request->Images;
$Imagesdata =  explode(',', $Imagesdata);
$imagecount = count($Imagesdata);
if ($imagecount == 2) {
    $Imagesdata = $Imagesdata[1];

    $imageid = uniqid();
    $Imagesdata = base64_decode($Imagesdata);
    $ImagesImage = "$imageid-Images.jpg";
    $im = imagecreatefromstring($Imagesdata);
    if ($im !== false) {
        header('Content-Type: image/png');
        imagejpeg($im, "images/" . $ImagesImage, 10);
    } else {
        echo 'An error occurred.';
    }
    $data['Images'] = "images/" . $ImagesImage;
}





        $event->update($data);
        return redirect(route('event.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
    }
}

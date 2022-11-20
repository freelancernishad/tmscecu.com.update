<?php
namespace App\Http\Controllers\api;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $result = QueryBuilder::for(Gallery::class)
        ->allowedFilters([

            'title',
            'description',
            'image',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('category'),
        ])
        ->paginate(10);
    return response()->json($result);

    }



    public function galleryedit()
    {
        $result = QueryBuilder::for(Gallery::class)
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
foreach (json_decode($result[0]->image) as $key => $value) {
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
             'category'=> $result[0]->category,
            'created_at'=> $result[0]->created_at,
            'description'=> $result[0]->description,
            'id'=> $result[0]->id,
            'images'=> $images,
            'school_id'=> $result[0]->school_id,
            'slug'=> $result[0]->slug,
            'title'=> $result[0]->title,
            'updated_at'=> $result[0]->updated_at,
];

    return response()->json($data);

    }






    public function category()
    {

        $result = QueryBuilder::for(GalleryCategory::class)
        ->allowedFilters([

            'name',
            'image',

            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('slug'),
        ])
        ->orderBy('id','DESC')
        ->paginate(10);
    return response()->json($result);

    }



    public function gallery_submit(Request $request)
    {
        $id = $request->id;
if($id!=''){
    $gallery = Gallery::find($id);

    // return $gallery->image;
    foreach (json_decode($gallery->image) as $value) {
        // return Storage::disk('public')->exists($path);
     if(File::exists(env('FILE_PATH').$value)){
        unlink(env('FILE_PATH').$value);
    }
    }

}




// die();



        $imageerror = [
            'size'=>['Failed to upload images. The image maximum size is 1MB.'],
        ];

// return $request->images;

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

                $name = time().'____'.$value['name'];
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
            'category' => 'required',
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
        'image'=>$uploadedImages,
        'category'=>$request->category,

        ];

        if($id==''){
            $create =     Gallery::create($data);
        }else{


            $create =  $gallery->update($data);

        }



        return sent_response('Success', $create);
    }

    public function category_submit(Request $request)
    {
         $id =  $request->id;


        // return $request->validate([
        //     'name' => 'required|unique:gallery_categories',
        //     'slug' => 'required|unique:gallery_categories',

        // ]);

        $validator = Validator::make($request->all(),

        [
            'name' => 'required|unique:gallery_categories,name,'.$request->id,
            'slug' => 'required|unique:gallery_categories,slug,'.$request->id,

        ]

    );
        if ($validator->fails()) {
            return sent_response('validation error', $validator->errors());
        }


        $data = [
            'school_id'=>$request->school_id,
            'name'=>$request->name,
            'slug'=>$request->slug,
        ];



            if($id==''){

                    $result =   GalleryCategory::create($data);



            }else{
                $gallerycategory =   GalleryCategory::find($id);
                $result =   $gallerycategory->update($data);
            }
            return sent_response('Success', $result);
    }

    public function galleryDelete($id)
    {
        $gallery =   Gallery::find($id);
       return  $result =   $gallery->delete();
    }

    public function categoryDelete($id)
    {
        $gallerycategory =   GalleryCategory::find($id);
       return  $result =   $gallerycategory->delete();
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
            'category'=>'',
            'image'=>''
        ];
        $rows = json_decode(json_encode($edit_data));


        $data['form_type'] = 'new';
        $school_id = sitedetails()[0]->school_id;
        $category = GalleryCategory::where('school_id',$school_id)->get();
        return view('dashboard/gallery.gallery_form',compact('rows','category'),$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school_id = sitedetails()[0]->school_id;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);



        $data = request()->except(['_token']);

             $imaagedata =   $request->image;
        $imaagedata =  explode(',',$imaagedata);

$imagecount = count($imaagedata);
if($imagecount==2){
        $imaagedata = $imaagedata[1];
        $imageid = uniqid();
        $imaagedata = base64_decode($imaagedata);
        $NewsImage ="$imageid.jpg";
        $im = imagecreatefromstring($imaagedata);
        if ($im !== false) {
            header('Content-Type: image/png');
            imagejpeg($im,"images/".$NewsImage,10);
        }else {
            echo 'An error occurred.';
        }
        $data['image']="images/".$NewsImage;
    }
    $data['school_id']=$school_id;
// return $data;
        // echo '<pre>';
        // print_r($data);

        Gallery::create($data);

       return redirect(route('gallery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $rows = $gallery;
        $data['form_type'] = 'edit';
        $category = GalleryCategory::all();
        return view('dashboard/gallery.gallery_form',compact('rows','category'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $data = request()->except(['_token','_method']);

        $imaagedata =   $request->image;
        $imaagedata =  explode(',',$imaagedata);

$imagecount = count($imaagedata);
if($imagecount==2){
        $imaagedata = $imaagedata[1];
        $imageid = uniqid();
        $imaagedata = base64_decode($imaagedata);
        $NewsImage ="$imageid.jpg";
        $im = imagecreatefromstring($imaagedata);
        if ($im !== false) {
            header('Content-Type: image/png');
            imagejpeg($im,"images/".$NewsImage,10);
        }else {
            echo 'An error occurred.';
        }
        $data['image']="images/".$NewsImage;
    }

        $gallery->update($data);
        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        // return redirect()->back();
    }
}

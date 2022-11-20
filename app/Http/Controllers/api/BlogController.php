<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\blog_category;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class blogController extends Controller
{


    public function index()
    {
        $result = QueryBuilder::for(blog::class)
        ->allowedFilters([


            'title',
            'description',
            'Images',
            'Tags',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('slug'),
            AllowedFilter::exact('post_id'),
            AllowedFilter::exact('Category'),
            AllowedFilter::exact('status'),
        ])->orderBy('id','DESC')
        ->paginate(10);
    return response()->json($result);

    }



    public function blogedit()
    {
        $result = QueryBuilder::for(blog::class)
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
             'Category'=> $result[0]->Category,
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






    public function category()
    {

        $result = QueryBuilder::for(blog_category::class)
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



    public function blog_submit(Request $request)
    {
        $id = $request->id;
if($id!=''){
    $blog = blog::find($id);

    // return $gallery->image;
    foreach (json_decode($blog->Images) as $value) {

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
            'Category' => 'required',
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
            $create =     blog::create($data);
        }else{


            $create =  $blog->update($data);

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
            'name' => 'required|unique:blog_categories,name,'.$request->id,
            'slug' => 'required|unique:blog_categories,slug,'.$request->id,

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

                    $result =   blog_category::create($data);



            }else{
                $gallerycategory =   blog_category::find($id);
                $result =   $gallerycategory->update($data);
            }
            return sent_response('Success', $result);
    }

    public function blogDelete($id)
    {
        $gallery =   blog::find($id);
       return  $result =   $gallery->delete();
    }

    public function categoryDelete($id)
    {
        $gallerycategory =   blog_category::find($id);
       return  $result =   $gallerycategory->delete();
    }










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school_id = sitedetails()[0]->school_id;
        $data['form_type'] = 'new';

        $table =  DB::getSchemaBuilder()->getColumnListing('blogs');
        $row = [];
        foreach ($table as $rowname) {
            $row[$rowname] = '';
        };

        $rows = json_decode(json_encode($row));

        $cat = blog_category::where('school_id',$school_id)->get();

        return view('dashboard/blogs/posts.add',compact('rows','cat'),$data);
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










        $data['school_id']= $school_id;
        blog::create($data);
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        $rows =  $blog;

        return view('dashboard/blogs/posts.view',compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        $cat = blog_category::all();

        $rows =  $blog;
        $data['form_type'] = 'edit';
        return view('dashboard/blogs/posts.add',compact('rows','cat'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $data = request()->except(['_token','_method','Images','status']);
        $status =   $request->status;
        if($status=='Published'){
            $data['status'] = 'Published';
        }else{
            $data['status'] = 'Draft';

        }

// dd($data);


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





        $blog->update($data);
        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        $blog->delete();
    }
}

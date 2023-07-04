<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\school_detail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\Validator;



class SchoolDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $front = $request->front;
        $school_id = $request->school_id;
         $result = DB::table('school_details')->where('school_id', $school_id)->first();

        $data = [
            "id" => $result->id,
            "school_id" => $result->school_id,
            "school_domain" => $result->school_domain,
            "SMS_TOKEN" => $result->SMS_TOKEN,

            "SCHOLL_NAME" => $result->SCHOLL_NAME,
            "SCHOLL_ADDRESS" => $result->SCHOLL_ADDRESS,
            "SCHOLL_BUILD" => $result->SCHOLL_BUILD,
            "SCHOLL_CODE" => $result->SCHOLL_CODE,

            "HISTORY_OF_THE_ORGANIZATION" => $result->HISTORY_OF_THE_ORGANIZATION,
            "Principals_name" => $result->Principals_name,
            "PRINCIPALS_WORDS" => $result->PRINCIPALS_WORDS,
            "Vice_Principals_name" => $result->Vice_Principals_name,
            "VICE_PRINCIPALS_STATEMENT" => $result->VICE_PRINCIPALS_STATEMENT,
            "facebook_page" => $result->facebook_page,
            "contact_number" => $result->contact_number,

            "created_at" => $result->created_at,
            "updated_at" => $result->updated_at,
            "meta_keywords" => $result->meta_keywords,
            "meta_description" => $result->meta_description,
            "contact_email" => $result->contact_email,
            "meta_author" => $result->meta_author,
            "theme" => $result->theme,
            "application" => $result->application,
            "slider" => $result->slider
        ];

        $slider = [];
        if ($front == 'front') {

            $data['logo'] = $result->logo;
            $data['PRINCIPALS_IMGAGE'] = $result->PRINCIPALS_IMGAGE;
            $data['PRINCIPALS_Signature'] = $result->PRINCIPALS_Signature;
            $data['HISTORY_OF_THE_ORGANIZATION_IMAGE'] = $result->HISTORY_OF_THE_ORGANIZATION_IMAGE;
            $data['VICE_PRINCIPALS_IMGAGE'] = $result->VICE_PRINCIPALS_IMGAGE;
            $data['VICE_PRINCIPALS_Signature'] = $result->VICE_PRINCIPALS_Signature;



            $data['slider'] =  json_decode($result->slider);
        } else {


            $data['logo'] = asset($result->logo);
            $data['PRINCIPALS_IMGAGE'] = asset($result->PRINCIPALS_IMGAGE);
            $data['PRINCIPALS_Signature'] = asset($result->PRINCIPALS_Signature);
            $data['HISTORY_OF_THE_ORGANIZATION_IMAGE'] = asset($result->HISTORY_OF_THE_ORGANIZATION_IMAGE);
            $data['VICE_PRINCIPALS_IMGAGE'] = asset($result->VICE_PRINCIPALS_IMGAGE);
            $data['VICE_PRINCIPALS_Signature'] = asset($result->VICE_PRINCIPALS_Signature);




            $i = 0;
            foreach (json_decode($result->slider) as $key => $value) {
                // return $value;
                //  $imag = explode('____',$value)[1];

                $defaults = 0;
                $highlights = 0;
                if ($i == 0) {
                    $defaults = 1;
                    $highlights = 1;
                };

                array_push($slider, [
                    'default' => $defaults,
                    'highlight' => $highlights,
                    'name' => explode('____', $value)[1],
                    'path' => base64($value),
                ]);


                $i++;
            };
            $data['slider'] = $slider;
        }










        return $data;
    }


    public function school_update(Request $request)
    {


        $id = $request->id;
        $school_detail = school_detail::find($id);

        $data = [


            "school_id" => $request->school_id,
            "school_domain" => $request->school_domain,
            "SMS_TOKEN" => $request->SMS_TOKEN,

            "SCHOLL_NAME" => $request->SCHOLL_NAME,
            "SCHOLL_ADDRESS" => $request->SCHOLL_ADDRESS,
            "SCHOLL_BUILD" => $request->SCHOLL_BUILD,
            "SCHOLL_CODE" => $request->SCHOLL_CODE,

            "HISTORY_OF_THE_ORGANIZATION" => $request->HISTORY_OF_THE_ORGANIZATION,
            "Principals_name" => $request->Principals_name,
            "PRINCIPALS_WORDS" => $request->PRINCIPALS_WORDS,
            "Vice_Principals_name" => $request->Vice_Principals_name,
            "VICE_PRINCIPALS_STATEMENT" => $request->VICE_PRINCIPALS_STATEMENT,
            "facebook_page" => $request->facebook_page,
            "contact_number" => $request->contact_number,

            "created_at" => $request->created_at,
            "updated_at" => $request->updated_at,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
            "contact_email" => $request->contact_email,
            "meta_author" => $request->meta_author,
            "theme" => $request->theme,
            "application" => $request->application,
            "slider" => $request->slider
        ];




        // return $school_detail->slider;




        $images = [];
        foreach ($request->slider as $key => $value) {


           $Image = $value['path'];


                $image_url =  fileupload($Image, 'backend/slider/', 960, 500);

                array_push($images, $image_url);




        }
        $slider =  json_encode($images);












        $logoCount =  count(explode(';', $request->logo));
        if ($logoCount > 1) {

            $imgsize_arr = getimagesize($request->logo);
            $logo_width = $imgsize_arr[0];
            $logo_height = $imgsize_arr[1];


            $data['logo'] = fileupload($request->logo, 'backend/logo/', $logo_width, $logo_height);
        }




        $PRINCIPALS_IMGAGECount =  count(explode(';', $request->PRINCIPALS_IMGAGE));
        if ($PRINCIPALS_IMGAGECount > 1) {

            $data['PRINCIPALS_IMGAGE'] = fileupload($request->PRINCIPALS_IMGAGE, 'backend/PRINCIPALS_IMGAGE/', 300, 300);
        }





        $PRINCIPALS_SignatureCount =  count(explode(';', $request->PRINCIPALS_Signature));
        if ($PRINCIPALS_SignatureCount > 1) {

            $imgPRINCIPALS_Signature = getimagesize($request->PRINCIPALS_Signature);
            $PRINCIPALS_Signature_width = $imgPRINCIPALS_Signature[0];
            $PRINCIPALS_Signature_height = $imgPRINCIPALS_Signature[1];


            $data['PRINCIPALS_Signature'] = fileupload($request->PRINCIPALS_Signature, 'backend/PRINCIPALS_Signature/', $PRINCIPALS_Signature_width, $PRINCIPALS_Signature_height);
        }








        $HISTORY_OF_THE_ORGANIZATION_IMAGECount =  count(explode(';', $request->HISTORY_OF_THE_ORGANIZATION_IMAGE));
        if ($HISTORY_OF_THE_ORGANIZATION_IMAGECount > 1) {

            $data['HISTORY_OF_THE_ORGANIZATION_IMAGE'] = fileupload($request->HISTORY_OF_THE_ORGANIZATION_IMAGE, 'backend/HISTORY_OF_THE_ORGANIZATION_IMAGE/', 500, 300);
        }






        $VICE_PRINCIPALS_IMGAGECount =  count(explode(';', $request->VICE_PRINCIPALS_IMGAGE));
        if ($VICE_PRINCIPALS_IMGAGECount > 1) {

            $data['VICE_PRINCIPALS_IMGAGE'] = fileupload($request->VICE_PRINCIPALS_IMGAGE, 'backend/VICE_PRINCIPALS_IMGAGE/', 300, 300);

        }






        $VICE_PRINCIPALS_SignatureCount =  count(explode(';', $request->VICE_PRINCIPALS_Signature));
        if ($VICE_PRINCIPALS_SignatureCount > 1) {

            $imgVICE_PRINCIPALS_Signature = getimagesize($request->VICE_PRINCIPALS_Signature);
            $VICE_PRINCIPALS_Signature_width = $imgVICE_PRINCIPALS_Signature[0];
            $VICE_PRINCIPALS_Signature_height = $imgVICE_PRINCIPALS_Signature[1];


            $data['VICE_PRINCIPALS_Signature'] = fileupload($request->VICE_PRINCIPALS_Signature, 'backend/VICE_PRINCIPALS_Signature/', $VICE_PRINCIPALS_Signature_width, $VICE_PRINCIPALS_Signature_height);
        }





        $data['slider'] = $slider;
        // return $data;



        return    $school_detail->update($data);





        return $request->all();
    }







    public function userscheck(Request $request)
    {

        $validator = Validator::make($request->all(),
    [
        'email' => 'required|unique:users',
    ]

    );
        if ($validator->fails()) {
            return sent_error('validation error', $validator->errors(), 200);
        }
        $errors= [
            'email'=>[''],
        ];
        return sent_error('validation error', $errors, 200);
        // $validatedData = $request->validate([
        //     'email' => 'required|unique:users',
        // ]);

    //     $result = QueryBuilder::for(User::class)
    //     ->allowedFilters([
    //         'name',
    //         'role',
    //         AllowedFilter::exact('school_id'),
    //         AllowedFilter::exact('email'),
    //         AllowedFilter::exact('teacherOrstudent'),
    //         AllowedFilter::exact('id')
    //     ])
    //     ->orderBy('id', 'desc')
    //     ->count();
    // return response()->json($result);


    }





    public function school_id()
    {

        return response()->json(sitedetails());
    }


    public function class_list()
    {
        $result = ['Play', 'Nursery', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'];
        return response()->json($result);
    }


    public function seo()
    {
        return view('dashboard/settings.seo');
    }

    public function slider()
    {
        return view('dashboard/settings.slider');
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
     * @param  \App\Models\school_detail  $school_detail
     * @return \Illuminate\Http\Response
     */
    public function show(school_detail $school_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\school_detail  $school_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(school_detail $school_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school_detail  $school_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, school_detail $school_detail, $id)
    {

        $school_detail = school_detail::find($id);
        $data = request()->except(['_token', '_method', 'HISTORY_OF_THE_ORGANIZATION_IMAGE', 'PRINCIPALS_IMGAGE', 'VICE_PRINCIPALS_IMGAGE', 'slider']);






        $slider = $request->slider;

        if ($slider != '') {



            $sliderCount = count($slider);

            for ($i = 0; $i < $sliderCount; $i++) {

                //HISTORY_OF_THE_ORGANIZATION_IMAGE upload
                $sliderdata =   $request->slider[$i];
                $sliderdata =  explode(',', $sliderdata);
                $imagecount = count($sliderdata);
                if ($imagecount == 2) {
                    $sliderdata = $sliderdata[1];

                    $imageid = uniqid();
                    $sliderdata = base64_decode($sliderdata);
                    $sliderImage = "$imageid-slider.jpg";
                    $im = imagecreatefromstring($sliderdata);
                    if ($im !== false) {
                        header('Content-Type: image/png');
                        imagejpeg($im, "images/slider/" . $sliderImage, 10);
                    } else {
                        echo 'An error occurred.';
                    }
                    $sliderarray[$i] = [
                        'slider' => "images/slider/" . $sliderImage,
                    ];
                } else {
                    $sliderarray[$i] = [
                        'slider' => $request->slider[$i],
                    ];
                }
            }

            $sliderarray = json_encode($sliderarray);
            $data['slider'] = $sliderarray;
            //return $sliderarray;
        }







        //logo upload
        if ($request->hasfile('logo')) {
            $image = $request->file('logo');
            $imageext = $image->extension();
            $imagefile = time() . '.' . $imageext;

            $image->storeAs('/public/logo/', $imagefile);
            $data['logo'] = $imagefile;
        }




        //HISTORY_OF_THE_ORGANIZATION_IMAGE upload
        $HISTORY_OF_THE_ORGANIZATION_IMAGEdata =   $request->HISTORY_OF_THE_ORGANIZATION_IMAGE;
        $HISTORY_OF_THE_ORGANIZATION_IMAGEdata =  explode(',', $HISTORY_OF_THE_ORGANIZATION_IMAGEdata);
        $imagecount = count($HISTORY_OF_THE_ORGANIZATION_IMAGEdata);
        if ($imagecount == 2) {
            $HISTORY_OF_THE_ORGANIZATION_IMAGEdata = $HISTORY_OF_THE_ORGANIZATION_IMAGEdata[1];

            $imageid = uniqid();
            $HISTORY_OF_THE_ORGANIZATION_IMAGEdata = base64_decode($HISTORY_OF_THE_ORGANIZATION_IMAGEdata);
            $HISTORY_OF_THE_ORGANIZATION_IMAGEImage = "$imageid-HISTORY_OF_THE_ORGANIZATION_IMAGE.jpg";
            $im = imagecreatefromstring($HISTORY_OF_THE_ORGANIZATION_IMAGEdata);
            if ($im !== false) {
                header('Content-Type: image/png');
                imagejpeg($im, "images/" . $HISTORY_OF_THE_ORGANIZATION_IMAGEImage, 10);
            } else {
                echo 'An error occurred.';
            }
            $data['HISTORY_OF_THE_ORGANIZATION_IMAGE'] = "images/" . $HISTORY_OF_THE_ORGANIZATION_IMAGEImage;
        }




        //PRINCIPALS_IMGAGE upload
        $PRINCIPALS_IMGAGEdata =   $request->PRINCIPALS_IMGAGE;
        $PRINCIPALS_IMGAGEdata =  explode(',', $PRINCIPALS_IMGAGEdata);
        $imagecount = count($PRINCIPALS_IMGAGEdata);
        if ($imagecount == 2) {
            $PRINCIPALS_IMGAGEdata = $PRINCIPALS_IMGAGEdata[1];

            $imageid = uniqid();
            $PRINCIPALS_IMGAGEdata = base64_decode($PRINCIPALS_IMGAGEdata);
            $PRINCIPALS_IMGAGEImage = "$imageid-PRINCIPALS_IMGAGE.jpg";
            $im = imagecreatefromstring($PRINCIPALS_IMGAGEdata);
            if ($im !== false) {
                header('Content-Type: image/png');
                imagejpeg($im, "images/" . $PRINCIPALS_IMGAGEImage, 10);
            } else {
                echo 'An error occurred.';
            }
            $data['PRINCIPALS_IMGAGE'] = "images/" . $PRINCIPALS_IMGAGEImage;
        }



        //VICE_PRINCIPALS_IMGAGE upload
        $VICE_PRINCIPALS_IMGAGEdata =   $request->VICE_PRINCIPALS_IMGAGE;
        $VICE_PRINCIPALS_IMGAGEdata =  explode(',', $VICE_PRINCIPALS_IMGAGEdata);
        $imagecount = count($VICE_PRINCIPALS_IMGAGEdata);
        if ($imagecount == 2) {
            $VICE_PRINCIPALS_IMGAGEdata = $VICE_PRINCIPALS_IMGAGEdata[1];

            $imageid = uniqid();
            $VICE_PRINCIPALS_IMGAGEdata = base64_decode($VICE_PRINCIPALS_IMGAGEdata);
            $VICE_PRINCIPALS_IMGAGEImage = "$imageid-VICE_PRINCIPALS_IMGAGE.jpg";
            $im = imagecreatefromstring($VICE_PRINCIPALS_IMGAGEdata);
            if ($im !== false) {
                header('Content-Type: image/png');
                imagejpeg($im, "images/" . $VICE_PRINCIPALS_IMGAGEImage, 10);
            } else {
                echo 'An error occurred.';
            }
            $data['VICE_PRINCIPALS_IMGAGE'] = "images/" . $VICE_PRINCIPALS_IMGAGEImage;
        }











        $school_detail->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school_detail  $school_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(school_detail $school_detail)
    {
        //
    }






    public function yearslist(Request $request)
    {


         $type = strtolower($request->type);
         $class = strtolower($request->class);
        $group = strtolower($request->group);



        $data = [];

        if ($type == 'year') {


            //year list

            $cerrentYear = date('Y');
            $first = $cerrentYear + 1 - 1;
            array_push($data, $first);
            for ($i = 0; $i < 25; $i++) {
                $cerrentYear = $cerrentYear - 1;
                array_push($data, $cerrentYear);
                //  echo $cerrentYear;
                //  echo "<br>";
            }
        } else if ($type == 'month') {
            $data = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        } else if ($type == 'days') {
            $data = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"];
        } else if ($type == 'subjects') {


            if ($class == 'nursery') {
                $data = ["বাংলা", "ইংরেজি", "গণিত"];
            } elseif ($class == 'play' || $class == 'one' || $class == 'two') {
                $data = ["বাংলা", "ইংরেজি", "গণিত"];
            } elseif ($class == 'three' || $class == 'four' || $class == 'five') {
                $data = ["বাংলা", "ইংরেজি", "গণিত", "বাংলাদেশ ও বিশ্ব পরিচয়", "বিজ্ঞান", "ধর্ম"];
            } elseif ($class == 'six' || $class == 'seven' || $class == 'eight') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            }


            // elseif ($class == 'eight') {
            //     $data = ["বাংলা", "ইংরেজি", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            // }

            elseif ($class == 'nine' || $class == 'ten') {
                if ($group == 'science') {
                    $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "পদার্থবিজ্ঞান", "রসায়ন", "জীব বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "উচ্চতর গণিত", "তথ্য ও যোগাযোগ প্রযুক্তি"];
                } elseif ($group == 'humanities') {
                    $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "ভূগোল ও পরিবেশ", "অর্থনীতি", "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি"];
                } elseif ($group == 'commerce') {

                    $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
                } else {

                    $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
                }
            }
        } else if ($type == 'groups') {
            $data = ["Science", "Humanities"];
        } else if ($type == 'exams') {

            // $data = ["Weakly Examination", "ADMITION TEST RESULT", "First Terminals Examination", "Second Terminals Examination", "Annual Examination", "Test Examination"];


            // $data = ["Admission Result", "Half Yearly", "Annual Examination","Model Test","Pre-Test","Test"];
            $data = ex_name_list('en');



        } else if ($type == 'religions') {
            $data = ["Islam", "Hindu", "Other"];
        }

        return response()->json($data);
    }


    public function base64(Request $request)
    {
        return $b64image = 'data:image/jpg;base64,' . base64_encode(file_get_contents($request->url));
    }
}

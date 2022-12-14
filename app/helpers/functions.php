<?php

use App\Models\Sonod;
use App\Models\student;
use App\Models\Visitor;
use App\Models\Uniouninfo;
use App\Models\Sonodnamelist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;




function sitedetails()
{



    $count = DB::table('school_details')->where('school_id', '125983')->count();
    if ($count > 0) {
        return  $data = DB::table('school_details')->where('school_id', '125983')->first();

    } else {
        echo "
        <script>
            window.location.href = '/restricted'
        </script>

        ";
    }
}


function makeshorturl($url)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://uniontax.xyz/make/url?short_url=$url",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',

    ));

    return $response = curl_exec($curl);

    curl_close($curl);
}

function pushNotification($data)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: key=AAAA-EA0BlM:APA91bEjaymOOGtnp1u9K7RymKyswgYqkI390pCj2R63ritYAHWmYbdI5D9O9h7XB6G6ADa3Nk9sZg9SDCWkwreJnrvcjGGOEI6_euAbgHezKblGxD68_CJEZdLOhyfafJ0u4ZKxQD9D'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
}





function ekpayToken($trnx_id=123456789,$trns_info=[],$cust_info=[],$path='payment'){

    $Apiurl = env('AKPAY_API_URL');
    $url = env('AKPAY_IPN_URL');
    $whitelistip = env('WHITE_LIST_IP');
   $req_timestamp = date('Y-m-d H:i:s');




   $post = [
      'mer_info' => [
         "mer_reg_id" => env('AKPAY_MER_REG_ID'),
         "mer_pas_key" => env('AKPAY_MER_PASS_KEY')
      ],
      "req_timestamp" => "$req_timestamp GMT+6",
      "feed_uri" => [
         "c_uri" => url("$path/cancel"),
         "f_uri" => url("$path/fail"),
         "s_uri" => url("$path/success")
      ],
      "cust_info" => $cust_info,
      "trns_info" =>$trns_info,
      "ipn_info" => [
         "ipn_channel" => "3",
         "ipn_email" => "freelancernishad123@gmail.com",
         "ipn_uri" => "$url/api/ipn"
      ],
      "mac_addr" => "$whitelistip"
   ];

   // 148.163.122.80
   $post = json_encode($post);
   Log::info($post);

   $ch = curl_init($Apiurl.'/merchant-api');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
   $response = curl_exec($ch);
   curl_close($ch);

/*      echo '<pre>';
   print_r($response); */

   Log::info($response);
     $response = json_decode($response);
   $sToken =  $response->secure_token;


   return "$Apiurl?sToken=$sToken&trnsID=$trnx_id";

//  return    'https://sandbox.ekpay.gov.bd/ekpaypg/v1?sToken=eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJla3BheWNvcmUiLCJhdXRoIjoiUk9MRV9NRVJDSEFOVCIsImV4cCI6MTU0NTMyMjcxMn0.lqjBuvtqyUbhy4pteKa0IaqpjYQoEDjjnJWSFwcv0Ho2JJHN-8xqr8Q7r-tIJUy_dLajS2XbmrR6lBGrlGFYhQ&trnsID=1234'


//   return "https://sandbox.ekpay.gov.bd/ekpaypg/v1?sToken=$sToken&trnsID=$trnx_id";

}



    function BanglaSubToEnglish($banglaSubject)
    {
        $data = '';
        if($banglaSubject=='বাংলা ১ম'){
            $data = 'Bangla-I';
        }elseif($banglaSubject=='বাংলা ২য়'){
            $data = 'Bangla-II';
        }elseif($banglaSubject=='ইংরেজি ১ম'){
            $data = 'English-I';
        }elseif($banglaSubject=='ইংরেজি ২য়'){
            $data = 'English-II';
        }elseif($banglaSubject=='গণিত'){
            $data = 'Mathematics';
        }elseif($banglaSubject=='বিজ্ঞান'){
            $data = 'Science';
        }elseif($banglaSubject=='পদার্থবিজ্ঞান'){
            $data = 'Physics';
        }elseif($banglaSubject=='রসায়ন'){
            $data = 'Chemistry';
        }elseif($banglaSubject=='জীব বিজ্ঞান'){
            $data = 'Biology';
        }elseif($banglaSubject=='বাংলাদেশ ও বিশ্ব পরিচয়'){
            $data = 'Bangladesh and Global Studies';
        }elseif($banglaSubject=='ভূগোল ও পরিবেশ'){
            $data = 'Geography and environment';
        }elseif($banglaSubject=='অর্থনীতি'){
            $data = 'Economics';
        }elseif($banglaSubject=='বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস'){
            $data = 'History and world civilization of bangladesh';
        }elseif($banglaSubject=='ধর্ম ও নৈতিক শিক্ষা'){
            $data = 'Religion and moral education';
        }elseif($banglaSubject=='কৃষি শিক্ষা'){
            $data = 'Agricultural Education';
        }elseif($banglaSubject=='উচ্চতর গণিত'){
            $data = 'Higher Mathematics';
        }elseif($banglaSubject=='তথ্য ও যোগাযোগ প্রযুক্তি'){
            $data = 'Information and Communication Technology';
        }

        return $data;
    }




function subjectCol($subject)
    {
        if($subject=='ইংরেজি'){
            return 'English_1st';
        }else if($subject=='বাংলা'){
            return 'Bangla_1st';
        }else if($subject=='জীব বিজ্ঞান'){
            return 'Biology';
        }else if($subject=='পদার্থবিজ্ঞান'){
            return 'physics';
        }else if($subject=='উচ্চতর গণিত'){
            return 'Higher_Mathematics';
        }else{

            $orginal = array("বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান","পদার্থবিজ্ঞান", "রসায়ন", "জীব বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়","ভূগোল ও পরিবেশ", "অর্থনীতি", "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস", "ধর্ম ও নৈতিক শিক্ষা","ইসলাম-ধর্ম","হিন্দু-ধর্ম", "কৃষি শিক্ষা", "উচ্চতর গণিত", "তথ্য ও যোগাযোগ প্রযুক্তি");

            $colname = array("Bangla_1st","Bangla_2nd","English_1st","English_2nd","Math","Science","physics","Chemistry","Biology","B_and_B","vugol","orthoniti","itihas","Religion","ReligionIslam","ReligionHindu","Agriculture","Higher_Mathematics","ICT","Physical_Education_and_Health","Arts_and_Crafts","Work_and_life_oriented_education","Career_Education");


            // $orginal = array("বাংলা ১ম","বাংলা ২য়","ইংলিশ ১ম","ইংলিশ ২য়","গনিত","বিজ্ঞান","পদার্থ","রসায়ন","ভূগোল","অর্থনীতি","ইতিহাস","বাংলাদেশ ও বিশ্ব পরিচয়","ধর্ম","ইসলাম-ধর্ম","হিন্দু-ধর্ম","কৃষি","তথ্য ও যোগাযোগ প্রযোক্তি");
            // $colname = array("Bangla_1st","Bangla_2nd","English_1st","English_2nd","Math","Science","physics","Chemistry","vugol","orthoniti","itihas","B_and_B","Religion","ReligionIslam","ReligionHindu","Agriculture","ICT");


            return str_replace($orginal, $colname, $subject);
        }
    }




function int_en_to_bn($number)
{

    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    return str_replace($en_digits, $bn_digits, $number);
}
function int_bn_to_en($number)
{

    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    return str_replace($bn_digits, $en_digits, $number);
}

function class_en_to_bn($class)
{

    $bn = array('শিশু শ্রেণি', 'নার্সারি', 'প্রথম শ্রেণি', 'দ্বিতীয় শ্রেণি', 'তৃতীয় শ্রেণী', 'চতুর্থ শ্রেণী', 'পঞ্চম শ্রেণী', 'ষষ্ঠ শ্রেণী', 'সপ্তম শ্রেণী', 'অষ্টম শ্রেণী', 'নবম শ্রেণী', 'দশম শ্রেণী');
    $en = array('Play', 'Nursery', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten');

    return str_replace($en, $bn, $class);
}

function month_en_to_bn($month)
{

    $bn_month = array('জানুয়ারি', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
    $en_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');


    return str_replace($en_month, $bn_month, $month);
}

function month_to_number($month)
{
    $monthName = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $monthNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
    return str_replace($monthName, $monthNumber, $month);
}

function day_en_to_bn($day)
{

    $bn_month = array('শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার ', 'শুক্রবার');
    $en_month = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');


    return str_replace($en_month, $bn_month, $day);
}







function numberTowords($num)
{
    $ones = array(
        0 => "ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
    );
    $tens = array(
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY",
        4 => "FORTY",
        5 => "FIFTY",
        6 => "SIXTY",
        7 => "SEVENTY",
        8 => "EIGHTY",
        9 => "NINETY"
    );
    $hundreds = array(
        "HUNDRED",
        "THOUSAND",
        "MILLION",
        "BILLION",
        "TRILLION",
        "QUARDRILLION"
    ); /*limit t quadrillion */
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr, 1);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {

        while (substr($i, 0, 1) == "0")
            $i = substr($i, 1, 5);
        if ($i < 20) {
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
            if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
        } else {
            if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
            if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    return $rettxt;
}


//translate


// function sessionFlush()
// {
//     Session::forget('source');
//     Session::forget('target');
// }

// function setTarget($target)
// {
//     Session::put('target', $target);
// }

// function setSource($source)
// {
//     Session::put('source', $source);
// }

// function translateText($text)
// {
//     $src = Session::get('source');
//     $target = Session::get('target');
//     if ($target == '' || $target == null) return $text;
//     if ($src == '' || $src == null) {
//         $src = env('BaseLanguage');
//         Session::put('source', env('BaseLanguage'));
//     }
//     if ($src == $target) return $text;
//     else {
//         $translation = TranslateText::translate($src, $target, $text);
//         return $translation;
//     }
// }




function filterarray($arryvalue)
{
    return ($arryvalue->stu_id == 2206033);
}
function attendancemonthCheck($cutentdate, $class, $StudentID)
{



    $months = date("F", strtotime($cutentdate));


    $wh = [
        'month' => $months,
        'student_class' => $class,
        'date' => $cutentdate,
    ];

    $attendancescount = DB::table('attendances')->where($wh)->count();
    if ($attendancescount > 0) {
        $attendances = DB::table('attendances')->where($wh)->get();
        $attendance = json_decode($attendances[0]->attendance);
        $attendance = array_filter($attendance, function ($attendances) use ($StudentID) {
            return ($attendances->stu_id == $StudentID);
        });


        foreach ($attendance as $rr) {

            if ($rr->stu_id == $StudentID) {
                if ($rr->attendence == 'Present') {

                    return  $td =  '<td><i class="fas fa-check text-success"></i>  </td>';
                } else if ($rr->attendence == 'Absent') {
                    $attendace = 'fas fa-times text-danger';
                    // return '<td>'.$rr->stu_id.'-'.$StudentID.'</td>';
                    return  $td =  '<td><i class="fas fa-times text-danger"></i></td>';
                } else {
                    return  $td = '<td>-</td>';
                }
            } else {
                return  $td = '<td>-</td>';
            }
            // return  $td;

            // return filterarray($$rr->stu_id,$StudentID);
            //  if ($rr->stu_id == $StudentID) {
            //     return $StudentID.'true';
            // }else{
            //     return $StudentID.'false';
            // }

            //return $type;


        }
    } else {
        // return 'dont have';
    }
}


function attendancemonth($cutentdate, $class, $StudentID, $tt, $school_id)
{

    // $school_id = sitedetails()->school_id;

    $months = date("F", strtotime($cutentdate));


    $wh = [
        'month' => $months,
        'student_class' => $class,
        'date' => $cutentdate,
        'school_id' => $school_id
    ];


    $attendancescount = DB::table('attendances')->where($wh)->count();
    if ($attendancescount > 0) {
        $attendances = DB::table('attendances')->where($wh)->get();
        $attendance = json_decode($attendances[0]->attendance);

        foreach ($attendance as $rr) {

            if ($rr->stu_id == $StudentID) {
                if ($rr->attendence == 'Present') {
                    if ($tt == 'pdf') {
                        $td =  '<td><img width="20px" src="https://static.vecteezy.com/system/resources/previews/001/200/261/large_2x/check-png.png" /> </td>';
                    } else {

                        $td =  '<td><i class="fas fa-check text-success"></i> </td>';
                    }
                } else if ($rr->attendence == 'Absent') {
                    // $attendace = 'fas fa-times text-danger';
                    // return '<td>'.$rr->stu_id.'-'.$StudentID.'</td>';

                    if ($tt == 'pdf') {
                        $td =  '<td><img width="20px" src="https://www.mycryptons.com/img/delete-icon.png" /> </td>';
                    } else {

                        $td =  '<td><i class="fas fa-times text-danger"></i></td>';
                    }
                } else {
                    $td = '<td>-</td>';
                }
                return  $td;
            }
        }
    } else {
        return '<td>-</td>';
    }
}




function visitor()
{
    $ip =  $_SERVER['REMOTE_ADDR'];

    $visitorWhere = [
        'ip' => $ip,
        'date' => date('d-m-Y'),
    ];

    $Visitor = Visitor::where($visitorWhere)->count();
    if ($Visitor > 0) {
    } else {

        $datainsert = [
            'ip' => $ip,
            'date' => date('d-m-Y'),
            'month' => date('F'),
            'year' => date('Y'),
        ];
        Visitor::create($datainsert);
    }
}





function sent_response($message, $data = [])
{
    $response = [
        'status' => true,
        'message' => $message,
        'data' => $data,
    ];
    return response()->json([$response]);
}

function sent_error($message, $messages = [], $code = 404)
{
    $response = [
        'status' => false,
        'message' => $message,
        'code' => $code
    ];
    !empty($messages) ? $response['errors'] = $messages : null;


    return response()->json(['response' => $response], $code);
}

function feesconvert($text)
{


    if ($text == 'Monthly_fee') {
        $result = 'মাসিক বেতন';
    } elseif ($text == 'মাসিক বেতন') {
        $result = 'Monthly_fee';
    } else
if ($text == 'Session_fee') {
        $result = 'সেশন ফি';
    } elseif ($text == 'সেশন ফি') {
        $result = 'Session_fee';
    } else
if ($text == 'Exam_fee') {
        $result = 'পরিক্ষার ফি';
    } elseif ($text == 'পরিক্ষার ফি') {
        $result = 'Exam_fee';
    } else
if ($text == 'Other') {
        $result = 'অন্যান্য';
    } elseif ($text == 'অন্যান্য') {
        $result = 'Other';
    }
    return $result;
}



function allList($type = '', $class = '', $group = '')
{
    $type = strtolower($type);
    $class = strtolower($class);
   $group = strtolower($group);
    $data = [];
    if ($type == 'year') {


        //year list
        $data = [];
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
        } elseif ($class == 'three' || $class == 'four' || $class == 'five') {
            $data = ["বাংলা", "ইংরেজি", "গণিত", "বাংলাদেশ ও বিশ্ব পরিচয়", "বিজ্ঞান", "ধর্ম"];
        } elseif ($class == 'six' || $class == 'seven' ) {
            $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা"];
        } elseif ($class == 'eight') {
            $data = ["বাংলা", "ইংরেজি", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা"];
        }elseif ($class == 'nine' || $class == 'ten') {
            if ($group == 'science') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "পদার্থবিজ্ঞান", "রসায়ন", "জীব বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা", "উচ্চতর গণিত"];
            } elseif ($group == 'humanities') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "ভূগোল ও পরিবেশ", "অর্থনীতি", "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস", "ধর্ম ও নৈতিক শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা"];
            } elseif ($group == 'commerce') {

                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা"];
            } else {

                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "তথ্য ও যোগাযোগ প্রযুক্তি", "কৃষি শিক্ষা"];
            }
        }


    } else if ($type == 'groups') {
        $data = ["Science", "Humanities", "Commerce"];
    } else if ($type == 'exams') {
        $data = ["Weakly Examination", "ADMITION TEST RESULT", "First Terminals Examination", "Second Terminals Examination", "Annual Examination", "Test Examination"];
    } else if ($type == 'religions') {
        $data = ["Islam", "Hindu", "Other"];
    }

    return $data;
}



function resultSub($class = '', $group = '')
{

    $class = strtolower($class);
   $group = strtolower($group);
    $data = [];



        if ($class == 'nursery') {
            $data = ["বাংলা", "ইংরেজি", "গণিত"];
        } elseif ($class == 'play' || $class == 'one' || $class == 'two') {
            $data = ["বাংলা", "ইংরেজি", "গণিত"];
        } elseif ($class == 'three' || $class == 'four' || $class == 'five') {
            $data = ["বাংলা", "ইংরেজি", "গণিত", "বাংলাদেশ ও বিশ্ব পরিচয়", "বিজ্ঞান", "ধর্ম"];
        } elseif ($class == 'six' || $class == 'seven' || $class == 'eight') {
            $data = ["বাংলা", "ইংরেজি", "গণিত", "বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি"];
        } elseif ($class == 'nine' || $class == 'ten') {
            if ($group == 'science') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "পদার্থবিজ্ঞান", "রসায়ন", "জীব বিজ্ঞান", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "উচ্চতর গণিত", "তথ্য ও যোগাযোগ প্রযুক্তি","শারীরিক শিক্ষা ও স্বাস্থ্য","চারু ও কারুকলা","ক্যারিয়ার শিক্ষা"];
            } elseif ($group == 'humanities') {
                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "ভূগোল ও পরিবেশ", "অর্থনীতি", "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস", "ধর্ম ও নৈতিক শিক্ষা", "কৃষি শিক্ষা", "তথ্য ও যোগাযোগ প্রযুক্তি","শারীরিক শিক্ষা ও স্বাস্থ্য","চারু ও কারুকলা","ক্যারিয়ার শিক্ষা"];
            } elseif ($group == 'commerce') {

                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            } else {

                $data = ["বাংলা ১ম", "বাংলা ২য়", "ইংরেজি ১ম", "ইংরেজি ২য়", "গণিত", "বিজ্ঞান", "পদার্থ", "রসায়ন", "জীব-বিজ্ঞান", "ভূগোল", "অর্থনীতি", "ইতিহাস", "বাংলাদেশ ও বিশ্ব পরিচয়", "ধর্ম", "কৃষি", "তথ্য ও যোগাযোগ প্রযুক্তি"];
            }
        }



    return $data;
}




function base642($Image)
{
    $url = $Image;
    $image = file_get_contents($url);
    if ($image !== false) {
        return 'data:image/jpg;base64,' . base64_encode($image);
    }
}

function base64($Image)
{
    //  return $Image;

    if (File::exists(env('FILE_PATH') . $Image)) {

        $Image = env('FILE_PATH') . $Image;
    } else {
        $Image = env('FILE_PATH') . 'backend/image.png';
    }

    $ext =  pathinfo($Image, PATHINFO_EXTENSION);;
    return $b64image = "data:image/$ext;base64," . base64_encode(file_get_contents($Image));
}

function fileupload($Image, $path, $width = '', $height = '', $customname = '')
{
    // same file server
    if (!file_exists(env('FILE_PATH') . $path)) {
        File::makeDirectory(env('FILE_PATH') . $path, 0777, true, true);
    }

    $position = strpos($Image, ';');
    $sub = substr($Image, 0, $position);
    $ext = explode('/', $sub)[1];
    $random = rand(10000, 99999);
    if ($customname != '') {
        $name = time() . '____' . $customname . '.' . $ext;
    } else {
        $name = time() . '____' . $random . '.' . $ext;
    }
    $upload_path = $path;
    $image_url = $upload_path . $name;

    if ($width == '' && $height == '') {

        $img = Image::make($Image);
    } else {

        $img = Image::make($Image)->resize($width, $height);
    }



    $img->save(env('FILE_PATH') . $image_url);
    return $image_url;

    // separate file server
    // $url = env('FILE_SERVER');
    // $curl = curl_init($url);
    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_POST, true);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // // $headers = array(
    // //    "Content-Type: application/json",
    // // );
    // // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    // $data = ["files"=> $Image,'customname'=>$customname,'path'=>$path,'width'=>$width,'height'=>$height];
    // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // $resp = curl_exec($curl);
    // curl_close($curl);
    // return json_decode($resp);











}


function fileupload2($file, $path)
{


    $bases = explode('base64,',explode(';', $file)[1])[1];
    $base64_decode = base64_decode($bases);
    $base64 = time().'.' . explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];

    // $path = backend/notice/"backend/notice/";
    if (!file_exists(env('FILE_PATH') . $path)) {
        File::makeDirectory(env('FILE_PATH') . $path, 0777, true, true);
    }
    $destinationPath =env('FILE_PATH').$path. $base64;
    file_put_contents($destinationPath, $base64_decode);
    return $destinationPath;

}


function class_list()
{
    $result = ['Six', 'Seven', 'Eight', 'Nine', 'Ten'];
    return $result;
}













///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// echo     $apiKey  = API_KEY;

define("SERVER", "https://bulksms.brotherit.net");
define("API_KEY", "2668e548a3250c3e4126e2e2c830d2797084f918");
//  define("API_KEY", "$apiKey");


define("USE_SPECIFIED", 0);
define("USE_ALL_DEVICES", 1);
define("USE_ALL_SIMS", 2);

/**
 * @param string     $number      The mobile number where you want to send message.
 * @param string     $message     The message you want to send.
 * @param int|string $device      The ID of a device you want to use to send this message.
 * @param int        $schedule    Set it to timestamp when you want to send this message.
 * @param bool       $isMMS       Set it to true if you want to send MMS message instead of SMS.
 * @param string     $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
 * @param bool       $prioritize  Set it to true if you want to prioritize this message.
 *
 * @return array     Returns The array containing information about the message.
 * @throws Exception If there is an error while sending a message.
 */
function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null, $prioritize = false)
{
    $url = SERVER . "/services/send.php";
    $postData = array(
        'number' => $number,
        'message' => $message,
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => $device,
        'type' => $isMMS ? "mms" : "sms",
        'attachments' => $attachments,
        'prioritize' => $prioritize ? 1 : 0
    );
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param array  $messages        The array containing numbers and messages.
 * @param int    $option          Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
 *                                Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
 *                                Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
 * @param array  $devices         The array of ID of devices you want to use to send these messages.
 * @param int    $schedule        Set it to timestamp when you want to send these messages.
 * @param bool   $useRandomDevice Set it to true if you want to send messages using only one random device from selected devices.
 *
 * @return array     Returns The array containing messages.
 *                   For example :-
 *                   [
 *                      0 => [
 *                              "ID" => "1",
 *                              "number" => "+11234567890",
 *                              "message" => "This is a test message.",
 *                              "deviceID" => "1",
 *                              "simSlot" => "0",
 *                              "userID" => "1",
 *                              "status" => "Pending",
 *                              "type" => "sms",
 *                              "attachments" => null,
 *                              "sentDate" => "2018-10-20T00:00:00+02:00",
 *                              "deliveredDate" => null
 *                              "groupID" => ")V5LxqyBMEbQrl9*J$5bb4c03e8a07b7.62193871"
 *                           ]
 *                   ]
 * @throws Exception If there is an error while sending messages.
 */
function sendMessages($messages, $option = USE_SPECIFIED, $devices = [], $schedule = null, $useRandomDevice = true)
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'messages' => json_encode($messages),
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => json_encode($devices),
        'option' => $option,
        'useRandomDevice' => $useRandomDevice
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int    $listID      The ID of the contacts list where you want to send this message.
 * @param string $message     The message you want to send.
 * @param int    $option      Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
 *                            Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
 *                            Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
 * @param array  $devices     The array of ID of devices you want to use to send the message.
 * @param int    $schedule    Set it to timestamp when you want to send this message.
 * @param bool   $isMMS       Set it to true if you want to send MMS message instead of SMS.
 * @param string $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
 *
 * @return array     Returns The array containing messages.
 * @throws Exception If there is an error while sending messages.
 */
function sendMessageToContactsList($listID, $message, $option = USE_SPECIFIED, $devices = [], $schedule = null, $isMMS = false, $attachments = null)
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'listID' => $listID,
        'message' => $message,
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => json_encode($devices),
        'option' => $option,
        'type' => $isMMS ? "mms" : "sms",
        'attachments' => $attachments
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int $id The ID of a message you want to retrieve.
 *
 * @return array     The array containing a message.
 * @throws Exception If there is an error while getting a message.
 */
function getMessageByID($id)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param string $groupID The group ID of messages you want to retrieve.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while getting messages.
 */
function getMessagesByGroupID($groupID)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'groupId' => $groupID
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param string $status         The status of messages you want to retrieve.
 * @param int    $deviceID       The deviceID of the device which messages you want to retrieve.
 * @param int    $simSlot        Sim slot of the device which messages you want to retrieve. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int    $startTimestamp Search for messages sent or received after this time.
 * @param int    $endTimestamp   Search for messages sent or received before this time.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while getting messages.
 */
function getMessagesByStatus($status, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'status' => $status,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int $id The ID of a message you want to resend.
 *
 * @return array     The array containing a message.
 * @throws Exception If there is an error while resending a message.
 */
function resendMessageByID($id)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param string $groupID The group ID of messages you want to resend.
 * @param string $status  The status of messages you want to resend.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while resending messages.
 */
function resendMessagesByGroupID($groupID, $status = null)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'groupId' => $groupID,
        'status' => $status
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param string $status         The status of messages you want to resend.
 * @param int    $deviceID       The deviceID of the device which messages you want to resend.
 * @param int    $simSlot        Sim slot of the device which messages you want to resend. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int    $startTimestamp Resend messages sent or received after this time.
 * @param int    $endTimestamp   Resend messages sent or received before this time.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while resending messages.
 */
function resendMessagesByStatus($status, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'status' => $status,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int    $listID      The ID of the contacts list where you want to add this contact.
 * @param string $number      The mobile number of the contact.
 * @param string $name        The name of the contact.
 * @param bool   $resubscribe Set it to true if you want to resubscribe this contact if it already exists.
 *
 * @return array     The array containing a newly added contact.
 * @throws Exception If there is an error while adding a new contact.
 */
function addContact($listID, $number, $name = null, $resubscribe = false)
{
    $url = SERVER . "/services/manage-contacts.php";
    $postData = [
        'key' => API_KEY,
        'listID' => $listID,
        'number' => $number,
        'name' => $name,
        'resubscribe' => $resubscribe
    ];
    return sendRequest($url, $postData)["contact"];
}

/**
 * @param int    $listID The ID of the contacts list from which you want to unsubscribe this contact.
 * @param string $number The mobile number of the contact.
 *
 * @return array     The array containing the unsubscribed contact.
 * @throws Exception If there is an error while setting subscription to false.
 */
function unsubscribeContact($listID, $number)
{
    $url = SERVER . "/services/manage-contacts.php";
    $postData = [
        'key' => API_KEY,
        'listID' => $listID,
        'number' => $number,
        'unsubscribe' => true
    ];
    return sendRequest($url, $postData)["contact"];
}

/**
 * @return string    The amount of message credits left.
 * @throws Exception If there is an error while getting message credits.
 */
function getBalance()
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'key' => API_KEY
    ];
    $credits = sendRequest($url, $postData)["credits"];
    return is_null($credits) ? "Unlimited" : $credits;
}

/**
 * @param string $request   USSD request you want to execute. e.g. *150#
 * @param int $device       The ID of a device you want to use to send this message.
 * @param int|null $simSlot Sim you want to use for this USSD request. Similar to array index. 1st slot is 0 and 2nd is 1.
 *
 * @return array     The array containing details about USSD request that was sent.
 * @throws Exception If there is an error while sending a USSD request.
 */
function sendUssdRequest($request, $device, $simSlot = null)
{
    $url = SERVER . "/services/send-ussd-request.php";
    $postData = [
        'key' => API_KEY,
        'request' => $request,
        'device' => $device,
        'sim' => $simSlot
    ];
    return sendRequest($url, $postData)["request"];
}

/**
 * @param int $id The ID of a USSD request you want to retrieve.
 *
 * @return array     The array containing details about USSD request you requested.
 * @throws Exception If there is an error while getting a USSD request.
 */
function getUssdRequestByID($id)
{
    $url = SERVER . "/services/read-ussd-requests.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["requests"][0];
}

/**
 * @param string   $request        The request text you want to look for.
 * @param int      $deviceID       The deviceID of the device which USSD requests you want to retrieve.
 * @param int      $simSlot        Sim slot of the device which USSD requests you want to retrieve. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int|null $startTimestamp Search for USSD requests sent after this time.
 * @param int|null $endTimestamp   Search for USSD requests sent before this time.
 *
 * @return array     The array containing USSD requests.
 * @throws Exception If there is an error while getting USSD requests.
 */
function getUssdRequests($request, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/read-ussd-requests.php";
    $postData = [
        'key' => API_KEY,
        'request' => $request,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["requests"];
}

function sendRequest($url, $postData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    curl_close($ch);
    if ($httpCode == 200) {
        $json = json_decode($response, true);
        if ($json == false) {
            if (empty($response)) {
                throw new Exception("Missing data in request. Please provide all the required information to send messages.");
            } else {
                throw new Exception($response);
            }
        } else {
            if ($json["success"]) {
                return $json["data"];
            } else {
                throw new Exception($json["error"]["message"]);
            }
        }
    } else {
        throw new Exception("HTTP Error Code : {$httpCode}");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*

try {
    // Send a message using the primary device.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.");

    // Send a message using the Device ID 1.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94);

     // Send a prioritize message using Device ID 1 for purpose of sending OTP, message reply etc…
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94, null, false, null, true);

    // Send a MMS message with image using the Device ID 1.
    $attachments = "https://example.com/images/footer-logo.png,https://example.com/downloads/sms-gateway/images/section/create-chat-bot.png";
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94, null, true, $attachments);

    // Send a message using the SIM in slot 1 of Device ID 1 (Represented as "1|0").
    // SIM slot is an index so the index of the first SIM is 0 and the index of the second SIM is 1.
    // In this example, 1 represents Device ID and 0 represents SIM slot index.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", "94|1");

    // Send scheduled message using the primary device.
    $msg = sendSingleMessage("+8801909756552", "This is a test of schedule feature.", null, strtotime("+2 minutes"));
    print_r($msg);

    echo "Successfully sent a message.";
} catch (Exception $e) {
    echo $e->getMessage();
}
 */


//  $messages = array();

// for ($i = 1; $i <= 3; $i++) {
//     array_push($messages,
//         [
//             "number" => "+8801909756552",
//             "message" => "This is a test #{$i} of PHP version. Testing bulk message functionality."
//         ]);
// }

// try {
//     // Send messages using the primary device.
//     $msgs = sendMessages($messages);

// Send messages using default SIM of all available devices. Messages will be split between all devices.
//sendMessages($messages, USE_ALL_DEVICES);

// Send messages using all SIMs of all available devices. Messages will be split between all SIMs.
//sendMessages($messages, USE_ALL_SIMS);

// Send messages using only specified devices. Messages will be split between devices or SIMs you specified.
// If you send 12 messages using this code then 4 messages will be sent by Device ID 1, other 4 by SIM in slot 1 of
// Device ID 2 (Represendted as "2|0") and remaining 4 by SIM in slot 2 of Device ID 2 (Represendted as "2|1").
// sendMessages($messages, USE_SPECIFIED, [1, "2|0", "2|1"]);

// Send messages on schedule using the primary device.
// sendMessages($messages, null, null, strtotime("+2 minutes"));

// Send a message to contacts in contacts list with ID of 1.
//sendMessageToContactsList(1, "Test", USE_SPECIFIED, 1);

// Send a message on schedule to contacts in contacts list with ID of 1.
// sendMessageToContactsList(1, "Test", null, null, strtotime("+2 minutes"));

// Array of image links to attach to MMS message;
/*     $attachments = [
        "https://example.com/images/footer-logo.png",
        "https://example.com/downloads/sms-gateway/images/section/create-chat-bot.png"
    ];
    $attachments = implode(',', $attachments);

    $mmsMessages = [];
    for ($i = 1; $i <= 12; $i++) {
        array_push($mmsMessages,
            [
                "number" => "+11234567890",
                "message" => "This is a test #{$i} of PHP version. Testing bulk MMS message functionality.",
                "type" => "mms",
                "attachments" => $attachments
            ]);
    } */
// Send MMS messages using all SIMs of all available devices. Messages will be split between all SIMs.
// $msgs = sendMessages($mmsMessages, USE_ALL_SIMS);

//     print_r($msgs);

//     echo "Successfully sent bulk messages.";
// } catch (Exception $e) {
//     echo $e->getMessage();
// }


function smsSend($deccription = '', $applicant_mobile = '01909756552')
{

    $messages = array();
    array_push(
        $messages,
        [
            "number" => '88' . int_bn_to_en($applicant_mobile),
            "message" => "$deccription"
        ]
    );
    ///sms functions
    try {
        $msgs = sendMessages($messages,1);
    } catch (Exception $e) {
        array_push($responsemessege, $e->getMessage());
    }


}


function characterCount($string)
{
    // replace array below with proper Bengali stopwords
    $stopWords = array('i', 'a', 'about', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'com', 'de', 'en', 'for', 'from', 'how', 'in', 'is', 'it', 'la', 'of', 'on', 'or', 'that', 'the', 'this', 'to', 'was', 'what', 'when', 'where', 'who', 'will', 'with', 'und', 'the', 'www');

    $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
    $string = trim($string); // trim the string
    // remove this preg_replace because Bengali sybmols doesn't match this pattern
    // $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
    $string = strtolower($string); // make it lowercase

    preg_match_all('/\s.*?\s/i', $string, $matchWords);
    $matchWords = $matchWords[0];

    foreach ($matchWords as $key => $item) {
        if ($item == '' || in_array(strtolower(trim($item)), $stopWords) || strlen($item) <= 3) {
            unset($matchWords[$key]);
        }
    }
    $wordCountArr = array();
    if (is_array($matchWords)) {
        foreach ($matchWords as $key => $val) {
            $val = trim(strtolower($val));
            if (isset($wordCountArr[$val])) {
                $wordCountArr[$val]++;
            } else {
                $wordCountArr[$val] = 1;
            }
        }
    }
    arsort($wordCountArr);
    $wordCountArr = array_slice($wordCountArr, 0, 10);
    return $wordCountArr;
}

// $string = <<<EOF
// টিপ বোঝে না, টোপ বোঝে না টিপ বোঝে না, কেমন বাপু লোক
// EOF;
// var_dump(extractCommonWords($string), $string);




 function Greeting($mark,$total,$type)
{
    $greed = 'F';
    $point = '0.00';


    $Persent_33 = (33*$total)/100;
    $Persent_40 = (40*$total)/100;
    $Persent_50 = (50*$total)/100;
    $Persent_60 = (60*$total)/100;
    $Persent_70 = (70*$total)/100;
    $Persent_80 = (80*$total)/100;
    $Persent_101 = (101*$total)/100;



        if($mark<$Persent_33){
            $greed ='F';
            $point ='0.00';
        }elseif($mark<$Persent_40){
            $greed ='D';
            $point ='1.00';
        }
        elseif($mark<$Persent_50){
            $greed ='C';
            $point ='2.00';
        }
        elseif($mark<$Persent_60){
            $greed ='B';
            $point ='3.00';
        }
        elseif($mark<$Persent_70){
            $greed ='A-';
            $point ='3.50';
        }
        elseif($mark<$Persent_80){
            $greed ='A';
            $point ='4.00';
        }
        elseif($mark<$Persent_101){
            $greed ='A+';
            $point ='5.00';
        }





    if($type=='greed'){
        return $greed;
    }elseif($type=='point'){
        return $point;
    }



}
 function word_digit($word)
{
    $warr = explode(';', $word);
    $result = '';
    foreach ($warr as $value) {
        switch (trim($value)) {
            case 'Play':
                $result .= '0';
                break;
            case 'Nursery':
                $result .= '11';
                break;
            case 'One':
                $result .= '1';
                break;
            case 'Two':
                $result .= '2';
                break;
            case 'Three':
                $result .= '3';
                break;
            case 'Four':
                $result .= '4';
                break;
            case 'Five':
                $result .= '5';
                break;
            case 'Six':
                $result .= '6';
                break;
            case 'Seven':
                $result .= '7';
                break;
            case 'Eight':
                $result .= '8';
                break;
            case 'Nine':
                $result .= '9';
                break;
            case 'Ten':
                $result .= '10';
                break;
        }
    }
    return $result;
}

 function StudentAdmissionId($admition_id='',$school_id)
{
    $regYear = date("Y");
    $studentCount =  student::where(['school_id'=>$school_id,'Year'=>$regYear])->count();
    if($studentCount>0){
    $student =  student::where(['school_id'=>$school_id,'Year'=>$regYear])->orderBy('id','desc')->latest()->first();
    $admition_id = $student->AdmissionID;
    $mutiple = (rand(1, 9));
        if($admition_id=='' || $admition_id==null){
                $one = "0001";
                $year = date("y");
              return  $admition_ID = $school_id . $year . $one;
             }
             $admition_ID =  $admition_id;
             return $admition_ID += $mutiple;
        }else{
            $one = "0001";
            $year = date("y");
           return $admition_ID = $school_id . $year . $one;
        }
}

 function StudentId($class, $roll,$school_id,$StudentGroup='Humanities')
{
    $groupcode = 2;
    if($StudentGroup=='Science'){
        $groupcode=1;
    }elseif($StudentGroup=='Humanities'){
        $groupcode=2;
    }elseif($StudentGroup=='Commerce'){
        $groupcode=3;
    }
    $classidd = word_digit($class);
    $classid = str_pad($classidd, 2, '0', STR_PAD_LEFT);
    $yearid = date("y");
    $rollid = str_pad($roll, 3, '0', STR_PAD_LEFT);
    return $school_id . $yearid . $classid.$groupcode . $rollid;
}



function StudentFailedCount($results,$type='result')
{
    // return $results;


$class = $results->class;
$class_group = $results->class_group;
if($class=='Six' || $class=='Seven' || $class=='Eight'){
    $class_group = '';

}



$Fgg = 0;

    $subjects =  allList('subjects', $class, $class_group);
    $greating = [];
    $GPA = 0.00;
    $totalMark = 0;
    $i = 0;
    foreach ($subjects as $sub) {
        if (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Islam') {
            $sub_d = json_decode($results['ReligionIslam_d']);
            if ($sub_d) {
                $SUBJECT_TOTAL = $sub_d->SUBJECT_TOTAL;
                $CQ = $sub_d->CQ;
                $MCQ = $sub_d->MCQ;
                $EXTRA = $sub_d->EXTRA;
            } else {
                $SUBJECT_TOTAL = 100;
                $CQ = 0;
                $MCQ = 0;
                $EXTRA = 0;
            }
            $subMark = $results['ReligionIslam'];


        } elseif (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Hindu') {
            $sub_d = json_decode($results['ReligionHindu_d']);
            if ($sub_d) {
                $SUBJECT_TOTAL = $sub_d->SUBJECT_TOTAL;
                $CQ = $sub_d->CQ;
                $MCQ = $sub_d->MCQ;
                $EXTRA = $sub_d->EXTRA;
            } else {
                $SUBJECT_TOTAL = 100;
                $CQ = 0;
                $MCQ = 0;
                $EXTRA = 0;
            }
            $subMark = $results['ReligionHindu'];
        } else {
            $sub_d = json_decode($results[subjectCol($sub) . '_d']);
            //  print_r($sub_d);
            if ($sub_d) {
                $SUBJECT_TOTAL = $sub_d->SUBJECT_TOTAL;
                $CQ = $sub_d->CQ;
                $MCQ = $sub_d->MCQ;
                $EXTRA = $sub_d->EXTRA;
            } else {
                $SUBJECT_TOTAL = 100;
                $CQ = 0;
                $MCQ = 0;
                $EXTRA = 0;
            }
            $subMark = $results[subjectCol($sub)];
        }

        $totalMark +=$subMark;

        // print_r($sub.',');
        // print_r(Greeting($subMark,$SUBJECT_TOTAL,'point'));
        if ($class == "Six" || $class == "Seven") {
            if (subjectCol($sub) == 'Bangla_1st') {
                $sub_d1 = json_decode($results['Bangla_1st_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL1 = $sub_d1->SUBJECT_TOTAL;
                    $CQ1 = $sub_d1->CQ;
                    $MCQ1 = $sub_d1->MCQ;
                    $EXTRA1 = $sub_d1->EXTRA;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                    $CQ1 = 0;
                    $MCQ1 = 0;
                    $EXTRA1 = 0;
                }
                $subMark1 = $results['Bangla_1st'];
                $sub_d2 = json_decode($results['Bangla_2nd_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL2 = $sub_d2->SUBJECT_TOTAL;
                    $CQ2 = $sub_d2->CQ;
                    $MCQ2 = $sub_d2->MCQ;
                    $EXTRA2 = $sub_d2->EXTRA;
                } else {
                    $SUBJECT_TOTAL2 = 100;
                    $CQ2 = 0;
                    $MCQ2 = 0;
                    $EXTRA2 = 0;
                }
                $subMark2 = $results['Bangla_2nd'];
                //   return  $gg1 = Greeting($subMark1,$SUBJECT_TOTAL1,'point');
                //     $gg2 = Greeting($subMark2,$SUBJECT_TOTAL2,'point');
                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                $gg = Greeting($gg1, $ggTo, 'point');

                $CQ1great = Greeting($subMark1, $SUBJECT_TOTAL1, 'greed');
                $CQ2great = Greeting($subMark2, $SUBJECT_TOTAL2, 'greed');

                // array_push($greating,['Bangla_1stcq'=>$CQ1great]);
                // array_push($greating,['Bangla_1stmcq'=>$MCQ1great]);
                // array_push($greating,['Bangla_2ndcq'=>$CQ2great]);
                // array_push($greating,['Bangla_2ndmcq'=>$MCQ2great]);

                array_push($greating, $CQ1great);
                array_push($greating, $CQ2great);

            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $gg = 0;
            } elseif (subjectCol($sub) == 'English_1st') {
                $sub_d1 = json_decode($results['English_1st_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL1 = $sub_d1->SUBJECT_TOTAL;
                    $CQ1 = $sub_d1->CQ;
                    $MCQ1 = $sub_d1->MCQ;
                    $EXTRA1 = $sub_d1->EXTRA;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                    $CQ1 = 0;
                    $MCQ1 = 0;
                    $EXTRA1 = 0;
                }
                $subMark1 = $results['English_1st'];
                $sub_d2 = json_decode($results['English_2nd_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL2 = $sub_d2->SUBJECT_TOTAL;
                    $CQ2 = $sub_d2->CQ;
                    $MCQ2 = $sub_d2->MCQ;
                    $EXTRA2 = $sub_d2->EXTRA;
                } else {
                    $SUBJECT_TOTAL2 = 100;
                    $CQ2 = 0;
                    $MCQ2 = 0;
                    $EXTRA2 = 0;
                }
                $subMark2 = $results['English_2nd'];
                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                $gg = Greeting($gg1, $ggTo, 'point');
                $CQ1great = Greeting($CQ1, 100, 'greed');
                // $MCQ1great = Greeting($MCQ1,30,'greed');
                $CQ2great = Greeting($CQ2, 100, 'greed');
                // $MCQ2great = Greeting($MCQ2,20,'greed');
                // array_push($greating,[subjectCol($sub).'cq'=>$CQ1great]);
                // array_push($greating,[subjectCol($sub).'cq'=>$CQ2great]);
                array_push($greating, $CQ1great);
                array_push($greating, $CQ2great);
                // array_push($greating,$MCQ1great);
                // array_push($greating,$MCQ2great);
            } elseif (subjectCol($sub) == 'English_2nd') {
                $gg = 0;
            } else {
                $gg = Greeting($subMark, $SUBJECT_TOTAL, 'point');
                $great = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                array_push($greating, $great);
            }
            $GPA += $gg;
        } elseif ($class == "Eight") {
            if (subjectCol($sub) == 'Bangla_1st') {
                if (json_decode($results['Bangla_1st_d'])) {
                    $SUBJECT_TOTAL1 = json_decode($results['Bangla_1st_d'])->SUBJECT_TOTAL;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                }
                $subMark1 = $results['Bangla_1st'];
                $gg1 = Greeting($subMark1, $SUBJECT_TOTAL1, 'point');
                $gg = $gg1;
                $great = Greeting($subMark1, $SUBJECT_TOTAL1, 'greed');
            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $gg = 0;
            } elseif (subjectCol($sub) == 'English_1st') {
                if (json_decode($results['English_1st_d'])) {
                    $SUBJECT_TOTAL1 = json_decode($results['English_1st_d'])->SUBJECT_TOTAL;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                }
                $subMark1 = $results['English_1st'];
                $gg1 = Greeting($subMark1, $SUBJECT_TOTAL1, 'point');
                $gg = $gg1;
                // return  $greating;
            } elseif (subjectCol($sub) == 'English_2nd') {
                $gg = 0;
            } else {
                $gg = Greeting($subMark, $SUBJECT_TOTAL, 'point');
                $great = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                array_push($greating, $great);
            }
            $GPA += $gg;

            // $great = Greeting($subMark,$SUBJECT_TOTAL,'greed');
            // array_push($greating,[subjectCol($sub).'cq'=>$great]);
        } elseif ($class == "Nine" || $class == "Ten") {
            if (subjectCol($sub) == 'Bangla_1st') {
                $sub_d1 = json_decode($results['Bangla_1st_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL1 = $sub_d1->SUBJECT_TOTAL;
                    $CQ1 = $sub_d1->CQ;
                    $MCQ1 = $sub_d1->MCQ;
                    $EXTRA1 = $sub_d1->EXTRA;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                    $CQ1 = 0;
                    $MCQ1 = 0;
                    $EXTRA1 = 0;
                }
                $subMark1 = $results['Bangla_1st'];
                $sub_d2 = json_decode($results['Bangla_2nd_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL2 = $sub_d2->SUBJECT_TOTAL;
                    $CQ2 = $sub_d2->CQ;
                    $MCQ2 = $sub_d2->MCQ;
                    $EXTRA2 = $sub_d2->EXTRA;
                } else {
                    $SUBJECT_TOTAL2 = 100;
                    $CQ2 = 0;
                    $MCQ2 = 0;
                    $EXTRA2 = 0;
                }
                $subMark2 = $results['Bangla_2nd'];
                //   return  $gg1 = Greeting($subMark1,$SUBJECT_TOTAL1,'point');
                //     $gg2 = Greeting($subMark2,$SUBJECT_TOTAL2,'point');
                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                $gg = Greeting($gg1, $ggTo, 'point');
                $CQ1great = Greeting($CQ1, 70, 'greed');
                $MCQ1great = Greeting($MCQ1, 30, 'greed');
                $CQ2great = Greeting($CQ2, 70, 'greed');
                $MCQ2great = Greeting($MCQ2, 30, 'greed');
                // array_push($greating,['Bangla_1stcq'=>$CQ1great]);
                // array_push($greating,['Bangla_1stmcq'=>$MCQ1great]);
                // array_push($greating,['Bangla_2ndcq'=>$CQ2great]);
                // array_push($greating,['Bangla_2ndmcq'=>$MCQ2great]);
                array_push($greating, $CQ1great);
                array_push($greating, $MCQ1great);
                array_push($greating, $CQ2great);
                array_push($greating, $MCQ2great);
            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $gg = 0;
            } elseif (subjectCol($sub) == 'English_1st') {
                $sub_d1 = json_decode($results['English_1st_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL1 = $sub_d1->SUBJECT_TOTAL;
                    $CQ1 = $sub_d1->CQ;
                    $MCQ1 = $sub_d1->MCQ;
                    $EXTRA1 = $sub_d1->EXTRA;
                } else {
                    $SUBJECT_TOTAL1 = 100;
                    $CQ1 = 0;
                    $MCQ1 = 0;
                    $EXTRA1 = 0;
                }
                $subMark1 = $results['English_1st'];
                $sub_d2 = json_decode($results['English_2nd_d']);
                if ($sub_d) {
                    $SUBJECT_TOTAL2 = $sub_d2->SUBJECT_TOTAL;
                    $CQ2 = $sub_d2->CQ;
                    $MCQ2 = $sub_d2->MCQ;
                    $EXTRA2 = $sub_d2->EXTRA;
                } else {
                    $SUBJECT_TOTAL2 = 100;
                    $CQ2 = 0;
                    $MCQ2 = 0;
                    $EXTRA2 = 0;
                }
                $subMark2 = $results['English_2nd'];
                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                $gg = Greeting($gg1, $ggTo, 'point');
                $CQ1great = Greeting($CQ1, $SUBJECT_TOTAL1, 'greed');
                // $MCQ1great = Greeting($MCQ1,30,'greed');
                $CQ2great = Greeting($CQ2, $SUBJECT_TOTAL2, 'greed');
                // $MCQ2great = Greeting($MCQ2,20,'greed');
                // array_push($greating,[subjectCol($sub).'cq'=>$CQ1great]);
                // array_push($greating,[subjectCol($sub).'cq'=>$CQ2great]);
                array_push($greating, $CQ1great);
                array_push($greating, $CQ2great);
                // array_push($greating,$MCQ1great);
                // array_push($greating,$MCQ2great);
            } elseif (subjectCol($sub) == 'English_2nd') {
                $gg = 0;
            } elseif (subjectCol($sub) == 'Agriculture') {
                if ($results[subjectCol($sub)]) {
                    $Fgg += Greeting($subMark, $SUBJECT_TOTAL, 'point');
                    $gg = 0;
                } else {
                    $Fgg += 0;
                    $gg = 0;
                }
                array_push($greating, [subjectCol($sub) . 'cq' => 'Agree']);
                array_push($greating, [subjectCol($sub) . 'mcq' => 'Agree']);
            } elseif (subjectCol($sub) == 'Higher_Mathematics') {
                if ($results[subjectCol($sub)]) {
                    $Fgg += Greeting($subMark, $SUBJECT_TOTAL, 'point');
                    $gg = 0;
                } else {
                    $Fgg += 0;
                }
                array_push($greating, [subjectCol($sub) . 'cq' => 'higher']);
                array_push($greating, [subjectCol($sub) . 'mcq' => 'higher']);
            } elseif (subjectCol($sub) == 'ICT') {

                $CQgreat = Greeting($MCQ, 25, 'greed');


                array_push($greating, $CQgreat);

            } else {
                $gg = Greeting($subMark, $SUBJECT_TOTAL, 'point');
                if ($SUBJECT_TOTAL == 100) {


                    if(subjectCol($sub)=='Biology' || subjectCol($sub)=='physics' || subjectCol($sub)=='Higher_Mathematics' || subjectCol($sub)=='Agriculture' || subjectCol($sub)=='Chemistry'){
                        $CQTotal = 50;
                        $MCQTotal = 25;
                    }else{
                        $CQTotal = 70;
                        $MCQTotal = 30;
                    }



                } elseif ($SUBJECT_TOTAL == 50) {
                    $CQTotal = 30;
                    $MCQTotal = 20;
                } else {
                    $CQTotal = 70;
                    $MCQTotal = 30;
                }
                $CQgreat = Greeting($CQ, $CQTotal, 'greed');
                $MCQgreat = Greeting($MCQ, $MCQTotal, 'greed');
                // array_push($greating,[subjectCol($sub).'cq'=>$CQgreat]);
                // array_push($greating,[subjectCol($sub).'mcq'=>$MCQgreat]);
                array_push($greating, $CQgreat);
                array_push($greating, $MCQgreat);
            }
            $GPA += $gg;
            // $great = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
        }
        //  array_push($greating,$great);
        $i++;
    }
    //   return $Fgg;
    if ($Fgg > 2) {
        $fourthSub = $Fgg - 2;
    } else {
        $fourthSub = 0;
    }
    $finalTotalGpa =  $GPA + $fourthSub;
    $subDe = 0;
    if ($class == "Six" || $class == "Seven") {
        $subDe = $i - 2;
    } elseif ($class == "Eight") {
        $subDe = $i;
    } elseif ($class == "Nine" || $class == "Ten") {
        $subDe = $i - 4;
    }
    //    return $subDe;
    // return $greating;
$failedCount = 0;
foreach ($greating as  $value) {
    if($value=='F'){
        $failedCount +=1;
    }

}




    if (in_array('F', $greating)) {
        $GpaResult = 'F';
    } else {
        $GpaResult =  number_format((float)$finalTotalGpa / $subDe, 2, '.', '');
        if ($GpaResult > 5) {
            $GpaResult = number_format((float)5.00, 2, '.', '');
        }
    }




    if($type=='result'){

        return $GpaResult;
    }elseif($type=='failed'){
        return $failedCount;

    }elseif($type=='mark'){
        return $totalMark;

    }





}




function SubjectDetailsMark($results,$subjextName ='Bangla_1st',$type='all')
{

    // return $results[$subjextName];

    $sub_d = json_decode($results[$subjextName."_d"]);
    if ($sub_d) {
        $SUBJECT_TOTAL = $sub_d->SUBJECT_TOTAL;
        $CQ = $sub_d->CQ;
        $MCQ = $sub_d->MCQ;
        $EXTRA = $sub_d->EXTRA;
    } else {
        $SUBJECT_TOTAL = 100;
        $CQ = 0;
        $MCQ = 0;
        $EXTRA = 0;
    }
    $subMark = $results[$subjextName];

    $data = [
        'SUBJECT_TOTAL'=> $SUBJECT_TOTAL,
        'CQ'=> $CQ,
        'MCQ'=> $MCQ,
        'EXTRA'=> $EXTRA,
        'subMark'=> $subMark,
    ];

    if($type=='all'){
        return $data;
    }elseif($type=='mark'){
        return $subMark;
    }elseif($type=='total'){
        return $SUBJECT_TOTAL;
    }


}




function resultDetails($results,$type='ragular')
{

    $GpaResult = StudentFailedCount($results);
    $MarkResult = StudentFailedCount($results,'mark');

    $stu_id = $results->stu_id;
    $student = student::where('StudentID',$stu_id)->first();
    $class = $results->class;
    $class_group = $results->class_group;
    if($class=='Six' || $class=='Seven' || $class=='Eight'){
        $class_group='N/A';
    }


    $fontfammily = '';
    if($type=='pdf'){
        $fontfammily = 'font-family: cursive;';
    }


    $html  = "

    <table class='table table-striped table-bordered' style='$fontfammily' width='100%'>

    <tbody>
        <tr>
            <td>Roll No</td>
            <td>$results->roll</td>
            <td>Class</td>
            <td style='text-transform: uppercase;'>$class</td>

        </tr>

        <tr>
        <td>Student Id</td>
        <td>$results->stu_id</td>
            <td>Admission Id</td>
            <td>$student->AdmissionID</td>
        </tr>
        <tr>
            <td>Name of Student</td>
            <td style='text-transform: uppercase;' colspan='3'>$student->StudentNameEn</td>


        </tr>
        <tr>
            <td>Father's Name</td>
            <td colspan='3' style='text-transform: uppercase;'>$student->StudentFatherName</td>
        </tr>
        <tr>
            <td>Mother's Name</td>
            <td colspan='3' style='text-transform: uppercase;'>$student->StudentMotherName</td>
        </tr>
        <tr>
            <td>Exam Name</td>
            <td>$results->exam_name</td>
            <td>Year</td>
            <td>$results->year</td>
        </tr>
        <tr>
            <td>Group</td>
            <td>$class_group</td>
            <td>Type: REGULAR</td>
            <td>Gender: $student->StudentGender</td>
        </tr>
        <tr>
            <td>Result</td>
            <td>GPA=$GpaResult</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Next Class Roll</td>
            <td colspan='3'><span id='i_name'>1</span></td>
        </tr>

    </tbody>
</table>";

return $html;

}


function ResultGradeList($results,$type='ragular')
{
    $fontfammily = '';
    if($type=='pdf'){
        $fontfammily = 'font-family: cursive;';
    }
    $class = $results->class;
    $class_group = $results->class_group;
    $subjects =  allList('subjects', $class, $class_group);
    $html = " <table class='table table-striped table-bordered' style='margin-top:20px;$fontfammily' width='100%'    >

    <thead  class='btn-success' style='background-color: #28a745 !important;'>
    <tr >
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'>
                SUBJECT NAME
            </td>
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'> THEORY</td>
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'> MCQ</td>
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'> PRAC/CA</td>
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'> TOTAL</td>
        <td class='pl-5 pr-5 text-white' colspan='1' style='text-align:center'> GRADE</td>
    </tr>

    </thead>
<tbody>
    ";



    foreach ($subjects as $sub) {
        $html .= "<tr class='table-primar'  >";
        if ($class == "Six" || $class == "Seven") {
            if (subjectCol($sub) == 'Bangla_1st') {
                $html .= " <td class='pl-5 pr-5'>".BanglaSubToEnglish('বাংলা ১ম')." <br/>".BanglaSubToEnglish('বাংলা ২য়')."</td>";
            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $html .= '';
            } elseif (subjectCol($sub) == 'English_1st') {
                $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish('ইংরেজি ১ম')." <br/>".BanglaSubToEnglish('ইংরেজি ২য়')."</td>";
            } elseif (subjectCol($sub) == 'English_2nd') {
                $html .= '';
            } else {
                $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish($sub)."</td>";
            }
            if (subjectCol($sub) == 'Bangla_1st') {

                $mark1 =  SubjectDetailsMark($results, 'Bangla_1st', 'all');
                $SUBJECT_TOTAL1 = $mark1['SUBJECT_TOTAL'];

                $CQ1 = $mark1['CQ'];
                $MCQ1 = $mark1['MCQ'];
                $EXTRA1 = $mark1['EXTRA'];
                $subMark1 = $mark1['subMark'];


                $mark2 =  SubjectDetailsMark($results, 'Bangla_2nd', 'all');
                $SUBJECT_TOTAL2 = $mark2['SUBJECT_TOTAL'];
                $CQ2 = $mark2['CQ'];
                $MCQ2 = $mark2['MCQ'];
                $EXTRA2 = $mark2['EXTRA'];
                $subMark2 = $mark2['subMark'];



                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                $gg = Greeting($gg1, $ggTo, 'greed');




                $html .= "<td  style='text-align:center'><span>  $CQ1 <br/> $CQ2 </span></td>";


                $html .= "<td  style='text-align:center'><span>  $MCQ1 <br/> $MCQ2 </span></td>";
                $html .= "<td  style='text-align:center'><span>  $EXTRA1 <br/> $EXTRA2 </span></td>";

                $html .= "<td  style='text-align:center'><span> " . (int)$subMark1 + (int)$subMark2 . "</span></td>";
                $html .= "<td  style='text-align:center'><span> " . $gg . "</span></td>";
            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $html .= '';
            } elseif (subjectCol($sub) == 'English_1st') {
                $mark1 =  SubjectDetailsMark($results, 'English_1st', 'all');
                $SUBJECT_TOTAL1 = $mark1['SUBJECT_TOTAL'];
                $CQ1 = $mark1['CQ'];
                $MCQ1 = $mark1['MCQ'];
                $EXTRA1 = $mark1['EXTRA'];
                $subMark1 = $mark1['subMark'];
                $mark2 =  SubjectDetailsMark($results, 'English_2nd', 'all');
                $SUBJECT_TOTAL2 = $mark2['SUBJECT_TOTAL'];
                $CQ2 = $mark2['CQ'];
                $MCQ2 = $mark2['MCQ'];
                $EXTRA2 = $mark2['EXTRA'];
                $subMark2 = $mark2['subMark'];
                $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                $gg1 =  ($subMark1 + $subMark2) / 2;
                //   return   $gg = Greeting($gg1, $ggTo, 'point');
                $gg = Greeting($gg1, $ggTo, 'greed');

                $html .= "<td style='text-align:center'><span>  $CQ1 <br/> $CQ2 </span></td>";
                $html .= "<td style='text-align:center'><span>  $MCQ1 <br/> $MCQ2 </span></td>";
                $html .= "<td style='text-align:center'><span>  $EXTRA1 <br/> $EXTRA2 </span></td>";

                $html .= "<td style='text-align:center'><span> " . (int)$subMark1 + (int)$subMark2 . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $gg . "</span></td>";
            } elseif (subjectCol($sub) == 'English_2nd') {
                $html .= '';
            } else {



                if (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Islam') {
                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionIslam', 'total');

                    $mark =  SubjectDetailsMark($results, 'ReligionIslam', 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];

                    $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . Greeting($results['ReligionIslam'], $SUBJECT_TOTAL, 'greed') . "</span></td>";
                } elseif (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Hindu') {
                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionHindu', 'total');
                    $mark =  SubjectDetailsMark($results, 'ReligionHindu', 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];

                    $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . Greeting($results['ReligionHindu'], $SUBJECT_TOTAL, 'greed') . "</span></td>";
                } else {
                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, subjectCol($sub), 'total');
                    $mark =  SubjectDetailsMark($results, subjectCol($sub), 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];

                    $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center'><span> " . Greeting($results[subjectCol($sub)], $SUBJECT_TOTAL, 'greed') . "</span></td>";
                }





            }
        } elseif ($class == "Eight") {
            $html .= " <td class='pl-5 pr-5'> $sub</td>";

            if (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Islam') {
                $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionIslam', 'total');
                $mark =  SubjectDetailsMark($results, 'ReligionIslam', 'all');
                $CQ = $mark['CQ'];
                $MCQ = $mark['MCQ'];
                $EXTRA = $mark['EXTRA'];
                $subMark = $mark['subMark'];

                $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";


                $html .= "<td><span> " . Greeting($results['ReligionIslam'], $SUBJECT_TOTAL, 'greed') . "</span></td>";
            } elseif (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Hindu') {
                $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionHindu', 'total');

                $mark =  SubjectDetailsMark($results, 'ReligionHindu', 'all');
                $CQ = $mark['CQ'];
                $MCQ = $mark['MCQ'];
                $EXTRA = $mark['EXTRA'];
                $subMark = $mark['subMark'];

                $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";

                $html .= "<td><span> " . Greeting($results['ReligionHindu'], $SUBJECT_TOTAL, 'greed') . "</span></td>";
            } else {
                $SUBJECT_TOTAL =  SubjectDetailsMark($results, subjectCol($sub), 'total');

                $mark =  SubjectDetailsMark($results, subjectCol($sub), 'all');
                $CQ = $mark['CQ'];
                $MCQ = $mark['MCQ'];
                $EXTRA = $mark['EXTRA'];
                $subMark = $mark['subMark'];

                $html .= "<td style='text-align:center'><span> " . $CQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $MCQ . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $EXTRA . "</span></td>";
                $html .= "<td style='text-align:center'><span> " . $subMark . "</span></td>";

                $html .= "<td><span> " . Greeting($results[subjectCol($sub)], $SUBJECT_TOTAL, 'greed') . "</span></td>";
            }
        } elseif ($class == "Nine" || $class == "Ten") {
            if (subjectCol($sub) == 'Bangla_1st') {
                $html .= " <td class='pl-5 pr-5'>".BanglaSubToEnglish('বাংলা ১ম')." <br/>".BanglaSubToEnglish('বাংলা ২য়')."</td>";

            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $html .= '';
            } elseif (subjectCol($sub) == 'English_1st') {
                $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish('ইংরেজি ১ম')." <br/>".BanglaSubToEnglish('ইংরেজি ২য়')."</td>";

            } elseif (subjectCol($sub) == 'English_2nd') {
                $html .= '';
            } else {


                if (subjectCol($sub) == 'Agriculture') {
                    if ($results->Agriculture) {
                        $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish($sub)."</td>";

                    } else {
                        $html .= '';
                    }
                } elseif (subjectCol($sub) == 'Higher_Mathematics') {
                    if ($results->Higher_Mathematics) {
                        $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish($sub)."</td>";

                    } else {
                        $html .= '';
                    }
                } else {
                    $html .= " <td class='pl-5 pr-5'> ".BanglaSubToEnglish($sub)."</td>";

                }
            }


            if (subjectCol($sub) == 'Bangla_1st') {
                $mark1 =  SubjectDetailsMark($results, 'Bangla_1st', 'all');
                $SUBJECT_TOTAL1 = $mark1['SUBJECT_TOTAL'];
                $subMark1 = $mark1['subMark'];
                $CQ1 = $mark1['CQ'];
                $MCQ1 = $mark1['MCQ'];
                $EXTRA1 = $mark1['EXTRA'];
                $mark2 =  SubjectDetailsMark($results, 'Bangla_2nd', 'all');
                $SUBJECT_TOTAL2 = $mark2['SUBJECT_TOTAL'];
                $subMark2 = $mark2['subMark'];
                $CQ2 = $mark2['CQ'];
                $MCQ2 = $mark2['MCQ'];
                $EXTRA2 = $mark2['EXTRA'];


                $CQ1Grade = Greeting($CQ1, 70, 'greed');
                $MCQ1Grade = Greeting($MCQ1, 30, 'greed');

                $CQ2Grade = Greeting($CQ2, 70, 'greed');
                $MCQ2Grade = Greeting($MCQ2, 30, 'greed');

                $grade = [$CQ1Grade, $MCQ1Grade, $CQ2Grade, $MCQ2Grade];


                if (in_array('F', $grade)) {
                    $gg = 'F';
                } else {
                    $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                    $gg1 =  ($subMark1 + $subMark2) / 2;
                    $gg = Greeting($gg1, $ggTo, 'greed');
                }







                $html .= "<td style='text-align:center'><span> $CQ1 <br/> $CQ2 </span></td>";
                $html .= "<td style='text-align:center'><span>  $MCQ1 <br/> $MCQ2 </span></td>";
                $html .= "<td style='text-align:center'><span>  $EXTRA1 <br/> $EXTRA2 </span></td>";

                $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . (int)$subMark1 + (int)$subMark2 . "</span></td>";
                $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
            } elseif (subjectCol($sub) == 'Bangla_2nd') {
                $html .= '';
            } elseif (subjectCol($sub) == 'English_1st') {
                $mark1 =  SubjectDetailsMark($results, 'English_1st', 'all');
                $SUBJECT_TOTAL1 = $mark1['SUBJECT_TOTAL'];
                $subMark1 = $mark1['subMark'];
                $CQ1 = $mark1['CQ'];
                $MCQ1 = $mark1['MCQ'];
                $EXTRA1 = $mark1['EXTRA'];

                $mark2 =  SubjectDetailsMark($results, 'English_2nd', 'all');
                $SUBJECT_TOTAL2 = $mark2['SUBJECT_TOTAL'];
                $subMark2 = $mark2['subMark'];
                $CQ2 = $mark2['CQ'];
                $MCQ2 = $mark2['MCQ'];
                $EXTRA2 = $mark2['EXTRA'];




                $CQ1Grade = Greeting($CQ1, $SUBJECT_TOTAL1, 'greed');


                $CQ2Grade = Greeting($CQ2, $SUBJECT_TOTAL2, 'greed');


                $grade = [$CQ1Grade, $CQ2Grade];


                if (in_array('F', $grade)) {
                    $gg = 'F';
                } else {
                    $ggTo = ($SUBJECT_TOTAL1 + $SUBJECT_TOTAL2) / 2;
                    $gg1 =  ($subMark1 + $subMark2) / 2;
                    $gg = Greeting($gg1, $ggTo, 'greed');
                }
                $html .= "<td style='text-align:center'><span>$CQ1 <br/> $CQ2 </span></td>";
                $html .= "<td style='text-align:center'><span> $MCQ1 <br/> $MCQ2 </span></td>";
                $html .= "<td style='text-align:center'><span> $EXTRA1 <br/> $EXTRA2 </span></td>";
                $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . (int)$subMark1 + (int)$subMark2 . "</span></td>";
                $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
            } elseif (subjectCol($sub) == 'English_2nd') {
                $html .= '';
            } else {
                if (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Islam') {
                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionIslam', 'total');


                    $mark =  SubjectDetailsMark($results, 'ReligionIslam', 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];
                    $CQGrade = Greeting($CQ, 70, 'greed');
                    $MCQGrade = Greeting($MCQ, 30, 'greed');
                    $grade = [$CQGrade, $MCQGrade];
                    if (in_array('F', $grade)) {
                        $gg = 'F';
                    } else {
                        $gg = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                    }
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                } elseif (subjectCol($sub) == 'Religion' && $results->StudentReligion == 'Hindu') {



                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, 'ReligionHindu', 'total');
                    $mark =  SubjectDetailsMark($results, 'ReligionHindu', 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];
                    $CQGrade = Greeting($CQ, 70, 'greed');
                    $MCQGrade = Greeting($MCQ, 30, 'greed');
                    $grade = [$CQGrade, $MCQGrade];
                    if (in_array('F', $grade)) {
                        $gg = 'F';
                    } else {
                        $gg = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                    }
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                } elseif (subjectCol($sub) == 'ICT') {



                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, subjectCol($sub), 'total');
                    $mark =  SubjectDetailsMark($results, subjectCol($sub), 'all');

                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];

                    $MCQGrade = Greeting($MCQ, 25, 'greed');
                    $grade = [$MCQGrade];
                    if (in_array('F', $grade)) {
                        $gg = 'F';
                    } else {
                        $gg = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                    }
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                    $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                } else {








                    $SUBJECT_TOTAL =  SubjectDetailsMark($results, subjectCol($sub), 'total');
                    $CqTotal = 70;
                    $MCqTotal = 30;
                    if ($SUBJECT_TOTAL == 100) {
                        if (subjectCol($sub) == 'Biology' || subjectCol($sub) == 'physics' || subjectCol($sub) == 'Higher_Mathematics' || subjectCol($sub) == 'Agriculture' || subjectCol($sub) == 'Chemistry') {
                            $CqTotal = 50;
                            $MCqTotal = 25;
                        } else {
                            $CqTotal = 70;
                            $MCqTotal = 30;
                        }
                    } elseif ($SUBJECT_TOTAL == 50) {
                        $CqTotal = 30;
                        $MCqTotal = 20;
                    }


                    $mark =  SubjectDetailsMark($results, subjectCol($sub), 'all');
                    $CQ = $mark['CQ'];
                    $MCQ = $mark['MCQ'];
                    $EXTRA = $mark['EXTRA'];
                    $subMark = $mark['subMark'];
                    $CQGrade = Greeting($CQ, $CqTotal, 'greed');
                    $MCQGrade = Greeting($MCQ, $MCqTotal, 'greed');
                    $grade = [$CQGrade, $MCQGrade];
                    if (in_array('F', $grade)) {
                        $gg = 'F';
                    } else {
                        $gg = Greeting($subMark, $SUBJECT_TOTAL, 'greed');
                    }

                    if (subjectCol($sub) == 'Agriculture') {
                        if ($results->Agriculture) {
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                        } else {
                            $html .= '';
                        }
                    } elseif (subjectCol($sub) == 'Higher_Mathematics') {
                        if ($results->Higher_Mathematics) {
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                            $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                        } else {
                            $html .= '';
                        }
                    } else {
                        $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $CQ . "</span></td>";
                        $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $MCQ . "</span></td>";
                        $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $EXTRA . "</span></td>";
                        $html .= "<td style='text-align:center' class='pl-5 pr-5'><span> " . $subMark . "</span></td>";
                        $html .= "<td style='text-align:center' class='pl-5 pr-5'><span>" . $gg . "</span></td>";
                    }
                }
            }
        }
        $html .= "</tr>";
    }
    $html .= "
</tbody>
</table>
";

    return $html;
}




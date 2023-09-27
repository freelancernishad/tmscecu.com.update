<?php

namespace App\Http\Controllers;

use App\Models\TC;
use App\Models\payment;
use App\Models\school_detail;
use App\Models\SchoolFee;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Rakibhstu\Banglanumber\NumberToBangla;


class TCController extends Controller
{

    function index(Request $request){

        if($request->search){
                    $query = TC::where(['status' => 'active', 'paymentStatus' => 'Paid'])
        ->when($request->has('search'), function ($query) use ($request) {
            $searchTerm = $request->search;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('sl', $searchTerm)
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('fatherName', 'like', '%' . $searchTerm . '%')
                    ->orWhere('motherName', 'like', '%' . $searchTerm . '%')
                    ->orWhere('sscRoll', $searchTerm)
                    ->orWhere('sscGpa', $searchTerm)
                    ->orWhere('sscReg', $searchTerm);
            });
        })
        ->orderBy('id', 'desc')
        ->get();

        return $query;

        }else{

            return TC::where(['status'=>'active','paymentStatus'=>'Paid'])->orderBy('id','desc')->get();
        }




    }


    function tcSL(){
        $latestData = Tc::latest()->first();
        if($latestData){
            if($latestData->sl){
                return (int)$latestData->sl+1;

            }else{

                return "20230001";
            }
        }else{
            return "20230001";
        }
    }


    public function createTC(Request $request)
    {
            $studentId = $request->studentId;

            $student = student::find($studentId);

            $tcData = $request->all();


            $getTc = TC::where(['studentId'=>$studentId])->first();
            if($getTc){


                 $getTc->update($tcData);
                 $tc = $getTc;
            }else{
                $random = Str::random(40);
                $tcData['token'] = $random;
                // $tcData['academic_year'] = '2021-2022';
                $tcData['status'] = 'Pending';
                $tcData['paymentStatus'] = 'Unpaid';
                $tcData['sl'] = $this->tcSL();


                $tc = TC::create($tcData);
            }








            $studentUpdateData = [
                'StudentDateOfBirth'=>$request->dateOfBirth,
                'StudentFatherNameBn'=>$request->fatherName,
                'StudentMotherNameBn'=>$request->motherName,
                'division'=>$request->division,
                'district'=>$request->district,
                'upazila'=>$request->upazila,
                'union'=>$request->union,
                'post_office'=>$request->post_office,
                'StudentAddress'=>$request->StudentAddress,
            ];
            $student->update($studentUpdateData);






            $studentMobile = '01909756552';
            if($student->StudentPhoneNumber){

                $studentMobile = int_bn_to_en($student->StudentPhoneNumber);
            }

            $fees = SchoolFee::where(['class'=>'Ten','type'=>'letter_of_appreciation'])->first();
            if($fees){
                $amount = $fees->fees;
            }else{
                $amount = 250;
            }


            $trnx_id = time().rand(1,50);
        $cust_info = [
            "cust_email" => "",
            "cust_id" => "$studentId",
            "cust_mail_addr" => "Address",
            "cust_mobo_no" => "$studentMobile",
            "cust_name" => "Customer Name"
        ];
        $trns_info = [
            "ord_det" => 'TC',
            "ord_id" => $student->AdmissionID,
            "trnx_amt" => $amount,
            "trnx_currency" => "BDT",
            "trnx_id" => "$trnx_id"
        ];
        $redirectutl = ekpayToken($trnx_id, $trns_info, $cust_info);

        $Insertdata = [
            'trxid' => $trnx_id,
            'school_id' => $student->school_id,
            'studentClass' => $student->StudentClass,
            'studentRoll' => $student->StudentRoll,
            'studentId' => $studentId,
            'admissionId' => $student->AdmissionID,
            'Name' => $student->StudentName,
            'method' => '',
            'amount' =>$amount,
            'type' => 'TC',
            'ex_name' => '',
            'paymentUrl' => $redirectutl,
            'date' => date("Y-m-d"),
            'year' => date('Y'),
            'status' => 'Pending',
        ];
        $Insertdata['month'] =  date('F');
        payment::create($Insertdata);
        return $redirectutl;
        return redirect($redirectutl);

    }

    public function getTC($id)
    {
        try {
            $tc = TC::findOrFail($id);
            return response()->json($tc);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch TC entry.'], 500);
        }
    }

    function tc($token){



        $tc = TC::where(['token'=>$token,'status'=>'active','paymentStatus'=>'Paid'])->first();


        if($tc){
            $student = student::find($tc->studentId);
            $pdfFileName = 'tc.pdf';
            return PdfMaker('A4-L',$student->school_id,$this->tcCard($tc,$student->school_id),$pdfFileName,true,'alpha="0.15" size="100,100" position="97,65"');
        }else{
            return "Data Not Found";
        }

    }

    public function tcCard($tc,$school_id)
    {


        $school_details = school_detail::where('school_id',$school_id)->first();


        $qrurl = url("/student/tc/$tc->token");

        // $qrurl = url("/verification/sonod/$row->id");
        //in Controller

        // $qrcode = \QrCode::size(70)
        //     ->format('svg')
        //     ->generate($qrurl);
        //     $qrcode = str_replace('<?xml version="1.0" encoding="UTF-8"', '', $qrcode);



              $qrcode = "<img src='https://chart.apis.google.com/chart?cht=qr&chl=$qrurl&chs=130'/>";



            $releaseDate =  int_en_to_bn(date("d/m/Y", strtotime($tc->created_at)));

            $dateOfBirth =  int_en_to_bn(date("d/m/Y", strtotime($tc->dateOfBirth)));




            $numto = new NumberToBangla();

            $dateOfBirth_date =   $numto->bnWord(date("d", strtotime($tc->dateOfBirth)));
            $dateOfBirth_month =  $numto->bnMonth(date("m", strtotime($tc->dateOfBirth)));
            $dateOfBirth_year =  YearConvert($numto->bnWord(date("Y", strtotime($tc->dateOfBirth))));


            $group = $tc->group;
            $groupName = 'মানবিক';
            if($group=='Humanities'){
                $groupName = 'মানবিক';
            }else if($group=='Science'){
                $groupName = 'বিজ্ঞান';
            }



            $group = $tc->student_type;
            $typeName = 'নিয়মিত';
            if($group=='regular'){
                $typeName = 'নিয়মিত';
            }else{
                $typeName = 'অনিয়মিত';
            }




        $html = '';
        $html="
        <!DOCTYPE HTML>
<html lang='en-US'>
<head>
<meta charset='UTF-8'>
<title>tc.pdf</title>
<style>
@page {
    margin: 25px;
    margin-top:30px;
   }
    *{
        margin: 0;
        padding: 0;
    }


    .mainborder1{
        max-width: 250px;
        padding: 1.5rem;
        position: relative;
        background: url(".base64($school_details->logo).");
        background-size:26.41px;
        padding: 3px;
    }
    .mainborder2{

        background:white;
        margin:6px;



    }

    .rootContainer {
        margin: 5px;
        border: 1px solid;
        padding: 5px 21px;
    }
    .tableTag, .tableTag td, .tableTag th {
    border: 1px solid #6c6c6c;
    border-collapse: collapse;
    padding: 3px 7px;
    font-size:14px;
    }
    td.tableRowHead {
        background: #e9e9e9;
        color: black !important;
        font-size:14px;
    }
    .fontsize1{
        font-size:20px;
    }
    .fontsize2{
        font-size:40px;
    }
    .copyTitle{
        font-size:23px;
        color:#3E4D5B;
    }

    .examNameHead{
        width:200px;
        text-align:center;
        margin:0 auto;
    }

    .examNamePara{
        border:1px solid #160089;
        background:#160089;
        color:white;
        font-size:20px;
        padding:5px 10px;
        margin:0px;
    }

    .sileColor{
        color:black;
        z-index:-1;
        font-size:19px !important;
    }

</style>
</head>
<body>

<div class='mainborder1'>
<div class='mainborder2'>
<table width='70%' style='margin:0 auto;margin-top:10px'>
<tr>
    <td width='110px'>
        <img width='100px'  style='overflow:hidden;float:right' src='".base64($school_details->logo)."' alt=''>
    </td>
    <td style='text-align:center'>
        <p class='fontsize2'>$school_details->SCHOLL_NAME</p>
        <p class='fontsize1'>ডাকঘর- টেপ্রীগঞ্জ, উপজেলা- দেবীগঞ্জ, জেলা- পঞ্চগড়</p>
        <p class='fontsize1'>স্থাপিতঃ ১৯৬৫ইং , <span style='font-size:14px'> MPO Code 7903061301</span> ,  <span style='font-size:14px'> EIIN No 125983</span> </p>
        <p class='fontsize1' style='font-size:12px'>website: www.tepriganjhighschool.edu.bd </p>
    </td>
    <td style='text-align: right'>
    <div class='imgdiv'>

    </div>
    </td>
</tr>
</table>





<main>
<div style='text-align: center;margin: 10px 0px;'>
    <p
        style='background: #029525; color: white; font-size: 31px; text-align: center; padding: 6px 12px; border-radius: 5px; font-weight: 500;width:250px; margin:0 auto;'>
        প্রশংসা পত্র
    </p>
</div>

    <table width='95%' style='margin:20px auto'>
        <tr>
            <td><p>ক্রমিক নং : $tc->sl</p></td>
            <td style='text-align:right'><p>তারিখ : $releaseDate ইং</p></td>
        </tr>
    </table>


<div style='margin: 0 20px;'>


</div>

<div style='margin: 0 12px;'>
    <div style='line-height: 30px; font-size:25px;text-align:justify'>
        <div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; এই মর্মে প্রত্যয়ন করা যাইতেছে যে - $tc->name,
            পিতা - $tc->fatherName, মাতা - $tc->motherName, গ্রাম - $tc->StudentAddress, ডাকঘর - $tc->post_office, উপজেলা - $tc->upazila, জেলা - $tc->district । সে অত্র বিদ্যালয়ের ".int_en_to_bn($tc->academic_year)." শিক্ষাবর্ষের একজন $typeName শিক্ষার্থী ছিল এবং মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড, দিনাজপুর কর্তৃক গৃহীত ".int_en_to_bn($tc->year)."ইং সালের মাধ্যমিক স্কুল সার্টিফিকেট পরীক্ষায় $groupName বিভাগ হইতে <span style='font-size:14px'>GPA</span> ".int_en_to_bn($tc->sscGpa)." অর্জন করিয়া কৃতকার্য হইয়াছে। উক্ত পরীক্ষায় তাহার রোল নম্বর - ".int_en_to_bn($tc->sscRoll).", রেজিষ্ট্রেশন নং - ".int_en_to_bn($tc->sscReg)." এবং জন্ম তারিখ - $dateOfBirth (কথায়) $dateOfBirth_date $dateOfBirth_month $dateOfBirth_year ।
        </div>
        <div style='margin-top: 15px;'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; আমার জানামতে সে উন্নত চরিত্রের অধিকারী এবং অত্র প্রতিষ্ঠানে অধ্যয়নকালে রাষ্ট্র বা শৃঙ্খলা পরিপন্থী কার্যকলাপে জড়িত ছিল না। <br />
            <div style='margin-top: 10px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;আমি তাহার সর্বাঙ্গীন উন্নতি কামনা করি।  </div>
        </div>
    </div>
</main>




    <table width='100%' style='margin-top:60px;margin-bottom:15px'>
        <tr>
        <td widrh='20%' style='text-align:left'>

        <p class='sileColor'>যাচাইকারীর স্বাক্ষর</p>
        <p class='sileColor'>তারিখঃ</p>


    </td>
            <td width='60%' style='text-align:center;padding-left:80px'>$qrcode</td>
            <td widrh='20%' style='text-align:center'>

                <p class='sileColor'>$school_details->Principals_name</p>
                <p class='sileColor'>প্রধান শিক্ষক</p>
                <p class='sileColor'>$school_details->SCHOLL_NAME</p>
                <p class='sileColor'>$school_details->SCHOLL_ADDRESS</p>


            </td>
        </tr>

    </table>
    </div>
    </div>



    </body>
</html>
        ";
return $html;
    }

}

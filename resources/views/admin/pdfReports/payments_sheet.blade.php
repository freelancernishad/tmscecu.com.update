<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $fileName }}</title>

    <style>
        .m-0{
            margin: 0;
        }    .text-center{
            text-align:center;
        }
    .td{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 11px;
    }
       th{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 11px;
    }

    .li{
        font-size: 10px;
    }



	table{
		border-collapse: collapse;
		width:100%
	}
    .result{
        border-bottom: 1px solid black;
        margin-left:10px !important;
    }
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">

<div class="student-header pt-3">




    {!! SchoolPad($rows[0]->school_id) !!}
    <div class="db-student-list" id="search">
        <div class="">


         <h3> শ্রেণী :  <?php echo class_en_to_bn($rows[0]->StudentClass)	?></h3>
         @if($class=='Nine' || $class=='Ten')
         <h3> গ্রুপ :  <?php echo $group	?></h3>
         @endif



            <table class="table" id="student_table" border="0">
                <thead class="thead-dark tableofHead">

                    <tr class="bg-tomato">

                        <th scope="col" width="5%">রোল</th>
                        <th scope="col" width="20%">নাম</th>


                            <th scope="col" width="5%">উ.বৃ</th>
                            <th scope="col" width="5%">সে.ফি</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('January') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('February') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('March') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('April') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('May') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('June') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('July') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('August') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('September') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('October') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('November') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn_sort('December') }} </th>
                            <th scope="col" width="5%">পঃফি </th>
                            <th scope="col" width="5%">পঃফি(নি.প.) </th>
                            @if($class=='Eight' || $class=='Nine' || $class=='Ten')
                            <th scope="col" width="5%">পঃফি(বা.প.) </th>
                            @else
                            <th scope="col" width="5%">পঃফি(বা.মু.) </th>
                            @endif

                            <th scope="col" width="5%">মোট </th>







                    </tr>

                </thead>
                <tbody class="listofbody">

@php
$session_fee_amount_total = 0;
$exam_fee_amount_total = 0;
$Selective_Exam_exam_fee_amount_total = 0;
$Annual_Examination_exam_fee_amount_total = 0;
$Annual_assessment_exam_fee_amount_total = 0;
$January_amount_total = 0;
$February_amount_total = 0;
$March_amount_total = 0;
$April_amount_total = 0;
$May_amount_total = 0;
$June_amount_total = 0;
$July_amount_total = 0;
$August_amount_total = 0;
$September_amount_total = 0;
$October_amount_total = 0;
$November_amount_total = 0;
$December_amount_total = 0;
$totalAmount_total = 0;
@endphp



                    @foreach ($rows as $row)
@php





    $studentId = $row->StudentID;
    $admissionId = $row->AdmissionID;

    $session_fee_amount = getAmountByStudent($admissionId,$class,$year,'session_fee');

    if($class=="Ten"){

        $exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Pre_selection_examination');
    }elseif($class=="Nine"){
        $exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Half_yearly_examination');
    }else{
        $exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Half_yearly_examination');

    }


    $Selective_Exam_exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Selective_Exam');
    $Annual_Examination_exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Annual Examination');
    $Annual_assessment_exam_fee_amount = getAmountByStudent($admissionId,$class,$year,'exam_fee','','Annual_assessment');




    $January_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','January');
    $February_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','February');
    // print_r($February_amount);
    // die();
    $March_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','March');
    $April_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','April');
    $May_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','May');
    $June_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','June');
    $July_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','July');
    $August_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','August');
    $September_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','September');
    $October_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','October');
    $November_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','November');
    $December_amount = getAmountByStudent($admissionId,$class,$year,'monthly_fee','December');

    $session_fee_amount_total += $session_fee_amount;
    $exam_fee_amount_total += $exam_fee_amount;
    $Selective_Exam_exam_fee_amount_total += $Selective_Exam_exam_fee_amount;
    $Annual_Examination_exam_fee_amount_total += $Annual_Examination_exam_fee_amount;
    $Annual_assessment_exam_fee_amount_total += $Annual_assessment_exam_fee_amount;
    $January_amount_total += $January_amount;
    $February_amount_total += $February_amount;
    $March_amount_total += $March_amount;
    $April_amount_total += $April_amount;
    $May_amount_total += $May_amount;
    $June_amount_total += $June_amount;
    $July_amount_total += $July_amount;
    $August_amount_total += $August_amount;
    $September_amount_total += $September_amount;
    $October_amount_total += $October_amount;
    $November_amount_total += $November_amount;
    $December_amount_total += $December_amount;

$totalAmount = $session_fee_amount+$January_amount+$February_amount+$March_amount+$April_amount+$May_amount+$June_amount+$July_amount+$August_amount+$September_amount+$October_amount+$November_amount+$December_amount+$exam_fee_amount+$Selective_Exam_exam_fee_amount+$Annual_Examination_exam_fee_amount+$Annual_assessment_exam_fee_amount;

$totalAmount_total += $totalAmount;

@endphp

                            <tr>
                                <th scope="col">{{ int_en_to_bn($row->StudentRoll) }}</th>
                                <th scope="col">{{ $row->StudentName }}</th>
                                <th scope="col"> @if ($row->stipend=='Yes')
                                    <img width="15px" src="{{ base64('right.png') }}" alt="">
                                    @else
                                    <img width="15px" src="{{ base64('false.jpg') }}" alt="">
                                    @endif </th>
                                <th scope="col" >{{ int_en_to_bn($session_fee_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($January_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($February_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($March_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($April_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($May_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($June_amount) }} </th>
                                <th scope="col" >{{ int_en_to_bn($July_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($August_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($September_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($October_amount) }}</th>
                                <th scope="col" >{{ int_en_to_bn($November_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($December_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($exam_fee_amount) }}</th>
                                <th scope="col" > {{ int_en_to_bn($Selective_Exam_exam_fee_amount) }}</th>
                                @if($class=='Eight' || $class=='Nine' || $class=='Ten')
                                <th scope="col" > {{ int_en_to_bn($Annual_Examination_exam_fee_amount) }}</th>
                                @else
                                <th scope="col" > {{ int_en_to_bn($Annual_assessment_exam_fee_amount) }}</th>
                                @endif


                                <th scope="col" > {{ int_en_to_bn($totalAmount) }}</th>
                            </tr>

                            @endforeach

                            <tr>
                                <th colspan="3" scope="col">মোট</th>

                                <th scope="col" >{{ int_en_to_bn($session_fee_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($January_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($February_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($March_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($April_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($May_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($June_amount_total) }} </th>
                                <th scope="col" >{{ int_en_to_bn($July_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($August_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($September_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($October_amount_total) }}</th>
                                <th scope="col" >{{ int_en_to_bn($November_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($December_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($exam_fee_amount_total) }}</th>
                                <th scope="col" > {{ int_en_to_bn($Selective_Exam_exam_fee_amount_total) }}</th>
                                @if($class=='Eight' || $class=='Nine' || $class=='Ten')
                                <th scope="col" > {{ int_en_to_bn($Annual_Examination_exam_fee_amount_total) }}</th>
                                @else
                                <th scope="col" > {{ int_en_to_bn($Annual_assessment_exam_fee_amount_total) }}</th>
                                @endif


                                <th scope="col" > {{ int_en_to_bn($totalAmount_total) }}</th>
                            </tr>

                </tbody>
            </table>



            <table width="100%" style="margin-top:50px">

                <tr>

                <td style="  border: 0px dotted black;
                padding:20px 10px 10px 10px;
                font-size: 12px;"></td>
                <td style="  border: 0px dotted black;
                padding:20px 10px 10px 10px;
                font-size: 12px;"></td>
                <td style="  border: 0px dotted black;
                padding:20px 10px 10px 10px;
                font-size: 12px;text-align:center;font-size:20px" width="35%">

                <img width="75px" src="{{ $sign }}" alt="">



                    <h4 style="margin:0;text-align:center;font-size:16px">প্রধান শিক্ষক</h4>
                    <h4 style="margin:0;text-align:center;font-size:16px">{{ sitedetails()->Principals_name}}</h4>
                    <h4 style="margin:0;text-align:center;font-size:16px">{{ sitedetails()->SCHOLL_NAME}}</h4>
                </td>

                </tr>

                </table>
        </div>
    </div>
</div>

</body>
</html>

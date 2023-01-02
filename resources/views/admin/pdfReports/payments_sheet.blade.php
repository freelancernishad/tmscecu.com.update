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



            <table class="table" id="student_table" border="0">
                <thead class="thead-dark tableofHead">

                    <tr class="bg-tomato">

                        <th scope="col" width="5%">রোল</th>
                        <th scope="col" width="20%">নাম</th>


                            <th scope="col" width="5%">সে.ফি</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('January') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('February') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('March') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn('April') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn('May') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn('June') }} </th>
                            <th scope="col" width="5%">{{ month_en_to_bn('July') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('August') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('September') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('October') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('November') }}</th>
                            <th scope="col" width="5%">{{ month_en_to_bn('December') }} </th>
                            <th scope="col" width="5%">মোট </th>







                    </tr>

                </thead>
                <tbody class="listofbody">





                    @foreach ($rows as $row)
@php

    $studentId = $row->StudentID;
    $admissionId = $row->AdmissionID;

    $PDO = \DB::connection()->getPdo();


//session_fee
$session_fee_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `admissionId`='$admissionId' && `studentClass`='$class' && `year`='$year' && `type`='session_fee'");
$session_fee_QUERY->execute();
 $session_fee_count = $session_fee_QUERY->rowCount();
$session_fee_fetch=$session_fee_QUERY->fetchAll(PDO::FETCH_OBJ);
if($session_fee_count>0){
    $session_fee_amount= $session_fee_fetch[0]->amount;

}else{
    $session_fee_amount = 0;
}




//January
$January_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='January'");
$January_QUERY->execute();
 $January_count = $January_QUERY->rowCount();
$January_fetch=$January_QUERY->fetchAll(PDO::FETCH_OBJ);
if($January_count>0){
    $January_amount= $January_fetch[0]->amount;

}else{
    $January_amount = 0;
}


//February
$February_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='February'");
$February_QUERY->execute();
 $February_count = $February_QUERY->rowCount();
$February_fetch=$February_QUERY->fetchAll(PDO::FETCH_OBJ);
if($February_count>0){
    $February_amount= $February_fetch[0]->amount;

}else{
    $February_amount = 0;
}



//March
$March_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='March'");
$March_QUERY->execute();
 $March_count = $March_QUERY->rowCount();
$March_fetch=$March_QUERY->fetchAll(PDO::FETCH_OBJ);
if($March_count>0){
    $March_amount= $March_fetch[0]->amount;

}else{
    $March_amount = 0;
}


//April
$April_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='April'");
$April_QUERY->execute();
 $April_count = $April_QUERY->rowCount();
$April_fetch=$April_QUERY->fetchAll(PDO::FETCH_OBJ);
if($April_count>0){
    $April_amount= $April_fetch[0]->amount;

}else{
    $April_amount = 0;
}


//May
$May_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='May'");
$May_QUERY->execute();
 $May_count = $May_QUERY->rowCount();
$May_fetch=$May_QUERY->fetchAll(PDO::FETCH_OBJ);
if($May_count>0){
    $May_amount= $May_fetch[0]->amount;

}else{
    $May_amount = 0;
}

//June
$June_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='June'");
$June_QUERY->execute();
 $June_count = $June_QUERY->rowCount();
$June_fetch=$June_QUERY->fetchAll(PDO::FETCH_OBJ);
if($June_count>0){
    $June_amount= $June_fetch[0]->amount;

}else{
    $June_amount = 0;
}


//July
$July_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='July'");
$July_QUERY->execute();
 $July_count = $July_QUERY->rowCount();
$July_fetch=$July_QUERY->fetchAll(PDO::FETCH_OBJ);
if($July_count>0){
    $July_amount= $July_fetch[0]->amount;

}else{
    $July_amount = 0;
}


//August
$August_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='August'");
$August_QUERY->execute();
 $August_count = $August_QUERY->rowCount();
$August_fetch=$August_QUERY->fetchAll(PDO::FETCH_OBJ);
if($August_count>0){
    $August_amount= $August_fetch[0]->amount;

}else{
    $August_amount = 0;
}

//September
$September_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='September'");
$September_QUERY->execute();
 $September_count = $September_QUERY->rowCount();
$September_fetch=$September_QUERY->fetchAll(PDO::FETCH_OBJ);
if($September_count>0){
    $September_amount= $September_fetch[0]->amount;

}else{
    $September_amount = 0;
}


//October
$October_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='October'");
$October_QUERY->execute();
 $October_count = $October_QUERY->rowCount();
$October_fetch=$October_QUERY->fetchAll(PDO::FETCH_OBJ);
if($October_count>0){
    $October_amount= $October_fetch[0]->amount;

}else{
    $October_amount = 0;
}


//November
$November_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='November'");
$November_QUERY->execute();
 $November_count = $November_QUERY->rowCount();
$November_fetch=$November_QUERY->fetchAll(PDO::FETCH_OBJ);
if($November_count>0){
    $November_amount= $November_fetch[0]->amount;

}else{
    $November_amount = 0;
}



//December
$December_QUERY = $PDO->prepare("SELECT DISTINCT * FROM `payments` WHERE `studentId`='$studentId' && `studentClass`='$class' && `year`='$year' && `type`='$type'&& `month`='December'");
$December_QUERY->execute();
 $December_count = $December_QUERY->rowCount();
$December_fetch=$December_QUERY->fetchAll(PDO::FETCH_OBJ);
if($December_count>0){
    $December_amount= $December_fetch[0]->amount;

}else{
    $December_amount = 0;
}


$totalAmount = $January_amount+$February_amount+$March_amount+$April_amount+$May_amount+$June_amount+$July_amount+$August_amount+$September_amount+$October_amount+$November_amount+$December_amount;

@endphp

                            <tr>
                                <th scope="col">{{ int_en_to_bn($row->StudentRoll) }}</th>
                                <th scope="col">{{ $row->StudentName }}</th>
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
                                <th scope="col" > {{ int_en_to_bn($totalAmount) }}</th>




                            </tr>

                            @endforeach


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

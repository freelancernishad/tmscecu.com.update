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
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
    }
       th{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
    }

    .li{
        font-size: 10px;
    }



	table{
		border-collapse: collapse;
		width:100%
	}
    .result{
        border-bottom: 1px dotted black;
        margin-left:10px !important;
    }
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">




    @foreach ($rows as $row)



<?php




    // $studentimage = base64(env('FILE_PATH').$row->StudentPicture);






?>
<img width="410" height="325" src="{!! $card !!}" alt="">

<div class="frontSide" style="position:absolute;top:229px;left:91px">
    <img width="94" height="105" style="    z-index: 9999;" src="{!! base64(env('FILE_PATH').$row->StudentPicture) !!}" alt="">
</div>


<div style="position:fixed;top:110px;left:260px;font-size:16px;font-weight: 900;"> <b> শিক্ষাবর্ষঃ {{ int_en_to_bn(date('Y')) }}</b></div>
<div class="studentDetails"  style="position:fixed;top:125px;left:230px">

    <div style="font-size:12px;margin-top:12px"> <b> নামঃ </b> {{ $row->StudentName }}</div>
     <div style="font-size:12px;margin-top:12px"> <b> পিতার নামঃ </b> {{ $row->StudentFatherName }}</div>
     <div style="font-size:12px;margin-top:12px"> <b> মাতার নামঃ </b> {{ $row->StudentMotherName }}  </div>
     <div style="font-size:12px;margin-top:12px"> <b> ঠিকানাঃ </b>{{ $row->StudentAddress }} </div>

    <div style="font-size:12px;margin-top:12px"> <b> শ্রেণীঃ </b> {{ class_en_to_bn($row->StudentClass) }}</div>
     <div style="font-size:12px;margin-top:12px"> <b> রোলঃ </b>{{ int_en_to_bn($row->StudentRoll) }}</div>
     </div>


{{-- <img width="410" height="325" src="{!! $card !!}" alt="">


    <div class="frontSide" style="position:absolute;top:229px;left:91px">
        <img width="94" height="105" src="{!! $studentimage !!}" alt="">
    </div>


    <div style="position:fixed;top:110px;left:260px;font-size:16px;font-weight: 900;"> <b> শিক্ষাবর্ষঃ {{ int_en_to_bn(date('Y')) }}</b></div>

 <div class="studentDetails"  style="position:fixed;top:125px;left:230px">

<div style="font-size:12px;margin-top:12px"> <b> নামঃ </b> {{ $row->StudentName }}</div>
 <div style="font-size:12px;margin-top:12px"> <b> পিতার নামঃ </b> {{ $row->StudentFatherName }}</div>
 <div style="font-size:12px;margin-top:12px"> <b> মাতার নামঃ </b> {{ $row->StudentMotherName }}  </div>
 <div style="font-size:12px;margin-top:12px"> <b> ঠিকানাঃ </b>{{ $row->StudentAddress }} </div>

<div style="font-size:12px;margin-top:12px"> <b> শ্রেণীঃ </b> {{ class_en_to_bn($row->StudentClass) }}</div>
 <div style="font-size:12px;margin-top:12px"> <b> রোলঃ </b>{{ int_en_to_bn($row->StudentRoll) }}</div>
 </div> --}}



<pagebreak />



@endforeach






</body>
</html>


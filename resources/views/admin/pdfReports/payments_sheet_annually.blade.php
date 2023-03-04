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
        text-align: center;
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

    {!! SchoolPad($school_id) !!}


    <table class="table" border="1">
        <thead>
            <tr>
                <th colspan="9"><span style="font-size:25px;text-align:center">বার্ষিক প্রতিবেদন</span></th>
            </tr>
        </thead>

        <tr>
            <td class="td">শ্রেণি</td>
            <td class="td">ভর্তি ফরম ফি</td>
            <td class="td">ভর্তি/সেশন ফি</td>
            <td class="td">মাসিক বেতন</td>
            <td class="td">পরীক্ষার ফি</td>
            <td class="td">রেজিস্ট্রেশন ফি</td>
            <td class="td">ফরম পূরণ ফি</td>
            <td class="td">মার্কসীট ফি</td>
            <td class="td">সর্বমোট</td>
        </tr>



        @foreach (class_list() as $class)


        <tr>
            <td class="td">{{ class_en_to_bn($class) }}</td>
            <td class="td">{{ annualAmount(date('Y'),'Admission_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'session_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'monthly_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'exam_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'registration_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'form_filup_fee',$class); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'marksheet',$class); }}</td>

            <td class="td">{{ annualAmount(date('Y'),'marksheet',$class,'total'); }}</td>
        </tr>

        @endforeach

        <tr>
            <td class="td">মোট</td>
            <td class="td">{{ annualAmount(date('Y'),'Admission_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'session_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'monthly_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'exam_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'registration_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'form_filup_fee'); }}</td>
            <td class="td">{{ annualAmount(date('Y'),'marksheet'); }}</td>

            <td class="td">{{ annualAmount(date('Y'),'','','Subtotal'); }}</td>
        </tr>


    </table>
</div>

</body>
</html>

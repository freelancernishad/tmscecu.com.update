@if ($tt=='pdf')






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $date_month }}</title>


    <style>

        th {border: 1px dotted green;}

        table.table.bs-table.table-striped.table-bordered.text-nowrap {border-collapse: collapse;width: 100%;}

        td {border: 1px dotted green;text-align: center;}

        td.text-left {text-align: left;}



        .fas.fa-check {
            position: relative;
            display: inline-block;
            width: 14px;
            height: 14px;
        }
/*
        .fas.fa-check::before {
            position: absolute;
            left: -7px;
            top: 50%;
            height: 50%;
            width: 3px;
            background-color: green;
            content: "";
            transform: translateX(10px) rotate(-45deg);
            transform-origin: left bottom;
        }

        .fas.fa-check::after {
            position: absolute;
            left: -6px;
            bottom: 0;
            height: 3px;
            width: 100%;
            background-color: green;
            content: "";
            transform: translateX(10px) rotate(-45deg);
            transform-origin: left bottom;
        } */



        td {
    background-image: url(https://static.vecteezy.com/system/resources/previews/001/200/261/large_2x/check-png.png) !important;
}
        .fas.fa-times {
            background:red;
            width: 100px;
        }
        /* .fas.fa-times:hover {
          opacity: 1;
        }
        .fas.fa-times:before, .fas.fa-times:after {
          position: absolute;
          left: 0;
          content: ' ';
          height: 14px;
          width: 2px;
          background-color: #f00;
        }
        .fas.fa-times:before {
          transform: rotate(45deg);
        }
        .fas.fa-times:after {
          transform: rotate(-45deg);
        } */
        </style>

</head>
<body style="font-family: 'bangla', sans-serif;">



@endif
<div class="col-12" >
    <div class="card">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title" style="text-align:center">


                     <span style="font-size:20px">{{ sitedetails()->SCHOLL_NAME}} </span><br>
                     <span style="font-size:16px">{{ sitedetails()->SCHOLL_ADDRESS}} </span><br>



                </div>

                <h5>
                    <div class="well tex-center">CLASS :{{ $class }}
                    </div>
                    <div class="well tex-center">DATE : {{ date('F Y', strtotime($date_month)); }}

                    </div>
                </h5>


            </div>




            <div class="table-responsive double-scroll">
                <table class="table bs-table table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-left">রোল</th>
                            <th class="text-left">নাম</th>
<?php
$monthYear = explode('-',$date_month);
$cal = cal_days_in_month(CAL_GREGORIAN, $monthYear[1], $monthYear[0]);

for ($monthcount=1; $monthcount <=$cal ; $monthcount++) {


echo "<th>".int_en_to_bn(sprintf('%02d', $monthcount))."</th>";
}

?>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $row)
                        <?php



            $months = date("F", strtotime($date_month));


             // dd($daysCount);

                $attendace = '-';




                        ?>
                        <tr>
                            <td class="text-left">{{ $row->StudentRoll }}</td>
                            <td class="text-left">{{ $row->StudentName }}</td>
<?php
//  $cutentdate = $date_month.'-'.sprintf("%02d", 1);
//             print_r(attendancemonthCheck($cutentdate,$class,$row->StudentID));
// dd($cal);
for ($monthcount=1; $monthcount <=$cal ; $monthcount++) {
 $cutentdate = $date_month.'-'.sprintf("%02d", $monthcount);
// print_r(attendancemonthCheck($cutentdate,$class,$row->StudentID));
if(attendancemonth($cutentdate,$class,$row->StudentID,$tt,$row->school_id)==''){
    echo '<td>-</td>';
}else{
    echo attendancemonth($cutentdate,$class,$row->StudentID,$tt,$row->school_id);
}




//echo attendancemonthCheck($cutentdate,$class,$row->StudentID);


}

?>

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


                        <h3 style="margin:0;text-align:center;">স্বাক্ষর</h3>
                        <h4 style="margin:0;text-align:center;font-size:16px">অধ্যক্ষ</h4>
                        <h4 style="margin:0;text-align:center;font-size:16px">{{ sitedetails()->Principals_name}}</h4>
                        <h4 style="margin:0;text-align:center;font-size:16px">{{ sitedetails()->SCHOLL_NAME}}</h4>
                    </td>

                    </tr>

                    </table>



            </div>
        </div>
    </div>
</div>

@if ($tt=='pdf')

</body>
</html>

@endif

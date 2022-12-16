<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .m-0{
            margin: 0;
        }    .text-center{
            text-align:center;
        }
    td{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
    }    th{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
    }

    .li{
        font-size: 10px;
    }

    </style>


</head>
<body  style="font-family: 'bangla', sans-serif;" >


    <table width='100%' style='margin-bottom:20px' border='0'>
        <tr>
            <td width='110px' style='border:0 !important'>
                <img width='75px'  style='overflow:hidden;float:right' src='{{ base64($schoolDetails->logo) }}' alt=''>
            </td>
            <td style='border:0 !important'>
                <p class='fontsize2' style='font-size:30px'>{{ $schoolDetails->SCHOLL_NAME }}</p>
                <p class='fontsize1' style='font-size:20px'>{{ $schoolDetails->SCHOLL_ADDRESS }} </p>
                <p class='fontsize1' style='font-size:12px'>website: www.tepriganjhighschool.edu.bd </p>
            </td>


        </tr>
    </table>

    <div class="header">

        <span>Class :- {{ $results[0]->class }} </span> <br>
        @if($results[0]->class=="Nine" || $results[0]->class=="Ten")
        <span>Group :- {{ $results[0]->class_group }} </span> <br>
        @endif

        <span>Exam Name :- {{ $results[0]->exam_name }} </span> <br>
        <span>Subject :- {{ $subject }} </span> <br>


    </div>





    <table width="100%" style="border-collapse: collapse;width:100%">
        <tr>

            <td>রোল</td>
            <td>নাম</td>
            <td>মার্ক</td>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($results as $result)


        <tr>

            <td>{{ $result->roll }}</td>
            <td>{{ $result->name }}</td>
            <td>{{ $result[subjectCol($subject)] }}</td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach

    </table>



</body>
</html>

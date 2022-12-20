<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pdfFileName }}</title>

    <style>
        .m-0{
            margin: 0;
        }    .text-center{
            text-align:center;
        }
    td{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
    }    th{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
    }

    .li{
        font-size: 10px;
    }

    </style>


</head>
<body  style="font-family: 'bangla', sans-serif;" >

    {!! SchoolPad($results[0]->school_id) !!}

    <div class="header">

        <span>Class :- {{ $results[0]->class }} </span> <br>
        @if($results[0]->class=="Nine" || $results[0]->class=="Ten")
        <span>Group :- {{ $results[0]->class_group }} </span> <br>
        @endif

        <span>Exam Name :- {{ $results[0]->exam_name }} </span> <br>
        <span>Subject :- {{ $subject }} </span> <br>

        <span>Date :- {{ date('d-m-Y', strtotime($resultLog->created_at)) }} </span> <br>


    </div>





    <table width="100%" style="border-collapse: collapse;width:100%">
        <tr>

            <td>রোল</td>
            <td>নাম</td>
            <td>লিখিত</td>
            <td>বহুনির্বাচনী</td>
            <td>ব্যাবহারিক</td>
            <td>মোট</td>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($results as $result)


        <tr>

            <td>{{ $result->roll }}</td>
            <td>{{ $result->name }}</td>


            <td>{{ json_decode($result[subjectCol($subject).'_d'])->CQ }}</td>
            <td>{{ json_decode($result[subjectCol($subject).'_d'])->MCQ }}</td>
            <td>{{ json_decode($result[subjectCol($subject).'_d'])->EXTRA }}</td>
            <td>{{ $result[subjectCol($subject)] }}</td>


        </tr>
        @php
            $i++;
        @endphp
        @endforeach

    </table>



</body>
</html>

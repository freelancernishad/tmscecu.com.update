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
    .td{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
        text-align: center;
    }
    th{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
        text-align: center;
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
        {{-- <span>Subject :- {{ $subject }} </span> <br> --}}

        {{-- <span>Date :- {{ date('d-m-Y', strtotime($resultLog->created_at)) }} </span> <br> --}}


    </div>





    <table width="100%" style="border-collapse: collapse;width:100%">
        <thead>
        <tr>
            <td class="td">নতুন রোল</td>
            <td class="td">পূর্বের রোল</td>
            <td class="td">ছাত্র/ছাত্রীর নাম</td>
            @if($veiwType=='schoolPdf')
            <td class="td">ব্যর্থ হয়েছে</td>
            <td class="td">মোট নাম্বার</td>
            @endif

        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($results as $key=>$result)


        <tr>
            <td class="td">{{ $key+1 }}</td>
            <td class="td"><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->roll }}</label></td>
            <td class="td"><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->name }}</label></td>
            @if($veiwType=='schoolPdf')
            <td class="td"><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->failed }}</label></td>
            <td class="td"><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->total }}</label></td>
            @endif
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    </table>



</body>
</html>


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
<body style="font-family: 'bangla', sans-serif;">








    <div class="db-student-list mt-5">
        <div class="pt-3 pb-3 pl-3 pr-3">

            <h3 style="text-align:center;margin:0;" >{{ sitedetails()->SCHOLL_NAME}} </h3>
            <h4 style="text-align:center; margin:0;" >{{ sitedetails()->SCHOLL_ADDRESS}} </h4>


         <span> তারিখ :  {{ date('d-m-y') }}</span> <br>
         <span> পরিক্ষার নাম:  {{ $exam_name }}</span> <br>
         <span> শ্রেণী :  {{ $class }}</span>


<?php

$colspan = count(allList('subjects',$class,''))+4;

?>


                <table class="table" border="1" style="border-collapse: collapse;width:100%">
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col">রোল</th>
                            <th scope="col">নাম</th>
                            @foreach (allList('subjects',$class,'') as $subject)
                            <th scope="col">{{ $subject }}</th>
                            @endforeach
                            <th class="" scope="col">ব্যর্থ হয়েছে</th>
                            <th class="" scope="col">মোট</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              $counter = 1;
                        foreach ($rows as $row) {


                    ?>
          <input type="hidden" name="id[]" value="{{ $row->id }}">

                        <tr>
                            <td scope="col">
                                <?php echo $row->roll; ?>
                            </td>
                            <td scope="col">
                                <?php echo $row->name; ?>
                            </td>
                            @foreach (allList('subjects',$class,'') as $subject)
                            <td scope="col">
                            @if (subjectCol($subject)=='Religion' && $row->StudentReligion=='Islam')
                            {{  $row[subjectCol('ReligionIslam')] }}
                            @elseif (subjectCol($subject)=='Religion' && $row->StudentReligion=='Hindu')
                            {{  $row[subjectCol('ReligionHindu')] }}
                            @else
                            {{  $row[subjectCol($subject)] }}
                            @endif
                            </td>
                            @endforeach
<td scope="col">  {{ $row->failed }}</td>
<td scope="col">  {{ $row->total }}</td>
                        </tr>
                        <?php
                            $counter++;
                        }

                    ?>
                    </tbody>
                </table>

                <table width="100%" style="margin-top:30px">

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


</body>
</html>

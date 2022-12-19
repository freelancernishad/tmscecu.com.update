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
        .table{
            border-collapse: collapse;
            width:100%;
            margin-bottom: 20px;
        }
        .table td{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
        text-align:center
    }    th{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
    }

    h4{
        font-size: 20px;
    }

    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">


    {!! SchoolPad($school_id) !!}
    <div class="table-responsive">
        <table class="table mb-5" >
        <tr align="center">
            <td>শ্রেণী</td>
            <td>ছাত্র</td>
            <td>ছাত্রী</td>
            <td>ইসলাম</td>
            <td>হিন্দু</td>
            <td>উপবৃত্তি</td>
            <td>মোট</td>
        </tr>
        @foreach ($data as $key=>$report)
        <tr align="center" >
            <td>{{ $key }}</td>
            <td>{{ $report['maleStudent'] }}</td>
            <td>{{ $report['FemaleStudent'] }}</td>
            <td>{{ $report['IslamStudent'] }}</td>
            <td>{{ $report['HinduStudent'] }}</td>
            <td>{{ $report['stipendStudent'] }}</td>
            <td>{{ $report['totalStudent'] }}</td>
        </tr>
        @endforeach
         <tr align="center">
            <td>মোট</td>
            <td>{{ $maleStudent }}</td>
            <td>{{ $FemaleStudent }}</td>
            <td>{{ $IslamStudent }}</td>
            <td>{{ $HinduStudent }}</td>
            <td>{{ $stipendStudent }}</td>
            <td>{{ $totalStudent }}</td>
        </tr>
        </table>
        </div>


        <div class="table-responsive">
        <table class="table mb-5">
        <tr align="center">
            <td colspan="7"><h4 class="mb-0">শিক্ষার্থীর ধরন</h4></td>

        </tr>
        <tr align="center">
            <td>শ্রেণী</td>
            <td>কর্মজীবী শিক্ষার্থী</td>
            <td>ভূমিহীন অভিভাবকের সন্তান</td>
            <td>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</td>
            <td>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</td>
            <td>অনাথ/এতিম শিক্ষার্থী</td>
            <td>অন্যান্য</td>
        </tr>
        @foreach ($data as $key=>$report)
        <tr align="center">
            <td>{{ $key }}</td>
            <td>{{ $report['WorkingStudent'] }}</td>
            <td>{{ $report['landless_guardiansStudent'] }}</td>
            <td>{{ $report['MinorityStudent'] }}</td>
            <td>{{ $report['special_needsStudent'] }}</td>
            <td>{{ $report['OrphanStudent'] }}</td>
            <td>{{ $report['categoryOtherStudent'] }}</td>
        </tr>
        @endforeach
        <tr align="center">
            <td>মোট</td>
            <td>{{ $WorkingStudent }}</td>
            <td>{{ $landless_guardiansStudent }}</td>
            <td>{{ $MinorityStudent }}</td>
            <td>{{ $special_needsStudent }}</td>
            <td>{{ $OrphanStudent }}</td>
            <td>{{ $categoryOtherStudent }}</td>
        </tr>
        </table>

        </div>


        <div class="table-responsive">
        <table class="table mb-5">
        <tr align="center">
            <td colspan="5"><h4 class="mb-0">কোটা</h4></td>

        </tr>
        <tr align="center">
            <td>শ্রেণী</td>
            <td>মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী</td>
            <td>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</td>
            <td>প্রতিবন্ধী</td>
            <td>কোনো কোটা নেই</td>

        </tr>
        @foreach ($data as $key=>$report)
        <tr align="center">
            <td>{{ $key }}</td>
            <td>{{ $report['freedom_fightersStudent'] }}</td>
            <td>{{ $report['committeeStudent'] }}</td>
            <td>{{ $report['disabledStudent'] }}</td>
            <td>{{ $report['There_is_no_quotaStudent'] }}</td>
        </tr>
        @endforeach
        <tr align="center">
            <td>মোট</td>
            <td>{{ $freedom_fightersStudent }}</td>
            <td>{{ $committeeStudent }}</td>
            <td>{{ $disabledStudent }}</td>
            <td>{{ $There_is_no_quotaStudent }}</td>
        </tr>
        </table>

        </div>


        <div class="table-responsive">
        <table class="table mb-5">
        <tr align="center">
            <td colspan="13"><h4 class="mb-0">অভিভাবকের পেশা</h4></td>

        </tr>
        <tr align="center">
            <td>শ্রেণী</td>
            <td>ব্যবসায়ি</td>
            <td>কৃষক</td>
            <td>কৃষি শ্রমিক</td>
            <td>ডাক্তার</td>
            <td>জেলে</td>
            <td>সরকারি চাকুরি</td>
            <td>কামার/কুমোর</td>
            <td>প্রবাসি</td>
            <td>ক্ষুদ্র ব্যবসায়ি</td>
            <td>শিক্ষক</td>
            <td>অকৃষি শ্রমিক</td>
            <td>অন্যান্য</td>

        </tr>
        @foreach ($data as $key=>$report)
        <tr align="center">
            <td>{{ $key }}</td>
            <td>{{ $report['businessmanStudent'] }}</td>
            <td>{{ $report['farmerStudent'] }}</td>
            <td>{{ $report['agricultural_laborerStudent'] }}</td>
            <td>{{ $report['doctorStudent'] }}</td>
            <td>{{ $report['fishermanStudent'] }}</td>
            <td>{{ $report['Government_jobStudent'] }}</td>
            <td>{{ $report['blacksmith_potterStudent'] }}</td>
            <td>{{ $report['expatriateStudent'] }}</td>
            <td>{{ $report['small_businessStudent'] }}</td>
            <td>{{ $report['teacherStudent'] }}</td>
            <td>{{ $report['Non_agricultural_workersStudent'] }}</td>
            <td>{{ $report['Occupation_of_guardian_otherStudent'] }}</td>
        </tr>
        @endforeach
        <tr align="center">
            <td>মোট</td>
            <td>{{ $businessmanStudent }}</td>
            <td>{{ $farmerStudent }}</td>
            <td>{{ $agricultural_laborerStudent }}</td>
            <td>{{ $doctorStudent }}</td>
            <td>{{ $fishermanStudent }}</td>
            <td>{{ $Government_jobStudent }}</td>
            <td>{{ $blacksmith_potterStudent }}</td>
            <td>{{ $expatriateStudent }}</td>
            <td>{{ $small_businessStudent }}</td>
            <td>{{ $teacherStudent }}</td>
            <td>{{ $Non_agricultural_workersStudent }}</td>
            <td>{{ $Occupation_of_guardian_otherStudent }}</td>
        </tr>
        </table>

        </div>







</body>
</html>

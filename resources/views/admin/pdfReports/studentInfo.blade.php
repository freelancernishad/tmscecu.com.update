

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
    .tableTag td{
        border: 1px solid black;
        padding:4px 10px;
        font-size: 12px;
        text-align: center;
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
<body style="font-family: 'bangla', sans-serif;">



    {{-- {!! SchoolPad($student->school_id) !!} --}}

    <table width='100%' style='margin-bottom:20px' border='0'>
        <tr>
            <td width='110px' style='border:0 !important'>
                <img width='75px'  style='overflow:hidden;float:right' src='{{ base64($schoolDetails->logo) }}' alt=''>
            </td>
            <td style='border:0 !important'>
                <p class='fontsize2' style='font-size:30px'> {{ $schoolDetails->SCHOLL_NAME }} </p>
                <p class='fontsize1' style='font-size:20px'> {{ $schoolDetails->SCHOLL_ADDRESS }}  </p>
                <p class='fontsize1' style='font-size:12px'>website: www.tepriganjhighschool.edu.bd </p>
            </td>
            <td style='border:0 !important'>
                <label for="fileupload" id="fileChoiceLable">
            <img style="    width: 120px;" src="{{ base64($student->StudentPicture) }}"  alt="" />
        </label>
            </td>

        </tr>
    </table>



    <table class="tableTag" width="100%"  style="border-collapse: collapse;width:100%">

        <tr>
            <th>শ্রেণিঃ {{ $student->StudentClass }}</th>
            <th>ধর্মঃ {{ $student->StudentReligion }}</th>
            <th>লিঙ্গঃ {{ $student->StudentGender }}</th>
            <th>গ্রুপঃ  <span v-if="$student->StudentClass=='Nine' || $student->StudentClass=='Ten'">{{ $student->StudentGroup }}</span> <span v-else>N/A</span> </th>
        </tr>

        <tr>
            <th>শিক্ষার্থীর নাম (বাংলা) </th>
            <th>শিক্ষার্থীর নাম (English) </th>
            <th>শিক্ষার্থীর জন্ম তারিখ </th>
            <th>শিক্ষার্থীর জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td> {{ $student->StudentName }}</td>
            <td style="text-transform:uppercase"> {{ $student->StudentNameEn }}</td>
            <td> {{ date("d-m-Y", strtotime($student->StudentDateOfBirth)) }}</td>
            <td> {{ $student->StudentBirthCertificateNo }}</td>

        </tr>
        <tr>
            <th>পিতার নাম (বাংলা) </th>
            <th>পিতার নাম (English) </th>
            <th>পিতার জাতীয় পরিচয়পত্র নং </th>
            <th>পিতার জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td>{{ $student->StudentFatherNameBn }}</td>
            <td style="text-transform:uppercase">{{ $student->StudentFatherName }}</td>
            <td>{{ $student->StudentFatherNid }}</td>
            <td>{{ $student->StudentFatherBCN }}</td>

        </tr>
        <tr>
            <th>মাতার নাম (বাংলা) </th>
            <th>মাতার নাম (English) </th>
            <th>মাতার জাতীয় পরিচয়পত্র নং </th>
            <th>মাতার জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td>{{ $student->StudentMotherNameBn }}</td>
            <td style="text-transform:uppercase">{{ $student->StudentMotherName }}</td>
            <td>{{ $student->StudentMotherNid }}</td>
            <td>{{ $student->StudentMotherBCN }}</td>

        </tr>

        <tr>
            <th>পিতা/মাতা জীবিত না থাকলে অভিভাবকের নাম (বাংলা)</th>
            <th>অভিভাবকের নাম (English) </th>
            <th>অভিভাবকের জাতীয় পরিচয়পত্র নং </th>
            <th>অভিভাবকের সাথে শিক্ষার্থীর সম্পর্ক </th>
        </tr>
        <tr>
            <td>{{ $student->guardNameBn }}</td>
            <td style="text-transform:uppercase">{{ $student->guardName }}</td>
            <td>{{ $student->guardNid }}</td>
            <td >{{ $student->guardRalation }}</td>

        </tr>
        <tr>
            <th>অভিভাবকের পেশা</th>


            <td colspan="3">{{ $student->StudentFatherOccupation }}</td>
        </tr>
        <tr>
            <th>অভিভাবকের মাসিক আয়</th>


            <td colspan="3">{{ $student->parentEarn }}</td>
        </tr>
        <tr>
            <th>মোবাইল নাম্বার</th>


            <td colspan="3">{{ $student->StudentPhoneNumber }}</td>
        </tr>

        <tr>
            <th colspan="2">শিক্ষার্থীর ধরন</th>
            <th colspan="2">শিক্ষার্থীর কোটা</th>

        </tr>
        <tr>
            <td colspan="2">{{ $student->StudentCategory }}</td>
            <td colspan="2">{{ $student->StudentKota }}</td>


        </tr>

        <tr>
            <th colspan="2">পূর্বে অধ্যায়নরত স্কুল এর নাম</th>
            <th colspan="2">পূর্বে অধ্যায়নরত শ্রেণি</th>

        </tr>
        <tr>
            <td colspan="2">{{ $student->preSchool }}</td>
            <td colspan="2">{{ $student->preClass }}</td>
        </tr>



        <tr>
            <th>কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না</th>
            <th>অধ্যয়নরত ভাই/বোনের নাম</th>
            <th>অধ্যয়নরত ভাই/বোনের শ্রেণি</th>
            <th>অধ্যয়নরত ভাই/বোনের রোল</th>
        </tr>
        <tr>
            <td>{{ $student->bigBroSis }}</td>
            <td>{{ $student->bigBroSisName }}</td>
            <td>{{ $student->bigBroSisClass }}</td>
            <td>{{ $student->bigBroSisRoll }}</td>

        </tr>
        <tr>
            <th>ঠিকানা</th>
            <td colspan="3">বিভাগঃ- {{ $student->division }}, জেলাঃ- {{ $student->district }}, উপজেলাঃ- {{ $student->upazila }}, ইউনিয়নঃ- {{ $student->union }}, পোস্ট অফিসঃ- {{ $student->post_office }}({{ $student->AreaPostalCode }}), গ্রামঃ- {{ $student->StudentAddress }}</td>
        </tr>


    </table>




</body>
</html>

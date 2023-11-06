

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
<body style="font-family: 'bangla', sans-serif;">



    {!! SchoolPad($students[0]->school_id) !!}


         <span> Total :  {{ count($students) }}</span> <br>


         <table class="table text-nowrap" style="border-collapse: collapse;width:100%">
            <thead>
                <tr>

                    <th scope="col" v-if="form.type=='Admission_fee'">ক্রমিক নং</th>
                    <th scope="col" v-if="form.type=='Admission_fee'">রোল</th>
                    {{-- <th scope="col" v-else>Roll</th> --}}
                    <th  class="tablecolhide" scope="col">নাম</th>
                    <th scope="col">শ্রেণী</th>
                    <th scope="col">গ্রুপ</th>
                    <th scope="col">পিতার নাম</th>
                    <th scope="col">মাতার নাম</th>
                    <th  class="tablecolhide" scope="col">ঠিকানা</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach($students as $key => $value)
                <tr>

                    <td>{{ int_en_to_bn($i) }}</td>
                    <td>{{ int_en_to_bn($value->StudentRoll) }}</td>
                    <td>{{ $value->StudentName }}</td>
                    <td>{{ $value->StudentClass }}</td>
                    <td>{{ $value->StudentGroup }}</td>
                    <td>{{ $value->StudentFatherNameBn }}</td>
                    <td>{{ $value->StudentMotherNameBn }}</td>
                    <td>{{ $value->StudentAddress }}</td>
                </tr>
                @php
                $i++;
            @endphp

                @endforeach

            </tbody>

        </table>






</body>
</html>

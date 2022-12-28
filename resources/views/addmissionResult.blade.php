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

    {!! SchoolPad($students[0]->school_id) !!}


    <div class="header">
        <p style="font-size:25px;text-align:center"> Class Six </p>
    </div>


    <table width="100%" style="border-collapse: collapse;width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Application Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Father Name</th>
                <th>Mother Name</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($studentsSix as $student)


        <tr>
            <td>{{ $i }}</td>
            <td>{{ $student->AdmissionID }}</td>
            <td>{{ $student->StudentName }}</td>
            <td>{{ $student->StudentClass }}</td>
            <td>{{ $student->StudentFatherNameBn }}</td>
            <td>{{ $student->StudentMotherNameBn }}</td>

        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    </table>

    <pagebreak>

    {!! SchoolPad($students[0]->school_id) !!}


    <div class="header">
        <p style="font-size:25px;text-align:center"> Class Seven </p>
    </div>


    <table width="100%" style="border-collapse: collapse;width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Application Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Father Name</th>
                <th>Mother Name</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($studentsSeven as $student)


        <tr>
            <td>{{ $i }}</td>
            <td>{{ $student->AdmissionID }}</td>
            <td>{{ $student->StudentName }}</td>
            <td>{{ $student->StudentClass }}</td>
            <td>{{ $student->StudentFatherNameBn }}</td>
            <td>{{ $student->StudentMotherNameBn }}</td>

        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    </table>

    <pagebreak>

    {!! SchoolPad($students[0]->school_id) !!}


    <div class="header">
        <p style="font-size:25px;text-align:center"> Class Eight </p>
    </div>

    <table width="100%" style="border-collapse: collapse;width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Application Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Father Name</th>
                <th>Mother Name</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($studentsEight as $student)


        <tr>
            <td>{{ $i }}</td>
            <td>{{ $student->AdmissionID }}</td>
            <td>{{ $student->StudentName }}</td>
            <td>{{ $student->StudentClass }}</td>
            <td>{{ $student->StudentFatherNameBn }}</td>
            <td>{{ $student->StudentMotherNameBn }}</td>

        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    </table>

    <pagebreak>

    {!! SchoolPad($students[0]->school_id) !!}


    <div class="header">
        <p style="font-size:25px;text-align:center"> Class Nine </p>
    </div>


    <table width="100%" style="border-collapse: collapse;width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Application Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Group</th>
                <th>Father Name</th>
                <th>Mother Name</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($studentsNine as $student)


        <tr>
            <td>{{ $i }}</td>
            <td>{{ $student->AdmissionID }}</td>
            <td>{{ $student->StudentName }}</td>
            <td>{{ $student->StudentClass }}</td>
            <td>{{ $student->StudentGroup }}</td>
            <td>{{ $student->StudentFatherNameBn }}</td>
            <td>{{ $student->StudentMotherNameBn }}</td>

        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
    </table>



</body>
</html>

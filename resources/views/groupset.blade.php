<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        td{
            text-align: center;
        }
    </style>

</head>
<body>

<form action="/dashboard/set/group" method="post">

    @csrf

    <table class="table">
        <thead>
            <tr>
                <th width="20%" class="text-center">নতুন রোল</th>
                <th width="20%" class="text-center">রোল</th>
                <th width="20%" class="text-center">নাম</th>
                <th width="20%" class="text-center">গ্রুপ</th>
                <th width="20%" class="text-center">বিষয়</th>
            </tr>
        </thead>

        <tbody>
            @php
                $newRol = 1;
            @endphp
            @foreach ($students as $student)
            <input type="hidden" name="AdmissionID[]" value="{{ $student->AdmissionID }}">
            <tr>
                <td><input type="number" onClick="this.select();" name="StudentRoll[{{ $student->AdmissionID }}]" value="{{ $newRol }}"></td>
                <td>{{ $student->StudentRoll }}</td>
                <td>{{ $student->StudentName }}</td>
                <td><select  class="group" name="StudentGroup[{{ $student->AdmissionID }}]"  >
                    <option value="">Select</option>
                    <option @php if($student->StudentGroup=='Humanities'){echo 'selected'; }@endphp value="Humanities">Humanities</option>
                    <option @php if($student->StudentGroup=='Science'){echo 'selected'; }@endphp value="Science">Science</option>
                </select></td>
                <td><select  class="subject"  name="StudentSubject[{{ $student->AdmissionID }}]" >
                    <option value="">Select</option>
                    <option @php if($student->StudentSubject=='Agriculture'){echo 'selected'; }@endphp value="Agriculture">কৃষি শিক্ষা</option>
                    <option @php if($student->StudentSubject=='Higher_Mathematics'){echo 'selected'; }@endphp value="Higher_Mathematics">উচ্চতর গণিত</option>
                </select></td>

                @php
                $newRol++;
            @endphp

                        @endforeach

            </tr>
        </tbody>


    </table>


    <button type="submit" class="btn btn-info">Submit</button>


</form>









</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result Published</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">






        <a href="/dashboard/results" class="btn btn-danger mb-5">Back</a>


        <h5>Class :- {{ $filter['class'] }}</h5>
        <h5>Group :- {{ $filter['class_group'] }}</h5>
        <h5>Exam Name :- {{ $filter['exam_name'] }}</h5>



        <form action="/dashboard/results/publish/list" method="post">
            @csrf
            <button class="btn btn-info" type="submit">Publish Now</button>

            <a href="/dashboard/results/publish/{{ $filter['school_id'] }}/{{ $filter['class'] }}/{{ $filter['class_group'] }}/{{ $filter['exam_name'] }}/{{  $filter['year'] }}?veiwType=noticePdf" target="_blank" type="button" class="btn btn-success">Download for Notice</a>

            <a href="/dashboard/results/publish/{{ $filter['school_id'] }}/{{ $filter['class'] }}/{{ $filter['class_group'] }}/{{ $filter['exam_name'] }}/{{  $filter['year'] }}?veiwType=schoolPdf" target="_blank" type="button" class="btn btn-success">Download for School</a>

        <table width="100%" class="table">

            <thead>
                <tr>
                    <th>
                        <div class="form-group form-check">

                            <label class="form-check-label" for="checkall">নতুন রোল</label>
                        </div>
                    </th>
                    <th>পূর্বের রোল</th>
                    <th>ছাত্র/ছাত্রীর নাম</th>
                    <th>ব্যর্থ হয়েছে</th>
                    <th>মোট নাম্বার</th>
                </tr>
            </thead>

            <tbody>



                <input type="hidden" name="school_id" value="{{ $results[0]->school_id }}">
                <input type="hidden" name="class" value="{{ $results[0]->class }}">
                <input type="hidden" name="year" value="{{ $results[0]->year }}">
                <input type="hidden" name="exam_name" value="{{ $results[0]->exam_name }}">
                <input type="hidden" name="class_group" value="{{ $results[0]->class_group }}">

                @foreach($results as $key => $result)




                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" @if($result->FinalResultStutus=='inhaled')  @else checked @endif  name="status[{{ $result->id }}]" id="checkbox{{ $key }}" value="Published">
                            <label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $key+1 }}</label>
                        </div>
                    </td>
                    <td><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->roll }}</label></td>
                    <td><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->name }}</label></td>
                    <td><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->failed }}</label></td>
                    <td><label class="form-check-label d-block" for="checkbox{{ $key }}">{{ $result->total }}</label></td>
                </tr>

                @endforeach

            </tbody>


        </table>
        <button class="btn btn-info" type="submit">Publish Now</button>
    </form>

        </div>
        <script language="JavaScript">
            function toggle(source) {
              checkboxes = document.getElementsByName('status[]');
              for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
              }
            }
            </script>


</body>
</html>






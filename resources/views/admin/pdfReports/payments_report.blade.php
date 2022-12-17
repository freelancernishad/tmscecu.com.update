

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



    {!! SchoolPad($payments[0]->school_id) !!}



         <span> Date :  {{ date('d-m-Y', strtotime($from)) }} - {{ date('d-m-Y', strtotime($to)) }}</span> <br>

         <span> Class :  {{ $class }}</span> <br>
         <span> Category :  {{ $type }}</span> <br>


         <table class="table text-nowrap" style="border-collapse: collapse;width:100%">
            <thead>
                <tr>
                    <th scope="col" v-if="form.type=='Admission_fee'">SL</th>
                    {{-- <th scope="col" v-else>Roll</th> --}}
                    <th  class="tablecolhide" scope="col">Date</th>
                    <th scope="col">Transition Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th  class="tablecolhide" scope="col">Type</th>
                    <th scope="col">status</th>
                    <th  class="tablecolhide" scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($payments as $key => $value)
                <tr v-for="(report,index) in reports" :key="index">
                    <td scope="col" v-if="form.type=='Admission_fee'">{{ $key+1 }}</td>
                    {{-- <th scope="col" v-else>{{ report.roll }}</th> --}}

                    <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                    <td>{{ $value->trxid }}</td>
                    <td>{{ $value->Name }}</td>
                    <td>{{ $value->studentClass }}</td>
                    <td>{{ $value->type }}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->amount }}</td>
                </tr>
                @php
                $total += $value->amount;
            @endphp
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan='7' style="text-align: right">Total</td>
                    <td>{{ $total }}</td>
                </tr>
            </tfoot>
        </table>






</body>
</html>

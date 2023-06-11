<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $fileName }}</title>


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



	table{
		border-collapse: collapse;
		width:100%
	}
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">












        <table>


            <tr>
                <td colspan="14" style="font-size: 18px;text-align:center;padding:10px;">ষাণ্মাসিক/বার্ষিক সামষ্টিক মূল্যায়ন</td>
            </tr>


            <tr>
                <td colspan="2" style="font-size: 18px;text-align:center;padding:10px;">প্রতিষ্ঠানের নাম </td>
                <td colspan="7" style="font-size: 18px;padding:10px;">{{ sitedetails()->SCHOLL_NAME}} </td>
                <td colspan="5" >তারিখ </td>
            </tr>



            <tr>
                <td colspan="3" style="padding:18px;">শ্রেণি :- {{ class_en_to_bn($class) }} </td>
                <td colspan="6" style="padding:18px;">বিষয় </td>
                <td colspan="5" style="padding:18px;">শিক্ষকের নাম ও স্বাক্ষর </td>
            </tr>



            <tr>
                <td colspan="4"></td>
                <td colspan="10" style="text-align: center">প্রযোজ্য PI/BI নং  </td>

            </tr>





            <tr>
                <th class="columnStyleLeft" width='5%' style="font-size: 10pt;">রোল নং</th>
                <th class="columnStyleRight" width='15%' colspan="3" style="font-size: 10pt;">নাম </th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>
                <th class="columnStyleRight" style="font-size: 10pt;"></th>


            </tr>

     @foreach ($students as $row)

                <tr>
                    <td class="columnStyleLeft" style="font-size: 10pt;"><?php echo int_en_to_bn($row->StudentRoll) ?></td>
                    <td class="columnStyleRight"  colspan="3" style="font-size: 10pt;"><?php echo $row->StudentName	?></td>

                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>


                    <th class="columnStyleRight" width='10%' style="font-size: 10pt;">
                        <img width='14px' style="float: left" src="{{ $icon1 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon2 }}" alt="">
                        <img width='14px' style="float: left" src="{{ $icon3 }}" alt="">
                    </th>



                </tr>

  @endforeach

        </table>




		</div>
    </section>


</body>
</html>

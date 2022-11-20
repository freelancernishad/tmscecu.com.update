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
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 14px;
    }
       th{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 14px;
    }

    .li{
        font-size: 10px;
    }



	table{
		border-collapse: collapse;
		width:100%
	}
    .result{
        border-bottom: 1px dotted black;
        margin-left:10px !important;
    }
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">




            <h3 style="text-align:center;margin:0;" >{{ sitedetails()->SCHOLL_NAME}} </h3>
            <h4 style="text-align:center; margin:0;" >{{ sitedetails()->SCHOLL_ADDRESS}} </h4>



            <table class="table " border="1">
                <thead class="thead-dark">
                    <tr class="bg-dark">
                        <th scope="col" colspan="15">
                            <h2>
                                <center>{{ class_en_to_bn($class) }} রুটিন {{ int_en_to_bn($year) }}</center>
                                </center>
                            </h2>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">বারের নাম</th>
                        <th scope="col">১ম পিরিয়ড</th>
                        <th scope="col">২য় পিরিয়ড</th>
                        <th scope="col">৩য় পিরিয়ড</th>
                        <th scope="col">৪র্থ পিরিয়ড</th>
                        <th scope="col">৫ম পিরিয়ড</th>
                        <th scope="col">৬ষ্ঠ পিরিয়ড</th>
                        <th scope="col">৭ম পিরিয়ড</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                foreach ($rows as $row) {
                    ?>
                            <tr>
                                <td scope="col">
                                    {{ day_en_to_bn($row->week_name) }}
                                </td>
                                <td scope="col">
                                    {{ $row->first_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->second_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->thard_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->fourth_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->fith_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->sixth_period }}
                                </td>
                                <td scope="col">
                                    {{ $row->seventh_period }}
                                </td>

                            </tr>
                    <?php

                        }

                    ?>
                </tbody>
            </table>







            <table width="100%" style="margin-top:50px">

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





</body>
</html>

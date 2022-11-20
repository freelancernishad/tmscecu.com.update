<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fileName }}</title>
    <style>
        .m-0 {
            margin: 0;
        }
        .text-center {
            text-align: center;
        }
        .td {
            border: 1px dotted black;
            padding: 4px 10px;
            font-size: 12px;
        }
        th {
            border: 1px dotted black;
            padding: 4px 10px;
            font-size: 12px;
        }
        .li {
            font-size: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%
        }
        .result {
            border-bottom: 1px dotted black;
            margin-left: 10px !important;
        }
    </style>
</head>
<body style="font-family: 'bangla', sans-serif;">



    <?php
                            $bokeya = json_decode($rows->bokeya);
$bTotal = 0;
?>
    @foreach ($bokeya as $list)
    <?php
                                 $bTotal = $bTotal+$list->Bamount;
// echo numberTowords(120);
                                ?>
    @endforeach

    <div style="width:450px;margin:auto;border:1px solid black;padding:10px">


        <table style=="width:400px !important">
            <tr>
                <td><img style="width:80px" src="{!! $logo !!}" alt=""></td>
                <td colspan="2">
                    <h2 style="text-align:justify;margin:0;">{{ $school_detail->SCHOLL_NAME }}</h2>
                    <h4 style="text-align:justify; margin:0;">{{ $school_detail->SCHOLL_ADDRESS }}</h4>
                </td>
            </tr>
        </table>
        <div
            style="background:black;color:white;width:150px;text-align:center;padding:3px;border-radius:20px;margin:10px auto">
            টাকা জমার রশিদ</div>
        <table style=="width:400px !important">
            <tr>
                <td colspan="3" style="text-align:left !important;">শিক্ষার্থীর নামঃ <span class="result">{{
                        $rows->Name }}</span></td>
            </tr>
        </table>
        <table style=="width:400px !important">
            <tr>
                <td colspan="2">অভিভাবকের নামঃ <span class="result">{{ $stdata->StudentFatherName }}</span></td>
            </tr>
        </table>
        <table style=="width:400px !important">
            <tr>
                <td> ঠিকানাঃ {{ $stdata->StudentAddress }}</td>
                <td> শ্রেণীঃ {{ class_en_to_bn($rows->studentClass) }} </td>
                <td> রোলঃ {{ int_en_to_bn($rows->studentRoll) }} </td>
            </tr>
        </table>




                <table class="table table-sm mt-3">
                    <tr class="table-success">
                        <td class="pl-5 td pr-5 " colspan="3">
                            <span>ফি প্রদানদের তারিখ : @php
                                $orgDate = $rows->created_at;
                                $newDate = date("Y-d-m h:i:s A", strtotime($orgDate));
                                echo int_en_to_bn($newDate);
                                @endphp</span>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td class="pl-5 td pr-5 " colspan="3"> <b>
                                <center>
                                    <h4 style="font-size:25px">রশিদ</h4>
                                </center>
                            </b></td>
                    </tr>
                    <tr class="table-primary">
                        <td class="pl-5 td pr-5 "> <b>
                                <h5 style="font-size:18px">বিবরণ</h5style=>
                            </b></td>
                        <td class="pl-5 td pr-5 "> <b>
                            </b></td>
                        <td class="pl-5 td pr-5 "> <b>
                                <h5 style="font-size:18px">টাকা</h5>
                            </b></td>
                    </tr>
                    <tr class="table-primar">
                        <td class="pl-5 td pr-5 "> <b>{{ $rows->type }}</b></td>
                        <td class="pl-5 td"> <b class="ml-5">{{ month_en_to_bn($rows->month) }}</b></td>
                        <td class="td">{{ int_en_to_bn($rows->amount) }}</td>
                    </tr>
                    <?php
                            $bokeya = json_decode($rows->bokeya);
$bTotal = 0;
?>
                    @foreach ($bokeya as $list)
                    <?php
                                $bTotal = $bTotal+$list->Bamount;
                                ?>
                    @if($list->Bmonth==null)
                    @else
                    <tr class="table-primar">
                        <td class="pl-5 td pr-5 "> <b>বকেয়া</b></td>
                        <td class="pl-5 td"> <b class="ml-5">{{ month_en_to_bn($list->Bmonth) }}</b></td>
                        <td class="td">{{ int_en_to_bn($list->Bamount) }}</td>
                    </tr>
                    @endif
                    @endforeach
                    <tr class="table-primar">
                        <td class="pl-5 td pr-5 "> <b>মোট</b></td>
                        <td class="pl-5 td"> <b class="ml-5">:</b></td>
                        <td class="td">{{ int_en_to_bn($rows->amount+$bTotal) }}</td>
                    </tr>
                </table>

                <table style=="width:400px !important">
                    <tr>
                        <td colspan="3"> কথায়ঃ {{ $TotalAmount }} মাত্র </td>
                    </tr>
                </table>
                <?php
if($types=='pdf'){
?>
                <table width="100%" style="margin-top:10px;margin-bottom:40px">
                    <tr>
                        <td style="  border: 0px dotted black;
	padding:20px 10px 10px 10px;
	font-size: 12px;">{!! $qrcode !!} <br><br>
                            <span style="background:red;color:white;padding:10px;font-size:16px">QR Code স্ক্যান করে
                                রশিদ যাচাই করুন</span>
                        </td>
                        <td style="  border: 0px dotted black;
	padding:20px 10px 10px 10px;
	font-size: 12px;"></td>
                        <td style="  border: 0px dotted black;
	padding:20px 10px 10px 10px;
	font-size: 12px;text-align:center;font-size:20px" width="35%">
                            {{-- <img width="75px" src="{{ //$sign }}" alt=""> --}}
                            {{--
                            <h3 style="margin:0;text-align:center;">স্বাক্ষর</h3>
                            <h4 style="margin:0;text-align:center;font-size:16px">অধ্যক্ষ</h4>
                            <h4 style="margin:0;text-align:center;font-size:16px">মোঃ মঞ্জুরুল ইসলাম</h4>
                            <h4 style="margin:0;text-align:center;font-size:16px">টেপ্রীগঞ্জ ,দেবীগঞ্জ ,পঞ্চগড়</h4> --}}
                        </td>
                    </tr>
                </table>
                <?php
	 }else{
?>
                <?php
	} ?>
                <table style=="width:400px !important;margin-top:40px">
                    <tr style="margin-top:50px !important">
                        <td> আদায়কারীর স্বাক্ষর </td>
                        <td> </td>
                        <td style="text-align:right"> প্রদানকারীর স্বাক্ষর/টিপ </td>
                        </t>
                    <tr>
                </table>
            </div>
</body>
</html>

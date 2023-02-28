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
        font-size: 12px;
    }    th{
        border: 1px dotted black;
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







<?php
if($pdf=='pdf'){
    ?>


<h2 style="text-align:center;margin:0" >{{ sitedetails()->SCHOLL_NAME}} </h2>
<h3 style="text-align:center; margin:0;" >{{ sitedetails()->SCHOLL_ADDRESS}} </h3>



<?php
}
?>
<h3> মোট ছাত্র সংখ্যা :  <?php echo int_en_to_bn($count);    ?></h3><h3> শ্রেণী :  <?php echo class_en_to_bn($rows[0]->StudentClass)	?></h3>

<h3> গ্রুপ :  <?php echo class_en_to_bn($rows[0]->StudentGroup)	?></h3>

<?php
if ($count>0) {
    ?>
        <table @if($pdf!='pdf') style="    margin: 30px 0 50px 0;" @endif>



            <tr>
                <th class="columnStyleLeft" style="font-size: 10pt;">রোল</th>
                <th class="columnStyleRight" style="font-size: 10pt;">নাম </th>

<?php
if($pdf=='pdf' && $types=='school'){
    ?>
                <th class="columnStyleRight" style="font-size: 10pt;">মোবাইল নাম্বার </th>
                <?php } ?>

                <th class="columnStyleRight" style="font-size: 10pt;">পিতার নাম</th>
                <th class="columnStyleRight" style="font-size: 10pt;">মাতার নাম</th>
                <th class="columnStyleRight" style="font-size: 10pt;">ঠিকানা </th>
            </tr>
            <?php
            $counter = "1";

            ?>
     @foreach ($rows as $row)



                <tr>
                    <td class="columnStyleLeft" style="font-size: 10pt;"><?php echo int_en_to_bn($row->StudentRoll) ?></td>
                    <td class="columnStyleRight" style="font-size: 10pt;"><?php echo $row->StudentName	?></td>

                    <?php
                    if($pdf=='pdf'  && $types=='school'){
                        ?>
                    <td class="columnStyleRight" style="font-size: 10pt;"><?php echo class_en_to_bn($row->StudentPhoneNumber)	?> </td>
<?php } ?>
                    <td class="columnStyleRight" style="font-size: 10pt;"><?php echo $row->StudentFatherNameBn	?> </td>
                    <td class="columnStyleRight" style="font-size: 10pt;"><?php echo $row->StudentMotherNameBn	?> </td>
                    <td class="columnStyleRight" style="font-size: 10pt;"><?php echo $row->StudentAddress	?> </td>
                </tr>
            <?php
                $counter++;

            ?>
  @endforeach

        </table>
    <?php
    } else {
        echo "<h4 class='mt-3'><font color='red'>No Data Found!</font></h4>";
    }
    ?>



		</div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".close").click(function() {
                $(".view").remove();
            })
        })
    </script>


</body>
</html>

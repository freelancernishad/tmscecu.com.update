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
    section.view.about--part1 {
    margin: 15px 0 50px 0;
}
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">




	<?php





	if($types=='pdf'){

$studentData = '<tr class="table-success">






<td class="pl-5 pr-5" style="  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;"> <b>
	<h3> নামঃ   &nbsp; &nbsp;'.$rows[0]->name.'
	</h3>

	</b></td>





<td class="pl-5 pr-5" style="  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;"> <b>
	<h3>   রোলঃ &nbsp; &nbsp;'.$rows[0]->roll.'
	</h3>

	</b></td>





<td class="pl-5 pr-5"  style="  border: 0px dotted black;
padding:20px 10px 10px 10px;
font-size: 12px;"> <b>
	<h3> শ্রেণিঃ &nbsp; &nbsp;'.$rows[0]->class.'
	</h3>

	</b></td>






</tr>



<tr class="table-success">

<td class="pl-5 pr-5" style="  border: 0px dotted black;
padding:10px 10px 20px 10px;
font-size: 12px;"> <b>
	<h3> পিতার নামঃ &nbsp; &nbsp; '.$stdata[0]->StudentFatherName.'
	</h3>

	</b></td>





<td class="pl-5 pr-5" style="  border: 0px dotted black;
padding:10px 10px 20px 10px;
font-size: 12px;"> <b>
	<h3> মাতার নামঃ &nbsp; &nbsp; '.$stdata[0]->StudentMotherName.'
	</h3>

	</b></td>





<td class="pl-5 pr-5" style="  border: 0px dotted black;
padding:10px 10px 20px 10px;
font-size: 12px;"> <b>
	<h3>   ঠিকানাঃ  &nbsp; &nbsp; '.$stdata[0]->StudentAddress.'
	</h3>

	</b></td>






</tr>';


// <h3>নামঃ'.$rows[0]->name.'  &nbsp; &nbsp; &nbsp; &nbsp;    রোলঃ'.$rows[0]->roll.'   &nbsp; &nbsp; &nbsp; &nbsp;    শ্রেণিঃ'.$rows[0]->class.'   &nbsp; &nbsp; &nbsp; &nbsp;     পিতার নামঃ '.$stdata[0]->StudentFatherName.'  &nbsp; &nbsp; &nbsp; &nbsp;   মাতার নামঃ '.$stdata[0]->StudentMotherName.'  &nbsp; &nbsp; &nbsp; &nbsp;   ঠিকানাঃ  '.$stdata[0]->StudentAddress.'
// 	</h3>

 }else{





$studentData = '<tr class="table-success">
		<td class="pl-5 pr-5" colspan="3"> <b>
				<center>
					<h4>STUDENT DETAILS</h4>
				</center>
			</b></td>
	</tr>
	<tr class="table-primar">
		<td class="pl-5 pr-5"> <b>নাম</b></td>
		<td class="pl-5"> <b class="ml-5">:</b></td>
		<td>'.$rows[0]->name.'</td>
	</tr>
	<tr class="table-primar">
		<td class="pl-5 pr-5"> <b>রোল</b></td>
		<td class="pl-5"> <b class="ml-5">:</b></td>
		<td>'.$rows[0]->roll.'</td>
	</tr>
	<tr class="table-primar">
		<td class="pl-5 pr-5"> <b>শ্রেণী</b></td>
		<td class="pl-5"> <b class="ml-5">:</b></td>
		<td>'.$rows[0]->class.'</td>
	</tr>
	<tr class="table-primar">
		<td class="pl-5 pr-5"> <b>সাল</b></td>
		<td class="pl-5"> <b class="ml-5">:</b></td>
		<td>'.$rows[0]->year.'</td>
	</tr>
	<tr class="table-primar">
		<td class="pl-5 pr-5"> <b>পরীক্ষার নাম</b></td>
		<td class="pl-5"> <b class="ml-5">:</b></td>
		<td>'.$rows[0]->exam_name.'</td>
	</tr>';


} ?>








<?php

	if($types=='pdf'){



	?>


<h3 style="text-align:center;margin:0;" >{{ sitedetails()->SCHOLL_NAME}} </h3>
<h4 style="text-align:center; margin:0;" >{{ sitedetails()->SCHOLL_ADDRESS}} </h4>
<h4 style="text-align:center; margin:0;" > {{ $rows[0]->exam_name }}</h4>

<?php }else{

?>
<div style="overflow: hidden;">
<a target="_blank" class="btn btn-info" style="float: right;" href="{{ url('/pdf/'.$class.'/'.$roll.'/'.$year.'/'.$exam_name) }}">Print Sheet</a>
</div>
<?php

} ?>

<?php

if ($class == 'Play' || $class == 'Nursery' || $class == 'One' || $class == 'Two') {

	if ($check>0) {
?>
@foreach ($rows as $row)
<?php
			$Bangla_1st = $row->Bangla_1st;

			$English_1st = $row->English_1st;

			$math = $row->Math;


			$total = $row->total;
			//$total = $Bangla_1st+$Bangla_2nd+$English_1st+$English_2nd+$math+$science+$B_and_B+$religion+$Agriculture+$ICT;
?>




			<section class="view about--part1">
				<div class="view_display" style="overflow:hidden">

                    <table width="100%">
                        <?php

						echo $studentData;
						?>

                    </table>
					<table class="width-50 table table-sm mt-3" width="100%">








						<tr class="table-success">
							<td class="pl-5 pr-5" colspan="3"> <b>
									<center>
										<h4>SUBJECT DETAILS</h4>
									</center>
								</b></td>
						</tr>
						<tr class="table-primary">
							<td class="pl-5 pr-5" colspan="2"> <b>
									<h5>SUBJECT</h5>
								</b></td>
							<td class="pl-5 pr-5" colspan="1"> <b>
									<h5>MARK</h5>
								</b></td>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বাংলা</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $Bangla_1st ?></td>
						</tr>

						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>ইংলিশ</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $English_1st ?></td>
						</tr>

						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>গনিত</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $math ?></td>
						</tr>


						</tr>
						<tr class="table-primar">
							<td colspan="3" class="pl-5 pr-5"> <b></b></td>
						</tr>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>Total</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $total; ?></td>
						</tr>
					</table>
                    @endforeach
				<?php
		} else {
				?>
				<section class="view about--part1">
					<div class="view_display" style="overflow:hidden">

						<center class="mt-5">
							<h1>No Data Found!</h1>
						</center>
					</div>
				</div>
			</section>
			<?php
		}
}else if ($class == 'Three' || $class == 'Four' || $class == 'Five') {

	if ($check>0) {
?>
@foreach ($rows as $row)
<?php
			$Bangla_1st = $row->Bangla_1st;

			$English_1st = $row->English_1st;

			$math = $row->Math;
			$science = $row->Science;
			$B_and_B = $row->B_and_B;
			$religioni = $row->ReligionIslam;


		$religionh = $row->ReligionHindu;
			$Agriculture = $row->Agriculture;

			$total = $row->total;
			//$total = $Bangla_1st+$Bangla_2nd+$English_1st+$English_2nd+$math+$science+$B_and_B+$religion+$Agriculture+$ICT;
?>




			<section class="view about--part1">
				<div class="view_display" style="overflow:hidden">
                    <table width="100%">
                        <?php

						echo $studentData;
						?>

                    </table>
					<table class="width-50 table table-sm mt-3" width="100%">



						<tr class="table-success">
							<td class="pl-5 pr-5" colspan="3"> <b>
									<center>
										<h4>SUBJECT DETAILS</h4>
									</center>
								</b></td>
						</tr>
						<tr class="table-primary">
							<td class="pl-5 pr-5"> <b>
									<h5>বিষয়</h5>
								</b></td>

							<td class="pl-5 pr-5" colspan="1"> <b>
									<h5>লিখিত</h5>
								</b></td>
							<td class="pl-5 pr-5" colspan="1"> <b>
									<h5>বহুনির্বাচনী</h5>
								</b></td>
							<td class="pl-5 pr-5" colspan="1"> <b>
									<h5>অতিরিক্ত</h5>
								</b></td>
							<td class="pl-5 pr-5" colspan="1"> <b>
									<h5>মোট</h5>
								</b></td>


						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বাংলা</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $Bangla_1st ?></td>
						</tr>

						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>ইংলিশ</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $English_1st ?></td>
						</tr>

						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>গনিত</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $math ?></td>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বিজ্ঞান</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $science ?></td>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বাংলাদেশ ও বিশ্ব পরিচয়</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $B_and_B ?></td>
						</tr>
						<?php
						if($row->StudentReligion=='Islam'){


							?>



														<tr class="table-primar" style="display:none">
															<td class="pl-5 pr-5"> <b>ইসলাম ধর্ম</b></td>
															<td class="pl-5"> <b class="ml-5">:</b></td>
															<td> <?php echo $religioni ?></td>
														</tr>

							<?php
							}else if($row->StudentReligion=='Hindu'){


							?>

							<tr class="table-primar" style="display:none">
								<td class="pl-5 pr-5"> <b>হিন্দু ধর্ম</b></td>
								<td class="pl-5"> <b class="ml-5">:</b></td>
								<td> <?php echo $religionh ?></td>
							</tr>


							<?php


							}
							?>

						</tr>
						<tr class="table-primar">
							<td colspan="3" class="pl-5 pr-5"> <b></b></td>
						</tr>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>Total</b></td>
							<td class="pl-5"> <b class="ml-5">:</b></td>
							<td> <?php echo $total; ?></td>
						</tr>
					</table>
                    @endforeach
				<?php
		} else {
				?>
				<section class="view about--part1">
					<div class="view_display" style="overflow:hidden">

						<center class="mt-5">
							<h1>No Data Found!</h1>
						</center>
					</div>
				</div>
			</section>
			<?php
		}
	}
else if ($class == "Six" || $class == "Seven" || $class == "Eight") {

	if ($check>0) {
?>
@foreach ($rows as $row)
<?php
			$Bangla_1st = $row->Bangla_1st;
			$Bangla_1st_d = json_decode($row->Bangla_1st_d);


			$Bangla_2nd = $row->Bangla_2nd;
            $Bangla_2nd_d = json_decode($row->Bangla_2nd_d);
			$English_1st = $row->English_1st;
            $English_1st_d = json_decode($row->English_1st_d);
			$English_2nd = $row->English_2nd;
            $English_2nd_d = json_decode($row->English_2nd_d);
			$math = $row->Math;
            $math_d = json_decode($row->Math_d);
			$science = $row->Science;
            $Science_d = json_decode($row->Science_d);

			$B_and_B = $row->B_and_B;
            $B_and_B_d = json_decode($row->B_and_B_d);
			$religioni = $row->ReligionIslam;
            $religioni_d = json_decode($row->ReligionIslam_d);


		    $religionh = $row->ReligionHindu;
            $religionh_d = json_decode($row->ReligionHindu_d);
			$Agriculture = $row->Agriculture;
            $Agriculture_d = json_decode($row->Agriculture_d);

			$ICT = $row->ICT;
            $ICT_d = json_decode($row->ICT_d);
            // "Physical_Education_and_Health","Arts_and_Crafts","Work_and_life_oriented_education","Career_Education"

			$Physical_Education_and_Health = $row->Physical_Education_and_Health;
            $Physical_Education_and_Health_d = json_decode($row->Physical_Education_and_Health_d);

			$Arts_and_Crafts = $row->Arts_and_Crafts;
            $Arts_and_Crafts_d = json_decode($row->Arts_and_Crafts_d);

			$Work_and_life_oriented_education = $row->Work_and_life_oriented_education;
            $Work_and_life_oriented_education_d = json_decode($row->Work_and_life_oriented_education_d);




			$total = $row->total;

			//$total = $Bangla_1st+$Bangla_2nd+$English_1st+$English_2nd+$math+$science+$B_and_B+$religion+$Agriculture+$ICT;
?>




			<section class="view about--part1">
				<div class="view_display" style="overflow:hidden">

                    <table width="100%">
                        <?php

						echo $studentData;
						?>

                    </table>

					<table class="width-50 table table-sm mt-3" width="100%">

						<tr class="table-success">
							<td class="pl-5 pr-5" colspan="5"> <b>
									<center>
										<h4>SUBJECT DETAILS</h4>
									</center>
								</b></td>
						</tr>
						<tr class="table-primary">
                            <td class="pl-5 pr-5" width="20%"> <b>
                                <h5>বিষয়</h5>
                            </b></td>

                        <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                <h5>লিখিত</h5>
                            </b></td>
                        <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                <h5>বহুনির্বাচনী</h5>
                            </b></td>
                        <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                <h5>অতিরিক্ত</h5>
                            </b></td>
                        <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                <h5>মোট</h5>
                            </b></td>
						</tr>



						<tr class="table-primar">
                            @if ($class == "Eight")

							<td class="pl-5 pr-5"> <b>বাংলা</b></td>
                            @else
							<td class="pl-5 pr-5"> <b>বাংলা ১ম</b></td>
                            @endif
							<td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->EXTRA }}</b></td>
							<td> <?php echo $Bangla_1st ?></td>
						</tr>

						@if($Bangla_2nd)
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বাংলা ২য়</b></td>
                            <td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->EXTRA }}</b></td>
							<td> <?php echo $Bangla_2nd ?></td>
						</tr>
						@endif


						<tr class="table-primar">
                            @if ($class == "Eight")

                            <td class="pl-5 pr-5"> <b>ইংলিশ</b></td>
                            @else
                            <td class="pl-5 pr-5"> <b>ইংলিশ ১ম</b></td>
                            @endif
						
							<td class="pl-5"> <b class="ml-5">{{ $English_1st_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $English_1st_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $English_1st_d->EXTRA }}</b></td>
							<td> <?php echo $English_1st ?></td>
						</tr>
						@if($English_2nd)
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>ইংলিশ ২য়</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->EXTRA }}</b></td>
							<td> <?php echo $English_2nd ?></td>
						</tr>
						@endif





						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>গনিত</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $math_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $math_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $math_d->EXTRA }}</b></td>
							<td> <?php echo $math ?></td>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বিজ্ঞান</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Science_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Science_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Science_d->EXTRA }}</b></td>
							<td> <?php echo $science ?></td>
						</tr>
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>বাংলাদেশ ও বিশ্ব পরিচয়</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->EXTRA }}</b></td>
							<td> <?php echo $B_and_B ?></td>
						</tr>
			<?php
if($row->StudentReligion=='Islam'){


	?>



								<tr class="table-primar" style="display:none">
									<td class="pl-5 pr-5"> <b>ইসলাম ধর্ম</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->CQ }}</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->MCQ }}</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->EXTRA }}</b></td>
									<td> <?php echo $religioni ?></td>
								</tr>

	<?php
	}else if($row->StudentReligion=='Hindu'){


	?>

	<tr class="table-primar" style="display:none">
		<td class="pl-5 pr-5"> <b>হিন্দু ধর্ম</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->CQ }}</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->MCQ }}</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->EXTRA }}</b></td>
		<td> <?php echo $religionh ?></td>
	</tr>


	<?php


	}
	?>


@if($Agriculture)
						<tr class="table-primar" style="display:none">
							<td class="pl-5 pr-5"> <b>কৃষি</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->EXTRA }}</b></td>
							<td> <?php echo $Agriculture ?></td>
						</tr>
@endif




						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>তথ্য ও যোগাযোগ প্রযোক্তি</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->EXTRA }}</b></td>
							<td> <?php echo $ICT ?></td>
						</tr>

{{--
						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>শারীরিক শিক্ষা ও স্বাস্থ্য</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->EXTRA }}</b></td>
							<td> <?php echo $Physical_Education_and_Health ?></td>
						</tr>


						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>চারু ও কারুকলা</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->EXTRA }}</b></td>
							<td> <?php echo $Arts_and_Crafts ?></td>
						</tr>


						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>কর্ম ও জীবনমুখী শিক্ষা</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Work_and_life_oriented_education_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Work_and_life_oriented_education_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Work_and_life_oriented_education_d->EXTRA }}</b></td>
							<td> <?php echo $Work_and_life_oriented_education ?></td>
						</tr>
 --}}





						<tr class="table-primar">

							<td class="pl-5" colspan="4" style="text-align: right"> <b class="ml-5">মোট</b></td>
							<td> <?php echo $total; ?></td>
						</tr>
					</table>
                    @endforeach
				<?php
		} else {
				?>
				<section class="view about--part1">
					<div class="view_display" style="overflow:hidden">

						<center class="mt-5">
							<h1>No Data Found!</h1>
						</center>
					</div>
				</div>
			</section>
			<?php
		}
	} elseif ($class == "Nine" || $class == "Ten") {

		if ($check>0) {
            ?>
@foreach ($rows as $row)
<?php
			$Bangla_1st = $row->Bangla_1st;
			$Bangla_1st_d = json_decode($row->Bangla_1st_d);


			$Bangla_2nd = $row->Bangla_2nd;
            $Bangla_2nd_d = json_decode($row->Bangla_2nd_d);
			$English_1st = $row->English_1st;
            $English_1st_d = json_decode($row->English_1st_d);
			$English_2nd = $row->English_2nd;
            $English_2nd_d = json_decode($row->English_2nd_d);
			$math = $row->Math;
            $math_d = json_decode($row->Math_d);



				$Chemistry = $row->Chemistry;
                $chemistry_d = json_decode($row->Chemistry_d);
				$physics = $row->physics;
                $physics_d = json_decode($row->physics_d);
				$Biology = $row->Biology;
                $biology_d = json_decode($row->Biology_d);
				$B_and_B = $row->B_and_B;
                $B_and_B_d = json_decode($row->B_and_B_d);



				$vugol = $row->vugol;
                $vugol_d = json_decode($row->vugol_d);
				$orthoniti = $row->orthoniti;
                $orthoniti_d = json_decode($row->orthoniti_d);
				$Science = $row->Science;
                $Science_d = json_decode($row->Science_d);
				$itihas = $row->itihas;
                $itihas_d = json_decode($row->itihas_d);




			$religioni = $row->ReligionIslam;
            $religioni_d = json_decode($row->ReligionIslam_d);


		    $religionh = $row->ReligionHindu;
            $religionh_d = json_decode($row->ReligionHindu_d);

			$Agriculture = $row->Agriculture;
            $Agriculture_d = json_decode($row->Agriculture_d);


			$Higher_Mathematics = $row->Higher_Mathematics;
            $Higher_Mathematics_d = json_decode($row->Higher_Mathematics_d);


			$ICT = $row->ICT;
            $ICT_d = json_decode($row->ICT_d);


			$Physical_Education_and_Health = $row->Physical_Education_and_Health;
            $Physical_Education_and_Health_d = json_decode($row->Physical_Education_and_Health_d);

			$Arts_and_Crafts = $row->Arts_and_Crafts;
            $Arts_and_Crafts_d = json_decode($row->Arts_and_Crafts_d);



            $Career_Education = $row->Career_Education;
            $Career_Education_d = json_decode($row->Career_Education_d);



                $total = $row->total;
				//$total = $Bangla_1st + $Bangla_2nd + $English_1st + $English_2nd + $math + $Chemistry + $physics + $Biology + $B_and_B + $religion + $Agriculture + $ICT;
			?>
				<section class="view about--part1">
					<div class="view_display" style="overflow:hidden">

                        <table width="100%">
                            <?php

                            echo $studentData;
                            ?>

                        </table>
						<table class="table table-sm mt-3" >


							<tr class="table-success">
								<td class="pl-5 pr-5" colspan="5"> <b>
										<center>
											<h4>SUBJECT DETAILS</h4>
										</center>
									</b></td>
							</tr>
							<tr class="table-primary">
                                <td class="pl-5 pr-5" width="20%"> <b>
                                    <h5>বিষয়</h5>
                                </b></td>

                            <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                    <h5>লিখিত</h5>
                                </b></td>
                            <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                    <h5>বহুনির্বাচনী</h5>
                                </b></td>
                            <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                    <h5>অতিরিক্ত</h5>
                                </b></td>
                            <td class="pl-5 pr-5" width="20%" colspan="1"> <b>
                                    <h5>মোট</h5>
                                </b></td>
                            </tr>
                            <tr class="table-primar">
                                <td class="pl-5 pr-5"> <b>বাংলা ১ম</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_1st_d->EXTRA }}</b></td>
                                <td> <?php echo $Bangla_1st ?></td>
                            </tr>
                            <tr class="table-primar">
                                <td class="pl-5 pr-5"> <b>বাংলা ২য়</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Bangla_2nd_d->EXTRA }}</b></td>
                                <td> <?php echo $Bangla_2nd ?></td>
                            </tr>
                            <tr class="table-primar">
                                <td class="pl-5 pr-5"> <b>ইংলিশ ১ম</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_1st_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_1st_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_1st_d->EXTRA }}</b></td>
                                <td> <?php echo $English_1st ?></td>
                            </tr>
                            <tr class="table-primar">
                                <td class="pl-5 pr-5"> <b>ইংলিশ ২য়</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $English_2nd_d->EXTRA }}</b></td>
                                <td> <?php echo $English_2nd ?></td>
                            </tr>
                            <tr class="table-primar">
                                <td class="pl-5 pr-5"> <b>গনিত</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $math_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $math_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $math_d->EXTRA }}</b></td>
                                <td> <?php echo $math ?></td>
                            </tr>


<?php
if($row->class_group=='Science'){


?>

							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>রসায়ন</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $chemistry_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $chemistry_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $chemistry_d->EXTRA }}</b></td>
								<td> <?php echo $Chemistry ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>পদার্থ</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $physics_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $physics_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $physics_d->EXTRA }}</b></td>
								<td> <?php echo $physics ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>জীববিজ্ঞান</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $biology_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $biology_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $biology_d->EXTRA }}</b></td>
								<td> <?php echo $Biology ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>বাংলাদেশ ও বিশ্ব পরিচয়</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $B_and_B_d->EXTRA }}</b></td>
								<td> <?php echo $B_and_B ?></td>
							</tr>

<?php
}else if($row->class_group=='Humanities'){


?>


							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>ভূগোল</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $vugol_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $vugol_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $vugol_d->EXTRA }}</b></td>
								<td> <?php echo $vugol ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>অর্থনীতি</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $orthoniti_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $orthoniti_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $orthoniti_d->EXTRA }}</b></td>
								<td> <?php echo $orthoniti ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>বিজ্ঞান</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Science_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Science_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $Science_d->EXTRA }}</b></td>
								<td> <?php echo $Science ?></td>
							</tr>
							<tr class="table-primar">
								<td class="pl-5 pr-5"> <b>ইতিহাস</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $itihas_d->CQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $itihas_d->MCQ }}</b></td>
                                <td class="pl-5"> <b class="ml-5">{{ $itihas_d->EXTRA }}</b></td>
								<td> <?php echo $itihas ?></td>
							</tr>


<?php }


if($row->StudentReligion=='Islam'){


	?>



								<tr class="table-primar" style="display:none">
									<td class="pl-5 pr-5"> <b>ইসলাম ধর্ম</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->CQ }}</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->MCQ }}</b></td>
                                    <td class="pl-5"> <b class="ml-5">{{ $religioni_d->EXTRA }}</b></td>
									<td> <?php echo $religioni ?></td>
								</tr>

	<?php
	}else if($row->StudentReligion=='Hindu'){


	?>

	<tr class="table-primar" style="display:none">
		<td class="pl-5 pr-5"> <b>হিন্দু ধর্ম</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->CQ }}</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->MCQ }}</b></td>
        <td class="pl-5"> <b class="ml-5">{{ $religionh_d->EXTRA }}</b></td>
		<td> <?php echo $religionh ?></td>
	</tr>


	<?php


	}
	?>


@if($Higher_Mathematics)
<tr class="table-primar" style="display:none">
    <td class="pl-5 pr-5"> <b>উচ্চতর গণিত</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Higher_Mathematics_d->CQ }}</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Higher_Mathematics_d->MCQ }}</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Higher_Mathematics_d->EXTRA }}</b></td>
    <td> <?php echo $Higher_Mathematics ?></td>
</tr>
@else
<tr class="table-primar" style="display:none">
    <td class="pl-5 pr-5"> <b>কৃষি</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->CQ }}</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->MCQ }}</b></td>
    <td class="pl-5"> <b class="ml-5">{{ $Agriculture_d->EXTRA }}</b></td>
    <td> <?php echo $Agriculture ?></td>
</tr>
@endif




						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>তথ্য ও যোগাযোগ প্রযোক্তি</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $ICT_d->EXTRA }}</b></td>
							<td> <?php echo $ICT ?></td>
						</tr>

{{--

						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>শারীরিক শিক্ষা ও স্বাস্থ্য</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Physical_Education_and_Health_d->EXTRA }}</b></td>
							<td> <?php echo $Physical_Education_and_Health ?></td>
						</tr>


						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>চারু ও কারুকলা</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Arts_and_Crafts_d->EXTRA }}</b></td>
							<td> <?php echo $Arts_and_Crafts ?></td>
						</tr>




						<tr class="table-primar">
							<td class="pl-5 pr-5"> <b>ক্যারিয়ার শিক্ষা</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Career_Education_d->CQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Career_Education_d->MCQ }}</b></td>
							<td class="pl-5"> <b class="ml-5">{{ $Career_Education_d->EXTRA }}</b></td>
							<td> <?php echo $Career_Education ?></td>
						</tr> --}}



						<tr class="table-primar">

							<td class="pl-5" colspan="4" style="text-align: right"> <b class="ml-5">মোট</b></td>
							<td> <?php echo $total; ?></td>
						</tr>
						</table>
                        @endforeach
					<?php
			} else {
					?>
					<section class="view about--part1">
						<div class="view_display" style="overflow:hidden">

							<center class="mt-5">
								<h1>No Data Found!</h1>
							</center>
						</div>
					</div>
				</section>
		<?php
			}
		} else {
			echo "<center><h4>NO DATA FOUND!</h4></center>";
		}


if($types=='pdf'){

?>


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

<?php

	 }else{



?>



<?php

	} ?>



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

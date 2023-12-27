<?php
namespace App\Http\Controllers\api;
use App\Models\TC;
// use PDF;
use App\Models\payment;
use App\Models\student;
use App\Models\SchoolFee;
use Illuminate\Http\Request;
use App\Models\school_detail;
use App\Models\StudentResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Rakibhstu\Banglanumber\NumberToBangla;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;


class PaymentController extends Controller
{


    public function paymentCounting(Request $request)
    {
        $type=$request->type;
        $status=$request->status;
        return payment::where(['type'=>$type,'status'=>$status])->count();
    }



    public function reports(Request $request)
    {

        $class = $request->class;
        $type = $request->type;




        $from = $request->from;
        $to = $request->to;

        if($type=='all' && $class=='all'){
            return payment::where(['status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('id','desc')->get();
        }elseif($type=='all'){
            return payment::where(['studentClass'=>$class,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('id','desc')->get();
        }elseif($class=='all'){
            return payment::where(['type'=>$type,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('id','desc')->get();
        }else{
            return payment::where(['studentClass'=>$class,'type'=>$type,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('id','desc')->get();
        }




    }


    public function Search(Request $request)
    {
         $type = $request->type;
        $paymenttype = $request->paymenttype;
       $adminssionId = $request->adminssionId;

        $StudentID = $request->StudentID;


        $student_class = $request->student_class;
        $StudentGroup = $request->StudentGroup;
        $StudentRoll = $request->StudentRoll;

        $month = $request->month;





        $paymentUrl = '';
        $paymentStatus = 'none';

        $message = '';



        $AdmissionID = '';
        $StudentClass = 'Six';
        $studentid = '';
        $StudentUID = '';
        $student = '';

        if($type=='Admission_fee'){
            $student = student::where(['AdmissionID' => $adminssionId])->latest()->first();
        }else{

            $studentStatus =  '';
            if($paymenttype=='AdmissionID'){

                $ApliedStudentCount = student::where(['AdmissionID' => $adminssionId])->count();
                if($ApliedStudentCount>0){

                     $ApliedStudent = student::where(['AdmissionID' => $adminssionId])->latest()->first();
                    $studentStatus = $ApliedStudent->StudentStatus;
                    if($ApliedStudent->StudentStatus=='Approve'){
                        // $message = "
                        // <h2 style='color:green;text-align:center;font-size: 25px; green;margin-bottom: 22px;margin-top: 22px;'>আবেদনটি অনুমোদন করা হয়েছে। ভর্তির জন্য প্রয়োজনীয় কাগজপত্র বিদ্যালয়ে জমা দিন</h2>

                        // <h2 style='text-align:center;font-size: 23px'>প্রয়োজনীয় কাগজপত্র</h2>

                        // <h2 style='font-size: 20px'>৬ষ্ঠ শ্রেণির জন্য</h2>
                        // <ul style='    list-style: circle !important;    padding: 0px 28px;'>
                        //     <li>জন্মনিবন্ধনের ফটোকপি</li>
                        //     <li>৫ম শ্রেণি পাশের মূল প্রশংসা পত্র </li>
                        //     <li>পিতা মাতার জাতীয় পরিচয় পত্রের ফটোকপি</li>
                        // </ul>

                        // <h2 style='font-size: 20px;margin-top: 22px;'>৭ম থেকে ৯ম শ্রেণির জন্য </h2>
                        // <ul style='    list-style: circle !important;    padding: 0px 28px;'>
                        //     <li>জন্মনিবন্ধনের ফটোকপি</li>
                        //     <li>৫ম শ্রেণি পাশের মূল প্রশংসা পত্র </li>
                        //     <li>পিতা মাতার জাতীয় পরিচয় পত্রের ফটোকপি</li>
                        //     <li>অবশ্যই TC বা ছাড়পত্র লাগবে</li>
                        // </ul>

                        // ";

                        // $StudentStatus = 'Approve';
                        // $student = student::where(['AdmissionID' => $adminssionId,'StudentStatus'=>$StudentStatus])->latest()->first();
                        // $AdmissionID = $student->AdmissionID;
                        // $StudentClass = $student->StudentClass;
                        // $studentid = $student->id;



                        // $message = 'এপ্লিকেশনটি অনুমোদন করা হয়েছে ';

                        $StudentStatus = 'Approve';
                        $student = student::where(['AdmissionID' => $adminssionId,'StudentStatus'=>$StudentStatus])->latest()->first();
                        $AdmissionID = $student->AdmissionID;
                        $StudentClass = $student->StudentClass;
                        $studentid = $student->id;
                        $StudentUID = $student->StudentID;


                    }elseif($ApliedStudent->StudentStatus=='active'){
                        $StudentStatus = 'active';
                        $student = student::where(['AdmissionID' => $adminssionId,'StudentStatus'=>$StudentStatus])->latest()->first();
                        $AdmissionID = $student->AdmissionID;
                        $StudentClass = $student->StudentClass;
                        $studentid = $student->id;
                        $StudentUID = $student->StudentID;
                    }elseif($ApliedStudent->StudentStatus=='permited'){
                        $StudentStatus = 'permited';
                        $student = student::where(['AdmissionID' => $adminssionId,'StudentStatus'=>$StudentStatus])->latest()->first();
                        $AdmissionID = $student->AdmissionID;
                        $StudentClass = $student->StudentClass;
                        $studentid = $student->id;
                        $StudentUID = $student->StudentID;
                    }elseif($ApliedStudent->StudentStatus=='Reject'){
                        $message = 'এপ্লিকেশনটি বাতিল করা হয়েছে';
                    }elseif($ApliedStudent->StudentStatus=='Pending'){
                        $message = 'এপ্লিকেশনটি এখনো অনুমোদন করা হয় নি ';
                    }else{
                        $student = [];
                    }
                }else{
                    $message = 'কোনো তথ্য খুঁজে পাওয়া যায়নি ';
                }









            }elseif($paymenttype=='StudentID'){

                $student = student::where(['StudentID' => $StudentID,'StudentStatus'=>'active'])->latest()->first();
                $AdmissionID = $student->AdmissionID;
                $StudentClass = $student->StudentClass;
                $studentid = $student->id;
                $StudentUID = $student->StudentID;
            }elseif($paymenttype=='other'){
                if($student_class=='Nine' || $student_class=='Ten'){
                    $student = student::where(['StudentClass' => $student_class,'StudentGroup' => $StudentGroup,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                    $AdmissionID = $student->AdmissionID;
                    $StudentClass = $student->StudentClass;
                    $studentid = $student->id;
                    $StudentUID = $student->StudentID;
                }else{
                    $student = student::where(['StudentClass' => $student_class,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                    $AdmissionID = $student->AdmissionID;
                    $StudentClass = $student->StudentClass;
                    $studentid = $student->id;
                    $StudentUID = $student->StudentID;
                }
            }else{
                if($student_class=='Nine' || $student_class=='Ten'){
                    $student = student::where(['StudentClass' => $student_class,'StudentGroup' => $StudentGroup,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                    $AdmissionID = $student->AdmissionID;
                    $StudentClass = $student->StudentClass;
                    $studentid = $student->id;
                    $StudentUID = $student->StudentID;
                }else{
                    $student = student::where(['StudentClass' => $student_class,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                    $AdmissionID = $student->AdmissionID;
                    $StudentClass = $student->StudentClass;
                    $studentid = $student->id;
                    $StudentUID = $student->StudentID;
                }
            }


        }


        $paymentfilter = [
            'type' => $type,
            'admissionId' => $AdmissionID,
            'status' => 'Paid',
        ];
        if($type=='monthly_fee'){

            $paymentfilter['month'] = $month;
        }

        $trxid = '';

         $paidPaymentCount = payment::where($paymentfilter)->count();
        if ($paidPaymentCount > 0) {
            $paidPayment = payment::where($paymentfilter)->latest()->first();
            $trxid = $paidPayment->trxid;
            $paymentStatus = $paidPayment->status;

        }

        // <option value="Admission_fee">ভর্তি ফরম ফি</option>
        // <option value="session_fee">ভর্তি/সেশন ফি</option>
        // <option value="monthly_fee">মাসিক বেতন</option>
        // <option value="exam_fee">পরীক্ষার ফি</option>
        // <option value="registration_fee">রেজিস্ট্রেশন ফি</option>
        // <option value="form_filup_fee">ফরম পূরণ ফি</option>


        $allMonth =  allList('month');
        $allExams =  allList('exams');




        $session_fee = SchoolFee::where(['class'=>$StudentClass,'type'=>'session_fee'])->first()->fees;

        if($student->stipend=='No'){
            $monthly_fee = SchoolFee::where(['class'=>$StudentClass,'type'=>'monthly_fee'])->first()->fees;
        }else{
            $monthly_fee = 0;
        }




        $registration_fee = SchoolFee::where(['class'=>$StudentClass,'type'=>'registration_fee'])->first()->fees;
        $form_filup_fee = SchoolFee::where(['class'=>$StudentClass,'type'=>'form_filup_fee'])->first()->fees;


        // $session_fee_payment = payment::where()->first();

        $MonthName =  date('F');

        $year = date('Y');
        $yearSession = $student->Year;
        // if($MonthName=='December'){
        //     $yearSession = date('Y')+1;
        // }




      $session_feeCount =    $this->PaymentCount(['type' => 'session_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');
        if($session_feeCount>0){
            $session_feeGet =    $this->PaymentCount(['type' => 'session_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'get');
            $session_feeButton = "<span class='btn btn-success'>Paid</span> <a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$session_feeGet->trxid'>রশিদ ডাউনলোড</a>";

            $session_feeStatus = 'Paid';

        }else{
            $session_feeButton = "<a href='/payment?studentId=$studentid&type=session_fee' class='btn btn-info'>Pay Now</a>";
            $session_feeStatus = 'Unpaid';

        }



      $registration_feeCount =    $this->PaymentCount(['type' => 'registration_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');
        if($registration_feeCount>0){
            $registration_feeGet =    $this->PaymentCount(['type' => 'registration_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'get');
            $registration_feeButton = "<span class='btn btn-success'>Paid</span> <a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$registration_feeGet->trxid'>রশিদ ডাউনলোড</a>";
        }else{
            $registration_feeButton = "<a  href='/payment?studentId=$studentid&type=registration_fee' class='btn btn-info'>Pay Now</a>";
        }

      $form_filup_feeCount =    $this->PaymentCount(['type' => 'form_filup_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');
        if($form_filup_feeCount>0){
            $form_filup_feeGet =    $this->PaymentCount(['type' => 'form_filup_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'get');
            $form_filup_feeButton = "<span class='btn btn-success'>Paid</span> <a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$form_filup_feeGet->trxid'>রশিদ ডাউনলোড</a>";
        }else{
            $form_filup_feeButton = "<a  href='/payment?studentId=$studentid&type=form_filup_fee' class='btn btn-info'>Pay Now</a>";
        }





        $paymentHtml = "";




        $cuddentdata = date('d');
        $cuddentMonth =  date('F');

        $monthlyPaid = [];

        if($session_feeStatus=='Unpaid'){
            array_push($monthlyPaid,[
                'key'=>'ভর্তি/সেশন ফি',
                'amount'=>$session_fee,
            ]);
        }

        if($studentStatus=='Approve'){

        $Pension_and_Welfare_Trust_feeCount =  $this->PaymentCount(['type' => 'Pension_and_Welfare_Trust','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

        if(!$Pension_and_Welfare_Trust_feeCount){
            array_push($monthlyPaid,[
                'key'=>'অবসর ও কল্যাণ ট্রাস্ট',
                'amount'=>100,
            ]);
        }
    }
        // return $monthlyPaid;





                if($studentStatus=='Approve'){
                    array_push($monthlyPaid,[
                        'key'=>month_en_to_bn('January'),
                        'amount'=>$monthly_fee,
                        'sub_type'=>'',
                    ]);
                }else{
                    if($MonthName=='December'){




        $Pension_and_Welfare_Trust_feeCount =  $this->PaymentCount(['type' => 'Pension_and_Welfare_Trust','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

        if(!$Pension_and_Welfare_Trust_feeCount){
            array_push($monthlyPaid,[
                'key'=>'অবসর ও কল্যাণ ট্রাস্ট',
                'amount'=>100,
            ]);
        }



                    $monthly_feeCountJ =    $this->PaymentCount(['type' => 'monthly_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession,'month' => 'January'],'count');
                    if($monthly_feeCountJ>0){
                    }else{
                        array_push($monthlyPaid,[
                            'key'=>month_en_to_bn('January'),
                            'amount'=>$monthly_fee,
                            'sub_type'=>'',
                        ]);
                    }





                }else{



                    foreach ($allMonth as $value) {
                        $monthly_feeCount =    $this->PaymentCount(['type' => 'monthly_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession,'month' => $value],'count');
                        if($monthly_feeCount>0){
                        }else{
                            array_push($monthlyPaid,[
                                'key'=>month_en_to_bn($value),
                                'amount'=>$monthly_fee,
                                'sub_type'=>'',
                            ]);
                        }
                        $CurrenMonthNumber = month_to_number($cuddentMonth);
                        $valueMonthNumber = month_to_number($value);

                    $Annual_assessment_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'exam_fee','sub_type'=>'Annual_assessment','status'=>1])->count();

                    $Annual_Examination_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'exam_fee','sub_type'=>'Annual Examination','status'=>1])->count();

                    $Selective_Exam_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'exam_fee','sub_type'=>'Selective_Exam','status'=>1])->count();
                        if($Annual_assessment_feeCount>0){
                        }elseif($Annual_Examination_feeCount>0){
                        }elseif($Selective_Exam_feeCount>0){
                        }else{


                            if($cuddentdata<11){
                                $CurrenMonthNumber = $CurrenMonthNumber-1;
                                if($CurrenMonthNumber==$valueMonthNumber){
                                    break;
                                }
                            }else{
                                if($cuddentMonth==$value){
                                    break;
                                }
                            }


                        }
                    }

                }



                }










        $ex_name_list = ex_name_list();
        foreach ($ex_name_list as $exName) {

        $Exam_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'exam_fee','sub_type'=>$exName,'status'=>1])->count();
        if($Exam_feeCount){
           $Schoolfee = SchoolFee::where(['class'=>$StudentClass,'type'=>'exam_fee','sub_type'=>$exName])->first();;
            $exFee = $Schoolfee->fees;
            $index_number = $Schoolfee->index_number;
            $Exam_feeStatusCount =  $this->PaymentCount(['type' => 'exam_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession,'ex_name' => $exName],'count');

            if(!$Exam_feeStatusCount){
                $insertedData = array(["key"=>ex_name($exName),"amount"=>$exFee,"sub_type"=>$exName]);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
            }
        }
        }



        $Registration_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'registration_fee','status'=>1])->count();
        if($Registration_feeCount){
           $Schoolfee = SchoolFee::where(['class'=>$StudentClass,'type'=>'registration_fee'])->first();;
            $RegFee = $Schoolfee->fees;
            $index_number = $Schoolfee->index_number;
            $Registration_feeStatusCount =  $this->PaymentCount(['type' => 'registration_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

            if(!$Registration_feeStatusCount){
                $insertedData = array(["key"=>'রেজিস্ট্রেশন ফি',"amount"=>$RegFee,"sub_type"=>'']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
            }
        }



        $Form_filup_feeCount = SchoolFee::where(['class'=>$StudentClass,'type'=>'form_filup_fee','status'=>1])->count();
        if($Form_filup_feeCount){
           $Schoolfee = SchoolFee::where(['class'=>$StudentClass,'type'=>'form_filup_fee'])->first();;
            $FornFee = $Schoolfee->fees;
            $index_number = $Schoolfee->index_number;
            $Form_filup_feeStatusCount =  $this->PaymentCount(['type' => 'form_filup_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

            if(!$Form_filup_feeStatusCount){



                 $studentRestult = StudentResult::where(['stu_id'=>$StudentUID,'exam_name'=>'Selective_Exam'])->first();

                $greed = $studentRestult->greed;
                if($greed=='F'){

                    $insertedData = array(["key"=>'ফরম পূরণ ফি',"amount"=>'আপনি নির্বাচনী পরিক্ষায় পাস না করায় ফরম পূরণ ফি দিতে পারবেন না। দয়াকরে বিদ্যালয়ে যোগাযোগ করুন।',"sub_type"=>'']);
                    array_splice($monthlyPaid, $index_number, 0, $insertedData);
                }else{


                    if($StudentGroup=='Humanities'){
                    $insertedData = array(["key"=>'ফরম পূরণ ফি',"amount"=>2220,"sub_type"=>'']);
                    array_splice($monthlyPaid, $index_number, 0, $insertedData);
                }else{
                    $insertedData = array(["key"=>'ফরম পূরণ ফি',"amount"=>2340,"sub_type"=>'']);
                    array_splice($monthlyPaid, $index_number, 0, $insertedData);
                }
            }







                // $insertedData = array(["key"=>'ফরম পূরণ ফি',"amount"=>$FornFee,"sub_type"=>'']);
                // array_splice($monthlyPaid, $index_number, 0, $insertedData);



            }
        }











        $paymentHtml = "
        <h2 class='text-center' style='font-size: 30px;'>বকেয়া</h2>
        <hr/>

        <table class='table' width='100%'>
            <thead>
                <tr>
                    <th>Payment Type</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>";

        $totalAmount = 0;
            foreach ($monthlyPaid as $value) {

                if (is_numeric($value['amount'])) {
                        $totalAmount += $value['amount'];
                    }
                    $paymentHtml .="
                    <tr style='text-align:center'>
                    <td>".$value['key']."</td>
                    <td>".$value['amount']."</td>
                    </tr>
                    ";
            }



            $paymentHtml .= "</tbody>
            <tfoot>

            <tr>
                <td class='text-right'>মোট বকেয়া :</td>
                <td class='text-left'>$totalAmount</td>
            </tr>";


            if($totalAmount){

                $paymentHtml .= " <tr>
                <td colspan='2' class='text-center'><a  href='/payment?studentId=$studentid&type=allBokeya' class='btn btn-info' style='font-size: 30px;'>ফি পরিশোধ করুন</a></td>
                </tr>";
            }


            $paymentHtml .= " </tfoot>

        </table> ";




            $paidPayments =  payment::where(['admissionId'=>$AdmissionID,'status'=>'Paid'])->get();






        $paymentHtml .= "
        <h2 class='text-center' style='font-size: 30px;'>পরিশোধিত</h2>
        <hr/>

        <table class='table' width='100%'>
            <thead>
                <tr>
                    <th>Payment Date</th>
                    <th>Payment Type</th>
                    <th>Fee</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($paidPayments as $paidPayment) {


                $paidPaymentDateD = strtotime($paidPayment->date);
                $currentDateD = strtotime("now");
                $twoDaysLater = strtotime("2 days", $paidPaymentDateD);
                if($twoDaysLater>$currentDateD){



                $paymentHtml .="
                <tr style='text-align:center'>

                <td>".date('d-m-Y h:i A',strtotime($paidPayment->updated_at))."</td>

                ";

                if($paidPayment->type=='session_fee'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)."</td>";
                }elseif($paidPayment->type=='marksheet'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)."</td>";
                }elseif($paidPayment->type=='Admission_fee'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)."</td>";
                }elseif($paidPayment->type=='Pension_and_Welfare_Trust'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)."</td>";
                }elseif($paidPayment->type=='exam_fee'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)." (".ex_name($paidPayment->ex_name).")</td>";
                }elseif($paidPayment->type=='form_filup_fee'){
                $paymentHtml .="<td>".paymentKhat($paidPayment->type)." (".form_name($paidPayment->ex_name).")</td>";
                }else{
                    $paymentHtml .="<td>".month_en_to_bn($paidPayment->month)."</td>";
                }

                $paymentHtml .="<td>$paidPayment->amount</td>

                <td>";
                if($paidPayment->type=='exam_fee'){

                    $paidPaymentDate = strtotime($paidPayment->date);
                    $currentDate = strtotime("now");
                    $twoMonthsLater = strtotime("1 months", $paidPaymentDate);
                    if($twoMonthsLater>$currentDate){
                        $paymentHtml .="
                        <a class='btn btn-warning' target='_blank' href='/student/exam/admit/$paidPayment->admissionId/$paidPayment->ex_name'>প্রবেশ পত্র</a>";
                    }
                    $paymentHtml .="<a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$paidPayment->trxid'>রশিদ ডাউনলোড</a>

                    ";
                }elseif($paidPayment->type=='marksheet'){

                    $restult = StudentResult::find($paidPayment->studentId);


                        $paymentHtml .="
                        <a class='btn btn-warning' target='_blank' href='/marksheet/$restult->marksheetCode'>মার্কসীট ডাউনলোড</a>";

                    $paymentHtml .="<a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$paidPayment->trxid'>রশিদ ডাউনলোড</a>

                    ";
                }else{

                    $paymentHtml .="<a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$paidPayment->trxid'>রশিদ ডাউনলোড</a>";
                }


                $paymentHtml .="</td>

                </tr>
                ";
            }




            }


            $paymentHtml .= "</tbody>
        </table> ";




// return $monthlyPaid;

//         return;








        // $paymentHtml = "

        // <table class='table' width='100%'>
        //     <thead>
        //         <tr>
        //             <th>Payment Type</th>
        //             <th>Fee</th>
        //             <th>Status</th>
        //         </tr>
        //     </thead>
        //     <tbody>


        //         <tr style='text-align:center'>
        //             <td>ভর্তি/সেশন ফি</td>
        //             <td>$session_fee</td>
        //             <td>$session_feeButton</td>
        //         </tr>";











        //         if($session_feeCount>0){
        //         $paymentHtml .= " <tr style='text-align:center'>
        //             <td colspan='3' style='text-align:center;font-size: 26px;'><h3>মাসিক বেতন</h3></td>
        //         </tr>";
        //         $monthSl = 1;
        //         foreach ($allMonth as $value) {

        //             $monthly_feeCount =    $this->PaymentCount(['type' => 'monthly_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => '2022','month' => $value],'count');
        //             if($monthly_feeCount>0){
        //                 $monthly_feeGet =    $this->PaymentCount(['type' => 'monthly_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => '2022','month' => $value],'get');
        //                 $monthly_feeButton = "<span class='btn btn-success'>Paid</span> <a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$monthly_feeGet->trxid'>রশিদ ডাউনলোড</a>";
        //                 $paymentHtml .="<tr style='text-align:center'>
        //                 <td>".month_en_to_bn($value)."</td>
        //                 <td>$monthly_fee</td>
        //                 <td>$monthly_feeButton</td>
        //             </tr>";
        //             $monthSl++;
        //             }else{
        //                 if($monthSl>12){

        //                 }else{
        //                     $monthName = number_to_month($monthSl);
        //                     $monthly_feeButton = "<a href='/payment?studentId=$studentid&type=monthly_fee&month=$monthName' class='btn btn-info'>Pay Now</a>";
        //                     $paymentHtml .="<tr style='text-align:center'>
        //                     <td>".month_en_to_bn($monthName)."</td>
        //                     <td>$monthly_fee</td>
        //                     <td>$monthly_feeButton</td>
        //                     </tr>";
        //                 }
        //             }






        //         }





        //         if($monthSl>12){

        //         }else{
        //             $monthName = number_to_month($monthSl);
        //             $monthly_feeButton = "<a href='/payment?studentId=$studentid&type=monthly_fee&month=$monthName' class='btn btn-info'>Pay Now</a>";
        //             $paymentHtml .="<tr style='text-align:center'>
        //             <td>".month_en_to_bn($monthName)."</td>
        //             <td>$monthly_fee</td>
        //             <td>$monthly_feeButton</td>
        //             </tr>";
        //         }





        //         $paymentHtml .="<tr style='text-align:center;display:none'>
        //             <td colspan='3' style='text-align:center;font-size: 26px;'><h3>পরীক্ষার ফি</h3></td>

        //         </tr>";

        //         foreach ($allExams as $value) {



        //             $exam_feeCount =    $this->PaymentCount(['type' => 'exam_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => '2022','type_name' => $value],'count');
        //             if($exam_feeCount>0){
        //                 $exam_feeGet =    $this->PaymentCount(['type' => 'exam_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => '2022','type_name' => $value],'get');
        //                 $exam_feeButton = "<span class='btn btn-success'>Paid</span> <a class='btn btn-info' target='_blank' href='/student/applicant/invoice/$exam_feeGet->trxid'>রশিদ ডাউনলোড</a>";
        //             }else{

        //                 $exam_feeButton = "<a href='' class='btn btn-info'>Pay Now</a>";

        //             }



        //             $paymentHtml .="<tr style='text-align:center;display:none' >
        //                 <td>".exam_en_to_bn($value)."</td>
        //                 <td>$exam_fee</td>
        //                 <td>$exam_feeButton</td>
        //             </tr>";
        //         }


        //         $paymentHtml .="<tr style='text-align:center;display:none'>
        //             <td>রেজিস্ট্রেশন ফি</td>
        //             <td>$registration_fee</td>
        //             <td>$registration_feeButton</td>
        //         </tr>
        //         <tr style='text-align:center;display:none'>
        //             <td>ফরম পূরণ ফি</td>
        //             <td>$form_filup_fee</td>
        //             <td>$form_filup_feeButton</td>
        //         </tr>";

            // }




        //     $paymentHtml .= "</tbody>

        // </table> ";



        // echo $paymentHtml;
        // return;



        $data = [
            'paymentUrl' => $paymentUrl,
            'trxid' => $trxid,
            'student' => $student,
            'paymentStatus' => $paymentStatus,
            'paymentHtml' => $paymentHtml,
            'messages' => $message,
            'searched' => 1,
        ];
        return $data;
    }


    public function PaymentCount($filter=[],$type='get')
    {

        if($type=='get'){

            return payment::where($filter)->first();
        }elseif($type=='count'){

            return payment::where($filter)->count();
        }
    }



    public function ipn(Request $request)
    {
        $data = $request->all();
        Log::info(json_encode($data));
        $student = student::find($data['cust_info']['cust_id']);
        $trnx_id = $data['trnx_info']['mer_trnx_id'];




            $payments = payment::where('trxid', $trnx_id)->get();


        foreach ($payments as $payment) {


        $Insertdata = [];

        if ($data['msg_code'] == '1020') {



            $Insertdata = [
                'status' => 'Paid',
                'method' => $data['pi_det_info']['pi_name'],
            ];
            $paymentType = $payment->type;
            // return paymentKhat($paymentType);


            if($paymentType=='TC'){

                 $tc = TC::where(['studentId'=>$student->id])->first();
                $tc->update(['status'=>'active','paymentStatus'=>'Paid']);
            }else{
                $group = 'Humanities';
                if($student->StudentClass=='Nine' || $student->StudentClass=='Ten'){
                    $group = $student->StudentGroup;
                }
                if($student->StudentStatus=='Approve'){
                    $student->update(['StudentStatus' => 'permited','StudentGroup'=>$group]);
                }
                if($paymentType=='Admission_fee'){
                    $student->update(['StudentStatus' => 'Pending']);
                    SmsNocSmsSend("Dear ".strtoupper($student->StudentNameEn).",Your Admission Fee has been Paid.Please Wait for Admission Result.Your Application Id- $student->AdmissionID",$student->StudentPhoneNumber);
                }else{
                    if($paymentType=='monthly_fee'){
                        if($payment->amount!=0){
                            SmsNocSmsSend("$student->StudentName  এর ". month_en_to_bn($payment->month) ." মাসের বেতন ". int_en_to_bn($payment->amount) ." টাকা জমা হয়েছে ",$student->StudentPhoneNumber);
                        }
                    }else{
                        SmsNocSmsSend("$student->StudentName এর ". paymentKhat($paymentType) ." ". int_en_to_bn($payment->amount) ." টাকা জমা হয়েছে ",$student->StudentPhoneNumber);
                    }
                }

            }






        } else {
            $Insertdata = ['status' => 'Failed',];
        }

        $Insertdata['ipnResponse'] = json_encode($data);
        // return $Insertdata;
         $payment->update($Insertdata);
        }




    }




    public function ReCallIpn(Request $request)
    {

        $trnx_id = $request->trnx_id;
        $trans_date = date("Y-m-d", strtotime($request->trans_date));

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://pg.ekpay.gov.bd/ekpaypg/v1/get-status',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{

         "trnx_id":"'.$trnx_id.'",
         "trans_date":"'.$trans_date.'"

        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response1 = curl_exec($curl);

        curl_close($curl);
         $data =  json_decode($response1);





        // $data = $request->all();



        Log::info(json_encode($data));
        $student = student::find($data->cust_info->cust_id);
        $trnx_id = $data->trnx_info->mer_trnx_id;




            $payments = payment::where('trxid', $trnx_id)->get();


        foreach ($payments as $payment) {


        $Insertdata = [];

        if ($data->msg_code == '1020') {
            $Insertdata = [
                'status' => 'Paid',
                'method' => $data->pi_det_info->pi_name,
            ];



            $paymentType = $payment->type;
            // return paymentKhat($paymentType);
            $group = 'Humanities';
            if($student->StudentClass=='Nine' || $student->StudentClass=='Ten'){
                $group = $student->StudentGroup;

            }

            if($student->StudentStatus=='Approve'){
                $student->update(['StudentStatus' => 'permited','StudentGroup'=>$group]);
            }

            if($paymentType=='Admission_fee'){
                $student->update(['StudentStatus' => 'Pending']);
                SmsNocSmsSend("Dear ".strtoupper($student->StudentNameEn).",Your Admission Fee has been Paid.Please Wait for Admission Result.Your Application Id- $student->AdmissionID",$student->StudentPhoneNumber);
            }else{

                if($paymentType=='monthly_fee'){
					if($payment->amount!=0){
						SmsNocSmsSend("$student->StudentName  এর ". month_en_to_bn($payment->month) ." মাসের বেতন ". int_en_to_bn($payment->amount) ." টাকা জমা হয়েছে ",$student->StudentPhoneNumber);
					}


                }else{
                    SmsNocSmsSend("$student->StudentName এর ". paymentKhat($paymentType) ." ". int_en_to_bn($payment->amount) ." টাকা জমা হয়েছে ",$student->StudentPhoneNumber);
                }

            }


        } else {
            $Insertdata = ['status' => 'Failed',];
        }

        $Insertdata['ipnResponse'] = json_encode($data);
        // return $Insertdata;
         $payment->update($Insertdata);
        }


    }





    public function AkpayPaymentCheck(Request $request)
    {

        $trnx_id = $request->trnx_id;
        $trans_date = date("Y-m-d", strtotime($request->trans_date));

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://pg.ekpay.gov.bd/ekpaypg/v1/get-status',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{

         "trnx_id":"'.$trnx_id.'",
         "trans_date":"'.$trans_date.'"

        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response1 = curl_exec($curl);

        curl_close($curl);


        $myserver = Payment::where(['trxId'=>$trnx_id])->first();


      return   $data =  [
        'myserver'=>$myserver,
        'akpay'=> json_decode($response1),
      ];


    }












    public function paymentCreate(Request $request)
    {

        $trnx_id = time().rand(1,50);
        $studentId = $request->studentId;
        $month = $request->month;
        $resultId = $request->resultId;
        $student = student::find($studentId);
        $AdmissionID = $student->AdmissionID;
        $StudentUID = $student->StudentID;
        $StudentGroup = $student->StudentGroup;

        $studentMobile = '01909756552';
        if($student->StudentPhoneNumber){

            $studentMobile = int_bn_to_en($student->StudentPhoneNumber);
        }

        $class = $student->StudentClass;
        $type = $request->type;



        if($type=='allBokeya'){



        $allMonth =  allList('month');


        $session_fee = SchoolFee::where(['class'=>$class,'type'=>'session_fee'])->first()->fees;

        if($student->stipend=='No'){
            $monthly_fee = SchoolFee::where(['class'=>$class,'type'=>'monthly_fee'])->first()->fees;

        }else{
            $monthly_fee = 0;
        }

        $MonthName =  date('F');
        $year = date('Y');

        $yearSession = $student->Year;
        // $yearSession = date('Y');

        // if($MonthName=='December'){
        //     $yearSession = date('Y')+1;
        // }

        if($student->Year)

      $session_feeCount =    $this->PaymentCount(['type' => 'session_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');
      if($session_feeCount>0){
          $session_feeStatus = 'Paid';
      }else{
          $session_feeStatus = 'Unpaid';
      }


      $cuddentdata = date('d');
      $cuddentMonth =  date('F');

      $totalamount = 0;
      $monthlyPaid = [];
      if($session_feeStatus=='Unpaid'){
        $totalamount +=  $session_fee;
        array_push($monthlyPaid,[
            'key'=>'ভর্তি/সেশন ফি',
            'amount'=>$session_fee,
            'sub_type'=>'',
        ]);
      }


      $Pension_and_Welfare_Trust_feeCount =  $this->PaymentCount(['type' => 'Pension_and_Welfare_Trust','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

      if(!$Pension_and_Welfare_Trust_feeCount){
          array_push($monthlyPaid,[
              'key'=>'Pension_and_Welfare_Trust',
              'amount'=>100,
              'sub_type'=>'',
          ]);
          $totalamount +=  100;

      }


      if($student->StudentStatus=='Approve'){
        $totalamount +=  $monthly_fee;
        array_push($monthlyPaid,[
            'key'=>month_en_to_bn('January'),
            'amount'=>$monthly_fee,
            'sub_type'=>'',
        ]);
    }else{



      foreach ($allMonth as $value) {
        $monthly_feeCount =    $this->PaymentCount(['type' => 'monthly_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession,'month' => $value],'count');

        if($monthly_feeCount>0){
        }else{
            $totalamount +=  $monthly_fee;
            array_push($monthlyPaid,[
                'key'=>month_en_to_bn($value),
                'amount'=>$monthly_fee,
                'sub_type'=>'',
            ]);
        }
          $CurrenMonthNumber = month_to_number($cuddentMonth);
          $valueMonthNumber = month_to_number($value);

        $Annual_assessment_feeCount = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>'Annual_assessment','status'=>1])->count();

        $Annual_Examination_feeCount = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>'Annual Examination','status'=>1])->count();

        $Selective_Exam_feeCount = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>'Selective_Exam','status'=>1])->count();

            if($Annual_assessment_feeCount>0){
            }elseif($Annual_Examination_feeCount>0){
            }elseif($Selective_Exam_feeCount>0){
            }else{

                if($cuddentdata<11){
                    $CurrenMonthNumber = $CurrenMonthNumber-1;
                    if($CurrenMonthNumber==$valueMonthNumber){
                        break;
                    }
                }else{
                    if($cuddentMonth==$value){
                        break;
                    }
                }
            }
      }

    }


      $ex_name_list = ex_name_list();
      foreach ($ex_name_list as $exName) {

      $Exam_feeCount = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>$exName,'status'=>1])->count();
      if($Exam_feeCount){
         $Schoolfee = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>$exName])->first();;
          $exFee = $Schoolfee->fees;

          $index_number = $Schoolfee->index_number;
          $Exam_feeStatusCount =  $this->PaymentCount(['type' => 'exam_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession,'ex_name' => $exName],'count');

          if(!$Exam_feeStatusCount){
            $totalamount +=  $exFee;
              $insertedData = array(["key"=>'exam_fee',"amount"=>$exFee,"sub_type"=>$exName]);
              array_splice($monthlyPaid, $index_number, 0, $insertedData);
          }
      }
      }



      $Registration_feeCount = SchoolFee::where(['class'=>$class,'type'=>'registration_fee','status'=>1])->count();
      if($Registration_feeCount){
         $Schoolfee = SchoolFee::where(['class'=>$class,'type'=>'registration_fee'])->first();;
          $RegFee = $Schoolfee->fees;

          $index_number = $Schoolfee->index_number;
          $Registration_feeStatusCount =  $this->PaymentCount(['type' => 'registration_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

          if(!$Registration_feeStatusCount){
            $totalamount +=  $RegFee;
              $insertedData = array(["key"=>'registration_fee',"amount"=>$RegFee,"sub_type"=>'']);
              array_splice($monthlyPaid, $index_number, 0, $insertedData);
          }
      }



      $Form_filup_feeCount = SchoolFee::where(['class'=>$class,'type'=>'form_filup_fee','status'=>1])->count();
      if($Form_filup_feeCount){
         $Schoolfee = SchoolFee::where(['class'=>$class,'type'=>'form_filup_fee'])->first();;
          $FornFee = $Schoolfee->fees;

          $index_number = $Schoolfee->index_number;
          $Form_filup_feeStatusCount =  $this->PaymentCount(['type' => 'form_filup_fee','admissionId' => $AdmissionID,'status' => 'Paid','year' => $yearSession],'count');

          if(!$Form_filup_feeStatusCount){


            $studentRestult = StudentResult::where(['stu_id'=>$StudentUID,'exam_name'=>'Selective_Exam'])->first();
            $greed = $studentRestult->greed;
            if($greed!='F'){
            if($StudentGroup=='Humanities'){
                $board_fee = 1535;
                $totalamount +=  $board_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$board_fee,"sub_type"=>'board_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $center_fee = 485;
                $totalamount +=  $center_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$center_fee,"sub_type"=>'center_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $late_fees = 100;
                $totalamount +=  $late_fees;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$late_fees,"sub_type"=>'late_fees']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $other_fee = 100;
                $totalamount +=  $other_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$other_fee,"sub_type"=>'other_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
            }else{
                $board_fee = 1625;
                $totalamount +=  $board_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$board_fee,"sub_type"=>'board_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $center_fee = 515;
                $totalamount +=  $center_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$center_fee,"sub_type"=>'center_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $late_fees = 100;
                $totalamount +=  $late_fees;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$late_fees,"sub_type"=>'late_fees']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
                $other_fee = 100;
                $totalamount +=  $other_fee;
                $insertedData = array(["key"=>'form_filup_fee',"amount"=>$other_fee,"sub_type"=>'other_fee']);
                array_splice($monthlyPaid, $index_number, 0, $insertedData);
            }
            }



            // $totalamount +=  $FornFee;
            //   $insertedData = array(["key"=>'form_filup_fee',"amount"=>$FornFee,"sub_type"=>'']);
            //   array_splice($monthlyPaid, $index_number, 0, $insertedData);



          }
      }






    //   $Half_yearly_examinationExam_feeCount = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>'Half_yearly_examination','status'=>1])->count();

    //   if($Half_yearly_examinationExam_feeCount){
    //     $Half_yearly_examinationExam_fee = SchoolFee::where(['class'=>$class,'type'=>'exam_fee','sub_type'=>'Half_yearly_examination'])->first()->fees;
    //     $insertedData = array(["key"=>"exam_fee","amount"=>$Half_yearly_examinationExam_fee,"sub_type"=>'Half_yearly_examination']);
    //       array_splice($monthlyPaid, 6, 0, $insertedData);
    //   }else{
    //     $Half_yearly_examinationExam_fee = 0;
    //   }







       $amount =  $totalamount;







}else{
    if($type=='marksheet'){
        $class = 'All';
    }
    $schoolFee = SchoolFee::where(['class' => $class, 'type' => $type])->latest()->first();
    $amount = $schoolFee->fees;
}


// return $amount;
// return $monthlyPaid;

        $cust_info = [
            "cust_email" => "",
            "cust_id" => "$studentId",
            "cust_mail_addr" => "Address",
            "cust_mobo_no" => "$studentMobile",
            "cust_name" => "Customer Name"
        ];
        $trns_info = [
            "ord_det" => $type,
            "ord_id" => $student->AdmissionID,
            "trnx_amt" => $amount,
            "trnx_currency" => "BDT",
            "trnx_id" => "$trnx_id"
        ];
       $redirectutl = ekpayToken($trnx_id, $trns_info, $cust_info);

// $redirectutl ='';
        if($type=='marksheet'){
            $studentId = $resultId;
        }else{
            $studentId = $student->StudentID;
        }

        $currentmonth = date("F");


        $amountYear = date("Y");
        $paymentYear = $amountYear;

        // if($student->StudentStatus=='Approve'){
        //     $paymentYear = $amountYear+1;
        // }

        if($currentmonth=='December'){
            $paymentYear = $amountYear+1;
        }





        if($type=='allBokeya'){
            foreach ($monthlyPaid as $value) {
                $typesC = $value['key'];
                if($typesC=='ভর্তি/সেশন ফি'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='exam_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='registration_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='form_filup_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='board_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='center_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='late_fees'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='other_fee'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }elseif($typesC=='Pension_and_Welfare_Trust'){
                    $types = paymentKhaten($value['key']);
                    $monthName = date('F');
                }else{
                    $types = 'monthly_fee';
                    $monthName = month_bn_to_en($value['key']);
                }
                // print_r($types);

                $Insertdata = [
                    'trxid' => $trnx_id,
                    'school_id' => $student->school_id,
                    'studentClass' => $student->StudentClass,
                    'studentRoll' => $student->StudentRoll,
                    'studentId' => $studentId,
                    'admissionId' => $student->AdmissionID,
                    'Name' => $student->StudentName,
                    'method' => '',
                    'amount' => $value['amount'],
                    'type' => $types,
                    'ex_name' => $value['sub_type'],
                    'paymentUrl' => $redirectutl,
                    'date' => date("Y-m-d"),
                    'year' => $paymentYear,
                    'status' => 'Pending',
                ];
                if($month){
                    $Insertdata['month'] = $monthName;
                }else{
                    $Insertdata['month'] =  $monthName;
                }

                payment::create($Insertdata);

            }
        }else{
            // print_r('sdf');
            $Insertdata = [
                'trxid' => $trnx_id,
                'school_id' => $student->school_id,
                'studentClass' => $student->StudentClass,
                'studentRoll' => $student->StudentRoll,
                'studentId' => $studentId,
                'admissionId' => $student->AdmissionID,
                'Name' => $student->StudentName,
                'method' => '',
                'amount' => $amount,
                'type' => $type,
                'paymentUrl' => $redirectutl,
                'date' => date("Y-m-d"),
                'year' => $paymentYear,
                'status' => 'Pending',
            ];
            if($month){
                $Insertdata['month'] = $month;
            }else{
                $Insertdata['month'] =  date("F");
            }
            payment::create($Insertdata);
        }



        return redirect($redirectutl);
    }
    public function payments(Request $request)
    {
        $datatype = $request->datatype;
        $datas = QueryBuilder::for(payment::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('school_id'),
                AllowedFilter::exact('studentClass'),
                AllowedFilter::exact('studentRoll'),
                AllowedFilter::exact('studentId'),
                AllowedFilter::exact('admissionId'),
                AllowedFilter::exact('date'),
                AllowedFilter::exact('type'),
                AllowedFilter::exact('type_name'),
                AllowedFilter::exact('month'),
                AllowedFilter::exact('year'),
                AllowedFilter::exact('status'),
                AllowedFilter::exact('method'),
                'Name',
                'amount',
                'bokeya',
            ]);
        if ($datatype == 'count') {
            $result = $datas->where('status','Paid')->sum('amount');
        } else {
            $result = $datas->get();
        }
        return response()->json($result);
    }
    public function payments_submit(Request $r)
    {
        $formtype = $r->formtype;
        $id = $r->id;
        $oldItem[0] = [
            'Bmonth' => '',
            'Bamount' => 0,
        ];
        $oldItemg = json_encode($oldItem);
        $data = [
            'school_id' => $r->school_id,
            'studentClass' => $r->StudentClass,
            'studentRoll' => $r->StudentRoll,
            'studentId' => $r->StudentID,
            'admissionId' => $r->AdmissionID,
            'Name' => $r->StudentName,
            'method' => $r->method,
            'amount' => $r->amount,
            'bokeya' => $oldItemg,
            'type' => $r->type,
            'type_name' => $r->type_name,
            'date' => $r->date,
            'month' => $r->month,
            'year' => $r->year,
            'status' => $r->status,
        ];
        $wh = [
            'StudentID' => $r->StudentID,
        ];
        $StudentPhoneNumber = DB::table('students')->where($wh)->get()[0]->StudentPhoneNumber;
        $messages = array();
        $responsemessege = [];
        if ($r->type == 'পরিক্ষার ফি') {
            $message = "আপনার সন্তানের " . $r->type_name . " ফি " . int_en_to_bn($r->amount) . " টাকা বিদ্যালয়ে জমা হয়েছে";
        } else {
            $message = "আপনার সন্তানের " . month_en_to_bn($r->month) . " মাসের বেতন " . int_en_to_bn($r->amount) . " টাকা বিদ্যালয়ে জমা হয়েছে";
        }
        array_push(
            $messages,
            [
                "number" => '88' . int_bn_to_en($StudentPhoneNumber),
                "message" => "$message"
            ]
        );
        if ($formtype == 'create') {
            $data = payment::create($data);
            try {
                $msgs = sendMessages($messages);
                foreach ($msgs as $value) {
                    array_push($responsemessege, 'Sms Successfully Sent To : ' . $value["number"]);
                }
            } catch (Exception $e) {
                array_push($responsemessege, $e->getMessage());
            }
        } else {
            $payment = payment::find($id);
            $data = $payment->update($data);
        }
        return response()->json($data);
    }
    public function invoice(Request $r, $id)
    {
        $rows = DB::table('payments')->where('id', $id)->first();
        $StudentID = $rows->studentId;
        $wds = [
            'StudentID' => $StudentID,
        ];
        $stdata = DB::table('students')->where($wds)->first();
        $data['types'] = 'pdf';
        //in Controller
        $data['sign'] = base64('frontend/sing.png');
        $URL =  url('/school/payment/invoice/' . $id);
        $qrcode = \QrCode::size(70)
            ->format('svg')
            ->generate($URL);
        $output = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrcode);
        $data['qrcode'] = $output;
        // return view('dashboard/payments.invoice',$data);
        $numto = new NumberToBangla();
        $amount = $rows->amount;
        $bokeya = json_decode($rows->bokeya);
        $bTotal = 0;
        foreach ($bokeya as $list) {
            $bTotal = $bTotal + $list->Bamount;
        }
        $Total = $amount + $bTotal;
        $data['TotalAmount'] = $numto->bnMoney($Total);
        //in Controller
        $school_detail =  school_detail::where('school_id', $stdata->school_id)->first();
        $data['logo'] = base64($school_detail->logo);
        $fileName = 'Invoice-' . date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $pdf = LaravelMpdf::loadView('admin/pdfReports.invoice', $data, compact('rows', 'stdata', 'school_detail'));
        return $pdf->stream("$fileName.pdf");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class, $month, $year, $type)
    {
    }



    public function paymentReport(Request $request)
    {

            ini_set('max_execution_time', '60000');
            ini_set("pcre.backtrack_limit", "50000000000000");
            ini_set('memory_limit', '12008M');


        $class = $request->class;
        $type = $request->type;
        $from = $request->from;
        $to = $request->to;


        if($type=='all' && $class=='all'){
            $payments =  payment::where(['status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('date','asc')->get();
        }elseif($type=='all'){
            $payments =  payment::where(['studentClass'=>$class,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('date','asc')->get();
        }elseif($class=='all'){
            $payments =  payment::where(['type'=>$type,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('date','asc')->get();
        }else{
            $payments =  payment::where(['studentClass'=>$class,'type'=>$type,'status'=>'Paid'])->whereBetween('date', [$from, $to])->orderBy('date','asc')->get();
        }

        $fileName = "Payments-report-$from-$to" ;
        $pdf = LaravelMpdf::loadView('admin/pdfReports.payments_report', compact('payments','from','to','class','type'));
        return $pdf->stream("$fileName.pdf");
        // return view('dashboard/payments.payments_report', $payments);
    }



    public function paymentsheet(Request $request,$school_id, $class, $year, $type)
    {

        ini_set('max_execution_time', '60000');
        ini_set("pcre.backtrack_limit", "500000000000000000");
        ini_set('memory_limit', '12008M');

        $data['class'] = $class;
        $data['year'] = $year;
        $data['type'] = feesconvert($type);
        $wheredata = [
            'StudentStatus' => 'Active',
            'StudentClass' => $class,
            'Year' => date('Y'),
            'school_id' => $school_id,
        ];

        $group = $request->group;
        $data['group'] = $group;
        if($class=='Nine' || $class=='Ten'){
            $wheredata['StudentGroup'] = $group;
        }


        $data['rows'] = DB::table('students')->where($wheredata)->orderBy('StudentRoll', 'ASC')->get();
        $fileName = 'Payments-' . date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $data['sign'] = base64(sitedetails()->PRINCIPALS_Signature);


        // return $data;


        // return view('admin/pdfReports.payments_sheet', $data);

        $pdf = LaravelMpdf::loadView('admin/pdfReports.payments_sheet', $data);
        return $pdf->stream("$fileName.pdf");
    }


    public function paymentsheetAnnual(Request $request)
    {

        ini_set('max_execution_time', '60000');
        ini_set("pcre.backtrack_limit", "5000000000000000050000000000000000");
        ini_set('memory_limit', '12008M');






        $school_id = $request->school_id;
        $fileName = 'Annually-report-'.date('Y').'-'.time().'.pdf';

        // return $data;


        // return view('admin/pdfReports.payments_sheet_annually');

        $pdf = LaravelMpdf::loadView('admin/pdfReports.payments_sheet_annually', compact('school_id','fileName'));
        return $pdf->stream("$fileName.pdf");
    }


    public function getAnnuallyReport(Request $request)
    {


        if($request->year){
            $year = $request->year;
        }else{
            $year = date('Y');

        }

        $html = '';


        $html .="

        <table border='1' width='100%'>
        <thead>
            <tr>
                <th colspan='10' style='font-size:25px;text-align:center'><span>বার্ষিক প্রতিবেদন</span></th>
            </tr>
        </thead>

        <tr align='center'>
            <td class='td'>শ্রেণি</td>
            <td class='td'>ভর্তি ফরম ফি</td>
            <td class='td'>ভর্তি/সেশন ফি</td>
            <td class='td'>অ ও ক ট্রাস্ট</td>
            <td class='td'>মাসিক বেতন</td>
            <td class='td'>পরীক্ষার ফি</td>
            <td class='td'>রেজিস্ট্রেশন ফি</td>
            <td class='td'>ফরম পূরণ ফি</td>
            <td class='td'>মার্কসীট ফি</td>
            <td class='td'>প্রশংসা পত্র</td>
            <td class='td'>সর্বমোট</td>
        </tr>";



        foreach (class_list() as $class){



        $html .="
        <tr  align='center'>
            <td class='td'>". class_en_to_bn($class) ."</td>
            <td class='td'>". annualAmount($year,'Admission_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'session_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'Pension_and_Welfare_Trust',$class) ."</td>
            <td class='td'>". annualAmount($year,'monthly_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'exam_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'registration_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'form_filup_fee',$class) ."</td>
            <td class='td'>". annualAmount($year,'marksheet',$class) ."</td>
            <td class='td'>". annualAmount($year,'TC',$class) ."</td>

            <td class='td'>". annualAmount($year,'marksheet',$class, 'total') ."</td>
        </tr>";

        }

        $html .="
        <tr align='center'>
            <td class='td'>মোট</td>
            <td class='td'>". annualAmount($year,'Admission_fee') ."</td>
            <td class='td'>". annualAmount($year,'session_fee') ."</td>
            <td class='td'>". annualAmount($year,'Pension_and_Welfare_Trust') ."</td>
            <td class='td'>". annualAmount($year,'monthly_fee') ."</td>
            <td class='td'>". annualAmount($year,'exam_fee') ."</td>
            <td class='td'>". annualAmount($year,'registration_fee') ."</td>
            <td class='td'>". annualAmount($year,'form_filup_fee') ."</td>
            <td class='td'>". annualAmount($year,'marksheet') ."</td>
            <td class='td'>". annualAmount($year,'TC') ."</td>

            <td class='td'>". annualAmount($year,'','','Subtotal') ."</td>
        </tr>


    </table>

        ";


        return $html;

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}

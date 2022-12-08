<?php
namespace App\Http\Controllers\api;
use App\Models\payment;
// use PDF;
use App\Models\student;
use App\Models\SchoolFee;
use Illuminate\Http\Request;
use App\Models\school_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Rakibhstu\Banglanumber\NumberToBangla;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
class PaymentController extends Controller
{
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








        if($type=='Admission_fee'){
            $student = student::where(['admissionId' => $adminssionId])->latest()->first();
        }else{
            if($paymenttype=='AdmissionID'){

                $student = student::where(['admissionId' => $adminssionId,'StudentStatus'=>'active'])->latest()->first();
            }elseif($paymenttype=='StudentID'){

                $student = student::where(['StudentID' => $StudentID,'StudentStatus'=>'active'])->latest()->first();
            }elseif($paymenttype=='other'){
                if($student_class=='Nine' || $student_class=='Ten'){
                    $student = student::where(['StudentClass' => $student_class,'StudentGroup' => $StudentGroup,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                }else{
                    $student = student::where(['StudentClass' => $student_class,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                }
            }else{
                if($student_class=='Nine' || $student_class=='Ten'){
                    $student = student::where(['StudentClass' => $student_class,'StudentGroup' => $StudentGroup,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                }else{
                    $student = student::where(['StudentClass' => $student_class,'StudentRoll' => $StudentRoll,'StudentStatus'=>'active'])->latest()->first();
                }
            }
        }


        $paymentfilter = [
            'type' => $type,
            'admissionId' => $student->AdmissionID,
            'status' => 'Paid',
        ];
        if($type=='monthly_fee'){

            $paymentfilter['month'] = $month;
        }


         $paidPaymentCount = payment::where($paymentfilter)->count();
        if ($paidPaymentCount > 0) {

            $paidPayment = payment::where($paymentfilter)->latest()->first();

                 $paymentStatus = $paidPayment->status;

        }







        $data = [
            'paymentUrl' => $paymentUrl,
            'student' => $student,
            'paymentStatus' => $paymentStatus,
            'searched' => 1,
        ];
        return $data;
    }
    public function ipn(Request $request)
    {
        $data = $request->all();
        $student = student::find($data['cust_info']['cust_id']);
        $trnx_id = $data['trnx_info']['mer_trnx_id'];
        $payment = payment::where('trxid', $trnx_id)->first();
        $Insertdata = [];
        if ($data['msg_code'] == '1020') {
            $Insertdata = [
                'status' => 'Paid',
                'method' => $data['pi_det_info']['pi_name'],
            ];

            smsSend("Dear $student->StudentNameEn,Your Admission Fee has been Paid.Please Wait for Admission Result.Your Application Id- $student->AdmissionID",$student->StudentPhoneNumber);


        } else {
            $Insertdata = [
                'status' => 'Failed',
            ];
        }

        $Insertdata['ipnResponse'] = json_encode($data);
        // return $Insertdata;
        Log::info(json_encode($data));

        $paymentType = $payment->type;
        if($paymentType=='Admission_fee'){
            $student->update(['StudentStatus' => 'Pending']);
        }

        return $payment->update($Insertdata);
    }
    public function paymentCreate(Request $request)
    {

        $trnx_id = time().rand(1,50);
        $studentId = $request->studentId;
        $month = $request->month;
        $student = student::find($studentId);

        $studentMobile = '01909756552';
        if($student->StudentPhoneNumber){

            $studentMobile =$student->StudentPhoneNumber;
        }

        $class = $student->StudentClass;
        $type = $request->type;
        $schoolFee = SchoolFee::where(['class' => $class, 'type' => $type])->latest()->first();
        $amount = $schoolFee->fees;
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
        $Insertdata = [
            'trxid' => $trnx_id,
            'school_id' => $student->school_id,
            'studentClass' => $student->StudentClass,
            'studentRoll' => $student->StudentRoll,
            'studentId' => $student->StudentID,
            'admissionId' => $student->AdmissionID,
            'Name' => $student->StudentName,
            'method' => '',
            'amount' => $amount,
            'type' => $type,
            'paymentUrl' => $redirectutl,
            'date' => date("Y-m-d"),
            'year' => date("Y"),
            'status' => 'Pending',
        ];


        if($month){
            $Insertdata['month'] = $month;
        }else{
            $Insertdata['month'] =  date("F");

        }

        payment::create($Insertdata);
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
    public function paymentsheet($school_id, $class, $year, $type)
    {
        $data['class'] = $class;
        $data['year'] = $year;
        $data['type'] = feesconvert($type);
        $wheredata = [
            'StudentStatus' => 'Active',
            'StudentClass' => $class,
            'Year' => date('Y'),
            'school_id' => $school_id,
        ];
        $data['rows'] = DB::table('students')->where($wheredata)->orderBy('StudentRoll', 'ASC')->get();
        $fileName = 'Payments-' . date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $data['sign'] = base64(sitedetails()->PRINCIPALS_Signature);
        $pdf = LaravelMpdf::loadView('admin/pdfReports.payments_sheet', $data);
        return $pdf->stream("$fileName.pdf");
        // return view('dashboard/payments.payments_sheet', $data);
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

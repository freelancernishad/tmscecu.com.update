<?php
namespace App\Http\Controllers\api;
use App\Models\payment;
// use PDF;
use App\Models\student;
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


    public function ipn(Request $request)
    {
        $data = $request->all();
        Log::info($data);
        // payment::create(['bokeya'=>$data]);

    }


    public function paymentCreate(Request $request)
    {


       $trnx_id = time();
       $studentId = $request->studentId;
        $student = student::find($studentId);
       $studentMobile = '01909756552';
       $amount = $request->amount;
       $cust_info = [
        "cust_email" => "",
        "cust_id" => "$studentId",
        "cust_mail_addr" => "Address",
        "cust_mobo_no" => "$studentMobile",
        "cust_name" => "Customer Name"
    ];
        $redirectutl = ekpayToken($trnx_id, $amount,$cust_info);
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



        if($datatype=='count'){
            $result= $datas->sum('amount');
        }else{
            $result= $datas ->get();
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

                'StudentID'=>$r->StudentID,
            ];

     $StudentPhoneNumber = DB::table('students')->where($wh)->get()[0]->StudentPhoneNumber;


            $messages = array();
            $responsemessege = [];

            if($r->type=='পরিক্ষার ফি'){

                $message = "আপনার সন্তানের ".$r->type_name." ফি ".int_en_to_bn($r->amount)." টাকা বিদ্যালয়ে জমা হয়েছে";
            }else{
                $message = "আপনার সন্তানের ".month_en_to_bn($r->month)." মাসের বেতন ".int_en_to_bn($r->amount)." টাকা বিদ্যালয়ে জমা হয়েছে";

            }



            array_push(
                $messages,
                [
                    "number" => '88' . int_bn_to_en($StudentPhoneNumber),
                    "message" => "$message"
                ]
            );
if($formtype=='create'){
    $data = payment::create($data);


    try {
        $msgs = sendMessages($messages);
        foreach ($msgs as $value) {
array_push($responsemessege,'Sms Successfully Sent To : ' . $value["number"]);
     }
    } catch (Exception $e) {
        array_push($responsemessege,$e->getMessage());
    }



}else{
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

        $school_detail =  school_detail::where('school_id',$stdata->school_id)->first();
        $data['logo'] = base64($school_detail->logo);




        $fileName = 'Invoice-' . date('Y-m-d H:m:s');
        $data['fileName'] = $fileName;
        $pdf = LaravelMpdf::loadView('admin/pdfReports.invoice', $data ,compact('rows','stdata','school_detail'));
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
    public function paymentsheet($school_id,$class, $year, $type)
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

<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class smsController extends Controller
{

    public function sent_sms()
    {
        return view('admin.sms');
    }
    public function sent_sms_submit(Request $r)
    {

        $class = $r->class;
        $deccription = $r->deccription;
        $messages = array();
        if ($class == "All") {
            $wh = [
                'StudentStatus' => 'Active',
                'Year' => date('Y'),
            ];
        } else {
            $wh = [
                'StudentClass' => $class,
                'Year' => date('Y'),
                'StudentStatus' => 'Active',
            ];
        }
        $count = DB::table('students')->where($wh)->count();


        if ($count > 0) {

            $query = DB::table('students')->where($wh)->get();
            foreach ($query as $row) {
                array_push(
                    $messages,
                    [
                        "number" => '88' . int_bn_to_en($row->StudentPhoneNumber),
                        "message" => "$deccription"
                    ]
                );
            }
        }




///sms functions
$responsemessege = [];
        try {
            $msgs = sendMessages($messages);
            foreach ($msgs as $value) {
array_push($responsemessege,'Sms Successfully Sent To : ' . $value["number"]);
         }
        } catch (Exception $e) {
            array_push($responsemessege,$e->getMessage());
        }
        return sent_response('message', $responsemessege);
    }


    public function attendence_sheet_sms($class, $view, $date,$school_id)
    {
        $messages = array();
        $wh = [
            'school_id' => $school_id,
            'date' => $date,
            'student_class' => $class,
            'message_status' => 'Pending',
        ];
         $count = DB::table('attendances')->where($wh)->count();
        if ($count > 0) {
            $data = DB::table('attendances')->where($wh)->get();
            $attendance = json_decode($data[0]->attendance);
            $counter = 1;
            foreach ($attendance as $list) {
                if ($list->attendence == 'Absent') {
                    array_push(
                        $messages,
                        [
                            "number" => '88' . int_bn_to_en($list->phone),
                            "message" => "আপনার সন্তান আজ স্কুলে অনুপস্থিত! কারণ দর্শানোর জন্য অনুরোধ করা হইল"
                        ]
                    );
                }
            }
        }




        DB::table('attendances')->where($wh)->update(['message_status' => 'Completed']);


        $responsemessege = [];
        try {
            $msgs = sendMessages($messages);
            foreach ($msgs as $value) {
                array_push($responsemessege,'Sms Successfully Sent To : ' . $value["number"]);
            }
        } catch (Exception $e) {
            array_push($responsemessege,$e->getMessage());
        }
        return sent_response('message', $responsemessege);

    }
}

<?php
namespace App\Http\Controllers\api;
use App\Models\routine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;

class RoutineController extends Controller
{



    public function list(Request $request)
    {


        $result = QueryBuilder::for(routine::class)
        ->distinct()->select('class','year')
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('routne_id'),
            AllowedFilter::exact('year'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('week_name'),
            AllowedFilter::exact('status'),
            'first_period',
            'second_period',
            'thard_period',
            'fourth_period',
            'fith_period',
            'sixth_period',
            'seventh_period'

        ])
        ->get();
    return response()->json($result);

    }

    public function all_list(Request $request)
    {


        $result = QueryBuilder::for(routine::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('routne_id'),
            AllowedFilter::exact('year'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('week_name'),
            AllowedFilter::exact('status'),
            'first_period',
            'second_period',
            'thard_period',
            'fourth_period',
            'fith_period',
            'sixth_period',
            'seventh_period'

        ])
        ->get();
    return response()->json($result);

    }

    public function check(Request $request)
    {


        $result = QueryBuilder::for(routine::class)
        ->distinct()->select('class','year')
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('school_id'),
            AllowedFilter::exact('routne_id'),
            AllowedFilter::exact('year'),
            AllowedFilter::exact('class'),
            AllowedFilter::exact('week_name'),
            AllowedFilter::exact('status'),
            'first_period',
            'second_period',
            'thard_period',
            'fourth_period',
            'fith_period',
            'sixth_period',
            'seventh_period'

        ])
        ->count();
    return response()->json($result);

    }



public function submit(Request $request)
{
    //  return $request->all();
//    return $count =  count($request->first_period);
    $count = routine::where(['class'=>$request->class,'year'=>$request->year])->count();
    $i = 0;

    foreach ($request->first_period as $key => $value) {
        $data = [
            'year'=>$request->year,
            'class'=>$request->class,
            'week_name'=> $key,
            'first_period'=>$request->first_period[$key],
            'second_period'=>$request->second_period[$key],
            'thard_period'=>$request->thard_period[$key],
            'fourth_period'=>$request->fourth_period[$key],
            'fith_period'=>$request->fith_period[$key],
            'sixth_period'=>$request->sixth_period[$key],
            'seventh_period'=>$request->seventh_period[$key],
            'status'=>$request->status,
        ];
        // print_r($data);
        if($count>0){


             $alldata = routine::where(['class'=>$request->class,'year'=>$request->year])->get();
            $id = $alldata[$i]->id;
            $routine = routine::find($id);
            $datas = $routine->update($data);


        //    return response()->json('Already Inserted');
        }else{

           $datas = routine::create($data);
        }

        $i++;
    }

   return response()->json($datas);

}












    public function routine_download($school_id,$class,$year)
    {
        //  $school_id = sitedetails()->school_id;

        $data['class'] =  $class;
        $data['year'] =  $year;

         $rows = routine::where(['class'=>$class,'year'=>$year,'school_id'=>$school_id])->get();

        $data['sign'] = base64(sitedetails()->PRINCIPALS_Signature);


        $fileName = 'Routines-'.date('Y-m-d H:m:s');

        $data['fileName'] = $fileName;


        $pdf = LaravelMpdf::loadView('admin/pdfReports.classroutine',$data,compact('rows'));
        return $pdf->stream("$fileName.pdf");

    }

}

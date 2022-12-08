<?php

namespace App\Http\Controllers;
use lemonpatwari\bangladeshgeocode\Models\Division;
use lemonpatwari\bangladeshgeocode\Models\District;
use lemonpatwari\bangladeshgeocode\Models\Thana;
use lemonpatwari\bangladeshgeocode\Models\Union;
use Illuminate\Http\Request;

class countryApiController extends Controller
{

    public function getdivisions(Request $r)
    {
        $id =  $r->id;
        if($id){
            return Division::find($id);
        }
        return Division::all();
    }

    public function getdistrict(Request $r)
    {
         $ownid =  $r->ownid;
        $id =  $r->id;
        if($ownid){
            return District::find($ownid);
        }
        if($id){
            return District::where(['division_id'=>$id])->get();
        }
        return District::all();

    }

    public function getthana(Request $r)
    {
        $ownid =  $r->ownid;
        $id =  $r->id;
        if($ownid){
            return Thana::find($ownid);
        }

        if($id){
            return  Thana::where('district_id',$id)->get();
        }
        return  Thana::all();
    }


    public function getunioun(Request $r)
    {
        $id =  $r->id;
        if($id){
            return Union::where('thana_id',$id)->get();
        }
        return Union::all();
    }

    public function gotoUnion(Request $r)
    {
        $name =  $r->input('id');
if($name=='Banglabandha'){
    echo 'http://www.banglabanda.localhost:8000/';

}else if($name=='Bhojoanpur'){
    echo 'http://www.bhojoanpur.localhost:8000/';
}else if($name=='Buraburi'){
    echo 'http://www.buraburi.localhost:8000/';
}else if($name=='Debnagar'){
    echo 'http://www.debnagar.localhost:8000/';
}else if($name=='Salbahan'){
    echo 'http://www.salbahan.localhost:8000/';
}else if($name=='Tentulia'){
    echo 'http://www.tetulia.localhost:8000/';
}else if($name=='Timaihat'){
    echo 'http://www.tirnaihat.localhost:8000/';
}else{
    echo 0;
}

    }
}

<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
// class ExCommitteesExport implements FromView
class UsersExport implements FromView
{



    public function view(): View
    {
        return view('Export', ['Products' =>  Payment::where(['status'=>'Paid'])->orderBy('id','desc')->get()
        ]);
    }

}

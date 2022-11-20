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
class ReportExport implements FromView
{

    protected $invoices;

    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }

    public function view(): View
    {

        return view('Export', ['Products' =>  $this->invoices
        ]);
    }

}

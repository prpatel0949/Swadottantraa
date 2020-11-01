<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\ReportRepositoryInterface;

class ReportController extends Controller
{
    private $report;

    public function __construct(ReportRepositoryInterface $report)
    {
        $this->report = $report;
    }
    
    public function program()
    {
        return view('admin.reports.program');
    }

    public function programList()
    {
        return $this->report->programs();
    }
}

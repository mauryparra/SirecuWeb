<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteTrimestral;
use Charts;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->exists('trimestre') && ($request->exists('año')))
        {
            $q = $request->query();
            $reporteT = ReporteTrimestral::Search($q)
                ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                ->paginate(6);
        }
        else {
            $reporteT = ReporteTrimestral::latest()
                ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                ->paginate(6);
        }

        $chart = Charts::multi('areaspline', 'highcharts')
            ->title('Ingresos/Egresos')
            ->colors(['#4572a7', '#aa4643'])
            ->labels($reporteT->map(function ($item) {
                return $item->trimestre->nombre . ' ' .
                    $item->fecha->year;
                }))
            ->dataset('Ingresos', $reporteT->pluck('ingresos'))
            ->dataset('Egresos',  $reporteT->pluck('egresos'));

        return view('dashboard', compact(['reporteT', 'chart']));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteTrimestral;
use Charts;

class GraficoController extends Controller
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
        if ($request->exists('grafico') && ($request->exists('seccional')) && ($request->exists('año')))
        {
            $data = ReporteTrimestral::where('seccional_id', $request->input('seccional'))
                ->where('año', $request->input('año'))
                ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                ->get();

            $chart = Charts::multi('areaspline', 'highcharts')
                ->title('Ingresos/Egresos')
                ->colors(['#4572a7', '#aa4643'])
                ->labels($data->map(function ($item) {
                    return $item->trimestre->nombre . ' ' .
                        $item->año;
                    }))
                ->plotBandsFrom(0)
                ->plotBandsTo(0)
                ->dataset('Ingresos', $data->pluck('ingresos'))
                ->dataset('Egresos',  $data->pluck('egresos'));

            return view('graficos.index', compact('chart'));
        }
        else {
            return view('graficos.index');
        }





    }
}

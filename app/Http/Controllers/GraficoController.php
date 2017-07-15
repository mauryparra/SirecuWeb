<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteTrimestral;
use App\Seccional;
use App\Trimestre;
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

        if ($request->exists(['grafico', 'seccional', 'trimestreDesde', 'añoDesde', 'trimestreHasta', 'añoHasta']))
        {
            $fechaDesde = Trimestre::find($request->input('trimestreDesde'))->fecha_inicio;
            $fechaDesde->year = $request->input('añoDesde');
            $fechaHasta = Trimestre::find($request->input('trimestreHasta'))->fecha_inicio;
            $fechaHasta->year = $request->input('añoHasta');

            if ($request->input('grafico') == "ingreso/egreso")
            {
                $data = ReporteTrimestral::where('seccional_id', $request->input('seccional'))
                    ->where('fecha', '>=', $fechaDesde)
                    ->where('fecha', '<=', $fechaHasta)
                    ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                    ->get();

                $chart = Charts::multi('areaspline', 'highcharts')
                    ->title('Ingresos/Egresos')
                    ->colors(['#4572a7', '#aa4643'])
                    ->labels($data->map(function ($item) {
                        return $item->trimestre->nombre . ' ' .
                            $item->fecha->year;
                        }))
                    ->plotBandsFrom(0)
                    ->plotBandsTo(0)
                    ->dataset('Ingresos', $data->pluck('ingresos'))
                    ->dataset('Egresos',  $data->pluck('egresos'));

            }
            elseif ($request->input('grafico') == "ingresos") {
                # code...
            }
            elseif ($request->input('grafico') == "gastos") {
                # code...
            }
            elseif ($request->input('grafico') == "saldos") {
                # code...
            }
            else {
                return view('graficos.index', [
                    'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                    'trimestres' => Trimestre::all()
                ]);
            }

            return view('graficos.index', [
                'chart' => $chart,
                'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                'trimestres' => Trimestre::all()
            ]);

        }
        else {
            return view('graficos.index', [
                'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                'trimestres' => Trimestre::all()
            ]);
        }
    }
}

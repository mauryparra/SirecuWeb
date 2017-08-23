<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteIngresoMensual;
use App\ReporteEgresoCategoria;
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
                    ->with('trimestre', 'seccional')
                    ->get();

                $chart = Charts::multi('areaspline', 'highcharts')
                    ->title('Ingresos/Egresos ' . $data->first()->seccional->nombre)
                    ->colors(['#4572a7', '#aa4643'])
                    ->labels($data->map(function ($item) {
                        return $item->trimestre->nombre . ' ' .
                            $item->fecha->year;
                        }))
                    ->dataset('Ingresos', $data->pluck('ingresos'))
                    ->dataset('Egresos',  $data->pluck('egresos'));

            }
            elseif ($request->input('grafico') == "ingresos") {
                $data = ReporteIngresoMensual::whereHas('reporteIngreso.reporteTrimestral', function($q) use ($request, $fechaDesde, $fechaHasta) {
                    $q->where('seccional_id', $request->input('seccional'))
                        ->where('fecha', '>=', $fechaDesde)
                        ->where('fecha', '<=', $fechaHasta);
                    })->get();

                $chart = Charts::multi('areaspline', 'highcharts')
                    ->title('Fuentes de Ingresos ' . Seccional::find($request->input('seccional'))->nombre)
                    ->colors(['#4572a7', '#aa4643', '#14ff6b'])
                    ->labels($data->map(function ($item) {
                        return $item->mes->format('F - y');
                        }))
                    ->dataset('Ingresos Provinciales', $data->pluck('ingresos_provincial'))
                    ->dataset('Ingresos Central',  $data->pluck('ingresos_central'))
                    ->dataset('Ingresos Otros',  $data->pluck('ingresos_otros'));
            }
            elseif ($request->input('grafico') == "gastos") {

                $reportes = ReporteEgresoCategoria::whereHas('reporteEgreso.reporteTrimestral', function($q) use ($request, $fechaDesde, $fechaHasta) {
                    $q->where('seccional_id', $request->input('seccional'))
                        ->where('fecha', '>=', $fechaDesde)
                        ->where('fecha', '<=', $fechaHasta);
                    })
                    ->with('categoriaGasto', 'reporteEgreso.reporteTrimestral.trimestre')
                    ->get();

                $labels = [];
                $data = array();

                foreach ($reportes as $reporte) {
                    $labels[$reporte->reporte_egreso_id] = $reporte->reporteEgreso->reporteTrimestral->trimestre->nombre . ' / ' . $reporte->reporteEgreso->reporteTrimestral->fecha->year;

                    $data[$reporte->categoriaGasto->nombre][$reporte->reporte_egreso_id] = $reporte->totalCategoria();
                }


                $chart = Charts::multi('line', 'highcharts')
                    ->title('Fuentes de Egresos')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($labels);

                foreach ($data as $key => $value) {
                    $chart->dataset($key, $value);
                }

            }
            elseif ($request->input('grafico') == "saldos") {
                $data = ReporteTrimestral::where('seccional_id', $request->input('seccional'))
                    ->where('fecha', '>=', $fechaDesde)
                    ->where('fecha', '<=', $fechaHasta)
                    ->with('trimestre', 'seccional')
                    ->get();

                $chart = Charts::multi('areaspline', 'highcharts')
                    ->title('Saldos Finales por Trimestre ' . $data->first()->seccional->nombre)
                    ->colors(['#4572a7', '#14ff6b'])
                    ->labels($data->map(function ($item) {
                        return $item->trimestre->nombre . ' ' .
                            $item->fecha->year;
                        }))
                    ->dataset('Saldo Inicial', $data->pluck('saldo_inicial'))
                    ->dataset('Saldo Final',  $data->pluck('saldo_final'));
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
        else if ($request->exists(['grafico', 'seccional', 'trimestreDesde', 'añoDesde']))
        {
            if ($request->input('grafico') == "gastosTrimestre") {
                $reportes = ReporteEgresoCategoria::whereHas('reporteEgreso.reporteTrimestral', function($q) use ($request) {
                    $q->where('seccional_id', $request->input('seccional'))
                        ->where('trimestre_id', $request->input('trimestreDesde'))
                        ->whereYear('fecha', $request->input('añoDesde'));
                    })
                    ->with('categoriaGasto')
                    ->get();

                $data1 = array();
                foreach ($reportes as $item) {
                    $data1[0][] = $item->categoriaGasto->nombre;
                    $data1[1][] = $item->totalSeccional();
                }

                $data2 = array();
                foreach ($reportes as $item) {
                    $data2[0][] = $item->categoriaGasto->nombre;
                    $data2[1][] = $item->totalCentral();
                }

                $data3 = array(array('UDA Seccional', 'UDA Central'), array(0,0));
                foreach ($reportes as $item) {
                    $data3[1][0] += $item->totalSeccional();
                    $data3[1][1] += $item->totalCentral();
                }

                $chart = Charts::create('pie', 'highcharts')
                    ->title('Categorias de Egresos por Seccional')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($data1[0])
                    ->values($data1[1])
                    ->dimensions(1000,500)
                    ->responsive(true);

                $chart2 = Charts::create('pie', 'highcharts')
                    ->title('Categorías de Egresos por UDA Central')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($data2[0])
                    ->values($data2[1])
                    ->dimensions(1000,500)
                    ->responsive(true);

                $chart3 = Charts::create('pie', 'highcharts')
                    ->title('Egresos de Seccional y UDA Central')
                    ->colors(['#4572a7', '#aa4643', '#387424'])
                    ->labels($data3[0])
                    ->values($data3[1])
                    ->dimensions(1000,500)
                    ->responsive(true);
            }
            else {
                return view('graficos.index', [
                    'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                    'trimestres' => Trimestre::all()
                ]);
            }

            return view('graficos.index', [
                'chart' => $chart,
                'chart2' => $chart2,
                'chart3' => $chart3,
                'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                'trimestres' => Trimestre::all()
            ]);

        } else {

            return view('graficos.index', [
                'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                'trimestres' => Trimestre::all()
            ]);
        }
    }
}

<?php


namespace App\Presenters;

use App\ReporteEgresoCategoria;
use App\ReporteIngresoMensual;
use App\ReporteTrimestral;
use App\Trimestre;
use Charts;

class GraficoPresenter
{
    public function setChart($parameters)
    {
        $fechaDesde = Trimestre::find($parameters['trimestreDesde'])->fecha_inicio;
        $fechaDesde->year = $parameters['añoDesde'];

        if ( ! empty($parameters['trimestreHasta']) )
        {
            $fechaHasta = Trimestre::find($parameters['trimestreHasta'])->fecha_inicio;
            $fechaHasta->year = $parameters['añoHasta'];
        }

        switch ($parameters['grafico']) {
            case "ingreso/egreso":
                $data = ReporteTrimestral::getReportes($parameters['seccional'], $fechaDesde, $fechaHasta);

                if ( count($data) == 0 )
                    break;

                $charts[] = Charts::multi('areaspline', 'highcharts')
                    ->title('Ingresos/Egresos ' . $data->first()->seccional->nombre)
                    ->colors(['#4572a7', '#aa4643'])
                    ->labels($data->map(function ($item) {
                        return $item->trimestre->nombre . ' ' .
                            $item->fecha->year;
                    }))
                    ->dataset('Ingresos', $data->pluck('ingresos'))
                    ->dataset('Egresos', $data->pluck('egresos'));
                return $charts;

            case "ingresos":
                $data = ReporteIngresoMensual::getIngresos($parameters['seccional'], $fechaDesde, $fechaHasta);

                if ( count($data) == 0 )
                    break;

                $charts[] = Charts::multi('areaspline', 'highcharts')
                    ->title('Fuentes de Ingresos ' . $data->first()->reporteIngreso->reporteTrimestral->seccional->nombre)
                    ->colors(['#4572a7', '#aa4643', '#14ff6b'])
                    ->labels($data->map(function ($item) {
                        return $item->mes->format('F - y');
                    }))
                    ->dataset('Ingresos Provinciales', $data->pluck('ingresos_provincial'))
                    ->dataset('Ingresos Central', $data->pluck('ingresos_central'))
                    ->dataset('Ingresos Otros', $data->pluck('ingresos_otros'));
                return $charts;

            case "gastos":
                $reportes = ReporteEgresoCategoria::getEgresosCategorias($parameters['seccional'], $fechaDesde, $fechaHasta);

                if ( count($reportes) == 0 )
                    break;

                $labels = [];
                $data = array();

                foreach ($reportes as $reporte) {
                    $labels[$reporte->reporte_egreso_id] = $reporte->reporteEgreso->reporteTrimestral->trimestre->nombre . ' / ' . $reporte->reporteEgreso->reporteTrimestral->fecha->year;
                    $data[$reporte->categoriaGasto->nombre][$reporte->reporte_egreso_id] = $reporte->totalCategoria();
                }


                $charts[] = Charts::multi('line', 'highcharts')
                    ->title('Fuentes de Egresos')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($labels);

                foreach ($data as $key => $value) {
                    $charts[0]->dataset($key, $value);
                }
                return $charts;

            case "gastosTrimestre":
                $reportes = ReporteEgresoCategoria::getEgresosCategoria($parameters['seccional'], $parameters['trimestreDesde'], $parameters['añoDesde']);

                if ( count($reportes) == 0 )
                    break;

                $dataSeccional = array();
                foreach ($reportes as $item) {
                    $dataSeccional[0][] = $item->categoriaGasto->nombre;
                    $dataSeccional[1][] = $item->totalSeccional();
                }

                $dataCentral = array();
                foreach ($reportes as $item) {
                    $dataCentral[0][] = $item->categoriaGasto->nombre;
                    $dataCentral[1][] = $item->totalCentral();
                }

                $dataTotal = array(array('UDA Seccional', 'UDA Central'), array(0, 0));
                foreach ($reportes as $item) {
                    $dataTotal[1][0] += $item->totalSeccional();
                    $dataTotal[1][1] += $item->totalCentral();
                }

                $charts[] = Charts::create('pie', 'highcharts')
                    ->title('Categorias de Egresos por Seccional')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($dataSeccional[0])
                    ->values($dataSeccional[1])
                    ->dimensions(1000, 500)
                    ->responsive(true);

                $charts[] = Charts::create('pie', 'highcharts')
                    ->title('Categorías de Egresos por UDA Central')
                    ->colors(['#C0392B', '#9B59B6', '#2980B9', '#1ABC9C', '#16A085', '#2ECC71', '#F1C40F', '#F39C12', '#34495E'])
                    ->labels($dataCentral[0])
                    ->values($dataCentral[1])
                    ->dimensions(1000, 500)
                    ->responsive(true);

                $charts[] = Charts::create('pie', 'highcharts')
                    ->title('Egresos de Seccional y UDA Central')
                    ->colors(['#4572a7', '#aa4643', '#387424'])
                    ->labels($dataTotal[0])
                    ->values($dataTotal[1])
                    ->dimensions(1000, 500)
                    ->responsive(true);
                return $charts;

            case "saldos":
                $data = ReporteTrimestral::getReportes($parameters['seccional'], $fechaDesde, $fechaHasta);

                if ( count($data) == 0 )
                    break;

                $charts[] = Charts::multi('areaspline', 'highcharts')
                    ->title('Saldos Finales por Trimestre ' . $data->first()->seccional->nombre)
                    ->colors(['#4572a7', '#14ff6b'])
                    ->labels($data->map(function ($item) {
                        return $item->trimestre->nombre . ' ' .
                            $item->fecha->year;
                    }))
                    ->dataset('Saldo Inicial', $data->pluck('saldo_inicial'))
                    ->dataset('Saldo Final', $data->pluck('saldo_final'));
                return $charts;
        }
    }
}

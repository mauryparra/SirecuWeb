<?php

use Illuminate\Database\Seeder;

class ReportesDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reportes Trimestrales
        for ($año=2015; $año < 2018; $año++) {
            for ($trimestre=1; $trimestre < 5; $trimestre++) {
                DB::table('reportes_trimestrales')->insert([
                    'seccional_id' => 2,
                    'trimestre_id' => $trimestre,
                    'año' => $año,
                    'saldo_inicial' => rand(50, 300),
                    'ingresos' => rand(50, 300),
                    'egresos' => rand(50, 300),
                    'saldo_final' => rand(50, 300),
                ]);
            }
        }

        // Reportes Ingresos
        foreach (App\ReporteTrimestral::all() as $reporteT) {
            DB::table('reportes_ingresos')->insert([
                'reporte_trimestral_id' => $reporteT->id,
                'total_provincial' => rand(50, 300),
                'coparticipacion' => rand(50, 300),
                'total_general' => rand(50, 300),
            ]);
        }

        // Reportes Ingresos Mensuales
        foreach (App\ReporteIngreso::all() as $reporteI) {
            for ($mes=1; $mes < 4; $mes++) {
                DB::table('reportes_ingresos_mensuales')->insert([
                    'reporte_ingreso_id' => $reporteI->id,
                    'mes' => $reporteI->reporteTrimestral->año . '-' . $mes . '-01',
                    'ingresos_provincial' => rand(50, 300),
                    'ingresos_otros' => rand(50, 300),
                    'ingresos_central' => rand(50, 300),
                ]);
            }
        }

        // Reportes Egresos
        foreach (App\ReporteTrimestral::all() as $reporteT) {
            DB::table('reportes_egresos')->insert([
                'reporte_trimestral_id' => $reporteT->id,
                'total' => rand(120, 980),
                'total_central' => rand(120, 980),
            ]);
        }

        // Reportes Egresos Categorias
        foreach (App\ReporteEgreso::all() as $reporteE) {
            foreach (App\CategoriaGasto::all() as $categoria) {
                DB::table('reportes_egresos_categorias')->insert([
                    'reporte_egreso_id' => $reporteE->id,
                    'categoria_gasto_id' => $categoria->id,
                    'total_mes_1' => rand(100, 500),
                    'total_mes_2' => rand(100, 500),
                    'total_mes_3' => rand(100, 500),
                    'total_mes_1_central' => rand(100, 500),
                    'total_mes_2_central' => rand(100, 500),
                    'total_mes_3_central' => rand(100, 500),
                ]);
            }
        }

    }
}

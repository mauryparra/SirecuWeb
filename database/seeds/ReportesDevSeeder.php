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
        foreach (App\ReporteTrimestral::latest()->get() as $reporteT) {
            DB::table('reportes_ingresos')->insert([
                'reporte_trimestral_id' => $reporteT->id,
                'total_provincial' => rand(50, 300),
                'coparticipacion' => rand(50, 300),
                'total_general' => rand(50, 300),
            ]);
        }

        // Reportes Ingresos Mensuales
        foreach (App\ReporteIngreso::latest()->get() as $reporteI) {
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

    }
}

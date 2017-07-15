<?php

use Illuminate\Database\Seeder;

class TrimestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = [
            'Primer Trimestre',
            'Segundo Trimestre',
            'Tercer Trimestre',
            'Cuarto Trimestre',
        ];

        $fecha_inicio = Carbon\Carbon::createFromFormat('Y-m-d', '0000-1-1');

        foreach ($nombres as $nombre) {

            if ($nombre == 'Segundo Trimestre') {
                $fecha_inicio->month = 4;
            }
            elseif ($nombre == 'Tercer Trimestre') {
                $fecha_inicio->month = 7;
            }
            elseif ($nombre == 'Cuarto Trimestre') {
                $fecha_inicio->month = 10;
            }

            DB::table('trimestres')->insert([
                'nombre' => $nombre,
                'fecha_inicio' => $fecha_inicio,
            ]);
        }
    }
}

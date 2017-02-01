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

        foreach ($nombres as $nombre) {
            DB::table('trimestres')->insert([
                'nombre' => $nombre,
            ]);
        }
    }
}

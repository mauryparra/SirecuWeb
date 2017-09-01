<?php

use Illuminate\Database\Seeder;

class CategoriasGastosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = [
            'Gtos. de Desenvolvimiento',
            'Gtos. Administrativos',
            'Libreria e Impresos',
            'Prensa y Difusión',
            'Alquileres',
            'Franqueo y Encomiendas',
            'Impuestos y Servicios',
            'Seguros',
            'Gtos. Bancarios',
            'Honorarios',
            'Movilidad y Traslado',
            'Subsidios',
            'Prestaciones',
            'Filiales',
            'Coparticipación',
        ];

        foreach ($nombres as $nombre) {
            DB::table('categorias_gastos')->insert([
                'nombre' => $nombre,
            ]);
        }
    }
}

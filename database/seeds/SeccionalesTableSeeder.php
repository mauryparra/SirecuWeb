<?php

use Illuminate\Database\Seeder;

class SeccionalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccionales')->insert([
            'nombre' => 'UDA Central',
        ]);
        DB::table('seccionales')->insert([
            'nombre' => 'UDA La Rioja',
        ]);
    }
}

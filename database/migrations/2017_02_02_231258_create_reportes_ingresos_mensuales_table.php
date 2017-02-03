<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesIngresosMensualesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_ingresos_mensuales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporte_ingreso_id')->unsigned();
            $table->date('mes');
            $table->decimal('ingresos_provincial', 11, 2);
            $table->decimal('ingresos_otros', 11, 2);
            $table->decimal('ingresos_central', 11, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_ingresos_mensuales');
    }
}

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

            $table->foreign('reporte_ingreso_id')->references('id')->on('reportes_ingresos');
            $table->unique(['reporte_ingreso_id', 'mes']);
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

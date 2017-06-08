<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporte_trimestral_id')->unsigned();
            $table->decimal('total_provincial', 11, 2);
            $table->decimal('coparticipacion', 11, 2);
            $table->decimal('total_general', 11, 2);
            $table->timestamps();

            $table->foreign('reporte_trimestral_id')->references('id')->on('reportes_trimestrales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_ingresos');
    }
}

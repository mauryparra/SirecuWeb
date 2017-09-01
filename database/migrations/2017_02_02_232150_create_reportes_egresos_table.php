<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporte_trimestral_id')->unsigned();
            $table->decimal('total', 11, 2);
            $table->decimal('total_central', 11, 2);
            $table->timestamps();

            $table->foreign('reporte_trimestral_id')->references('id')->on('reportes_trimestrales');
            $table->unique('reporte_trimestral_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_egresos');
    }
}

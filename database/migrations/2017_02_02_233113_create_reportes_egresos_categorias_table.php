<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesEgresosCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_egresos_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reporte_egreso_id')->unsigned();
            $table->integer('categoria_gasto_id')->unsigned();
            $table->date('mes');
            $table->decimal('total', 11, 2);
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
        Schema::dropIfExists('reportes_egresos_categorias');
    }
}

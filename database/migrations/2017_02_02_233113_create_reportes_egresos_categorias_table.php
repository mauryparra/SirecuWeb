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
            $table->decimal('total_mes_1', 11, 2);
            $table->decimal('total_mes_2', 11, 2);
            $table->decimal('total_mes_3', 11, 2);
            $table->timestamps();

            $table->foreign('reporte_egreso_id')->references('id')->on('reportes_egresos');
            $table->foreign('categoria_gasto_id')->references('id')->on('categorias_gastos');
            $table->unique(['reporte_egreso_id', 'categoria_gasto_id'], 'reportes_egregos_cat_unique');
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

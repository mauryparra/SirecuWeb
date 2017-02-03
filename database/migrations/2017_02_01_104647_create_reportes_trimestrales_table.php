<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTrimestralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_trimestrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccional_id')->unsigned();
            $table->integer('trimestre_id')->unsigned();
            $table->smallInteger('año')->unsigned();
            $table->decimal('saldo_inicial', 11, 2);
            $table->decimal('ingresos', 11, 2);
            $table->decimal('egresos', 11, 2);
            $table->decimal('saldo_final', 11, 2);
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
        Schema::dropIfExists('reportes_trimestrales');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteEgresoCategoria extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportes_egresos_categorias';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_mes_1',
        'total_mes_2',
        'total_mes_3',
        'total_mes_1_central',
        'total_mes_2_central',
        'total_mes_3_central',
    ];

    /**
     * Obtiene el reporte de egresos asociado al reporte de egresos por categorias
     */
    public function reporteEgreso()
    {
        return $this->belongsTo('App\ReporteEgreso', 'reporte_egreso_id');
    }

    /**
     * Obtiene la categoria de gastos asociado al reporte de egresos por categorias
     */
    public function categoriaGasto()
    {
        return $this->belongsTo('App\CategoriaGasto', 'categoria_gasto_id');
    }

    /**
     * Obtiene el total de egresos por categoria de la seccional
     */
    public function totalSeccional()
    {
        return $this->total_mes_1 + $this->total_mes_2 + $this->total_mes_3;
    }

    /**
     * Obtiene el total de egresos por categoria de la central
     */
    public function totalCentral()
    {
        return $this->total_mes_1_central + $this->total_mes_2_central + $this->total_mes_3_central;
    }

    /**
     * Obtiene el total de egresos por categoria de la central
     */
    public function totalCategoria()
    {
        return $this->totalCentral() + $this->totalSeccional();
    }
}

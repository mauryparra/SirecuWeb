<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteIngresoMensual extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportes_ingresos_mensuales';

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
    protected $fillable = ['ingresos_provincial', 'ingresos_otros', 'ingresos_central'];

    /**
     * Las columnas de la tabla de tipo Date
     *
     * @var array
     */
    protected $dates = ['mes'];

    /**
     * Obtiene el reporte de ingresos asociado al reporte de ingresos mensual
     */
    public function reporteIngreso()
    {
        return $this->belongsTo('App\ReporteIngreso', 'reporte_ingreso_id');
    }
}

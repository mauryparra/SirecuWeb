<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteIngreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportes_ingresos';

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
    protected $fillable = ['total_provincial', 'coparticipacion', 'total_general'];

    /**
     * Obtiene el reporte trimestral asociado al reporte de ingresos
     */
    public function reporteTrimestral()
    {
        return $this->belongsTo('App\ReporteTrimestral', 'reporte_trimestral_id');
    }

    /**
     * Obtiene los reportes de ingresos mensuales asociados al reporte de ingresos
     */
    public function reportesIngresosMensuales()
    {
        return $this->hasMany('App\ReporteIngresoMensual', 'reporte_ingreso_id');
    }

    public function path()
    {
        return '/ingresos/' . $this->id;
    }
}

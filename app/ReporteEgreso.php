<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteEgreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportes_egresos';

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
    protected $fillable = ['total'];

    /**
     * Obtiene el reporte trimestral asociado al reporte de egresos
     */
    public function reporteTrimestral()
    {
        return $this->belongsTo('App\ReporteTrimestral', 'reporte_trimestral_id');
    }

    /**
     * Obtiene la seccional asociada al reporte de egresos
     */
    public function seccional()
    {
        return $this->belongsTo('App\Seccional', 'seccional_id');
    }

    /**
     * Obtiene los reportes de egresos por categorias asociadas al reporte de egresos
     */
    public function reporteEgresosCategorias()
    {
        return $this->hasMany('App\ReporteEgresoCategoria', 'reporte_egreso_id');
    }

    public function path()
    {
        return '/egresos/' . $this->id;
    }
}

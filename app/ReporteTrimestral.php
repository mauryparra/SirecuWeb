<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteTrimestral extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reportes_trimestrales';

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
    protected $fillable = ['saldo_inicial', 'ingresos', 'egresos', 'saldo_final'];

    /**
     * Obtiene el reporte de ingresos asociado al trimestre
     */
    public function ingreso()
    {
        return $this->hasOne('App\ReporteIngreso', 'reporte_trimestral_id');
    }

    /**
     * Obtiene los reportes de egresos asociados al trimestre
     */
    public function egreso()
    {
        return $this->hasOne('App\ReporteEgreso', 'reporte_trimestral_id');
    }

    /**
     * Obtiene la seccional asociada al reporte trimestral
     */
    public function seccional()
    {
        return $this->belongsTo('App\Seccional', 'seccional_id');
    }

    /**
     * Obtiene el trimestre asociado al reporte trimestral
     */
    public function trimestre()
    {
        return $this->belongsTo('App\Trimestre', 'trimestre_id');
    }

    public function path()
    {
        return '/reportes/' . $this->id;
    }
}

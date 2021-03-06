<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trimestres';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];

    /**
     * Obtiene los reportes trimestrales asociados al trimestre
     */
    public function reportesTrimestrales()
    {
        return $this->hasMany('App\ReporteTrimestral', 'trimestre_id');
    }

    /**
     * Las columnas de la tabla de tipo Date
     *
     * @var array
     */
    protected $dates = ['fecha_inicio', 'fecha_fin'];
}

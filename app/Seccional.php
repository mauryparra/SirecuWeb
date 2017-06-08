<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccional extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seccionales';

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
    protected $fillable = ['nombre'];

    /**
     * Obtiene los reportes trimestrales asociados al trimestre
     */
    public function reportesTrimestrales()
    {
        return $this->hasMany('App\ReporteTrimestral', 'seccional_id');
    }
}

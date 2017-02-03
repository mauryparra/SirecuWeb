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
}

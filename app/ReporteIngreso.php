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
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['total_provincial', 'total_otros', 'total_central'];
}

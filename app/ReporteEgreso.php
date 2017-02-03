<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteEgresos extends Model
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
}

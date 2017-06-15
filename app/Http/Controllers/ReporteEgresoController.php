<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteEgreso;

class ReporteEgresoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('egresos.index', ['reportesEgresos' => ReporteEgreso::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reporte_trimestral_id)
    {
        $reporteSecc = ReporteEgreso::where('reporte_trimestral_id', $reporte_trimestral_id)
            ->where('seccional_id', '>', 1)->firstOrFail();
        $reporteCentral = ReporteEgreso::where('reporte_trimestral_id', $reporte_trimestral_id)
            ->where('seccional_id', '=', 1)->firstOrFail();
        return view('egresos.show', ['reporteSecc' => $reporteSecc, 'reporteCentral' => $reporteCentral]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

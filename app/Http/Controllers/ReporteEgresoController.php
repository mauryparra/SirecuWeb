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
        $reportesEgresos = ReporteEgreso::latest()
            ->with('reporteTrimestral.trimestre', 'reporteTrimestral.seccional')
            ->paginate(6);

        return view('egresos.index', compact('reportesEgresos'));
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
     * @param  ReporteEgreso  $reporteEgreso
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteEgreso $reporteEgreso)
    {
        $reporteEgreso->load('reportesEgresosCategorias.categoriaGasto')->get();
        return view('egresos.show', compact('reporteEgreso'));
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

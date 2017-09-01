<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccional;
use App\Trimestre;
use App\Presenters\GraficoPresenter;

class GraficoController extends Controller
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
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ( ! empty($request->request->all()) )
        {
            $this->validate($request, [
                'grafico' => 'required',
                'seccional' => 'required',
                'trimestreDesde' => 'required',
                'añoDesde' => 'required',
                'trimestreHasta' => 'required_unless:grafico,gastosTrimestre',
                'añoHasta' => 'required_unless:grafico,gastosTrimestre',

            ]);

            $presenter = new GraficoPresenter();
            $charts = $presenter->setChart($request->request->all());
            
            return view('graficos.index', [
                'charts' => $charts,
                'seccionales' => Seccional::orderBy('id', 'desc')->get(),
                'trimestres' => Trimestre::all()
            ]);
        }

        return view('graficos.index', [
            'seccionales' => Seccional::orderBy('id', 'desc')->get(),
            'trimestres' => Trimestre::all()
        ]);
    }
}

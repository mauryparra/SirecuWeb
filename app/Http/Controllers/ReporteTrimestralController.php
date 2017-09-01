<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteTrimestral;

class ReporteTrimestralController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->exists('trimestre') && ($request->exists('año')))
        {
            $q = $request->query();
            $reporteT = ReporteTrimestral::Search($q)
                ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                ->paginate(6);
        }
        else {
            $reporteT = ReporteTrimestral::latest()
                ->with('trimestre', 'seccional', 'ingreso', 'egreso')
                ->paginate(6);
        }

        return view('reportes.index', compact('reporteT'));
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
     * @param  ReporteTrimestral  $reporteT
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteTrimestral $reporteT)
    {
        return view('reportes.show', compact('reporteT'));
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

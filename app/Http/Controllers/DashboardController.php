<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReporteTrimestral;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query();
        if ($q)
        {
            return view('dashboard', ['reporteT' => ReporteTrimestral::Search($q)->get()]);
        }
        else {
            return view('dashboard', ['reporteT' => ReporteTrimestral::latest()->get()]);
        }
    }
}

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
        if ($request->exists('trimestre') && ($request->exists('año')))
        {
            $q = $request->query();
            return view('dashboard', ['reporteT' => ReporteTrimestral::Search($q)->paginate(6)]);
        }
        else {
            return view('dashboard', ['reporteT' => ReporteTrimestral::latest()->paginate(6)]);
        }
    }
}

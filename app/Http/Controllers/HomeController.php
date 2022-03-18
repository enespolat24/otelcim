<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ilan = Auth::user()->ilanlar()->get();
        $is_ev_sahibi = Auth::user()->is_ev_sahibi;
        return view('home', compact('ilan','is_ev_sahibi'));
    }
}

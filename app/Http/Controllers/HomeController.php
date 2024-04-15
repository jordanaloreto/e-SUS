<?php

namespace App\Http\Controllers;
use Auth;   

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        return view('dashboard.corpo');
    }
    public function sair()
    {
        Auth::logout();
        return redirect()->Route('login');
    }
    public function telaInicial()
    {
        return redirect()->Route('login');
    }
}

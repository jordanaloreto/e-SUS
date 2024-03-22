<?php

namespace App\Http\Controllers;

use App\Models\Enfermeiras;
use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\EscutaInicial;
use App\Models\Medicos;
use App\Models\Prontuario;
use Yajra\DataTables\DataTables;


class ProntuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escutaInicial = EscutaInicial::all();
        // $pacientes = Pacientes::all();

        return view('consulta.listagemEscutaInicial');
    }

    public function form()
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::all();
        $enfermeiras = Enfermeiras::all();
        $escutaInicial = EscutaInicial::all();
        
        return view('consulta.cadastroProntuario', compact('pacientes', 'medicos', 'enfermeiras', 'escutaInicial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escutaInicial = EscutaInicial::select(['id', 'pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado']);
    
        return DataTables::of($escutaInicial)
            ->rawColumns(['pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado']) 
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->id)){
            $prontuario = Prontuario::findOrFail($request->id);
        }else{
            $prontuario = new Prontuario();
        }
        $prontuario->pacienteSelecionado = $request->pacienteSelecionado;
        $prontuario->medicoSelecionado = $request->medicoSelecionado;
        $prontuario->enfermeiraSelecionado = $request->enfermeiraSelecionado;
        $prontuario->diagnostico = $request->diagnostico;
        $prontuario->remedios = $request->remedios;
        $prontuario->tratamento = $request->tratamento;
        $prontuario->historia = $request->historia;
        $prontuario->antecedentes = $request->antecedentes;
        $prontuario->exameFisico = $request->exameFisico;
        $prontuario->localExames = $request->localExames;
        $prontuario->exames = $request->exames;

        $prontuario->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

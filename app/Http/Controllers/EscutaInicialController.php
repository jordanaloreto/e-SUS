<?php

namespace App\Http\Controllers;

use App\Models\Enfermeiras;
use App\Models\EscutaInicial;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class EscutaInicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $escutaInicial = EscutaInicial::all();
        $pacientes = Pacientes::all();
        // $enfermeiras = Enfermeiras::all();
        if(Auth::user()->permissoes == 0)
            return view('escutaInicial.listagemPacienteEscuta');
        else{
            return view('dashboard.corpo');
        }
    }

    public function form($paciente_id = null)
{
    $pacientes = Pacientes::all();
    $medicos = Medicos::all();
    $enfermeiras = Enfermeiras::all();
    
    // Encontre o paciente selecionado
    $pacienteSelecionado = Pacientes::find($paciente_id);

    return view('escutaInicial.cadastroEscutaInicial', compact('pacientes', 'medicos', 'enfermeiras', 'pacienteSelecionado'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Pacientes::select(['id', 'nomePaciente', 'cpfPaciente', 'escuta']); // Inclua 'escuta'
        
        return DataTables::of($pacientes)
            ->rawColumns(['nomePaciente', 'cpfPaciente'])
            ->editColumn('nomePaciente', function ($paciente) {
                // Altera a cor do texto com base no valor do campo 'escuta'
                $style = $paciente->escuta ? 'color: green;' : '';
                return '<span style="' . $style . '">' . $paciente->nomePaciente . '</span>'; // Aplica estilo
            })
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
        // Verifica se há um ID na requisição para atualizar um registro existente
        if (!empty($request->id)) {
            $escutaInicial = EscutaInicial::findOrFail($request->id);
        } else {
            $escutaInicial = new EscutaInicial();
        }
    
        // Preenche os dados da escuta inicial
        $escutaInicial->pacienteSelecionado = $request->pacienteSelecionado;
        $escutaInicial->medicoSelecionado = $request->medicoSelecionado;
        $escutaInicial->enfermeiraSelecionado = $request->enfermeiraSelecionado;
        $escutaInicial->peso = $request->peso;
        $escutaInicial->glicemia = $request->glicemia;
        $escutaInicial->altura = $request->altura;
        $escutaInicial->fc = $request->fc;
        $escutaInicial->fr = $request->fr;
        $escutaInicial->problema = $request->problema;
        $escutaInicial->risco = $request->risco;
        $escutaInicial->imc = $request->imc;
        $escutaInicial->temperatura = $request->temperatura;
        $escutaInicial->sat = $request->sat;
        $escutaInicial->consulta = $request->consulta;
    
        // Salva os dados da escuta inicial
        $escutaInicial->save();
    
        // Desmarcar o checkbox escuta do paciente
        $paciente = Pacientes::find($request->pacienteSelecionado); // Acessa o paciente usando o ID do paciente selecionado
        if ($paciente) {
            $paciente->escuta = 0; // Desmarca o checkbox
            $paciente->save(); // Salva a alteração
        }
    
        return back(); // Redireciona de volta
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
        $escutaInicial = Pacientes::findOrFail($id);
        return view('escutaInicial.cadastroEscutaInicial')->with('msg', 'Paciente Editado!')
        ->with('id', $id)->with('escutaInicial', $escutaInicial);
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
        EscutaInicial::findOrFail($id)->delete();

        return redirect()->route('listagemPacienteEscuta')->with('msg', 'Paciente excluído com sucesso!');
    }
}

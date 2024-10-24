<?php

namespace App\Http\Controllers;

use App\Models\Enfermeiras;
use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\EscutaInicial;
use App\Models\Medicos;
use App\Models\Prontuario;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        foreach ($escutaInicial as $escuta) {
            $escuta->pacienteSelecionado = Pacientes::find($escuta->pacienteSelecionado);
            $escuta->medicoSelecionado = Medicos::find($escuta->medicoSelecionado)->nomeMedico;
            $escuta->enfermeiraSelecionado = Enfermeiras::find($escuta->enfermeiraSelecionado)->nomeEnfermeira;
        }
        if (Auth::user()->permissoes == 0)
            return view('consulta.listagemEscutaInicial', compact('escutaInicial'));
        else {
            return view('dashboard.corpo');
        }
    }

    public function form($paciente_id = null, $medico_id = null, $enfermeira_id = null)
    {
        $pacientes = Pacientes::all();
        $medicos = Medicos::all();
        $enfermeiras = Enfermeiras::all();

        // Busque os pacientes, médicos e enfermeiras
        $pacienteSelecionado = Pacientes::find($paciente_id);
        $medicoSelecionado = Medicos::find($medico_id);
        $enfermeiraSelecionado = Enfermeiras::find($enfermeira_id);

        return view('consulta.cadastroProntuario', compact('pacientes', 'medicos', 'enfermeiras', 'pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    // Filtra apenas os escuta iniciais onde o checkbox 'consulta' está marcado (igual a 1)
    $escutaInicial = EscutaInicial::select(['id', 'pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado', 'consulta'])
        ->where('consulta', 1) // Apenas escutas com consulta marcada
        ->get();

    // Substitui IDs pelos nomes e prepara para o DataTable
    $escutas = $escutaInicial->map(function ($escuta) {
        $paciente = Pacientes::find($escuta->pacienteSelecionado);
        $medico = Medicos::find($escuta->medicoSelecionado);
        $enfermeira = Enfermeiras::find($escuta->enfermeiraSelecionado);

        return [
            'id' => $escuta->id,
            'pacienteSelecionado' => $paciente ? $paciente->nomePaciente : 'Nome não encontrado',
            'medicoSelecionado' => $medico ? $medico->nomeMedico : 'Nome não encontrado',
            'medico_id' => $medico ? $medico->id : null, // Retorna o ID do médico
            'enfermeiraSelecionado' => $enfermeira ? $enfermeira->nomeEnfermeira : 'Nome não encontrado',
            'enfermeira_id' => $enfermeira ? $enfermeira->id : null, // Retorna o ID da enfermeira
            'consulta' => $escuta->consulta
        ];
    });

    return DataTables::of($escutas)
        ->rawColumns(['action'])
        ->make(true);
}




    public function indexProntuario()
    {
        if (Auth::user()->permissoes == 0)
            return view('prontuario.listagemProntuario');
        else {
            return view('dashboard.corpo');
        }
    }

    public function listarHistorico()
    {
        // Executa a consulta e obtém os resultados
        $prontuario = Prontuario::select(['id', 'pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado'])->get();

        // Cria um novo array para armazenar os resultados modificados
        $prontuarios = $prontuario->map(function ($prontuario) {
            // Substitui os IDs pelos nomes, verificando se o resultado do find não é null
            $prontuario->pacienteSelecionado = Pacientes::find($prontuario->pacienteSelecionado)->nomePaciente ?? 'Nome não encontrado';
            $prontuario->medicoSelecionado = Medicos::find($prontuario->medicoSelecionado)->nomeMedico ?? 'Nome não encontrado';
            $prontuario->enfermeiraSelecionado = Enfermeiras::find($prontuario->enfermeiraSelecionado)->nomeEnfermeira ?? 'Nome não encontrado';
            return $prontuario;
        });

        // Retorna os dados para DataTables
        return DataTables::of($prontuarios)
            ->rawColumns(['pacienteSelecionado', 'medicoSelecionado', 'enfermeiraSelecionado'])
            ->make(true);
    }

    public function show($id)
    {
        $prontuario = DB::table('prontuarios')
            ->join('pacientes', 'prontuarios.pacienteSelecionado', 'pacientes.id')
            ->join('medicos', 'prontuarios.medicoSelecionado', 'medicos.id')
            ->join('enfermeiras', 'prontuarios.enfermeiraSelecionado', 'enfermeiras.id')
            ->select('enfermeiras.nomeEnfermeira', 'pacientes.nomePaciente', 'medicos.nomeMedico', 'prontuarios.*')
            ->where('prontuarios.id', $id)->first();
        // var_dump($id);
        return view('prontuario.visualizarProntuario')->with('prontuario', $prontuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->id)) {
            $prontuario = Prontuario::findOrFail($request->id);
        } else {
            $prontuario = new Prontuario();
        }

        // Salvando os dados do prontuário
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
        $prontuario->queixa = $request->queixa;
        $prontuario->conduta = $request->conduta;

        $prontuario->save();

        // Desmarcar o checkbox consulta do paciente
        $escutaInicial = EscutaInicial::find($request->pacienteSelecionado);
        if ($escutaInicial) {
            $escutaInicial->consulta = 0; // Desmarca o checkbox 'consulta'
            $escutaInicial->save();
        }

        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

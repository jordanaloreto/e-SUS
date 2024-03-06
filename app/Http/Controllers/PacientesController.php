<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::all();
        return view('pacientes.listagemPaciente');
    }

    public function form()
    {
        return view('pacientes.cadastroPacientes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Pacientes::select(['id', 'nomePaciente', 'cpfPaciente']);
    
        return DataTables::of($pacientes)
            ->rawColumns(['nomePaciente', 'cpfPaciente'])
            ->addColumn('acao', function ($pacientes) {
                $editar = '<a href="/pacientes/editarPaciente/' . $pacientes->id . '" alt="Editar" data-target="#EditarPaciente' . $pacientes->id . '" data-id="' . $pacientes->id . '" data-toggle="modal"><i class="fas fa-pencil-alt" aria-hidden="true" style="font-size:15px;color:#007bff;"></i></a>';
                $excluir = '<a href="/pacientes/deletarPaciente/' . $pacientes->id . '" alt="Excluir" data-target="/pacientes/deletarPaciente/'.$pacientes->id . '" data-id="' . $pacientes->id . '" data-toggle="modal"><i class="far fa-trash-alt" aria-hidden="true" style="font-size:15px;color:#cc0808;"></i></a>';
                return  $editar . '&nbsp;&nbsp;' . $excluir;
            })
            ->rawColumns(['acao'])
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
            $pacientes = Pacientes::findOrFail($request->id);
        }else{
            $pacientes = new Pacientes();
        }
        $pacientes->nomePaciente = $request->nomePaciente;
        $pacientes->dNascimentoPaciente = $request->dNascimentoPaciente;
        $pacientes->sexoPaciente = $request->sexoPaciente;
        $pacientes->cpfPaciente = $request->cpfPaciente;
        $pacientes->susPaciente = $request->susPaciente;
        $pacientes->telefonePaciente = $request->telefonePaciente;
        $pacientes->enderecoPaciente = $request->enderecoPaciente;
        $pacientes->cepPaciente = $request->cepPaciente;
        $pacientes->maePaciente = $request->maePaciente;
        $pacientes->paiPaciente = $request->paiPaciente;

        $pacientes->save();

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
        // Find the patient by ID
        $pacientes = Pacientes::findOrFail($id);
        return view('pacientes.cadastroPacientes')->with('msg', 'Paciente Editado!')
        ->with('id', $id)->with('pacientes', $pacientes);
    
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
        Pacientes::findOrFail($id)->delete();

        return redirect()->route('listagemPaciente')->with('msg', 'Paciente excluído com sucesso!');
    }
}

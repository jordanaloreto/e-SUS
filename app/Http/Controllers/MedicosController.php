<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::all();
        if(Auth::user()->permissoes == 0)
            return view('medicos.listagemMedicos');
        else{
            return view('dashboard.corpo');
        }
    }

    public function form()
    {
        return view('medicos.cadastroMedicos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medicos::select(['id', 'nomeMedico', 'cpfMedico']);
    
        return DataTables::of($medicos)
            ->rawColumns(['nomeMedico', 'cpfMedico'])
            ->addColumn('acao', function ($medicos) {
                $editar = '<a href="/medicos/editarMedico/' . $medicos->id . '" alt="Editar" data-target="#EditarMedico' . $medicos->id . '" data-id="' . $medicos->id . '" data-toggle="modal"><i class="fas fa-pencil-alt" aria-hidden="true" style="font-size:15px;color:#007bff;"></i></a>';
                $excluir = '<a href="/medicos/deletarMedico/' . $medicos->id . '" alt="Excluir" data-target="/medicos/deletarMedico/'.$medicos->id . '" data-id="' . $medicos->id . '" data-toggle="modal"><i class="far fa-trash-alt" aria-hidden="true" style="font-size:15px;color:#cc0808;"></i></a>';
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
            $medicos = Medicos::findOrFail($request->id);
        }else{
            $medicos = new Medicos();
        }
        $medicos->nomeMedico = $request->nomeMedico;
        $medicos->sexoMedico = $request->sexoMedico;
        $medicos->cpfMedico = $request->cpfMedico;
        $medicos->telefoneMedico = $request->telefoneMedico;
        $medicos->enderecoMedico = $request->enderecoMedico;
        $medicos->cepMedico = $request->cepMedico;
        $medicos->maeMedico = $request->maeMedico;
        $medicos->paiMedico = $request->paiMedico;
        $medicos->crm = $request->crm;
        $medicos->dn = $request->dn;
        $medicos->dNascimentoMedico = $request->dNascimentoMedico;

        $medicos->save();

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
        $medicos = Medicos::findOrFail($id);
        return view('medicos.cadastroMedicos')->with('msg', 'Medico Editado!')
        ->with('id', $id)->with('medicos', $medicos);
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
    if (medicoHasEscutaInicial($id)) {
        Session::flash('erroDelete', 'Este médico não pode ser excluído pois está associado a uma escuta inicial!');
        return redirect()->route('listagemMedico');
    }

    Medicos::findOrFail($id)->delete();

    Session::flash('sucessoDelete', 'Médico excluído com sucesso!');
    return redirect()->route('listagemMedico');
    }
}

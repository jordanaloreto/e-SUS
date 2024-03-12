<?php

namespace App\Http\Controllers;

use App\Models\Enfermeiras;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EnfermeirasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermeiras = Enfermeiras::all();
        return view('enfermeiras.listagemEnfermeiras');
    }

    public function form()
    {
        return view('enfermeiras.cadastroEnfermeiras');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermeiras = Enfermeiras::select(['id', 'nomeEnfermeira', 'cpfEnfermeira']);
    
        return DataTables::of($enfermeiras)
            ->rawColumns(['nomeEnfermeira', 'cpfEnfermeira'])
            ->addColumn('acao', function ($enfermeiras) {
                $editar = '<a href="/enfermeiras/editarEnfermeira/' . $enfermeiras->id . '" alt="Editar" data-target="#EditarEnfermeira' . $enfermeiras->id . '" data-id="' . $enfermeiras->id . '" data-toggle="modal"><i class="fas fa-pencil-alt" aria-hidden="true" style="font-size:15px;color:#007bff;"></i></a>';
                $excluir = '<a href="/enfermeiras/deletarEnfermeira/' . $enfermeiras->id . '" alt="Excluir" data-target="/enfermeiras/deletarEnfermeira/'.$enfermeiras->id . '" data-id="' . $enfermeiras->id . '" data-toggle="modal"><i class="far fa-trash-alt" aria-hidden="true" style="font-size:15px;color:#cc0808;"></i></a>';
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
            $enfermeiras = Enfermeiras::findOrFail($request->id);
        }else{
            $enfermeiras = new Enfermeiras();
        }
        $enfermeiras->nomeEnfermeira = $request->nomeEnfermeira;
        $enfermeiras->sexoEnfermeira = $request->sexoEnfermeira;
        $enfermeiras->cpfEnfermeira = $request->cpfEnfermeira;
        $enfermeiras->telefoneEnfermeira = $request->telefoneEnfermeira;
        $enfermeiras->enderecoEnfermeira = $request->enderecoEnfermeira;
        $enfermeiras->cepEnfermeira = $request->cepEnfermeira;
        $enfermeiras->maeEnfermeira = $request->maeEnfermeira;
        $enfermeiras->paiEnfermeira = $request->paiEnfermeira;
        $enfermeiras->corem = $request->corem;
        $enfermeiras->dnEnfermeira = $request->dnEnfermeira;

        $enfermeiras->save();

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
        $enfermeiras = Enfermeiras::findOrFail($id);
        return view('enfermeiras.cadastroEnfermeiras')->with('msg', 'Enfermeira Editado!')
        ->with('id', $id)->with('enfermeiras', $enfermeiras);
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
        Enfermeiras::findOrFail($id)->delete();

        return redirect()->route('listagemEnfermeiras')->with('msg', 'Enfermeira excluída com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensagem;
use App\Contato;

class MensagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('mensagens.lista_mensagens');
    }

    public function index()
    {
        $mensagens = Mensagem::all();
        return json_encode($mensagens);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $contato = Contato::find($id);
        return view('mensagens.nova_mensagem', ["contato_id" => $id, 'contato' => $contato->nome]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->descricao = $request->input('mensagem');
        $mensagem->contato_id = $request->input('contato_id');
        $mensagem->save();
        $mensagens = Mensagem::where('contato_id', $mensagem->contato_id)->get();
        $contato = Contato::find($mensagem->contato_id);
        return view('mensagens.lista_mensagens', ['mensagens' => $mensagens, 'contato' => $contato->nome, 'id' => $mensagem->contato_id]);
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
        $mensagem = Mensagem::find($id);
        return json_encode($mensagem);
    }

    public function editView()
    {
        return view('mensagens.alterar_mensagem');
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
        $mensagem = Mensagem::where('id', $id)->delete();
        return response('OK', 200);
    }
}

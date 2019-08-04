<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\Mensagem;

class ContatosController extends Controller
{

    public function index()
    {
        $contatos = Contato::all();
        return json_encode($contatos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view('contatos.lista_contatos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.novo_contato');
    }

    public function mensagens($id)
    {
        $mensagens = Mensagem::where('contato_id', $id)->get();
        $contato = Contato::find($id);
        return view('mensagens.lista_mensagens', ['mensagens' => $mensagens, 'contato' => $contato->nome, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->sobrenome = $request->input('sobrenome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->save();
        return json_encode($contato);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::find($id);
        return json_encode($contato);
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
        $contato = Contato::find($id);
        if (isset($contato)) {
            $contato->nome = $request->input('nome');
            $contato->sobrenome = $request->input('sobrenome');
            $contato->email = $request->input('email');
            $contato->telefone = $request->input('telefone');
            $contato->save();
            return json_encode($contato);
        }else {
            return response('Nao encontrado', 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();
        return response('OK', 200);
    }


}

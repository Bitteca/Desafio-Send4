<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensagem;

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

    public function mensagensFiltradas($contato_id)
    {
        $mensagens = Mensagem::where('contato_id', '=', $contato_id);
        return json_encode($mensagens);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensagens.nova_mensagem');
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
        $mensagem->contato_id = $request->input('contato');
        $mensagem->save();
        return $this->indexView();
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

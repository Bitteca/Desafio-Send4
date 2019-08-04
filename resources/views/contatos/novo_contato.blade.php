@extends('layouts.app')

@section('conteudo')
<div class="col-md-9">
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">Novo Contato</h4>
                <hr />
                <form action="/api/contatos" method="POST">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input name="nome" type="text" class="form-control">

                        <label>Sobrenome:</label>
                        <input name="sobrenome" type="text" class="form-control">

                        <label>Email:</label>
                        <input name="email" type="email" class="form-control">

                        <label>Telefone</label>
                        <input type="tel" name="telefone" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar Contato</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
